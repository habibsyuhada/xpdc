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
        <form action="<?php echo base_url() ?>shipment/shipment_package_detail_process" method="POST">
          <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
          <input type="hidden" name="has_updated_packages" value="1">
          <input type="hidden" name="shipper_city" value="<?php echo $shipment['shipper_city'] ?>">
          <input type="hidden" name="shipper_country" value="<?php echo $shipment['shipper_country'] ?>">
          <div class="card">
            <div class="card-body">
              <hr class="mt-0">
              <p class="m-0 text-center">Shipment Number</p>
              <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment['tracking_no'] ?></h1>
              <hr class="mb-0">
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Shipment Information</h6>
              <div class="row clearfix">
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
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <div class="row clearfix">
                <div class="col text-right">
                  <a href="<?php echo base_url() ?>shipment/shipment_list?status=Picked up" class="btn btn-danger">Back</a>
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
  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
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

  function get_vol_weight() {
    var type_of_mode = "<?php echo $shipment['type_of_mode']; ?>";
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

  $(document).ready(function (){
    get_vol_weight();
  });
</script>