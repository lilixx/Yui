
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
    
		
		

		<h2 id="input-groups-basic">Agregar Categoria</h2>
		
		<?php echo $this->Form->create('Categoria',array('action' => 'add', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombre</label>
	          <?php echo $this->Form->input('Categoria.nombre',array('label'=>false,'placeholder'=>'Ingrese el nombre', 'required'=>"required", 'class'=>'form-control')); ?>
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
	              <?php	echo $this->Form->end(array('label' => 'Agregar Categoria','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


