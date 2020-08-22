<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3><?php echo $meta_title ?></h3>
          </div>
          <div class="card-body">
            <form action="<?php echo base_url(); ?>shipment/shipment_import_process" method="POST" class="forms-sample" >
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">File upload</label>
                <label class="col-sm col-form-label"><a class="font-weight-bold text-primary" href="<?php echo base_url() ?>file/shipment-import-template.xlsx">shipment-import-template.xlsx<a></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">File upload</label>
                <div class="col-sm">
                  <input type="file" name="img[]" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="text-left col-6">
                </div>
                <div class="text-right col-6">
                  <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<script type="text/javascript">
</script>