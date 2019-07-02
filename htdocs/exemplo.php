<?php
	$html = "";
	$multiplicador = "";
	if(isset($_POST["btn_calcular"])) {
		$multiplicador = $_POST["txt_multiplicador"];
		$html = "<ul>";
		for($multiplicando = 0; $multiplicando <= 10; $multiplicando++) {
			$resultado = $multiplicando * $multiplicador;
			$html = $html . "<li style='list-style-type:none;'>" . $multiplicador . " X " . $multiplicando . " = " . $resultado . "</li>";
		}
		$html = $html . "<ul>";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Título da página</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		< src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></>
		< src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></>
		< src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></>
		
	</head>
	<body>
		<div class="conteiner">
			<div class="row">
				<div class="col-md-3">
					<form name="form" id="form" method="post" action="#">
						<div class="form-group">
							<label for="txt_multiplicador">Multiplicador:</label>
							<input type="number" class="form-control"  id="txt_multiplicador" name="txt_multiplicador" placeholder="Informe um número" value="<?=$multiplicador?>" />
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-outline-primary" id="btn_calcular" name="btn_calcular" value="Calcular" />
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?=$html?>
				</div>
			</div>
			
			
		</div>
	</body>
</html>




----------------------------------------------------------------------------------------------------------------------------------------------------------------------




<?php
	$html = "";
	if(isset($_POST["btn_enviar"])) {
		$valor = explode(" ",$_POST["txt_valor"]);
		$html = "<ul>";
		$c = 0;
		foreach($valor as $i) {
			$html = $html . "<li style='list-style-type:none;'>" . $c . " - " . $i . "</li>";
			$c++;
		}
		$html = $html . "<ul>";
		$html = $html . "<br>" . implode("*", $valor);
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Título da página</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		< src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></>
		< src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></>
		< src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></>
		
	</head>
	<body>
		<div class="conteiner">
			<div class="row">
				<div class="col-md-6">
					<form name="form" id="form" method="post" action="#">
						<div class="form-group">
							<label for="txt_valor">Valor:</label>
							<input type="text" class="form-control"  id="txt_valor" name="txt_valor" placeholder="Informe um número"  />
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-outline-primary" id="btn_enviar" name="btn_enviar" value="Enviar" />
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?=$html?>
				</div>
			</div>
			
			
		</div>
	</body>
</html>