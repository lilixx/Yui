<?php
	
	class TipohabitacionesController extends AppController {
		
	var $name = 'Tipohabitaciones';
	
	public $uses = array('Tipohabitacione');
	
	
	/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'conditions' => array('Tipohabitacione.activo' => '1'),
	        'limit' => 20,
	        'order' => array(
	            'Tipohabitacione.nombre' => 'asc',
	               
   	            
	        )
	    );
	
 /*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
					


	}
	
 /*  ================ Funcion index ======================= 
		
	====================================================== */	
	
	public function index(){
    $data = $this->paginate('Tipohabitacione');
   	$Tipohabitaciones = $this->Tipohabitacione->find('all', array('conditions' => array('Tipohabitacione.activo' => '1')));
    $this->set('Tipohabitaciones',$data);

	}
	
  /*  ================ Funcion add ======================= 
	 funcion para agregar tipos de habitaciones	
	====================================================== */	
	
	public function add(){
	   if($this->request->is('post')):	   
		 if($this->Tipohabitacione->save($this->request->data)):
			$this->Session->setFlash('Registro Guardado');
			   $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
   /*  ================ Funcion edit======================= 
	 funcion para editar tipos de habitaciones	
	====================================================== */	
	public function edit($id = null){
		$this->Tipohabitacione->id = $id;
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Tipohabitacione->read();

		    } else {
				
		/*--------------------Checkbox-------------------*/
	
		if(!isset($this->request->data['Tipohabitacione']['activo'])){
                       $this->request->data['Tipohabitacione']['activo'] = 0;
       			}
	 /*--------------------fin del checkbox-------------------*/
				
		    		    
		    	if ($this->Tipohabitacione->save($this->data)){			  
		            $this->Session->setFlash('Tipo de habitacion Modificado Correctamente', 'flash_custom');
		            $this->redirect(array('action' =>'index'));
		        }
	}
	}
	
	
	  /*  ================ Funcion baja ======================= 
	 funcion para dar de baja a un tipo de habitacion	
	====================================================== */	
	public function baja($id = null){
		
	 $this->Tipohabitacione->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo en la operacion!</h3><p>No se ha podido dar de baja al registro seleccionado</p></div>');
	       $this->redirect(array('action'=> 'index'));	
		}
		
	 	if ($this->Tipohabitacione->updateAll(array('Tipohabitacione.activo' => "'2'"),array('Tipohabitacione.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>El Tipo de habitacion se dio de Baja</h3></div>');
	      $this->redirect(array('action' =>'index'));
	    }

		
}
	
	}
?>
