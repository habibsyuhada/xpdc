<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Filter</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik minimize-card ik-plus"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body" style="display: none;">
            <form id="form_filter" action="" method="GET">
              <input type="hidden" name="status_driver" value="<?php echo ($this->input->get('status_driver') ? $this->input->get('status_driver') : '') ?>">
              <div class="row clearfix">
                <div class="form-group col-md-6">
                  <label>Branch</label>
                  <select class="form-control" name="branch">
                    <option value="">-- Select One --</option>
                    <?php foreach($branch as $row){ ?>
                      <option value="<?=$row['name']?>" <?php echo ($this->input->get('branch') == $row['name'] ? 'selected' : '') ?>><?=$row['name']?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Assign Branch</label>
                  <select class="form-control" name="assign_branch">
                    <option value="">-- Select One --</option>
                    <?php foreach($branch as $row){ ?>
                      <option value="<?=$row['name']?>" <?php echo ($this->input->get('assign_branch') == $row['name'] ? 'selected' : '') ?>><?=$row['name']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md text-right">
                  <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Search</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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
                      <th class="text-white font-weight-bold">Number Shipments</th>
                      <th class="text-white font-weight-bold">Number Packages</th>
                      <th class="text-white font-weight-bold">Remarks</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($master_list as $key => $value) : ?>
                      <tr>
                        <td><input type="checkbox" class="checkbox-20"></td>
                        <td><?php echo $value['master_tracking'] ?></td>
                        <td><?php echo (@$shipment[$value['master_tracking']]) ?></td>
                        <td><?php echo (@$packages[$value['master_tracking']]) ?></td>
                        <td><?php echo $value['remarks'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>master_tracking/master_tracking_detail/<?php echo $value['master_tracking'] ?>" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a>
                          <a href="<?php echo base_url() ?>master_tracking/master_tracking_edit/<?php echo $value['master_tracking'] ?>" class="btn btn-dark" title="Edit Shipping Information"><i class="fas fa-pen"></i></a>
                          <a href="<?php echo base_url() ?>master_tracking/master_tracking_assign/<?php echo $value['master_tracking'] ?>" class="btn btn-success" title="Assign Shipment"><i class="fas fa-sign-in-alt"></i></a>
                          <a href="<?php echo base_url() ?>master_tracking/shipment_export_pdf/<?php echo $value['master_tracking'] ?>" class="btn btn-danger" title="Print PDF"><i class="fas fa-print m-0"></i></a>
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