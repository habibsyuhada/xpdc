<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Report-".date('YmdHis').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?>
<table border="1" style="">
  <thead>
    <tr>
      <th>Tracking No</th>
      <th>Shipment Date</th>
      <th>Shipper Name</th>
      <th>Shipper Address</th>
      <th>Consignee Name</th>
      <th>Consignee Address</th>
      <th>Status</th>
      <th>Main Agent Name</th>
      <th>Total Cost Main Agent</th>
      <th>Secondary Agent Name</th>
      <th>Total Cost Secondary Agent</th>
      <th>Invoice No</th>
      <th>Invoice Date</th>
      <th>Payment Terms</th>
      <th>Vat</th>
      <th>Discount</th>
      <th>Total Bill</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($shipment_list as $key => $shipment): ?>
    <tr>
      <td><?php echo $shipment['tracking_no'] ?></td>
      <td><?php echo $shipment['created_date'] ?></td>
      <td><?php echo $shipment['shipper_name'] ?></td>
      <td><?php echo $shipment['shipper_address'] ?></td>
      <td><?php echo $shipment['consignee_name'] ?></td>
      <td><?php echo $shipment['consignee_address'] ?></td>
      <td><?php echo $shipment['status'] ?></td>
      <td><?php echo $shipment['main_agent_name'] ?></td>
      <td><?php echo number_format(@$total[$shipment['id']]['main-agent'], 0).".00" ?></td>
      <td><?php echo $shipment['secondary_agent_name'] ?></td>
      <td><?php echo number_format(@$total[$shipment['id']]['secondary-agent'], 0).".00" ?></td>
      <td><?php echo @$invoice[$shipment['id']]['invoice_no'] ?></td>
      <td><?php echo @$invoice[$shipment['id']]['invoice_date'] ?></td>
      <td><?php echo @$invoice[$shipment['id']]['payment_terms'] ?></td>
      <td><?php echo @$invoice[$shipment['id']]['vat'] ?></td>
      <td><?php echo @$invoice[$shipment['id']]['discount'] ?></td>
      <td><?php echo number_format(@$total[$shipment['id']]['costumer'], 0).".00" ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>