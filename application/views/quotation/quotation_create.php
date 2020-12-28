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
        <form action="<?php echo base_url() ?>quotation/quotation_create_process" method="POST">
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Quotation Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Account No.</label>
                    <select class="form-control select2" name="customer_account" onchange="check_custumer(this);">
                      <option value="">- Select One -</option>
                      <?php foreach ($customer_list as $customer) : ?>
                        <option value="<?php echo $customer['account_no'] ?>"><?php echo $customer['account_no'] . " - " . $customer['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="customer_account" placeholder="Account No." oninput="check_custumer(this);"> -->
                  </div>
                  <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="customer_address" placeholder="Customer Address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" class="form-control" name="customer_contact_person" placeholder="Customer Contact Person" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="customer_phone_number" placeholder="Customer Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="customer_email" placeholder="Customer Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <select class="form-control" name="payment_terms" required>
                      <option value="">- Select One -</option>
                      <!-- <option value="Cash In Advance">Cash In Advance</option>
                      <option value="Cash In Delivery">Cash In Delivery</option>
                      <option value="15 Days">15 Days</option>
                      <option value="30 Days">30 Days</option>
                      <option value="45 Days">45 Days</option>
                      <option value="60 Days">60 Days</option> -->
                      <?php foreach ($payment_terms_list as $key => $value) : ?>
                        <option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="payment_terms" placeholder="Payment Terms" required> -->
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" placeholder="Date" value="<?php echo date("Y-m-d") ?>" readonly required>
                  </div>
                  <div class="form-group">
                    <label>Exp. Date</label>
                    <input type="date" class="form-control" name="exp_date" placeholder="Exp. Date" required>
                  </div>
                  <div class="form-group">
                    <label>Prepared By</label>
                    <input type="text" class="form-control" name="created_by" placeholder="Prepared By" value="<?php echo $this->session->userdata('name') ?>" disabled>
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
                    <select class="form-control" name="type_of_shipment" required>
                      <option value="">-- Select One --</option>
                      <option value="International shipping">International shipping</option>
                      <option value="Domestic shipping">Domestic shipping</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Service</label>
                    <select class="form-control" name="type_of_service" required>
                      <option value="">-- Select One --</option>
                      <option value="FH">Freight Handling</option>
                      <option value="CH">Clearance Handling</option>
                      <option value="WH">Warehousing</option>
                    </select>
                  </div>
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
                    <select class="form-control" name="sea" title="sea" required disabled>
                      <option value="">- Select Sea -</option>
                      <option value="LCL">LCL</option>
                      <option value="FCL">FCL</option>
                    </select>
                  </div>
                  <div class="form-group" style="display: none;">
                    <label>Type</label>
                    <select class="form-control" name="sea" title="air" required disabled>
                      <option value="">- Select Sea -</option>
                      <option value="Express">Express</option>
                      <option value="Reguler">Reguler</option>
                    </select>
                  </div>
                </div>
              </div>
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
                        <option value="<?= $data['location'] ?>"><?= $data['location'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="shipper_city" placeholder="City" required>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="shipper_postcode" placeholder="Postcode">
                  </div>
                  <div class="form-group">
                    <label>Shipper Name</label>
                    <input type="text" class="form-control" name="shipper_name" placeholder="Shipper Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="shipper_address" placeholder="Address" required></textarea>
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
                    <label>Country</label>
                    <select class="form-control select2" name="consignee_country" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($country['data'] as $data) { ?>
                        <option value="<?= $data['location'] ?>"><?= $data['location'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="consignee_city" placeholder="City" required>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="consignee_postcode" placeholder="Postcode">
                  </div>
                  <div class="form-group">
                    <label>Consignee Name</label>
                    <input type="text" class="form-control" name="consignee_name" placeholder="Receiver Name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="consignee_address" placeholder="Address" required></textarea>
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
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Cargo Information</h6>
              <div class="row clearfix">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description of Goods</label>
                    <input type="text" class="form-control" name="description_of_goods" placeholder="Description of Goods" required>
                  </div>
                </div>
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
                        <td><input type="number" class="form-control" step="any" name="cargo_qty[]" oninput="get_vol_weight()"></td>
                        <td>
                          <select class="form-control" name="cargo_piece_type[]">
                            <option value="">-- Select One --</option>
                            <option value="Pallet">Pallet</option>
                            <option value="Carton">Carton</option>
                            <option value="Crate">Crate</option>
                            <option value="Loose">Loose</option>
                            <option value="Container 20 GP">Container 20 GP</option>
                            <option value="Container 40 GP">Container 40 GP</option>
                            <option value="Others">Others</option>
                          </select>
                        </td>
                        <td><input type="number" class="form-control" step="any" name="cargo_length[]" value="0" oninput="get_vol_weight()"></td>
                        <td><input type="number" class="form-control" step="any" name="cargo_width[]" value="0" oninput="get_vol_weight()"></td>
                        <td><input type="number" class="form-control" step="any" name="cargo_height[]" value="0" oninput="get_vol_weight()"></td>
                        <td><input type="number" class="form-control" step="any" name="cargo_weight[]" value="0" oninput="get_vol_weight()"></td>
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
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Charges Information</h6>
              <div class="row clearfix">
                <div class="col">
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
                      <tr>
                        <td>
                          <input type="text" class="form-control" name="charges_description[]" required>
                        </td>
                        <td><input type="number" step="any" class="form-control" value="0" oninput="get_total(this)" name="charges_qty[]"></td>
                        <td>
                          <select class="form-control" name="charges_uom[]" required onchange="get_total(this)">
                            <option value="">-- Select One --</option>
                            <option value="Kg">Kg</option>
                            <option value="M3">M3</option>
                            <option value="Set">Set</option>
                            <option value="Trip">Trip</option>
                            <option value="Pallet">Pallet</option>
                            <option value="%">%</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" name="charges_currency[]" required>
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
                        </td>
                        <td><input type="number" step="any" class="form-control" value="0" oninput="get_total(this)" name="charges_unit_price[]"></td>
                        <td>
                          <input type="text" step="any" class="form-control" value="0" name="charges_subtotal_view[]" readonly>
                          <input type="hidden" step="any" class="form-control" value="0" name="charges_subtotal[]" readonly>
                        </td>
                        <td><input type="number" step="any" class="form-control" value="0" oninput="get_total(this)" name="charges_exchange_rate[]"></td>
                        <td>
                          <input type="text" step="any" class="form-control" value="0" name="charges_total_view[]" readonly>
                          <input type="hidden" step="any" class="form-control" value="0" name="charges_total[]" readonly>
                        </td>
                        <td><textarea class="form-control" name="charges_remarks[]" placeholder="..."></textarea></td>
                        <td>
                          <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md">
                  <h5 class="font-weight-bold text-right">Estimation Total Charges : IDR <span id="total_all" name="total_all">0.00</span></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Addtional</h6>
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
                      <tr>
                        <td><input type="text" class="form-control" name="term_condition[]" value="Above rate exclude duties and taxes."></td>
                        <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="term_condition[]" value="Above rate exclude cargo insurance."></td>
                        <td><button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="term_condition[]" value="Both shipper and consignee must provide valid related required documents for customs clearance."></td>
                        <td><button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="term_condition[]" value="Any discrepancy between CIPL and actual shipment will be burden to customer."></td>
                        <td><button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="term_condition[]" value="Space is subject to space availability by the carrier."></td>
                        <td><button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button></td>
                      </tr>
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

  var settime_billing_account;

  function check_custumer(input) {
    var billing_account = $(input).val();
    $.ajax({
      url: '<?php echo base_url() ?>shipment/check_custumer',
      type: 'POST',
      data: {
        account_no: billing_account,
      },
      success: function(data) {
        if (data.includes("Error")) {
          $(input).addClass('is-invalid');
          var invalid_elem = '<div class="invalid-feedback">' + data + '</div>';
          $('.invalid-feedback').remove();
          $(invalid_elem).insertAfter(input);
          showDangerToast(data);

          $("input[name=customer_name]").val('');
          $("input[name=customer_account]").val('');
          $("textarea[name=customer_address]").val('');
          $("input[name=customer_contact_person]").val('');
          $("input[name=customer_phone_number]").val('');
          $("input[name=customer_email]").val('');
          $("input[name=payment_terms]").val('');
        } else {
          data = JSON.parse(data);
          $(input).removeClass('is-invalid');
          $(input).addClass('is-valid');
          $('.invalid-feedback').remove();
          console.log(data);

          $("input[name=customer_name]").val(data.name);
          $("textarea[name=customer_address]").val(data.address);
          $("input[name=customer_contact_person]").val(data.contact_person);
          $("input[name=customer_phone_number]").val(data.phone_number);
          $("input[name=customer_email]").val(data.email);
          $("input[name=payment_terms]").val(data.payment_terms);
        }
      }
    });
  }

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
      per = 4000;
    } else if (type_of_mode == 'Land Shipping') {
      per = 4000;
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
      $(row).find("input[name='charges_subtotal_view[]']").val(subtotal.toLocaleString('en-US', {
        maximumFractionDigits: 0
      }) + ".00");

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
</script>