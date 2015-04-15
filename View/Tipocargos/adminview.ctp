<div class="col-md-3"> 
	<div class="list-group">
		<?php echo $this->Html->link('Mostrar Tipos de Cargos',array('controller' => 'Tipocargos', 'action' => 'adminview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		<?php echo $this->Html->link('Agregar Tipo de cargos',array('controller' => 'Tipocargos', 'action' => 'adminadd', 'full_base' => true),  array('class' => 'list-group-item')); ?>      
	 </div>
</div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
<h4>Lista de Tipos de cargos</h4>

<table class="table table-bordered">
          <thead>
            <tr>
              <th>N#</th>
              <th>Nombres</th>
              <th>Activo</th>
                   
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($TipocargoArray as $tc){	?>
   			 <tr>
              <td><?php	echo $tc['Tipocargo']['id'];	?></td>
              <td><?php	echo $tc['Tipocargo']['nombre'];	?></td>
              <td><?php	echo $tc['Tipocargo']['activo'];	?></td>
              
            </tr>
            
		<?php	}	?>        
            
          </tbody>
        </table>
  
</div>