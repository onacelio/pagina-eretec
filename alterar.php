<?php

    include('php/protect.php'); 

    if(!isset($_SESSION)) {
        session_start();
    }

    include('php/conexao.php'); 

    if(isset($_FILES['image'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $image = $_FILES['image'];
        $encrypted = password_hash($password, PASSWORD_DEFAULT);
        $id = $_SESSION['id'];

        if($image['error']) {
            die('Falha ao enviar arquivo');
        }

        if($image['size'] > 2097152){
            die("Imagem muito grande! máximo de 2MB");
        } 

        $pasta = 'uploaded-img/';
        $newNameImage = uniqid();
        $extension =  strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        $upload = move_uploaded_file($image['tmp_name'], $pasta . $newNameImage . "." . $extension);

        if($upload) {
            $uparImagem = $mysqli->query("UPDATE usuarios SET image = 'uploaded-img/$newNameImage.$extension' WHERE id = $id") or die ($mysqli->error);
            $sqlAlterarUser = $mysqli->query("UPDATE usuarios SET email = '$email' WHERE id = $id") or die ($mysqli->error);
            $alterarUserPassword = $mysqli->query("UPDATE usuarios SET user_password = '$encrypted' WHERE id = $id") or die ($mysqli->error);
            session_destroy();
            header('Location: index.php');
        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="shortcut icon" href="assets/img/eretec-icon-branco.svg">
    <title>Alterar usuário - <?php echo($_SESSION['nome']);?>!</title>
</head>
<body>
    <section class="container">
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-header">
                    <div class="title">
                        <h1>ALTERAR</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="painel.php">Voltar ao painel</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu novo e-mail" required value="<?php echo $_SESSION['email']?>">
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua nova senha ou a senha atual" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Imagem</label>
                        <input id="image" type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                    </div>
                </div>

                <div class="button">
                    <button type="submit" id="alterar">Alterar</button>
                </div>
            </form>
        </div>
        <div class="form-image">
            <img src="assets/img/icon-eretec.svg" alt="">
        </div>
    </section>  
</body>
</html>