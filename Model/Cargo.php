<?php
class Cargo extends AppModel {
	
	public $name = 'Cargo';
  
 public $belongsTo = array(
        'Tipocargo' => array(
            'className'    => 'Tipocargo',
            'foreignKey'   => 'idtipocargo'
        )	
 );
 
 public $hasMany = array(
        'Cargocategoria', 'Cargordene'
    );


}//Fin del modelo Cargo
?>
