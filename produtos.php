<?php
  include 'conexao.php';
  include 'header.php';
   
?>

 <html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Produtos</title>
  </head>
    
	<body>
    
		<div class ="container">
		<br/>
			<h3 class="text-center" > <i><b> Produtos </b></i></h3>
		</div>
		</br></br>

		<div class="container">
			<div class="row"> 
				<?php

					$sth = $pdo->prepare('select * from tbl_produto where pro_status = :pro_status');
					$sth->bindValue(':pro_status', 1);
					$sth->execute();

					foreach ($sth as $res) :
					extract($res);
				?>
				<a href="ver_produto.php?produto=<?= $pro_codigo; ?>">
					<div class="col-md-3">
						<div class="card" style="width: 14rem;">
							<img class="card-img-top" src="img/<?= $pro_imagem; ?>" alt="Foto do Produto"  width='200' height='200' >
							<div class="card-body">
								<h5 style="height: 30px;" ><?= $pro_nome; ?></h5>
							</div>
						</div>
					</div>
					
				</a>
				<?php
					endforeach;
				?> 

			</div>
      
		</div>

		<br/><br/>
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>