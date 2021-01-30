<form id="formData" method="POST">
    <h5 class="font-weight-bold">Fix Rate</h5>
    <table class="table data_table">
        <thead>
            <tr class="bg-info">
                <th class="text-white font-weight-bold">No</th>
                <th class="text-white font-weight-bold">Value</th>
                <th class="text-white font-weight-bold">Price</th>
                <th class="text-white font-weight-bold"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="hidden" name="rate_type" value="fix rate" required />
                    <input type="hidden" name="id_branch" value="<?php echo $id_branch; ?>" />
                    <input type="hidden" name="type_of_shipment" value="<?php echo $type_of_shipment; ?>" />
                    <input type="hidden" name="type_of_mode" value="<?php echo $type_of_mode; ?>" />
                    <input type="hidden" name="zone" value="<?php echo $zone; ?>" />
                    <input type="hidden" name="subzone" value="<?php echo $subzone; ?>" />
                </td>
                <td><input type="text" class="form-control" name="default_value" placeholder="Value" required /></td>
                <td><input type="text" class="form-control" name="price" placeholder="Price" required /></td>
                <td><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i></button></td>
            </tr>
            <?php $no = 1;
            foreach ($table_rate_fix as $key => $value) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo number_format($value['default_value'], 2) ?> Kg</td>
                    <td>Rp. <?php echo number_format($value['price']) ?></td>
                    <td>
                        <button data-target="#myModal" data-toggle="modal" data-id="<?= $value['id'] ?>" type="button" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></button>
                        <a href="<?php echo base_url() ?>branch/table_rate_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
<hr>
<form id="formDataMultiply" method="POST">
    <h5 class="font-weight-bold">Multiply Rate</h5>
    <table class="table data_table">
        <thead>
            <tr class="bg-info">
                <th class="text-white font-weight-bold">No</th>
                <th class="text-white font-weight-bold">Min. Value</th>
                <th class="text-white font-weight-bold">Max. Value</th>
                <th class="text-white font-weight-bold">Price</th>
                <th class="text-white font-weight-bold"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="hidden" name="rate_type" value="multiply rate" required />
                    <input type="hidden" name="id_branch" value="<?php echo $id_branch; ?>" />
                    <input type="hidden" name="type_of_shipment" value="<?php echo $type_of_shipment; ?>" />
                    <input type="hidden" name="type_of_mode" value="<?php echo $type_of_mode; ?>" />
                    <input type="hidden" name="zone" value="<?php echo $zone; ?>" />
                    <input type="hidden" name="subzone" value="<?php echo $subzone; ?>" />
                </td>
                <td><input type="text" class="form-control" name="min_value" placeholder="Min. Value" required /></td>
                <td><input type="text" class="form-control" name="max_value" placeholder="Max. Value" required /></td>
                <td><input type="text" class="form-control" name="price" placeholder="Price" required /></td>
                <td><button type="submit" name="submits" class="btn btn-success"><i class="fa fa-save"></i></button></td>
            </tr>
            <?php $no = 1;
            foreach ($table_rate_multiply as $key => $value) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo number_format($value['min_value'], 2) ?> Kg</td>
                    <td><?php echo number_format($value['max_value'], 2) ?> Kg</td>
                    <td>Rp. <?php echo number_format($value['price']) ?></td>
                    <td>
                        <button data-target="#myModal" data-toggle="modal" data-id="<?= $value['id'] ?>" type="button" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></button>
                        <a href="<?php echo base_url() ?>branch/table_rate_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
<script>
    $(".data_table").DataTable();

    $("#formDataMultiply").submit(function(e) {
        $("input[name=min_value]").attr("readonly", "readonly");
        $("input[name=max_value]").attr("readonly", "readonly");
        $("input[name=price]").attr("readonly", "readonly");
        $("button[name=submits]").html("<i class='fa fa-spinner fa-spin'></i> Loading");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>branch/table_rate_create_process_multiply",
            data: $("#formDataMultiply").serialize()
        }).done(function(resp) {
            load_table();
        });
    });

    $("#formData").submit(function(e) {
        $("input[name=default_value]").attr("readonly", "readonly");
        $("input[name=price]").attr("readonly", "readonly");
        $("button[name=submit]").html("<i class='fa fa-spinner fa-spin'></i> Loading");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>branch/table_rate_create_process_fix",
            data: $("#formData").serialize()
        }).done(function(resp) {
            load_table();
        });
    });
</script>