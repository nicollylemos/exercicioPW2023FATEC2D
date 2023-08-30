<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> NiKar - Carros </title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="imagens/img/car.png">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#" style="margin-right:10px;"><img src="imagens/img/car.png" style="width:30px; height:30px; display:inline-block;"/> NiKar</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="index.php">Consulta</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">Menu</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">Perfil</a>
					</li>
				</ul>
				</div>
			</div>
		</nav> 
	<div class="tela">
		<div class="consulta">
				<form action="index.php" method="post" role="search">
					<div class="consulta-2">
						<legend> Consulta de carros <img src="imagens/img/glass.png" style="width:30px; height:30px; display:inline-block;"/></legend>
						<label for="fname">Nome do modelo:</label><br>
					</div>
						<input type="text" id="consulta-carros" name="modelo"  placeholder="Digite aqui" class="form-control me-2">
						<button class="btn btn-outline-secondary" type="submit" id="btn-buscar">Buscar</button>
				</form>
				<button type="submit" id="btn-two"><a href="index.php" id="a-three">Atualizar</a>&nbsp;&nbsp;&nbsp;</button>
				<button type="submit" id="btn-two"><a href="inclusao.php" id="a-three">Adicionar carro</a><br></button> 
		</div>
		<?php
			include("conexao.php");
			// ajustando a instrução select para ordenar por produto
			$sql = "select * from tabelacarros order by modelo";
			// verificando se o form de consulta chamou a página

			require_once 'conexao.php';


			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$modelo = $_POST['modelo'];
				$sql = "select * from tabelacarros where modelo like '%" . $modelo . "%' order by modelo";
			}
			$query = mysqli_query($conexao, $sql);

			if (!$query) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao));  
			}

			

			while($dados=mysqli_fetch_array($query)) 
			{
				// buscando a na pasta imagem
				if (empty($dados['imagem'])){
					$imagem = 'SemImagem.png';
				} else {
					$imagem = $dados['imagem'];
				}
				$id = base64_encode($dados['id']);
				echo "<div class='row' id='tabela'>";
				echo "<div class='col-lg-4' id='tabela-carro'>";
				echo "	<a href='verproduto.php?id=$id'>
							<img src='imagens/upload/$imagem' width='70px'/>
						</a>
					 <br>";
				echo "<strong>Id: </strong>". $dados['id']."<br>";
				echo "<strong>Modelo: </strong>". $dados['modelo']."<br>";
				echo "<strong>Marca: </strong>". $dados['marca']."<br>";
				echo "<strong>Ano: </strong>". $dados['ano']."<br>";
				echo "<strong>Data de cadastro: </strong>". $dados['datacad']."<br>";
				echo "</div>";
				echo "
				<button type='submit' class='c-three'>
				<a href='veralteracao.php?id=$id' id='a-two'>
				<img src='imagens/img/edit.png' style='width:30px;height:30px;'/>Editar</a></button>
				<button type='submit' class='b-three'><a href='verproduto.php?id=$id' id='a-two'>
				<img src='imagens/img/view.png' style='width:30px;height:30px;'/>Visualizar</a></button>
				<button type='submit' class='d-three'><a href='verexclusao.php?id=$id' id='a-two'>
				<img src='imagens/img/trash.png' style='width:30px;height:30px;'/>Apagar</a></button>";
				echo "</div>";
			}

			mysqli_close($conexao);
		?>
	</div>
	</body>
</html>
