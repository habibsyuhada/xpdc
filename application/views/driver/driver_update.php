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
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3>Driver Detail Information</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik minimize-card ik-plus"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body" style="display: none;">
            <div class="row">
              <div class="col-md-6">
                <h6 class="font-weight-bold border-bottom">Pickup Information</h6>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_name'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_address'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Country</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_country'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">City</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_city'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Postcode</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_postcode'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Contact Person</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_contact_person'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Phone Number</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_phone_number'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['pickup_email'] ?></label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h6 class="font-weight-bold border-bottom">Consignee Information</h6>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_name'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_address'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Country</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_country'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">City</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_city'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Postcode</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_postcode'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Contact Person</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_contact_person'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Phone Number</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_phone_number'] ?></label>
                  </div>
                </div>
                <div class="form-group row m-0">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <label class="col-form-label">: <?php echo $shipment['consignee_email'] ?></label>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <div class="col-md-12">
                <table class="table table-bordered td-valign-top text-center">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white">Qty.</th>
                      <?php if($shipment['sea'] != 'FCL'): ?>
                      <th class="text-white">Package Type</th>
                      <th class="text-white">Length(cm)</th>
                      <th class="text-white">Width(cm)</th>
                      <th class="text-white">Height(cm)</th>
                      <th class="text-white">Weight(kg)</th>
                      <?php else: ?>
                      <th>Container Type</th>
                      <th>Container Size</th>
                      <th>Seal No.</th>
                      <th>Seal No.</th>
                      <th>Gross Weight</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($packages_list as $key => $value) : ?>
                    <tr>
                      <td><?php echo $value['qty'] ?></td>
                      <td><?php echo $value['piece_type'] ?></td>
                      <?php if($shipment['sea'] != 'FCL'): ?>
                      <td><?php echo $value['length']+0 ?></td>
                      <td><?php echo $value['width']+0 ?></td>
                      <td><?php echo $value['height']+0 ?></td>
                      <td><?php echo $value['weight']+0 ?></td>
                      <?php else: ?>
                      <td><?php echo $value['size'] ?></td>
                      <td><?php echo $value['container_no'] ?></td>
                      <td><?php echo $value['seal_no'] ?></td>
                      <td><?php echo $value['weight']+0 ?></td>
                      <?php endif; ?>
                    </tr>
                    <?php endforeach;  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php if(($shipment['status_driver_pickup'] == 1 && $shipment["driver_pickup"] == $this->session->userdata('id')) || ($shipment['status_driver_deliver'] == 1 && $shipment["driver_deliver"] == $this->session->userdata('id'))): ?>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <?php if($shipment['status_driver_pickup'] == 1 && $shipment["driver_pickup"] == $this->session->userdata('id')): ?>
              <div class="col-md">
                <h6 class="font-weight-bold">PickUp Detail</h6>
                <hr>
                <div class="form-group">
                  <label>Driver</label>
                  <input type="text" class="form-control" name="driver_pickup" value="<?php echo (@$driver_list[$shipment["driver_pickup"]]['name'] == "" ? "Not Assigned" : @$driver_list[$shipment["driver_pickup"]]['name']) ?>" readonly>
                </div>
                <form action="<?php echo base_url(); ?>driver/driver_update_process" method="POST" class="forms-sample signature" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
                  <input type="hidden" name="status" value="pickup">
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location_driver_pickup" value="<?php echo $shipment["pickup_city"].", ".$shipment["pickup_country"] ?>">
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
                    <label>Handovered by</label>
                    <input type="text" class="form-control" name="notes_driver_pickup" required>
                  </div>

                  <div id="signature" style="width: 100%"></div>
                  <input type="hidden" name="signature_driver_pickup" id="hdnSignature" />
                  <input type="hidden" name="save" value='save' />
                  <br>
                  <button type="button" class='btn btn-warning' onclick='$("#signature").jSignature("reset")'>Reset Signature</button>

                  <button type="submit" class="btn btn-info" onclick="return confirm('Are You Sure?')">Submit</button>
                </form>
              </div>
              <?php endif; ?>
              <?php if($shipment['status_driver_deliver'] == 1 && $shipment["driver_deliver"] == $this->session->userdata('id')): ?>
              <div class="col-md">
                <h6 class="font-weight-bold">Deliver Detail</h6>
                <hr>
                <div class="form-group">
                  <label>Driver</label>
                  <input type="text" class="form-control" name="driver_deliver" value="<?php echo (@$driver_list[$shipment["driver_deliver"]]['name'] == "" ? "Not Assigned" : @$driver_list[$shipment["driver_deliver"]]['name']) ?>" readonly>
                </div>
                <form action="<?php echo base_url(); ?>driver/driver_update_process" method="POST" class="forms-sample signature2" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $shipment['id'] ?>">
                  <input type="hidden" name="status" value="deliver">
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location_driver_deliver" value="<?php echo $shipment["consignee_city"].", ".$shipment["consignee_country"] ?>">
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
                    <label>Received by</label>
                    <input type="text" class="form-control" name="notes_driver_deliver" required>
                  </div>

                  <div id="signature2" style="width: 100%"></div>
                  <input type="hidden" name="signature_driver_deliver" id="hdnSignature2" />
                  <input type="hidden" name="save" value='save' />
                  <br>
                  <button type="button" class='btn btn-warning' onclick='$("#signature2").jSignature("reset")'>Reset Signature</button>

                  <button type="submit" class="btn btn-info" onclick="return confirm('Are You Sure?')">Submit</button>
                </form>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if($this->session->userdata('role') != "Driver"): ?>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h6 class="font-weight-bold">PickUp Detail</h6>
                <hr>
                <div class="form-group">
                  <label>Driver</label>
                  <input type="text" class="form-control" name="driver_pickup" value="<?php echo (@$driver_list[$shipment["driver_pickup"]]['name'] == "" ? "Not Assigned" : @$driver_list[$shipment["driver_pickup"]]['name']) ?>" readonly>
                </div>
                <?php if($shipment['status_driver_pickup'] == 2): ?>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="location_driver_pickup" value="<?php echo $shipment["pickup_city"].", ".$shipment["pickup_country"] ?>" readonly>
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
                <?php else: ?>
                  <?php if(isset($driver_list[$shipment["driver_pickup"]]['name'])): ?>
                  <a href="<?php echo base_url() ?>driver/driver_take_out/<?php echo $shipment['id_shipment'] ?>/pickup" class="btn btn-danger" title="Take Out From This Driver"><i class="fas fa-times"></i> Take Out</a>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <div class="col-md-6">
                <h6 class="font-weight-bold">Deliver Detail</h6>
                <hr>
                <div class="form-group">
                  <label>Driver</label>
                  <input type="text" class="form-control" name="driver_deliver" value="<?php echo (@$driver_list[$shipment["driver_deliver"]]['name'] == "" ? "Not Assigned" : @$driver_list[$shipment["driver_deliver"]]['name']) ?>" readonly>
                </div>
                <?php if($shipment['status_driver_deliver'] == 2): ?>
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="location_driver_deliver" value="<?php echo $shipment["consignee_city"].", ".$shipment["consignee_country"] ?>" readonly>
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
                <?php else: ?>
                  <?php if(isset($driver_list[$shipment["driver_deliver"]]['name'])): ?>
                  <a href="<?php echo base_url() ?>driver/driver_take_out/<?php echo $shipment['id_shipment'] ?>/deliver" class="btn btn-danger" title="Take Out From This Driver"><i class="fas fa-times"></i> Take Out</a>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
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