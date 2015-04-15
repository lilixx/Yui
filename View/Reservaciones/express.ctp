<?php	$URLSITE = Router::url('/', true);	?>


<style type="text/css">

/*
    Common 
*/

.wizard,
.tabcontrol
{
    display: block;
    width: 100%;
    overflow: hidden;
}

.wizard a,
.tabcontrol a
{
    outline: 0;
}

.wizard ul,
.tabcontrol ul
{
    list-style: none !important;
    padding: 0;
    margin: 0;
}

.wizard ul > li,
.tabcontrol ul > li
{
    display: block;
    padding: 0;
}

/* Accessibility */
.wizard > .steps .current-info,
.tabcontrol > .steps .current-info
{
    position: absolute;
    left: -999em;
}

.wizard > .content > .title,
.tabcontrol > .content > .title
{
    position: absolute;
    left: -999em;
}



/*
    Wizard
*/

.wizard > .steps
{
    position: relative;
    display: block;
    width: 100%;
}

.wizard.vertical > .steps
{
    display: inline;
    float: left;
    width: 30%;
}

.wizard > .steps .number
{
    font-size: 1.429em;
}

.wizard > .steps > ul > li
{
    width: 20%;
}

.wizard > .steps > ul > li,
.wizard > .actions > ul > li
{
    float: left;
}

.wizard.vertical > .steps > ul > li
{
    float: none;
    width: 100%;
}

.wizard > .steps a,
.wizard > .steps a:hover,
.wizard > .steps a:active
{
    display: block;
    width: auto;
    margin: 0 0.5em 0.5em;
    padding: 1em 1em;
    text-decoration: none;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard > .steps .disabled a,
.wizard > .steps .disabled a:hover,
.wizard > .steps .disabled a:active
{
    background: #eee;
    color: #aaa;
    cursor: default;
}

.wizard > .steps .current a,
.wizard > .steps .current a:hover,
.wizard > .steps .current a:active
{
    background: #2184be;
    color: #fff;
    cursor: default;
}

.wizard > .steps .done a,
.wizard > .steps .done a:hover,
.wizard > .steps .done a:active
{
    background: #9dc8e2;
    color: #fff;
}

.wizard > .steps .error a,
.wizard > .steps .error a:hover,
.wizard > .steps .error a:active
{
    background: #ff3111;
    color: #fff;
}

.wizard > .content
{
	background: none repeat scroll 0 0 #EEEEEE;
	border-radius: 5px;
	display: block;
	margin: 0.5em;
	min-height: 40em;
	overflow: auto;
	position: relative;
	width: auto;
}

.wizard.vertical > .content
{
    display: inline;
    float: left;
    margin: 0 2.5% 0.5em 2.5%;
    width: 65%;
}

.wizard > .content > .body
{
    float: left;
    position: absolute;
    width: 95%;
    height: 95%;
    padding: 2.5%;
}

.wizard > .content > .body ul
{
    list-style: disc !important;
}

.wizard > .content > .body ul > li
{
    display: list-item;
}

.wizard > .content > .body > iframe
{
    border: 0 none;
    width: 100%;
    height: 100%;
}

.wizard > .content > .body input
{
    display: block;
    border: 1px solid #ccc;
}

.wizard > .content > .body input[type=checkbox]
{
    display: inline-block;
}

.wizard > .content > .body input.error
{
    background: rgb(251, 227, 228);
    border: 1px solid #fbc2c4;
    color: #8a1f11;
}

.wizard > .content > .body label
{
    display: inline-block;
    margin-bottom: 0.5em;
}

.wizard > .content > .body label.error
{
    color: #8a1f11;
    display: inline-block;
    margin-left: 1.5em;
}

.wizard > .actions
{
    position: relative;
    display: block;
    text-align: right;
    width: 100%;
}

.wizard.vertical > .actions
{
    display: inline;
    float: right;
    margin: 0 2.5%;
    width: 95%;
}

.wizard > .actions > ul
{
    display: inline-block;
    text-align: right;
}

.wizard > .actions > ul > li
{
    margin: 0 0.5em;
}

.wizard.vertical > .actions > ul > li
{
    margin: 0 0 0 1em;
}

.wizard > .actions a,
.wizard > .actions a:hover,
.wizard > .actions a:active
{
    background: #2184be;
    color: #fff;
    display: block;
    padding: 0.5em 1em;
    text-decoration: none;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard > .actions .disabled a,
.wizard > .actions .disabled a:hover,
.wizard > .actions .disabled a:active
{
    background: #eee;
    color: #aaa;
}

.wizard > .loading
{
}

.wizard > .loading .spinner
{
}



/*
    Tabcontrol
*/

.tabcontrol > .steps
{
    position: relative;
    display: block;
    width: 100%;
}

.tabcontrol > .steps > ul
{
    position: relative;
    margin: 6px 0 0 0;
    top: 1px;
    z-index: 1;
}

.tabcontrol > .steps > ul > li
{
    float: left;
    margin: 5px 2px 0 0;
    padding: 1px;

    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.tabcontrol > .steps > ul > li:hover
{
    background: #edecec;
    border: 1px solid #bbb;
    padding: 0;
}

.tabcontrol > .steps > ul > li.current
{
    background: #fff;
    border: 1px solid #bbb;
    border-bottom: 0 none;
    padding: 0 0 1px 0;
    margin-top: 0;
}

.tabcontrol > .steps > ul > li > a
{
    color: #5f5f5f;
    display: inline-block;
    border: 0 none;
    margin: 0;
    padding: 10px 30px;
    text-decoration: none;
}

.tabcontrol > .steps > ul > li > a:hover
{
    text-decoration: none;
}

.tabcontrol > .steps > ul > li.current > a
{
    padding: 15px 30px 10px 30px;
}

.tabcontrol > .content
{
    position: relative;
    display: inline-block;
    width: 100%;
    height: 35em;
    overflow: hidden;
    border-top: 1px solid #bbb;
    padding-top: 20px;
}

.tabcontrol > .content > .body
{
    float: left;
    position: absolute;
    width: 95%;
    height: 95%;
    padding: 2.5%;
}

.tabcontrol > .content > .body ul
{
    list-style: disc !important;
}

.tabcontrol > .content > .body ul > li
{
    display: list-item;
}


.hiddenClient {
    display: none;
    visibility: hidden;
}
.visibleClient {
    display: block;
    visibility: visible;
}
.sexoselect {
    padding-bottom: 15px;
}
.form-group.sexoselect > input {
    border: 2px solid #FF0000;
    margin-left: 20px;
    margin-right: 4px;
}
#ClienteTipocliente, #ClienteTipoidentificacionid, #ClienteTarjetaid, #UsuarioIdperfil {
    height: 30px;
    margin-bottom: 6px;
    width: 100%;
}
#SexoM, #SexoF{
    margin-left: 0 !important;
}

    .sexoselect{
    
    }
    
    .sexoselect input{
    float: left;
position: relative;
    }

    .sexoselect label{
    float: left;
position: relative;
    }
    </style>




<script src="<?php echo $URLSITE . "js/jquerysteps/jquery.steps.js"; ?>"></script>

<link rel="stylesheet" href="<?php echo $URLSITE . "css/jquery-ui.css"; ?>">

<script type="text/javascript" src="<?php echo $URLSITE . "js/jquery-ui.js"; ?>"></script>


<script>

$(function (){
    $("#wizard").steps({
       headerTag: "h2",
       bodyTag: "section",
       transitionEffect: "slideLeft"
      });
});
</script>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script type="text/javascript">  

$(function() {
    $( "#fechainicio" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#fechafin" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#fechafin" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#fechainicio" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  
function getHabitacionesDisponibles(){
			$.ajax({  
                url: 'http://teodolinda.no-ip.org/Habitaciones/searchAjax?FechaIni=' + FechaIni + '&FechaFin='+ FechaFin + '&destination='+ DestinationSelected,  
                contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                beforeSend: function() {
                     $('#div_dinamico').html('<img src="/img/url.gif">');
                    },
                success: function(data) {  
                    $('#div_dinamico').html(data);  
                }  
            }); 
            
}


			
</script>
<!-- 

<div class="col-md-3"> 
	<div class="list-group">
		<?php echo $this->Html->link('Mostrar Reservaciones',array('controller' => 'Reservaciones', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
     	<?php echo $this->Html->link('Agregar Reservacion',array('controller' => 'Reservaciones', 'action' => 'add', 'full_base' => true),  array('class' => 'list-group-item')); ?>	      
    </div>
</div> 
-->


<div class="col-md-12">

<h2 id="input-groups-basic">Agregar Reservaci&oacute;n Express</h2>


<section>

	
	<div class="col-md-3 col-sm-12">
	
<form id="searchform" class="form-signin" role="form" method="post">
	
	<div class="panel panel-primary">
	
	<div class="panel-heading">
	        <h3 class="panel-title">Fecha de entrada y salida</h3>
	    </div>

	
	<div class="panel-body">
	
			<p><label>Fecha de Entrada: </label><input type="text" id="fechainicio" class="form-control"></p>
	
			<p><label>Fecha de Salida</label><input type="text" id="fechafin"  class="form-control"></p>
		
			<?php /*echo $this->Form->input('Reservacione.fechasalida',array('label'=>false, 'class'=>''));
					echo $this->Form->input('Reservacione.fechaentrada',array('label'=>false,'class'=>''));		*/ ?>
			
	
	</div></div>
	
	<!-- ............... -->
	<div class="panel panel-primary">
		
		<div class="panel-heading">
	        <h3 class="panel-title">Cantidad de habitaciones</h3>
	    </div>
	    
	    
		  <div class="panel-body">
		 	   	
				<label>Cantidad de Habitaci&oacute;n</label>
		        <?php //echo $this->Form->input('Reservacione.canthab',array('label'=>false, 'class'=>'')); ?>
		        
		        <select name="data[Reservacione][canthab]" placeholder="Tipo de Habitacion" class="form-control" id="ReservacioneCanthab">
					<option value="1">1 Habitaci&oacute;n</option>
					<option value="2">2 Habitaciones</option>
					<option value="3">3 habitaciones</option>
					<option value="4">4 habitaciones</option>
					<option value="5">5 habitaciones</option>
					<option value="6">6 habitaciones</option>
					<option value="7">7 habitaciones</option>
					<option value="8">8 habitaciones</option>
					<option value="9">9 habitaciones</option>
				</select>
				
		       <label>Cantidad de Adultos</label>
		       <?php // echo $this->Form->input('Reservacione.cantadultos',array('label'=>false, 'class'=>'form-control')); ?>
		       
		       <select name="data[Reservacione][cantadultos]" placeholder="Tipo de Habitacion" class="form-control" id="ReservacioneCantadultos">
					<option value="1">1 Adulto</option>
					<option value="2">2 Adultos</option>
					<option value="3">3 Adultos</option>
					<option value="4">4 Adultos</option>
					<option value="5">5 Adultos</option>
					<option value="6">6 Adultos</option>
					<option value="7">7 Adultos</option>
					<option value="8">8 Adultos</option>
					<option value="9">9 Adultos</option>
					<option value="10">10 Adultos</option>
				</select>

		 
		
		       <label>Cantidad de ni&ntilde;os</label>
		       <?php // echo $this->Form->input('Reservacione.cantninos',array('label'=>false, 'class'=>'form-control')); ?>
		        <select name="data[Reservacione][cantninos]" placeholder="Tipo de Habitacion" class="form-control" id="ReservacioneCantninos">
					<option value="1">1 Ni&ntilde;o</option>
					<option value="2">2 Ni&ntilde;os</option>
					<option value="3">3 Ni&ntilde;os</option>
					<option value="4">4 Ni&ntilde;os</option>
					<option value="5">5 Ni&ntilde;os</option>
					<option value="6">6 Ni&ntilde;os</option>
					<option value="7">7 Ni&ntilde;os</option>
					<option value="8">8 Ni&ntilde;os</option>
					<option value="9">9 Ni&ntilde;os</option>
					<option value="10">10 Ni&ntilde;os</option>
				</select>

		         
		       <label>Tipo de Habitaci&oacute;n</label>
		       <?php echo $this->Form->select('Reservacione.TipoHabitacionesArray',$TipoHabitacionesArray, array('label'=>false,'placeholder'=>"Tipo de Habitacion", 'class' => 'form-control'));?>
		   
		   <br/>
		   <!-- <a href="#" class="btn btn-info" id="limpiarseleccion" style="width:100%;">Consultar disponibilidad</a> -->
		   <button style="float: left; padding: 5px; margin: 3px; width: 100%;" type="submit" class="btn btn-lg btn-info btn-block">Consultar</button>
		   
		   <script type="text/javascript">
        // Funcion para recepcionar el submit del formulario
$( "#searchform" ).submit(function( event ) {
	  // Stop form from submitting normally
	  event.preventDefault();
	  url = "http://teodolinda.no-ip.org/Habitaciones/searchAjax";
	  // Get the values from the page:
	   fechainicio = $( "#fechainicio" ).val();
	   fechafin = $( "#fechafin" ).val();
	   ReservacioneCanthab = $( "#ReservacioneCanthab" ).val();
	   ReservacioneCantadultos = $( "#ReservacioneCantadultos" ).val();
	   ReservacioneCantninos = $( "#ReservacioneCantninos" ).val();
	   ReservacioneTipoHabitacionesArray = $( "#ReservacioneTipoHabitacionesArray" ).val();
	   
	   
	  // Send the data using post
	  var posting = $.post( url, {  fechainicio: fechainicio,
	  							 	fechafin: fechafin,  
	  							 	ReservacioneCanthab: ReservacioneCanthab, 
	  							 	ReservacioneCantadultos: ReservacioneCantadultos,
	  							 	ReservacioneCantninos : ReservacioneCantninos,
	  							 	ReservacioneTipoHabitacionesArray : ReservacioneTipoHabitacionesArray 
	  							 	} );
	  // Put the results in a div
	  posting.done(function( data ) {
	  	
		var content = $( data );
    	$( "#contenidobusqueda" ).empty().append( content );
	    
	 });
});

        </script>
		   
		  </div>
		</div>
		
		
		
</form>	
	</div>
	
	
	

<div class="col-md-9 col-sm-12">
	
	<div id="contenidobusqueda">
		
	<table class="table table-bordered" style="width:100%">
	<thead>
      <tr>
      	<th>Seleccionar</th>
		<th>Numero de habitacion</th>
        <th>Tipo de habitacion</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Imagen</th>  
	   </tr>
    </thead>
	<tbody>
			
		
 </tbody>
</table>

	</div>

</div>

</section>








</div>






