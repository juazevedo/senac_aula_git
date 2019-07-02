<?php
	$msg = NULL;
	$msg_class = NULL;
	if(isset($_POST["sign_in"])){
		$nome = $_POST["inputNome"];
		$tel = $_POST["inputTel"];
		$email = $_POST["inputEmail"];
		$assunto = $_POST["inputAss"];
		$txt = $_POST["inputTxt"];
		if(isset($_POST["sign_in"])){
			$msg = "Mensagem enviada com sucesso!";
			$msg_class = "success";
		} else {
			$msg = "Erro ao enviar a mensagem!";
			$msg_class = "danger";
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Contato</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

    <!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
	
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
	</head>
  <body>
	<?php require_once("header.php");?>

	<main role="main">
	<div class="album py-5 bg-light">
    <div class="container">
		<section class="jumbotron text-center">
			<div class="container">
			  <h1 class="jumbotron-heading">Contato</h1>
			  <p class="lead text-muted"></p>
			  
			</div>
		  </section>
		  <div class="alert alert-<?=$msg_class?>" role="alert">
			  <?=$msg?>
		  </div>
		<form method="POST" action="#">
		  <div class="form-group">
			<label for="inputNome">Nome</label>
			<input type="text" class="form-control" id="inputNome" name="inputNome" aria-describedby="name" placeholder="Escreva seu nome">
		  </div>
		  <div class="form-group">
			<label for="inputTel">Telefone</label>
			<input type="text" class="form-control" id="inputTel" name="inputTel" placeholder="( ) ">
		  </div>
		  <div class="form-group">
			<label for="inputEmail">Email</label>
			<input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Digite seu email">
			<small id="emailHelp" class="form-text text-muted"></small>
		  </div>
		   <div class="form-group">
			<label for="inputAss">Assunto</label>
			<input type="text" class="form-control" id="inputAss" name="inputAss" placeholder="">
		  </div>
		  <div class="form-group">
			<label for="inputTxt">Texto</label>
			<input type="text" class="form-control" id="inputTxt" name="inputTxt" placeholder="Escreva sua mensagem.">
		  </div>
		  <button type="submit" class="btn btn-primary" id="sign_in" name="sign_in">Enviar</button>
		</form>
	</div>
	</div>
	</main>
	<?php require_once("footer.php");?>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
	</script>
	</body>
</html>
