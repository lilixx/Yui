 <?php echo $this->Html->script('jquery-loader'); ?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />


<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Habitaciones',array('controller' => 'Habitaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		     <?php echo $this->Html->link('Agregar Habitacion',array('controller' => 'Habitaciones', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 

<div class="col-md-9">

<h2 id="input-groups-basic">Agregar Habitacion</h2>
<?php
	echo $this->Form->create('Habitacione',array('action' => 'add', 'id' => 'formulario','type' => 'file'));
?>

<div class="row">


    <div class="col-md-6">
    	<div class="form-group">
     	<label>Numero de habitacion</label>
			<?php
                echo $this->Form->input('numhab', array('label' =>false, 'class'=>'form-control'));
            ?>
    	</div>
    </div>
    
        
    <div class="col-md-6">
   		 <div class="form-group">
    		
    	  </div>
    </div>
    
    <div class="col-md-6">
    	<div class="form-group">
            <label>Tipo de habitacion</label>
            <?php
			   echo $this->Form->select('Habitacione.tipohabitacionid',$TipohabitacioneArray, array('label'=>false)); 
            ?>
    	</div>
    </div>
    
    <div class="col-md-10">
         <div class="form-group">
         <label> Descripcion </label>
    		
				<?php 
                    echo $this->Form->input('Habitacione.descripcion',array('label'=> false, 'class'=>'form-control'));
                ?>
    	  </div>
    </div>
    
  <div class="col-md-6">
   		 <div class="form-group">
           <label>Estado de habitacion</label>
            <?php
			   echo $this->Form->select('Habitacione.estadohabitacionid',$EstadohabitacioneArray, array('label'=>true)); 
            ?>
    	</div>
    </div>
    
      	<div class="col-md-6">
		    <div class="form-group">
	            <label>Imagen</label>
				<?php 
                      echo $this->Form->input('archivo',array('type' => 'file'));
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