function abrirModal(nome, descricao, imagem) {
    document.getElementById("nome-modal").innerText = nome;
    document.getElementById("descricao-modal").innerText = descricao;
    document.querySelector(".imagem-vinil").src = imagem;

    document.getElementById("modalArtista").style.display = "block";
}

function fecharModal() {
    document.getElementById("modalArtista").style.display = "none";
}

window.onclick = function (event) {
    const modal = document.getElementById("modalArtista");
    if (event.target === modal) {
        fecharModal();
    }
};
