<?php 
	require_once("inc/header.php"); 
	$conteudo = consultarConteudo($_GET["id"]);
	$acervo = listarAcervo($_GET["id"]);
	//echo count($acervo); exit();
	$eEdicao 	= NULL;
	$comentario = listarComentario(TRUE);
	$dataPublicacao = NULL;
	$usuario 	= NULL;
	$texto 		= NULL;
	$ativo 		= NULL;
	if(!isset($_GET["id"])) { // Inclusão
		$eEdicao = false;
		if(isset($_POST["btnEnviar"])) {
			$id = incluirComentario(formataData($_POST["txtDataComentario"]), $_POST["txtIp"]), $_POST["txtComentario"]);
			if(!is_null($id)) {
				header("location:detalhes.php?id=$id&msg=incluir-sucesso");
			} else { 
				echo "<script> $('#msg').display = block; </script>";
			} 
		}
	} else { // alteração ou exclusão
		$eEdicao = true;
		if(isset($_POST["btnAlterar"])) {
			$controle = alterarComentario($_GET["id"], formataData($_POST["txtDataComentario"]), $_POST["txtIp"]), $_POST["txtComentario"]);
			if($controle) {
				$id = $_GET["id"];
				header("location:detalhes.php?id=$id&msg=alterar-sucesso");
			} else {
				
			}
		} else if(isset($_POST["btnExcluir"])) {	
			$controle = excluirComentario($_GET["id"]);
			if($controle) {
				header("location:detalhes.php");
			} else {
				
			}
		} else {
			$reg = consultarConteudo($_GET["id"]);
			$dataPublicacao = formataData($reg["data_publicacao"]);
			$ip 	= $reg["ip"];
			$texto 		= $reg["texto"];
			$usuarioId 	= $reg["usuario_id"];
		}
	}
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
		<?php for($i=0; $i < count($acervo); $i++) { ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?=$i == 0 ? "class='active'" : "" ?> ></li>
		<?php } ?>
    </ol>
    <div class="carousel-inner">
		<?php 
			$primeiro = TRUE;
			foreach($acervo as $a) { 
		?>
      <div class="carousel-item <?php if($primeiro) { echo "active"; $primeiro = FALSE; } ?>" >
        <img src="upload/<?=$a["arquivo"]?>" class="d-block w-100" alt="...">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1><?=$a["titulo"]?></h1>
            <p></p>
          </div>
        </div>
      </div>
		<?php 
			} 
		?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <h1><?=$a["titulo"]?></h1>
	
	<p><?=$a["texto"]?></p>

  </div><!-- /.container -->
  
  </br>
  </br>
  </br>
  
  <!-- Comentarios -->
  <div class="container">
  
	  <form class="container">
	  <div class="form-group">
		<label for="txtUsuario">Usuário</label>
		<input type="text" class="form-control" id="txtUsuario" placeholder="Nome do usuário" value="<?=$usuario?>>
	  </div>
	  
	  <div class="form-group">
		<label for="txtDataComentario">Data</label>
		<input type="datetime-local" class="form-control" id="txtDataComentario" placeholder="Data" value="<?=$dataPublicacao?>>
	  </div>
	  
	  <div class="form-group">
		<label for="txtIp">IP</label>
		<input type="text" class="form-control" id="txtIp" placeholder="Número do IP" value="<?=$ip?>>
	  </div>
	  
	  <div class="form-group">
		<label for="txtComentario">Comentário</label>
		<textarea class="form-control" id="txtComentario" rows="3"></textarea>
	  </div>
	  <button class="btn btn-primary" type="submit" name="btnEnviar">Enviar</button>
	  <button class="btn btn-danger" type="submit" name="btnExcluir">Excluir</button>
	</form>
	

		<!-- Antigos -->
	<?php if($eEdicao) {?>	
	<div class="container">
	  <div class="my-3 p-3 bg-white rounded shadow-sm">
		<h6 class="border-bottom border-gray pb-2 mb-0">Comentários</h6>
		<?php 
			$comentarios = listarComentario($_GET["id"]);
			foreach($comentarios as $i) { 
		?>
		<div class="media text-muted pt-3">
		  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
		  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			<strong class="d-block text-gray-dark">@username</strong>
			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
		  </p>
		</div>
		<div class="media text-muted pt-3">
		  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
		  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			<strong class="d-block text-gray-dark">@username</strong>
			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
		  </p>
		</div>
		<div class="media text-muted pt-3">
		  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
		  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			<strong class="d-block text-gray-dark">@username</strong>
			Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
		  </p>
		</div>
		<small class="d-block text-right mt-3">
		  <a href="#">All updates</a>
		</small>
	  </div>
	</div>
  </div> 
  
 <?php require_once("inc/footer.php"); ?>