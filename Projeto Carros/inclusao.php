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
			<h3><img src="imagens/img/add.png" style="width:50px; height:50px; display:inline-block;"/> Adicionar carro</h3>
				<form name="produto" action="incluir.php" method="post" enctype="multipart/form-data"> <!-- ALTERADO -->
					<b>Modelo:</b> <input type="text" id="modelo" class="form-control"  name="modelo" required="required"><br><br>
					<b>Marca:</b> <input type="text" id="marca" class="form-control"  name="marca" maxlength='80'><br><br>
					<b>Data de Cadastro: </b><br> <input type="date" name="datacad" id="data"><br><br>
					<b>Ano: </b><input type="number" id="ano" class="form-control"  name="ano"> <br><br>
					<b>Foto: </b><input type="file" id="foto" class="form-control" class="form-control" name="imagem"> <br><br> <!-- INCLUIDO // ATENÇÃO-->
					<input type="submit" class="btn btn-outline-success" value="Ok">
					<input type="reset"  class="btn btn-outline-dark" value="Limpar">
					<input type='button' class="btn btn-outline-secondary" onclick="window.location='index.php';" value="Voltar">
				</form>
		</div>
	</body>
</html>
