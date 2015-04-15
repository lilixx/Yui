<div class="col-md-3"> 
      		<div class="list-group">
	      	
	         	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'Cubetas', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Tipo de Ordenes',array('controller' => 'Tipordenes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>		    
		     
			</div>
      </div> 
   
<div class="col-md-9">      
   
		   
		<?php echo $this->Form->create('Folio',array('action' => 'view')); ?>
       
<div class="row">

		
	   <?php	foreach($FolioArray as $fol){
	                 
	    ?>	
	    
	<div class="col-md-12">
			<div class="form-group">
	      <?php if(empty ($fol['Folio']['empresaid'])){  ?>
	                    <h2 id="input-groups-basic">Folio del Huesped: <?php echo $fol['Huespede']['nombres']; ?> </h2>
          <?php } else { ?> <h2 id="input-groups-basic">Folio del Cliente: <?php echo $fol['Cliente']['nombres']; ?> </h2> 
          <?php   } ?>
			<hr>

	                <label for="exampleInputEmail1">Tipo: </label> 
	                   <?php 
	                   if($fol['Folio']['tipofolioid'] == 1){
	                      echo 'Principal';
	                   }
	                   if($fol['Folio']['tipofolioid'] == 2){
	                      echo 'Hijo';
	                   }
	                  
	                   ?> <br/>       
	               
	                  <label for="exampleInputEmail1">Credito: </label> 
	                  <?php if ($fol['Folio']['credito'] == 1){ echo 'si';}
	                  else { echo 'no';} ?> <br/>
	                 <label for="exampleInputEmail1">Observaciones: </label> 
	                   <?php echo $fol['Folio']['observacion']; ?> <br/>
	                  <label for="exampleInputEmail1">Habitaciones: </label>  
	                  <?php foreach($FoliohabArray as $hab) { 
	                     echo ' num. ',$hab['Habitacione']['numhab']."&nbsp;";	                  
	                  } ?> <br/>
	                  <label for="exampleInputEmail1">Fecha de entrada: </label> 
	                   <?php echo $fechainicio; ?> &nbsp;
	                   <label for="exampleInputEmail1">Fecha Actual: </label> 
	                   <?php echo $fechaactual; ?> &nbsp;
	                   <label for="exampleInputEmail1">Cantidad de dias: </label> 
	                   <?php echo $calculo; ?>
	                
	                  
 
	                 

		  <?php } ?> 
		  <hr>
		  
		 </div>
		 </div> 
	
	<?php if($fol['Folio']['credito'] == '1') { ?>	  
		<div class="col-md-6">
			<div class="form-group">  
		   <h3> Ordenes <a href="/ordenes/orden/<?php echo $id; ?>"> <span class="glyphicon glyphicon-plus-sign"></span></a> </h3>        
		    <?php 
		  foreach($OrdeneArray as $or){
		    echo '<em>', $or['Ordene']['fecha'],'</em>'."&nbsp;", 'Num.', $or['Ordene']['id'], '<em> (Tipo: ', $or['Tipordene']['nombre'],')</em>'."&nbsp; &nbsp;"; ?> 
              <a href="/Ordenes/view/<?php echo $or['Ordene']['id'] ?>" TITLE="Ver orden"><span class="glyphicon glyphicon-search"></span></a> &nbsp;
             <a href="/Folios/movercargo/<?php echo $or['Ordene']['id'] ?>" TITLE="Mover orden"><span class="glyphicon glyphicon-new-window"></span></a> &nbsp;
             <a href="/Cubetas/cubeta/<?php echo $or['Ordene']['id'] ?>" TITLE="Enviar a cubeta"><span class="glyphicon glyphicon-folder-close"></span></a> &nbsp; </br>
           
           <?php    }  ?>
		
		  
		 <hr>
		 	                


	        </div>
	 </div>
	 
	  <?php } ?>
	  
	  <div class="col-md-6">
			<div class="form-group">
			<br/>
		</div> </div>	
	  
	     <div class="col-md-10">
			<div class="form-group">   
			  
             <a href="/Folios" <button type="button" class="btn btn-primary">Regresar</button></a>
             
          </div>
	  </div>
	      
</div>
</div>
