<div class="lotteryResults view">
<h2><?php echo __('Lottery Result'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lotteryResult['LotteryResult']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lotteries'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lotteryResult['Lotteries']['id'], array('controller' => 'lotteries', 'action' => 'view', $lotteryResult['Lotteries']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($lotteryResult['LotteryResult']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lottery Result'), array('action' => 'edit', $lotteryResult['LotteryResult']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lottery Result'), array('action' => 'delete', $lotteryResult['LotteryResult']['id']), array(), __('Are you sure you want to delete # %s?', $lotteryResult['LotteryResult']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lottery Results'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lottery Result'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotteries'), array('controller' => 'lotteries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lotteries'), array('controller' => 'lotteries', 'action' => 'add')); ?> </li>
	</ul>
</div>
