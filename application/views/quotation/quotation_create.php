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
        <form action="<?php echo base_url() ?>shipment/shipment_bill_process" method="POST">
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Quotation Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" required>
                  </div>
                  <div class="form-group">
                    <label>Attn.</label>
                    <input type="text" class="form-control" name="attn" placeholder="Attn." required>
                  </div>
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <input type="text" class="form-control" name="payment_terms" placeholder="Payment Terms" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Quotation No.</label>
                    <input type="text" class="form-control" name="quotation_no" placeholder="Quotation No." required>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" class="form-control" name="date" placeholder="Date" required>
                  </div>
                  <div class="form-group">
                    <label>Exp. Date</label>
                    <input type="text" class="form-control" name="exp_date" placeholder="Exp. Date" required>
                  </div>
                  <div class="form-group">
                    <label>Prepared By</label>
                    <input type="text" class="form-control" name="created_by" placeholder="Prepared By" required>
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
                      <option value="International Shipping">International Shipping</option>
                      <option value="Domestic Shipping">Domestic Shipping</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
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
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Cargo Information</h6>
              <div class="row clearfix">
                <div class="col">
                  <table class="table text-center">
                    <thead>
                      <tr class="bg-info">
                        <th class="text-white font-weight-bold">Content</th>
                        <th class="text-white font-weight-bold">Quantity</th>
                        <th class="text-white font-weight-bold">Weight</th>
                        <th class="text-white font-weight-bold">Measurement</th>
                        <th class="text-white font-weight-bold">Dimension</th>
                        <th class="text-white font-weight-bold"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" class="form-control" step="any" name="content[]" required></td>
                        <td><input type="number" class="form-control" step="any" name="qty[]" required></td>
                        <td><input type="number" class="form-control" step="any" name="weight[]" required></td>
                        <td><input type="number" class="form-control" step="any" name="measurement[]" required></td>
                        <td><input type="number" class="form-control" step="any" name="dimension[]" required></td>
                        <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
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
                        <th class="text-white font-weight-bold">Charges</th>
                        <th class="text-white font-weight-bold">Rate</th>
                        <th class="text-white font-weight-bold">UOM</th>
                        <th class="text-white font-weight-bold">Remarks</th>
                        <th class="text-white font-weight-bold"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" class="form-control" step="any" name="charges[]" required></td>
                        <td><input type="number" class="form-control" step="any" name="rate[]" required></td>
                        <td><input type="number" class="form-control" step="any" name="uom[]" required></td>
                        <td><input type="number" class="form-control" step="any" name="remarks[]" required></td>
                        <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
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
</script>