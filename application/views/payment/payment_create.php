<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>payment/payment_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New Payment Information</h6>
                  <div class="form-group">
                    <label>Branch</label>
                    <select name="branch" class='form-control' required>
                      <option value="">- Select One -</option>
                      <?php foreach ($branch as $row) { ?>
                        <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Beneficiary Name</label>
                    <input type="text" class="form-control" name="beneficiary_name" placeholder="Beneficiary Name" required>
                  </div>
                  <div class="form-group">
                    <label>Beneficiary Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" placeholder="Beneficiary Bank Name" required>
                  </div>
                  <div class="form-group">
                    <label>Beneficiary Bank Address</label>
                    <input type="text" class="form-control" name="bank_address" placeholder="Beneficiary Bank Address">
                  </div>
                  <div class="form-group">
                    <label>Account No</label>
                    <input type="text" class="form-control" name="account_no" placeholder="Account No" required>
                  </div>
                  <div class="form-group">
                    <label>Swift Code</label>
                    <input type="text" class="form-control" name="swift_code" placeholder="Swift Code">
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>payment/payment_list" class="btn btn-secondary">Cancel</a>
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