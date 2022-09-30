<?php 

session_start();

if(isset($_SESSION['status'])){
    $status = $_SESSION['status'];
}

if(!isset($status)) {
    header('location: ../');
}

include '../mod/config.php';

$sql = 'SELECT * FROM users';
$result = mysqli_query($conn, $sql);

$sql2 = 'SELECT * FROM acessos';
$result2 = mysqli_query($conn, $sql2);

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

    <div class="dash">
        <h2>Bem vindo <?php echo $_SESSION['nome'] . '!'; ?></h2>
        <div class="item">
            <h3>Cadastros</h3>
            <p>
            <?php echo mysqli_num_rows($result); ?> Usuários
            </p>
        </div>

        <div class="item">
            <h3>Acessos</h3>
            <p>
            <?php echo mysqli_num_rows($result2); ?> Acessos
            </p>
        </div>
    </div>

</body>
</html>