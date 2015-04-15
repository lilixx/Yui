<?php
	
	class HabitacionesController extends AppController {
		
	var $name = 'Habitaciones';
	
	public $uses = array('Habitacione','Estadohabitacione','Tipohabitacione', 'Reservacioneshabitacione', 'Reservacione');
	
	/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'limit' => 20,
	        'order' => array(
	            'Habitacione.id' => 'desc'
	        )
	    );

  /*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	
	public function beforeFilter() {
		parent::beforeFilter();
					
		$this->Auth->allow('index');

	}
	
	/*  ================ Funcion index =================== 
		Funcion para ver las habitaciones del sistema
	====================================================== */
	public function index($id=null){
    
    $this->Habitacione->id= $id;
    $rangoHabitaciones = $this->paginate('Habitacione');
    $this->set('Habitaciones', $rangoHabitaciones);
    $this->set('TipohabitacioneArray',$this->Tipohabitacione->find('all'));
	$this->set('EstadohabitacioneArray',$this->Estadohabitacione->find('all'));

	
	}
	
	/*  ================ Funcion Add ======================= 
		Funcion para Agregar Habitaciones al sistema
	====================================================== */
	public function add(){
		
	/*------Se obtienen los datos de las habitaciones su estado y tipo----*/
	$Estadohabitacionea = $this->Estadohabitacione->find('all');
	$Tipohabitacionea = $this->Tipohabitacione->find('all');


	/*-Recorremos los elementos del arreglo --*/
	foreach($Estadohabitacionea as $row){
		$EstadohabitacioneArray["{$row['Estadohabitacione']['id']}"] = "{$row['Estadohabitacione']['nombre']}";
		}
		
	foreach ($Tipohabitacionea as $row){
			$TipohabitacioneArray["{$row['Tipohabitacione']['id']}"] = "{$row['Tipohabitacione']['nombre']}";		
		}
	
	//Enviamos los valores obtenidos del arreglo a la vista
	   $this->set('EstadohabitacioneArray',$EstadohabitacioneArray);
	   $this->set('TipohabitacioneArray', $TipohabitacioneArray);

	   if($this->request->is('post')):	
	   
	   

	   
	//---------------------------------------------------------------------------------------    
	//  NUEVA FOTO        
	//---------------------------------------------------------------------------------------            
        $destino = WWW_ROOT . 'uploads/habitaciones'.DS;
        
        $hoy = date("Ymd-h-i-s"); 
              
		if($this->data['Habitacione']['archivo']['error'] == 0 &&  $this->data['Habitacione']['archivo']['size'] > 0){
       
        $movedimg =  $hoy . $this->data['Habitacione']['archivo']['name'];
		

            if(move_uploaded_file($this->data['Habitacione']['archivo']['tmp_name'], $destino . $movedimg))
            {
                //modifico la ruta para guardar la url del archivo  
                $this->request->data['Habitacione']['imghabitacion'] = $movedimg;
               	
    
            }//fin if moved
        }//fin de if data archivo
		
		
	   
		 if($this->Habitacione->save($this->request->data)):
			$this->Session->setFlash('Registro Guardado');
			    $this->redirect(array('action'=>'index'));
			
		endif;
		endif;

	}
	
	/*  ================ Funcion edit ======================= 
		Funcion para editar habitaciones al sistema
	====================================================== */
	
	public function edit($id = null){
	
	$this->Habitacione->id = $id;
		
			/*------Se obtiene el tipo de estado de habitacion----*/
	$Estadohabitacionea = $this->Estadohabitacione->find('all');
	
	/*------Se obtiene el tipo de habitacion----*/
	
	$Tipohabitacionea = $this->Tipohabitacione->find('all');


	/*-Recorremos los elementos de las tablas --*/
	foreach($Estadohabitacionea as $row){
		$EstadohabitacioneArray["{$row['Estadohabitacione']['id']}"] = "{$row['Estadohabitacione']['nombre']}";
		}
		
	foreach ($Tipohabitacionea as $row){
			$TipohabitacioneArray["{$row['Tipohabitacione']['id']}"] = "{$row['Tipohabitacione']['nombre']}";		
		}
	
	//Enviamos los valores obtenidos del arreglo a la vista
	   $this->set('EstadohabitacioneArray',$EstadohabitacioneArray);
	   $this->set('TipohabitacioneArray', $TipohabitacioneArray);
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Habitacione->read();

		    } else {
				
	/*--------------------Checkbox-------------------*/
	
		if(!isset($this->request->data['Habitacione']['activo'])){
                       $this->request->data['Habitacione']['activo'] = 0;
       			}
	 /*--------------------fin del checkbox-------------------*/
				
				
				
		//---------------------------------------------------------------------------------------    
		// COMPROBAR SI SE SUBIO UNA NUEVA FOTO        
		//---------------------------------------------------------------------------------------            
        $destino = WWW_ROOT . 'uploads/habitaciones'.DS;
        $imagenAnterior = $destino. $this->data['Habitacione']['imghabitacion'];
        $hoy = date("Ymd-h-i-s"); 
          	   
		if($this->data['Habitacione']['archivo']['error'] == 0 &&  $this->data['Habitacione']['archivo']['size'] > 0){
      
        $movedimg =  $hoy . $this->data['Habitacione']['archivo']['name'];

            if(move_uploaded_file($this->data['Habitacione']['archivo']['tmp_name'], $destino . $movedimg))
            {
                //modifico la ruta para guardar la url del archivo  
                $this->request->data['Habitacione']['imghabitacion'] = $movedimg;
                 //se borra la imagen anterior
                unlink($imagenAnterior);
    
            }//fin if moved
        }//fin de if data archivo
					    
		    	if ($this->Habitacione->save($this->data)){		
		            $this->Session->setFlash('Habitacion Modificada Correctamente', 'flash_custom');
		             $this->redirect(array('action'=>'index'));
		        }
	}
	}
	
	
	/*  ================ Funcion baja ======================= 
		Funcion para dar de baja a las habitaciones
	====================================================== */
	public function baja($id = null){
		
	 $this->Habitacione->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo en la operacion!</h3><p>No se ha podido dar de baja al registro </p></div>');
	       $this->redirect(array('action'=>'index'));	
		}
		
	 	if ($this->Habitacione->updateAll(array('Habitacione.activo' => "'0'"),array('Habitacione.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>La Habitacion se dio de Baja</h3></div>');
	        $this->redirect(array('action'=>'index'));
	    }

		
}//Fin de la funcion




	/*  ================ Funcion searchAjax ======================= 
		Encuentra las habitaciones disponibles mediante ajax
	=============================================================== */
	public function searchAjax() {
		//$this->layout = "ajax";
		//debug($this->request->data);
		
		
		$HabitacionesOcupadas = array();
		
		if(isset($this->request->data['fechainicio']) && isset($this->request->data['fechafin'])){
			
			$fechainicio = $this->request->data['fechainicio'];
			$fechafin = $this->request->data['fechafin'];

			
		}else{
			$fechainicio = "2014-01-26";
			$fechafin = "2014-01-27";
		}
		
		//Obtenemos las reservaciones con sus habitaciones en la fecha especificada
		$ReservacioneEncontradas = $this->Reservacione->find('all', array('conditions' => array('Reservacione.fechaentrada >=' => $fechainicio, 'Reservacione.fechasalida <=' => $fechafin )));
	//	debug($ReservacioneEncontradas);
		
		
		
		//se recorre todo el array para sacar las reservaciones 
		foreach($ReservacioneEncontradas as $res){
			//$HabitacionesOcupadas[$i] = $res['Reservacioneshabitacione']['habitacionid']
			
			$i = 0;
			//se recorren las habitaciones ocupadas x reservacion
			foreach($res['Reservacioneshabitacione'] as $habitacionreservada){
				$HabitacionesOcupadas[] = $habitacionreservada['habitacionid'];
				$i = $i +1;
			}
			
		}
		
	//	debug($HabitacionesOcupadas);

		
		
	/*'fechainicio' => '2014-04-19',
	'fechafin' => '2014-04-25',
	'ReservacioneCanthab' => '1',
	'ReservacioneCantadultos' => '1',
	'ReservacioneCantninos' => '1',
	'ReservacioneTipoHabitacionesArray' => '2'
	*/	 
	
	$Habitaciones = $this->Habitacione->find('all', array('conditions' => array("Habitacione.id !=" => $HabitacionesOcupadas), 'recursive' => 0 ) );
	debug($Habitaciones);
	
	//$Habitaciones = $this->Habitacione->find('all');
	
   
    $this->set('Habitaciones', $Habitaciones);   
    $this->set('TipohabitacioneArray',$this->Tipohabitacione->find('all'));
	$this->set('EstadohabitacioneArray',$this->Estadohabitacione->find('all'));

//debug($Habitaciones);
		
	}//Fin de la funcion searchajax

	
}
?>
