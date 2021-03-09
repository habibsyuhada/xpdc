<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>report/summary_report_process" method="POST" target="_blank" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-6">
                  <h6 class="font-weight-bold"><?php echo $meta_title ?></h6>
                  <div class="form-group">
                    <label>Date From</label>
                    <input type="date" class="form-control" name="date_from" placeholder="---" required>
                  </div>
                  <div class="form-group">
                    <label>Date To</label>
                    <input type="date" class="form-control" name="date_to" placeholder="---" required>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <button type="submit" class="btn btn-success">Download</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>