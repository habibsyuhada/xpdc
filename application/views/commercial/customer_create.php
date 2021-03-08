<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>commercial/customer_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h6 class="font-weight-bold">Create Customer</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="country" required onchange="select_country(this)">>
                      <option value="">- Select One -</option>
                      <?php foreach ($country['data'] as $data) { ?>
                        <option value="<?= $data['location'] ?>"><?= $data['location'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" placeholder="City" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="postcode" placeholder="Postcode" required>
                  </div>
                  <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" class="form-control" name="contact_person" placeholder="Contact Person" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required>
                  </div>
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
                  </div>
                  <div class="form-group">
                    <label>Tax Registration</label>
                    <input type="text" class="form-control" name="vat" placeholder="Tax Registration" required>
                  </div>
                  <div class="form-group">
                    <label>Discount</label>
                    <input type="number" class="form-control" name="discount" step="0.01" placeholder="Discount" required>
                  </div>
                </div>
              </div>

              <h6 class="font-weight-bold border-bottom">Accounting Contact</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="account_name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" class="form-control" name="account_email" placeholder="E-Mail" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="account_phone_number" placeholder="Phone Number" required>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  $(".select2").select2({
    theme: "bootstrap4"
  });

  function select_country(input) {
    var select_city = $("[name=city]");;
    var name_city = "city";
    $.ajax( {
      url: "<?php echo base_url() ?>country/city_autocomplete",
      dataType: "json",
      data: {
        // term: request.term,
        country: $(input).val(),
      },
      success: function( data ) {
        console.log(data);
        // data = JSON.parse(data);
        // console.log(data);
        var content = $(select_city).parent();
        $("select[name="+name_city+"]").select2("destroy");
        $(select_city).remove();
        if(data.length > 0){
          var html = '<select class="form-control select2" name="'+name_city+'" required>';
          $.each(data, function(index, value) {
            html += "<option value='"+value+"'>"+value+"</option>";
          });
          html += "</select>";
          $(content).append(html);
          $("[name="+name_city+"]").select2({theme: "bootstrap4"});
        }
        else{
          var html = '<input type="text" class="form-control" name="'+name_city+'" placeholder="City">';
          $(content).append(html);
        }
      }
    });
  }
</script>