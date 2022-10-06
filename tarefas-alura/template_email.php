<h1>Tarefas: <?php echo $tarefa['nome']?></h1>

<p>
    <strong>Concluída:</strong>
    <?php echo traduzir_concluida($tarefa['concluida']); ?>
</p>
<p>
    <strong>Descrição:</strong>
    <?php echo nl2br($tarefa['descricao']); ?>
</p>
<p>
    <strong>Prioridade:</strong>
    <?php echo traduz_prioridade($tarefa['prioridade']); ?>
</p>
<?php if(count($anexos) > 0) : ?>
    <p><strong>Atenção!</strong>Esta tarefa contém anexos!</p>
<?php endif ?>