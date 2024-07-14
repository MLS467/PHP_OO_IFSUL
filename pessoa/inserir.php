<?php
if (isset($_POST['enviar'])) {
    require_once('../class/config.php');
    require_once('../autoload.php');

    $nomeImg =  $_FILES['picture']['name'];
    $tmp = $_FILES['picture']['tmp_name'];
    $path = "../img/";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $senha = $_POST['senha'];
    $senha_cript = sha1($_POST['senha']);

    $validar = new Validacao();

    if ($validar->ValidaArq($_FILES['picture']['name'], $_FILES['picture']['size'])) {

        move_uploaded_file($tmp, $path . $nomeImg);

        $pessoa = new Pessoa($nome, $email, $data, $senha_cript, $nomeImg);

        if ($pessoa->inserirDados()) {
            echo "INSERÇÃO REALIZADA COM SUSSESSO!";
        } else {
            echo "HOUVE UM PROBLEMA PARA ARMAZENAR OS DADOS!";
        }
    }
}
?>
<br><br><br>
<a href="cadastrar_usuario.php">Voltar</a><br>