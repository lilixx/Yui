
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
	      	
		      	<?php echo $this->Html->link('Mostrar Reservaciones',array('controller' => 'Reservaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Agregar Reservacion',array('controller' => 'Reservaciones', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
		
		

		<h2 id="input-groups-basic">Agregar Reservaci&oacute;n</h2>
		
		<?php echo $this->Form->create('Reservacione',array('action' => 'add', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">
		
			
		<div class="col-md-6"> 
			<div class="form-group">
	          <label>Cliente</label>
	          <?php 
				echo $this->Form->select('Reservacione.clienteid', $ClienteArray, array('label'=>false,'class'=>'form-control')); 
			  ?>
	        </div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
	          <label>Cantidad de Adultos</label>
	          <?php echo $this->Form->input('Reservacione.cantadultos',array('label'=>false,'placeholder'=>'Numero de adultos', 'class'=>'form-control')); ?>
	        </div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
	          <label>Cantidad de Ni&ntilde;os</label>
	          <?php echo $this->Form->input('Reservacione.cantninos',array('label'=>false,'placeholder'=>'Numero de niÃ±os', 'class'=>'form-control')); ?>
	        </div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
	          <label>Fecha de Inicio</label>
	        <?php echo $this->Form->input('Reservacione.fechaentrada',array('label'=>false,'type'=> "datepicker", 'id'=>"inicio",'readonly'=>"readonly", 'size'=>"5",'class'=>'form-control')); ?>
	        </div>
		</div>


              
               <div class="col-md-6">
			<div class="form-group">
	          <label>Fecha Fin</label>
	        <?php echo $this->Form->input('Reservacione.fechasalida',array('label'=>false,'type'=> "datepicker", 'id'=>"fin",'readonly'=>"readonly", 'size'=>"5",'class'=>'form-control')); ?>
	        </div>
		</div>
        
        
                <div class="col-md-6">
			<div class="form-group">
	         	         <br/> <br/> <br/>
	        </div>
		</div>
        
		<div class="col-md-6">
			<div class="form-group">
	          <label>Estado de la reserva</label>
	          <?php 
			  echo $this->Form->select('Reservacione.estadoreservacionid', $EstadoreservaArray, array('label'=>false,'class'=>'form-control')); 
			 ?>
	        </div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
	          <label>Cantidad de habitaciones</label>
	          <?php echo $this->Form->input('Reservacione.canthab',array('label'=>false,'placeholder'=>'cantidad de habitaciones', 'class'=>'form-control')); ?>
	        </div>
		</div>
        
        
		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Agregar Reserva','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


