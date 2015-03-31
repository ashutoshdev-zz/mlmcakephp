
<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Edit Basicplan</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Basicplans', 'action' => 'admin_index')); ?>">Basicplan Management</a> </li>
            <li class="active">Edit Basicplan</li>
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
            <?php echo $this->Form->create('Basicplan',array('id'=>'tab','type'=>'file')); ?>
            <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('silver',array('class'=>'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('gold',array('class'=>'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('platinum',array('class'=>'form-control'));?>
                    </div>                   

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Update</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Basicplans', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
            </div>
             <?php echo $this->Form->end();?>
        </div>
    </div>