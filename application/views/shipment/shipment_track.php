<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>shipment/shipment_create_process" method="POST" class="forms-sample" >
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-auto">
                  <img src="<?php echo base_url(); ?>assets/img/logo-big-xpdc.png" class="header-brand-img" alt="lavalite">
                </div>
              </div>
              <br>
              <div class="row justify-content-center">
                <div class="col-auto">
                  <img height="60px" src="<?php echo site_url(); ?>shipment/barcode_generator/<?php echo $shipment['tracking_no'] ?>">
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
              <p class="mt-4 pt-4 border-bottom"><b>SHIPMENT HISTORY</b></p>
              <table class="table data_table">
                <thead>
                  <tr class="bg-info">
                    <th class="text-white font-weight-bold">Date</th>
                    <th class="text-white font-weight-bold">Time</th>
                    <th class="text-white font-weight-bold">Location</th>
                    <th class="text-white font-weight-bold">Status</th>
                    <th class="text-white font-weight-bold">Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($history_list as $key => $value): ?>
                  <tr>
                    <td><?php echo $value['date'] ?></td>
                    <td><?php echo $value['time'] ?></td>
                    <td><?php echo $value['location'] ?></td>
                    <td><?php echo $value['status'] ?></td>
                    <td><?php echo $value['remarks'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">

</script>