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
    <h4>Lista de tipos de habitaciones</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Tipohabitaciones/add/" <button type="button" class="btn btn-primary">Agregar tipo de habitación </button></a>
    </div>
   </div>
    
<table class="table table-bordered">
	<thead>
      <tr>
		<th>ID</th>
		<th>Nombre</th>
        <th>Precio</th>
		<th>Cantidad Maxima</th>
        <th>Activo</th>
	   </tr>
          </thead>
	<tbody>
	<?php foreach($Tipohabitaciones as $tipohabitacione):?>
	<tr>
     <td> <?php echo $tipohabitacione['Tipohabitacione']['id'];?> </td>
	 <td> <?php echo $tipohabitacione['Tipohabitacione']['nombre'];?> </td>
	 <td> <?php echo $tipohabitacione['Tipohabitacione']['precio'];?> </td>
   	 <td> <?php echo $tipohabitacione['Tipohabitacione']['cantmaxima'];?> </td>		
				
	<!--Cuadro de operaciones--->		
	<td>
     |
        <a href="/Tipohabitaciones/edit/<?php echo $tipohabitacione['Tipohabitacione']['id']; ?>" TITLE="Editar tipo de habitación"><span class="glyphicon glyphicon-pencil"></span></a> 
       |
        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'baja', $tipohabitacione['Tipohabitacione']['id']),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja el tipo de habitación?'));    										
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
