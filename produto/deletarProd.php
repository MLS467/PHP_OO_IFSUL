<?php
require_once('../autoload.php');
require_once('../class/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idUser = $_SESSION['id'];

    $pessoa = new Pessoa();
    $novaPessoa = $pessoa->selecionarUmRegistro($idUser);

    if ($novaPessoa) {

        $carrinho = new Carrinho($novaPessoa);

        if ($carrinho->deletarItemDoCarrinho($id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erro ao excluir o item']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Usuário não encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Usuário não autenticado']);
}