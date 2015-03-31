<?php ?>

<header>
    <div class="top_header">
        <div class="container">
            <div class="col-md-6"><p>PLAY THE LOTTERY <span>FOR FREE!</span><strong>MILLIONAIRES LOTTO CLUB</strong></p></div>
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <div class="followus"><p>Follow us</p>
                <?php foreach($media as $mediaSol) { ?>
                    <a href="<?php echo $mediaSol['Follow']['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo $mediaSol['Follow']['twitter'];?>" target="_blank"><i class="fa fa-tumblr"></i></a>
                    <a href="<?php echo $mediaSol['Follow']['google'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div> 
    </div>
    <div class="header_med">
        <div class="container">
            <div class="col-md-2"><div class="logo"><a href="<?php echo $this->webroot; ?>"><img src="<?php echo $this->webroot; ?>images/logo.png" alt="" title="Logo"/></a></div></div>
            <div class="col-md-2"></div>
            <div class="col-md-5"><p>PLAY THE LOTTERY <span>FOR FREE!</span></p></div>

            <!--=================================================================================================================================
            ===================================================================================================================================
            =========================================================Pankaj 18-12-2014=======================================================-->   

            <div class="col-sm-12 col-md-3">
                <div class="login">
                    <?php
                    if ($loggeduser) {
                        ?>
                        <li><a href="<?php echo $this->Html->url('/users/myaccount'); ?>"><button data-target=".bs-example-modal-md"  class="btn btn-primary" type="button"><i class="fa fa-lock"></i>My account</button></a></li>



                    <?php } else {
                        ?>
                        <button data-target=".bs-example-modal-md" data-toggle="modal" class="btn btn-primary" type="button"><i class="fa fa-lock"></i>Register</button>
                    <?php } ?>
                    <div aria-hidden="true" aria-labelledby="myLargeModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal-md" style="display: none;">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content" style="background:#f8f8f8;">
                                <?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'join', 'id' => 'register')); ?>
                                <div class="login_b" style="border-bottom:none; margin-bottom:20px;"><h1>Join</h1></div>
                                <div class="form-group">
                                    <label class="login_label" for="InputName">First name <i>*</i></label>
                                    <div class="input-group">
                                        <input type="text"  value="" id="InputNamefirst" name="data[User][fname]" class="form-control"/>
                                        <!--<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="login_label" for="InputEmail">Last name <i>*</i></label>
                                    <div class="input-group">
                                        <input type="text"  value="" name="data[User][lname]" id="InputNamelast" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="login_label" for="InputEmail">Email <i>*</i></label>
                                    <div class="input-group">
                                        <input type="text"  value="" name="data[User][email]" id="InputEmail" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="login_label" for="InputEmail">Create Username <i>*</i></label>
                                    <div class="input-group">
                                        <input type="text"  value="" name="data[User][username]" id="Inputusername" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="login_label" for="InputEmail"> Password <i>*</i></label>
                                    <div class="input-group">
                                        <input type="password"   name="data[User][password]" id="pass3" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="login_label" for="InputEmail">Confirm Password <i>*</i></label>
                                    <div class="input-group">
                                        <input type="password"   name="data[User][cpassword]"  id="pass4" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="login_label" for="InputEmail"> country of residence <i>*</i></label>
                                    <div class="input-group">
                                        <article >
                                            <select data-content="" class="form-value" data-label="Currency" name="data[User][cor]" data-groupid="9-desktop" tabindex="910">
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
                                                <option value="Netherlands (Holland, Europe)">Netherlands</option>
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
                                    </div></div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="login_label" for="InputEmail">Choose Membership Type <i>*</i></label>
                                        <div class="input-group">
                                            <article>
                                                <span><input type="radio" name="data[User][cmt]" value="basic" id="basich"/></span>
                                                <h6>Basic (limited pool, no commission)</h6>
                                            </article>
                                            <article>
                                                <span><input type="radio" name="data[User][cmt]" value="business" id="businessh" checked /></span>
                                                <h6>Business (unlimited pool, earn commission)</h6>
                                            </article>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="login_label" for="InputEmail">Choose Membership level <i>*</i></label>
                                        <div class="input-group">
                                            <article><span><input type="radio" name="data[User][cml]" value="silver" id="sh" ></span><h6>Silver</h6></article>
                                            <article><span><input type="radio" name="data[User][cml]" value="gold" id="gh" ></span><h6>Gold</h6></article>
                                            <article><span><input type="radio" name="data[User][cml]" value="platinum" id="ph" checked></span><h6>Platinum</h6></article>

                                        </div>
                                    </div>
                                </div>


                                <div id="sunamea">
                                    <div class="form-group">
                                        <label class="login_label" for="InputEmail">Sponsor's Username <i>*</i></label>
                                        <div class="input-group">
                                            <input type="text"  value="" name="data[User][susername]" id="Inputsusername" class="form-control"/>
                                        </div>
                                         <!--<a href="<?php //echo $this->Html->url('/pages/contact'); ?>"> <h6> If you do not have a sponsor's username contact us</h6></a>-->
                                    </div>

                                </div>

<!--                                <div class="form-group">
                                    <label for="InputEmail">Currency *</label>
                                    <div class="input-group">
                                        <article>
                                            <select data-content="" id="curh" class="form-value" name="data[User][currency]" data-label="Currency" data-groupid="9-desktop" tabindex="910">

                                                <option value="" selected="selected">Select Currency</option>
                                                <option value="USD">USD</option>
                                                <option value="EURO">EURO</option>
                                            </select>
                                        </article>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="InputEmail">Cost</label>
                                    <div class="input-group">
                                        <article>
                                            <div id="csth"></div>
                                        </article>
                                    </div>
                                </div>
                                <div class="login_radio_b " style="border:none;">
                                    <article><span><input type="checkbox" name="data[User][eighteen]" value="yes" required/></span><h6><a href="<?php echo $this->Html->url("/pages/cancelpolicy"); ?>">I agree to the terms and conditions</a></h6></article>
                                </div>

                                <input type="submit" class="btn submit_btn" value="Submit" id="submit" name="submit"/>&nbsp;
                                <input type="reset" class="btn reset_btn" value="Reset" name="reset" id="submit"/>

                                <?php echo $this->Form->end(); ?>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="login">
                    <?php
                    if ($loggeduser) {
                        ?>
                        <li><a href="<?php echo $this->Html->url('/users/logout'); ?>"> <button data-target=".bs-example-modal-sm"  class="btn btn-primary" type="button"><i class="fa fa-sign-out"></i> logout </button></a></li>



                    <?php } else {
                        ?>
                        <button data-target=".bs-example-modal-sm" data-toggle="modal" class="btn btn-primary" type="button"><i class="fa fa-sign-out"></i> Login </button>
                    <?php } ?>


                    <div aria-hidden="true" aria-labelledby="mySmallModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" style="display: none;">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="panel-body" style="padding-top:15px; background:#f8f8f8; border-radius:8px;">
                                    <div class="alert alert-danger col-sm-12" id="login-alert" style="display:none"></div>
                                    <?php
                                    $x = $this->Session->flash();
                                    if ($x) {
                                        echo $x;
                                    }
                                    ?>

                                    <?php echo $this->Form->create('User', array('controller' => 'User', 'action' => 'login'), array('class' => 'form-horizontal', 'id' => 'loginform')); ?>
									<div class="login_box" style="margin-bottom:15px;"><h1>Login</h1></div>

                                    <div class="input-group" style="margin-bottom: 25px">
                                        <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                                        <label class="login_label">Username <i>*</i></label>
                                        <input type="text" placeholder="" value="" name="data[User][username]" class="form-control" id="login-username" required>                                        
                                    </div>

                                    <div class="input-group" style="margin-bottom: 25px">
                                        <!--<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>-->
                                        <label class="login_label">Password <i>*</i></label>
                                        <input type="password" placeholder="" name="data[User][password]" class="form-control" id="login-password" required>
                                    </div>



                                    <div class="input-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="1" name="remember_me" id="login-remember"> Remember me
                                            </label>
                                        </div>
                                        <div class="form-group" style="margin-top:10px">
                                        <!-- Button -->

                                        <div class="controls">
                                            <input type="submit" class="btn btn-success" id="btn-login" name="submit" value="SUBMIT"/>
                                            <!--                                                      <a class="btn btn-success" href="#" >Login  </a>-->
                                            <!--                                                      <a class="btn btn-primary" href="#" id="btn-fblogin">Login with Facebook</a>-->

                                        </div>
                                    </div>
                                        <div class="login_buttonn ">
                                            <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'forgetpwd')); ?>">Forgot your password?</a><br/>
                                            <!--<a href="<?php echo $this->html->url(array('controller' => 'Members', 'action' => 'index')); ?>">Upgrade MemberShip</a>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="control">
                                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%;font-family: 'robotoregular';
                                                 font-size:12px;">
                                                Don't have an account! 
                                                <a href="<?php echo $this->Html->url('/users/join') ?>">
                                                    Sign Up Here
                                                </a>
                                            </div>
                                        </div>
                                    </div>    
                                    <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- =========================================================Pankaj 18-12-2014=======================================================-->                                    


        </div>
    </div>



</div>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="navi_main">
    <nav role="navigation" class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo $this->webroot; ?>" id="act" class="navbar-brand"><i class="fa fa-home"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="act"><a href="<?php echo $this->Html->url('/pages/about'); ?>">About us</a></li>                                                                       
                    <li class="act"><a href="<?php echo $this->Html->url('/pages/membership'); ?>">Memberships </a></li>
                    <li class="act"><a href="<?php echo $this->Html->url('/pages/contact'); ?>">Contact</a></li>
                    <?php
                    if ($loggeduser) {
                        ?>
                        <li class="act"><a href="<?php echo $this->Html->url('/users/myaccount'); ?>">My account</a></li>
                        <li class="act"><a href="<?php echo $this->Html->url('/users/logout'); ?>">Logout</a></li>
                    <?php } else {
                        ?>
                        <li class="act"><a href="<?php echo $this->Html->url('/users/join'); ?>">Join</a></li>

                        <li class="act"><a href="<?php echo $this->Html->url('/users/login'); ?>">Login</a></li>
                    <?php } ?>

                </ul>
                <!--                    <form class="navbar-form navbar-right">
                                        <input type="text" placeholder="Search..." class="search_new">
                                    </form>-->
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
</header>



<style>
    .input-group{
        float:left; 
        width:100%;
        margin-bottom: 29px;
    }
    .input-group strong {
        bottom: -23px;
        position: absolute;
        z-index: 999;
        font-family: "robotomedium";
        font-size: 14px;
        font-weight: normal;
        color:#ff0000;
    }
    .message {
        color: #ff0000;
        float: left;
        padding: 9px 23px;
        text-align: center;
        width: 100%;
    }
</style>

<div style="display: none;">

      <div> Basic</div>
    <?php
    foreach ($basicp as $bscp) {
        ?>

        <div id="silver_bh">$<?php echo $bscp['Basicplan']['silver']; ?> per 4 week period</div>
        <div id="gold_bh">$<?php echo $bscp['Basicplan']['gold']; ?> per 4 week period</div>
        <div id="platinum_bh">$<?php echo $bscp['Basicplan']['platinum']; ?> per 4 week period</div>
    <?php } ?>
    <div> Business</div>
    <?php
    foreach ($businessp as $bsnp) {
        ?>
        <div id="silver_buh">$<?php echo $bsnp['Businessplan']['silver']; ?> per 4 week period</div>
        <div id="gold_buh">$<?php echo $bsnp['Businessplan']['gold']; ?> per 4 week period</div>
        <div id="platinum_buh">$<?php echo $bsnp['Businessplan']['platinum']; ?> per 4 week period</div>
    <?php } ?>
</div>

<script type="text/javascript">

       $(document).ready(function() {
        $('#basich').off("click").on("click", function() {
           
                if ($('#sh').is(':checked')) {
                    var htm = $('#silver_bh').html();
                    $('#csth').html(htm);
                }
                else if ($('#gh').is(':checked')) {
                    var htm = $('#gold_bh').html();
                    $('#csth').html(htm);

                }
                else if ($('#ph').is(':checked')) {
                    var htm = $('#platinum_bh').html();
                    $('#csth').html(htm);

                }
        });
        $('#businessh').off("click").on("click", function() {
            
                if ($('#sh').is(':checked')) {
                    var htm = $('#silver_buh').html();
                    $('#csth').html(htm);
                }
                else if ($('#gh').is(':checked')) {
                    var htm = $('#gold_buh').html();
                    $('#csth').html(htm);

                }
                else if ($('#ph').is(':checked')) {
                    var htm = $('#platinum_buh').html();
                    $('#csth').html(htm);

                }

        });
          $('#sh').off("click").on("click", function() {
            if ($('#basich').is(':checked')) {
                    var htm = $('#silver_bh').html();
                    $('#csth').html(htm);
                }
                else if ($('#businessh').is(':checked')) {
                     var htm = $('#silver_buh').html();
                    $('#csth').html(htm);

                } 
         
    
    });
    $('#gh').off("click").on("click", function() {
            if ($('#basich').is(':checked')) {
                    var htm = $('#gold_bh').html();
                    $('#csth').html(htm);
                }
                else if ($('#businessh').is(':checked')) {
                     var htm = $('#gold_buh').html();
                    $('#csth').html(htm);

                } 
         
    
    });
    $('#ph').off("click").on("click", function() {
            if ($('#basich').is(':checked')) {
                    var htm = $('#platinum_bh').html();
                    $('#csth').html(htm);
                }
                else if ($('#businessh').is(':checked')) {
                     var htm = $('#platinum_buh').html();
                    $('#csth').html(htm);

                } 
         
    
    });
         if ($('#businessh').is(':checked')) {
              if($('#ph').is(':checked'))
              {
                  
                    var htm = $('#platinum_buh').html();
                    $('#csth').html(htm);
               
              }       
        }
      
    });
</script>
<style>
    

    div#csth {
        width: 100%;
        float: left;
        color: green;
        font-size: 17px;
    }

</style>
</script>
