	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Huespedes',array('controller' => 'Huespedes', 'action' => 'huespedview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Búsqueda de Huespedes',array('controller' => 'Huespedes', 'action' => 'search', 'full_base' => true),  array('class' => 'list-group-item')); ?>		      
			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">

   	<?php echo $this->Form->create('Donante',array('action' => 'donanteviewall', 'id' => 'formulario', 'role' => 'form')); ?>
	

     <div class="row">
		
	<?php	foreach($HuespedesArray as $hue){
	        if ($hue['Huespede']['id'] == $id) { 
	?>

       <div class="col-md-6">
	 <div class="form-group">
	     <h2 id="input-groups-basic"> <?php echo $hue['Huespede']['nombres']; ?> </h2>
	  </div>
	</div>

      <div class="col-md-6">
	 <div class="form-group"> 
	    <label for="exampleInputEmail1">Direccion: </label>
	        <?php echo $don['Donante']['direccion']; ?> <br/>
	     <label for="exampleInputEmail1">Página web: </label>
	         <?php echo $don['Donante']['paginaweb'];?>
	  </div>
	</div>

