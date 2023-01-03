<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['id'])) {
        die("
        <!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='assets/css/login.css'>
            <link rel='shortcut icon' href='assets/img/eretec-icon-branco.svg'>
            <title>Você não pode acessar</title>
        </head>
        <body>
            <section class='container'>
                <div class='form'>
                    <form action='' method='post'>
                        <div class='form-header'>
                            <div class='title'>
                                <h1>Impossível acessar</h1>
                            </div>
                        </div>
        
                        <div class='button'>
                            <button type='submit'><a href='index.php'>Voltar a página inicial</a></button>
                        </div>
                </div>
                <div class='form-image'>
                    <img src='assets/img/icon-eretec.svg' alt=''>
                </div>
            </section>
        </body>
        </html>
        ");
    }

?>