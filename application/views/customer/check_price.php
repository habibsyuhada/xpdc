<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Check Price</h3>
          </div>
          <div class="card-body">
            <form id='formData' method="POST">
              <input type="hidden" class="form-control" name="act_weight" placeholder="Total Weight" required>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="country" onchange="select_country(this)" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($country as $value) { ?>
                        <option value="<?= $value['country'] ?>"><?= $value['country'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" placeholder="City">
                  </div>
                </div>
                <!-- <div class="col-md-3">
                  <div class="form-group">
                    <label>Total Weight</label>
                    <input type="number" class="form-control" name="weight" placeholder="Total Weight" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <label>Action</label><br>
                  <button type="submit" name="btn_action" class="btn btn-warning"><i class="fa fa-search"></i> Calculate</button>
                </div> -->
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="table text-center" id="table_packages">
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
                          <select class="form-control" name="piece_type[]" title="NONFCL">
                            <option value="">-- Select One --</option>
                            <?php foreach ($package_type as $data) : ?>
                              <option value="<?= $data['name'] ?>"><?= $data['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                          <select class="form-control d-none" name="piece_type[]" title="FCL" disabled>
                            <option value="">-- Select One --</option>
                            <option value="General Purpose">General Purpose</option>
                            <option value="High Cube">High Cube</option>
                            <option value="Refrigerator">Refrigerator</option>
                          </select>
                        </td>
                        <td>
                          <input type="number" class="form-control" step="any" name="length[]" title="NONFCL" value="0" oninput="get_vol_weight()">
                          <select class="form-control d-none" name="size[]" title="FCL">
                            <option value="">-- Select One --</option>
                            <option value="20 feet">20 feet</option>
                            <option value="40 feet">40 feet</option>
                            <option value="45 feet">45 feet</option>
                          </select>
                        </td>
                        <td>
                          <input type="number" class="form-control" step="any" name="width[]" title="NONFCL" value="0" oninput="get_vol_weight()">
                          <input type="text" class="form-control d-none" step="any" name="container_no[]" title="FCL" value="-">
                        </td>
                        <td>
                          <input type="number" class="form-control" step="any" name="height[]" title="NONFCL" value="0" oninput="get_vol_weight()">
                          <input type="text" class="form-control d-none" step="any" name="seal_no[]" title="FCL" value="-">
                        </td>
                        <td>
                          <input type="number" class="form-control" step="any" name="weight[]" value="0" oninput="get_vol_weight()">
                        </td>
                        <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-md-4">
                    Act. Weight : <span id="act_weight">0</span> Kg
                  </div>
                  <br>
                </div>
                <div class="col-md-3">
                  <button type="submit" name="btn_action" class="btn btn-warning"><i class="fa fa-search"></i> Calculate</button>
                </div>
              </div>
              <br>
            </form>
            <div class="row">
              <div class="col-md-12">
                <div id="load_price"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $("#formData").submit(function(e) {
    e.preventDefault();
    var loading = `<h4 class="font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> Waiting to Calculate Price</h4>`;
    $("#load_price").html(loading);
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>customer/check_price_process",
      data: $("#formData").serialize()
    }).done(function(resp) {
      $("#load_price").html(resp);
    });
  });

  $(".select2").select2();

  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
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

    $("#act_weight").html(total_act_weight.toLocaleString('en-US', {
      maximumFractionDigits: 2,
      minimumFractionDigits: 2
    }));
    $("input[name=act_weight]").val(total_act_weight.toLocaleString('en-US', {
      maximumFractionDigits: 2,
      minimumFractionDigits: 2
    }));
    // $("#vol_weight").html(total_vol_weight.toLocaleString('en-US', {
    //   maximumFractionDigits: 2,
    //   minimumFractionDigits: 2
    // }));
    // $("#measurement").html(total_measurement.toLocaleString('en-US', {
    //   maximumFractionDigits: 2,
    //   minimumFractionDigits: 2
    // }));

  }

  function select_country(input) {
    var select_city = $("[name=city]");
    var name_city = "city";
    $.ajax({
      url: "<?php echo base_url() ?>country/city_autocomplete",
      dataType: "json",
      data: {
        country: $(input).val(),
      },
      success: function(data) {
        console.log(data);
        var content = $(select_city).parent();
        $("select[name=" + name_city + "]").select2("destroy");
        $(select_city).remove();
        if (data.length > 0) {
          var html = '<select class="form-control select2" name="' + name_city + '" required>';
          $.each(data, function(index, value) {
            html += "<option value='" + value + "'>" + value + "</option>";
          });
          html += "</select>";
          $(content).append(html);
          $("[name=" + name_city + "]").select2({
            theme: "bootstrap4"
          });
        } else {
          var html = '<input type="text" class="form-control" name="' + name_city + '" placeholder="City">';
          $(content).append(html);
        }
      }
    });
  }
</script>