	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Huespedes',array('controller' => 'Huespedes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Búsqueda de Huespedes',array('controller' => 'Huespedes', 'action' => 'search', 'full_base' => true),  array('class' => 'list-group-item')); ?>		      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
      <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Huéspedes</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Huespedes/habhuesped/"class="btn btn-primary">Agregar Huésped</button></a>
    </div>
   </div>

<table class="table table-bordered">
          <thead>
            <tr>
              <th>N°</th>
               <th>Nombres</th>
              <th>Apellidos</th>
              <th>Correo electrónico</th>
              <th>Teléfono</th>
              <th>Nacionalidad</th>
              <th>Acciones</th>            
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($HuespedesArray as $hue){	?>
   			 <tr>
              <td><?php	echo $hue['Huespede']['id'];	?></td>
              <td><?php	echo $hue['Huespede']['nombres'];	?></td>
              <td><?php	echo $hue['Huespede']['apellidos'];	?></td>
              <td><?php	echo $hue['Huespede']['email'];	?></td>              
              <td><?php	echo $hue['Huespede']['telefono'];	?></td>             
              <td><?php	echo $hue['Huespede']['nacionalidad'];	?></td>
              
                            
  
   <!---------------Cuadro de operaciones---------------->	  
              <td>     
                            |
   <a href="/Huespedes/view/<?php echo $hue['Huespede']['id']; ?>" TITLE=" Ver Huésped"><span class="glyphicon glyphicon-search"></span></a> 
                              |
   <a href="/Huespedes/huespededit/<?php echo $hue['Huespede']['id']; ?>" TITLE="Editar Huésped"><span class="glyphicon glyphicon-pencil"></span></a> 	
			      | 
			<?php	  echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'huespededarbaja', $hue['Huespede']['id']),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja al Huésped?'));    										
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
