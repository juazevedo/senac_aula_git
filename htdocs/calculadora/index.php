<?php

	function soma($vlr1, $vlr2){
		$resultado = $vlr1 + $vlr2;
		// global $total = $vlr1 + $vlr2;
		return $resultado;
	}
	
	function subtracao($vlr1, $vlr2){
		$resultado = $vlr1 - $vlr2;
		return $resultado;
	}
	
	function multiplicacao($vlr1, $vlr2){
		$resultado = $vlr1 * $vlr2;
		return $resultado;
	}
	
	function divisao($vlr1, $vlr2){
		if($vlr2 == 0){
			$resultado = 0;
		} else {
			$resultado = $vlr1 / $vlr2;
		}
		return $resultado;
	}
	
	function percentual($vlr1, $vlr2){
		$resultado = divisao($vlr1, 100);
		$resultado = multiplicacao($resultado, $vlr2);
		return $resultado;
	}
	
	$total = 0;
	$valor1 = "";
	$valor2 = "";
	$operacao = "+";
	if(isset($_POST["calcular"]) == TRUE) {
			// troca um caracter por outro dentro do texto
		$valor1 = str_replace(",", ".", $_POST["valor1"]);
		$valor2 = str_replace(",", ".", $_POST["valor2"]);
		$operacao = $_POST["operacao"];
		
		switch($operacao) {
			case "+":
				$total = soma($valor1, $valor2);
			break;
			case "-":
				$total = subtracao($valor1, $valor2);
			break;
			case "*":
				$total = multiplicacao($valor1, $valor2);
			break;
			case "/":
				$total = divisao($valor1, $valor2);
			break;
			case "%":
				$total = percentual($valor1, $valor2);
			break;
			default:
				$total = 0;
			break;
		}
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
		<h1>Calculadora</h1>
		<fieldset>
			<legend>Valores</legend>
			<form method="POST" action="#">
				<label for="valor1">1° número: </label>
				<input type="text" name="valor1" id="valor1" value="<?=str_replace(",", ".", $valor1)?>" placeholder="Digite o 1° valor"/>
				<label for="idade">2° número: </label>
				<input type="valor2" name="valor2" id="valor2" value="<?=str_replace(",", ".", $valor2)?>" placeholder="Digite o 2° valor"/>
				<label>Operação</label>
				<input type="radio" name="operacao" id="operacao_soma" value="+" <?= $operacao == "+" ? "checked" : "" ?> /><label for="operacao_soma">Soma</label>
				<input type="radio" name="operacao" id="operacao_subtracao" value="-" <?= $operacao == "-" ? "checked" : "" ?> /><label for="operacao_subtracao">Subtração</label>
				<input type="radio" name="operacao" id="operacao_multiplicacao" value="*" <?= $operacao == "*" ? "checked" : "" ?> /><label for="operacao_multiplicacao">Multiplicação</label>
				<input type="radio" name="operacao" id="operacao_divisao" value="/" <?= $operacao == "/" ? "checked" : "" ?> /><label for="operacao_divisao">Divisão</label>
				<input type="radio" name="operacao" id="operacao_percentual" value="%" <?= $operacao == "%" ? "checked" : "" ?> /><label for="operacao_percentual">Percentual</label>
				<input type="submit" name="calcular" id="calcular" value="Calcular" />
			</form>
			<?php if(isset($_POST["calcular"])) { ?>
				<span>O resultado é <strong><?=str_replace(",", ".", $total)?></strong></span>
			<?php } ?>
			
		</fieldset>
	</body>
</html>