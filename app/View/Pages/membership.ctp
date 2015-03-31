<?php ?>  
    <!-- ====================Container Start====================== -->
        <div class="con_main">
    	<div class="container">
        	<div class="membership2">
            <h2>choose your membership TYPE</h2>
            <div class="membership_box">
                <?php foreach($staticbs as $staticbn){?>
            <div class="row">
            <div class="col-sm-3"><?php echo $this->Html->image('../files/staticpage/' . $staticbn['Staticpage']['image']); ?></div>
            	 <div class="col-sm-9">
                <h1><?php echo $staticbn['Staticpage']['title'];?></h1>
               	<p><?php echo $staticbn['Staticpage']['description'];?></p>
                <a href="<?php echo $this->Html->url('/pages/business'); ?>"><img src="<?php echo $this->webroot; ?>images/readmore.png" alt=""></a>
          </div>
          </div>
                <?php } ?>
          </div>
          <div class="membership_box">
              <?php foreach($staticBASIC as $staticbc){?>
<div class="row">
<div class="col-sm-3"><?php echo $this->Html->image('../files/staticpage/' . $staticbc['Staticpage']['image']); ?></div>
            	 <div class="col-sm-9">
            	<h1><?php echo $staticbc['Staticpage']['title'];?></h1>
               	<p><?php echo $staticbc['Staticpage']['description'];?></p>
                <a href="<?php echo $this->Html->url('/pages/basic'); ?>"><img src="<?php echo $this->webroot; ?>images/readmore.png" alt=""></a>
          </div>
          </div>
              <?php } ?>
</div>
<!--          <div class="about_box" style="border-bottom:none;">
            <div class="row">
                <div class="col-sm-12">
            	<h2>Cancellation policy</h2>
                <p>To make things easier for you, your monthly membership fees will automatically be deducted from any earnings/winnings before transfer to your eWallet. However, should you wish to cancel your membership, please notify us by email at least 2 week before the end of the 4 week period, and we will cancel your membership, a membership fee will not be deducted from any final payments in this case. ​</p>
            </div>
            </div>
        </div>-->
                      </div>
                </div>
    </div>
    </div>