<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- saved from url=(0042)http://pxd.me/dompdf/www/test/demo_01.html -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="STYLESHEET" href="./reportedemo_01_files/print_static.css" type="text/css">
</head>
<body>

<section class="clearfix" id="main-content">
                <div id="mostrar.html" style="left: 0px; position: relative; top: 0px;">

                
                <div class="container_12 clearfix leading">
                    <div class="grid_12">
                   		
                   		<?php  echo $this->Form->create('Folio', array('action' => 'estadocuentapdf')); 	
                   			?>



 <?php	foreach($FolioArray as $fol){ ?>
<h4 style="text-align: center"> Estado de cuenta del Huesped: <?php echo $fol['Huespede']['nombres'],' ',$fol['Huespede']['apellidos']; } ?> </h4>


<hr>
<p>Fecha de creacion: <?php echo $fechaactual; ?></p> 

<br/>

 
 <table cellspacing="0"  style="width: 100%; border-top:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
    <thead> 
          <tr> 
             <th class="sorting"><?php echo 'Habitaciones'; ?></th> 
          </tr> 
     </thead>                                                
 </table>
 
 
 
 <table cellspacing="0"  style="width: 100%; border-top:thin #000000 solid; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                                <thead> 
                                    <tr> 
                                       
                                        <th class="sorting" style="border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Fecha de entrada'; ?></th> 
                                        <th class="sorting" style="min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Num. y tipo'; ?></th> 
                                        <th class="sorting"  style="min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Cantidad de noches'; ?></th>
                                        <th class="sorting" style="border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Precio unitario'; ?></th>
                                        <th class="sorting" style="border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Valor'; ?></th>
                                        
										
                                    </tr> 
                                </thead> 
                                 
                     <tbody>
                          
                       <?php foreach($FoliohabArray as $hab) {  
                         foreach($HabitacioneArray as $habi) { 
                        if($habi['Habitacione']['id'] == $hab['Habitacione']['id']){ ?>                                                                      
                         <tr class="gradeA odd"> 
                            
                                       <td style="text-align:center; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php	echo $fechainicio;	?> 
                                      </td>  
                                                                     
                                        <td style="text-align:left; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                       
										<?php	  
											echo 'hab.'.$hab['Habitacione']['numhab'], ' - ', $habi['Tipohabitacione']['nombre']; ?>
                                     
                                      </td> 
                                      
                                      <td style="text-align:center; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php  echo $calculo;  ?>
                                       
                                      </td>  
                                      
                                       <td style="text-align:center; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                         <?php  
											echo $habi['Tipohabitacione']['precio'];
											  $precio = $habi['Tipohabitacione']['precio'];
										 ?>
                                      </td> 
                                                                        
                                      <td style="text-align:center; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                          <?php   $valor = $precio * $calculo;
                                                   echo '$'.$valor; ?> 
                                                   
                                     
                                      </td>   
                                 
                                     <?php 
                                     
                                        
                                      $habitacion = $habitacion + $valor; 
                                      $intur = $habitacion * 0.02;
                                     
                                     ?>      
                             </tr>
                             
                           	               
                    
                     <?php  } } } //fin del for each ?>
                   	 
                                    
                    </tbody>
                  </table>  
                  
                  
             
 
 
 <table cellspacing="0"  style="width: 100%; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
    <thead> 
          <tr> 
             <th class="sorting" ><?php echo 'Otros cargos'; ?></th> 
          </tr> 
     </thead>                                                
 </table>
 
 
 <table cellspacing="0"  style="width: 100%; border-top:thin #000000 solid; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                                <thead> 
                                    <tr> 
                                       
                                        <th class="sorting" style="border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Fecha'; ?></th> 
                                        <th class="sorting" style="min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Num. Orden'; ?></th> 
                                        <th class="sorting" style="min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Tipo de Orden'; ?></th> 
                                        <th class="sorting"  style="min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Monto'; ?></th>
                                      
										
                                    </tr> 
                                </thead> 
                                 
                     <tbody>
                          
                       <?php	foreach($OrdeneArray as $or){ ?>
                                                                                              
                         <tr class="gradeA odd"> 
                            
                                       <td style="text-align:center; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php	echo $or['Ordene']['fecha'];	?> 
                                      </td>  
                                      
                                        <td style="text-align:center; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php  echo $or['Ordene']['id'];  ?>
                                     
                                      </td> 
                                      
                                       <td style="text-align:left; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php  echo $or['Tipordene']['nombre'];  ?>
                                     
                                      </td> 
                                      
                                      <td style="text-align:center; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                         <?php	foreach($CargordeneArray as $car){ 
											    if($car['Cargordene']['ordene_id'] == $or['Ordene']['id']){
												  $suma = $suma + ($car['Cargordene']['cantidad'] * $car['Cargo']['precio']);
												  
												}
												
												 }	echo '$'.$suma.'<br/>';
												    $m = $m + $suma;
												    $suma = 0; 
												 ?>
                                                                               
                                      </td>  
                                       
                             </tr>
                             
                           	               
                    
                     <?php  }  //fin del for each ?>
                   	 
                                    
                    </tbody>
                  </table>   
                    
         
         
         
         <table cellspacing="0" style="width: 100%; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; min-width: 100%;"><?php echo 'Subtotal:'; ?></th> 
                            <th class="sorting" style="width: 11%;"><?php $subtotal = $m + $habitacion; echo '$'.$subtotal; ?></th> 
                           
						</tr>	
						
					</tbody>	
		</table>
		
		  <table cellspacing="0" style="width: 100%; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; min-width: 100%;"><?php echo 'Imp/tax:'; ?></th> 
                            <th style="width: 11%;">
                             <?php $impuesto = ($montoimp + $habitacion) * 0.15;
                              echo '$'.$impuesto;  ?>
                             
                            </th> 
						</tr>	
						
					</tbody>	
		 </table>  
		
		
		 <table cellspacing="0" style="width: 100%; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; min-width: 100%;"><?php echo 'Intur:'; ?></th> 
                            <th style="width: 11%;"><?php echo '$'.$intur;
                            ?></th> 
						</tr>	
						
					</tbody>	
		</table> 
		
		 <table cellspacing="0" style="width: 100%; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; min-width: 100%;"><?php echo 'Total:'; ?></th> 
                            <th style=" width: 11%;"><?php 
                            $total = $subtotal + $impuesto + $intur;
                            echo '$'.$total; 
                               
                            ?></th> 
						</tr>	
						
					</tbody>	
		</table>    			
        
                              
             
                               
               
</div>
</div></div></section>


</body></html>								
              
