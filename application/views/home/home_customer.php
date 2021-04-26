<?php
  $role = $this->session->userdata('role');
  $page_permission = array(
    0 => ( in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Dashboard not Driver
    1 => ( in_array($role, array("Driver")) ? 1 : 0), //Dashboard Driver
    2 => ( in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //Dashboard Finance
  );

  $months = array(
    1 => 'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July ',
    'August',
    'September',
    'October',
    'November',
    'December',
  );
  $month = date('n');
  if($this->input->get('month')){
    $month = $this->input->get('month');
  }
  $year = 2021;
  if($this->input->get('year')){
    $year = $this->input->get('year');
  }
?>
<style>
  .widget:not(.not-link){
    cursor: pointer;
  }
</style>
<div class="main-content">
	<div class="container-fluid">
    <div class="row justify-content-center clearfix">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget not-link" data-link="">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <div class="form-group">
                  <label class='font-weight-bold mb-0'>Month &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                  <select class="form-control" name="month" onchange="window.location = '<?php echo base_url() ?>home/home_customer?month='+$('[name=month]').val()+'&year='+$('[name=year]').val()">
                    <?php foreach ($months as $key => $value): ?>
                    <option value="<?php echo $key ?>" <?php echo ($month == $key ? "selected" : "") ?>><?php echo $value ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class='font-weight-bold mb-0'>Year</label>
                  <input class="form-control" name="year" onchange="window.location = '<?php echo base_url() ?>home/home_customer?month='+$('[name=month]').val()+'&year='+$('[name=year]').val()" value="<?php echo $year ?>">
                </div>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?created_date_from=<?php echo date("Y-m-", strtotime($year."-".$month."-01")); ?>01&created_date_to=<?php echo date("Y-m-t", strtotime($year."-".$month."-01")); ?>">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Total Purchase</h6>
                <h4 class="m-0 font-weight-bold">Rp. <?php echo number_format(@$total_cost + 0, 2) ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
            </div>
            <!-- <small class="text-small mt-10 d-block">6% higher than last month</small> -->
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="widget" data-link="<?php echo base_url() ?>shipment/shipment_list?created_date_from=<?php echo date("Y-m-", strtotime($year."-".$month."-01")); ?>01&created_date_to=<?php echo date("Y-m-t", strtotime($year."-".$month."-01")); ?>">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Total Shipment</h6>
                <h4 class="m-0 font-weight-bold"><?php echo @$total_shipment+0 ?></h4>
              </div>
              <div class="icon">
                <i class="fas fa-box"></i>
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
    if(link != ""){
		window.location = link;
    }
  });
</script>