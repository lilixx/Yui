<?php
class Ordene extends AppModel
{
  var $name = 'Ordene';
	
	public $hasMany = array(
        'Cargordene'
    );
    
    public $belongsTo = array(
        'Tipordene' => array(
            'className'    => 'Tipordene',
            'foreignKey'   => 'tipoid'
        ),
        
        'Usuario' => array(
            'className'    => 'Usuario',
            'foreignKey'   => 'usuarioid'
        ),
        
        'Folio' => array(
            'className'    => 'Folio',
            'foreignKey'   => 'folioid'
        )
        
    );    

}
?>
