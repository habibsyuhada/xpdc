<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Shipment History</h3>
          </div>
          <div class="card-body">
            <form action="<?php echo base_url(); ?>shipment/shipment_history_update_process" method="POST" class="forms-sample" >
              <div class="form-group">
                <label>Tracking No.</label>
                <input type="text" class="form-control" name="tracking_no" required autocomplete="false">
              </div>
              <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="history_date" value="<?php echo date("Y-m-d") ?>" required readonly>
              </div>
              <div class="form-group">
                <label>Time</label>
                <input type="time" class="form-control" name="history_time" value="<?php echo date("H:i") ?>" required readonly>
              </div>
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
              <div class="mt-2 row">
                <div class="text-left col-6">
                </div>
                <div class="text-right col-6">
                  <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<script type="text/javascript">
</script>