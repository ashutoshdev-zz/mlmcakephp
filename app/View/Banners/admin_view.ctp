<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<!-- Here goes the content. -->
<section id="content" class="container_12 clearfix" data-sort=true>		
			<h1 class="grid_12 margin-top no-margin-top-phone"><span>View Banner </span></h1>
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
				
                                    <?php echo $this->Form->create('Banner',array('class'=>"box validate",'type'=>'file')); ?>
				
					<div class="header">
						<h2>View Banner
                                                <a href="<?php echo $this->Html->url(array('action'=>'index'));?>" style="float: right">
                                                        Back
                                                    </a>
                                                </h2>
					</div>
					<div class="content">
                                                <div class="row">
							<label for="f8_mi_date" style="width: 81px;">
								<strong style="text-align: center;">Ad by</strong>
							</label>
							<div style="margin-left: 96px;">
                                                            <span style="margin-top: 20px;float: left">
                                                                <?php echo ($banner['User']['first_name']." ".$banner['User']['last_name']); ?>
                                                            </span>
							</div>
						</div>
						 <div class="row">
							<label for="f8_mi_date" style="width: 81px;">
								<strong style="text-align: center;">Position</strong>
							</label>
							<div style="margin-left: 96px;">
                                                            <span style="margin-top: 20px;float: left">
                                                                <?php echo ($banner['Banner']['position']); ?>
                                                            </span>
							</div>
					       </div>
						<div class="row">
							<label for="f8_mi_date" style="width: 81px;">
								<strong style="text-align: center;">Title</strong>
							</label>
							<div style="margin-left: 96px;">
                                                            <span style="margin-top: 20px;float: left">
                                                                <?php echo ($banner['Banner']['title']); ?>
                                                            </span>
							</div>
						</div>
						<div class="row">
							<label for="f8_mi_date" style="width: 81px;">
								<strong style="text-align: center;">Image:</strong>
							</label>
							<div style="margin-left: 96px;">
                                                            <span style="margin-top: 20px;float: left">
                                                                <?php echo $this->Html->image('../files/bannerimage/'.$banner['Banner']['image'],
                                                                        array('alt'=>'Banner Image','style'=>'height:150px;')); ?>
                                                            </span>
							</div>
						</div>
                                               <div class="row">
							<label for="f8_mi_date" style="width: 81px;">
								<strong style="text-align: center;">Description:</strong>
							</label>
							<div style="margin-left: 96px;">
                                                            <span style="margin-top: 20px;float: left">
                                                                <?php echo h($banner['Banner']['description']); ?>
                                                            </span>
							</div>
						</div>
					        <div class="row">
							<label for="f8_mi_date" style="width: 81px;">
								<strong style="text-align: center;">Status</strong>
							</label>
							<div style="margin-left: 96px;">
                                                             <span style="margin-top: 20px;float: left">
                                                                 <?php  if($banner['Banner']['status']==1) { echo 'Active';}else{echo "Deactive";} ?>
                                                             </span>
							</div>
						</div>
					        <div class="row">
							<label for="f8_mi_date" style="width: 81px;">
								<strong style="text-align: center;">Add Date</strong>
							</label>
							<div style="margin-left: 96px;">
                                                             <span style="margin-top: 20px;float: left">
                                                                 <?php echo ($banner['Banner']['created']); ?>
                                                             </span>
							</div>
						</div>
                                        </div>
				</form>
			</div>
</section>

<?php echo $this->element('admin_footer'); ?>
