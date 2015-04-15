<?php
class Tipordene extends AppModel {
 var $name = 'Tipordene';
  
   public $hasMany = array(
        'Categoriatipordene'
    );
  
  
}//Fin del modelo Tipordene
?>
