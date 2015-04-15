<?php
class Habitacionfolio extends AppModel
{
  var $name = 'Habitacionfolio';
  
   public $belongsTo = array(
        'Folio', 'Habitacione'
    );
  
  
}  
?>
