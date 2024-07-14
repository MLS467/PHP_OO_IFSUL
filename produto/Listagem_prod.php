<?php
require_once('../class/config.php');
require_once('../autoload.php');

if ((!isset($_SESSION['email'])) or (!$_SESSION['logado'])) {
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/listagemProd.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <!-- inicio -->
    <div class="bd-example m-0 border-0 mb-0 p-5">
        <div class="container">
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="Listagem_prod.php">Backend</a>
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


                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../pessoa/listagem.php">Listagem de usuário</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Listagem_prod.php">Listagem de produto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../pessoa/editar_adm.php">Editar admin</a>
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
                                        <li><a class="nav-link text-center" href="../pessoa/sair.php"> Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex mt-3" action="cod_pesq.php" method="POST">
                                <input class="form-control me-2" name="usuario" type="search"
                                    placeholder="Pesquisar usuário" aria-label="Search">
                                <button class="btn btn-success" type="submit">Buscar</button>
                            </form>

                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </div>
    <!-- fim -->
    <div style="display: flex;justify-content:space-between;align-items:center;" class="container mb-4 ">
        <a href="#" class="btn btn-dark ms-4" id="btnCarrinho">
            <img src="../icon/carrinho.png" alt="Meu carrinho" title="Meu carrinho" width="32" height="32">
        </a>
        <form class="d-flex align:items-center" action="../produto/cod_pes_prod.php" method="POST">
            <input class="form-control me-2" name="produto" type="search" placeholder="Pesquisar produto"
                aria-label="Search">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </div>


    <div id="caixa" class="container-fluid w-100">
        <div class="row pai">
            <?php
            require_once('../class/config.php');
            require_once('../autoload.php');

            if ((!isset($_SESSION['email'])) or (!$_SESSION['logado'])) {
                header("location:Listagem_prod.php");
            }

            $produtos = new Produto();
            $res = $produtos->selecionarTodosRegistros();
            ?>

            <?php
            if (count($res) != 0) {


                foreach ($res as $key => $valores) {
                    $imagem = $valores['imagem'];
            ?>
            <div id="tamanhoCard" class="card mb-3">
                <div id="imgCard" class="row">
                    <div class="col-md-4">
                        <img src='<?php echo "../img/$imagem"; ?>' class="img-fluid rounded-start"
                            alt="foto do produto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $valores['nome']; ?></h5>
                            <p class="card-text"><?php echo $valores['descricao']; ?></p>
                            <p class="card-text"><small class="text-body-secondary">última Atualização
                                    <?php echo date("M d, Y, h:i s"); ?></small></p>

                            <form action="edicao_exclusao_prod.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $valores['id']; ?>">
                                <input type="hidden" name="imgVelha" value="<?php echo "img/$imagem"; ?>">

                                <div class="form-group mb-2">
                                    <label for="valor">Valor do Produto R$:</label>
                                    <input class="form-control" type="number" name="valor" id="valor" step="0.01"
                                        min="0" value="<?php echo $valores['valor']; ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="quantidade">Quantidade:</label>
                                    <input class="form-control" type="number" name="quantidade" id="quantidade" step="1"
                                        min="1" value="1">
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <button style="width:20%; height:20%" type="submit" class="btn btn-success"
                                        name="addCarrinho"><img src="../icon/carrinho.png" alt="Comprar"></button>
                                    <button type="submit" class="btn btn-warning" name="editar"><img
                                            style="width: 32px;" src="../icon/edit.png" alt="Editar"></button>
                                    <button type="submit" class="btn btn-danger" name="excluir"><img
                                            style="width: 32px;" src="../icon/delete.png" alt="delete"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <?php }
            } else { ?>

            <div id="semConteudo">
                <h1>Sem produtos disponíveis :( </h1>
            </div>

            <?php } ?>
        </div>
    </div>

    <script src="../js/index.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>