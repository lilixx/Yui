<div class="col-md-3"> 
	<div class="list-group">
		<?php echo $this->Html->link('Mostrar Tipos de Cargos',array('controller' => 'Tipocargos', 'action' => 'adminview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		<?php echo $this->Html->link('Agregar Tipo de cargos',array('controller' => 'Tipocargos', 'action' => 'adminadd', 'full_base' => true),  array('class' => 'list-group-item')); ?>      
	 </div>
</div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
		
		

		<h2 id="input-groups-basic">Agregar Tipo de cargo</h2>
		
		<?php echo $this->Form->create('Tipocargo',array('action' => 'adminadd', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombre</label>
	          <?php echo $this->Form->input('Tipocargo.nombre',array('label'=>false,'placeholder'=>'Nombre', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>


		
		<div class="col-md-6">
			<br/>
		</div>



		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Agregar tipo de cargo','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>
