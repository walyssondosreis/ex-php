<?php

namespace App\Alura;

class Usuario{

    private string $nome;
    private string $sobrenome;

    public function __construct($nome)
    {
        $nomeToArray=explode(' ',$nome,2);
        $this->nome=$nomeToArray[0];
        $this->sobrenome=$nomeToArray[1];
        
    }
    public function getNome():string{
        return $this->nome;
    }
    public function getSobrenome():string{
        return $this->sobrenome;
    }
}