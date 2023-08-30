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
		<h3 id="ex-h3"><img src="imagens/img/edit.png" style="width:25px;height:25px;"/> Editar</h3>
		<?php
			// Acrescentado
			//função remodelada para de fato formatar data/hora
			function convertedata($datacad){
				date_default_timezone_set("America/Sao_Paulo");
				$datanova = date_create($datacad);
				return date_format($datanova, "Y-m-d");
			}
			
			include("conexao.php");
			// recuperando a informação da URL
			// verifica se parâmetro está correto e dento da normalidade 
			if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
				$id = base64_decode($_GET['id']);
			} else {
				header('Location: index.php');
			}
			// criando a linha do  SELECT
			$sqlconsulta =  "select * from tabelacarros where id = $id";
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlconsulta);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				$num = @mysqli_num_rows($resultado);
				if ($num==0){
					echo "<b>Código: </b>não localizado !!!!<br><br>";
					echo '<input type="button" onclick="window.location='."'alteracao.php'".';" value="Voltar"><br><br>';
					exit;
				}else{
					$dados=mysqli_fetch_array($resultado);
				}
			} 
			mysqli_close($conexao);
			// Acrescentado
			$imagem = "SemImagem.png";
			if(!empty($dados['imagem'])){
				$imagem = $dados['imagem'];
			}
		?>
		<form name="modelo" action="alterar.php" method="post" enctype="multipart/form-data"> <!-- ALTERADO -->
			<input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Foi incluido  -->
			<img src="imagens/upload/<?php echo $imagem; ?>" name="foto" width="310px" height="200px"><br><br>
			<b>Modelo:</b> <input type="text" id="modelo" class="form-control" name="modelo" value="<?php echo $dados['modelo']; ?>" ><br>
			<b>Marca:</b> <input type="text" id="marca" class="form-control" name="marca" maxlength='80' value="<?php echo $dados['marca']; ?>"><br>
			<b>Data de Cadastro: </b> <br><input type="date" id="data" name="datacad" value="<?php echo convertedata($dados['datacad']); ?>"><br>
			<b>Ano: </b><input type="number" id="ano" class="form-control" name="ano" value='<?php echo $dados['ano']; ?>'> <br>
			<b>Foto:</b><input type="file" id="foto" class="form-control"  name="imagem"><br>
			<input type="submit" class="btn btn-outline-success" value="Ok">&nbsp;&nbsp;
			<input type="reset"  class="btn btn-outline-dark" value="Limpar">&nbsp;&nbsp;
			<input type='button' class="btn btn-outline-secondary" onclick="window.location='index.php';" value="Voltar">
		</form>
		</div>
	</body>
</html>
