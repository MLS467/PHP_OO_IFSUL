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


    <title>crud</title>
</head>

<body>


    <form action="inserir.php" enctype="multipart/form-data" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">

        <label for="data">Data_Nascimento:</label>
        <input type="date" name="data" id="data">

        <label for="senha">Senha :</label>
        <input type="password" name="senha" id="senha">
        <br><br>
        <label for="picture">Upload de imagem </label><br><br>
        <input type="file" name="picture" id="picture"><br><br>

        <button type="submit" id="btn" name="enviar">Enviar</button>
        <button type="reset">reset</button>
    </form>
    <br><br>
    <a href="../produto/listagem_prod.php">Voltar</a><br>
</body>

</html>