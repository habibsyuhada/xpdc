<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin: 10px;
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

        p {
            margin: 0px;
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

<body>
    <table class="table" width="100%" style="outline: 1px solid black;" cellspacing="0" cellpadding="6">
        <tbody>
            <tr>
                <td class="text-center">
                    <img src="<?php echo base_url(); ?>assets/img/logo-fix.png" width="150px"><br>
                </td>
                <td class="text-left" width="50%">
                    <p><b>PT. XENA PRANADIPA DHIA CAKRA</b></p>
                    <p>Warna Jaya Business Park Blok B2-07</p>
                    <p>Jl. Jendral Sudirman - Batam 29413</p>
                    <p>Phone : 0778 4089 918</p>
                    <p>website : www.xpdcid.com</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table" width="100%" border="0" cellspacing="0" cellpadding="4" style="outline: 1px solid black;">
        <tbody>
            <tr>
                <td class="text-center" style="border: 1px solid;" colspan="3">
                    <h2><b>DELIVERY ORDER</b></h2>
                </td>
            </tr>
            <tr>
                <td style="width: 25%">Tracking No.</td>
                <td style="width: 4%">:</td>
                <td><?= $shipment['tracking_no'] ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td><?= date("d/M/Y", strtotime($shipment['created_date'])) ?></td>
            </tr>
            <tr>
                <td>Type of Shipment</td>
                <td>:</td>
                <td><?= $shipment['type_of_shipment'] ?></td>
            </tr>
            <tr>
                <td>Type of Mode</td>
                <td>:</td>
                <td><?= $shipment['type_of_mode'] ?></td>
            </tr>
            <tr>
                <td>Incoterms</td>
                <td>:</td>
                <td><?= $shipment['incoterms'] ?></td>
            </tr>
            <tr>
                <td>Reference No.</td>
                <td>:</td>
                <td><?= $shipment['ref_no'] ?></td>
            </tr>
        </tbody>
    </table>
    <table class="table" width="100%" border="1" cellspacing="0" cellpadding="4" style="outline: 1px solid black;">
        <tbody>
            <tr>
                <td class="text-left">
                    <b>Shipper</b>
                </td>
                <td>
                    <b>Consignee</b>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <b><?= $shipment['shipper_name'] ?></b><br>
                    <?= $shipment['shipper_address'] ?><br>
                    <?= $shipment['shipper_city'] ?><br>
                    <?= $shipment['shipper_country'] ?><br>
                    <?= $shipment['shipper_postcode'] ?><br>
                    <?= $shipment['shipper_contact_person'] ?><br>
                    <?= $shipment['shipper_phone_number'] ?><br>
                    <?= $shipment['shipper_email'] ?><br>
                </td>
                <td>
                    <b><?= $shipment['consignee_name'] ?></b><br>
                    <?= $shipment['consignee_address'] ?><br>
                    <?= $shipment['consignee_city'] ?><br>
                    <?= $shipment['consignee_country'] ?><br>
                    <?= $shipment['consignee_postcode'] ?><br>
                    <?= $shipment['consignee_contact_person'] ?><br>
                    <?= $shipment['consignee_phone_number'] ?><br>
                    <?= $shipment['consignee_email'] ?><br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                    $total_act_weight   = 0;
                    $total_packages     = 0;
                    $total_measurement  = 0;
                    $per = 5000;
                    if ($shipment['type_of_mode'] == 'Air Freight') {
                        $per = 6000;
                    } elseif ($shipment['type_of_mode'] == 'Land Shipping') {
                        $per = 4000;
                    }
                    foreach ($packages as $key => $value) {
                        $actual_weight = $value['qty'] * $value['weight'];
                        $measurement = $value['qty'] * ($value['length'] * $value['width'] * $value['height']) / 1000000;

                        $total_act_weight += $actual_weight;
                        $total_packages += $value['qty'];
                        $total_measurement += $measurement;
                    }
                    ?>
                    <p class="text-center"><b>Shipment Information</b></p>
                    Description of goods &nbsp;&nbsp;&nbsp; : <?= $shipment['description_of_goods'] ?><br>
                    Total Packages &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $total_packages ?><br>
                    Actual Weight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $actual_weight ?><br>
                    Measurement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $measurement ?><br><br>
                    <table class="table" width="100%" border="1" cellspacing="0" cellpadding="4">
                        <tr>
                            <th>Quantity</th>
                            <th>Package Type</th>
                            <th>Length</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Weight</th>
                        </tr>
                        <?php foreach ($packages as $key => $value) : ?>
                            <tr>
                                <td><?= $value['qty'] ?></td>
                                <td><?= $value['piece_type'] ?></td>
                                <td><?= $value['length'] ?></td>
                                <td><?= $value['width'] ?></td>
                                <td><?= $value['height'] ?></td>
                                <td><?= $value['weight'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">Notes: <br><br><br><br><br></td>
            </tr>
            <tr>
                <td>
                <br><br><br>
                <b>Driver</b><br><br><br><br><br>
                <?=(isset($driver['name'])) ? $driver['name'] : 'Driver not assigned'; ?>
                </td>
                <td>
                    Hereby agreed that goods described herein are accepted in<br>
                    apparent good order and condition (except as noted) as carriage<br>
                    <?= $shipment['consignee_city'] ?>, <?=date('d M Y')?><br>
                    <b>Consignee</b><br><br><br><br><br>
                    <?=$shipment['consignee_contact_person']?>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>