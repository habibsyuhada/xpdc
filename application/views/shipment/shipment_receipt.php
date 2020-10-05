<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Shipment Receipt</h3>
          </div>
          <div class="card-body">
            <h6 class="font-weight-bold">Service Information</h6>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Type of Shipment</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['type_of_shipment'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['type_of_shipment'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Type of Mode</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['type_of_mode'] ?> <?php echo ($data_input['sea'] == "" ? "" : "(".$data_input['sea'].")") ?></label>
                    <input type="hidden" value="<?php echo $data_input['type_of_mode'] ?>">
                    <input type="hidden" value="<?php echo $data_input['sea'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <h6 class="font-weight-bold">Shipper Information</h6>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Shipper Name</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_name'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_name'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_address'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_address'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">City</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_city'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_city'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Country</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_country'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_country'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Postcode</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_postcode'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_postcode'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Contact Person</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_contact_person'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_contact_person'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Phone Number</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_phone_number'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_phone_number'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['shipper_email'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['shipper_email'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h6 class="font-weight-bold">Consignee Information</h6>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Consignee Name</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_name'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_name'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_address'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_address'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">City</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_city'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_city'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Country</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_country'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_country'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Postcode</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_postcode'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_postcode'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Contact Person</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_contact_person'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_contact_person'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Phone Number</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_phone_number'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_phone_number'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['consignee_email'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['consignee_email'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <h6 class="font-weight-bold">Shipment Information</h6>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Incoterms</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['incoterms'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['incoterms'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Description of Goods</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['description_of_goods'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['description_of_goods'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">HSCode</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['hscode'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['hscode'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">COO (Country of Origin)</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['coo'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['coo'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Declared Value</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['declared_value'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['declared_value'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Currency</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['currency'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['currency'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Ref No.</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['ref_no'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['ref_no'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h6 class="font-weight-bold">Billing Details</h6>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">XPDC Account No.</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_account'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_account'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_name'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_name'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_address'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_address'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">City</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_city'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_city'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Country</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_country'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_country'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Postcode</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_postcode'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_postcode'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Contact Person</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_contact_person'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_contact_person'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Phone Number</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_phone_number'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_phone_number'] ?>">
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $data_input['billing_email'] ?></label>
                    <input type="hidden" value="<?php echo $data_input['billing_email'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-2 row">
              <div class="text-left col-6">
              </div>
              <div class="text-right col-6">
                <span id="scan_loading" class="d-none"><i class="fas fa-circle-notch fa-spin"></i></i> Loading....</span> <button type="submit" class="btn btn-success" name="submit">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<script type="text/javascript">
  var num_scanned = 0;
  $("#form_history").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    $('button[name=submit]').attr('disabled', true);
    $('#scan_loading').removeClass('d-none');
    var url = $('#form_history').attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: $("#form_history").serialize(), // serializes the form's elements.
      success: function(data){
        $('input[name=tracking_no]').val('');
        if(data.includes('Error') == true){
          showDangerToast(data);
        }
        else{
          data = JSON.parse(data);
          num_scanned++;
          markup = "<tr>"
            +"<td>"+num_scanned+"</td>"
            +"<td>"+data.tracking_no+"</td>"
            +"<td>"+data.date+"</td>"
            +"<td>"+data.time+"</td>"
            +"<td>"+data.location+"</td>"
            +"<td>"+data.status+"</td>"
            +"<td>"+data.remarks+"</td>"
            +"<tr>";
          $("#table_history tbody").prepend(markup);
          showSuccessToast('Your Data has been submitted!');
        }
        $('button[name=submit]').attr('disabled', false);
        $('#scan_loading').addClass('d-none');
      }
    });
  });
</script>