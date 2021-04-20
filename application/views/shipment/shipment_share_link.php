<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row clearfix">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Link Guest Create Shipment for <?php echo date('Y-m-d') ?></label>
                  <textarea class="form-control" rows="3" readonly><?php echo base_url() ?>home/shipment_create/<?php echo $this->session->userdata('branch') ?>/<?php echo strtr($this->encryption->encrypt(date('Y-m-d')), '+=/', '.-~') ?>/<?php echo $this->session->userdata('id') ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>