<div class="basicplans view">
<h2><?php echo __('Basicplan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($basicplan['Basicplan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Silver'); ?></dt>
		<dd>
			<?php echo h($basicplan['Basicplan']['silver']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gold'); ?></dt>
		<dd>
			<?php echo h($basicplan['Basicplan']['gold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Platinum'); ?></dt>
		<dd>
			<?php echo h($basicplan['Basicplan']['platinum']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Basicplan'), array('action' => 'edit', $basicplan['Basicplan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Basicplan'), array('action' => 'delete', $basicplan['Basicplan']['id']), array(), __('Are you sure you want to delete # %s?', $basicplan['Basicplan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Basicplans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Basicplan'), array('action' => 'add')); ?> </li>
	</ul>
</div>
