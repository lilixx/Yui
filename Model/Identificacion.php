<?php
		class Identificacion extends AppModel{
			
		public $name = 'Identificacion';
			
		public	$validate = array(
 		'nombre' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		));
			
			}
?>