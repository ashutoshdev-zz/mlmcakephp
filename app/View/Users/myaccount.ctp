<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>My Account</h2>
            <?php
            $x = $this->Session->flash();
            if ($x) {
                echo $x;
            }
            ?>
            <div class="account_box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="my_account">
<!--                            <h2>Play your favourite lotteries online!</h2>
                            <p>Access millions in lotto prizes online and participate in our Buy One Get One FREE offer!</p>-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="my_account_box">
                                        <h3>Personal Settings</h3>
                                        <ul>
                                            <li><a href="<?php echo $this->Html->url("/users/personal_details"); ?>">Personal Details</a></li>                  

                                            <li><a href="<?php echo $this->Html->url(array('controller' => 'PaymentAccounts', 'action' => 'index', base64_encode($loggeduser['User']['username']))); ?>">Payment Account Setting</a></li>   
                                            <li><a href='<?php echo $this->Html->url(array("controller" => "Lotteries", "action" => "index")); ?>'>My Lottery Numbers</a></li>   
                                            <li><a href="<?php echo $this->Html->url("/users/user_parent"); ?>">Contact Sponsor</a></li> 
                                            <li><a href="<?php echo $this->Html->url("/users/changepassword"); ?>">Change Password</a></li> 
                                            <?php if ($data['User']['cmt'] != 'basic') { ?>
                                                <li><a href="<?php echo $this->Html->url("/users/user_sponsor"); ?>">Genealogy/Downline </a></li>   

                                            <?php } ?>
<!--                                            <li><a href="<?php //echo $this->Html->url("/Newsletters/index"); ?>">Newsletter</a></li>   -->
                                            <li><a href="<?php echo $this->Html->url("/members/choose_membership_level/" . base64_encode($loggeduser['User']['id'])); ?>">Upgrade Membership</a></li>
                                            <?php if ($data['User']['cmt'] != 'basic') { ?>
                                            <li><a href="<?php echo $this->Html->url("/groupemails/email"); ?>">Group Email</a></li>  
                                            <?php } ?>
                                            <li><a href="<?php echo $this->Html->url("/pages/cancelpolicy"); ?>">Terms and Conditions</a></li>  
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="my_account_box">
                                        <h3>History</h3>
                                        <ul>
                                            <li><a href="<?php echo $this->Html->url("/wins/index"); ?>">Wins</a></li> 
                                            <li><a href="<?php echo $this->Html->url("/commisions/index"); ?>">Commision</a></li> 
                                            <?php if (!empty($lott_data)) { ?>
                                                <li><a href="<?php echo $this->Html->url("/Lotteryresults/index"); ?>">Lottery Results</a></li> 
                                            <?php } ?>

                                            <li><a href="<?php echo $this->Html->url("/users/paymentdetails"); ?>">Payment Details</a></li>   

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="account_info">
                            <h3>Account Info</h3>
                            <p><?php echo $loggeduser['User']['fname'] . "  " . $loggeduser['User']['lname']; ?></p>
                            <div class="balance">
                                <?php
                            echo $this->Form->create('users');
                          
                           echo "<div class='doller_cur'>Balance:   </div><div class='doller_cur1'>$";
                          
                           
                            if(!empty($wallet['Wallet']['ammount'])){
                                echo $wallet['Wallet']['ammount'];
                               
                            }
                            else{
                                echo "0.00";
                            }
                                           
                            echo "</div>";
                            echo $this->Form->end(array('label' => 'Don\'t PayMe','value'=>'Don\'t PayMe','id'=>'dntp')); 
                            ?></div>
                            
                        </div>
                    </div>
                    <div class="col-sm-4" id="dntmsg" style="display: none;">
                        <div class="account_info">
                           
                            <p>You will get paid automatically by the company!</p>
                            
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
<script type="text/javascript">
    $('#dntp').on("click",function(e){
e.preventDefault();
$('#dntmsg').toggle();

});
    </script>