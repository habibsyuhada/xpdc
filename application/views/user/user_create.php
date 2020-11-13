<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>user/user_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New User</h6>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role" required>
                      <option value="">-- Select Role --</option>
                      <option value="Super Admin">Super Admin</option>
                      <option value="Operator">Operator</option>
                      <option value="Driver">Driver</option>
                      <option value="Finance">Finance</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch" required>
                      <option value="">-- Select Branch --</option>
                      <option value="NONE">NONE</option>
                      <?php foreach ($branch_list as $key => $value) : ?>
                      <option value="<?php echo $key ?>"><?php echo $key ?></option>
                      <?php endforeach; ?>
                    </select>
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