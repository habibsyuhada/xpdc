<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Payment Information List</h3>
          </div>
          <div class="card-body">
            <a href="<?= base_url() ?>payment/payment_create" class="btn btn-success"><i class="fa fa-plus"></i> Add New Payment Information</a><br><br>
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Branch</th>
                      <th class="text-white font-weight-bold">Beneficiary Name</th>
                      <th class="text-white font-weight-bold">Beneficiary Bank Name</th>
                      <th class="text-white font-weight-bold">Beneficiary Bank Address</th>
                      <th class="text-white font-weight-bold">Account No</th>
                      <th class="text-white font-weight-bold">Swift Code</th>
                      <th class="text-white font-weight-bold">Default Share Link</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($payment_list as $key => $value) : ?>
                      <tr>
                        <td><?php echo $value['branch'] ?></td>
                        <td><?php echo $value['beneficiary_name'] ?></td>
                        <td><?php echo $value['bank_name'] ?></td>
                        <td><?php echo $value['bank_address'] ?></td>
                        <td><?php echo $value['account_no'] ?></td>
                        <td><?php echo $value['swift_code'] ?></td>
                        <td><?php echo ($value['default_value'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : ''; ?></td>
                        <td>
                          <?php if ($value['default_value'] == 0) { ?>
                            <a href="<?php echo base_url() ?>payment/payment_default_value/<?php echo $value['id'] ?>" class="btn btn-warning" title="Set As Default" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-check-circle m-0"></i></a>
                          <?php } ?>
                          <a href="<?php echo base_url() ?>payment/payment_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url() ?>payment/payment_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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