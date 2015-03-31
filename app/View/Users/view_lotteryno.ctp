<?php
error_reporting(0);
$cml = $udata['User']['cml'];
$role = $udata['User']['role'];
?>
<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>Lottery</h2>
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
                                       
                                            <?php 
                                         if($lotterydata['Lottery']['status']==0)
                                         {
                                             ?>
                                         <h3>Lottery Settings</h3>
                                        <ul>
                                        <?php 
                                              if ($cml == 'silver') {
                                                ?>
                                                <li><a href="<?php echo $this->Html->url("/lotteries/usmegamillion"); ?>">U.S. Mega Millions+MB</a></li> 
                                            <?php } else if ($cml == 'gold') { ?>
                                                <li><a href="<?php echo $this->Html->url("/lotteries/usmegamillion"); ?>">U.S. Mega Millions+MB</a></li> 
                                                <li><a href="<?php echo $this->Html->url("/lotteries/euromillion"); ?>">EuroMillions(France)+STARS</a></li>

                                            <?php } else if ($cml == 'platinum' || $role = "Admin") { ?>
                                                <li><a href="<?php echo $this->Html->url("/lotteries/usmegamillion"); ?>">U.S. Mega Millions+MB</a></li> 
                                                <li><a href="<?php echo $this->Html->url("/lotteries/euromillion"); ?>">EuroMillions(France)+STARS</a></li>
                                                <li><a href="<?php echo $this->Html->url("/lotteries/powerball"); ?>">U.S. Powerball+PB</a></li>
                                            <?php } } ?>



                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="account_info">
                            <h3>My lottery No</h3>
                            <?php if ($cml == 'silver') {
                                ?>
                                   <p>U.S. Mega Millions:<span><?php
                                $usm = unserialize($lotterydata['Lottery']['usmegamellion']);
                                $count = 0;
                                foreach ($usm as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($usm)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>MB:<span><?php 
                                 $usp =  unserialize($lotterydata['Lottery']['usmegapowerball']);
                                 foreach ($usp as $val) {
                                  echo $val;
                                  
                                }
                                
                               
                                
                                
                                ?></span></p>
                            <?php } else if ($cml == 'gold') { ?>
                                
                                  <p>U.S. Mega Millions:<span><?php
                                $usm = unserialize($lotterydata['Lottery']['usmegamellion']);
                                $count = 0;
                                foreach ($usm as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($usm)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>MB:<span><?php 
                                 $usp =  unserialize($lotterydata['Lottery']['usmegapowerball']);
                                 foreach ($usp as $val) {
                                  echo $val;
                                  
                                }
                                
                               
                                
                                
                                ?></span></p>
                                
                                <p>EuroMillions(France):<span><?php
                                $ero = unserialize($lotterydata['Lottery']['euromillion']);
                                $count = 0;
                                foreach ($ero as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($ero)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>STARS:<span><?php
                                $europb = unserialize($lotterydata['Lottery']['europb']);
                                $count = 0;
                                foreach ($europb as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($europb)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>Raffle:<span><?php
                                $raffle = unserialize($lotterydata['Lottery']['raffle']);
                                $count = 0;
                                foreach ($raffle as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($raffle)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                            <?php } 
                            else if ($cml == 'platinum' || $role = "Admin") 
        { ?>
                                <p>U.S. Mega Millions:<span><?php
                                $usm = unserialize($lotterydata['Lottery']['usmegamellion']);
                                $count = 0;
                                foreach ($usm as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($usm)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>MB:<span><?php 
                                 $usp =  unserialize($lotterydata['Lottery']['usmegapowerball']);
                                 foreach ($usp as $val) {
                                  echo $val;
                                  
                                }
                                
                               
                                
                                
                                ?></span></p>
                                <p>EuroMillions(France):<span><?php
                                $ero = unserialize($lotterydata['Lottery']['euromillion']);
                                $count = 0;
                                foreach ($ero as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($ero)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>STARS:<span><?php
                                $europb = unserialize($lotterydata['Lottery']['europb']);
                                $count = 0;
                                foreach ($europb as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($europb)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>Raffle:<span><?php
                                $raffle = unserialize($lotterydata['Lottery']['raffle']);
                                $count = 0;
                                foreach ($raffle as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($raffle)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>  
                                <p>U.S. Powerball:<span><?php
                                $uspb = unserialize($lotterydata['Lottery']['uspb']);
                                $count = 0;
                                foreach ($uspb as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($uspb)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>
                                <p>PB:<span><?php
                                $pb = unserialize($lotterydata['Lottery']['pb']);
                                $count = 0;
                                foreach ($pb as $val) {
                                    $count++;
                                    echo $val;
                                    if($count<count($pb)) {
                                        echo ",";
                                    }
                                }
                                ?></span></p>


<?php } ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

</div>
</div>
</div>
