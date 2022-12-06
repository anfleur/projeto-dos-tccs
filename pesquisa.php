<?php

    include('src/conexao/conn.php');

    // Recebe os dados do JS
    $CURSO_ID = filter_input(INPUT_GET, 'CURSO_ID', FILTER_SANITIZE_NUMBER_INT);

    // Acessa o if quando o campo CURSO_ID possuir um valor
    if(!empty($CURSO_ID)){

        //Criar QUERY pesquisar tcc
        $query_tccs = "SELECT ID, TITULO, CURSO_ID FROM tcc WHERE CURSO_ID=:CURSO_ID";

        $resultado_tccs = $conn->prepare($query_tccs);
        $resultado_tccs->bindParam(':CURSO_ID', $CURSO_ID);

        $resultado_tccs->execute();

        //Acessa o if quando retornar cursos no banco de dados
        if(($resultado_tccs) and ($resultado_tccs->rowCount() != 0 )){

            while($row_tcc =  $resultado_tccs->fetch(PDO::FETCH_ASSOC)){
                extract($row_tcc);    
            }
        } else {

        }
        // Cria o array de informação que será retornado para o JS
        $retorno = ['status' => true, 'CURSO_ID' => $CURSO_ID];

    } else {
        // Cria o array de informação que será retornado para o JS
    $retorno = ['status' => false, 'mensagem' => "<p>Error: Tem algo errado mona! </p>" ];
    }

    //Converte o array em obj e retorna para o JS
    echo json_encode($retorno);
?>