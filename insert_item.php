<?php
session_start();
include 'conexao.php';

 $pro_codigo= filter_input(INPUT_POST, 'pro_codigo', FILTER_DEFAULT);
 $pro_preco= filter_input(INPUT_POST, 'pro_preco', FILTER_DEFAULT);
$ite_quantidade= filter_input(INPUT_POST, 'ite_quantidade', FILTER_DEFAULT);
$total = $pro_preco*$ite_quantidade;

$sth = $pdo -> prepare("INSERT INTO tbl_item (ite_cod_produto,ite_quantidade,ite_total,ite_cliente) VALUES (:ite_cod_produto,:ite_quantidade,:ite_total,:ite_cliente)");
     
	$sth->bindValue(':ite_cod_produto', $pro_codigo);
    $sth->bindValue(':ite_quantidade',$ite_quantidade);
	$sth->bindValue(':ite_total',$total);
	$sth->bindValue(':ite_cliente',$_SESSION["teste"]["id"]);
    $sth->execute();

    echo $pdo ->lastInsertId();

  header("Location:formulario_pedido.php");

?>