<form method="POST">
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
    <fieldset>
        <legend> Nova tarefa</legend>
        <label>
            Tarefa:
            <?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['nome'] ?>
                </span>
            <?php endif ?>
            <input type="text" name="nome" value="<?php echo $tarefa['nome'] ?>">
        </label>
        <label>
            Descrição (Opcional):
            <textarea name="descricao" id="" cols="30" rows="5"><?php echo $tarefa['descricao']; ?></textarea>
        </label>
        <label>
            Prazo (Opcional):
            <?php if ($tem_erros && isset($erros_validacao['prazo'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['prazo'] ?>
                </span>
            <?php endif ?>
            <input type="text" name="prazo" value="<?php echo traduz_data_para_exibir($tarefa['prazo']) ?>">
        </label>
        <fieldset>
            <legend> Prioridades:</legend>
            <label>
                <input type="radio" name="prioridade" value="1" <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : '' ?>>
                baixa
                <input type="radio" name="prioridade" value="2" <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : '' ?>>
                Média
                <input type="radio" name="prioridade" value="3" <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : '' ?>>
                Alta
            </label>
        </fieldset>
        <label>
            Tarefa concluída:
            <input type="checkbox" name="concluida" value=0 <?php echo ($tarefa['concluida'] ? 'checked' : '') ?>>
        </label>
        <label for="">
            Lembrete por e-mail:
            <input type="checkbox" name="lembrete" value="1">
        </label>
        <input type="submit" value=<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar' ?>>
    </fieldset>
</form>