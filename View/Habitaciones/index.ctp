	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Habitaciones',array('controller' => 'Habitaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Disponibilidad',array('controller' => 'Habitaciones', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                        
                        <?php echo $this->Html->link('Tipo de habitaciones',array('controller' => 'Tipohabitaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?> 

                        <?php echo $this->Html->link('Estado de habitaciones',array('controller' => 'Estadohabitaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?> 
			      
		    </div>
      </div> 
	
    <div class="col-md-9">
    
  <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Habitaciones</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Habitaciones/add/"class="btn btn-primary">Agregar Habitaci&oacute;n </button></a>
    </div>
   </div>


<table class="table table-bordered">
	<thead>
      <tr>
		<th>Numero de habitaci&oacute;n</th>
        <th>Tipo de habitaci&oacute;n</th>
        <th>Descripci&oacute;n</th>
        <th>Estado</th>
        <th>Imagen</th>
        <th>Acciones</th>
        
	   </tr>
          </thead>
	<tbody>
	<?php foreach($Habitaciones as $habitacione):?>
	<tr>
    
	 <td> <?php echo $habitacione['Habitacione']['numhab'];?> </td>
     
       <td> 
		    <?php foreach($TipohabitacioneArray as $rowtipo):
				if($rowtipo['Tipohabitacione']['id'] == $habitacione['Habitacione']['tipohabitacionid']){	
					echo $rowtipo['Tipohabitacione']['nombre'];
				}//Fin del if	?>
            
            
            <?php endforeach;?>

		  </td>
    
     <td> <?php echo $habitacione['Habitacione']['descripcion'];?> </td>
	 
       <td> 
		    <?php foreach($EstadohabitacioneArray as $rowestado):
				if($rowestado['Estadohabitacione']['id'] == $habitacione['Habitacione']['estadohabitacionid']){	
					echo $rowestado['Estadohabitacione']['nombre'];
				}//Fin del if	?>
            
            
            <?php endforeach;?>

		  </td>
         

           <?php  $URLSITE = Router::url('/', true);        ?>
           
           <td> 
           <img style="height: 50px; width: 50px; display: block;" alt="" src="
		   <?php  echo $URLSITE. "uploads/habitaciones/" . $habitacione	['Habitacione']['imghabitacion']; ?>">
           </td>
		
	<!--Cuadro de operaciones--->		
	<td>
       |
        <a href="/Habitaciones/edit/<?php echo $habitacione['Habitacione']['id']; ?>" TITLE="Editar Habitaci&oacute;n"><span class="glyphicon glyphicon-pencil"></span></a> 
       |
        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'baja', $habitacione['Habitacione']['id']),
			                                   array('escape'=>false, 'confirm' => 'Â¿Desea dar de baja esta HabitaciÃ³n?'));    										
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
   <?php echo $this->Paginator->counter(array('format' => 'PÃ¡gina %page% de %pages%, Mostrando: %current% registros de %count%')); ?>
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
