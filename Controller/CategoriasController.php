<?php
class CategoriasController extends AppController {

	public $name = 'Categorias';
	public $helpers = array('Html','Form','Time');
	public $components = array('RequestHandler','Session');
	public $uses = array('Categoria');
	

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
            'limit' => 20,
	        'order' => array(
	            'Categoria.nombre' => 'desc'
	        )
	    );
	

/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
		
		
      		}//Fin Before filter  


/*  ================ Funcion index =================== 
		Funcion para mostrar las categorias 
     ====================================================== */
	public function index(){
    
        $data = $this->paginate('Categoria');
        $CategoriaArray = $this->Categoria->find('all');
        $this->set('CategoriaArray',$data);
		
	}

/*  ================ Funcion add =================== 
		Funcion para agregar categoria
     ====================================================== */

public function add(){
	
	if($this->request->is('post')) { //si es una solicitud post	 

        $this->Categoria->create();
        
                if ($this->Categoria->save($this->request->data)) {

                $this->Session->setFlash('La Categoria ha sido creada satisfactoriamente','flash_custom');
                $this->redirect(array('controller' => 'categorias','action' => 'index'));

            } else {
                $this->Session->setFlash('Error, la Categoria no fue creada. Intente nuevamente', 'flash_error');
            }

  }//Fin if is post
        
}//fin de la funcion


/*  ================ Funcion edit =================== 
		Funcion para  editar categoria
	====================================================== */

	public function edit($id = null) {
		
	  $this->Categoria->id = $id;
               
	  $Categoriaa = $this->Categoria->find('all');
 
          foreach ($Categoriaa as $row){
			$CategoriaArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
		}  

	  $this->set('CategoriaArray', $CategoriaArray);
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Categoria->read();

		    } else {
		    		    
		    	if ($this->Categoria->save($this->data)){			  
		            $this->Session->setFlash('Categoria Modificada Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/index'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion edit


}//Fin de la Clase
?>		    	
