<?php
namespace App\Alura;

class Contato{
    private string $email;

    public function __construct(string $email)
    {
        $this->email=$email;
        
    }
    
    public function getNomeUsuario():string{
        $posicaoArroba= strpos($this->email, "@");
        if($posicaoArroba===false) return "Usuário Inválido";
        return substr($this->email,0,$posicaoArroba);
    }
}