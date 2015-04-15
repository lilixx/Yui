<?php // echo $this->Html->script('jquery-loader'); ?>
<?php
/*
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<script src="http://jsfiddle.net/echo/jsonp/</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
*/?>

<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script>
	$("document").ready(
function() {

    $('#select_categoria').bind('click', function()
    {
        $.ajax({
               type: "GET",
               url: "/ordenes/searchcargo/"+$(this).val(),
               beforeSend: function() {
                     $('#div_subcategorias_wrapper').html('<div class="rating-flash" id="cargando_div">Cargando  <img src="/img/url.gif"></div>');
                     },
               success: function(msg){
                   $('#div_subcategorias_wrapper').html(msg);
               }
             });
    });

}
);

</script>



	  <div class="col-md-3"> 
      		<div class="list-group">
	      	  	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'folios', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar Estado de Cuentas',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Tipo de Ordenes',array('controller' => 'Tipordenes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			</div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
	

		<h2 id="input-groups-basic">Agregar Orden</h2>
		
		<?php echo $this->Form->create('Ordene',array('action' => 'crearorden/'.$id)); ?>
	

<div class="row">
	
  	<div class="col-md-12">
    	<div class="form-group">
			 <label for="exampleInputEmail1"> Seleccione el Tipo de Orden </label>
					
			<?php echo $this->Form->select('tipoid',$TipordenArray, array('label'=>true, 'class'=>'form-control', 'id' =>'select_categoria', 'required'=>"required")); ?>
					
	  </div>
   </div>	
   
  

<div class="col-md-8">
  <div class="form-group">
        <div id="div_subcategorias_wrapper"></div>
  </div>
</div>
		

<div class="col-md-4">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Guardar','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>



	
</div>



		  

  
</div>
