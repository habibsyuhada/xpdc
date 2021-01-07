<?php
$role = $this->session->userdata('role');
$page_permission = array(
  0 => (in_array($role, array("Super Admin", "Driver")) ? 1 : 0), //Driver
  1 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Update
  2 => (in_array($role, array("Super Admin", "Operator", "Finance")) ? 1 : 0), //Print
  3 => (in_array($role, array("Super Admin")) ? 1 : 0), //Delete
  4 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //master_tracking
  5 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //assign_driver
  6 => (in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //shipment cost
  7 => (in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //alert for hipment that not costed
  8 => (in_array($role, array("Super Admin", "Commercial")) ? 1 : 0), //alert for hipment that not costed
  9 => (in_array($role, array("Super Admin")) ? 1 : 0), //show who created
  10 => (in_array($role, array("Super Admin", "Driver", "Operator", "Finance")) ? 1 : 0), //show master tracking column
);
?>
<style>
  .widget {
    cursor: pointer;
  }
</style>
<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Filter</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik minimize-card ik-plus"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body" style="display: none;">
            <form id="form_filter" action="" method="GET">
              <input type="hidden" name="status_driver" value="<?php echo ($this->input->get('status_driver') ? $this->input->get('status_driver') : '') ?>">
              <h6 class="font-weight-bold">Service Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Shipment</label>
                    <select class="form-control" name="type_of_shipment">
                      <option value="">-- Select One --</option>
                      <option <?php echo ($this->input->get('type_of_shipment') == 'International Shipping' ? 'selected' : '') ?> value="International Shipping">International Shipping</option>
                      <option <?php echo ($this->input->get('type_of_shipment') == 'Domestic Shipping' ? 'selected' : '') ?> value="Domestic Shipping">Domestic Shipping</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="">-- Select One --</option>
                      <option <?php echo ($this->input->get('status') == 'Booked' ? 'selected' : '') ?> value="Booked">Booked</option>
                      <option <?php echo ($this->input->get('status') == 'Booking Confirmed' ? 'selected' : '') ?> value="Booking Confirmed">Booking Confirmed</option>
                      <option <?php echo ($this->input->get('status') == 'Picked up' ? 'selected' : '') ?> value="Picked up">Picked up</option>
                      <option <?php echo ($this->input->get('status') == 'Pending Payment' ? 'selected' : '') ?> value="Pending Payment">Pending Payment</option>
                      <option <?php echo ($this->input->get('status') == 'Service Center' ? 'selected' : '') ?> value="Service Center">Service Center</option>
                      <option <?php echo ($this->input->get('status') == 'Departed' ? 'selected' : '') ?> value="Departed">Departed</option>
                      <option <?php echo ($this->input->get('status') == 'Arrived' ? 'selected' : '') ?> value="Arrived">Arrived</option>
                      <option <?php echo ($this->input->get('status') == 'In Transit' ? 'selected' : '') ?> value="In Transit">In Transit</option>
                      <option <?php echo ($this->input->get('status') == 'Returned' ? 'selected' : '') ?> value="Returned">Returned</option>
                      <option <?php echo ($this->input->get('status') == 'Clearance Event' ? 'selected' : '') ?> value="Clearance Event">Clearance Event</option>
                      <option <?php echo ($this->input->get('status') == 'Clearance Complete' ? 'selected' : '') ?> value="Clearance Complete">Clearance Complete</option>
                      <option <?php echo ($this->input->get('status') == 'With Courier' ? 'selected' : '') ?> value="With Courier">With Courier</option>
                      <option <?php echo ($this->input->get('status') == 'Delivered' ? 'selected' : '') ?> value="Delivered">Delivered</option>
                      <option <?php echo ($this->input->get('status') == 'On Hold' ? 'selected' : '') ?> value="On Hold">On Hold</option>
                      <option <?php echo ($this->input->get('status') == 'Cancelled' ? 'selected' : '') ?> value="Cancelled">Cancelled</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Mode</label>
                    <select class="form-control" name="type_of_mode">
                      <option value="">-- Select One --</option>
                      <option <?php echo ($this->input->get('type_of_mode') == 'Sea Transport' ? 'selected' : '') ?> value="Sea Transport">Sea Transport</option>
                      <option <?php echo ($this->input->get('type_of_mode') == 'Land Shipping' ? 'selected' : '') ?> value="Land Shipping">Land Shipping</option>
                      <option <?php echo ($this->input->get('type_of_mode') == 'Air Freight' ? 'selected' : '') ?> value="Air Freight">Air Freight</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Shipment Date</label>
                    <input type="date" class="form-control" name="created_date" value="<?php echo @$this->input->get('created_date') ?>" placeholder="Shipment Date">
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Shipper Information</h6>
                  <div class="form-group">
                    <label>Shipper Name</label>
                    <input type="text" class="form-control" name="shipper_name" value="<?php echo @$this->input->get('shipper_name') ?>" placeholder="Shipper Name">
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="shipper_city" value="<?php echo @$this->input->get('shipper_city') ?>" placeholder="City">
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="shipper_country">
                      <option value="">- Select One -</option>
                      <?php foreach ($country['data'] as $data) { ?>
                        <option value="<?= $data['location'] ?>" <?php echo ($this->input->get('shipper_country') == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Consignee Information</h6>
                  <div class="form-group">
                    <label>Consignee Name</label>
                    <input type="text" class="form-control" name="consignee_name" value="<?php echo @$this->input->get('consignee_name') ?>" placeholder="Receiver Name">
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="consignee_city" value="<?php echo @$this->input->get('consignee_city') ?>" placeholder="City">
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="consignee_country">
                      <option value="">- Select One -</option>
                      <?php foreach ($country['data'] as $data) { ?>
                        <option value="<?= $data['location'] ?>" <?php echo ($this->input->get('consignee_country') == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                      <?php } ?>
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
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <?php 
              if ($this->input->get('status_driver')) : 
                $status_driver = explode("_", $this->input->get('status_driver'));
            ?>
              <h3 class="text-capitalize">
                <?php echo $status_driver[0] ?> List
                <?php 
                  if(count($status_driver) > 1){
                    if($status_driver[1] == 1){
                      echo "(Outstanding)";
                    }
                    else{
                      echo "(Done)";
                    }
                  }
                ?>
              </h3>
            <?php else : ?>
              <h3>Shipment List <?php echo ($this->input->get('status') ? '(' . $this->input->get('status') . ')' : '') ?></h3>
            <?php endif; ?>
          </div>
          <div class="card-body overflow-auto">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"></th>
                      <th class="text-white font-weight-bold">Tracking Number</th>
                      <?php if ($page_permission[10] == 1) : ?>
                      <th class="text-white font-weight-bold">Master Tracking Number</th>
                      <?php endif; ?>
                      <th class="text-white font-weight-bold">Shipment Type</th>
                      <th class="text-white font-weight-bold">Type of Mode</th>
                      <th class="text-white font-weight-bold">Shipper Name</th>
                      <th class="text-white font-weight-bold">Receiver Name</th>
                      <?php if ($page_permission[9] == 1) : ?>
                      <th class="text-white font-weight-bold">Created by</th>
                      <?php endif; ?>
                      <th class="text-white font-weight-bold">Status</th>
                      <?php if ($page_permission[6] == 1) : ?>
                        <th class="text-white font-weight-bold">Status Finance</th>
                      <?php endif; ?>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($shipment_list as $key => $value) : ?>
                      <tr class="<?php echo ((($value['main_agent_name'] != "" && $value['main_agent_invoice'] == "") || ($value['secondary_agent_name'] != "" && $value['secondary_agent_invoice'] == "")) && $value['status'] == "Delivered" && $page_permission[7] == 1 ? "alert-warning" : "") ?>">
                        <td><input type="checkbox" class="checkbox-20" value="<?php echo $value['id'] ?>" onclick="save_checkbox(this)"></td>
                        <td nowrap>
                          <a target="_blank" class="font-weight-bold" href="<?php echo base_url() ?>shipment/shipment_receipt/<?php echo $value['id'] ?>"><?php echo $value['tracking_no'] ?></a> 
                          <?php if($value['sea'] == "Express" && $value['status'] != "Delivered"): ?>
                            <i class="fas fa-plane text-danger" title="Express"></i>
                          <?php endif; ?>
                        </td>
                        <?php if ($page_permission[10] == 1) : ?>
                        <td><?php echo $value['master_tracking'] ?></td>
                        <?php endif; ?>
                        <td><?php echo $value['type_of_shipment'] ?></td>
                        <td><?php echo $value['type_of_mode'] ?></td>
                        <td><?php echo $value['shipper_name'] ?></td>
                        <td><?php echo $value['consignee_name'] ?></td>
                        <?php if ($page_permission[9] == 1) : ?>
                        <td><?php echo @$created_by_list[$value['created_by']] ?></td>
                        <?php endif; ?>
                        <td><a target="_blank" class="font-weight-bold" href="<?php echo base_url() ?>shipment/shipment_tracking/<?php echo $value['id'] ?>"><?php echo $value['status'] ?></a></td>
                        <?php if ($page_permission[6] == 1) : ?>
                          <td>
                            <!-- <?php if ($value['status_cost'] == 1) : ?>
                        <span class="badge badge-sm badge-success mb-1">Paid</span>
                        <?php else : ?>
                        <span class="badge badge-sm badge-danger mb-1">Unpaid</span>
                        <?php endif; ?>
                        <br> -->
                            <?php if ($value['status_bill'] == 1) : ?>
                              <a href="<?php echo base_url() ?>shipment/shipment_invoice_pdf/<?php echo $value['id'] ?>" target="_blank" class="badge badge-sm badge-warning mb-1">Billed</a>
                            <?php elseif ($value['status_bill'] == 2) : ?>
                              <span class="badge badge-sm badge-success mb-1">Paid</span>
                            <?php else : ?>
                              <span class="badge badge-sm badge-danger mb-1">Unbilled</span>
                            <?php endif; ?>
                          </td>
                        <?php endif; ?>
                        <td>
                          <!-- <a href="<?php echo base_url() ?>shipment/shipment_tracking/<?php echo $value['id'] ?>" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a> -->
                          <?php if ($page_permission[3] == 1) : ?>
                            <?php if ($value['status'] == 'Need Approval') : ?>
                              <a href="<?php echo base_url(); ?>shipment/shipment_approve_process/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure to approve this?')" class="btn btn-success" title="Confirm"><i class="fas fa-check m-0"></i></a>
                            <?php endif; ?>
                          <?php endif; ?>
                          <?php if ($page_permission[6] == 1) : ?>
                            <a href="<?php echo base_url() ?>shipment/shipment_cost/<?php echo $value['id'] ?>" class="btn btn-outline-success" title="Shipment Cost"><i class="fas fa-dollar-sign"></i></a>
                            <a href="<?php echo base_url() ?>shipment/shipment_bill/<?php echo $value['id'] ?>" class="btn btn-outline-primary" title="Shipment Bill"><i class="fas fa-coins"></i></a>
                          <?php endif; ?>
                          <?php if ($page_permission[0] == 1) : ?>
                            <a href="<?php echo base_url() ?>driver/driver_update/<?php echo $value['id'] ?>" class="btn btn-info" title="Driver"><i class="fas fa-truck"></i></a>
                          <?php endif; ?>
                          <!-- <a target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $value['id'] ?>" class="btn btn-warning" title="Print"><i class="fas fa-print m-0"></i></a> -->
                          <?php if ($page_permission[1] == 1) : ?>
                            <a href="<?php echo base_url() ?>shipment/shipment_update/<?php echo $value['id'] ?><?php echo ($value['status'] == "Picked up" ? "?t=shin" : "") ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                            <a href="<?php echo base_url() ?>shipment/shipment_edit/<?php echo $value['id'] ?>" class="btn btn-dark" title="Edit Shipping Information"><i class="fas fa-pen"></i></a>
                            <a href="<?php echo base_url() ?>shipment/shipment_assign/<?php echo $value['id'] ?>" class="btn btn-success" title="Assign Shipment"><i class="fas fa-sign-in-alt"></i></a>
                            <?php if($value['status'] == "Picked up"): ?>
                              <a href="<?php echo base_url() ?>shipment/shipment_package_detail/<?php echo $value['id'] ?>" class="btn btn-secondary" title="Check Shipment Packages"><i class="fas fa-box"></i></a>
                            <?php endif; ?>
                          <?php endif; ?>
                          <?php if ($page_permission[2] == 1) : ?>
                            <button type="button" class="btn btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-print m-0"></i> <i class="ik ik-chevron-down m-0"></i></button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $value['id'] ?>">Label</a>
                              <a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>shipment/shipment_awb_pdf/<?php echo $value['id'] ?>">WayBill</a>
                              <a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>shipment/shipment_receipt_pdf/<?php echo $value['id'] ?>">Receipt</a>
                            </div>
                          <?php endif; ?>
                          <?php if ($page_permission[8] == 1) : ?>
                            <button type="button" class="btn btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-print m-0"></i> <i class="ik ik-chevron-down m-0"></i></button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>shipment/shipment_receipt_pdf/<?php echo $value['id'] ?>">Receipt</a>
                            </div>
                          <?php endif; ?>
                          <?php if ($page_permission[3] == 1) : ?>
                            <a href="<?php echo base_url(); ?>shipment/shipment_delete_process/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure to delete this? You cannot revert it later.')" class="btn btn-danger" title="Delete"><i class="fas fa-trash m-0"></i></a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

                <div class="row clearfix">
                  <?php if ($page_permission[4] == 1) : ?>
                    <div class="col-md-6  border-left border-right">
                      <form id="form_master_tracking" method="POST" action="<?php echo base_url(); ?>master_tracking/master_tracking_multi_create_process">
                        <div class="form-group">
                          <label>You tick <b class="text-success num_ticker">0</b> documents to <b class="text-success">Console</b>.</label>
                          <input type="text" class="form-control" name="master_tracking" placeholder="Master Tracking">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id">
                          <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Create Console</button>
                        </div>
                      </form>
                    </div>
                  <?php endif; ?>
                  <?php if ($page_permission[5] == 1) : ?>
                    <div class="col-md-6 border-left border-right">
                      <form id="form_assign_driver" method="POST" action="<?php echo base_url(); ?>driver/assign_driver_process">
                        <div class="form-group">
                          <label>You tick <b class="text-info num_ticker">0</b> documents to <b class="text-info">Assign Driver</b>.</label>
                          <select class="form-control" name="driver">
                            <option value="">--- Choose Driver ---</option>
                            <?php foreach ($driver_list as $key => $value) : ?>
                              <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <select class="form-control" name="status">
                            <option value="">--- Choose Status ---</option>
                            <option value="pickup">PickUp</option>
                            <option value="deliver">Deliver</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id">
                          <button type="submit" class="btn btn-info" onclick="return confirm('Apakah Anda Yakin?')">Assign</button>
                        </div>
                      </form>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var data_checkbox = [];

  function save_checkbox(input) {
    if ($(input).prop("checked") == true) {
      data_checkbox.push($(input).val());
    } else {
      data_checkbox.splice($.inArray($(input).val(), data_checkbox), 1);
    }
    $(".num_ticker").html(data_checkbox.length)
  }

  $('#form_master_tracking').submit(function() {
    $("#form_master_tracking input[name=id]").val(data_checkbox.join(", "));
  });

  $('#form_assign_driver').submit(function() {
    $("#form_assign_driver input[name=id]").val(data_checkbox.join(", "));
  });

  $('.widget').on('click', function() {
    var status = $(this).find('h6').text();
    $("input[name=status]").val(status);
    $("#form_filter .btn[type=submit]").click();
  });

  $(".select2").select2({
    theme: "bootstrap4"
  });
</script>