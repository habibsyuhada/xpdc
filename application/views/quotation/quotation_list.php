<?php
  $role = $this->session->userdata('role');
  $page_permission = array(
    0 => (in_array($role, array("Super Admin")) ? 1 : 0), //Delete Quotation
    1 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //Approval Quotation
    2 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //Add Tracking
    3 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //Edit Quotation
  );
?>
<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <!-- <div class="card">
          <div class="card-header">
            <h3>Filter</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik minimize-card ik-minus"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <form id="form_filter" action="" method="GET">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch">
                      <option value="">-- Select One --</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                      <option value="">-- Select One --</option>
                      <option <?php echo ($this->input->get('role') == 'Super Admin' ? 'selected' : '') ?> value="Super Admin">Super Admin</option>
                      <option <?php echo ($this->input->get('role') == 'Operator' ? 'selected' : '') ?> value="Operator">Operator</option>
                      <option <?php echo ($this->input->get('role') == 'Driver' ? 'selected' : '') ?> value="Driver">Driver</option>
                      <option <?php echo ($this->input->get('role') == 'Finance' ? 'selected' : '') ?> value="Finance">Finance</option>
                      <option <?php echo ($this->input->get('role') == 'Commercial' ? 'selected' : '') ?> value="Commercial">Commercial</option>
                      <option <?php echo ($this->input->get('role') == 'Customer' ? 'selected' : '') ?> value="Customer">Customer</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md text-right">
                  <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Search</button>
                </div>
              </div>
            </form>
          </div>
        </div> -->
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Quotation List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Quotation No</th>
                      <th class="text-white font-weight-bold">Tracking No</th>
                      <th class="text-white font-weight-bold">Date</th>
                      <th class="text-white font-weight-bold">Exp. Date</th>
                      <th class="text-white font-weight-bold">Customer Name</th>
                      <th class="text-white font-weight-bold">Type of Shipment</th>
                      <th class="text-white font-weight-bold">Type of Mode</th>
                      <th class="text-white font-weight-bold">Status</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($quotation_list as $key => $value): ?>
                    <tr>
                      <td><?php echo $value['quotation_no'] ?></td>
                      <td><?php echo $value['tracking_no'] ?></td>
                      <td><?php echo $value['date'] ?></td>
                      <td><?php echo $value['exp_date'] ?></td>
                      <td><?php echo $value['customer_name'] ?></td>
                      <td><?php echo $value['type_of_shipment'] ?></td>
                      <td><?php echo $value['type_of_transport'] ?></td>
                      <td class='font-weight-bold'>
                      <?php 
                        if($value['status'] == 0){
                          echo "<span class='text-dark'>Quoted</span>";
                        }
                        elseif($value['status'] == 1){
                          echo "<span class='text-success'>Approved</span>";
                        }
                        elseif($value['status'] == 2){
                          echo "<span class='text-danger'>Rejected</span>";
                        }
                      ?>
                      </td>
                      <td>
                        <?php if($page_permission[3] == 1): ?>
                        <a href="<?php echo base_url() ?>quotation/quotation_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                        <?php endif; ?>
                        <a target="_blank" href="<?php echo base_url() ?>quotation/quotation_pdf/<?php echo $value['id'] ?>" class="btn btn-warning" title="PDF"><i class="fas fa-print m-0"></i></a>
                        <?php if($page_permission[0] == 1): ?>
                        <a href="<?php echo base_url() ?>quotation/quotation_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                        <?php endif; ?>
                        <?php if($value['status'] == 0 && $page_permission[1] == 1): ?>
                        <a href="<?php echo base_url() ?>quotation/quotation_approval_process/<?php echo $value['id'] ?>/1" class="btn btn-success" title="Approve" onclick="return confirm('Are You Sure to Approve this?')"><i class="fas fa-check m-0"></i></a>
                        <a href="<?php echo base_url() ?>quotation/quotation_approval_process/<?php echo $value['id'] ?>/2" class="btn btn-danger" title="Reject" onclick="return confirm('Are You Sure to Reject this?')"><i class="fas fa-times m-0"></i></a>
                        <?php endif; ?>
                        <?php if($value['status'] == 1 && $value['tracking_no'] == "" && $page_permission[2] == 1): ?>
                        <a href="<?php echo base_url() ?>quotation/shipment_create/<?php echo $value['id'] ?>" class="btn btn-success" title="Create Shipment" onclick="return confirm('Are You Sure to Approve this?')"><i class="fas fa-plus m-0"></i></a>
                        <?php endif; ?>
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