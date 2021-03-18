<div class="main-content">
  <div class="container-fluid">
    
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row clearfix">
              <div class="col-md-12">
                <h6 class="font-weight-bold"><?php echo $meta_title ?></h6>
              </div>
            </div>
            <form action="<?php echo base_url(); ?>user/user_target_commercial_create_process/<?php echo $user['id'] ?>" method="POST" class="forms-sample">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Account</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $user['name'] ?>" readonly>
                    <input type="hidden" name="id_user" value="<?php echo $user['id'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Target (Rp.)</label>
                    <input type="number" class="form-control" name="target" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Shipment</label>
                    <select class="form-control" name="type_of_shipment" required>
                      <option value="">-- Select One --</option>
                      <option value="International Shipping">International Shipping</option>
                      <option value="Domestic Shipping">Domestic Shipping</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type of Mode</label>
                    <select class="form-control" name="type_of_mode" required>
                      <option value="">-- Select One --</option>
                      <option value="Sea Transport">Sea Transport</option>
                      <option value="Land Shipping">Land Shipping</option>
                      <option value="Air Freight">Air Freight</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Month</label>
                    <select class="form-control" name="month" required>
                      <?php foreach ($month_list as $key => $value) : ?>
                        <option <?php echo (date('n') == ($key+1) ? 'selected' : '') ?> value="<?php echo $key+1 ?>"><?php echo $value ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Year</label>
                    <input type="number" class="form-control" name="year" placeholder="Year" value="<?php echo date('Y') ?>" required>
                  </div>
                </div>
              </div>
              <div class="mt-2 mb-4 row">
                <div class="col-12 text-right">
                  <a href="<?php echo base_url() ?>user/user_list" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
            <hr>
            <div class="row clearfix">
              <div class="col-md-12">
                <table class="table text-center data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Type of Shipment</th>
                      <th class="text-white font-weight-bold">Type of Mode</th>
                      <th class="text-white font-weight-bold">Month</th>
                      <th class="text-white font-weight-bold">Year</th>
                      <th class="text-white font-weight-bold">Target</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($target_list as $key => $value) : ?>
                    <tr>
                      <td><?php echo $value['type_of_shipment'] ?></td>
                      <td><?php echo $value['type_of_mode'] ?></td>
                      <td><?php echo $month_list[($value['month'] - 1)] ?></td>
                      <td><?php echo $value['year'] ?></td>
                      <td>Rp. <?php echo number_format($value['target'], 2) ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>user/user_target_commercial_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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