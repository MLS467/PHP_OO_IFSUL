<?php
require_once('../autoload.php');
require_once('../class/config.php');

$path = "../img/";
if (!empty($_FILES['img']['name'])) {
    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_tam = $_FILES['img']['size'];
} else {
    $img = "imgPadrao/fotoPadrao.png";
    $img_tmp = '';
    $img_tam = "2";
}


$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$data = $_POST['data'];
$senha = $_POST['senha'];

if (isset($_POST['excluir'])) {
    $pessoa = new Pessoa();
    if ($pessoa->deletarUmRegistro($id)) {
        echo "EXCLUSÃO REALIZADA COM SUSSESSO!";
    }
} else {
    if (isset($_POST['editar'])) {
        $validar = new Validacao();

        if ($validar->ValidaArq($img, $img_tam)) {
            move_uploaded_file($img_tmp, $path . $img);
        }

        $senha_cript = sha1($senha);


        $pessoa = new Pessoa($nome, $email, $data, $senha, $img);

        if ($pessoa->atualizarDados($id)) {
            echo "EDIÇÃO REALIZADA COM SUSSESSO!";
        }
    }
}

?>
<br><br><br>
<a href="../produto/listagem_prod.php">Voltar</a><br>