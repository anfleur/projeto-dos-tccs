<?php

session_start();

session_destroy();

$dados = array(
    'tipo' => 'success',
    'mensagem' => 'Sessão terminada.'

);

echo json_encode($dados);
