<?php
require_once('../autoload.php');
require_once('../class/config.php');

if (isset($_POST['enviar'])) {

    $nome = $_POST['nome'];
    $desc = $_POST['desc'];
    $valor = $_POST['valor'];
    $img = $_FILES['pic_prod']['name'];
    $tmp = $_FILES['pic_prod']['tmp_name'];

    $validar = new Validacao();

    if ($validar->ValidaArq($img, $_FILES['pic_prod']['size'])) {
        move_uploaded_file($tmp, "../img/" . $img);

        $produto = new Produto($nome, $desc, $img, $valor);

        if ($produto->inserirDados()) {
            echo 'Dados inseridos com sussesso!';
        } else {
            echo 'Preencha todos os campos e confira os dados solicitados';
        }
    } else {
        echo "Preencha todos os campos!";
    }
}
?>
<br><br><a href='./Listagem_prod.php'>Voltar</a><br><br>
<a href="./pessoa/sair.php">SAIR</a>