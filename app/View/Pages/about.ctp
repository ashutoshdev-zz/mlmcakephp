<?php ?>
<div class="con_main">
    	<div class="container">
        	<div class="about_us">
              <?php foreach($staticabout as $about){ ?>
            <div class="about_box">
            	<h1>Welcome</h1>
                <p><?php echo $about['Staticpage']['description'];?></p>
            </div>
              <?php } ?>
                    
            
            <div class="about_box">
                <?php foreach($staticHIW as $statichw){?>
            <div class="row">
            	<div class="col-sm-3">
                	<div class="about_box_img">
                            <?php echo $this->Html->image('../files/staticpage/' . $statichw['Staticpage']['image']); ?>
                        </div>
                </div>
                <div class="col-sm-9">
            	<h2><?php echo $statichw['Staticpage']['title'];?></h2>
                <?php echo $statichw['Staticpage']['description'];?>
<!--           <a href="<?php //echo $this->Html->url("/pages/hiw"); ?>">View More...</a>-->
                </div>
            </div>
                <?php } ?>
        </div>
        
        <div class="about_box">
            <?php foreach($staticHCP as $statichp){?>
            <div class="row">
            	<div class="col-sm-3">
                	<div class="about_box_img">
                            <?php echo $this->Html->image('../files/staticpage/' . $statichp['Staticpage']['image']); ?>
                        </div>
                </div>
                <div class="col-sm-9">
            	<h2><?php echo $statichp['Staticpage']['title']; ?></h2>
                <p> <?php echo $statichp['Staticpage']['description']; ?></p>
<!--           <a href="<?php //echo $this->Html->url("/pages/wcp"); ?>">View More...</a>-->
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="about_box">
            <?php foreach($staticCurrency as $staticChr){?>
            <div class="row">
            	<div class="col-sm-3">
                	<div class="about_box_img"><?php echo $this->Html->image('../files/staticpage/' . $staticChr['Staticpage']['image']); ?></div>
                </div>
                <div class="col-sm-9">
            	<h2><?php echo $staticChr['Staticpage']['title'];?></h2>
               <?php echo $staticChr['Staticpage']['description'];?>
<!--             <a href="<?php //echo $this->Html->url("/pages/currency"); ?>">View More...</a>-->
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="about_box" style="border-bottom:none;">
            <?php foreach($staticLo as $statictt){?>
            <div class="row">
            	<div class="col-sm-3">
                	<div class="about_box_img"><?php echo $this->Html->image('../files/staticpage/' . $statictt['Staticpage']['image']); ?></div>
                </div>
                <div class="col-sm-9">
            	<h2><?php echo $statictt['Staticpage']['title'];?></h2>
              <?php echo $statictt['Staticpage']['description'];?>
<!--                 <a href="<?php //echo $this->Html->url("/pages/lottery"); ?>">View More...</a>-->
            </div>
            </div>
            <?php } ?>
        </div>
        
        <!--<div class="about_box" style="border-bottom:none;">
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
    
    

