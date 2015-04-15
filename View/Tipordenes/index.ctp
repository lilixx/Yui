 <div class="col-md-3"> 
      		<div class="list-group">
	      	  	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'Cubetas', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Tipo de Ordenes',array('controller' => 'Tipordenes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			</div>
      </div> 

 
    
    <!-- EN FRENTE
    ================================================== -->
    <div class="col-md-9">
    
  <div class="col-md-6">
   <div class="form-group">
    <h4>Lista de Tipo de Ordenes</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Tipordenes/add/" class="btn btn-primary">Agregar Tipo de Orden</button></a>
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
          
          
   		<?php	foreach($TipordeneArray as $tipo){	?>
   		 <tr>
   			   <td> 
                 <?php echo $tipo['Tipordene']['nombre']; ?>
                                 
               </td>
              
                          
                       
          

        <!---------------Cuadro de operaciones---------------->	    
                  <td>     
     
      <a href="/Tipordenes/view/<?php echo $tipo['Tipordene']['id']; ?>" TITLE=" Ver Tipo de Orden"><span class="glyphicon glyphicon-search"></span></a> 
                  |
     <a href="/Tipordenes/edit/<?php echo $tipo['Tipordene']['id']; ?>" TITLE="Editar Tipo de Orden"><span class="glyphicon glyphicon-pencil"></span></a> 	
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
