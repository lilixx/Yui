<?php
class Tipotarjeta extends AppModel {
	
	public $name = 'Tipotarjeta';
	var $helpers = array('Html', 'Form' );


	public	$validate = array(
 		'nombre' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		));
}
?>