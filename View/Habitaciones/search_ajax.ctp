<?php	$URLSITE = Router::url('/', true);	?>
<?php foreach($Habitaciones as $hab){	?>

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-calendar"></span> Habitacion <?php echo $hab['Habitacione']['numhab']; ?></h3>
      </div>
      <div class="panel-body">
    
      	<table style="width: 100%">
			<tr>
				<td><input type="checkbox"></td>
				<td><img style="height: 50px; width: 50px; display: block;" alt="<?php echo $URLSITE . "" . $hab['Habitacione']['numhab']; ?>" src="<?php echo $hab['Habitacione']['imghabitacion']; ?>"></td>
				<td><b>Tipo de Habitaci&oacute;n:</b> <?php echo $hab['Tipohabitacione']['nombre']; ?></td>
				<td><b>Detalles:</b> <?php echo $hab['Habitacione']['descripcion']; ?></td>
				
			</tr>
		  </table>       
      </div>
</div>

<?php }//end foreach	?>