<?php ?> 

<div class="con_main">
    	<div class="container">
        	<div class="business">
            <div class="business_box">
                 <?php foreach($staticbs as $businesstop){?>
            	<h1><?php echo $businesstop['Staticpage']['title'];?> MEMBERSHIPS</h1>
                <span><?php echo $businesstop['Staticpage']['description'];?></span>
                <?php } ?>
                <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="silver">silver</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($business_silver as $silverall){?>
                <tr>
                  <td><i class="fa fa-check"></i><?php echo $silverall['Memberpage']['text'];?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="gold">gold</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($business_gold as $goldall){?>
                <tr>
                  <td><i class="fa fa-check"></i><?php echo $goldall['Memberpage']['text'];?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="platinum">platinum</th>
                </tr>
              </thead>
              <tbody>
                 <?php foreach($business_platinum as $platinumall){?>
                <tr>
                  <td><i class="fa fa-check"></i><?php echo $platinumall['Memberpage']['text'];?></td>
                </tr>
                 <?php } ?>
              </tbody>
            </table>
            
<!--             <h3>* USD and EURO membership fees are subject to change following significant changes in the exchange rate. </h3>-->
            
          </div>
            </div>
            
        </div>
    </div>
    </div>