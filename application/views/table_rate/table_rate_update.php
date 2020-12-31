<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>table_rate/table_rate_update_process/<?php echo $table_rate_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update Table Rate</h6>
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($branch as $data) : ?>
                        <option value="<?= $data['id'] ?>" <?= ($data['id'] == $table_rate_list['id_branch']) ? 'selected' : ''; ?>><?= $data['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Zone</label>
                    <select class="form-control" name="zone" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($zone as $data) : ?>
                        <option value="<?= $data['zone'] ?>" <?=($data['zone'] == $table_rate_list['zone']) ? 'selected' : '';?>><?= $data['zone'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Type of Mode</label>
                    <select class="form-control" name="type_of_mode" required>
                      <option value="Air Freight" <?=($table_rate_list['type_of_mode'] == 'Air Freight') ? 'selected' : '';?>>Air Freight</option>
                      <option value="LCL" <?=($table_rate_list['type_of_mode'] == 'LCL') ? 'selected' : '';?>>LCL</option>
                      <option value="FCL" <?=($table_rate_list['type_of_mode'] == 'FCL') ? 'selected' : '';?>>FCL</option>
                      <option value="Land Freight" <?=($table_rate_list['type_of_mode'] == 'Land Freight') ? 'selected' : '';?>>Land Freight</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type='number' class="form-control" name="price" placeholder="Price" value="<?=$table_rate_list['price']?>" required>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>table_rate/table_rate_list" class="btn btn-secondary">Cancel</a>
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