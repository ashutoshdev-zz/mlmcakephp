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
                    <div class="login_b"><h1>Join</h1></div>
                    <?php echo $this->Form->create('User', array('id' => 'UserSignupForm')); ?>
                    <div class="loign_form">
                        <p><label> First Name <i>*</i></label> <span><input type="text" value="" name="data[User][fname]"></span></p>
                        <p><label> Last Name <i>*</i></label><span><input type="text"  value="" name="data[User][lname]"></span></p>
                        <p><label>  Email<i>*</i></label><span><input type="text" value="" name="data[User][email]"></span></p>
                        <p><label> Create Username  <i>*</i></label><span><input type="text" value=""  name="data[User][username]"></span></p>

                        <p><label>  Password <i>*</i></label><span><input type="password" value="" id="pass1" name="data[User][password]" ></span></p>
                        <p><label>  Confirm Password <i>*</i></label><span><input type="password" value="" id='pass2' name="data[User][cpassword]"></span></p>
                    </div>
                    <div class="login_select_bb color_bg">
                        <label>  country of residence <i>*</i> </label>
                        <article >
                            <select data-content="" class="form-value"  name="data[User][cor]" data-label="Currency" data-groupid="9-desktop" tabindex="910">
                                <?php if ($country = " ") { ?>
                                    <option value="">Select Country</option>
                                <?php } else { ?>
                                    <option value=""><?php echo $country; ?></option>
                                <?php } ?>

                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curacao">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea South">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherlands Antilles</option>
                                <option value="Netherlands (Holland, Europe)">Netherlands </option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select> </article>
                    </div>
                    <div class="login_radio_b color_bg">
                        <section>Choose Membership Type<i>*</i> </section>
                        <article><span><input type="radio" name="data[User][cmt]" value="basic" id="basic" ></span><h6>Basic (limited pool, no commission)</h6></article>
                        <article><span><input type="radio" name="data[User][cmt]" value="business" id="business" checked></span><h6>Business (unlimited pool, earn commission)</h6></article>
                    </div>


                    <div id="suname">
                        <div class="loign_form">
                            <p><label> Sponsor's Username  <i>*</i></label><span><input type="text" value=""   name="data[User][susername]"></span>
<!--                             <a href="<?php //echo $this->Html->url('/pages/contact'); ?>"> <h6>If you do not have a sponsor's username contact us</h6></a>
                           -->
                            </p>

                            
                        </div>
                    </div>

                    <div class="login_radio_b ">
                        <section>      Choose Membership level<i>*</i> </section>
                        <article><span><input type="radio" name="data[User][cml]" value="silver" id="s" ></span><h6>Silver</h6></article>
                        <article><span><input type="radio" name="data[User][cml]" value="gold"  id="g" ></span><h6>Gold</h6></article>
                        <article><span><input type="radio" name="data[User][cml]" value="platinum" id="p" checked ></span><h6>Platinum</h6></article>
                    </div>
                    <!--                    <div class="login_select_bb color_bg">
                                            <label>    Currency <i>*</i> </label> 
                                            <article>
                                                <select data-content="" id="cur" name="data[User][currency]" class="form-value" data-label="Currency" data-groupid="9-desktop" tabindex="910">
                    
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
                    <div class="login_radio_b ">
                        <article><span><input type="checkbox" name="data[User][eighteen]" value="yes" required/></span><h6><a href="<?php echo $this->Html->url("/pages/cancelpolicy"); ?>">I agree to the terms and conditions</a></h6></article>
                    </div>

                    <div class="login_buttonn "><input type="submit" name="submit" value="submit"></div>
                    <?php echo $this->Form->end(); ?>
                </div> </div>

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
         if ($('#business').is(':checked')) {
              if($('#p').is(':checked'))
              {
                  
                    var htm = $('#platinum_bu').html();
                    $('#cst').html(htm);
               
              }       
        }
      
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