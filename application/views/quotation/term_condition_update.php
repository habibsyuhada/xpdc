<div class="main-content">
  <div class="container-fluid">
    <form action="<?php echo base_url(); ?>quotation/term_condition_update_process/<?php echo $list['id'] ?>" method="POST" class="forms-sample">
      <div class="row clearfix">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="row clearfix">
                <div class="col-md-12">
                  <h6 class="font-weight-bold">Update Term & Condition</h6>
                  <div class="form-group">
                    <label>Term Type</label>
                    <input type="text" class="form-control" name="term_type" value="<?php echo $list['term_type'] ?>" placeholder="Term Type" required readonly>
                  </div>
                  <div class="form-group">
                    <label>Term Condition</label>
                    <table class="table text-center">
                      <thead>
                        <tr class="bg-info">
                          <th class="text-white font-weight-bold">Terms and Conditions</th>
                          <th class="text-white font-weight-bold" style="width: 1%;"></th>
                        </tr>
                      </thead>
                      <tbody class="term_type">
                        <?php if (count($detail) == 0) { ?>
                          <tr>
                            <td><input type="text" class="form-control" name="term_condition[]" placeholder="Term Condition" value=""></td>
                            <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                          </tr>
                          <?php } else {
                          $i = 1;
                          foreach ($detail as $row) { ?>
                            <tr>
                              <td><input type="text" class="form-control" name="term_condition[]" placeholder="Term Condition" value="<?= $row['term_condition'] ?>"></td>
                              <?php if ($i == 1) { ?>
                                <td><button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button></td>
                              <?php } else { ?>
                                <td><button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button></td>
                              <?php } ?>
                            </tr>
                        <?php
                            $i++;
                          }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="mt-2 row">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>quotation/term_condition" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }
</script>