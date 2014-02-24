<div class="wizards form">
<?php echo $this->Form->create('Wizard');?>
	<fieldset>
		<legend><?php echo __('Add Wizard'); ?></legend>
	<?php
		echo $this->Form->input('plugin');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('type', array('value' => 'simple'));
		echo $this->Form->input('position', array('options' => array('Top Left', 'Top Center', 'Top Right', 'Middle Left', 'Middle Center', 'Middle Right', 'Bottom Left', 'Bottom Center', 'Bottom Right')));
		echo $this->Form->input('Wizard.text', array('type' => 'richtext'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Wizards'), array('action' => 'index'));?></li>
	</ul>
</div>
