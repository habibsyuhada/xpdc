<form id="formDataPickupFix" method="POST">
    <h5 class="font-weight-bold">Fixed Table Rate Pickup</h5>
    <div class="table-responsive">
        <table class="table data_table">
            <thead>
                <tr class="bg-info">
                    <th class="text-white font-weight-bold">No</th>
                    <th class="text-white font-weight-bold">City</th>
                    <th class="text-white font-weight-bold">Default Value</th>
                    <th class="text-white font-weight-bold">Price</th>
                    <th class="text-white font-weight-bold"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>" />
                    <input type="hidden" name="rate_type" value="fix rate" required />
                    </td>
                    <td>
                        <input type="text" class="form-control" name="city" placeholder="City" value="<?=$customer['city']?>" readonly required />
                    </td>
                    <td><input type="text" class="form-control" name="default_value" placeholder="Default Value" required /></td>
                    <td><input type="text" class="form-control" name="price" placeholder="Price" required /></td>
                    <td><button id="btnPickupFix" type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i></button></td>
                </tr>
                <?php $no = 1;
                foreach ($table_rate_fix as $key => $value) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $value['city'] ?></td>
                        <td><?php echo number_format($value['default_value']) ?> Kg</td>
                        <td>Rp. <?php echo number_format($value['price']) ?></td>
                        <td>
                            <button data-target="#myModalPickup" data-toggle="modal" data-id="<?= $value['id'] ?>" type="button" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></button>
                            <a href="<?php echo base_url() ?>branch/table_rate_pickup_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</form>
<hr>
<form id="formDataPickupMultiply" method="POST">
    <h5 class="font-weight-bold">Multiplied Table Rate Pickup</h5>
    <div class="table-responsive">
        <table class="table data_table">
            <thead>
                <tr class="bg-info">
                    <th class="text-white font-weight-bold">No</th>
                    <th class="text-white font-weight-bold">City</th>
                    <th class="text-white font-weight-bold">Min Value</th>
                    <th class="text-white font-weight-bold">Max Value</th>
                    <th class="text-white font-weight-bold">Price</th>
                    <th class="text-white font-weight-bold"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>" />
                    <input type="hidden" name="rate_type" value="multiply rate" required />
                    </td>
                    <td>
                        <input type="text" class="form-control" name="city" placeholder="City" value="<?=$customer['city']?>" readonly required />
                    </td>
                    <td><input type="text" class="form-control" name="min_value" placeholder="Min Value" required /></td>
                    <td><input type="text" class="form-control" name="max_value" placeholder="Max Value" required /></td>
                    <td><input type="text" class="form-control" name="price" placeholder="Price" required /></td>
                    <td><button id="btnPickupMultiple" type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i></button></td>
                </tr>
                <?php $no = 1;
                foreach ($table_rate_multiply as $key => $value) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $value['city'] ?></td>
                        <td><?php echo number_format($value['min_value']) ?> Kg</td>
                        <td><?php echo number_format($value['max_value']) ?> Kg</td>
                        <td>Rp. <?php echo number_format($value['price']) ?></td>
                        <td>
                            <button data-target="#myModalPickup" data-toggle="modal" data-id="<?= $value['id'] ?>" type="button" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></button>
                            <a href="<?php echo base_url() ?>branch/table_rate_pickup_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</form>
<script>
    $(".data_table").DataTable();
    $(".select2").select2();

    $("#formDataPickupFix").submit(function(e) {
        $("input[name=default_value]").attr("readonly", "readonly");
        $("input[name=price]").attr("readonly", "readonly");
        $("#btnPickupFix").html("<i class='fa fa-spinner fa-spin'></i> Loading");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>commercial/table_rate_pickup_create_process_fix",
            data: $("#formDataPickupFix").serialize()
        }).done(function(resp) {
            load_table_pickup();
        });
    });

$("#formDataPickupMultiply").submit(function(e) {
    $("input[name=min_value]").attr("readonly", "readonly");
    $("input[name=max_value]").attr("readonly", "readonly");
    $("input[name=price]").attr("readonly", "readonly");
    $("#btnPickupMultiple").html("<i class='fa fa-spinner fa-spin'></i> Loading");
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "<?= base_url() ?>commercial/table_rate_pickup_create_process_multiply",
        data: $("#formDataPickupMultiply").serialize()
    }).done(function(resp) {
        load_table_pickup();
    });
});
</script>