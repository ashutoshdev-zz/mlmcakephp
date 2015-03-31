<?php echo   $this->element('banner'); ?> 
<div class="con_main">
    <div class="container">
        <div class="earn_money">
            <h1><img src="images/headding.png" alt=""></h1>
            <div class="col-sm-6">
                <?php foreach($staticCOW as $staticpage){?>
                <div class="earn_money_box">
                    <div class="col-sm-2"><?php echo $this->Html->image('../files/staticpage/' . $staticpage['Staticpage']['image']); ?></div>
                    <div class="col-sm-10"><h1><?php echo $staticpage['Staticpage']['title'];?></h1></div>
                    <p><?php echo $staticpage['Staticpage']['description'];?></p>
                    <!--<a href="<?php echo $this->Html->url("/pages/cow"); ?>">View More...</a>-->
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-6">
                <?php foreach($staticCYOL as $staticcy){?>
                <div class="earn_money_box">
                    <div class="col-sm-2"><?php echo $this->Html->image('../files/staticpage/' . $staticcy['Staticpage']['image']); ?></div>
                    <div class="col-sm-10"><h1><?php echo $staticcy['Staticpage']['title'];?></h1></div>
                    <p><?php echo $staticcy['Staticpage']['description'];?></p>
<!--                    <a href="<?php //echo $this->Html->url("/pages/cyol"); ?>">View More...</a>-->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="membership">
        <div class="container">
            <h1>choose your membership TYPE</h1>
            <div class="col-sm-6">
                <?php foreach($staticbs_HOME as $staticbn){?>
                <div class="membership_box">
                    <div class="col-sm-4"><?php echo $this->Html->image('../files/staticpage/' . $staticbn['Staticpage']['image']); ?></div>
                    <div class="col-sm-8">
                        <strong><?php echo $staticbn['Staticpage']['title'];?></strong>
                        <p><?php echo $staticbn['Staticpage']['description'];?></p>
                        <a href="<?php echo $this->Html->url('/pages/business') ;?>"><img src="images/readmore.png" alt=""></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-6">
                <?php foreach($staticBASIC_HOME as $staticbc){?>
                <div class="membership_box">
                    <div class="col-sm-4"><?php echo $this->Html->image('../files/staticpage/' . $staticbc['Staticpage']['image']); ?></div>
                    <div class="col-sm-8">
                        <strong><?php echo $staticbc['Staticpage']['title'];?></strong>
                        <p><?php echo $staticbc['Staticpage']['description'];?></p>
                        <a href="<?php echo $this->Html->url('/pages/basic') ;?>"><img src="images/readmore.png" alt=""></a>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>


    <div class="latest">
        <div class="container">
            <div class="col-sm-3">
                <div class="latest_news">

                    <div class="carousel-wrapper" id="products3">
                        <ul class="carousel-inner1 clearfix">
                          <?php foreach($staticSlider as $staticRecent){?>
                            <li class="item">
                                <h1><?php echo $staticRecent['Staticpage']['title'];?></h1>
                                <p><?php echo substr($staticRecent['Staticpage']['description'],0,250);
                                $con=strlen($staticRecent['Staticpage']['description']);
                                ?></p>
                                <?php if($con>250){?>
                                <a href="<?php echo $this->Html->url("/"); ?>" style="float: right;">Read more...</a>
                                <?php } ?>
                            </li>
                            
                          <?php } ?>
                           
                        </ul>
                        <a href="#" class="carousel-left"><i class="fa fa-angle-right"></i></a>
                        <a href="#" class="carousel-right"><i class="fa fa-angle-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <?php foreach($staticHIW as $statichw){?>
                <div class="work_box">
                    <h1><?php echo $statichw['Staticpage']['title'];?></h1>
                    <div class="work_box_inn">
                        <?php echo $this->Html->image('../files/staticpage/' . $statichw['Staticpage']['image']); ?>
                        <p style="text-align: justify;"><?php echo substr($statichw['Staticpage']['description'],0,97);?>...</p>
                        <a href="<?php echo $this->Html->url("/pages/hiw"); ?>"><img src="images/readmore.png" alt=""></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-3">
                <?php foreach($staticHCP as $statichp){?>
                <div class="work_box">
                    <h1><?php echo $statichp['Staticpage']['title'];?></h1>
                    <div class="work_box_inn">
                       <?php echo $this->Html->image('../files/staticpage/' . $statichp['Staticpage']['image']); ?>
                        <p style="text-align: justify;"><?php echo substr($statichp['Staticpage']['description'],0,97);?>...</p>
                        <a href="<?php echo $this->Html->url("/pages/wcp"); ?>"><img src="images/readmore.png" alt=""></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-3">
                <?php foreach($staticCurrency as $staticChr){?>
                <div class="work_box">
                    <h1><?php echo $staticChr['Staticpage']['title'];?></h1>
                    <div class="work_box_inn">
                        <?php echo $this->Html->image('../files/staticpage/' . $staticChr['Staticpage']['image']); ?>
                        <p style="text-align: justify;"><?php echo substr($staticChr['Staticpage']['description'],0,97);?>...</p>
                        <a href="<?php echo $this->Html->url("/pages/currency"); ?>"><img src="images/readmore.png" alt=""></a>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>
