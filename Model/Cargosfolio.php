<?php
class Cargosfolio extends AppModel
{
  var $name = 'Cargosfolio';
	
	public $belongsTo = array(
        'Folio' => array(
            'className'    => 'Folio',
            'foreignKey'   => 'folioid'
        ), 
        'Cargo'=> array(
            'className'    => 'Cargo',
            'foreignKey'   => 'cargoid'
        )

    );

}
