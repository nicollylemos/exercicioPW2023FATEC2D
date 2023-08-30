<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> NiKar - Carros </title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/geralst.css"/>
		<link rel="shortcut icon" href="imagens/img/car.png">
	</head>
	<body>
		<div class="box">
		<h3 id="ex-h3"><img src="imagens/img/trash.png" style="width:25px;height:25px;"/> Excluir carro</h3>
		<?php
			include("conexao.php");
			// recuperando 
			// FOI ALTERADO
			$id = $_POST['id'];

			// criando a linha do  DELETE
			// FOI ALTERADO
			$sqldelete =  "delete from  tabelacarros where id = $id ";
			

			$diretorio = "imagens/upload/";  $pegaValores = mysqli_query($conexao, "SELECT imagem FROM tabelacarros WHERE id = $id");  $imagem = mysqli_fetch_object($pegaValores);  $imagemQueVaiDeletada = $diretorio . $imagem->imagem;   $deleta = unlink($imagemQueVaiDeletada);    if($deleta):    mysqli_query($conexao, "DELETE FROM tabelacarros WHERE id = $id");  endif;    
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqldelete);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				echo "<h4>  <img src='imagens/img/check.png' style='width:40px; height:40px; display:inline-block;'/> Registro Excluído com Sucesso.</h4>";
			} 
			mysqli_close($conexao);
		?><img src="imagens/img/car-excluir.png" style="width:500px; height:500px;"/>
		<br><br>
		<input type='button' class="btn btn-outline-secondary" onclick="window.location='index.php';" value="Voltar"> <!-- Alterado -->
		</div>
	</body>
</html>
