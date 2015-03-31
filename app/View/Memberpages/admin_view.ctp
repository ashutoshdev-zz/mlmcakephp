<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">View Memberpage</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Memberpages', 'action' => 'admin_index')); ?>">Memberpages Management</a> </li>
            <li class="active">View Memberpage</li>
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
                        <label><h4>Position:</h4></label><br>
                        <?php echo h($memberpage['Memberpage']['position']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Type:</h4></label><br>
                        <?php echo h($memberpage['Memberpage']['type']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Text:</h4></label><br>
                        <?php echo h($memberpage['Memberpage']['text']); ?>
                    </div>
            </div>
        </div>
    </div>