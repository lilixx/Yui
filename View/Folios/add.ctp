<?php // echo $this->Html->script('jquery-loader'); ?>
<?php
/*
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
*/?>

<script type="text/javascript">


function cambiarvisibilidad(){
	
	var posicion = document.getElementById("FolioFolioacargo").options.selectedIndex; //posicion
	FolioacargoSelected = document.getElementById("FolioFolioacargo").options[posicion].value;
	
	if(FolioacargoSelected == 2){
		$('#empresaInformation').removeClass("hiddenClient").addClass("visibleClient");
	}else{
		$('#empresaInformation').removeClass("visibleClient").addClass("hiddenClient");
	}
	
	if(FolioacargoSelected == 1){
		$('#huespedInformation').removeClass("hiddenClient").addClass("visibleClient");
	}else{
		$('#huespedInformation').removeClass("visibleClient").addClass("hiddenClient");
	}

}

 $(document).ready(function(){  
 
      $('#FolioFolioacargo').change(function() {
	      	cambiarvisibilidad();      
	  });
	 
});

</script>


<style type="text/css">

	.hiddenEmpresa, .hiddenHuesped{
		display:none;
		visibility:hidden;
	}
	
	.visibleClient{
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
	
	#FolioFolioacargo, #FolioTipoidentificacionid, #FolioTarjetaid, #UsuarioIdperfil{
		height: 30px;
		width: 100%;
		margin-bottom: 6px;	
	}
	
	#ClienteSexoM{
	margin-left:0px !important;
	}
</style>

    <!-- fin del script
    ================================================== -->



	  <div class="col-md-3"> 
      		<div class="list-group">
	      	  	<?php echo $this->Html->link('Mostrar Folios',array('controller' => 'Folios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Mostrar Cubeta',array('controller' => 'folios', 'action' => 'cubetaview', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		      	<?php echo $this->Html->link('Mostrar Estado de Cuentas',array('controller' => 'Tasacambios', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Tipo de Ordenes',array('controller' => 'Tipordenes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
			</div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
	

		<h2 id="input-groups-basic">Agregar Folio</h2>
		
		<?php echo $this->Form->create('Folio',array('action' => 'add', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">


  <div class="col-md-6">
    	<div class="form-group">
     	<label>Folio de</label>
            <?php echo $this->Form->select('folioacargo',$foliodeArray, array('label'=>true, 'class'=>'form-control' ,  'required'=>"required")); ?> 
    	</div>
    </div>
		
			
   
<!-- pide informacion de huesped
    ================================================== -->		
<div id="huespedInformation" class="hiddenHuesped">	

 <div class="col-md-6">
    	<div class="form-group">
            <label>Huésped</label>
           <br/>
            <?php
            if(isset($HuespedArray))
            {
			    echo $this->Form->select('Folio.huespedid',$HuespedArray, array('label'=>false, 'class'=>'form-control'));
		    }?>
      	</div>
    </div>
    
  <div class="col-md-6">
    	<div class="form-group">
            <label>Tipo de folio</label>
           <br/>
            <?php
	    	    echo $this->Form->select('Folio.tipofolioid',$TipofolioArray, array('label'=>false, 'class'=>'form-control'));
	        ?>
      	</div>
    </div>	
  
     <div class="col-md-6">
   <div class="form-group">
   <label for="exampleInputEmail1">Credito</label>
      <?php echo $this->Form->input('Folio.credito', array('label'=>false,'type'=>'select', 'options'=>array('1'=>'si', '2'=>'no'), 'class'=>'form-control')); ?>
    </div>
 </div>  
    
 </div>
 
 <!-- fin
    ================================================== -->   
 
 <!-- pide informacion de empresa
    ================================================== -->
  <div id="empresaInformation" class="hiddenEmpresa">

	 <div class="col-md-6">
    	<div class="form-group">
            <label>Empresa</label>
           <br/>
            <?php
            if(isset($EmpresaArray))
            {
			    echo $this->Form->select('Folio.empresaid',$EmpresaArray, array('label'=>false, 'class'=>'form-control'));
		    }?>
      	</div>
     </div>
     
     
     <div class="col-md-11">
   <div class="form-group">	
	 <label>Seleccione las categorias a dar credito</label> <br/>
	 <?php  foreach($CategoriaArray as $cat){ ?>	
     <b><?php	echo $cat['Categoria']['nombre']; ?></b> 

     <input type="checkbox" name="data[Categoriafolio][][categoria_id]" value="<?php	echo $cat['Categoria']['id']; ?>" id="menuselect" /> &nbsp;
     <?php }	?>
    </div>
  </div> 
	    
    </div>
    
  <!-- fin 
    ================================================== -->  
 <div class="col-md-11">
   <div class="form-group">	
	 <label>Seleccione los numeros de habitaciones</label> <br/>
	 <?php  foreach($HabitacioneArray as $hab){ ?>	
     <b><?php	echo $hab['Habitacione']['numhab']; ?></b> 

     <input type="checkbox" name="data[Habitacionfolio][][habitacione_id]" value="<?php	echo $hab['Habitacione']['id']; ?>" id="menuselect" /> &nbsp;
     <?php }	?>
    </div>
  </div>   
  
<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Observaciones</label>
	          <?php echo $this->Form->input('Folio.observacion',array('label'=>false,'placeholder'=>'Ingrese las observaciones', 'class'=>'form-control')); ?>
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
   
