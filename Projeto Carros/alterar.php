<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/geralst.css"/>
		<link rel="shortcut icon" href="imagens/img/car.png">
	</head>
	<body>
		<div class="box">
		<h3 id="ex-h3"><img src="imagens/img/edit.png" style="width:25px;height:25px;"/> Editar</h3>
		<?php
			include_once('conexao.php');
			// recuperando
			$id = $_POST['id'];
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
			/*//if (file_exists($target_file)) {
				echo "<p>Desculpe, mas já existe um arquivo no servidor com esse nome.</p>";
				$uploadOk = 0;
			} */

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
				echo "<p>Desculpe, mas seu arquivo não foi enviado para o servidor.</p>";
			// Se tudo estiver certo, vamos mover o arquivo para a pasta definitiva ==> move_uploaded_file
			} else {
				if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
					echo "<h5><img src='imagens/img/chat.png' style='width:30px; height:30px; margin-bottom:8px; display:inline-block;'/>  O arquivo ". htmlspecialchars(basename( $_FILES["imagem"]["name"])). " foi enviado para o servidor.";
					$imagem = basename($_FILES["imagem"]["name"]); //  Nome do arquivo
				} else {
					echo "<h5><img src='imagens/img/chat.png' style='width:30px; height:30px; display:inline-block;'/>  Desculpe, houve um erro ao tentar enviar seu arquivo para o servidor.</h5>";
				}
			}


			// criando a linha do  UPDATE
			$sqlupdate =  "update tabelacarros set  modelo='$modelo', marca='$marca', datacad='$datacad',ano=$ano, imagem='$imagem' where id=$id";
			$diretorio = "imagens/upload/";  $pegaValores = mysqli_query($conexao, "SELECT imagem FROM tabelacarros WHERE id = $id");  $imagem = mysqli_fetch_object($pegaValores);  $imagemQueVaiDeletada = $diretorio . $imagem->imagem;   $deleta = unlink($imagemQueVaiDeletada);  
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlupdate);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				echo "<br>  <img src='imagens/img/check.png' style='width:40px; height:40px; display:inline-block;'/> Registro Alterado com Sucesso";
			} 
			mysqli_close($conexao);
		?>
		<br>
		<img src="imagens/img/car-edit.png" style="width:560px; height:500px;"/>
		<br><br>
		<input type='button' class="btn btn-outline-secondary" onclick="window.location='index.php';" value="Voltar">
		</div>
	</body>
</html>
