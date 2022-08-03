<?php

$gerenet = array(
    'uwbr' => [
        'servidor' => '177.85.235.186',
        'usuario' => 'voxvad',
        'senha' => 'Cs%#hOk9Pjo',
        'banco' => 'dados'
    ],
    'mgto' => [
        'servidor' => '177.85.235.190',
        'usuario' => 'voxvad',
        'senha' => 'Cs%#hOk9Pjo',
        'banco' => 'dados'
    ],
    'vca' => [
        'servidor' => '177.85.235.154',
        'usuario' => 'voxad',
        'senha' => 'd@UOPZ&EGwFK',
        'banco' => 'dados'
    ]
);
$conexao = mysqli_connect(
    $gerenet['uwbr']['servidor'],
    $gerenet['uwbr']['usuario'],
    $gerenet['uwbr']['senha'],
    $gerenet['uwbr']['banco']
);

if (mysqli_connect_errno()) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}

// echo "Bancos Conectados";

function buscarEmail($conexao)
{
    $sql = "
    SELECT 
	    CONTRA as 'Codigo Cliente', 
	    EMAIL, 
	    EMAIL_FIN	
    FROM 
	    tva0900
    ";
    $resultado  = mysqli_query($conexao, $sql);
    return mysqli_fetch_all($resultado);
}
$clientes = buscarEmail($conexao);

$cliente_2oumenos = array();
foreach ($clientes as $cliente) {
    // echo "Codigo cliente: ". array_shift($cliente) ."<br>";
    // echo "Email: " . $cliente[1] . '<br>';
    $cod_cliente = $cliente[0];
    $emails_cliente[] = explode(';', $cliente[1]);
    $emails_cliente[] = explode(';', $cliente[2]);

    foreach ($emails_cliente as $email) {
            $x = explode('@', $email[0]);
            // var_dump( $x);
            if (strlen($x[0]) < 3) {      
                echo "Cod.Cliente: " . $cod_cliente;
                echo " Email: " . $email[0] . '<br>';
            }
    
    }
    // var_dump($cliente_2oumenos);

    // var_dump($emails_cliente);





}
