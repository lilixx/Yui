<?php // echo $this->Html->script('jquery-loader'); ?>
<?php
/*
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<script src="http://jsfiddle.net/echo/jsonp/</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
*/?>

<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script>
 function marcar(source) 
    {
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
    }

</script>


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
    
	

		<h2 id="input-groups-basic">Enviar a cubeta</h2>
		
		<?php echo $this->Form->create('Cubeta',array('action' => 'cubeta/'.$id)); ?>
		

  


 <div class="col-md-11">
   <div class="form-group">

<div id="f1">	
<label>Seleccione los cargos a enviar a cubeta</label> <br/>   
<input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos
<hr/>
<?php  foreach($Cargof as $car){ ?>	
     <b><?php	echo $car['Cargo']['nombre']; ?></b> cantidad: <?php echo $car['Cargordene']['cantidad']; ?>

     <input type="checkbox" name="data[<?php echo $cant ?>][Cubeta][cargordene_id]" value="<?php	echo $car['Cargordene']['id']; ?>" id="menuselect" /> 
    <?php echo $this->Form->input(''.$cant.'.Cubeta.descripcion',array('label'=>false,'placeholder'=>'Ingrese la descripción', 'class'=>'form-control')); ?> <br/>
     
     <?php   $cant = $cant+1; }	?>

</div>
 </div>
  </div>
 

  
    

<div class="col-md-6">
	<div class="form-group">
             <br/>
             <br/>
             <br/> 
           </div>
		</div>



    
 	<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Guardar','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>
