<div class="col-md-3"> 
      		<div class="list-group">
	      	
	         	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'Folios', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar Estado de Cuentas',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			    
		     
			</div>
      </div> 
   
<div class="col-md-9">      
   
		   
		<?php echo $this->Form->create('Ordene',array('action' => 'view')); ?>
       
<div class="row">

		
	   <?php
	                   
                foreach($OrdeneArray as $or){
           ?>	
	    
	<div class="col-md-12">
			<div class="form-group">
	                     <h2 id="input-groups-basic"> <?php echo 'Tipo: ', $or['Tipordene']['nombre']; ?> </h2>
	                     <label for="exampleInputEmail1">Fecha: </label> 
	                   <?php echo $or['Ordene']['fecha']; ?> <br/>
	                   <label for="exampleInputEmail1">Número: </label> 
	                   <?php echo $or['Ordene']['id']; ?> <br/> 
	                   <label for="exampleInputEmail1">Registrado por:  </label> 
	                  <?php echo $or['Usuario']['nombres'],' ', $or['Usuario']['apellidos']; ?> <br/> 
                      
			<hr>
    </div>
   <?php } ?>
   <?php
	                   
                foreach($CargordeneArray as $or){
           ?>
   
    <div class="col-md-6">
	                 <label for="exampleInputEmail1">Cargo: </label> 
	                 <?php  echo $or['Cargo']['nombre']; ?> &nbsp;
	                 
	                 <label for="exampleInputEmail1">Cantidad: </label> 
	                 <?php  echo $or['Cargordene']['cantidad']; ?> <br/>  
	                <br/> 
                                                 
	        
	          <br/>
	               

           </div>
                
            
               
             


                 <?php }   ?>
                 
                  <a href="/Folios/view/<?php echo $or['Ordene']['folioid']; ?>" <button type="button" class="btn btn-primary">Regresar</button></a> 

	        </div>
	 </div>
	 
 	                     
	                    
				  

</div>
</div>
