<?php 

    include('php/protect.php'); 
    
    if(!isset($_SESSION)) {
        session_start();
    }

    if($_SESSION['level'] != 'admin') {
        header("Location: painel.php");
    }
    
    include('php/conexao.php');

    $sqlQuery = $mysqli->query("SELECT * FROM usuarios") or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="shortcut icon" href="assets/img/eretec-icon-branco.svg">
    <title>Página do administrador</title>
</head>
<body>

    <header>
        <div>
            <button><a href="painel.php">Voltar</a></button>
        </div>
        <div>
            <h2>CONTROLE DE USUARIOS</h2>
        </div>
    </header>

    <form action="php/excluir.php" method="post">
    <table border='1'>
        <thead>
            <th>Id</th>
            <th>level</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>date_birth</th>
            <th>gender</th>
            <th>date_cadastre</th>
            <th>ACTIONS</th>
        </thead>
        <tbody>
            <?php
                while($consulta = $sqlQuery->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $consulta['id']?></td>
                    <td><?php echo $consulta['level']?></td>
                    <td><?php echo $consulta['firstname']?></td>
                    <td><?php echo $consulta['lastname']?></td>
                    <td><?php echo $consulta['email']?></td>
                    <td><?php echo date("d/m/Y", strtotime($consulta['date_birth']))?></td>
                    <td><?php echo $consulta['gender']?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($consulta['date_cadastre']))?></td>
                    <td class="acao"><button type="submit" value="<?php echo $consulta['id'] ?>" name="idUsuarioApagado">Apagar</button></td>
                </tr>
            <?php
                };
            ?>
        </tbody>
    </table>
</form>

</body>
</html>