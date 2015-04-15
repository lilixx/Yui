<?php

	class Tipohabitacione extends AppModel {
	
	public $name = 'Tipohabitacione';
	
	var $helpers = array('Html', 'Form' );	//Ayudantes para lenguaje HTML y ayudande para operaciones de formularios
	
	//Restriccion para campos obligatorios que se encuentren vacios
	
	public	$validate = array(
 		'nombre' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		),
		
		'precio' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		)
		);
	}
?>