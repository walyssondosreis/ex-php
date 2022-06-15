<?php
function reduz_sistemas($sistemas){
    $novo_nome="";
    foreach($sistemas as $sistema){
        $nome=explode(' ',$sistema);
        if(!str_contains($novo_nome,$nome[0])){
            $novo_nome.="-";
            $novo_nome.= $nome[0];
            $novo_nome.= " ";
            $novo_nome.= $nome[1];
            $novo_nome.= "-";
        }
        else{
            $novo_nome.="-";
            $novo_nome.=$nome[1];
            $novo_nome.="-";
        }
        // if(in_array($nome[0],explode('',$novo_nome))){
        //     $novo_nome.=$nome[1];
        // }else{
        //     $novo_nome.=implode($nome)"-";
        // }
        
    }
    //rtrim($novo_nome,'-');
    //ltrim($novo_nome,'-');
    
    //print_r($novo_nome);die();
    return explode('-',$novo_nome);


}
function traduzir_datah($datah)
{
    $separaDH = explode(' ', $datah);
    $hora = $separaDH[1];
    $data = implode('/', array_reverse(explode('-', $separaDH[0])));

    return $data . ' ' . $hora;
}
function traduzir_usuario($username, $usuarios)
{
    foreach ($usuarios as $user) {
        if ($user['userid'] == $username) {
            return $user['nome'];
        }
    }
}
function traduz_categoria($id, $categorias)
{
    foreach ($categorias as $cat) {
        if ($cat['id'] == $id) : return $cat['nome_tec'];
        endif;
    }
}
function traduz_sistema($ids, $sistemas)
{
    $ids_vt = explode('-', $ids);
    $nome_sistemas = array();

    foreach ($ids_vt as $id) {
        $index = array_search($id, array_column($sistemas, 'id'));
        if ($index !==false) {
            $nome_sistemas[] = $sistemas[$index]['nome'];
        }else{
            return '(Não Definido)';
        }
    }
    $sis=reduz_sistemas($nome_sistemas);
    return implode(' & ',$sis);

}
