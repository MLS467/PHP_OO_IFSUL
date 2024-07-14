<?php
require_once('Validacao.php');
require_once('Crud.php');

class Produto extends Crud
{
    private ?Validacao $validar = null;

    public function __construct(
        private ?string $nome = null,
        private ?string $descricao = null,
        private ?string $imagem = null,
        private ?float $valor = 0.0
    ) {
        $this->validar = new Validacao();
        $this->nomeTabela = 'produto';
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->valor = $valor;
    }

    public function inserirDados()
    {
        if ($this->validar->validarProd($this->getNome(), $this->getDescricao(), $this->getValor())) {

            $sql = "INSERT INTO $this->nomeTabela VALUES  (null,?,?,?,?)";
            $query = Db::preparar($sql);
            $query->execute(
                array(
                    $this->nome,
                    $this->descricao,
                    $this->imagem,
                    $this->valor
                )
            );

            if ($query) {
                return true;
            } else {
                return false;
            }
        } else
            return false;
    }

    public function atualizarDados($id)
    {
        if ($this->getValidar()->validarProd($this->getNome(), $this->getDescricao(), $this->getValor())) {

            $sql = "UPDATE $this->nomeTabela SET nome=?,descricao =?,imagem =?, valor=? WHERE id = ?";
            $query = Db::preparar($sql);
            $query->execute(array($this->getNome(), $this->getDescricao(), $this->getImagem(), $this->getValor(), $id));
            if ($query)
                return true;
            else
                return false;
        }
    }

    public function getNomeTabela()
    {
        return $this->nomeTabela;
    }

    public function setNomeTabela($nomeTabela)
    {
        $this->nomeTabela = $nomeTabela;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValidar()
    {
        return $this->validar;
    }

    public function setValidar(?Validacao $validar)
    {
        $this->validar = $validar;
    }
}