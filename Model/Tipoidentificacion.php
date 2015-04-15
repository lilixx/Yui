<?php
	class Tipoidentificacion extends AppModel{
		
		public $name = 'Tipoidentificacion';
			
		public	$validate = array(
 		'nombre' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		));
		
		}
?>