<?php
class Cargocategoria extends AppModel
{
  var $name = 'Cargocategoria';
  
   public $belongsTo = array(
        'Cargo', 'Categoria'
    );
  
  
} 
