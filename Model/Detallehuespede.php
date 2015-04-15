<?php
class Detallehuespede extends AppModel
{
  var $name = 'Detallehuespede';
  
 public $belongsTo = array(
        'Huespede', 'Habitacione', 'Usuario'
    );

  
  
}  
?>
