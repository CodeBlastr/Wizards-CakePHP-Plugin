<?php
$data = unserialize($this->request->data['Wizard']['data']); // again?
?>
<div class="wizards form">
	<?php echo $this->Form->create('Wizard'); ?>
	<?php echo $this->Form->input('id') ?>
	<?php echo $this->Form->hidden('type', array('value' => 'simple')) ?>
	<fieldset>
		<legend><?php echo __('Simple Wizard Editor'); ?></legend>
		<?php echo $this->Form->input('plugin') ?>
		<?php echo $this->Form->input('controller') ?>
		<?php echo $this->Form->input('action') ?>
		<?php
		echo $this->Form->input('position', array(
			'label' => 'Screen Position',
			'value' => $data['position'],
			'options' => array(
				'Top Left', 'Top Center', 'Top Right',
				'Middle Left', 'Middle Center', 'Middle Right',
				'Bottom Left', 'Bottom Center', 'Bottom Right'
			)
		));
		?>
	<?php echo $this->Form->input('Wizard.text', array('value' => $data['text'], 'type' => 'richtext', 'label' => 'Content')) ?>
	</fieldset>
<?php echo $this->Form->end(__('Save')); ?>
</div>
