<div class="wins view">
<h2><?php echo __('Win'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($win['Win']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($win['User']['id'], array('controller' => 'users', 'action' => 'view', $win['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wins'); ?></dt>
		<dd>
			<?php echo h($win['Win']['wins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($win['Win']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Win'), array('action' => 'edit', $win['Win']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Win'), array('action' => 'delete', $win['Win']['id']), array(), __('Are you sure you want to delete # %s?', $win['Win']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Wins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Win'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
