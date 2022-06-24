<?php

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
    // $ids é uma string '1-2-3'
    // $sistemas é um array de arrays

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
    
    return implode(' & ',$nome_sistemas);

}
