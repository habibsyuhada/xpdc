<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>package_type/package_type_update_process/<?php echo $package_type_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update Package Type</h6>
                  <div class="form-group">
                    <label>Package Type</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $package_type_list['name'] ?>" placeholder="Package Type">
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>package_type/package_type_list" class="btn btn-secondary">Cancel</a>
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