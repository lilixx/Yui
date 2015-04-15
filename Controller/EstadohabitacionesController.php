<?php
	
	class EstadohabitacionesController extends AppController {
		
	var $name = 'Estadohabitaciones';
	
	public $uses = array('Estadohabitacione');
	
	//Esta funcion permite decidir que vistas seran accesibles para usuarios sin autentificacion.
	public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}
	
	public function index(){
   $this->set('Estadohabitaciones',$this->Estadohabitacione->find('all'));

	}
	
	public function add(){
	   if($this->request->is('post')):	   
		 if($this->Estadohabitacione->save($this->request->data)):
			$this->Session->setFlash('Registro Guardado');
			    $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
	public function edit($id = null){
		$this->Estadohabitacione->id = $id;
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Estadohabitacione->read();

		    } else {
				
	 /*--------------------Checkbox-------------------*/
	
		if(!isset($this->request->data['Estadohabitacione']['activo'])){
                       $this->request->data['Estadohabitacione']['activo'] = 0;
       			}
	 /*--------------------fin del checkbox-------------------*/
				
		    		    
		    	if ($this->Estadohabitacione->save($this->data)){			  
		            $this->Session->setFlash('Estado de habitacion Modificado Correctamente', 'flash_custom');
		             $this->redirect(array('action'=>'index'));
		        }
	}
	}
	
	public function baja($id = null){
		
	 $this->Estadohabitacione->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo en la operacion!</h3><p>No se ha podido dar de baja al registro </p></div>');
	       $this->redirect(array('action'=>'index'));	
		}
		
	 	if ($this->Estadohabitacione->updateAll(array('Estadohabitacione.activo' => "'0'"),array('Estadohabitacione.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>El Estado de habitacion se dio de Baja</h3></div>');
	        $this->redirect(array('action'=>'index'));
	    }

		
}
	
	}
?>