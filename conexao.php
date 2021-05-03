<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=teste_back;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage() . "</p>";
    die("Não foi possivel estabelecer a conexão com o banco de dados");
}
 