<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> NiKar - Carros </title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/geralst.css"/>
		<link rel="shortcut icon" href="imagens/img/car.png">
	</head>
	<style>
		#customers {
		font-family: Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 700px;
		margin-top:20px;
		margin-left:40px;
		}

		#customers td, #customers th {
		border: 1px solid #ddd;
		padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: rgb(169, 40, 40);
		color: white;
		}
</style>
	<body>
		<div class="box">
		<h3 id="h3-b"> <img src="imagens/img/info.png" style="width:40px;height:40px;"/> Detalhes carro</h3>
		<?php
			//função antiga
			function convertedata2($data){
				$data_vetor = explode('-', $data);
				$novadata = implode('/', array_reverse ($data_vetor));
				return $novadata;
			}
			//função remodelada para de fato formatar data/hora
			function convertedata($data){
				date_default_timezone_set("America/Sao_Paulo");
				$datanova = date_create($data);
				return date_format($datanova,"d/m/Y");
			}

			include("conexao.php");
			// recuperando a informação da URL
			// verifica se parâmetro está correto e dento da normalidade 
			if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
				$id = base64_decode($_GET['id']);
			} else {
				header('Location: index.php');
			}
			// realizando a pesquisa com o id recebido
			$query = mysqli_query($conexao, "select * from tabelacarros where id = $id");

			if (!$query) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			}

			$dados=mysqli_fetch_array($query);
			
			if (empty($dados['imagem'])){
				$imagem = 'SemImagem.png';
			}else{
				$imagem = $dados['imagem'];
			}
			$modelo = $dados['modelo'];
			echo "<img src=\"imagens/upload/$imagem\" width='600px' height='350px' style='margin-left:40px' alt=\"$modelo\">";
			echo"<table id='customers'>
				<tr>
					<th>Data de cadastro</th>
					<th>Id</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Ano</th>
				</tr>
			  	<tr>
					<td>".convertedata($dados['datacad'])."</td>
					<td>".$dados['id']."</td>
					<td>".$dados['modelo']."</td>
					<td>".$dados['marca']."</td>
					<td>".$dados['ano']. "</td>
				</tr>
			  </table>";
			
			mysqli_close($conexao);
		?>
		<br>
		<input type='button' style="width:400px;  position: absolute; left:240px; margin-top: 50px;" class="btn btn-outline-danger" onclick="window.location='index.php';" value="Voltar">
	</body>
		</div>
</html>
