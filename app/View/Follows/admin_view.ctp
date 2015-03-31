<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">View Follow</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Follows', 'action' => 'admin_index')); ?>">Follows Management</a> </li>
            <li class="active">View Follow</li>
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
            <div class="col-md-4">
                    <div class="form-group">
                        <label><h4>FB:</h4></label><br>
                        <?php echo h($follow['Follow']['fb']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Twitter:</h4></label><br>
                        <?php echo h($follow['Follow']['twitter']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Google:</h4></label><br>
                        <?php echo h($follow['Follow']['google']); ?>
                    </div>                   
                    <div class="form-group">
                        <label><h4>Created:</h4></label><br>
                        <?php echo h($follow['Follow']['created']); ?>
                    </div>
            </div>
        </div>
    </div>