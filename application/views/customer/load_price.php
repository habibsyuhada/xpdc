<?php if ($type_of_shipment == 'Domestic Shipping') { ?>
  <table class="table table-bordered">
    <?php if ($this->session->userdata('role') == 'Customer') { ?>
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
    <?php } ?>
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
  </table>
  <table class="table table-bordered text-center">
    <?php if ($result != null) { ?>
      <tr>
        <td>Price Airfreight (Rp.)</td>
        <td>Price Landfreight (Rp.)</td>
        <td>Price Seafreight (Rp.)</td>
      </tr>
      <tr>
        <td><?= ($airfreight_weight != 0) ? "Rp. " . number_format($airfreight_weight, 2) . " (" . $result['airfreight_term'] . ")" : '<button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button>'; ?></td>
        <td><?= ($landfreight_weight != 0) ? "Rp. " . number_format($landfreight_weight, 2) . " (" . $result['landfreight_term'] . ")" : '<button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button>'; ?></td>
        <td><?= ($seafreight_weight != 0) ? "Rp. " . number_format($seafreight_weight, 2) . " (" . $result['seafreight_term'] . ")" : '<button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button>'; ?></td>
      </tr>
      <tr>
        <td>Weight : <?= $weight_fix_airfreight ?> Kg</td>
        <td>Weight : <?= $weight_fix_landfreight ?> Kg</td>
        <td>Weight : <?= $weight_fix_seafreight ?> Kg</td>
      </tr>
      <?php if ($this->session->userdata('role') == 'Customer') { ?>
        <tr>
          <td>
            <?php if ($airfreight_weight != 0) { ?>
              <form method="POST" action="<?php echo base_url() ?>customer/shipment_create">
                <input type="hidden" name="type_of_shipment" value="<?= $type_of_shipment ?>">
                <input type="hidden" name="type_of_mode" value="Air Freight">
                <input type="hidden" name="shipper_city" value="<?= $customer['city'] ?>">
                <input type="hidden" name="shipper_country" value="<?= $customer['country'] ?>">
                <input type="hidden" name="consignee_city" value="<?= $city_post ?>">
                <input type="hidden" name="consignee_country" value="<?= $country_post ?>">
                <input type="hidden" name="act_weight" value="<?= $weight_post ?>">
                <input type="hidden" name="vol_weight" value="<?= $vol_weight_airfreight_post ?>">
                <input type="hidden" name="measurement" value="<?= $measurement_post ?>">
                <input type="hidden" name="check_price_weight" value="<?= $airfreight_weight ?>">
                <input type="hidden" name="check_price_term" value="<?= $result['airfreight_term'] ?>">

                <?php foreach ($post['qty'] as $key => $value) : ?>
                  <input type="hidden" name="qty[]" value="<?= $post['qty'][$key] ?>">
                  <input type="hidden" name="piece_type[]" value="<?= $post['piece_type'][$key] ?>">
                  <input type="hidden" name="length[]" value="<?= $post['length'][$key] ?>">
                  <input type="hidden" name="size[]" value="<?= $post['size'][$key] ?>">
                  <input type="hidden" name="width[]" value="<?= $post['width'][$key] ?>">
                  <input type="hidden" name="container_no[]" value="<?= $post['container_no'][$key] ?>">
                  <input type="hidden" name="height[]" value="<?= $post['height'][$key] ?>">
                  <input type="hidden" name="seal_no[]" value="<?= $post['seal_no'][$key] ?>">
                  <input type="hidden" name="weight[]" value="<?= $post['weight'][$key] ?>">
                <?php endforeach; ?>

                <button type="submit" class=" btn btn-success btn-sm btn-block">Create Shipment</button>
              </form>
            <?php } else { ?>
              <button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button>
            <?php } ?>
          </td>
          <td>
            <?php if ($landfreight_weight != 0) { ?>
              <form method="POST" action="<?php echo base_url() ?>customer/shipment_create">
                <input type="hidden" name="type_of_shipment" value="<?= $type_of_shipment ?>">
                <input type="hidden" name="type_of_mode" value="Land Shipping">
                <input type="hidden" name="shipper_city" value="<?= $customer['city'] ?>">
                <input type="hidden" name="shipper_country" value="<?= $customer['country'] ?>">
                <input type="hidden" name="consignee_city" value="<?= $city_post ?>">
                <input type="hidden" name="consignee_country" value="<?= $country_post ?>">
                <input type="hidden" name="act_weight" value="<?= $weight_post ?>">
                <input type="hidden" name="vol_weight" value="<?= $vol_weight_landfreight_post ?>">
                <input type="hidden" name="measurement" value="<?= $measurement_post ?>">
                <input type="hidden" name="check_price_weight" value="<?= $landfreight_weight ?>">
                <input type="hidden" name="check_price_term" value="<?= $result['landfreight_term'] ?>">

                <?php foreach ($post['qty'] as $key => $value) : ?>
                  <input type="hidden" name="qty[]" value="<?= $post['qty'][$key] ?>">
                  <input type="hidden" name="piece_type[]" value="<?= $post['piece_type'][$key] ?>">
                  <input type="hidden" name="length[]" value="<?= $post['length'][$key] ?>">
                  <input type="hidden" name="size[]" value="<?= $post['size'][$key] ?>">
                  <input type="hidden" name="width[]" value="<?= $post['width'][$key] ?>">
                  <input type="hidden" name="container_no[]" value="<?= $post['container_no'][$key] ?>">
                  <input type="hidden" name="height[]" value="<?= $post['height'][$key] ?>">
                  <input type="hidden" name="seal_no[]" value="<?= $post['seal_no'][$key] ?>">
                  <input type="hidden" name="weight[]" value="<?= $post['weight'][$key] ?>">
                <?php endforeach; ?>

                <button type="submit" class=" btn btn-success btn-sm btn-block">Create Shipment</button>
              </form>
            <?php } else { ?>
              <button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button>
            <?php } ?>
          </td>
          <td>
            <?php if ($seafreight_weight != 0) { ?>
              <form method="POST" action="<?php echo base_url() ?>customer/shipment_create">
                <input type="hidden" name="type_of_shipment" value="<?= $type_of_shipment ?>">
                <input type="hidden" name="type_of_mode" value="Sea Transport">
                <input type="hidden" name="shipper_city" value="<?= $customer['city'] ?>">
                <input type="hidden" name="shipper_country" value="<?= $customer['country'] ?>">
                <input type="hidden" name="consignee_city" value="<?= $city_post ?>">
                <input type="hidden" name="consignee_country" value="<?= $country_post ?>">
                <input type="hidden" name="act_weight" value="<?= $weight_post ?>">
                <input type="hidden" name="vol_weight" value="<?= $vol_weight_seafreight_post ?>">
                <input type="hidden" name="measurement" value="<?= $measurement_post ?>">
                <input type="hidden" name="check_price_weight" value="<?= $seafreight_weight ?>">
                <input type="hidden" name="check_price_term" value="<?= $result['seafreight_term'] ?>">

                <?php foreach ($post['qty'] as $key => $value) : ?>
                  <input type="hidden" name="qty[]" value="<?= $post['qty'][$key] ?>">
                  <input type="hidden" name="piece_type[]" value="<?= $post['piece_type'][$key] ?>">
                  <input type="hidden" name="length[]" value="<?= $post['length'][$key] ?>">
                  <input type="hidden" name="size[]" value="<?= $post['size'][$key] ?>">
                  <input type="hidden" name="width[]" value="<?= $post['width'][$key] ?>">
                  <input type="hidden" name="container_no[]" value="<?= $post['container_no'][$key] ?>">
                  <input type="hidden" name="height[]" value="<?= $post['height'][$key] ?>">
                  <input type="hidden" name="seal_no[]" value="<?= $post['seal_no'][$key] ?>">
                  <input type="hidden" name="weight[]" value="<?= $post['weight'][$key] ?>">
                <?php endforeach; ?>

                <button type="submit" class=" btn btn-success btn-sm btn-block">Create Shipment</button>
              </form>
            <?php } else { ?>
              <button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="3"><button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button></td>
      </tr>
    <?php } ?>
  </table>
<?php } else if ($type_of_shipment == 'International Shipping') { ?>
  <table class="table table-bordered">
    <?php if ($this->session->userdata('role') == 'Customer') { ?>
      <tr>
        <td>Type of Mode</td>
        <td>:</td>
        <td>Airfreight (Reguler)</td>
      </tr>
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
    <?php } ?>
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
      <td><?= $weight_fix_airfreight ?></td>
    </tr>
    <?php if ($result != null) { ?>
      <tr>
        <td>Total Billing (Rp.)</td>
        <td>:</td>
        <td>Rp. <?= number_format($result['price'] * $weight_fix_airfreight) ?></td>
      </tr>
      <tr>
        <td colspan="3">
          <form method="POST" action="<?php echo base_url() ?>customer/shipment_create">
            <input type="hidden" name="type_of_shipment" value="<?= $type_of_shipment ?>">
            <input type="hidden" name="type_of_mode" value="Air Freight">
            <input type="hidden" name="shipper_city" value="<?= $customer['city'] ?>">
            <input type="hidden" name="shipper_country" value="<?= $customer['country'] ?>">
            <input type="hidden" name="consignee_city" value="<?= $city_post ?>">
            <input type="hidden" name="consignee_country" value="<?= $country_post ?>">
            <input type="hidden" name="act_weight" value="<?= $weight_post ?>">
            <input type="hidden" name="vol_weight" value="<?= $vol_weight_airfreight_post ?>">
            <input type="hidden" name="measurement" value="<?= $measurement_post ?>">
            <input type="hidden" name="check_price_weight" value="<?= ($result['price'] * $weight_fix_airfreight) ?>">
            <input type="hidden" name="check_price_term" value="0">

            <?php foreach ($post['qty'] as $key => $value) : ?>
              <input type="hidden" name="qty[]" value="<?= $post['qty'][$key] ?>">
              <input type="hidden" name="piece_type[]" value="<?= $post['piece_type'][$key] ?>">
              <input type="hidden" name="length[]" value="<?= $post['length'][$key] ?>">
              <input type="hidden" name="size[]" value="<?= $post['size'][$key] ?>">
              <input type="hidden" name="width[]" value="<?= $post['width'][$key] ?>">
              <input type="hidden" name="container_no[]" value="<?= $post['container_no'][$key] ?>">
              <input type="hidden" name="height[]" value="<?= $post['height'][$key] ?>">
              <input type="hidden" name="seal_no[]" value="<?= $post['seal_no'][$key] ?>">
              <input type="hidden" name="weight[]" value="<?= $post['weight'][$key] ?>">
            <?php endforeach; ?>

            <button type="submit" class=" btn btn-success btn-sm btn-block">Create Shipment</button>
          </form>
        </td>
      </tr>
    <?php } else { ?>
      <tr>
        <td colspan="3"><button type="button" class=" btn btn-danger btn-sm btn-block">Not Available</button></td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>