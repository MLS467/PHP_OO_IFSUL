<?php
session_start();
if ((!isset($_SESSION['email'])) || (!$_SESSION['logado'])) {
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cadastro-usuario.css">
    <title>crud</title>
</head>

<body>
    <form action="inserir.php" enctype="multipart/form-data" method="POST">
        <div class="form-container">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">

            <label for="email">Email:</label>
            <input type="text" name="email" id="email">

            <label for="data">Data de Nascimento:</label>
            <input type="date" name="data" id="data">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">

            <label for="picture">Upload de imagem:</label>
            <input type="file" name="picture" id="picture">

            <div class="form-actions">
                <button type="submit" id="btn" name="enviar">Enviar</button>
                <button type="reset">Reset</button>
            </div>
        </div>
    </form>
    <div>
        <a href="../produto/listagem_prod.php" class="link-back d-block text-center mt-4">Voltar</a>
    </div>
</body>

</html>