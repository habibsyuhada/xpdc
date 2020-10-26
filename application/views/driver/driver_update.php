<link rel="stylesheet" href="<?php echo base_url('assets/plugins/digital_signature/libs/modernizr.js') ?>" type="text/css">
<style type="text/css">
  
  #signatureparent {
    color:darkblue;
    background-color:darkgrey;
    /*max-width:600px;*/
    padding:20px;
  }
  
  /*This is the div within which the signature canvas is fitted*/
  #signature {
    border: 2px dotted black;
    background-color:lightgrey;
  }
  
  #signature2parent {
    color:darkblue;
    background-color:darkgrey;
    /*max-width:600px;*/
    padding:20px;
  }
  
  /*This is the div within which the signature canvas is fitted*/
  #signature2 {
    border: 2px dotted black;
    background-color:lightgrey;
  }

  /* Drawing the 'gripper' for touch-enabled devices */ 
  html.touch #content {
    float:left;
    width:92%;
  }
  html.touch #scrollgrabber {
    float:right;
    width:4%;
    margin-right:2%;
    background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAFCAAAAACh79lDAAAAAXNSR0IArs4c6QAAABJJREFUCB1jmMmQxjCT4T/DfwAPLgOXlrt3IwAAAABJRU5ErkJggg==)
  }
  html.borderradius #scrollgrabber {
    border-radius: 1em;
  }
   
</style>
<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-6 text-center">
                <img src="<?php echo base_url(); ?>assets/img/logo-fix.png" class="header-brand-img" alt="lavalite" width="300px">
              </div>
              <div class="col-md-6 text-center">
                <img height="60px" src="<?php echo site_url(); ?>home/barcode_generator/<?php echo $shipment['tracking_no'] ?>">
                <br>
                <br>
                <h4 class="font-weight-bold text-center"><?php echo $shipment['tracking_no'] ?></h4>
              </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row justify-content-center">
            </div>
            <div class="row">
              <div class="col-md-6">
                <h6 class="font-weight-bold">PickUp Detail</h6>
                <hr>
                <div class="form-group">
                  <label>Dirver</label>
                  <input type="text" class="form-control" name="driver_pickup" value="<?php echo (@$driver_list[$shipment["driver_pickup"]]['name'] == "" ? "Not Assigned" : @$driver_list[$shipment["driver_pickup"]]['name']) ?>" readonly>
                </div>
                <?php if($shipment['status_driver_pickup'] == 1): ?>
                <form action="<?php echo base_url(); ?>driver/driver_update_process" method="POST" class="forms-sample signature" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
                  <input type="hidden" name="status" value="pickup">
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location_driver_pickup" value="<?php echo $shipment["shipper_city"].", ".$shipment["shipper_country"] ?>">
                  </div>
                  <div class="form-group">
                    <label>Photo upload</label>
                    <input type="file" name="file" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control" name="notes_driver_pickup" placeholder="Notes" required></textarea>
                  </div>

                  <div id="signature" style="width: 100%"></div>
                  <input type="hidden" name="signature_driver_pickup" id="hdnSignature" />
                  <input type="hidden" name="save" value='save' />
                  <br>
                  <button type="button" class='btn btn-warning' onclick='$("#signature").jSignature("reset")'>Reset Signature</button>

                  <button type="submit" class="btn btn-info" onclick="return confirm('Are You Sure?')">Submit</button>
                </form>
                <?php elseif($shipment['status_driver_pickup'] == 2): ?>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="location_driver_pickup" value="<?php echo $shipment["shipper_city"].", ".$shipment["shipper_country"] ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Photo upload</label><br>
                  <img height="150px" src="<?php echo base_url()."file/driver/".$shipment['photo_driver_pickup'] ?>">
                </div>
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control" name="notes_driver_pickup" placeholder="Notes" readonly><?php echo $shipment['notes_driver_pickup'] ?></textarea>
                </div>
                <div class="form-group">
                  <label>Signature</label><br>
                  <img height="150px" src="<?php echo $shipment['signature_driver_pickup'] ?>">
                </div>
                <?php endif; ?>
              </div>
              <div class="col-md-6">
                <h6 class="font-weight-bold">Deliver Detail</h6>
                <hr>
                <div class="form-group">
                  <label>Dirver</label>
                  <input type="text" class="form-control" name="driver_deliver" value="<?php echo (@$driver_list[$shipment["driver_deliver"]]['name'] == "" ? "Not Assigned" : @$driver_list[$shipment["driver_deliver"]]['name']) ?>" readonly>
                </div>
                <?php if($shipment['status_driver_deliver'] == 1): ?>
                <form action="<?php echo base_url(); ?>driver/driver_update_process" method="POST" class="forms-sample signature2" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
                  <input type="hidden" name="status" value="deliver">
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location_driver_deliver" value="<?php echo $shipment["shipper_city"].", ".$shipment["shipper_country"] ?>">
                  </div>
                  <div class="form-group">
                    <label>Photo upload</label>
                    <input type="file" name="file" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control" name="notes_driver_deliver" placeholder="Notes" required></textarea>
                  </div>

                  <div id="signature2" style="width: 100%"></div>
                  <input type="hidden" name="signature_driver_deliver" id="hdnSignature2" />
                  <input type="hidden" name="save" value='save' />
                  <br>
                  <button type="button" class='btn btn-warning' onclick='$("#signature2").jSignature("reset")'>Reset Signature</button>

                  <button type="submit" class="btn btn-info" onclick="return confirm('Are You Sure?')">Submit</button>
                </form>
                <?php elseif($shipment['status_driver_deliver'] == 2): ?>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="location_driver_deliver" value="<?php echo $shipment["shipper_city"].", ".$shipment["shipper_country"] ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Photo upload</label><br>
                  <img height="150px" src="<?php echo base_url()."file/driver/".$shipment['photo_driver_deliver'] ?>">
                </div>
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control" name="notes_driver_deliver" placeholder="Notes" readonly><?php echo $shipment['notes_driver_deliver'] ?></textarea>
                </div>
                <div class="form-group">
                  <label>Signature</label><br>
                  <img height="150px" src="<?php echo $shipment['signature_driver_deliver'] ?>">
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/plugins/digital_signature/libs/jSignature.min.noconflict.js') ?>"></script>
<script type="text/javascript">
  $("#signature").jSignature({'UndoButton':false, 'width': "100%", 'height': 250});
  $("form.signature").on('submit', function(e){
    var datapair = $("#signature").jSignature("getData");
    $('#hdnSignature').val(datapair);
  })
  
  $("#signature2").jSignature({'UndoButton':false, 'width': "100%", 'height': 250});
  $("form.signature2").on('submit', function(e){
    var datapair = $("#signature2").jSignature("getData");
    $('#hdnSignature2').val(datapair);
  })

</script>