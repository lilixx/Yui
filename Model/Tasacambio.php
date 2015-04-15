<?php
App::uses('AuthComponent', 'Controller/Component');
class Tasacambio extends AppModel {
	
	public $name = 'Tasacambio';

public $belongsTo = array(
        'Moneda' => array(
            'className'    => 'Moneda',
            'foreignKey'   => 'monedaid'
        )

);

} //fin del modelo tasa de cambio
?>
