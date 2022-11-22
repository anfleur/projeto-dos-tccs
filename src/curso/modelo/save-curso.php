<?php

    // Consegue a conexão com o banco de dados
    include('../../conexao/conn.php');

    // Obtem os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verifica os campo obrigatórios do formulário
    if(empty($requestData['NOME'])){
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
                $stmt = $pdo->prepare('INSERT INTO CURSO (NOME, EIXO_ID) VALUES (:a, :b)');
                $stmt->execute(array(
                    ':a' => $requestData['NOME'],
                    ':b' => $requestData['EIXO_ID'],
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
                $stmt = $pdo->prepare('UPDATE CURSO SET NOME = :a, EIXO_ID = :b WHERE ID = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => $requestData['NOME'],
                    ':b' => $requestData['EIXO_ID']
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