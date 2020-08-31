				<footer class="footer">
					<div class="w-100 clearfix">
						<span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 All Rights Reserved.</span>
					</div>
				</footer>
				
			</div>
		</div>
		<script type="text/javascript">
			<?php if($this->session->flashdata('success') == TRUE): ?>
			showSuccessToast('<?php echo $this->session->flashdata('success'); ?>');
      <?php endif; ?>
      <?php if($this->session->flashdata('error') == TRUE): ?>
			showDangerToast('<?php echo $this->session->flashdata('error'); ?>');
			<?php endif; ?>
			$('.data_table').DataTable({
				"order": []
			});
			$('.file-upload-browse').on('click', function() {
				var file = $(this).parent().parent().parent().find('.file-upload-default');
				file.trigger('click');
			});
			$('.file-upload-default').on('change', function() {
				$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
			});
		</script>
	</body>	
</html>		
