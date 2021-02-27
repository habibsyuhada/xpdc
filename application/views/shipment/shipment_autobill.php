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
        <div class="card">
          <div class="card-body">
            <hr class="mt-0">
            <p class="m-0 text-center">Shipment Number</p>
            <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment_list['tracking_no'] ?></h1>
            <hr class="mb-0">
          </div>
        </div>
        <form action="<?php echo base_url() ?>shipment/shipment_bill_process" method="POST">
          <div class="card">
            <div class="card-body overflow-auto">
              <div class="row pb-2 border-bottom">
                <div class="col-6">
                  <h6 class="font-weight-bold">Shipmnet Bill</h6>
                </div>
                <?php if(isset($quotation)){ ?>
                <div class="col-6 text-right">
                  
                  <a href="<?=base_url()?>quotation/quotation_view/<?=$quotation['id']?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Quotation View</a>
                  <a href="<?=base_url()?>quotation/quotation_pdf/<?=$quotation['id']?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Quotation PDF</a>
                </div>
                <?php } ?>
              </div>
              <input type="hidden" name="id_invoice" value="<?php echo @$invoice['id']; ?>">
              <div class="row clearfix mt-2">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class='font-weight-bold'>Bill To</label><br>
                    <?php echo $shipment_list['billing_name'] ?><br><?php echo $shipment_list['billing_address'] ?><br><?php echo $shipment_list['billing_city'] ?>, <?php echo $shipment_list['billing_country'] ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class='font-weight-bold'>Attn. to</label><br>
                    <?php echo $shipment_list['billing_contact_person'] ?><br><?php echo $shipment_list['billing_phone_number'] ?>
                  </div>
                </div>
                <?php if (@$invoice['invoice_no'] != "") : ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status_bill" required>
                        <option value="1" <?= (@$shipment_list['status_bill'] == '1') ? 'selected' : ''; ?>>Billed</option>
                        <option value="2" <?= (@$shipment_list['status_bill'] == '2') ? 'selected' : ''; ?>>Paid</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date Paid</label>
                      <input type="date" class="form-control" name="date_paid" value="<?php echo @$shipment_list['date_paid'] ?>" required>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              <?php
              $total_all = 0;
              ?>

              <br>
              <table class="table table-bordered" style="font-size: 13px;">
                <tbody>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Tracking No.</b>
                        </div>
                        <div class="col text-right">
                          <?php echo $shipment_list['tracking_no'] ?>
                        </div>
                      </div>
                    </td>
                    <td rowspan="4" style='vertical-align: top;'>
                      <b>Shipper</b><br>
                      <?php echo $shipment_list['shipper_name'] ?><br>
                      <?php echo $shipment_list['shipper_address'] ?><br>
                      <?php echo $shipment_list['shipper_city'] ?>, <?php echo $shipment_list['shipper_country'] ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Type of Service</b>
                        </div>
                        <div class="col text-right">
                          Freight Handling
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Type of Shipment</b>
                        </div>
                        <div class="col text-right">
                          <?php echo $shipment_list['type_of_shipment'] ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Type of Mode</b>
                        </div>
                        <div class="col text-right">
                          <?php echo $shipment_list['type_of_mode'] ?> <?php echo ($shipment_list['sea'] == "" ? "" : "(" . $shipment_list['sea'] . ")") ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Price/Kg (Rp.)</b>
                        </div>
                        <div class="col text-right">
                          Rp.<?php echo number_format($shipment_list['check_price_weight'], 2)."(".$shipment_list['check_price_term'].")"; ?>
                        </div>
                      </div>
                    </td>
                    <td rowspan="3" style='vertical-align: top;'>
                      <b>Consignee</b><br>
                      <?php echo $shipment_list['consignee_name'] ?><br>
                      <?php echo $shipment_list['consignee_address'] ?><br>
                      <?php echo $shipment_list['consignee_city'] ?>, <?php echo $shipment_list['consignee_country'] ?>
                    </td>
                  </tr>
                  <?php
                    $total_weight = 0;
                    foreach ($packages_list as $key => $value){
                      $total_weight += ($value['qty']*$value['weight']);
                    }
                    $total_bill = $total_weight*$shipment_list['check_price_weight'];
                  ?>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Total Weight</b>
                        </div>
                        <div class="col text-right">
                          <?php echo $total_weight ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Total Bill</b>
                        </div>
                        <div class="col text-right">
                          Rp.<?php echo number_format($total_bill, 2) ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <br>
              <h6 class="font-weight-bold border-bottom">Detail Information</h6>
              <div class="overflow-auto">
                <table class="table text-center" id="table_packages">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Qty.</th>
                      <th class="text-white font-weight-bold">Package Type</th>
                      <th class="text-white font-weight-bold">Length(cm)</th>
                      <th class="text-white font-weight-bold">Width(cm)</th>
                      <th class="text-white font-weight-bold">Height(cm)</th>
                      <th class="text-white font-weight-bold">Weight(kg)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($packages_list as $key => $value) : ?>
                      <tr>
                        <td>
                          <?php echo $value['qty'] ?>
                        </td>
                        <td>
                          <?php 
                            foreach ($package_type as $data){
                              if($value['piece_type'] == $data['name']){
                                echo $data['name'];
                              }
                            }
                          ?>
                        </td>
                        <td>
                          <?php echo $value['length'] + 0 ?>
                        </td>
                        <td>
                          <?php echo $value['width'] + 0 ?>
                        </td>
                        <td>
                          <?php echo $value['height'] + 0 ?>
                        </td>
                        <td><?php echo $value['weight'] + 0 ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="row clearfix">
                <div class="col-md text-right">
                  <a href="<?php echo base_url() ?>shipment/shipment_list" class="btn btn-secondary">Back</a>
                </div>
              </div>

            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>