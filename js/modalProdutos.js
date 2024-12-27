function abrirModal(nome, preco, descricao, categoria, artista, imagem, produtoId) {

    document.getElementById("nome-modal").innerText = nome;
    document.getElementById("preco-modal").innerText = "R$" + preco;
    document.getElementById("descricao-modal").innerText = descricao;
    document.getElementById("categoria-modal").innerText = categoria;
    document.getElementById("artista-modal").innerText = artista;
    document.getElementById("imagem-modal").src = imagem;


    const botaoAdicionar = document.getElementById('adicionar-carrinho');
    botaoAdicionar.setAttribute('data-produto-id', produtoId); 
   
    
    document.getElementById("modal").style.display = "block";
}

function fecharModal() {
    document.getElementById("modal").style.display = "none";
}

document.getElementById('adicionar-carrinho').addEventListener('click', function(event) {
    event.preventDefault();

    const produtoId = this.getAttribute('data-produto-id');
    const quantidade = document.getElementById('quantidade').value;

    if (!produtoId || !quantidade) {
        alert('Erro ao adicionar ao carrinho: dados incompletos.');
        return;
    }

    document.getElementById('produto-id').value = produtoId;
    document.getElementById('quantidade-form').value = quantidade;

    console.log('Produto ID:', produtoId, 'Quantidade:', quantidade); 
    document.getElementById('form-carrinho').submit();

});
