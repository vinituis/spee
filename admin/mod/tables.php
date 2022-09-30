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
            <td>Acesso</td>
            <td>Ação</td>
        </tr>

        <?php
        $sql = 'SELECT * FROM users';
        if($res=mysqli_query($conn, $sql)){
            $id = array();
            $nome = array();
            $email = array();
            $status = array();
            $i = 0;
            while ($reg = mysqli_fetch_assoc($res)) {
                $id[$i] = $reg['id'];
                $nome[$i] = $reg['name']; 
                $email[$i] = $reg['email']; 
                $status[$i] = $reg['status']; 
        ?>
        <tr>
            <td><?php echo $email[$i]; ?></td>
            <td><?php
                if($status[$i] == 'user'){
                    echo 'Liberado';
                }elseif($status[$i] == 'adm'){
                    echo 'Administrador';
                }elseif($status[$i] == 'master'){
                    echo 'Administrador master';
                }elseif($status[$i] == 'block'){
                    echo 'Bloqueado';
                }
                ?></td>
                
            <td>
                <?php 
                    if($status[$i] == 'master' || $status[$i] == 'adm'){

                    }else{
                ?>
                <a href="./mod/edita_user.php?id=<?php echo $id[$i]; ?>">Editar</a>
                <?php } ?>
            </td>
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
            <td>Acesso válido</td>
            <td>Data</td>
        </tr>

        <?php
        $sql = 'SELECT * FROM acessos';
        if($res=mysqli_query($conn, $sql)){
            $id = array();
            $nome = array();
            $email = array();
            $date = array();
            $sucesso = array();
            $i = 0;
            while ($reg = mysqli_fetch_assoc($res)) {
                $id[$i] = $reg['id'];
                $nome[$i] = $reg['name']; 
                $email[$i] = $reg['email']; 
                $date[$i] = $reg['date']; 
                $sucesso[$i] = $reg['sucesso']; 
        ?>
        <tr>
            <td><?php echo $nome[$i]; ?></td>
            <td><?php echo $email[$i]; ?></td>
            <td><?php echo $sucesso[$i]; ?></td>
            <td><?php echo $date[$i]; ?></td>
        </tr>
        <?php }} ?>
    </table>
</div>

<?php }  // tabela de acessos - fim ?>