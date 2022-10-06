<html>

<head>
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="tarefas.css">
</head>

<body>
    <main class="formulario">
        <h1>Gerenciador de Tarefas</h1>
        <?php include "formulario.php"; ?>
        <?php if($exibirtabela): ?>
            <?php include "tabela.php"; ?>
        <?php endif ?>
    </main>
</body>

</html>