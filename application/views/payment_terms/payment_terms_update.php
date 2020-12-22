<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>payment_terms/payment_terms_update_process/<?php echo $payment_terms_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update Payment Terms</h6>
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $payment_terms_list['name'] ?>" placeholder="Payment Terms">
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>payment_terms/payment_terms_list" class="btn btn-secondary">Cancel</a>
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