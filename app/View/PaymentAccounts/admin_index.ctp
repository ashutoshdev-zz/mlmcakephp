<div class="paymentAccounts index">
	<h2><?php echo __('Payment Accounts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('Neteller Secure ID'); ?></th>
			<th><?php echo $this->Paginator->sort('E-mail'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paymentAccounts as $paymentAccount): ?>
	<tr>
		<td><?php echo h($paymentAccount['PaymentAccount']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($paymentAccount['User']['id'], array('controller' => 'users', 'action' => 'view', $paymentAccount['User']['id'])); ?>
		</td>
		<td><?php echo h($paymentAccount['PaymentAccount']['accountid']); ?>&nbsp;</td>
		<td><?php echo h($paymentAccount['PaymentAccount']['secureid']); ?>&nbsp;</td>
		<td><?php echo h($paymentAccount['PaymentAccount']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paymentAccount['PaymentAccount']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $paymentAccount['PaymentAccount']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $paymentAccount['PaymentAccount']['id']), array(), __('Are you sure you want to delete # %s?', $paymentAccount['PaymentAccount']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Payment Account'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
