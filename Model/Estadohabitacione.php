<?php
	class Estadohabitacione extends AppModel{
		
	public $name = 'Estadohabitacione';
	
	var $helpers = array('Html', 'Form' );	//Ayudantes para lenguaje HTML y ayudande para operaciones de formularios
	
	//Regla de validacion para campos obligatorios
	
	public	$validate = array(
 		'nombre' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		)
		
		);
	
		
	}
?>