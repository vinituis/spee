<?php

session_start();

// verifico se existe um envio de dados post 
if(isset($_POST)){
    // insiro os dados para login no banco
    include './config.php';
    // se retornar verdadeiro
    if((include './config.php') == TRUE){
        // pego os dados do post
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING, 513);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING, 513);
        // verifico se existe o e-mail no banco
        $select = " SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $select);
        // defino a data
        date_default_timezone_set('America/Belem');
        $hora = date('H:i');
        $data = date('d/m/Y');
        $date = $data.' | '.$hora;
        // Se existir retono no banco
        if(mysqli_num_rows($result) >= 1) {

            $row = mysqli_fetch_row($result);
            var_dump($row);
            $_SESSION['logado'] = 'true';
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['status'] = $row[3];
            // se for jornalista ele ajusta o dado
            if(isset($_SESSION['mod'])){
                $categoria = $_SESSION['mod'];
                if($categoria == 'jorn'){
                    $categoria = 'jornalista';
                }
            }else{
                $categoria = 'user';
            }

            // dependendo da permissão cadastrada ele envia dados especificos para o banco
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
            // Se não existir resultado de e-mail cadastrado no banco e existir o dado de jornalista
            if(isset($_SESSION['mod'])){
                $categoria = $_SESSION['mod'];
                if($categoria == 'jorn'){
                    $_SESSION['logado'] = 'true';
                    $_SESSION['nome'] = $_POST['nome'];
                    
                    $categoria = 'jornalista';
                    $sucesso = 'sim';
                    // crio o usuário no banco
                    $sql = "INSERT INTO users (name, email) VALUES ('$nome', '$email')";
                    mysqli_query($conn, $sql);
                    // insiro o acesso
                    $logado = "INSERT INTO acessos (name, email, date, sucesso, categoria) VALUES ('$nome', '$email', '$date', '$sucesso', '$categoria')";
                    mysqli_query($conn, $logado);
                    // redireciono para a página de assistir
                    header('location: ../acesso/assistir');
                }
            }else{
                // Se não tiver dado de jornalista ele retorna o erro
                echo 'Ops!';
                $_SESSION['erro'] = 'Não identificamos você';
                header('location: ../');
            }
        }
    }
}

?>