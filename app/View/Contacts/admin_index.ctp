<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Contacts</h1>
        <ul class="breadcrumb">
            <li class="active">Contacts</li>
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
            <!--<a href="<?php //echo $this->Html->url(array('controller' => 'Contacts', 'action' => 'admin_add')); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Add</span></a>-->
            <?php echo $this->Form->create("Contact", array("action" => "admin_index")); ?>
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
      <?php echo $this->Form->create('Contact', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="admin_check_b"><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
	            <th><?php echo $this->Paginator->sort('email'); ?></th>
		    <th><?php echo $this->Paginator->sort('Skype'); ?></th>
		    <th><?php echo $this->Paginator->sort('phone No'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('Status'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($contacts){
                if(isset($contacts)){
                foreach ($contacts as $contact){ ?>
                            <tr>
                                <td><?php echo $this->Form->checkbox("use" + $contact['Contact']['id'], array('value' => $contact['Contact']['id'], 'class' => 'chechid')); ?></td>
                                
                                <td><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
                                <td><?php echo h($contact['Contact']['skype']); ?>&nbsp;</td>
                                <td><?php echo $contact['Contact']['phone_no']; ?>&nbsp;</td>
                                <td><?php echo substr($contact['Contact']['created'],0,10); ?>&nbsp;</td>
                                <td><?php if ($contact['Contact']['status'] == '0') { ?>
                                    <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $contact['Contact']['id']), array('escape' => false, 'class' => 'archive_12'));
                                    ?></span><?php } else { ?>
                                        <?php echo $this->Form->postLink('Active', array('action' => 'block', $contact['Contact']['id']), array('escape' => false, 'class' => 'archive_12'));
                                        ?></span> <?php } ?>&nbsp;
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id']), array('class' => 'view1')); ?>
                                   
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id']), array('class' => 'edit1')); ?>
                                    <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), array('class' => 'delete1'), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>
                                    <?php
                                    if ($contact['Contact']['status'] == 0) {
                                        echo $this->Form->postLink(('Activate'), array('Controller' => 'Users', 'action' => 'admin_activate', $contact['Contact']['id']), array('escape' => false, 'class' => 'active1', 'title' => 'Active'));
                                    } else {
                                        echo $this->Form->postLink(('Block'), array('controller' => 'Users', 'action' => 'admin_deactivate', $contact['Contact']['id']), array('escape' => false, 'class' => 'deactive1', 'title' => 'Block'));
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

