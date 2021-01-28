<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Zone List</h3>
          </div>
          <div class="card-body">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-upload"></i> Upload Excel
            </button>
            <a href="<?= base_url() ?>zone/download_zone" class="btn btn-warning"><i class="fa fa-download"></i> Download Excel</a>
            <br>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <form action="<?= base_url() ?>zone/upload_zone" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Upload Excel</label>
                    <input type="file" class="form-control-file" name="upload_excel" accept=".csv" required />
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                  </div>
                </form>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Zone</th>
                      <th class="text-white font-weight-bold">Country</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($zone_list as $key => $value) : ?>
                      <tr>
                        <td><?php echo $value['zone_name'] ?></td>
                        <td><?php echo $value['country'] ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>zone/subzone_list/<?php echo $value['id'] ?>" class="btn btn-info" title="Sub Zone"><i class="fas fa-map-marker-alt m-0"></i></a>
                          <a href="<?php echo base_url() ?>zone/zone_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                          <a href="<?php echo base_url() ?>zone/zone_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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