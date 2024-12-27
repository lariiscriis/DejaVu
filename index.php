<?php
session_start(); 
require 'includes/conexao.php'; 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déjà Vu - Loja de Vinis</title>
    <link rel="icon" href="assets/images/deja_vu 1.svg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css?v=1.0"> 
</head>
<body>

    <header id="home">
        <div class="top">
            <div class="container">
                <ul class="lang">
                    <div class="sociais">
                    <li><a href="#"><img src="assets/images/redes1.svg"></a></li>
                    <li><a href="#"><img src="assets/images/redes2.svg"></a></li>
                    <li><a href="#"><img src="assets/images/redes3.svg"></a></li>
                </div> 
                    <div class="barra_pesquisa">
                    <form method="GET" action="pages/pesquisa.php">
                      <li>   
                    <input type="search" class="input_pesquisa" name="query" placeholder="Ache o seu vinil favorito: (vinil, artista, gênero...)">
                    <button type="submit" class="botao_pesquisa"><img src="assets/images/pesquisa_img.svg" alt=""></button>
                    </li>
                    </form>
                    </div>
                </ul>
                <div class="botao_container">
                <ul class="botoes_user">
                <li> 
                <a href="
                
                <?php
                            if (isset($_SESSION['id_cliente'])) {
                                if ($_SESSION['id_cliente'] === 'admin') {
                                    echo 'pages/adm.php';
                                } else {
                                    echo 'pages/minhaConta.php';
                                }
                            } else {
                                echo 'pages/paginaLoginCadastro.php';
                            }
                        ?>">
                            <button class="perfil_usuario">
                                <img src="assets/images/minha conta.svg">
                                <p>Minha Conta</p>
                            </button>
                        </a>
                </li>
                <li> <a href="pages/carrinho.php"><button href="#" class="carrinho_compras"><img src="assets/images/minhas_compras.svg" ><p>Minhas Compras</p></button></li></a>
                </ul>
                </div>
            </div>
        </div>
        <nav>
            <div class="container_nav">
                <a href="" class="logo">
                    <img src="assets/images/deja_vu 1.svg" >
                </a>
                <div class="menu-btn">
                    <img src="assets/images/barraDeMenu.svg" class="menuHamburguer" onclick="menuShow()"></label>
                </div>
                <ul class="menuLista" >
                    <li><a href="index.php#home" onclick="menuShow()">Home</a></li>
                    <li><a href="#sobre-nos" onclick="menuShow()">Sobre </a></li>
                    <li><a href="#contato" class="especial2" onclick="menuShow()">Contato</a></li>
                    <li><a href="#cards_generosMusicas" class="especial" onclick="menuShow()">Gêneros</a></li> 
                    <li><a href="pages/artistas.php" onclick="menuShow()">Artistas</a></li>
                    <li><a href="pages/vinis_produtos.php" onclick="menuShow()">Vinis</a></li>
                </ul>
            </div>
        </nav>
    </header>


    <!-- Conteúdo Principal -->
    <main >
        <!-- Hero -->
        <section class="banner">
            <div class="hero-text">
            <button href="#" class="cta-button1"><span id="ctaSpan1"> Junte-se a nossa comunidade</span> <img src="assets/images/cara_sorrisoCTA.svg" alt="Sorriso"></button>
            <h1>Um Toque de <span id="span1">Nostalgia</span> </h1> <h1>com o Som da <span id="span2">Modernidade</span></h1>
            <a href="pages/vinis_produtos.php"><button  class="cta-button2"><span id="ctaSpan2"> <img src="assets/images/estrelas.svg" alt="Estrelas" >Compre Agora </span><img src="assets/images/estrelas.svg" alt="Estrelas"></button></a>
             </div>
            <div class="imagemhero">
                <img src="assets/images/imagemPersonagens_hero.svg" alt="">
             
            </div>
            
        </section>
    </main>

    <!-- Generos Musicais -->
 
        <section id="cards_generosMusicas">
            
            <!-- <h2>- Gêneros Populares - </h2> -->
            <div class="generos">
                <div class="genero_card" onclick="detalhesGeneros('pop')">  
                    <div class="imagem_card">
                    <img src="assets/images/estrela_generos.svg" class="estrela" alt="Estrela">
                    <img src="assets/images/personagem_pop.svg" alt="Pop">
                    </div>
                     <h3>Pop</h3>
                </div>
                <div class="genero_card">
                    <div class="imagem_card" onclick="detalhesGeneros('rock')">
                    <img src="assets/images/estrela_generos.svg" class="estrela" alt="Estrela">
                    <img src="assets/images/personagem_rock.svg" alt="Rock">
                </div>
                    <h3>Rock</h3>
                </div>
                <div class="genero_card" onclick="detalhesGeneros('hiphop')">
                    <div class="imagem_card">
                    <img src="assets/images/estrela_generos.svg" class="estrela" alt="Estrela">    
                    <img src="assets/images/personagem_hiphop.svg" alt="Hiphop">
                </div>
                    <h3>HIPHOP</h3>
                </div>
                <div class="genero_card"  >
                    <div class="imagem_card" onclick="detalhesGeneros('classica')">
                    <img src="assets/images/estrela_generos.svg" class="estrela" alt="Estrela">                 
                    <img src="assets/images/personagem_classica.svg" alt="Classica">
                </div>
                    <h3>Clássica</h3>
                    </div>
            </div>
            <div id="descricao_generos" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()"><img src="assets/images/cancelar.svg" alt=""></span>
                    <div id="modal_conteudo" class="descricao_generos"></div>
                </div>
            </div>

        </section>
        <!-- Vinis -->
    <section class="Vinis">
            <!-- <h2>Mais Populares</h2> -->
    <div class="produto-cards">


    <?php
                try {
                    $sql = "SELECT vinil.*, artista.nm_artista 
                            FROM vinil
                           
                            JOIN vinil_artista ON vinil.cd_vinil = vinil_artista.cd_vinil
                            JOIN artista ON vinil_artista.cd_artista = artista.cd_artista
                            LIMIT 8"; 
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($produtos as $produto) {
                        echo "
                        <div class='produto-card'>
                            <div class='produto-imagem'>
                                <img src='" . $produto['im_vinil'] . "' alt='Vinil'>
                            </div>
                            <div class='produto-detalhes'>
                                <h3 class='produto-nome'>" . $produto['nm_titulo_vinil'] . "</h3>
                                <p class='produto-descricao'>" . $produto['ds_informacoes_vinil'] . "</p>
                                <p class='produto-categoria'><strong>Categoria:</strong><span class='cat'>" . $produto['categoria_vinil'] . "</span></p>
                                <p class='produto-artista'><strong>Artista:</strong><span class='art'>" . $produto['nm_artista'] . "</span></p>
                                <p class='produto-preco'><strong> R$" . $produto['vl_preco_unitario_vinil'] . ",00</strong></p>

                                <div class='produto-avaliacao'>
                                    <img src='assets/images/estrela_generos.svg' alt='Estrela cheia'>
                                    <img src='assets/images/estrela_generos.svg'  alt='Estrela cheia'>
                                    <img src='assets/images/estrela_generos.svg'  alt='Estrela cheia'>
                                    <img src='assets/images/estrela_generos.svg'  alt='Estrela cheia'>
                                    <img src='assets/images/estrela_generos.svg' alt='Estrela cheia'>
                                    <span>(5)</span>
                                </div>
                                <div class='produto-botoes' style='margin-top: 2em;'>
                                <a class='btn-comprar' id='btn-comprar'  href='pages/vinis_produtos.php' style='text-align:center;'>Saiba Mais</a>
                                    <button class='btn-favoritar '><img src='assets/images/favoritar.png' alt='Favoritar'></button>
                                </div>
                            </div>
                        </div>";
                    }
                } catch (PDOException $e) {
                    echo "Erro ao buscar dados: " . $e->getMessage();
                }
                ?>

 
</section>

        <!-- Sobre Nós -->
        <section id="sobre-nos">
            <div class="sobre-nos-container">
                <div class="sobre-texto">
                    <h2>Sobre o Projeto</h2>
                    <p>
                        Nosso projeto conecta o mundo moderno com a nostalgia dos vinis. 
                        Criamos experiências únicas para os amantes da música, trazendo vinis de qualidade, 
                        curados com carinho pela nossa equipe apaixonada por som.<br>
                      <strong>* Este é um projeto fictício, desenvolvido com finalidade educacional, para fins de aprendizado e aprimoramento técnico.</strong>
                    </p>
                 <a href="https://github.com/lariiscriis/projetoDejaVu" > <button class="cta-button2"><span id="ctaSpan2"><img src="assets/images/estrelas.svg" alt="Estrelas">- Saiba Mais -  </span><img src="assets/images/estrelas.svg" alt="Estrelas"></button></a>

                </div>
        
                <div class="slider-container">
                    <div class="slider">
                        <div class="slide">
                            <img src="assets/images/larissa.jpeg" alt="Larissa Cristina">
                            <h3>Larissa Cristina</h3>
                            <h5>Desenvolvedora FullStack</h5>
                            <p>Sou apaixonada por desenvolvimento de jogos e adoro criar mundos imersivos e experiências interativas. Trabalho como desenvolvedora full-stack, com experiência tanto em front-end quanto em back-end. Atualmente, estou estudando Desenvolvimento de Software Multiplataforma na FATEC. Além disso, tenho interesse em trabalhar na área de dados e explorar oportunidades em análise de dados.</p>                   
                         </div>
                           
                            
                            <div class="slide">
                            <img src="assets/images/personagem_classica.svg" alt="Milene Almeida">
                            <h3>Milene Almeida</h3>
                            <h5>Desenvolvedora FullStack</h5>
                            <p>Atualmente, estou trabalhando em projetos de desenvolvimento web criativos e inovadores, aprendendo continuamente sobre novas tecnologias como APIs, JavaScript e design responsivo. Estou aberta a colaborar em projetos de front-end, back-end e websites interativos.</p>
                        </div>
                        <div class="slide">
                            <img src="assets/images/sabrina.jpeg" alt="Sabrina Pereira">
                            <h3>Sabrina Pereira</h3>
                            <h5>Desenvolvedora Back-End</h5>
                            <p>Sou estudante de Desenvolvimento de Software e formada em Técnico em Informática. Estou sempre em busca de aprimorar minhas habilidades em programação.</p>
                         </div>
                        <div class="slide">
                            <img src="assets/images/arthur.jpeg" alt="Arthur Lopes">
                            <h3>Arthur Lopes</h3>
                            <h5>Desenvolvedor Front-End</h5>
                            <p>Tenho 18 anos e estou cursando Desenvolvimento de Software Multiplataforma na FATEC. Me interesso bastante pelas áreas de Banco de Dados, Desenvolvimento Web e Design. Busco aprimorar meus conhecimentos, seja pesquisando na internet ou aprendendo na faculdade!</p>
                        </div>
                    </div>
        
                    <button class="prev" onclick="slide(-1)"><img src="assets/images/seta_esquerda.svg" alt=""></button>
                    <button class="next" onclick="slide(1)"><img src="assets/images/setaa_direita.svg" alt=""></button>
                </div>
            </div>
        </section>

        <!-- Seção de Contato -->
        <section id="contato">
                <div class="contato-form">
                    <h2>Fale Conosco !</h2>
                    <form action="pages/newsletter.php" method="post">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
        
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
        
                        <label for="numero_ceular">Celular:</label>
                        <input type="tel" id="numero_celular" name="numero_celular" placeholder="Digite seu celular">
        
                        <label for="mensagem">Mensagem:</label>
                        <textarea id="mensagem" name="mensagem" placeholder="Digite sua mensagem" required></textarea>
        
                        <button type="submit">Enviar Mensagem</button>
                    </form>
                </div>
            
            <div class="contato-imagem">
                <img src="assets/images/imagemPersonagens_hero.svg" alt="Personagem">
            </div>

          
        </section>
 

    <!-- Rodapé -->
    <footer>
        <p>© 2024 Déjà Vu. Todos os direitos reservados.</p>
       <a href="#home" class="seta_home">
        <i class='bx bxs-up-arrow-square' ></i>
       </a>
    </footer>







        <!-- JavaScript -->
        <script src="js/nav.js"></script>
    <script src="js/generos_desc.js"></script>
    <script src="js/slider_sobrenos.js"></script>
    <script src="js/modalProdutoIndex.js"></script>

</body>
</html>
