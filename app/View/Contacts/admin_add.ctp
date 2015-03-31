<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add Contacts</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Contacts', 'action' => 'admin_index')); ?>">Contacts Management</a> </li>
            <li class="active">Add Contacts</li>
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
                <?php echo $this->Form->create('Contact',array('id'=>'tab','type'=>'file')); ?>                
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="data[Contact][address]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="data[Contact][email]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Skype Id</label>
                        <input type="text" name="data[Contact][skype]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone No.</label>
                        <input type="text" name="data[Contact][phone_no]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Fax No.</label>
                        <input type="text" name="data[Contact][fax]" class="form-control" required>
                    </div>                    
                    <input type="hidden" name="data[Contact][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[Contact][status]" value="1">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Contacts', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                    </form>
            </div>
        </div>
    </div>
