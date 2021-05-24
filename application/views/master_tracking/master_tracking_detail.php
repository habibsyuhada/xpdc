<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <hr class="mt-0">
            <p class="m-0 text-center">Master Tracking Number</p>
            <h1 class="font-weight-bold m-0 text-center"><?php echo $master_tracking ?></h1>
            <hr class="mb-0">
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Master Tracking Detail</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik minimize-card ik-plus"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body" style="display: none;">
            <div class="row">
              <div class="col-md-6">
                <!-- <h6 class="font-weight-bold border-bottom">Shipper Information</h6> -->
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Total Value</label>
                  <div class="col-sm-9">
                    <label class="col-form-label font-weight-bold">: <?php echo $summary_total['total_value'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Total Actual Weight</label>
                  <div class="col-sm-9">
                    <label class="col-form-label font-weight-bold">: <?php echo $summary_total['total_act_weight'] ?></label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <!-- <h6 class="font-weight-bold border-bottom">Shipper Information</h6> -->
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Total Measuremet</label>
                  <div class="col-sm-9">
                    <label class="col-form-label font-weight-bold">: <?php echo $summary_total['total_measurement'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Total Vol. Weight</label>
                  <div class="col-sm-9">
                    <label class="col-form-label font-weight-bold">: <?php echo ($summary_total['total_vol_weight']) ?></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3>Add New Tracking Number</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="row clearfix">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="tracking_no" placeholder="Tracking Number">
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-success" onclick="submit_new_tracking_no()">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Shipment List in <?php echo $master_tracking ?></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 border-right">
                <form id="form_export" method="POST" action="<?php echo base_url(); ?>shipment/shipment_export_pdf" enctype="multipart/form-data">
                  <div class="form-group mb-0">
                    <label>You tick <b class="text-warning num_ticker">0</b> shipment to <b class="text-warning">export PDF</b>.</label>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id">
                    <input type="hidden" name="master_tracking" value="<?php echo $master_tracking ?>" required>
                    <button type="submit" class="btn btn-warning">Download PDF</button>
                  </div>
                </form>
              </div>
              <div class="col-md-3">
                <form id="form_takeout" method="POST" action="<?php echo base_url(); ?>master_tracking/shipment_takeout_multi" enctype="multipart/form-data">
                  <div class="form-group mb-0">
                    <label>You tick <b class="text-danger num_ticker">0</b> shipment to <b class="text-danger">take out</b>.</label>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id">
                    <input type="hidden" name="master_tracking" value="<?php echo $master_tracking ?>" required>
                    <button type="submit" class="btn btn-danger">Take out</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"><input type="checkbox" class="checkbox-20" id="selectAll" onclick="save_all_checkbox(this)"></th>
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
                    <?php foreach ($shipment_list as $key => $value) : ?>
                      <tr>
                        <td><input type="checkbox" class="checkbox-20" name="checkbox_value[]" value="<?php echo $value['id'] ?>" onclick="save_checkbox(this)"></td>
                        <td><?php echo $value['tracking_no'] ?></td>
                        <td><?php echo $value['shipper_name'] ?></td>
                        <td><?php echo $value['consignee_name'] ?></td>
                        <td><?php echo $value['master_tracking'] ?></td>
                        <td><?php echo $value['status'] ?></td>
                        <td><?php echo $value['type_of_shipment'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>shipment/shipment_tracking/<?php echo $value['id'] ?>" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a>
                          <a target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $value['id'] ?>" class="btn btn-warning" title="Print"><i class="fas fa-print m-0"></i></a>
                          <a href="<?php echo base_url() ?>shipment/shipment_edit/<?php echo $value['id'] ?>" class="btn btn-dark" title="Edit Shipping Information"><i class="fas fa-pen"></i></a>
                          <a href="<?php echo base_url() ?>shipment/shipment_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url(); ?>master_tracking/shipment_takeout_process/<?php echo $master_tracking ?>/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure to take out this? You cannot revert it later.')" class="btn btn-danger" title="Delete"><i class="fas fa-undo"></i></a>
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
  var data_checkbox = [];

  function save_checkbox(input) {
    if ($(input).prop("checked") == true) {
      data_checkbox.push($(input).val());
    } else {
      data_checkbox.splice($.inArray($(input).val(), data_checkbox), 1);
    }
    $(".num_ticker").html(data_checkbox.length)
    console.log(data_checkbox);
  }

  function save_all_checkbox(input) {
    var oTable = $('.data_table').dataTable();

    var allPages = oTable.fnGetNodes();

    $('body').on('click', '#selectAll', function() {
      if ($(this).prop("checked") == true) {
        $('input[name="checkbox_value[]"]', allPages).prop('checked', true);
        $('input:checkbox[name="checkbox_value[]"]', allPages).each(function() {
          data_checkbox.splice($.inArray($(this).val(), data_checkbox), 1);
        });
        $('input:checkbox[name="checkbox_value[]"]:checked', allPages).each(function() {
          data_checkbox.push($(this).val());
        });
      } else {
        $('input[name="checkbox_value[]"]', allPages).prop('checked', false);
        $('input:checkbox[name="checkbox_value[]"]', allPages).each(function() {
          data_checkbox.splice($.inArray($(this).val(), data_checkbox), 1);
        });
      }
      $(".num_ticker").html(data_checkbox.length)
      console.log(data_checkbox);
    });
  }
  $('#form_export').submit(function(e) {
    $("#form_export input[name=id]").val(data_checkbox.join(", "));
  });
  $('#form_takeout').submit(function(e) {
    $("#form_takeout input[name=id]").val(data_checkbox.join(", "));
  });

  function submit_new_tracking_no() {
    var tracking_no = $('input[name=tracking_no]').val();
    $.ajax({
      url: '<?php echo base_url() ?>master_tracking/submit_new_tracking_no',
      type: 'POST',
      data: {
        tracking_no: tracking_no,
        master_tracking: '<?php echo $master_tracking ?>',
      },
      success: function(data) {
        if (data.includes("Error")) {
          $('input[name=tracking_no]').addClass('is-invalid');
          var invalid_elem = '<div class="invalid-feedback">' + data + '</div>';
          $('.invalid-feedback').remove();
          $(invalid_elem).insertAfter("input[name=tracking_no]");
          showDangerToast(data);
        } else {
          data = JSON.parse(data);
          $('input[name=tracking_no]').removeClass('is-invalid');
          $('.invalid-feedback').remove();
          $('input[name=tracking_no]').val('');
          console.log(data);
          var action = '<a href="<?php echo base_url() ?>shipment/shipment_tracking/' + data.id + '" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a><a target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/' + data.id + '" class="btn btn-warning" title="Print"><i class="fas fa-print m-0"></i></a><a href="<?php echo base_url() ?>shipment/shipment_update/' + data.id + '" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a><a href="<?php echo base_url(); ?>shipment/shipment_delete_process/' + data.id + '" onclick="return confirm(&#34;Are you sure to delete this? You cannot revert it later.&#34;)" class="btn btn-danger" title="Delete"><i class="fas fa-trash m-0"></i></a>';

          $(".data_table").DataTable().row.add(['<input type="checkbox" class="checkbox-20" value="' + data.id + '" onclick="save_checkbox(this)">', data.tracking_no, data.shipper_name, data.consignee_name, data.master_tracking, data.status, data.type_of_shipment, action]).draw();
          showSuccessToast('Success! Your data has been submitted!');
        }
      }
    });
  }
</script>