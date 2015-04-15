<?php
class CubetasController extends AppController {

	public $name = 'Cubetas';
	public $helpers = array('Html','Form','Time');
	public $components = array('RequestHandler','Session');
	public $uses = array('Categoriatipordene','Usuario','Folio','Cubeta','Categoriafolio','Cargordene','Cargosfolio','Tipordene','Categoria','Cargocategoria','Ordene');
	

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'conditions' => array('Ordene.activo' => '2'),
	        'limit' => 20,
	        'order' => array(
	            'Ordene.id' => 'desc'
	        )
	    );
	

/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
		
		
      		}//Fin Before filter  


/*  ================ Funcion index =================== 
		Funcion para mostrar los folios
     ====================================================== */
	public function index($id=null){
    
       
      	
	}

/*  ================ Funcion cubeta =================== 
	funcion donde se mandan a la cubeta los cargos agregados a una orden	
	====================================================== */
	
	public function cubeta($id = null) {
	
	 $Cargof = $this->Cargordene->find('all',array('conditions' => array('Ordene.id' => $id, 'Cargordene.cubeta' => '1')));
	 $cant = 0;
	 $cant2 = 0;
	 $this->set('id', $id);
	 $this->set('cant', $cant);
	 $this->set('Cargof', $Cargof);
  
        if($this->request->is('post')) { //si es una solicitud post	 

        $this->Cubeta->create();
	
		 foreach ($this->data as $data){ //para recorrer todos los cargos seleccionados
			
			if(!empty($data['Cubeta']['cargordene_id'])){ //solo toma encuenta los cargos a los que se le dieron check
			   $idcar = $data['Cubeta']['cargordene_id'];
   			   $this->Cargordene->updateAll(array('Cargordene.cubeta' => "'2'"),array('Cargordene.id'=> $idcar));//cambia cada cargo seleccionado a cubeta 2 
		       $data['Cubeta']['usuario_id'] = $this->Session->read('Usuario.id');//agrega el id del usuario logeado
		     
		       $this->Cubeta->saveAll($data); //guarda los datos en cubeta
	     } }
	
	 $this->redirect(array('controller' => 'Ordenes','action' => '/ordencambio/'.$id));	
	   

        } // fin del !empty

   }//Fin de la funcion cubeta
   
     /*  ================ Funcion cubetaview =================== 
	funcion para ver lo que hay en cubeta	
	====================================================== */
	public function cubetaview() {
    
       $this->set('FolioArray',$this->Folio->find('all',array('conditions' => array('Folio.activo' => '1'))));
   
    $this->set('CubetaArray',$this->Cargordene->find('all',array('conditions' => array('Cubeta.activo' => '1'))));
    
    $this->set('UsuarioArray',$this->Usuario->find('all'));
     
  
 
	}//Fin de la funcion adminview
	
	
	  /*  ================ Funcion dardebajacargo =================== 
	funcion para elminar los cargos de la cubeta	
	====================================================== */
	
	public function dardebajacargo($id = null) {
	
	 $this->Cubeta->id = $id;
		      		 
	    if (!$id) {
	       $this->Session->setFlash('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Error: El cargo no se ha podido eliminar.</div>');
	       $this->redirect(array('action' => '/'));	
		}
	
	 	  if ($this->Cubeta->updateAll(array('Cubeta.activo' => "'2'"),array('Cubeta.id' => $id))) {
	 	//if($this->Cargordene->delete($this->request->data('Cargordene.id'))){
           $this->Session->setFlash('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;El cargo ha sido dado de baja.</div>');
	       $this->redirect(array('controller' => 'Cubetas','action' => '/cubetaview'));	
	    }


   }//Fin de la funcion cubeta
   
}//Fin de la Clase
?>   
