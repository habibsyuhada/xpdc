<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>commercial/customer_update_process/<?php echo $customer_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h6 class="font-weight-bold">Update Customer</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $customer_list['name'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" class="form-control" name="email" placeholder="E-Mail" value="<?php echo $customer_list['email'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" placeholder="Address" required><?php echo $customer_list['address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $customer_list['city'] ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="country" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($country['data'] as $data) { ?>
                        <option value="<?= $data['location'] ?>" <?php echo ($data['location'] == $customer_list['country']) ? 'selected' : ''; ?>><?= $data['location'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?php echo $customer_list['postcode'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" class="form-control" name="contact_person" placeholder="Contact Person" value="<?php echo $customer_list['contact_person'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="<?php echo $customer_list['phone_number'] ?>" required>
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
</script>