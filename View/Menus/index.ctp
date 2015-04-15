<?php	$URLSITE = Router::url('/', true);	?>

<style>

.centertable{
	float: left;
	width: 100%;
}

</style>


<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Menus',array('controller' => 'Menus', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
				<?php echo $this->Html->link('Agregar Menus',array('controller' => 'Menus', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Asignacion de Menus',array('controller' => 'Menus', 'action' => 'Asignacionperfil', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
  <div class="col-lg-12">
   <div class="form-group">
    <h4>Lista de Menus</h4>
   </div>
  </div>

 <div class="col-lg-6">
    <div class="form-group">
      <a href="/Menus/add/"class="btn btn-primary">Agregar Menu</a>
    </div>
   </div>

<div class="col-md-12">

<div class="centertable">

<table class="table table-bordered" style=" width:100%;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>URL</th>
              <th>CSS</th>
              <th>categoria</th>
              <th>Padre</th>
              <th>Orden</th>
              <th>Operaciones</th>          
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($MenusArray as $row){	?>
   			 <tr>
             <td><?php	echo $row['Menu']['id']; ?></td>
             <td><?php	echo $row['Menu']['nombre']; ?></td>
             <td><?php	echo $row['Menu']['url']; ?></td>
             <td><?php	echo $row['Menu']['css']; ?></td>
             <td><?php	echo $row['Menu']['categoria']; ?></td>
             <td><?php	echo $row['Menu']['idpadre']; ?></td>
             <td><?php	echo $row['Menu']['orden']; ?></td>                      
         	 <!---------------Cuadro de operaciones---------------->	    
             <td>     
             |
             <a href="<?php	echo $URLSITE .  $row['Menu']['url'];	?>" title=" Ver Menus" target="_blank"><span class="glyphicon glyphicon-globe"></span></a>          
             |
             <a href="/Menus/edit/<?php echo $row['Menu']['id']; ?>" TITLE="Editar Menus"><span class="glyphicon glyphicon-pencil"></span></a> 	
			 |
			 <?php	echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Eliminar Menu" />',
			                                   array('action' => 'baja', $row['Menu']['id']),
			                                   array('escape'=>false, 'confirm' => 'Desea eliminar el Menu?'));    										
			 echo " | ";   
			 ?>
             </td>
            </tr>
            
		<?php	}	?>
		
     
           
            
          </tbody>
        </table>
        
        </div>
        
</div>



  
    <!-- Paginacion
    ================================================== -->   
 <div class="row">

   <div class="large-6 columns">
   <?php echo $this->Paginator->counter(array('format' => 'P&aacute;gina %page% de %pages%, Mostrando: %current% registros de %count%')); ?>
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
