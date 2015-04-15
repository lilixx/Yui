<?php	$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.png">
    
    <?php echo $this->Html->charset(); ?>

    <title>
		Hotel Mansion Teodolinda
	</title>
	
	
	<?php
		echo $this->Html->meta('icon');
		
		/* ========= Bootstrap core CSS ========= */
		echo $this->Html->css('bootstrap');
		/* ========= Bootstrap core CSS ========= */
		echo $this->Html->css('mainstyle');

	?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php
      echo $this->Html->script('html5shiv');
      echo $this->Html->script('respond.min');
      ?>
    <![endif]-->

   <?php	
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    
</head>

<!-- NAVBAR
================================================== -->
  <body>
<?php	echo "hola";	?>

<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand">
      

            
       <img alt="Inicio" src="img/mt-logo.png" style="height: 50px; width: 200px;"> 
      
      </a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="#">Inicio</a>
        </li>
        <li>
          <a href="catalogos.php">Reservaciones</a>
        </li>
        <li>
          <a href="catalogos.php">Clientes</a>
        </li>
        <li>
          <a href="contacto.php">Otros</a>
        </li>
      </ul>
      
      
      <div class="navbar-form navbar-right" role="search">
	     <div>
	     <img src="img/lila.png" alt="" />
	     </div>
      </div>      
      
    </nav>
  </div>
</header>



  <!-- MENU IZQUIERDA
    ================================================== -->
  <div class="container bs-docs-container" style="margin-top: 90px;">
	  <div class="col-md-3">
      
      
      <div class="list-group">
		      		<a href="#" class="list-group-item active">Administrar</a>
			        <a href="#" class="list-group-item">Clientes</a>
			        <a href="#" class="list-group-item">Habitaciones</a>
			        <a href="#" class="list-group-item">Folios</a>
			        <a href="#" class="list-group-item">Pedidos</a>
			        <a href="#" class="list-group-item">Reservaciones</a>
			        <a href="#" class="list-group-item">Estados de cuenta</a>
			        <a href="#" class="list-group-item">Precios</a>
			        <a href="#" class="list-group-item">Promociones</a>
			        <a href="#" class="list-group-item">Reportes</a>
			        <a href="#" class="list-group-item">Logout</a>			        
		        </div>
      
      
      
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
    <?php echo $this->Session->flash(); ?>
    
    <?php echo $this->fetch('content'); ?>

    
    <?php /*
    <div class="panel panel-primary">
	 <div class="panel-heading">Panel heading</div>	
    <div class="bs-docs-section">
     
   
      <div class="row">
        <div class="col-sm-6 col-md-3">
           <a href="#" class="thumbnail">
            <img data-src="holder.js/100%x180" alt="...">
           </a>
        </div>
        <div class="col-sm-6 col-md-3">
           <a href="#" class="thumbnail">
             <img data-src="holder.js/100%x180" alt="...">
           </a>
        </div>
        <div class="col-sm-6 col-md-3">
           <a href="#" class="thumbnail">
             <img data-src="holder.js/100%x180" alt="...">
           </a>
        </div>
        <div class="col-sm-6 col-md-3">
           <a href="#" class="thumbnail">
             <img data-src="holder.js/100%x180" alt="...">
          </a>
        </div>
      </div>
  

  </div> 
  </div> 
  
  */	?>
  
  
  
  </div>
  </div> <!--fin de container bs-docs-container -->
  
    <!-- FOOTER
    ================================================== -->
  
    <div class="container marketing">

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Hotel Mansion Teodolinda. &middot; <a href="#">Log Out</a> &middot; <a href="#">Ayuda</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>
