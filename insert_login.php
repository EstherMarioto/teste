<?php
session_start();
include 'conexao.php';

$lo_email= filter_input(INPUT_POST, 'lo_email', FILTER_DEFAULT);
$lo_senha= filter_input(INPUT_POST, 'lo_senha', FILTER_DEFAULT);
$confirma_senha= filter_input(INPUT_POST, 'confirma_senha', FILTER_DEFAULT);
if ($lo_senha == $confirma_senha) {

$sth = $pdo -> prepare("INSERT INTO tbl_login (lo_email,lo_senha) VALUES (:lo_email,:lo_senha)");
     
	$sth->bindValue(':lo_email', $lo_email);
    $sth->bindValue(':lo_senha',MD5($lo_senha));
    $sth->execute();

    echo $lo_codigo = $pdo ->lastInsertId();

   header("Location:formulario_cliente.php?lo_codigo=$lo_codigo&&lo_email=$lo_email");

}else {
    echo 'Erro, senhas não identicas';
}
?>