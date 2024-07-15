<?php
require_once('../autoload.php');
require_once('../class/Produto.php');
if ($_POST) {

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
    $descricao = $_POST['desc'];
    $valor = $_POST['valor'];

    if (isset($_POST['editar'])) {

        $validar = new Validacao();
        if ($validar->ValidaArq($img, $img_tam)) {
            move_uploaded_file($img_tmp, $path . $img);
        }

        $produto = new Produto($nome, $descricao, $img, $valor);

        if ($produto->atualizarDados($id)) {
            header('location:Listagem_prod.php');
        }
    } else if (isset($_POST['excluir'])) {

        $produto = new Produto();

        if ($produto->deletarUmRegistro($id)) {
            echo "Excluído feita com sucesso!";
            header('location:Listagem_prod.php');
        }
    } else if (isset($_POST['addCarrinho'])) {
        $_SESSION['idProd'] = $_POST['id'];
        $_SESSION['quantidade'] = $_POST['quantidade'];
        header('location:../pessoa/config_carrinho.php');
    }
}

?>
<br><br><br>
<a href="Listagem_prod.php">Voltar</a>


<!-- // Caminho para o arquivo de imagem
$caminhoImagem = 'caminho/para/sua/imagem.jpg';

// Verifica se o arquivo existe antes de tentar apagar
if (file_exists($caminhoImagem)) {
    // Tenta apagar o arquivo
    if (unlink($caminhoImagem)) {
        echo "Imagem apagada com sucesso.";
    } else {
        echo "Erro ao tentar apagar a imagem.";
        }
        } else {
    echo "Imagem não encontrada.";
} -->