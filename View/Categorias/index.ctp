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
    
  <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Categorias</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Categorias/add/" class="btn btn-primary">Agregar Categoria</button></a>
    </div>
   </div>

<table class="table table-bordered">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Operaciones</th>          
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($CategoriaArray as $cat){	?>
   		 <tr>
   			   <td> 
                 <?php echo $cat['Categoria']['nombre']; ?>
                                 
               </td>
              
                          
                       
          

        <!---------------Cuadro de operaciones---------------->	    
                  <td>     
                  |
     <a href="/Categorias/edit/<?php echo $cat['Categoria']['id']; ?>" TITLE="Editar Categoria"><span class="glyphicon glyphicon-pencil"></span></a> 	
			      | 
			           
              
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
