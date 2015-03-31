<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">View Newsletter</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Newsletters', 'action' => 'admin_index')); ?>">Newsletter Management</a> </li>
            <li class="active">View Newsletter</li>
        </ul>

    </div>
    <div class="main-content"> 
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label><h4>Email:</h4></label><br>
                        <?php echo h($newsletter['Newsletter']['email']); ?>
                    </div>
<!--                    <div class="form-group">
                        <label><h4>Description:</h4></label><br>
                        <?php //echo h($newsletter['Newsletter']['description']); ?>
                    </div>-->
                    <div class="form-group">
                        <label><h4>Created:</h4></label><br>
                        <?php echo h($newsletter['Newsletter']['created']); ?>
                    </div>
            </div>
        </div>
    </div>