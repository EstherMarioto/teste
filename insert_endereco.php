<?php
include 'conexao.php';
$end_rua= $_GET['end_rua'];
$end_numero= $_GET['end_numero'];
$end_bairro= $_GET['end_bairro'];
$end_cidade= $_GET['end_cidade'];
$end_uf= $_GET['end_uf'];
$end_cep= $_GET['end_cep'];
$cli_codigo= $_GET['cli_codigo'];
$lo_codigo= $_GET['lo_codigo'];

$sth = $pdo -> prepare("INSERT INTO tbl_endereco (end_rua,end_numero,end_bairro,end_cidade,end_uf,end_cep,end_cliente) VALUES (:end_rua,:end_numero,:end_bairro,:end_cidade,:end_uf,:end_cep,:end_cliente)");

$sth->bindValue(':end_rua', $end_rua);
$sth->bindValue(':end_numero',$end_numero);
$sth->bindValue(':end_bairro',$end_bairro);
$sth->bindValue(':end_cidade',$end_cidade);
$sth->bindValue(':end_uf',$end_uf);
$sth->bindValue(':end_cep',$end_cep);
$sth->bindValue(':end_cliente',$cli_codigo);

$sth->execute();

 echo $pdo ->lastInsertId();

 header("Location:index.php");