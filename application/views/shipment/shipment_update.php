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
              <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment['tracking_no'] ?></h1>
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
                  <a class="nav-link active" id="shipper-consignee-tab" data-toggle="tab" href="#shipper-consignee" role="tab" aria-controls="shipper-consignee" aria-selected="true">Shipper & Consignee Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="service-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="false">Service Information</a>
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
                <li class="nav-item">
                  <a class="nav-link" id="shipping-info-tab" data-toggle="tab" href="#shipping-info" role="tab" aria-controls="shipping-info" aria-selected="false">Shipping Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="assign-shipment-tab" data-toggle="tab" href="#assign-shipment" role="tab" aria-controls="assign-shipment" aria-selected="false">Assign Shipment</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="shipper-consignee" role="tabpanel" aria-labelledby="shipper-consignee-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Shipper Information</h6>
                      <div class="form-group">
                        <label>Shipper Name</label>
                        <input type="text" class="form-control" name="shipper_name" placeholder="Shipper Name" value="<?= $shipment['shipper_name'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="shipper_address" placeholder="Address" value="<?= $shipment['shipper_address'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="shipper_city" placeholder="City" value="<?= $shipment['shipper_city'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="shipper_country" placeholder="Country" value="<?= $shipment['shipper_country'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="shipper_postcode" placeholder="Postcode" value="<?= $shipment['shipper_postcode'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="shipper_contact_person" placeholder="Contact Person" value="<?= $shipment['shipper_contact_person'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="shipper_phone_number" placeholder="Phone Number" value="<?= $shipment['shipper_phone_number'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="shipper_email" placeholder="Email" value="<?= $shipment['shipper_email'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Consignee Information</h6>
                      <div class="form-group">
                        <label>Consignee Name</label>
                        <input type="text" class="form-control" name="consignee_name" placeholder="Receiver Name" value="<?= $shipment['consignee_name'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="consignee_address" placeholder="Address" value="<?= $shipment['consignee_address'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="consignee_city" placeholder="City" value="<?= $shipment['consignee_city'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="consignee_country" placeholder="Country" value="<?= $shipment['consignee_country'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="consignee_postcode" placeholder="Postcode" value="<?= $shipment['consignee_postcode'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="consignee_contact_person" placeholder="Contact Person" value="<?= $shipment['consignee_contact_person'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="consignee_phone_number" placeholder="Phone Number" value="<?= $shipment['consignee_phone_number'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="consignee_email" placeholder="Email" value="<?= $shipment['consignee_email'] ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-right col-12">
                      <span class="btn btn-info next-tab">Next</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
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
                          <option value="International" <?= ($shipment['type_of_shipment'] == 'International') ? 'selected' : ''; ?>>International</option>
                          <option value="Domestic" <?= ($shipment['type_of_shipment'] == 'Domestic') ? 'selected' : ''; ?>>Domestic</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Type of Mode</label>
                        <select class="form-control" name="type_of_mode" required>
                          <option value="">- Select One -</option>
                          <option value="Sea Transport" <?= ($shipment['type_of_mode'] == 'Sea Transport') ? 'selected' : ''; ?>>Sea Transport</option>
                          <option value="Land Shipping" <?= ($shipment['type_of_mode'] == 'Land Shipping') ? 'selected' : ''; ?>>Land Shipping</option>
                          <option value="Air Freight" <?= ($shipment['type_of_mode'] == 'Air Freight') ? 'selected' : ''; ?>>Air Freight</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Incoterms</label>
                        <select class="form-control" name="incoterms" required>
                          <option value="">-- Select One --</option>
                          <option value="EXW (ExWorks)" <?= ($shipment['incoterms'] == 'EXW (ExWorks)') ? 'selected' : ''; ?>>EXW (ExWorks)</option>
                          <option value="FCA (Free Carrier)" <?= ($shipment['incoterms'] == 'FCA (Free Carrier)') ? 'selected' : ''; ?>>FCA (Free Carrier)</option>
                          <option value="FAS (Free Alongside Ship)" <?= ($shipment['incoterms'] == 'FAS (Free Alongside Ship)') ? 'selected' : ''; ?>>FAS (Free Alongside Ship)</option>
                          <option value="FOB (Free On Board)" <?= ($shipment['incoterms'] == 'FOB (Free On Board)') ? 'selected' : ''; ?>>FOB (Free On Board)</option>
                          <option value="CFR (Cost and Freight)" <?= ($shipment['incoterms'] == 'CFR (Cost and Freight)') ? 'selected' : ''; ?>>CFR (Cost and Freight)</option>
                          <option value="CIF (Cost Insurance Freight)" <?= ($shipment['incoterms'] == 'CIF (Cost Insurance Freight)') ? 'selected' : ''; ?>>CIF (Cost Insurance Freight)</option>
                          <option value="CIP (Carriage and Insurance Paid)" <?= ($shipment['incoterms'] == 'CIP (Carriage and Insurance Paid)') ? 'selected' : ''; ?>>CIP (Carriage and Insurance Paid)</option>
                          <option value="CPT (Carriage Paid To)" <?= ($shipment['incoterms'] == 'CPT (Carriage Paid To)') ? 'selected' : ''; ?>>CPT (Carriage Paid To)</option>
                          <option value="DAF (Delivered at Frontier)" <?= ($shipment['incoterms'] == 'DAF (Delivered at Frontier)') ? 'selected' : ''; ?>>DAF (Delivered at Frontier)</option>
                          <option value="DES (Delivered Ex Ship)" <?= ($shipment['incoterms'] == 'DES (Delivered Ex Ship)') ? 'selected' : ''; ?>>DES (Delivered Ex Ship)</option>
                          <option value="DEQ (Delivered Ex Quay)" <?= ($shipment['incoterms'] == 'DEQ (Delivered Ex Quay)') ? 'selected' : ''; ?>>DEQ (Delivered Ex Quay)</option>
                          <option value="DDU (Delivered Duty Unpaid)" <?= ($shipment['incoterms'] == 'DDU (Delivered Duty Unpaid)') ? 'selected' : ''; ?>>DDU (Delivered Duty Unpaid)</option>
                          <option value="DDP (Delivered Duty Paid)" <?= ($shipment['incoterms'] == 'DDP (Delivered Duty Paid)') ? 'selected' : ''; ?>>DDP (Delivered Duty Paid)</option>
                          <option value="DAT (Delivered At Terminal)" <?= ($shipment['incoterms'] == 'DAT (Delivered At Terminal)') ? 'selected' : ''; ?>>DAT (Delivered At Terminal)</option>
                          <option value="DAP (Delivered At Place)" <?= ($shipment['incoterms'] == 'DAP (Delivered At Place)') ? 'selected' : ''; ?>>DAP (Delivered At Place)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Sea</label>
                        <select class="form-control" name="sea" required>
                          <option value="">- Select Sea -</option>
                          <option value="LCL" <?= ($shipment['sea'] == 'LCL') ? 'selected' : ''; ?>>LCL</option>
                          <option value="FCL" <?= ($shipment['sea'] == 'FCL') ? 'selected' : ''; ?>>FCL</option>
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
                <div class="tab-pane fade" id="shipment-info" role="tabpanel" aria-labelledby="shipment-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Shipment Information</h6>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description of Goods</label>
                        <input type="text" class="form-control" name="description_of_goods" placeholder="Description of Goods" value="<?= $shipment['description_of_goods'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>HSCode</label>
                        <input type="text" class="form-control" name="hscode" placeholder="HSCode" value="<?= $shipment['hscode'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>COO (Country of Origin)</label>
                        <input type="text" class="form-control" name="coo" placeholder="COO (Country of Origin)" value="<?= $shipment['coo'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Declared Value</label>
                        <input type="text" class="form-control" name="declared_value" placeholder="Declared Value" value="<?= $shipment['declared_value'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Currency</label>
                        <select class="form-control" name="currency" required>
                          <option value="">-- Select One --</option>
                          <option value="AED" <?= ($shipment['currency'] == 'AED') ? 'selected' : ''; ?>>AED</option>
                          <option value="AUD" <?= ($shipment['currency'] == 'AUD') ? 'selected' : ''; ?>>AUD</option>
                          <option value="CNY" <?= ($shipment['currency'] == 'CNY') ? 'selected' : ''; ?>>CNY</option>
                          <option value="EUR" <?= ($shipment['currency'] == 'EUR') ? 'selected' : ''; ?>>EUR</option>
                          <option value="GBP" <?= ($shipment['currency'] == 'GBP') ? 'selected' : ''; ?>>GBP</option>
                          <option value="HKD" <?= ($shipment['currency'] == 'HKD') ? 'selected' : ''; ?>>HKD</option>
                          <option value="IDR" <?= ($shipment['currency'] == 'IDR') ? 'selected' : ''; ?>>IDR</option>
                          <option value="INR" <?= ($shipment['currency'] == 'INR') ? 'selected' : ''; ?>>INR</option>
                          <option value="JPY" <?= ($shipment['currency'] == 'JPY') ? 'selected' : ''; ?>>JPY</option>
                          <option value="KRW" <?= ($shipment['currency'] == 'KRW') ? 'selected' : ''; ?>>KRW</option>
                          <option value="MYR" <?= ($shipment['currency'] == 'MYR') ? 'selected' : ''; ?>>MYR</option>
                          <option value="SGD" <?= ($shipment['currency'] == 'SGD') ? 'selected' : ''; ?>>SGD</option>
                          <option value="THB" <?= ($shipment['currency'] == 'THB') ? 'selected' : ''; ?>>THB</option>
                          <option value="TWD" <?= ($shipment['currency'] == 'TWD') ? 'selected' : ''; ?>>TWD</option>
                          <option value="USD" <?= ($shipment['currency'] == 'USD') ? 'selected' : ''; ?>>USD</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Ref No.</label>
                        <input type="text" class="form-control" name="ref_no" placeholder="Ref No." value="<?= $shipment['ref_no'] ?>" required>
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
                                <input type="number" class="form-control" name="qty[]" value="<?php echo $value['qty'] ?>">
                                <input type="hidden" class="form-control" name="id_detail[]" value="<?php echo $value['id'] ?>">
                              </td>
                              <td>
                                <select class="form-control" name="piece_type[]" value="<?php echo $value['piece_type'] ?>">
                                  <option value="">-- Select One --</option>
                                  <option value="Pallet" <?php echo ($value['piece_type'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                                  <option value="Carton" <?php echo ($value['piece_type'] == "Carton" ? 'selected' : '') ?>>Carton</option>
                                  <option value="Crate" <?php echo ($value['piece_type'] == "Crate" ? 'selected' : '') ?>>Crate</option>
                                  <option value="Loose" <?php echo ($value['piece_type'] == "Loose" ? 'selected' : '') ?>>Loose</option>
                                  <option value="Others" <?php echo ($value['piece_type'] == "Others" ? 'selected' : '') ?>>Others</option>
                                </select>
                              </td>
                              <td><input type="number" class="form-control" name="length[]" value="<?php echo $value['length'] ?>"></td>
                              <td><input type="number" class="form-control" name="width[]" value="<?php echo $value['width'] ?>"></td>
                              <td><input type="number" class="form-control" name="height[]" value="<?php echo $value['height'] ?>"></td>
                              <td><input type="number" class="form-control" name="weight[]" value="<?php echo $value['weight'] ?>"></td>
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
                    <div class="col-md-6">
                      Vol. Weight :
                    </div>
                    <div class="col-md-6">
                      Measurement :
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
                        <label>Name</label>
                        <input type="text" class="form-control" name="pickup_name" placeholder="Name" value="<?= $shipment['pickup_name'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="pickup_address" placeholder="Address" value="<?= $shipment['pickup_address'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="pickup_city" placeholder="City" value="<?= $shipment['pickup_city'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="pickup_country" placeholder="Country" value="<?= $shipment['pickup_country'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="pickup_postcode" placeholder="Postcode" value="<?= $shipment['pickup_postcode'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="pickup_contact_person" placeholder="Contact Person" value="<?= $shipment['pickup_contact_person'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="pickup_phone_number" placeholder="Phone" value="<?= $shipment['pickup_phone_number'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="pickup_email" placeholder="Email" value="<?= $shipment['pickup_email'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Pick Up Date</label>
                        <input type="date" class="form-control" name="pickup_date" placeholder="Pick Up Date" value="<?= $shipment['pickup_date'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Pick Up Time</label>
                        <input type="time" class="form-control" name="pickup_time" placeholder="Pick Up Time" value="<?= $shipment['pickup_time'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Notes</label>
                        <input type="text" class="form-control" name="pickup_notes" placeholder="Notes" value="<?= $shipment['pickup_notes'] ?>" required>
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
                        <input type="text" class="form-control" name="billing_account" placeholder="XPDC Account No. (if any)" value="<?= $shipment['billing_account'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="billing_name" placeholder="Name" value="<?= $shipment['billing_name'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="billing_address" placeholder="Address" value="<?= $shipment['billing_address'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="billing_city" placeholder="City" value="<?= $shipment['billing_city'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="billing_country" placeholder="Country" value="<?= $shipment['billing_country'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="billing_postcode" placeholder="Postcode" value="<?= $shipment['billing_postcode'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="billing_contact_person" placeholder="Contact Person" value="<?= $shipment['billing_contact_person'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="billing_phone_number" placeholder="Phone" value="<?= $shipment['billing_phone_number'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="billing_email" placeholder="Email" value="<?= $shipment['billing_email'] ?>" required>
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
                <div class="tab-pane fade" id="shipping-info" role="tabpanel" aria-labelledby="shipping-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Main Agent</h6>
                      <div class="form-group">
                        <label>MAWB / MBL</label>
                        <input type="date" class="form-control" name="main_agent_mawb_mbl" placeholder="MAWB / MBL" value="<?= $shipment['main_agent_mawb_mbl'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Carrier</label>
                        <input type="text" class="form-control" name="main_agent_carrier" placeholder="Carrier" value="<?= $shipment['main_agent_carrier'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight No.</label>
                        <input type="date" class="form-control" name="main_agent_voyage_flight_no" placeholder="Voyage/Flight No." value="<?= $shipment['main_agent_voyage_flight_no'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Secondary Agent</h6>
                      <div class="form-group">
                        <label>MAWB / MBL</label>
                        <input type="date" class="form-control" name="secondary_agent_mawb_mbl" placeholder="MAWB / MBL" value="<?= $shipment['secondary_agent_mawb_mbl'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Carrier</label>
                        <input type="text" class="form-control" name="secondary_agent_carrier" placeholder="Carrier" value="<?= $shipment['secondary_agent_carrier'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight No.</label>
                        <input type="date" class="form-control" name="secondary_agent_voyage_flight_no" placeholder="Voyage/Flight No." value="<?= $shipment['secondary_agent_voyage_flight_no'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Port of Loading</label>
                        <input type="text" class="form-control" name="port_of_loading" placeholder="Port of Loading" value="<?= $shipment['port_of_loading'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Port of Discharge</label>
                        <input type="text" class="form-control" name="port_of_discharge" placeholder="Port of Discharge" value="<?= $shipment['port_of_discharge'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Container No</label>
                        <input type="text" class="form-control" name="container_no" placeholder="Container No." value="<?= $shipment['container_no'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Seal No.</label>
                        <input type="text" class="form-control" name="seal_no" placeholder="Seal No." value="<?= $shipment['seal_no'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>CIPL No.</label>
                        <input type="text" class="form-control" name="cipl_no" placeholder="CIPL No." value="<?= $shipment['cipl_no'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Permit No.</label>
                        <input type="text" class="form-control" name="permit_no" placeholder="Permit No." value="<?= $shipment['permit_no'] ?>" required>
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
                <div class="tab-pane fade" id="assign-shipment" role="tabpanel" aria-labelledby="assign-shipment-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Assign Shipment</h6>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Employee</label>
                        <select class="form-control" name="assign_employee" required>
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Client</label>
                        <select class="form-control" name="assign_client" required>
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Agent</label>
                        <select class="form-control" name="assign_agent" required>
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Branch Manager</label>
                        <select class="form-control" name="assign_branch" required>
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Driver</label>
                        <select class="form-control" name="assign_driver" required>
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 row">
                    <div class="text-left col-6">
                      <span class="btn btn-danger previous-tab">Back</span>
                    </div>
                    <div class="text-right col-6">
                      <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
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
</script>