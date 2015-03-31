<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Businessplans</h1>
        <ul class="breadcrumb">
            <li class="active">Businessplan</li>
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
            <!--<a href="<?php //echo $this->Html->url(array('controller' => 'Staticpages', 'action' => 'admin_add')); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Add</span></a>-->
            <?php echo $this->Form->create("Businessplan", array("action" => "admin_index")); ?>
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
      <?php echo $this->Form->create('Businessplan', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="admin_check_b"><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>                    
                    <th><?php echo $this->Paginator->sort('silver'); ?></th>
                    <th><?php echo $this->Paginator->sort('gold'); ?></th>
                    <th><?php echo $this->Paginator->sort('platinum'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($businessplans){
                if(isset($businessplans)){
                foreach ($businessplans as $businessplan){ ?>
                            <tr>
                                 <td><?php echo $this->Form->checkbox("use"+$businessplan['Businessplan']['id'],array('value' => $businessplan['Businessplan']['id'],'class'=>'chechid')); ?></td>                                 
                                <td><?php echo h($businessplan['Businessplan']['silver']); ?>&nbsp;</td>
                                <td><?php echo h($businessplan['Businessplan']['gold']); ?>&nbsp;</td>
                                <td><?php echo h($businessplan['Businessplan']['platinum']); ?>&nbsp;</td>
                                <td class="actions">                                    
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $businessplan['Businessplan']['id']), array('class' => 'edit1')); ?>                                   
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