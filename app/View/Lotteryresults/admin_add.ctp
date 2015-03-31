<div class="lotteryResults form">
<?php echo $this->Form->create('LotteryResult'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Lottery Result'); ?></legend>
	<?php
		echo $this->Form->input('lotteries_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lottery Results'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Lotteries'), array('controller' => 'lotteries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lotteries'), array('controller' => 'lotteries', 'action' => 'add')); ?> </li>
	</ul>
</div>
