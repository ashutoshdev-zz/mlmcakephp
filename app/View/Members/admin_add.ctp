<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add Admin</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_index')); ?>">Admins Management</a> </li>
            <li class="active">Add Admin</li>
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
                <?php echo $this->Form->create('Member',array('id'=>'tab','type'=>'file','controller'=>'members','action'=>'admin_add')); ?>
                    <div class="form-group">
                        <label>Role</label>
                        <?php echo $this->Form->select('role',array('Super-Admin'=>'Super-Admin','Admin'=>'Admin'),
                     array('placeholder'=>'Choose a Role','class'=>'form-control','required')); ?>
                    </div>
                    <div class="form-group">
                        <label>Parent user</label>
                        <?php
                            echo $this->Form->input("parent_id",array(
                                "options" => $users_list
                            ));
                        ?>
<!--                        <input type="text" name="data[User][pare]" class="form-control" required>-->
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="data[Member][firstname]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="data[Member][lastname]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="data[Member][username]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="data[Member][email]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="data[Member][password]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone No.</label>
                        <input type='tel' pattern="[0-9]{10,10}" name="data[Member][phone_no]" title="10 characters maximum" autocomplete="off"  maxlength="10" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" value="Male" name="data[Member][gender]"><label>Male</label>
                        <input type="radio" value="Female" name="data[Member][gender]"><label>Female</label> 
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="data[Members][address]" class="form-control span12" required>                        
                    </div>                    
                    <input type="hidden" name="data[Member][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[Member][status]" value="1">
                    <input type="hidden" name="data[Member][role]" value="Admin">
                    <input type="hidden" name="data[Member][confirm]" value="1">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                    </form>
            </div>
        </div>
    </div>
