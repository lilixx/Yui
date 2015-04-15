<?php
class CargosfoliosController extends AppController
{
//____________________________________________________________________________
//________________________Variables___________________________________________
var $name = 'Cargosfolios';
var $helpers = array('Html','Form','Time','Js');
var $uses = array('Cargosfolio', 'Folio');

	/*  ===================================================== 
		Funcion que se ejecuta antes de cada llamado
	===================================================== */
	public function beforeFilter() {
		
		
   }	

function asignarCargo($id)
	{
		$this->Folio->id = $id;
		$readreser = $this->Folio->read();
	
	
		if ($id) {
		
		$cargo =  $this->data['Cargosfolio']['cargoid']; 
				
		$this->Cargosfolio->create();
		
		$this->Cargosfolio->folioid = $id;
		
	    // se crea la data de el alumno y seccion a asociar
		$this->request->data['Cargosfolio']['cargoid'] = $cargo;
		$this->request->data['Cargosfolio']['folioid'] = $id;
					
		$this->Cargosfolio->save($this->data);  
		
		
		$readerser2 = $this->Cargosfolio->read();
		
	
		$this->Session->setFlash('<div class="message success"><h3>Cargo asignado al folio</h3></div>');
		$this->redirect(array('controller'=>'folios','action' => '/view/'.$id.''));
		
		
	}//fin del if
	
	
	}//fin de la funcion
	
	 /*  ================ Funcion cubeta =================== 
	funcion donde se mandan a la cubeta los cargos agregados a un folio	
	====================================================== */
	
	public function cubeta($id = null, $id2 = null) {
	
	 $this->Cargosfolio->id = $id;
		 
	 $Cargof = $this->Cargosfolio->find('all',array('conditions' => array('Cargosfolio.id' => $id)));
        foreach ($Cargof as $row) {
	       $id2 = $row['Folio']['id'];
        }
	      		 
	    if (!$id) {
	       $this->Session->setFlash('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Error: El cargo no se ha podido enviar a la cubeta.</div>');
	       $this->redirect(array('action' => '/'));	
		}
	
	 	if ($this->Cargosfolio->updateAll(array('Cargosfolio.cubeta' => "'2'"),array('Cargosfolio.id' => $id))) { 
	       $this->Session->setFlash('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;El cargo ha sido enviado a la cubeta.</div>');
	       $this->redirect(array('controller' => 'Folios','action' => '/view/'.$id2));	
	    }


   }//Fin de la funcion cubeta
   
    /*  ================ Funcion eliminarcargo =================== 
	funcion para elminar los cargos de la cubeta	
	====================================================== */
	
	public function eliminarcargo($id = null) {
	
	 $this->Cargosfolio->id = $id;
		      		 
	    if (!$id) {
	       $this->Session->setFlash('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Error: El cargo no se ha podido eliminar.</div>');
	       $this->redirect(array('action' => '/'));	
		}
	
	 	if($this->Cargosfolio->delete($this->request->data('Cargosfolio.id'))){
           $this->Session->setFlash('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;El cargo ha sido eliminado de la cubeta.</div>');
	       $this->redirect(array('controller' => 'Folios','action' => '/cubetaview'));	
	    }


   }//Fin de la funcion cubeta
   
   



}//FIn de la clase Alumno secciones
 
?>

