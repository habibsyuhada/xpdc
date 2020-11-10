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
    <form action="<?php echo base_url(); ?>shipment/shipment_assign_process" method="POST" class="forms-sample">
      <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
      <input type="hidden" name="tracking_no" value="<?php echo $shipment['tracking_no'] ?>">
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <hr class="mt-0">
              <p class="m-0 text-center">Shipment Number</p>
              <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment['tracking_no'] ?></h1>
              <hr class="mb-0">
            </div>
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              
              <br>
              <div class="row clearfix">
                <div class="col-md-12">
                  <h6 class="font-weight-bold">Assign Shipment</h6>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Employee</label>
                    <select class="form-control" name="assign_employee">
                      <option value="">-- Select One --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Client</label>
                    <select class="form-control" name="assign_client">
                      <option value="">-- Select One --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Agent</label>
                    <select class="form-control" name="assign_agent">
                      <option value="">-- Select One --</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="assign_branch">
                      <option value="">-- Select One --</option>
                      <option value="BATAM" <?php echo ($shipment['assign_branch'] == "BATAM" ? 'selected' : '') ?>>BATAM</option>
                      <option value="JAKARTA" <?php echo ($shipment['assign_branch'] == "JAKARTA" ? 'selected' : '') ?>>JAKARTA</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Driver</label>
                    <select class="form-control" name="assign_driver">
                      <option value="">-- Select One --</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="text-left col-6">
                  <!-- <span class="btn btn-danger previous-tab">Back</span> -->
                </div>
                <div class="text-right col-6">
                  <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
                </div>
              </div>
                
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
<script type="text/javascript">
  var input_invalid = 0;
  $("form").on("submit", function() {
    input_invalid = 0;
  });

  $("form input").on("invalid", function() {
    if (input_invalid < 1) {
      var element = $(this).closest('.tab-pane').attr('id');
      $('#' + element + '-tab').trigger('click');
      input_invalid = 1;
    }
  });

  $(".select2").select2({
    theme: "bootstrap4"
  });

  $('.next-tab').click(function() {
    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.previous-tab').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });
</script>