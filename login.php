<!doctype html>
<?php
include 'conexao.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
	
    <body>
        <div class="box">
            <h2>Login</h2>
            <form name="form1" action="validar.php" method="post">
                <div class="inputBox">
                    <input type="text"name="email" id="email" type="email">
                    <label>Login</label>
                </div>
                <div class="inputBox">
                    <input type="password"  name="senha" id="password" type="password">
                    <label>Senha</label>
                </div>
                <br/>
				
                 <input type="submit" name="entrar" value="Entrar">
            </form>
            <br/>    
			<a href="formulario_login.php?"><button class="bt">Cadastrar</button></a>
        </div>
    </body>
</html>