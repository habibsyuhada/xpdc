<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Master Tracking List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold"></th>
                      <th class="text-white font-weight-bold">Master Tracking No</th>
                      <th class="text-white font-weight-bold">Number Shipment</th>
                      <th class="text-white font-weight-bold">Remarks</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($master_list as $key => $value): ?>
                    <tr>
                      <td><input type="checkbox" class="checkbox-20"></td>
                      <td><?php echo $value['master_tracking'] ?></td>
                      <td><?php echo @count(@$shipment[$value['master_tracking']]) ?></td>
                      <td><?php echo $value['remarks'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>master_tracking/master_tracking_detail/<?php echo $value['master_tracking'] ?>" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a>
                        <!-- <a href="<?php echo base_url() ?>master_tracking/master_tracking_update/<?php echo $value['master_tracking'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a> -->

                        <a href="<?php echo base_url() ?>master_tracking/master_tracking_edit/<?php echo $value['master_tracking'] ?>" class="btn btn-dark" title="Edit Shipping Information"><i class="fas fa-pen"></i></a>
                        <a href="<?php echo base_url() ?>master_tracking/master_tracking_assign/<?php echo $value['master_tracking'] ?>" class="btn btn-success" title="Assign Shipment"><i class="fas fa-sign-in-alt"></i></a>
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
<script type="text/javascript">
</script>