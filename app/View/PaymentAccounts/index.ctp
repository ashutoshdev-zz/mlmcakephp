<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>My Payment Account Setting</h2>
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
                            <?php if ($usersetting == NULL) { ?>
                            <a href="<?php echo $this->Html->url(array('controller' => 'PaymentAccounts', 'action' => 'add')); ?>" data-toggle="tooltip" data-placement="top" title="Add"><span class="glyphicon glyphicon-plus" style="color:#000;">Add</span></a>
                            <?php } else { ?>
                                <div class="table-responsive"> 
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Neteller Account ID </th>
                                                <th>E-Mail</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $usersetting['PaymentAccount']['accountid']; ?></td>
                                                <td><?php echo $usersetting['PaymentAccount']['secureid']; ?></td>
                                                <td class="actions col-sm-3">
                                                    <a href="<?php echo $this->Html->url(array('controller' => 'PaymentAccounts', 'action' => 'edit', base64_encode($usersetting['PaymentAccount']['user_id']))); ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="edit1"><span class="glyphicon glyphicon-pencil">Edit</span></a>
                                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', base64_encode($usersetting['PaymentAccount']['id'])), array('data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete','class'=>'delete1'), __('Are you sure you want to delete ?')); ?>
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>

                        </div>


                    </div>
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
    .edit1 {
	-moz-box-shadow:inset 0px 1px 0px 0px #fff6af;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fff6af;
	box-shadow:inset 0px 1px 0px 0px #fff6af;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
	background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
	background-color:#ffec64;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #ffaa22;
	display:inline-block;
	cursor:pointer;
	color:#333333;
	font-family:arial;
	font-size:13px;

		padding:3px 12px;
	text-decoration:none;

}
.glyphicon{color: white;}

</style>