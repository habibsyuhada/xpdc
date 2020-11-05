<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Shipment History</h3>
          </div>
          <div class="card-body">
            <form id='form_history' action="<?php echo base_url(); ?>shipment/shipment_history_update_process" method="POST" class="forms-sample" >
              <!-- <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="history_date" value="<?php echo date("Y-m-d") ?>" required readonly>
              </div>
              <div class="form-group">
                <label>Time</label>
                <input type="time" class="form-control" name="history_time" value="<?php echo date("H:i") ?>" required readonly>
              </div> -->
              <input type="hidden" class="form-control" name="history_time" value="<?php echo date("H:i") ?>" required readonly>
              <input type="hidden" class="form-control" name="history_date" value="<?php echo date("Y-m-d") ?>" required readonly>
              <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" name="history_location" required>
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
              <div class="form-group">
                <label>Remarks</label>
                <textarea class="form-control" rows="3" name="history_remarks" required></textarea>
              </div>
              <br>
              <hr>
              <br>
              <div class="form-group">
                <label>Tracking No.</label>
                <input type="text" class="form-control" name="tracking_no" required autocomplete="false">
              </div>
              <div class="mt-2 row">
                <div class="text-left col-6">
                </div>
                <div class="text-right col-6">
                  <span id="scan_loading" class="d-none"><i class="fas fa-circle-notch fa-spin"></i></i> Loading....</span> <button type="submit" class="btn btn-success" name="submit">Submit</button>
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
            <h3>Last Scan</h3>
          </div>
          <div class="card-body">
            <table id="table_history" class="table">
              <thead>
                <tr class="bg-info">
                  <th class="text-white font-weight-bold">No.</th>
                  <th class="text-white font-weight-bold">Tracking No.</th>
                  <th class="text-white font-weight-bold">Date</th>
                  <th class="text-white font-weight-bold">Time</th>
                  <th class="text-white font-weight-bold">Location</th>
                  <th class="text-white font-weight-bold">Status</th>
                  <th class="text-white font-weight-bold">Remarks</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<script type="text/javascript">
  var num_scanned = 0;
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
        $('input[name=tracking_no]').val('');
        if(data.includes('Error') == true){
          showDangerToast(data);
        }
        else{
          data = JSON.parse(data);
          num_scanned++;
          markup = "<tr>"
            +"<td>"+num_scanned+"</td>"
            +"<td>"+data.tracking_no+"</td>"
            +"<td>"+data.date+"</td>"
            +"<td>"+data.time+"</td>"
            +"<td>"+data.location+"</td>"
            +"<td>"+data.status+"</td>"
            +"<td>"+data.remarks+"</td>"
            +"<tr>";
          $("#table_history tbody").prepend(markup);
          showSuccessToast('Your Data has been submitted!');
        }
        $('button[name=submit]').attr('disabled', false);
        $('#scan_loading').addClass('d-none');
      }
    });
  });
</script>