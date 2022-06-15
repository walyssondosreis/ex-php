<?php

$erro = false;
$lista_erros = array();

include "banco.php";

// Define fuso horario padrão para função de data e hora
date_default_timezone_set('America/Sao_Paulo');


$chamado = array();
//Verifica e ṕreenche objeto de $chamado
if (!empty($_POST)) {
    
    if (isset($_POST['usuario']) && strlen($_POST['usuario']>0)) {
        $chamado['usuario'] = $_POST['usuario'];
    } else {
       $erro=true;
       $lista_erros['usuario']='Usuário em branco';
    }
    if (isset($_POST['setor']) && strlen($_POST['setor']>0)) {
        $chamado['setor'] = $_POST['setor'];
    } else {
        $erro = true;
        $lista_erros['setor'] = 'Setor não selecionado.';
    }
    if (isset($_POST['categoria'])&& strlen($_POST['categoria']>0)) {
        $chamado['categoria'] = $_POST['categoria'];
    } else {
        $erro = true;
        $lista_erros['categoria'] = 'Tipo de solicitação não selecionado.';
    }
    if(isset($_POST['sistemas']) && count($_POST['sistemas'])>0){
        $chamado['sistemas']=implode('-',$_POST['sistemas']);
    } else {
        $chamado['sistemas']='';
    }
    if (isset($_POST['resumo']) && strlen($_POST['resumo']>0)) {
        $chamado['resumo'] = addslashes($_POST['resumo']);
    } else {
        $erro = true;
        $lista_erros['resumo'] = 'Problema não descrito.';
    }
    $chamado['datah_ini'] = date('Y-m-d H:i:s', time());
    if(!$erro){
        gravar_chamado($conexao,$chamado);
        header('Location: chamado.php');
        die();
    }
}


include "formulario.php";
