<div class="main-content">
	<div class="container-fluid">
    <!-- <div class="row clearfix">
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
            <form>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Type of Mode</label>
                    <select class="form-control">
                      <option value="">-- Select One --</option>
                      <option value="Sea Transport">Sea Transport</option>
                      <option value="Land Shipping">Land Shipping</option>
                      <option value="Air Freight">Air Freight</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> -->
    <div class="row clearfix">
      <div class="col-md col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Service Center</h6>
                <h2><?php echo $summary_list['Service Center'] ?></h2>
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
      <div class="col-md col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Departed</h6>
                <h2><?php echo $summary_list['Departed'] ?></h2>
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
      <div class="col-md col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Arrived</h6>
                <h2><?php echo $summary_list['Arrived'] ?></h2>
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
      <div class="col-md col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>With Courier</h6>
                <h2><?php echo $summary_list['With Courier'] ?></h2>
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
      <div class="col-md col-sm-12">
        <div class="widget">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Delivered</h6>
                <h2><?php echo $summary_list['Delivered'] ?></h2>
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
</script>