<?php
$wizard = $this->requestAction('/wizards/wizards/display/' . $this->request->params['plugin'] . '/' . $this->request->params['controller'] . '/' . $this->request->params['action']);
if ($wizard !== false) {
	echo $this->element('Wizards.' . $wizard['type'], array('wizard' => $wizard));
} else {
	echo $this->Html->css('/wizards/css/simple'); // can't queue from an element ? :(
	echo $this->Html->tag('div', '<a class="close">&times;</a>' .
			'No help is available for this page yet.', array('id' => 'simpleWizard-4', 'class' => 'wizardBox', 'style' => 'display: none')
	);
}
?>

<script type="text/javascript">
	$("#menuWizard").click(function() {
		$(".wizardBox").toggle();
	});
	$(".close").click(function() {
		$('.wizardBox').fadeOut();
	});
</script>
