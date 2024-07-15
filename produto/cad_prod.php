<?php
require_once('../class/config.php');
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
    <link rel="stylesheet" href="../css/cadastro-produto.css">
    <title>Cadastrar produto</title>
</head>

<body>
    <div class="container">
        <form action="inserir_prod.php" enctype="multipart/form-data" method="POST" class="form-container">
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>

            <div class="form-group">
                <label for="desc">Descrição do Produto:</label>
                <input type="text" name="desc" id="desc" class="form-control">
            </div>

            <div class="form-group">
                <label for="pic_prod">Upload de Imagens:</label>
                <input type="file" name="pic_prod" id="pic_prod" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="valor">Valor do Produto:</label>
                <input type="number" name="valor" id="valor" step="0.01" min="0" class="form-control">
            </div>

            <div class="form-group d-flex justify-content-between">
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
        <a href="Listagem_prod.php" class="link-back d-block text-center mt-4">Voltar</a>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>