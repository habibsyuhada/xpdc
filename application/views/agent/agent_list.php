<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Agent List</h3>
          </div>
          <div class="card-body">
            <a href="<?= base_url() ?>agent/agent_create" class="btn btn-success"><i class="fa fa-plus"></i> Add New Agent</a><br><br>
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Name</th>
                      <th class="text-white font-weight-bold">E-Mail</th>
                      <th class="text-white font-weight-bold">PIC</th>
                      <th class="text-white font-weight-bold">No. Telp.</th>
                      <th class="text-white font-weight-bold">Address</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($agent_list as $key => $value) : ?>
                      <tr>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['pic'] ?></td>
                        <td><?php echo $value['no_telp'] ?></td>
                        <td><?php echo $value['address'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>agent/agent_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <!-- <a href="<?php echo base_url() ?>agent/agent_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a> -->
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