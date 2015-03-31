
<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Edit Memberpage</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Memberpages', 'action' => 'admin_index')); ?>">Memberpage Management</a> </li>
            <li class="active">Edit Memberpage</li>
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
            <?php echo $this->Form->create('Memberpage',array('id'=>'tab','type'=>'file')); ?>
            <div class="col-md-4">                
                    <div class="form-group"> 
                        <label>Position</label>
                          <?php echo $this->Form->select('position',array('silver'=>'silver','gold'=>'gold','platinum'=>'platinum')
                                  ,array('class'=>'form-control','empty' => '--Select position--','required'))
                          ?>

                                         
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                        <?php echo $this->Form->select('type',array('Basic Silver'=>'Basic Silver','Basic Gold'=>'Basic Gold','Basic Platinum'=>'Basic Platinum',
                                                       'Business Silver'=>'Business Silver','Business Gold'=>'Business Gold','Business Platinum'=>'Business Platinum'),
                         array('class'=>'form-control','empty' => '--Select position--','required'))
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Text</label>
                        <?php echo $this->Form->input('text',array('class'=>'form-control','type'=>'textarea'));?>
                    </div>
                   

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Update</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Memberpages', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
            </div>
             <?php echo $this->Form->end();?>
        </div>
    </div>