    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="<?php echo $this->webroot; ?>">
              <span class="navbar-brand" style="height: 75px;">
                  
                  <img style="width:6%;" src=" <?php echo $this->webroot; ?>images/logo.png" alt="log">
              </span>
          </a>
        </div>
      </div>

   <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Forget password</p>
        <?php echo $this->Form->create('User'); ?>
        <div class="panel-body">
                <div>
                    <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
                    <div class="alert success">
                        <span class="icon"></span>
                        <strong></strong><?php echo $x; ?>
                    </div>
                <?php } ?>
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="text" name="data[User][email]" class="form-control span12">
                </div>
                
            <button class="btn btn-primary pull-right" name="submit">Submit</button>
              
                <div class="clearfix"></div>            
        </div>
        <?php echo $this->Form->end();?>
    </div>
   
</div>
<style type="text/css">
            .pull-right{
                width: 30%;
            }
             body{
             background-color: hsl(0, 0%, 13%) !important;   
            }
            
        </style>

