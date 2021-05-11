<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>quotation/type_of_service_update_process/<?php echo $type_of_service_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update Type of Service</h6>
                  <div class="form-group">
                    <label>TOS Code</label>
                    <input type="text" class="form-control" name="tos_code" placeholder="TOS Code" value="<?= $type_of_service_list['tos_code'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>TOS Name</label>
                    <input type="text" class="form-control" name="tos_name" placeholder="TOS Name" value="<?= $type_of_service_list['tos_name'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Is Delivery?</label>
                    <select name="is_delivery" class="form-control" required>
                      <option value="1" <?= ($type_of_service_list['is_delivery'] == 1) ? 'selected' : ''; ?>>Yes</option>
                      <option value="0" <?= ($type_of_service_list['is_delivery'] == 0) ? 'selected' : ''; ?>>No</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>quotation/type_of_service_list" class="btn btn-secondary">Cancel</a>
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