 <?php echo $this->Html->script('jquery-loader'); ?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />


<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Estados de habitaciones',array('controller' => 'Estadohabitaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Agregar Estado de habitacion',array('controller' => 'Estadohabitaciones', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 

<div class="col-md-9">

<h2 id="input-groups-basic">Agregar Estado de habitacion</h2>
<?php
	
	echo $this->Form->create('Estadohabitacione');  
?>

<div class="row">

    <div class="col-md-6">
    	<div class="form-group">
     	<label>Nombre</label>
			<?php
                echo $this->Form->input('nombre', array('label' =>false, 'class'=>'form-control'));
            ?>
    	</div>
    </div>
      
    
	<div class="col-md-6">
   		 <div class="form-group">
			<?php 
                echo $this->Form->end('Guardar', array('label' => 'Guardar Tipo','class' =>  'btn btn-default dropdown-toggle'));
            ?>
   		 </div>
    </div>



    </div>
 
	
	

</div>