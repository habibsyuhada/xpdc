<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Table List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Table Rate</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form id="formData" method="POST">
                  <table class="table data_table">
                    <thead>
                      <tr class="bg-info">
                        <th class="text-white font-weight-bold">Min. Value</th>
                        <th class="text-white font-weight-bold">Max. Value</th>
                        <th class="text-white font-weight-bold">Price</th>
                        <th class="text-white font-weight-bold"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($table_rate_list as $key => $value) : ?>
                        <tr>
                          <td><?php echo number_format($value['min_value'], 2) ?> Kg</td>
                          <td><?php echo number_format($value['max_value'], 2) ?> Kg</td>
                          <td>Rp. <?php echo number_format($value['price']) ?></td>
                          <td>
                            <a href="<?php echo base_url() ?>zone/table_list_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                            <a href="<?php echo base_url() ?>zone/table_list_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <tr>
                      <tr>
                        <td><input type="text" class="form-control" name="min_value" placeholder="Min. Value" required /></td>
                        <td><input type="text" class="form-control" name="max_value" placeholder="Max. Value" required /></td>
                        <td><input type="text" class="form-control" name="price" placeholder="Price" required /></td>
                        <td><button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button></td>
                      </tr>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>