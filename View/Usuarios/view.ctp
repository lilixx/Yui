<?php	$URLSITE = Router::url('/', true);	?>

<div class="col-md-3"> 
      		<div class="list-group">
	      	
	      	<?php echo $this->Html->link('Mostrar usuarios',array('controller' => 'Usuarios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		   	<?php echo $this->Html->link('Mostrar tasa de cambio',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
          
		      
			</div>
      </div> 
   
<div class="col-md-9">      
   
		   
		<?php echo $this->Form->create('Usuario',array('action' => 'view')); ?>
       
<div class="row">

	<div class="col-md-12">
			<div class="form-group">
	                     <h2 id="input-groups-basic"> <?php echo $this->data['Usuario']['nombres'] . '  ', $this->data['Usuario']['apellidos']; ?> </h2>

			<hr>
    </div>
    
      <div class="col-md-4">
     <td><img src="<?php 	echo $URLSITE . "uploads/usuarios/". $this->data['Usuario']['imgusuario'];	?>" alt="<?php	echo $this->data['Usuario']['username'];	?>" width="150px" height="150px"></td>
        </div>              
  
    <div class="col-md-8">
	     
	     <label>Username: </label> 
	     <?php  echo $this->data['Usuario']['username']; ?> <br/> 
	     
	     
	      <label>Perfil de Usuario: </label> 
	     <?php  echo $this->data['Perfile']['nombre']; ?> <br/> 
	         
	                      
                          
         <label for="exampleInputEmail1">Tel&eacute;fono: </label> 
	     <?php echo $this->data['Usuario']['telefono']; ?> <br/>   


         <label for="exampleInputEmail1">Celular: </label> 
	     <?php echo $this->data['Usuario']['celular']; ?> <br/>   
	     	     
	    
	    <label for="exampleInputEmail1">Email: </label> 
	     <?php  echo $this->data['Usuario']['email']; ?> <br/> 


	    <label for="exampleInputEmail1">direcci&oacute;n: </label> 
	     <?php  echo $this->data['Usuario']['direccion']; ?> <br/> 
	     
	     	         
	          <br/>
	           

           </div>
               
       </div>
	 </div> 	                     
	                    
				  
</div>
