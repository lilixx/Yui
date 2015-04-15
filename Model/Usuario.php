<?php
App::uses('AuthComponent', 'Controller/Component');
class Usuario extends AppModel {
	
	public $name = 'Usuario';

	 public $belongsTo = array(
        'Perfile' => array(
            'className' => 'Perfile',
            'foreignKey' => 'idperfil'
        )
    );	
		
		
public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['Password'])) {
        $this->data[$this->alias]['Password'] = AuthComponent::password($this->data[$this->alias]['Password']);
    }
    return true;
}	



}//Fin del modelo Usuario
?>
