<?php
$db = new PDO('sqlite:livraria.db');
$db->exec("CREATE TABLE IF NOT EXISTS livros (
    id INTEGER PRIMARY KEY,
    titulo TEXT,
    autor TEXT,
    ano INTEGER
)");
?>
