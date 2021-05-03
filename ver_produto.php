<!DOCTYPE html>
<?php
  include 'conexao.php';
  include 'header.php';
  $pro_codigo= $_GET['produto'];
  
?>
 <html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Produto</title>
  </head>
    <body>
        <br/>
		<div class="col-lg-12">
            <div class="container">
                <br/><br/><br/>
				<center>
                    <?php  
						$sth = $pdo->prepare('select * from tbl_produto p 
						INNER JOIN tbl_status_produto s on p.pro_status = s.sta_pro_codigo
						where p.pro_codigo = :pro_codigo');
                        $sth->bindValue(':pro_codigo', $pro_codigo);

                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                                
                        echo "<img src='img/" . $pro_imagem. "' alt='Fotos' width='170' height='170' />";
                    ?>
					<br/>
					<h5><b><?php echo $pro_nome?></b></h5>
					<h6><b><?php echo $sta_pro_nome?></b></h6>
                </center>
				<br/>
				<center>
					<div class="row">
						<div class="col-lg-2">
							<h5><b>Preço:</b> </h5>
						</div>
						<div class="col-lg-2 ">
							<h5> 
								<?php echo $pro_preco ?> 
							</h5>
						</div>
						<div class="col-lg-2">
							<h5><b>Peso:</b> </h5>
						</div>
						<div class="col-lg-2 ">
							<h5> <?php echo $pro_peso ?> 
							</h5>
						</div>
						<div class="col-lg-2">
							<h5><b>Estoque:</b> </h5>
						</div>
						<div class="col-lg-2 ">
							<h5> <?php echo $pro_estoque ?> 
							</h5>
						</div>
					</div>
				</center>
				<center>
				<br/>
					<div class="col-lg-2">
						<h5><b>Descrição:</b> </h5>
					</div>
					<div class="col-lg-10 ">
						<h5> <?php echo $pro_descricao ?> 
						</h5>
					</div>
					<br/>
				</center>
				<center>
				<?php
				
				if ($pro_estoque > 0) {
					?>
				<a href="quantidade.php?pro_codigo=1&&pro_preco=22"><button class="btn btn-outline-black">Comprar</button></a>
				<?php }else{ ?>
					<button class="btn btn-outline-black"  disabled >Comprar</button>
				<?php }; ?>
				<a href="insert_lista.php??pro_codigo=1"><button class="btn btn-outline-black">Colocar na lista de desejo</button></a>
				</center>
            </div>				
        </div>
    </body>  
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>	