<?php
class FoliosController extends AppController {

	public $name = 'Folios';
	public $helpers = array('Html','Form','Time');
	public $components = array('RequestHandler','Session');
	public $uses = array('Folio','Huespede','Cubeta','Ordene','Cargordene','Tipofolio','Categoriatipordene','Cargosfolio','Tipordene','Cliente', 'Categoria','Habitacione', 'Habitacionfolio', 'Categoriafolio', 'Cargocategoria');
	

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'conditions' => array('Folio.activo' => '1'),
	        'limit' => 20,
	        'order' => array(
	            'Folio.id' => 'desc'
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
    
        $this->Folio->id= $id;
        $rangoFolios = $this->paginate('Folio');
        $this->set('FolioArray',$this->Folio->find('all',array('conditions' => array('Folio.activo' => '1')))); 
      	
	}
	
	
/*  ================ Funcion view =================== 
		Funcion para mostrar todos los registros de un folio
     ====================================================== */
	public function view($id=null){
    
       // $this->Folio->id= $id;
        $this->set('id', $id);
        $this->set('FolioArray',$this->Folio->find('all',array('conditions' => array('Folio.id' => $id))));
        $this->set('FoliohabArray',$this->Habitacionfolio->find('all',array('conditions' => array('Habitacionfolio.folio_id' => $id)))); 
        $this->set('TipofolioArray',$this->Tipofolio->find('all')); 
        $this->set('CargoArray',$this->Cargosfolio->find('all', array('conditions' => array('Cargosfolio.folioid' => $id,'Cargosfolio.cubeta' => '1'))));
        $this->set('OrdeneArray',$this->Ordene->find('all', array('conditions' => array('Ordene.folioid' => $id,'Ordene.estado' => '2'))));
        
      
        $fecha = $this->Habitacionfolio->find('all',array('conditions' => array('Habitacionfolio.folio_id' => $id)));       
        $fechaactual = date('Y-m-d');
       
        foreach ($fecha as $fe){
			  $fechainicio = $fe['Habitacionfolio']['fecha'];
			  $calculo = ((strtotime($fechaactual)-strtotime($fechainicio))/86400);
			 
			}
			
		$this->set('fechaactual', $fechaactual);
		$this->set('fechainicio', $fechainicio);
		$this->set('calculo', $calculo);	
	}
	
	/*  ================ Funcion orden =================== 
		Funcion para agregar Folios
     ====================================================== */
public function orden($id=null) {
	
	
	//$this->Tiporden->id= $id;
	
	$Cargosfoliosa = $this->Cargosfolio->Cargo->find('all', array('order' => array('Cargo.nombre' => 'asc'))); //servicio es idtipocargo 1
	$Tiporden = $this->Tipordene->find('all');
		      
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
             $this->set('i',$i);  
             
     if($this->request->is('post')) { //si es una solicitud post	 

       // $this->Orden->create();
              
      //  $foliode['Folio'] = $this->request->data['Folio'];
        debug($this->request->data);
      
      
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
    
    $this->set('listado_subcategorias',$subcategorias);
    
       
} 



/*  ================ Funcion add =================== 
		Funcion para agregar Folios
     ====================================================== */

public function add($id=null){

    $this->set('id', $id);

    $folioa = $this->Folio->find('all');
           
    $Huespeda = $this->Huespede->find('all', array('conditions' => array('Huespede.activo' => '1','Huespede.folio' => '2'),'order' => array('Huespede.nombres' => 'asc')));
    $Empresaa = $this->Cliente->find('all', array('conditions' => array('Cliente.activo' => '1', 'Cliente.tipo' => '2', 'Cliente.folio' => '2'),'order' => array('Cliente.nombres' => 'asc')));
    $HabitacioneArray = $this->Habitacione->find('all', array('conditions' => array('Habitacione.activo' => '1','Habitacione.estadohabitacionid' => '2', 'Habitacione.folio' => '2')));// habitaciones ocupadas y sin folio
    $CategoriaArray = $this->Categoria->find('all');
    
    $Tipofolioa = $this->Tipofolio->find('all');
        
       foreach ($Huespeda as $row){
			$HuespedArray["{$row['Huespede']['id']}"] = "{$row['Huespede']['nombres']}  {$row['Huespede']['apellidos']}";		
		}
		
	   foreach ($Empresaa as $em){
			$EmpresaArray["{$em['Cliente']['id']}"] = "{$em['Cliente']['nombres']}";		
	   }	
	
       foreach ($Tipofolioa as $tf){
			$TipofolioArray["{$tf['Tipofolio']['id']}"] = "{$tf['Tipofolio']['nombre']}";		
		}
			
	$foliodeArray["1"] = "Folio de Huesped";
	$foliodeArray["2"] = "Folio de Empresa";	
	
	$variable = 0;					

   	if (isset($HuespedArray)){
	 $this->set('HuespedArray', $HuespedArray);
    }
    if (isset($EmpresaArray)){
	 $this->set('EmpresaArray', $EmpresaArray);
    }
    if (isset($HabitacioneArray)){
	 $this->set('HabitacioneArray', $HabitacioneArray);
    }
    
    $this->set('CategoriaArray', $CategoriaArray);
    $this->set('TipofolioArray', $TipofolioArray);
    $this->set('foliodeArray', $foliodeArray);
    $this->set('variable', $variable);		
	
	
	if($this->request->is('post')) { //si es una solicitud post	 

        $this->Folio->create();
     //    debug($this->request->data);
              
      $foliode['Folio'] = $this->request->data['Folio'];
      //  debug($foliode['Folio']['folioacargo']);
                             
      if($foliode['Folio']['folioacargo'] == 1){ //si es folio huesped
       //  debug($this->data);
         $id = $this->request->data['Folio']['huespedid'];
         $this->Huespede->updateAll(array('Huespede.folio' => "'1'"),array('Huespede.id'=> $id));
    
        } 
     
         if($foliode['Folio']['folioacargo'] == 2){ //si es folio empresa
         
           $this->request->data['Folio']['tipofolioid'] = 1;
           $id = $this->request->data['Folio']['empresaid'];
           $this->Cliente->updateAll(array('Cliente.folio' => "'1'"),array('Cliente.id'=> $id));//actualiza a cliente con folio           
    
          }
          
          $habitacione = $this->request->data['Habitacionfolio'];
       
        foreach ($habitacione as $hab){ //para recorrer todas las habitaciones seleccionadas
			  $idhab = $hab['habitacione_id'];
		      $this->Habitacione->updateAll(array('Habitacione.folio' => "'1'"),array('Habitacione.id'=> $idhab));//actualiza a hab con folio
			
			}
	 
	 
	  
     if ($this->Folio->saveAll($this->request->data)) {
	     
	        $this->Session->setFlash('El folio ha sido creado satisfactoriamente','flash_custom');
            $this->redirect(array('controller' => 'folios','action' => 'index'));

         } else {
                $this->Session->setFlash('Error, el folio no fue creado. Intente nuevamente', 'flash_error');
            }  
            
   }//Fin if is post
        
}//fin de la funcion


/*  ================ Funcion edit =================== 
		Funcion para  editar el folio
	====================================================== */

	public function edit($id = null) {
		
	  $this->Folio->id = $id;
	  
	   $Huespedea = $this->Huespede->find('all', array('conditions' => array('Huespede.activo' => '1')));
 
       foreach ($Huespedea as $row){
			$HuespedArray["{$row['Huespede']['id']}"] = "{$row['Huespede']['nombres']}  {$row['Huespede']['apellidos']}";		
		}  
		
	 $Tipofolioa = $this->Tipofolio->find('all');
 
       foreach ($Tipofolioa as $tf){
			$TipofolioArray["{$tf['Tipofolio']['id']}"] = "{$tf['Tipofolio']['nombre']}";		
		}	

	$this->set('HuespedArray', $HuespedArray);
	$this->set('TipofolioArray', $TipofolioArray);	
         
	 		
		if(empty($this->data)){
		
		 	  $this->data = $this->Folio->read();

		    } else {
		    		    
		    	if ($this->Folio->save($this->data)){			  
		            $this->Session->setFlash('Folio Modificado Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/index'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion Adminedit


/*  ================ Funcion baja =================== 
		Funcion para dar de baja al folio
	====================================================== */
	
	public function baja($id = null) {
	
	 $this->Folio->id = $id;
	 
	    if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo!</h3><p>No se ha podido dar de baja</p></div>');
	       $this->redirect(array('action' => '/'));	
		}
		
	 	if ($this->Folio->updateAll(array('Folio.activo' => "'2'"),array('Folio.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>El folio ha sido dada de Baja</h3></div>');
	       $this->redirect(array('action' => '/index'));	
	    }


   }//Fin de la funcion baja
   
 
   /*  ================ Funcion Asignarcargo servicios =================== 
		Funcion para Asignar cargos al folio
	====================================================== */ 
function asignarcargoser($id=null){
	  
      $Folio = $this->Folio->find('all', array('conditions' => array('Folio.id' => $id))); 
	   foreach ($Folio as $fol) {
				
		  //si el folio es de huesped
		  if(empty ($fol['Folio']['empresaid'])) {  
		    $Cargosfoliosa = $this->Cargosfolio->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '1'),
		      'order' => array('Cargo.nombre' => 'asc'))); //servicio es idtipocargo 1
			       
		     //si el folio es de empresa
		     } else {
			     $Categoria = $this->Categoriafolio->find('list', array('fields' => array('Categoriafolio.categoria_id'),
                   'conditions' => array('Categoriafolio.folio_id' => $id)));
			     $Cargosfoliosa = $this->Cargocategoria->find('all', array('conditions' => array('Categoria.id' => $Categoria,
			       'Cargo.idtipocargo' => '1')));
			      }
		 }	
			 
		   //con este foreach se agregan los cargos  al array
			foreach ($Cargosfoliosa as $row) {
				$CargosArray ["{$row['Cargo']['id']}"] = "{$row['Cargo']['nombre']}";
		  	 } 
		  	 	 
		 //y ahora se pasan a la vista	 
			 if (isset($CargosArray)){ //si tiene datos los pasa
	           $this->set('CargosArray', $CargosArray);
             }
			
			 $this->set('id', $id);	
    //-------------------------------------------- 	   
	  
	//--------------------------------------------

} //fin de la funcion

 /*  ================ Funcion Asignarcargo pedidos =================== 
		Funcion para Asignar cargos al folio
	====================================================== */ 
function asignarcargoped($id=null){
	  
	 $Folio = $this->Folio->find('all', array('conditions' => array('Folio.id' => $id))); 
	   foreach ($Folio as $fol) {
				
		  //si el folio es de huesped
		  if(empty ($fol['Folio']['empresaid'])) {  
		    $Cargosfoliosa = $this->Cargosfolio->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '3'),
		      'order' => array('Cargo.nombre' => 'asc'))); //pedido es idtipocargo 3
			       
		     //si el folio es de empresa
		     } else {
			     $Categoria = $this->Categoriafolio->find('list', array('fields' => array('Categoriafolio.categoria_id'),
                   'conditions' => array('Categoriafolio.folio_id' => $id)));
			     $Cargosfoliosa = $this->Cargocategoria->find('all', array('conditions' => array('Categoria.id' => $Categoria,
			       'Cargo.idtipocargo' => '3')));
			      }
		 }	
			 
		   //con este foreach se agregan los cargos  al array
			foreach ($Cargosfoliosa as $row) {
				$CargosArray ["{$row['Cargo']['id']}"] = "{$row['Cargo']['nombre']}";
		  	 } 
		  	 	 
		  //y ahora se pasan a la vista	 
			 if (isset($CargosArray)){ //si tiene datos los pasa
	           $this->set('CargosArray', $CargosArray);
             }
			
			 $this->set('id', $id);	
				
    //-------------------------------------------- 	   
	  
	//--------------------------------------------

} //fin de la funcion

/*  ================ Funcion Asignarcargo pedidos =================== 
		Funcion para Asignar cargos al folio
	====================================================== */ 
function asignarcargopro($id=null){
	  
		$Folio = $this->Folio->find('all', array('conditions' => array('Folio.id' => $id))); 
	   foreach ($Folio as $fol) {
				
		  //si el folio es de huesped
		  if(empty ($fol['Folio']['empresaid'])) {  
		    $Cargosfoliosa = $this->Cargosfolio->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '2'),
		      'order' => array('Cargo.nombre' => 'asc'))); //promociones es idtipocargo 2
			       
		     //si el folio es de empresa
		     } else {
			     $Categoria = $this->Categoriafolio->find('list', array('fields' => array('Categoriafolio.categoria_id'),
                   'conditions' => array('Categoriafolio.folio_id' => $id)));
			     $Cargosfoliosa = $this->Cargocategoria->find('all', array('conditions' => array('Categoria.id' => $Categoria,
			       'Cargo.idtipocargo' => '2')));
			      }
		 }	
			 
		   //con este foreach se agregan los cargos  al array
			foreach ($Cargosfoliosa as $row) {
				$CargosArray ["{$row['Cargo']['id']}"] = "{$row['Cargo']['nombre']}";
		  	 } 
		  	 	 
		  	//y ahora se pasan a la vista	 
			 if (isset($CargosArray)){ //si tiene datos los pasa
	           $this->set('CargosArray', $CargosArray);
             }
			
			 $this->set('id', $id);	
				
    //-------------------------------------------- 	   
	  
	//--------------------------------------------

} //fin de la funcion

/*  ================ Funcion Asignarcargo transportes =================== 
		Funcion para Asignar cargos al folio
	====================================================== */ 
function asignarcargotran($id=null){
	  
    $Folio = $this->Folio->find('all', array('conditions' => array('Folio.id' => $id))); 
	   foreach ($Folio as $fol) {
				
		  //si el folio es de huesped
		  if(empty ($fol['Folio']['empresaid'])) {  
		    $Cargosfoliosa = $this->Cargosfolio->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '4'),
		      'order' => array('Cargo.nombre' => 'asc'))); //transporte es idtipocargo 4
			       
		     //si el folio es de empresa
		     } else {
			     $Categoria = $this->Categoriafolio->find('list', array('fields' => array('Categoriafolio.categoria_id'),
                   'conditions' => array('Categoriafolio.folio_id' => $id)));
			     $Cargosfoliosa = $this->Cargocategoria->find('all', array('conditions' => array('Categoria.id' => $Categoria,
			       'Cargo.idtipocargo' => '4')));
			      }
		 }	
			 
		   //con este foreach se agregan los cargos  al array
			foreach ($Cargosfoliosa as $row) {
				$CargosArray ["{$row['Cargo']['id']}"] = "{$row['Cargo']['nombre']}";
		  	 } 
		  	 	 
		  	 //y ahora se pasan a la vista	 
			 if (isset($CargosArray)){ //si tiene datos los pasa
	           $this->set('CargosArray', $CargosArray);
             }
			
			 $this->set('id', $id);			
				
    //-------------------------------------------- 	   
	  
	//--------------------------------------------

} //fin de la funcion

  
	
	 /*  ================ Funcion movercargo =================== 
		Funcion para mover los cargos de un folio a otro
	====================================================== */

	public function movercargo($id = null) {
		
		$this->Ordene->id = $id;
	
	 	$Folio = $this->Folio->find('all', array('conditions' => array('Folio.activo' => '1'),'order' => array('Huespede.nombres' => 'asc'))); 
		 foreach ($Folio as $row) {
			   	 
  	 	 $HuespedArray["{$row['Huespede']['id']}"] = "{$row['Huespede']['nombres']}";
  	          
  	 	 }
        $this->set('HuespedArray', $HuespedArray);
        $this->set('id',$id);
              
	   if (empty($this->data)){  
		
		 	  $this->data = $this->Ordene->read();
		 	 
		} else { 	  
		 	  $huesp = $this->data['Folio']['huespedid'];
		 	  foreach ($Folio as $row) {
				  if($huesp == $row['Folio']['huespedid']){
				  $id3 = $row['Folio']['id'];
				   } }
		       	$this->request->data['Ordene']['folioid'] = $id3;
		   	    $this->Ordene->save($this->data); 
	            $this->Session->setFlash('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp; Orden movida correctamente.</div>', 'flash_custom');
		        $this->redirect(array('controller' => 'Folios','action' => '/view/'.$id3)); 
		  
		    
		    }//Fin Else if empty


	}//Fin de la funcion mover cargo
	
	
    /*  ================ Funcion estadocuentapdf =================== 
		Funcion generar estado de cuenta a pdf
	====================================================== */
	
	public function estadocuentapdf($id = null) {
		
		$m = 0;
		$habitacion = 0;
		$precio = 0;
		$cantidad = 0;
		$total = 0;
		$subtotal = 0;
		$intur = 0;
		$transporte = 0;
		$impuesto = 0;
		$valor = 0;
		$valortransp = 0;
		$this->set('id', $id);
        $this->set('FolioArray',$this->Folio->find('all',array('conditions' => array('Folio.id' => $id))));
       // $this->set('CargordeneArray',$this->Cargordene->find('all',array('conditions' => array('Ordene.folioid' => $id))));
      
       $CargordeneArray = $this->Cargordene->find('all',array('conditions' => array('Ordene.folioid' => $id, 'Ordene.estado' => '2', 'Cargordene.cubeta' => '1')));
      // debug($CargordeneArray);
       $montoimp = 0;
       $suma = 0;
       
       foreach($CargordeneArray as $car){
		     if(!($car['Ordene']['tipoid'] == 6)){
				   $montoimp = $montoimp + ($car['Cargordene']['cantidad'] * $car['Cargo']['precio']);
			  }
		   
		   }
		
		$this->set('montoimp', $montoimp); 
		$this->set('suma', $suma);
		$this->set('m', $m);  
		$this->set('habitacion', $habitacion);  
		$this->set('CargordeneArray', $CargordeneArray);
		 $this->set('OrdeneArray',$this->Ordene->find('all',array('conditions' => array('Ordene.estado' => '2','Ordene.folioid' => $id))));
		   
       
        $this->set('FoliohabArray',$this->Habitacionfolio->find('all',array('conditions' => array('Habitacionfolio.folio_id' => $id)))); 
         $this->set('HabitacioneArray',$this->Habitacione->find('all')); 
        $this->set('TipofolioArray',$this->Tipofolio->find('all')); 
        $this->set('CargoArray',$this->Cargosfolio->find('all', array('conditions' => array('Cargosfolio.folioid' => $id,'Cargosfolio.cubeta' => '1'))));
      
        $fecha = $this->Habitacionfolio->find('all',array('conditions' => array('Habitacionfolio.folio_id' => $id)));       
        $fechaactual = date('Y-m-d');
       
        foreach ($fecha as $fe){
			  $fechainicio = $fe['Habitacionfolio']['fecha'];
			  $calculo = ((strtotime($fechaactual)-strtotime($fechainicio))/86400);
			 
			}
			
		$this->set('fechaactual', $fechaactual);
		$this->set('fechainicio', $fechainicio);
		$this->set('calculo', $calculo);
		$this->set('precio', $precio);
		$this->set('cantidad', $cantidad); 
		$this->set('total', $total);
		$this->set('subtotal', $subtotal);
		$this->set('intur', $intur);
		$this->set('transporte', $transporte);
		$this->set('impuesto', $impuesto);
		$this->set('valor', $valor);
		$this->set('valortransp', $valortransp);
		 
		 $this->layout = 'pdf';
		 
        $this->render();
		
	}	
	
	/*  ================ Funcion estadocuenta =================== 
		Funcion para ver el estado de cuenta
	====================================================== */
	
	public function estadocuenta($id = null) {
		
		$m = 0;
		$habitacion = 0;
		$precio = 0;
		$cantidad = 0;
		$total = 0;
		$subtotal = 0;
		$intur = 0;
		$transporte = 0;
		$impuesto = 0;
		$valor = 0;
		$valortransp = 0;
		$this->set('id', $id);
        $this->set('FolioArray',$this->Folio->find('all',array('conditions' => array('Folio.id' => $id))));
       // $this->set('CargordeneArray',$this->Cargordene->find('all',array('conditions' => array('Ordene.folioid' => $id))));
      
       $CargordeneArray = $this->Cargordene->find('all',array('conditions' => array('Ordene.folioid' => $id, 'Ordene.estado' => '2', 'Cargordene.cubeta' => '1')));
      // debug($CargordeneArray);
       $montoimp = 0;
       $suma = 0;
       
       foreach($CargordeneArray as $car){
		     if(!($car['Ordene']['tipoid'] == 6)){
				   $montoimp = $montoimp + ($car['Cargordene']['cantidad'] * $car['Cargo']['precio']);
			  }
		   
		   }
		
		$this->set('montoimp', $montoimp); 
		$this->set('suma', $suma);
		$this->set('m', $m);  
		$this->set('habitacion', $habitacion);  
		$this->set('CargordeneArray', $CargordeneArray);
		 $this->set('OrdeneArray',$this->Ordene->find('all',array('conditions' => array('Ordene.estado' => '2','Ordene.folioid' => $id))));
		   
       
        $this->set('FoliohabArray',$this->Habitacionfolio->find('all',array('conditions' => array('Habitacionfolio.folio_id' => $id)))); 
         $this->set('HabitacioneArray',$this->Habitacione->find('all')); 
        $this->set('TipofolioArray',$this->Tipofolio->find('all')); 
        $this->set('CargoArray',$this->Cargosfolio->find('all', array('conditions' => array('Cargosfolio.folioid' => $id,'Cargosfolio.cubeta' => '1'))));
      
        $fecha = $this->Habitacionfolio->find('all',array('conditions' => array('Habitacionfolio.folio_id' => $id)));       
        $fechaactual = date('Y-m-d');
       
        foreach ($fecha as $fe){
			  $fechainicio = $fe['Habitacionfolio']['fecha'];
			  $calculo = ((strtotime($fechaactual)-strtotime($fechainicio))/86400);
			 
			}
			
		$this->set('fechaactual', $fechaactual);
		$this->set('fechainicio', $fechainicio);
		$this->set('calculo', $calculo);
		$this->set('precio', $precio);
		$this->set('cantidad', $cantidad); 
		$this->set('total', $total);
		$this->set('subtotal', $subtotal);
		$this->set('intur', $intur);
		$this->set('transporte', $transporte);
		$this->set('impuesto', $impuesto);
		$this->set('valor', $valor);
		$this->set('valortransp', $valortransp);
		 
    }	


}//Fin de la Clase
?>		    	
