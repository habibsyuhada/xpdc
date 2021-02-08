<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Package Type List</h3>
          </div>
          <div class="card-body">
            <a href="<?=base_url()?>package_type/package_type_create" class="btn btn-success"><i class="fa fa-plus"></i> Add New Package Type</a><br><br>
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">No.</th>
                      <th class="text-white font-weight-bold">Package Type</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($package_type_list as $key => $value) : ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>package_type/package_type_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url() ?>package_type/package_type_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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