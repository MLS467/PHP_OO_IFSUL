<?php
require_once('../class/config.php');
require_once('../autoload.php');


if (isset($_POST['Login'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_cript = sha1($senha);

    if (!((empty($mail)) && (empty($senha)))) {

        $Login = new Login($email, $senha_cript, $senha);
        $user = $Login->selecionarLogin();
        if ($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['logado'] = true;
            $_SESSION['email'] = $email;
            header("location:../produto/Listagem_prod.php");
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger w-75 ms-3" role="alert">
            Login inválido, tente novamente!
          </div>>';
            $_SESSION['erro2'] = 'ok';
            header("location:../index.php");
        }
    } else {
        $_SESSION['erro2'] = 'ok';
        $_SESSION['msg'] = '<p class="erro">Preencha todos os campos!</p>';
        header("location:../index.php");
    }
}