<?php
	class Tipopago extends AppModel{
		
		public $name = 'Tipopago';
	
		
		var $helpers = array('Html', 'Form' );
	
	
			public	$validate = array(
				'nombre' => array(
				'rule' => 'notEmpty',
				'message' => 'El campo nombre no puede ser vacío'
				));
	
	}

?>