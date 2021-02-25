<?php
$role = $this->session->userdata('role');
$page_permission = array(
  0 => (in_array($role, array("Super Admin")) ? 1 : 0), //Approval
  1 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //View Detail
  2 => (in_array($role, array("Super Admin")) ? 1 : 0), //Reset
);
?>
<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Customer List</h3>
          </div>
          <div class="card-body overflow-auto">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"></th>
                      <th class="text-white font-weight-bold">Account No.</th>
                      <th class="text-white font-weight-bold">Name</th>
                      <th class="text-white font-weight-bold">Email</th>
                      <th class="text-white font-weight-bold">Address</th>
                      <th class="text-white font-weight-bold">Country</th>
                      <th class="text-white font-weight-bold">City</th>
                      <th class="text-white font-weight-bold">Postcode</th>
                      <th class="text-white font-weight-bold">Contact Person</th>
                      <th class="text-white font-weight-bold">Phone Number</th>
                      <th class="text-white font-weight-bold">Status</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($customer_list as $key => $value) : ?>
                      <tr>
                        <td><input type="checkbox" class="checkbox-20"></td>
                        <td><?php echo $value['account_no'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['address'] ?></td>
                        <td><?php echo $value['country'] ?></td>
                        <td><?php echo $value['city'] ?></td>
                        <td><?php echo $value['postcode'] ?></td>
                        <td><?php echo $value['contact_person'] ?></td>
                        <td><?php echo $value['phone_number'] ?></td>
                        <td>
                          <?php if ($value['status_approval'] == 1) : ?>
                            Approved
                          <?php elseif ($value['status_approval'] == 2) : ?>
                            Rejected
                          <?php else : ?>
                            Pending
                          <?php endif; ?>
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url() ?>commercial/table_rate_list/<?php echo $value['id'] ?>" class="btn btn-info" title="Table Rate"><i class="fas fa-table m-0"></i></a>
                            <?php if ($value['status_approval'] == 1) : ?>
                              <?php if ($page_permission[1] == 1) : ?>
                                <a href="<?php echo base_url() ?>commercial/customer_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-eye m-0"></i></a>
                              <?php endif; ?>
                              <?php if ($page_permission[2] == 1) : ?>
                                <a href="<?php echo base_url() ?>commercial/customer_rest_password/<?php echo $value['customer_id'] ?>" class="btn btn-success" title="Reset" onclick="return confirm('Are You Sure?')"><i class="fas fa-redo-alt"></i></a>
                              <?php endif; ?>
                            <?php elseif ($value['status_approval'] == 2) : ?>

                            <?php elseif ($value['status_approval'] == 0 && $page_permission[0] == 1) : ?>
                              <a href="<?php echo base_url(); ?>commercial/customer_approval_process/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure to approve this?')" class="btn btn-success" title="Confirm"><i class="fas fa-check m-0"></i></a>
                              <a href="<?php echo base_url() ?>commercial/customer_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                            <?php endif; ?>
                          </div>
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
<script type="text/javascript">
</script>