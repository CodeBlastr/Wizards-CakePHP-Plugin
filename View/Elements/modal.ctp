<div class="modal fade" id="modalWizard" tabindex="-1" role="dialog" aria-labelledby="modalWizardLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php if (isset($wizard['title']) && !empty($wizard['title'])): ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modalWizardLabel"><?php echo $wizard['title']; ?>/h4>
			</div>
			<?php endif; ?>
			<div class="modal-body">
				<?php echo $wizard['text']; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/js/plugins/jquery.cookie.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		if ($.cookie('modalWizard_<?php echo $wizard['id']?>')) {
			// cookie exists: don't show modal
		} else {
			$("div#modalWizard").modal('show');
			$.cookie('modalWizard_<?php echo $wizard['id']?>', 'true', {path: '/'<?php if (!empty($wizard['expires'])) : ?>,expires: <?php echo $wizard['expires']; endif; ?>});
		}
	});
</script>
