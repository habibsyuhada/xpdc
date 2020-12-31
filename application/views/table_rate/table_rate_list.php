<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Table Rate List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Branch</th>
                      <th class="text-white font-weight-bold">Zone</th>
                      <th class="text-white font-weight-bold">Type of Mode</th>
                      <th class="text-white font-weight-bold">Price</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($table_rate_list as $key => $value): ?>
                    <tr>
                      <td><?php echo $value['name'] ?></td>
                      <td><?php echo $value['zone'] ?></td>
                      <td><?php echo $value['type_of_mode'] ?></td>
                      <td>Rp. <?php echo number_format($value['price']) ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>table_rate/table_rate_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                        <a href="<?php echo base_url() ?>table_rate/table_rate_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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