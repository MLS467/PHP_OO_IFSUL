 <?php
   require_once('../autoload.php');
   require_once('../class/config.php');

   $id = $_SESSION['id'];
   $pessoa = new Pessoa();
   $novaPessoa = $pessoa->selecionarUmRegistro($id);

   $prodCarrinho = new Carrinho($novaPessoa);

   $retornaJson = $prodCarrinho->mostrarItensCarrinho();
   $valorTotal = $prodCarrinho->somarValores();
   $qtdItens = $prodCarrinho->contagemDeItens();

   $resposta =  [
      'itens' => $retornaJson,
      'valorTotal' => $valorTotal,
      'qtdItens' => $qtdItens
   ];

   echo json_encode(['valores' => $resposta]);