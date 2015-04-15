<!-- COLUMNA IZQUIERDAA
    ================================================== -->

	 <div class="col-md-3"> 
      		<div class="list-group">
	      	  	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'Cubetas', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		       	<?php echo $this->Html->link('Tipo de Ordenes',array('controller' => 'Tipordenes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			</div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
		
		

		<h2 id="input-groups-basic">Editar Tipo de Orden</h2>
		
		<?php echo $this->Form->create('Tipordene',array('action' => 'edit', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">

       <?php   echo $this->Form->input('id', array('type' => 'hidden')); ?> 
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombre</label>
	          <?php echo $this->Form->input('Tipordene.nombre',array('label'=>false,'placeholder'=>'Ingrese el nombre', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>
		
			
      	<div class="col-md-6">
      	  <div class="form-group">
      	    <br/> <br/>
      	  </div>  
      	</div>
      	
        <div class="col-md-6">
      	  <div class="form-group">
      	    <br/> 
      	  </div>  
      	</div>
      	
            	
		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Editar Tipo de Orden','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


