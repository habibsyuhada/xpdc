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
      font-size: 14px;
    }

    .table-bordered th, .table-bordered td{
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

    .td-valign-top > tbody > tr > td {
      vertical-align: top;
    }
    .auto-fit{
      width: 1%;
      white-space: nowrap;
    }
    .border{
      border: 1px solid #000;
    }
    .border-bottom{
      border-bottom: 1px solid #000;
    }
    td{
      padding-right: 6px;
      padding-left: 6px;
    }
    td.header{
      text-align: center;
      font-weight: bold;
    }
    .bg-orange{
      background-color: #ffc000;
    }
  </style>
</head>
<body>
  <header>
    <img src="<?php echo base_url(); ?>assets/img/logo-fix.png" height="75%">
  </header>

  <table class="td-valign-top" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td rowspan="5" class="auto-fit"><b>Customer Name :</b><br><?php echo $quotation['customer_name'] ?></td>
        <td rowspan="5"></td>
        <td class="auto-fit border">Quotation No.</td>
        <td class="border"><?php echo $quotation['quotation_no'] ?></td>
      </tr>
      <tr>
        <td class="auto-fit border">Date</td>
        <td class="border"><?php echo $quotation['date'] ?></td>
      </tr>
      <tr>
        <td class="auto-fit border">Exp. Date</td>
        <td class="border"><?php echo $quotation['exp_date'] ?></td>
      </tr>
      <tr>
        <td class="auto-fit border">Prepared By</td>
        <td class="border"><?php echo $user_list ?></td>
      </tr>
      <tr>
        <td class="auto-fit border">Payment Terms</td>
        <td class="border"><?php echo $quotation['payment_terms'] ?></td>
      </tr>
    </tbody>
  </table>

  <br>

  <table class="td-valign-top" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td class="auto-fit">Attn.</td>
        <td class="auto-fit"> : </td>
        <td><?php echo $quotation['attn'] ?></td>
      </tr>
      <tr>
        <td class="auto-fit">Subject</td>
        <td class="auto-fit"> : </td>
        <td><?php echo $quotation['subject'] ?></td>
      </tr>
    </tbody>
  </table>

  <br>

  <span style="padding-left: 6px;">Thank you for your inquiry. Herewith we quote as follows :</span>
  <table class="td-valign-top" border="1" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="2" class="header bg-orange"><b>Shipment Information</b></td>
      </tr>
      <tr>
        <td><b>Type of Service :</b> <?php echo $quotation['type_of_service'] ?></td>
        <td><b>Type of Transport :</b> <?php echo $quotation['type_of_transport'] ?></td>
      </tr>
      <tr>
        <td><b>Origin :</b> <?php echo $quotation['shipper_city'].", ".$quotation['shipper_country'] ?></td>
        <td><b>Destination :</b> <?php echo $quotation['consignee_city'].", ".$quotation['consignee_country'] ?></td>
      </tr>
      <tr>
        <td><b>Shipper :</b><br><?php echo $quotation['shipper_address'] ?></td>
        <td><b>Consignee :</b><br><?php echo $quotation['consignee_address'] ?></td>
      </tr>
    </tbody>
  </table>
  
  <br>

  <table class="td-valign-top" border="1" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="7" class="header bg-orange"><b>Cargo Information</b></td>
      </tr>
      <tr>
        <td class="header">No</td>
        <th class="header">Qty.</th>
        <th class="header">Package Type</th>
        <th class="header">Length(cm)</th>
        <th class="header">Width(cm)</th>
        <th class="header">Height(cm)</th>
        <th class="header">Weight(kg)</th>
      </tr>
      <?php foreach ($cargo_list as $key => $value) : ?>
      <tr>
        <td><?php echo ($key + 1)."." ?></td>
        <td><?php echo $value['qty']; ?></td>
        <td><?php echo $value['piece_type']; ?></td>
        <td><?php echo $value['length']; ?></td>
        <td><?php echo $value['width']; ?></td>
        <td><?php echo $value['height']; ?></td>
        <td><?php echo $value['weight']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  
  <br>

  <table class="td-valign-top table-bordered" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="8" class="header bg-orange"><b>Charges Description</b></td>
      </tr>
      <tr>
        <td class="header">No</td>
        <th class="header">Description</th>
        <th class="header">Qty</th>
        <th class="header">UOM</th>
        <th class="header">Unit Price</th>
        <th class="header">Sub Amount</th>
        <th class="header">Exc. Rate</th>
        <th class="header">Amount</th>
      </tr>
      <?php 
        $subtotal = 0;
        foreach ($charges_list as $key => $value) : 
          $persen = 1;
          if($value['uom'] == "%"){
            $persen = 100;
          }
          $subtotal = $subtotal + (($value['qty'] / $persen)*$value['unit_price']*$value['exchange_rate']);
      ?>
      <tr>
        <td><?php echo ($key + 1)."." ?></td>
        <td><?php echo $value['description'] ?></td>
        <td><?php echo $value['qty'] ?></td>
        <td><?php echo $value['uom'] ?></td>
        <td><?php echo $value['currency']." ".number_format($value['unit_price'], 2) ?></td>
        <td><?php echo $value['currency']." ".number_format((($value['qty'] / $persen)*$value['unit_price']), 0).".00" ?></td>
        <td><?php echo $value['exchange_rate'] ?></td>
        <td><?php echo "IDR ".number_format((($value['qty'] / $persen)*$value['unit_price']*$value['exchange_rate']), 0).".00" ?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="6" style="border-left: 0px; border-bottom: 0px; text-align: left;">
        </td>
        <td>TOTAL</td>
        <td><?php echo "IDR ".number_format(($subtotal), 0).".00" ?></td>
      </tr>
    </tbody>
  </table>
  <span style="padding-left: 6px;">Terms and Conditions :</span>
  <!-- <ol style="margin-top: 2px; margin-bottom: 2px;">
    <li>Above rate exclude duties and taxes</li>
    <li>Above rate exclude cargo insurance</li>
    <li>Both shipper and consignee must provide valid related required documents for customs clearance</li>
    <li>Any discrepancy between CIPL and actual shipment will be burden to customer.</li>
    <li>Space is subject to space availability by the carrier.</li>
  </ol> -->
  <p><?php echo $quotation['term_condition'] ?></p>
  <span style="padding-left: 6px;">Hopefully this quotation will meet your expectation. If there any questions, please do not hesitate to contact us.</span>
  <br>
  <br>

  <table class="td-valign-top" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td class="auto-fit">Yours faithfully,	</td>
        <td></td>
        <td class="auto-fit">Acknowledgement and Acceptance</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>For and behalf of <b>PT. <?php echo $quotation['customer_name'] ?></b></td>
        <td><br><br><br><br><br><br><br></td>
      </tr>
      <tr>
        <td class="auto-fit border-bottom"><b>PT. XENA PRANADIPA DHIA CAKRA</b></td>
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