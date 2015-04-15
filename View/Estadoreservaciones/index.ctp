	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Estados de reservas',array('controller' => 'Estadoreservaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Agregar Estados de reserva',array('controller' => 'Estadoreservaciones', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
	
    <div class="col-md-9">
    
    <h4>Lista de Estados de reservaciones</h4>
    
<table class="table table-bordered">
	<thead>
      <tr>
      	<th>Nombre</th>
        <th>Operaciones</th>
	   </tr>
          </thead>
	<tbody>
	<?php foreach($Estadoreservaciones as $row):?>
	<tr>
     <td> <?php echo $row['Estadoreservacione']['nombre'];?> </td>
		
	<!--Cuadro de operaciones--->		
	<td>
 <?php 
   echo " |Editar ";
  echo $this->Html->image("icon/edit.gif", array('title'=>"Editar",'url' => array('action' =>'edit', $row['Estadoreservacione']['id'])));
   echo " | ";
 ?> 
    		
 <?php 
 	  echo " |Dar de baja ";
 	echo $this->Form->postLink('<img src="http://teodolinda.no-ip.org/img/icon/delete.gif" title="Dar de baja" />',
						  array('action' =>'baja/' . $row['Estadoreservacione']['id']),
						  array('escape'=>false,'confirm' => '¿Realmente desea dar de baja este registro')
						  );
	  echo " | ";
						  ?>		
	</td>	
	</tr>
	
	<?php endforeach;?>
	
 </tbody>
</table>

</div>