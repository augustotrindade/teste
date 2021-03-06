<?php 
$site = $GLOBALS['site'];		
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Projeto de Teste</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo $site?>/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo $site?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo $site?>/css/main.css">

        <script src="<?php echo $site?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?php echo $site?>/js/vendor/jquery-1.11.0.min.js"></script>
        <script src="<?php echo $site?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo $site?>/js/plugins.js"></script>
        <script src="<?php echo $site?>/js/main.js"></script>
    </head>
<body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    	<div class="container-fluid">
    		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand" href="<?php echo $site?>">Projeto de Teste</a>
    		</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="<?php echo $site?>/usuario/index.php">Perfil</a></li>
        			<li><a href="<?php echo $site?>/carros/index.php">Manter Carros</a></li>
<!--         			<li class="dropdown"> -->
<!--           				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a> -->
<!--           				<ul class="dropdown-menu" role="menu"> -->
<!-- 				            <li><a href="#">Action</a></li> -->
<!-- 				            <li><a href="#">Another action</a></li> -->
<!-- 				            <li><a href="#">Something else here</a></li> -->
<!-- 				            <li class="divider"></li> -->
<!-- 				            <li><a href="#">Separated link</a></li> -->
<!-- 				            <li class="divider"></li> -->
<!-- 				            <li><a href="#">One more separated link</a></li> -->
<!--           				</ul> -->
<!--         			</li> -->
      			</ul>
      
      			<ul class="nav navbar-nav navbar-right">
        			<li><a href="<?php echo $site?>/logout.php">Sair</a></li>
      			</ul>
   			</div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
    
    <div class="container">