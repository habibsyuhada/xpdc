<?php
if (!isset($cargo_list)) {
  $cargo_list = [];
}
?>
<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>shipment/shipment_receipt" method="POST" class="forms-sample" enctype="multipart/form-data" id="form_input">
      <?php if (isset($id_quotation)) : ?>
        <input type="hidden" name="id_quotation" value="<?php echo $id_quotation ?>">
      <?php endif; ?>
      <?php if (isset($quotation['check_price_term'])) : ?>
        <input type="hidden" name="check_price_term" value="<?php echo $quotation['check_price_term'] ?>">
        <input type="hidden" name="check_price_weight" value="<?php echo $quotation['check_price_weight'] ?>">
        <input type="hidden" name="check_price_weight_fix" value="<?php echo $quotation['check_price_weight_fix'] ?>">
      <?php endif; ?>
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php if ($this->session->userdata('role') == "Customer") : ?>
                  <li class="nav-item">
                    <a class="nav-link active" id="shipper-consignee-tab" data-toggle="tab" href="#shipper-consignee" role="tab" aria-controls="shipper-consignee" aria-selected="true">Shipper & Consignee Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="shipment-info-tab" data-toggle="tab" href="#shipment-info" role="tab" aria-controls="shipment-info" aria-selected="false">Shipment Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pickup-info-tab" data-toggle="tab" href="#pickup-info" role="tab" aria-controls="pickup-info" aria-selected="false">Pick Up Information</a>
                  </li>
                <?php else : ?>
                  <li class="nav-item">
                    <a class="nav-link active" id="service-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="true">Service Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="shipper-consignee-tab" data-toggle="tab" href="#shipper-consignee" role="tab" aria-controls="shipper-consignee" aria-selected="false">Shipper & Consignee Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="shipment-info-tab" data-toggle="tab" href="#shipment-info" role="tab" aria-controls="shipment-info" aria-selected="false">Shipment Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pickup-info-tab" data-toggle="tab" href="#pickup-info" role="tab" aria-controls="pickup-info" aria-selected="false">Pick Up Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="false">Billing Details</a>
                  </li>
                  <!-- <li class="nav-item">
                  <a class="nav-link" id="shipping-info-tab" data-toggle="tab" href="#shipping-info" role="tab" aria-controls="shipping-info" aria-selected="false">Shipping Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="assign-shipment-tab" data-toggle="tab" href="#assign-shipment" role="tab" aria-controls="assign-shipment" aria-selected="false">Assign Shipment</a>
                </li> -->
                <?php endif; ?>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade <?php echo ($this->session->userdata('role') != "Customer" ? 'show active' : '') ?>" id="service" role="tabpanel" aria-labelledby="service-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Service Information</h6>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type of Shipment</label>
                        <?php if ($this->session->userdata('role') != "Customer") { ?>
                          <select class="form-control" name="type_of_shipment" required onchange="change_typeshipment(this);">
                            <option value="">-- Select One --</option>
                            <option value="International Shipping" <?php echo (@$quotation['type_of_shipment'] == "International Shipping" ? "selected" : "") ?>>International Shipping</option>
                            <option value="Domestic Shipping" <?php echo (@$quotation['type_of_shipment'] == "Domestic Shipping" ? "selected" : "") ?>>Domestic Shipping</option>
                          </select>
                        <?php } else { ?>
                          <input type="text" class="form-control" name="type_of_shipment" value="<?php echo @$quotation['type_of_shipment'] ?>" placeholder="Type of Shipment" readonly required>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type of Mode</label>
                        <?php if ($this->session->userdata('role') != "Customer") { ?>
                          <select class="form-control" name="type_of_mode" onchange="get_vol_weight()" required>
                            <option value="">- Select One -</option>
                            <option value="Sea Transport" <?php echo (@$quotation['type_of_transport'] == "Sea Transport" ? "selected" : "") ?>>Sea Transport</option>
                            <option value="Land Shipping" <?php echo (@$quotation['type_of_transport'] == "Land Shipping" ? "selected" : "") ?>>Land Shipping</option>
                            <option value="Air Freight" <?php echo (@$quotation['type_of_transport'] == "Air Freight" ? "selected" : "") ?>>Air Freight</option>
                          </select>
                        <?php } else { ?>
                          <input type="text" class="form-control" name="type_of_mode" value="<?php echo @$quotation['type_of_transport'] ?>" placeholder="Type of Mode" readonly required>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group" style="<?php echo (@$quotation['type_of_transport'] == 'Sea Transport' ? '' : 'display: none;') ?>">
                        <label>Sea</label>
                        <?php if ($this->session->userdata('role') != "Customer") { ?>
                          <select class="form-control" name="sea" title="sea" required <?php echo (@$quotation['type_of_transport'] == 'Sea Transport' ? '' : 'disabled') ?>>
                            <option value="">- Select Sea -</option>
                            <option value="LCL" <?php echo (@$quotation['sea'] == "LCL" ? "selected" : "") ?>>LCL</option>
                            <option value="FCL" <?php echo (@$quotation['sea'] == "FCL" ? "selected" : "") ?>>FCL</option>
                          </select>
                        <?php } else { ?>
                          <input type="text" class="form-control" name="sea" value="-" placeholder="Sea" readonly required>
                        <?php } ?>
                      </div>
                      <div class="form-group" style="<?php echo (@$quotation['type_of_transport'] == 'Air Freight' ? '' : 'display: none;') ?>">
                        <label>Type</label>
                        <?php if ($this->session->userdata('role') != "Customer") { ?>
                          <select class="form-control" name="sea" title="air" required <?php echo (@$quotation['type_of_transport'] == 'Air Freight' ? '' : 'disabled') ?>>
                            <option value="">- Select Type -</option>
                            <option value="Express" <?php echo (@$quotation['sea'] == "Express" ? "selected" : "") ?>>Express</option>
                            <option value="Reguler" <?php echo (@$quotation['sea'] == "Reguler" ? "selected" : "") ?>>Reguler</option>
                          </select>
                        <?php } else { ?>
                          <input type="text" class="form-control" name="sea" value="Reguler" placeholder="Type" readonly required>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-left col-6">
                      <span class="btn btn-danger previous-tab">Back</span>
                    </div>
                    <div class="text-right col-6">
                      <span class="btn btn-info next-tab">Next</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade <?php echo ($this->session->userdata('role') == "Customer" ? 'show active' : '') ?>" id="shipper-consignee" role="tabpanel" aria-labelledby="shipper-consignee-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Shipper Information</h6>
                      <div class="form-group">
                        <label>Shipper Name</label>
                        <input type="text" class="form-control" name="shipper_name" value="<?php echo @$quotation['shipper_name'] ?>" placeholder="Shipper Name" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?> oninput="$('[name=shipper_contact_person]').val(this.value)" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="shipper_address" placeholder="Address" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?> required><?php echo @$quotation['shipper_address'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <?php if ($this->session->userdata('role') != "Customer" || $this->session->userdata('id') == "Guest") { ?>
                          <select class="form-control select2" name="shipper_country" required onchange="select_country(this)">
                            <option value="">- Select One -</option>
                            <?php foreach ($country as $data) { ?>
                              <option value="<?= $data['country'] ?>" <?php echo (@$quotation['shipper_country'] == $data['country'] ? 'selected' : '') ?>><?= $data['country'] ?></option>
                            <?php } ?>
                          </select>
                        <?php } else { ?>
                          <input type="text" class="form-control" name="shipper_country" value="<?php echo @$quotation['shipper_country'] ?>" placeholder="Shipper Country" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?> required>
                        <?php } ?>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="shipper_city" value="<?php echo @$quotation['shipper_city'] ?>" placeholder="City" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?>>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="shipper_postcode" value="<?php echo @$quotation['shipper_postcode'] ?>" placeholder="Postcode" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?>>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="shipper_contact_person" value="<?php echo @$quotation['shipper_contact_person'] ?>" placeholder="Contact Person" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?> required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="shipper_phone_number" value="<?php echo @$quotation['shipper_phone_number'] ?>" placeholder="Phone Number" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?> required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="shipper_email" value="<?php echo @$quotation['shipper_email'] ?>" placeholder="Email" <?= ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") ? 'readonly' : '' ?>>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Consignee Information</h6>
                      <div class="form-group">
                        <label>Consignee Name</label>
                        <input type="text" class="form-control" name="consignee_name" value="<?php echo @$quotation['consignee_name'] ?>" placeholder="Receiver Name" required oninput="$('[name=consignee_contact_person]').val(this.value)">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="consignee_address" placeholder="Address" required><?php echo @$quotation['consignee_address'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <?php if ($this->session->userdata('role') != "Customer") { ?>
                          <select class="form-control select2" name="consignee_country" required onchange="select_country(this)">
                            <option value="">- Select One -</option>
                            <?php foreach ($country as $data) { ?>
                              <option value="<?= $data['country'] ?>" <?php echo (@$quotation['consignee_country'] == $data['country'] ? 'selected' : '') ?>><?= $data['country'] ?></option>
                            <?php } ?>
                          </select>
                        <?php } else { ?>
                          <input type="text" class="form-control" name="consignee_country" value="<?php echo @$quotation['consignee_country'] ?>" placeholder="Consignee Country" <?= ($this->session->userdata('role') == "Customer") ? 'readonly' : '' ?> required>
                        <?php } ?>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="consignee_city" value="<?php echo @$quotation['consignee_city'] ?>" placeholder="City" <?= ($this->session->userdata('role') == "Customer") ? 'readonly' : '' ?>>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="consignee_postcode" value="<?php echo @$quotation['consignee_postcode'] ?>" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="consignee_contact_person" value="<?php echo @$quotation['consignee_contact_person'] ?>" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="consignee_phone_number" value="<?php echo @$quotation['consignee_phone_number'] ?>" placeholder="Phone Number" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="consignee_email" value="<?php echo @$quotation['consignee_email'] ?>" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-right col-12">
                      <span class="btn btn-info next-tab">Next</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="shipment-info" role="tabpanel" aria-labelledby="shipment-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Shipment Information</h6>
                    </div>

                    <?php if ($this->session->userdata('role') == 'Customer') : ?>
                      <input type="hidden" name="incoterms" value="">
                    <?php else : ?>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Incoterms</label>
                          <select class="form-control select2" name="incoterms" <?php echo (@$quotation['type_of_shipment'] == 'Domestic Shipping' ? 'disabled' : '') ?>>
                            <option value="">-- Select One --</option>
                            <option value="EXW (ExWorks)" <?php echo (@$quotation['incoterms'] == "EXW (ExWorks)" ? 'selected' : '') ?>>EXW (ExWorks)</option>
                            <option value="FCA (Free Carrier)" <?php echo (@$quotation['incoterms'] == "FCA (Free Carrier)" ? 'selected' : '') ?>>FCA (Free Carrier)</option>
                            <option value="FAS (Free Alongside Ship)" <?php echo (@$quotation['incoterms'] == "FAS (Free Alongside Ship)" ? 'selected' : '') ?>>FAS (Free Alongside Ship)</option>
                            <option value="FOB (Free On Board)" <?php echo (@$quotation['incoterms'] == "FOB (Free On Board)" ? 'selected' : '') ?>>FOB (Free On Board)</option>
                            <option value="CFR (Cost and Freight" <?php echo (@$quotation['incoterms'] == "CFR (Cost and Freight" ? 'selected' : '') ?>>CFR (Cost and Freight</option>
                            <option value="CIF (Cost Insurance Freight)" <?php echo (@$quotation['incoterms'] == "CIF (Cost Insurance Freight)" ? 'selected' : '') ?>>CIF (Cost Insurance Freight)</option>
                            <option value="CIP (Carriage and Insurance Paid)" <?php echo (@$quotation['incoterms'] == "CIP (Carriage and Insurance Paid)" ? 'selected' : '') ?>>CIP (Carriage and Insurance Paid)</option>
                            <option value="CPT (Carriage Paid To)" <?php echo (@$quotation['incoterms'] == "CPT (Carriage Paid To)" ? 'selected' : '') ?>>CPT (Carriage Paid To)</option>
                            <option value="DAF (Delivered at Frontier)" <?php echo (@$quotation['incoterms'] == "DAF (Delivered at Frontier)" ? 'selected' : '') ?>>DAF (Delivered at Frontier)</option>
                            <option value="DES (Delivered Ex Ship)" <?php echo (@$quotation['incoterms'] == "DES (Delivered Ex Ship)" ? 'selected' : '') ?>>DES (Delivered Ex Ship)</option>
                            <option value="DEQ (Delivered Ex Quay)" <?php echo (@$quotation['incoterms'] == "DEQ (Delivered Ex Quay)" ? 'selected' : '') ?>>DEQ (Delivered Ex Quay)</option>
                            <option value="DDU (Delivered Duty Unpaid)" <?php echo (@$quotation['incoterms'] == "DDU (Delivered Duty Unpaid)" ? 'selected' : '') ?>>DDU (Delivered Duty Unpaid)</option>
                            <option value="DDP (Delivered Duty Paid)" <?php echo (@$quotation['incoterms'] == "DDP (Delivered Duty Paid)" ? 'selected' : '') ?>>DDP (Delivered Duty Paid)</option>
                            <option value="DAT (Delivered At Terminal)" <?php echo (@$quotation['incoterms'] == "DAT (Delivered At Terminal)" ? 'selected' : '') ?>>DAT (Delivered At Terminal)</option>
                            <option value="DAP (Delivered At Place)" <?php echo (@$quotation['incoterms'] == "DAP (Delivered At Place)" ? 'selected' : '') ?>>DAP (Delivered At Place)</option>
                          </select>
                        </div>
                      </div>
                    <?php endif; ?>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Insurance</label>
                        <select class="form-control" name="insurance" required>
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description of Goods</label>
                        <input type="text" class="form-control" name="description_of_goods" placeholder="Description of Goods" value="<?php echo @$quotation['description_of_goods'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Declared Value</label>
                        <input type="text" class="form-control" name="declared_value" placeholder="Declared Value" required>
                      </div>
                    </div>

                    <?php if ($this->session->userdata('role') == 'Customer') : ?>
                      <input type="hidden" name="hscode" value="0000.00.00">
                    <?php else : ?>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>HSCode</label>
                          <input type="text" class="form-control" name="hscode" placeholder="HSCode" data-inputmask='"mask": "9999.99.99", "type": "reverse"' <?php echo (@$quotation['type_of_shipment'] == 'Domestic Shipping' ? 'readonly' : '') ?> value="0000.00.00" data-mask>
                          <!-- <input type="text" class="form-control" name="hscode" placeholder="HSCode" required> -->
                        </div>
                      </div>
                    <?php endif; ?>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Currency</label>
                        <?php if ($this->session->userdata('role') == 'Customer') : ?>
                          <input type="text" class="form-control" name="coo" value="IDR" readonly>
                        <?php else : ?>
                          <select class="form-control" name="currency" <?php echo (@$quotation['type_of_shipment'] == 'Domestic Shipping' ? 'disabled' : '') ?> required>
                            <option value="">-- Select One --</option>
                            <option value="AED">AED</option>
                            <option value="AUD">AUD</option>
                            <option value="CNY">CNY</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="HKD">HKD</option>
                            <option value="IDR">IDR</option>
                            <option value="INR">INR</option>
                            <option value="JPY">JPY</option>
                            <option value="KRW">KRW</option>
                            <option value="MYR">MYR</option>
                            <option value="SGD">SGD</option>
                            <option value="THB">THB</option>
                            <option value="TWD">TWD</option>
                            <option value="USD">USD</option>
                          </select>
                        <?php endif; ?>
                      </div>
                    </div>

                    <?php if ($this->session->userdata('role') == 'Customer') : ?>
                      <input type="hidden" name="coo" value="">
                    <?php else : ?>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>COO (Country of Origin)</label>
                          <select class="form-control select2" name="coo" <?php echo (@$quotation['type_of_shipment'] == 'Domestic Shipping' ? 'disabled' : '') ?>>
                            <option value="">- Select One -</option>
                            <?php foreach ($country as $data) { ?>
                              <option value="<?= $data['country'] ?>"><?= $data['country'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    <?php endif; ?>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Ref No.</label>
                        <input type="text" class="form-control" name="ref_no" placeholder="Ref No.">
                      </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <table class="table text-center" id="table_packages">
                        <thead>
                          <tr class="bg-info">
                            <th class="text-white font-weight-bold">Qty.</th>
                            <th class="text-white font-weight-bold">Package Type</th>
                            <th class="text-white font-weight-bold">Length(cm)</th>
                            <th class="text-white font-weight-bold">Width(cm)</th>
                            <th class="text-white font-weight-bold">Height(cm)</th>
                            <th class="text-white font-weight-bold">Weight(kg)</th>
                            <?php if ($this->session->userdata('role') != 'Customer') { ?>
                              <th class="text-white font-weight-bold"></th>
                            <?php } ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (count($cargo_list) > 0) : ?>
                            <?php foreach ($cargo_list as $key => $value) : ?>
                              <tr>
                                <td>
                                  <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="qty[]" value="<?php echo $value['qty'] ?>" <?= ($this->session->userdata('role') == 'Customer') ? 'readonly' : ''; ?>>
                                  <?php if ($this->session->userdata('role') != 'Customer') { ?>
                                    <input type="hidden" class="form-control" name="id_detail[]" value="<?php echo @$value['id'] ?>">
                                  <?php } ?>
                                </td>
                                <td>

                                  <?php if ($this->session->userdata('role') == 'Customer') : ?>
                                    <input type="input" class="form-control" name="piece_type[]" title="NONFCL" value="<?php echo $value['piece_type'] ?>" readonly />
                                  <?php else : ?>
                                    <select class="form-control" name="piece_type[]" title="NONFCL" value="<?php echo $value['piece_type'] ?>" <?= ($this->session->userdata('role') == 'Customer') ? 'disabled' : ''; ?>>
                                      <option value="">-- Select One --</option>
                                      <?php foreach ($package_type as $data) : ?>
                                        <option value="<?= $data['name'] ?>" <?php echo ($value['piece_type'] == $data['name'] ? 'selected' : '') ?>><?= $data['name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  <?php endif ?>

                                  <select class="form-control d-none" name="piece_type[]" title="FCL">
                                    <option value="">-- Select One --</option>
                                    <option value="General Purpose" <?php echo ($value['piece_type'] == 'General Purpose' ? 'selected' : '') ?>>General Purpose</option>
                                    <option value="High Cube" <?php echo ($value['piece_type'] == 'High Cube' ? 'selected' : '') ?>>High Cube</option>
                                    <option value="Refrigerator" <?php echo ($value['piece_type'] == 'Refrigerator' ? 'selected' : '') ?>>Refrigerator</option>
                                  </select>
                                </td>
                                <td>
                                  <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="length[]" title="NONFCL" value="<?php echo $value['length'] + 0 ?>" <?= ($this->session->userdata('role') == 'Customer') ? 'readonly' : ''; ?>>
                                  <select class="form-control d-none" name="size[]" title="FCL">
                                    <option value="">-- Select One --</option>
                                    <option value="20 feet" <?php echo ($value['size'] == '20 feet' ? 'selected' : '') ?>>20 feet</option>
                                    <option value="40 feet" <?php echo ($value['size'] == '40 feet' ? 'selected' : '') ?>>40 feet</option>
                                    <option value="45 feet" <?php echo ($value['size'] == '45 feet' ? 'selected' : '') ?>>45 feet</option>
                                  </select>
                                </td>
                                <td>
                                  <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="width[]" title="NONFCL" value="<?php echo $value['width'] + 0 ?>" <?= ($this->session->userdata('role') == 'Customer') ? 'readonly' : ''; ?>>
                                  <input type="text" class="form-control d-none" step="any" name="container_no[]" title="FCL" value="<?php echo $value['container_no'] ?>">
                                </td>
                                <td>
                                  <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="height[]" title="NONFCL" value="<?php echo $value['height'] + 0 ?>" <?= ($this->session->userdata('role') == 'Customer') ? 'readonly' : ''; ?>>
                                  <input type="text" class="form-control d-none" step="any" name="seal_no[]" title="FCL" value="<?php echo $value['seal_no'] ?>">
                                </td>
                                <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="weight[]" value="<?php echo $value['weight'] + 0 ?>" <?= ($this->session->userdata('role') == 'Customer') ? 'readonly' : ''; ?>></td>
                                <?php if ($this->session->userdata('role') != 'Customer') { ?>
                                  <td>
                                    <?php if ($key == 0) : ?>
                                      <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                                    <?php else : ?>
                                      <button type="button" onclick="deletepackage('<?php echo $value['id'] ?>', this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
                                    <?php endif; ?>
                                  </td>
                                <?php } ?>
                              </tr>
                            <?php endforeach; ?>
                          <?php else : ?>
                            <tr>
                              <td><input type="number" class="form-control" step="any" name="qty[]" oninput="get_vol_weight()"></td>
                              <td>
                                <select class="form-control" name="piece_type[]" title="NONFCL" <?= ($this->session->userdata('role') == 'Customer') ? 'disabled' : '' ?>>
                                  <option value="">-- Select One --</option>
                                  <?php foreach ($package_type as $data) : ?>
                                    <option value="<?= $data['name'] ?>"><?= $data['name'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <select class="form-control d-none" name="piece_type[]" title="FCL" disabled>
                                  <option value="">-- Select One --</option>
                                  <option value="General Purpose">General Purpose</option>
                                  <option value="High Cube">High Cube</option>
                                  <option value="Refrigerator">Refrigerator</option>
                                </select>
                              </td>
                              <td>
                                <input type="number" class="form-control" step="any" name="length[]" title="NONFCL" value="0" oninput="get_vol_weight()">
                                <select class="form-control d-none" name="size[]" title="FCL">
                                  <option value="">-- Select One --</option>
                                  <option value="20 feet">20 feet</option>
                                  <option value="40 feet">40 feet</option>
                                  <option value="45 feet">45 feet</option>
                                </select>
                              </td>
                              <td>
                                <input type="number" class="form-control" step="any" name="width[]" title="NONFCL" value="0" oninput="get_vol_weight()">
                                <input type="text" class="form-control d-none" step="any" name="container_no[]" title="FCL" value="-">
                              </td>
                              <td>
                                <input type="number" class="form-control" step="any" name="height[]" title="NONFCL" value="0" oninput="get_vol_weight()">
                                <input type="text" class="form-control d-none" step="any" name="seal_no[]" title="FCL" value="-">
                              </td>
                              <td>
                                <input type="number" class="form-control" step="any" name="weight[]" value="0" oninput="get_vol_weight()">
                              </td>
                              <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                            </tr>
                          <?php endif; ?>
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
                  <div class="mt-2 row">
                    <div class="text-left col-6">
                      <span class="btn btn-danger previous-tab">Back</span>
                    </div>
                    <div class="text-right col-6">
                      <span class="btn btn-info next-tab">Next</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pickup-info" role="tabpanel" aria-labelledby="pickup-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Pick Up Information</h6>
                      <div class="form-group">
                        <label>Status Pickup</label>
                        <select class="form-control" name="status_pickup">
                          <option value="Dropoff">Dropoff</option>
                          <option value="Picked Up">Picked Up</option>
                        </select>
                      </div>
                      <div id="address_info">
                        <div class="card elevation-2">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-1">
                                <i class="lni lni-32 p-2 lni-map-marker bg-dark text-white rounded-circle"></i>
                              </div>
                              <div class="col-8">
                                <h4><?php echo $branch['address'] ?></h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php if ($this->session->userdata('role') != "Customer") : ?>
                        <div class="form-group">
                          <label>Same as</label>
                          <select class="form-control" name="pickup_same_as" onchange="pickup_same(this)" disabled required>
                            <option value="None">-- None --</option>
                            <option value="Shipper">Shipper</option>
                            <option value="Consignee">Consignee</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="pickup_name" placeholder="Name" readonly required>
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control" name="pickup_address" placeholder="Address" readonly required></textarea>
                        </div>
                        <div class="form-group">
                          <label>Country</label>
                          <input type="hidden" class="form-control" name="pickup_country" placeholder="Country" readonly required>
                          <select class="form-control select2" name="pickup_country_view" disabled required onchange="$('input[name=pickup_country]').val($(this).val()); select_country(this)">
                            <option value="">- Select One -</option>
                            <?php foreach ($country as $data) { ?>
                              <option value="<?= $data['country'] ?>"><?= $data['country'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>City</label>
                          <input type="text" class="form-control" name="pickup_city" placeholder="City" readonly>
                        </div>
                        <div class="form-group">
                          <label>Postcode</label>
                          <input type="text" class="form-control" name="pickup_postcode" placeholder="Postcode" readonly>
                        </div>
                        <div class="form-group">
                          <label>Contact Person</label>
                          <input type="text" class="form-control" name="pickup_contact_person" placeholder="Contact Person" readonly required>
                        </div>
                        <div class="form-group">
                          <label>Phone Number</label>
                          <input type="text" class="form-control" name="pickup_phone_number" placeholder="Phone" readonly required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="pickup_email" placeholder="Email" readonly>
                        </div>
                      <?php endif; ?>
                      <div class="row clearfix">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pick Up Date From</label>
                            <input type="date" class="form-control" name="pickup_date" <?php echo ($this->session->userdata('role') == "Customer" ? "min='" . date("Y-m-d") . "'" : "") ?> placeholder="Pick Up Date" value="<?= date('Y-m-d') ?>" readonly required>
                          </div>
                          <div class="form-group">
                            <label>Pick Up Time From</label>
                            <input type="text" class="form-control datetimepicker-input" id="pickup_from" data-toggle="datetimepicker" data-target="#pickup_from" name="pickup_time" placeholder="Pick Up Time" readonly required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pick Up Date To</label>
                            <input type="date" class="form-control" name="pickup_date_to" <?php echo ($this->session->userdata('role') == "Customer" ? "min='" . date("Y-m-d") . "'" : "") ?> placeholder="Pick Up Date" value="<?= date('Y-m-d') ?>" readonly required>
                          </div>
                          <div class="form-group">
                            <label>Pick Up Time To</label>
                            <input type="text" class="form-control datetimepicker-input" id="pickup_to" data-toggle="datetimepicker" data-target="#pickup_to" name="pickup_time_to" placeholder="Pick Up Time" readonly required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" name="pickup_notes" placeholder="Notes" readonly></textarea>
                      </div>
                      <div class="form-group d-none" id="form_pickup_price">
                        <label>Pickup Cost</label>
                        <input type="number" class="form-control" name="pickup_price" placeholder="Pickup Cost" readonly />
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-left col-6">
                      <span class="btn btn-danger previous-tab">Back</span>
                    </div>
                    <div class="text-right col-6">
                      <?php if ($this->session->userdata('id') == "Guest") : ?>
                        <button type="submit" class="btn btn-success" onclick="$('[name=billing_same_as]').val('Shipper').trigger('change');$('input, select, textarea').removeClass('is-invalid'); return confirm('Apakah Anda Yakin?')">Submit</button>
                      <?php elseif ($this->session->userdata('role') == "Customer") : ?>
                        <button type="submit" class="btn btn-success" onclick="$('input, select, textarea').removeClass('is-invalid'); return confirm('Apakah Anda Yakin?')">Submit</button>
                      <?php else : ?>
                        <span class="btn btn-info next-tab">Next</span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Billing Details</h6>
                    </div>
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>XPDC Account No.</label>
                        <select class="form-control select2" name="billing_account" onchange="check_custumer(this)">
                          <option value="">XPDC Account No. (if any)</option>
                          <?php foreach ($customer as $data) : ?>
                            <?php if ($this->session->userdata('role') == "Customer" && $this->session->userdata('id') != "Guest") : ?>
                              <option value="<?= $data['account_no'] ?>" selected><?= $data['account_no'] . " - " . $data['name'] ?></option>
                            <?php elseif (@$quotation['customer_account'] == $data['account_no']) : ?>
                              <option value="<?= $data['account_no'] ?>" selected><?= $data['account_no'] . " - " . $data['name'] ?></option>
                            <?php else : ?>
                              <option value="<?= $data['account_no'] ?>"><?= $data['account_no'] . " - " . $data['name'] ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        <!-- <input type="text" class="form-control" name="billing_account" placeholder="XPDC Account No. (if any)" oninput="check_custumer(this);"> -->
                      </div>
                      <div class="form-group">
                        <label>Same as</label>
                        <select class="form-control" name="billing_same_as" onchange="same_as(this)">
                          <option value="None">-- None --</option>
                          <option value="Shipper">Shipper</option>
                          <option value="Consignee">Consignee</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="billing_name" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="billing_address" placeholder="Address" required></textarea>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="hidden" class="form-control" name="billing_country" placeholder="Country">
                        <select class="form-control select2" name="billing_country_view" onchange="$('input[name=billing_country]').val($(this).val());" required>
                          <option value="">- Select One -</option>
                          <?php foreach ($country as $data) { ?>
                            <option value="<?= $data['country'] ?>"><?= $data['country'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="billing_city" placeholder="City">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="billing_postcode" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="billing_contact_person" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="billing_phone_number" placeholder="Phone" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="billing_email" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-left col-6">
                      <span class="btn btn-danger previous-tab">Back</span>
                    </div>
                    <div class="text-right col-6">
                      <button type="submit" class="btn btn-success" onclick="$('input, select, textarea').removeClass('is-invalid'); return confirm('Apakah Anda Yakin?')">Submit</button>
                    </div>
                  </div>
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
  var settime_invalid_cek;
  $("form input, form select, form textarea").on("invalid", function() {
    $(this).addClass("is-invalid");
    put_alert_if_invalid();
  });

  function put_alert_if_invalid() {
    clearTimeout(settime_invalid_cek);
    settime_invalid_cek = setTimeout(function() {
      alert("Please Check all input in each tab to make sure you inputed them correctly.");
    }, 1000);
  }

  function same_as(input) {
    var same_as = $(input).val();
    var form = $('input[name=billing_name]').closest('.row');
    if (same_as == "None") {
      form.find('input').attr('readonly', false);
      $('textarea[name=billing_address]').attr('readonly', false);
      $('input[name=billing_account]').attr('readonly', false);
      $("select[name=billing_country_view]").select2({
        'disabled': false
      });

      $("input[name=billing_name]").val('');
      $("input[name=billing_account]").val('');
      $("textarea[name=billing_address]").val('');
      $("[name=billing_city]").val('');
      $("select[name=billing_country_view]").val('').trigger('change');
      $("input[name=billing_country]").val('');
      $("input[name=billing_postcode]").val('');
      $("input[name=billing_contact_person]").val('');
      $("input[name=billing_phone_number]").val('');
      $("input[name=billing_email]").val('');
    } else {
      form.find('input').attr('readonly', true);
      $("select[name=billing_country_view]").select2({
        'disabled': true
      });

      $('input[name=billing_account]').attr('readonly', true);
      $('textarea[name=billing_address]').attr('readonly', true);
      same_as_billing_detail();
    }
  }

  function pickup_same(input) {
    var same_as = $(input).val();
    var status_pickup = $("select[name=status_pickup").val();
    var form = $('input[name=pickup_name]').closest('.row');
    if (same_as == "None" && status_pickup == "Picked Up") {
      form.find('input').attr('readonly', false);
      $('textarea[name=pickup_address]').attr('readonly', false);
      // $('textarea[name=pickup_notes]').attr('readonly', false);
      $('input[name=pickup_account]').attr('readonly', false);
      $("select[name=pickup_country_view]").select2({
        'disabled': false
      });

      $("input[name=pickup_name]").val('');
      $("input[name=pickup_account]").val('');
      $("textarea[name=pickup_address]").val('');
      // $("textarea[name=pickup_notes]").val('');
      $("[name=pickup_city]").val('');
      $("select[name=pickup_country_view]").val('').trigger('change');
      $("input[name=pickup_country]").val('');
      $("input[name=pickup_postcode]").val('');
      $("input[name=pickup_contact_person]").val('');
      $("input[name=pickup_phone_number]").val('');
      $("input[name=pickup_email]").val('');
      // $("input[name=pickup_date]").val("");
      // $("input[name=pickup_date_to]").val("");
      // $("input[name=pickup_time]").val("");
      // $("input[name=pickup_time_to]").val("");
    } else {
      form.find('input').attr('readonly', true)
      $("select[name=pickup_country_view]").select2({
        'disabled': true
      });

      $('input[name=pickup_account]').attr('readonly', true);
      $('textarea[name=pickup_address]').attr('readonly', true);
      if (status_pickup == "Picked Up") {
        $('input[name=pickup_date], input[name=pickup_date_to], input[name=pickup_time], input[name=pickup_time_to]').attr('readonly', false);
      }
      same_as_billing_detail();
    }
  }

  $("input[name=shipper_name]").closest('.row').find('input').on("input", function() {
    same_as_billing_detail();
  });

  $("input[name=shipper_name]").closest('.row').find('select').on("change", function() {
    same_as_billing_detail();
  });

  function same_as_billing_detail() {
    var same_as = $('select[name=billing_same_as]').val();
    same_as = same_as.toLowerCase();
    if (same_as != 'none') {
      $("input[name=billing_name]").val($("input[name=" + same_as + "_name]").val());
      $("textarea[name=billing_address]").val($("textarea[name=" + same_as + "_address]").val());
      $("[name=billing_city]").val($("[name=" + same_as + "_city]").val());
      var select_country = $("select[name=" + same_as + "_country]").val()
      $("select[name=billing_country_view]").val(select_country).trigger('change');
      $("input[name=billing_country]").val(select_country);
      $("input[name=billing_postcode]").val($("input[name=" + same_as + "_postcode]").val());
      $("input[name=billing_contact_person]").val($("input[name=" + same_as + "_contact_person]").val());
      $("input[name=billing_phone_number]").val($("input[name=" + same_as + "_phone_number]").val());
      $("input[name=billing_email]").val($("input[name=" + same_as + "_email]").val());
    }

    var pickup_same_as = $('select[name=pickup_same_as]').val();
    <?php if($this->session->userdata('role') != "Customer"): ?>
    pickup_same_as = pickup_same_as.toLowerCase();
    console.log(pickup_same_as);
    if (pickup_same_as != 'none') {
      $("input[name=pickup_name]").val($("input[name=" + pickup_same_as + "_name]").val());
      $("textarea[name=pickup_address]").val($("textarea[name=" + pickup_same_as + "_address]").val());
      $("[name=pickup_city]").val($("[name=" + pickup_same_as + "_city]").val());
      var select_country = $("select[name=" + pickup_same_as + "_country]").val()
      $("select[name=pickup_country_view]").val(select_country).trigger('change');
      $("input[name=pickup_country]").val(select_country);
      $("input[name=pickup_postcode]").val($("input[name=" + pickup_same_as + "_postcode]").val());
      $("input[name=pickup_contact_person]").val($("input[name=" + pickup_same_as + "_contact_person]").val());
      $("input[name=pickup_phone_number]").val($("input[name=" + pickup_same_as + "_phone_number]").val());
      $("input[name=pickup_email]").val($("input[name=" + pickup_same_as + "_email]").val());

        // $("input[name=pickup_date]").val("");
        // $("input[name=pickup_date_to]").val("");
        // $("input[name=pickup_time]").val("");
        // $("input[name=pickup_time_to]").val("");
        // $("textarea[name=pickup_notes]").val("");
      }
    <?php endif; ?>
  }

  function calculate_pickup_price() {
    var act_weight = $("#act_weight").html();
    var vol_weight = $("#vol_weight").html();
    var shipper_city = $("[name=shipper_city]").val();

    var weight;
    if (act_weight > vol_weight) {
      weight = act_weight;
    } else {
      weight = vol_weight;
    }

    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>shipment/pickup_price",
      data: {
        weight: weight,
        city: shipper_city
      }
    }).done(function(response) {
      $("input[name=pickup_price]").val(response);
    });
  }

  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }
</script>
<script>
  $(".select2").select2({
    theme: "bootstrap4"
  });

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
    change_sea(value);
  });

  $("select[name=sea]").on("change", function() {
    var value = $(this).val();
    change_sea(value);
  });

  function change_sea(text, delete_data = 1) {
    if (delete_data == 1) {
      $("#table_packages input[type=text]").val('');
      $("#table_packages input[type=number]").val(0);
      $("#table_packages select").val('').trigger('change');
    }
    if (text == 'FCL') {
      $("#table_packages th:nth-child(2)").html('Container Type');
      $("#table_packages th:nth-child(3)").html('Container Size');
      $("#table_packages th:nth-child(4)").html('Container No.');
      $("#table_packages th:nth-child(5)").html('Seal No.');
      $("#table_packages th:nth-child(6)").html('Gross Weight');
      $("#table_packages input[title=FCL], #table_packages select[title=FCL]").removeClass('d-none');
      $("#table_packages input[title=NONFCL], #table_packages select[title=NONFCL]").addClass('d-none');
      $("#table_packages select[name='piece_type[]'][title=FCL]").removeAttr("disabled");
      $("#table_packages select[name='piece_type[]'][title=NONFCL]").attr("disabled", "disabled");
    } else {
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

  $("select[name=status_pickup]").on("change", function() {
    var value = $(this).val();
    if (value == 'Dropoff') {
      $("#address_info").css('display', 'block');
      $("select[name=pickup_same_as]").attr("disabled", "disabled");
      $("input[name=pickup_name]").attr("readonly", "readonly");
      $("textarea[name=pickup_address]").attr("readonly", "readonly");
      $("[name=pickup_city]").attr("readonly", "readonly");
      $("input[name=pickup_country]").attr("readonly", "readonly");
      $("input[name=pickup_postcode]").attr("readonly", "readonly");
      $("input[name=pickup_contact_person]").attr("readonly", "readonly");
      $("input[name=pickup_phone_number]").attr("readonly", "readonly");
      $("input[name=pickup_email]").attr("readonly", "readonly");
      $("input[name=pickup_date]").attr("readonly", "readonly");
      $("input[name=pickup_date_to]").attr("readonly", "readonly");
      $("input[name=pickup_time]").attr("readonly", "readonly");
      $("input[name=pickup_time_to]").attr("readonly", "readonly");
      $("textarea[name=pickup_notes]").attr("readonly", "readonly");
      $("#form_pickup_price").addClass('d-none');
      $("input[name=pickup_price]").val('0');
    } else if (value == 'Picked Up') {
      $("#address_info").css('display', 'none');
      $("select[name=pickup_same_as]").removeAttr("disabled");
      $("input[name=pickup_name]").removeAttr('readonly');
      $("textarea[name=pickup_address]").removeAttr('readonly');
      $("[name=pickup_city]").removeAttr('readonly');
      $("[name=pickup_city]").removeAttr('disabled');
      $("input[name=pickup_country]").removeAttr('readonly');
      $("input[name=pickup_postcode]").removeAttr('readonly');
      $("input[name=pickup_contact_person]").removeAttr('readonly');
      $("input[name=pickup_phone_number]").removeAttr('readonly');
      $("input[name=pickup_email]").removeAttr('readonly');
      $("input[name=pickup_date]").removeAttr('readonly');
      $("input[name=pickup_date_to]").removeAttr('readonly');
      $("input[name=pickup_time]").removeAttr('readonly');
      $("input[name=pickup_time_to]").removeAttr('readonly');
      $("textarea[name=pickup_notes]").removeAttr('readonly');
      calculate_pickup_price();
      $("#form_pickup_price").removeClass('d-none');
    }
    $("select[name=pickup_same_as]").val('Shipper').trigger('change');
    $("input[name=pickup_name]").val('');
    $("input[name=pickup_account]").val('');
    $("textarea[name=pickup_address]").val('');
    $("[name=pickup_city]").val('');
    $("input[name=pickup_country]").val('');
    $("input[name=pickup_postcode]").val('');
    $("input[name=pickup_contact_person]").val('');
    $("input[name=pickup_phone_number]").val('');
    $("input[name=pickup_email]").val('');
    // $("input[name=pickup_date]").val("");
    // $("input[name=pickup_date_to]").val("");
    // $("input[name=pickup_time]").val("");
    // $("input[name=pickup_time_to]").val("");
    // $("textarea[name=pickup_notes]").val('');
    pickup_same($("select[name=pickup_same_as]"));
  });

  // $(document).on("keypress", "input[name='length[]'], input[name='width[]'], input[name='height[]']", function() {
  //   get_vol_weight();
  // });

  function get_vol_weight() {
    <?php if (isset($is_customer)) { ?>
      var type_of_mode = $("input[name=type_of_mode]").val();
    <?php } else { ?>
      var type_of_mode = $("select[name=type_of_mode]").val();
    <?php } ?>
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
      per = 4000;
    } else if (type_of_mode == 'Sea Transport') {
      per = 4000;
    }

    $("input[name='length[]']").each(function(index, value) {
      var length_detail = $(this).val();

      length_array.push(length_detail);
    });

    $("input[name='width[]']").each(function(index, value) {
      var width_detail = $(this).val();

      width_array.push(width_detail);
    });

    $("input[name='height[]']").each(function(index, value) {
      var height_detail = $(this).val();

      height_array.push(height_detail);
    });

    $("input[name='weight[]']").each(function(index, value) {
      var weight_detail = $(this).val();

      weight_array.push(weight_detail);
    });

    $("input[name='qty[]']").each(function(index, value) {
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

  $(document).ready(function() {
    get_vol_weight();
    check_custumer($("select[name=billing_account]"), 1);
    change_sea($("select[name=sea]").val(), 0);
    change_typeshipment("[name=type_of_shipment]").trigger("change");
  });

  var settime_billing_account;

  function check_custumer(input, init_billing = 0) {
    var billing_account = $(input).val();
    $.ajax({
      url: '<?php echo base_url() ?>shipment/check_custumer',
      type: 'POST',
      data: {
        account_no: billing_account,
      },
      success: function(data) {
        if (data.includes("Error")) {
          if (init_billing == 0) {
            $(input).addClass('is-invalid');
            var invalid_elem = '<div class="invalid-feedback">' + data + '</div>';
            $('.invalid-feedback').remove();
            $(invalid_elem).insertAfter(input);
            showDangerToast(data);

            $("input[name=billing_name]").val('');
            $("input[name=billing_account]").val('');
            $("textarea[name=billing_address]").val('');
            $("[name=billing_city]").val('');
            $("select[name=billing_country_view]").val('').trigger('change');
            $("input[name=billing_country]").val('');
            $("input[name=billing_postcode]").val('');
            $("input[name=billing_contact_person]").val('');
            $("input[name=billing_phone_number]").val('');
            $("input[name=billing_email]").val('');
          }
        } else {
          data = JSON.parse(data);
          $(input).removeClass('is-invalid');
          $(input).addClass('is-valid');
          $('.invalid-feedback').remove();
          console.log(data);

          $("input[name=billing_name]").val(data.name);
          $("textarea[name=billing_address]").val(data.address);
          $("[name=billing_city]").val(data.city);
          $("select[name=billing_country_view]").val(data.country).trigger('change');
          $("input[name=billing_country]").val(data.country);
          $("input[name=billing_postcode]").val(data.postcode);
          $("input[name=billing_contact_person]").val(data.contact_person);
          $("input[name=billing_phone_number]").val(data.phone_number);
          $("input[name=billing_email]").val(data.email);

          <?php if ($this->session->userdata('role') == "Customer") : ?>
            $("#billing input, #billing textarea").attr("readonly", "readonly");
            // $("#billing select[name=billing_account], #billing select[name=billing_country_view]").select2('destroy')
            // $("#billing select").attr("readonly", "readonly").css({'-moz-appearance': 'none','-webkit-appearance': 'none'});
            $("#billing select[name=billing_account], #billing select[name=billing_country_view]").select2({
              "readonly": true
            });

            var data_select = $("#billing select[name=billing_account]").val();
            $("#billing select[name=billing_account]").parent().append("<input type='hidden' class='form-control' name='billing_account' value='" + data_select + "'>");
            $("#billing select[name=billing_account]").select2('destroy').attr("disabled", true).attr("name", "billing_account_view");

            data_select = $("#billing select[name=billing_same_as]").val();
            $("#billing select[name=billing_same_as]").parent().append("<input type='hidden' class='form-control' name='billing_same_as' value='" + data_select + "'>");
            $("#billing select[name=billing_same_as]").attr("disabled", true).attr("name", "billing_same_as_view");

            $("#billing select[name=billing_country_view]").select2('destroy').attr("disabled", true);
          <?php endif; ?>
        }
      }
    });
  }

  function select_country(input) {
    var select_city;
    var name_city;
    var disable = "";
    if ($(input).attr("name") == "shipper_country") {
      select_city = $("[name=shipper_city]");
      name_city = "shipper_city";
    } else if ($(input).attr("name") == "consignee_country") {
      select_city = $("[name=consignee_city ]");
      name_city = "consignee_city";
    } else if ($(input).attr("name") == "pickup_country_view") {
      select_city = $("[name=pickup_city]");
      name_city = "pickup_city";
      if ($("[name=pickup_same_as]").val() != "None") {
        disable = "readonly";
      }
    } else if ($(input).attr("name") == "billing_country_view") {
      select_city = $("[name=billing_city]");
      name_city = "billing_city";
    }
    $.ajax({
      url: "<?php echo base_url() ?>country/city_autocomplete",
      dataType: "json",
      data: {
        // term: request.term,
        country: $(input).val(),
      },
      success: function(data) {
        console.log(disable);
        // data = JSON.parse(data);
        // console.log(data);
        var content = $(select_city).parent();
        $("select[name=" + name_city + "]").select2("destroy");
        var val_default = $(select_city).val();
        $(select_city).remove();
        if (data.length > 0 && disable == "") {
          var html = '<select class="form-control select2" name="' + name_city + '" required>';
          $.each(data, function(index, value) {
            html += "<option value='" + value + "'>" + value + "</option>";
          });
          html += "</select>";
          $(content).append(html);
          $("[name=" + name_city + "]").select2({
            theme: "bootstrap4"
          });
        } else {
          var html = '<input type="text" class="form-control" name="' + name_city + '" placeholder="City" value="' + val_default + '" ' + disable + '>';
          $(content).append(html);
        }
      }
    });

  }

  function change_typeshipment(input) {
    if ($(input).val() == "Domestic Shipping") {
      $('[name=shipper_country], [name=consignee_country]').val('Indonesia').trigger('change');
      $("[name=shipper_country], [name=consignee_country]").select2({
        'disabled': true
      });
    } else {
      $("[name=shipper_country], [name=consignee_country]").select2({
        'disabled': false
      });
    }
  }

  $('#form_input').on('submit', function() {
    $("[name=shipper_country], [name=consignee_country]").select2({
      'disabled': false
    });
  });

  $(function() {
    $('#pickup_from').datetimepicker({
      format: 'HH:mm'
    });
    $('#pickup_to').datetimepicker({
      format: 'HH:mm'
    });
    $('[data-mask]').inputmask();
    $("#pickup_from").val('08:00');
    $("#pickup_to").val('17:00');
  });

  /**** JQuery *******/
  $('.next-tab').click(function() {
    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.previous-tab').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });
</script>