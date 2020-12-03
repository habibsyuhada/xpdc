<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-12-02 09:28:30 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-12-02 09:28:35 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-12-02 09:28:43 --> 404 Page Not Found: Master_tracking/favicon.ico
ERROR - 2020-12-02 09:29:07 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Shipment.php 916
ERROR - 2020-12-02 09:29:28 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-12-02 09:48:15 --> Query error: Unknown column 'status_driverpickup' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `status_delete` = 1
AND (`assign_branch` LIKE '%BATAM%' OR `branch` LIKE '%BATAM%')
AND (`driver_pickup` = 10 OR `driver_deliver` = 10)
AND (`status_driverpickup` = 1)
AND `status_delete` = '1'
ORDER BY `assign_driver_date` DESC
