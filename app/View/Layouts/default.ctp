<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'MLC');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array('bootstrap.min.css', 'style.css', '../fonts/stylesheet.css', '../font-awesome/css/font-awesome.css', '../font-awesome/css/font-awesome.min.css'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
<!--         <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.0.0.js" type="text/javascript"></script>-->
           <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
 <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <?php echo $this->Html->script('ie-emulation-modes-warning'); ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
        <style type="text/css">
            .error {
                color:red;
                clear:both;
                display: block;
            }

        </style>  
        <script type="text/javascript">
            $(document).ready(function() {
                $("#register").validate({
                    errorElement: 'strong',
                    rules: {
                        "data[User][fname]": "required",
                        "data[User][lname]": "required",
                        "data[User][cor]": "required",
                        "data[User][currency]": "required",
                        //                 "data[User][cml]": "required",
                        //                  "data[User][cmt]": "required",
                        "data[User][email]": {
                            required: true,
                            email: true,
                            remote: {
                                url: "/users/chkemail",
                                type: "post"

                            }

                        },
                        "data[User][username]": {
                            required: true,
                            remote: {
                                url: "/users/chkuser",
                                type: "post"
                                        //                                data: {
                                        //                                 username: function() {
                                        //                                 return $( "#user" ).val();
                                        //                                 }
                                        //                                 }
                            }
                        },
                        "data[User][susername]": {
                            required: true,
                            remote: {
                                url: "/users/schkuser",
                                type: "post"
                                        //                                data: {
                                        //                                 username: function() {
                                        //                                 return $( "#user" ).val();
                                        //                                 }
                                        //                                 }
                            }
                        },
                        "data[User][password]": "required",
                        "data[User][cpassword]": {
                            required: true,
                            minlength: 8,
                            equalTo: "#pass3"
                        }

                    },
                    messages: {
                        "data[User][fname]": "Please enter your First Name",
                        "data[User][lname]": "Please enter your Last Name",
                        "data[User][cor]": "Please enter your Country of residence",
                        "data[User][currency]": "Please enter your currency",
                        //                 "data[User][cml]": "Please Choose Membership level",
                        //                  "data[User][cmt]": "Please  Choose Membership Type",
                        "data[User][email]": {
                            required: "Please enter your E-mail ID",
                            email: "Please enter Valid E-mail ID",
                            remote: "This E-mail is already in use"
                        },
                        "data[User][username]": {
                            required: "Please enter a username..",
                            remote: "Username already taken.."
                        },
                        "data[User][susername]": {
                            required: "Please enter a username..",
                            remote: "Wrong Sponser Username.."
                        },
                        "data[User][password]": "Please Enter password",
                        "data[User][cpassword]": {
                            required: "Please Enter confirm password",
                            equalTo: "Confirm Password is not matching your Password"
                        }
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });

            $(document).ready(function() {
                $("#UserSignupForm").validate({
                    errorElement: 'span',
                    rules: {
                        "data[User][fname]": "required",
                        "data[User][lname]": "required",
                        "data[User][cor]": "required",
                        "data[User][currency]": "required",
                        "data[User][currency]": "required",
                                //                 "data[User][cml]": "required",
                                //                  "data[User][cmt]": "required",
                                "data[User][email]": {
                                    required: true,
                                    email: true,
                                    remote: {
                                        url: "/users/chkemail",
                                        type: "post"

                                    }

                                },
                        "data[User][username]": {
                            required: true,
                            remote: {
                                url: "/users/chkuser",
                                type: "post"
                                        //                                data: {
                                        //                                 username: function() {
                                        //                                 return $( "#user" ).val();
                                        //                                 }
                                        //                                 }
                            }
                        },
                        "data[User][susername]": {
                            required: true,
                            remote: {
                                url: "/users/schkuser",
                                type: "post"

                            }
                        },
                        "data[User][password]": "required",
                        "data[User][cpassword]": {
                            required: true,
                            minlength: 8,
                            equalTo: "#pass1"
                        }

                    },
                    messages: {
                        "data[User][fname]": "Please enter your First Name",
                        "data[User][lname]": "Please enter your Last Name",
                        "data[User][cor]": "Please enter your Country of residence",
                        "data[User][currency]": "Please enter your currency",
                        //                 "data[User][cml]": "Please Choose Membership level",
                        //                  "data[User][cmt]": "Please  Choose Membership Type",
                        "data[User][email]": {
                            required: "Please enter your E-mail ID",
                            email: "Please enter Valid E-mail ID",
                            remote: "This E-mail is already in use"
                        },
                        "data[User][username]": {
                            required: "Please enter a username..",
                            remote: "Username already taken.."
                        },
                        "data[User][susername]": {
                            required: "Please enter a Username of Sponsor",
                            remote: "Wrong Sponser Username.."
                        },
                        "data[User][password]": "Please Enter password",
                        "data[User][cpassword]": {
                            required: "Please Enter confirm password",
                            equalTo: "Confirm Password is not matching your Password"
                        }
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });
            $(function() {
                function stripTrailingSlash(str) {
                    if (str.substr(-1) == '/') {
                        return str.substr(0, str.length - 1);
                    }
                    return str;
                }

                var url = window.location.pathname;
                var activePage = stripTrailingSlash(url);

                $('.nav li a').each(function() {
                    var currentPage = stripTrailingSlash($(this).attr('href'));

                    if (activePage == currentPage) {
                        $(this).parent().addClass('activea');
                    }
                });
            })
            $(document).ready(function() {
                var a = window.location.pathname;
                if (a == "/")
                {
                    $('#act').css('border-top', '2px solid #0081dd');
                }

            });

        </script>

        <?php
        echo $this->element('header');


//echo $this->Session->flash();

        echo $this->fetch('content');
        echo $this->element('footer');
       

//echo $this->element('sql_dump');
        ?>
        <script type="text/javascript">
            /*****
             * Carousel control
             */
            var Carousel = function(elId, mode) {
                var wrapper = document.getElementById(elId);
                var innerEl = wrapper.getElementsByClassName('carousel-inner1')[0];
                var leftButton = wrapper.getElementsByClassName('carousel-left')[0];
                var rightButton = wrapper.getElementsByClassName('carousel-right')[0];
                var items = wrapper.getElementsByClassName('item');

                this.carouselSize = items.length;
                this.itemWidth = null;
                this.itemOuterWidth = null;
                this.currentStep = 0;
                this.itemsAtOnce = 3;
                this.minItemWidth = 200;
                this.position = innerEl.style;
                this.mode = mode;

                this.init = function(mode) {
                    this.itemsAtOnce = mode;
                    this.calcWidth(wrapper, innerEl, items);
                    cb_addEventListener(leftButton, 'click', this.goLeft.bind(this));
                    cb_addEventListener(rightButton, 'click', this.goRight.bind(this));
                    cb_addEventListener(window, 'resize', this.calcWidth.bind(this, wrapper, innerEl, items));
                };
                return this.init(mode);
            };

            Carousel.prototype = {
                goLeft: function(e) {
                    e.preventDefault();
                    if (this.currentStep) {
                        --this.currentStep;
                    } else {
                        this.currentStep = this.carouselSize - this.itemsAtOnce;
                    }
                    this.makeStep(this.currentStep);
                    return false;
                },
                goRight: function(e) {
                    e.preventDefault();
                    if (this.currentStep < (this.carouselSize - this.itemsAtOnce)) {
                        ++this.currentStep;
                    } else {
                        this.currentStep = 0;
                    }
                    this.makeStep(this.currentStep);
                    return false;
                },
                makeStep: function(step) {
                    this.position.left = -(this.itemOuterWidth * step) + 'px';
                },
                calcWidth: function(wrapper, innerEl, items) {
                    this.beResponsive();

                    var itemStyle = window.getComputedStyle(items[0]);
                    var innerElStyle = innerEl.style;
                    var carouselLength = this.carouselSize;
                    var wrapWidth = wrapper.offsetWidth - parseInt(itemStyle.marginRight, 10) * (this.itemsAtOnce + 1);

                    innerElStyle.display = 'none';
                    this.itemWidth = wrapWidth / this.itemsAtOnce;
                    this.itemOuterWidth = this.itemWidth + parseInt(itemStyle.marginRight, 10);
                    for (i = 0; i < carouselLength; i++) {
                        items[i].style.width = this.itemWidth + 'px';
                    }
                    innerElStyle.width = this.itemOuterWidth * this.carouselSize + 'px';
                    innerElStyle.display = 'block';
                },
                beResponsive: function() {
                    var winWidth = window.innerWidth;
                    if (winWidth >= 650 && winWidth < 950 && this.itemsAtOnce >= 2) {
                        this.itemsAtOnce = 2;
                    }
                    else if (winWidth < 650) {
                        this.itemsAtOnce = 1;
                    }
                    else {
                        this.itemsAtOnce = this.mode;
                    }
                }
            }
            /**
             * Cross-browser Event Listener
             **/
            function cb_addEventListener(obj, evt, fnc) {
                if (obj && obj.addEventListener) {
                    obj.addEventListener(evt, fnc, false);
                    return true;
                } else if (obj && obj.attachEvent) {
                    return obj.attachEvent('on' + evt, fnc);
                }
                return false;
            }

//Initializing carousel

            if (document.getElementById('products3')) {
                var productsCarousel = new Carousel('products3', 1);
            }
        </script>
        <!-- ======================Footer End====================== -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <?php echo $this->Html->script(array('bootstrap.min', 'ie10-viewport-bug-workaround')); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
                var originalLeave = $.fn.popover.Constructor.prototype.leave;
                $.fn.popover.Constructor.prototype.leave = function(obj) {
                    var self = obj instanceof this.constructor ?
                            obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
                    var container, timeout;

                    originalLeave.call(this, obj);

                    if (obj.currentTarget) {
                        container = $(obj.currentTarget).siblings('.popover')
                        timeout = self.timeout;
                        container.one('mouseenter', function() {
                            //We entered the actual popover – call off the dogs
                            clearTimeout(timeout);
                            //Let's monitor popover content instead
                            container.one('mouseleave', function() {
                                $.fn.popover.Constructor.prototype.leave.call(self, self);
                            });
                        })
                    }
                };


                $('body').popover({selector: '[data-popover]', trigger: 'click hover', placement: 'auto', delay: {show: 50, hide: 400}});


            });
        </script>

    </body>
</html>

