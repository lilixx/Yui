 <!-- INICIA CONTENIDO -->

   <?php echo $this->Html->css('component'); ?>
         
     
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
            <h2> Reservaciones Del Día</h2>
         
          
          <?php	foreach($ReservacionesArray as $re){ 
              if($re['Reservacione']['activo'] == 1){  ?> 
            <a href="/Eventos/eventoviewall/<?php echo $re['Reservacione']['id'] ?>"> <?php echo $re['Reservacione']['fechaentrada']; echo '  '; echo'Cliente: '; echo $re['Cliente']['nombres']; ?><br/> </a> <?php } ?>
          <?php } ?>
         
               
        </div>
        <div class="col-md-8">
          
                 
				<ul id="og-grid" class="og-grid">
				
				
					<li>
						<a href="#" data-largesrc="images/huespedes.png" data-title="Huéspedes" data-description="&lt;ul&gt;&lt;li&gt;&lt;a href=&#34;#&#34;&gt;&lt;span class=&#34;glyphicon glyphicon-search&#34;&gt;&lt;/span&gt;&nbsp;&nbsp;Buscar huéspedes&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&#34;#&#34;&gt;&lt;span class=&#34;glyphicon glyphicon-plus&#34;&gt;&lt;/span&gt;&nbsp;&nbsp;Agregar huéspedes&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;">
							<?php	echo $this->Html->image("huespedes.png"); ?>
						</a>
					</li>
				
					
					<li>
						<a href="#" data-largesrc="images/habitaciones.png" data-title="Habitaciones" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<?php	echo $this->Html->image("habitaciones.png"); ?>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="images/folios.png" data-title="Folios" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<?php	echo $this->Html->image("folios.png"); ?>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="images/reservaciones.png" data-title="Reservaciones" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
						<?php	echo $this->Html->image("reservaciones.png"); ?>	
						</a>
					</li>
				</ul>
			
		
				
				
		  </li>
		  </ul>
       </div>
      </div>
      
