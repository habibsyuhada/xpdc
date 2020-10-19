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
            <div class="row">
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
            </div>

            <p class="mt-4 pt-4 border-bottom"><b>UPDATE SHIPMENT HISTORY</b></p>
            <button id="btn_collapse" class="btn btn-block btn-primary" type="button" data-toggle="collapse" data-target="#update_shipment_history" aria-expanded="false" aria-controls="update_shipment_history" onclick="$('#btn_collapse').addClass('d-none')">Click to Update Shipment History</button>
            <div class="collapse" id="update_shipment_history">
              <form id='form_history' action="<?php echo base_url(); ?>shipment/shipment_history_update_process" method="POST" class="forms-sample" >
                <input type="hidden" name="tracking_no" value="<?php echo $shipment['tracking_no'] ?>" required>
                <div class="row">
                  <div class="col-md-6">
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
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" name="history_date" required>
                    </div>
                    <div class="form-group">
                      <label>Time</label>
                      <input type="time" class="form-control" name="history_time" required>
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

            <p class="mt-4 pt-4 border-bottom"><b>SHIPMENT HISTORY</b></p>
            <table id="table_history" class="table">
              <thead>
                <tr class="bg-info">
                  <th class="text-white font-weight-bold">Date</th>
                  <th class="text-white font-weight-bold">Time</th>
                  <th class="text-white font-weight-bold">Location</th>
                  <th class="text-white font-weight-bold">Status</th>
                  <th class="text-white font-weight-bold">Remarks</th>
                  <th class="text-white font-weight-bold">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($history_list as $key => $value): ?>
                <tr>
                  <td><?php echo $value['date'] ?></td>
                  <td><?php echo date("H:i", strtotime($value['time'])) ?></td>
                  <td><?php echo $value['location'] ?></td>
                  <td><?php echo $value['status'] ?></td>
                  <td><?php echo $value['remarks'] ?></td>
                  <td><a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="<?=base_url()?>shipment/shipment_history_delete_db/<?php echo $value['id']?>/<?php echo $value['id_shipment']?>"><i class="fa fa-trash"></i></a></td>
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
<script type="text/javascript">
  $('#table_history').DataTable({
    order: [[0, "desc"], [1, "desc"]]
  });

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
</script>