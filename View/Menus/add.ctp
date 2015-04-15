

<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Menus',array('controller' => 'Menus', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>

				<?php echo $this->Html->link('Agregar Menus',array('controller' => 'Menus', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      			<?php echo $this->Html->link('Asignacion de Menus',array('controller' => 'Menus', 'action' => 'Asignacionperfil', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
     
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">	

		<h2 id="input-groups-basic">Agregar Menu</h2>
		
	<?php echo $this->Form->create('Menu',array('action' => 'add', 'id' => 'formulario','type' => 'file', 'role' => 'form')); ?>

	

<div class="row">
		
			
		<div class="col-md-11">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombre del menu</label>
	          <?php echo $this->Form->input('Menu.nombre',array('label'=>false,'placeholder'=>'nombre', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>



		<div class="col-md-11">
			<div class="form-group">
	          <label for="exampleInputEmail1">URL</label>
	          <?php echo $this->Form->input('Menu.url',array('label'=>false,'placeholder'=>'url', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>



		<div class="col-md-11">
			<div class="form-group">
	          <label for="exampleInputEmail1">css</label>
	          <?php echo $this->Form->input('Menu.css',array('label'=>false,'placeholder'=>'css', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>

	<div class="col-md-11">
		<div class="form-group">
			<label for="exampleInputEmail1">Menu Padre</label>
			 <?php	echo $this->Form->select('Menu.idpadre',$MenusPadresArray, array('label'=>true)); ?>
		</div>
	</div>
	


		<div class="col-md-11">
			<div class="form-group">
	          <label for="exampleInputEmail1">Orden</label>
	          <?php echo $this->Form->input('Menu.orden',array('label'=>false,'placeholder'=>'orden', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>



		<div class="col-md-11">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Agregar Menu','class' =>  'btn btn-default')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


