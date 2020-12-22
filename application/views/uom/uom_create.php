<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>uom/uom_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New UOM</h6>
                  <div class="form-group">
                    <label>UOM</label>
                    <input type="text" class="form-control" name="name" placeholder="UOM" required>
                  </div>
                  <div class="form-group">
                    <label>Value Calculation</label>
                    <input type="text" class="form-control" name="calc" placeholder="ex: $val / 100">
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