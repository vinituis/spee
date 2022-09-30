<div class="header">
    <a href="./home">Página Inicial</a>
    <a href="./users">Usuários</a>
<?php
    if(isset($_SESSION['status'])){

        if($_SESSION['status'] == 'master'){
            echo '<a href="./acessos">Acessos</a>';
        }
    }
?>
    <a href="../sair.php">Sair</a>
</div>