<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>country/country_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New Country</h6>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="country" placeholder="Country" required>
                  </div>
                  <div class="form-group">
                    <label>Country Code</label>
                    <input type="text" class="form-control" name="country_code" placeholder="Country Code" required>
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