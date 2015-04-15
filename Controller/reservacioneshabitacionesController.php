<?php
	
	class reservacioneshabitacionesController extends AppController {
		
	var $name = 'reservacioneshabitaciones';
	
	public $uses = array('reservacioneshabitacione','Reservacione','Habitacione');
	
	//Esta funcion permite decidir que vistas seran accesibles para usuarios sin autentificacion.
	public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}
	
	public function index(){
    $this->set('reservacioneshabitaciones',$this->reservacioneshabitacione->find('all')); 
	$this->set('ReservacionArray',$this->Reservacione->find('all'));
	$this->set('HabitacionArray',$this->Cliente->find('all'));
	}
	
	public function add(){
		
	/*------Se obtienen los datos de las habitaciones su estado y tipo----*/
	$Estadoreservacionea = $this->Estadoreservacione->find('all');
	$Clientea = $this->Cliente->find('all');


	/*-Recorremos los elementos del arreglo --*/
	foreach($Estadoreservacionea as $row){
		$EstadoreservaArray["{$row['Estadoreservacione']['id']}"] = "{$row['Estadoreservacione']['nombre']}";
		}
		//debug($EstadoreservaArray);
		
	foreach ($Clientea as $row){
			$ClienteArray["{$row['Cliente']['id']}"] = "{$row['Cliente']['nombres']}";		
		}
	
	//Enviamos los valores obtenidos del arreglo a la vista
	   $this->set('EstadoreservaArray',$EstadoreservaArray);
	   $this->set('ClienteArray', $ClienteArray);

	   if($this->request->is('post')):	

		 if($this->Reservacione->save($this->request->data)):
			$this->Session->setFlash('Registro Guardado');
			    $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
	public function edit($id = null){
	
	$this->Reservacione->id = $id;
		
	/*------Se obtienen los datos de las habitaciones su estado y tipo----*/
	$Estadoreservacionea = $this->Estadoreservacione->find('all');
	$Clientea = $this->Cliente->find('all');


	/*-Recorremos los elementos del arreglo --*/
	foreach($Estadoreservacionea as $row){
		$EstadoreservaArray["{$row['Estadoreservacione']['id']}"] = "{$row['Estadoreservacione']['nombre']}";
		}
		//debug($EstadoreservaArray);
		
	foreach ($Clientea as $row){
			$ClienteArray["{$row['Cliente']['id']}"] = "{$row['Cliente']['nombres']}";		
		}
	
	//Enviamos los valores obtenidos del arreglo a la vista
	   $this->set('EstadoreservaArray',$EstadoreservaArray);
	   $this->set('ClienteArray', $ClienteArray);
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Reservacione->read();

		    } else {
				
	/*--------------------Checkbox-------------------*/
	
		if(!isset($this->request->data['Reservacione']['activo'])){
                       $this->request->data['Reservacione']['activo'] = 0;
       			}
	 /*--------------------fin del checkbox-------------------*/
				
				
									    
		    	if ($this->Reservacione->save($this->data)){		
		            $this->Session->setFlash('Reservacion Modificada Correctamente', 'flash_custom');
		             $this->redirect(array('action'=>'index'));
		        }
	}
	}
	
	public function baja($id = null){
		
	 $this->Reservacione->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo en la operacion!</h3><p>No se ha podido dar de baja al registro </p></div>');
	       $this->redirect(array('action'=>'index'));	
		}
		
	 	if ($this->Reservacione->updateAll(array('Reservacione.activo' => "'0'"),array('Reservacione.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>La Reservacion se dio de Baja</h3></div>');
	        $this->redirect(array('action'=>'index'));
	    }

		
}
	
	}
?>