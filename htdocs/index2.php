<?php
	$code = "sua url aqui encriptografada";
		$code = base64_encode($code);
?>
<a href="decoder.php?acao=<?php echo "$code";?>"> Vai </a>
<?php
	$code = $_GET['acao'];
		$link = base64_decode($code);
		echo "$link";
?>