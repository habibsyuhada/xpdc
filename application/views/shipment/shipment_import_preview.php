<div class="main-content">
	<div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3><?php echo $meta_title ?></h3>
          </div>
          <div class="card-body">
            <form action="<?php echo base_url(); ?>shipment/shipment_import_process" method="POST" class="forms-sample" enctype="multipart/form-data">
              <div class="table-responsive">
                <table class="table data_table">
                  <thead>
                    <tr class="bg-info">
                      <?php foreach ($sheet[1] as $key => $value) : ?>
                      <td class="text-nowrap text-white font-weight-bold"><?php echo $value; ?></td>
                      <?php endforeach; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($sheet as $key => $value) : ?>
                    <?php if ($key != 1) : ?>
                    <tr>
                      <td><input type="text" class="form-control" value="<?php echo $value['A'] ?>" readonly name="shipper_name[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['B'] ?>" readonly name="shipper_address[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['C'] ?>" readonly name="shipper_city[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['D'] ?>" readonly name="shipper_country[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['E'] ?>" readonly name="shipper_postcode[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['F'] ?>" readonly name="shipper_contact_person[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['G'] ?>" readonly name="shipper_email[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['H'] ?>" readonly name="shipper_phone_number[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['I'] ?>" readonly name="consignee_name[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['J'] ?>" readonly name="consignee_address[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['K'] ?>" readonly name="consignee_city[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['L'] ?>" readonly name="consignee_country[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['M'] ?>" readonly name="consignee_postcode[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['N'] ?>" readonly name="consignee_contact_person[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['O'] ?>" readonly name="consignee_email[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['P'] ?>" readonly name="consignee_phone_number[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['Q'] ?>" readonly name="type_of_shipment[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['R'] ?>" readonly name="type_of_mode[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['S'] ?>" readonly name="incoterms[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['T'] ?>" readonly name="sea[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['U'] ?>" readonly name="description_of_goods[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['V'] ?>" readonly name="declared_value[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['W'] ?>" readonly name="hscode[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['X'] ?>" readonly name="currency[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['Y'] ?>" readonly name="coo[]"></td>
                      <td><input type="text" class="form-control" value="<?php echo $value['Z'] ?>" readonly name="ref_no[]"></td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="mt-2 row">
                <div class="text-left col-6">
                </div>
                <div class="text-right col-6">
                  <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<script type="text/javascript">
</script>