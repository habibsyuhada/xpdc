<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>shipment/shipment_receipt" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
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
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="service" role="tabpanel" aria-labelledby="service-tab">
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
                          <option value="International">International</option>
                          <option value="Domestic">Domestic</option>
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
                          <option value="Sea Transport">Sea Transport</option>
                          <option value="Land Shipping">Land Shipping</option>
                          <option value="Air Freight">Air Freight</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group" style="display: none;">
                        <label>Sea</label>
                        <select class="form-control" name="sea" required disabled>
                          <option value="">- Select Sea -</option>
                          <option value="LCL">LCL</option>
                          <option value="FCL">FCL</option>
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
                        <input type="text" class="form-control" name="shipper_name" placeholder="Shipper Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="shipper_address" placeholder="Address" required></textarea>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="shipper_city" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <select class="form-control select2" name="shipper_country" required>
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>"><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="shipper_postcode" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="shipper_contact_person" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="shipper_phone_number" placeholder="Phone Number" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="shipper_email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Consignee Information</h6>
                      <div class="form-group">
                        <label>Consignee Name</label>
                        <input type="text" class="form-control" name="consignee_name" placeholder="Receiver Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="consignee_address" placeholder="Address" required></textarea>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="consignee_city" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <select class="form-control select2" name="consignee_country" required>
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>"><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="consignee_postcode" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="consignee_contact_person" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="consignee_phone_number" placeholder="Phone Number" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="consignee_email" placeholder="Email">
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
                    <div class="col-md-12">
                      <div class="row clearfix">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Incoterms</label>
                            <select class="form-control" name="incoterms" required>
                              <option value="">-- Select One --</option>
                              <option value="EXW (ExWorks)">EXW (ExWorks)</option>
                              <option value="FCA (Free Carrier)">FCA (Free Carrier)</option>
                              <option value="FAS (Free Alongside Ship)">FAS (Free Alongside Ship)</option>
                              <option value="FOB (Free On Board)">FOB (Free On Board)</option>
                              <option value="CFR (Cost and Freight">CFR (Cost and Freight</option>
                              <option value="CIF (Cost Insurance Freight)">CIF (Cost Insurance Freight)</option>
                              <option value="CIP (Carriage and Insurance Paid)">CIP (Carriage and Insurance Paid)</option>
                              <option value="CPT (Carriage Paid To)">CPT (Carriage Paid To)</option>
                              <option value="DAF (Delivered at Frontier)">DAF (Delivered at Frontier)</option>
                              <option value="DES (Delivered Ex Ship)">DES (Delivered Ex Ship)</option>
                              <option value="DEQ (Delivered Ex Quay)">DEQ (Delivered Ex Quay)</option>
                              <option value="DDU (Delivered Duty Unpaid)">DDU (Delivered Duty Unpaid)</option>
                              <option value="DDP (Delivered Duty Paid)">DDP (Delivered Duty Paid)</option>
                              <option value="DAT (Delivered At Terminal)">DAT (Delivered At Terminal)</option>
                              <option value="DAP (Delivered At Place)">DAP (Delivered At Place)</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Insurance</label>
                                <select class="form-control" name="insurance" required>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description of Goods</label>
                        <input type="text" class="form-control" name="description_of_goods" placeholder="Description of Goods" required>
                      </div>
                      <div class="form-group">
                        <label>HSCode</label>
                        <input type="text" class="form-control" name="hscode" placeholder="HSCode" required>
                      </div>
                      <div class="form-group">
                        <label>COO (Country of Origin)</label>
                        <select class="form-control select2" name="coo">
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>"><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Declared Value</label>
                        <input type="text" class="form-control" name="declared_value" placeholder="Declared Value" required>
                      </div>
                      <div class="form-group">
                        <label>Currency</label>
                        <select class="form-control" name="currency" required>
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
                      </div>
                      <div class="form-group">
                        <label>Ref No.</label>
                        <input type="text" class="form-control" name="ref_no" placeholder="Ref No.">
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
                          <tr>
                            <td><input type="number" class="form-control" step="any" name="qty[]" oninput="get_vol_weight()"></td>
                            <td>
                              <select class="form-control" name="piece_type[]">
                                <option value="">-- Select One --</option>
                                <option value="Pallet">Pallet</option>
                                <option value="Carton">Carton</option>
                                <option value="Crate">Crate</option>
                                <option value="Loose">Loose</option>
                                <option value="Others">Others</option>
                              </select>
                            </td>
                            <td><input type="number" class="form-control" step="any" name="length[]" value="0" oninput="get_vol_weight()"></td>
                            <td><input type="number" class="form-control" step="any" name="width[]" value="0" oninput="get_vol_weight()"></td>
                            <td><input type="number" class="form-control" step="any" name="height[]" value="0" oninput="get_vol_weight()"></td>
                            <td><input type="number" class="form-control" step="any" name="weight[]" value="0" oninput="get_vol_weight()"></td>
                            <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                          </tr>
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
                                <h4>Warna Jaya Business Park B2-07<br>
                                  Jl. Jendral Sudirman 29413 Batam ID</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
                        <label>City</label>
                        <input type="text" class="form-control" name="pickup_city" placeholder="City" readonly required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="pickup_country" placeholder="Country" readonly required>
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
                        <input type="email" class="form-control" name="pickup_email" placeholder="Email" readonly >
                      </div>
                      <div class="row clearfix">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pick Up Date From</label>
                            <input type="date" class="form-control" name="pickup_date" placeholder="Pick Up Date" readonly required>
                          </div>
                          <div class="form-group">
                            <label>Pick Up Time From</label>
                            <input type="time" class="form-control" name="pickup_time" placeholder="Pick Up Time" readonly required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pick Up Date To</label>
                            <input type="date" class="form-control" name="pickup_date_to" placeholder="Pick Up Date" readonly required>
                          </div>
                          <div class="form-group">
                            <label>Pick Up Time To</label>
                            <input type="time" class="form-control" name="pickup_time_to" placeholder="Pick Up Time" readonly required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" name="pickup_notes" placeholder="Notes" readonly></textarea>
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
                        <input type="text" class="form-control" name="billing_account" placeholder="XPDC Account No. (if any)">
                      </div>
                      <div class="form-group">
                        <label>Same as</label>
                        <select class="form-control" name="billing_same_as" onchange="same_as(this)" required>
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
                        <label>City</label>
                        <input type="text" class="form-control" name="billing_city" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="hidden" class="form-control" name="billing_country" placeholder="Country">
                        <select class="form-control select2" name="billing_country_view" onchange="$('input[name=billing_country]').val($(this).val());" required>
                          <option value="">- Select One -</option>
                          <?php foreach ($country['data'] as $data) { ?>
                            <option value="<?= $data['location'] ?>"><?= $data['location'] ?></option>
                          <?php } ?>
                        </select>
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
                      <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
                    </div>
                  </div>
                </div>
                <!-- <div class="tab-pane fade" id="shipping-info" role="tabpanel" aria-labelledby="shipping-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Main Agent</h6>
                      <div class="form-group">
                        <label>MAWB / MBL</label>
                        <input type="date" class="form-control" name="main_agent_mawb_mbl" placeholder="MAWB / MBL">
                      </div>
                      <div class="form-group">
                        <label>Carrier</label>
                        <input type="text" class="form-control" name="main_agent_carrier" placeholder="Carrier" required>
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight No.</label>
                        <input type="date" class="form-control" name="main_agent_voyage_flight_no" placeholder="Voyage/Flight No." required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Secondary Agent</h6>
                      <div class="form-group">
                        <label>MAWB / MBL</label>
                        <input type="date" class="form-control" name="secondary_agent_mawb_mbl" placeholder="MAWB / MBL">
                      </div>
                      <div class="form-group">
                        <label>Carrier</label>
                        <input type="text" class="form-control" name="secondary_agent_carrier" placeholder="Carrier" required>
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight No.</label>
                        <input type="date" class="form-control" name="secondary_agent_voyage_flight_no" placeholder="Voyage/Flight No." required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Port of Loading</label>
                        <input type="text" class="form-control" name="port_of_loading" placeholder="Port of Loading" required>
                      </div>
                      <div class="form-group">
                        <label>Port of Discharge</label>
                        <input type="text" class="form-control" name="port_of_discharge" placeholder="Port of Discharge" required>
                      </div>
                      <div class="form-group">
                        <label>Container No</label>
                        <input type="text" class="form-control" name="container_no" placeholder="Container No." required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Seal No.</label>
                        <input type="text" class="form-control" name="seal_no" placeholder="Seal No." required>
                      </div>
                      <div class="form-group">
                        <label>CIPL No.</label>
                        <input type="text" class="form-control" name="cipl_no" placeholder="CIPL No." required>
                      </div>
                      <div class="form-group">
                        <label>Permit No.</label>
                        <input type="text" class="form-control" name="permit_no" placeholder="Permit No." required>
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
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  var input_invalid = 0;
  $("form").on("submit", function() {
    input_invalid = 0;
  });

  $("form input").on("invalid", function() {
    if (input_invalid < 1) {
      var element = $(this).closest('.tab-pane').attr('id');
      $('#' + element + '-tab').trigger('click');
      input_invalid = 1;
    }
  });

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
    if (value == 'Sea Transport') {
      $("select[name=sea]").closest('.form-group').slideDown();
      $("select[name=sea]").removeAttr("disabled");
    } else {
      $("select[name=sea]").closest('.form-group').slideUp();
      $("select[name=sea]").attr("disabled", "disabled");
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

    $("#act_weight").html((Number(total_act_weight)).toFixed(2));
    $("#vol_weight").html((Number(total_vol_weight)).toFixed(2));
    $("#measurement").html((Number(total_measurement)).toFixed(2));

  }

  /**** JQuery *******/
  $('.next-tab').click(function() {
    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.previous-tab').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });
</script>
