<div class="login-logo">
	<img width="100%" height="60px" style="height: 60px; width: 227px;" src="/img/mt-logo.png">
</div>




<div class="widget">
<div class="login-content">
  <div style="padding-bottom:0;" class="widget-content">

  
  <?php echo $this->Form->create('Usuario',array('action' => 'login', 'id' => 'slick-login')); ?>
  
  
                <h4 class="form-title">Iniciar Sesi&oacute;n</h4>
                
                <fieldset>
                    <div class="form-group no-margin">
                        <label for="email">Usuario</label>

                        <div class="input-group input-group-lg">
                                
                                    <i class="icon-user"></i>
                                
                            <?php	/*<input type="email" id="email" class="form-control input-lg" placeholder="Your Email"> */	?>
                            
                            <?php echo $this->Form->input('Usuario.username',array ('label'=>false,'placeholder'=>"Usuario", 'required'=>"required", 'class'=>'form-control input-lg') ); ?>

                            
                        </div>

                    </div>

                      <div class="form-group">
                        <label for="password">Password</label>

                        <div class="input-group input-group-lg">
                                
                                    <i class="icon-lock"></i>
                              
                           <?php	/* <input type="password" id="password" class="form-control input-lg" placeholder="Your Password">	*/	?>
                            
                             <?php echo $this->Form->input('Usuario.password',array ('label'=>false,'placeholder'=>"Password", 'required'=>"required", 'class'=>'form-control input-lg') ); ?>

                            
                        </div>

                    </div>
                    
                    <?php //echo $this->Form->end(__('Login')); ?>
                  <?php		//<a href="#" class="btn btn-primary" style="width: 100%;">Iniciar sesiÃ³n</a>     */    ?>       
                  <div class="submit"><input type="submit" value="Login" class="btn btn-primary"></div>    
 </fieldset>
                
             
            
  
  
  
  </div>
   </div>
</div>
