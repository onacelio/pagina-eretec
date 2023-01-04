<?php
    include('php/conexao.php'); 

    if(isset($_POST['email']) || isset($_POST['senha'])) {
        if(strlen($_POST['email']) == 0) {
            echo 'Preencha seu e-mail';
        } else if(strlen($_POST['senha']) == 0) {
            echo 'Preencha sua senha';
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sqlCode = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
            $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli->error);

            $usuario = $sqlQuery->fetch_assoc();
            if(password_verify($senha, $usuario['user_password'])){
                
                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['level'] = $usuario['level'];
                $_SESSION['nome'] = $usuario['firstname'];
                $_SESSION['sobrenome'] = $usuario['lastname'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['nascimento'] = $usuario['date_birth'];
                $_SESSION['imagem'] = $usuario['image'];
                $_SESSION['genero'] = $usuario['gender'];
                header('Location: painel.php');
            } else {
                echo "<script>alert('FALHA AO LOGAR! E-MAIL OU SENHA INCORRETOS')</script>";
            }
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
    <title>Login</title>
</head>
<body>
    <section class="container">
        <div class="form">
            <form action="" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Entrar</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="cadastro.php">Cadastre-se</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <div class="button">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </div>
        <div class="form-image">
            <img src="assets/img/icon-eretec.svg" alt="">
        </div>
    </section>
</body>
</html>