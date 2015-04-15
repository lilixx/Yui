	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Reserva express',array('controller' => 'Reservaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Reserva con cuenta',array('controller' => 'Reservaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                        
                        <?php echo $this->Html->link('Calendario',array('controller' => 'Reservaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?> 
			      
		    </div>
      </div> 
	
    <div class="col-md-9">
    
     <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Reserva Express</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Reservaciones/express/"class="btn btn-primary">Agregar Reserva Express</a>
    </div>
   </div>
    
<table class="table table-bordered">
	<thead>
      <tr>
		<th>Cliente</th>
        <th>Cant Adultos</th>
        <th>Cant Ni&ntilde;os</th>
        <th>Fecha Entrada</th>
        <th>Fecha Salida</th>
        <th>Estado de la reserva</th>
        <th>Cant Habitaciones</th>
        <th>Operaciones</th>
        
	   </tr>
          </thead>
	<tbody>
	<?php foreach($Reservaciones as $reserva):?>
	<tr>
    
	 <td> 
		<?php foreach($ClienteArray as $clie):
                    if($clie['Cliente']['id'] == $reserva['Reservacione']['clienteid']){	
                        echo $clie['Cliente']['nombres'];
                    }//Fin del if	?>
                
         <?php endforeach;?>
     </td>
     
     <td> <?php echo $reserva['Reservacione']['cantadultos'];?> 					</td>
     
      <td> <?php echo $reserva['Reservacione']['cantninos'];?> 					</td>

	      <td> 
		  <?php echo $reserva['Reservacione']['fechaentrada'];?> 								     	  </td>
          
	      <td> 
		  <?php echo $reserva['Reservacione']['fechasalida'];?> 								     	  </td>



     
     <td> 
		  <?php foreach($EstadoreservaArray as $reser):
				if($reser['Estadoreservacione']['id'] == $reserva['Reservacione']['estadoreservacionid']){	
					echo $reser['Estadoreservacione']['nombre'];
				}//Fin del if	?>
            
            
            <?php endforeach;?>

		  </td>
    

          
      <td> <?php echo $reserva['Reservacione']['canthab'];?> 					</td>

		
    <!---------------Cuadro de operaciones---------------->			
	<td>
                |
   <a href="/Reservaciones/edit/<?php echo $reserva['Reservacione']['id']; ?>" TITLE="Editar Reserva"><span class="glyphicon glyphicon-pencil"></span></a> 	
	        | 
    		
     <?php  echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'baja', $reserva['Reservacione']['id']),
			                                   array('escape'=>false, 'confirm' => 'Â¿Desea dar de baja la Reserva?'));    							
	  echo " | ";   
      ?>	
	</td>	
	</tr>
	
	<?php endforeach;?>
	
 </tbody>
</table>



  <!-- Paginacion
    ================================================== -->   
 <div class="row">

   <div class="large-6 columns">
   <?php echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%, Current: %current% registers of %count%')); ?>
   </div>

<div class="large-6 columns">

<div class="pagination-centered">

  <ul class="pagination">
    <li class="arrow"><?php echo $this->Paginator->prev('<<', null, null, array('class' => 'unavailable')); ?></li>
    <?php echo $this->Paginator->numbers(array('tag' => 'li', 'class'=>'arrow')); ?>
    <li class="arrow"><?php echo $this->Paginator->next('>>', null, null, array('class' => 'disabled')); ?></li>
  </ul>
 
</div>

</div>


</div>

</div>
