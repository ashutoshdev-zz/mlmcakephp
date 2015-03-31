<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>Terms and Conditions</h2>
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
                            
                            <p><?php printf($cancel[0]['Staticpage']['description']); ?></p>



                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

