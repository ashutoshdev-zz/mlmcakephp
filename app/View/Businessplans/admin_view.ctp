<div class="businessplans view">
<h2><?php echo __('Businessplan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($businessplan['Businessplan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Silver'); ?></dt>
		<dd>
			<?php echo h($businessplan['Businessplan']['silver']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gold'); ?></dt>
		<dd>
			<?php echo h($businessplan['Businessplan']['gold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Platinum'); ?></dt>
		<dd>
			<?php echo h($businessplan['Businessplan']['platinum']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Businessplan'), array('action' => 'edit', $businessplan['Businessplan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Businessplan'), array('action' => 'delete', $businessplan['Businessplan']['id']), array(), __('Are you sure you want to delete # %s?', $businessplan['Businessplan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Businessplans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Businessplan'), array('action' => 'add')); ?> </li>
	</ul>
</div>
