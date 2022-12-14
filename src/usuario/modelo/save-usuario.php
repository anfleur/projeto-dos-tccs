<?php

    // Obter a nossa conexão com o banco de dados
    include('../../conexao/conn.php');

    // Obter os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verificação de campo obrigatórios do formulário
    if(empty($requestData['LOGIN'])){
        // Caso a variável venha vazia eu gero um retorno de erro do mesmo
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    } else {
        // Caso não exista campo em vazio, vamos gerar a requisição
        $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verifica se é para cadastra um nvo registro
        if($operacao == 'insert'){
            // Prepara o comando INSERT para ser executado
            try{

                if($requestData['TIPO_ID'] == 1){
                    $stmt = $pdo->prepare('INSERT INTO administrador (NOME, EMAIL, SENHA, LOGIN, TIPO_ID) VALUES (:a, :b, :c, :d, :e)');
                $stmt->execute(array(
                    //':a' => utf8_decode($requestData['NOME'])
                    ':a' => $requestData['NOME'],
                    ':b' => $requestData['EMAIL'],
                    ':c' => md5($requestData['SENHA']),
                    ':d' => $requestData['LOGIN'],
                    ':e' => $requestData['TIPO_ID']
                ));

                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro do administrador com sucesso.'
                );


                }else{
                    $stmt = $pdo->prepare('INSERT INTO usuario (NOME, EMAIL, SENHA, LOGIN, TIPO_ID) VALUES (:a, :b, :c, :d, :e)');
                    $stmt->execute(array(
                    //':a' => utf8_decode($requestData['NOME'])
                    ':a' => $requestData['NOME'],
                    ':b' => $requestData['EMAIL'],
                    ':c' => md5($requestData['SENHA']),
                    ':d' => $requestData['LOGIN'],
                    ':e' => $requestData['TIPO_ID']
                ));

                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro do usuario foi salvo com sucesso.'
                );

                }

            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível salvar o registro: .'.$e
                );
            }
        } else {
            // Se minha variável operação estiver vazia então devo gerar os scripts de update
            try{
                $stmt = $pdo->prepare('UPDATE usuario SET NOME = :a, EMAIL = :b, SENHA = :c, LOGIN = :d, TIPO_ID = :e WHERE ID = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => $requestData['NOME'],
                    ':b' => $requestData['EMAIL'],
                    ':c' => md5($requestData['SENHA']),
                    ':d' => $requestData['LOGIN'],
                    ':e' => $requestData['TIPO_ID']
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

    // Converter um array ded dados para a representação JSON
    echo json_encode($dados);