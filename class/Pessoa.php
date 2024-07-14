<?php
require_once('Crud.php');
require_once('Validacao.php');

class Pessoa extends Crud
{
    private $nome  = null;
    private $email = null;
    private $data_nasc = null;
    private $senha = null;
    private $imagem = null;
    private ?Validacao $validar = null;


    public function __construct(string $nome = '', string $email = '', string $data_nasc = '', string $senha = '', string $imagem = '')
    {
        $this->nomeTabela = 'Pessoa';
        $this->nome = $nome;
        $this->email = $email;
        $this->data_nasc = $data_nasc;
        $this->senha = $senha;
        $this->imagem = $imagem;
        $this->validar = new Validacao();
    }

    function inserirDados()
    {
        if ($this->getValidar()->validaForm($this->getNome(), $this->getEmail(), $this->getSenha())) {

            $sql = "INSERT INTO $this->nomeTabela VALUES  (null,?,?,?,?,?)";
            $query = Db::preparar($sql);
            $query->execute(
                array(
                    $this->getNome(),
                    $this->getEmail(),
                    $this->getDataNasc(),
                    $this->getSenha(),
                    $this->getImagem(),
                )
            );

            if (!$query)
                return 0;
            return 1;
        } else {
            return 0;
        }
    }

    function atualizarDados($id)
    {
        if ($this->getValidar()->validaForm($this->getNome(), $this->getEmail(), $this->getSenha())) {
            $sql = "UPDATE $this->nomeTabela SET nome=?,email =?,data_nasc=?,senha = ?,imagem = ? WHERE id = ? ";
            $query = self::preparar($sql);
            $query->execute(
                [
                    $this->getNome(),
                    $this->getEmail(),
                    $this->getDataNasc(),
                    $this->getSenha(),
                    $this->getImagem(),
                    $id
                ]
            );

            if (!$query)
                return 0;
            return 1;
        } else {
            return 0;
        }
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDataNasc()
    {
        return $this->data_nasc;
    }

    public function setDataNasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
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