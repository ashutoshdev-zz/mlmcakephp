<div class="memberpages view">
<h2><?php echo __('Memberpage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($memberpage['Memberpage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($memberpage['Memberpage']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($memberpage['Memberpage']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($memberpage['Memberpage']['text']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Memberpage'), array('action' => 'edit', $memberpage['Memberpage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Memberpage'), array('action' => 'delete', $memberpage['Memberpage']['id']), array(), __('Are you sure you want to delete # %s?', $memberpage['Memberpage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberpages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Memberpage'), array('action' => 'add')); ?> </li>
	</ul>
</div>
