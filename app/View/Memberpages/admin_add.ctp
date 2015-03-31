<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add Memberpage</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Memberpages', 'action' => 'admin_index')); ?>">Memberpages Management</a> </li>
            <li class="active">Add Memberpage</li>
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
                <?php echo $this->Form->create('Memberpage',array('id'=>'tab')); ?>
                    <div class="form-group">
                        <label>Position</label>
                        <?php echo $this->Form->select('position',array('silver'=>'silver','gold'=>'gold','platinum'=>'platinum'),
                         array('class'=>'form-control','empty' => '--Select position--','required'))
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
                        <input type="text" name="data[Memberpage][text]" class="form-control span12">                        
                    </div>

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                </div>
                    </form>
            </div>
        </div>
   </div>