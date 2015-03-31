<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>NewsLetter</h2>
            <?php
            $x = $this->Session->flash();
            if ($x) {
                echo $x;
            }
            ?>
            <div class="account_box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="my_account">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Newsletter Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($data) { ?>
                                            <tr>
                                                <td><?php echo $data['Newsletter']['email']; ?></td>

                                                <td class="actions col-sm-3">

                                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $data['Newsletter']['id']), array('class' => 'delete1','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete'), __('Are you sure you want to delete ?')); ?>
                                                    <?php if ($data['Newsletter']['confirm'] == '0') { ?>
                                                        <?php echo $this->Html->link(__('ReConfirm'), array('action' => 'reconfirm', $data['Newsletter']['id']), array('class' => 'view1','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'ReConfirm')); ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>




                        </div>


                    </div>
                    <div class="col-sm-4">
                        <div class="account_info">
                            <h3>Subscribe News Letter</h3>
                            <?php echo $this->Form->create('Newsletter', array('controller' => 'Newsletters', 'action' => 'news', 'onsubmit' => 'return valid()')); ?>
                            <p><input type="email" name="data[Newsletter][email]" class="newsletter" id="nws" placeholder="<?php echo __('Email Address'); ?>" >
                                <button type="submit" name="submit" class="subscribe"><?php echo __('Subscribe'); ?></button>
                            </p>
                            <?php echo $this->Form->end(); ?>
                            <?php echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js')); ?>
                            <script type="text/javascript">
                                function valid()
                                {
                                    if (document.getElementById('nws').value == "")
                                    {
                                        alert("Please Enter Your E-mail Address!");
                                        document.getElementById('nws').focus();
                                        return false;

                                    }
                                    return true;

                                }


                            </script>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<style>
    .view1 {
        -moz-box-shadow:inset 0px 1px 0px 0px #54a3f7;
        -webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
        box-shadow:inset 0px 1px 0px 0px #54a3f7;
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #007dc1), color-stop(1, #0061a7));
        background:-moz-linear-gradient(top, #007dc1 5%, #0061a7 100%);
        background:-webkit-linear-gradient(top, #007dc1 5%, #0061a7 100%);
        background:-o-linear-gradient(top, #007dc1 5%, #0061a7 100%);
        background:-ms-linear-gradient(top, #007dc1 5%, #0061a7 100%);
        background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#007dc1', endColorstr='#0061a7',GradientType=0);
        background-color:#007dc1;
        -moz-border-radius:3px;
        -webkit-border-radius:3px;
        border-radius:3px;
        border:1px solid #124d77;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:arial;
        font-size:13px;
        padding:3px 12px;
        text-decoration:none;
        text-shadow:0px 1px 0px #154682;
    }

    .delete1 {
        -moz-box-shadow:inset 0px 1px 0px 0px #f5978e;
        -webkit-box-shadow:inset 0px 1px 0px 0px #f5978e;
        box-shadow:inset 0px 1px 0px 0px #f5978e;
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f));
        background:-moz-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        background:-webkit-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        background:-o-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        background:-ms-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f',GradientType=0);
        background-color:#f24537;
        -moz-border-radius:3px;
        -webkit-border-radius:3px;
        border-radius:3px;
        border:1px solid #d02718;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:arial;
        font-size:13px;

        padding:3px 12px;
        text-decoration:none;

    }

</style>