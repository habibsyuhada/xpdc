<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>shipment/shipment_create_process" method="POST" class="forms-sample" >
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
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="shipper-consignee" role="tabpanel" aria-labelledby="shipper-consignee-tab">
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
                        <input type="text" class="form-control" name="shipper_address" placeholder="Address" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="shipper_city" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="shipper_country" placeholder="Country" required>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="shipper_postcode" placeholder="Postcode" required>
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
                        <input type="email" class="form-control" name="shipper_email" placeholder="Email" required>
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
                        <input type="text" class="form-control" name="consignee_address" placeholder="Address" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="consignee_city" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="consignee_country" placeholder="Country" required>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="consignee_postcode" placeholder="Postcode" required>
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
                        <input type="email" class="form-control" name="consignee_email" placeholder="Email" required>
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
                          <option value="International">International</option>
                          <option value="Domestic">Domestic</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Type of Mode</label>
                        <select class="form-control" name="type_of_mode" required>
                          <option value="">- Select One -</option>
                          <option value="Sea Transport">Sea Transport</option>
                          <option value="Land Shipping">Land Shipping</option>
                          <option value="Air Freight">Air Freight</option>
                        </select>
                      </div>
                    </div>
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
                      <div class="form-group">
                        <label>Sea</label>
                        <select class="form-control" name="sea" required>
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
                <div class="tab-pane fade" id="shipment-info" role="tabpanel" aria-labelledby="shipment-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-12">
                      <h6 class="font-weight-bold">Shipment Information</h6>
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
                        <input type="text" class="form-control" name="coo" placeholder="COO (Country of Origin)" required>
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
                        <input type="text" class="form-control" name="ref_no" placeholder="Ref No." required>
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
                            <td><input type="number" class="form-control" name="qty[]"></td>
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
                            <td><input type="number" class="form-control" name="length[]"></td>
                            <td><input type="number" class="form-control" name="width[]"></td>
                            <td><input type="number" class="form-control" name="height[]"></td>
                            <td><input type="number" class="form-control" name="weight[]"></td>
                            <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                          </tr>
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
                        <input type="text" class="form-control" name="pickup_name" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="pickup_address" placeholder="Address" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="pickup_city" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="pickup_country" placeholder="Country" required>
                      </div>
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="pickup_postcode" placeholder="Postcode" required>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="pickup_contact_person" placeholder="Contact Person" required>
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="pickup_phone_number" placeholder="Phone" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="pickup_email" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                        <label>Pick Up Date</label>
                        <input type="date" class="form-control" name="pickup_date" placeholder="Pick Up Date" required>
                      </div>
                      <div class="form-group">
                        <label>Pick Up Time</label>
                        <input type="time" class="form-control" name="pickup_time" placeholder="Pick Up Time" required>
                      </div>
                      <div class="form-group">
                        <label>Notes</label>
                        <input type="text" class="form-control" name="pickup_notes" placeholder="Notes" required>
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
                        <label>Name</label>
                        <input type="text" class="form-control" name="billing_name" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="billing_address" placeholder="Address" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="billing_city" placeholder="City" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="billing_country" placeholder="Country" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="billing_postcode" placeholder="Postcode" required>
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
                        <input type="email" class="form-control" name="billing_email" placeholder="Email" required>
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
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }
</script>
<script>
    /**** JQuery *******/
    $('.next-tab').click(function() {
        $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
    });

    $('.previous-tab').click(function() {
        $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
    });
</script>