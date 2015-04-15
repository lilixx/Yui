<head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


</head> 
   


 <!-- COLUMNA IZQUIERDAA
    ================================================== -->

	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Huespedes',array('controller' => 'Huespedes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Búsqueda de Huespedes',array('controller' => 'Huespedes', 'action' => 'search', 'full_base' => true),  array('class' => 'list-group-item')); ?>		      
			      
		    </div>
      </div>

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
 
	<div class="col-md-6">
	<div class="form-group">
	  <br/>
	 </div>
	</div>  
	
	<div class="col-md-6">
	<div class="form-group">
	
	   <a href="/Huespedes/addhs/"class="btn btn-primary">Agregar Huésped suelto</button></a>
		
        <a href="/Huespedes/huespedhab/"class="btn btn-primary">Asignar Habitación</button></a> 
		
	  </div> </div>	
		
		<h2 id="input-groups-basic">Búsqueda  de Huéspedes </h2>
			
		<?php echo $this->Form->create('Huespede',array('action' => 'search', 'id' => 'formulario', 'role' => 'form')); ?>
	
 


<div class="row">

 
		
 
 <script>
  var availableTags= <?php echo json_encode($availableTags); ?>;$(function() {
  $( "#tags" ).autocomplete({
  source: availableTags
  });
  });
 </script>

<div class="col-md-8">
  <div class="form-group">
    <label for="exampleInputEmail1">Ingrese los Apellidos:</label>
    <?php echo $this->Form->input('Huespede.apellidos', array('type' => 'text', 'id' => 'tags', 'label' => false, 'class'=>'form-control')); ?>
   
  </div>
</div>




 <div class="col-md-6">
	<div class="form-group">
	       <br/>
	     <?php	echo $this->Form->end(array('label' => 'Enviar','class' =>  'btn btn-primary dropdown-toggle')); ?>        
	</div>
 </div>
 

<div class="col-md-8">
    <div class="form-group">

<?php

if(isset($Huespede))
{

?>
  
      <table class="table table-bordered">
         <tbody>
          <tr class="active">
            <th>Nombres</th>
            <th>Número de Documento</th>
          </tr>
         
            <?php foreach ($Huespede as $k) {
            echo '<tr>'; 
            	echo '<td><a href="/Huespedes/view/',$k['Huespede']['id'],'">',$k['Huespede']['nombres'],' ',$k['Huespede']['apellidos'],'</td>';
  	            echo '<td>',$k['Huespede']['numdoc'],'</td>';
  	        echo '</tr>';      
  	          
             }
             

}//fin isset 
else{
  echo "<h4>"."No hay registros"."</h4>"; 
}

?>

      </tbody>
    </table>

</div> </div>
 </div> </div>

 

