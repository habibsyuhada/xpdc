<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Shipment List</h3>
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
                      <td><?php echo count($shipment[$value['master_tracking']]) ?></td>
                      <td><?php echo $value['remarks'] ?></td>
                      <td>
                        <a href="#" class="btn btn-secondary" title="View"><i class="fas fa-eye m-0"></i></a>
                        <a target="_blank" href="#" class="btn btn-warning" title="Print"><i class="fas fa-print m-0"></i></a>
                        <a href="#" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                        <a href="#" class="btn btn-danger" title="Delete"><i class="fas fa-trash m-0"></i></a>
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