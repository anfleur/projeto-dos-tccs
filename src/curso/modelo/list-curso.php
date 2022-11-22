<?php

    //Realiza o include da conexão
    include('../../conexao/conn.php');

    //Trás o request vindo do datatable
    $requestData = $_REQUEST;

    //Trás as colunas vindas do resquest
    $colunas = $requestData['columns'];

    //Prepara o comando sql para o resgate dos dados da categoria
    $sql = "SELECT ID, NOME FROM CURSO WHERE 1=1 ";

    //Trás o total de registros cadastrados
    $resultado = $pdo->query($sql);
    $qtdeLinhas = $resultado->rowCount();
    
    //Verifica se há filtro determinado
    $filtro = $requestData['search']['value'];
    if( !empty( $filtro ) ){
        //Monta a expressão lógica que irá compor os filtros
        $sql .= " AND (ID LIKE '$filtro%' ";
        $sql .= " OR NOME LIKE '$filtro%') ";
    }
    
    //Obtem o total dos dados filtrados
    $resultado = $pdo->query($sql);
    $totalFiltrados = $resultado->rowCount();
    
    //Trás valores para ORDER BY      
    $colunaOrdem = $requestData['order'][0]['column']; //Obtém a posição da coluna na ordenação
    $ordem = $colunas[$colunaOrdem]['data']; //Obtém o nome da coluna para a ordenação
    $direcao = $requestData['order'][0]['dir']; //Obtém a direção da ordenação
    
    //Obtem valores para o LIMIT
    $inicio = $requestData['start']; //Obtém o ínicio do limite
    $tamanho = $requestData['length']; //Obtém o tamanho do limite
    
    //Realiza o ORDER BY com LIMIT
    $sql .= " ORDER BY $ordem $direcao LIMIT $inicio, $tamanho ";
    $resultado = $pdo->query($sql);
    $dados = array();
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        $dados[] = array_map('utf8_encode', $row);
    }
    //Monta o objeto json para retornar ao DataTable
    $json_data = array(
        "draw" => intval($requestData['draw']),
        "recordsTotal" => intval($qtdeLinhas),
        "recordsFiltered" => intval($totalFiltrados),
        "data" => $dados
    );



    //Retorna o objeto json para o DataTable
    echo json_encode($json_data);


    