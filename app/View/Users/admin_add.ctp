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
            <li><a href="<?php echo $this->Html->url(array('controller' => 'User', 'action' => 'admin_index')); ?>">Admins Management</a> </li>
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
                <?php echo $this->Form->create('User',array('id'=>'tab','type'=>'file')); ?>
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
                        <input type="text" name="data[User][firstname]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="data[User][lastname]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="data[User][username]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="data[User][email]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="data[User][password]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone No.</label>
                        <input type='tel' pattern="[0-9]{10,10}" name="data[User][phone_no]" title="10 characters maximum" autocomplete="off"  maxlength="10" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" value="Male" name="data[User][gender]"><label>Male</label>
                        <input type="radio" value="Female" name="data[User][gender]"><label>Female</label> 
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="data[User][address]" class="form-control span12" required>                        
                    </div>                    
                    <input type="hidden" name="data[User][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[User][status]" value="1">
                    <input type="hidden" name="data[User][role]" value="Admin">
                    <input type="hidden" name="data[User][confirm]" value="1">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                    </form>
            </div>
        </div>
    </div>
