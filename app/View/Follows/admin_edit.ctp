
<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Edit Follow</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url('/admin/Follows/'); ?>">Follows Management</a> </li>
            <li class="active">Edit Follow</li>
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
            <?php echo $this->Form->create('Follow',array('id'=>'tab')); ?>
            <div class="col-md-4">
                    <div class="form-group">                        
                        <?php echo $this->Form->input('fb',array('class'=>'form-control'));?>                        
                    </div>
                    <div class="form-group">                        
                        <?php echo $this->Form->input('twitter',array('class'=>'form-control'));?>                        
                    </div>
                     <div class="form-group">                        
                        <?php echo $this->Form->input('google',array('class'=>'form-control'));?>                        
                    </div>
                    <input type="hidden" name="data[Follow][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Update</button>
                    <a href="<?php echo $this->Html->url('/admin/Follows/'); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
            </div>
             <?php echo $this->Form->end();?>
        </div>
    </div>
</div>