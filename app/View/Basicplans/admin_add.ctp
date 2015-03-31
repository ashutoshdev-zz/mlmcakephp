<div class="basicplans form">
<?php echo $this->Form->create('Basicplan'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Basicplan'); ?></legend>
	<?php
		echo $this->Form->input('silver');
		echo $this->Form->input('gold');
		echo $this->Form->input('platinum');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Basicplans'), array('action' => 'index')); ?></li>
	</ul>
</div>
