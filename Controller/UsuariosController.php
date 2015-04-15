<?php
class UsuariosController extends AppController {

	public $name = 'Usuarios';
	public $helpers = array('Html','Form');
	public $components = array('RequestHandler','Session', 'Paginator');
	public $uses = array('Cliente', 'Usuario', 'Perfile', 'Menu', 'Detmenuperfile');
/*  ===================================================== 
		Variable para la paginacion
	===================================================== */
	var $paginate = array(
	        'limit' => 20,
	        'order' => array(
	            'Usuario.id' => 'desc'
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

/*  ================ Funcion Login ======================= 
		Funcion para Iniciar sesion el el sistema
	===================================================== */
	public function Login() {
		$this->layout = "loginlayout";
		
		if ($this->request->is('post')) {

        if ($this->Auth->login()) {
					
			$username = $this->Auth->request->data['Usuario']['username'];				
			$id = $this->encontrarid($username);
			
			$this->setearDatos($id);
            $this->redirect($this->Auth->redirect());
            

        } else {
            $this->Session->setFlash(__('Usuario o Contrase&ntilde;a Invalido. Intentelo de nuevo'));
        }//Fin del else

    }//FIn del if post

}//Fin de la funcion



/*  ================ Funcion Login ======================= 
		obtener el id de usuario
	===================================================== */
function encontrarid($username)
{
  $this->Usuario->recursive = 2; 
  
  if(!empty($username)){
    
  	$this->Usuario->username = $username;  	
  	$UsuarioArray = $this->Usuario->find('all',array('conditions'=>array('Usuario.username' => $username)));	
  	$this->Usuario->id = $UsuarioArray[0]['Usuario']['id'];
  	return $this->Usuario->id; 
  }    
	
}

/*  ================ Funcion setearDatos======================= 
		Escribir en variable de session los datos del usuario
	===================================================== */
function setearDatos($id)
{
  
  if(!empty($id)){
  	$this->Usuario->id = $id;  
  	$readreser = $this->Usuario->read();    
    $role = $readreser['Usuario']['imgusuario'];
        
    //Se escriben las variables de session del usuario
	$this->Session->write('Usuario.id', $id);
	$this->Session->write('Usuario.NombreU', $readreser['Usuario']['nombres']);
	$this->Session->write('Usuario.ImagenU', $readreser['Usuario']['imgusuario']);	
	$this->Session->write('Usuario.PerfilU', $readreser['Perfile']['id']);
	$idperfil = $readreser['Perfile']['id'];
	
	
	//Crear los menus asociados al perfil
	//Se obtienen los menus asignados
	$DetmenuperfileDisponibles = $this->Detmenuperfile->find('all', array('conditions' => array('Detmenuperfile.idperfil' => $idperfil)));
	$submenus = $this->Detmenuperfile->find('all', array('conditions' => array('Detmenuperfile.idperfil' => $idperfil )));
	//$this->set('DetmenuperfileDisponibles', $DetmenuperfileDisponibles );
		
	
	$strMenu = "";
	$URLSITE = Router::url('/', true);	
	
		foreach($DetmenuperfileDisponibles as $row){
						
			if($row['Menu']['idpadre'] == 0){
			
				//Contamos a ver si tiene submenus
				$cont = 0;
				foreach($submenus as $row2){
					if($row2['Menu']['idpadre'] == $row['Menu']['id']){
						$cont = $cont + 1;
					}
				}
				
				//si el cont es 0 no tiene submenus				
				if($cont == 0){
					
					$strMenu = $strMenu . "\n <li><a href=\"" . $URLSITE . $row['Menu']['url'] . "\">" . $row['Menu']['nombre'] . "</a> </li>";
				
				}else{
				//si el cont no es 0 entonces tiene submenus y hay que ubicarlos 
				
					$strMenu = $strMenu . "\n <li> \n";
					$strMenu = $strMenu . "<a href=\"" . $URLSITE . $row['Menu']['url'] . "\">" . $row['Menu']['nombre']  . "</a>";
					$strMenu = $strMenu . "\n  <ul> \n";
					foreach($submenus as $row2){
						
						if($row2['Menu']['idpadre'] == $row['Menu']['id']){
							$strMenu = $strMenu . "<li><a href=\"" . $URLSITE . $row2['Menu']['url'] . "\"><span class=\"" . $row2['Menu']['css'] . "\"></span>" . $row2['Menu']['nombre'] . "</a></li>";
						}//finsi
						
					}//Fin foreach 2
					$strMenu = $strMenu . "\n </ul> \n";
					$strMenu = $strMenu . "\n </li>";
				
				}//Fin del else	
				
			
			} //Fin si
			
	} //Fin foreach
		      
	$this->Session->write('MenuPrincipal', $strMenu);
	
  } //Fin del if empty
   
   
  
 
   
	
}//Fin de la funcion










/*  ================ Funcion Login ======================= 
		obtener el nombre de usuario
	===================================================== */
function encontrarNombre($id)
{
  
  if(!empty($id)){
  	$this->Usuario->id = $id;  
  	$readreser = $this->Usuario->read();    
    $role = $readreser['Usuario']['nombres'];
  	return $role; 
  }    
	
}


/*  ================ Funcion encontrarImagen======================= 
		obtener la imagen del perfil del usuario
	===================================================== */
function encontrarImagen($id)
{
  
  if(!empty($id)){
  	$this->Usuario->id = $id;  
  	$readreser = $this->Usuario->read();    
    $role = $readreser['Usuario']['imgusuario'];
  	return $role; 
  }    
	
}//Fin de la funcion


	
/*  ================ Funcion Logout ===================== 
		Funcion para cerrar sesion 
	===================================================== */
	
	public function logout() {    
		$this->redirect($this->Auth->logout());
	}


/*  ================ Funcion AdminAdd ======================= 
		Funcion para Agregar usuarios al sistema
	====================================================== */
	
	public function adminadd() {
	
	//Se obtienen y se pasan a la vista los perfiles de usuarios disponibles
	$perfilesdisponibles = $this->Perfile->find('all');
	foreach($perfilesdisponibles as $row){
		$PerfilesArray["{$row['Perfile']['id']}"] = "{$row['Perfile']['nombre']}";
		}
	$this->set('PerfilesArray', $PerfilesArray);

	
		if($this->request->is('post')) {
			$this->Usuario->create();
			
			$usuarioNuevo['Usuario'] = $this->request->data['Usuario'];		
			$usuarioNuevo['Usuario']['password'] = $this->Auth->password($this->request->data['Usuario']['password']);
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
																			
				if ($this->Usuario->save($usuarioNuevo)) {
					$this->Session->setFlash('El usuario ha sido creado satisfactoriamente','flash_custom');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('El Usuario no pudo ser creado Intente nuevamente', 'flash_error');
				}
		}
	
	}//Fin de la Funcion Adminadd
	
	
/*  ================ Funcion Index =================== 
		Funcion para ver los usuarios del sistema
	====================================================== */

public function index($id=null) {


$this->Paginator->settings = array(
        'conditions' => array('Usuario.activo' => 1),
        'limit' => 10
    );
	
		 $this->Usuario->id= $id;
		 $rangoUsuarios = $this->paginate('Usuario');
		 $this->set('UsuariosArray', $rangoUsuarios);
		
}//Fin de la funcion index




/*  ================ Funcion Adminedit =================== 
		Funcion para ver los Editar los usuarios
	====================================================== */

	public function adminedit($id = null) {
		
		$this->Usuario->id = $id;
		
//--------------------------------------------------------------------------------			
	$perfilesdisponibles = $this->Perfile->find('all');
	foreach($perfilesdisponibles as $row){
		$PerfilesArray["{$row['Perfile']['id']}"] = "{$row['Perfile']['nombre']}";
		}
	$this->set('PerfilesArray', $PerfilesArray);
			
//--------------------------------------------------------------------------------

		if(empty($this->data)){
		 	$this->data = $this->Usuario->read();
		} else {
		
//--------------------------------------------------------------------------------
			$usuarioNuevo['Usuario'] = $this->request->data['Usuario'];	
			if($this->request->data['Usuario']['passwordnew'] != ""){
				
				if($this->request->data['Usuario']['passwordnew'] == $this->request->data['Usuario']['passwordsecret']){
					//se le pasa la password
					$usuarioNuevo['Usuario']['password'] = $this->Auth->password($usuarioNuevo['Usuario']['passwordnew']);
				}else{
					$this->Session->setFlash('Las contrase&ntilde;as no coinciden', 'flash_error');
		            $this->redirect(array('action' => 'adminedit/' . $id));
				}	

			}
								
			//$usuarioNuevo['Usuario']['password'] = $this->Auth->password($usuarioNuevo['Usuario']['password']);
			
			//---------------------------------------------------------------------------------------	
			// COMPROBAR SI SE SUBIO UNA NUEVA FOTO	    
			//---------------------------------------------------------------------------------------		    
			$destino = WWW_ROOT . 'uploads/usuarios'.DS;
			$hoy = date("Ymd-h-i-s"); 
			
			$imagenAnterior = $destino. $this->data['Usuario']['imgusuario'];
			if($this->data['Usuario']['archivo']['error'] == 0 &&  $this->data['Usuario']['archivo']['size'] > 0){
			$movedimg =  $hoy . $this->data['Usuario']['archivo']['name'];
					
			if(move_uploaded_file($this->data['Usuario']['archivo']['tmp_name'], $destino . $movedimg)){
					//modifico la ruta para guardar la url del archivo  
			     	$usuarioNuevo['Usuario']['imgusuario'] = $movedimg;
			     	
			     	try {
					   //Se borra la imagen anterior
			     		unlink($imagenAnterior);					
			     	} catch (Exception $e) {
					   // echo 'Excepcion capturada: ',  $e->getMessage(), "\n";
					}//Endtry
			     				     	
				}//fin if moved
			}//fin de if data archivo	
				
		//--------------------------------------------------------------------------------	  
		    if ($this->Usuario->save($usuarioNuevo)){			  
		            $this->Session->setFlash('Usuario Modificado Correctamente', 'flash_custom');
		            $this->redirect(array('action' => 'index'));
		        }//Fin si
		 
		    }//Fin Else if empty


	}//Fin de la funcion Adminedit
	


/*  ================ Funcion baja =================== 
		Funcion para dar de baja a los usuarios
	====================================================== */
public function baja($id = null) {

$this->layout = "adminlayout";

debug($this->data);

	$this->Usuario->id = $id;
	if (!$id) {
		$this->Session->setFlash('<div class="message success"><a href="#" class="button alert">No se ha podido dar de baja</a></div>');
		$this->redirect(array('action' => 'index'));
	}else{
	
		$this->Usuario->id = $id;
		$this->data = $this->Usuario->read();
		$this->request->data['Usuario']['activo'] = 2;
		$this->Usuario->save($this->data);		  
		$this->Session->setFlash('<div class="alert alert-success"><a href="#" class="button success">Usuario se ha dado de baja</a></div>');
		$this->redirect(array('action' => 'index'));
	}
	
}//Fin de la funcion



/*  ================ Funcion baja =================== 
		Funcion para ver los detalles de usuarios
===================================================== */
public function view($id = null) {
	$this->Usuario->id= $id;
	$this->data = $this->Usuario->read();	
}//Fin de la funcion
	




/*  ================ Funcion baja =================== 
		Funcion para modificar los permisos
	====================================================== */
public function permisos($id = null) {
	$this->Usuario->id= $id;
	$this->data = $this->Usuario->read();	
}//Fin de la funcion



}//Fin de la Clase
?>