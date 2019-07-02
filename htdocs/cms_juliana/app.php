<?php
	define("SERVIDOR", "localhost");
	define("PORTA", "3306");
	define("USUARIO", "root");
	define("SENHA", "");
	define("BD", "cms");
	
	$cnn = NULL;
	
	function abrirConexao() {
		$cnn = mysqli_connect(SERVIDOR, USUARIO, SENHA, BD);
		return $cnn;
	}
	
	function fecharConexao($cnn) {
		mysqli_close($cnn);
	}
	
	function incluir($cnn, $sql) {
		$id = NULL;
		echo $sql;
		$query = mysqli_query($cnn, $sql);
		if(mysqli_affected_rows($cnn) > 0) {
			$id = mysqli_insert_id($cnn);
		}
		return $id;
	}
	
	function alterarOuExcluir($cnn, $sql) {
		$controle = false;
		$query = mysqli_query($cnn, $sql);
		if(mysqli_affected_rows($cnn) > 0) {
			$controle = true;
		} else {
			$controle = false;
		}
		return $controle;
	}
	
	function consultar($cnn, $sql) {
		$reg = NULL;
		$query = mysqli_query($cnn, $sql);
		if($r = mysqli_fetch_assoc($query)) {
			$reg = $r;
		}
		return $reg;
	}
	
	function listar($cnn, $sql) {
		$list = NULL;
		$query = mysqli_query($cnn, $sql);
		while($r = mysqli_fetch_assoc($query)) {
			$list[] = $r;
		}
		return $list;
	}
	
	function incluirSessao($nome, $ativo) {
		$cnn = abrirConexao();
		$nome = mysqli_real_escape_string($cnn, $nome);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$id = incluir($cnn, "INSERT INTO sessao VALUES (NULL, '$nome', $ativo)");
		fecharConexao($cnn);
		return $id;
	}
	
	function alterarSessao($id, $nome, $ativo) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$nome = mysqli_real_escape_string($cnn, $nome);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$con = alterarOuExcluir($cnn, "UPDATE sessao SET nome = '$nome', ativo = $ativo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	
	function excluirSessao($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM sessao WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	
	function consultarSessao($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT * FROM sessao WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	
	function listarSessao() {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT * FROM sessao");
		fecharConexao($cnn);
		return $arr;
	}
?>