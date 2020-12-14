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
                    <input type="text" class="form-control" name="customer_account" value="<?php echo $quotation['customer_account'] ?>" placeholder="Account No." oninput="check_custumer(this);" required>
                  </div>
                  <div class="form-group">
                    <label>Customer Contact Person</label>
                    <input type="text" class="form-control" name="customer_contact_person" value="<?php echo $quotation['customer_contact_person'] ?>" placeholder="Customer Contact Person" required>
                  </div>
                  <div class="form-group">
                    <label>Customer Email</label>
                    <input type="email" class="form-control" name="customer_email" value="<?php echo $quotation['customer_email'] ?>" placeholder="Customer Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" value="<?php echo $quotation['customer_name'] ?>" placeholder="Customer Name" required>
                  </div>
                  <div class="form-group">
                    <label>Customer Phone Number</label>
                    <input type="text" class="form-control" name="customer_phone_number" value="<?php echo $quotation['customer_phone_number'] ?>" placeholder="Customer Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label>Customer Address</label>
                    <textarea class="form-control" name="customer_address" placeholder="Customer Address" required><?php echo $quotation['customer_address'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Attn.</label>
                    <input type="text" class="form-control" name="attn" value="<?php echo $quotation['attn'] ?>" placeholder="Attn." required>
                  </div>
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" value="<?php echo $quotation['subject'] ?>" placeholder="Subject" required>
                  </div>
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <input type="text" class="form-control" name="payment_terms" value="<?php echo $quotation['payment_terms'] ?>" placeholder="Payment Terms" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- <div class="form-group">
                    <label>Quotation No.</label>
                    <input type="text" class="form-control" name="quotation_no" value="<?php echo $quotation['quotation_no'] ?>" placeholder="Quotation No." required>
                  </div> -->
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
                    <input type="text" class="form-control" name="created_by" value="<?php echo $quotation['created_by'] ?>" placeholder="Prepared By" value="<?php echo $this->session->userdata('name') ?>" disabled>
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
                    <label>Type of Service</label>
                    <select class="form-control" name="type_of_service" required disabled>
                      <option value="">-- Select One --</option>
                      <option value="FH" <?php echo ($quotation['type_of_service'] == 'FH' ? 'selected' : '' ) ?>>Freight Handling</option>
                      <option value="CH" <?php echo ($quotation['type_of_service'] == 'CH' ? 'selected' : '' ) ?>>Clearance Handling</option>
                      <option value="WH" <?php echo ($quotation['type_of_service'] == 'WH' ? 'selected' : '' ) ?>>Warehousing</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Incoterms</label>
                    <select class="form-control" name="incoterms" required>
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
              <br>
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Shipper Information</h6>
                  <div class="form-group">
                    <label>Shipper Name</label>
                    <input type="text" class="form-control" name="shipper_name" value="<?php echo $quotation['shipper_name'] ?>" placeholder="Shipper Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="shipper_address" placeholder="Address" required><?php echo $quotation['shipper_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="shipper_city" value="<?php echo $quotation['shipper_city'] ?>" placeholder="City" required>
                  </div>
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
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="shipper_postcode" value="<?php echo $quotation['shipper_postcode'] ?>" placeholder="Postcode">
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
                    <label>Consignee Name</label>
                    <input type="text" class="form-control" name="consignee_name" value="<?php echo $quotation['consignee_name'] ?>" placeholder="Receiver Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="consignee_address" placeholder="Address" required><?php echo $quotation['consignee_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="consignee_city" value="<?php echo $quotation['consignee_city'] ?>" placeholder="City" required>
                  </div>
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
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="consignee_postcode" value="<?php echo $quotation['consignee_postcode'] ?>" placeholder="Postcode">
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
                <div class="col-12">
                  <table class="table text-center">
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
                      <?php foreach ($cargo_list as $key => $value) : ?>
                        <tr>
                          <td>
                            <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_qty[]" value="<?php echo $value['qty'] ?>">
                            <input type="hidden" class="form-control" name="id_cargo[]" value="<?php echo $value['id'] ?>">
                          </td>
                          <td>
                            <select class="form-control" name="cargo_piece_type[]" value="<?php echo $value['piece_type'] ?>">
                              <option value="">-- Select One --</option>
                              <option value="Pallet" <?php echo ($value['piece_type'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                              <option value="Carton" <?php echo ($value['piece_type'] == "Carton" ? 'selected' : '') ?>>Carton</option>
                              <option value="Crate" <?php echo ($value['piece_type'] == "Crate" ? 'selected' : '') ?>>Crate</option>
                              <option value="Loose" <?php echo ($value['piece_type'] == "Loose" ? 'selected' : '') ?>>Loose</option>
                              <option value="Container 20 GP" <?php echo ($value['piece_type'] == "Container 20 GP" ? 'selected' : '') ?>>Container 20 GP</option>
                              <option value="Container 40 GP" <?php echo ($value['piece_type'] == "Container 40 GP" ? 'selected' : '') ?>>Container 40 GP</option>
                              <option value="Others" <?php echo ($value['piece_type'] == "Others" ? 'selected' : '') ?>>Others</option>
                            </select>
                          </td>
                          <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_length[]" value="<?php echo $value['length']+0 ?>"></td>
                          <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_width[]" value="<?php echo $value['width']+0 ?>"></td>
                          <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_height[]" value="<?php echo $value['height']+0 ?>"></td>
                          <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="cargo_weight[]" value="<?php echo $value['weight']+0 ?>"></td>
                          <td>
                            <?php if ($key == 0) : ?>
                              <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                            <?php else : ?>
                              <button type="button" onclick="deletepackage('<?php echo $value['id'] ?>', this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
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
                            <option value="Kg" <?php echo ($value['uom'] == "Kg" ? 'selected' : '') ?>>Kg</option>
                            <option value="M3" <?php echo ($value['uom'] == "M3" ? 'selected' : '') ?>>M3</option>
                            <option value="Set" <?php echo ($value['uom'] == "Set" ? 'selected' : '') ?>>Set</option>
                            <option value="Trip" <?php echo ($value['uom'] == "Trip" ? 'selected' : '') ?>>Trip</option>
                            <option value="Pallet" <?php echo ($value['uom'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                            <option value="%" <?php echo ($value['uom'] == "%" ? 'selected' : '') ?>>%</option>
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
                          <input type="text" step="any" class="form-control" value="<?php echo number_format((($value['qty'] / $persen)*$value['unit_price']), 0).".00" ?>" name="charges_subtotal_view[]" readonly>
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
                            <button type="button" onclick="deletecost('<?php echo $value['id'] ?>', this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
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
              <div class="row clearfix">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Terms and Conditions:</label>
                    <textarea rows="5" class="form-control" name="term_condition" placeholder="Terms and Conditions" required><?php echo $quotation['term_condition'] ?></textarea>
                  </div>
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
  $("select[name=type_of_mode]").on("change", function() {
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
  });

  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }

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
  });

  function get_vol_weight() {
    var type_of_mode = $("select[name=type_of_mode]").val();
    var per = 1;
    var total_act_weight = 0;
    var total_vol_weight = 0;
    var total_measurement = 0;
    var length_array = [];
    var width_array = [];
    var height_array = [];
    var weight_array = [];
    var qty_array = [];

    if (type_of_mode == 'Air Freight') {
      per = 6000;
    } else if (type_of_mode == 'Land Shipping') {
      per = 5000;
    } else if (type_of_mode == 'Sea Transport') {
      per = 5000;
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
      console.log(length_array[index], width_array[index], height_array[index], weight_array[index], qty_array[index], per);
      var actual_weight = qty_array[index] * weight_array[index];
      var volume_weight = qty_array[index] * (length_array[index] * width_array[index] * height_array[index]) / per;
      var measurement = qty_array[index] * (length_array[index] * width_array[index] * height_array[index]) / 1000000;

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
</script>