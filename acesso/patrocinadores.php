<?php

session_start();

$nome = '';

if(isset($_SESSION['logado'])){
    if(isset($_SESSION['nome'])){
        $nome = $_SESSION['nome'];
    }
}else{
    unset($_SESSION['logado']);
    header('location: ../');
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assista a transmissão</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/transmissao.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../images/favicon.png">

</head>
<body>
    <div class="header">
        <img src="../images/logo.png" alt="Logo">
        <a href="./assistir">Voltar</a>
    </div>
    <div class="container intern">
        <?php include '../mod/partner.php'; ?>
    </div>
    <div class="footer">
        <p>Desenvolvido por <a href="https://www.linkedin.com/in/vinicius-fernandes-andrade/" target="_blank">Vinicius Fernandes</a></p>
    </div>
</body>
</html>