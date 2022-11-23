<?php

    // Faz a conexão com o banco de dados
    include('../../conexao/conn.php');

    // Obtem os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verifica o campo obrigatórios do formulário
    if(empty($requestData['TITULO'])){
        // Caso a variável venha vazia será gerado um retorno de erro do mesmo
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    } else {
        // Caso não exista campo em vazio, uma requisição será gerada
        $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verifica se é para cadastrar um novo registro
        if($operacao == 'insert'){
            // Prepara o comando INSERT para ser executado
            try{
                $stmt = $pdo->prepare('INSERT INTO EIXO (TITULO) VALUES (:a)');
                $stmt->execute(array(
                    ':a' => utf8_decode($requestData['TITULO'])
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro salvo com sucesso.'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar o cadastro do curso.'
                );
            }
        } else {
            // Se a variável de operação estiver vazia então gera os scripts de update
            try{
                $stmt = $pdo->prepare('UPDATE EIXO SET TITULO = :a WHERE ID = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => utf8_decode($requestData['TITULO'])
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro atualizado com sucesso.'
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar o alteração do registro.'
                );
            }
        }
    }

    // Converte para JSON
    echo json_encode($dados);