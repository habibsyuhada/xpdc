<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>payment/payment_update_process/<?php echo $payment_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update UOM</h6>
                  <div class="form-group">
                    <label>Branch</label>
                    <select name="branch" class='form-control' required>
                      <option value="">- Select One -</option>
                      <?php foreach ($branch as $row) { ?>
                        <option value="<?= $row['name'] ?>" <?=($row['name'] == $payment_list['branch']) ? 'selected' : ''?>><?= $row['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Beneficiary Name</label>
                    <input type="text" class="form-control" name="beneficiary_name" placeholder="Beneficiary Name" value="<?=$payment_list['beneficiary_name']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Beneficiary Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" placeholder="Beneficiary Bank Name" value="<?=$payment_list['bank_name']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Beneficiary Bank Address</label>
                    <input type="text" class="form-control" name="bank_address" placeholder="Beneficiary Bank Address" value="<?=$payment_list['bank_address']?>">
                  </div>
                  <div class="form-group">
                    <label>Account No</label>
                    <input type="text" class="form-control" name="account_no" placeholder="Account No" value="<?=$payment_list['account_no']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Swift Code</label>
                    <input type="text" class="form-control" name="swift_code" placeholder="Swift Code" value="<?=$payment_list['swift_code']?>">
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