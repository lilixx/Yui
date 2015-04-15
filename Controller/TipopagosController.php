<?php
	class TipopagosController extends AppController {
		
	var $name = 'Tipopagos';
	public $uses = array('Tipopago','Tipopagos');
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
  	 $this->set('Tipopagos',$this->Tipopago->find('all'));
	}
	
	
	public function add(){
	   if($this->request->is('post')):	   
		
		 if($this->Tipopago->save($this->request->data)):
		 debug($this->data);
			$this->Session->setFlash('Registro Guardado');
			   $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
		public function edit($id = null){
		$this->Tipopago->id = $id;
		
		if(empty($this->data)){
		 	  $this->data = $this->Tipopago->read();
		   					  }
		 else {	 
		 
		/*--------------------Checkbox campo activo-------------------*/
	
		if(!isset($this->request->data['Tipopago']['activo'])){
                       $this->request->data['Tipopago']['activo'] = 0;
       			}
	 /*--------------------fin del checkbox-------------------*/
		 
		    
				if ($this->Tipopago->save($this->data)){			  
					$this->Session->setFlash('Registro Modificado Correctamente', 'flash_custom');
					$this->redirect(array('action'=>'index'));
		      }
			  
	}
	}
	public function baja($id = null){
		
	 $this->Tipopago->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo en la operacion!</h3><p>No se ha podido dar de baja al registro </p></div>');
	       $this->redirect(array('action'=>'index'));	
		}
		
	 	if ($this->Tipopago->updateAll(array('Tipopago.activo' => "'0'"),array('Tipopago.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>El registro se dio de Baja</h3></div>');
	        $this->redirect(array('action'=>'index'));
	    }
	}

}
	
?>