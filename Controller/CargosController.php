<?php
class CargosController extends AppController {

	public $name = 'Cargos';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session');
	public $uses = array('Cargo','Categoria','Cargocategoria');
      

/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'limit' => 40,
	        'order' => array(
	            'Cargo.id' => 'desc'
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


	
/*  ================ Funcion pedidoview =================== 
		Funcion para ver los pedidos del sistema
	====================================================== */

	public function pedidoview() {
                                
		 $todosCargos = $this->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '3', 'Cargo.activo' => '1')));
         $this->set('CategoriaArray',$this->Cargocategoria->find('all'), array('conditions' => array('Cargocategoria.categoria_id' => 'Categoria.id'))); 
		 $this->set('CargosArray', $todosCargos);
		 
	}//Fin de la funcion pedidoview


/*  ================ Funcion servicioview =================== 
		Funcion para ver los servicios del sistema
	====================================================== */

	public function servicioview() {
                                
		 $todosCargos = $this->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '1', 'Cargo.activo' => '1')));
          $this->set('CategoriaArray',$this->Cargocategoria->find('all'), array('conditions' => array('Cargocategoria.categoria_id' => 'Categoria.id'))); 
		 $this->set('CargosArray', $todosCargos);       
		 
	}//Fin de la funcion servicioview


/*  ================ Funcion promocioneview =================== 
		Funcion para ver las promociones del sistema
	====================================================== */

	public function promocioneview() {
                                
		 $todosCargos = $this->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '2', 'Cargo.activo' => '1')));
          $this->set('CategoriaArray',$this->Cargocategoria->find('all'), array('conditions' => array('Cargocategoria.categoria_id' => 'Categoria.id'))); 
		 $this->set('CargosArray', $todosCargos);
		 
	}//Fin de la funcion promocioneview
	
/*  ================ Funcion trasnporteview =================== 
		Funcion para ver los transporte del sistema
	====================================================== */

	public function transporteview() {
                                
		 $todosCargos = $this->Cargo->find('all', array('conditions' => array('Cargo.idtipocargo' => '4', 'Cargo.activo' => '1')));
		 $this->set('CategoriaArray',$this->Cargocategoria->find('all'), array('conditions' => array('Cargocategoria.categoria_id' => 'Categoria.id'))); 
		 $this->set('CargosArray', $todosCargos);
		 
	}//Fin de la funcion promocioneview


/*  ================ Funcion Pedidoadd ======================= 
		Funcion para Agregar Pedidos al sistema
	====================================================== */
	
	public function pedidoadd() {
	
	   $Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray); 
	      
		if($this->request->is('post')) {
			$this->Cargo->create();
            $this->request->data['Cargo']['idtipocargo'] = 3;   
															
				if ($this->Cargo->saveAll($this->request->data)) {
					$this->Session->setFlash('El Pedido ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => 'pedidoview'));
				} else {
					$this->Session->setFlash('El Pedido no pudo ser creado Intente nuevamente', 'flash_error');
				}
		}
	
	}//Fin de la Funcion Pedidoadd
	
	/*  ================ Funcion Transporteadd ======================= 
		Funcion para Agregar Transporte al sistema
	====================================================== */
	
	public function transporteadd() {
	    $Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray);
	      
		if($this->request->is('post')) {
			$this->Cargo->create();
                        $this->request->data['Cargo']['idtipocargo'] = 4;   
																			
				if ($this->Cargo->saveAll($this->request->data)) {
					$this->Session->setFlash('Operación realizada exitosamente','flash_custom');
					$this->redirect(array('action' => 'transporteview'));
				} else {
					$this->Session->setFlash('El Transporte no pudo ser creado Intente nuevamente', 'flash_error');
				}
		}
	
	}//Fin de la Funcion Pedidoadd


/*  ================ Funcion Servicioadd ======================= 
		Funcion para Agregar Servicios al sistema
	====================================================== */
	
	public function servicioadd() {
		
		$Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray);
	
		if($this->request->is('post')) {
			$this->Cargo->create();
                        $this->request->data['Cargo']['idtipocargo'] = 1;   
																			
				if ($this->Cargo->saveAll($this->request->data)) {
					$this->Session->setFlash('El Servicio ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => 'servicioview'));
				} else {
					$this->Session->setFlash('El Servicio no pudo ser creado Intente nuevamente', 'flash_error');
				}
		}
	
	}//Fin de la Funcion Servicioadd


    /*  ================ Funcion Promocioneadd ======================= 
		Funcion para Agregar Promociones al sistema
	====================================================== */
	
	public function promocioneadd() {
	
		$Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray);	
		
		if($this->request->is('post')) {
			
			$this->Cargo->create();
            $this->request->data['Cargo']['idtipocargo'] = 2;   
			  													
                if ($this->Cargo->saveAll($this->request->data)) {
					$this->Session->setFlash('La promocion ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => 'promocioneview'));
				} else {
					$this->Session->setFlash('La promocion no pudo ser creado Intente nuevamente', 'flash_error');
   		        }
   		 }       
	
	}//Fin de la Funcion Promocionadd
	


 /* ================ Funcion servicioedit =================== 
		Funcion para  editar los servicios
	====================================================== */

	public function servicioedit($id = null) {
		
		$this->Cargo->id = $id;
		
		$Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray);
	     $variable = $this->Cargocategoria->find('list', array('fields' => array('Cargocategoria.id'),
	      'conditions' => array('Cargocategoria.cargo_id' => $id)));
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Cargo->read();

		    } else {
		    	
		    	$categoriaid = $this->data['Cargocategoria']['categoria_id'];
		     	$this->Cargocategoria->updateAll(array('Cargocategoria.categoria_id' => $categoriaid),
		     	array('Cargocategoria.id'=> $variable)); 	    
		    	if ($this->Cargo->save($this->data)){			  
		            $this->Session->setFlash('Servicio Modificado Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/servicioview'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion servicioedit */

   
 /*    ================ Funcion promocionedit =================== 
		Funcion para  editar las promociones
	====================================================== */

	public function promocionedit($id = null) {
		
		$this->Cargo->id = $id;
		
		$Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray);
	     $variable = $this->Cargocategoria->find('list', array('fields' => array('Cargocategoria.id'),
	      'conditions' => array('Cargocategoria.cargo_id' => $id)));
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Cargo->read();

		    } else {
		    	
		    	$categoriaid = $this->data['Cargocategoria']['categoria_id'];
		     	$this->Cargocategoria->updateAll(array('Cargocategoria.categoria_id' => $categoriaid),
		     	array('Cargocategoria.id'=> $variable)); 	    
		    	if ($this->Cargo->save($this->data)){			  
		            $this->Session->setFlash('Promoción Modificada Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/promocioneview'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion promocionedit */


  /*   ================ Funcion pedidoedit =================== 
		Funcion para  editar los pedidos
	====================================================== */

	public function pedidoedit($id = null) {
		
		$this->Cargo->id = $id;
		
		$Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray);
	     $variable = $this->Cargocategoria->find('list', array('fields' => array('Cargocategoria.id'),
	      'conditions' => array('Cargocategoria.cargo_id' => $id)));
		
		
		if(empty($this->data)){
		
		 	  $this->data = $this->Cargo->read();

		    } else {
		    	
		    	$categoriaid = $this->data['Cargocategoria']['categoria_id'];
		     	$this->Cargocategoria->updateAll(array('Cargocategoria.categoria_id' => $categoriaid),
		     	array('Cargocategoria.id'=> $variable)); 
		     		    
		    	if ($this->Cargo->save($this->data)){			  
		            $this->Session->setFlash('Pedido Modificado Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/pedidoview'));
		        }//Fin si
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion pedidoedit */
	
 /*   ================ Funcion transportedit =================== 
		Funcion para  editar los transporte
	====================================================== */

	public function transportedit($id = null) {
		
		$this->Cargo->id = $id;
		
		$Categoriaa = $this->Categoria->find('all');
		
		 foreach ($Categoriaa as $row){
			  $CategoriasArray["{$row['Categoria']['id']}"] = "{$row['Categoria']['nombre']}";		
	    	}
	    	
	     $this->set('CategoriasArray', $CategoriasArray);
	     $variable = $this->Cargocategoria->find('list', array('fields' => array('Cargocategoria.id'),
	      'conditions' => array('Cargocategoria.cargo_id' => $id)));
	     
	     		
		if(empty($this->data)){
		
		 	  $this->data = $this->Cargo->read();

		    } else {
		    	
		    	
		    	$categoriaid = $this->data['Cargocategoria']['categoria_id'];
		     	$this->Cargocategoria->updateAll(array('Cargocategoria.categoria_id' => $categoriaid),
		     	array('Cargocategoria.id'=> $variable)); 
		    			    	  
		    	if ($this->Cargo->save($this->data)){			  
		            $this->Session->setFlash('Pedido Modificado Correctamente', 'flash_custom');
		            $this->redirect(array('action' => '/transporteview'));
		        }//Fin si 
		    
		    
		    }//Fin Else if empty


	}//Fin de la funcion pedidoedit */


/*    ================ Funcion baja =================== 
		Funcion para dar de baja a los cargos (pedido, servicio, promocion y transporte)
	====================================================== */
	
	public function baja($id = null) {
	
	 $this->Cargo->id = $id;
     
      $this->params['url']['tipo'];
      debug($this->params['url']['tipo']);
      
       if(isset($this->params['url']['tipo'])){
			$redirecciontipo = $this->params['url']['tipo'];
		} 
      
      
	  if (!$id) {
	       $this->Session->setFlash('<div class="message success"><h3>Fallo!</h3><p>No se ha podido dar de baja</p></div>');
	       $this->redirect(array('action' => '/'));	
		}
		
	 	if ($this->Cargo->updateAll(array('Cargo.activo' => "'2'"),array('Cargo.id' => $id))) { 
	       $this->Session->setFlash('<div class="message success"><h3>El Registro ha sido dado de Baja</h3></div>');
	   
	    
	    if ($redirecciontipo == 2){
			$this->redirect(array('action' => '/servicioview'));
		}
		
		 if ($redirecciontipo == 1){
			$this->redirect(array('action' => '/pedidoview'));
		}
		
		 if ($redirecciontipo == 3){
			$this->redirect(array('action' => '/promocioneview'));
		}
		
		 if ($redirecciontipo == 4){
			$this->redirect(array('action' => '/transporteview'));
		}
	    
	  }     	
	 	
   }//Fin de la funcion baja 
   


}//Fin de la Clase
?>
