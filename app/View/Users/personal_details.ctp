<div class="con_main">
    	<div class="container">
        	<div class="profile">
            <h2>My Profile</h2>
            <?php
            $x=$this->Session->flash();
            if($x){
                echo $x;
            }?>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            <div class="profile_box">
                
            	<h1><?php echo $data['User']['fname'] ."  ".$data['User']['lname']; ?></h1>
               
                <p><span>Email:-</span><?php echo $data['User']['email']; ?></p>
                 <p><span>Username:-</span><?php echo $data['User']['username']; ?></p>
                   <p><span>Username of a Sponsor:-</span><?php echo $data['User']['username']; ?></p>
                <p><span>Country of Residence:-</span><?php echo $data['User']['cor']; ?></p>
                 <p><span>Address:-</span><?php echo $data['User']['address']; ?></p>
                  <p><span>Phone:-</span><?php echo $data['User']['phone_no']; ?></p>
                 
                <p><span>Choose Membership Type:-</span><?php echo $data['User']['cmt']; ?></p>
                <p><span>Choose Membership level:-</span><?php echo $data['User']['cml']; ?></p>
                <p><span>Currency:-</span><?php echo $data['User']['currency']; ?></p>
                 <p><span>Price:-</span><?php echo $data['User']['plan']; ?></p>
                 <p><span>Profile Created Date:-</span><?php echo $data['User']['created']; ?></p>
                 <?php 
                 $str = 'ASD';
                
                 $id= base64_encode($data['User']['id']) . "ASH".  base64_encode($str); ?>
                <a href="<?php echo $this->Html->url("/users/edit/$id"); ?>"><img src="<?php echo $this->webroot; ?>images/edit.png" alt=""></a>
                </div>
          </div>
          
          <div class="col-sm-3"></div>

            </div>
            
        </div>
    </div>
    </div>