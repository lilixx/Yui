<?php
class TipotarjetasController  extends AppController {


	var $name = 'Tipotarjetas';
	public $uses = array('Tipotarjeta','Tipotarjetas');
	public $helpers = array('Html','Form');
	
	public $components = array('RequestHandler','Session');

/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}



	public function index() {
  	 $this->set('Tipotarjetas',$this->Tipotarjeta->find('all'));
	}
	
	
	public function add(){
	   if($this->request->is('post')):	   
		debug($this->data);
		 if($this->Tipotarjeta->save($this->request->data)):
		 debug($this->data);
			$this->Session->setFlash('Registro Guardado');
			   $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
		public function edit($id = null){
		$this->Tipotarjeta->id = $id;
		
		if(empty($this->data)){
		 	  $this->data = $this->Tipotarjeta->read();
		   					  }
		 else {	    
				if ($this->Tipotarjeta->save($this->data)){			  
					$this->Session->setFlash('Registro Modificado Correctamente', 'flash_custom');
					$this->redirect(array('action'=>'index'));
		      }
			  
	}
	}
	
	

}
	

?>