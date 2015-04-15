<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.png">
    
    <?php echo $this->Html->charset(); ?>

    <title>Hotel Mansion teodolinda	</title>

<?php
		echo $this->Html->meta('icon');
		
		/* ========= Bootstrap core CSS ========= */
		echo $this->Html->css('bootstrap');
		/* ========= Bootstrap core CSS ========= */
		echo $this->Html->css('login');

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
	?>  </head>

<body>




<div class="flashlayout">
	<?php echo $this->Session->flash(); ?>
</div>

<div>
    <?php echo $this->fetch('content'); ?>
</div>


     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
   

</body>

</html>
