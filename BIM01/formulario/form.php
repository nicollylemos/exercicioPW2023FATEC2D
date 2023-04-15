<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="shortcut icon" href="imgs/icon-educacao.ico" type="image/x-icon"/>
		<title>Formulário</title>
	</head>
	<body>
		<div class="main">
			<div class="main-left"><h2 class="h2-form">Responda o formulário para <br>enviar suas informações!</h2>
			<img src="imgs/img-form.png" alt="Ilustração Mulher Sentada em Livros"/>
		</div>
			<div class="bx-form">
				<form action="dados.php" method="post">
					<div class="form-header">
						<h1>Formulário</h1><br>
					</div>					
					<div class="form-inputs">
						<div class="mb-3">
							<label for="fname">Nome:</label>
							<input type="text"  class="form-control" id="fname" name="nome" placeholder="Nome">
						</div>
						<div class="mb-3">
							<label for="mail" >E-mail:</label>
							<input type="email"  class="form-control" id="mail" name="email"  placeholder="Email">
							<div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
						</div>
						<div class="form-outline">
							<label for="altu">Altura:</label>
							<input type="number" id="altu" class="form-control" name="altura" step="0.01" style="width:200px;" />
						</div>
						<div class="form-nasc">
							<label for="data">Data de nascimento:</label><br>
							<input type="date" id="data" name="datanasc">
						</div>
						<div class="form-escolha">
							<label for="tp">Escolha:</label>
							<select class="form-select" id="tp" name="tipo" style="cursor:pointer; width:200px;">
								<option value="Aluno">Aluno</option>
								<option value="Professor">Professor</option>
								<option value="Funcionário">Funcionário</option>
							</select>
						</div>
						<div class="mb-3">
							<fieldset>
							<legend style="font-size:17.4px">Período:</legend>
								<input type="radio" class="form-check-input" id="m" name="periodo" value="Manhã">
								<label for="m">Manhã</label><br>
								<input type="radio" class="form-check-input" id="t" name="periodo" value="Tarde">
								<label for="t">Tarde</label>
							</fieldset>
						</div>
						<div class="form-floating">
							<textarea class="form-control" name="obs" style="height: 100px"></textarea>
							<label for="ob" class="form-label">Comentários:</label>
						</div>
						<div>
							<button type="reset" class="btn btn-outline-success" style=" width:145px; padding:7px; transition:1s; font-weight: 600;">Apagar</button>
							<button type="submit" id="btn" class="btnEnviar">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>