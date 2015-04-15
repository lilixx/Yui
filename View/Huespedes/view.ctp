<div class="col-md-3"> 
      		<div class="list-group">
	      	
	      	<?php echo $this->Html->link('Mostrar Huespedes',array('controller' => 'Huespedes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Búsqueda de Huespedes',array('controller' => 'Huespedes', 'action' => 'search', 'full_base' => true),  array('class' => 'list-group-item')); ?>		      
		      
			</div>
      </div> 
   
<div class="col-md-9">      
   
		   
		<?php echo $this->Form->create('Folio',array('action' => 'view')); ?>
       
<div class="row">

		
	   <?php
	                   
                foreach($DetallehuespedeArray as $hue){
           ?>	
	    
	<div class="col-md-12">
			<div class="form-group">
	                     <h2 id="input-groups-basic"> <?php echo $hue['Huespede']['nombres'];echo '  ',$hue['Huespede']['apellidos']; ?> </h2>
                   <label for="exampleInputEmail1">Registrado por: </label> 
	                   <?php echo $hue['Usuario']['nombres'],' ', $hue['Usuario']['apellidos']; ?> <br/>   
			<hr>
    </div>
    
    <div class="col-md-6">
	                 <label for="exampleInputEmail1">Dirección permanente: </label> 
	                 <?php  echo $hue['Huespede']['direccion']; ?> <br/> 
	                 
	                 <label for="exampleInputEmail1">Estado Civil: </label> 
	                 <?php  echo $hue['Huespede']['estadocivil']; ?> <br/>  
	               
	                <label for="exampleInputEmail1">Tipo de documento: </label> 
	                 <?php  echo $hue['Huespede']['tipodoc']; ?> <br/>              
	                     
	                 <label for="exampleInputEmail1">Motivo del viaje: </label> 
	                   <?php echo $hue['Detallehuespede']['motivoviaje']; ?> <br/>
	                 
	                 <label for="exampleInputEmail1">País de Destino: </label> 
	                   <?php echo $hue['Huespede']['paisdestino']; ?> <br/>
	                   
	                 <label for="exampleInputEmail1">Fecha de salida: </label> 
	                   <?php echo $hue['Detallehuespede']['fechasalida']; ?> <br/> 
	                  
	                  <label for="exampleInputEmail1">Linea Aérica y Vuelo de Salida: </label> 
	                   <?php echo $hue['Detallehuespede']['aerolinea']; ?> <br/> 
	                   
	                  <label for="exampleInputEmail1">Correo electrónico: </label> 
	                   <?php echo $hue['Huespede']['email']; ?> <br/> 
                          
                       <label for="exampleInputEmail1">No. de habitacion : </label> 
	                   <?php echo $hue['Habitacione']['numhab']; ?> <br/> 

                       <label for="exampleInputEmail1">No. de reserva : </label> 
	                   <?php  echo $hue['Detallehuespede']['reservacione_id']; ?> <br/> 
                                                 
	        
	          <br/>
	          <a href="/Huespedes" <button type="button" class="btn btn-primary">Regresar</button></a>       

           </div>
                
              <div class="col-md-6">
	                 <label for="exampleInputEmail1">Profesión u oficio: </label> 
	                 <?php  echo $hue['Huespede']['profesion']; ?> <br/> 
	                 
	                 <label for="exampleInputEmail1">Fecha de Nacimiento: </label> 
	                 <?php  echo $hue['Huespede']['fechanacimiento']; ?> <br/>  
	               
	                <label for="exampleInputEmail1">Sexo: </label> 
	                 <?php  echo $hue['Huespede']['sexo']; ?> <br/>              
	                     
	                 <label for="exampleInputEmail1">Nacionalidad: </label> 
	                   <?php echo $hue['Huespede']['nacionalidad']; ?> <br/>
	                 
	                 <label for="exampleInputEmail1">Número de Documento: </label> 
	                   <?php echo $hue['Huespede']['numdoc']; ?> <br/>
	                   
	                 <label for="exampleInputEmail1">País de Procedencia: </label> 
	                   <?php echo $hue['Huespede']['paisprocedencia']; ?> <br/> 
	                  
	                  <label for="exampleInputEmail1">Fecha de Entrada: </label> 
	                   <?php echo $hue['Detallehuespede']['fechaentrada']; ?> <br/> 
	                   
	                  <label for="exampleInputEmail1">Hora de Salida: </label> 
	                   <?php echo $hue['Detallehuespede']['horasalida']; ?> <br/> 
                         
                        <label for="exampleInputEmail1">Empresa: </label> 
	                   <?php echo $hue['Detallehuespede']['empresa']; ?> <br/>  
                          
                          <label for="exampleInputEmail1">Teléfono: </label> 
	                   <?php echo $hue['Huespede']['telefono']; ?> <br/> 
	                   
	                  	         
	          <br/>
	           

           </div>
               
             


                 <?php }  ?>

	        </div>
	 </div>
	 
 	                     
	                    
				  

</div>
</div>
