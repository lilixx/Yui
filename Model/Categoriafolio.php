<?php
class Categoriafolio extends AppModel
{
  var $name = 'Categoriafolio';
  
   public $belongsTo = array(
        'Folio', 'Categoria'
    );
  
  
}  
?>
