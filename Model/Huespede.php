<?php
App::uses('AuthComponent', 'Controller/Component');
class Huespede extends AppModel {
	
	public $name = 'Huespede';

public $hasMany = array(
        'Detallehuespede'
    );

    

}//Fin del modelo Huespede
?>
