<?php
$data = unserialize($this->request->data['Wizard']['data']); // again?
?>
<div class="wizards form">
	<?php echo $this->Form->create('Wizard'); ?>
	<?php echo $this->Form->input('id') ?>
	<?php echo $this->Form->hidden('type', array('value' => 'modal')) ?>
	<fieldset>
		<legend><?php echo __('Modal Wizard Editor'); ?></legend>
		<?php echo $this->Form->input('is_enabled') ?>
		<?php echo $this->Form->input('plugin', array('placeholder' => '*')) ?>
		<?php echo $this->Form->input('controller', array('placeholder' => '*')) ?>
		<?php echo $this->Form->input('action', array('placeholder' => '*')) ?>
		<?php echo $this->Form->input('expires', array('label' => 'Number of days until cookie expiration', 'placeholder' => '365')) ?>
		<?php echo $this->Form->input('title', array('label' => 'Title of Modal <small>(optional)</small>')) ?>
		<?php echo $this->Form->input('Wizard.text', array('value' => $data['text'], 'type' => 'richtext', 'label' => 'Content')) ?>
	</fieldset>
<?php echo $this->Form->end(__('Save')); ?>
</div>
