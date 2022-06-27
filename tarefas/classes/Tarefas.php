<?php

class Tarefas
{
    public $mysqli;
    public $tarefas = array();
    public $tarefa;

    public function __construct($novaMysqli)
    {
        $this->mysqli=$novaMysqli;
    }

    public function buscar_tarefas(): void
    {
        $sqlBusca = 'SELECT * FROM tarefas';
        $resultado = $this->mysqli->query($sqlBusca);

        $this->tarefas = array();

        while ($tarefa = mysqli_fetch_assoc($resultado)) {
            $this->tarefas[] = $tarefa;
        }
    }

    public function buscar_tarefa($id)
    {
        $sqlBusca = "SELECT * FROM tarefas WHERE id=" . $id;
        $resultado = $this->mysqli->query($sqlBusca);
        // $resultado = mysqli_query($this->conexao, $sqlBusca);
        $this->tarefa = mysqli_fetch_assoc($resultado);
    }

    public function gravar_tarefa($tarefa)
    {
        $sqlGravar = "
    INSERT INTO tarefas
    (nome,descricao,prioridade,prazo,concluida)
    VALUES (
        '{$tarefa['nome']}',
        '{$tarefa['descricao']}',
        '{$tarefa['prioridade']}',
        '{$tarefa['prazo']}',
        '{$tarefa['concluida']}'
    )
    ";
        //print_r($sqlGravar);exit();
        $this->mysqli->query($sqlGravar);
    }

    public function editar_tarefa($tarefa)
    {
        $sqlEditar = "
        UPDATE tarefas SET
            nome='{$tarefa['nome']}',
            descricao='{$tarefa['descricao']}',
            prioridade='{$tarefa['prioridade']}',
            prazo='{$tarefa['prazo']}',
            concluida='{$tarefa['concluida']}'
        WHERE id ={$tarefa['id']};
    ";
        //print_r($sqlEditar);exit();
        $this->mysqli->query($sqlEditar);
    }
}
