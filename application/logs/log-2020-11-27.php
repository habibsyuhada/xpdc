<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-27 04:44:24 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'ehxnbljayf' C:\xampp\htdocs\xpdc\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-27 04:44:24 --> Unable to connect to the database
ERROR - 2020-11-27 04:46:31 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-11-27 04:46:42 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-27 04:47:22 --> 404 Page Not Found: User/favicon.ico
ERROR - 2020-11-27 04:56:02 --> 404 Page Not Found: Commercial/customer_list
ERROR - 2020-11-27 04:59:12 --> 404 Page Not Found: Commercial/favicon.ico
ERROR - 2020-11-27 04:59:28 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-11-27 04:59:30 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-11-27 05:00:01 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-27 05:00:06 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-11-27 05:00:14 --> 404 Page Not Found: Branch/favicon.ico
ERROR - 2020-11-27 05:00:34 --> 404 Page Not Found: Master_tracking/favicon.ico
ERROR - 2020-11-27 05:10:14 --> Severity: Notice --> Undefined variable: master_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_list.php 23
ERROR - 2020-11-27 05:10:14 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_list.php 23
ERROR - 2020-11-27 05:15:31 --> 404 Page Not Found: Commercial/favicon.ico
ERROR - 2020-11-27 05:15:40 --> 404 Page Not Found: User/favicon.ico
ERROR - 2020-11-27 05:16:31 --> Severity: Notice --> Undefined variable: branch_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_create.php 35
ERROR - 2020-11-27 05:16:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_create.php 35
ERROR - 2020-11-27 05:20:11 --> 404 Page Not Found: Commercial/create_customer
ERROR - 2020-11-27 05:29:52 --> 404 Page Not Found: Customer/customer_create_process
ERROR - 2020-11-27 05:36:29 --> Severity: Warning --> mysqli::real_connect(): (HY000/1135): Can't create a new thread (errno 11); if you are not out of available memory, you can consult the manual for a possible OS-dependent bug C:\xampp\htdocs\xpdc\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-27 05:36:29 --> Unable to connect to the database
ERROR - 2020-11-27 05:36:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/1135): Can't create a new thread (errno 11); if you are not out of available memory, you can consult the manual for a possible OS-dependent bug C:\xampp\htdocs\xpdc\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-27 05:36:32 --> Unable to connect to the database
ERROR - 2020-11-27 05:36:47 --> Query error: Unknown column 'customer.status_deletes' in 'where clause' - Invalid query: SELECT *
FROM `user`
LEFT OUTER JOIN `customer` ON `user`.`id` = `customer`.`customer_id`
WHERE `customer`.`status_deletes` = 1
AND `user`.`role` = 'Customer'
ORDER BY `user`.`id` DESC
ERROR - 2020-11-27 06:45:36 --> Severity: error --> Exception: Call to undefined method Commercial_mod::customer_update_process_db() C:\xampp\htdocs\xpdc\application\controllers\Commercial.php 95
ERROR - 2020-11-27 06:45:45 --> Query error: Unknown column 'password' in 'field list' - Invalid query: UPDATE `customer` SET `password` = '202cb962ac59075b964b07152d234b70'
WHERE `id` = '19'
ERROR - 2020-11-27 06:46:02 --> 404 Page Not Found: Commercial/customer_update
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 3
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 3
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 13
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 13
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 17
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 17
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 23
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 23
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 24
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 24
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 25
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 25
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 26
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 26
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:49:01 --> Severity: Notice --> Undefined variable: branch_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 34
ERROR - 2020-11-27 06:49:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 34
ERROR - 2020-11-27 06:49:13 --> Query error: Table 'eHxnBLJAYf.customers' doesn't exist - Invalid query: SELECT *
FROM `user`
LEFT OUTER JOIN `customers` ON `user`.`id` = `customer`.`customer_id`
WHERE `customer`.`status_delete` = 1
AND `user`.`role` = 'Customer'
ORDER BY `user`.`id` DESC
ERROR - 2020-11-27 06:49:54 --> Query error: Table 'eHxnBLJAYf.customers' doesn't exist - Invalid query: SELECT *
FROM `user`
LEFT OUTER JOIN `customers` ON `user`.`id` = `customer`.`customer_id`
WHERE `customer`.`status_delete` = 1
AND `user`.`role` = 'Customer'
ORDER BY `user`.`id` DESC
ERROR - 2020-11-27 06:51:33 --> Severity: Notice --> Undefined index: customer_id C:\xampp\htdocs\xpdc\application\views\commercial\customer_list.php 40
ERROR - 2020-11-27 06:51:33 --> Severity: Notice --> Undefined index: customer_id C:\xampp\htdocs\xpdc\application\views\commercial\customer_list.php 41
ERROR - 2020-11-27 06:51:33 --> Severity: Notice --> Undefined index: customer_id C:\xampp\htdocs\xpdc\application\views\commercial\customer_list.php 42
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 3
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 3
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 13
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 13
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 17
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 17
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 23
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 23
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 24
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 24
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 25
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 25
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 26
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 26
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: user_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:51:53 --> Severity: Notice --> Undefined variable: branch_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 34
ERROR - 2020-11-27 06:51:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 34
ERROR - 2020-11-27 06:52:26 --> Severity: Notice --> Undefined variable: branch_list C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 34
ERROR - 2020-11-27 06:52:26 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 34
ERROR - 2020-11-27 06:53:13 --> Severity: Notice --> Undefined variable: country C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:53:13 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:53:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:53:41 --> Severity: Notice --> Undefined variable: country C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:53:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:53:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:54:56 --> Severity: Notice --> Undefined variable: country C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:54:56 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 06:54:56 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\commercial\customer_update.php 33
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:26 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:27 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
ERROR - 2020-11-27 07:19:28 --> Severity: Notice --> Undefined offset: 8 C:\xampp\htdocs\xpdc\application\views\shipment\shipment_list.php 214
