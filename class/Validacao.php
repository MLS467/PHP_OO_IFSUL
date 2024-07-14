<?php

class Validacao
{

    public function ValidaArq($imgExt, $imgTam)
    {
        $controle = true;

        if ((!empty($imgExt)) && (!empty($imgTam))) {
            $tamanhoMax = "2e+6";
            if ($imgTam > $tamanhoMax) {
                $controle = false;
                echo "a img é muito grande.";
            }


            $extSet = [".jpg", ".jpeg", ".png"];
            $extensao = strrchr($imgExt, ".");
            if (!in_array($extensao, $extSet)) {
                $controle = false;
                echo "o tipo do aquivo não é aceito.";
            }
        } else {
            $controle = false;
            echo "INSIRA UMA IMAGEM!";
        }

        return $controle;
    }



    public function validaForm($nome, $email, $senha)
    {

        $controle = true;

        if ((!empty($nome)) and (!empty($email)) and (!empty($senha))) {

            if (!preg_match("/^[a-zA-Zá-ú ]+$/", $nome)) {
                echo "Digite apenas letras e espaços!";
                $controle = false;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email inválido!";
                $controle = false;
            }

            if (strlen($senha) < 4) {
                echo "Senha pequena, no mínimo 5 caracteres!";
                $controle = false;
            }

            return $controle;
        } else {
            echo "PREENCHA TODOS OS CAMPOS";
        }
    }

    public function validarLogin($email, $senha)
    {

        if (empty($email) or empty($senha)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (strlen($senha) < 6) {
            return false;
        }

        return true;
    }

    public function validarProd($nome, $descricao, $valor)
    {
        if (empty($nome) or empty($valor) or empty($descricao)) {
            return false;
        }

        if ($valor <= 0) {
            return false;
        }

        return true;
    }
}