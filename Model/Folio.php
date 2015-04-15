<?php
class Folio extends AppModel
{
  var $name = 'Folio';
	
	public $belongsTo = array(
        'Huespede' => array(
            'className'    => 'Huespede',
            'foreignKey'   => 'huespedid'
        ), 
        
         'Cliente' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'empresaid'
        ),
        
        'Tipofolio'=> array(
            'className'    => 'Tipofolio',
            'foreignKey'   => 'tipofolioid'
        )

    );
    
     public $hasMany = array(
        'Habitacionfolio', 'Categoriafolio'
    );

}
