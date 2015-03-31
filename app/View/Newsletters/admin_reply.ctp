<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Newsletter Reply</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Newsletters', 'action' => 'admin_index')); ?>">Newsletters</a> </li>
            <li class="active">Newsletter Reply</li>
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
            <div class="col-md-4">
                <?php echo $this->Form->create('Newsletter',array('id'=>'tab','type'=>'file')); ?>
                    <div class="form-group">
                        <label>Email</label>
                        
                        <input type="email" name="data[Newsletter][email]" value="<?php echo $email['Newsletter']['email'];?>" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <!--<label>Description</label>-->
                        <?php echo $this->Form->input('description', array('type' => 'textarea'));?>
                    </div>
                  
                    <input type="hidden" name="data[Newsletter][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Send</button>
                </div>
                    </form>
            </div>
        </div>
   </div>
    
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
             selector: "textarea",
             plugins : "media"

    });
    </script>