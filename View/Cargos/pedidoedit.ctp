
   <head>
    
 <?php echo $this->Html->script('jquery-loader'); ?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

 <!--script calendario de nacimiento
    ================================================== -->
  
    <script type="text/javascript">
$(function() {
	$('#dob').datepicker({dateFormat: 'yy/mm/dd', changeMonth: true, changeYear: true, yearRange: '-100:-10', minDate:"-100Y -0D", maxDate: "-10Y -0D"});
});
</script>

 <!--fin del script calendario nacimiento
    ================================================== --> 
    
       
    <!--script calendario fecha entrada y salida
       ================================================== --> 
<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
           
        });
        
 $(document).ready(function() {
    // obtenemos la fecha actual
    var date = new Date();
    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();    
    // inicializamos datapicker para cada input en este caso con la fecha activa a partir del dia de hoy y con el formato de fecha dd/mm/yy                
    $("#inicio").datepicker({minDate: new Date(y, m, d), dateFormat: 'yy/mm/dd'});
    $("#fin").datepicker({minDate: new Date(y, m, d), dateFormat: 'yy/mm/dd'});

 });
    </script>

<!--fin del script calendario fecha entrada y salida
   ================================================== -->
  
   </head>


  <!-- COLUMNA IZQUIERDAA
    ================================================== -->

	  <div class="col-md-3"> 
      		<div class="list-group">
		      	<?php echo $this->Html->link('Servicios',array('controller' => 'Cargos', 'action' => 'servicioview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		    	<?php echo $this->Html->link('Pedidos',array('controller' => 'Cargos', 'action' => 'pedidoview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                <?php echo $this->Html->link('Promociones',array('controller' => 'Cargos', 'action' => 'promocioneview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                <?php echo $this->Html->link('Transportes',array('controller' => 'Cargos', 'action' => 'transporteview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			    <?php echo $this->Html->link('Categorias',array('controller' => 'Categorias', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>     
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
		
		

		<h2 id="input-groups-basic">Editar Pedido</h2>
		
		<?php echo $this->Form->create('Cargo',array('action' => 'pedidoedit', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombre</label>
	          <?php echo $this->Form->input('Cargo.nombre',array('label'=>false,'placeholder'=>'Ingrese el nombre', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>

	<?php   echo $this->Form->input('id', array('type' => 'hidden')); ?> 

        <div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Precio</label>
	          <?php echo $this->Form->input('Cargo.precio',array('label'=>false,'placeholder'=>'Ingrese el precio', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>
      
      <div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Categoria</label>
	            <?php echo $this->Form->select('Cargocategoria.categoria_id',$CategoriasArray, array('label'=>false,'placeholder'=>"categoria", 'class'=>'form-control')); ?> <br/>
 	         
 	           <label for="exampleInputEmail1">Fecha Fin</label>
	           <?php echo $this->Form->input('Cargo.fechafin',array('label'=>false,'type'=> "datepicker", 'id'=>"fin",'readonly'=>"readonly", 'size'=>"5",'class'=>'form-control')); ?>
 	        </div>
		</div>
		
	 <div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Fecha de Inicio</label>
	        <?php echo $this->Form->input('Cargo.fechainicio',array('label'=>false,'type'=> "datepicker", 'id'=>"inicio",'readonly'=>"readonly", 'size'=>"5",'class'=>'form-control')); ?>
	        </div>
		</div>	
           
   	<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Descripcion</label>
	          <?php echo $this->Form->input('Cargo.descripcion',array('label'=>false,'placeholder'=>'Ingrese la descripcion', 'class'=>'form-control')); ?>
	        </div>
		</div>
          
	
		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Editar Pedido','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


