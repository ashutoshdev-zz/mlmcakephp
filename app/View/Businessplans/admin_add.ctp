<div class="businessplans form">
<?php echo $this->Form->create('Businessplan'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Businessplan'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Businessplans'), array('action' => 'index')); ?></li>
	</ul>
</div>
