<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>payment_terms/payment_terms_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New Payment Terms</h6>
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <input type="text" class="form-control" name="name" placeholder="Payment Terms" required>
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