<?php
    /******
     * Upload de imagens
     ******/

    //  echo $_FILES[ 'archive' ][ 'name' ];

    // verifica se foi enviado um arquivo
    if ( isset( $_FILES[ 'ARQUIVO' ][ 'name' ] ) && $_FILES[ 'ARQUIVO' ][ 'error' ] == 0 ) {
        // echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'archive' ][ 'name' ] . '</strong><br />';
        // echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'archive' ][ 'type' ] . ' </strong ><br />';
        // echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'archive' ][ 'tmp_name' ] . '</strong><br />';
        // echo 'Seu tamanho é: <strong>' . $_FILES[ 'archive' ][ 'size' ] . '</strong> Bytes<br /><br />';

        $arquivo_tmp = $_FILES[ 'ARQUIVO' ][ 'tmp_name' ];
        $nome = $_FILES[ 'ARQUIVO' ][ 'name' ];

        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.pdf', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;

            // Concatena a pasta com o nome
            $destino = 'arquivos/' . $novoNome;

            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                
                // Scripts de persistência no banco de dados .....
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
                            $stmt = $pdo->prepare('INSERT INTO tcc (TITULO, ANO, RESUMO, AUTOR_1, AUTOR_2, AUTOR_3, AUTOR_4, COORIENTADOR, ORIENTADOR, ARQUIVO, CURSO_ID) VALUES (:a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k)');
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
                                ':j' => $novoNome,
                                ':k' => $requestData['CURSO_ID']
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
                            $stmt = $pdo->prepare('UPDATE tcc SET TITULO = :a, ANO = :b, RESUMO = :c, AUTOR_1 = :d, AUTOR_2 = :e, AUTOR_3 = :f, AUTOR_4 = :g,  COORIENTADOR = :h, ORIENTADOR = :i, ARQUIVO = :j, CURSO_ID = :k WHERE ID = :id');
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
                                ':j' => $requestData['ARQUIVO'],
                                ':k' => $requestData['CURSO_ID']

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
            }
            else
                $retorno = array ('mensagem' => 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.');
        }
        else
            $retorno = array ('mensagem' => 'Você poderá enviar apenas arquivos "*.PDF"');
    }
    else
        $retorno = array ('mensagem' => 'Você não enviou nenhum arquivo!');


    echo json_encode($retorno);