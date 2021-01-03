<style type="text/css">
  a.nav-link.active {
    border-width: 4px;
    border-bottom: 4px solid #007bff;
  }

  a.nav-link {
    border-radius: 0px !important;
  }

  a.nav-link:not(.active):hover {
    transition: all 0.3s ease-in-out;
    border-bottom: 4px solid #007bff;
  }
</style>
<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <form action="<?php echo base_url() ?>quotation/quotation_approval_process/<?php echo $quotation['id'] ?>/2" method="POST">
          <input type="hidden" name="id" value="<?php echo $quotation['id'] ?>" required>
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Quotation Reject</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Quotation No</label>
                    <input type="text" class="form-control" value="<?php echo $quotation['quotation_no'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Remarks</label>
                    <textarea rows="4" class="form-control" name="remarks" placeholder="Remarks" required></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body overflow-auto">
              <div class="row clearfix">
                <div class="col text-right">
                  <a href="#" class="btn btn-danger">Cancel</a>
                  <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>