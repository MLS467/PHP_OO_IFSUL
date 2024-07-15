<?php
require_once('class/config.php');
require_once('autoload.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div id="caixa" class="container">
        <div class="text-center mb-4">
            <h1><strong>Login</strong></h1>
        </div>
        <form class="border shadow p-4 bg-body-tertiary rounded" action="pessoa/valida_login.php" method="POST">
            <div class="mb-3 row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <?php if (isset($_SESSION['erro2']) && $_SESSION['erro2'] == 'ok') { ?>
                    <input type="email" class="form-control border-danger" name="email" id="inputEmail3">
                    <?php } else { ?>
                    <input type="email" class="form-control border-dark" name="email" id="inputEmail3">
                    <?php } ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-10">
                    <?php if (isset($_SESSION['erro2']) && $_SESSION['erro2'] == 'ok') { ?>
                    <input type="password" name="senha" class="form-control border-danger" id="inputPassword3">
                    <?php } else { ?>
                    <input type="password" name="senha" class="form-control border-dark" id="inputPassword3">
                    <?php } ?>
                </div>
            </div>
            <div class="text-center mb-3">
                <button type="submit" name="Login" class="btn btn-dark px-4">Entrar</button>
                <button type="reset" class="btn btn-dark px-4">Limpar</button>
            </div>
        </form>
        <div id="erroDiv" class="text-center mt-3">
            <?php if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                session_unset();
            } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>