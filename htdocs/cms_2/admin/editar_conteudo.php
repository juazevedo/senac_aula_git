<?php 
	require_once("inc/header.php");
	$eEdicao = NULL;
	$dataPublicacao = NULL;
	$titulo = NULL;
	$texto = NULL;
	$ativo = NULL;
	$listSessao = listarSessao();
	$sessaoId = NULL;
	if(!isset($_GET["id"])) { // Inclusão
		$eEdicao = false;
		if(isset($_POST["btnIncluir"])) {
			echo $_POST["txtData"];
			exit();
			$id = incluirConteudo(formataData($_POST["txtData"]), $_POST["txtTitulo"], $_POST["txtTexto"], $_POST["selAtivo"], $_POST["selSessao"]);
			if(!is_null($id)) {
				header("location:editar_conteudo.php?id=$id&msg=incluir-sucesso");
			} else { 
				echo "<script> $('#msg').display = block; </script>";
			} 
		}
	} else { // alteração ou exclusão
		$eEdicao = true;
		if(isset($_POST["btnAlterar"])) {
			
			$controle = alterarConteudo($_GET["id"], formataData($_POST["txtData"]), $_POST["txtTitulo"], $_POST["txtTexto"], $_POST["selAtivo"], $_POST["selSessao"]);
			if($controle) {
				$id = $_GET["id"];
				header("location:editar_conteudo.php?id=$id&msg=alterar-sucesso");
			} else {
				
			}
		} else if(isset($_POST["btnExcluir"])) {	
			$controle = excluirConteudo($_GET["id"]);
			if($controle) {
				header("location:listar_conteudo.php");
			} else {
				
			}
		} else {
			$reg = consultarConteudo($_GET["id"]);
			$dataPublicacao = formataData($reg["data_publicacao"]);
			$titulo = $reg["titulo"];
			$texto = $reg["texto"];
			$ativo = $reg["ativo"];
			$sessaoId = $reg["sessao_id"];
		}
	}
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $eEdicao ? "Editar" : "Adicionar"?> Conteúdos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="listar_conteudo.php" class="btn btn-sm btn-outline-primary">Voltar</a>
          </div>
        </div>
      </div>

      <h2>Editar</h2>
	  <div class="row">
		<div id="msg" class="alert alert-success" role="alert" style="display:none;">
			A simple success alert—check it out!
		</div>
	  </div>
      <div class="row">
		<div class="col-md-12">
			<form method="post" action="#">
				<div class="form-group">
					<label for="txtData">Data:</label>
					<input type="date" class="form-control" id="txtData" name="txtData" required placeholder="Data do conteúdo" value="<?=$dataPublicacao?>" />
				</div>
				<div class="form-group">
					<label for="txtTitulo">Título:</label>
					<input type="text" class="form-control" id="txtTitulo" name="txtTitulo" required placeholder="Título do conteúdo" value="<?=$titulo?>" />
				</div>
				<div class="form-group">
					<label for="txtTexto">Texto:</label>
					<input type="text" class="form-control" id="txtTexto" name="txtTexto" required placeholder="Texto do conteúdo" value="<?=$texto?>" />
				</div>
				<div class="form-group">
					<label for="selAtivo">Ativo:</label>
					<select name="selAtivo" id="selAtivo" class="form-control" required>
						<option value="">Selecione um opção</option>
						<option value="1" <?= $ativo == 1 ? "selected='selected'" : "" ?> >Sim</option>
						<option value="0" <?= $ativo == 0 ? "selected='selected'" : "" ?> >Não</option>
					</select>
				</div>
				<div class="form-group">
					<label for="selSessao">Sessão:</label>
					<select name="selSessao" id="selSessao" class="form-control" required>
						<option value="">Selecione um opção</option>
						<?php foreach($listSessao as $i) { ?>
							<option value="<?=$i["id"]?>"><?=$i["nome"]?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="form-group">
					<?php if(!$eEdicao) { ?>
					<input type="submit" name="btnIncluir" id="btnIncluir" class="btn btn-success" value="Adicionar" />
					<?php } else { ?>
					<input type="submit" name="btnAlterar" id="btnAlterar" class="btn btn-success" value="Salvar" />
					<input type="submit" name="btnExcluir" id="btnExcluir" class="btn btn-danger" value="Excluir" />
					<?php } ?>
				</div>
			</form>
		</div>
      </div>
    </main>
  <?php require_once("inc/footer.php"); ?>