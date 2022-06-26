<?php

spl_autoload_register(function($nomeClasse){
    // echo $nomeClasse . PHP_EOL;
    $prefixo = "App\\";
    $diretorio = __DIR__ .  DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    $tamanhoPrefixo = strlen($prefixo);
    if (strncmp($prefixo, $nomeClasse, $tamanhoPrefixo)!=0) return;
    $arquivo=$diretorio . str_replace('\\',DIRECTORY_SEPARATOR,substr($nomeClasse,$tamanhoPrefixo)) . '.php';
    if(file_exists($arquivo)) require $arquivo;
    // echo $arquivo . PHP_EOL;

});