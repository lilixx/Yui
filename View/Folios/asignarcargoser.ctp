 <div class="col-md-3"> 
      		<div class="list-group">
	      	
		       	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Monstrar Estado de Cuentas',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			</div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
		
		

		<h2 id="input-groups-basic">Cargar Servicio</h2>
		
		<?php echo $this->Form->create('Cargosfolio',array('action' => 'asignarCargo/'.$id)); ?>
	

<div class="row">
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Seleccione el Servicio </label> <br/>
	            <?php 
	             if(isset($CargosArray)) {
			    	echo $this->Form->select('cargoid',$CargosArray, array('label'=>false,'required'=>"required", 'class'=>'form-control'));
			     }	
			  ?>
		       <label for="exampleInputEmail1"> Cantidad </label>
		        <?php echo $this->Form->input('Cargosfolio.cantidad',array('label'=>false,'placeholder'=>'Cantidad', 'class'=>'form-control')); ?> 
		    	    
	        </div>
		</div>
		
	     

		<div class="col-md-10">
			<div class="form-group">
			
		</div>
		</div>	
		
		
		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Aceptar','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>
     
    
	
</div>



		  

  
</div>



