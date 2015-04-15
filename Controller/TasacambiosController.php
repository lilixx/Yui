<?php
class TasacambiosController extends AppController {

	public $name = 'Tasacambios';
	public $helpers = array('Html','Form','Time');
	public $components = array('RequestHandler','Session');
	public $uses = array('Tasacambio','Moneda');
	

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'conditions' => array('Tasacambio.activo' => '1'),
	        'limit' => 20,
	        'order' => array(
	            'Tasacambio.fecha' => 'desc'
	        )
	    );
	

/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
		
		
      		}//Fin Before filter  


/*  ================ Funcion index =================== 
		Funcion para mostrar la tasa de cambio 
     ====================================================== */
	public function index(){
    
        $data = $this->paginate('Tasacambio');
        $TasacambioArray = $this->Tasacambio->find('all', array('conditions' => array('Tasacambio.activo' => '1')));
        $this->set('TasacambioArray',$data);
		
	}

/*  ================ Funcion add =================== 
		Funcion para agregar tasa de cambio
     ====================================================== */

public function add($id=null){

    $this->set('id', $id);
        
    $Monedaa = $this->Moneda->find('all');
 
       foreach ($Monedaa as $row){
			$MonedaArray["{$row['Moneda']['id']}"] = "{$row['Moneda']['nombre']}";		
		}  

	$this->set('MonedaArray', $MonedaArray);	
	
	if($this->request->is('post')) { //si es una solicitud post	 

        $this->Tasacambio->create();
        
                if ($this->Tasacambio->save($this->request->data)) {

                $this->Session->setFlash('La Tasa de cambio ha sido creado satisfactoriamente','flash_custom');
                $this->redirect(array('controller' => 'tasacambios','action' => 'index'));

            } else {
                $this->Session->setFlash('Error, la Tasa de cambio no fue creada. Intente nuevamente', 'flash_error');
            }

  }//Fin if is post
        
}//fin de la funcion


/*  ================ Funcion edit =================== 
		Funcion para  editar la tasa de cambio
	====================================================== */

	public function edit($id = null) {
		
	  $this->Tasacambio->id = $id;
               
	  $Monedaa = $this->Moneda->find('all');
 
          foreach ($Monedaa as $row){
			$MonedaArray["{$row['Moneda']['id']}"] = "{$row['Moneda']['nombre']}";		
		}  

	  $this->set('MonedaArray', $MonedaArray);
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Tasacambio->read();

		    } else {
		    		    
		    	if ($this->Tasacambio->save($this->data)){			  
		            $this->Session->setFlash('Tasa de cambio Modificada Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/index'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion Adminedit


/*  ================ Funcion baja =================== 
		Funcion para dar de baja a la tasa de cambio
	====================================================== */
	
	public function baja($id = null) {
	
	 $this->Tasacambio->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo!</h3><p>No se ha podido dar de baja</p></div>');
	       $this->redirect(array('action' => '/'));	
		}
		
	 	if ($this->Tasacambio->updateAll(array('Tasacambio.activo' => "'2'"),array('Tasacambio.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>La tasa de cambio ha sido dada de Baja</h3></div>');
	       $this->redirect(array('action' => '/index'));	
	    }


   }//Fin de la funcion Admindarbaja


}//Fin de la Clase
?>		    	
