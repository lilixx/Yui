	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Identificaciones',array('controller' => 'Identificacions', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		      	<?php echo $this->Html->link('Agregar Identificacion',array('controller' => 'Identificacions', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
	
    <div class="col-md-9">
    
    <h4>Lista Identificaciones</h4>
    
<table class="table table-bordered">
	<thead>
      <tr>
		<th>Numero de identificacion</th>
        <th>Tipo de identificacion</th>
        
	   </tr>
          </thead>
          
          
          
	<tbody>
	<?php foreach($Identificacions as $identificacion):?>
	<tr>
    
     <td> <?php echo $identificacion['Identificacion']['numero'];?> </td>
    
     <td> 
		    <?php foreach($TipoidentificacionArray as $rowtipo):
				if($rowtipo['Tipoidentificacion']['id'] == $identificacion['Identificacion']['tipoidentificacionid']){	
					echo $rowtipo['Tipoidentificacion']['nombre'];
				}//Fin del if	?>
            
            
            <?php endforeach;?>

		  </td>
	
      
	<!--Cuadro de operaciones--->		
	<td>
 <?php 
   echo " |Editar ";
  echo $this->Html->image("icon/edit.gif", array('title'=>"Editar",'url' => array('action' =>'edit', $identificacion['Identificacion']['id'])));
   echo " | ";
 ?> 
    		
	</td>	
	</tr>
	
	<?php endforeach;?>
	
 </tbody>
</table>

</div>