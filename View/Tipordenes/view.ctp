 <div class="col-md-3"> 
      		<div class="list-group">
	      	  	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'Cubetas', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		       	<?php echo $this->Html->link('Tipo de Ordenes',array('controller' => 'Tipordenes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			</div>
 </div> 
      
      
      
<div class="col-md-9">      
   
		   
		<?php echo $this->Form->create('Tipordene',array('action' => 'view')); ?>
       
<div class="row">

		
	   <?php
	                   
                foreach($TipordeneArray as $or){
           ?>	
	    
	<div class="col-md-12">
			<div class="form-group">
	                     <h2 id="input-groups-basic"> <?php echo 'Tipo de Orden: ',$or['Tipordene']['nombre']; ?> </h2>
               			<hr>
            </div>
    
    <div class="col-md-6">
	                 <label for="exampleInputEmail1">Categorías: </label> 
	                 <?php  
	                 foreach($CategoriatipordeneArray as $cat){
	                 echo $cat['Categoria']['nombre'],','."&nbsp;"."&nbsp;"; } ?> <br/> 
	        <br/>
	          <a href="/Tipordenes" <button type="button" class="btn btn-primary">Regresar</button></a>       

           </div>
                
     

                 <?php }  ?>

	        </div>
	 </div>
	 
 	                     
	                    
				  

</div>
</div>
