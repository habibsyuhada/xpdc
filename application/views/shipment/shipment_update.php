<style type="text/css">
  a.nav-link.active{
    border-width: 4px;
    border-bottom: 4px solid #007bff;
  }
  a.nav-link{
    border-radius: 0px !important;
  }
  a.nav-link:not(.active):hover{
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
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <hr class="mt-0">
              <p class="m-0 text-center">Shipment Number</p>
              <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment['tracking_no'] ?></h1>
              <hr class="mb-0">
            </div>
          </div>
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
                    <input type="text" class="form-control" name="shipper_name" value="<?php echo $shipment['shipper_name'] ?>" placeholder="Shipper Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="shipper_address" value="<?php echo $shipment['shipper_address'] ?>" placeholder="Address" required>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="shipper_city" value="<?php echo $shipment['shipper_city'] ?>" placeholder="City" required>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="shipper_country" value="<?php echo $shipment['shipper_country'] ?>" placeholder="Country" required>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="shipper_postcode" value="<?php echo $shipment['shipper_postcode'] ?>" placeholder="Postcode" required>
                  </div>
                  <div class="form-group">
                    <label>Shipper PIC</label>
                    <input type="text" class="form-control" name="shipper_pic" value="<?php echo $shipment['shipper_pic'] ?>" placeholder="Shipper PIC" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="shipper_phone_number" value="<?php echo $shipment['shipper_phone_number'] ?>" placeholder="Phone Number" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Receiver Information</h6>
                  <div class="form-group">
                    <label>Receiver Name</label>
                    <input type="text" class="form-control" name="receiver_name" value="<?php echo $shipment['receiver_name'] ?>" placeholder="Receiver Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="receiver_address" value="<?php echo $shipment['receiver_address'] ?>" placeholder="Address" required>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="receiver_city" value="<?php echo $shipment['receiver_city'] ?>" placeholder="City" required>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="receiver_country" value="<?php echo $shipment['receiver_country'] ?>" placeholder="Country" required>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="receiver_postcode" value="<?php echo $shipment['receiver_postcode'] ?>" placeholder="Postcode" required>
                  </div>
                  <div class="form-group">
                    <label>Receiver PIC</label>
                    <input type="text" class="form-control" name="receiver_pic" value="<?php echo $shipment['receiver_pic'] ?>" placeholder="Receiver PIC" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="receiver_phone_number" value="<?php echo $shipment['receiver_phone_number'] ?>" placeholder="Phone Number" required>
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
                    <input type="date" class="form-control" name="shipment_date" value="<?php echo $shipment['shipment_date'] ?>" placeholder="Shipment Date" required>
                  </div>
                  <div class="form-group">
                    <label>Type of Mode</label>
                    <select class="form-control" name="type_of_mode" required>
                      <option value="">-- Select One --</option>
                      <option value="Sea Transport" <?php echo ($shipment['type_of_mode'] == "Sea Transport" ? 'selected' : '') ?>>Sea Transport</option>
                      <option value="Land Shipping" <?php echo ($shipment['type_of_mode'] == "Land Shipping" ? 'selected' : '') ?>>Land Shipping</option>
                      <option value="Air Freight" <?php echo ($shipment['type_of_mode'] == "Air Freight" ? 'selected' : '') ?>>Air Freight</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Description of Goods</label>
                    <input type="text" class="form-control" name="description_of_goods" value="<?php echo $shipment['description_of_goods'] ?>" placeholder="Description of Goods" required>
                  </div>
                  <div class="form-group">
                    <label>Shipment Value</label>
                    <input type="text" class="form-control" name="shipment_value" value="<?php echo $shipment['shipment_value'] ?>" placeholder="Shipment Value" required>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $shipment['quantity'] ?>" placeholder="Quantity" required>
                  </div>
                  <div class="form-group">
                    <label>Actual Weight (Kg)</label>
                    <input type="text" class="form-control" name="actual_weight" value="<?php echo $shipment['actual_weight'] ?>" placeholder="Actual Weight (Kg)" required>
                  </div>
                  <div class="form-group">
                    <label>Ref. No</label>
                    <input type="text" class="form-control" name="ref_no" value="<?php echo $shipment['ref_no'] ?>" placeholder="Ref. No">
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
                    <textarea class="form-control" name="pickup_details" rows="3"><?php echo $shipment['pickup_details'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Shipment</label>
                    <select class="form-control" name="type_of_shipment" required>
                      <option value="">-- Select One --</option>
                      <option value="International Shipping" <?php echo ($shipment['type_of_shipment'] == "International Shipping" ? 'selected' : '') ?>>International Shipping</option>
                      <option value="Domestic Shipping" <?php echo ($shipment['type_of_shipment'] == "Domestic Shipping" ? 'selected' : '') ?>>Domestic Shipping</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Incoterms</label>
                    <select class="form-control" name="incoterms">
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
                    <input type="text" class="form-control" name="hs_code" value="<?php echo $shipment['hs_code'] ?>" placeholder="HS Code">
                  </div>
                  <div class="form-group">
                    <label>Currency</label>
                    <select class="form-control" name="currency" value="<?php echo $shipment['currency'] ?>" required>
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
                    <label>Type of Packages</label>
                    <select class="form-control" name="type_of_packages" value="<?php echo $shipment['type_of_packages'] ?>" required>
                      <option value="">-- Select One --</option>
                      <option value="Carton" <?php echo ($shipment['type_of_packages'] == "Carton" ? 'selected' : '') ?>>Carton</option>
                      <option value="Pallet" <?php echo ($shipment['type_of_packages'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                      <option value="Box" <?php echo ($shipment['type_of_packages'] == "Box" ? 'selected' : '') ?>>Box</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Vol. Weight (Kg)</label>
                    <input type="text" class="form-control" name="vol_weight" value="<?php echo $shipment['vol_weight'] ?>" placeholder="Vol. Weight (Kg)" required>
                  </div>
                  <div class="form-group">
                    <label>Measurement (CBM)</label>
                    <input type="text" class="form-control" name="measurement" value="<?php echo $shipment['measurement'] ?>" placeholder="Measurement (CBM)">
                  </div>
                  <div class="form-group">
                    <label>Master AWB / Master BL</label>
                    <input type="text" class="form-control" name="master_awb" value="<?php echo $shipment['master_awb'] ?>" placeholder="Master AWB / Master BL">
                  </div>
                  <div class="form-group">
                    <label>House AWB / House BL</label>
                    <input type="text" class="form-control" name="house_awb" value="<?php echo $shipment['house_awb'] ?>" placeholder="House AWB / House BL">
                  </div>
                  <div class="form-group">
                    <label>Pickup Date & Time</label>
                    <input type="datetime-local" class="form-control" name="pickup_datetime" value="<?php echo implode("T", explode(" ", $shipment['pickup_datetime'])) ?>" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>History Records</h3>
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
                      <th class="text-white font-weight-bold">Date</th>
                      <th class="text-white font-weight-bold">Time</th>
                      <th class="text-white font-weight-bold">Location</th>
                      <th class="text-white font-weight-bold">Status</th>
                      <th class="text-white font-weight-bold">Remarks</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($history_list as $key => $value): ?>
                    <tr>
                      <td>
                        <input type="date" class="form-control" name="records_date[]" value="<?php echo $value['date'] ?>">
                        <input type="hidden" class="form-control" name="id_history[]" value="<?php echo $value['id'] ?>">
                      </td>
                      <td>
                        <input type="time" class="form-control" name="records_time[]" value="<?php echo $value['time'] ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="records_location[]" value="<?php echo $value['location'] ?>">
                      </td>
                      <td>
                        <select class="form-control" name="records_status[]" required>
                          <option value="">-- Select Branch Manager --</option>
                          <option value="Booked" <?php echo ($value['status'] == "Booked" ? 'selected' : '') ?>>Booked</option>
                          <option value="Booking Confirmed" <?php echo ($value['status'] == "Booking Confirmed" ? 'selected' : '') ?>>Booking Confirmed</option>
                          <option value="Picked up" <?php echo ($value['status'] == "Picked up" ? 'selected' : '') ?>>Picked up</option>
                          <option value="Pending Payment" <?php echo ($value['status'] == "Pending Payment" ? 'selected' : '') ?>>Pending Payment</option>
                          <option value="Departed" <?php echo ($value['status'] == "Departed" ? 'selected' : '') ?>>Departed</option>
                          <option value="Arrived" <?php echo ($value['status'] == "Arrived" ? 'selected' : '') ?>>Arrived</option>
                          <option value="In Transit" <?php echo ($value['status'] == "In Transit" ? 'selected' : '') ?>>In Transit</option>
                          <option value="Returned" <?php echo ($value['status'] == "Returned" ? 'selected' : '') ?>>Returned</option>
                          <option value="Clearance Event" <?php echo ($value['status'] == "Clearance Event" ? 'selected' : '') ?>>Clearance Event</option>
                          <option value="Clearance Complete" <?php echo ($value['status'] == "Clearance Complete" ? 'selected' : '') ?>>Clearance Complete</option>
                          <option value="With Courier" <?php echo ($value['status'] == "With Courier" ? 'selected' : '') ?>>With Courier</option>
                          <option value="Delivered" <?php echo ($value['status'] == "Delivered" ? 'selected' : '') ?>>Delivered</option>
                          <option value="On Hold" <?php echo ($value['status'] == "On Hold" ? 'selected' : '') ?>>On Hold</option>
                          <option value="Cancelled" <?php echo ($value['status'] == "Cancelled" ? 'selected' : '') ?>>Cancelled</option>
                        </select>
                      </td>
                      <td><textarea class="form-control" name="records_remarks[]"><?php echo $value['remarks'] ?></textarea></td>
                      <td>
                        <button type="button" onclick="deletehistory('<?php echo $value['id'] ?>', this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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
                    <?php foreach ($packages_list as $key => $value): ?>
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
                      <td><input type="text" class="form-control" name="description[]" value="<?php echo $value['description'] ?>"></td>
                      <td><input type="number" class="form-control" name="length[]" value="<?php echo $value['length'] ?>"></td>
                      <td><input type="number" class="form-control" name="width[]" value="<?php echo $value['width'] ?>"></td>
                      <td><input type="number" class="form-control" name="height[]" value="<?php echo $value['height'] ?>"></td>
                      <td><input type="number" class="form-control" name="weight[]" value="<?php echo $value['weight'] ?>"></td>
                      <td><input type="text" class="form-control" name="value[]" value="<?php echo $value['value'] ?>"></td>
                      <td>
                        <?php if($key == 0): ?>
                        <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                        <?php else: ?>
                        <button type="button" onclick="deletepackage('<?php echo $value['id'] ?>', this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
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
                <input type="date" class="form-control" name="history_date" value="<?php echo date("Y-m-d") ?>">
              </div>
              <div class="form-group">
                <label>Time</label>
                <input type="time" class="form-control" name="history_time" value="<?php echo date("H:i") ?>">
              </div>
              <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" name="history_location">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="history_status">
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
                <textarea class="form-control" rows="3" name="history_remarks"></textarea>
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
    $(btn).closest("tbody").find("tr:last").find("input").val("");
    $(btn).closest("tbody").find("tr:last").find("select").val("");
  }
  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }

  function deletepackage(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if(valid == true){
      $.ajax({
        url: "<?php echo base_url();?>shipment/shipment_packages_delete_process/"+id,
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
    if(valid == true){
      $.ajax({
        url: "<?php echo base_url();?>shipment/shipment_history_delete_process/<?php echo $shipment['id'] ?>/"+id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Shipment Package data has been Delete!');
        }
      });
    }
  }
</script>