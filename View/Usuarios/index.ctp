<?php	$URLSITE = Router::url('/', true);	?>




<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar usuarios',array('controller' => 'Usuarios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar tasa de cambio',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
               			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
   <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Usuarios</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Usuarios/adminadd/" class="btn btn-primary">Agregar Usuario</a>
    </div>
   </div>

<table class="table table-bordered" style="width:100%;">
          <thead>
            <tr>
              
              <th>ID</th>
              <th>Imagen</th>
              <th> Nombre </th>
              <th>Apellidos</th>
              <th>Username</th>
              <th>Perfil</th>
              <th>Acciones</th>            
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($UsuariosArray as $usr){	?>
   		
   		
   			 <tr>
              <td><?php	echo $usr['Usuario']['id'];	?></td>
              <td><img src="<?php 	echo $URLSITE . "uploads/usuarios/". $usr['Usuario']['imgusuario'];	?>" alt="<?php	echo $usr['Usuario']['username'];	?>" width="50px" height="50px"></td>
              <td><?php	echo $usr['Usuario']['nombres'];	?></td>
              <td><?php	echo $usr['Usuario']['apellidos'];	?></td>              
              <td><?php	echo $usr['Usuario']['username'];	?></td>             
              <td><?php	echo $usr['Perfile']['nombre'];	?></td>
              <td>
              
|
<a href="/Usuarios/view/<?php	echo $usr['Usuario']['id'];	?>" title=" Ver Usuario"><span class="glyphicon glyphicon-search"></span></a>
|
<a href="/Usuarios/adminedit/<?php echo $usr['Usuario']['id']; ?>" TITLE="Editar Usuario"><span class="glyphicon glyphicon-pencil"></span></a> 	
| 
<a href="/Usuarios/permisos/<?php	echo $usr['Usuario']['id'];	?>" title="Modificar Permisos"><span class="glyphicon glyphicon-list-alt"></span></a>
|

   <?php  echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'baja', $usr['Usuario']['id']),
			                                   array('escape'=>false, 'confirm' => 'Â¿Desea dar de baja al Usuario?'));    										
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
   <?php echo $this->Paginator->counter(array('format' => 'PÃ¡gina %page% de %pages%, Mostrando: %current% registros de %count%')); ?>
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
