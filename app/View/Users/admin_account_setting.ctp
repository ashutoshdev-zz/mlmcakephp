<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Account Setting</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_index')); ?>">Admins Management</a> </li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_profiles')); ?>">Admin Profiles</a> </li>
            <li class="active">Admin Account Setting</li>
        </ul>

    </div>
    <div class="main-content"> 
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong></strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="row">
              <?php echo $this->Form->create('PaymentAccount',array('id'=>'tab','type'=>'file')); ?>
            <div class="col-md-4">
                    <div class="form-group">
                        <label><h4>Account ID</h4></label><br>
                        <?php echo $this->Form->input('accountid',array('label'=>FALSE,'value'=>$setting['PaymentAccount']['accountid'],'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Secure ID:</h4></label><br>
                        <?php echo $this->Form->input('secureid',array('label'=>FALSE,'value'=>$setting['PaymentAccount']['secureid'],'class'=>'form-control')); ?>
                    </div>
                 <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Update</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'PaymentAccounts', 'action' => 'admin_profiles')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>  
            </div>
             <?php echo $this->Form->end();?>
        </div>
    </div>