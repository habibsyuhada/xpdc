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
            font-size: 12px;
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
    <?php
    $packages = [];
    $total_qty = 0;
    $total_actual_weight = 0;
    foreach ($packages_list as $key => $value) {
        $packages[$value['id_shipment']] = ['qty' => $value['qty'], 'actual_weight' => $value['actual_weight']];
        $total_qty += $value['qty'];
        $total_actual_weight += $value['actual_weight'];
    }
    ?>
    <br>
    <table class="table table-borderless" style="width: 100%">
        <tr>
            <td>
                <h3>Main Agent</h3>
            </td>
            <td></td>
            <td>
                <h3>Shipper Information Detail</h3>
            </td>
        </tr>
        <tr>
            <td style="width: 45%">
                <table class="table table-borderless" style="width: 100%">
                    <tr>
                        <td>Agent Name</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['main_agent_name'] ?></td>
                    </tr>
                    <tr>
                        <td>MAWB / MBL</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['main_agent_mawb_mbl'] ?></td>
                    </tr>
                    <tr>
                        <td>Carrier</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['main_agent_carrier'] ?></td>
                    </tr>
                    <tr>
                        <td>Voyage/Flight No.</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['main_agent_voyage_flight_no'] ?></td>
                    </tr>
                    <tr>
                        <td>Voyage/Flight Date</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['main_agent_voyage_flight_date'] ?></td>
                    </tr>
                    <tr>
                        <td>Port of Loading</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['main_agent_port_of_loading'] ?></td>
                    </tr>
                    <tr>
                        <td>Port of Discharge</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['main_agent_port_of_discharge'] ?></td>
                    </tr>
                </table>
            </td>
            <td style="width: 10%"></td>
            <td style="width: 45%; vertical-align: text-top;" >
                <table class="table table-borderless" style="width: 100%">
                    <tr>
                        <td>Container No</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['container_no'] ?></td>
                    </tr>
                    <tr>
                        <td>Seal No.</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['seal_no'] ?></td>
                    </tr>
                    <tr>
                        <td>CIPL No.</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['cipl_no'] ?></td>
                    </tr>
                    <tr>
                        <td>Permit No.</td>
                        <td>:</td>
                        <td><?= $shipment_list[0]['permit_no'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="table" width="100%" border="1" cellspacing="0" cellpadding="6">
        <thead>
            <tr class="bg-info">
                <th class="text-white font-weight-bold">No.</th>
                <th class="text-white font-weight-bold">Tracking Number</th>
                <th class="text-white font-weight-bold">Shipper Name</th>
                <th class="text-white font-weight-bold">Receiver Name</th>
                <th class="text-white font-weight-bold">Description of Goods</th>
                <th class="text-white font-weight-bold">Quantity</th>
                <th class="text-white font-weight-bold">Actual Weight</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($shipment_list as $key => $value) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td nowrap>
                        <b><?php echo $value['tracking_no'] ?></b>
                    </td>
                    <td><?php echo $value['shipper_name'] ?></td>
                    <td><?php echo $value['consignee_name'] ?></td>
                    <td><?php echo $value['description_of_goods'] ?></td>
                    <td><?= number_format($packages[$value['id']]['qty']) ?></td>
                    <td><?= number_format($packages[$value['id']]['actual_weight'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td style="border: 0px;" colspan="4"></td>
                <td><b>TOTAL</b></td>
                <td><b><?= number_format($total_qty) ?></b></td>
                <td><b><?= number_format($total_actual_weight, 2) ?></b></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="table table-borderless" style="width: 100%">
        <tr>
            <td class="text-center" style="width: 33%">Pengirim</td>
            <td class="text-center" style="width: 33%">Driver/Agent</td>
            <td class="text-center" style="width: 33%">Penerima</td>
        </tr>
        <tr>
            <td style="height: 90px;"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>