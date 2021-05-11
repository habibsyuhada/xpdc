<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Report-" . date('YmdHis') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

$role = $this->session->userdata('role');
$page_permission = array(
    0 => (in_array($role, array("Super Admin", "Driver")) ? 1 : 0), //Driver
    1 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //Update
    2 => (in_array($role, array("Super Admin", "Operator", "Finance")) ? 1 : 0), //Print Waybill & DO
    3 => (in_array($role, array("Super Admin")) ? 1 : 0), //Delete
    4 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //master_tracking
    5 => (in_array($role, array("Super Admin", "Operator")) ? 1 : 0), //assign_driver
    6 => (in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //shipment cost
    7 => (in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //alert for hipment that not costed
    8 => (in_array($role, array("Super Admin", "Commercial", "Operator", "Finance")) ? 1 : 0), //Print receipt
    9 => (in_array($role, array("Super Admin")) ? 1 : 0), //show who created
    10 => (in_array($role, array("Super Admin", "Driver", "Operator", "Finance")) ? 1 : 0), //show master tracking column
    11 => (in_array($role, array("Super Admin", "Customer", "Operator", "Finance")) ? 1 : 0), //Print label
    12 => (in_array($role, array("Customer")) ? 1 : 0),
    13 => (in_array($role, array("Super Admin", "Finance")) ? 1 : 0), //Bulk Paid
);
?>
<table border="1" style="">
    <thead>
        <tr class="bg-info">
            <th class="text-white font-weight-bold">No.</th>
            <th class="text-white font-weight-bold">Tracking Number</th>
            <?php if ($page_permission[10] == 1) : ?>
                <th class="text-white font-weight-bold">Master Tracking Number</th>
            <?php endif; ?>
            <th class="text-white font-weight-bold">Shipment Type</th>
            <th class="text-white font-weight-bold">Type of Mode</th>
            <th class="text-white font-weight-bold">Shipper Name</th>
            <th class="text-white font-weight-bold">Receiver Name</th>
            <?php if ($page_permission[9] == 1) : ?>
                <th class="text-white font-weight-bold">Created by</th>
            <?php endif; ?>
            <th class="text-white font-weight-bold">Status</th>
            <?php if ($page_permission[6] == 1 || $page_permission[12] == 1) : ?>
                <th class="text-white font-weight-bold">Status Finance</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($shipment_list as $key => $value) : ?>
            <tr class="<?php echo ((($value['main_agent_name'] != "" && $value['main_agent_invoice'] == "") || ($value['secondary_agent_name'] != "" && $value['secondary_agent_invoice'] == "")) && $value['status'] == "Delivered" && $page_permission[7] == 1 ? "alert-warning" : "") ?>">
                <td><?= $no++; ?></td>
                <td nowrap>
                    <b><?php echo $value['tracking_no'] ?></b>
                </td>
                <?php if ($page_permission[10] == 1) : ?>
                    <td><?php echo $value['master_tracking'] ?></td>
                <?php endif; ?>
                <td><?php echo $value['type_of_shipment'] ?></td>
                <td><?php echo $value['type_of_mode'] ?></td>
                <td><?php echo $value['shipper_name'] ?></td>
                <td><?php echo $value['consignee_name'] ?></td>
                <?php if ($page_permission[9] == 1) : ?>
                    <td><?php echo @$created_by_list[$value['created_by']] ?></td>
                <?php endif; ?>
                <td><b><?php echo $value['status'] ?></b></td>
                <?php if ($page_permission[6] == 1 || $page_permission[12] == 1) : ?>
                    <td>
                        <?php if ($value['status_bill'] == 1) : ?>
                            Billed
                        <?php elseif ($value['status_bill'] == 2) : ?>
                            Paid
                        <?php else : ?>
                            Unbilled
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>