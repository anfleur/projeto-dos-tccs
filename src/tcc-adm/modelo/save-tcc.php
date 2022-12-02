<?php
    
    
                // Obter a nossa conexão com o banco de dados
                include('../../conexao/conn.php');

                // Obter os dados enviados do formulário via $_REQUEST
                $requestData = $_REQUEST;

                // Verificação de campo obrigatórios do formulário
                if(empty($requestData['TITULO'])){
                    // Caso a variável venha vazia eu gero um dados de erro do mesmo
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
                            $stmt = $pdo->prepare('INSERT INTO tcc (TITULO, ANO, RESUMO, AUTOR_1, AUTOR_2, AUTOR_3, AUTOR_4, COORIENTADOR, ORIENTADOR, CURSO_ID, VALIDACAO) VALUES (:a, :b, :c, :d, :e, :f, :g, :h, :i, :k, :l)');
                            $stmt->execute(array(
                                ':a' => $requestData['TITULO'],
                                ':b' => $requestData['ANO'],
                                ':c' => $requestData['RESUMO'],
                                ':d' => $requestData['AUTOR_1'],
                                ':e' => $requestData['AUTOR_2'],
                                ':f' => $requestData['AUTOR_3'],
                                ':g' => $requestData['AUTOR_4'],
                                ':h' => $requestData['COORIENTADOR'],
                                ':i' => $requestData['ORIENTADOR'],
                                
                                ':k' => $requestData['CURSO_ID'],
                                ':l' =>$requestData['VALIDACAO'],
                            ));

                            $retorno = array(
                                "tipo" => 'success',
                                "mensagem" => 'Trabalho cadastrado com sucesso.'
                            );
                        } catch(PDOException $e) {
                            $retorno = array(
                                "tipo" => 'error',
                                "mensagem" => 'Não foi possível efetuar o cadastro do trabalho.'
                            );
                        }
                    } else {
                        // Se minha variável operação estiver vazia então devo gerar os scripts de update
                        try{
                            $stmt = $pdo->prepare('UPDATE tcc SET TITULO = :a, ANO = :b, RESUMO = :c, AUTOR_1 = :d, AUTOR_2 = :e, AUTOR_3 = :f, AUTOR_4 = :g,  COORIENTADOR = :h, ORIENTADOR = :i, CURSO_ID = :k, VALIDACAO = :l WHERE ID = :id');
                            $stmt->execute(array(
                                ':id' => $ID,
                                ':a' => $requestData['TITULO'],
                                ':b' => $requestData['ANO'],
                                ':c' => $requestData['RESUMO'],
                                ':d' => $requestData['AUTOR_1'],
                                ':e' => $requestData['AUTOR_2'],
                                ':f' => $requestData['AUTOR_3'],
                                ':g' => $requestData['AUTOR_4'],
                                ':h' => $requestData['COORIENTADOR'],
                                ':i' => $requestData['ORIENTADOR'],
                                
                                ':k' => $requestData['CURSO_ID'],
                                ':l' =>$requestData['VALIDACAO'],

                            ));

                            $retorno = array(
                                "tipo" => 'success',
                                "mensagem" => 'Trabalho atualizado com sucesso.'
                            );
                        } catch (PDOException $e) {
                            $retorno = array(
                                "tipo" => 'error',
                                "mensagem" => 'Não foi possível efetuar o alteração do trabalho.'
                            );
                        }
                    }
                }

                // $dados = array ('mensagem' => 'Arquivo salvo com sucesso em : ' . $destino);
            
            

    echo json_encode($retorno);