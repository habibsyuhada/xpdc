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
        <form action="<?php echo base_url() ?>quotation/quotation_update_process" method="POST">
          <input type="hidden" name="id" value="<?php echo $quotation['id'] ?>" required>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Quotation Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Account No.</label>
                    <select class="form-control select2" name="customer_account" onchange="check_custumer(this);">
                      <option value="" <?php echo ($quotation['customer_account'] == '') ? 'selected' : '';?>>- Select One -</option>
                      <?php foreach ($customer_list as $customer) : ?>
                        <option value="<?php echo $customer['account_no'] ?>" <?php echo ($quotation['customer_account'] == $customer['account_no']) ? 'selected' : '';?>><?php echo $customer['account_no'] . " - " . $customer['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="customer_account" value="<?php echo $quotation['customer_account'] ?>" placeholder="Account No." oninput="check_custumer(this);" required> -->
                  </div>
                  <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" value="<?php echo $quotation['customer_name'] ?>" placeholder="Customer Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="customer_address" placeholder="Customer Address" required><?php echo $quotation['customer_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" class="form-control" name="customer_contact_person" value="<?php echo $quotation['customer_contact_person'] ?>" placeholder="Customer Contact Person" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="customer_phone_number" value="<?php echo $quotation['customer_phone_number'] ?>" placeholder="Customer Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="customer_email" value="<?php echo $quotation['customer_email'] ?>" placeholder="Customer Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <select class="form-control" name="payment_terms" required>
                      <option value="" <?php echo ($quotation['payment_terms'] == '') ? 'selected' : ''; ?>>- Select One -</option>
                      <!-- <option value="Cash In Advance" <?php echo ($quotation['payment_terms'] == 'Cash In Advance') ? 'selected' : ''; ?>>Cash In Advance</option>
                      <option value="Cash In Delivery" <?php echo ($quotation['payment_terms'] == 'Cash In Delivery') ? 'selected' : ''; ?>>Cash In Delivery</option>
                      <option value="15 Days" <?php echo ($quotation['payment_terms'] == '15 Days') ? 'selected' : ''; ?>>15 Days</option>
                      <option value="30 Days" <?php echo ($quotation['payment_terms'] == '30 Days') ? 'selected' : ''; ?>>30 Days</option>
                      <option value="45 Days" <?php echo ($quotation['payment_terms'] == '45 Days') ? 'selected' : ''; ?>>45 Days</option>
                      <option value="60 Days" <?php echo ($quotation['payment_terms'] == '60 Days') ? 'selected' : ''; ?>>60 Days</option> -->
                      <?php foreach ($payment_terms_list as $key => $value) : ?>
                        <option value="<?php echo $value['name'] ?>" <?php echo ($quotation['payment_terms'] == $value['name']) ? 'selected' : ''; ?>><?php echo $value['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="payment_terms" value="<?php echo $quotation['payment_terms'] ?>" placeholder="Payment Terms" required> -->
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="<?php echo $quotation['date'] ?>" placeholder="Date" value="<?php echo date("Y-m-d") ?>" readonly required>
                  </div>
                  <div class="form-group">
                    <label>Exp. Date</label>
                    <input type="date" class="form-control" name="exp_date" value="<?php echo $quotation['exp_date'] ?>" placeholder="Exp. Date" required>
                  </div>
                  <div class="form-group">
                    <label>Prepared By</label>
                    <input type="text" class="form-control" name="created_by" value="<?php echo $quotation['created_by'] ?>" placeholder="Prepared By" disabled>
                  </div>
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" name="tracking_no" value="<?php echo $quotation['tracking_no'] ?>" placeholder="Remarks">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Shipment Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Shipment</label>
                    <select class="form-control" name="type_of_shipment" required <?=($quotation['type_of_service'] == 'CH' || $quotation['type_of_service'] == 'WH') ? 'disabled' : ''?>>
                      <option value="">-- Select One --</option>
                      <option value="International shipping" <?php echo ($quotation['type_of_shipment'] == 'International shipping' ? 'selected' : '' ) ?>>International shipping</option>
                      <option value="Domestic shipping" <?php echo ($quotation['type_of_shipment'] == 'Domestic shipping' ? 'selected' : '' ) ?>>Domestic shipping</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Service</label>
                    <select class="form-control" name="type_of_service" required>
                      <option value="">-- Select One --</option>
                      <option value="FH" <?php echo ($quotation['type_of_service'] == 'FH' ? 'selected' : '' ) ?>>Freight Handling</option>
                      <option value="CH" <?php echo ($quotation['type_of_service'] == 'CH' ? 'selected' : '' ) ?>>Clearance Handling</option>
                      <option value="WH" <?php echo ($quotation['type_of_service'] == 'WH' ? 'selected' : '' ) ?>>Warehousing</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Mode</label>
                    <select class="form-control" name="type_of_transport" onchange="get_vol_weight()" required>
                      <option value="">- Select One -</option>
                      <option value="Sea Transport" <?php echo ($quotation['type_of_transport'] == 'Sea Transport' ? 'selected' : '') ?>>Sea Transport</option>
                      <option value="Land Shipping" <?php echo ($quotation['type_of_transport'] == 'Land Shipping' ? 'selected' : '') ?>>Land Shipping</option>
                      <option value="Air Freight" <?php echo ($quotation['type_of_transport'] == 'Air Freight' ? 'selected' : '') ?>>Air Freight</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" style="<?php echo ($quotation['type_of_transport'] == 'Sea Transport' ? '' : 'display: none;') ?>">
                    <label>Sea</label>
                    <select class="form-control" name="sea" title="sea" required <?php echo ($quotation['type_of_transport'] == 'Sea Transport' ? '' : 'disabled') ?>>
                      <option value="">- Select Sea -</option>
                      <option value="LCL" <?= ($quotation['sea'] == 'LCL') ? 'selected' : ''; ?>>LCL</option>
                      <option value="FCL" <?= ($quotation['sea'] == 'FCL') ? 'selected' : ''; ?>>FCL</option>
                    </select>
                  </div>
                  <div class="form-group" style="<?php echo ($quotation['type_of_transport'] == 'Air Freight' ? '' : 'display: none;') ?>">
                    <label>Sea</label>
                    <select class="form-control" name="sea" title="air" required <?php echo ($quotation['type_of_transport'] == 'Air Freight' ? '' : 'disabled') ?>>
                      <option value="">- Select Sea -</option>
                      <option value="Express" <?= ($quotation['sea'] == 'Express') ? 'selected' : ''; ?>>Express</option>
                      <option value="Reguler" <?= ($quotation['sea'] == 'Reguler') ? 'selected' : ''; ?>>Reguler</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Incoterms</label>
                    <select class="form-control" name="incoterms" required <?=($quotation['type_of_service'] == 'CH' || $quotation['type_of_service'] == 'WH') ? 'disabled' : ''?>>
                      <option value="">-- Select One --</option>
                      <option value="EXW (ExWorks)" <?php echo ($quotation['incoterms'] == "EXW (ExWorks)" ? 'selected' : '') ?>>EXW (ExWorks)</option>
                      <option value="FCA (Free Carrier)" <?php echo ($quotation['incoterms'] == "FCA (Free Carrier)" ? 'selected' : '') ?>>FCA (Free Carrier)</option>
                      <option value="FAS (Free Alongside Ship)" <?php echo ($quotation['incoterms'] == "FAS (Free Alongside Ship)" ? 'selected' : '') ?>>FAS (Free Alongside Ship)</option>
                      <option value="FOB (Free On Board)" <?php echo ($quotation['incoterms'] == "FOB (Free On Board)" ? 'selected' : '') ?>>FOB (Free On Board)</option>
                      <option value="CFR (Cost and Freight" <?php echo ($quotation['incoterms'] == "CFR (Cost and Freight" ? 'selected' : '') ?>>CFR (Cost and Freight</option>
                      <option value="CIF (Cost Insurance Freight)" <?php echo ($quotation['incoterms'] == "CIF (Cost Insurance Freight)" ? 'selected' : '') ?>>CIF (Cost Insurance Freight)</option>
                      <option value="CIP (Carriage and Insurance Paid)" <?php echo ($quotation['incoterms'] == "CIP (Carriage and Insurance Paid)" ? 'selected' : '') ?>>CIP (Carriage and Insurance Paid)</option>
                      <option value="CPT (Carriage Paid To)" <?php echo ($quotation['incoterms'] == "CPT (Carriage Paid To)" ? 'selected' : '') ?>>CPT (Carriage Paid To)</option>
                      <option value="DAF (Delivered at Frontier)" <?php echo ($quotation['incoterms'] == "DAF (Delivered at Frontier)" ? 'selected' : '') ?>>DAF (Delivered at Frontier)</option>
                      <option value="DES (Delivered Ex Ship)" <?php echo ($quotation['incoterms'] == "DES (Delivered Ex Ship)" ? 'selected' : '') ?>>DES (Delivered Ex Ship)</option>
                      <option value="DEQ (Delivered Ex Quay)" <?php echo ($quotation['incoterms'] == "DEQ (Delivered Ex Quay)" ? 'selected' : '') ?>>DEQ (Delivered Ex Quay)</option>
                      <option value="DDU (Delivered Duty Unpaid)" <?php echo ($quotation['incoterms'] == "DDU (Delivered Duty Unpaid)" ? 'selected' : '') ?>>DDU (Delivered Duty Unpaid)</option>
                      <option value="DDP (Delivered Duty Paid)" <?php echo ($quotation['incoterms'] == "DDP (Delivered Duty Paid)" ? 'selected' : '') ?>>DDP (Delivered Duty Paid)</option>
                      <option value="DAT (Delivered At Terminal)" <?php echo ($quotation['incoterms'] == "DAT (Delivered At Terminal)" ? 'selected' : '') ?>>DAT (Delivered At Terminal)</option>
                      <option value="DAP (Delivered At Place)" <?php echo ($quotation['incoterms'] == "DAP (Delivered At Place)" ? 'selected' : '') ?>>DAP (Delivered At Place)</option>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Shipper Information</h6>
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="shipper_country" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($country['data'] as $data) { ?>
                        <option value="<?= $data['location'] ?>" <?php echo ($quotation['shipper_country'] == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="shipper_city" value="<?php echo $quotation['shipper_city'] ?>" placeholder="City" required>
                  </div>
                  <div class="form-group">
                    <label class="m-0"><input type="checkbox" class="checkbox-20" value="1" name="shipper_tba" onchange="tba_data('shipper')"> <span class="p-1" style="position: relative; top: -5px;">To Be Advice</span></label>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="shipper_postcode" value="<?php echo $quotation['shipper_postcode'] ?>" placeholder="Postcode">
                  </div>
                  <div class="form-group">
                    <label>Shipper Name</label>
                    <input type="text" class="form-control" name="shipper_name" value="<?php echo $quotation['shipper_name'] ?>" placeholder="Shipper Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="shipper_address" placeholder="Address" required><?php echo $quotation['shipper_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" class="form-control" name="shipper_contact_person" value="<?php echo $quotation['shipper_contact_person'] ?>" placeholder="Contact Person" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="shipper_phone_number" value="<?php echo $quotation['shipper_phone_number'] ?>" placeholder="Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="shipper_email" value="<?php echo $quotation['shipper_email'] ?>" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Consignee Information</h6>
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="consignee_country" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($country['data'] as $data) { ?>
                        <option value="<?= $data['location'] ?>"  <?php echo ($quotation['consignee_country'] == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="consignee_city" value="<?php echo $quotation['consignee_city'] ?>" placeholder="City" required>
                  </div>
                  <div class="form-group">
                    <label class="m-0"><input type="checkbox" class="checkbox-20" value="1" name="consignee_tba" onchange="tba_data('consignee')"> <span class="p-1" style="position: relative; top: -5px;">To Be Advice</span></label>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="consignee_postcode" value="<?php echo $quotation['consignee_postcode'] ?>" placeholder="Postcode">
                  </div>
                  <div class="form-group">
                    <label>Consignee Name</label>
                    <input type="text" class="form-control" name="consignee_name" value="<?php echo $quotation['consignee_name'] ?>" placeholder="Receiver Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="consignee_address" placeholder="Address" required><?php echo $quotation['consignee_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" class="form-control" name="consignee_contact_person" value="<?php echo $quotation['consignee_contact_person'] ?>" placeholder="Contact Person" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="consignee_phone_number" value="<?php echo $quotation['consignee_phone_number'] ?>" placeholder="Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="consignee_email" value="<?php echo $quotation['consignee_email'] ?>" placeholder="Email">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Cargo Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Description of Goods</label>
                    <input type="text" class="form-control" name="description_of_goods" placeholder="Description of Goods" value="<?php echo $quotation['description_of_goods'] ?>" required>
                  </div>
                </div>
                <div class="col-12">
                  <table class="table text-center" id="table_packages">
                    <thead>
                      <tr class="bg-info">
                        <th class="text-white font-weight-bold">Qty.</th>
                        <th class="text-white font-weight-bold">Package Type</th>
                        <th class="text-white font-weight-bold">Length(cm)</th>
                        <th class="text-white font-weight-bold">Width(cm)</th>
                        <th class="text-white font-weight-bold">Height(cm)</th>
                        <th class="text-white font-weight-bold">Weight(kg)</th>
                        <th class="text-white font-weight-bold"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cargo_list as $key => $value) : 
                        $cargo_temp[] = $value['id'];
                        ?>
                        <tr>
                          <td>
                            <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_qty[]" value="<?php echo $value['qty'] ?>">
                            <input type="hidden" class="form-control" name="id_cargo[]" value="<?php echo $value['id'] ?>">
                          </td>
                          <td>
                            <select class="form-control" name="cargo_piece_type[]" title="NONFCL" value="<?php echo $value['piece_type'] ?>">
                              <option value="">-- Select One --</option>
                              <?php foreach($package_type as $data) : ?>
                              <option value="<?=$data['name']?>" <?php echo ($value['piece_type'] == $data['name'] ? 'selected' : '') ?>><?=$data['name']?></option>
                              <?php endforeach; ?>
                            </select>
                            <select class="form-control d-none" name="cargo_piece_type[]" title="FCL" disabled>
                              <option value="">-- Select One --</option>
                              <option value="General Purpose" <?php echo ($value['piece_type'] == 'General Purpose' ? 'selected' : '') ?>>General Purpose</option>
                              <option value="High Cube" <?php echo ($value['piece_type'] == 'High Cube' ? 'selected' : '') ?>>High Cube</option>
                              <option value="Refrigerator" <?php echo ($value['piece_type'] == 'Refrigerator' ? 'selected' : '') ?>>Refrigerator</option>
                            </select>
                          </td>
                          <td>
                            <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_length[]" title="NONFCL" value="<?php echo $value['length']+0 ?>">
                            <select class="form-control d-none" name="cargo_size[]" title="FCL">
                              <option value="">-- Select One --</option>
                              <option value="20 feet" <?php echo ($value['size'] == '20 feet' ? 'selected' : '') ?>>20 feet</option>
                              <option value="40 feet" <?php echo ($value['size'] == '40 feet' ? 'selected' : '') ?>>40 feet</option>
                              <option value="45 feet" <?php echo ($value['size'] == '45 feet' ? 'selected' : '') ?>>45 feet</option>
                            </select>
                          </td>
                          <td>
                            <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_width[]" title="NONFCL" value="<?php echo $value['width']+0 ?>">
                            <input type="text" class="form-control d-none" step="any" name="cargo_container_no[]" title="FCL" value="<?php echo $value['container_no'] ?>">
                          </td>
                          <td>
                            <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_height[]" title="NONFCL" value="<?php echo $value['height']+0 ?>">
                            <input type="text" class="form-control d-none" step="any" name="cargo_seal_no[]" title="FCL" value="<?php echo $value['seal_no'] ?>">
                          </td>
                          <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_weight[]" value="<?php echo $value['weight']+0 ?>"></td>
                          <td>
                            <?php if ($key == 0) : ?>
                              <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                            <?php else : ?>
                              <button type="button" onclick="deleterow(this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <br>
                <div class="col-md-4">
                  Act. Weight : <span id="act_weight">0</span> Kg
                </div>
                <div class="col-md-4">
                  Vol. Weight : <span id="vol_weight">0</span> Kg
                </div>
                <div class="col-md-4">
                  Measurement : <span id="measurement">0</span> M<sup>3</sup>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Charges Information</h6>
              <div class="row clearfix">
                <div class="col-12">
                  <table class="table text-center">
                    <thead>
                      <tr class="bg-info">
                        <th nowrap class="text-white font-weight-bold min-w30px">Description</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">Quantity</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">UOM</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">Currency</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">Unit Price</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">Sub Total</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">Exchange Rate to IDR</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">Total</th>
                        <th nowrap class="text-white font-weight-bold min-w30px">Remarks</th>
                        <th nowrap class="text-white font-weight-bold min-w30px"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $total_all = 0;
                      foreach ($charges_list as $key => $value) : 
                        $charges_temp[] = $value['id'];
                        $persen = 1;
                        if($value['uom'] == "%"){
                          $persen = 100;
                        }
                        $total_all += ($value['qty'] / $persen)*$value['unit_price']*$value['exchange_rate'];
                    ?>
                      <tr>
                        <td>
                          <input type="text" class="form-control" name="charges_description[]" value="<?php echo $value['description'] ?>" required>
                          <input type="hidden" class="form-control" name="id_charges[]" value="<?php echo $value['id'] ?>">
                        </td>
                        <td><input type="number" step="any" class="form-control" value="<?php echo $value['qty'] ?>" oninput="get_total(this)" name="charges_qty[]"></td>
                        <td>
                          <select class="form-control" name="charges_uom[]" required onchange="get_total(this)">
                            <option value="">-- Select One --</option>
                            <!-- <option value="Kg" <?php echo ($value['uom'] == "Kg" ? 'selected' : '') ?>>Kg</option>
                            <option value="M3" <?php echo ($value['uom'] == "M3" ? 'selected' : '') ?>>M3</option>
                            <option value="Set" <?php echo ($value['uom'] == "Set" ? 'selected' : '') ?>>Set</option>
                            <option value="Trip" <?php echo ($value['uom'] == "Trip" ? 'selected' : '') ?>>Trip</option>
                            <option value="Pallet" <?php echo ($value['uom'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                            <option value="%" <?php echo ($value['uom'] == "%" ? 'selected' : '') ?>>%</option> -->
                            <?php foreach ($uom_list as $no_uom => $uom) : ?>
                              <option value="<?php echo $uom['name'] ?>" <?php echo ($value['uom'] == $uom['name'] ? 'selected' : '') ?>><?php echo $uom['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" name="charges_currency[]" required>
                            <option value="">-- Select One --</option>
                            <option value="AED" <?php echo ($value['currency'] == "AED" ? 'selected' : '') ?>>AED</option>
                            <option value="AUD" <?php echo ($value['currency'] == "AUD" ? 'selected' : '') ?>>AUD</option>
                            <option value="CNY" <?php echo ($value['currency'] == "CNY" ? 'selected' : '') ?>>CNY</option>
                            <option value="EUR" <?php echo ($value['currency'] == "EUR" ? 'selected' : '') ?>>EUR</option>
                            <option value="GBP" <?php echo ($value['currency'] == "GBP" ? 'selected' : '') ?>>GBP</option>
                            <option value="HKD" <?php echo ($value['currency'] == "HKD" ? 'selected' : '') ?>>HKD</option>
                            <option value="IDR" <?php echo ($value['currency'] == "IDR" ? 'selected' : '') ?>>IDR</option>
                            <option value="INR" <?php echo ($value['currency'] == "INR" ? 'selected' : '') ?>>INR</option>
                            <option value="JPY" <?php echo ($value['currency'] == "JPY" ? 'selected' : '') ?>>JPY</option>
                            <option value="KRW" <?php echo ($value['currency'] == "KRW" ? 'selected' : '') ?>>KRW</option>
                            <option value="MYR" <?php echo ($value['currency'] == "MYR" ? 'selected' : '') ?>>MYR</option>
                            <option value="SGD" <?php echo ($value['currency'] == "SGD" ? 'selected' : '') ?>>SGD</option>
                            <option value="THB" <?php echo ($value['currency'] == "THB" ? 'selected' : '') ?>>THB</option>
                            <option value="TWD" <?php echo ($value['currency'] == "TWD" ? 'selected' : '') ?>>TWD</option>
                            <option value="USD" <?php echo ($value['currency'] == "USD" ? 'selected' : '') ?>>USD</option>
                          </select>
                        </td>
                        <td><input type="number" step="any" class="form-control" value="<?php echo $value['unit_price'] ?>" oninput="get_total(this)" name="charges_unit_price[]"></td>
                        <td>
                          <input type="text" step="any" class="form-control" value="<?php echo number_format((($value['qty'] / $persen)*$value['unit_price']), 2) ?>" name="charges_subtotal_view[]" readonly>
                          <input type="hidden" step="any" class="form-control" value="<?php echo (($value['qty'] / $persen)*$value['unit_price']) ?>" name="charges_subtotal[]" readonly>
                        </td>
                        <td><input type="number" step="any" class="form-control" value="<?php echo $value['exchange_rate'] ?>" oninput="get_total(this)" name="charges_exchange_rate[]"></td>
                        <td>
                          <input type="text" step="any" class="form-control" value="<?php echo number_format((($value['qty'] / $persen)*$value['unit_price']*$value ['exchange_rate']), 0).".00" ?>" name="charges_total_view[]" readonly>
                          <input type="hidden" step="any" class="form-control" value="<?php echo (($value['qty'] / $persen)*$value['unit_price']*$value['exchange_rate']) ?>" name="charges_total[]" readonly>
                        </td>
                        <td><textarea class="form-control" name="charges_remarks[]" placeholder="..."><?php echo $value['remarks'] ?></textarea></td>
                        <td>
                          <?php if ($key == 0) : ?>
                            <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                          <?php else : ?>
                            <button type="button" onclick="deleterow(this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="row clearfix">
                  <div class="col-md">
                    <h5 class="font-weight-bold text-right">Total All : IDR <span id="total_all" name="total_all"><?php echo number_format($total_all, 0).".00" ?></span></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Addtional</h6>
              <input type="hidden" name="temp_cargo_id" value="<?=implode("|", $cargo_temp);?>" />
              <input type="hidden" name="temp_charges_id" value="<?=implode("|", $charges_temp)?>" />
              <div class="row clearfix">
                <div class="col-md-12">
                  <table class="table text-center">
                    <thead>
                      <tr class="bg-info">
                        <th class="text-white font-weight-bold">Terms and Conditions</th>
                        <th class="text-white font-weight-bold" style="width: 1%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $term_condition = explode("\n", $quotation['term_condition']);
                        foreach ($term_condition as $key => $value) : 
                      ?>
                      <tr>
                        <td><input type="text" class="form-control" name="term_condition[]" value="<?php echo $value ?>"></td>
                        <td>
                          <?php if ($key == 0) : ?>
                            <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                          <?php else : ?>
                            <button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <div class="row clearfix">
                <div class="col text-right">
                  <a href="#" class="btn btn-danger">Cancel</a>
                  <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
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
  $("select[name=type_of_transport]").on("change", function() {
    var value = $(this).val();
    $("select[name=sea]").closest('.form-group').slideUp();
    $("select[name=sea]").attr("disabled", "disabled");
    if (value == 'Sea Transport') {
      $("select[name=sea][title=sea]").closest('.form-group').slideDown();
      $("select[name=sea][title=sea]").removeAttr("disabled");
    } else if (value == 'Air Freight') {
      $("select[name=sea][title=air]").closest('.form-group').slideDown();
      $("select[name=sea][title=air]").removeAttr("disabled");
    }
    $("select[name=sea]").val('');
    change_sea(value);
  });

  $("select[name=sea]").on("change", function() {
    var value = $(this).val();
    change_sea(value);
  });

  function change_sea(text, delete_data = 1) {
    if(delete_data == 1){
      $("#table_packages input[type=text]").val('');
      $("#table_packages input[type=number]").val(0);
      $("#table_packages select").val('').trigger('change');
    }
    if(text == 'FCL'){
      $("#table_packages th:nth-child(2)").html('Container Type');
      $("#table_packages th:nth-child(3)").html('Container Size');
      $("#table_packages th:nth-child(4)").html('Container No.');
      $("#table_packages th:nth-child(5)").html('Seal No.');
      $("#table_packages th:nth-child(6)").html('Gross Weight');
      $("#table_packages input[title=FCL], #table_packages select[title=FCL]").removeClass('d-none');
      $("#table_packages input[title=NONFCL], #table_packages select[title=NONFCL]").addClass('d-none');
      $("#table_packages select[name='piece_type[]'][title=FCL]").removeAttr("disabled");
      $("#table_packages select[name='piece_type[]'][title=NONFCL]").attr("disabled", "disabled");
    }
    else{
      $("#table_packages th:nth-child(2)").html('Package Type');
      $("#table_packages th:nth-child(3)").html('Length(cm)');
      $("#table_packages th:nth-child(4)").html('Width(cm)');
      $("#table_packages th:nth-child(5)").html('Height(cm)');
      $("#table_packages th:nth-child(6)").html('Weight(kg)');
      $("#table_packages input[title=FCL], #table_packages select[title=FCL]").addClass('d-none');
      $("#table_packages input[title=NONFCL], #table_packages select[title=NONFCL]").removeClass('d-none');
      $("#table_packages select[name='piece_type[]'][title=FCL]").attr("disabled", "disabled");
      $("#table_packages select[name='piece_type[]'][title=NONFCL]").removeAttr("disabled");
    }
  }

  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    $(btn).closest("tbody").find("tr:last").find("input").val('');
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }

  $("select[name=type_of_service]").on("change", function(){
    var value = $(this).val();
    if(value == 'CH' || value == 'WH'){
      $("select[name=type_of_shipment]").val('').attr("disabled", true);
      $("select[name=incoterms]").val('').attr("disabled", true);
    }else{
      $("select[name=type_of_shipment]").removeAttr("disabled");
      $("select[name=incoterms]").removeAttr("disabled");
    }
  });

  function deletecargo(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>quotation/quotation_cargo_delete_process/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Cargo data has been Delete!');
        }
      });
    }
  }

  function deletecharges(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>quotation/quotation_charges_delete_process/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Cargo data has been Delete!');
        }
      });
    }
  }

  $(document).ready(function (){
    get_vol_weight();
    change_sea($("select[name=sea]").val(), 0);
    <?php if($quotation['shipper_tba'] == 1): ?>
    tba_data('shipper');
    $('input[name=shipper_tba]').prop("checked", true);
    <?php endif; ?>
    <?php if($quotation['consignee_tba'] == 1): ?>
    tba_data('consignee');
    $('input[name=consignee_tba]').prop("checked", true);
    <?php endif; ?>
  });

  function get_vol_weight() {
    var type_of_transport = $("select[name=type_of_transport]").val();
    var per = 1;
    var total_act_weight = 0;
    var total_vol_weight = 0;
    var total_measurement = 0;
    var length_array = [];
    var width_array = [];
    var height_array = [];
    var weight_array = [];
    var qty_array = [];

    if (type_of_transport == 'Air Freight') {
      per = 6000;
    } else if (type_of_transport == 'Land Shipping') {
      per = 4000;
    } else if (type_of_transport == 'Sea Transport') {
      per = 4000;
    }

    $("input[name='cargo_length[]']").each(function(index, value) {
      var length_detail = $(this).val();

      length_array.push(length_detail);
    });

    $("input[name='cargo_width[]']").each(function(index, value) {
      var width_detail = $(this).val();

      width_array.push(width_detail);
    });

    $("input[name='cargo_height[]']").each(function(index, value) {
      var height_detail = $(this).val();

      height_array.push(height_detail);
    });

    $("input[name='cargo_weight[]']").each(function(index, value) {
      var weight_detail = $(this).val();

      weight_array.push(weight_detail);
    });

    $("input[name='cargo_qty[]']").each(function(index, value) {
      var qty_detail = $(this).val();

      qty_array.push(qty_detail);
    });


    $.each(length_array, function(index, value) {
      // console.log(length_array[index], width_array[index], height_array[index], weight_array[index], qty_array[index], per);
      var actual_weight = qty_array[index] * weight_array[index];
      var volume_weight = qty_array[index] * (length_array[index] * width_array[index] * height_array[index]) / per;
      var measurement = qty_array[index] * (length_array[index] * width_array[index] * height_array[index]) / 1000000;

      console.log(volume_weight+ " = "+qty_array[index]+" * ("+length_array[index]+" * "+width_array[index]+" * "+height_array[index]+") / "+per);

      total_act_weight += actual_weight;
      total_vol_weight += volume_weight;
      total_measurement += measurement;
    });

    $("#act_weight").html(total_act_weight.toLocaleString('en-US', {
      maximumFractionDigits: 2,
      minimumFractionDigits: 2
    }));
    $("#vol_weight").html(total_vol_weight.toLocaleString('en-US', {
      maximumFractionDigits: 2,
      minimumFractionDigits: 2
    }));
    $("#measurement").html(total_measurement.toLocaleString('en-US', {
      maximumFractionDigits: 2,
      minimumFractionDigits: 2
    }));

  }

function get_total(input = "") {
  if (input != "") {
    var row = $(input).closest('tr');
    var unit_price = $(row).find("input[name='charges_unit_price[]']").val();
    var qty = $(row).find("input[name='charges_qty[]']").val();
    var uom = $(row).find("select[name='charges_uom[]']").val();
    if (uom == "%") {
      qty = qty / 100;
    }
    var subtotal = qty * unit_price;
    $(row).find("input[name='charges_subtotal[]']").val(subtotal);
    $(row).find("input[name='charges_subtotal_view[]']").val(subtotal.toLocaleString('en-US', {maximumFractionDigits:2, minimumFractionDigits: 2}));

    var exchange_rate = $(row).find("input[name='charges_exchange_rate[]']").val();
    var total = subtotal * exchange_rate;
    $(row).find("input[name='charges_total[]']").val(total);
    $(row).find("input[name='charges_total_view[]']").val(total.toLocaleString('en-US', {
      maximumFractionDigits: 0
    }) + ".00");
  }

  var total_all = 0;
  $("input[name='charges_total[]']").each(function(index, value) {
    var total_row = parseFloat($(this).val());
    total_all = total_all + total_row + 0;
  });

  // var vat = Number($("input[name=vat]").val());
  // var discount = Number($("input[name=discount]").val());
  // console.log(total_all);
  // total_all = total_all + vat + 0;
  // console.log(total_all);
  // total_all = total_all - discount + 0;
  // console.log(total_all);
  // $(input).closest('form').find("span[name=total_all]").text(total_all);
  $("#total_all").text(total_all.toLocaleString('en-US', {
    maximumFractionDigits: 0
  }) + ".00");
}

function tba_data(data_tba) {
  var ro = $("input[name="+data_tba+"_name]").prop('readonly');
  var req = $("input[name="+data_tba+"_name]").prop('required');
  $("input[name="+data_tba+"_postcode]").val('').prop('readonly', !ro);
  $("input[name="+data_tba+"_name]").val('').prop('readonly', !ro).prop('required', !req);
  $("textarea[name="+data_tba+"_address]").val('').prop('readonly', !ro).prop('required', !req);
  $("input[name="+data_tba+"_contact_person]").val('').prop('readonly', !ro).prop('required', !req);
  $("input[name="+data_tba+"_phone_number]").val('').prop('readonly', !ro).prop('required', !req);
  $("input[name="+data_tba+"_email]").val('').prop('readonly', !ro);
}
</script>