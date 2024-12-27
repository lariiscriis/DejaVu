<?php
require '../includes/conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $quantidade_estoque = $_POST['quantidade_estoque'];
    $imagem = $_POST['imagem'];
    $data_lancamento = $_POST['data_lancamento'];
    $artista = $_POST['artista'];
    $descricao = $_POST['descricao'];

    $cd_vinil = uniqid('vinil_', true); 
    $cd_artista = uniqid('artista_', true); 

    try {
        $pdo->beginTransaction();

        $sql_vinil = "INSERT INTO vinil (cd_vinil, nm_titulo_vinil, categoria_vinil, vl_preco_unitario_vinil, qt_estoque_vinil, im_vinil, dt_lancamento_vinil, ds_informacoes_vinil)
                      VALUES (:cd_vinil, :nome,:categoria, :preco, :quantidade_estoque, :imagem, :data_lancamento, :descricao)";
        $stmt_vinil = $pdo->prepare($sql_vinil);
        $stmt_vinil->bindParam(':cd_vinil', $cd_vinil);
        $stmt_vinil->bindParam(':nome', $nome);
        $stmt_vinil->bindParam(':categoria', $categoria);
        $stmt_vinil->bindParam(':preco', $preco);
        $stmt_vinil->bindParam(':quantidade_estoque', $quantidade_estoque);
        $stmt_vinil->bindParam(':imagem', $imagem);
        $stmt_vinil->bindParam(':data_lancamento', $data_lancamento);
        $stmt_vinil->bindParam(':descricao', $descricao);
        $stmt_vinil->execute();

        $sql_insert_artista = "INSERT INTO artista (cd_artista, nm_artista) VALUES (:cd_artista, :artista)";
        $stmt_insert_artista = $pdo->prepare($sql_insert_artista);
        $stmt_insert_artista->bindParam(':cd_artista', $cd_artista);
        $stmt_insert_artista->bindParam(':artista', $artista);

        if (!$stmt_insert_artista->execute()) {

            $errorInfo = $stmt_insert_artista->errorInfo();
            throw new Exception("Erro ao inserir o artista: " . $errorInfo[2]);
        }

        $sql_vinil_artista = "INSERT INTO vinil_artista (cd_vinil, cd_artista) VALUES (:cd_vinil, :cd_artista)";
        $stmt_vinil_artista = $pdo->prepare($sql_vinil_artista);
        $stmt_vinil_artista->bindParam(':cd_vinil', $cd_vinil);
        $stmt_vinil_artista->bindParam(':cd_artista', $cd_artista);

        if (!$stmt_vinil_artista->execute()) {

            throw new Exception("Erro ao associar vinil e artista: " . implode(" ", $stmt_vinil_artista->errorInfo()));
        }

        $pdo->commit();

        echo "<script>alert('Vinil e Artista Cadastrados com Sucesso!'); window.location.href = 'adm.php';</script>";

    } catch (PDOException $e) {

        $pdo->rollBack();
        echo "Erro ao cadastrar o vinil: " . $e->getMessage();
    } catch (Exception $e) {

        echo "Erro: " . $e->getMessage();
    }
}
?>