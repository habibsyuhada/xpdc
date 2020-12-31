<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>table_rate/table_rate_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New Table Rate</h6>
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($branch as $data) : ?>
                        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Zone</label>
                    <select class="form-control" name="zone" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($zone as $data) : ?>
                        <option value="<?= $data['zone'] ?>"><?= $data['zone'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Type of Mode</label>
                    <select class="form-control" name="type_of_mode" required>
                      <option value="Air Freight">Air Freight</option>
                      <option value="LCL">LCL</option>
                      <option value="FCL">FCL</option>
                      <option value="Land Freight">Land Freight</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type='number' class="form-control" name="price" placeholder="Price" required>
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