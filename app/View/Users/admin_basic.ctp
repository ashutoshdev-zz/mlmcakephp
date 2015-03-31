<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Basic Users View</h1>
        <ul class="breadcrumb">
            <li class="active">Basic Users View</li>
        </ul>

    </div>

    <div class="main-content">
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">
            <!--<a href="<?php //echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_add')); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Add</span></a>-->
            <?php echo $this->Form->create("User", array("action" => "admin_basic")); ?>
            <div class="search_username">
                <button type="submit" class="search_button1" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php if (@$keyword) {
                echo $keyword;
            } ?>" placeholder="Search Here !!!" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div>
      <?php echo $this->Form->create('User', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="admin_check_b"><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                    <th><?php echo $this->Paginator->sort('Username'); ?></th>
                    <th><?php echo $this->Paginator->sort('Email'); ?></th>
                    <th><?php echo $this->Paginator->sort('Membership Type'); ?></th>
                    <th><?php echo $this->Paginator->sort('Created'); ?></th>
                    <th><?php echo $this->Paginator->sort('Status'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($basics) {
                    if (isset($basics)) {
                        foreach ($basics as $user) {
                            ?>
                            <tr>
                                <td><?php echo $this->Form->checkbox("use" + $user['User']['id'], array('value' => $user['User']['id'], 'class' => 'chechid')); ?></td>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['cmt']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                                <td><?php if ($user['User']['status'] == '0') { ?>
                                    <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $user['User']['id']), array('escape' => false, 'class' => 'archive_12'));
                                    ?></span><?php } else { ?>
                                        <?php echo $this->Form->postLink('Active', array('action' => 'block', $user['User']['id']), array('escape' => false, 'class' => 'archive_12'));
                                        ?></span> <?php } ?>&nbsp;
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class' => 'view1')); ?>
                                     <?php echo $this->Html->link(__('Reply'), array('action' => 'reply/'.$user['User']['id']), array('class' => 'edit1')); ?>
                                    <?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'edit1')); ?>
                                    <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'delete1'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                                    <?php
                                    if ($user['User']['status'] == 0) {
                                        echo $this->Form->postLink(('Activate'), array('Controller' => 'Users', 'action' => 'admin_activate', $user['User']['id']), array('escape' => false, 'class' => 'active1', 'title' => 'Active'));
                                    } else {
                                        echo $this->Form->postLink(('Block'), array('controller' => 'Users', 'action' => 'admin_deactivate', $user['User']['id']), array('escape' => false, 'class' => 'deactive1', 'title' => 'Block'));
                                    }
                                    ?>
                                </td>
                            </tr>
                 <?php } } } else { { ?> 
                <p class="not_found">NOT FOUND</p>
                 <?php } } ?>
            </tbody>
        </table>
            <?php echo $this->Form->end(); ?>
        <ul class="paginator_Admin">
            <div class="first_button1"><?php echo $this->Paginator->prev('Previous ', null, null, array('class' => 'disabled')); ?></div>
                                       <?php echo $this->Paginator->numbers(); ?>
            <div class="first_button1"><?php echo $this->Paginator->next(' Next ', null, null, array('class' => 'disabled')); ?></div>
        </ul>
    </div>

</div>
<style type="text/css">
    .search_username{margin-top: 0%;}
</style>



