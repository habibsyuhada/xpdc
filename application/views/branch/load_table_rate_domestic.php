<form id="formDataDomestic" method="POST">
    <h5 class="font-weight-bold">Table Rate Domestic</h5>
    <div class="table-responsive">
        <table class="table data_table">
            <thead>
                <tr class="bg-info">
                    <th class="text-white font-weight-bold">No</th>
                    <th class="text-white font-weight-bold">City</th>
                    <th class="text-white font-weight-bold">Airfreight Min Kg</th>
                    <th class="text-white font-weight-bold">Airfreight Max Kg</th>
                    <th class="text-white font-weight-bold">Airfreight / Kg</th>
                    <th class="text-white font-weight-bold">Airfreight Term</th>
                    <th class="text-white font-weight-bold">Landfreight Min Kg</th>
                    <th class="text-white font-weight-bold">Landfreight Max Kg</th>
                    <th class="text-white font-weight-bold">Landfreight / Kg</th>
                    <th class="text-white font-weight-bold">Landfreight Term</th>
                    <th class="text-white font-weight-bold">Seafreight Min Kg</th>
                    <th class="text-white font-weight-bold">Seafreight Max Kg</th>
                    <th class="text-white font-weight-bold">Seafreight / Kg</th>
                    <th class="text-white font-weight-bold">Seafreight Term</th>
                    <th class="text-white font-weight-bold"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="hidden" name="id_branch" value="<?php echo $id_branch; ?>" />
                    </td>
                    <td>
                        <select class="form-control select2" name="city" required>
                            <?php foreach ($city as $value) { ?>
                                <option value="<?= $value['city'] ?>"><?= $value['city'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="airfreight_min_kg" placeholder="Airfreight Min Kg" required /></td>
                    <td><input type="text" class="form-control" name="airfreight_max_kg" placeholder="Airfreight Max Kg" required /></td>
                    <td><input type="text" class="form-control" name="airfreight_price_kg" placeholder="Airfreight / Kg" required /></td>
                    <td><input type="text" class="form-control" name="airfreight_term" placeholder="Airfreight Term" required /></td>
                    <td><input type="text" class="form-control" name="landfreight_min_kg" placeholder="Landfreight Min Kg" required /></td>
                    <td><input type="text" class="form-control" name="landfreight_max_kg" placeholder="Landfreight Max Kg" required /></td>
                    <td><input type="text" class="form-control" name="landfreight_price_kg" placeholder="Landfreight / Kg" required /></td>
                    <td><input type="text" class="form-control" name="landfreight_term" placeholder="Landfreight Term" required /></td>
                    <td><input type="text" class="form-control" name="seafreight_min_kg" placeholder="Seafreight Min Kg" required /></td>
                    <td><input type="text" class="form-control" name="seafreight_max_kg" placeholder="Seafreight Max Kg" required /></td>
                    <td><input type="text" class="form-control" name="seafreight_price_kg" placeholder="Seafreight / Kg" required /></td>
                    <td><input type="text" class="form-control" name="seafreight_term" placeholder="Seafreight Term" required /></td>
                    <td><button id="btnDomestic" type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i></button></td>
                </tr>
                <?php $no = 1;
                foreach ($table_rate as $key => $value) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $value['city'] ?></td>
                        <td><?php echo number_format($value['airfreight_min_kg']) ?> Kg</td>
                        <td><?php echo number_format($value['airfreight_max_kg']) ?> Kg</td>
                        <td>Rp. <?php echo number_format($value['airfreight_price_kg']) ?></td>
                        <td><?php echo $value['airfreight_term'] ?></td>
                        <td><?php echo number_format($value['landfreight_min_kg']) ?> Kg</td>
                        <td><?php echo number_format($value['landfreight_max_kg']) ?> Kg</td>
                        <td>Rp. <?php echo number_format($value['landfreight_price_kg']) ?></td>
                        <td><?php echo $value['landfreight_term'] ?></td>
                        <td><?php echo number_format($value['seafreight_min_kg']) ?> Kg</td>
                        <td><?php echo number_format($value['seafreight_max_kg']) ?> Kg</td>
                        <td>Rp. <?php echo number_format($value['seafreight_price_kg']) ?></td>
                        <td><?php echo $value['seafreight_term'] ?></td>
                        <td>
                            <button data-target="#myModalDomestic" data-toggle="modal" data-id="<?= $value['id'] ?>" type="button" class="btn btn-primary" title="Update"><i class="fas fa-edit m-0"></i></button>
                            <a href="<?php echo base_url() ?>branch/table_rate_domestic_delete_process/<?php echo $value['id'] ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash m-0"></i></a>
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

    $("#formDataDomestic").submit(function(e) {
        $("input[name=airfreight_min_kg]").attr("readonly", "readonly");
        $("input[name=airfreight_max_kg]").attr("readonly", "readonly");
        $("input[name=airfreight_price_kg]").attr("readonly", "readonly");
        $("input[name=airfreight_term]").attr("readonly", "readonly");
        $("input[name=landfreight_min_kg]").attr("readonly", "readonly");
        $("input[name=landfreight_max_kg]").attr("readonly", "readonly");
        $("input[name=landfreight_price_kg]").attr("readonly", "readonly");
        $("input[name=landfreight_term]").attr("readonly", "readonly");
        $("input[name=seafreight_min_kg]").attr("readonly", "readonly");
        $("input[name=seafreight_max_kg]").attr("readonly", "readonly");
        $("input[name=seafreight_price_kg]").attr("readonly", "readonly");
        $("input[name=seafreight_term]").attr("readonly", "readonly");
        $("#btnDomestic").html("<i class='fa fa-spinner fa-spin'></i> Loading");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>branch/table_rate_domestic_create_process",
            data: $("#formDataDomestic").serialize()
        }).done(function(resp) {
            load_table_domestic();
        });
    });
</script>