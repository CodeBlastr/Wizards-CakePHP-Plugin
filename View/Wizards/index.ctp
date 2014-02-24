<div class="wizards index">
	<h2><?php echo __('Wizards');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('plugin');?></th>
			<th><?php echo $this->Paginator->sort('controller');?></th>
			<th><?php echo $this->Paginator->sort('action');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($wizards as $wizard): ?>
	<tr>
		<td><?php echo h($wizard['Wizard']['plugin']); ?>&nbsp;</td>
		<td><?php echo h($wizard['Wizard']['controller']); ?>&nbsp;</td>
		<td><?php echo h($wizard['Wizard']['action']); ?>&nbsp;</td>
		<td><?php echo h($wizard['Wizard']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $wizard['Wizard']['id']), array('class' => 'btn btn-default')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $wizard['Wizard']['id']), array('class' => 'btn btn-warning')); ?>
			<?php
			echo $this->Form->postLink(
					__('Delete'),
					array('action' => 'delete', $wizard['Wizard']['id']),
					array('class' => 'btn btn-danger'),
					__('Are you sure you want to delete # %s?', $wizard['Wizard']['id'])
				);
			?>
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
	<h3><?php echo __('Other Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Create New Simple Wizard'), array('action' => 'add', 'simple')); ?></li>
		<li><?php echo $this->Html->link(__('Create New Modal Wizard'), array('action' => 'add', 'modal')); ?></li>
	</ul>
</div>
