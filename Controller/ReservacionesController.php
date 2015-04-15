<?php
	
	class ReservacionesController extends AppController {
		
	var $name = 'Reservaciones';
	
	public $uses = array('Reservacione','Cliente','Estadoreservacione', 'Tipotarjeta', 'Tipoidentificacion', 'Perfile', 'Tipohabitacione');
	
	/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'limit' => 40,
	        'order' => array(
	            'Reservacione.fechaentrada' => 'asc'
	        )
	    );

	
	
	//Esta funcion permite decidir que vistas seran accesibles para usuarios sin autentificacion.
	public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}
	
	public function index(){
    $this->set('Reservaciones',$this->Reservacione->find('all', array('conditions' => array('Reservacione.activo' => '1')))); 
	$this->set('ClienteArray',$this->Cliente->find('all'));
	$this->set('EstadoreservaArray',$this->Estadoreservacione->find('all'));
	$rangoReserva = $this->paginate('Reservacione');
    $this->set('ReservacionesArray', $rangoReserva);

	
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
	
	/*	if(!isset($this->request->data['Reservacione']['activo'])){
                       $this->request->data['Reservacione']['activo'] = 0;
       			} */
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

}//Fin de la funcion



/*  =============================================================
		Funcion de reservacion express (sin cuenta de cliente)
================================================================= */
public function Express() {

	/*------Se obtienen los datos de las habitaciones su estado y tipo----*/
	$identificaciona = $this->Tipoidentificacion->find('all');
	$tarjeta = $this->Tipotarjeta->find('all');
	$perfilesdisponibles = $this->Perfile->find('all');	
		
	/*-Recorremos los elementos del arreglo --*/
	foreach($identificaciona as $row){
		$TipoIdentificacionArray["{$row['Tipoidentificacion']['id']}"] = "{$row['Tipoidentificacion']['nombre']}";
		}
		
	foreach($tarjeta as $row){
		$TipoTarjetaArray["{$row['Tipotarjeta']['id']}"] = "{$row['Tipotarjeta']['nombre']}";
		}
		
	
	foreach($perfilesdisponibles as $row){
		$PerfilesArray["{$row['Perfile']['id']}"] = "{$row['Perfile']['nombre']}";
		}
		
		
		
	$TipoHabitacionesDisp = $this->Tipohabitacione->find('all');
		foreach ($TipoHabitacionesDisp as $row) {
		 	 $TipoHabitacionesArray["{$row['Tipohabitacione']['id']}"] = "{$row['Tipohabitacione']['nombre']}";
		}//y ahora se pasan a la vista	 
		$this->set('TipoHabitacionesArray', $TipoHabitacionesArray);
		
		
		
	
	

	$tiposClientesArray["1"] = "Cliente Sin cuenta de usuario";
	$tiposClientesArray["2"] = "Cliente Con cuenta de usuario";	
	//-----------------------------------------------------------		
	//Enviamos los valores obtenidos del arreglo a la vista
	//-----------------------------------------------------------
	$this->set('TipoIdentificacionArray',$TipoIdentificacionArray);
	$this->set('TipoTarjetaArray',$TipoTarjetaArray);
	$this->set('tiposClientesArray', $tiposClientesArray);
	$this->set('PerfilesArray', $PerfilesArray);
	//-----------------------------------------------------------





	}



	
}//Fin de la clase
?>
