<!DOCTYPE html>
<html>
<?php
	include 'conexao.php';
?>

  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro de Produto</title>
  </head>

  <body>
 
    <div class="box" >
		<br/>
		<div class="container" >
			<h2 class="text-center"><i> Cadastrar </i></h2>
			<br/>
			<div class="row">
				<div class="col s2 m12 offset-m1 center">
				
					<form name="form" action="insert_produto.php" method="post" enctype = "multipart/form-data">
						<div class="form-row">					
							<div class="form-group col-md-6">
								<label><b> Nome </b></label>
								<input type="text" class="form-control" name="pro_nome" placeholder="Nome do produto" required="" />
							</div>
        
							<div class="form-group col-md-3">
								<label><b> Preço</b></label>
								<input type="text" class="form-control" name="pro_preco" placeholder="Preço"required="" />
							</div>  
							<div class="form-group col-md-3">
								<label><b> Peso</b></label>
								<input type="text" class="form-control" name="pro_peso" placeholder="Peso" required=""/>
							</div>  							
						</div> 
						
							<div class="form-group col-md-12">
								<label for="exampleFormControlTextreal"> Descrição</label>
								<textarea class="form-control" name="pro_descricao" placeholder="Assunto" rows="3" required=""></textarea>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label><b > Imagem </b></label>
									<span ><input type="file" name="pro_imagem" id="imagem" required="">
								</div>
						
							<div class="form-group col-md-4">
								<label><b> Estoque </b></label>  
								<input name="pro_estoque"  class="form-control input-md" required="" type="text" "/>
						</div>               
						
							<div class="form-group col-md-4">
								<label><b >Status</b></label>
								<select name="pro_status" class="form-control" required="">
                                        <?php
                                        $sth = $pdo ->prepare('select * from tbl_status_produto');
                                        $sth->execute(); 
                                        foreach ($sth as $res){ 
                                            extract($res);
                                            echo'<option value="'. $sta_pro_codigo .'">' . $sta_pro_nome . '</option>'; 
                                        }  
                                        ?>
                                    </select>  
							</div>              
						</div>
						<div class="form-group col-md-2">
						<br/>
							<button type="button-submit" class="btn btn-outline-black">Enviar</button>
						</div>        
					</form>
				</div> 
			</div> <!-- row -->
		</div> <!-- container -->
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>