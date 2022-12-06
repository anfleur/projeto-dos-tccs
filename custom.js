async function pesquisar(){
    // Recupera o id da categoria
    var CURSO_ID = document.getElementById("CURSO_ID").value;
    console.log(CURSO_ID);

    //Faz a requisição para o arquivo pesquisa.php
    var dados = await fetch("pesquisa.php?CURSO_ID=" + CURSO_ID);

    var resposta = await dados.json();
    console.log(resposta);
}
