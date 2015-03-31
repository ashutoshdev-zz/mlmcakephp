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
   <div class="login_b"><h1>Forget password</h1></div>
   <div class="loign_form">
     <?php echo $this->Form->create('User');   ?>
       <p><label>  Email  <i>*</i></label><span> <input type="email" name="data[User][email]" required ></span></p>
       
      </div>
      
   <div class="login_buttonn "><input type="submit" name="submit" value="Submit"></div>
    <?php $this->Form->end(); ?>
     </div> </div>
   
   <div class="col-sm-3"></div>
   

   </div></div>
     </div><!--page inn end-->


