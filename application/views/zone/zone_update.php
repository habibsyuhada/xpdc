<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>zone/zone_update_process/<?php echo $zone_list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Update Zone</h6>
                  <div class="form-group">
                    <label>Zone Name</label>
                    <input type="text" class="form-control" name="zone_name" placeholder="Zone Name" value="<?php echo $zone_list['zone_name'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($branch_list as $branch) : ?>
                        <option value="<?= $branch['id'] ?>" <?= ($zone_list['id_branch'] == $branch['id']) ? 'selected' : ''; ?>><?= $branch['name'] . " (" . $branch['code'] . ")" ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category" required>
                      <option value="International" <?= ($zone_list['category'] == 'International') ? 'selected' : ''; ?>>International</option>
                      <option value="Domestic" <?= ($zone_list['category'] == 'Domestic') ? 'selected' : ''; ?>>Domestic</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="country[]" id="country" multiple>
                      <?php foreach ($country as $data) : ?>
                        <option value="<?= $data['country'] ?>" <?=(in_array($data['country'], $detail)) ? 'selected' : '';?>><?= $data['country'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>zone/zone_list" class="btn btn-secondary">Cancel</a>
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
<script>
  $(".select2").select2();
</script>