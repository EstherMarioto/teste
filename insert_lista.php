<?php
session_start();
include 'conexao.php';


$sth = $pdo -> prepare("INSERT INTO tbl_lista (lis_pro_codigo,lis_cliente) VALUES (:lis_pro_codigo,:lis_cliente)");
     
	$sth->bindValue(':lis_pro_codigo', 1);
	$sth->bindValue(':lis_cliente',$_SESSION["teste"]["id"]);
    $sth->execute();

    echo $pdo ->lastInsertId();

  header("Location:lista_desejo.php");

?>