<!DOCTYPE html>
<html>

<head>
  <title></title>
  <style type="text/css">
    @page {
      margin: 0cm 0cm;
    }

    body {
      margin: 0px;
      font-size: 14px;
    }

    .text-center {
      text-align: center;
    }

    h3 {
      margin-top: 5px;
      margin-bottom: 2px;
    }

    table{
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
    $per = 5000;
  }
  foreach ($packages_list as $key => $value){
    $total_qty += $value['qty'];
    $total_weight += $value['weight'];
    $total_vol_weight = $total_vol_weight + (($value['length'] * $value['width'] * $value['height']) / $per);
  } 
?>
<body>
  <table width="100%" border="1" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td rowspan="3" class="text-center">
          <img src="<?php echo base_url(); ?>assets/img/logo.png"><br>
        </td>
        <td rowspan="3" class="text-center">
          <img height="100%" src="<?php echo site_url(); ?>home/barcode_generator/<?php echo $shipment['tracking_no'] ?>"><br>
          <b style="margin-top: 5px;"><?php echo $shipment['tracking_no'] ?></b><br>
          Accounts Copy
        </td>
        <td>
          Shipment Date: <?php echo date("Y-m-d", strtotime($shipment['created_date'])) ?>
        </td>
        <td>
          Content: <?php echo $shipment['description_of_goods'] ?>
        </td>
        <td>
          HS Code: <?php echo $shipment['hscode'] ?>
        </td>
      </tr>
      <tr>
        <td>
          Type of Shipment: <?php echo $shipment['type_of_shipment'] ?>
        </td>
        <td>
          Type of Mode: <?php echo $shipment['type_of_mode'] ?>
        </td>
        <td>
          Incoterms: <?php echo $shipment['incoterms'] ?>
        </td>
      </tr>
      <tr>
        <td>
          Quantity: <?php echo $total_qty ?> <?php echo $shipment['piece_type'] ?> <!--  1 Pallet -->
        </td>
        <td>
          Weight: <?php echo $total_weight ?> <!--  100 Kg -->
        </td>
        <td>
          Vol. Weight: <?php echo $total_vol_weight ?> <!--  100 Kg -->
        </td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="1" cellspacing="0" cellpadding="6">
    <tbody>
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
          Address: <?php echo $shipment['shipper_address'] ?> City: <?php echo $shipment['shipper_city'] ?> Country: <?php echo $shipment['shipper_country'] ?> Postcode: <?php echo $shipment['shipper_postcode'] ?>
        </td>
        <td colspan="2">
          Address: <?php echo $shipment['consignee_address'] ?> City: <?php echo $shipment['consignee_city'] ?> Country: <?php echo $shipment['consignee_country'] ?> Postcode: <?php echo $shipment['consignee_postcode'] ?>
        </td>
        <td rowspan="2">
          Signature : Name : Date :
        </td>
      </tr>
      <tr>
        <td colspan="2">
          PIC : <?php echo $shipment['shipper_contact_person'] ?> Phone: <?php echo $shipment['shipper_phone_number'] ?>
        </td>
        <td colspan="2">
          PIC : <?php echo $shipment['consignee_contact_person'] ?> Phone: <?php echo $shipment['consignee_phone_number'] ?>
        </td>
      </tr>
      <tr>
        <td colspan="4">
          
        </td>
        <td>
          
        </td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="1" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td>
          Description
        </td>
        <td>
          Qty.
        </td>
        <td>
          Piece Type
        </td>
        <td>
          Length (cm)
        </td>
        <td>
          Width (cm)
        </td>
        <td>
          Height (cm)
        </td>
        <td>
          Weight (kg)
        </td>
      </tr>
      <?php foreach ($packages_list as $key => $value) : ?>
      <tr>
        <td>
          <?php echo $shipment['description_of_goods'] ?>
        </td>
        <td>
          <?php echo $value['qty'] ?>
        </td>
        <td>
          <?php echo $value['piece_type'] ?>
        </td>
        <td>
          <?php echo $value['length'] ?>
        </td>
        <td>
          <?php echo $value['width'] ?>
        </td>
        <td>
          <?php echo $value['height'] ?>
        </td>
        <td>
          <?php echo $value['weight'] ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>