	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar tipos de identificacion',array('controller' => 'Tipoidentificacions', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Agregar tipo de identificacion',array('controller' => 'Tipoidentificacions', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
	
    <div class="col-md-9">
    
    <h4>Lista de tipos de identificacion</h4>
    
<table class="table table-bordered">
	<thead>
      <tr>
		<th>Nombre de identificacion</th>
	   </tr>
          </thead>
	<tbody>
	<?php foreach($Tipoidentificacions as $tipo):?>
	<tr>
    
	 <td> <?php echo $tipo['Tipoidentificacion']['nombre'];?> </td>
     
      
	<!--Cuadro de operaciones--->		
	<td>
 <?php 
   echo " |Editar ";
  echo $this->Html->image("icon/edit.gif", array('title'=>"Editar",'url' => array('action' =>'edit', $tipo['Tipoidentificacion']['id'])));
   echo " | ";
 ?> 
    		
	</td>	
	</tr>
	
	<?php endforeach;?>
	
 </tbody>
</table>

</div>