
<?php echo $this->Html->script(array('/admin/lib/bootstrap/js/bootstrap.min'));?>

    <ul>
        <li class="active">
            <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i>Users Management<i class="fa fa-collapse"></i>
             </a>
        </li>
        <li>
            <ul class="premium-menu nav nav-list collapse"> 
			<li><a href="<?php echo $this->Html->url('/admin/Users/user_tree/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('Business Users tree View');?>
                </a>
            </li>
<!--            <li><a href="<?php// echo $this->Html->url('/admin/Users/basic/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php //echo __('Basic Users List View');?>
                </a>
            </li>-->
              <li><a href="<?php echo $this->Html->url('/admin/Users/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('All Users List View');?>
                </a>
            </li>
            
            
           
           
                 
           </ul>
       </li>
<!--         <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i>Work Management<i class="fa fa-collapse"></i>
             </a>
         </li>-->
       
        <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Payments/');?>" class="nav-header"><i class="fa fa-fw fa-dollar"></i>
               <?php echo __('Payments Management');?>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Contacts/');?>" class="nav-header"><i class="fa fa-fw fa-mobile"></i>
               <?php echo __('Contacts Management');?>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Staticpages/');?>" class="nav-header"><i class="fa fa-fw fa-pagelines"></i>
               <?php echo __('Staticpages Management');?>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Memberpages/');?>" class="nav-header"><i class="fa fa-fw fa-pagelines"></i>
               <?php echo __('Memberpages Management');?>
            </a>
        </li>
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Newsletters/');?>" class="nav-header"><i class="fa fa-fw fa-navicon"></i>
               <?php echo __('Newsletters Management');?>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Follows/');?>" class="nav-header"><i class="fa fa-fw fa-navicon"></i>
               <?php echo __('Follows Management');?>
            </a>
        </li>
        
        
        <li>
            <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i>Management Plan<i class="fa fa-collapse"></i>
             </a>
        </li>
         <li>
            <ul class="premium-menu nav nav-list collapse1"> 
			<li><a href="<?php echo $this->Html->url('/admin/Basicplans/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('Basic Plan');?>
                </a>
            </li>
              <li><a href="<?php echo $this->Html->url('/admin/Businessplans/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('Businessplans');?>
                </a>
            </li> 
           </ul>
          </li>
        
        
        
     </ul>
