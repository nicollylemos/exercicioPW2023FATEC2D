<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dados.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="shortcut icon" href="imgs/icon-educacao.ico" type="image/x-icon"/>
    <title>Informações</title>
</head>
<body>
    <div class="inicio-dados">
        <div class="txt-dados">
            <h1>Formulário registrado</h1><br>
            <img src="imgs/img-verifica.png" alt="Imagem de verificado" class="img-verificado"/>
            <p>Suas informações foram enviadas, confira se seus dados estão corretos através da<br> tabela de informações, basta clicar no botão visualizar.</p>
            <a href="#info-visu"><button type="button" id="btnVisu">Visualizar</button></a>
            <img src="imgs/img-dados.png" alt="" class="img-dados">
        </div>
        <div class="divisao">
            <img src="imgs/waves-dds.png" alt="Onda Gráfica Verde" class="img-onda"/>
        </div>
    </div>
    <div class="info-dados" id="info-visu">
        <div class="info-tabela">
            <div class="info-header">
                <h2>Informações</h2>
            </div>
            <div class="tbl">
                <?php
                    $nome = "";
                    if(isset($_POST['nome'])){
                        $nome = $_POST['nome'];
                    }
                    $email = "";
                    if(isset($_POST['email'])){
                        $email = $_POST['email'];
                    }
                    $obs = "";
                    if(isset($_POST['obs'])){
                        $obs = $_POST['obs'];
                    }
                    $altura = "";
                    if(isset($_POST['altura'])){
                        $altura = $_POST['altura'];
                    }
                    $datanasc = "";
                    if(isset($_POST['datanasc'])){
                        $datanasc = $_POST['datanasc'];
                    }
                    $tipo = "";
                    if(isset($_POST['tipo'])){
                        $tipo = $_POST['tipo'];
                    }
                    $periodo = "";
                    if(isset($_POST['periodo'])){
                        $periodo =$_POST['periodo'];
                    }
                    $obs = "";
                    if(isset($_POST['obs'])){
                        $obs =$_POST['obs'];
                    }
                        echo '<table class="tabela">
                    <thead class="table-head">
                        <th></th>
                        <th>Informações</th>
                    </thead>
                    <tr>
                        <td>Nome:</td>
                        <td>'.$nome.'</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>'.$email.'</td>
                    </tr>
                    <tr>
                        <td>Altura:</td>
                        <td>'.$altura.'</td>
                    </tr>
                    <tr>
                        <td>Data de nascimento:</td>
                        <td>'.$datanasc.'</td>
                    </tr>
                    <tr>
                        <td>Função:</td>
                        <td>'.$tipo.'</td>
                    </tr>
                    <tr>
                        <td>Período:</td>
                        <td>'.$periodo.'</td>
                    </tr>
                    <tr>
                        <td>Comentário:</td>
                        <td>'.$obs.'</td>
                    </tr>
                </table>';
                ?>
        </div>
    </div>
</body>
</html>