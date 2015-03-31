<?php
error_reporting(0);
$cml = $loggeduser['User']['cml'];
$role = $loggeduser['User']['role'];
?>
<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>Lottery Result</h2>
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
                                                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="my_account_box">
                                        <h3>Latest Powerball Results Online</h3>

                                        <div class="account_info">
                                            <h3><?php echo $optval['txt']; ?></h3>
                                            <p>Powerball:<span><?php
                                                    $count = 0;
                                                    foreach ($dataus as $val) {
                                                        $count++;
                                                        echo $val;
                                                        if ($count < count($dataus)) {
                                                            echo ",";
                                                        }
                                                    }
                                                    ?></span></p>
                                            <p>PB:<span>
                                                    <?php
                                                    $count = 0;
                                                    foreach ($datauspb as $val) {
                                                         $count++;
                                                        echo $val;
                                                         if ($count < count($datauspb)) {
                                                            echo ",";
                                                        }
                                                    }
                                                    ?>
                                                </span></p>
<!--                                            <p>MEGAPLIER:<span>
                                            <?php
//                                                    foreach ($multiple as $val) {
//                                                        echo $val;
//                                                    }
                                            ?>
                                                </span></p>-->

                                            <h3>Result</h3>

                                            <p>Payout per Winner:<div class="ppw">
                                                <?php
                                                if (!empty($win_data['win_data']['Finalwinner']['win'])) {
                                                    echo $win_data['win_data']['Finalwinner']['win'];
                                                } else {
                                                   echo  "<div class='divPaddingFormatter'>No winner</div>"; 
                                                   
                                                }
                                                ?>
                                                </span></div>
<!--                                                <p>MEGAPLIER-Payout per Winner:<span>
                                            <?php
//                                                    if($win_data['win_data']['Finalwinner']['mwin']) {
//                                                       echo $win_data['win_data']['Finalwinner']['mwin'];
//                                                    }else{
//                                                        echo "No winner";
//                                                    }
                                            ?>
                                                </span></p>
                                            -->


                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">   
                                    <div class="data_grab">
                                        <h3>U.S. - Powerball Prize Breakdown</h3>

                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>

                                                        <th>Divisions</th>
                                                        <th>Match</th>
                                                        <th>Payout per Winner</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($jsondata as $jsnd) {
                                                        ?>
                                                        <tr>
                                                            <td>  <?php echo $jsnd->DivisionToDisplay; ?> </td>
                                                            <td>    <?php echo $jsnd->GuessCountToDisplay; ?> </td>
                                                            <td>  <?php echo $jsnd->LocalWinningAmountToDisplay; ?> </td>
        <!--                                                    <td>   <?php //echo $jsnd->LocalWinningAmountMultiplyToDisplay;   ?> </td>-->
                                                        </tr>
                                                    <?php } ?>           





                                                </tbody>
                                            </table>
                                        </div>

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
                                            if ($count < count($usm)) {
                                                echo ",";
                                            }
                                        }
                                        ?></span></p>
                                <p>MB:<span><?php
                                        $usp = unserialize($lotterydata['Lottery']['usmegapowerball']);
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
                                            if ($count < count($usm)) {
                                                echo ",";
                                            }
                                        }
                                        ?></span></p>
                                <p>MB:<span><?php
                                        $usp = unserialize($lotterydata['Lottery']['usmegapowerball']);
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
                                            if ($count < count($ero)) {
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
                                            if ($count < count($europb)) {
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
                                            if ($count < count($raffle)) {
                                                echo ",";
                                            }
                                        }
                                        ?></span></p>
                                <?php
                            } else if ($cml == 'platinum' || $role = "Admin") {
                                ?>
                                <p>U.S. Mega Millions:<span><?php
                                        $usm = unserialize($lotterydata['Lottery']['usmegamellion']);
                                        $count = 0;
                                        foreach ($usm as $val) {
                                            $count++;
                                            echo $val;
                                            if ($count < count($usm)) {
                                                echo ",";
                                            }
                                        }
                                        ?></span></p>
                                <p>MB:<span><?php
                                        $usp = unserialize($lotterydata['Lottery']['usmegapowerball']);
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
                                            if ($count < count($ero)) {
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
                                            if ($count < count($europb)) {
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
                                            if ($count < count($raffle)) {
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
                                            if ($count < count($uspb)) {
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
                                            if ($count < count($pb)) {
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
