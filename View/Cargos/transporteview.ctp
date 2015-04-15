	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Servicios',array('controller' => 'Cargos', 'action' => 'servicioview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		    	<?php echo $this->Html->link('Pedidos',array('controller' => 'Cargos', 'action' => 'pedidoview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                <?php echo $this->Html->link('Promociones',array('controller' => 'Cargos', 'action' => 'promocioneview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                <?php echo $this->Html->link('Transportes',array('controller' => 'Cargos', 'action' => 'transporteview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                <?php echo $this->Html->link('Categorias',array('controller' => 'Categorias', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>  
                 			      
		    </div>
      </div> 
     

<!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
  

 <div class="row">

   <div class="col-md-6">
    <div class="form-group">
      <h4>Lista de Transporte</h4>
    </div>
   </div>

  <div class="col-md-6">
    <div class="form-group">
      <a href="/Cargos/transporteadd/"class="btn btn-primary">Agregar Transporte</button></a>
    </div>
   </div>

 </div>

<table class="table table-bordered">
          <thead>
            <tr>
              <th>N°</th>
               <th>Nombre</th>
               <th>Categoria</th>
              <th>Descripción </th>
              <th>Precio</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Acciones</th>            
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($CargosArray as $car){	?>
   			 <tr>
              <td><?php	echo $car['Cargo']['id'];	?></td>
              <td><?php	echo $car['Cargo']['nombre'];	?></td>
              <td><?php foreach ($CategoriaArray as $cat){ 
                if($cat['Cargocategoria']['cargo_id'] == $car['Cargo']['id']) {
                 echo $cat['Categoria']['nombre']; } } ?></td>
              <td><?php	echo $car['Cargo']['descripcion'];	?></td>
              <td><?php	echo '$', $car['Cargo']['precio'];	?></td>              
              <td><?php	echo $car['Cargo']['fechainicio'];	?></td>             
              <td><?php	echo $car['Cargo']['fechafin'];	?></td>
              <td>
                            
  
   |
   <a href="/Cargos/transportedit/<?php echo $car['Cargo']['id']; ?>" TITLE="Editar Transporte"><span class="glyphicon glyphicon-pencil"></span></a> 	
			      | 
			<?php	  echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                    array('action' => 'baja/' . $car['Cargo']['id'] . '?tipo=4'),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja al Transporte?'));    										
			   	  echo " | ";   
			  ?>
              
              
              </td>
            </tr>
            
		<?php	}	?>
		
     
           
            
          </tbody>
        </table>
  
  
  </div>
