<div class="paymentAccounts view">
<h2><?php echo __('Payment Account'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($paymentAccount['PaymentAccount']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentAccount['User']['id'], array('controller' => 'users', 'action' => 'view', $paymentAccount['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountid'); ?></dt>
		<dd>
			<?php echo h($paymentAccount['PaymentAccount']['accountid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secureid'); ?></dt>
		<dd>
			<?php echo h($paymentAccount['PaymentAccount']['secureid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($paymentAccount['PaymentAccount']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payment Account'), array('action' => 'edit', $paymentAccount['PaymentAccount']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment Account'), array('action' => 'delete', $paymentAccount['PaymentAccount']['id']), array(), __('Are you sure you want to delete # %s?', $paymentAccount['PaymentAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Account'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
