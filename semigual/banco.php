<?php

$usuarios = [
    ['userid'=>'floraf', 'nome'=> 'Flora Cristina', 'tipo'=>'irmao','setorid'=>1],
    ['userid'=>'keniad', 'nome'=>  'Kenia Danielle', 'tipo'=>'irmao','setorid'=>2],
    ['userid'=>'reinaldor', 'nome'=>  'Reinaldo Ruas', 'tipo'=>'irmao','setorid'=>4],
    ['userid'=>'sabrinam', 'nome'=> 'Sabrina Marques', 'tipo'=>'irmao','setorid'=>3],
    ['userid'=>'farleya', 'nome'=> 'Farley Almeida', 'tipo'=>'irmao','setorid'=>3],
    ['userid'=>'adriannen', 'nome'=> 'Adrianne Nunes', 'tipo'=>'irmao','setorid'=>1],
    ['userid'=>'bethyennem', 'nome'=> 'Bethyenne Machado', 'tipo'=>'irmao','setorid'=>5],
    ['userid'=>'jessicad', 'nome'=> 'Jessica Dias', 'tipo'=>'irmao','setorid'=>1],
    ['userid'=>'walyssonp','nome'=>'Walysson dos Reis', 'tipo'=>'baterista','setorid'=>7],
    ['userid'=>'wilsons','nome'=>'Wilson Soares', 'tipo'=>'baterista','setorid'=>7],
    ['userid'=>'charlesm','nome'=>'Charles Mendes', 'tipo'=>'baterista','setorid'=>7]
];
$usuario=$usuarios[8]; //Usuário selecionado

$setores = [
    ['id' => 1, 'nome' => 'Administrativo & Financeiro'],
    ['id' => 2, 'nome' => 'Central de Relacionamento'],
    ['id' => 3, 'nome' => 'Comercial & VAD'],
    ['id' => 4, 'nome' => 'RH & DP'],
    ['id' => 5, 'nome' => 'Almoxarifado & Compras'],
    ['id' => 6, 'nome' => 'Auditoria & Operacoes'],
    ['id' => 7, 'nome' => 'Tecnologia & Inovação'],
    ['id' => 8, 'nome' => 'Central de Gerência de Redes'],
];

$categorias = [
    ['id' => 1, 'nome' => 'Relatar problema ...','nome_tec'=>'Problema no(s) Sistema(s)'],
    ['id' => 2, 'nome' => 'Informação/Orientação ...','nome_tec'=>'Informação/Orientação'],
    ['id' => 3, 'nome' => 'Solicitação ...','nome_tec'=>'Direito(s) de Usuário(s)'],
    ['id' => 4, 'nome' => 'Outro (Descreva no campo de resumo)','nome_tec'=>'Outra Solicitação']
];
$sistemas = [
    ['id' => 1, 'nome' => "Gerenet \n UWBR"],
    ['id' => 2, 'nome' => "Gerenet \n VCA"],
    ['id' => 3, 'nome' => "Gerenet \n MGTO"],
    ['id' => 4, 'nome' => "Kentro \n Receptivo"],
    ['id' => 5, 'nome' => "Kentro \n Ativo"],
    ['id' => 6, 'nome' => "STRATWs \n ONE"],
    ['id' => 7, 'nome' => "PABX \n Ironvox"],
    ['id' => 8, 'nome' => "PABX \n Fastway"],
    ['id' => 9, 'nome' => "Site \n Vox"],
    ['id' => 10, 'nome' => "Sistema \n Vendas"],
    ['id' => 11, 'nome' => "Sistema \n Viabilidade"],
    ['id' => 12, 'nome' => "Sistema \n Elite(VES)"]
];

$db_hostname = "127.0.0.1";
$db_user ="root";
$db_pass ="root";
$db_name = "semigual";

$conexao = mysqli_connect($db_hostname,$db_user,$db_pass,$db_name);

if(!mysqli_errno($conexao)){
    //print_r('Conexão estabelecida com sucesso!');
}

function gravar_chamado($conexao,$chamado){
    $query_insert="
        INSERT INTO chamados( 
            usuario,
            setor,
            categoria,
            resumo,
            datah_ini,
            sistemas
        )
        VALUES(
            '{$chamado['usuario']}',
            '{$chamado['setor']}',
            '{$chamado['categoria']}',
            '{$chamado['resumo']}',
            '{$chamado['datah_ini']}',
            '{$chamado['sistemas']}'
        );

    ";
    mysqli_query($conexao,$query_insert);
}

function listar_chamados($conexao){
    $query_select="
    SELECT * FROM chamados ORDER BY -datah_ini;
    ";
    $resultado=mysqli_query($conexao,$query_select);
    $lista_chamados=array();

    while($chamado=mysqli_fetch_assoc($resultado)){
        $lista_chamados[]=$chamado;
    }
    return $lista_chamados;

}