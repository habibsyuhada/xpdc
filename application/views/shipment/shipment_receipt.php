<?php
$role = $this->session->userdata('role');
$page_permission = array(
  0 => (in_array($role, array("Super Admin", "Driver", "Operator", "Finance", "Commercial")) ? 1 : 0), //Agent Information
);
?>
<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>shipment/shipment_create_process" method="POST" class="forms-sample">
      <?php if (isset($data_input['id_quotation'])) : ?>
        <input type="hidden" name="id_quotation" value="<?php echo $data_input['id_quotation'] ?>">
      <?php endif; ?>
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3>Shipment <?php echo (isset($data_input['tracking_no']) ? "Preview" : "Receipt") ?></h3>
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
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['shipper_country'] ?></label>
                      <input type="hidden" name="shipper_country" value="<?php echo $data_input['shipper_country'] ?>">
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
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['consignee_country'] ?></label>
                      <input type="hidden" name="consignee_country" value="<?php echo $data_input['consignee_country'] ?>">
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
                <div class="col-md-12">
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
              <h6 class="font-weight-bold border-bottom">Shipment Information</h6>
              <?php if (isset($data_input['tracking_no'])) : ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Tracking No.</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['tracking_no'] ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Shipment Date</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo date("d-m-Y", strtotime($data_input['created_date'])) ?></label>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Incoterms</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo (isset($data_input['incoterms'])) ? $data_input['incoterms'] : '-'; ?></label>
                      <input type="hidden" name="incoterms" value="<?php echo (isset($data_input['incoterms'])) ? $data_input['incoterms'] : ''; ?>">
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
                  <!-- <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Container No</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php //echo @$data_input['container_no'] 
                                                      ?></label>
                      <input type="hidden" name="container_no" value="<?php echo @$data_input['container_no'] ?>">
                    </div>
                  </div> -->
                  <!-- <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Seal No.</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php //echo @$data_input['seal_no'] 
                                                      ?></label>
                      <input type="hidden" name="seal_no" value="<?php //echo @$data_input['seal_no'] 
                                                                  ?>">
                    </div>
                  </div> -->
                </div>
                <div class="col-md-6">
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">COO (Country of Origin)</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo (isset($data_input['coo'])) ? $data_input['coo'] : '-' ?></label>
                      <input type="hidden" name="coo" value="<?php echo (isset($data_input['coo'])) ? $data_input['coo'] : '' ?>">
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
                      <?php if ($this->session->userdata('role') != 'Customer') { ?>
                        <label class="col-form-label">: <?php echo $data_input['currency'] ?></label>
                        <input type="hidden" name="currency" value="<?php echo $data_input['currency'] ?>">
                      <?php } else { ?>
                        <label class="col-form-label">: <?php echo ($data_input['type_of_shipment'] == 'International Shipping') ? $data_input['currency'] : 'IDR'; ?></label>
                        <input type="hidden" name="currency" value="<?php echo ($data_input['type_of_shipment'] == 'International Shipping') ? $data_input['currency'] : 'IDR'; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Ref No.</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['ref_no'] ?></label>
                      <input type="hidden" name="ref_no" value="<?php echo $data_input['ref_no'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">CIPL No.</label>
                    <div class="col-sm-9">
                      <?php if (isset($data_input['cipl_no_atc']) && @$data_input['cipl_no_atc'] != "") : ?>
                        <label class="col-form-label">: <a href="<?php echo base_url() . "file/agent/" . $data_input['cipl_no_atc'] ?>" target="_blank" class="font-weight-bold text-primary" title="Attachment"><?php echo $data_input['cipl_no'] ?></a></label>
                      <?php else : ?>
                        <label class="col-form-label">: <?php echo @$data_input['cipl_no'] ?></label>
                      <?php endif; ?>
                      <input type="hidden" name="cipl_no" value="<?php echo @$data_input['cipl_no'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Permit No</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['permit_no'] ?></label>
                      <input type="hidden" name="permit_no" value="<?php echo @$data_input['permit_no'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <?php
              $total_act_weight = 0;
              $total_vol_weight = 0;
              $total_measurement = 0;
              $per = 5000;
              if ($data_input['type_of_mode'] == 'Air Freight') {
                $per = 6000;
              } elseif ($data_input['type_of_mode'] == 'Land Shipping') {
                $per = 4000;
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
                <input type="hidden" name="length[]" value="<?php echo $data_input['length'][$key] + 0 ?>">
                <input type="hidden" name="width[]" value="<?php echo $data_input['width'][$key] + 0 ?>">
                <input type="hidden" name="height[]" value="<?php echo $data_input['height'][$key] + 0 ?>">
                <input type="hidden" name="size[]" value="<?php echo $data_input['size'][$key] ?>">
                <input type="hidden" name="container_no[]" value="<?php echo $data_input['container_no'][$key] ?>">
                <input type="hidden" name="seal_no[]" value="<?php echo $data_input['seal_no'][$key] ?>">
                <input type="hidden" name="weight[]" value="<?php echo $data_input['weight'][$key] + 0 ?>">
              <?php endforeach;  ?>
              <div class="row">
                <div class="col-md">
                  <div class="form-group row m-0" style="font-size: 115%;">
                    <label class="col-sm-auto col-form-label font-weight-bold">Act. Weight</label>
                    <div class="col-sm">
                      <label class="col-form-label">: <?php echo number_format($total_act_weight, 2) ?> Kg</label>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group row m-0" style="font-size: 115%;">
                    <label class="col-sm-auto col-form-label font-weight-bold">Vol. Weight</label>
                    <div class="col-sm">
                      <label class="col-form-label">: <?php echo number_format($total_vol_weight, 2) ?> Kg</label>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group row m-0" style="font-size: 115%;">
                    <label class="col-sm-auto col-form-label font-weight-bold">Measurement</label>
                    <div class="col-sm">
                      <label class="col-form-label">: <?php echo number_format($total_measurement, 2) ?> M<sub>3</sub></label>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table table-bordered td-valign-top text-center">
                <thead>
                  <tr class="bg-info">
                    <th class="text-white">Qty.</th>
                    <?php if ($data_input['sea'] != 'FCL') : ?>
                      <th class="text-white">Package Type</th>
                      <th class="text-white">Length(cm)</th>
                      <th class="text-white">Width(cm)</th>
                      <th class="text-white">Height(cm)</th>
                      <th class="text-white">Weight(kg)</th>
                    <?php else : ?>
                      <th class="text-white">Container Type</th>
                      <th class="text-white">Container Size</th>
                      <th class="text-white">Seal No.</th>
                      <th class="text-white">Seal No.</th>
                      <th class="text-white">Gross Weight</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_input['qty'] as $key => $value) : ?>
                    <tr>
                      <td><?php echo $data_input['qty'][$key] ?></td>
                      <td><?php echo $data_input['piece_type'][$key] ?></td>
                      <?php if ($data_input['sea'] != 'FCL') : ?>
                        <td><?php echo $data_input['length'][$key] + 0 ?></td>
                        <td><?php echo $data_input['width'][$key] + 0 ?></td>
                        <td><?php echo $data_input['height'][$key] + 0 ?></td>
                        <td><?php echo $data_input['weight'][$key] + 0 ?></td>
                      <?php else : ?>
                        <td><?php echo $data_input['size'][$key] ?></td>
                        <td><?php echo $data_input['container_no'][$key] ?></td>
                        <td><?php echo $data_input['seal_no'][$key] ?></td>
                        <td><?php echo $data_input['weight'][$key] + 0 ?></td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach;  ?>
                </tbody>
              </table>
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
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['billing_country'] ?></label>
                      <input type="hidden" name="billing_country" value="<?php echo $data_input['billing_country'] ?>">
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
                  <?php if(isset($data_input['check_price_weight'])){ ?>
                  <div class="form-group row m-0">
                    <label class="col-sm-3 col-form-label">Total Price</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo ($data_input['type_of_shipment'] == 'International Shipping') ? $data_input['currency'] : 'IDR'; ?> <?php echo number_format($data_input['check_price_weight'], 2) ?> <?= ($data_input['type_of_shipment'] == "Domestic Shipping") ? "(" . $data_input['check_price_term'] . ")" : ''; ?></label>
                      <input type="hidden" name="check_price_weight" value="<?php echo $data_input['check_price_weight'] ?>">
                      <input type="hidden" name="check_price_term" value="<?php echo $data_input['check_price_term'] ?>">
                    </div>
                  </div>
                  <?php } ?>
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
                  } elseif ($this->session->userdata('role') == "Customer") {
                    $data_input['pickup_same_as'] = "Shipper";
                    $data_input['pickup_name'] = $data_input['shipper_name'];
                    $data_input['pickup_address'] = $data_input['shipper_address'];
                    $data_input['pickup_country'] = $data_input['shipper_country'];
                    $data_input['pickup_city'] = $data_input['shipper_city'];
                    $data_input['pickup_postcode'] = $data_input['shipper_postcode'];
                    $data_input['pickup_contact_person'] = $data_input['shipper_contact_person'];
                    $data_input['pickup_phone_number'] = $data_input['shipper_phone_number'];
                    $data_input['pickup_email'] = $data_input['shipper_email'];
                  }
                  ?>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_name'] ?></label>
                      <input type="hidden" name="pickup_name" value="<?php echo @$data_input['pickup_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_address'] ?></label>
                      <input type="hidden" name="pickup_address" value="<?php echo @$data_input['pickup_address'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_country'] ?></label>
                      <input type="hidden" name="pickup_country" value="<?php echo @$data_input['pickup_country'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_city'] ?></label>
                      <input type="hidden" name="pickup_city" value="<?php echo @$data_input['pickup_city'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Postcode</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_postcode'] ?></label>
                      <input type="hidden" name="pickup_postcode" value="<?php echo @$data_input['pickup_postcode'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Contact Person</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_contact_person'] ?></label>
                      <input type="hidden" name="pickup_contact_person" value="<?php echo @$data_input['pickup_contact_person'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_phone_number'] ?></label>
                      <input type="hidden" name="pickup_phone_number" value="<?php echo @$data_input['pickup_phone_number'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo @$data_input['pickup_email'] ?></label>
                      <input type="hidden" name="pickup_email" value="<?php echo @$data_input['pickup_email'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Pick Up Date</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_date'] ?><?php echo ($data_input['pickup_date'] == $data_input['pickup_date_to'] ? "" : " - " . $data_input['pickup_date_to']) ?></label>
                      <input type="hidden" name="pickup_date" value="<?php echo $data_input['pickup_date'] ?>">
                      <input type="hidden" name="pickup_date_to" value="<?php echo $data_input['pickup_date_to'] ?>">
                    </div>
                  </div>
                  <div class="form-group row m-0 <?php echo $hide_pickup; ?>">
                    <label class="col-sm-3 col-form-label">Pick Up Time</label>
                    <div class="col-sm-9">
                      <label class="col-form-label">: <?php echo $data_input['pickup_time'] ?><?php echo ($data_input['pickup_time'] == $data_input['pickup_time_to'] ? "" : " - " . $data_input['pickup_time_to']) ?></label>
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
              <?php if (!isset($data_input['tracking_no'])) : ?>
                <div class="mt-2 row">
                  <div class="text-left col-6">
                  </div>
                  <div class="text-right col-6">
                    <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
                    <button type="button" class="btn btn-danger" onclick="create_pdf();">PDF</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              <?php endif; ?>

              <?php if (isset($data_input['tracking_no']) && $page_permission[0] == 1) : ?>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="font-weight-bold border-bottom">Main Agent</h6>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Agent Name</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['main_agent_name'] ?></label>
                        <input type="hidden" name="main_agent_name" value="<?php echo $data_input['main_agent_name'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">MAWB / MBL</label>
                      <div class="col-sm-9">
                        <?php if (isset($data_input['main_agent_mawb_mbl_atc']) && @$data_input['main_agent_mawb_mbl_atc'] != "") : ?>
                          <label class="col-form-label">: <a href="<?php echo base_url() . "file/agent/" . $data_input['main_agent_mawb_mbl_atc'] ?>" target="_blank" class="font-weight-bold text-primary" title="Attachment"><?php echo $data_input['main_agent_mawb_mbl'] ?></a></label>
                        <?php else : ?>
                          <label class="col-form-label">: <?php echo $data_input['main_agent_mawb_mbl'] ?></label>
                        <?php endif; ?>
                        <input type="hidden" name="main_agent_mawb_mbl" value="<?php echo $data_input['main_agent_mawb_mbl'] ?>">
                        <?php if ($data_input['main_agent_mawb_mbl'] != "") : ?>
                          <label class="col-form-label">: <a href="<?php echo base_url() . "file/agent/" . $data_input['main_agent_mawb_mbl'] ?>" target="_blank"><?php echo $data_input['main_agent_mawb_mbl'] ?></a></label>
                        <?php else : ?>
                          <label class="col-form-label">: <?php echo $data_input['main_agent_mawb_mbl'] ?></label>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Carrier</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['main_agent_carrier'] ?></label>
                        <input type="hidden" name="main_agent_carrier" value="<?php echo $data_input['main_agent_carrier'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Voyage/Flight No.</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['main_agent_voyage_flight_no'] ?></label>
                        <input type="hidden" name="main_agent_voyage_flight_no" value="<?php echo $data_input['main_agent_voyage_flight_no'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Voyage/Flight Date</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['main_agent_voyage_flight_date'] ?></label>
                        <input type="hidden" name="main_agent_voyage_flight_date" value="<?php echo $data_input['main_agent_voyage_flight_date'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Port of Loading</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['main_agent_port_of_loading'] ?></label>
                        <input type="hidden" name="main_agent_port_of_loading" value="<?php echo $data_input['main_agent_port_of_loading'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Port of Discharge</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['main_agent_port_of_discharge'] ?></label>
                        <input type="hidden" name="main_agent_port_of_discharge" value="<?php echo $data_input['main_agent_port_of_discharge'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h6 class="font-weight-bold border-bottom">Secondary Agent</h6>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Agent Name</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['secondary_agent_name'] ?></label>
                        <input type="hidden" name="secondary_agent_name" value="<?php echo $data_input['secondary_agent_name'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">MAWB / MBL</label>
                      <div class="col-sm-9">
                        <?php if (isset($data_input['secondary_agent_mawb_mbl_atc']) && @$data_input['secondary_agent_mawb_mbl_atc'] != "") : ?>
                          <label class="col-form-label">: <a href="<?php echo base_url() . "file/agent/" . $data_input['secondary_agent_mawb_mbl_atc'] ?>" target="_blank" class="font-weight-bold text-primary" title="Attachment"><?php echo $data_input['secondary_agent_mawb_mbl'] ?></a></label>
                        <?php else : ?>
                          <label class="col-form-label">: <?php echo $data_input['secondary_agent_mawb_mbl'] ?></label>
                        <?php endif; ?>
                        <input type="hidden" name="secondary_agent_mawb_mbl" value="<?php echo $data_input['secondary_agent_mawb_mbl'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Carrier</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['secondary_agent_carrier'] ?></label>
                        <input type="hidden" name="secondary_agent_carrier" value="<?php echo $data_input['secondary_agent_carrier'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Voyage/Flight No.</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['secondary_agent_voyage_flight_no'] ?></label>
                        <input type="hidden" name="secondary_agent_voyage_flight_no" value="<?php echo $data_input['secondary_agent_voyage_flight_no'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Voyage/Flight Date</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['secondary_agent_voyage_flight_date'] ?></label>
                        <input type="hidden" name="secondary_agent_voyage_flight_date" value="<?php echo $data_input['secondary_agent_voyage_flight_date'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Port of Loading</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['secondary_agent_port_of_loading'] ?></label>
                        <input type="hidden" name="secondary_agent_port_of_loading" value="<?php echo $data_input['secondary_agent_port_of_loading'] ?>">
                      </div>
                    </div>
                    <div class="form-group row m-0">
                      <label class="col-sm-3 col-form-label">Port of Discharge</label>
                      <div class="col-sm-9">
                        <label class="col-form-label">: <?php echo $data_input['secondary_agent_port_of_discharge'] ?></label>
                        <input type="hidden" name="secondary_agent_port_of_discharge" value="<?php echo $data_input['secondary_agent_port_of_discharge'] ?>">
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
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