<?php ?>

<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>My Payment Account Setting Edit</h2>
             <?php
            $x = $this->Session->flash();
            if ($x) {
                echo $x;
            }
            ?>
            <div class="account_box">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="my_account">
                              <?php echo $this->Form->create('PaymentAccount',array('action'=>'add')); ?>
                            <div class="col-md-4">
                                 <div class="form-group"> 
                                     <strong>Neteller Secure ID</strong>
                                     <input type="text" name="data[PaymentAccount][accountid]" class="form-control" required>
                                </div>
                                <div class="form-group">  
                                    <strong>E-mail</strong>
                                   <input type="text" name="data[PaymentAccount][secureid]" class="form-control" required>
                                </div>
                                 <input type="hidden" name="data[PaymentAccount][status]" value="1">
                                <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Save</button>
                            </div>
                            
                            <?php echo $this->Form->end();?>
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
