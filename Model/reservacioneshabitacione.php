<?php
	class reservacioneshabitacione extends AppModel {
		
		public $name = 'reservacioneshabitaciones';
		
		var $helpers = array('Html', 'Form' );

	public	$validate = array(
 		'reservacionid' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		),
		
		'habitacionid' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		)
		);

		
		}
?>