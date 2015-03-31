<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


		<!-- Here goes the content. -->
		<section id="content" class="container_12 clearfix" data-sort=true>
			<h1 class="grid_12">Form Elements</h1>
                        <div class="grid_12">
                                <?php $x=$this->Session->flash(); ?>
                                <?php if($x){ ?>
                                <div class="alert success">
                                    <span class="icon"></span>
                                <strong>Success!</strong><?php echo $x; ?>
                                </div>
                                <?php } ?>
                        </div>
			<?php echo $this->Form->create('Banner',array('class'=>'grid_12','type'=>'file'));?>
				<fieldset>
					<legend>Input Fields</legend>
					<div class="row">
						<label for="f2_select2">
							<strong>Select Position</strong>
						</label>
						<div>
                                                    <?php echo $this->Form->select('position',array('Logo'=>'Logo','Footer'=>'Footer'),
                                                               array('label'=>"",'id'=>'f2_select2','data-placeholder'=>'Choose a Name')); ?>
						</div>
					</div>
					
					<div class="row">
						<label for="f1_normal_input">
							<strong>Title</strong>
						</label>
						<div>
                                                        <?php echo $this->Form->input('title',array('label'=>'','id'=>'f1_normal_input','style'=>'width:98%'));?>
						</div>
					</div>
                                        <div class="row not-on-phone">
						<label for="f6_file">
							<strong>Upload</strong>
						</label>
						<div>
							<input type="file" id=f6_file name=data[Banner][image] />
						</div>
					</div>
                                        <div class="row not-on-phone">
						<label for="f1_wysiwyg">
							<strong>Description</strong>
						</label>
						<div>
							<textarea class="editor" name="data[Banner][description]" id="f1_wysiwyg" ><?php echo $description['Banner']['description'];?></textarea>
                                                        
             					</div>
					</div>
                                        <div class="row">
						<label for="f2_select2">
							<strong>Status</strong>
							<small></small>
						</label>
						<div>
                                                       <?php echo $this->Form->select('status',array('1'=>'Active','0'=>'Deactive'),
                                                               array('label'=>"",'id'=>'f2_select1','data-placeholder'=>'Choose a Name')); ?>
						</div>
					</div>
					<div class="actions">
						<div class="left">
							<input action="action" type="reset" onclick="history.go(-1);" value="Cancel" class="" />
						</div>
						<div class="right">
							<input type="submit" value="Save" name="submit" />
						</div>
                                       </div>
					
				</fieldset><!-- End of fieldset -->
				
                          <?php echo $this->Form->end();?>
			
			
			
		</section><!-- End of #content -->
		
	
<?php echo $this->element('admin_footer'); ?>