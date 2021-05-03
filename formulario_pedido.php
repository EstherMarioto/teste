<?php
session_start();
  include 'conexao.php';
  include 'header.php';

?>
 <html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Produto</title>
  </head>
    <body>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Código do Produto</th>
      <th scope="col">Produto</th>
      <th scope="col">Preço Unitário</th>
      <th scope="col">Quantidade</th>
	   <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
	<?php

		$sth = $pdo->prepare('select * from tbl_item i
		INNER JOIN tbl_produto p on i.ite_cod_produto = p.pro_codigo
		where i.ite_cliente = :ite_cliente');
		$sth->bindValue(':ite_cliente', $_SESSION["teste"]["id"]);
		$sth->execute();

		foreach ($sth as $res) :
		extract($res);
	?>
    <tr>
      <th scope="row"><?php echo $pro_codigo;	?></th>
      <td><?php echo $pro_nome;?></td>
      <td><?php echo $pro_preco;?></td>
      <td><?php echo $ite_quantidade;?></td>
	  <td><?php echo $ite_total;?></td>
    </tr>
   <?php
		endforeach;
	?> 
	
  </tbody>
</table>


	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>	