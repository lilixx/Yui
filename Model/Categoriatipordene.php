<?php
class Categoriatipordene extends AppModel
{
  var $name = 'Categoriatipordene';
  
   public $belongsTo = array(
        'Tipordene', 'Categoria'
    );
  
  
}  
?>
