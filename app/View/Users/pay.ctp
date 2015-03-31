<div class="con_main">
    <div class="container">

        <div class="page_inn"><!--page inn start-->

            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="login_box_m">
                    <?php
                    $x = $this->Session->flash();
                    if ($x) {
                        echo $x;
                    }
                    ?>
                    <div class="login_b"><h1>NETELLER</h1></div>
                    <div class="loign_form">
                        <?php echo $this->Form->create('User',array('Controller'=>'Users','action'=>'neteller_payment')); ?>
                        <p><label>  E-mail ID/Account ID:  <i>*</i></label><span><input type="text" name="data[User][email]" required /></span></p>
                        <p><label>  Secure ID <i>*</i></label><span><input type="password" name="data[User][sid]" required /></span></p>
                        <input type="hidden" name="data[User][uid]" value="<?php echo $uid; ?>" />
                    </div>

                   <div class="login_buttonn "><input type="submit" name="submit" value="Pay Now"></div>
                    <?php $this->Form->end(); ?>
                </div> </div>

            <div class="col-sm-3"></div>
         
            
        </div></div>
</div><!--page inn end-->
