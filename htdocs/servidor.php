<?= $_SERVER['SERVER_ADDR']?><br/>
<?= $_SERVER['SERVER_NAME']?><br/>
<?= $_SERVER['QUERY_STRING']?><br/>
<?= $_SERVER['REMOTE_ADDR']?><br/>
<?= $_SERVER['REMOTE_HOST']?><br/>
<?= $_SERVER['SERVER_PORT']?><br/>
<?= $_SERVER['SCRIPT_URI']?><br/>

<?php 
	switch(date("w")){
		case"0":
			echo "Domingo, ";
		break;
		case"1":
			echo "Segunda-Feira, ";
		break;
		case"2":
			echo "Terça-Feira, ";
		break;
		case"3":
			echo "Quarta-Feira, ";
		break;
		case"4":
			echo "Quinta-Feira, ";
		break;
		case"5":
			echo "Sexta-Feira, ";
		break;
		case"6":
			echo "Sábado, ";
		break;
	}
	date_default_timezone_set('America/Sao_Paulo');
	echo date('d/m/y H:i:s');

	
?>