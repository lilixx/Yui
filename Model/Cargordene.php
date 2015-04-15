<?php
class Cargordene extends AppModel
{
  var $name = 'Cargordene';
  
  
    public $hasOne = 'Cubeta';

  
   public $belongsTo = array(
        'Cargo', 'Ordene'
    );
  
  
}  
?>
