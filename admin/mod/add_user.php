<?php 

include '../../mod/config.php';

if(isset($_POST['submit'])){
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING, 513);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING, 513);
    $status = 'user';

    $sql = "INSERT INTO users (name, email, status) VALUES ('$nome', '$email', '$status')";
    mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM</title>
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/adm.css">
</head>
<body>
    <form class="editUser" action="" method="POST">
        <h2>Insira os dados</h2>
        <input type="nome" name="nome" placeholder="Nome">
        <input type="email" name="email" placeholder="E-mail">
        <input type="submit" name="submit" value="Inserir novo usuário">
        <a href="../users">Cancelar</a>
    </form>
</body>
</html>