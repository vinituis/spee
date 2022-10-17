<?php

session_start();

if(isset($_POST)){
    include './config.php';

    if((include './config.php') == TRUE){

        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING, 513);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING, 513);

        $select = " SELECT * FROM users WHERE email = '$email' ";

        $result = mysqli_query($conn, $select);

        date_default_timezone_set('America/Belem');
        $hora = date('H:i');
        $data = date('d/m/Y');
        $date = $data.' | '.$hora;

        if(mysqli_num_rows($result) >= 1) {
            echo 'OK';
            $row = mysqli_fetch_row($result);
            var_dump($row);
            $_SESSION['logado'] = 'true';
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['status'] = $row[3];

            if(isset($_SESSION['mod'])){
                $categoria = $_SESSION['mod'];
                if($categoria == 'jorn'){
                    $categoria = 'jornalista';
                }
            }else{
                $categoria = 'user';
            }


            if($row[3] == 'master') {
                $sucesso = 'sim';
                $logado = "INSERT INTO acessos (name, email, date, sucesso, categoria) VALUES ('$nome', '$email', '$date', '$sucesso', '$categoria')";
                mysqli_query($conn, $logado);

                header('location: ../admin/home');
            }elseif($row[3] == 'adm'){
                $sucesso = 'sim';
                $logado = "INSERT INTO acessos (name, email, date, sucesso, categoria) VALUES ('$nome', '$email', '$date', '$sucesso', '$categoria')";
                mysqli_query($conn, $logado);

                header('location: ../admin/home');
            }elseif($row[3] == 'user'){
                $sucesso = 'sim';
                $logado = "INSERT INTO acessos (name, email, date, sucesso, categoria) VALUES ('$nome', '$email', '$date', '$sucesso', '$categoria')";
                mysqli_query($conn, $logado);

                header('location: ../acesso/assistir');
            }elseif($row[3] == 'block'){
                $sucesso = 'não';
                $logado = "INSERT INTO acessos (name, email, date, sucesso, categoria) VALUES ('$nome', '$email', '$date', '$sucesso', '$categoria')";
                mysqli_query($conn, $logado);

                unset($_SESSION['logado']);
                $_SESSION['erro'] = 'Você está bloqueado';

                var_dump($logado);
                header('location: ../');
            }
            
            
        }else{
            if(isset($_SESSION['mod'])){
                $categoria = $_SESSION['mod'];
                if($categoria == 'jorn'){
                    $_SESSION['logado'] = 'true';
                    $_SESSION['nome'] = $_POST['nome'];
                    
                    $categoria = 'jornalista';
                    $sucesso = 'sim';

                    $sql = "INSERT INTO users (name, email) VALUES ('$nome', '$email')";
                    mysqli_query($conn, $sql);

                    $logado = "INSERT INTO acessos (name, email, date, sucesso, categoria) VALUES ('$nome', '$email', '$date', '$sucesso', '$categoria')";
                    mysqli_query($conn, $logado);
                    
                    header('location: ../acesso/assistir');
                }
            }else{
            echo 'Ops!';
            $_SESSION['erro'] = 'Não identificamos você';
            header('location: ../');
            }
        }
    }
}

?>