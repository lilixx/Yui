<div class="col-md-3"> 
      		<div class="list-group">
	      	
		     	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	 <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'Folios', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar Estado de Cuentas',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			   
		      
			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
  <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Cargos en cubeta</h4>
   </div>
  </div>


<table class="table table-bordered">
          <thead>
            <tr>
              <th>Num.Orden</th>
               <th>Registrado por</th>
               <th>Fecha</th>
              <th>Huesped</th>
              <th>Cargo</th>
              <th>Cantidad</th>
              <th>Descripción</th>
              <th>Operaciones</th>          
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($CubetaArray as $cu){	?>
   			 <tr>
   			  <td>
   			  <?php echo $cu['Ordene']['id']; ?>
   			  </td>
   			  <td>
   			 <?php foreach($UsuarioArray as $usr){
   			  if($usr['Usuario']['id'] == $cu['Cubeta']['usuario_id']) {
   			    echo $usr['Usuario']['nombres'], ' ', $usr['Usuario']['apellidos']; 
   			  } } ?>
   			  </td>
   			  <td>
   			  <?php echo $cu['Cubeta']['fecha']; ?>
   			  </td>
   			  <td> 
              <?php	foreach($FolioArray as $fol){
              if($cu['Ordene']['folioid'] == $fol['Folio']['id']){
              echo $fol['Huespede']['nombres']; } } ?>
              </td>
              <td> 
             <?php echo $cu['Cargo']['nombre']; ?>
              </td>
              <td><?php	echo $cu['Cargordene']['cantidad'];	?></td>
              <td><?php	echo $cu['Cubeta']['descripcion'];?></td>              
             
                       
          

        <!---------------Cuadro de operaciones---------------->	    
                  <td>     
                              |
    
			<?php	  echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('controller'=>'Cubetas','action' => 'dardebajacargo', $cu['Cubeta']['id']),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja a este cargo?'));    										
			   	  echo " | ";   
			  ?>
              
              
              </td>
            </tr>
            
		<?php	}	?>
		
     
           
            
          </tbody>
        </table>
 
