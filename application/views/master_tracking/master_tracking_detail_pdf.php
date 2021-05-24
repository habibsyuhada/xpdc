<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin: 20px;
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

        .table {
            margin: 0;
            border-collapse: collapse;
            border: 0;
        }

        .table>tbody>tr>td {
            border-top: 0;
        }

        .table>tbody>tr>.br {
            border-right: 0;
        }

        .table>tbody>tr>.bl {
            border-left: 0;
        }

        .td-valign-top>tbody>tr>td {
            vertical-align: top;
        }
    </style>
</head>
<?php

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

<body>
    <table class="table" width="100%" border="1" cellspacing="0" cellpadding="6">
        <tbody>
            <tr>
                <td class="text-center">
                    <img src="<?php echo base_url(); ?>assets/img/logo-fix.png" width="150px"><br>
                </td>
                <?php if (isset($master_tracking)) : ?>
                    <td class="text-center">
                        <img height="100%" src="<?php echo site_url(); ?>home/barcode_generator/<?php echo $master_tracking ?>"><br>
                        <b style="margin-top: 5px;"><?php echo $master_tracking ?></b>
                    </td>
                <?php endif; ?>
                <td class="text-center" width="50%">
                    <h1><?php echo strtoupper('Master Tracking '); ?></h1>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="table" width="100%" border="1" cellspacing="0" cellpadding="6">
        <thead>
            <tr class="bg-info">
                <th class="text-white font-weight-bold">No.</th>
                <th class="text-white font-weight-bold">Tracking Number</th>
                <th class="text-white font-weight-bold">Shipment Type</th>
                <th class="text-white font-weight-bold">Type of Mode</th>
                <th class="text-white font-weight-bold">Shipper Name</th>
                <th class="text-white font-weight-bold">Receiver Name</th>
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
                    <td><?php echo $value['type_of_shipment'] ?></td>
                    <td><?php echo $value['type_of_mode'] ?></td>
                    <td><?php echo $value['shipper_name'] ?></td>
                    <td><?php echo $value['consignee_name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>