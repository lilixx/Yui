	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Estados de habitaciones',array('controller' => 'Estadohabitaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Agregar Estado de habitacion',array('controller' => 'Estadohabitaciones', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
	
    <div class="col-md-9">
    
    <h4>Lista de Estados de habitaciones</h4>
    
<table class="table table-bordered">
	<thead>
      <tr>
		<th>ID</th>
		<th>Nombre</th>
	   </tr>
          </thead>
	<tbody>
	<?php foreach($Estadohabitaciones as $estadohabitacione):?>
	<tr>
     <td> <?php echo $estadohabitacione['Estadohabitacione']['id'];?> </td>
	 <td> <?php echo $estadohabitacione['Estadohabitacione']['nombre'];?> </td>
				
	<!--Cuadro de operaciones--->		
	<td>
 <?php 
   echo " |Editar ";
  echo $this->Html->image("icon/edit.gif", array('title'=>"Editar",'url' => array('action' =>'edit', $estadohabitacione['Estadohabitacione']['id'])));
   echo " | ";
 ?> 
    		
 <?php 
 	  echo " |Dar de baja ";
 	echo $this->Form->postLink('<img src="http://teodolinda.no-ip.org/img/icon/delete.gif" title="Dar de baja" />',
						  array('action' =>'baja/' . $estadohabitacione['Estadohabitacione']['id']),
						  array('escape'=>false,'confirm' => '¿Realmente desea dar de baja este Estado de habitacion?')
						  );
	  echo " | ";
						  ?>		
	</td>	
	</tr>
	
	<?php endforeach;?>
	
 </tbody>
</table>

</div>