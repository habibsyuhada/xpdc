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
		</script>
	</body>	
</html>		
