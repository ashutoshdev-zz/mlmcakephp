<div class="footer_main">
    <div class="container">
        <div class="footer">
            <div class="col-sm-3">
            <?php foreach($staticabout as $staticpage){?>
                <div class="footer_box">
                    <h1><?php echo $staticpage['Staticpage']['title'];?></h1>
                    <p><?php echo substr($staticpage['Staticpage']['description'],0,330);?>...</p>
                    <a href="<?php echo $this->Html->url("/pages/about"); ?>">Read more...</a>
                </div>
                <?php } ?>
            </div>

            <div class="col-sm-3">
                <div class="footer_box">
                    <h1>Services</h1>
                    <ul>
                        <li><a href="<?php echo $this->Html->url('/pages/about'); ?>"><i class="fa fa-angle-double-right"></i> About us</a></li>                  
                        <li><a href="<?php echo $this->Html->url('/pages/membership'); ?>"><i class="fa fa-angle-double-right"></i>Memberships</a></li>                    
                        <li><a href="<?php echo $this->Html->url('/pages/contact'); ?>"><i class="fa fa-angle-double-right"></i>contact  Us</a></li>                   

                    </ul>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="followus">
                    <h1>Follow Us</h1>
                
                    <ul> 
                        <?php foreach($media as $mediaSol) { ?>
                        <li><a href="<?php echo $mediaSol['Follow']['fb'];?>" target="_blank"><i class="fa fa-facebook"></i>Follow us facebook </a></li>    
                        <li><a href="<?php echo $mediaSol['Follow']['twitter'];?>" target="_blank"><i class="fa fa-tumblr"></i>Follow us twitter </a></li>                   
                        <li><a href="<?php echo $mediaSol['Follow']['google'];?>" target="_blank"><i class="fa fa-google-plus"></i>Follow us google+</a></li>                         
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="footer_box">
                    <h1>Location</h1>
                    <ul>
                        <?php foreach($locat as $location) { ?>
                        <li><?php echo $location['Staticpage']['description'];?></li> 
                        <?php } ?>
                    </ul>
                    <div class="footer_map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3385.150815146404!2d115.86076!3d-31.956804999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32bb29a5ec1db7%3A0xc805b6eb17146df2!2sCity+of+Perth!5e0!3m2!1sen!2sin!4v1417761508222" width="600" height="450" frameborder="0" style="border:0"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright">
        Copyright Millionaires lotto club 2014. All rights reserved.
    </div>
</div>
