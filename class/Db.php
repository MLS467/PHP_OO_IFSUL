<?php
require_once('config.php');

class Db
{

    private  static $pdo = null;

    public  static function conectar()
    {
        if (isset(self::$pdo)) {
            return self::$pdo;
        } else {
            try {
                self::$pdo = new PDO("mysql:host=" . SERVER . ";dbname=" . BANCO, USER, PASSWORD);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                // echo "Conectado com sucesso";
                return self::$pdo;
            } catch (PDOException $e) {
                echo "Não foi possível conectar" . $e->getMessage();
            }
        }
    }


    public static function preparar($sql)
    {
        return self::conectar()->prepare($sql);
    }
}