<div class="con_main">
    <div class="container">
        <div class="page_inn"><!--page inn start-->
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="login_box_m">
                    <?php
                    $x = $this->Session->flash();
                    if ($x) {
                        echo $x;
                    }
                    ?>
                    <div class="login_b"><h1>Renew/Upgrade MemberShip</h1></div>
                    <?php echo $this->Form->create('Memeber', array('id' => 'member')); ?>
                    <div class="loign_form">
                        <p><label>  Username<i>*</i></label><span><input type="text" value="" name="data[Memeber][username]"></span></p>
                        <p><label>  Email  <i>*</i></label><span><input type="text" value=""  name="data[Memeber][email]"></span></p>
                    </div>
                    <div class="login_buttonn "><input type="submit" name="submit" value="submit"></div>
                    <?php echo $this->Form->end(); ?>
                </div> 
            </div>

            <div class="col-sm-3"></div>
        </div></div>
</div><!--page inn end-->


<script type="text/javascript">

    $(document).ready(function() {
        $("#member").validate({
            errorElement: 'span',
            rules: {
                "data[Memeber][username]": "required",
                "data[Memeber][email]": {
                    required: true,
                    email: true,
         }
            },
            messages: {
                "data[Memeber][username]": "Please enter your Username",
                "data[Memeber][email]": {
                    required: "Please enter your E-mail ID",
                    email: "Please enter Valid E-mail ID",
                }

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });


</script>


<style>

    div#cst {
        width: 100%;
        float: left;
        color: green;
        font-size: 17px;
    }

</style>