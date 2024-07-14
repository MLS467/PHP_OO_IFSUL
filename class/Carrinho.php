<?php
require_once('config.php');
require_once('Pessoa.php');
require_once('Produto.php');
require_once('Db.php');
require_once('Crud.php');

class Carrinho
{
    private ?string $nomeTabela = null;
    private ?array $pessoa = null;
    private ?int $id = null;

    public function __construct(array $pessoa)
    {
        $this->nomeTabela = 'carrinho';
        $this->pessoa = $pessoa;
        $this->setId($this->getPessoa()['id']);
    }

    public function AdicionarParaCarrinho(array $produto, int $qtd)
    {

        $sql = "INSERT INTO $this->nomeTabela VALUES (null,?,?,?,?,?,?,?)";
        $query = Db::preparar($sql);
        $query->execute(array($produto['nome'], $qtd, $produto['valor'], ($produto['valor'] * $qtd), $this->getPessoa()['nome'], $this->getPessoa()['id'], $produto['imagem']));

        if (!$query) {
            return false;
        }
    }

    public function deletarItemDoCarrinho($id)
    {
        $sql = "DELETE FROM $this->nomeTabela WHERE id = ?";
        $query = Db::preparar($sql);
        $query->execute(array($id));
        if (!$query)
            return false;

        return true;
    }


    public function mostrarItensCarrinho()
    {
        $sql = "SELECT 
            id,
            nome_prod,
            SUM(qtd_prod) as qtd_prod,
            valor_prod,
            nome_usuario,
            img_prod
        FROM 
            $this->nomeTabela
        WHERE 
            id_usuario = ?
        GROUP BY 
            nome_prod
        ORDER BY 
            nome_prod";

        $query = Db::preparar($sql);
        $query->execute(array($this->getId()));
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }


    public function somarValores()
    {
        $sql = "SELECT SUM(valor_total) as soma FROM $this->nomeTabela WHERE id_usuario=?";
        $query = Db::preparar($sql);
        $query->execute(array($this->getId()));
        $res = $query->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function contagemDeItens()
    {
        $sql = "SELECT SUM(qtd_prod) as contagem FROM $this->nomeTabela WHERE id_usuario=?";
        $query = Db::preparar($sql);
        $query->execute(array($this->getId()));
        $res = $query->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getNomeTabela(): ?string
    {
        return $this->nomeTabela;
    }


    public function setNomeTabela(?string $nomeTabela): void
    {
        $this->nomeTabela = $nomeTabela;
    }


    public function getPessoa(): ?array
    {
        return $this->pessoa;
    }


    public function setPessoa(?array $pessoa): void
    {
        $this->pessoa = $pessoa;
        $this->setId($this->getPessoa()['id']);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}