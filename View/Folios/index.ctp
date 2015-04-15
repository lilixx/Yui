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
    <h4>Lista de Folios</h4>
   </div>
  </div>

 <div class="col-md-6">
    <div class="form-group">
      <a href="/Folios/add/" class="btn btn-primary">Agregar Folio</button></a>
    </div>
   </div>

<table class="table table-bordered">
          <thead>
            <tr>
              <th>Huesped ó Empresa</th>
              <th>Tipo de Folio</th>
              <th>Operaciones</th>          
            </tr>
          </thead>
          <tbody>
          
          
   		<?php	foreach($FolioArray as $fo){	?>
   		 <tr>
   			   <td> 
                 <?php echo $fo['Huespede']['nombres'];
                   echo $fo['Cliente']['nombres']; 
                  ?>
               </td>
               <td> <?php echo $fo['Tipofolio']['nombre']; ?> </td>
                          
                       
          

        <!---------------Cuadro de operaciones---------------->	    
                  <td>     
                              |
   <a href="/Folios/view/<?php echo $fo['Folio']['id']; ?>" TITLE=" Ver Folio"><span class="glyphicon glyphicon-search"></span></a> 	
			      | 
   <a href="/Folios/edit/<?php echo $fo['Folio']['id']; ?>" TITLE="Editar Folio"><span class="glyphicon glyphicon-pencil"></span></a> 	
			      | 
	
  <a href="/Folios/estadocuenta/<?php echo $fo['Folio']['id']; ?>" TITLE="Estado de Cuenta"><span class="glyphicon glyphicon-list"></span></a>
				 
		          |   
	<?php      echo $this->Form->postLink('<span class="glyphicon glyphicon-remove" title="Dar de baja" />',
			                                   array('action' => 'baja', $fo['Folio']['id']),
			                                   array('escape'=>false, 'confirm' => '¿Desea dar de baja al folio?'));    										
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
