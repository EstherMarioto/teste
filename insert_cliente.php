<?php
include 'conexao.php';

$lo_codigo= filter_input(INPUT_POST, 'lo_codigo', FILTER_DEFAULT);
$lo_email= filter_input(INPUT_POST, 'lo_email', FILTER_DEFAULT);
$cli_nome= filter_input(INPUT_POST, 'cli_nome', FILTER_DEFAULT);
$cli_cpf= filter_input(INPUT_POST, 'cli_cpf', FILTER_DEFAULT);
$cli_telefone= filter_input(INPUT_POST, 'cli_telefone', FILTER_DEFAULT);
$end_rua= filter_input(INPUT_POST, 'end_rua', FILTER_DEFAULT);
$end_numero= filter_input(INPUT_POST, 'end_numero', FILTER_DEFAULT);
$end_bairro= filter_input(INPUT_POST, 'end_bairro', FILTER_DEFAULT);
$end_cidade= filter_input(INPUT_POST, 'end_cidade', FILTER_DEFAULT);
$end_uf= filter_input(INPUT_POST, 'end_uf', FILTER_DEFAULT);
$end_cep= filter_input(INPUT_POST, 'end_cep', FILTER_DEFAULT);

$sth = $pdo -> prepare("INSERT INTO tbl_cliente (cli_nome,cli_cpf,cli_email,cli_telefone,cli_login) VALUES (:cli_nome,:cli_cpf,:cli_email,:cli_telefone,:cli_login)");
     
	$sth->bindValue(':cli_nome', $cli_nome);
    $sth->bindValue(':cli_cpf',$cli_cpf);
	$sth->bindValue(':cli_email',$lo_email);
	$sth->bindValue(':cli_telefone',$cli_telefone);
	$sth->bindValue(':cli_login',$lo_codigo);
	
    $sth->execute();

    echo $cli_codigo = $pdo ->lastInsertId();

   header("Location:insert_endereco.php?lo_codigo=$lo_codigo&&cli_codigo=$cli_codigo&&end_rua=$end_rua&&end_numero=$end_numero&&end_bairro=$end_bairro&&end_cidade=$end_cidade&&end_uf=$end_uf&&end_cep=$end_cep");
?>