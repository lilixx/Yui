	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Clientes',array('controller' => 'Clientes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      
			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
  <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Clientes</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Clientes/add/"class="btn btn-primary">Agregar Cliente</a>
    </div>
   </div>

<table class="table table-bordered" style=" width:100%;">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Nacionalidad</th>
              <th>Tel&eacute;fono</th>
              <th>Operaciones</th>          
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($ClientesArray as $row){	?>
   			 <tr>
              <td><?php	echo $row['Cliente']['nombres'], ' ', $row['Cliente']['apellidos'] ; ?></td>
              <td><?php	echo $row['Cliente']['nacionalidad'];	?></td>
              <td><?php	echo $row['Cliente']['telefono'];	?></td>
                       
          

        <!---------------Cuadro de operaciones---------------->	    
                  <td>     
                  
                  |
        <a href="/Clientes/view/<?php	echo $row['Cliente']['id'];	?>" title=" Ver Cliente"><span class="glyphicon glyphicon-search"></span></a>          
                  |
   <a href="/Clientes/edit/<?php echo $row['Cliente']['id']; ?>" TITLE="Editar Cliente"><span class="glyphicon glyphicon-pencil"></span></a> 	
			      | 
			<?php	  echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'baja', $row['Cliente']['id']),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja al Cliente?'));    										
			   	  echo " | ";   
			  ?>
              
              
              </td>
            </tr>
            
		<?php	}	?>
		
     
           
            
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
