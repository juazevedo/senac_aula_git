<?php
	$code = "sua url aqui encriptografada";
		$code = base64_encode($code);
?>
<a href="decoder.php?acao=<?php echo "$code";?>"> Vai </a>