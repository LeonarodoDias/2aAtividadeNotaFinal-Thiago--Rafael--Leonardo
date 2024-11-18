<?php
$banco = new PDO('sqlite:tarefas.db');
$banco->exec("CREATE TABLE IF NOT EXISTS tarefas (
    id INTEGER PRIMARY KEY,
    descricao TEXT,
    data_vencimento TEXT,
    concluida INTEGER DEFAULT 0
)");
?>
