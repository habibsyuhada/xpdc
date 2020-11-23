<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>branch/branch_update_process/<?php echo $branch_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update Branch</h6>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $branch_list['name'] ?>" placeholder="Name" readonly>
                  </div>
                  <div class="form-group">
                    <label>Code</label>
                    <input type="text" class="form-control" name="code" value="<?php echo $branch_list['code'] ?>" placeholder="Code" required>
                  </div>
                  <div class="form-group">
                    <label>No. Telp.</label>
                    <input type="text" class="form-control" name="no_telp" value="<?php echo $branch_list['no_telp'] ?>" placeholder="No. Telp." required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" placeholder="Address" rows="4"><?php echo $branch_list['address'] ?></textarea required>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>branch/branch_list" class="btn btn-secondary">Cancel</a>
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