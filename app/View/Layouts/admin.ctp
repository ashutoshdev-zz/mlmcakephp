<?php
/**
 *
 *
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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'MLC'; ?> :
		<?php echo $title_for_layout; ?>
	</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php
		echo $this->Html->meta('icon');

            echo $this->Html->css(array(
                '/admin/lib/bootstrap/css/bootstrap.css',
                '/admin/lib/font-awesome/css/font-awesome.css',
                '/admin/stylesheets/theme',
                '/admin/stylesheets/premium')
             );

            echo $this->Html->script(array('/admin/lib/bootstrap/js/bootstrap',
                '/admin/js/customcheckall'));
            echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
	?>
    
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
        <style type="text/css">
            .error {
                color:red;
                clear:both;
                display: block;
            }

        </style>  
    
</head>
<body class=" theme-blue">
		

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
    
   
    
   
		 <script type="text/javascript">

            $(document).ready(function() {
                //$('*[data-title]').tooltip();
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
