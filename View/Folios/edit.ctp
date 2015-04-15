
	  <div class="col-md-3"> 
      		<div class="list-group">
	      	  	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Monstrar Estado de Cuentas',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      
			</div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
	

		<h2 id="input-groups-basic">Editar Folio</h2>
		
		<?php echo $this->Form->create('Folio',array('action' => 'edit', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">
		
			
   <div class="col-md-6">
    	<div class="form-group">
            <label>Tipo de folio</label>
           <br/>
            <?php
			   echo $this->Form->select('Folio.tipofolioid',$TipofolioArray, array('label'=>false)); 
            ?>
      	</div>
    </div>	

<?php   echo $this->Form->input('id', array('type' => 'hidden')); ?> 	
		
	
 <div class="col-md-6">
    	<div class="form-group">
            <label>Huésped</label>
           <br/>
            <?php
			   echo $this->Form->select('Folio.huespedid',$HuespedArray, array('label'=>false)); 
            ?>
      	</div>
    </div>


<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Detalle</label>
	          <?php echo $this->Form->input('Folio.detalles',array('label'=>false,'placeholder'=>'Ingrese el detalle', 'required'=>"required", 'class'=>'form-control')); ?>
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
   
