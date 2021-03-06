<!DOCTYPE html>
<html>

<head>
  <title></title>
  <style type="text/css">
    @page {
      margin: 0px;
      padding: 0px;
      size: 480px 2003px landscape;
    }

    body {
      margin: 0px;
      font-size: 23px;
    }

    .text-center {
      text-align: center;
    }

    h3 {
      margin-top: 5px;
      margin-bottom: 2px;
    }

    table {
      margin: 0;
      border-collapse: collapse;
      border: 0;
    }

    table td {
      border-top: 0;
    }
  </style>
</head>
<?php
$total_qty = 0;
$total_weight = 0;
$total_vol_weight = 0;
$per = 1;
if ($shipment['type_of_mode'] == 'Air Freight') {
  $per = 6000;
} else if ($shipment['type_of_mode'] == 'Land Shipping') {
  $per = 4000;
}
foreach ($packages_list as $key => $value) {
  $total_qty += $value['qty'];
  $total_weight += $value['weight'] * $value['qty'];
  $total_vol_weight = $total_vol_weight + ($value['qty'] * ($value['length'] * $value['width'] * $value['height']) / $per);
}
$total_cost = 0;
$currency = '';
foreach ($cost as $key => $value) {
  $total_cost += ($value['qty'] * $value['unit_price'] * $value['exchange_rate']);
  $currency = $value['currency'];
}
?>

<body>
  <table width="100%" height="100%" border="1" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td rowspan="3" style="width:20%" class="text-center">
          <img src="<?php echo base_url(); ?>assets/img/logo-default.png" width="300px"><br>
        </td>
        <td rowspan="3" style="width:20%" class="text-center">
          <img width="240px" src="<?php echo site_url(); ?>home/barcode_generator/<?php echo $shipment['tracking_no'] ?>"><br>
          <b style="margin-top: 5px;"><?php echo $shipment['tracking_no'] ?></b>
        </td>
        <td style="width:20%">
          Shipment Date: <?php echo date("d-m-Y", strtotime($shipment['created_date'])) ?>
        </td>
        <td style="width:20%">
          Insurance: <?php echo $shipment['insurance'] ?>
        </td>
        <td style="width:20%">
          Type of Shipment: <?php echo $shipment['type_of_shipment'] ?>
        </td>
      </tr>
      <tr>
        <td>
          Content: <?php echo $shipment['description_of_goods'] ?>
        </td>
        <td>
          Quantity: <?php echo $total_qty ?> <?php echo $shipment['piece_type'] ?>
        </td>
        <td>
          Type of Mode: <?php echo $shipment['type_of_mode'] ?>
        </td>
      </tr>
      <tr>
        <td>
          Declared Value: <?php echo $shipment['currency'] ?> <?php echo number_format($shipment['declared_value'], 2); ?>
          <!--  1 Pallet -->
        </td>
        <td>
          Chargeable Weight: <?php echo ($total_weight >= $total_vol_weight) ? number_format($total_weight, 2) : number_format($total_vol_weight, 2) ?> Kg
          <!--  100 Kg -->
        </td>
        <td>
          Shipment Bill: <?php echo $currency . " " . number_format($total_cost, 2) ?>
          <!--  100 Kg -->
        </td>
      </tr>
      <tr>
        <td>
          Shipper
        </td>
        <td>
          <?php echo $shipment['shipper_name'] ?>
        </td>
        <td>
          Consignee
        </td>
        <td>
          <?php echo $shipment['consignee_name'] ?>
        </td>
        <td>
          Ref. No : <?php echo $shipment['ref_no'] ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Address: <?php echo $shipment['shipper_address'] ?><br>Country: <?php echo $shipment['shipper_country'] ?><br>City: <?php echo $shipment['shipper_city'] ?><br>Postcode: <?php echo $shipment['shipper_postcode'] ?>
        </td>
        <td colspan="2">
          Address: <?php echo $shipment['consignee_address'] ?><br>Country: <?php echo $shipment['consignee_country'] ?><br>City: <?php echo $shipment['consignee_city'] ?><br>Postcode: <?php echo $shipment['consignee_postcode'] ?>
        </td>
        <td style="vertical-align: top; border-bottom: 0px;">
          Signature :
        </td>
      </tr>
      <tr>
        <td colspan="2">
          PIC : <?php echo $shipment['shipper_contact_person'] ?><br>Phone: <?php echo $shipment['shipper_phone_number'] ?>
        </td>
        <td colspan="2">
          PIC : <?php echo $shipment['consignee_contact_person'] ?><br>Phone: <?php echo $shipment['consignee_phone_number'] ?>
        </td>
        <td style="vertical-align: top;">
          Name :<br>
          Date :
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>