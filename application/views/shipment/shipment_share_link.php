<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row clearfix">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Link Guest Create Shipment</label>
                  <textarea class="form-control" rows="3" readonly><?php echo base_url() ?>home/shipment_create/<?php echo strtr($this->encryption->encrypt('2020-10-09'), '+=/', '.-~') ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>