<?php

session_start();

if(isset($_POST)){
    include './config.php';

    if((include './config.php') == TRUE){

        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING, 513);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING, 513);

        $select = " SELECT * FROM users WHERE email = '$email' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) >= 1) {
            echo 'OK';
            $row = mysqli_fetch_row($result);
            var_dump($row);
            $_SESSION['logado'] = 'true';
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['status'] = $row[3];

            if($row[3] == 'master') {
                echo 'ok master';                
                header('location: ../admin/home');
            }elseif($row[3] == 'adm'){
                echo 'ok adm';
                header('location: ../admin/home');
            }else{
                header('location: ../acesso/assistir');
            }
            
            
        }else{
            echo 'Ops!';
            $_SESSION['erro'] = 'Não identificamos você';
            header('location: ../');
        }
    }
}

?>