<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>user/user_update_process/<?php echo $user_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update User</h6>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $user_list['name'] ?>" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user_list['email'] ?>" placeholder="E-Mail" readonly>
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role" required>
                      <option value="">-- Select Role --</option>
                      <option value="Super Admin" <?php echo ($user_list['role'] == "Super Admin" ? 'selected' : '') ?>>Super Admin</option>
                      <option value="Operator" <?php echo ($user_list['role'] == "Operator" ? 'selected' : '') ?>>Operator</option>
                      <option value="Driver" <?php echo ($user_list['role'] == "Driver" ? 'selected' : '') ?>>Driver</option>
                      <option value="Finance" <?php echo ($user_list['role'] == "Finance" ? 'selected' : '') ?>>Finance</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch" required>
                      <option value="">-- Select Branch --</option>
                      <option value="NONE" <?php echo ($user_list['branch'] == "NONE" ? 'selected' : '') ?>>NONE</option>
                      <option value="BATAM" <?php echo ($user_list['branch'] == "BATAM" ? 'selected' : '') ?>>BATAM</option>
                      <option value="JAKARTA" <?php echo ($user_list['branch'] == "JAKARTA" ? 'selected' : '') ?>>JAKARTA</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>user/user_list" class="btn btn-secondary">Cancel</a>
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