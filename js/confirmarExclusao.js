const iconesDeletar = document.querySelectorAll('.deletarContato');

iconesDeletar.forEach((icone) => {
    icone.addEventListener('click', (event) => {
        event.preventDefault();

        var resultado = confirm("Você quer deletar esse contato?");
        if (resultado) {
            window.location.href = event.target.parentElement.href;
        }
    })
})

