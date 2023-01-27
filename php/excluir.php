<?php 

    include('conexao.php'); 
    $id = $_POST['idUsuarioApagado'];
    $sqlCode = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
    $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli->error);
    $usuario = $sqlQuery->fetch_assoc();
    
    if($usuario['level'] === 'admin') {
        die('Você não pode apagar um administrador ');
    } else {
        $sqlDeleteUser = $mysqli->query("DELETE FROM usuarios WHERE id = $id") or die ($mysqli->error);
        header('Location: ../admin.php');
    }
