<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- saved from url=(0042)http://pxd.me/dompdf/www/test/demo_01.html -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="STYLESHEET" href="./reportedemo_01_files/print_static.css" type="text/css">
<style>.tooltiptrolol { position: relative; cursor: help; text-decoration: none;} .tooltiptrolol span { display: none; position: absolute; top: 15px; left: 10px; padding: 5px; z-index: 100; background: #000; color: #fff; border-radius: 5px; box-shadow: 2px 2px rgba(0, 0, 0, 0.1); text-align: center; line-width: 1000px; text-indent: 0; font: normal bold 10px/13px Tahoma,sans-serif; white-space: nowrap;} span:hover.tooltiptrolol { font-size: 99%; } .tooltiptrolol:hover span { display: block; } .md img { display:inline; } .rageface { visibility:visible; }
.auto-style1 {
	text-align: left;
}

</style></head>
<body>

<section class="clearfix" id="main-content">
                <div id="mostrar.html" style="left: 0px; position: relative; top: 0px;">

                
                <div class="container_12 clearfix leading">
                    <div class="grid_12">
                   		
                   		<?php  echo $this->Form->create('Folio', array('action' => 'estadocuentapdf')); 	
                   			?>



 <?php	foreach($FolioArray as $fol){ ?>
<h4 style="text-align: center"> Estado de cuenta del Huesped: <?php echo $fol['Huespede']['nombres'],' ',$fol['Huespede']['apellidos']; } ?> </h4>



<img src="/../img/teodolinda.png" style="background-repeat: no-repeat; position:absolute; left: 0px; top: -20px;"> 

<hr>
<p style="font-size: 9pt;">Fecha de creacion: <?php echo $fechaactual; ?></p> 

<br/>

 
 <table cellspacing="0"  style="width: 100%; font-size: 8pt; border-top:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
    <thead> 
          <tr> 
             <th class="sorting" style="font-size: 9pt;"><?php echo 'Habitaciones'; ?></th> 
          </tr> 
     </thead>                                                
 </table>
 
 
 
 <table cellspacing="0"  style="width: 100%; font-size: 8pt; border-top:thin #000000 solid; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                                <thead> 
                                    <tr> 
                                       
                                        <th class="sorting" style="font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Fecha de entrada'; ?></th> 
                                        <th class="sorting" style="font-size: 9pt; min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Num. y tipo'; ?></th> 
                                        <th class="sorting"  style="font-size: 9pt; min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Cantidad de noches'; ?></th>
                                        <th class="sorting" style="font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Precio unitario'; ?></th>
                                        <th class="sorting" style="font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Valor'; ?></th>
                                        
										
                                    </tr> 
                                </thead> 
                                 
                     <tbody>
                          
                       <?php foreach($FoliohabArray as $hab) {  
                         foreach($HabitacioneArray as $habi) { 
                        if($habi['Habitacione']['id'] == $hab['Habitacione']['id']){ ?>                                                                      
                         <tr class="gradeA odd"> 
                            
                                       <td style="text-align:center; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php	echo $fechainicio;	?> 
                                      </td>  
                                                                     
                                        <td style="text-align:left; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                       
										<?php	  
											echo 'hab.'.$hab['Habitacione']['numhab'], ' - ', $habi['Tipohabitacione']['nombre']; ?>
                                     
                                      </td> 
                                      
                                      <td style="text-align:center; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php  echo $calculo;  ?>
                                       
                                      </td>  
                                      
                                       <td style="text-align:center; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                         <?php  
											echo $habi['Tipohabitacione']['precio'];
											  $precio = $habi['Tipohabitacione']['precio'];
										 ?>
                                      </td> 
                                                                        
                                      <td style="text-align:center; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
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
                  
                  
             
 
 
 <table cellspacing="0"  style="width: 100%; font-size: 8pt; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
    <thead> 
          <tr> 
             <th class="sorting" style="font-size: 9pt;"><?php echo 'Otros cargos'; ?></th> 
          </tr> 
     </thead>                                                
 </table>
 
 
 <table cellspacing="0"  style="width: 100%; font-size: 8pt; border-top:thin #000000 solid; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                                <thead> 
                                    <tr> 
                                       
                                        <th class="sorting" style="font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Fecha'; ?></th> 
                                        <th class="sorting" style="font-size: 9pt; min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Num. Orden'; ?></th> 
                                        <th class="sorting" style="font-size: 9pt; min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Tipo de Orden'; ?></th> 
                                        <th class="sorting"  style="font-size: 9pt; min-width: 160px; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"><?php echo 'Monto'; ?></th>
                                      
										
                                    </tr> 
                                </thead> 
                                 
                     <tbody>
                          
                       <?php	foreach($OrdeneArray as $or){ ?>
                                                                                              
                         <tr class="gradeA odd"> 
                            
                                       <td style="text-align:center; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php	echo $or['Ordene']['fecha'];	?> 
                                      </td>  
                                      
                                        <td style="text-align:center; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php  echo $or['Ordene']['id'];  ?>
                                     
                                      </td> 
                                      
                                       <td style="text-align:left; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                        <?php  echo $or['Tipordene']['nombre'];  ?>
                                     
                                      </td> 
                                      
                                      <td style="text-align:center; font-size: 9pt; border:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
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
                    
         
         
         
         <table cellspacing="0" style="width: 100%; font-size: 8pt; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; font-size: 9pt; min-width: 100%;"><?php echo 'Subtotal:'; ?></th> 
                            <th class="sorting" style="font-size: 9pt; width: 11%;"><?php $subtotal = $m + $habitacion; echo '$'.$subtotal; ?></th> 
                           
						</tr>	
						
					</tbody>	
		</table>
		
		  <table cellspacing="0" style="width: 100%; font-size: 8pt; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; font-size: 9pt; min-width: 100%;"><?php echo 'Imp/tax:'; ?></th> 
                            <th style="font-size: 9pt; width: 11%;">
                             <?php $impuesto = ($montoimp + $habitacion) * 0.15;
                              echo '$'.$impuesto;  ?>
                             
                            </th> 
						</tr>	
						
					</tbody>	
		 </table>  
		
		
		 <table cellspacing="0" style="width: 100%; font-size: 8pt; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; font-size: 9pt; min-width: 100%;"><?php echo 'Intur:'; ?></th> 
                            <th style="font-size: 9pt; width: 11%;"><?php echo '$'.$intur;
                            ?></th> 
						</tr>	
						
					</tbody>	
		</table> 
		
		 <table cellspacing="0" style="width: 100%; font-size: 8pt; border-bottom:thin #000000 solid; border-left:thin #000000 solid; border-right:thin #000000 solid; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;"> 
                    <tbody>
						<tr>
							<th style="text-align:right; font-size: 9pt; min-width: 100%;"><?php echo 'Total:'; ?></th> 
                            <th style="font-size: 9pt; width: 11%;"><?php 
                            $total = $subtotal + $impuesto + $intur;
                            echo '$'.$total; 
                               
                            ?></th> 
						</tr>	
						
					</tbody>	
		</table>    			
        
                              
             
                               
               
</div>
</div></div></section>




<script type="text/php">

if ( isset($pdf) ) {

  $font = Font_Metrics::get_font("verdana");
  // If verdana isn't available, we'll use sans-serif.
  if (!isset($font)) { Font_Metrics::get_font("sans-serif"); }
  $size = 6;
  $color = array(0,0,0);
  $text_height = Font_Metrics::get_font_height($font, $size);

  $foot = $pdf->open_object();
  
  $w = $pdf->get_width();
  $h = $pdf->get_height();

  // Draw a line along the bottom
  $y = $h - 2 * $text_height - 24;
  $pdf->line(16, $y, $w - 16, $y, $color, 1);

  $y += $text_height;

  $text = "Job: 132-003";
  $pdf->text(16, $y, $text, $font, $size, $color);

  $pdf->close_object();
  $pdf->add_object($foot, "all");

  global $initials;
  $initials = $pdf->open_object();
  
  // Add an initals box
  $text = "Initials:";
  $width = Font_Metrics::get_text_width($text, $font, $size);
  $pdf->text($w - 16 - $width - 38, $y, $text, $font, $size, $color);
  $pdf->rectangle($w - 16 - 36, $y - 2, 36, $text_height + 4, array(0.5,0.5,0.5), 0.5);
    

  $pdf->close_object();
  $pdf->add_object($initials);
 
  // Mark the document as a duplicate
  $pdf->text(110, $h - 240, "DUPLICATE", Font_Metrics::get_font("verdana", "bold"),
             110, array(0.85, 0.85, 0.85), 0, 0, -52);

  $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  

  // Center the text
  $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
  $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);
  
}
</script>
</body></html>								
              
