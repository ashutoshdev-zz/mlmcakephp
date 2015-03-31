
<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Edit Staticpage</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Staticpages', 'action' => 'admin_index')); ?>">Staticpage Management</a> </li>
            <li class="active">Edit Staticpage</li>
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
            <?php echo $this->Form->create('Staticpage',array('id'=>'tab','type'=>'file')); ?>
            <div class="col-md-4">                
                    <div class="form-group"> 
                          <?php echo $this->Form->select('position',array('home'=>'home','about'=>'about','banner'=>'banner','COW'=>'Chance of winning',
                                                                        'CYOL'=>'Create your own luck','BUSINESS'=>'BUSINESS','BASIC'=>'BASIC',
                                                                        'How it Work'=>'How it Work','Who can play'=>'Who can play',
                                                                        'Currency'=>'Currency','recent News'=>'Latest News','AboutUs'=>'About Us',
                                                                          'BUSINESS_HOME'=>'BUSINESS_HOME','BASIC_HOME'=>'BASIC_HOME',
                                                                        'Lotteries'=>'Lotteries','location'=>'location','cancel'=>'Cancel Policy')
                                  ,array('class'=>'form-control','empty' => '--Select position--','required'))
                          ?>

                                         
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('title',array('class'=>'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('image',array('type'=>'file'));?>      
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('description',array('class'=>'form-control','type'=>'textarea'));?>
                    </div>
                    <div class="form-group">
                      <label>Status</label><br>
                      <?php echo $this->Form->select('status',array('1'=>'Active','0'=>'Deactive'),
                       array('label'=>"",'class'=>'form-control','data-placeholder'=>'Choose a Name')); ?>
                    </div>
                    <input type="hidden" name="data[Staticpage][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                   

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Update</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Staticpages', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
            </div>
             <?php echo $this->Form->end();?>
        </div>
    </div>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
             selector: "textarea",
             plugins : "media"
    });
    </script>