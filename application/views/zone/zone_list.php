<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Zone List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Zone</th>
                      <th class="text-white font-weight-bold">Branch</th>
                      <th class="text-white font-weight-bold">Category</th>
                      <th class="text-white font-weight-bold">Country</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($zone_list as $key => $value) : ?>
                      <tr>
                        <td><?php echo $value['zone_name'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['category'] ?></td>
                        <td><?php echo $value['country'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>zone/table_rate_list/<?php echo $value['id'] ?>" class="btn btn-warning" title="Table Rate"><i class="fas fa-table m-0"></i></a>
                          <a href="<?php echo base_url() ?>zone/zone_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url() ?>zone/zone_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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