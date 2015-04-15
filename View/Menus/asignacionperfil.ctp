<?php	$URLSITE = Router::url('/', true);	?>

<script type="text/javascript">

var ProfileSelected = null;

function ProfileprocedureBind(){
	var posicion = document.getElementById("PerfileId").options.selectedIndex; //posicion
	ProfileSelected = document.getElementById("PerfileId").options[posicion].value;
}

function buscarMenus(){

	if(ProfileSelected == ""){
		ProfileSelected = null;
	}

		$.ajax({  
                url: <?php echo "'" . $URLSITE . "Menus/getperfilajax/'"; ?> + ProfileSelected,  
                contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                beforeSend: function() {
                     $('#div_dinamico').html('<img src="/img/loading.gif">');
                    },
                success: function(data) {  
                    $('#div_dinamico').html(data);  
                }  
            }); 
}


$(document).ready(function(){  
	
	$('#PerfileId').change(function() {
     	ProfileprocedureBind();
     	buscarMenus();
       });
       
      
});

	

</script>

<style type="text/css">

#PerfileId {
  border: 2px solid #ADD8E6;
  clear: both;
  height: 35px;
  margin-left: 20px;
  padding-top: 6px;
  text-align: center;
  vertical-align: middle;
  width: 250px;
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

		<h2 id="input-groups-basic">Asignacion de Menus a perfiles</h2>
		
	<?php echo $this->Form->create('Menu',array('action' => 'Asignacionperfil', 'id' => 'formulario','type' => 'file', 'role' => 'form')); ?>

	

<div class="row">
		
			
	<div class="col-md-11">
		<div class="form-group">
			<label for="exampleInputEmail1">Nombre del perfil </label>
			 <?php	echo $this->Form->select('Perfile.id',$PerfilesArray, array('label'=>true)); ?>
		</div>
	</div>


<div class="col-md-11" id="div_dinamico">

<table class="table table-hover">
<thead>
        <tr>
          <th>Activo</th>
          <th>Menu</th>
          <th>URL</th>
        </tr>
      </thead>
      
      <tbody>
       
     
<?php	foreach($MenusArray as $menu){	?>

 <tr>
	<td><input type="checkbox" name="data[Menu][id][]" value="<?php	echo $menu['Menu']['id']; ?>" id="menuselect" /></td>
    <td><?php	echo $menu['Menu']['nombre']; ?></td>
    <td><?php	echo $menu['Menu']['url']; ?></td>
  </tr>
<?php }	?>
 </tbody>
</table>

</div>



		<div class="col-md-11">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Modificar Menu','class' =>  'btn btn-default')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


