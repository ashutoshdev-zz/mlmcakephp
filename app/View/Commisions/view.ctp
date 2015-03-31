<div class="commisions view">
<h2><?php echo __('Commision'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($commision['Commision']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($commision['User']['id'], array('controller' => 'users', 'action' => 'view', $commision['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commisions'); ?></dt>
		<dd>
			<?php echo h($commision['Commision']['commisions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($commision['Commision']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Commision'), array('action' => 'edit', $commision['Commision']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Commision'), array('action' => 'delete', $commision['Commision']['id']), array(), __('Are you sure you want to delete # %s?', $commision['Commision']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Commisions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Commision'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
