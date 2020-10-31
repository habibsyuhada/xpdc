<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-10-31 06:22:37 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-10-31 06:22:54 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-10-31 06:39:32 --> Severity: error --> Exception: Too few arguments to function Shipment::shipment_cost_process(), 0 passed in C:\xampp\htdocs\xpdc\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\xpdc\application\controllers\Shipment.php 440
ERROR - 2020-10-31 18:42:30 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-10-31 18:42:51 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-10-31 18:42:57 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-10-31 18:45:45 --> Query error: Unknown column 'driver_pickup1' in 'where clause' - Invalid query: SELECT 
    SUM(IF(status = 'Booked', 1, 0)) as 'Booked', 
    SUM(IF(status = 'Booking Confirmed', 1, 0)) as 'Booking Confirmed', 
    SUM(IF(status = 'Picked up', 1, 0)) as 'Picked up', 
    SUM(IF(status = 'Pending Payment', 1, 0)) as 'Pending Payment', 
    SUM(IF(status = 'Service Center', 1, 0)) as 'Service Center', 
    SUM(IF(status = 'Departed', 1, 0)) as 'Departed', 
    SUM(IF(status = 'Arrived', 1, 0)) as 'Arrived', 
    SUM(IF(status = 'In Transit', 1, 0)) as 'In Transit', 
    SUM(IF(status = 'Returned', 1, 0)) as 'Returned', 
    SUM(IF(status = 'Clearance Event', 1, 0)) as 'Clearance Event', 
    SUM(IF(status = 'Clearance Complete', 1, 0)) as 'Clearance Complete', 
    SUM(IF(status = 'With Courier', 1, 0)) as 'With Courier', 
    SUM(IF(status = 'Delivered', 1, 0)) as 'Delivered', 
    SUM(IF(status = 'On Hold', 1, 0)) as 'On Hold', 
    SUM(IF(status = 'Cancelled', 1, 0)) as 'Cancelled' 
    FROM shipment WHERE status_delete = '1' AND (driver_pickup1 = 9 OR driver_deliver = 9)
ERROR - 2020-10-31 18:47:47 --> Query error: Unknown column 'status1' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `status_delete` = 1
AND `status1` LIKE '%Booking Confirmed%'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-10-31 18:50:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\xpdc\application\controllers\Driver.php 35
ERROR - 2020-10-31 18:50:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\xpdc\application\controllers\Driver.php 50
