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
    <form action="<?php echo base_url(); ?>shipment/shipment_update_process" method="POST" class="forms-sample">
      <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
      <input type="hidden" name="tracking_no" value="<?php echo $shipment['tracking_no'] ?>">
      <input type="hidden" name="master_tracking" value="<?php echo $shipment['master_tracking'] ?>">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <hr class="mt-0">
              <p class="m-0 text-center">Master Tracking Number</p>
              <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment['master_tracking'] ?></h1>
              <hr class="mb-0">
            </div>
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="shipping-info-tab" data-toggle="tab" href="#shipping-info" role="tab" aria-controls="shipping-info" aria-selected="true">Shipping Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="assign-shipment-tab" data-toggle="tab" href="#assign-shipment" role="tab" aria-controls="assign-shipment" aria-selected="false">Assign Shipment</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="shipping-info" role="tabpanel" aria-labelledby="shipping-info-tab">
                  <br>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Main Agent</h6>
                      <div class="form-group">
                        <label>Agent Name</label>
                        <input type="text" class="form-control" name="main_agent_name" placeholder="Main Agent Name" value="<?= $shipment['main_agent_mawb_mbl'] ?>">
                      </div>
                      <div class="form-group">
                        <label>MAWB / MBL</label>
                        <input type="text" class="form-control" name="main_agent_mawb_mbl" placeholder="MAWB / MBL" value="<?= $shipment['main_agent_mawb_mbl'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Carrier</label>
                        <input type="text" class="form-control" name="main_agent_carrier" placeholder="Carrier" value="<?= $shipment['main_agent_carrier'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight No.</label>
                        <input type="text" class="form-control" name="main_agent_voyage_flight_no" placeholder="Voyage/Flight No." value="<?= $shipment['main_agent_voyage_flight_no'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight Date</label>
                        <input type="date" class="form-control" name="main_agent_voyage_flight_date" placeholder="Voyage/Flight Date" value="<?= @$shipment['main_agent_voyage_flight_date'] ?>">
                      </div>
                      <!-- <div class="form-group">
                        <label>Cost</label>
                        <input type="number" class="form-control" name="main_agent_cost" placeholder="Cost" value="<?= @$shipment['main_agent_cost'] ?>">
                      </div> -->
                    </div>
                    <div class="col-md-6">
                      <h6 class="font-weight-bold">Secondary Agent</h6>
                      <div class="form-group">
                        <label>Agent Name</label>
                        <input type="text" class="form-control" name="secondary_agent_name" placeholder="Secondary Agent Name" value="<?= $shipment['secondary_agent_mawb_mbl'] ?>">
                      </div>
                      <div class="form-group">
                        <label>MAWB / MBL</label>
                        <input type="text" class="form-control" name="secondary_agent_mawb_mbl" placeholder="MAWB / MBL" value="<?= $shipment['secondary_agent_mawb_mbl'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Carrier</label>
                        <input type="text" class="form-control" name="secondary_agent_carrier" placeholder="Carrier" value="<?= $shipment['secondary_agent_carrier'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight No.</label>
                        <input type="text" class="form-control" name="secondary_agent_voyage_flight_no" placeholder="Voyage/Flight No." value="<?= $shipment['secondary_agent_voyage_flight_no'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Voyage/Flight Date</label>
                        <input type="date" class="form-control" name="secondary_agent_voyage_flight_date" placeholder="Voyage/Flight No." value="<?= @$shipment['secondary_agent_voyage_flight_date'] ?>">
                      </div>
                      <!-- <div class="form-group">
                        <label>Cost</label>
                        <input type="number" class="form-control" name="secondary_agent_cost" placeholder="Cost" value="<?= @$shipment['secondary_agent_cost'] ?>">
                      </div> -->
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Port of Loading</label>
                        <input type="text" class="form-control" name="port_of_loading" placeholder="Port of Loading" value="<?= $shipment['port_of_loading'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Port of Discharge</label>
                        <input type="text" class="form-control" name="port_of_discharge" placeholder="Port of Discharge" value="<?= $shipment['port_of_discharge'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Container No</label>
                        <input type="text" class="form-control" name="container_no" placeholder="Container No." value="<?= $shipment['container_no'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Seal No.</label>
                        <input type="text" class="form-control" name="seal_no" placeholder="Seal No." value="<?= $shipment['seal_no'] ?>">
                      </div>
                      <div class="form-group">
                        <label>CIPL No.</label>
                        <input type="text" class="form-control" name="cipl_no" placeholder="CIPL No." value="<?= $shipment['cipl_no'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Permit No.</label>
                        <input type="text" class="form-control" name="permit_no" placeholder="Permit No." value="<?= $shipment['permit_no'] ?>">
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
                        <select class="form-control" name="assign_employee">
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Client</label>
                        <select class="form-control" name="assign_client">
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Agent</label>
                        <select class="form-control" name="assign_agent">
                          <option value="">-- Select One --</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Branch</label>
                        <select class="form-control" name="assign_branch">
                          <option value="">-- Select One --</option>
                          <option value="BATAM" <?php echo ($shipment['assign_branch'] == "BATAM" ? 'selected' : '') ?>>BATAM</option>
                          <option value="JAKARTA" <?php echo ($shipment['assign_branch'] == "JAKARTA" ? 'selected' : '') ?>>JAKARTA</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Driver</label>
                        <select class="form-control" name="assign_driver">
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

  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
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

  function deletehistory(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>shipment/shipment_history_delete_process/<?php echo $shipment['id'] ?>/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Shipment Package data has been Delete!');
        }
      });
    }
  }

  $('.next-tab').click(function() {
    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.previous-tab').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });

  $(document).ready(function (){
    get_vol_weight();
  });
</script>