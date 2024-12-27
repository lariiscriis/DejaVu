function detalhesGeneros(generos) {
    const detailsDiv = document.getElementById('modal_conteudo');
    let descricao_generos = '';

    switch (generos) {
        case 'pop':
            descricao_generos = `
                <h3>Pop</h3><br>
                <p>O gênero pop é conhecido por suas melodias cativantes e letras simples. É um dos gêneros mais populares no mundo.</p>
            `;
            break;
        case 'rock':
            descricao_generos = `
                <h3>Rock</h3><br>
                <p>O rock é caracterizado por guitarras elétricas e uma forte presença de batidas. Ele tem várias vertentes, como rock clássico, punk e metal.</p>
            `;
            break;
        case 'hiphop':
            descricao_generos = `
                <h3>Hip Hop</h3><br>
                <p>O hip hop é um gênero musical que originou-se nas comunidades afro-americanas e latino-americanas, com ênfase em rimas e batidas fortes.</p>
            `;
            break;
        case 'classica':
            descricao_generos = `
                <h3>Clássica</h3><br>
                <p>A música clássica é um gênero tradicional, que envolve orquestras e peças compostas por músicos renomados, como Mozart e Beethoven.</p>
            `;
            break;
        default:
            descricao_generos = '<p>Selecione um gênero para ver mais detalhes.</p>';
    }

    detailsDiv.innerHTML = descricao_generos;

    const modal = document.getElementById('descricao_generos');
    modal.style.display = "block";
}

function closeModal() {
    const modal = document.getElementById('descricao_generos');
    modal.style.display = "none";
}