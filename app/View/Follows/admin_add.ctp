<div class="follows form">
<?php echo $this->Form->create('Follow'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Follow'); ?></legend>
	<?php
		echo $this->Form->input('fb');
		echo $this->Form->input('twitter');
		echo $this->Form->input('google');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Follows'), array('action' => 'index')); ?></li>
	</ul>
</div>
