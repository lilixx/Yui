<?php	$URLSITE = Router::url('/', true);	?>
<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar usuarios',array('controller' => 'Usuarios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar tasa de cambio',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
               
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
		
		<?php   echo $this->Form->input('idusuario', array('type' => 'hidden')); ?>


		<h2 id="input-groups-basic">Modificar Usuario</h2>
		
	<?php echo $this->Form->create('Usuario',array('action' => 'adminedit', 'id' => 'formulario','type' => 'file', 'role' => 'form')); ?>
	

<div class="row">
	<?php   echo $this->Form->input('id', array('type' => 'hidden')); ?>	
			
			
		<div class="col-md-3 col-sm-4">
			<img src="<?php echo $URLSITE . 'uploads/usuarios/' . $this->data['Usuario']['imgusuario']; ?>" alt="" width="100%" height="320px" >
			<?php   echo $this->Form->input('imgusuario', array('type' => 'hidden')); ?>
			<?php echo $this->Form->input('archivo',array('type' => 'file')); ?>
		</div>	
		
		
		
			
		<div class="col-md-9 col-sm-8">
			
			<?php /* ------------------------------------------ */?>
			
			<div class="col-md-12">
			<div class="form-group">
	        <label for="exampleInputEmail1">Nombre</label>
	        <?php echo $this->Form->input('Usuario.nombres',array('label'=>false,'placeholder'=>'Nombre', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
			</div>
			
			<?php /* ------------------------------------------ */?>
			
			<div class="col-md-12">
			<div class="form-group">
	        <label for="exampleInputEmail1">Apellidos</label>
	        <?php echo $this->Form->input('Usuario.apellidos',array('label'=>false,'placeholder'=>'Apellidos', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
			</div>
			
			
			<?php /* ------------------------------------------ */?>
			
			<div class="col-md-12">
			<div class="form-group">
	        <label for="exampleInputEmail1">Usuario: </label><br/>
	        <h5><?php echo  $this->data['Usuario']['username']; ?></h5>
	        <?php  /*echo $this->Form->input('Usuario.username',array('label'=>false,'placeholder'=>'Username', 'required'=>"required", 'class'=>'form-control')); */?>
	        </div>
	        </div>

			
			<?php /* ------------------------------------------ */?>
			
			<div class="col-md-6">
			
			<div class="form-group">
	        <label for="exampleInputEmail1">Password</label>
	        <?php echo $this->Form->password('Usuario.passwordnew',array('label'=>false,'placeholder'=>'Password', 'class'=>'form-control')); ?>
	        </div>
	        
	        </div>
	        
	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="exampleInputEmail1">Confirmar Password</label>
	        <?php echo $this->Form->password('Usuario.passwordsecret',array('label'=>false,'placeholder'=>'Confirmar password', 'class'=>'form-control')); ?>
	        </div>
			
			</div>
	        
			

			
			<?php /* ------------------------------------------ */?>
			
			<div class="col-md-6">
			<div class="form-group">
	        <label for="exampleInputEmail1">Email</label>
	        <div class="input-group">
			<span class="input-group-addon">@</span>		  
			<?php echo $this->Form->input('Usuario.email',array('label'=>false,'placeholder'=>'Email', 'required'=>"required", 'class'=>'form-control')); ?>
			</div>	        
			</div>
			</div>
			
			<div class="col-md-6">
		<div class="form-group">
			<label for="exampleInputEmail1">Perfil de usuario</label>
			 <?php	echo $this->Form->select('Usuario.idperfil',$PerfilesArray, array('label'=>true,'required'=>"required",'class'=>'form-control')); ?>
		</div>
	</div>


			
			<?php /* ------------------------------------------ */?>
			
			
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



		
		</div>	
		
<div class="clearfix"></div>


		<div class="col-md-12">
			<div class="form-group">
	          <label for="exampleInputEmail1">Direcci&oacute;n</label>
	            <?php echo $this->Form->input('Usuario.direccion',array('label'=>false,'placeholder'=>'Direccion', 'required'=>"required", 'class'=>'form-control')); ?>	        
	        </div>
		</div>



		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Modificar Usuario','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


