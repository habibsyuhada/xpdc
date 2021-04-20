<?php 
  if($autobill_status == 0){
    $invoice['payment_terms'] = "Cash In Advance";
  }
?>
<style type="text/css">
  a.nav-link.active {
    border-width: 4px;
    border-bottom: 4px solid #007bff;
  }

  a.nav-link {
    border-radius: 0px !important;
  }

  a.nav-link:not(.active):hover {
    transition: all 0.3s ease-in-out;
    border-bottom: 4px solid #007bff;
  }
</style>
<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="alert bg-warning alert-warning text-white" role="alert">
          <h6 class="mb-0"><i class="fas fa-check"></i> Tracking number has been created under tracking number <b><?php echo $shipment_list['tracking_no'] ?></b>. Please see more detail above!</h6>
        </div>
        <div class="card">
          <div class="card-body">
            <hr class="mt-0">
            <p class="m-0 text-center">Tracking Number</p>
            <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment_list['tracking_no'] ?></h1>
            <hr class="mb-0">
            <br>
            <div class="text-center">
              <a target="_blank" class="btn btn-info" href="<?php echo base_url() ?>shipment/shipment_receipt_pdf/<?php echo $shipment_list['id'] ?>">Shipment Receipt</a>
              <a target="_blank" class="btn btn-primary" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $shipment_list['id'] ?>">Shipment Label</a>
              <a target="_blank" class="btn btn-warning" href="<?php echo base_url() ?>shipment/shipment_invoice_pdf/<?php echo @$invoice['id_shipment'] ?>" title="Export Invoice">Shipment Invoice</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>