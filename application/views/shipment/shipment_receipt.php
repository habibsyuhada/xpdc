<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>shipment/shipment_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3>Shipment Receipt</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold border-bottom">Shipper Information</h6>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Shipper Name</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_name'] ?></label>
                      <input type="hidden" name="shipper_name" value="<?php echo $data_input['shipper_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_address'] ?></label>
                      <input type="hidden" name="shipper_address" value="<?php echo $data_input['shipper_address'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_city'] ?></label>
                      <input type="hidden" name="shipper_city" value="<?php echo $data_input['shipper_city'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_country'] ?></label>
                      <input type="hidden" name="shipper_country" value="<?php echo $data_input['shipper_country'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Postcode</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_postcode'] ?></label>
                      <input type="hidden" name="shipper_postcode" value="<?php echo $data_input['shipper_postcode'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Contact Person</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_contact_person'] ?></label>
                      <input type="hidden" name="shipper_contact_person" value="<?php echo $data_input['shipper_contact_person'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_phone_number'] ?></label>
                      <input type="hidden" name="shipper_phone_number" value="<?php echo $data_input['shipper_phone_number'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_email'] ?></label>
                      <input type="hidden" name="shipper_email" value="<?php echo $data_input['shipper_email'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold border-bottom">Consignee Information</h6>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Consignee Name</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_name'] ?></label>
                      <input type="hidden" name="consignee_name" value="<?php echo $data_input['consignee_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_address'] ?></label>
                      <input type="hidden" name="consignee_address" value="<?php echo $data_input['consignee_address'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_city'] ?></label>
                      <input type="hidden" name="consignee_city" value="<?php echo $data_input['consignee_city'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_country'] ?></label>
                      <input type="hidden" name="consignee_country" value="<?php echo $data_input['consignee_country'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Postcode</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_postcode'] ?></label>
                      <input type="hidden" name="consignee_postcode" value="<?php echo $data_input['consignee_postcode'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Contact Person</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_contact_person'] ?></label>
                      <input type="hidden" name="consignee_contact_person" value="<?php echo $data_input['consignee_contact_person'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_phone_number'] ?></label>
                      <input type="hidden" name="consignee_phone_number" value="<?php echo $data_input['consignee_phone_number'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_email'] ?></label>
                      <input type="hidden" name="consignee_email" value="<?php echo $data_input['consignee_email'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold border-bottom">Shipment Information</h6>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Incoterms</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['incoterms'] ?></label>
                      <input type="hidden" name="incoterms" value="<?php echo $data_input['incoterms'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Insurance</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['insurance'] ?></label>
                      <input type="hidden" name="insurance" value="<?php echo $data_input['insurance'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Description of Goods</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['description_of_goods'] ?></label>
                      <input type="hidden" name="description_of_goods" value="<?php echo $data_input['description_of_goods'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">HSCode</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['hscode'] ?></label>
                      <input type="hidden" name="hscode" value="<?php echo $data_input['hscode'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">COO (Country of Origin)</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['coo'] ?></label>
                      <input type="hidden" name="coo" value="<?php echo $data_input['coo'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Declared Value</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['declared_value'] ?></label>
                      <input type="hidden" name="declared_value" value="<?php echo $data_input['declared_value'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Currency</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['currency'] ?></label>
                      <input type="hidden" name="currency" value="<?php echo $data_input['currency'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Ref No.</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['ref_no'] ?></label>
                      <input type="hidden" name="ref_no" value="<?php echo $data_input['ref_no'] ?>">
                    </div>
                  </div>
                  <?php
                    $total_act_weight = 0;
                    $total_vol_weight = 0;
                    $total_measurement = 0;
                    $per = 5000;
                    if ($data_input['type_of_mode'] == 'Air Freight') {
                      $per = 6000;
                    }
                    foreach ($data_input['qty'] as $key => $value) : 
                      $actual_weight = $data_input['qty'][$key] * $data_input['weight'][$key];
                      $volume_weight = $data_input['qty'][$key] * ($data_input['length'][$key] * $data_input['width'][$key] * $data_input['height'][$key]) / $per;
                      $measurement = $data_input['qty'][$key] * ($data_input['length'][$key] * $data_input['width'][$key] * $data_input['height'][$key]) / 1000000;

                      $total_act_weight += $actual_weight;
                      $total_vol_weight += $volume_weight;
                      $total_measurement += $measurement;
                  ?>
                    <input type="hidden" name="qty[]" value="<?php echo $data_input['qty'][$key] ?>">
                    <input type="hidden" name="piece_type[]" value="<?php echo $data_input['piece_type'][$key] ?>">
                    <input type="hidden" name="length[]" value="<?php echo $data_input['length'][$key]+0 ?>">
                    <input type="hidden" name="width[]" value="<?php echo $data_input['width'][$key]+0 ?>">
                    <input type="hidden" name="height[]" value="<?php echo $data_input['height'][$key]+0 ?>">
                    <input type="hidden" name="weight[]" value="<?php echo $data_input['weight'][$key]+0 ?>">
                  <?php endforeach;  ?>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Act. Weight</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo round($total_act_weight, 2, PHP_ROUND_HALF_UP) ?></label>
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Vol. Weight</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo round($total_vol_weight, 2, PHP_ROUND_HALF_UP) ?></label>
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Measurement</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo round($total_measurement, 2, PHP_ROUND_HALF_UP) ?></label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold border-bottom">Service Information</h6>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Type of Shipment</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['type_of_shipment'] ?></label>
                      <input type="hidden" name="type_of_shipment" value="<?php echo $data_input['type_of_shipment'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Type of Mode</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['type_of_mode'] ?> <?php echo (!isset($data_input['sea']) ? "" : "(" . $data_input['sea'] . ")") ?></label>
                      <input type="hidden" name="type_of_mode" value="<?php echo $data_input['type_of_mode'] ?>">
                      <input type="hidden" name="sea" value="<?php echo (isset($data_input['sea'])) ? $data_input['sea'] : ''; ?>">
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold border-bottom">Billing Details</h6>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">XPDC Account No.</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_account'] ?></label>
                      <input type="hidden" name="billing_same_as" value="<?php echo $data_input['billing_same_as'] ?>">
                      <input type="hidden" name="billing_account" value="<?php echo $data_input['billing_account'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_name'] ?></label>
                      <input type="hidden" name="billing_name" value="<?php echo $data_input['billing_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_address'] ?></label>
                      <input type="hidden" name="billing_address" value="<?php echo $data_input['billing_address'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_city'] ?></label>
                      <input type="hidden" name="billing_city" value="<?php echo $data_input['billing_city'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_country'] ?></label>
                      <input type="hidden" name="billing_country" value="<?php echo $data_input['billing_country'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Postcode</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_postcode'] ?></label>
                      <input type="hidden" name="billing_postcode" value="<?php echo $data_input['billing_postcode'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Contact Person</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_contact_person'] ?></label>
                      <input type="hidden" name="billing_contact_person" value="<?php echo $data_input['billing_contact_person'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_phone_number'] ?></label>
                      <input type="hidden" name="billing_phone_number" value="<?php echo $data_input['billing_phone_number'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_email'] ?></label>
                      <input type="hidden" name="billing_email" value="<?php echo $data_input['billing_email'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold border-bottom">Pick Up Information</h6>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Status Pickup</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['status_pickup'] ?></label>
                      <input type="hidden" name="status_pickup" value="<?php echo $data_input['status_pickup'] ?>">
                      <input type="hidden" name="pickup_same_as" value="<?php echo (isset($data_input['pickup_same_as']) ? $data_input['pickup_same_as'] : 'None') ?>">
                    </div>
                  </div>
                  <?php
                  $hide_pickup = "";
                  if ($data_input['status_pickup'] == 'Dropoff') {
                    $hide_pickup = 'd-none';
                  }
                  ?>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_name'] ?></label>
                      <input type="hidden" name="pickup_name" value="<?php echo $data_input['pickup_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_address'] ?></label>
                      <input type="hidden" name="pickup_address" value="<?php echo $data_input['pickup_address'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_city'] ?></label>
                      <input type="hidden" name="pickup_city" value="<?php echo $data_input['pickup_city'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_country'] ?></label>
                      <input type="hidden" name="pickup_country" value="<?php echo $data_input['pickup_country'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Postcode</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_postcode'] ?></label>
                      <input type="hidden" name="pickup_postcode" value="<?php echo $data_input['pickup_postcode'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Contact Person</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_contact_person'] ?></label>
                      <input type="hidden" name="pickup_contact_person" value="<?php echo $data_input['pickup_contact_person'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_phone_number'] ?></label>
                      <input type="hidden" name="pickup_phone_number" value="<?php echo $data_input['pickup_phone_number'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_email'] ?></label>
                      <input type="hidden" name="pickup_email" value="<?php echo $data_input['pickup_email'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Pick Up Date</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_date'] ?><?php echo ($data_input['pickup_date'] == $data_input['pickup_date_to'] ? "" : " - ".$data_input['pickup_date_to']) ?></label>
                      <input type="hidden" name="pickup_date" value="<?php echo $data_input['pickup_date'] ?>">
                      <input type="hidden" name="pickup_date_to" value="<?php echo $data_input['pickup_date_to'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Pick Up Time</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_time'] ?><?php echo ($data_input['pickup_time'] == $data_input['pickup_time_to'] ? "" : " - ".$data_input['pickup_time_to']) ?></label>
                      <input type="hidden" name="pickup_time" value="<?php echo $data_input['pickup_time'] ?>">
                      <input type="hidden" name="pickup_time_to" value="<?php echo $data_input['pickup_time_to'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Notes</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_notes'] ?></label>
                      <input type="hidden" name="pickup_notes" value="<?php echo $data_input['pickup_notes'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="text-left col-6">
                </div>
                <div class="text-right col-6">
                  <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
                  <button type="button" class="btn btn-danger" onclick="create_pdf();">PDF</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  function create_pdf() {
    $('form').prop('target', '_blank');
    var action = $('form').prop('action');
    $('form').prop('action', '<?php echo base_url() ?>shipment/shipment_receipt_pdf');
    $('form').submit();
    $('form').prop('action', action);
    $('form').prop('target', '');
  }
</script>