<?php echo $this->Html->css('/wizards/css/' . $wizard['type']); ?>
<div class="wizardBox" id="simpleWizard-<?php echo $wizard['position'] ?>">
	<a class="close">&times;</a>
	<?php echo $wizard['text']; ?>
</div>
