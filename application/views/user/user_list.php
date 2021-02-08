<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Filter</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik minimize-card ik-minus"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <form id="form_filter" action="" method="GET">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch">
                      <option value="">-- Select One --</option>
                      <?php foreach ($branch_list as $key => $value) : ?>
                        <option <?php echo ($this->input->get('branch') == $key ? 'selected' : '') ?> value="<?php echo $key ?>"><?php echo $key ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                      <option value="">-- Select One --</option>
                      <option <?php echo ($this->input->get('role') == 'Super Admin' ? 'selected' : '') ?> value="Super Admin">Super Admin</option>
                      <option <?php echo ($this->input->get('role') == 'Operator' ? 'selected' : '') ?> value="Operator">Operator</option>
                      <option <?php echo ($this->input->get('role') == 'Driver' ? 'selected' : '') ?> value="Driver">Driver</option>
                      <option <?php echo ($this->input->get('role') == 'Finance' ? 'selected' : '') ?> value="Finance">Finance</option>
                      <option <?php echo ($this->input->get('role') == 'Commercial' ? 'selected' : '') ?> value="Commercial">Commercial</option>
                      <option <?php echo ($this->input->get('role') == 'Customer' ? 'selected' : '') ?> value="Customer">Customer</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md text-right">
                  <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Search</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>User List</h3>
          </div>
          <div class="card-body">
            <a href="<?= base_url() ?>user/user_create" class="btn btn-success"><i class="fa fa-plus"></i> Add New User</a><br><br>
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Name</th>
                      <th class="text-white font-weight-bold">E-Mail</th>
                      <th class="text-white font-weight-bold">Role</th>
                      <th class="text-white font-weight-bold">Branch</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($user_list as $key => $value) : ?>
                      <tr>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['role'] ?></td>
                        <td><?php echo $value['branch'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>user/user_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url() ?>user/user_rest_password/<?php echo $value['id'] ?>" class="btn btn-success" title="Reset" onclick="return confirm('Are You Sure?')"><i class="fas fa-redo-alt"></i></a>
                          <a href="<?php echo base_url() ?>user/user_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>