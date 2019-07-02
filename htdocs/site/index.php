<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Site</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">

    <!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
	</head>
  <body>
	<?php require_once("header.php");?>

	<main role="main">

		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/montanha.jpg" class="d-block w-100" height="800" alt="Montanhas">
			</div>
		  </div>
		</div>
		<br/>
		<br/>

	  <!-- Marketing messaging and featurettes
	  ================================================== -->
	  <!-- Wrap the rest of the page in another container to center all the content. -->

	  <div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row">
		  <div class="col-lg-4">
			
			<h2>Texto</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-secondary" href="#" role="button">Ler mais &raquo;</a></p>
		  </div><!-- /.col-lg-4 -->
		  <div class="col-lg-4">
			
			<h2>Notícias</h2>
			<ul class="list-group">
			  <li class="list-group-item"><a href="https://news.google.com/articles/CBMidGh0dHBzOi8vZzEuZ2xvYm8uY29tL211bmRvL25vdGljaWEvMjAxOS8wNS8wMi9wYXJhLW1vc3RyYXItYXBvaW8tZGUtZm9yY2FzLWFybWFkYXMtbWFkdXJvLW1hcmNoYS1jb20tbWlsaXRhcmVzLmdodG1s0gF_aHR0cHM6Ly9nMS5nbG9iby5jb20vZ29vZ2xlL2FtcC9tdW5kby9ub3RpY2lhLzIwMTkvMDUvMDIvcGFyYS1tb3N0cmFyLWFwb2lvLWRlLWZvcmNhcy1hcm1hZGFzLW1hZHVyby1tYXJjaGEtY29tLW1pbGl0YXJlcy5naHRtbA?hl=pt-BR&gl=BR&ceid=BR%3Apt-419">Cras justo odio</a></li>
			  <li class="list-group-item"><a href="#">Dapibus ac facilisis in</a></li>
			  <li class="list-group-item"><a href="#">Morbi leo risus</a></li>
			  <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
			  <li class="list-group-item"><a href="#">Vestibulum at eros</a></li>
			</ul>
			<br/>
			<p><a class="btn btn-secondary" href="#" role="button">Ver todas &raquo;</a></p>
		  </div><!-- /.col-lg-4 -->
		  <div class="col-lg-4">
			
			<h2>Texto</h2>
			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			<p><a class="btn btn-secondary" href="#" role="button">Ler mais &raquo;</a></p>
		  </div><!-- /.col-lg-4 -->
		</div><!-- /.row -->


	  </div><!-- /.container -->

	</main>
	<?php require_once("footer.php");?>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
	</script>
	</body>
</html>
