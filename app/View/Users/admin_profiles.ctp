<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Profiles Admin</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_index')); ?>">Admins Management</a> </li>
            <li class="active">Profiles Admin</li>
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
        <div class="btn-toolbar list-toolbar">
            <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_profilesedit',$admin_profiles['User']['id']));?>"><span class="btn btn-primary"><i class="fa fa-edit"></i>Admin Profiles Edit</span></a>
            <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_changepassword'));?>"><span class="btn btn-primary"><i class="fa fa-edit"></i>Change Password</span></a>
			<a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_account_setting',$admin_profiles['User']['id']));?>"><span class="btn btn-primary"><i class="fa fa-s-resize"></i>Payment Account Setting</span></a>
            <div class="btn-group">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
					<div class="form-group">
                        <label><h4>Role:</h4></label><br>
                        <?php echo h($admin_profiles['User']['role']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>First Name:</h4></label><br>
                        <?php echo h($admin_profiles['User']['fname']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Last Name:</h4></label><br>
                        <?php echo h($admin_profiles['User']['lname']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Username:</h4></label><br>
                        <?php echo h($admin_profiles['User']['username']); ?>
                    </div>
					<div class="form-group">
                        <label><h4>Sponsor Username:</h4></label><br>
                        <?php echo h($admin_profiles['User']['susername']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Email:</h4></label><br>
                        <?php echo h($admin_profiles['User']['email']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Customer Membership Type:</h4></label><br>
                        <?php echo h($admin_profiles['User']['cmt']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Customer Membership level:</h4></label><br>
                        <?php echo h($admin_profiles['User']['cml']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Country:</h4></label><br>
                        <?php echo h($admin_profiles['User']['cor']); ?>
                    </div>
					<div class="form-group">
                        <label><h4>Currency:</h4></label><br>
                        <?php echo h($admin_profiles['User']['currency']); ?>
                    </div>
					<div class="form-group">
                        <label><h4>address:</h4></label><br>
                        <?php echo h($admin_profiles['User']['address']); ?>
                    </div>
					<div class="form-group">
                        <label><h4>Phone No:</h4></label><br>
                        <?php echo h($admin_profiles['User']['phone_no']); ?>
                    </div>
					<div class="form-group">
                        <label><h4>Gender:</h4></label><br>
                        <?php echo h($admin_profiles['User']['gender']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Created:</h4></label><br>
                        <?php echo h($admin_profiles['User']['created']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Status:</h4></label><br>
                        <?php if($admin_profiles['User']['status']==1) { 
                            echo 'Active';                            
                        }else{
                            echo "Deactive";                            
                        } ?>
                    </div>
            </div>
        </div>
    </div>