<?php
$role = $this->session->userdata('role');
$page_permission = array(
  0 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Dashboard not Driver
  1 => (in_array($role, array("Driver")) ? 1 : 0), //Dashboard Driver
  2 => (in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //Dashboard Finance
);
?>
<style>
  .widget {
    cursor: pointer;
  }
</style>
<div class="main-content">
  <div class="container-fluid">
    <?php if ($this->session->userdata('role') == "Super Admin") : ?>
      <div class="row clearfix">
        <div class="col-md-6">
          <div class="form-group">
            <label class='font-weight-bold'>Branch</label>
            <select class="form-control" name="branch" onchange="window.location = '<?php echo base_url() ?>home/home?branch='+$(this).val()">
              <option value="">All</option>
              <?php foreach ($branch_list as $key => $value) : ?>
                <option value="<?php echo $value['name'] ?>" <?php echo ($this->input->get("branch") == $value['name'] ? "selected" : "") ?>><?php echo $value['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($this->session->userdata('role') == 'Super Admin') : ?>
      <div class="row justify-content-center clearfix">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Air+Freight&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6>Name</h6>
                  <h4 class="m-0 font-weight-bold"><?php echo $this->session->userdata('name'); ?></h4>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Air+Freight&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6>Total Selling for This Month</h6>
                  <?php
                  $total_selling = 0;
                  foreach ($summary as $key => $value) {
                    foreach ($value as $key2 => $value2) {
                      $total_selling += $value2;
                    }
                  }
                  ?>
                  <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$total_selling + 0, 2) ?></h4>
                </div>
                <div class="icon">
                  <i class="fas fa-plane-departure"></i>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget invoice_overdue" data-link="<?php echo base_url() ?>shipment/shipment_list?invoice_overdue">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6>Invoice Overdue</h6>
                  <h4 class="m-0 font-weight-bold"><?php echo number_format($invoice_count); ?> Invoice</h4>
                </div>
                <div class="icon">
                  <i class="fas fa-clock"></i>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Air+Freight&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
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
            if ((@$target['Domestic Shipping']['Air Freight'] + 0) == 0) {
              $progress = 100;
            } else {
              $progress = (@$summary['Domestic Shipping']['Air Freight'] + 0) / (@$target['Domestic Shipping']['Air Freight'] + 0) * 100;
              if ($progress > 100) {
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
                  <span><?php echo number_format(@$summary['Domestic Shipping']['Air Freight'] + 0, 2) ?> / <?php echo number_format(@$target['Domestic Shipping']['Air Freight'] + 0, 2) ?></span>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Land+Shipping&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
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
            if ((@$target['Domestic Shipping']['Land Shipping'] + 0) == 0) {
              $progress = 100;
            } else {
              $progress = (@$summary['Domestic Shipping']['Land Shipping'] + 0) / (@$target['Domestic Shipping']['Land Shipping'] + 0) * 100;
              if ($progress > 100) {
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
                  <span><?php echo number_format(@$summary['Domestic Shipping']['Land Shipping'] + 0, 2) ?> / <?php echo number_format(@$target['Domestic Shipping']['Land Shipping'] + 0, 2) ?></span>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=Domestic+Shipping&type_of_mode=Sea+Transport&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
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
            if ((@$target['Domestic Shipping']['Sea Transport'] + 0) == 0) {
              $progress = 100;
            } else {
              $progress = (@$summary['Domestic Shipping']['Sea Transport'] + 0) / (@$target['Domestic Shipping']['Sea Transport'] + 0) * 100;
              if ($progress > 100) {
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
                  <span><?php echo number_format(@$summary['Domestic Shipping']['Sea Transport'] + 0, 2) ?> / <?php echo number_format(@$target['Domestic Shipping']['Sea Transport'] + 0, 2) ?></span>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center clearfix">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=International+Shipping&type_of_mode=Air+Freight&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
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
            <?php
            if ((@$target['International Shipping']['Air Freight'] + 0) == 0) {
              $progress = 100;
            } else {
              $progress = (@$summary['International Shipping']['Air Freight'] + 0) / (@$target['International Shipping']['Air Freight'] + 0) * 100;
              if ($progress > 100) {
                $progress = 100;
              }
            }
            ?>
            <div class="progress progress-sm">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%;"></div>
            </div>
            <div class="widget-body py-1">
              <div class="d-flex justify-content-end align-items-center">
                <div class="state">
                  <span><?php echo number_format(@$summary['International Shipping']['Air Freight'] + 0, 2) ?> / <?php echo number_format(@$target['International Shipping']['Air Freight'] + 0, 2) ?></span>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=International+Shipping&type_of_mode=Land+Shipping&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
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
            <?php
            if ((@$target['International Shipping']['Land Shipping'] + 0) == 0) {
              $progress = 100;
            } else {
              $progress = (@$summary['International Shipping']['Land Shipping'] + 0) / (@$target['International Shipping']['Land Shipping'] + 0) * 100;
              if ($progress > 100) {
                $progress = 100;
              }
            }
            ?>
            <div class="progress progress-sm">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%;"></div>
            </div>
            <div class="widget-body py-1">
              <div class="d-flex justify-content-end align-items-center">
                <div class="state">
                  <span><?php echo number_format(@$summary['International Shipping']['Land Shipping'] + 0, 2) ?> / <?php echo number_format(@$target['International Shipping']['Land Shipping'] + 0, 2) ?></span>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?type_of_shipment=International+Shipping&type_of_mode=Sea+Transport&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
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
            <?php
            if ((@$target['International Shipping']['Sea Transport'] + 0) == 0) {
              $progress = 100;
            } else {
              $progress = (@$summary['International Shipping']['Sea Transport'] + 0) / (@$target['International Shipping']['Sea Transport'] + 0) * 100;
              if ($progress > 100) {
                $progress = 100;
              }
            }
            ?>
            <div class="progress progress-sm">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>%;"></div>
            </div>
            <div class="widget-body py-1">
              <div class="d-flex justify-content-end align-items-center">
                <div class="state">
                  <span><?php echo number_format(@$summary['International Shipping']['Sea Transport'] + 0, 2) ?> / <?php echo number_format(@$target['International Shipping']['Sea Transport'] + 0, 2) ?></span>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center clearfix">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list&created_date_from=<?php echo date("Y-m-"); ?>01&created_date_to=<?php echo date("Y-m-t"); ?>">
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
    <?php endif; ?>
    <?php if ($page_permission[0] == 1) : ?>
      <div class="row justify-content-center clearfix">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget status">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6 name="Booked">Booked</h6>
                  <h2><?php echo $summary_list['Booked'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Booking Confirmed'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Picked up'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Pending Payment'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Service Center'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Departed'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Arrived'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['In Transit'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Returned'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Clearance Event'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Clearance Complete'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['With Courier'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Delivered'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['On Hold'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Cancelled'] + 0 ?></h2>
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
    <?php if ($page_permission[1] == 1) : ?>
      <div class="row justify-content-center clearfix">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget status-driver">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6 name="pickup_1">(Outstanding) Picked Up</h6>
                  <h2><?php echo $summary_list['Outstanding Pickup'] + 0 ?></h2>
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
                  <h6 name="pickup_2">(Done) Picked Up</h6>
                  <h2><?php echo $summary_list['Done Pickup'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Done Pickup'] + $summary_list['Outstanding Pickup'] + 0 ?></h2>
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
                  <h6 name="deliver_1">(Outstanding) Deliver</h6>
                  <h2><?php echo $summary_list['Outstanding Deliver'] + 0 ?></h2>
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
                  <h6 name="deliver_2">(Done) Delivered</h6>
                  <h2><?php echo $summary_list['Done Deliver'] + 0 ?></h2>
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
                  <h2><?php echo $summary_list['Outstanding Deliver'] + $summary_list['Done Deliver'] + 0 ?></h2>
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
    <?php if ($this->session->userdata('role') == 'Finance') : ?>
      <div class="row justify-content-center clearfix">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="widget" data-link="#!">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6>Name</h6>
                  <h4 class="m-0 font-weight-bold"><?php echo $this->session->userdata('name'); ?></h4>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="widget invoice_overdue" data-link="<?php echo base_url() ?>shipment/shipment_list?invoice_overdue">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6>Invoice Overdue</h6>
                  <h4 class="m-0 font-weight-bold"><?php echo number_format($invoice_count); ?> Invoice</h4>
                </div>
                <div class="icon">
                  <i class="fas fa-clock"></i>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="widget status-bill">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6 name="0">Unbilled</h6>
                  <h2><?php echo $summary_list['Unbilled'] + 0 ?></h2>
                </div>
                <div class="icon">
                  <i class="fas fa-times"></i>
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
          <div class="widget status-bill">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6 name="1">Billed</h6>
                  <h2><?php echo $summary_list['Billed'] + 0 ?></h2>
                </div>
                <div class="icon">
                  <i class="fas fa-file-invoice-dollar"></i>
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
          <div class="widget status-bill">
            <div class="widget-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                  <h6 name="2">Paid</h6>
                  <h2><?php echo $summary_list['Paid'] + 0 ?></h2>
                </div>
                <div class="icon">
                  <i class="fas fa-coins"></i>
                </div>
              </div>
              <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
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
    var branch = '<?= ($this->input->get('branch') == '' || $this->input->get('branch') == null) ? '' : "&branch=" . $this->input->get('branch') ?>';
    window.location = "<?php echo base_url() ?>shipment/shipment_list?status=" + status + branch;
  });
  $('.widget.status-driver').on('click', function() {
    var status = $(this).find('h6').attr("name");
    var branch = '<?= ($this->input->get('branch') == '' || $this->input->get('branch') == null) ? '' : "&branch=" . $this->input->get('branch') ?>';
    window.location = "<?php echo base_url() ?>shipment/shipment_list?status_driver=" + status + branch;
  });
  $('.widget.status-bill').on('click', function() {
    var status = $(this).find('h6').attr("name");
    var branch = '<?= ($this->input->get('branch') == '' || $this->input->get('branch') == null) ? '' : "&branch=" . $this->input->get('branch') ?>';
    window.location = "<?php echo base_url() ?>shipment/shipment_list?status_bill=" + status + branch;
  });
  $('.widget.invoice_overdue').on('click', function() {
    var branch = '<?= ($this->input->get('branch') == '' || $this->input->get('branch') == null) ? '' : "&branch=" . $this->input->get('branch') ?>';
    window.location = "<?php echo base_url() ?>shipment/shipment_list?invoice_overdue=1" + branch;
  });
</script>