<?php
	
	class EstadoreservacionesController extends AppController {
		
	var $name = 'Estadoreservaciones';
	
	public $uses = array('Estadoreservacione');
	
	//Esta funcion permite decidir que vistas seran accesibles para usuarios sin autentificacion.
	public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}
	
	public function index(){
   $this->set('Estadoreservaciones',$this->Estadoreservacione->find('all'));

	}
	
	public function add(){
	   if($this->request->is('post')):	   
		 if($this->Estadoreservacione->save($this->request->data)):
			$this->Session->setFlash('Registro Guardado');
			    $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
	public function edit($id = null){
		$this->Estadoreservacione->id = $id;
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Estadoreservacione->read();

		    } else {
				
	 /*--------------------Checkbox-------------------*/
	
		if(!isset($this->request->data['Estadoreservacione']['activo'])){
                       $this->request->data['Estadoreservacione']['activo'] = 0;
       			}
	 /*--------------------fin del checkbox-------------------*/
				
		    		    
		    	if ($this->Estadoreservacione->save($this->data)){			  
		            $this->Session->setFlash('Estado de reservacion Modificado Correctamente', 'flash_custom');
		             $this->redirect(array('action'=>'index'));
		        }
	}
	}
	
	public function baja($id = null){
		
	 $this->Estadoreservacione->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo en la operacion!</h3><p>No se ha podido dar de baja al registro </p></div>');
	       $this->redirect(array('action'=>'index'));	
		}
		
	 	if ($this->Estadohabitacione->updateAll(array('Estadoreservacione.activo' => "'0'"),array('Estadoreservacione.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>El Estado de reservacion se dio de Baja</h3></div>');
	        $this->redirect(array('action'=>'index'));
	    }

		
}
	
	}
?>