<?php
class Habitacione extends AppModel {
	
	public $name = 'Habitacione';
		
	var $helpers = array('Html', 'Form' );
	
	public $belongsTo = array(
        'Tipohabitacione' => array(
            'className'    => 'Tipohabitacione',
            'foreignKey'   => 'tipohabitacionid'
        )
    ); 
	
	public $hasMany = array(
        'Habitacionfolio', 'Detallehuespede'
    );

	public	$validate = array(
 		'numhab' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		),
		
		'tipohabitacionid' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		),
		
		'descripcion' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		),
		
		'estadohabitacionid' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		),
		
		'activo' => array(
 		'rule' => 'notEmpty',
 		'message' => 'El campo nombre no puede ser vacío'
 		)
		
		);
		
		
		

}//Fin del modelo Habitacione
?>
