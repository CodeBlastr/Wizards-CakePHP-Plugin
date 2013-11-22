<?php
echo $this->Html->tag('div',
		'<a class="close">&times;</a>'.
		$wizard['text'],
		array('id' => 'simpleWizard'.$wizard['position'], 'class' => 'wizardBox')
		);
