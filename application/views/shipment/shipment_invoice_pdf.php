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
<body>
  <table class="table" width="100%" border="1" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td class="text-center" width="50%">
          <h1>INVOICE</h1>
        </td>
        <td class="text-center">
          <img src="<?php echo base_url(); ?>assets/img/logo-fix.png" width="150px"><br>
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
                <td><?php echo $shipment['shipper_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $shipment['shipper_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $shipment['shipper_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $shipment['shipper_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $shipment['shipper_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $shipment['shipper_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $shipment['shipper_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $shipment['shipper_email'] ?></td>
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
                <td><?php echo $shipment['consignee_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $shipment['consignee_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $shipment['consignee_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $shipment['consignee_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $shipment['consignee_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $shipment['consignee_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $shipment['consignee_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $shipment['consignee_email'] ?></td>
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
                <td><?php echo $shipment['incoterms'] ?></td>
              </tr>
              <tr>
                <td>Insurance</td>
                <td>:</td>
                <td><?php echo $shipment['insurance'] ?></td>
              </tr>
              <tr>
                <td>Description of Goods</td>
                <td>:</td>
                <td><?php echo $shipment['description_of_goods'] ?></td>
              </tr>
              <tr>
                <td>HSCode</td>
                <td>:</td>
                <td><?php echo $shipment['hscode'] ?></td>
              </tr>
              <tr>
                <td>COO (Country of Origin)</td>
                <td>:</td>
                <td><?php echo $shipment['coo'] ?></td>
              </tr>
              <tr>
                <td>Declared Value</td>
                <td>:</td>
                <td><?php echo $shipment['declared_value'] ?></td>
              </tr>
              <tr>
                <td>Currency</td>
                <td>:</td>
                <td><?php echo $shipment['currency'] ?></td>
              </tr>
              <tr>
                <td>Ref No.</td>
                <td>:</td>
                <td><?php echo $shipment['ref_no'] ?></td>
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
                <td><?php echo $shipment['type_of_shipment'] ?></td>
              </tr>
              <tr>
                <td>Type of Mode</td>
                <td>:</td>
                <td><?php echo $shipment['type_of_mode'] ?> <?php echo (!isset($data_input['sea']) ? "" : "(" . $data_input['sea'] . ")") ?></td>
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
                <td><?php echo $shipment['billing_account'] ?></td>
              </tr>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><?php echo $shipment['billing_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $shipment['billing_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $shipment['billing_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $shipment['billing_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $shipment['billing_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $shipment['billing_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $shipment['billing_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $shipment['billing_email'] ?></td>
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
                <td><?php echo $shipment['status_pickup'] ?></td>
              </tr>
              <?php if ($shipment['status_pickup'] != 'Dropoff') : ?>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_name'] ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_address'] ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_city'] ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_country'] ?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_postcode'] ?></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_contact_person'] ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_phone_number'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_email'] ?></td>
              </tr>
              <tr>
                <td>Pick Up Date Time</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_date'] ?> <?php echo $shipment['pickup_time'] ?> <?php echo ($shipment['pickup_date'].$shipment['pickup_time'] == $shipment['pickup_date'].$shipment['pickup_time'] ? "" : " - ".$shipment['pickup_date_to']." ".$shipment['pickup_time_to'])  ?></td>
              </tr>
              <tr>
                <td>Notes</td>
                <td>:</td>
                <td><?php echo $shipment['pickup_email'] ?></td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table td-valign-top text-center" width="100%" border="1" cellspacing="0" cellpadding="6">
    <thead>
      <tr>
        <th>Qty.</th>
        <th>Package Type</th>
        <th>Length(cm)</th>
        <th>Width(cm)</th>
        <th>Height(cm)</th>
        <th>Weight(kg)</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($shipment['qty'] as $key => $value) : ?>
      <tr>
        <td><?php echo $shipment['qty'][$key] ?></td>
        <td><?php echo $shipment['piece_type'][$key] ?></td>
        <td><?php echo $shipment['length'][$key]+0 ?></td>
        <td><?php echo $shipment['width'][$key]+0 ?></td>
        <td><?php echo $shipment['height'][$key]+0 ?></td>
        <td><?php echo $shipment['weight'][$key]+0 ?></td>
      </tr>
      <?php endforeach;  ?>
    </tbody>
  </table>
</body>

</html>