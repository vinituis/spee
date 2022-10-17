<?php

session_start();

$erro = '';

if(isset($_GET['mod'])){
    if($_GET['mod'] == 'jorn'){
        $_SESSION['mod'] = $_GET['mod'];
    }else{
        $_SESSION['mod'] = 'user';
    }
    
    
}

if(isset($_SESSION['erro'])){
    $erro = '<span class="erro">'.$_SESSION['erro'].'</span>';
    unset($_SESSION['erro']);
}

if(isset($_SESSION['logado'])){
    header('location: ./acesso/assistir');
}else{
    unset($_SESSION['logado']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse a plataforma</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/login.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="./images/favicon.png">

</head>
<body>
    
    <form action="./mod/valida.php" method="post">
        <img src="./images/logo.png" alt="">
        <h2>Acesse a transmissão</h2>
        <?php echo $erro; ?>
        <input type="text" name="nome" placeholder="Insira seu nome" required>
        <input type="email" name="email" placeholder="Insira seu e-mail" required>
        <input type="submit" name="submit" value="Acessar">
    </form>
    <div class="container">
        <?php include './mod/partner.php'; ?>
    </div>

</body>
</html>