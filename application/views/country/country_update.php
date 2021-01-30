<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>country/country_update_process/<?php echo $country_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update Country</h6>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="country" value="<?php echo $country_list['country'] ?>" placeholder="Country">
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="country_code" value="<?php echo $country_list['country_code'] ?>" placeholder="Country Code">
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>country/country_list" class="btn btn-secondary">Cancel</a>
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