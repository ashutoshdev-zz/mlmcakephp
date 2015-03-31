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
                              <?php echo $this->Form->create('PaymentAccount',array('action'=>'edit')); ?>
                            <div class="col-md-4">
                                 <div class="form-group"> 
                                     <strong>Account Id</strong>
                                <?php echo $this->Form->input('accountid',array('label'=>FALSE,'value'=>$settingpayment['PaymentAccount']['accountid'],'class'=>'form-control')); ?>                      
                                </div>
                                <div class="form-group">  
                                    <strong>Secure Id</strong>
                                   <?php echo $this->Form->input('secureid',array('label'=>FALSE,'value'=>$settingpayment['PaymentAccount']['secureid'],'class'=>'form-control')); ?>                       
                                </div>
                                 <input type="hidden" name="data[PaymentAccount][status]" value="1">
                                 <input type="hidden" name="data[PaymentAccount][id]" value="<?php echo $settingpayment['PaymentAccount']['id'] ?>">
                                <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Update</button>
                            </div>
                            
                            <?php echo $this->Form->end();?>
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
