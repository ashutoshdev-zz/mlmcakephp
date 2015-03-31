<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Memberpage</h1>
        <ul class="breadcrumb">
            <li class="active">Memberpage</li>
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
            <a href="<?php echo $this->Html->url(array('controller' => 'Memberpages', 'action' => 'admin_add')); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Add</span></a>
            <?php echo $this->Form->create("Memberpage", array("action" => "admin_index")); ?>
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
      <?php echo $this->Form->create('Memberpage', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="admin_check_b"><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                   <th><?php echo $this->Paginator->sort('Type'); ?></th>
                    <th><?php echo $this->Paginator->sort('Position'); ?></th>
                    <th><?php echo $this->Paginator->sort('Text'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($memberpages){
                  if(isset($memberpages)){
                foreach ($memberpages as $memberpage){ ?>
                            <tr>
                                 <td><?php echo $this->Form->checkbox("use"+$memberpage['Memberpage']['id'],array('value' => $memberpage['Memberpage']['id'],'class'=>'chechid')); ?></td>
                        <td><?php echo h($memberpage['Memberpage']['type']); ?>&nbsp;</td>
                        <td><?php echo h($memberpage['Memberpage']['position']); ?>&nbsp;</td>
                        <td><?php echo substr($memberpage['Memberpage']['text'],0,27); ?>...</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $memberpage['Memberpage']['id']), array('class' => 'view1')); ?>

                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $memberpage['Memberpage']['id']), array('class' => 'edit1')); ?>
                            <?php echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $memberpage['Memberpage']['id']), array('class' => 'delete1'), __('Are you sure you want to delete # %s?', $memberpage['Memberpage']['id'])); ?>                           
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