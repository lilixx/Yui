<head>
    
  
   </head>

  <!-- COLUMNA IZQUIERDAA
    ================================================== -->

	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Huespedes',array('controller' => 'Huespedes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Búsqueda de Huespedes',array('controller' => 'Huespedes', 'action' => 'search', 'full_base' => true),  array('class' => 'list-group-item')); ?>		      
			      
		    </div>
      </div>

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
 
		<h2 id="input-groups-basic">Asignar Habitación</h2>
		
		<?php echo $this->Form->create('Detallehuespede',array('action' => 'asignarhab/'. $id , 'id' => 'formulario', 'role' => 'form')); ?>
	    

<div class="row">


       
	
 <!-- tab- ventanas
    ================================================== -->


<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

 <div class="bs-example">
   
    <ul class="nav nav-tabs">
    
       
        <?php for ($f = 1; $f <= $cant; $f++) { ?>
         <li><a data-toggle="tab" href="#section<?php echo $f; ?>">Huésped <?php echo '#',$f; ?></a></li>
        <?php } ?>
    </ul>
   
 
   
    <div class="tab-content">
               
        <?php for ($f = 1; $f <= $cant; $f++) { ?>
           <div id="section<?php echo $f; ?>" class="tab-pane fade">
             <h3>Huésped<?php echo ' #',$f; ?> </h3>
               
			

<div class="col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Huesped:</label>
   <?php echo $this->Form->select(''.$f.'.Detallehuespede.huespede_id',$HuespedeArray, array('label'=>false,'placeholder'=>"categoria", 'class'=>'form-control')); ?> 
   
  </div>
</div>

		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Empresa</label>
	        <?php echo $this->Form->input(''.$f.'.Detallehuespede.empresa',array('label'=>false,'placeholder'=>'Ingrese el nombre de la empresa', 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Motivo del viaje</label>
	        <?php echo $this->Form->input(''.$f.'.Detallehuespede.motivoviaje',array('label'=>false,'type'=>'select', 'options'=>array('------','Turismo'=>'Turismo', 'Oficial'=>'Oficial', 'Residencia'=>'Residencia', 'Negocios'=>'Negocios'),'class'=>'form-control')); ?>
	        </div>
		</div>
		
			
				
		<div class="col-md-6">
		    <div class="form-group">
	          <label for="exampleInputEmail1">Linea Aérica y Vuelo de Salida </label>
	          <?php echo $this->Form->input(''.$f.'.Detallehuespede.aerolinea',array('label'=>false,'placeholder'=>'Ingrese la linea aérica ', 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		
	<div class="col-md-6">
	    <div class="form-group">
	       <label for="exampleInputEmail1">No. de reserva </label>
	        <select  name="data[<?php echo $f ?>][Detallehuespede][reservacione_id]" placeholder="contacto" id="Detallehuespede1ReservacioneId">
              <option value=""></option>
              <?php foreach ($ReservacioneArray as $res){ ?>
                <option value="<?php echo $res; ?>"><?php echo $res; ?></option>
              <?php } ?>
            </select>
	    </div>
	</div>
				
		               
              	<div class="col-md-6">
		    <div class="form-group">
	              <br/> 
	                  
	        </div>
		</div>

               <div class="col-md-6">
		    <div class="form-group">
	              <br/> 
	                  
	        </div>
		</div>
		
		

           </div> <!--fin del tab-content===== -->
        <?php } ?> <!-- fin del for ===== -->
   
        
     </div>         
  
  </div>
 
  
   <!-- fin del tab- ventanas
    ================================================== -->
<hr/>
<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Asignar habitación','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>

</div>

  
</div>
