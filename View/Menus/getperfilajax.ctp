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

<?php

	$checked = "";
	foreach($DetmenuperfileDisponibles as $mps){
		if($mps['Detmenuperfile']['idmenu'] == $menu['Menu']['id']){
			$checked = " checked=\"checked\" ";
		}
	}
?>


 <tr>
	<td><input type="checkbox" name="data[Menu][id][]" value="<?php	echo $menu['Menu']['id']; ?>" id="menuselect" <?php echo $checked; ?> ></td>
    <td><?php	echo $menu['Menu']['nombre']; ?></td>
    <td><?php	echo $menu['Menu']['url']; ?></td>
  </tr>
<?php }	?>
 </tbody>
</table>
