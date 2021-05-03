<?php
include 'conexao.php';
 $pro_cod= $_GET['pro_cod'];
 $pro_imagem= $_GET['pro_imagem'];

$sth = $pdo->prepare("UPDATE tbl_produto SET pro_imagem = :pro_imagem where pro_codigo = :pro_cod");

$sth->bindValue(":pro_imagem", $pro_imagem);
$sth->bindValue(":pro_cod",$pro_cod);

$sth->execute();

header("LOCATION:formulario_produto.php");


?>