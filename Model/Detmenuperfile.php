<?php
class Detmenuperfile extends AppModel
{
  var $name = 'Detmenuperfile';
  
   
  public $belongsTo = array(
        'Menu' => array(
            'className'    => 'Menu',
            'foreignKey'   => 'idmenu'
        ), 
        
         'Perfile' => array(
            'className'    => 'Perfile',
            'foreignKey'   => 'idperfil'
        )
        
    );
      

}
?>