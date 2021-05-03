<?php
session_start();
include 'conexao.php';
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$senhaa = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$senha = MD5($senhaa);

$sth = $pdo->prepare('SELECT * FROM tbl_login where lo_email = :lo_email  and lo_senha = :lo_senha');
$sth->bindValue(':lo_email', $email);
$sth->bindValue(':lo_senha', $senha);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

if($sth->rowCount() > 0){
   
    $_SESSION["teste"]["email"] = $email;
    $_SESSION["teste"]["senha"] = $senha;
    $_SESSION["teste"]["id"] = $lo_codigo;
	 header("Location: produtos.php");
       
} else {
    header("Location: index.php");
};
   
?>