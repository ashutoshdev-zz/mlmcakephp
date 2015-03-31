  <?php ?> 
    <!-- ====================Container Start====================== -->
    
    <div class="con_main">
    	<div class="container">
        <?php foreach($staticCurrency as $staticc){ ?>
        	<div class="membership2">
            <h2><?php echo $staticc['Staticpage']['title'];?></h2>
            <div class="membership_box">
            <div class="row">
            <div class="col-sm-3">
             <?php echo $this->Html->image('../files/staticpage/' . $staticc['Staticpage']['image']); ?>
            </div>
            	 <div class="col-sm-9">
                <h1><?php echo $staticc['Staticpage']['title'];?></h1>
               <p style="text-align: justify;"><?php echo $staticc['Staticpage']['description'];?></p>
               
          </div>
          </div>
          </div>
          
          
            </div>
              <?php } ?>
        </div>
    </div>
    </div>