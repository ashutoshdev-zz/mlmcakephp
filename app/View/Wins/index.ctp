<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>Commisions</h2>
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
                                            <th>Doller Win</th>
                                             <th>Euro Win</th>
                                             <th>Date</th>
                                            <th>Action</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($commisions) {
                                            foreach ($commisions as $commision) {
                                                ?>
                                                <tr>

                                                    <td><?php echo $commision['Win']['amt']; ?></td>
                                                     <td><?php echo $commision['Win']['euroamt']; ?></td>
                                                     <td><?php echo $commision['Win']['created']; ?></td>
                                                    <td><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $commision['Win']['id']), array('class' => 'delete1','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete'), __('Are you sure you want to delete ?')); ?></td>
                                                </tr>
                                            </tbody>
                                            <?php } } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php //echo $this->element('account'); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
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