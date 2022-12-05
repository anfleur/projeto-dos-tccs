<?php

    // Consegue a conexão com o banco de dados
    include('../../conexao/conn.php');

    // Obtem os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verifica os campo obrigatórios do formulário
    if(empty($requestData['TITULO'])){
        // Se o campo estiver vazio, uma mensagem de erro vai aparecer
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    } else {
        // Se o campo estiver preenchido corretamente, a operação entra em um novo IF para o cadastro das informações
        $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verifica se é para cadastrar um novo registro
        if($operacao == 'insert'){

            // Prepara o comando INSERT para ser executado
            try{
                $stmt = $pdo->prepare('INSERT INTO tcc (VALIDACAO, TITULO, ANO, RESUMO, AUTOR_1, AUTOR_2, AUTOR_3, AUTOR_4, COORIENTADOR, ORIENTADOR, CURSO_ID) VALUES (:a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k)');
                $stmt->execute(array(
                    ':a' => $requestData['VALIDAÇAO'],
                    ':b' => $requestData['TITULO'],
                    ':c' => $requestData['ANO'],
                    ':d' => $requestData['RESUMO'],
                    ':e' => $requestData['AUTOR_1'],
                    ':f' => $requestData['AUTOR_2'],
                    ':g' => $requestData['AUTOR_3'],
                    ':h' => $requestData['AUTOR_4'],
                    ':i' => $requestData['COORIENTADOR'],
                    ':j' => $requestData['ORIENTADOR'],
                    ':k' => $requestData['CURSO_ID']
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro salvo com sucesso.'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível salvar o registro: .'.$e
                );
            }
        } else {
            // Se a variável operação estiver vazia então o sistema deve gerar os scripts para o update
            try{
                $stmt = $pdo->prepare('UPDATE tcc SET VALIDACAO = :a, TITULO = :b, ANO = :c, RESUMO = :d, AUTOR_1 = :e, AUTOR_2 = :f, AUTOR_3 = :g, AUTOR_4 = :h, COORIENTADOR = :i, ORIENTADOR = :j , CURSO_ID = :k WHERE ID = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => $requestData['VALIDAÇAO'],
                    ':b' => $requestData['TITULO'],
                    ':c' => $requestData['ANO'],
                    ':d' => $requestData['RESUMO'],
                    ':e' => $requestData['AUTOR_1'],
                    ':f' => $requestData['AUTOR_2'],
                    ':g' => $requestData['AUTOR_3'],
                    ':h' => $requestData['AUTOR_4'],
                    ':i' => $requestData['COORIENTADOR'],
                    ':j' => $requestData['ORIENTADOR'],
                    ':k' => $requestData['CURSO_ID']
                    
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro atualizado com sucesso.'
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar o alteração do registro.'.$e
                );
            }
        }
    }

    echo json_encode($dados);