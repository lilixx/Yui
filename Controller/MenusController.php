<?php
class MenusController extends AppController {


	public $name = 'Menus';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session', 'Paginator');
	public $uses = array('Menu', 'Perfile', 'Detmenuperfile');


/*  ================ Funcion AdminView =================== 
		Funcion para ver los menus del sistema
	====================================================== */
public function index() {

 	$data = $this->paginate('Menu');
   	$MenusArray = $this->Menu->find('all');
	$this->set('MenusArray',$data);

}//Fin de la funcion Index

/*  ================ Funcion add =================== 
		Funcion para agregar los menus del sistema
	====================================================== */
	public function add() {
	
	
	//Se obtienen y se pasan a la vista los Menus disponibles
	$MenusDisponibles = $this->Menu->find('all', array('conditions'=>array('Menu.idpadre' => 0)));
	foreach($MenusDisponibles as $row){
		$MenusPadresArray["{$row['Menu']['id']}"] = "{$row['Menu']['nombre']}";
		}
	$this->set('MenusPadresArray', $MenusPadresArray);
	

	
		if($this->request->is('post')) {
			$this->Menu->create();
			$NuevoMenu['Menu'] = $this->request->data['Menu'];		
			
			
			if ($this->Menu->save($NuevoMenu)) {
					$this->Session->setFlash('El Menu se ha guardado','flash_custom');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('El Menu no no pudo ser creado Intente nuevamente', 'flash_error');
				}

		}//Fin de if request post

	}//Fin de la funcion


/*  ================ Funcion edit =================== 
		Funcion para editar los menus del sistema
	====================================================== */
public function edit($id = null){

//Se obtienen y se pasan a la vista los Menus disponibles
	$MenusDisponibles = $this->Menu->find('all', array('conditions'=>array('Menu.idpadre' => 0)));
	foreach($MenusDisponibles as $row){
		$MenusPadresArray["{$row['Menu']['id']}"] = "{$row['Menu']['nombre']}";
		}
	$this->set('MenusPadresArray', $MenusPadresArray);


$this->Menu->id = $id;
if(empty($this->data)){
	$this->data = $this->Menu->read();
} else {
	    
	if ($this->Menu->save($this->data)){		
	$this->Session->setFlash('Menu Modificado Correctamente', 'flash_custom');
	$this->redirect(array('action'=>'index'));
	}


}


}//Fin de la funcion


/*  ================ Funcion getperfilajax =================== 
		Funcion para obtener la tabla de perfiles por ajax
	============================================================= */
public function getperfilajax($id){
		$this->layout = "ajax";
		
		//Se obtienen los menus asignados
		$DetmenuperfileDisponibles = $this->Detmenuperfile->find('all', array('conditions' => array('Detmenuperfile.idperfil' => $id)));
		$this->set('DetmenuperfileDisponibles', $DetmenuperfileDisponibles );
		
		
		//Se obtienen los menus para asignacion
		$MenusDisponibles = $this->Menu->find('all', array('order' => array('Menu.id ASC')));
		$this->set('MenusArray', $MenusDisponibles);

		
		if(empty($this->data)){
		
		}else{
		
		}

}//Fin de la funcion


/*  ================ Funcion AsignacionPerfil =================== 
		Funcion para asignar un menu a un perfil
	============================================================= */
public function asignacionperfil(){

//Se obtienen y se pasan a la vista los perfiles disponibles
	$PerfilesDisponibles = $this->Perfile->find('all');
	foreach($PerfilesDisponibles as $row){
		$PerfilesArray["{$row['Perfile']['id']}"] = "{$row['Perfile']['nombre']}";
		}
	$this->set('PerfilesArray', $PerfilesArray);


	//Se obtienen los menus para asignacion
	$MenusDisponibles = $this->Menu->find('all', array('order' => array('Menu.id ASC')));
	$this->set('MenusArray', $MenusDisponibles);

	
	if(empty($this->data)){
		
	
	}else{
		
		
		//debug($this->request->data);
	
		if($this->request->data['Perfile']['id'] == ''){
			//EL id esta vacio
			$this->Session->setFlash('No ha seleccionado un perfil', 'flash_error');
		}else{
		
			$idpefil = $this->request->data['Perfile']['id'];
			
			// Delete with array conditions similar to find()
			$this->Detmenuperfile->deleteAll(array('Detmenuperfile.idperfil' => $idpefil), false);
			
			//sinoesta vacio entonces prosigue
			foreach($this->request->data['Menu']['id'] as $id){
				
				$this->Detmenuperfile->create();
				$nuevoDetmenuperfile['Detmenuperfile']['idperfil'] = $idpefil;
				$nuevoDetmenuperfile['Detmenuperfile']['idmenu'] = $id;
				
				//Validar que no se repitan los idmenus
				$this->Detmenuperfile->save($nuevoDetmenuperfile);
			}
			
			
			
			$this->Session->setFlash('Menu Modificado Correctamente', 'flash_custom');
			$this->redirect(array('action'=>'index'));

		
		}
		
		
		//Detmenuperfile
	}

}//Fin  de la funcion




}//FIn de la clase
?>