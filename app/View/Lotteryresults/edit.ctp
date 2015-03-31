<div class="lotteryResults form">
<?php echo $this->Form->create('LotteryResult'); ?>
	<fieldset>
		<legend><?php echo __('Edit Lottery Result'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lotteries_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LotteryResult.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('LotteryResult.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lottery Results'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Lotteries'), array('controller' => 'lotteries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lotteries'), array('controller' => 'lotteries', 'action' => 'add')); ?> </li>
	</ul>
</div>
