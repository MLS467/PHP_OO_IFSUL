<?php
require_once('Db.php');
require_once('Validacao.php');


class Login extends Db
{
    private ?Validacao $validar = null;

    public function __construct(private $email, private $senhaCript, private $senha, private $nomeTabela = 'pessoa')
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->senhaCript = $senhaCript;
        $this->validar = new Validacao();
    }


    public function selecionarLogin()
    {
        if ($this->getValidar()->validarLogin($this->getEmail(), $this->getSenha())) {
            $sql = "SELECT * FROM $this->nomeTabela WHERE email = ? AND senha = ?";
            $query = self::preparar($sql);
            $query->execute(array($this->getEmail(), $this->getSenhaCript()));
            $res = $query->fetch(PDO::FETCH_ASSOC);
            if (!$res)
                return false;
            return $res;
        } else {
            return false;
        }
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getSenhaCript(): ?string
    {
        return $this->senhaCript;
    }


    public function setSenhaCript(?string $senhaCript): void
    {
        $this->senhaCript = $senhaCript;
    }


    public function getSenha(): ?string
    {
        return $this->senha;
    }


    public function setSenha(?string $senha): void
    {
        $this->senha = $senha;
    }


    public function getNomeTabela(): string
    {
        return $this->nomeTabela;
    }


    public function setNomeTabela(string $nomeTabela): void
    {
        $this->nomeTabela = $nomeTabela;
    }

    public function getValidar()
    {
        return $this->validar;
    }

    public function setValidar($validar): void
    {
        $this->validar = $validar;
    }
}