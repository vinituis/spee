<?php 

session_start();

if(isset($_SESSION['status'])){
    $status = $_SESSION['status'];
}

if(!isset($status)) {
    header('location: ../');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/adm.css">
</head>
<body>

    <?php include './mod/nav.php'; ?>
    
    <a href="./mod/add_user.php" class="addUser">Adicionar usuário</a>

    <?php include './mod/tables.php'; ?>

</body>
</html>