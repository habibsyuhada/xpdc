<?php
  $role = $this->session->userdata('role');
  $page_permission = array(
    0 => ( in_array($role, array("Super Admin", "Operator", "Finance")) ? 1 : 0), //Dashboard not Driver
    1 => ( in_array($role, array("Driver")) ? 1 : 0), //Dashboard Driver
  );
?>
<style>
  .widget{
    cursor: pointer;
  }
</style>
<div class="main-content">
	<div class="container-fluid">
    <?php if($page_permission[0] == 1): ?>
		<div class="row justify-content-center clearfix">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Booked">Booked</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Booking Confirmed">Booking Confirmed</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Picked up">Picked up</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Pending Payment">Pending Payment</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Service Center">Service Center</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Departed">Departed</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Arrived">Arrived</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="In Transit">In Transit</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Returned">Returned</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Clearance Event">Clearance Event</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Clearance Complete">Clearance Complete</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="With Courier">With Courier</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Delivered">Delivered</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="On Hold">On Hold</h6>
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
        <div class="widget status">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="Cancelled">Cancelled</h6>
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
    <?php endif; ?>
    <?php if($page_permission[1] == 1): ?>
    <div class="row justify-content-center clearfix">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget status-driver">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="pickup">(Outstanding) Picked Up</h6>
                <h2><?php echo $summary_list['Outstanding Pickup']+0 ?></h2>
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
        <div class="widget status-driver">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="pickup">(Done) Picked Up</h6>
                <h2><?php echo $summary_list['Done Pickup']+0 ?></h2>
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
        <div class="widget status-driver">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="pickup">(Total) Picked Up</h6>
                <h2><?php echo $summary_list['Done Pickup']+$summary_list['Outstanding Pickup']+0 ?></h2>
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
        <div class="widget status-driver">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="deliver">(Outstanding) Deliver</h6>
                <h2><?php echo $summary_list['Outstanding Deliver']+0 ?></h2>
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
        <div class="widget status-driver">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="deliver">(Done) Delivered</h6>
                <h2><?php echo $summary_list['Done Deliver']+0 ?></h2>
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
        <div class="widget status-driver">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6 name="deliver">(Total) Delivered</h6>
                <h2><?php echo $summary_list['Outstanding Deliver']+$summary_list['Done Deliver']+0 ?></h2>
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
    <?php endif; ?>
	</div>
</div>
<script>
	$('.widget.status').on('click', function() {
    var status = $(this).find('h6').attr("name");
		window.location = "<?php echo base_url() ?>shipment/shipment_list?status="+status;
  });
  $('.widget.status-driver').on('click', function() {
    var status = $(this).find('h6').attr("name");
		window.location = "<?php echo base_url() ?>shipment/shipment_list?status_driver="+status;
  });
</script>