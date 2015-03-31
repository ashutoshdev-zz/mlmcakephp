<?php echo $this->element('header'); ?>    
    <!--******************************************************content_starts**************************************-->
        
    <div class="contact_main">
        <div style="margin-top: 0%;text-align: center;font-size: 28px;width: 69%;margin-left: 15.555%;margin-bottom: 10px">
        <?php $x = $this->Session->flash(); ?>
        <?php if ($x) { ?>
            <div id="toast-container" class="toast-top-right">
            <div class="toast toast-danger" id="flash" style="background-color: rgb(0, 135, 209); opacity: 1;color: red;">
                <div class="toast-title"></div>
                <div class="toast-message"><?php echo $x; ?></div>
            </div>
        </div>
            <?php } ?>
        </div>
    	  <div class="container">
            <div class="row">
            	<div class="col-sm-6">
                	<div class="contact">
                    	<h3>Contact us</h3>
                        <?php echo $this->Form->create('Contact');?>
                        <div class="contact_inn">
                         <input type="text" placeholder="Name" name="data[Contact][name]" class="form-control-one" required="required">
                         <input type="email" placeholder="Email" name="data[Contact][email]" class="form-control-one" required="required">
                         <input type="text" placeholder="Subject" name="data[Contact][subject]" class="form-control-one" required="required">
                         <textarea rows="3" name="data[Contact][message]" class="form-control-one" required="required"></textarea>                         
                          <div class="submit">
                              <button class="btn_one" name="submit" type="submit">Submit</button>
                          </div>                          
                       </div>
                    <?php echo $this->Form->end();?>
                        
                    </div>
                </div>
                
            <div class="col-sm-6">
            	<div class="contact_one">
                	<h3>Get in Touch</h3>
                    <div class="contact_inn_one">
                    	<ul>
                            <li><span class="glyphicon glyphicon-home home"></span><p>Lorem Ipsum is a dummy text.</p></li>
                            <li><span class="glyphicon glyphicon-envelope envelope"></span><p>Email@compname.com</p></li>
                            <li><span class="glyphicon glyphicon-earphone earphone"></span><p>+1 800 450 6935, +1 800 450 6940</p></li> 
                        </ul>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
        </div>

    
    
    
    <!--******************************************************content_end**************************************-->
    <?php echo $this->element('footer_top'); ?>
    <?php echo $this->element('footer_bottom'); ?>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#flash').fadeOut(4500);

        });
    </script>  
    <style>        
.submit {
    float: left;
    margin: 3% 0 0;
    width: 100%;
}
    </style>