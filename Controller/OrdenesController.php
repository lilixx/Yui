<?php
class OrdenesController extends AppController {

	public $name = 'Ordenes';
	public $helpers = array('Html','Form','Time');
	public $components = array('RequestHandler','Session');
	public $uses = array('Categoriatipordene','Cubeta','Categoriafolio','Cargordene','Cargosfolio','Tipordene','Categoria','Cargocategoria','Ordene');
	

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'conditions' => array('Ordene.activo' => '2'),
	        'limit' => 20,
	        'order' => array(
	            'Ordene.id' => 'desc'
	        )
	    );
	

/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		parent::beforeFilter();
		
		
      		}//Fin Before filter  


/*  ================ Funcion index =================== 
		Funcion para mostrar los folios
     ====================================================== */
	public function index($id=null){
    
       
      	
	}
	
/*  ================ Funcion view =================== 
		Funcion para ver los datos de la orden
     ====================================================== */
     public function view($id=null){
    
        $this->Ordene->id= $id;
        $this->set('id', $id);
        $this->set('CargordeneArray',$this->Cargordene->find('all', array('conditions' => array('Ordene.id' => $id)))); 
      	$this->set('OrdeneArray',$this->Ordene->find('all', array('conditions' => array('Ordene.id' => $id))));
	}
     	

	/*  ================ Funcion orden =================== 
		Funcion para agregar Folios
     ====================================================== */
public function orden($id=null) {
	
	
	$this->Ordene->folioid = $id;
	
    $Cargosfoliosa = $this->Cargosfolio->Cargo->find('all', array('order' => array('Cargo.nombre' => 'asc'))); //servicio es idtipocargo 1
	$Tiporden = $this->Tipordene->find('all');
		      
/*	$Categoria = $this->Categoriafolio->find('list', array('fields' => array('Categoriafolio.categoria_id'),
                   'conditions' => array('Categoriafolio.folio_id' => $id))); */
	
	
	foreach ($Cargosfoliosa as $row) {
				$CargosArray ["{$row['Cargo']['id']}"] = "{$row['Cargo']['nombre']}";
		  	 } 
		  	 
	$TipordenArray = "";
	foreach ($Tiporden as $tip) {
		      $TipordenArray["{$tip['Tipordene']['id']}"] = "{$tip['Tipordene']['nombre']}";
		   	       
		  	 } 
		  	 
	
		 //y ahora se pasan a la vista	 
			 if (isset($CargosArray)){ //si tiene datos los pasa
	           $this->set('CargosArray', $CargosArray);
             }	 
            
             $this->set('TipordenArray', $TipordenArray); 
             $i = 0;
             $m = null;
             $this->set('i',$i); 
             $this->set('m',$m);  
             $this->set('id', $id);
  }           
             
 	/*  ================ Funcion crearorden =================== 
		Funcion para crearorden
     ====================================================== */
 public function crearorden($id=null) {            

    $this->Ordene->folioid = $id;
    if(!empty($this->data)) {
    //  if ($id) {       
      
       $this->Ordene->create();
       $i = null;
       
       $this->Cargosfolio->folioid = $id;
       $this->request->data['Ordene']['folioid'] = $id;
       $this->request->data['Ordene']['usuarioid'] = $this->Session->read('Usuario.id');
       
          
      
     if ($this->Ordene->saveAll($this->request->data)) {
	     
	        $this->Session->setFlash('La orden ha sido creada satisfactoriamente','flash_custom');
            $this->redirect(array('controller' => 'Folios','action' => '/view/'.$id));
            
         } else {
                $this->Session->setFlash('Error, la orden no fue creada. Intente nuevamente', 'flash_error');
            } 
              

        
  }           


}


	/*  ================ Funcion searchcargo =================== 
		Funcion para agregar Folios
     ====================================================== */
public function searchcargo($id) {

    $this->layout = "ajax";
    $categoria = $this->Categoriatipordene->find('list', array('conditions' => array('Categoriatipordene.tipordene_id' => $id), 'fields' => 'categoria_id'));
    $cargo = $this->Cargocategoria->find('all',array('conditions' => array('Cargocategoria.categoria_id' => $categoria)));
    
    //$subcategoria = $this->Cargo->find('list',array('conditions' => array('Cargo.id' => $cargo), 'fields' => 'nombre'));
    
    $subcategorias = "";
    foreach ($cargo as $car){
		//  $subcategorias["{$car['Cargo']['id']}"] = "{$car['Cargo']['nombre']}";
		  $subcategorias = $subcategorias . "<option value='" . $car['Cargo']['id'] ."'>" . $car['Cargo']['nombre']. "</option>";
		  
		}
   // debug($id);
    $this->set('listado_subcategorias',$subcategorias);
    $this->set('cargo',$cargo);
    
       
} 

   /*  ================ Funcion ordencambio =================== 
	funcion donde vrifican si todos los cargos se enviaron a cubeta para cambiar la orden	
	====================================================== */
	
	public function ordencambio($id = null) {
		
		 $this->Ordene->id = $id;
		 $cant = 0;
		$Cargof = $this->Cargordene->find('all',array('conditions' => array('Ordene.id' => $id)));
		
		foreach ($Cargof as $row) {
		   $id2 = $row['Ordene']['folioid'];	 
	       if($row['Cargordene']['cubeta'] == 1){
			     $cant = $cant +1;
			   }
		  }
		
		 if($cant == 0){	 
	      $this->Ordene->updateAll(array('Ordene.estado' => "'3'"),array('Ordene.id'=> $id));//si todos los cargos se enviaron a cubeta la orden pasa a estado de revision 	   
         }
	     $this->Session->setFlash('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Operación exitosa.</div>');
	     $this->redirect(array('controller' => 'Folios','action' => '/view/'.$id2));	
    }
    
     		


}//Fin de la Clase
?>
