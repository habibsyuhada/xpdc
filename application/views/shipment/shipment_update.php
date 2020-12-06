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
    <form action="<?php echo base_url(); ?>shipment/shipment_update_process" method="POST" class="forms-sample">
      <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
      <input type="hidden" name="tracking_no" value="<?php echo $shipment['tracking_no'] ?>">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <hr class="mt-0">
              <p class="m-0 text-center">Shipment Number</p>
              <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment['tracking_no'] ?> <?php echo ($t) ?></h1>
              <hr class="mb-0">
            </div>
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link <?php echo ($t == "sein" ? "active" : "") ?>" id="service-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="<?php echo ($t == "sein" ? "true" : "false") ?>">Service Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="shipper-consignee-tab" data-toggle="tab" href="#shipper-consignee" role="tab" aria-controls="shipper-consignee" aria-selected="false">Shipper & Consignee Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($t == "shin" ? "active" : "") ?>" id="shipment-info-tab" data-toggle="tab" href="#shipment-info" role="tab" aria-controls="shipment-info" aria-selected="<?php echo ($t == "shin" ? "true" : "false") ?>">Shipment Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pickup-info-tab" data-toggle="tab" href="#pickup-info" role="tab" aria-controls="pickup-info" aria-selected="false">Pick Up Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="false">Billing Details</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade <?php echo ($t == "sein" ? "show active" : "") ?>" id="service" role="tabpanel" aria-labelledby="service-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Service Information</h6>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type of Shipment</label>
                        <select class="form-control" name="type_of_shipment" required>
                          <option value="">-- Select One --</option>
                          <option value="International Shipping" <?= ($shipment['type_of_shipment'] == 'International Shipping') ? 'selected' : ''; ?>>International Shipping</option>
                          <option value="Domestic Shipping" <?= ($shipment['type_of_shipment'] == 'Domestic Shipping') ? 'selected' : ''; ?>>Domestic Shipping</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type of Mode</label>
                        <select class="form-control" name="type_of_mode" onchange="get_vol_weight()" required>
                          <option value="">- Select One -</option>
                          <option value="Sea Transport" <?= ($shipment['type_of_mode'] == 'Sea Transport') ? 'selected' : ''; ?>>Sea Transport</option>
                          <option value="Land Shipping" <?= ($shipment['type_of_mode'] == 'Land Shipping') ? 'selected' : ''; ?>>Land Shipping</option>
                          <option value="Air Freight" <?= ($shipment['type_of_mode'] == 'Air Freight') ? 'selected' : ''; ?>>Air Freight</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group" style="<?php echo ($shipment['type_of_mode'] == 'Sea Transport' ? '' : 'display: none;') ?>">
                        <label>Sea</label>
                        <select class="form-control" name="sea" title="sea" required <?php echo ($shipment['type_of_mode'] == 'Sea Transport' ? '' : 'disabled') ?>>
                          <option value="">- Select Sea -</option>
                          <option value="LCL" <?= ($shipment['sea'] == 'LCL') ? 'selected' : ''; ?>>LCL</option>
                          <option value="FCL" <?= ($shipment['sea'] == 'FCL') ? 'selected' : ''; ?>>FCL</option>
                        </select>
                      </div>
                      <div class="form-group" style="<?php echo ($shipment['type_of_mode'] == 'Air Freight' ? '' : 'display: none;') ?>">
                        <label>Sea</label>
                        <select class="form-control" name="sea" title="air" required <?php echo ($shipment['type_of_mode'] == 'Air Freight' ? '' : 'disabled') ?>>
                          <option value="">- Select Sea -</option>
                          <option value="Express" <?= ($shipment['sea'] == 'Express') ? 'selected' : ''; ?>>Express</option>
                          <option value="Reguler" <?= ($shipment['sea'] == 'Reguler') ? 'selected' : ''; ?>>Reguler</option>
                        </select>
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
                <div class="tab-pane fade" id="shipper-consignee" role="tabpanel" aria-labelledby="shipper-consignee-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Shipper Information</h6>
                      <div class="form-group">
                        <label>Shipper Name</label>
                        <input type="text" class="form-control" name="shipper_name" value="<?php echo $shipment['shipper_name'] ?>" placeholder="Shipper Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="shipper_address" placeholder="Address" required><?php echo $shipment['shipper_address'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="shipper_city" value="<?php echo $shipment['shipper_city'] ?>" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <select class="form-control select2" name="shipper_country" required>
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>" <?php echo ($shipment['shipper_country'] == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="shipper_postcode" value="<?php echo $shipment['shipper_postcode'] ?>" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="shipper_contact_person" value="<?php echo $shipment['shipper_contact_person'] ?>" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="shipper_phone_number" value="<?php echo $shipment['shipper_phone_number'] ?>" placeholder="Phone Number" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="shipper_email" value="<?php echo $shipment['shipper_email'] ?>" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Consignee Information</h6>
                      <div class="form-group">
                        <label>Consignee Name</label>
                        <input type="text" class="form-control" name="consignee_name" value="<?php echo $shipment['consignee_name'] ?>" placeholder="Receiver Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="consignee_address" placeholder="Address" required><?php echo $shipment['consignee_address'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="consignee_city" value="<?php echo $shipment['consignee_city'] ?>" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <select class="form-control select2" name="consignee_country" required>
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>"  <?php echo ($shipment['consignee_country'] == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="consignee_postcode" value="<?php echo $shipment['consignee_postcode'] ?>" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="consignee_contact_person" value="<?php echo $shipment['consignee_contact_person'] ?>" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="consignee_phone_number" value="<?php echo $shipment['consignee_phone_number'] ?>" placeholder="Phone Number" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="consignee_email" value="<?php echo $shipment['consignee_email'] ?>" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-right col-12">
                      <span class="btn btn-info next-tab">Next</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade <?php echo ($t == "shin" ? "show active" : "") ?>" id="shipment-info" role="tabpanel" aria-labelledby="shipment-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Shipment Information</h6>
                    </div>
                    <div class="col-md-12">
                      <div class="row clearfix">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Incoterms</label>
                            <select class="form-control" name="incoterms" required>
                              <option value="">-- Select One --</option>
                              <option value="EXW (ExWorks)" <?php echo ($shipment['incoterms'] == "EXW (ExWorks)" ? 'selected' : '') ?>>EXW (ExWorks)</option>
                              <option value="FCA (Free Carrier)" <?php echo ($shipment['incoterms'] == "FCA (Free Carrier)" ? 'selected' : '') ?>>FCA (Free Carrier)</option>
                              <option value="FAS (Free Alongside Ship)" <?php echo ($shipment['incoterms'] == "FAS (Free Alongside Ship)" ? 'selected' : '') ?>>FAS (Free Alongside Ship)</option>
                              <option value="FOB (Free On Board)" <?php echo ($shipment['incoterms'] == "FOB (Free On Board)" ? 'selected' : '') ?>>FOB (Free On Board)</option>
                              <option value="CFR (Cost and Freight" <?php echo ($shipment['incoterms'] == "CFR (Cost and Freight" ? 'selected' : '') ?>>CFR (Cost and Freight</option>
                              <option value="CIF (Cost Insurance Freight)" <?php echo ($shipment['incoterms'] == "CIF (Cost Insurance Freight)" ? 'selected' : '') ?>>CIF (Cost Insurance Freight)</option>
                              <option value="CIP (Carriage and Insurance Paid)" <?php echo ($shipment['incoterms'] == "CIP (Carriage and Insurance Paid)" ? 'selected' : '') ?>>CIP (Carriage and Insurance Paid)</option>
                              <option value="CPT (Carriage Paid To)" <?php echo ($shipment['incoterms'] == "CPT (Carriage Paid To)" ? 'selected' : '') ?>>CPT (Carriage Paid To)</option>
                              <option value="DAF (Delivered at Frontier)" <?php echo ($shipment['incoterms'] == "DAF (Delivered at Frontier)" ? 'selected' : '') ?>>DAF (Delivered at Frontier)</option>
                              <option value="DES (Delivered Ex Ship)" <?php echo ($shipment['incoterms'] == "DES (Delivered Ex Ship)" ? 'selected' : '') ?>>DES (Delivered Ex Ship)</option>
                              <option value="DEQ (Delivered Ex Quay)" <?php echo ($shipment['incoterms'] == "DEQ (Delivered Ex Quay)" ? 'selected' : '') ?>>DEQ (Delivered Ex Quay)</option>
                              <option value="DDU (Delivered Duty Unpaid)" <?php echo ($shipment['incoterms'] == "DDU (Delivered Duty Unpaid)" ? 'selected' : '') ?>>DDU (Delivered Duty Unpaid)</option>
                              <option value="DDP (Delivered Duty Paid)" <?php echo ($shipment['incoterms'] == "DDP (Delivered Duty Paid)" ? 'selected' : '') ?>>DDP (Delivered Duty Paid)</option>
                              <option value="DAT (Delivered At Terminal)" <?php echo ($shipment['incoterms'] == "DAT (Delivered At Terminal)" ? 'selected' : '') ?>>DAT (Delivered At Terminal)</option>
                              <option value="DAP (Delivered At Place)" <?php echo ($shipment['incoterms'] == "DAP (Delivered At Place)" ? 'selected' : '') ?>>DAP (Delivered At Place)</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Insurance</label>
                                <select class="form-control" name="insurance" required>
                                    <option value="Yes" <?php echo ($shipment['insurance'] == "Yes" ? 'selected' : '') ?>>Yes</option>
                                    <option value="No" <?php echo ($shipment['insurance'] == "No" ? 'selected' : '') ?>>No</option>
                                </select>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description of Goods</label>
                        <input type="text" class="form-control" name="description_of_goods" value="<?php echo $shipment['description_of_goods'] ?>" placeholder="Description of Goods" required>
                      </div>
                      <div class="form-group">
                        <label>HSCode</label>
                        <input type="text" class="form-control" name="hscode" value="<?php echo $shipment['hscode'] ?>" placeholder="HSCode">
                      </div>
                      <div class="form-group">
                        <label>COO (Country of Origin)</label>
                        <select class="form-control select2" name="coo">
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>" <?php echo ($shipment['coo'] == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Declared Value</label>
                        <input type="text" class="form-control" name="declared_value" value="<?php echo $shipment['declared_value'] ?>" placeholder="Declared Value" required>
                      </div>
                      <div class="form-group">
                        <label>Currency</label>
                        <select class="form-control" name="currency" required>
                          <option value="">-- Select One --</option>
                          <option value="AED" <?php echo ($shipment['currency'] == "AED" ? 'selected' : '') ?>>AED</option>
                          <option value="AUD" <?php echo ($shipment['currency'] == "AUD" ? 'selected' : '') ?>>AUD</option>
                          <option value="CNY" <?php echo ($shipment['currency'] == "CNY" ? 'selected' : '') ?>>CNY</option>
                          <option value="EUR" <?php echo ($shipment['currency'] == "EUR" ? 'selected' : '') ?>>EUR</option>
                          <option value="GBP" <?php echo ($shipment['currency'] == "GBP" ? 'selected' : '') ?>>GBP</option>
                          <option value="HKD" <?php echo ($shipment['currency'] == "HKD" ? 'selected' : '') ?>>HKD</option>
                          <option value="IDR" <?php echo ($shipment['currency'] == "IDR" ? 'selected' : '') ?>>IDR</option>
                          <option value="INR" <?php echo ($shipment['currency'] == "INR" ? 'selected' : '') ?>>INR</option>
                          <option value="JPY" <?php echo ($shipment['currency'] == "JPY" ? 'selected' : '') ?>>JPY</option>
                          <option value="KRW" <?php echo ($shipment['currency'] == "KRW" ? 'selected' : '') ?>>KRW</option>
                          <option value="MYR" <?php echo ($shipment['currency'] == "MYR" ? 'selected' : '') ?>>MYR</option>
                          <option value="SGD" <?php echo ($shipment['currency'] == "SGD" ? 'selected' : '') ?>>SGD</option>
                          <option value="THB" <?php echo ($shipment['currency'] == "THB" ? 'selected' : '') ?>>THB</option>
                          <option value="TWD" <?php echo ($shipment['currency'] == "TWD" ? 'selected' : '') ?>>TWD</option>
                          <option value="USD" <?php echo ($shipment['currency'] == "USD" ? 'selected' : '') ?>>USD</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Ref No.</label>
                        <input type="text" class="form-control" name="ref_no" value="<?php echo $shipment['ref_no'] ?>" placeholder="Ref No.">
                      </div>
                    </div>
                    <br>
                    <div class="col-md-12">
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
                          <?php foreach ($packages_list as $key => $value) : ?>
                            <tr>
                              <td>
                                <input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="qty[]" value="<?php echo $value['qty'] ?>">
                                <input type="hidden" class="form-control" name="id_detail[]" value="<?php echo $value['id'] ?>">
                              </td>
                              <td>
                                <select class="form-control" name="piece_type[]" value="<?php echo $value['piece_type'] ?>">
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
                              <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="length[]" value="<?php echo $value['length']+0 ?>"></td>
                              <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="width[]" value="<?php echo $value['width']+0 ?>"></td>
                              <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="height[]" value="<?php echo $value['height']+0 ?>"></td>
                              <td><input type="number" class="form-control" oninput="get_vol_weight()" step="any" name="weight[]" value="<?php echo $value['weight']+0 ?>"></td>
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
                  <br>
                  <div class="mt-2 row">
                    <div class="text-left col">
                      <span class="btn btn-danger previous-tab">Back</span>
                    </div>
                    <?php if($shipment['status'] == "Picked up"): ?>
                    <div class="col-auto">
                      <div class="form-inline text-right">
                        <div class="form-check mx-sm-2">
                          <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="has_updated_packages" class="custom-control-input">
                            <span class="custom-control-label">&nbsp; Update and change status to Service Center</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <div class="text-right col-auto">
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
                          <option value="Dropoff" <?php echo ($shipment['status_pickup'] == "Dropoff" ? 'selected' : '') ?>>Dropoff</option>
                          <option value="Picked Up" <?php echo ($shipment['status_pickup'] == "Picked Up" ? 'selected' : '') ?>>Picked Up</option>
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
                                <h4>Warna Jaya Business Park B2-07<br>
                                  Jl. Jendral Sudirman 29413 Batam ID</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Same as</label>
                        <select class="form-control" name="pickup_same_as" onchange="pickup_same(this)" <?php echo ($shipment['status_pickup'] == 'Dropoff' ? 'disabled' : '') ?> required>
                          <option value="None" <?php echo ($shipment['pickup_same_as'] == "None" ? 'selected' : '') ?>>-- None --</option>
                          <option value="Shipper" <?php echo ($shipment['pickup_same_as'] == "Shipper" ? 'selected' : '') ?>>Shipper</option>
                          <option value="Consignee" <?php echo ($shipment['pickup_same_as'] == "Consignee" ? 'selected' : '') ?>>Consignee</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="pickup_name" value="<?php echo $shipment['pickup_name'] ?>" placeholder="Name" <?php echo (($shipment['status_pickup'] == 'Dropoff' || !in_array($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?> required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="pickup_address" placeholder="Address" <?php echo (($shipment['status_pickup'] == 'Dropoff' ||!in_array ($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?> required><?php echo $shipment['pickup_address'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="pickup_city" value="<?php echo $shipment['pickup_city'] ?>" placeholder="City" <?php echo (($shipment['status_pickup'] == 'Dropoff' || !in_array($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?> required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="pickup_country" value="<?php echo $shipment['pickup_country'] ?>" placeholder="Country" <?php echo (($shipment['status_pickup'] == 'Dropoff' || !in_array($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?> required>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="pickup_postcode" value="<?php echo $shipment['pickup_postcode'] ?>" placeholder="Postcode" <?php echo (($shipment['status_pickup'] == 'Dropoff' || !in_array($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?>>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="pickup_contact_person" value="<?php echo $shipment['pickup_contact_person'] ?>" placeholder="Contact Person" <?php echo (($shipment['status_pickup'] == 'Dropoff' || !in_array($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?> required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="pickup_phone_number" value="<?php echo $shipment['pickup_phone_number'] ?>" placeholder="Phone" <?php echo (($shipment['status_pickup'] == 'Dropoff' || !in_array($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?> required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="pickup_email" value="<?php echo $shipment['pickup_email'] ?>" placeholder="Email" <?php echo (($shipment['status_pickup'] == 'Dropoff' || !in_array($shipment['pickup_same_as'], array("", "None"))) ? 'readonly' : '') ?> >
                      </div>
                      <div class="row clearfix">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pick Up Date From</label>
                            <input type="date" class="form-control" name="pickup_date" value="<?php echo $shipment['pickup_date'] ?>" placeholder="Pick Up Date" <?php echo ($shipment['status_pickup'] == 'Dropoff' ? 'readonly' : '') ?> required>
                          </div>
                          <div class="form-group">
                            <label>Pick Up Time From</label>
                            <input type="time" class="form-control" name="pickup_time" value="<?php echo $shipment['pickup_time'] ?>" placeholder="Pick Up Time" <?php echo ($shipment['status_pickup'] == 'Dropoff' ? 'readonly' : '') ?> required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pick Up Date To</label>
                            <input type="date" class="form-control" name="pickup_date_to" value="<?php echo $shipment['pickup_date_to'] ?>" placeholder="Pick Up Date" <?php echo ($shipment['status_pickup'] == 'Dropoff' ? 'readonly' : '') ?> required>
                          </div>
                          <div class="form-group">
                            <label>Pick Up Time To</label>
                            <input type="time" class="form-control" name="pickup_time_to" value="<?php echo $shipment['pickup_time_to'] ?>" placeholder="Pick Up Time" <?php echo ($shipment['status_pickup'] == 'Dropoff' ? 'readonly' : '') ?> required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" name="pickup_notes" placeholder="Notes" <?php echo ($shipment['status_pickup'] == 'Dropoff' ? 'readonly' : '') ?>><?php echo $shipment['pickup_notes'] ?></textarea>
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
                <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Billing Details</h6>
                    </div>
                    <div class="col-md-6">
                      
                      <div class="form-group">
                        <label>XPDC Account No.</label>
                        <input type="text" class="form-control" name="billing_account" value="<?php echo $shipment['billing_account'] ?>" placeholder="XPDC Account No. (if any)" oninput="check_custumer(this);">
                      </div>
                      <div class="form-group">
                        <label>Same as</label>
                        <select class="form-control" name="billing_same_as" onchange="same_as(this)" required>
                          <option value="None" <?php echo ($shipment['billing_same_as'] == "None" ? 'selected' : '') ?>>-- None --</option>
                          <option value="Shipper" <?php echo ($shipment['billing_same_as'] == "Shipper" ? 'selected' : '') ?>>Shipper</option>
                          <option value="Consignee" <?php echo ($shipment['billing_same_as'] == "Consignee" ? 'selected' : '') ?>>Consignee</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="billing_name" value="<?php echo $shipment['billing_name'] ?>" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="billing_address" placeholder="Address" required><?php echo $shipment['billing_address'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="billing_city" value="<?php echo $shipment['billing_city'] ?>" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="hidden" class="form-control" name="billing_country" value="<?php echo $shipment['billing_country'] ?>" placeholder="Country">
                        <select class="form-control select2" name="billing_country_view" onchange="$('input[name=billing_country]').val($(this).val());" required>
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>" <?php echo ($shipment['billing_country'] == $data['location'] ? 'selected' : '') ?>><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="billing_postcode" value="<?php echo $shipment['billing_postcode'] ?>" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="billing_contact_person" value="<?php echo $shipment['billing_contact_person'] ?>" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="billing_phone_number" value="<?php echo $shipment['billing_phone_number'] ?>" placeholder="Phone" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="billing_email" value="<?php echo $shipment['billing_email'] ?>" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-left col-6">
                      <span class="btn btn-danger previous-tab">Back</span>
                    </div>
                    <div class="text-right col-6">
                      <button type="submit" class="btn btn-success" onclick="$('input, select, textarea').removeClass('is-invalid');return confirm('Apakah Anda Yakin?')">Submit</button>
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
    settime_invalid_cek = setTimeout(function(){ 
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
      $("input[name=billing_city]").val('');
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
      $("input[name=pickup_city]").val('');
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
      if(status_pickup == "Picked Up"){
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
      $("input[name=billing_city]").val($("input[name=" + same_as + "_city]").val());
      var select_country = $("select[name=" + same_as + "_country]").val()
      $("select[name=billing_country_view]").val(select_country).trigger('change');
      $("input[name=billing_country]").val(select_country);
      $("input[name=billing_postcode]").val($("input[name=" + same_as + "_postcode]").val());
      $("input[name=billing_contact_person]").val($("input[name=" + same_as + "_contact_person]").val());
      $("input[name=billing_phone_number]").val($("input[name=" + same_as + "_phone_number]").val());
      $("input[name=billing_email]").val($("input[name=" + same_as + "_email]").val());
    }

    var pickup_same_as = $('select[name=pickup_same_as]').val();
    pickup_same_as = pickup_same_as.toLowerCase();
    console.log(pickup_same_as);
    if (pickup_same_as != 'none') {
      $("input[name=pickup_name]").val($("input[name=" + pickup_same_as + "_name]").val());
      $("textarea[name=pickup_address]").val($("textarea[name=" + pickup_same_as + "_address]").val());
      $("input[name=pickup_city]").val($("input[name=" + pickup_same_as + "_city]").val());
      var select_country = $("select[name=" + pickup_same_as + "_country]").val()
      $("select[name=pickup_country_view]").val(select_country).trigger('change');
      $("input[name=pickup_country]").val(select_country);
      $("input[name=pickup_postcode]").val($("input[name=" + pickup_same_as + "_postcode]").val());
      $("input[name=pickup_contact_person]").val($("input[name=" + pickup_same_as + "_contact_person]").val());
      $("input[name=pickup_phone_number]").val($("input[name=" + pickup_same_as + "_phone_number]").val());
      $("input[name=pickup_email]").val($("input[name=" + pickup_same_as + "_email]").val());

      $("input[name=pickup_date]").val("");
      $("input[name=pickup_date_to]").val("");
      $("input[name=pickup_time]").val("");
      $("input[name=pickup_time_to]").val("");
      $("textarea[name=pickup_notes]").val("");
    }
  }

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
    } 
    else if (value == 'Air Freight') {
      $("select[name=sea][title=air]").closest('.form-group').slideDown();
      $("select[name=sea][title=air]").removeAttr("disabled");
    }
    $("select[name=sea]").val('');
  });

  $("select[name=status_pickup]").on("change", function() {
    var value = $(this).val();
    if (value == 'Dropoff') {
      $("#address_info").css('display', 'block');
      $("select[name=pickup_same_as]").attr("disabled", "disabled");
      $("input[name=pickup_name]").attr("readonly", "readonly");
      console.log("asd");
      $("textarea[name=pickup_address]").attr("readonly", "readonly");
      $("input[name=pickup_city]").attr("readonly", "readonly");
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
    } else if (value == 'Picked Up') {
      $("#address_info").css('display', 'none');
      $("select[name=pickup_same_as]").removeAttr("disabled");
      $("input[name=pickup_name]").removeAttr('readonly');
      $("textarea[name=pickup_address]").removeAttr('readonly');
      $("input[name=pickup_city]").removeAttr('readonly');
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
    }
    $("select[name=pickup_same_as]").val('None').trigger('change');
    $("input[name=pickup_name]").val('');
    $("input[name=pickup_account]").val('');
    $("textarea[name=pickup_address]").val('');
    $("input[name=pickup_city]").val('');
    $("input[name=pickup_country]").val('');
    $("input[name=pickup_postcode]").val('');
    $("input[name=pickup_contact_person]").val('');
    $("input[name=pickup_phone_number]").val('');
    $("input[name=pickup_email]").val('');
    $("input[name=pickup_date]").val("");
    $("input[name=pickup_date_to]").val("");
    $("input[name=pickup_time]").val("");
    $("input[name=pickup_time_to]").val("");
    $("textarea[name=pickup_address]").val('');
  });

  // $(document).on("keypress", "input[name='length[]'], input[name='width[]'], input[name='height[]']", function() {
  //   get_vol_weight();
  // });

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

    $("#act_weight").html(total_act_weight.toLocaleString('en-US', {maximumFractionDigits:2, minimumFractionDigits: 2}));
    $("#vol_weight").html(total_vol_weight.toLocaleString('en-US', {maximumFractionDigits:2, minimumFractionDigits: 2}));
    $("#measurement").html(total_measurement.toLocaleString('en-US', {maximumFractionDigits:2, minimumFractionDigits: 2}));

  }

  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
    $(btn).closest("tbody").find("tr:last").find("input").val("");
    $(btn).closest("tbody").find("tr:last").find("select").val("");
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }

  function deletepackage(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>shipment/shipment_packages_delete_process/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Shipment Package data has been Delete!');
        }
      });
    }
  }

  function deletehistory(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>shipment/shipment_history_delete_process/<?php echo $shipment['id'] ?>/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Shipment Package data has been Delete!');
        }
      });
    }
  }

  $('.next-tab').click(function() {
    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.previous-tab').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });

  $(document).ready(function (){
    get_vol_weight();
  });

  var settime_billing_account;
  function check_custumer(input) {
    clearTimeout(settime_billing_account);
    settime_billing_account = setTimeout(function(){ 
      var billing_account = $(input).val();
      $.ajax({
        url: '<?php echo base_url() ?>shipment/check_custumer',
        type: 'POST',
        data:{
          account_no: billing_account,
        },
        success: function (data) {
          if(data.includes("Error")){
            $(input).addClass('is-invalid');
            var invalid_elem = '<div class="invalid-feedback">'+data+'</div>';
            $('.invalid-feedback').remove();
            $(invalid_elem).insertAfter(input);
            showDangerToast(data);

            $("input[name=billing_name]").val('');
            $("input[name=billing_account]").val('');
            $("textarea[name=billing_address]").val('');
            $("input[name=billing_city]").val('');
            $("select[name=billing_country_view]").val('').trigger('change');
            $("input[name=billing_country]").val('');
            $("input[name=billing_postcode]").val('');
            $("input[name=billing_contact_person]").val('');
            $("input[name=billing_phone_number]").val('');
            $("input[name=billing_email]").val('');
          }
          else{
            data = JSON. parse(data);
            $(input).removeClass('is-invalid');
            $(input).addClass('is-valid');
            $('.invalid-feedback').remove();
            console.log(data);

            $("input[name=billing_name]").val(data.name);
            $("textarea[name=billing_address]").val(data.address);
            $("input[name=billing_city]").val(data.city);
            $("select[name=billing_country_view]").val(data.country).trigger('change');
            $("input[name=billing_country]").val(data.country);
            $("input[name=billing_postcode]").val(data.postcode);
            $("input[name=billing_contact_person]").val(data.contact_person);
            $("input[name=billing_phone_number]").val(data.phone_number);
            $("input[name=billing_email]").val(data.email);
          }
        }
      }); 
    }, 2000);
  }
</script>