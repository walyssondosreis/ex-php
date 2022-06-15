-- Cria tabela de tarefas
CREATE TABLE tarefas (
    id          INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome        VARCHAR(20) NOT NULL,
    descricao   TEXT,
    prazo       DATE,
    prioridade  INTEGER(1),
    concluida   BOOLEAN
);
CREATE TABLE anexos (
    id          INTEGER AUTO_INCREMENT PRIMARY KEY,
    tarefa_id   INTEGER NOT NULL,
    nome        VARCHAR(255) NOT NULL,
    arquivo     VARCHAR(255) NOT NULL
);
-- Insere na tabela 2 registros de tarefa
INSERT INTO tarefas(nome,descricao,prioridade)
VALUES  ('tarefa01','correr no parque', 2),
		('tarefa02','ir ao shopping',1),
        ('tarefa03','Fazer Karatê', 3),
		('tarefa04','Matar aula',2),
        ('tarefa05','Entregar Jornal', 3),
		('tarefa06','Matar bandido',1);

-- Busca tudo que há na tabela tarefas
SELECT * FROM tarefas

SELECT nome,descricao FROM tarefas WHERE prioridade=1;

--Busca todos os valores das colunas 'nome' e 'prioridade' da tabela 'tarefas'
SELECT nome,prioridade FROM tarefas

-- Busca correspondências onde na col 'descricao' há algo da palavra 'golf' em qq posição
SELECT id,nome,descricao FROM tarefas WHERE descricao LIKE '%golf%';

