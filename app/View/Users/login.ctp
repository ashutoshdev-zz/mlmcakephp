     <div class="con_main">
     	<div class="container">
        
          <div class="page_inn"><!--page inn start-->
        
        <div class="col-sm-3"></div>
     <div class="col-sm-6">
     <div class="login_box_m">
         <?php $x=$this->Session->flash(); 
           if($x)
           {
               echo $x;
           }
                  
         ?>
   <div class="login_b"><h1>Login</h1></div>
   <div class="loign_form">
     <?php echo $this->Form->create('User');   ?>
       <p><label>  Username  <i>*</i></label><span><input type="text" name="data[User][username]" required></span></p>
       <p><label>  Password <i>*</i></label><span><input type="password" name="data[User][password]" required ></span></p>
      </div>
      
   <div class="login_buttonn "><input type="submit" name="submit" value="Submit"></div>
   <div class="login_buttonn "><a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'forgetpwd'));?>">Forgot your password?</a>
<!--    <br/>  <a href="<?php echo $this->html->url(array('controller' => 'Members', 'action' => 'index')); ?>">Upgrade MemberShip</a>-->
   </div>
     <?php $this->Form->end(); ?>
     </div> </div>
   
   <div class="col-sm-3"></div>
   

   </div></div>
     </div><!--page inn end-->
