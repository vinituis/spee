<?php

$rotaAtual = $_SERVER['REQUEST_URI'];

include '../mod/config.php';

// tabela de ususarios - inicio

if($rotaAtual == '/spee/admin/users') {
    
?>

<div class="table">
    <table>
        <tr class="topo">
            <td>E-mail</td>
            <td>Ação</td>
        </tr>

        <?php
        $sql = 'SELECT * FROM users';
        if($res=mysqli_query($conn, $sql)){
            $id = array();
            $nome = array();
            $email = array();
            $i = 0;
            while ($reg = mysqli_fetch_assoc($res)) {
                $id[$i] = $reg['id'];
                $nome[$i] = $reg['name']; 
                $email[$i] = $reg['email']; 
        ?>
        <tr>
            <td><?php echo $email[$i]; ?></td>
            <td><a href="./mod/edita_user.php?id=<?php echo $id[$i]; ?>">Editar</a></td>
        </tr>
        <?php }} ?>
    </table>
</div>

<?php } // tabela de ususarios - fim

// tabela de acessos - inicio

if($rotaAtual == '/spee/admin/acessos') {

?>

<div class="table">
    <table>
        <tr class="topo">
            <td>Nome</td>
            <td>E-mail</td>
            <td>Data</td>
        </tr>

        <?php
        $sql = 'SELECT * FROM acessos';
        if($res=mysqli_query($conn, $sql)){
            $id = array();
            $nome = array();
            $email = array();
            $date = array();
            $i = 0;
            while ($reg = mysqli_fetch_assoc($res)) {
                $id[$i] = $reg['id'];
                $nome[$i] = $reg['name']; 
                $email[$i] = $reg['email']; 
                $date[$i] = $reg['date']; 
        ?>
        <tr>
            <td><?php echo $nome[$i]; ?></td>
            <td><?php echo $email[$i]; ?></td>
            <td><?php echo $date[$i]; ?></td>
        </tr>
        <?php }} ?>
    </table>
</div>

<?php }  // tabela de acessos - fim ?>