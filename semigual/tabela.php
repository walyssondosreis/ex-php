<?php
$titulo_pag='Vox: Lista de chamados';

include "header.php";
include "banco.php";
include "ajudantes.php";

?>

<body class="text-center">
    <main id="tabela_chamados" class="rounded-3 border border-2 form-control w-100 m-auto">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">#Ticket</th>
                    <th scope="col">Data/Hora</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Solicitação</th>
                    <th scope="col">Sistema(s)</th>
                    <th scope="col">Técnico</th>
                    <th scope="col">Chamado</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $chamados_tb=listar_chamados($conexao);
                foreach($chamados_tb as $chamado_tb):
                ?>
                    <tr>
                        <th scope="row"><?php echo $chamado_tb['id']?></th>
                        <td><?php echo traduzir_datah($chamado_tb['datah_ini'])?></td> 
                        <td><?php  echo traduzir_usuario($chamado_tb['usuario'],$usuarios)?></td>
                        <td><?php echo traduz_categoria($chamado_tb['categoria'],$categorias)?></td>
                        <td><?php  echo traduz_sistema($chamado_tb['sistemas'],$sistemas)?></td>
                        <td><?php  echo $chamado_tb['tecnico']?></td>
                        <td>
                            <a href="tabela.php"><img src="assets/picture/exibir.svg" width="30" height="30"></a>
                            <a href="tabela.php"><img src="assets/picture/editar.png" width="30" height="30"></a>
                            <a href="tabela.php"><img src="assets/picture/tranferir.png" width="30" height="30"></a>
                            <a href="tabela.php"><img src="assets/picture/arquivar.png" width="30" height="30"></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                <!--  -->
                <!--  -->

            </tbody>
        </table>
    </main>

</body>


</html>