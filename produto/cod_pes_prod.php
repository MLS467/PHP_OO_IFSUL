<?php
require_once('../autoload.php');
require_once('../class/Produto.php');

$nome = $_POST['produto'];

$pesquisarProdutos = new Produto();
$res = $pesquisarProdutos->selecionarParaPesquisa($nome);

foreach ($res as $dados) {

?>

<label for="res">Produto :</label>
<input style="width:500px" id="res" type="text"
    value="<?php echo "NOME: " . $dados['nome'] . "  " . "DESCRICAO: " . $dados['descricao'] ?> "><br><br><br>

<?php
}
?>