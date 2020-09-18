<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Shipment List (Departed)</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"></th>
                      <th class="text-white font-weight-bold">Tracking Number</th>
                      <th class="text-white font-weight-bold">Shipper Name</th>
                      <th class="text-white font-weight-bold">Receiver Name</th>
                      <th class="text-white font-weight-bold">Container</th>
                      <th class="text-white font-weight-bold">Status</th>
                      <th class="text-white font-weight-bold">Shipment Type</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value) : ?>
                      <tr>
                        <td><input type="checkbox" class="checkbox-20" value="<?php echo $value['id'] ?>" onclick="save_checkbox(this)"></td>
                        <td><?php echo $value['tracking_no'] ?></td>
                        <td><?php echo $value['shipper_name'] ?></td>
                        <td><?php echo $value['consignee_name'] ?></td>
                        <td><?php echo $value['master_tracking'] ?></td>
                        <td><?php echo $value['status'] ?></td>
                        <td><?php echo $value['type_of_shipment'] ?></td>
                        <td>
                          <a target="_blank" onclick="show_modal('<?= $value['id'] ?>')" class="btn btn-success" title="Delivered"><i class="fas fa-check m-0"></i></a>
                          <a target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking/<?php echo $value['id'] ?>" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a>
                          <a target="_blank" href="<?php echo base_url() ?>shipment/shipment_tracking_label_pdf/<?php echo $value['id'] ?>" class="btn btn-warning" title="Print"><i class="fas fa-print m-0"></i></a>
                          <a target="_blank" href="<?php echo base_url() ?>shipment/shipment_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url(); ?>shipment/shipment_delete_process/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure to delete this? You cannot revert it later.')" class="btn btn-danger" title="Delete"><i class="fas fa-trash m-0"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="serviceModalLabel">With Courier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>operation/with_courier_process_db" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Remark</label>
            <input type="hidden" name="id_shipment" value="">
            <input type="text" class="form-control" name="remark" placeholder="Remark">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function show_modal(id) {
    $("input[name=id_shipment]").val(id);
    $("#serviceModal").modal('show');
  }
</script>