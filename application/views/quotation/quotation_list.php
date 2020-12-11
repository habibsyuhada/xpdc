<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <!-- <div class="card">
          <div class="card-header">
            <h3>Filter</h3>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="ik minimize-card ik-minus"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <form id="form_filter" action="" method="GET">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch">
                      <option value="">-- Select One --</option>
                      <?php foreach ($branch_list as $key => $value) : ?>
                        <option <?php echo ($this->input->get('branch') == $key ? 'selected' : '') ?> value="<?php echo $key ?>"><?php echo $key ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                      <option value="">-- Select One --</option>
                      <option <?php echo ($this->input->get('role') == 'Super Admin' ? 'selected' : '') ?> value="Super Admin">Super Admin</option>
                      <option <?php echo ($this->input->get('role') == 'Operator' ? 'selected' : '') ?> value="Operator">Operator</option>
                      <option <?php echo ($this->input->get('role') == 'Driver' ? 'selected' : '') ?> value="Driver">Driver</option>
                      <option <?php echo ($this->input->get('role') == 'Finance' ? 'selected' : '') ?> value="Finance">Finance</option>
                      <option <?php echo ($this->input->get('role') == 'Commercial' ? 'selected' : '') ?> value="Commercial">Commercial</option>
                      <option <?php echo ($this->input->get('role') == 'Customer' ? 'selected' : '') ?> value="Customer">Customer</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md text-right">
                  <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Search</button>
                </div>
              </div>
            </form>
          </div>
        </div> -->
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Quotation List</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <th class="text-white font-weight-bold">Quotation No</th>
                      <th class="text-white font-weight-bold">Date</th>
                      <th class="text-white font-weight-bold">Exp. Date</th>
                      <th class="text-white font-weight-bold">Customer Name</th>
                      <th class="text-white font-weight-bold">Attn.</th>
                      <th class="text-white font-weight-bold">Subject</th>
                      <th class="text-white font-weight-bold">Payment Terms</th>
                      <th class="text-white font-weight-bold"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($quotation_list as $key => $value): ?>
                    <tr>
                      <td><?php echo $value['quotation_no'] ?></td>
                      <td><?php echo $value['date'] ?></td>
                      <td><?php echo $value['exp_date'] ?></td>
                      <td><?php echo $value['customer_name'] ?></td>
                      <td><?php echo $value['attn'] ?></td>
                      <td><?php echo $value['subject'] ?></td>
                      <td><?php echo $value['payment_terms'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>quotation/quotation_update/<?php echo $value['id'] ?>" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></a>
                        <a target="_blank" href="<?php echo base_url() ?>quotation/quotation_pdf/<?php echo $value['id'] ?>" class="btn btn-warning" title="PDF"><i class="fas fa-print m-0"></i></a>
                        <a href="<?php echo base_url() ?>quotation/quotation_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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