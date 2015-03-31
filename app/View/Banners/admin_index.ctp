<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

    <section id="content" class="container_12 clearfix" data-sort=true>
            <h1 class="grid_12">Banner Tables</h1>
            <div class="grid_12">
                    <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
            </div>
            <div class="grid_12">
                <?php  echo $this->Form->create('Banner',array("action" => "deleteall",'id' => 'mbc')); ?>
                    <div class="box">
                            <div class="header">
                                    <h2>Banners</h2>
                            </div>
                            <div class="content">
                                    <div class="tabletools">
                                            <div class="left">
                                                    <a class="open-add-client-dialog" href="<?php echo $this->Html->url(array('controller'=>'banners','action'=>'add'));?>"
                                                        <i class="icon-plus"></i>Add New</a>
                                            </div>
                                            <!--<div class="right"></div>-->
                                    </div>
                                    <table class="dynamic styled with-prev-next" data-table-tools='{"display":true}'>
                                            <thead>
                                                    <tr>
                                                            <!--<th><input type="checkbox" onchange="$(this).parents('table').find(':checkbox').attr('checked', $(this).attr('checked') || false)"></th>-->
                                                            <th class="center"><input type="checkbox" onchange="$(this).parents('table').find(':checkbox').attr('checked', $(this).attr('checked') || false)" /></th>
                                                            <th>Position</th>
                                                            <th>Title</th>
                                                            <th>Image</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($banners as $banner){?>
                                                    <tr>
                                                            <td  class="center"><?php echo $this->Form->checkbox("adsimage"+$banner['Banner']['id'],
                            array('value' => $banner['Banner']['id'],'id'=>'f4_cb_dis')); ?>
                 </td>
                                                            <td class="center"><?php echo $banner['Banner']['position'];?></td>
                                                            <td class="center"><?php echo $banner['Banner']['title'] ;?></td>
                                                            <td class="center">
                                                            <?php echo $this->Html->image('../files/bannerimage/'.$banner['Banner']['image']
                                                                  ,array('alt'=>'Banner Image','height'=>'70px','width'=>'100px')); ?>
                                                            </td>
                                                            <td class="center">   
                                                                    <form> </form>
                                                                   <?php if ($banner['Banner']['status']=='0'){?>	
                                                                   <span class="tipzy" title="Block">
                                                                         <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $banner['Banner']['id']),
                                                                                 array('escape'=>false));?></span><?php }else { ?>
                                                                   <span class="tipzy" title="Unblock">
                                                                         <?php echo $this->Form->postLink('Active', array('action' => 'block', $banner['Banner']['id']),
                                                                                 array('escape'=>false)); ?></span> <?php }?>
                                                            </td>
                                                            <td class="center">
                                                                    <a href="<?php echo $this->Html->url(array('controller'=>'Banners','action'=>'edit',$banner['Banner']['id']));?>" class="button small grey tooltip" data-gravity=s title="Edit"><i class="icon-pencil"></i></a>
                                                                    <a href="<?php echo $this->Html->url(array('controller'=>'Banners','action'=>'view',$banner['Banner']['id']));?>" class="button small grey tooltip" data-gravity=s title="View"><i class="icon-eye-open"></i></a>
                                                                    <?php echo $this->Form->postLink('<i class="icon-remove"></i>',array('controller'=>'Banners','action'=>'delete',$banner['Banner']['id']),array('escape'=>false,'title'=>'Delete', "class"=>"button small grey tooltip", "data-gravity"=>"s", "title"=>"Delete"));?>
                                                            </td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                    </table>

                            </div><!-- End of .content -->

                    </div><!-- End of .box -->
                    <button onclick="$('#mbc').submit();" value="Delete" class="badge block red" style="margin-left:20px"> Delete </button>
                    <button class="badge block green" style="margin-left:40px" name="delete" value="Activate" onclick="$('#mbc').attr({'action':'banners/activateall'}); $('#mbc').submit();">Active</button>
                    <button class="badge block orange" style="margin-left:40px" name="delete" value="Deactivate" onclick="$('#mbc').attr({'action':'banners/inactivateall'});$('#mbc').submit();">Deactive</button>
                    <?php echo $this->Form->end();?>
                </div>
        </section>
<?php echo $this->element('admin_footer');?>
	
