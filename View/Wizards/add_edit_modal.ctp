<?php
$data = unserialize($this->request->data['Wizard']['data']); // again?
?>
<div class="wizards form">
	<?php echo $this->Form->create('Wizard'); ?>
	<?php echo $this->Form->input('id') ?>
	<?php echo $this->Form->hidden('type', array('value' => 'modal')) ?>
	<fieldset>
		<legend><?php echo __('Modal Wizard Editor'); ?></legend>
		<?php echo $this->Form->input('plugin') ?>
		<?php echo $this->Form->input('controller') ?>
		<?php echo $this->Form->input('action') ?>
	<?php echo $this->Form->input('Wizard.text', array('value' => $data['text'], 'type' => 'richtext', 'label' => 'Content')) ?>
	</fieldset>
<?php echo $this->Form->end(__('Save')); ?>
</div>
