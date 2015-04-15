<?php
class DetallehuespedesController extends AppController {

	public $name = 'Detallehuespedes';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session');
	public $uses = array('Huespede','Habitacione', 'Tipohabitacione', 'Reservacione', 'Detallehuespede');
      

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'limit' => 20,
	        'order' => array(
	            'Detallehuespede.id' => 'desc'
	        )
	    );


/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
		
		

	}//Fin Before filter
	
		
/*  ================ Funcion asignarhab ================================ 
		Funcion para asignar habitacion a huespedes previamente creados
* ====================================================================== */	
	public function asignarhab($id=null) {
    
    $this->set('id', $id);
    $ReservacioneArray = $this->Reservacione->find('list', array(
        'fields' => array('Reservacione.id'),
        'conditions' => array('Reservacione.activo' => '1',
        'Reservacione.estadoreservacionid' => '1')));
    $Habitacionea = $this->Habitacione->find('all', array('conditions' => array('Habitacione.activo' => '1')));  
   $Huespedea = $this->Huespede->find('all', array('conditions' => array('OR' => array(
            'Huespede.activo' => '2', 'Huespede.habitacion' => '2')))); 
     
 
	foreach ($Habitacionea as $hab){
	  if ($id == $hab['Habitacione']['id']){
		  $cant = $hab['Tipohabitacione']['cantmaxima'];
	  }
	}
	
	foreach($Huespedea as $hue){
	 $HuespedeArray["{$hue['Huespede']['id']}"] = "{$hue['Huespede']['nombres']}  {$hue['Huespede']['apellidos']}";		
     		
	}
			
	$f = 0;
	$this->set('HuespedeArray', $HuespedeArray);
	$this->set('ReservacioneArray', $ReservacioneArray);
	$this->set('f', $f);
	$this->set('cant', $cant);
	
	
      if(!empty($this->data)) {
	
		foreach ($Habitacionea as $hab){
	      if ($id == $hab['Habitacione']['id']){
		    $cant = $hab['Tipohabitacione']['cantmaxima'];
	      }
     	}
   
       $this->Habitacione->updateAll(array('Habitacione.estadohabitacionid' => "'2'"),array('Habitacione.id'=> $id));
	
	
	   for($i = 1;  $i <= $cant; $i++){
		  if (!empty($this->data[$i]['Detallehuespede']['huespede_id'])) { //solo toma en cuenta los que se le a asignado huesped
			$idhue = $this->data[$i]['Detallehuespede']['huespede_id']; 
			$this->Huespede->updateAll(array('Huespede.activo' => '1'),array('Huespede.id' => $idhue)); // compara si el id huesped seleccionado es igual al id huesped y actualiza valores en la tabla huesped
            $this->Huespede->updateAll(array('Huespede.habitacion' => '1'),array('Huespede.id' => $idhue));
            $this->request->data[$i]['Detallehuespede']['habitacione_id'] = $id; // le asigna el id de la habitacion
			$this->request->data[$i]['Detallehuespede']['usuario_id'] = $this->Session->read('Usuario.id'); // le asigna el id del usuario logeado
		 }   
		}	
		
	
		foreach($this->data as $data) {
		   if (!empty($data['Detallehuespede']['huespede_id'])) { //solo los huespedes que se seleccionaron, no toma los vacios. 	           
	           $this->Detallehuespede->saveAll($data);
            }
         }  
	     
          		 
    $this->Session->setFlash('Habitación asignada satisfactoriamente','flash_custom');
	 $this->redirect(array('controller'=>'Huespedes','action' => 'index'));
           
      }  
	
 }//fin de la funcion add
 
 
}//Fin de la Clase
?>

