<?php

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require 'bibliotecas/PHPMailer/src/Exception.php';
require 'bibliotecas/PHPMailer/src/PHPMailer.php';
require 'bibliotecas/PHPMailer/src/SMTP.php';

function traduz_prioridade($prioridade)
{
    switch ($prioridade) {
        case 1:
            return 'baixa';
        case 2:
            return 'media';
        case 3:
            return 'alta';
        default:
            break;
    }
}

function traduz_data_para_banco($data)
{
    if ($data == '') {
        return '';
    }

    $dados = explode("/", $data);
    if(count($dados)!=3){
        return $data;
    }
    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    return $data_mysql;
}
function traduz_data_para_exibir($data)
{
    if ($data == "" or $data == "0000-00-00") {
        return "";
    }
    $dados = explode("-", $data);
    if(count($dados)!=3){
        return $data;
    }
    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    return $data_exibir;
}
function traduzir_concluida($concluida){
    if($concluida == 1) return 'Sim';
    return 'Não';
}
function tem_post(){
    if(count($_POST)>0){
        return true;
    }
    return false;
}
function validar_data($data){
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao,$data);

    if(!$resultado){
        return false;
    }
    $dados = explode('/',$data);

    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];
    $resultado = checkdate($mes,$dia,$ano);
    return $resultado;
}

function tratar_anexo($anexo){
    $padrao='/^.+(\.pdf|\.zip)$/';
    $resultado=preg_match($padrao, $anexo['name']);

    if(! $resultado): return false;endif;
    
    move_uploaded_file($anexo['tmp_name'],"anexos/{$anexo['name']}");
    return true;
}

function enviar_email($tarefa,$anexos=[]){
    // Acessar o sistema de e-mails
    // Fazer a autenticação dom usuário e senha
    // Usar a opção para escrever um email
    // Digitar o email do destinatario 
    // Digitar o assunto do email
    // Escrever o corpo do email
    // Adicionar os anexos quando necessario
    // Usar a opção de enviar o email

    //include "bibliotecas/PHPMailer/PHPMailerAutoload.php";
    

    $email = new PHPMailer();
    $email->isSMTP();
    $email->Host = "email-ssl.com.br";
    $email->Port=465;
    $email->SMTPSecure='ssl';
    $email->SMTPAuth=true;
    $email->Username="semigual@voxconexao.com.br";
    $email->Password = "Vox@321#";
    $email->setFrom("semigual@voxconexao.com.br","Avisador de Tarefas");
    $email->addAddress(EMAIL_NOTIFICACAO);
    $email->Subject="Aviso de tarefa> {$tarefa['nome']}";
    $email->CharSet="UTF-8";
    $corpo=preparar_corpo_email($tarefa,$anexos);
    $email->msgHTML($corpo);

    foreach($anexos as $anexo){
        $email->addAttachment("anexos/{$anexo['arquivo']}");
    }

    $email->send();

}

function preparar_corpo_email($tarefa, $anexos){
    // pegar o conteúdo processado do template_email.php
    ob_start(); // Informa PHP q não é para mandar processamento para o navegador
    include "template_email.php"; 
    $corpo=ob_get_contents(); // Guarda conteúdo do arquivo em variável
    ob_end_clean(); // Informa PHP q pode voltar a mandar conteúdos para navagador

    return $corpo;
}
