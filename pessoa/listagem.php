<?php
require_once('../class/config.php');
require_once('../autoload.php');

$pessoa = new Pessoa();
$res = $pessoa->selecionarTodosRegistros();
foreach ($res as $key => $dados) {
    $imagem = $dados['imagem'];
?>


<form action="edicao_exclusao.php" enctype="multipart/form-data" method="POST">
    <div
        style="width:40%;display:flex;justify-content:space-around;border:1px solid #ccc; border-radius:5px; padding:50px;flex-direction:column">

        <img style="width:100px; height:120px; margin-bottom: 3%;" src='<?php echo "../img/$imagem" ?>' alt=" foto da
            pessoa">

        <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'] ?>">

        <label for="email">email:</label>
        <input type="email" name="email" id="email" value="<?php echo $dados['email'] ?>">

        <label for="data">DATA:</label>
        <input type="data" name="data" id="data" value="<?php echo $dados['data_nasc'] ?>">

        <label for="senha">Senha :</label>
        <input type="text" name="senha" value="<?php echo $dados['senha'] ?>" id="senha" required>
        <div style="margin-top: 3%;"> <input type="file" name="img" id="img">

            <br><br><br>
            <button type="submit" name="editar">Editar</button>
            <button type="submit" name="excluir">Excluir</button>
        </div>
    </div>
</form>

<br><br><br>

<?php
}
?>
<br><br><br>
<a href="../produto/listagem_prod.php">Voltar</a><br>