<div class="main-content">
	<div class="container-fluid">
    <form action="<?php echo base_url(); ?>shipment/shipment_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h3>Shipper & Receiver Information</h3>
              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="ik ik-minus minimize-card"></i></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
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
                    <label>Shipper PIC</label>
                    <input type="text" class="form-control" name="shipper_pic" placeholder="Shipper PIC" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="shipper_phone_number" placeholder="Phone Number" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Receiver Information</h6>
                  <div class="form-group">
                    <label>Receiver Name</label>
                    <input type="text" class="form-control" name="receiver_name" placeholder="Receiver Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="receiver_address" placeholder="Address" required>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="receiver_city" placeholder="City" required>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="receiver_country" placeholder="Country" required>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="receiver_postcode" placeholder="Postcode" required>
                  </div>
                  <div class="form-group">
                    <label>Receiver PIC</label>
                    <input type="text" class="form-control" name="receiver_pic" placeholder="Receiver PIC" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="receiver_phone_number" placeholder="Phone Number" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>Shipment Information</h3>
              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="ik ik-minus minimize-card"></i></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Shipment Date</label>
                    <input type="date" class="form-control" name="shipment_date" placeholder="Shipment Date" required>
                  </div>
                  <div class="form-group">
                    <label>Type of Mode</label>
                    <select class="form-control" name="type_of_mode" required>
                      <option value="">-- Select One --</option>
                      <option value="Sea Transport">Sea Transport</option>
                      <option value="Land Shipping">Land Shipping</option>
                      <option value="Air Freight">Air Freight</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Description of Goods</label>
                    <input type="text" class="form-control" name="description_of_goods" placeholder="Description of Goods" required>
                  </div>
                  <div class="form-group">
                    <label>Shipment Value</label>
                    <input type="text" class="form-control" name="shipment_value" placeholder="Shipment Value" required>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" required>
                  </div>
                  <div class="form-group">
                    <label>Actual Weight (Kg)</label>
                    <input type="text" class="form-control" name="actual_weight" placeholder="Actual Weight (Kg)" required>
                  </div>
                  <div class="form-group">
                    <label>Ref. No</label>
                    <input type="text" class="form-control" name="ref_no" placeholder="Ref. No">
                  </div>
                  <div class="form-group">
                    <label>Main Agent</label>
                    <select class="form-control" name="main_agent">
                      <option value="">-- Select One --</option>
                      <option value="Janio Technologies PTE LTD">Janio Technologies PTE LTD</option>
                      <option value="CSI Logistics PTE LTD">CSI Logistics PTE LTD</option>
                      <option value="Bluorbit Logistics PTE LTD">Bluorbit Logistics PTE LTD</option>
                      <option value="PT. Duta Sinarwangi">PT. Duta Sinarwangi</option>
                      <option value="Pos Indonesia">Pos Indonesia</option>
                      <option value="Siba Cargo">Siba Cargo</option>
                      <option value="PT. Lotus Transindo Unggul">PT. Lotus Transindo Unggul</option>
                      <option value="PT. LNG Mandiri Internasional">PT. LNG Mandiri Internasional</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Secondary Agent</label>
                    <select class="form-control" name="secondary_agent">
                      <option value="">-- Select One --</option>
                      <option value="Janio Technologies PTE LTD">Janio Technologies PTE LTD</option>
                      <option value="CSI Logistics PTE LTD">CSI Logistics PTE LTD</option>
                      <option value="Bluorbit Logistics PTE LTD">Bluorbit Logistics PTE LTD</option>
                      <option value="PT. Duta Sinarwangi">PT. Duta Sinarwangi</option>
                      <option value="Pos Indonesia">Pos Indonesia</option>
                      <option value="Siba Cargo">Siba Cargo</option>
                      <option value="PT. Lotus Transindo Unggul">PT. Lotus Transindo Unggul</option>
                      <option value="PT. LNG Mandiri Internasional">PT. LNG Mandiri Internasional</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Pick Up Details</label>
                    <textarea class="form-control" name="pickup_details" rows="4"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Shipment</label>
                    <select class="form-control" name="type_of_shipment" required>
                      <option value="">-- Select One --</option>
                      <option value="Sea Transport">International Shipping</option>
                      <option value="Land Shipping">Domestic Shipping</option>
                    </select>
                  </div>
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
                    <label>HS Code</label>
                    <input type="text" class="form-control" name="hs_code" placeholder="HS Code">
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
                    <label>Type of Packages</label>
                    <select class="form-control" name="type_of_packages" required>
                      <option value="">-- Select One --</option>
                      <option value="Carton">Carton</option>
                      <option value="Pallet">Pallet</option>
                      <option value="Box">Box</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Vol. Weight (Kg)</label>
                    <input type="text" class="form-control" name="vol_weight" placeholder="Vol. Weight (Kg)" required>
                  </div>
                  <div class="form-group">
                    <label>Measurement (CBM)</label>
                    <input type="text" class="form-control" name="measurement" placeholder="Measurement (CBM)">
                  </div>
                  <div class="form-group">
                    <label>Master AWB / Master BL</label>
                    <input type="text" class="form-control" name="master_awb" placeholder="Master AWB / Master BL">
                  </div>
                  <div class="form-group">
                    <label>House AWB / House BL</label>
                    <input type="text" class="form-control" name="house_awb" placeholder="House AWB / House BL">
                  </div>
                  <div class="form-group">
                    <label>Pickup Date & Time</label>
                    <input type="datetime-local" class="form-control" name="pickup_datetime">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>Packages</h3>
              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="ik ik-minus minimize-card"></i></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table text-center">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Qty.</th>
                      <th class="text-white font-weight-bold">Piece Type</th>
                      <th class="text-white font-weight-bold">Description</th>
                      <th class="text-white font-weight-bold">Length(cm)</th>
                      <th class="text-white font-weight-bold">Width(cm)</th>
                      <th class="text-white font-weight-bold">Height(cm)</th>
                      <th class="text-white font-weight-bold">Weight(kg)</th>
                      <th class="text-white font-weight-bold">Value(Rp)</th>
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
                      <td><input type="text" class="form-control" name="description[]"></td>
                      <td><input type="number" class="form-control" name="length[]"></td>
                      <td><input type="number" class="form-control" name="width[]"></td>
                      <td><input type="number" class="form-control" name="height[]"></td>
                      <td><input type="number" class="form-control" name="weight[]"></td>
                      <td><input type="text" class="form-control" name="value[]"></td>
                      <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3>Assigned Branch</h3>
              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="ik ik-minus minimize-card"></i></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <b>Assigned Branch:</b>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>Assign shipment to</h3>
              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="ik ik-minus minimize-card"></i></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Employee</label>
                <select class="form-control" name="employee">
                  <option value="">-- Select Employee --</option>
                </select>
              </div>
              <div class="form-group">
                <label>Client</label>
                <select class="form-control" name="client">
                  <option value="">-- Select Client --</option>
                </select>
              </div>
              <div class="form-group">
                <label>Agent</label>
                <select class="form-control" name="agent">
                  <option value="">-- Select Agent --</option>
                </select>
              </div>
              <div class="form-group">
                <label>Branch Manager</label>
                <select class="form-control" name="branch_manager">
                  <option value="">-- Select Branch Manager --</option>
                </select>
              </div>
              <div class="form-group">
                <label>Driver</label>
                <select class="form-control" name="driver">
                  <option value="">-- Select Driver --</option>
                </select>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>History</h3>
              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="ik ik-minus minimize-card"></i></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="history_date" value="<?php echo date("Y-m-d") ?>" required>
              </div>
              <div class="form-group">
                <label>Time</label>
                <input type="time" class="form-control" name="history_time" value="<?php echo date("H:i") ?>" required>
              </div>
              <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" name="history_location" value="<?php echo date("Y-m-d") ?>" required>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="history_status" required>
                  <option value="">-- Select Branch Manager --</option>
                  <option value="Booked">Booked</option>
                  <option value="Booking Confirmed">Booking Confirmed</option>
                  <option value="Picked up">Picked up</option>
                  <option value="Pending Payment">Pending Payment</option>
                  <option value="Departed">Departed</option>
                  <option value="Arrived">Arrived</option>
                  <option value="In Transit">In Transit</option>
                  <option value="Returned">Returned</option>
                  <option value="Clearance Event">Clearance Event</option>
                  <option value="Clearance Complete">Clearance Complete</option>
                  <option value="With Courier">With Courier</option>
                  <option value="Delivered">Delivered</option>
                  <option value="On Hold">On Hold</option>
                  <option value="Cancelled">Cancelled</option>
                </select>
              </div>
              <div class="form-group">
                <label>Remarks</label>
                <textarea class="form-control" rows="3" name="history_remarks" required></textarea>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check m-0"> Submit</i></button>
        </div>
      </div>
    </form>
	</div>
</div>
<script type="text/javascript">
  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>"+row_copy+"</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
  }
  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }
</script>