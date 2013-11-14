<?php
echo $this->Html->tag('div',
		'<a class="close" href="javascript:$(\'.wizardBox\').fadeOut();">&times;</a>'.
		$wizard['text'],
		array('id' => 'simpleWizard'.$wizard['position'], 'class' => 'wizardBox')
		);
