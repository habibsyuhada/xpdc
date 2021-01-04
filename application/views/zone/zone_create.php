<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>zone/zone_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New Zone</h6>
                  <div class="form-group">
                    <label>Zone Name</label>
                    <input type="text" class="form-control" name="zone_name" placeholder="Country" required>
                  </div>
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch" required>
                      <option value="">- Select One -</option>
                      <?php foreach ($branch_list as $branch) : ?>
                        <option value="<?=$branch['id']?>"><?=$branch['name']. " (".$branch['code'].")"?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category" required>
                      <option value="International">International</option>
                      <option value="Domestic">Domestic</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="zone" placeholder="Zone" required>
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