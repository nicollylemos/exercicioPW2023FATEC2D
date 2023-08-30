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
			include_once('conexao.php');		
			/*
			ORIGINAL COMENTADO!!!!
			// recuperando 
			$codigo = $_POST['codigo'];

			// criando a linha do  SELECT
			$sqlconsulta =  "select * from tabelaimg where codigo = $codigo";
			
			*/
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
				echo '<input type="button" onclick="window.location='."'exclusao.php'".';" value="Voltar"><br><br>';
				exit;		
				}else{
					$dados=mysqli_fetch_array($resultado);
				}
			}
			mysqli_close($conexao);
			$imagem = "SemImagem.png";
			if (!empty($dados['imagem'])){
				$imagem = $dados['imagem'];
			}
		?>
        <img src="imagens/upload/<?php echo $imagem; ?>" name="foto" width="250px"> <br><br><!-- Foi incluido -->
		<b>Modelo:</b> <input type="text" id="modelo" class="form-control"  value="<?php echo $dados['modelo']; ?>" readonly ><br><br>
		<b>Marca:</b> <input type="text" id="marca" class="form-control" maxlength='80' value="<?php echo $dados['marca']; ?>" readonly ><br><br> <!-- ALTERADO // ATENÇÃO-->
		<b>Data de Cadastro: </b> <br><input type="date" id="data" value="<?php echo convertedata($dados['datacad']); ?>" readonly ><br><br> <!-- Foi incluido o convertedata -->
		<b>Ano: </b><input type="number" id="ano" class="form-control" name="ano" value="<?php echo $dados['ano']; ?>" readonly > <br>
		<form name="produto" action="excluir.php" method="post">
			<!-- 
				Original
				<input type='hidden' name='codigo' value="<?php echo $dados['codigo']; ?>">
			-->
			<input type='hidden' name='id' value="<?php echo $id; ?>">
			<input type='submit'class="btn btn-outline-danger" value='Apagar'>&nbsp;&nbsp;
			<input type='button'class="btn btn-outline-secondary" onclick="window.location='index.php';" value="Voltar"> <!-- Alterado -->
		</form>
		</div>
	</body>
</html>
