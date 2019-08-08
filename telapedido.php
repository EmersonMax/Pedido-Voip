#!/usr/bin/php7.0
<?php
// definições de host, database, usuário e senha
$host = "localhost";
$db   = "pedidos";
$user = "voip";
$pass = "123456";
// conecta ao banco de dados
$con = mysqli_connect($host,$user,$pass)
     or die("Sem acesso ao servidor local de banco de dados: " . mysqli_error());
mysqli_select_db($con,$db) or die("Base de dados Pedidos nao encontrada.");
//$con = mysqli_connect("host", "user", "pass", "db") or trigger_error(mysql_error(),E_USER_ERROR); 
// seleciona a base de dados em que vamos trabalhar
//mysql_select_db($db, $con);
// cria a instrução SQL que vai selecionar os dados
//$query1 = sprintf("INSERT INTO pedido (id,pedido) VALUES(7,7)");
$query = sprintf("SELECT * FROM pedido");

// executa a query
//mysqli_query($con, $query1) or die(mysqli_error());
$dados = mysqli_query($con, $query) or die(mysqli_error());
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>				
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pedidos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	</head>
	<body>
	<div id="fh5co-offcanvas">
		<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
		<div class="fh5co-bio">
			<figure>
				<img src="images/person1.jpg" alt="Free HTML5 Bootstrap Template" class="img-responsive">
			</figure>
			<h3 class="heading">Pedidos VoiP</h3>
			<h2>Projeto de VoiP</h2>
			<p>Desenvolido Por Emerson Max e Jadson silva</p>
			<ul class="fh5co-social">
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-instagram"></i></a></li>
			</ul>
		</div>

		
	</div>
	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header">
		
		<div class="container-fluid">

			<div class="row">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
				</ul>
				<div class="col-lg-12 col-md-12 text-center">
					<h1 id="fh5co-logo"><a href="index.html">Pedidos <sup>VoiP</sup></a></h1>
				</div>

			</div>
		
		</div>

	</header>
	<!-- END #fh5co-header -->
	

<?php
    
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
?>           
			<div id="pedido"><p>  <b> Pedido:</b> <?=$linha['id']?> <br><p>  <b> Nome Produto:</b> <?=$linha['nomeproduto']?> <br> <b>Codigo Produto:</b> <?=$linha['pedido']?> <br> <b>Quantidade:</b> <?=$linha['quantidade']?> <br> <b>Valor Total:</b> R$<?=$linha['valortotal']?><br><b>Hora Pedido:</b><?=$linha['hora']?> </p></div><br>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if 
	}
?>
	
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='30;URL=pedido.php'>";
?>
			
		



	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

