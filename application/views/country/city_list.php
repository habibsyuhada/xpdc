<div class="main-content">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>City List (<i class="fas fa-flag"></i> <?= $country_list['country'] ?>)</h3>
					</div>
					<div class="card-body">
						<button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i class="fa fa-plus"></i> Add New City</button>
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							<i class="fa fa-upload"></i> Upload Excel
						</button>
						<a href="<?= base_url() ?>country/download_city/<?=$country_list['id']?>" class="btn btn-warning"><i class="fa fa-download"></i> Download Excel</a>
						<br>
						<div class="collapse" id="collapseExample">
							<div class="card card-body">
								<form action="<?= base_url() ?>country/upload_city/<?=$country_list['id']?>" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label>Upload Excel</label>
										<input type="file" class="form-control-file" name="upload_excel" accept=".csv" required />
									</div>
									<div class="form-group">
										<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
									</div>
								</form>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<table class="table data_table">
									<thead>
										<tr class="bg-info">
											<th class="text-white font-weight-bold">No</th>
											<th class="text-white font-weight-bold">City</th>
											<th class="text-white font-weight-bold">City Code</th>
											<th class="text-white font-weight-bold"></th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($city_list as $key => $value) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?php echo $value['city'] ?></td>
												<td><?php echo $value['city_code'] ?></td>
												<td>
													<button type="button" data-toggle="modal" data-target="#updateModal" data-id="<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></button>
													<a href="<?php echo base_url() ?>country/city_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Add New City</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url() ?>country/city_create_process" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>City</label>
						<input type="hidden" name="id_country" value="<?= $country_list['id'] ?>">
						<input type="text" class="form-control" name="city" placeholder="City" required />
					</div>
					<div class="form-group">
						<label>City Code</label>
						<input type="text" class="form-control" name="city_code" placeholder="City Code" required />
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateModalLabel">Update City</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="fetch_data"></div>
		</div>
	</div>
</div>
<script>
	$('#updateModal').on('shown.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		$.ajax({
			type: 'POST',
			url: "<?= base_url() ?>country/city_update/" + id
		}).done(function(msg) {
			$('#fetch_data').html(msg);
		})
	});
</script>