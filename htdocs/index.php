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
		<script>
			var i = <?= 35+15 ?>;
			alert("O valor é" + i);
		</script>
	</head>
	<body>
		<h1><?= "Teste" ?></h1>
		<?php echo "<strong>Olá mundo</strong>"; ?>
		<?= "<script> alert('Olá mundo!'); </script>" ?>
		<?php 
		
			define("_URL_", "http://localhost");
			echo _URL_;
			
			$numero = 10;
			$total = $numero + 3;
			echo $total;
			
			// Comentário 1
			/*
			Comentário 2.1
			Comentário 2.2
			*/
			# Comentário 3
			
			$valor = $_GET["idade"];
			echo "<br/>" . $valor;
			
			if($valor > 0 && $valor <= 17) {
				echo "<span style='color:red'>Menor de idade.</span>";
			} else if($valor >= 18 && $valor <= 59) {
				echo "<span style='color:green'>Maior de idade.</span>";
			} else {
				echo "<span style='color:blue'>Idoso.</span>";
			}
		
		?>
	</body>
</html>