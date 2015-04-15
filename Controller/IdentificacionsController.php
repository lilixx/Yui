<?php
	class IdentificacionsController extends AppController {
		
		var $name = 'Identificacions';
	
	public $uses = array('Identificacion','Tipoidentificacion');
	
	//Esta funcion permite decidir que vistas seran accesibles para usuarios sin autentificacion.
		public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}
	
	public function index(){
   $this->set('Identificacions',$this->Identificacion->find('all'));
	$this->set('TipoidentificacionArray',$this->Tipoidentificacion->find('all'));
   
	}
	
	public function add(){
	   if($this->request->is('post')):	   
	   
	   /*Obtenemos la informacion de los tipos de indentificacion disponibles*/
	   		$Tipoidentificaciona = $this->Tipoidentificacion->find('all');


			/*-Recorremos los elementos del arreglo --*/
		foreach($Tipoidentificaciona as $row){
				$TipoidentificacionArray["{$row['Tipoidentificacions']['id']}"] = "{$row['Tipoidentificacions']['nombre']}";
		}
		
		//Enviamos los valores obtenidos del arreglo a la vista
	   		$this->set('TipoidentificacionArray',$TipoidentificacionArray);
	   
	   
		 if($this->Identificacion->save($this->request->data)):
			$this->Session->setFlash('Registro Guardado');
			    $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
	public function edit($id = null){
		$this->Identificacion->id = $id;
		
		if(empty($this->data)){
		 	  $this->data = $this->Identificacion->read();
		   					  }
		 else {	    
				if ($this->Tipoidentificacion->save($this->data)){			  
					$this->Session->setFlash('Registro Modificado Correctamente', 'flash_custom');
					$this->redirect(array('action'=>'index'));
		      }
			  
	}
	}
	
	
	



}