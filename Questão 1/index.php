<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
</head>
<body>
    <h1>Livros</h1>
    <form action="add_book.php" method="post">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="number" name="ano" placeholder="Ano de Publicação" required>
        <button type="submit">Adicionar Livro</button>
    </form>
    <h2>Lista de Livros</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Título</th><th>Autor</th><th>Ano</th><th>Ações</th>
        </tr>
        <?php
        require 'database.php';
        $result = $db->query("SELECT * FROM livros");
        foreach($result as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$row['autor']}</td>
                    <td>{$row['ano']}</td>
                    <td><a href='delete_book.php?id={$row['id']}'>Excluir</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
