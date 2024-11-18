<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 5px 0;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Sistema de Gerenciamento de Tarefas</h1>
    <form action="add_tarefa.php" method="post">
        <label for="descricao">Descrição da Tarefa:</label><br>
        <input type="text" name="descricao" id="descricao" required><br><br>
        <label for="data_vencimento">Data de Vencimento:</label><br>
        <input type="date" name="data_vencimento" id="data_vencimento" required><br><br>        
        <button type="submit">Adicionar Tarefa</button>
    </form>
    <h2>Tarefas Pendentes</h2>
    <ul>
        <?php
        require 'database.php';
        $resultado = $banco->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento");
        foreach ($resultado as $linha) {
            echo "<li>{$linha['descricao']} - " . date('d/m/Y', strtotime($linha['data_vencimento'])) . 
                 " <a href='update_tarefa.php?id={$linha['id']}'>Concluir</a> | 
                   <a href='delete_tarefa.php?id={$linha['id']}'>Excluir</a></li>";
        }
        ?>
    </ul>
    <h2>Tarefas Concluídas</h2>
    <ul>
        <?php
        $resultado = $banco->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY data_vencimento");
        foreach ($resultado as $linha) {
            echo "<li>{$linha['descricao']} - " . date('d/m/Y', strtotime($linha['data_vencimento'])) . "</li>";
        }
        ?>
    </ul>
</body>
</html>
