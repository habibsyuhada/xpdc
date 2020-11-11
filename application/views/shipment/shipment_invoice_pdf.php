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
      font-size: 12px;
      padding: 15px;
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

    .bl{
      border-left: 1px solid #000 !important;
    }
    .bt{
      border-top: 1px solid #000 !important;
    }
    .nowrap{
      white-space:nowrap !important;
    }
  </style>
</head>
<body>
  <table class="table td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td class="text-center" width="50%">
          <h1>INVOICE</h1>
        </td>
        <td class="text-center" colspan="2">
          <img src="data:image/png;base64,<?php echo $logo ?>" width="150px"><br>
        </td>
      </tr>
      <tr>
        <td>
          <b>Bill To</b><br>
          <?php echo $shipment['billing_name'] ?><br>
          <?php echo $shipment['billing_address'] ?><br>
          <br>
          <b>Attn. to</b><br>
          <?php echo $shipment['billing_contact_person'] ?><br>
          <?php echo $shipment['billing_phone_number'] ?>
        </td>
        <td class="nowrap">
          <b>Invoice No.</b><br>
          <?php echo $invoice['invoice_no'] ?><br>
          <br>
          <b>Invoice Date</b><br>
          <?php echo $invoice['invoice_date'] ?><br>
          <br>
          <b>Payment Terms</b><br>
          <?php echo $invoice['payment_terms'] ?>
        </td>
        <td class="bl nowrap">
          <b>PT. XENA PRANADIPA DHIA CAKRA</b><br>
          Warna Jaya Business Park B2-07<br>
          Jl. Jendral Sudirman Kel. Taman Baloi<br>
          Kec. Batam Kota Batam 29413<br>
          Kepulauan Riau - Indonesia<br>
          Telephone : (+62) 778 4089 918<br>
          Website : www.xpdcid.com
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table class="td-valign-top" width="100%" border="1" cellspacing="0" cellpadding="3">
    <tbody>
      <tr>
        <td>
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><b>Tracking No.</b></td>
              <td class="text-right"><?php echo $shipment['tracking_no'] ?></td>
            </tr>
          </table>
        </td>
        <td rowspan="2">
          <b>Shipper</b><br>
          <?php echo $shipment['shipper_name'] ?><br>
          <?php echo $shipment['shipper_address'] ?>
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><b>Type of Service</b></td>
              <td class="text-right">Freight Handling</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><b>Type of Shipment</b></td>
              <td class="text-right"><?php echo $shipment['type_of_shipment'] ?></td>
            </tr>
          </table>
        </td>
        <td rowspan="2">
          <b>Consignee</b><br>
          <?php echo $shipment['consignee_name'] ?><br>
          <?php echo $shipment['consignee_address'] ?>
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><b>Type of Mode</b></td>
              <td class="text-right"><?php echo $shipment['type_of_mode'] ?></td>
            </tr>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table class="text-center td-valign-top" border="1" width="100%" cellspacing="0" cellpadding="3" style="border: 0px;">
    <thead>
      <tr>
        <th>No</th>
        <th>Description</th>
        <th>Qty</th>
        <th>UOM</th>
        <th>Unit Price</th>
        <th>Sub Amount</th>
        <th>Exc. Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $subtotal = 0;
        foreach ($costumer as $key => $value) : 
          $subtotal = $subtotal + ($value['qty']*$value['unit_price']*$value['exchange_rate']);
      ?>
      <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php echo $value['description'] ?></td>
        <td><?php echo $value['qty'] ?></td>
        <td><?php echo $value['uom'] ?></td>
        <td><?php echo $value['currency']." ".number_format($value['unit_price'], 2) ?></td>
        <td><?php echo $value['currency']." ".number_format(($value['qty']*$value['unit_price']), 2) ?></td>
        <td><?php echo $value['exchange_rate'] ?></td>
        <td><?php echo "IDR ".number_format(($value['qty']*$value['unit_price']*$value['exchange_rate']), 2) ?></td>
      </tr>
      <?php endforeach;  ?>
      <tr>
        <td colspan="6" rowspan="5" style="border-left: 0px; border-bottom: 0px; text-align: left;">
          Notes:<br>
          <?php echo $invoice['notes'] ?>
        </td>
        <td>SUB TOTAL</td>
        <td><?php echo "IDR ".number_format(($subtotal), 2) ?></td>
      </tr>
      <tr>
        <td>VAT</td>
        <td><?php echo "IDR ".number_format(($invoice['vat']), 2) ?></td>
      </tr>
      <tr>
        <td>TOTAL</td>
        <td><?php echo "IDR ".number_format(($subtotal + $invoice['vat']), 2) ?></td>
      </tr>
      <tr>
        <td>DISCOUNT</td>
        <td><?php echo "IDR ".number_format(($invoice['discount']), 2) ?></td>
      </tr>
      <tr>
        <td>GRAND TOTAL</td>
        <td><?php echo "IDR ".number_format(($subtotal + $invoice['vat'] - $invoice['discount']), 2) ?></td>
      </tr>
    </tbody>
  </table>
  <table class="table td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td class="" width="60%" rowspan="2">
          Please make all checks payable to :<br>
          <table class="table td-valign-top" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td class="nowrap" width="1%">
                  Beneficiary Name
                </td>
                <td>
                  : <?php echo $invoice['beneficiary_name'] ?>
                </td>
              </tr>
              <tr>
                <td class="">
                  Acc. No.
                </td>
                <td>
                  : <?php echo $invoice['acc_no'] ?>
                </td>
              </tr>
              <tr>
                <td class="">
                  Bank Name
                </td>
                <td>
                  : <?php echo $invoice['bank_name'] ?>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
        <td>
          <br>
          <b>PT. XENA PRANADIPA DHIA CAKRA</b>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        </td>
      </tr>
      <tr>
        <td class="bt">
          <i>*Generated by systems, no signature required</i>
        </td>
      </tr>
    </tbody>
  </table>
  <h6 class="text-center" style="font-weight: normal; margin-bottom: 0px;">In case of discrepancy,  please notify PT. XENA PRANADIPA DHIA CAKRA within 7 calender days of receipts of this invoice.<br>Otherwise this invoice will be deemed to be correct and need to be followed</h6>
</body>

</html>