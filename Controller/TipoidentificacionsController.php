<?php
	
	class TipoidentificacionsController extends AppController {
		
	var $name = 'Tipoidentificacions';
	
	public $uses = array('Tipoidentificacion');
	
	//Esta funcion permite decidir que vistas seran accesibles para usuarios sin autentificacion.
		public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}
	
	public function index(){
   $this->set('Tipoidentificacions',$this->Tipoidentificacion->find('all'));
	}
	
	public function add(){
	   if($this->request->is('post')):	   
		 if($this->Tipoidentificacion->save($this->request->data)):
			$this->Session->setFlash('Registro Guardado');
			    $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
	public function edit($id = null){
		$this->Tipoidentificacion->id = $id;
		
		if(empty($this->data)){
		 	  $this->data = $this->Tipoidentificacion->read();
		   					  }
		 else {	    
				if ($this->Tipoidentificacion->save($this->data)){			  
					$this->Session->setFlash('Registro Modificado Correctamente', 'flash_custom');
					$this->redirect(array('action'=>'index'));
		      }
			  
	}
	}
	
	
	
	}
?>