	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
	<?php echo $this->Html->link('Mostrar Tipos de pago',array('controller' => 'Clientes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		
	<?php echo $this->Html->link('Agregar Tipos de pago',array('controller' => 'Tipopagos', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
     
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
<h4>Lista de Tipos de pago</h4>

<table class="table table-bordered">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Operaciones</th>                
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($Tipopagos as $row){	?>
   			 <tr>
              <td><?php	echo $row['Tipopago']['nombre'];?></td>
             
  <td>                       
    <?php
		echo " | ";
		echo $this->Html->image("icon/edit.gif", array("title" => "Editar",'url' => array('controller' => 'Tipopagos', 'action' => 'edit', $row['Tipopago']['id'])));
		
		echo " | ";
		echo $this->Form->postLink('<img src="http://teodolinda.no-ip.org/img/icon/delete.gif" title="Dar de baja" />',
			                                   array('action' => 'baja', $row['Tipopago']['id']),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja el registro?'));    										
			   	  echo " | ";   
			  ?>
              
              
              </td>
            </tr>
            
		<?php	}	?>
		
     
           
            
          </tbody>
        </table>
  
  
  </div>