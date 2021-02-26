<?php
  $role = $this->session->userdata('role');
  $page_permission = array(
    0 => ( in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Create
    1 => ( in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Delete
    2 => ( in_array($role, array("Super Admin")) ? 1 : 0), //Edit
  );
?>
<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-auto">
                <img src="<?php echo base_url(); ?>assets/img/logo-fix.png" class="header-brand-img" alt="lavalite" width="300px">
              </div>
            </div>
            <br>
            <div class="row justify-content-center">
              <div class="col-auto">
                <img height="60px" src="<?php echo site_url(); ?>home/barcode_generator/<?php echo $shipment['tracking_no'] ?>">
                <br>
                <br>
                <h4 class="font-weight-bold text-center"><?php echo $shipment['tracking_no'] ?></h4>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-6">
                <p class="m-0 py-3 border-bottom"><b>SHIPPER ADDRESS</b></p>
                <p class="m-0 py-3"><b>Country : </b><?php echo $shipment['shipper_country'] ?></p>
              </div>
              <div class="col-md-6">
                <p class="m-0 py-3 border-bottom"><b>CONSIGNEE ADDRESS</b></p>
                <p class="m-0 py-3"><b>Country : </b><?php echo $shipment['consignee_country'] ?></p>
              </div>
            </div>
            <div class="mb-4 alert alert-dark text-center" role="alert">
              <b>SHIPMENT STATUS: <?php echo strtoupper($shipment['status']) ?></b>
            </div> -->

            <?php if($page_permission[0] == 1): ?>
            <p class="mt-4 pt-4 border-bottom"><b>UPDATE SHIPMENT HISTORY</b></p>
            <button id="btn_collapse" class="btn btn-block btn-primary" type="button" data-toggle="collapse" data-target="#update_shipment_history" aria-expanded="false" aria-controls="update_shipment_history" onclick="$('#btn_collapse').addClass('d-none')">Click to Update Shipment History</button>
            <div class="collapse" id="update_shipment_history">
              <form id='form_history' action="<?php echo base_url(); ?>shipment/shipment_history_update_process" method="POST" class="forms-sample" >
                <input type="hidden" name="tracking_no" value="<?php echo $shipment['tracking_no'] ?>" required>
                <div class="row">
                  <div class="col-md-6">
                    <!-- <div class="form-group">
                      <label>Location</label>
                      <input type="text" class="form-control" name="history_location" required>
                    </div> -->
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control select2" name="country_history_location" onchange="select_country(this)" required>
                        <option value="">- Select One -</option>
                        <?php foreach ($country as $value) { ?>
                          <option value="<?= $value['country'] ?>"><?= $value['country'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control" name="city_history_location" required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="history_status" required>
                        <option value="">-- Select Branch Manager --</option>
                        <option value="Booked">Booked</option>
                        <option value="Booking Confirmed">Booking Confirmed</option>
                        <option value="Picked up">Picked up</option>
                        <option value="Pending Payment">Pending Payment</option>
                        <option value="Service Center">Service Center</option>
                        <option value="Departed">Departed</option>
                        <option value="Arrived">Arrived</option>
                        <option value="In Transit">In Transit</option>
                        <option value="Returned">Returned</option>
                        <option value="Clearance Event">Clearance Event</option>
                        <option value="Clearance Complete">Clearance Complete</option>
                        <option value="With Courier">With Courier</option>
                        <option value="Delivered">Delivered</option>
                        <option value="On Hold">On Hold</option>
                        <option value="Cancelled">Cancelled</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" name="history_date" value="<?php echo date("Y-m-d") ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Time</label>
                      <input type="time" class="form-control" name="history_time" value="<?php echo date("H:i") ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Remarks</label>
                      <textarea class="form-control" rows="3" name="history_remarks"></textarea>
                    </div>
                  </div>
                </div>
                <div class="mt-2 row">
                  <div class="text-left col-6">
                  </div>
                  <div class="text-right col-6">
                    <span id="scan_loading" class="d-none"><i class="fas fa-circle-notch fa-spin"></i></i> Loading....</span> <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#update_shipment_history" aria-expanded="false" aria-controls="update_shipment_history" onclick="$('#btn_collapse').removeClass('d-none')">Close</button>
                  </div>
                </div>
              </form>
            </div>
            <?php endif; ?>

            <p class="mt-4 pt-4 border-bottom"><b>SHIPMENT HISTORY</b></p>
            <table id="table_history" class="table">
              <thead>
                <tr class="bg-info">
                  <th class="text-white font-weight-bold">Date</th>
                  <th class="text-white font-weight-bold">Time</th>
                  <th class="text-white font-weight-bold">Location</th>
                  <th class="text-white font-weight-bold">Status</th>
                  <th class="text-white font-weight-bold">Remarks</th>
                  <?php if($page_permission[1] == 1): ?>
                  <th class="text-white font-weight-bold">Action</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($history_list as $key => $value): ?>
                <tr>
                <td <?php if($page_permission[2] == 1){ ?> contenteditable onfocus="save_last_text_process($(this).text());" onblur="history_update(this, <?php echo $value['id'] ?>, 'date')"<?php } ?>><?php echo $value['date'] ?></td>
                <td <?php if($page_permission[2] == 1){ ?> contenteditable onfocus="save_last_text_process($(this).text());" onblur="history_update(this, <?php echo $value['id'] ?>, 'time')"<?php } ?>><?php echo date("H:i", strtotime($value['time'])) ?></td>
                <td <?php if($page_permission[2] == 1){ ?> contenteditable onfocus="save_last_text_process($(this).text());" onblur="history_update(this, <?php echo $value['id'] ?>, 'location')"<?php } ?>><?php echo $value['location'] ?></td>
                <td <?php if($page_permission[2] == 1){ ?> contenteditable onfocus="save_last_text_process($(this).text());" onblur="history_update(this, <?php echo $value['id'] ?>, 'status')"<?php } ?>><?php echo $value['status'] ?></td>
                <td <?php if($page_permission[2] == 1){ ?> contenteditable onfocus="save_last_text_process($(this).text());" onblur="history_update(this, <?php echo $value['id'] ?>, 'remarks')"<?php } ?>><?php echo $value['remarks'] ?></td>
                  <?php if($page_permission[1] == 1): ?>
                  <td><a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="<?=base_url()?>shipment/shipment_history_delete_db/<?php echo $value['id']?>/<?php echo $value['id_shipment']?>"><i class="fa fa-trash"></i></a></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; $id_shipment = $value['id_shipment']; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var save_last_text;
  function save_last_text_process(text) {
    save_last_text = text;
  }

  function history_update(td, id, column) {
    var text = $(td).text();
    if(save_last_text == text){
      return false;
    }

    if(confirm('Are you sure to change this data?') == true){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>shipment/column_history_update_process",
        data: {
          text: text,
          id: id,
          column: column,
          id_shipment: <?php echo $id_shipment ?>,
        },
        success: function(data){
          if(data.includes('Error') == true){
            showDangerToast(data);
          }
          else{
            showSuccessToast('Your Data has been updated to '+text+'!');
          }
        }
      });
    }
    else{
      $(td).text(save_last_text);
    }
  }

  $('#table_history').DataTable({
    order: [[0, "desc"], [1, "desc"]]
  });

  $(".select2").select2();
  
  function select_country(input) {
    var select_city = $("[name=city_history_location]");
    var name_city = "city_history_location";
    $.ajax({
      url: "<?php echo base_url() ?>country/city_autocomplete",
      dataType: "json",
      data: {
        country: $(input).val(),
      },
      success: function(data) {
        console.log(data);
        var content = $(select_city).parent();
        $("select[name=" + name_city + "]").select2("destroy");
        $(select_city).remove();
        if (data.length > 0) {
          var html = '<select class="form-control select2" name="' + name_city + '" required>';
          $.each(data, function(index, value) {
            html += "<option value='" + value + "'>" + value + "</option>";
          });
          html += "</select>";
          $(content).append(html);
          $("[name=" + name_city + "]").select2({
            theme: "bootstrap4"
          });
        } else {
          var html = '<input type="text" class="form-control" name="' + name_city + '" placeholder="City">';
          $(content).append(html);
        }
      }
    });
  }

  <?php if($page_permission[0] == 1): ?>
  $("#form_history").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    $('button[name=submit]').attr('disabled', true);
    $('#scan_loading').removeClass('d-none');
    var url = $('#form_history').attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: $("#form_history").serialize(), // serializes the form's elements.
      success: function(data){
        // $('input[name=tracking_no]').val('');
        if(data.includes('Error') == true){
          showDangerToast(data);
        }
        else{
          data = JSON.parse(data);
          // markup = "<tr>"
          //   +"<td>"+data.date+"</td>"
          //   +"<td>"+data.time+"</td>"
          //   +"<td>"+data.location+"</td>"
          //   +"<td>"+data.status+"</td>"
          //   +"<td>"+data.remarks+"</td>"
          //   +"<tr>";
          // $("#table_history tbody").prepend(markup);
          
          var btn = '<a class="btn btn-danger btn-sm" onclick="return confirm(`Are you sure?`)" href="<?=base_url()?>shipment/shipment_history_delete_db/'+data.id+'/'+data.id_shipment+'"><i class="fa fa-trash"></i></a>'

          // var table = $('#example').DataTable();
 
          var rowNode = $('#table_history').DataTable()
              .row.add( [ data.date, data.time, data.location, data.status, data.remarks, btn ] )
              .draw()
              .node();
          
          $( rowNode )
              .css( 'color', 'red' )
              .animate( { color: 'black' } );
          $('#form_history').trigger("reset");
          showSuccessToast('Your Data has been submitted!');
        }
        $('button[name=submit]').attr('disabled', false);
        $('#scan_loading').addClass('d-none');
      }
    });
  });
  <?php endif; ?>
</script>