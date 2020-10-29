<?php
  $role = $this->session->userdata('role');
  $page_permission = array(
    0 => 1, //Driver
    1 => ( in_array($role, array("Driver")) ? 0 : 1), //Update
    2 => ( in_array($role, array("Driver")) ? 0 : 1), //Print
    3 => ( in_array($role, array("Driver")) ? 0 : 1), //Delete
    4 => ( in_array($role, array("Driver")) ? 0 : 1), //master_tracking
    5 => ( in_array($role, array("Driver")) ? 0 : 1), //assign_driver
  );
?>
<style>
  .widget{
    cursor: pointer;
  }
</style>
<div class="main-content">
	<div class="container-fluid">
    <div class="row justify-content-center clearfix">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Booked</h6>
                <h2><?php echo $summary_list['Booked']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="far fa-bookmark"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Booking Confirmed</h6>
                <h2><?php echo $summary_list['Booking Confirmed']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Picked up</h6>
                <h2><?php echo $summary_list['Picked up']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-people-carry"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Pending Payment</h6>
                <h2><?php echo $summary_list['Pending Payment']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Service Center</h6>
                <h2><?php echo $summary_list['Service Center']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-info-circle"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Departed</h6>
                <h2><?php echo $summary_list['Departed']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-plane-departure"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">61% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Arrived</h6>
                <h2><?php echo $summary_list['Arrived']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-plane-arrival"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>In Transit</h6>
                <h2><?php echo $summary_list['In Transit']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-globe-asia"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Returned</h6>
                <h2><?php echo $summary_list['Returned']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-undo"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Clearance Event</h6>
                <h2><?php echo $summary_list['Clearance Event']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-credit-card"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Clearance Complete</h6>
                <h2><?php echo $summary_list['Clearance Complete']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="far fa-credit-card"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>With Courier</h6>
                <h2><?php echo $summary_list['With Courier']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Comments</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Delivered</h6>
                <h2><?php echo $summary_list['Delivered']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-box"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Comments</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>On Hold</h6>
                <h2><?php echo $summary_list['On Hold']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-pause-circle"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Comments</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Cancelled</h6>
                <h2><?php echo $summary_list['Cancelled']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-window-close"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Comments</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
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
              <input type="hidden" name="status" value="<?php echo ($this->input->get('status') ? $this->input->get('status') : '') ?>">
              <h6 class="font-weight-bold">Service Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Shipment</label>
                    <select class="form-control" name="type_of_shipment">
                      <option value="">-- Select One --</option>
                      <option <?php echo ($this->input->get('type_of_shipment') == 'International' ? 'selected' : '') ?> value="International">International</option>
                      <option <?php echo ($this->input->get('type_of_shipment') == 'Domestic' ? 'selected' : '') ?> value="Domestic">Domestic</option>
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
            <h3>Shipment List <?php echo ($this->input->get('status') ? '('.$this->input->get('status').')' : '') ?></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"></th>
                      <th class="text-white font-weight-bold">Tracking Number</th>
                      <th class="text-white font-weight-bold">Master Tracking Number</th>
                      <th class="text-white font-weight-bold">Shipment Type</th>
                      <th class="text-white font-weight-bold">Type of Mode</th>
                      <th class="text-white font-weight-bold">Shipper Name</th>
                      <th class="text-white font-weight-bold">Receiver Name</th>
                      <th class="text-white font-weight-bold">Status</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($shipment_list as $key => $value): ?>
                    <tr class="<?php echo (($value['main_agent_cost'] == "" || ($value['secondary_agent_name'] != "" && $value['secondary_agent_cost'] == "")) && $value['status'] == "Delivered" ? "alert-warning" : "") ?>">
                      <td><input type="checkbox" class="checkbox-20" value="<?php echo $value['id'] ?>" onclick="save_checkbox(this)"></td>
                      <td><a target="_blank" class="font-weight-bold" href="<?php echo base_url() ?>shipment/shipment_receipt/<?php echo $value['id'] ?>"><?php echo $value['tracking_no'] ?></a></td>
                      <td><?php echo $value['master_tracking'] ?></td>
                      <td><?php echo $value['type_of_shipment'] ?></td>
                      <td><?php echo $value['type_of_mode'] ?></td>
                      <td><?php echo $value['shipper_name'] ?></td>
                      <td><?php echo $value['consignee_name'] ?></td>
                      <td><?php echo $value['status'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>shipment/shipment_tracking/<?php echo $value['id'] ?>" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a>
                        <?php if($page_permission[0] == 1): ?>
                        <a href="<?php echo base_url() ?>driver/driver_update/<?php echo $value['id'] ?>" class="btn btn-info" title="Driver"><i class="fas fa-truck"></i></a>
                        <?php endif; ?>
                        <!-- <a target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $value['id'] ?>" class="btn btn-warning" title="Print"><i class="fas fa-print m-0"></i></a> -->
                        <?php if($page_permission[1] == 1): ?>
                        <a href="<?php echo base_url() ?>shipment/shipment_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                        <?php endif; ?>
                        <?php if($page_permission[2] == 1): ?>
                        <button type="button" class="btn btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-print m-0"></i> <i class="ik ik-chevron-down m-0"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $value['id'] ?>">Label</a>
                          <a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>shipment/shipment_awb_pdf/<?php echo $value['id'] ?>">WayBill</a>
                          <a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>shipment/shipment_receipt_pdf/<?php echo $value['id'] ?>">Receipt</a>
                        </div>
                        <?php endif; ?>
                        <?php if($page_permission[3] == 1): ?>
                        <a href="<?php echo base_url(); ?>shipment/shipment_delete_process/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure to delete this? You cannot revert it later.')" class="btn btn-danger" title="Delete"><i class="fas fa-trash m-0"></i></a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                
                <div class="row clearfix">
                  <?php if($page_permission[4] == 1): ?>
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
                  <?php if($page_permission[5] == 1): ?>
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
    if($(input).prop("checked") == true){
      data_checkbox.push($(input).val());
    }
    else{
      data_checkbox.splice( $.inArray($(input).val(), data_checkbox), 1 );
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
