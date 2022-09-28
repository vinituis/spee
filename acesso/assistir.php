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
</head>
<body>
    <div class="header">
        <img src="../images/logo.png" alt="Logo">
    </div>
    <h3 class="bemVindo">Bem vindo <span><?php echo $nome; ?></span>!</h3>
    <div class="transmissao">
        <iframe src="https://www.youtube.com/embed/NBQLCUJdV_w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe src="https://app.sli.do/event/w1rGqSqJ6dGRjT4LHZwf4U" height="100%" width="100%" frameBorder="0" style="min-height: 560px;" title="Slido"></iframe>
    </div>

    <div class="sair">
        <a href="../sair" class="sair">Parar de assistir</a>
    </div>

    <div class="footer">
        <p>Desenvolvido por <a href="https://www.linkedin.com/in/vinicius-fernandes-andrade/" target="_blank">Vinicius Fernandes</a></p>
    </div>
</body>
</html>