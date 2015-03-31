 <div class="con_main">
    	<div class="container">
        	<div class="contactus">
            	<h1>Contact us</h1>
                <?php $x=$this->Session->flash(); 
                if($x)
                {
                    echo $x;
                }
                else
                {
                    
                }
                
                ?>
            	<div class="contactus_top">
                	<h2>Landmark</h2>
                        <?php foreach($contacts as $contact){ ?>
                    <div class="row">
                	<div class="col-sm-4">
                    	<ul class="footer_box_about_us">
                                <li><p><i class="fa fa-map-marker"></i>Address: <?php echo $contact['Contact']['address'];?></p></li>
                                <li><p><i class="fa fa-info-circle"></i><?php echo $contact['Contact']['email'];?></p></li>
<!--                                <li><p><i class="fa fa-wechat"></i><?php //echo $contact['Contact']['skype'];?></p></li>-->
                            </ul>
                    </div>
                    <div class="col-sm-4">
                    	<ul class="footer_box_about_us">
                                <li><p><i class="fa fa-phone"></i><?php echo $contact['Contact']['phone_no'];?></p></li>
                                <li><p><i class="fa fa-fax"></i><?php echo $contact['Contact']['fax'];?></p></li>
                            </ul>
                    </div>
                    <div class="col-sm-4">
                    	<span class="map_marker"><i class="fa fa-map-marker"></i></span>
                    </div>
                </div>
                        <?php } ?>
                </div>
                <?php echo $this->Form->create(array('controller'=>'users','action'=>'contact')); ?>
                <div class="contact_form">
                <div class="row">
                    	<div class="col-sm-6">
                        <div class="row">
                        	<div class="contact_form1">
                                    <span class="col-sm-6"><input name="data[User][name]" type="text" id="name" required value="" placeholder="Name"></span>
                                    <span class="col-sm-6"><input name="data[User][email]" type="email" value=""  required id="email" placeholder="Email"></span>
                                    <span class="col-sm-12"><input name="data[User][subject]" type="text" value="" required id="subject" placeholder="Subject"></span>
                                    <span class="col-sm-12"><textarea name="data[User][msg]" cols="" rows="" required id="message" placeholder="Message..."></textarea></span>
                                <span class="col-sm-12"><input name="submit" type="submit" value="submit"></span>
                            </div>
                        </div>
                         </div>
                         <?php echo $this->Form->end(); ?>
                        <div class="col-sm-6">
                        	<div class="contact_map">
                            	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3385.150815146404!2d115.86076!3d-31.956804999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32bb29a5ec1db7%3A0xc805b6eb17146df2!2sCity+of+Perth!5e0!3m2!1sen!2sin!4v1417761508222" width="600" height="283" frameborder="0" style="border:0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
