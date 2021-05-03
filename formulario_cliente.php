<!DOCTYPE html>
<html>
<?php
	include 'conexao.php';
	$lo_codigo= $_GET['lo_codigo'];
	$lo_email= $_GET['lo_email'];
?>

  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro de Cliente</title>
  </head>

  <body>
 
    <div class="box" >
		<br/>
		<div class="container" >
			<h2 class="text-center"><i> Cadastrar </i></h2>
			<br/>
			<div class="row">
				<div class="col s2 m12 offset-m1 center">
				
					<form name="form" action="insert_cliente.php" method="post">
						<input name="lo_codigo" type="hidden" value="<?= $lo_codigo; ?>">
						<input name="lo_email" type="hidden" value="<?= $lo_email; ?>">
						<div class="form-row">					
							<div class="form-group col-md-6">
								<label><b> Nome </b></label>
								<input type="text" class="form-control" name="cli_nome" placeholder="Nome completo" required="" />
							</div>
        
							<div class="form-group col-md-3">
								<label><b> CPF</b></label>
								<input type="text" class="form-control" name="cli_cpf" placeholder="CPF" required=""/>
							</div>  
							<div class="form-group col-md-3">
								<label><b> Telefone</b></label>
								<input type="text" class="form-control" name="cli_telefone" placeholder="Telefone" required=""/>
							</div>  							
						</div> 

						<div class="form-row">
							<div class="form-group col-md-6">
								<label><b>Rua</b></label>
								<input type="text" class="form-control" name="end_rua" required=""/>
							</div>

							<div class="form-group col-md-2">
								<label><b class=>N°</b></label>  
								<input name="end_numero"  class="form-control input-  Zmd" required="" type="text" "/>
							</div>
							<div class="form-group col-md-4">
								<label><b> Bairro </b></label>  
								<input name="end_bairro"  class="form-control input-md" required="" type="text" "/>
							</div>               
						</div>
                             
						<div class="form-row">
							<div class="form-group col-md-6">
								<label><b >Cidade</b></label>
								<input name="end_cidade" type="text" class="form-control" id="cidade" required="">    
							</div>              
							<div class="form-group col-md-2">
								<label><b>UF</b></label>
								<input name="end_uf" type="text" class="form-control" id="uf" required="">
							</div>
							<div class="form-group col-md-4">
								<label><b>CEP</b></label>
								<input name="end_cep" type="text" class="form-control" id="cep" required="">
							</div>
						</div>
						<div class="form-group col-md-2">
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