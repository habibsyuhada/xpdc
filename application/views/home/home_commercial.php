<?php
  $role = $this->session->userdata('role');
  $page_permission = array(
    0 => ( in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Dashboard not Driver
    1 => ( in_array($role, array("Driver")) ? 1 : 0), //Dashboard Driver
    2 => ( in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //Dashboard Finance
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
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Air+Freight">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Air Freight - Domestic</h6>
                <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$summary['Domestic Shipping']['Air Freight'] + 0, 2) ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-plane-departure"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <?php
            if((@$target + 0) == 0){
              $progress = 100;
            }
            else{
              $progress = (@$summary['Domestic Shipping']['Air Freight'] + 0)/(@$target+0)*100;
              if($progress > 100){
                $progress = 100;
              }
            }
          ?>
          <div class="progress progress-sm">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%;"></div>
          </div>
          <div class="widget-body py-1">
            <div class="d-flex justify-content-end align-items-center">
              <div class="state">
                <span><?php echo number_format(@$summary['Domestic Shipping']['Air Freight'] + 0, 2) ?> / <?php echo number_format(@$target + 0, 2) ?></span>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Land+Shipping">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Land Shipping - Domestic</h6>
                <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$summary['Domestic Shipping']['Land Shipping'] + 0, 2) ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <?php
            if((@$target + 0) == 0){
              $progress = 100;
            }
            else{
              $progress = (@$summary['Domestic Shipping']['Land Shipping'] + 0)/(@$target+0)*100;
              if($progress > 100){
                $progress = 100;
              }
            }
          ?>
          <div class="progress progress-sm">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%;"></div>
          </div>
          <div class="widget-body py-1">
            <div class="d-flex justify-content-end align-items-center">
              <div class="state">
                <span><?php echo number_format(@$summary['Domestic Shipping']['Land Shipping'] + 0, 2) ?> / <?php echo number_format(@$target + 0, 2) ?></span>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Sea+Transport">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Sea Transport - Domestic</h6>
                <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$summary['Domestic Shipping']['Sea Transport'] + 0, 2) ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-ship"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <?php
            if((@$target + 0) == 0){
              $progress = 100;
            }
            else{
              $progress = (@$summary['Domestic Shipping']['Sea Transport'] + 0)/(@$target+0)*100;
              if($progress > 100){
                $progress = 100;
              }
            }
          ?>
          <div class="progress progress-sm">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%;"></div>
          </div>
          <div class="widget-body py-1">
            <div class="d-flex justify-content-end align-items-center">
              <div class="state">
                <span><?php echo number_format(@$summary['Domestic Shipping']['Sea Transport'] + 0, 2) ?> / <?php echo number_format(@$target + 0, 2) ?></span>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center clearfix">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=International+Shipping&type_of_mode=Air+Freight">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Air Freight - International</h6>
                <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$summary['International Shipping']['Air Freight'] + 0, 2) ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-plane-departure"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
          <div class="widget-body py-1">
            <div class="d-flex justify-content-end align-items-center">
              <div class="state">
                <span><?php echo number_format(@$summary['International Shipping']['Air Freight'] + 0, 2) ?> / <?php echo number_format(@$target + 0, 2) ?></span>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=International+Shipping&type_of_mode=Land+Shipping">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Land Shipping - International</h6>
                <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$summary['International Shipping']['Land Shipping'] + 0, 2) ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
          <div class="widget-body py-1">
            <div class="d-flex justify-content-end align-items-center">
              <div class="state">
                <span><?php echo number_format(@$summary['International Shipping']['Land Shipping'] + 0, 2) ?> / <?php echo number_format(@$target + 0, 2) ?></span>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=International+Shipping&type_of_mode=Sea+Transport">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Sea Transport - International</h6>
                <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$summary['International Shipping']['Sea Transport'] + 0, 2) ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-ship"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
          <div class="widget-body py-1">
            <div class="d-flex justify-content-end align-items-center">
              <div class="state">
                <span><?php echo number_format(@$summary['International Shipping']['Sea Transport'] + 0, 2) ?> / <?php echo number_format(@$target + 0, 2) ?></span>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center clearfix">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Total Shipment</h6>
                <h4 class="m-0 font-weight-bold"><?php echo $total_shipment ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-plane-departure"></i>
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
        <div class="widget" data-link="<?php echo base_url() ?>commercial/customer_list">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Total Customer</h6>
                <h4 class="m-0 font-weight-bold"><?php echo $total_customer ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-handshake"></i>
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
        <div class="widget" data-link="<?php echo base_url() ?>quotation/quotation_list">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Total Quotation</h6>
                <h4 class="m-0 font-weight-bold"><?php echo $total_quotation ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<script>
  $('.widget').on('click', function() {
    var link = $(this).attr('data-link');
		window.location = link;
  });
</script>