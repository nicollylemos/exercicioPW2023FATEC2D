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
		<h3>Adicionar carro</h3>
		<?php
			include_once('conexao.php');
			// recuperando 
			$modelo = $_POST['modelo'];
			$marca = $_POST['marca'];	
			$datacad = $_POST['datacad'];	
			$ano = $_POST['ano'];
			$imagem = ""; //variável para armazenar o nome da imagem para mandar para o Banco de dados

			// Tutorial de upload de arquivos
			// https://www.w3schools.com/php/php_file_upload.asp

			// Pasta onde serão gravadas as imagens
			$target_dir = "imagens/upload/";
			// Caminho + nome da imagem
			$target_file = $target_dir . basename($_FILES["imagem"]["name"]);
			// Variável para controlar o upload
			$uploadOk = 1;
			// obtendo a extensão do arquivo para verificarmos o tipo dele
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if(isset($_POST["submit"])) {
				// Verificando se o arquivo é mesmo uma imagem 
				// O getimagesize vai retornar o tamanho da imagem ou um erro se não for imagem o arquivo
				$check = getimagesize($_FILES["imagem"]["tmp_name"]);
				if($check !== false) {
					echo "<p>O arquivo é uma imagem do tipo " . $check["mime"] . ".</p>";
					$uploadOk = 1;
				} else {
					echo "<p>O arquivo não é de imagem.</p>";
					$uploadOk = 0;
				}
			}

			// Verificando se já existe um arquivo com o mesmo nome da pasta onde serão gravadas as imagens
			/*if (file_exists($target_file)) {
				echo "<p>Desculpe, mas já existe um arquivo no servidor com esse nome.</p>";
				$uploadOk = 0;
			}*/

			// Verificando o tamanho da imagem, pois por padrão, só são aceitos arquivos com 40MB
			if ($_FILES["imagem"]["size"] > 500000) { // Equivale a menos de 500KB
				echo "<p>Desculpe, mas o arquivo é muito grande.</p>";
				$uploadOk = 0;
			}

			// Limitando os formatos aceitos
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				echo "<p>Desculpe, mas só arquivos JPG, JPEG, PNG e GIF são permitidos.</p>";
				$uploadOk = 0;
			}

			// Verificando se $uploadOk é zero, pois isso indica que houve um erro
			if ($uploadOk == 0) {
				echo "<p> <img src='imagens/img/chat.png' style='width:30px; height:30px; display:inline-block;'/>Desculpe, mas seu arquivo não foi enviado para o servidor.</p>";
			// Se tudo estiver certo, vamos mover o arquivo para a pasta definitiva ==> move_uploaded_file
			} else {
				if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
					echo "<p> <img src='imagens/img/chat.png' style='width:30px; height:30px; display:inline-block;'/>O arquivo ". htmlspecialchars(basename( $_FILES["imagem"]["name"])). " foi enviado para o servidor.</p>";
					$imagem = basename($_FILES["imagem"]["name"]); // Nome do arquivo
				} else {
					echo "<p> <img src='imagens/img/chat.png' style='width:30px; height:30px; display:inline-block;'/> Desculpe, houve um erro ao tentar enviar seu arquivo para o servidor.</p>";
				}
			}

			// criando a linha de INSERT
			$sqlinsert =  "insert into tabelacarros (modelo, marca, datacad, ano, imagem) values ('$modelo', '$marca', '$datacad', $ano, '$imagem')";
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlinsert);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				echo "<h4> <img src='imagens/img/check.png' style='width:40px; height:40px; display:inline-block;'/> Registro Cadastrado com Sucesso.</h4>";
			} 
			mysqli_close($conexao);
		?>
		<img src="imagens/img/car-img.png" style="width:500px; height:500px;"/>
		<br><br>
		<input type='button' class="btn btn-outline-secondary"  onclick="window.location='index.php';" value="Voltar">
		</div>
	</body>
</html>
