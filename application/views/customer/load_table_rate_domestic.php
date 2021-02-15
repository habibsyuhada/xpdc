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
            </tr>
        </thead>
        <tbody>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(".data_table").DataTable();
</script>