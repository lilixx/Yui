<?php
class Reservacione extends AppModel{
	
	public $name = 'Reservacione';
	
	public $belongsTo = array(
        'Cliente' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'clienteid') 
    );	
    
    public $hasMany = array(
        'Reservacioneshabitacione' => array(
            'className' => 'Reservacioneshabitacione',
            'foreignKey'   => 'reservacionid',
            'conditions' => array('Reservacioneshabitacione.activo' => true)
        )
    );
    
   	
	
	
}

?>
