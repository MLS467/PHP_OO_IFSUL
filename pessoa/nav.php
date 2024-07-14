<?php
session_start();

if ((!isset($_SESSION['email'])) or (!$_SESSION['logado'])) {
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listagemProd.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exercício</title>
</head>

<body>
    <div class="bd-example m-0 border-0 mb-5 p-5">
        <div class="container-fluid">
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="nav.php">Backend</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                        aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Opções</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="../pessoa/cadastrar_usuario.php">Cadastrar
                                        usuário</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../produto/cad_prod.php">Cadastrar produto</a>
                                </li>
                                <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link" href="Visualizar_Carrinho.php">Meu Carrinho</a>
                                </li>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="listagem.php">Listagem de usuário</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../produto/Listagem_prod.php">Listagem de produto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="editar_adm.php">Editar admin</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Terminar Sessão
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="nav-link text-center" href="sair.php"> Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex mt-3" action="cod_pesq.php" method="POST">
                                <input class="form-control me-2" name="usuario" type="search"
                                    placeholder="Pesquisar usuário" aria-label="Search">
                                <button class="btn btn-success" type="submit">Buscar</button>
                            </form>
                            <form class="d-flex mt-3" action="../produto/cod_pes_prod.php" method="POST">
                                <input class="form-control me-2" name="produto" type="search"
                                    placeholder="Pesquisar produto" aria-label="Search">
                                <button class="btn btn-success" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </div>
    <div class="ms-2">
        <a href="#" class="btn btn-dark" id="btnCarrinho">
            <img src="../icon/carrinho.png" alt="Meu carrinho" title="Meu carrinho" width="40" height="40">
        </a>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="../js/index.js" type="module"></script>
</body>

</html>