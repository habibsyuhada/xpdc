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
      font-size: 16px;
    }

    .text-center {
      text-align: center;
    }
    .text-right {
      text-align: right;
    }
    .text-left {
      text-align: left;
    }

    h2 {
      margin-top: 5px;
      margin-bottom: 2px;
    }

    .table{
      margin: 0;
      border-collapse: collapse;
      border: 0;
    }
    .table > tbody > tr > td {
      border-top: 0;
    }
    .table > tbody > tr > .br{
      border-right: 0;
    }
    .table > tbody > tr > .bl{
      border-left: 0;
    }

    .td-valign-top > tbody > tr > td {
      vertical-align: top;
    }
  </style>
</head>
<?php
$total_act_weight = 0;
$total_vol_weight = 0;
$total_measurement = 0;
  $per = 5000;
  if ($post['type_of_mode'] == 'Air Freight') {
    $per = 6000;
  }
  foreach ($post['qty'] as $key => $value) {
    $actual_weight = $post['qty'][$key] * $post['weight'][$key];
    $volume_weight = $post['qty'][$key] * ($post['length'][$key] * $post['width'][$key] * $post['height'][$key]) / $per;
    $measurement = $post['qty'][$key] * ($post['length'][$key] * $post['width'][$key] * $post['height'][$key]) / 1000000;

    $total_act_weight += $actual_weight;
    $total_vol_weight += $volume_weight;
    $total_measurement += $measurement;
  }
?>
<body>
  <table class="table" width="100%" border="1" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td class="text-center">
          <img src="<?php echo base_url(); ?>assets/img/logo.png"><br>
        </td>
        <td class="text-center">
          <h1>SHIPMENT RECEIPT</h1>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table td-valign-top" width="100%" border="1" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td class="br" width="50%">
          <h2>Shipper Information</h2><br>
          <table class="td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td>Shipper Name</td>
                <td>:</td>
                <td><?php echo $post['shipper_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $post['shipper_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $post['shipper_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $post['shipper_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $post['shipper_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $post['shipper_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $post['shipper_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $post['shipper_email'] ?></td>
              </tr>
            </tbody>
          </table>
          <br>
        </td>
        <td class="bl" width="50%">
          <h2>Consignee Information</h2><br>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td>Shipper Name</td>
                <td>:</td>
                <td><?php echo $post['consignee_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $post['consignee_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $post['consignee_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $post['consignee_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $post['consignee_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $post['consignee_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $post['consignee_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $post['consignee_email'] ?></td>
              </tr>
            </tbody>
          </table>
          <br>
        </td>
      </tr>
      <tr>
        <td class="br" width="50%">
          <h2>Shipment Information</h2><br>
          <table class="td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td>Incoterms</td>
                <td>:</td>
                <td><?php echo $post['incoterms'] ?></td>
              </tr>
              <tr>
                <td>Insurance</td>
                <td>:</td>
                <td><?php echo $post['insurance'] ?></td>
              </tr>
              <tr>
                <td>Description of Goods</td>
                <td>:</td>
                <td><?php echo $post['description_of_goods'] ?></td>
              </tr>
              <tr>
                <td>HSCode</td>
                <td>:</td>
                <td><?php echo $post['hscode'] ?></td>
              </tr>
              <tr>
                <td>COO (Country of Origin)</td>
                <td>:</td>
                <td><?php echo $post['coo'] ?></td>
              </tr>
              <tr>
                <td>Declared Value</td>
                <td>:</td>
                <td><?php echo $post['declared_value'] ?></td>
              </tr>
              <tr>
                <td>Currency</td>
                <td>:</td>
                <td><?php echo $post['currency'] ?></td>
              </tr>
              <tr>
                <td>Ref No.</td>
                <td>:</td>
                <td><?php echo $post['ref_no'] ?></td>
              </tr>
              <tr>
                <td>Act. Weight</td>
                <td>:</td>
                <td><?php echo round($total_act_weight, 2, PHP_ROUND_HALF_UP) ?> Kg</td>
              </tr>
              <tr>
                <td>Vol. Weight</td>
                <td>:</td>
                <td><?php echo round($total_vol_weight, 2, PHP_ROUND_HALF_UP) ?> Kg</td>
              </tr>
              <tr>
                <td>Measurement</td>
                <td>:</td>
                <td><?php echo round($total_measurement, 2, PHP_ROUND_HALF_UP) ?> M<sup>3</sup></td>
              </tr>
            </tbody>
          </table>
          <br>
        </td>
        <td class="bl" width="50%">
          <h2>Service Information</h2><br>
          <table class="td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td>Type of Shipment</td>
                <td>:</td>
                <td><?php echo $post['type_of_shipment'] ?></td>
              </tr>
              <tr>
                <td>Type of Mode</td>
                <td>:</td>
                <td><?php echo $post['type_of_mode'] ?> <?php echo (!isset($data_input['sea']) ? "" : "(" . $data_input['sea'] . ")") ?></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td class="br" width="50%">
          <h2>Billing Details</h2><br>
          <table class="td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td>XPDC Account No.</td>
                <td>:</td>
                <td><?php echo $post['billing_account'] ?></td>
              </tr>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><?php echo $post['billing_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $post['billing_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $post['billing_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $post['billing_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $post['billing_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $post['billing_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $post['billing_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $post['billing_email'] ?></td>
              </tr>
            </tbody>
          </table>
          <br>
        </td>
        <td class="bl" width="50%">
          <h2>Pick Up Information</h2><br>
          <table class="td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td>Status Pickup</td>
                <td>:</td>
                <td><?php echo $post['status_pickup'] ?></td>
              </tr>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><?php echo $post['pickup_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $post['pickup_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $post['pickup_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $post['pickup_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $post['pickup_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $post['pickup_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $post['pickup_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $post['pickup_email'] ?></td>
              </tr>
              <tr>
                <td>Pick Up Date Time</td>
                <td>:</td>
                <td><?php echo $post['pickup_date'] ?> <?php echo $post['pickup_time'] ?> - <?php echo ($post['pickup_date'].$post['pickup_time'] == $post['pickup_date'].$post['pickup_time'] ? "" : " - ".$post['pickup_date_to']." ".$post['pickup_time_to'])  ?></td>
              </tr>
              <tr>
                <td>Notes</td>
                <td>:</td>
                <td><?php echo $post['pickup_email'] ?></td>
              </tr>
            </tbody>
          </table>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>