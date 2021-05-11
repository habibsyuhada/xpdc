<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Type of Service List</h3>
          </div>
          <div class="card-body">
            <a href="<?= base_url() ?>quotation/type_of_service_create" class="btn btn-success"><i class="fa fa-plus"></i> Add New TOS</a><br><br>
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">ToS Code</th>
                      <th class="text-white font-weight-bold">ToS Name</th>
                      <th class="text-white font-weight-bold">Is Delivery?</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($type_of_service_list as $key => $value) : ?>
                      <tr>
                        <td><?php echo $value['tos_code'] ?></td>
                        <td><?php echo $value['tos_name'] ?></td>
                        <td><?php echo ($value['is_delivery'] == 0) ? 'No' : 'Yes'; ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>quotation/type_of_service_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url() ?>quotation/type_of_service_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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