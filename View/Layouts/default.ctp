<?php	$URLSITE = Router::url('/', true);	?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Mansión Teodolinda - Sistema de reservaciones en línea</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

<?php echo $this->Html->charset(); ?>

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<?php	// echo $this->Html->script('jquery-loader'); ?>


<!-- SmartMenus jQuery plugin + Dashboard JS -->
<?php echo $this->Html->script('jquery.smartmenus');

      echo $this->Html->script('modernizr.custom'); ?>

<!-- SmartMenus jQuery init -->
<script type="text/javascript">
	$(function() {
		$('#main-menu').smartmenus({
			subMenusSubOffsetX: 1,
			subMenusSubOffsetY: -8
		});
	});
</script>
<script>
$(function() {
  $('#menu-button').click(function() {
    var $this = $(this),
        $menu = $('#main-menu');
    if (!$this.hasClass('collapsed')) {
      $menu.addClass('collapsed');
      $this.addClass('collapsed');
    } else {
      $menu.removeClass('collapsed');
      $this.removeClass('collapsed');
    }
    return false;
  }).click();
});
</script>

<!-- LAS HOJAS DE ESTILO -->
    <?php echo $this->Html->css('bootstrap');
    echo $this->Html->css('mansion');
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('sm-core-css');
    echo $this->Html->css('sm-blue');
    echo $this->Html->css('default');	
    echo $this->Html->css('component');	?>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>

<!-- #main-menu config - instance specific stuff not covered in the theme -->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php
      echo $this->Html->script('html5shiv');
      echo $this->Html->script('respond.min');
      ?>

<?php echo $this->fetch('css'); 
      echo $this->fetch('script');
?>
</head>

<body>

<!-- INICIA ENCABEZADO Y MENÚ -->
    <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="fondo">
		<br/>
		<?php	/*<img src="img/logo.png" alt="" class="logo" /> */?>
		<?php	echo $this->Html->image("logo.png", array("alt" => "Mansion Teodolinda"), array("class"=>"Logo")); ?>
		<br/><br/>
      </div>
<!-- FINALIZA ENCABEZADO -->      

<!-- INICIA MENU -->
<ul id="main-menu" class="sm sm-blue">

<?php	echo $this->Session->read('MenuPrincipal'); ?>


<li><a href="#" style="padding: 7px 15px 0px;">
   <img src="<?php echo $URLSITE . "uploads/usuarios/" . $this->Session->read('Usuario.ImagenU'); ?>" alt="" width="40px" height="40px" style="margin-right: 10px; border-radius: 3px;" ><?php echo $this->Session->read('Usuario.NombreU');  ?></a>
	<ul class="mega-menu">
			<li><img src="<?php echo $URLSITE . "uploads/usuarios/" . $this->Session->read('Usuario.ImagenU'); ?>" alt="" width="156px" height="150px"></li>
	        <li><a href="<?php	echo $URLSITE . "Usuarios/perfil"; ?>">Perfil de Usuario</a></li>
	        <li><a href="<?php	echo $URLSITE . "Usuarios/logout"; ?>">Cerrar sesión</a></li>	</ul>  
  </li>

</ul>
<!-- FINALIZA MENU -->


</div>
<!-- INICIA CONTENIDO -->



  <!-- MENU IZQUIERDA
    ================================================== -->
	<div class="container bs-docs-container">
	 

 	<?php echo $this->Session->flash(); ?>
    
    <?php echo $this->fetch('content'); ?>
    
</div> <!--fin de container bs-docs-container -->

      <hr>
<!-- FINALIZA CONTENIDO -->


<!-- INICIA FOOTER -->
      <footer>
        <p>&copy; 2013 <a href="http://www.teodolinda.com.ni">Mansión Teodolinda</a>.</p>
      </footer>
    </div> <!-- /FOOTER -->

		<?php echo $this->Html->script('grid'); ?>
		<script>
			$(function() {
				Grid.init();
			});
		</script>

</body>
</html>
