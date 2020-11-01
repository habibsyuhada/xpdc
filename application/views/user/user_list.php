<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Master Tracking List</h3>
          </div>
          <div class="card-body">
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
                    <?php foreach ($user_list as $key => $value): ?>
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