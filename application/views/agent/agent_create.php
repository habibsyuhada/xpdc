<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>agent/agent_create_process" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold">Create New Agent</h6>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                  </div>
                  <div class="form-group">
                    <label>PIC</label>
                    <input type="text" class="form-control" name="pic" placeholder="PIC" required>
                  </div>
                  <div class="form-group">
                    <label>No. Telp.</label>
                    <input type="text" class="form-control" name="no_telp" placeholder="No. Telp." required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" placeholder="Address" rows="4"></textarea required>
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