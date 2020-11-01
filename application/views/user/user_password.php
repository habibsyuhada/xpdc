<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>user/user_password_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Change Password</h6>
                  <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                  </div>
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
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