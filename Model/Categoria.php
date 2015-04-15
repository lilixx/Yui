<?php
class Categoria extends AppModel {
 var $name = 'Categoria';
  
   public $hasMany = array(
        'Cargocategoria', 'Categoriafolio', 'Categoriatipordene'
    );


}//Fin del modelo Categoria
?>
