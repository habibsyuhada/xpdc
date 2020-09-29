<style>
  .widget{
    cursor: pointer;
  }
</style>
<div class="main-content">
	<div class="container-fluid">
    <div class="row justify-content-center clearfix">
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Booked</h6>
                <h2><?php echo $summary_list['Booked']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-info-circle"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Booking Confirmed</h6>
                <h2><?php echo $summary_list['Booking Confirmed']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-info-circle"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Picked up</h6>
                <h2><?php echo $summary_list['Picked up']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-info-circle"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Pending Payment</h6>
                <h2><?php echo $summary_list['Pending Payment']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-info-circle"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
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
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
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
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
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
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>In Transit</h6>
                <h2><?php echo $summary_list['In Transit']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-plane-arrival"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Returned</h6>
                <h2><?php echo $summary_list['Returned']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-plane-arrival"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Clearance Event</h6>
                <h2><?php echo $summary_list['Clearance Event']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-plane-arrival"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Clearance Complete</h6>
                <h2><?php echo $summary_list['Clearance Complete']+0 ?></h2>
              </div>
              <div class="icon">
                <i class="fas fa-plane-arrival"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">Total Events</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
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
            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
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
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>On Hold</h6>
                <h2><?php echo $summary_list['On Hold']+0 ?></h2>
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
      <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Cancelled</h6>
                <h2><?php echo $summary_list['Cancelled']+0 ?></h2>
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
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Filter</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik ik-minus minimize-card"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <form id="form_filter" action="" method="GET">
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
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="">-- Select Branch Manager --</option>
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
              </div>
              <div class="row clearfix">
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
              </div>
              <div class="row clearfix">
                <div class="col-md text-right">
                  <button type="submit" name="submit" value="search" class="btn btn-info"><i class="fas fa-search"></i> Search</button>
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
            <h3>Shipment List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"></th>
                      <th class="text-white font-weight-bold">Tracking Number</th>
                      <th class="text-white font-weight-bold">Shipper Name</th>
                      <th class="text-white font-weight-bold">Receiver Name</th>
                      <th class="text-white font-weight-bold">Container</th>
                      <th class="text-white font-weight-bold">Status</th>
                      <th class="text-white font-weight-bold">Shipment Type</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($shipment_list as $key => $value): ?>
                    <tr>
                      <td><input type="checkbox" class="checkbox-20" value="<?php echo $value['id'] ?>" onclick="save_checkbox(this)"></td>
                      <td><?php echo $value['tracking_no'] ?></td>
                      <td><?php echo $value['shipper_name'] ?></td>
                      <td><?php echo $value['consignee_name'] ?></td>
                      <td><?php echo $value['master_tracking'] ?></td>
                      <td><?php echo $value['status'] ?></td>
                      <td><?php echo $value['type_of_shipment'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>shipment/shipment_tracking/<?php echo $value['id'] ?>" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a>
                        <a target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $value['id'] ?>" class="btn btn-warning" title="Print"><i class="fas fa-print m-0"></i></a>
                        <a href="<?php echo base_url() ?>shipment/shipment_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                        <a href="<?php echo base_url(); ?>shipment/shipment_delete_process/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure to delete this? You cannot revert it later.')" class="btn btn-danger" title="Delete"><i class="fas fa-trash m-0"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- <form id="form_master_tracking" method="POST" action="<?php echo base_url(); ?>master_tracking/master_tracking_create">
                <div class="row clearfix">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>You tick <span class="text-info num_ticker">0</span> documents to Console.</label>
                      <input type="text" class="form-control" name="master_tracking" placeholder="Master Tracking">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id">
                      <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
                    </div>
                  </div>
                </div>
                </form> -->
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

  $('.widget').on('click', function() {
    var status = $(this).find('h6').text();
    $("select[name=status]").val(status);
    $(".btn[name=submit]").click();
  });
</script>