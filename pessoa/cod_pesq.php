<?php
require_once('../class/config.php');
require_once('../class/Pessoa.php');


$nome = $_POST['usuario'];


$pessoa = new Pessoa();
$res = $pessoa->selecionarParaPesquisa($nome);

foreach ($res as $dados) {
?>
<label for="res">Usuario :</label>
<input style="width:800px" id="res" type="text"
    value="<?php echo "NOME: " . $dados['nome'] . " | " . "DESCRICAO: " . $dados['email'] . " | " . "Email: " . $dados['email'] . " | " . "Data_Nascimento" . $dados['data_nasc'] ?> "><br><br><br>

<?php
};
?>