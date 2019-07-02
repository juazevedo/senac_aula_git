<?php
	session_start();
	// $_SESSION["email_logado"] = NULL; Encerra uma única sessão
	session_destroy(); // Encerra todas as sessões
	header("Location:form_sessao.php");
?>