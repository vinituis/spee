<?php

include '../../mod/config.php';

$id = $_GET['id'];

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $sql = "UPDATE users SET email = '$email' WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('location: ../users');
}

$select = " SELECT * FROM users WHERE id = '$id' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) >= 1) {
    $row = mysqli_fetch_row($result);
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
        <h2>Edite o e-mail</h2>
        <input type="email" name="email" value="<?php echo $row[2]; ?>">
        <input type="submit" name="submit" value="Alterar">
    </form>
</body>
</html>
<?php } ?>