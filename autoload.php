<?php
function autoload($nomeArquivo)
{
    $path = __DIR__ . "/class/" . $nomeArquivo . ".php";
    if (is_file($path))
        require_once $path;
}


spl_autoload_register('autoload');