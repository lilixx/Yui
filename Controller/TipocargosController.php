<?php
class TipocargosController extends AppController {


	public $name = 'Tipocargos';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session');

/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
		
			Security::setHash('md5');
			$this->Auth->allow('logout', 'login');
			$this->Auth->fields = array(
								'username' => 'username',
            					'password' => 'password'
            					);

	}//Fin Before filter



/*  ================== Funcion adminview =================== 
		Funcion para ver todos los tipos de cargos disponibles
	===================================================== */
public function adminview() {
 	$todosCargos = $this->Tipocargo->find('all');
		 $this->set('TipocargoArray', $todosCargos);

	}
	
/*  ================ Funcion adminadd ======================= 
		Funcion para Agregar Tipos de cargos al sistema
	====================================================== */
	
	public function adminadd() {
	
		if($this->request->is('post')) {
			$this->Tipocargo->create();
																			
				if ($this->Tipocargo->save($this->request->data)) {
					$this->Session->setFlash('El Tipo de cargo ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => 'adminview'));
				} else {
					$this->Session->setFlash('El Tipo de cargo no pudo ser creado Intente nuevamente', 'flash_error');
				}
		}
	
	}//Fin de la Funcion Huespedeadd




}?>