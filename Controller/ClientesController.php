<?php
class ClientesController extends AppController {

	public $name = 'Clientes';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session');
	public $uses = array('Cliente','Tipotarjeta','Tipoidentificacion', 'Identificacion', 'Perfile', 'Usuario');


/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'conditions' => array('Cliente.activo' => '1'),
	        'limit' => 20,
	        'order' => array(
	            'Cliente.nombres' => 'desc'
	        )
	    );


/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
		
			Security::setHash('md5');   
			$this->Auth->fields = array(
								'username' => 'username',
            					'password' => 'password'
            					);

	}//Fin Before filter.
	
	


/*  ================ Funcion AdminView =================== 
		Funcion para ver los usuarios del sistema
	====================================================== */

	public function index() {
		 
    $data = $this->paginate('Cliente');
   	$ClientesArray = $this->Cliente->find('all', array('conditions' => array('Cliente.activo' => '1')));
   
	$this->set('ClientesArray',$data);
    	
		// $this->set('TipoIdentificacionArray',$this->Tipoidentificacion->find('all'));	 
		 
		// $this->set('TipoTarjetaArray',$this->Tipotarjeta->find('all'));

		 
	}//Fin de la funcion adminview




/*  ================ Funcion Add ======================= 
		Funcion para Agregar clientes al sistema
	====================================================== */
	
	public function add() {
		
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
	

	$tiposClientesArray["1"] = "Cliente Sin cuenta de usuario";
	$tiposClientesArray["2"] = "Cliente Con cuenta de usuario";	
	
	$clienteporArray["1"] = "Persona Natural";
	$clienteporArray["2"] = "Empresa";	
	//-----------------------------------------------------------		
	//Enviamos los valores obtenidos del arreglo a la vista
	//-----------------------------------------------------------
	$this->set('TipoIdentificacionArray',$TipoIdentificacionArray);
	$this->set('TipoTarjetaArray',$TipoTarjetaArray);
	$this->set('tiposClientesArray', $tiposClientesArray);
	$this->set('PerfilesArray', $PerfilesArray);
	$this->set('clienteporArray', $clienteporArray);
	//-----------------------------------------------------------
	

	if($this->request->is('post')) {
			$this->Cliente->create();
			
			//debug($this->request->data);
			$nuevoCliente['Cliente'] = $this->request->data['Cliente'];
			
			//-------------------------------------------------
			//	Si se creara un cliente con cuenta de usuarios
			//-------------------------------------------------
			if($nuevoCliente['Cliente']['tipocliente'] == 2){
			
				$usuarioNuevo = $this->request->data['Usuario'];		
				
				$usuarioNuevo['Usuario'] = $this->request->data['Usuario'];
				$usuarioNuevo['Usuario']['nombres'] = $nuevoCliente['Cliente']['nombres'];
				$usuarioNuevo['Usuario']['apellidos'] = $nuevoCliente['Cliente']['apellidos'];
				$usuarioNuevo['Usuario']['direccion'] = $nuevoCliente['Cliente']['direccion'];
				$usuarioNuevo['Usuario']['identificacion'] = $nuevoCliente['Cliente']['identificacion'];
				$usuarioNuevo['Usuario']['email'] = $nuevoCliente['Cliente']['email'];
				$usuarioNuevo['Usuario']['idperfil'] = 7; //7 corresponde al tipo de usuarios cliente en la tabla
				$usuarioNuevo['Usuario']['imgusuario'] = "";
				
				//---------------------------------------------------------------------------------------	
				// COMPROBAR SI SE SUBIO UNA NUEVA FOTO	    
				//---------------------------------------------------------------------------------------		    
				$destino = WWW_ROOT . 'uploads/usuarios'.DS;
				$hoy = date("Ymd-h-i-s");
				if($this->data['Usuario']['archivo']['error'] == 0 &&  $this->data['Usuario']['archivo']['size'] > 0){
					$movedimg =  $hoy . $this->data['Usuario']['archivo']['name'];
					if(move_uploaded_file($this->data['Usuario']['archivo']['tmp_name'], $destino . $movedimg))
					{
						//modifico la ruta para guardar la url del archivo  
			     		$usuarioNuevo['Usuario']['imgusuario'] = $movedimg;
			     	}//fin if moved
				}//fin de if data archivo
				
				//debug($usuarioNuevo);
				//debug($this->request->data);
			}
			//---------------------------------------------------------------------------	
			// Capturados los datos de usuario se procede a guardar primero el cliente
			//---------------------------------------------------------------------------
														
			if ($this->Cliente->save($this->request->data)) {
					
					if($nuevoCliente['Cliente']['tipocliente'] == 2){
						$this->Usuario->save($usuarioNuevo);
					}							
								
					$this->Session->setFlash('El cliente ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => 'index'));
					
				} else {
					$this->Session->setFlash('El cliente no pudo ser creado Intente nuevamente', 'flash_error');
				}//fin si cliente save
			
				
				
				
		}
	
	}//Fin de la Funcion add
	
	



/*  ================ Funcion edit =================== 
		Funcion para ver los Editar los usuarios
	====================================================== */

	public function edit($id = null) {
		
		$this->Cliente->id= $id;
		
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
				
		if(empty($this->data)){
		
		 	  $this->data = $this->Cliente->read();
		 	  
		 	  

		    } else {
				
		/*--------------------Checkbox campo activo-------------------*/
	
		if(!isset($this->request->data['Cliente']['activo'])){
                       $this->request->data['Cliente']['activo'] = 0;
       			}
	 	/*--------------------fin del checkbox-------------------*/
		    		    
		    	if ($this->Cliente->save($this->data)){			  
		            $this->Session->setFlash('Cliente Modificado Correctamente', 'flash_custom');
		            $this->redirect(array('action' => 'index'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion edit
	
	
	
/*  ================ Funcion baja =================== 
		Funcion para dar de baja a los clientes
	====================================================== */
	public function baja($id = null){
		
	 $this->Cliente->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo en la operacion!</h3><p>No se ha podido dar de baja al registro </p></div>');
	       $this->redirect(array('action'=>'index'));	
		}
		
	 	if ($this->Cliente->updateAll(array('Cliente.activo' => "'2'"),array('Cliente.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>El cliente se dio de Baja</h3></div>');
	        $this->redirect(array('action'=>'index'));
	    }

}


/*  ================ Funcion view =================== 
		Funcion para ver datos de un cliente
	====================================================== */

	public function view($id = null) {
	
		$this->Cliente->id= $id;
		$this->data = $this->Cliente->read();
		//debug($this->data);
		

	
	}//Fin de la funcion

	


}//Fin de la Clase
?>
