<?php
class Cliente extends AppModel{
	
	public $name = 'Cliente';
	
		
	var $helpers = array('Html', 'Form' );
	
	
	public	$validate = array(
 		'nombres' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vac&iacute;­o'
 		)
		
	
		);
}

?>
