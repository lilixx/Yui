<style type="text/css">

#UsuarioIdperfil{
	height: 30px;
	width: 100%;
	margin-bottom: 6px;
} 

</style>


<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar usuarios',array('controller' => 'Usuarios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar tasa de cambio',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
               
		    </div>
      </div> 
      
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">	

		<h2 id="input-groups-basic">Agregar Usuario</h2>
		
	<?php echo $this->Form->create('Usuario',array('action' => 'adminadd', 'id' => 'formulario','type' => 'file', 'role' => 'form')); ?>

	

<div class="row">
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombre</label>
	          <?php echo $this->Form->input('Usuario.nombres',array('label'=>false,'placeholder'=>'Nombre', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>


		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Apellidos</label>
	          <?php echo $this->Form->input('Usuario.apellidos',array('label'=>false,'placeholder'=>'Apellidos', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>
	



		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Usuario</label>
	          <?php echo $this->Form->input('Usuario.username',array('label'=>false,'placeholder'=>'Username', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>





		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Password</label>
	           <?php echo $this->Form->input('Usuario.password',array('label'=>false,'placeholder'=>'Password', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>


		
	<div class="col-md-6">
			
	          <label for="exampleInputEmail1">Email</label>
	        
			<div class="input-group">
			  	<span class="input-group-addon">@</span>		  
			    <?php echo $this->Form->input('Usuario.email',array('label'=>false,'placeholder'=>'Email', 'required'=>"required", 'class'=>'form-control')); ?>
				</div>	        
		
	</div>
	
	
	
	<div class="col-md-6">
		<div class="form-group">
			<label for="exampleInputEmail1">Perfil de usuario</label>
			 <?php	echo $this->Form->select('Usuario.idperfil',$PerfilesArray, array('label'=>true)); ?>
		</div>
	</div>
	
	
	
	

		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Tel&eacute;fono</label>
	          <?php echo $this->Form->input('Usuario.telefono',array('label'=>false,'placeholder'=>'Telefono', 'class'=>'form-control')); ?>
	        </div>
		</div>


		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Celular</label>
	          <?php echo $this->Form->input('Usuario.celular',array('label'=>false,'placeholder'=>'Celular', 'class'=>'form-control')); ?>
	        </div>
		</div>
	
	
			
		

		<div class="col-md-10">
					
			<label>Imagen</label>
			 <?php echo $this->Form->input('archivo',array('type' => 'file')); ?>		 
					
		</div>




		<div class="col-md-10">
			
	          <label for="exampleInputEmail1">Direcci&oacute;n</label>
	            <?php echo $this->Form->input('Usuario.direccion',array('label'=>false,'placeholder'=>'Direccion', 'required'=>"required", 'class'=>'form-control')); ?>	        
	        
		</div>



		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Agregar Usuario','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


