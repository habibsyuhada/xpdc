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
    <div class="row">
      <div class="col-md-12">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
          <div class="overflow-auto media text-muted py-3 mt-1 border-bottom border-top border-gray">
            <div class="container-fluid">

              <div class="row align-items-center justify-content-between">
                <div class="col-md-auto">
                  <span>Shipment Number</span>
                  <h1 class="font-weight-bold m-0"><?php echo $shipment['tracking_no'] ?></h1>
                </div>
                <div class="col-md-auto">
                  <ul class="nav nav-pills nav-fill font-weight-bold">
                    <li class="nav-item">
                      <a class="nav-link <?php echo ($t=='g' ? 'active' : '') ?>" id="pills-general-tab" data-toggle="pill" href="#pills-general" aria-controls="pills-general">General Information</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link <?php echo ($t=='h' ? 'active' : '') ?>" id="pills-history-tab" data-toggle="pill" href="#pills-history" aria-controls="pills-history">History List</a>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-content">
      <div class="tab-pane fade <?php echo ($t=='g' ? 'show active' : '') ?>" id="pills-general" aria-labelledby="pills-general-tab">
        <form action="<?php echo base_url(); ?>shipment/shipment_update_process" method="POST" class="forms-sample">
          <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
          <input type="hidden" name="tracking_no" value="<?php echo $shipment['tracking_no'] ?>">
          <div class="row clearfix">
            <div class="col-md-12">
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
                        <label for="exampleInputUsername1">Shipper Name</label>
                        <input type="text" class="form-control" name="shipper_name" value="<?php echo $shipment['shipper_name'] ?>" placeholder="Shipper Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Address</label>
                        <input type="text" class="form-control" name="shipper_address" value="<?php echo $shipment['shipper_address'] ?>" placeholder="Address">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">City</label>
                        <input type="text" class="form-control" name="shipper_city" value="<?php echo $shipment['shipper_city'] ?>" placeholder="City">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Country</label>
                        <input type="text" class="form-control" name="shipper_country" value="<?php echo $shipment['shipper_country'] ?>" placeholder="Country">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Postcode</label>
                        <input type="text" class="form-control" name="shipper_postcode" value="<?php echo $shipment['shipper_postcode'] ?>" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Shipper PIC</label>
                        <input type="text" class="form-control" name="shipper_pic" value="<?php echo $shipment['shipper_pic'] ?>" placeholder="Shipper PIC">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Phone Number</label>
                        <input type="text" class="form-control" name="shipper_phone_number" value="<?php echo $shipment['shipper_phone_number'] ?>" placeholder="Phone Number">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Receiver Information</h6>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Receiver Name</label>
                        <input type="text" class="form-control" name="receiver_name" value="<?php echo $shipment['receiver_name'] ?>" placeholder="Receiver Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Address</label>
                        <input type="text" class="form-control" name="receiver_address" value="<?php echo $shipment['receiver_address'] ?>" placeholder="Address">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">City</label>
                        <input type="text" class="form-control" name="receiver_city" value="<?php echo $shipment['receiver_city'] ?>" placeholder="City">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Country</label>
                        <input type="text" class="form-control" name="receiver_country" value="<?php echo $shipment['receiver_country'] ?>" placeholder="Country">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Postcode</label>
                        <input type="text" class="form-control" name="receiver_postcode" value="<?php echo $shipment['receiver_postcode'] ?>" placeholder="Postcode">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Receiver PIC</label>
                        <input type="text" class="form-control" name="receiver_pic" value="<?php echo $shipment['receiver_pic'] ?>" placeholder="Receiver PIC">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Phone Number</label>
                        <input type="text" class="form-control" name="receiver_phone_number" value="<?php echo $shipment['receiver_phone_number'] ?>" placeholder="Phone Number">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-md-12">
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
                        <label for="exampleInputUsername1">Shipment Date</label>
                        <input type="date" class="form-control" name="shipment_date" value="<?php echo $shipment['shipment_date'] ?>" placeholder="Shipment Date">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Type of Mode</label>
                        <select class="form-control" name="type_of_mode">
                          <option value="">-- Select One --</option>
                          <option value="Sea Transport" <?php echo ($shipment['type_of_mode'] == "Sea Transport" ? 'selected' : '') ?>>Sea Transport</option>
                          <option value="Land Shipping" <?php echo ($shipment['type_of_mode'] == "Land Shipping" ? 'selected' : '') ?>>Land Shipping</option>
                          <option value="Air Freight" <?php echo ($shipment['type_of_mode'] == "Air Freight" ? 'selected' : '') ?>>Air Freight</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Description of Goods</label>
                        <input type="text" class="form-control" name="description_of_goods" value="<?php echo $shipment['description_of_goods'] ?>" placeholder="Description of Goods">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Shipment Value</label>
                        <input type="text" class="form-control" name="shipment_value" value="<?php echo $shipment['shipment_value'] ?>" placeholder="Shipment Value">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="<?php echo $shipment['quantity'] ?>" placeholder="Quantity">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Actual Weight (Kg)</label>
                        <input type="text" class="form-control" name="actual_weight" value="<?php echo $shipment['actual_weight'] ?>" placeholder="Actual Weight (Kg)">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Ref. No</label>
                        <input type="text" class="form-control" name="ref_no" value="<?php echo $shipment['ref_no'] ?>" placeholder="Ref. No">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Main Agent</label>
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
                        <label for="exampleInputUsername1">Secondary Agent</label>
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
                        <label for="exampleInputUsername1">Pick Up Details</label>
                        <textarea class="form-control" name="pickup_details" rows="4"><?php echo $shipment['pickup_details'] ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Type of Shipment</label>
                        <select class="form-control" name="type_of_shipment">
                          <option value="">-- Select One --</option>
                          <option value="International Shipping" <?php echo ($shipment['type_of_shipment'] == "International Shipping" ? 'selected' : '') ?>>International Shipping</option>
                          <option value="Domestic Shipping" <?php echo ($shipment['type_of_shipment'] == "Domestic Shipping" ? 'selected' : '') ?>>Domestic Shipping</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Incoterms</label>
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
                        <label for="exampleInputUsername1">HS Code</label>
                        <input type="text" class="form-control" name="hs_code" value="<?php echo $shipment['hs_code'] ?>" placeholder="HS Code">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Currency</label>
                        <select class="form-control" name="currency" value="<?php echo $shipment['currency'] ?>">
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
                        <label for="exampleInputUsername1">Type of Packages</label>
                        <select class="form-control" name="type_of_packages" value="<?php echo $shipment['type_of_packages'] ?>">
                          <option value="">-- Select One --</option>
                          <option value="Carton" <?php echo ($shipment['type_of_packages'] == "Carton" ? 'selected' : '') ?>>Carton</option>
                          <option value="Pallet" <?php echo ($shipment['type_of_packages'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                          <option value="Box" <?php echo ($shipment['type_of_packages'] == "Box" ? 'selected' : '') ?>>Box</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Vol. Weight (Kg)</label>
                        <input type="text" class="form-control" name="vol_weight" value="<?php echo $shipment['vol_weight'] ?>" placeholder="Vol. Weight (Kg)">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Measurement (CBM)</label>
                        <input type="text" class="form-control" name="measurement" value="<?php echo $shipment['measurement'] ?>" placeholder="Measurement (CBM)">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Master AWB / Master BL</label>
                        <input type="text" class="form-control" name="master_awb" value="<?php echo $shipment['master_awb'] ?>" placeholder="Master AWB / Master BL">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">House AWB / House BL</label>
                        <input type="text" class="form-control" name="house_awb" value="<?php echo $shipment['house_awb'] ?>" placeholder="House AWB / House BL">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Pickup Date & Time</label>
                        <input type="datetime-local" class="form-control" name="pickup_datetime" value="<?php echo implode("T", explode(" ", $shipment['pickup_datetime'])) ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-md-12">
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
              <div class="text-right">
                <button type="submit" class="btn btn-success"><i class="fas fa-check m-0"> Submit</i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="tab-pane fade <?php echo ($t=='h' ? 'show active' : '') ?>" id="pills-history" aria-labelledby="pills-history-tab">
      </div>
    </div>
    
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
</script>