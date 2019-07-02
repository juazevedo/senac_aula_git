<?php 
	define("SERVIDOR", "127.0.0.1");
	define("PORTA", "3306");
	define("USUARIO", "root");
	define("SENHA", "");
	define("BD", "cms");
		
	function abrirConexao() {
		$cnn = mysqli_connect(SERVIDOR, USUARIO, SENHA, BD);
		return $cnn;
	}
	
	function fecharConexao($cnn) {
		mysqli_close($cnn);
	}
	
	function incluir($cnn, $sql) {
		$id = NULL;
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
		$arr = consultar($cnn, "SELECT id, nome, ativo FROM sessao WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	function listarSessao($ativo) {
		$cnn = abrirConexao();
		$sql = "SELECT id, nome, ativo FROM sessao";
		if(!is_null($ativo)) {
			if($ativo) {
				$sql .= " WHERE ativo = 1";
			} else {
				$sql .= " WHERE ativo = 0";
			}
		}
		$arr = listar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}
	
	function incluirUsuario($nome, $usuario, $senha, $email, $ativo) {
		$cnn = abrirConexao();
		$nome = mysqli_real_escape_string($cnn, $nome);
		$usuario = mysqli_real_escape_string($cnn, $usuario);
		$senha = mysqli_real_escape_string($cnn, $senha);
		$email = mysqli_real_escape_string($cnn, $email);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$id = incluir($cnn, "INSERT INTO usuario VALUES (NULL, '$nome', '$usuario', MD5('$senha'), '$email', $ativo)");
		fecharConexao($cnn);
		return $id;
	}
	function alterarUsuario($id, $nome, $usuario, $senha, $email, $ativo) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$nome = mysqli_real_escape_string($cnn, $nome);
		$usuario = mysqli_real_escape_string($cnn, $usuario);
		$senha = mysqli_real_escape_string($cnn, $senha);
		$email = mysqli_real_escape_string($cnn, $email);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$con = alterarOuExcluir($cnn, "UPDATE usuario SET nome = '$nome', usuario = '$usuario', senha = MD5('$senha'), email = '$email', ativo = $ativo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function excluirUsuario($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM usuario WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarUsuario($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT id, nome, usuario, email, ativo FROM usuario WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	function listarUsuario() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT id, nome, usuario, email, ativo FROM usuario");
		fecharConexao($cnn);
		return $arr;
	}
	
	function autenticacaoUsuario($usuario, $senha) {
		$cnn = abrirConexao();
		$arr = consultar($cnn, "SELECT id, nome, usuario, email FROM usuario WHERE usuario = '$usuario' AND senha = MD5('$senha') AND ativo = 1");
		fecharConexao($cnn);
		return $arr;
	}
	
	function criarCredencial($user) {
		session_start();
		$_SESSION["user"] =$user;
		header("location:index.php");
	}
	
	function validarCredencial() {
		session_start();
		if(!isset($_SESSION["user"])) {
			header("location:acesso.php");
		}
	}
	
	function destruirCredencial() {
		session_start();
		session_destroy();
		header("location:acesso.php");
	}
	
	function formataData($data){
		$data = explode(" ", $data);
		if(count(explode("/",$data[0])) > 1){
			$formate = implode("-",array_reverse(explode("/",$data[0]))) . " " .  $data[1];
		}elseif(count(explode("-",$data[0])) > 1){
			$formate = implode("/",array_reverse(explode("-",$data[0]))) . " " .  $data[1];
		}
		return $formate;
	}
	
	function incluirConteudo($dataPublicacao, $titulo, $texto, $ativo, $sessaoId) {
		$cnn = abrirConexao();
		$dataPublicacao = mysqli_real_escape_string($cnn, $dataPublicacao);
		$titulo = mysqli_real_escape_string($cnn, $titulo);
		$texto = mysqli_real_escape_string($cnn, $texto);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$sessaoId = mysqli_real_escape_string($cnn, $sessaoId);
		$id = incluir($cnn, "INSERT INTO conteudo VALUES (NULL, '$dataPublicacao', '$titulo', '$texto', '$ativo', $sessaoId)");
		fecharConexao($cnn);
		return $id;
	}
	function alterarConteudo($id, $dataPublicacao, $titulo, $texto, $ativo, $sessaoId) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$dataPublicacao = mysqli_real_escape_string($cnn, $dataPublicacao);
		$titulo = mysqli_real_escape_string($cnn, $titulo);
		$texto = mysqli_real_escape_string($cnn, $texto);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$sessaoId = mysqli_real_escape_string($cnn, $sessaoId);
		$con = alterarOuExcluir($cnn, "UPDATE conteudo SET data_publicacao = '$dataPublicacao', titulo = '$titulo', texto = '$texto', email = '$email', ativo = $ativo, sessao_id = '$sessaoId' WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function excluirConteudo($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM conteudo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarConteudo($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT id, data_publicacao, titulo, texto, ativo, sessao_id FROM conteudo WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	function listarConteudo() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT c.id, c.data_publicacao, c.titulo, c.texto, c.ativo, c.sessao_id, s.nome AS nome_sessao FROM conteudo c INNER JOIN sessao s ON s.id = c.sessao_id");
		fecharConexao($cnn);
		return $arr;
	}
	
?>