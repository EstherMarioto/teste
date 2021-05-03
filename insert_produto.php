<?php

include 'conexao.php';

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $Dados = array(
        'pro_nome' => $post['pro_nome'],
        'pro_preco' => $post['pro_preco'],
        'pro_peso' => $post['pro_peso'],
        'pro_descricao' => $post['pro_descricao'],
        'pro_estoque' => $post['pro_estoque'],
        'pro_status' => $post ['pro_status'],   
        
    );
    $Fields = implode(', ', array_keys($Dados));
    $Places = ':' . implode(', :', array_keys($Dados));
    $Tabela = 'tbl_produto';
    $Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

    $sth = $pdo->prepare($Create);
    $sth->execute($Dados);
    echo $pro_cod = $pdo ->lastInsertId();

     date_default_timezone_set("Brazil/East");
    $ext = strtolower(substr($_FILES['pro_imagem']['name'], -4)); 
    $name = strtolower(substr($_FILES['pro_imagem']['name'], 0, -4)); 
    $pro_imagem = $name . '' . date("YmdHis") . $ext; 
    $dir = 'img/';
    
    move_uploaded_file($_FILES['pro_imagem']['tmp_name'], $dir . $pro_imagem);
    
    header("Location:img.php?pro_cod=$pro_cod&&pro_imagem=$pro_imagem");
    
    
?>