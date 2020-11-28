<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Customer List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"></th>
                      <th class="text-white font-weight-bold">Name</th>
                      <th class="text-white font-weight-bold">Email</th>
                      <th class="text-white font-weight-bold">Address</th>
                      <th class="text-white font-weight-bold">City</th>
                      <th class="text-white font-weight-bold">Country</th>
                      <th class="text-white font-weight-bold">Postcode</th>
                      <th class="text-white font-weight-bold">Contact Person</th>
                      <th class="text-white font-weight-bold">Phone Number</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($customer_list as $key => $value): ?>
                    <tr>
                      <td><input type="checkbox" class="checkbox-20"></td>
                      <td><?php echo $value['name'] ?></td>
                      <td><?php echo $value['email'] ?></td>
                      <td><?php echo $value['address'] ?></td>
                      <td><?php echo $value['city'] ?></td>
                      <td><?php echo $value['country'] ?></td>
                      <td><?php echo $value['postcode'] ?></td>
                      <td><?php echo $value['contact_person'] ?></td>
                      <td><?php echo $value['phone_number'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>commercial/customer_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                        <a href="<?php echo base_url() ?>commercial/customer_rest_password/<?php echo $value['id'] ?>" class="btn btn-success" title="Reset" onclick="return confirm('Are You Sure?')"><i class="fas fa-redo-alt"></i></a>
                        <a href="<?php echo base_url() ?>commercial/customer_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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