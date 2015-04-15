<div class="col-md-3"> 
      		<div class="list-group">
	      	
	      	<?php echo $this->Html->link('Mostrar Clientes',array('controller' => 'Clientes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>

		      
			</div>
      </div> 
   
<div class="col-md-9">      
   
		   
		<?php echo $this->Form->create('Cliente',array('action' => 'view')); ?>
       
<div class="row">

	<div class="col-md-12">
			<div class="form-group">
	                     <h2 id="input-groups-basic"> <?php echo $this->data['Cliente']['nombres'] . '  ', $this->data['Cliente']['apellidos']; ?> </h2>

			<hr>
    </div>
    
                    
    <div class="col-md-12">
	     
	     <label for="exampleInputEmail1">Nacionalidad: </label> 
	     <?php  echo $this->data['Cliente']['nacionalidad']; ?> <br/> 
	                      
                          
         <label for="exampleInputEmail1">Tel&eacute;fono: </label> 
	     <?php echo $this->data['Cliente']['telefono']; ?> <br/>   


         <label for="exampleInputEmail1">Celular: </label> 
	     <?php echo $this->data['Cliente']['celular']; ?> <br/>   
	     	     
	    
	    <label for="exampleInputEmail1">Email: </label> 
	     <?php  echo $this->data['Cliente']['email']; ?> <br/> 


	    <label for="exampleInputEmail1">Identificaci&oacute;n: </label> 
	     <?php  echo $this->data['Cliente']['identificacion']; ?> <br/> 
	     

    <label for="exampleInputEmail1">direcci&oacute;n: </label> 
	     <?php  echo $this->data['Cliente']['direccion']; ?> <br/> 
	     
	     


	         
	          <br/>
	           

           </div>
               
             


  

	        </div>
	 </div>
	 
 	                     
	                    
				  
</div>
