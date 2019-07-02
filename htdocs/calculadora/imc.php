<?php
	$total = 0;
	$valor1 = "";
	$valor2 = "";

	if(isset($_POST["calcular"]) == TRUE) {
		$valor1 = $_POST["valor1"];
		$valor2 = $_POST["valor2"];
		$total = $valor1 / ($valor2 * $valor2);
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Título da página</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
	</head>
	<body>
		<h1>Calculadora IMC</h1>
		<fieldset>
			<legend>Valores</legend>
			<form method="POST" action="#">
				<label for="valor1">Peso: </label>
				<input type="text" name="valor1" id="valor1" value="<?=$valor1?>" placeholder="Digite seu peso"/>
				<label for="idade">Altura: </label>
				<input type="valor2" name="valor2" id="valor2" value="<?=$valor2?>" placeholder="Digite sua altura"/>

				<input type="submit" name="calcular" id="calcular" value="Calcular" />
			</form>
			<?php if(isset($_POST["calcular"])) { ?>
				<span>Seu IMC é <strong><?=$total?></strong></span>
			<?php } ?>
			
		</fieldset>
	</body>
</html>