<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Editar-Admin.css">
    <title>Editar-Admin</title>
</head>

<body>
    <?php
    require_once('../autoload.php');
    require_once('../class/config.php');


    $email = $_SESSION['email'];
    $admin = new Pessoa();
    $dados = $admin->selecionarUmRegistroPorEmail($email);

    $imagem = $dados['imagem'];

    ?>


    <form action="edicao_exclusao.php" enctype="multipart/form-data" method="POST">
        <div class="form-container">
            <img src='<?php echo "../img/$imagem" ?>' alt="foto da pessoa">

            <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'] ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $dados['email'] ?>">

            <label for="data">Data:</label>
            <input type="date" name="data" id="data" value="<?php echo $dados['data_nasc'] ?>">

            <label for="senha">Senha:</label>
            <input type="text" name="senha" value="<?php echo $dados['senha'] ?>" id="senha" required>

            <div class="form-actions">
                <input type="file" name="img" id="img">
                <div class="form-actions">
                    <button type="submit" name="editar">Editar</button>
                    <button type="submit" name="excluir">Excluir</button>
                </div>
            </div>
        </div>
    </form>
    <a href="../produto/Listagem_prod.php" class="link-back d-block text-center mt-4">Voltar</a>

    <script s rc="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>