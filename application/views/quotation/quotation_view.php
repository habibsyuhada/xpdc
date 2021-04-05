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
        <form action="<?php echo base_url() ?>quotation/quotation_update_process" method="POST">
          <input type="hidden" name="id" value="<?php echo $quotation['id'] ?>" required>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Quotation Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <table class='table table-borderless table-sm'>
                    <tr>
                      <td class="w-25">Account No.</td>
                      <td style="width: 2%">:</td>
                      <td><?= $quotation['customer_account'] ?></td>
                    </tr>
                    <tr>
                      <td>Customer Name</td>
                      <td>:</td>
                      <td><?= $quotation['customer_name'] ?></td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td>:</td>
                      <td><?= $quotation['customer_address'] ?></td>
                    </tr>
                    <tr>
                      <td>Contact Person</td>
                      <td>:</td>
                      <td><?= $quotation['customer_contact_person'] ?></td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td>:</td>
                      <td><?= $quotation['customer_phone_number'] ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?= $quotation['customer_email'] ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class='table table-borderless table-sm'>
                    <tr>
                      <td class="w-25">Payment Terms</td>
                      <td style="width: 2%">:</td>
                      <td><?= $quotation['payment_terms'] ?></td>
                    </tr>
                    <tr>
                      <td>Date</td>
                      <td>:</td>
                      <td><?= $quotation['date'] ?></td>
                    </tr>
                    <tr>
                      <td>Exp. Date</td>
                      <td>:</td>
                      <td><?= $quotation['exp_date'] ?></td>
                    </tr>
                    <tr>
                      <td>Prepared By</td>
                      <td>:</td>
                      <td><?= $quotation['created_by'] ?></td>
                    </tr>
                    <tr>
                      <td>Remarks</td>
                      <td>:</td>
                      <td><?= $quotation['tracking_no'] ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Service Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <table class='table table-borderless table-sm'>
                    <tr>
                      <td class="w-25">Type of Shipment</td>
                      <td style="width: 2%">:</td>
                      <td><?= $quotation['type_of_shipment'] ?></td>
                    </tr>
                    <tr>
                      <td>Type of Mode</td>
                      <td>:</td>
                      <td><?= $quotation['type_of_transport'] ?></td>
                    </tr>
                    <tr>
                      <td>Incoterms</td>
                      <td>:</td>
                      <td><?= $quotation['incoterms'] ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class='table table-borderless table-sm'>
                    <tr>
                      <td class="w-25">Type of Service</td>
                      <td style="width: 2%">:</td>
                      <td><?= $quotation['type_of_service'] ?></td>
                    </tr>
                    <tr>
                      <td>Sea</td>
                      <td>:</td>
                      <td><?= $quotation['sea'] ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <br>
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Shipper Information</h6>
                  <table class='table table-borderless table-sm'>
                    <tr>
                      <td class="w-25">Country</td>
                      <td style="width: 2%">:</td>
                      <td><?= $quotation['shipper_country'] ?></td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td>:</td>
                      <td><?= $quotation['shipper_city'] ?></td>
                    </tr>
                    <tr>
                      <td>Postcode</td>
                      <td>:</td>
                      <td><?= $quotation['shipper_postcode'] ?></td>
                    </tr>
                    <tr>
                      <td>Shipper Name</td>
                      <td>:</td>
                      <td><?= $quotation['shipper_name'] ?></td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td>:</td>
                      <td><?= $quotation['shipper_address'] ?></td>
                    </tr>
                    <tr>
                      <td>Contact Person</td>
                      <td>:</td>
                      <td><?= $quotation['shipper_contact_person'] ?></td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td>:</td>
                      <td><?= $quotation['shipper_phone_number'] ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?= $quotation['shipper_email'] ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Consignee Information</h6>
                  <table class='table table-borderless table-sm'>
                    <tr>
                      <td class="w-25">Country</td>
                      <td style="width: 2%">:</td>
                      <td><?= $quotation['consignee_country'] ?></td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td>:</td>
                      <td><?= $quotation['consignee_city'] ?></td>
                    </tr>
                    <tr>
                      <td>Postcode</td>
                      <td>:</td>
                      <td><?= $quotation['consignee_postcode'] ?></td>
                    </tr>
                    <tr>
                      <td>Shipper Name</td>
                      <td>:</td>
                      <td><?= $quotation['consignee_name'] ?></td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td>:</td>
                      <td><?= $quotation['consignee_address'] ?></td>
                    </tr>
                    <tr>
                      <td>Contact Person</td>
                      <td>:</td>
                      <td><?= $quotation['consignee_contact_person'] ?></td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td>:</td>
                      <td><?= $quotation['consignee_phone_number'] ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?= $quotation['consignee_email'] ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Cargo Information</h6>
              <div class="row clearfix">
                <div class="col-md-12">
                  <table class='table table-borderless table-sm'>
                    <tr>
                      <td class="w-25">Description of Goods</td>
                      <td style="width: 2%">:</td>
                      <td><?= $quotation['description_of_goods'] ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-12">
                  <table class="table text-center">
                    <thead>
                      <tr class="bg-info">
                        <th class="text-white font-weight-bold">Qty.</th>
                        <?php if($quotation['sea'] != 'FCL'): ?>
                        <th class="text-white font-weight-bold">Package Type</th>
                        <th class="text-white font-weight-bold">Length(cm)</th>
                        <th class="text-white font-weight-bold">Width(cm)</th>
                        <th class="text-white font-weight-bold">Height(cm)</th>
                        <th class="text-white font-weight-bold">Weight(kg)</th>
                        <?php else: ?>
                        <th class="text-white font-weight-bold">Container Type</th>
                        <th class="text-white font-weight-bold">Container Size</th>
                        <th class="text-white font-weight-bold">Seal No.</th>
                        <th class="text-white font-weight-bold">Seal No.</th>
                        <th class="text-white font-weight-bold">Gross Weight</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $act_weight = 0;
                      $vol_weight = 0;
                      $measurement = 0;
                      if ($quotation['type_of_transport'] == 'Air Freight') {
                        $per = 6000;
                      } else if ($quotation['type_of_transport'] == 'Land Shipping') {
                        $per = 4000;
                      } else if ($quotation['type_of_transport'] == 'Sea Transport') {
                        $per = 4000;
                      }
                      foreach ($cargo_list as $key => $value) :
                        $cargo_temp[] = $value['id'];
                        $act_weight = $act_weight + ($value['qty'] * $value['weight']);
                        $vol_weight = $vol_weight + ($value['qty'] * ($value['length'] * $value['width'] * $value['height']) / $per);
                        $measurement = $measurement + ($value['qty'] * ($value['length'] * $value['width'] * $value['height']) / 1000000);
                      ?>
                        <tr>
                          <td><?php echo $value['qty'] ?></td>
                          <td><?php echo $value['piece_type'] ?></td>
                          <?php if($quotation['sea'] != 'FCL'): ?>
                          <td><?php echo $value['length'] + 0 ?></td>
                          <td><?php echo $value['width'] + 0 ?></td>
                          <td><?php echo $value['height'] + 0 ?></td>
                          <td><?php echo $value['weight'] + 0 ?></td>
                          <?php else: ?>
                          <td><?php echo $value['size'] ?></td>
                          <td><?php echo $value['container_no'] ?></td>
                          <td><?php echo $value['seal_no'] ?></td>
                          <td><?php echo $value['weight']+0 ?></td>
                          <?php endif; ?>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <br>
                <div class="col-md-4">
                  Act. Weight : <?php echo number_format($act_weight, 2) ?> Kg
                </div>
                <div class="col-md-4">
                  Vol. Weight : <?php echo number_format($vol_weight, 2) ?> Kg
                </div>
                <div class="col-md-4">
                  Measurement : <?php echo number_format($measurement, 2) ?> M<sup>3</sup>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Charges Information</h6>
              <div class="row clearfix">
                <div class="col-12">
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
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $total_all = 0;
                      foreach ($charges_list as $key => $value) :
                        $charges_temp[] = $value['id'];
                        $persen = 1;
                        if ($value['uom'] == "%") {
                          $persen = 100;
                        }
                        $total_all += ($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate'];
                      ?>
                        <tr>
                          <td><?php echo $value['description'] ?></td>
                          <td><?php echo $value['qty'] ?></td>
                          <td><?= $value['uom'] ?></td>
                          <td><?php echo $value['currency'] ?></td>
                          <td><?php echo $value['unit_price'] ?></td>
                          <td><?php echo number_format((($value['qty'] / $persen) * $value['unit_price']), 0) . ".00" ?></td>
                          <td><?php echo $value['exchange_rate'] ?></td>
                          <td><?php echo number_format((($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate']), 0) . ".00" ?></td>
                          <td><?php echo $value['remarks'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="row clearfix">
                  <div class="col-md">
                    <h5 class="font-weight-bold text-right">Total All : IDR <span id="total_all" name="total_all"><?php echo number_format($total_all, 0) . ".00" ?></span></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Additional</h6>
              <input type="hidden" name="temp_cargo_id" value="<?= implode("|", $cargo_temp); ?>" />
              <input type="hidden" name="temp_charges_id" value="<?= implode("|", $charges_temp) ?>" />
              <div class="row clearfix">
                <div class="col-md-12">
                  <table class="table text-center">
                    <thead>
                      <tr class="bg-info">
                        <th class="text-white font-weight-bold">Terms and Conditions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $term_condition = explode("\n", $quotation['term_condition']);
                      foreach ($term_condition as $key => $value) :
                      ?>
                        <tr>
                          <td class="text-left"><?php echo $value ?></td>
                        </tr>
                      <?php endforeach; ?>
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
  $("select[name=type_of_transport]").on("change", function() {
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
    $(btn).closest("tbody").find("tr:last").find("input").val('');
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }

  function deletecargo(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>quotation/quotation_cargo_delete_process/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Cargo data has been Delete!');
        }
      });
    }
  }

  function deletecharges(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>quotation/quotation_charges_delete_process/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Cargo data has been Delete!');
        }
      });
    }
  }

  $(document).ready(function() {
    get_vol_weight();
    <?php if ($quotation['shipper_tba'] == 1) : ?>
      tba_data('shipper');
      $('input[name=shipper_tba]').prop("checked", true);
    <?php endif; ?>
    <?php if ($quotation['consignee_tba'] == 1) : ?>
      tba_data('consignee');
      $('input[name=consignee_tba]').prop("checked", true);
    <?php endif; ?>
  });

  function get_vol_weight() {
    var type_of_transport = $("select[name=type_of_transport]").val();
    var per = 1;
    var total_act_weight = 0;
    var total_vol_weight = 0;
    var total_measurement = 0;
    var length_array = [];
    var width_array = [];
    var height_array = [];
    var weight_array = [];
    var qty_array = [];

    if (type_of_transport == 'Air Freight') {
      per = 6000;
    } else if (type_of_transport == 'Land Shipping') {
      per = 4000;
    } else if (type_of_transport == 'Sea Transport') {
      per = 4000;
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
      // console.log(length_array[index], width_array[index], height_array[index], weight_array[index], qty_array[index], per);
      var actual_weight = qty_array[index] * weight_array[index];
      var volume_weight = qty_array[index] * (length_array[index] * width_array[index] * height_array[index]) / per;
      var measurement = qty_array[index] * (length_array[index] * width_array[index] * height_array[index]) / 1000000;

      console.log(volume_weight + " = " + qty_array[index] + " * (" + length_array[index] + " * " + width_array[index] + " * " + height_array[index] + ") / " + per);

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
      $(row).find("input[name='charges_subtotal_view[]']").val(subtotal.toLocaleString('en-US', {maximumFractionDigits:2, minimumFractionDigits: 2}));

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

  function tba_data(data_tba) {
    var ro = $("input[name=" + data_tba + "_name]").prop('readonly');
    var req = $("input[name=" + data_tba + "_name]").prop('required');
    $("input[name=" + data_tba + "_postcode]").val('').prop('readonly', !ro);
    $("input[name=" + data_tba + "_name]").val('').prop('readonly', !ro).prop('required', !req);
    $("textarea[name=" + data_tba + "_address]").val('').prop('readonly', !ro).prop('required', !req);
    $("input[name=" + data_tba + "_contact_person]").val('').prop('readonly', !ro).prop('required', !req);
    $("input[name=" + data_tba + "_phone_number]").val('').prop('readonly', !ro).prop('required', !req);
    $("input[name=" + data_tba + "_email]").val('').prop('readonly', !ro);
  }
</script>