 <!-- COLUMNA IZQUIERDAA
    ================================================== -->

	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Huespedes',array('controller' => 'Huespedes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Búsqueda de Huespedes',array('controller' => 'Huespedes', 'action' => 'search', 'full_base' => true),  array('class' => 'list-group-item')); ?>		       
			      
		    </div>
      </div> 
      
  <div class="col-md-9">
    
		<h2 id="input-groups-basic">Agregar Huéspedes</h2>
		
		<?php echo $this->Form->create('Huespede',array('action' => 'habhuesped', 'id' => 'formulario', 'role' => 'form')); ?>
	

 <div class="row">

        <div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Seleccione la Habitación </label>
	      <?php   echo $this->Form->select('Habitacione.id',$HabitacioneArray, array('label'=>false,'placeholder'=>"contacto")); ?> <br/> <br/>
 	        </div>
		</div>
		
	<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Enviar','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>
		
  </div>
  </div>		    						
		
