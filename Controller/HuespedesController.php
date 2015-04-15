<?php
class HuespedesController extends AppController {

	public $name = 'Huespedes';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session');
	public $uses = array('Huespede','Habitacione', 'Tipohabitacione', 'Reservacione', 'Detallehuespede');
      

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'conditions' => array('Huespede.activo' => '1'),
	        'limit' => 20,
	        'order' => array(
	            'Huespede.id' => 'desc'
	        )
	    );


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



/*  ================ Funcion habhuesped======================= 
	funcion para seleccionar habitacion y asignarsela a los huespedes
	====================================================== */
	
	public function habhuesped($id=null) {
			
	    $this->Habitacione->id = $id;
	    $Habitacionea = $this->Habitacione->find('all', array('conditions' => array('Habitacione.activo' => '1',
	     'Habitacione.estadohabitacionid' => '1')));
	  
		foreach ($Habitacionea as $row){
			$HabitacioneArray["{$row['Habitacione']['id']}"] = "Número: {$row['Habitacione']['numhab']} - {$row['Tipohabitacione']['nombre']}";		
		}
		$this->set('HabitacioneArray', $HabitacioneArray);
		 $this->set('id', $id);
	
	  if (!empty($this->data)){  
	    $idhab = $this->data['Habitacione']['id'];
				
		$redir = '/add/'.$idhab;
		$this->redirect(array('controller' => 'Huespedes', 'action' => $redir));
		
	  }
	
	}//Fin de la Funcion 
	
	
/*  ================ Funcion huespedhab================================================== 
	funcion para seleccionar habitacion y asignarsela a los huespedes previamente creados
	===================================================================================== */
	
	public function huespedhab($id=null) {
			
	    $this->Habitacione->id = $id;
	    $Habitacionea = $this->Habitacione->find('all', array('conditions' => array('Habitacione.activo' => '1',
	     'Habitacione.estadohabitacionid' => '1')));
	  
		foreach ($Habitacionea as $row){
			$HabitacioneArray["{$row['Habitacione']['id']}"] = "Número: {$row['Habitacione']['numhab']} - {$row['Tipohabitacione']['nombre']}";		
		}
		
		
		if (isset($HabitacioneArray)){
		   $this->set('HabitacioneArray', $HabitacioneArray);
	    }else{
			$HabitacioneArray = 'No hay habitaciones';
			$this->set('HabitacioneArray', $HabitacioneArray);
		}	
		$this->set('id', $id);
			
	  if (!empty($this->data)){  
	    $idhab = $this->data['Habitacione']['id'];
				
		$redir = '/asignarhab/'.$idhab;
		$this->redirect(array('controller' => 'Detallehuespedes', 'action' => $redir));
		
	  } 
	
	}//Fin de la Funcion
	
/*  ================ Funcion search ======================= 
	funcion para buscar huespedes
	====================================================== */
   public function search ($id=null)
   {
    $this->Huespede->id = $id; 
    
    $result = $this->Huespede->find('all');
     $huesp = $this->Huespede->find('all');
    $i = 0;
    foreach ($result as $result) {
    $availableTags[$i] = "{$result["Huespede"]["apellidos"]}" ;
    $i++;
    }
 
    	
    $this->set('availableTags', $availableTags);
   
    
    if (!empty($this->data)){ 
	 
	 $apellido = $this->data['Huespede']['apellidos'];
	 $Huespede = $this->Huespede->find('all', array('conditions' => array("Huespede.apellidos" => $apellido)));
	 $this->set('Huespede', $Huespede);
	  

   }	
    
   } //fin de la funcion
   
/*  ================ Funcion addhs ========================================= 
	funcion para agregar huespedes que no se les a asignado hab. (sueltos)
	======================================================================= */ 
	
	public function addhs() {
	      
		if($this->request->is('post')) {
			$this->Huespede->create();
            $this->request->data['Huespede']['habitacion'] = 2;   
															
				if ($this->Huespede->saveAll($this->request->data)) {
					$this->Session->setFlash('El Huésped  ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('El Huésped no pudo ser creado Intente nuevamente', 'flash_error');
				}
		}
	
	}//Fin de la Funcion Pedidoadd  
	
	


	
/*  ================ Funcion add =================== 
		Funcion para agregar huespedes
	====================================================== */	
	public function add($id=null) {
    
    $this->set('id', $id);
    $ReservacioneArray = $this->Reservacione->find('list', array(
        'fields' => array('Reservacione.id'),
        'conditions' => array('Reservacione.activo' => '1',
        'Reservacione.estadoreservacionid' => '1')));
    $Habitacionea = $this->Habitacione->find('all', array('conditions' => array('Habitacione.activo' => '1')));  
 
	foreach ($Habitacionea as $hab){
	  if ($id == $hab['Habitacione']['id']){
		  $cant = $hab['Tipohabitacione']['cantmaxima'];
	  }
	}
			
	$f = 0;
	$this->set('ReservacioneArray', $ReservacioneArray);
	$this->set('f', $f);
	$this->set('cant', $cant);

      if(!empty($this->data)) {
	
		foreach ($Habitacionea as $hab){
	      if ($id == $hab['Habitacione']['id']){
		    $cant = $hab['Tipohabitacione']['cantmaxima'];
	      }
     	}
		
	//    $this->Habitacione->updateAll(array('Habitacione.estadohabitacionid' => "'2'"),array('Habitacione.id'=> $id));
	
		
		 for($i = 1;  $i <= $cant; $i++){
		    $this->request->data[$i]['Detallehuespede'][$i]['habitacione_id'] = $id;
		    $this->request->data[$i]['Detallehuespede'][$i]['usuario_id'] = $this->Session->read('Usuario.id');
		  }
		   
			  foreach($this->data as $data) { 
				  if (!empty($data['Huespede']['nombres'])) { //esto es para que solo se guarden los registros con nombres
                       $this->Huespede->saveAll($data);
                   } 
              }  
	  
           		 
       $this->Session->setFlash('Los Huéspedes han sido creado satisfactoriamente','flash_custom');
	   $this->redirect(array('controller'=>'Huespedes','action' => 'index')); 
           
      }
	
 }//fin de la funcion add
	
/*  ================ Funcion index =================== 
		Funcion para ver los huespedes del sistema
	====================================================== */

	public function index() {

		// $this->Huespede->id= $id;
		 $data = $this->paginate('Huespede'); 
		 $HuespedesArray = $this->Huespede->find('all', array('conditions' => array('Huespede.activo' => '1')));
         $this->set('HuespedesArray', $data);
		
		 
	}//Fin de la funcion adminview


/*  ================ Funcion edit =================== 
		Funcion para  editar los huespedes
	====================================================== */

	public function edit($id = null) {
		
		$this->Huespede->id = $id;
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Huespede->read();

		    } else {
		    		    
		    	if ($this->Huespede->save($this->data)){			  
		            $this->Session->setFlash('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Huésped modificado correctamente.</div>','flash_custom');
		            $this->redirect(array('action' => '/index'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion Adminedit

/*  ================ Funcion Huespededarbaja =================== 
		Funcion para dar de baja a los huespedes
	====================================================== */
	
	public function huespededarbaja($id = null) {
	
	 $this->Huespede->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo!</h3><p>No se ha podido dar de baja</p></div>');
	       $this->redirect(array('action' => '/'));	
		}
		
	 	if ($this->Huespede->updateAll(array('Huespede.activo' => "'2'"),array('Huespede.id' => $id))) { 
	       $this->Session->setFlash('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;El Huésped ha sido dado de Baja.</div>','flash_custom');
	       $this->redirect(array('action' => '/index'));	
	    }


   }//Fin de la funcion Admindarbaja
   
   
   /*  ================ Huespedes view =================== 
		Funcion para mostrar todos los Huespedes 
     ====================================================== */
	public function view($id=null){
    
        $this->Huespede->id= $id;
        $this->set('id', $id);
        $this->set('DetallehuespedeArray',$this->Detallehuespede->find('all', array('limit' => 1,'conditions' => array('Detallehuespede.huespede_id' => $id),'order' => array('Detallehuespede.fechaentrada' => 'desc')))); 
      		
	}



}//Fin de la Clase
?>
