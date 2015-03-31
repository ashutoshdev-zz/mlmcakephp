<?php
error_reporting(0);
$cmt=$data['User']['cmt'];
$cml=$data['User']['cml'];
?>   
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
                    <div class="login_b"><h1>Renew/Upgrade MemberShips</h1></div>
                    <?php echo $this->Form->create('Memeber', array('id' => 'member')); ?>
                         <div class="login_radio_b color_bg">
                        <section>Choose Membership Type<i>*</i> </section>
                        <?php if ($cmt=="basic")  {
                            ?>
                        <article><span><input type="radio" name="data[Memeber][cmt]" value="basic" id="basic" checked></span><h6>Basic (limited pool, no commission)</h6></article>
                        <article><span><input type="radio" name="data[Memeber][cmt]" value="business" id="business" ></span><h6>Business (unlimited pool, earn commission)</h6></article>
                    
                        <?php } else if($cmt=="business") 
                        {
                            ?>
                        <article><span><input type="radio" name="data[Memeber][cmt]" value="business" id="business" checked ></span><h6>Business (unlimited pool, earn commission)</h6></article>
                    
                        <?php }?>
                      
                        </div>

                    <div class="login_radio_b ">
                        <section>      Choose Membership level<i>*</i> </section>
                        <?php if($cml=="silver") {
                            ?>
                        <article><span><input type="radio" name="data[Memeber][cml]" value="silver" id="s" checked></span><h6>Silver</h6></article>
                        <article><span><input type="radio" name="data[Memeber][cml]" value="gold"  id="g" ></span><h6>Gold</h6></article>
                        <article><span><input type="radio" name="data[Memeber][cml]" value="platinum" id="p"  ></span><h6>Platinum</h6></article>
                        <?php } else if($cml=="gold")  {
                            ?>
                        <article><span><input type="radio" name="data[Memeber][cml]" value="gold"  id="g" checked></span><h6>Gold</h6></article>
                        <article><span><input type="radio" name="data[Memeber][cml]" value="platinum" id="p"  ></span><h6>Platinum</h6></article>
                       
                        <?php } elseif ($cml=="platinum") {
                            ?>
                        <article><span><input type="radio" name="data[Memeber][cml]" value="platinum" id="p" checked ></span><h6>Platinum</h6></article>
                        <?php }?>
                     
                        
                   
                    </div>
<!--                    <div class="login_select_bb color_bg">
                        <label>    Currency <i>*</i> </label> 
                        <article>
                            <select data-content="" id="cur" name="data[Memeber][currency]" class="form-value" data-label="Currency" data-groupid="9-desktop" tabindex="910">

                                <option value="" selected="selected">Select Currency</option>

                                <option value="USD">USD</option>
                                <option value="EURO">EURO</option>
                            </select>
                        </article>
                    </div>-->
                    <div class="login_select_bb color_bg">
                        <label>    Cost <i>*</i> </label> 
                        <article>
                            <div id="cst"></div>
                        </article>
                    </div>
                    <!--<input type="hidden" name="data[Member][status]" value="1">-->
                    
                    <div class="login_buttonn "><input type="submit" name="submit" value="submit"></div>
                    <?php echo $this->Form->end(); ?>
                </div> 
            </div>

            <div class="col-sm-3"></div>
        </div></div>
</div><!--page inn end-->

<div style="display:none;">

    <div> Basic</div>
    <?php
    foreach ($basicp as $bscp) {
        ?>

        <div id="silver_b">$<?php echo $bscp['Basicplan']['silver']; ?> per 4 week period</div>
        <div id="gold_b">$<?php echo $bscp['Basicplan']['gold']; ?> per 4 week period</div>
        <div id="platinum_b">$<?php echo $bscp['Basicplan']['platinum']; ?> per 4 week period</div>
    <?php } ?>
    <div> Business</div>
    <?php
    foreach ($businessp as $bsnp) {
        ?>
        <div id="silver_bu">$<?php echo $bsnp['Businessplan']['silver']; ?> per 4 week period</div>
        <div id="gold_bu">$<?php echo $bsnp['Businessplan']['gold']; ?> per 4 week period</div>
        <div id="platinum_bu">$<?php echo $bsnp['Businessplan']['platinum']; ?> per 4 week period</div>
    <?php } ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#basic').off("click").on("click", function() {
           
                if ($('#s').is(':checked')) {
                    var htm = $('#silver_b').html();
                    $('#cst').html(htm);
                }
                else if ($('#g').is(':checked')) {
                    var htm = $('#gold_b').html();
                    $('#cst').html(htm);

                }
                else if ($('#p').is(':checked')) {
                    var htm = $('#platinum_b').html();
                    $('#cst').html(htm);

                }
        });
        $('#business').off("click").on("click", function() {
            
                if ($('#s').is(':checked')) {
                    var htm = $('#silver_bu').html();
                    $('#cst').html(htm);
                }
                else if ($('#g').is(':checked')) {
                    var htm = $('#gold_bu').html();
                    $('#cst').html(htm);

                }
                else if ($('#p').is(':checked')) {
                    var htm = $('#platinum_bu').html();
                    $('#cst').html(htm);

                }

        });
          $('#s').off("click").on("click", function() {
            if ($('#basic').is(':checked')) {
                    var htm = $('#silver_b').html();
                    $('#cst').html(htm);
                }
                else if ($('#business').is(':checked')) {
                     var htm = $('#silver_bu').html();
                    $('#cst').html(htm);

                } 
         
    
    });
    $('#g').off("click").on("click", function() {
            if ($('#basic').is(':checked')) {
                    var htm = $('#gold_b').html();
                    $('#cst').html(htm);
                }
                else if ($('#business').is(':checked')) {
                     var htm = $('#gold_bu').html();
                    $('#cst').html(htm);

                } 
         
    
    });
    $('#p').off("click").on("click", function() {
            if ($('#basic').is(':checked')) {
                    var htm = $('#platinum_b').html();
                    $('#cst').html(htm);
                }
                else if ($('#business').is(':checked')) {
                     var htm = $('#platinum_bu').html();
                    $('#cst').html(htm);

                } 
         
    
    });
         if ($('#basic').is(':checked')) {
              if($('#s').is(':checked'))
              {
                  
                    var htm = $('#silver_b').html();
                    $('#cst').html(htm);
               
              }  
               if($('#g').is(':checked'))
              {
                  
                    var htm = $('#gold_b').html();
                    $('#cst').html(htm);
               
              }  
              if($('#p').is(':checked'))
              {
                  
                    var htm = $('#platinum_b').html();
                    $('#cst').html(htm);
               
              } 
        }
         if ($('#business').is(':checked')) {
              if($('#s').is(':checked'))
              {
                  
                    var htm = $('#silver_bu').html();
                    $('#cst').html(htm);
               
              }  
               if($('#g').is(':checked'))
              {
                  
                    var htm = $('#gold_bu').html();
                    $('#cst').html(htm);
               
              }  
              if($('#p').is(':checked'))
              {
                  
                    var htm = $('#platinum_bu').html();
                    $('#cst').html(htm);
               
              } 
        }
      
    });


    
 $(document).ready(function() {
                $("#member").validate({
                    errorElement: 'span',
                    rules: {
                         "data[Memeber][currency]": "required"
                    },       
                        
                    messages: {
                       
                        "data[Memeber][currency]": "Please enter your currency"
                                      
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