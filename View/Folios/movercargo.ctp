  <div class="col-md-3"> 
      		<div class="list-group">
	      	  	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'folios', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar Estado de Cuentas',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      
			</div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
	

		<h2 id="input-groups-basic">Mover orden</h2>
		
		<?php echo $this->Form->create('Folio',array('action' => 'movercargo/'.$id)); ?>
		
	

<div class="row">

 <div class="col-md-6">
    	<div class="form-group">
            <label>Seleccione el huésped al que se le asignará  la orden</label>
           <br/>
            <?php
        	    echo $this->Form->select('Folio.huespedid',$HuespedArray, array('label'=>false, 'class'=>'form-control', 'required'));
		    ?>
      	</div>
    </div>
    
  
    

<div class="col-md-6">
	<div class="form-group">
             <br/>
             <br/>
             <br/> 
           </div>
		</div>



    
 	<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Guardar','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>
