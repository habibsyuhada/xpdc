    <h5 class="font-weight-bold">Fix Rate</h5>
    <table class="table data_table">
        <thead>
            <tr class="bg-info">
                <th class="text-white font-weight-bold">No</th>
                <th class="text-white font-weight-bold">Value</th>
                <th class="text-white font-weight-bold">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($table_rate_fix as $key => $value) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo number_format($value['default_value'], 2) ?> Kg</td>
                    <td>Rp. <?php echo number_format($value['price']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <h5 class="font-weight-bold">Multiply Rate</h5>
    <table class="table data_table">
        <thead>
            <tr class="bg-info">
                <th class="text-white font-weight-bold">No</th>
                <th class="text-white font-weight-bold">Min. Value</th>
                <th class="text-white font-weight-bold">Max. Value</th>
                <th class="text-white font-weight-bold">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($table_rate_multiply as $key => $value) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo number_format($value['min_value'], 2) ?> Kg</td>
                    <td><?php echo number_format($value['max_value'], 2) ?> Kg</td>
                    <td>Rp. <?php echo number_format($value['price']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(".data_table").DataTable();
    </script>