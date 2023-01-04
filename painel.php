<?php
    include('php/protect.php');
    
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<?php

    if($_SESSION['level'] === 'admin') {

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/painel.css">
    <link rel="shortcut icon" href="assets/img/eretec-icon-branco.svg">
    <title>ERETEC - <?php echo($_SESSION['nome']);?>!</title>
</head>
<body>
    <section class="conteudo">
        <div class="icon"><img src="assets/img/Ativo 45.svg" alt=""></div>
        <div class="email">
            <?php echo $_SESSION['email'];?>
        </div>
        <div class="links">
            Nome: <?php 
                        echo($_SESSION['nome']);?> <?php echo $_SESSION['sobrenome']
                    ?>
        </div>
        <div class="links">
            Data de Nascimento: <?php 
                                    echo date("d/m/Y", strtotime($_SESSION['nascimento']))
                                ?>
        </div>
        <div class="links">
            Genêro: <?php
                        if($_SESSION['genero'] == 'male') {
                            echo 'masculino';
                        } else if($_SESSION['genero'] == 'female') {
                            echo 'feminino';
                        } else if($_SESSION['genero'] == 'others') {
                            echo 'outros';
                        } else {
                            echo '';
                        }
                    ?>
        </div>
        <div class="links">
            <button class="controle">
                <a href="admin.php">Controle de usuarios</a>
            </button>
        </div>
        <div class="links">
            <div class="botoes">
                <button>
                    <a href="php/logout.php">Sair</a>
                </button>
                <button>
                    <a href="http://eretec.eeepmariacelia.com.br/" target="_blank">Saiba mais</a>
                </button>
            </div>
        </div>
    </section>
</body>
</html>

<?php

    } else {

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/painel.css">
    <link rel="shortcut icon" href="assets/img/eretec-icon-branco.svg">
    <title>ERETEC - <?php echo($_SESSION['nome']);?>!</title>
</head>
<body>
    <section class="conteudo">
        <div class="icon"><img src="<?php 
                                        if($_SESSION['imagem'] === '') {
                                            echo "assets/img/default-avatar.png";
                                        } else {
                                            echo $_SESSION['imagem'];
                                        }
                                    ?>" alt=""></div>
        <div class="email">
            <?php echo $_SESSION['email'];?>
        </div>
        <div class="links">
            Nome: <?php echo($_SESSION['nome']);?> <?php echo $_SESSION['sobrenome']?>
        </div>
        <div class="links">
            Data de Nascimento: <?php echo date("d/m/Y", strtotime($_SESSION['nascimento']))?>
        </div>
        <div class="links">
            Genêro: <?php if($_SESSION['genero'] == 'male') {
                echo 'masculino';
            } else if($_SESSION['genero'] == 'female') {
                echo 'feminino';
            } else if($_SESSION['genero'] == 'others') {
                echo 'outros';
            } else {
                echo '';
            }?>
        </div>
        <div class="links">
            <div class="botoes">
                <button>
                    <a href="php/logout.php">Sair</a>
                </button>
                <button>
                    <a href="http://eretec.eeepmariacelia.com.br/" target="_blank">Saiba mais</a>
                </button>
                <form action="alterar.php" method="post">
                    <button type='submit' value="<?php echo $_SESSION['id'] ?>" name='nacelio'><a href="alterar.php">Editar</a></button>
                </form>
            </div>
        </div>
    </section>
</body>

            <script>console.log(<?php echo $_SESSION['teste'];?>)</script>

</html>

<?php

    }

?>