<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Última versão CSS compilada e minificada -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Quantidade do Produto</title>
    </head>
    <?php
    include 'conexao.php';
	
    ?>
    <body>
	<div class="box" >
		<br/>
		<div class="container" >
			<h2 class="text-center"><i> Cadastrar </i></h2>
			<div class="row">
				<div class="col s2 m12 offset-m1 center">
					<form name="form1" action="insert_login.php" method="post" >  
						<div class="form-row">	
							<div class="form-group col-md-12">
								<label><b > Email</b></label>
								<input type="email" class="form-control" name="lo_email" placeholder="Email"/>
							</div>
							<div class="form-group col-md-12">
								<label><b > Senha</b></label>
								<input type="password" class="form-control" name="lo_senha" placeholder="Senha"/>
							</div>	
							<div class="form-group col-md-12">
								<label><b > Confirmar Senha</b></label>
								<input type="password" class="form-control" name="confirma_senha" placeholder="Confirmar Senha"/>
							</div>							
							
						</div>
						<div class="form-group col-md-2">
							<button type="button-submit" class="btn btn-outline-black">Enviar</button>
						</div>							
						 
					</form>
				</div>
			</div>
		</div>
	</div>		
       
    </body>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>