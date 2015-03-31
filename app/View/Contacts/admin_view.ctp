<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">View Contact</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Contacts', 'action' => 'admin_index')); ?>">Contacts Management</a> </li>
            <li class="active">View Contact</li>
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
                        <label><h4>S.No. :</h4></label><br>
                        <?php echo h($contact['Contact']['id']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Name:</h4></label><br>
                        <?php echo h($contact['Contact']['address']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Email:</h4></label><br>
                        <?php echo h($contact['Contact']['email']); ?>
                    </div>                   
                    <div class="form-group">
                        <label><h4>Skype:</h4></label><br>
                        <?php echo h($contact['Contact']['skype']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Phone No:</h4></label><br>
                        <?php echo h($contact['Contact']['phone_no']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Status:</h4></label><br>
                        <?php if($contact['Contact']['status']==1) { 
                            echo 'Active';                            
                        }else{
                            echo "Deactive";                            
                        } ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Created:</h4></label><br>
                        <?php echo h($contact['Contact']['created']); ?>
                    </div>
            </div>
        </div>
    </div>