 <?php // echo $this->Html->script('jquery-loader'); ?>
<?php
/*
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
*/?>

<script type="text/javascript">


function cambiarvisibilidad(){
	
	var posicion = document.getElementById("ClienteTipocliente").options.selectedIndex; //posicion
	TipoclienteSelected = document.getElementById("ClienteTipocliente").options[posicion].value;
	
	if(TipoclienteSelected == 2){
		$('#clientInformation').removeClass("hiddenClient").addClass("visibleClient");
	}else{
		$('#clientInformation').removeClass("visibleClient").addClass("hiddenClient");
	}
	
	var posicion = document.getElementById("ClienteTipo").options.selectedIndex; //posicion
	ClienteporSelected = document.getElementById("ClienteTipo").options[posicion].value;
	
	if(ClienteporSelected == 1){
		$('#clientporInformation').removeClass("hiddenClientpor").addClass("visibleClientpor");
	}else{
		$('#clientporInformation').removeClass("visibleClientpor").addClass("hiddenClientpor");
	}


}

 $(document).ready(function(){  
 
      $('#ClienteTipo').change(function() {
	      	cambiarvisibilidad();      
	  })
     
      $('#ClienteTipocliente').change(function() {
	      	cambiarvisibilidad();      
	  });

 
});

</script>


<style type="text/css">

	.hiddenClient { 
		display:none;
		visibility:hidden;
	}
	
	.hiddenClientpor{
	  display:none;
	  visibility:hidden;
	}
	
	.visibleClient, visibleClientpor{
		display:block;
		visibility:visible;
	}
	
	

	.sexoselect{
		padding-bottom: 15px;
	}
	
	.form-group.sexoselect > input {
	  border: 2px solid #FF0000;
	  margin-left: 20px;
	  margin-right: 4px;
	}
	
	#ClienteTipocliente, #ClienteTipoidentificacionid, #ClienteTarjetaid, #UsuarioIdperfil{
		height: 30px;
		width: 100%;
		margin-bottom: 6px;	
	}
	
	#ClienteSexoM{
	margin-left:0px !important;
	}
</style>



<div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Clientes',array('controller' => 'Clientes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
                
		   		      
		    </div>
      </div> 

<div class="col-md-9">

<h2 id="input-groups-basic">Agregar Cliente</h2>

<?php echo $this->Form->create('Cliente',array('action' => 'add', 'id' => 'formulario','type' => 'file', 'role' => 'form')); ?>


<div class="row" style="margin-top: 0px; padding-top: 20px;">

     <div class="col-md-6">
    	<div class="form-group">
     	<label>Cliente por</label>
            <?php echo $this->Form->select('tipo',$clienteporArray, array('class'=>'form-control')); ?> 
    	</div>
    </div>
    
     <div class="col-md-6">
    	<div class="form-group">
     	<label>Nombre</label>
			<?php
                echo $this->Form->input('nombres', array('label' =>false, 'class'=>'form-control'));
            ?>
    	</div>
    </div>
    
      
 <!--Ocultar si es cliente por empresa
    ================================================== -->
    
   <div id="clientporInformation" class="hiddenClientpor"> 
   
     <div class="col-md-6">
   	  	 <div class="form-group">
    		<label>Apellidos</label>
				<?php
                echo $this->Form->input('apellidos', array('label' =>false, 'class'=>'form-control'));
           		 ?>
    	  </div>
    </div>
    
    <div class="col-md-6">
    	<div class="form-group">
     	<label>Tipo de cliente</label>
            <?php echo $this->Form->select('tipocliente',$tiposClientesArray, array('label'=>true, 'class'=>'form-control')); ?> 
    	</div>
    </div>
    
    
      <div class="col-md-6">
   	<div class="form-group sexoselect">
    	   <label>Sexo</label>
    	   <br/>
		<?php
             $options=array('M'=>'Masculino','F'=>'Femenino');
			 $attributes=array('legend'=>false);
			 echo $this->Form->radio('sexo',$options,$attributes);
         ?>
    </div>
  </div>
  
     <div class="col-md-6">
   	  <div class="form-group">
    	<label>Celular</label>
			<?php
                echo $this->Form->input('celular', array('label' =>false, 'class'=>'form-control'));
           	?>
    	</div>
   </div>
    
        <div class="col-md-6">
   	  	 <div class="form-group">
    		<label>Nacionalidad</label>
				<?php
                echo $this->Form->input('nacionalidad', array('label' =>false, 'class'=>'form-control'));
           		 ?>
    	  </div>
    </div>
    
        
    <div class="col-md-6">
    	<div class="form-group">
            <label>Tipo de identificacion</label>
            <?php
			   echo $this->Form->select('Cliente.tipoidentificacionid',$TipoIdentificacionArray, array('label'=>true, 'class'=>'form-control')); 
            ?>
    	</div>
    </div>


    <div class="col-md-6">
    	<div class="form-group">
            <label>Numero Identificacion</label>
            <?php
                echo $this->Form->input('Cliente.identificacion', array('label' =>false, 'class'=>'form-control'));
           	?>
    	</div>
    </div>

  </div>  
  
  <!-- fin
    ================================================== -->
  
      <div class="col-md-6">
   	  	 <div class="form-group">
    		<label>Correo Electronico</label>
				<?php
                echo $this->Form->Email('email', array('label' =>false, 'class'=>'form-control'));
           		 ?>
    	  </div>
    </div>
    
       <div class="col-md-6">
   	  <div class="form-group">
    	<label>Tel&eacute;fono</label>
			<?php
                echo $this->Form->input('telefono', array('label' =>false, 'class'=>'form-control'));
           	?>
    	</div>
   </div>
    
   
    <div class="col-md-11">
    	<div class="form-group">
            <label>Direcci&oacute;n</label>
            <?php
                echo $this->Form->input('direccion', array('label' =>false, 'class'=>'form-control'));
           	?>
    	</div>
    </div>
    
    
  <!--Muestra si es cliente con cuenta
    ================================================== -->
    
    <div id="clientInformation" class="hiddenClient">

	    <div class="col-md-6">
			<div class="form-group">
		         <label for="exampleInputEmail1">Usuario</label>
		         <?php echo $this->Form->input('Usuario.username',array('label'=>false,'placeholder'=>'Username', 'class'=>'form-control')); ?>
		    </div>
		</div>
	
		<div class="col-md-6">
			<div class="form-group">
		         <label for="exampleInputEmail1">Password</label>
		         <?php echo $this->Form->input('Usuario.password',array('label'=>false,'placeholder'=>'Username', 'class'=>'form-control')); ?>
		     </div>
		</div>
		
		<div class="col-md-6" style="padding-bottom: 20px;">
			<?php echo $this->Form->input('Usuario.archivo',array('type' => 'file')); ?>		 	
		</div>
	
	<div class="clearfix"><br/></div>
    
    </div>
    
     <!--fin
    ================================================== --> 
       
    
    
      
     
    
	<div class="col-md-6">
   		 <div class="form-group">
		            
            <?php	echo $this->Form->end(array('label' => 'Agregar Cliente','class' =>  'btn btn-default dropdown-toggle')); ?>
   		 </div>
    </div>



    </div>
 
	
	

</div>
