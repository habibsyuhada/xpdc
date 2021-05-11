<!DOCTYPE html>
<html>

<head>
  <title></title>
  <style type="text/css">
    @page {
      margin: 2.5cm 1cm;
    }

    header {
      position: fixed;
      top: -2.3cm;
      left: 0px;
      right: 0px;
      height: 2.3cm;

      /** Extra personal styles **/
      /* background-color: #03a9f4; */
      /* color: white; */
      /* text-align: center; */
      /* line-height: 35px; */
    }

    footer {
      position: fixed;
      bottom: -2.3cm;
      left: 0px;
      right: 0px;
      height: 2.3cm;

      /** Extra personal styles **/
      /* background-color: #03a9f4;
      color: white;
      text-align: center;
      line-height: 35px; */
    }

    body {
      margin: 0px;
      font-size: 12px;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #000;
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

    .td-valign-top>tbody>tr>td {
      vertical-align: top;
    }

    .auto-fit {
      width: 1%;
      white-space: nowrap;
    }

    .border {
      border: 1px solid #000;
    }

    .border-bottom {
      border-bottom: 1px solid #000;
    }

    td {
      padding-right: 6px;
      padding-left: 6px;
    }

    td.header {
      text-align: center;
      font-weight: bold;
    }

    .bg-orange {
      background-color: #ffc000;
    }

    .px-4 {
      padding-right: 1.5rem;
      padding-left: 1.5rem;
    }

    .pl-4 {
      padding-left: 1.5rem;
    }

    .pr-4 {
      padding-right: 1.5rem;
    }
  </style>
</head>

<body>
  <?php
  // $type_of_service = [
  //   "FH" => "Freight Handling",
  //   "CH" => "Clearance Handling",
  //   "WH" => "Warehousing",
  // ];
  ?>
  <header>
    <img src="<?php echo base_url(); ?>assets/img/logo-fix.png" height="75%">
  </header>

  <table class="td-valign-top" style="width: 100%;" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td rowspan="3">
          <b>Customer Name : </b><br>
          <?php echo $quotation['customer_name'] ?><br>
          <?php echo $quotation['customer_address'] ?>
        </td>
        <td rowspan="5" class="auto-fit px-4"></td>
        <td class="auto-fit border">Quotation No.</td>
        <td class="auto-fit border pr-4"><?php echo $quotation['quotation_no'] ?></td>
      </tr>
      <tr>
        <td class="auto-fit border">Date</td>
        <td class="auto-fit border"><?php echo $quotation['date'] ?></td>
      </tr>
      <tr>
        <td class="auto-fit border">Exp. Date</td>
        <td class="auto-fit border"><?php echo $quotation['exp_date'] ?></td>
      </tr>
      <tr>
        <td>Attn. &nbsp;&nbsp;&nbsp;: <?php echo $quotation['customer_contact_person'] ?> (<?php echo $quotation['customer_phone_number'] ?>)</td>
        <td class="auto-fit border">Prepared By</td>
        <td class="auto-fit border"><?php echo $user_list ?></td>
      </tr>
      <tr>
        <td>Subject &nbsp;: Quotation for <?php echo $type_of_service; ?></td>
        <td class="auto-fit border">Payment Terms</td>
        <td class="auto-fit border"><?php echo $quotation['payment_terms'] ?></td>
      </tr>
    </tbody>
  </table>

  <br>

  <span style="padding-left: 6px;">Thank you for your inquiry. Herewith we quote as follows :</span>
  <table class="td-valign-top" border="1" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="2" class="header bg-orange"><b>Service Information</b></td>
      </tr>
      <tr>
        <td style="width: 50%"><b>Type of Service &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $type_of_service; ?></td>
        <td style="width: 50%"><b>Incoterms &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $quotation['incoterms'] ?></td>
      </tr>
      <tr>
        <td><b>Type of Shipment &nbsp;:</b> <?php echo @$quotation['type_of_shipment'] ?></td>
        <td><b>Type of Transport &nbsp;:</b> <?php echo $quotation['type_of_transport'] ?> <?php echo ($quotation['sea'] == "" ? "" : "(" . $quotation['sea'] . ")") ?></td>
      </tr>
      <tr>
        <td><b>Origin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $quotation['shipper_city'] . ", " . $quotation['shipper_country'] ?></td>
        <td><b>Destination &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $quotation['consignee_city'] . ", " . $quotation['consignee_country'] ?></td>
      </tr>
      <tr>
        <td>
          <?php
          if ($quotation['shipper_tba'] == 0) {
            echo "<b>Shipper : </b>" . $quotation['shipper_name'] . "<br>" . $quotation['shipper_address'];
          } else {
            echo "<b>Shipper &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> TBA";
          }
          ?>
        </td>
        <td>
          <?php
          if ($quotation['consignee_tba'] == 0) {
            echo "<b>Consignee : </b>" . $quotation['consignee_name'] . "<br>" . $quotation['consignee_address'];
          } else {
            echo "<b>Consignee &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> TBA";
          }
          ?>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- <br>

  <table class="td-valign-top text-center" border="1" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="6" class="header bg-orange"><b>Package Detail</b></td>
      </tr>
      <tr>
        <th class="header">Qty.</th>
        <th class="header">Package Type</th>
        <th class="header">Length(cm)</th>
        <th class="header">Width(cm)</th>
        <th class="header">Height(cm)</th>
        <th class="header">Weight(kg)</th>
      </tr>
      <?php
      $total_act_weight = 0;
      $total_vol_weight = 0;
      $total_measurement = 0;
      $total_qty = 0;
      $array_unit = array();
      $per = 4000;
      if ($quotation['type_of_transport'] == 'Air Freight') {
        $per = 6000;
      } elseif ($quotation['type_of_transport'] == 'Land Shipping') {
        $per = 4000;
      }
      foreach ($cargo_list as $key => $value) :
        $actual_weight = $value['qty'] * $value['weight'];
        $volume_weight = $value['qty'] * ($value['length'] * $value['width'] * $value['height']) / $per;
        $measurement = $value['qty'] * ($value['length'] * $value['width'] * $value['height']) / 1000000;
        $total_act_weight += $actual_weight;
        $total_vol_weight += $volume_weight;
        $total_measurement += $measurement;
        $total_qty += $value['qty'];
        if (!in_array($value['piece_type'], $array_unit)) {
          $array_unit[] = $value['piece_type'];
        }
      ?>
      <tr>
        <td><?php echo $value['qty']; ?></td>
        <td><?php echo $value['piece_type']; ?></td>
        <td><?php echo $value['length']; ?></td>
        <td><?php echo $value['width']; ?></td>
        <td><?php echo $value['height']; ?></td>
        <td><?php echo $value['weight']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table> -->
  <br>
  <?php if ($isdelivery == 1) { ?>
    <table class="td-valign-top text-center" border="1" width="100%" cellspacing="0" cellpadding="2">
      <tbody>
        <tr>
          <td colspan="6" class="header bg-orange"><b>Cargo Information</b></td>
        </tr>
        <tr>
          <th class="header">Description of Goods</th>
          <th class="header">Quantity</th>
          <th class="header">Package</th>
          <th class="header">Act. Weight</th>
          <th class="header">Vol. Weight</th>
          <th class="header">Measurement</th>
        </tr>
        <tr>
          <td><?php echo @$quotation['description_of_goods'] ?></td>
          <td><?php echo number_format($total_qty) ?> </td>
          <td><?php echo (count($array_unit) == 1) ? $array_unit[0] : 'nmp' ?> </td>
          <td><?php echo number_format($total_act_weight, 2) ?> Kg</td>
          <td><?php echo number_format($total_vol_weight, 2) ?> Kg</td>
          <td><?php echo number_format($total_measurement, 2) ?> M<sup>3</sup></td>
        </tr>
      </tbody>
    </table>
  <?php } ?>

  <br>

  <table class="td-valign-top table-bordered text-center" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="8" class="header bg-orange"><b>Charges Description</b></td>
      </tr>
      <tr>
        <th class="header">Description</th>
        <th class="header">Qty</th>
        <th class="header">UOM</th>
        <th class="header">Unit Price</th>
        <th class="header">Sub Amount</th>
        <th class="header">Exc. Rate<sup>*</sup></th>
        <th class="header">Amount</th>
        <th class="header">Remarks</th>
      </tr>
      <?php
      $subtotal = 0;
      foreach ($charges_list as $key => $value) :
        $persen = 1;
        if ($value['uom'] == "%") {
          $persen = 100;
        }
        $subtotal = $subtotal + (($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate']);
      ?>
        <tr>
          <td><?php echo $value['description'] ?></td>
          <td><?php echo $value['qty'] ?></td>
          <td><?php echo $value['uom'] ?></td>
          <td><?php echo $value['currency'] . " " . number_format($value['unit_price'], 2) ?></td>
          <td><?php echo $value['currency'] . " " . number_format((($value['qty'] / $persen) * $value['unit_price']), 0) . ".00" ?></td>
          <td><?php echo number_format($value['exchange_rate'], 2) ?></td>
          <td><?php echo "IDR " . number_format((($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate']), 0) . ".00" ?></td>
          <td><?php echo $value['remarks']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div style="text-align: right">
    <?php if ($quotation['hide_estimete_total_pdf'] == 0) : ?>
      <p><b>Estimate Total Charges : <?php echo "IDR " . number_format(($subtotal), 0) . ".00" ?></b></p>
    <?php endif; ?>
    <!-- <tr>
        <td colspan="5" style="border-style: none;">
        </td>
        <td style="border-style: none;" colspan="2"><b>Estimate Total Charges</b></td>
        <td style="border-style: none;"><b><?php echo "IDR " . number_format(($subtotal), 0) . ".00" ?></b></td>
      </tr> -->
  </div>
  <span style="padding-left: 6px;">Terms and Conditions :</span>
  <ol style="margin-top: 2px; margin-bottom: 2px;">
    <?php
    $term_condition = explode("\n", $quotation['term_condition']);
    foreach ($term_condition as $key => $value) :
    ?>
      <li><?php echo $value ?></li>
    <?php endforeach; ?>
  </ol>
  <span style="padding-left: 6px;">Hopefully this quotation will meet your expectation. If there any questions, please do not hesitate to contact us.</span>
  <br>
  <br>

  <table class="td-valign-top" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td class="auto-fit" style="width: 50%"></td>
        <td></td>
        <td class="auto-fit">Acknowledgement and Acceptance</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>For and behalf of <b><?php echo $quotation['customer_name'] ?></b></td>
        <td><br><br><br><br><br><br></td>
      </tr>
      <tr>
        <td class="auto-fit"></td>
        <td></td>
        <td class="auto-fit border-bottom"></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td class="auto-fit">Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:</td>
        <td></td>
      </tr>
    </tbody>
  </table>

  <footer>
    <table class="td-valign-top" width="100%" cellspacing="0" cellpadding="6">
      <tbody>
        <tr>
          <td></td>
          <td class="auto-fit">
            <b style="color: #ffd966">PT. XENA PRANADIPA DHIA CAKRA</b><br>
            Warna Jaya Business Park B2-07<br>
            Jl. Jendral Sudirman 29413<br>
            Batam – Kepulauan Riau<br>
            www. xpdcid.com
          </td>
        </tr>
      </tbody>
    </table>
  </footer>
</body>

</html>