<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<<<<<<< Updated upstream
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
ERROR - 2020-10-31 19:35:19 --> Severity: Notice --> Undefined variable: master_list C:\xampp\htdocs\xpdc\application\views\user\user_list.php 23
ERROR - 2020-10-31 19:35:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\user\user_list.php 23
ERROR - 2020-10-31 19:35:20 --> 404 Page Not Found: User/favicon.ico
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:35:39 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 26
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: remarks C:\xampp\htdocs\xpdc\application\views\user\user_list.php 28
ERROR - 2020-10-31 19:35:40 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:37:00 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\user\user_list.php 30
ERROR - 2020-10-31 19:47:00 --> Severity: Notice --> Undefined index: email C:\xampp\htdocs\xpdc\application\controllers\User.php 51
ERROR - 2020-10-31 19:47:00 --> Query error: Column 'email' cannot be null - Invalid query: INSERT INTO `user` (`name`, `email`, `password`, `role`, `branch`) VALUES ('habibsumedang@gmail.com', NULL, '889bafb8da42610a062c16b93cfaec86', 'Super Admin', 'NONE')
ERROR - 2020-10-31 19:50:31 --> Severity: error --> Exception: Call to undefined method User_mod::user_list() C:\xampp\htdocs\xpdc\application\controllers\User.php 34
ERROR - 2020-10-31 19:58:31 --> Severity: error --> Exception: Call to undefined method User_mod::user_update_process_db() C:\xampp\htdocs\xpdc\application\controllers\User.php 94
ERROR - 2020-10-31 19:59:07 --> Severity: error --> Exception: Call to undefined method User_mod::user_update_process_db() C:\xampp\htdocs\xpdc\application\controllers\User.php 94
ERROR - 2020-10-31 19:59:23 --> Severity: error --> Exception: Too few arguments to function User::user_update(), 0 passed in C:\xampp\htdocs\xpdc\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\xpdc\application\controllers\User.php 70
ERROR - 2020-10-31 20:09:30 --> Severity: error --> Exception: syntax error, unexpected end of file C:\xampp\htdocs\xpdc\application\views\_partial\top.php 138
=======
ERROR - 2020-10-31 08:18:50 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-10-31 08:19:04 --> Severity: Notice --> Undefined variable: where C:\xampp\htdocs\xpdc\application\controllers\Home.php 72
ERROR - 2020-10-31 08:25:13 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-10-31 09:23:14 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-10-31 09:23:18 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-10-31 09:48:15 --> Query error: Unknown column 'Status_driver' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `status_delete` = 1
AND `Status_driver` LIKE '%pickup%'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-10-31 09:48:23 --> Query error: Unknown column 'Status_driver' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `status_delete` = 1
AND `Status_driver` LIKE '%pickup%'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-10-31 09:49:48 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-10-31 09:53:03 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 09:53:31 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 09:55:39 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 09:56:05 --> 404 Page Not Found: Template/plugins
ERROR - 2020-10-31 09:56:06 --> 404 Page Not Found: Template/plugins
ERROR - 2020-10-31 09:58:08 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Shipment.php 88
ERROR - 2020-10-31 09:58:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 200
ERROR - 2020-10-31 09:58:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 268
ERROR - 2020-10-31 09:58:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\xpdc\application\controllers\Driver.php 35
ERROR - 2020-10-31 09:58:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\xpdc\application\controllers\Driver.php 50
ERROR - 2020-10-31 09:58:20 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 72
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 75
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 78
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 81
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 84
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 87
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 90
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 93
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 96
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 99
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 102
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 105
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 108
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 111
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 114
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 117
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 72
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 75
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 78
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 81
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 84
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 87
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 90
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 93
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 96
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 99
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 102
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 105
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 108
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 111
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: hide_pickup C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 114
ERROR - 2020-10-31 10:00:56 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 117
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 75
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 81
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 87
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 93
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 99
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 105
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 111
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 117
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 75
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 81
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 87
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 93
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 99
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 105
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 111
ERROR - 2020-10-31 10:01:18 --> Severity: Notice --> Undefined variable: data_input C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 117
ERROR - 2020-10-31 10:01:27 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 10:01:48 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
ERROR - 2020-10-31 10:02:42 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 99
>>>>>>> Stashed changes
