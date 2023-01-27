<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'lib/vendor/autoload.php';

    if(isset($_POST['cadastre'])) {

        include('php/conexao.php');

        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $email = filter_input(INPUT_POST, 'email');
        $date = filter_input(INPUT_POST, 'date');
        $password = filter_input(INPUT_POST, 'password');
        $confirmpassword = filter_input(INPUT_POST, 'confirmpassword');
        $key = password_hash($email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
        $gender = filter_input(INPUT_POST, 'gender');

        $sqlCode = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli->error);
        $usuario = $sqlQuery->fetch_assoc();

        if(is_null($usuario)) {
            if($password === $confirmpassword) {
                
                $encrypted = password_hash($password, PASSWORD_DEFAULT);
    
                $mysqli->query("INSERT INTO usuarios VALUES(0, 'user', '$firstname', '$lastname', '$email', '$date', '$encrypted', '$key', 3,'$gender', '', now())") or die("Erro ao tentar cadastrar registro, nome: $firstname, sobrenome: $lastname, email: $email, senha: $encrypted, data: $date, genero: $gender <br> $mysqli->error");

                $mail = new PHPMailer(true);

                try {
                    
                    /*Para enviar o e-mail de confirmaçãoestamos usando o gmail */
                    $mail->CharSet = "UTF-8";
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                    
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'email da sua conta do gmail';                     
                    $mail->Password   = 'senha da sua conta no gmail';                               
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = 465;                                    

                    $mail->setFrom('email@gmail.com');
                    $mail->addAddress($email, $firstname . $lastname);     
                    
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Confirmação de e-mail';

                    $body = "Prezado $firstname $lastname agradecemos a sua solicitação de cadastro em nosso site. <br><br> <a href='http://localhost/projetos/trabalho-pwII/php/confirmar-email.php?chave=$key'>Clique aqui</a> para a confirmação do e-mail";

                    $mail->Body = $body;

                    $mail->send();
                    echo "<script>alert('Abra sua caixa de e-mail para a confirmaçãodo cadastro')<script>";
                } catch (Exception $e) {
                    echo "Erro ao enviar o e-mail!";
                }

            } else{
                echo "<script>window.alert('As senhas devem ser iguais')</script>";
            }
        } else {
            echo "<script>window.alert('Falha ao cadastrar, e-mail já cadastrado')</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/cadastro.css">
    <link rel="shortcut icon" href="assets/img/eretec-icon-branco.svg">
    <title>Cadastro</title>
</head>
<body>
    <section class="container">
        <div class="form-image">
            <img src="assets/img/icon-eretec.svg" alt="">
        </div>
        <div class="form">
            <form action="" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="index.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro nome</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Digite seu sobrenome" required>
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                        
                    </div>

                    <div class="input-box">
                        <label for="date">Data de nascimento</label>
                        <input id="date" type="date" name="date" placeholder="" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="confirmpassword">Confirme sua senha</label>
                        <input id="confirmpassword" type="password" name="confirmpassword" placeholder="Confirme sua senha" required>
                    </div>
                </div>

                <div class="gender-inputs">
                    <div class="gedner-title">
                        <h6>Genêro</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" name="gender" id="male" value='male'>
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" name="gender" id="female" value='female'>
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" name="gender" id="others" value='others'>
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input type="radio" name="gender" id="none" value='none'>
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>

                <div class="button">
                    <button type="submit" name="cadastre">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>