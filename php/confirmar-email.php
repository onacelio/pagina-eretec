<?php

include("php/conexao.php");
$key  = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);

if(!empty($key)) {
    $sqlCode = "SELECT * FROM usuarios WHERE chave = '$key' LIMIT 1";
    $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli->error);
    $usuario = $sqlQuery->fetch_assoc();
    
    if($usuario != null) {
        $id = $usuario['id'];
        $usuario['chave'] = NULL;
        $chave = $usuario['chave'];
        $queryUpUser = "UPDATE usuarios SET chave = NULL, sits_usuario_id = 1 WHERE id = $id";
        $upUser = $mysqli->query($queryUpUser);
        if($upUser) {
            header("Location: ../index.php");
        } else {
            echo "O e-mail não foi confirmado";
        }

    } else {
        echo "Erro, endereço inválido";
    }
} else {
    echo "Erro, endereço inválido";
}