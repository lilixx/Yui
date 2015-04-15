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
    
		
		

		<h2 id="input-groups-basic">Agregar Tipo de Orden</h2>
		
		<?php echo $this->Form->create('Tipordene',array('action' => 'add', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombre</label>
	          <?php echo $this->Form->input('Tipordene.nombre',array('label'=>false,'placeholder'=>'Ingrese el nombre', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>
		
  <div class="col-md-11">
    <div class="form-group">	
    	 <label>Seleccione las categoria para el Tipo de Orden </label> <br/>
	     <?php  foreach($CategoriaArray as $cat){ ?>	
         <b><?php	echo $cat['Categoria']['nombre']; ?></b> 

          <input type="checkbox" name="data[Categoriatipordene][][categoria_id]" value="<?php	echo $cat['Categoria']['id']; ?>" id="menuselect" /> &nbsp;
         <?php }	?>
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
	              <?php	echo $this->Form->end(array('label' => 'Agregar Tipo de Orden','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


