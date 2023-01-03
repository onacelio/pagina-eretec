<?php 

    include('conexao.php'); 
    
    $id = $_POST['idUsuarioApagado'];
    if($id == 7) {
        die('Você não pode apagar o admin ');
    } else {
        $sqlDeleteUser = $mysqli->query("DELETE FROM usuarios WHERE id = $id") or die ($mysqli->error);
        header('Location: ../admin.php');
    }
