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
        <td class="border"><?php echo $quotation['created_by'] ?></td>
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
        <td><b>Type of Service :</b> Door to Door</td>
        <td><b>Type of Transport :</b> Airfreight</td>
      </tr>
      <tr>
        <td><b>Origin :</b> Batam (BTH)</td>
        <td><b>Destination :</b> Jakarta (CGK)</td>
      </tr>
      <tr>
        <td><b>Shipper :</b><br><br><br><br></td>
        <td><b>Consignee :</b><br><br><br><br></td>
      </tr>
    </tbody>
  </table>
  
  <br>

  <table class="td-valign-top" border="1" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="6" class="header bg-orange"><b>Cargo Information</b></td>
      </tr>
      <tr>
        <td class="header">No</td>
        <td class="header">Content</td>
        <td class="header">Quantity</td>
        <td class="header">Weight</td>
        <td class="header">Measurement</td>
        <td class="header">Dimension</td>
      </tr>
      <tr>
        <td>1.</td>
        <td>Survey Meter</td>
        <td></td>
        <td></td>
        <td>NA</td>
        <td>NA</td>
      </tr>
    </tbody>
  </table>
  
  <br>

  <table class="td-valign-top" border="1" width="100%" cellspacing="0" cellpadding="2">
    <tbody>
      <tr>
        <td colspan="5" class="header bg-orange"><b>Charges Description</b></td>
      </tr>
      <tr>
        <td class="header">No</td>
        <td class="header">Charges</td>
        <td class="header">Rate</td>
        <td class="header">UOM</td>
        <td class="header">Remarks</td>
      </tr>
      <tr>
        <td>1.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>2.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>3.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>4.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <span style="padding-left: 6px;">Terms and Conditions :</span>
  <ol style="margin-top: 2px; margin-bottom: 2px;">
    <li>Above rate exclude duties and taxes</li>
    <li>Above rate exclude cargo insurance</li>
    <li>Both shipper and consignee must provide valid related required documents for customs clearance</li>
    <li>Any discrepancy between CIPL and actual shipment will be burden to customer.</li>
    <li>Space is subject to space availability by the carrier.</li>
  </ol>
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
        <td class="auto-fit">For and behalf of <b>PT. xxxxx</b></td>
        <td><br><br><br><br></td>
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