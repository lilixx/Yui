 <div class="col-md-3"> 
      		<div class="list-group">
	      	
		     	<?php echo $this->Html->link('Mostrar usuarios',array('controller' => 'Usuarios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Monstrar tasa de cambio',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			  
		      
			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
  <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Tasa de cambio</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Tasacambios/add/" <button type="button" class="btn btn-primary">Agregar Tasa de cambio</button></a>
    </div>
   </div>

<table class="table table-bordered">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Moneda</th>
              <th>Valor</th>
              <th>Operaciones</th>          
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($TasacambioArray as $tc){	?>
   			 <tr>
              <td><?php	echo $tc['Tasacambio']['fecha']; ?></td>
              <td><?php echo $tc['Moneda']['nombre']; ?></td>
              <td><?php	echo $tc['Tasacambio']['valor'];	?></td>              
             
                       
          

        <!---------------Cuadro de operaciones---------------->	    
                  <td>     
                              |
   <a href="/Tasacambios/edit/<?php echo $tc['Tasacambio']['id']; ?>" TITLE="Editar Tasa de cambio"><span class="glyphicon glyphicon-pencil"></span></a> 	
			      | 
			<?php	  echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'baja', $tc['Tasacambio']['id']),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja a la Tasa de cambio?'));    										
			   	  echo " | ";   
			  ?>
              
              
              </td>
            </tr>
            
		<?php	}	?>
		
     
           
            
          </tbody>
        </table>
  
     <!-- Paginacion
    ================================================== -->   
 <div class="row">

   <div class="large-6 columns">
   <?php echo $this->Paginator->counter(array('format' => 'Página %page% de %pages%, Mostrando: %current% registros de %count%')); ?>
   </div>

<div class="large-6 columns">

<div class="pagination-centered">

  <ul class="pagination">
    <li class="arrow"><span class="glyphicon glyphicon-chevron-left" style="padding-top:10px;"><?php echo $this->Paginator->prev('', null, null, array('class' => 'unavailable')); ?></span></li>
    <?php echo $this->Paginator->numbers(array('tag' => 'li', 'class'=>'arrow')); ?>
    <li class="arrow"><span class="glyphicon glyphicon-chevron-right" style="padding-top:10px;"><?php echo $this->Paginator->next('', null, null, array('class' => 'disabled')); ?></span></li>
  </ul>
 
</div>

</div>


</div> 
        
  
  </div>
