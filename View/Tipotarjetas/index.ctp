	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Tipos de tarjetas',array('controller' => 'Tipotarjetas', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Agregar Tipo de tarjeta',array('controller' => 'Tipotarjetas', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
	
    <div class="col-md-9">
    
    <h4>Lista de tipos de tarjetas</h4>
    
<table class="table table-bordered">
	<thead>
      <tr>
		<th>Nombre de tarjeta</th>
		<th>Operaciones</th>
	   </tr>
          </thead>
	<tbody>
	<?php foreach($Tipotarjetas as $tipo):?>
	<tr>
	 <td> <?php echo $tipo['Tipotarjeta']['nombre'];?> </td>

	<!--Cuadro de operaciones--->		
	<td>
 <?php 
   echo " |Editar ";
  echo $this->Html->image("icon/edit.gif", array('title'=>"Editar",'url' => array('action' =>'edit', $tipo['Tipotarjeta']['id'])));
   echo " | ";
 ?> 
    		

	</td>	
	</tr>
	
	<?php endforeach;?>
	
 </tbody>
</table>

</div>