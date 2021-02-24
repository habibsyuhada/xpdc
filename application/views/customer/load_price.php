<?php if ($type_of_shipment == 'Domestic') { ?>
    <table class="table table-bordered">
        <tr>
            <td>Customer Name</td>
            <td>:</td>
            <td><?= $customer['name'] ?></td>
        </tr>
        <tr>
            <td>Shipper Country</td>
            <td>:</td>
            <td><?= $customer['country'] ?></td>
        </tr>
        <tr>
            <td>Shipper City</td>
            <td>:</td>
            <td><?= $customer['city'] ?></td>
        </tr>
        <tr>
            <td>Shipper Address</td>
            <td>:</td>
            <td><?= $customer['address'] ?></td>
        </tr>
        <tr>
            <td>Consignee Country</td>
            <td>:</td>
            <td><?= $country_post ?></td>
        </tr>
        <tr>
            <td>Consignee City</td>
            <td>:</td>
            <td><?= $city_post ?></td>
        </tr>
        <tr>
            <td>Weight (Kg)</td>
            <td>:</td>
            <td><?= $weight_post ?></td>
        </tr>
        <?php if ($pickup != null) { ?>
            <tr>
                <td>Pickup Price (Rp.)</td>
                <td>:</td>
                <td>Rp. <?= number_format($pickup['price']) ?></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="3"><button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button></td>
            </tr>
        <?php } ?>
    </table>
    <table class="table table-bordered text-center">
        <?php if ($result != null) { ?>
            <tr>
                <td>Price Airfreight/Kg (Rp.)</td>
                <td>Price Landfreight/Kg (Rp.)</td>
                <td>Price Seafreight/Kg (Rp.)</td>
            </tr>
            <tr>
                <td>
                    Rp. <?= number_format($airfreight_weight, 2) ?> (<?=$result['airfreight_term']?>)</td>
                <td>Rp. <?= number_format($landfreight_weight, 2) ?> (<?=$result['landfreight_term']?>)</td>
                <td>Rp. <?= number_format($seafreight_weight, 2) ?> (<?=$result['seafreight_term']?>)</td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="3"><button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button></td>
            </tr>
        <?php } ?>
    </table>
<?php } else if ($type_of_shipment == 'International') { ?>
    <table class="table table-bordered">
        <tr>
            <td>Customer Name</td>
            <td>:</td>
            <td><?= $customer['name'] ?></td>
        </tr>
        <tr>
            <td>Shipper Country</td>
            <td>:</td>
            <td><?= $customer['country'] ?></td>
        </tr>
        <tr>
            <td>Shipper City</td>
            <td>:</td>
            <td><?= $customer['city'] ?></td>
        </tr>
        <tr>
            <td>Shipper Address</td>
            <td>:</td>
            <td><?= $customer['address'] ?></td>
        </tr>
        <tr>
            <td>Consignee Country</td>
            <td>:</td>
            <td><?= $country_post ?></td>
        </tr>
        <tr>
            <td>Consignee City</td>
            <td>:</td>
            <td><?= $city_post ?></td>
        </tr>
        <tr>
            <td>Weight (Kg)</td>
            <td>:</td>
            <td><?= $weight_post ?></td>
        </tr>
        <?php if ($result != null) { ?>
            <tr>
                <td>Price / Kg (Rp.)</td>
                <td>:</td>
                <td>Rp. <?= number_format($result['price']) ?></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="3"><button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button></td>
            </tr>
        <?php } ?>
        <?php if ($pickup != null) { ?>
            <tr>
                <td>Pickup Price (Rp.)</td>
                <td>:</td>
                <td>Rp. <?= number_format($pickup['price']) ?></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="3"><button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>