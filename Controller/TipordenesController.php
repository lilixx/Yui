<?php
class TipordenesController extends AppController {


	public $name = 'Tipordenes';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session');
	public $uses = array('Tipordene', 'Categoria', 'Categoriatipordene');
	
/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
            'limit' => 20,
	        'order' => array(
	            'Tipordene.nombre' => 'desc'
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
    
        $data = $this->paginate('Tipordene');
        $TipordeneArray = $this->Tipordene->find('all');
        $this->set('TipordeneArray',$data);
		
	}
	
/*  ================ Funcion view ============================== 
		Funcion para mostrar todos la infor. de un tipo de orden
     ============================================================ */
	public function view($id=null){
    
       // $this->Folio->id= $id;
        $this->set('id', $id);
        $this->set('TipordeneArray',$this->Tipordene->find('all',array('conditions' => array('Tipordene.id' => $id))));
        $this->set('CategoriatipordeneArray',$this->Categoriatipordene->find('all',array('conditions' => array('Categoriatipordene.tipordene_id' => $id)))); 
   }     	
	
/*  ================ Funcion add ======================= 
		Funcion para Agregar Tipos de ordenes al sistema
	====================================================== */
	
	public function add() {
	
		$CategoriaArray = $this->Categoria->find('all');
		$this->set('CategoriaArray', $CategoriaArray);
		
		if($this->request->is('post')) {
			$this->Tipordene->create();
			
		//	debug($this->request->data);
																			
				if ($this->Tipordene->saveAll($this->request->data)) {
					$this->Session->setFlash('El Tipo de orden ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => '/index'));
				} else {
					$this->Session->setFlash('El Tipo de orden no pudo ser creado Intente nuevamente', 'flash_error');
				} 
		}
	
	}//Fin de la Funcion add
	
	
/*  ================ Funcion edit =================== 
		Funcion para  editar tipo de orden
	====================================================== */

	public function edit($id = null) {
		
	  $this->Tipordene->id = $id;
               
	  $Ordenee = $this->Tipordene->find('all');
 
          foreach ($Ordenee as $row){
			$OrdeneArray["{$row['Tipordene']['id']}"] = "{$row['Tipordene']['nombre']}";		
		}  

	  $this->set('OrdeneArray', $OrdeneArray);
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Tipordene->read();
		 	
		    } else {
		    		    
		    	if ($this->Tipordene->save($this->data)){			  
		            $this->Session->setFlash('Tipo de orden Modificada Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/index'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion edit	




}?>
