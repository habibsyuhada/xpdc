<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-13 08:26:45 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-11-13 08:47:21 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-13 08:48:06 --> 404 Page Not Found: User/favicon.ico
ERROR - 2020-11-13 08:51:23 --> Query error: Unknown column 'created_date' in 'order clause' - Invalid query: SELECT *
FROM `branch`
ORDER BY `created_date` DESC
ERROR - 2020-11-13 08:54:50 --> 404 Page Not Found: Branch/favicon.ico
ERROR - 2020-11-13 09:03:45 --> Severity: Notice --> Undefined index: code C:\xampp\htdocs\xpdc\application\controllers\Branch.php 50
ERROR - 2020-11-13 09:03:45 --> Severity: Notice --> Undefined index: code C:\xampp\htdocs\xpdc\application\controllers\Branch.php 59
ERROR - 2020-11-13 09:03:45 --> Query error: Column 'code' cannot be null - Invalid query: INSERT INTO `branch` (`name`, `code`, `address`) VALUES ('JAKARTA', NULL, '-')
ERROR - 2020-11-13 09:04:18 --> 404 Page Not Found: Master_tracking/favicon.ico
ERROR - 2020-11-13 09:08:15 --> Severity: Notice --> Undefined index: role C:\xampp\htdocs\xpdc\application\controllers\Branch.php 87
ERROR - 2020-11-13 09:08:15 --> Severity: Notice --> Undefined index: branch C:\xampp\htdocs\xpdc\application\controllers\Branch.php 88
ERROR - 2020-11-13 09:08:15 --> Query error: Unknown column 'role' in 'field list' - Invalid query: UPDATE `branch` SET `name` = 'JAKARTA', `role` = NULL, `branch` = NULL
WHERE `id` = '2'
ERROR - 2020-11-13 09:13:50 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-11-13 10:36:39 --> Severity: error --> Exception: Call to undefined method Shipment_mod::branch_list() C:\xampp\htdocs\xpdc\application\controllers\Shipment.php 635
ERROR - 2020-11-13 10:36:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC, '-' DESC, 1) DESC, '/' DESC, 1) DESC
 LIMIT 1' at line 5 - Invalid query: SELECT LEFT(invoice_no, 4) AS invoice_no
FROM `shipment_invoice`
WHERE YEAR(created_date) = '2020'
AND SUBSTRING_INDEX(SUBSTRING_INDEX(invoice_no,'-',1), '/', -1) = 'BTH'
ORDER BY SUBSTRING_INDEX(SUBSTRING_INDEX(invoice_no DESC, '-' DESC, 1) DESC, '/' DESC, 1) DESC
 LIMIT 1
ERROR - 2020-11-13 10:37:40 --> Query error: Unknown column 'created_date' in 'where clause' - Invalid query: SELECT LEFT(invoice_no, 4) AS invoice_no
FROM `shipment_invoice`
WHERE YEAR(created_date) = '2020'
AND SUBSTRING_INDEX(SUBSTRING_INDEX(invoice_no,'-',1), '/', -1) = 'BTH'
ORDER BY `invoice_no` DESC
 LIMIT 1
ERROR - 2020-11-13 10:38:31 --> Query error: Unknown column 'create_date' in 'where clause' - Invalid query: UPDATE `shipment_detail` SET `status_bill` = 1
WHERE YEAR(create_date) = '2020'
AND SUBSTRING_INDEX(SUBSTRING_INDEX(invoice_no,'-',1), '/', -1) = 'BTH'
AND `id_shipment` = '388'
ERROR - 2020-11-13 10:40:22 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Shipment.php 637
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 19
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: tracking_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 20
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 21
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 28
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: main_agent_name C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 54
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: main_agent_mawb_mbl C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 58
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: main_agent_carrier C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 62
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: main_agent_voyage_flight_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 66
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: secondary_agent_name C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 81
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: secondary_agent_mawb_mbl C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 85
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: secondary_agent_carrier C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 89
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: secondary_agent_voyage_flight_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 93
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: port_of_loading C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 107
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: port_of_discharge C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 111
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: container_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 115
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: seal_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 121
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: cipl_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 125
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: permit_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 129
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: assign_branch C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 173
ERROR - 2020-11-13 10:43:09 --> Severity: Notice --> Undefined index: assign_branch C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 174
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 19
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: tracking_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 20
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 21
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: master_tracking C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 28
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: main_agent_name C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 54
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: main_agent_mawb_mbl C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 58
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: main_agent_carrier C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 62
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: main_agent_voyage_flight_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 66
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: secondary_agent_name C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 81
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: secondary_agent_mawb_mbl C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 85
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: secondary_agent_carrier C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 89
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: secondary_agent_voyage_flight_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 93
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: port_of_loading C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 107
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: port_of_discharge C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 111
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: container_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 115
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: seal_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 121
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: cipl_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 125
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: permit_no C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 129
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: assign_branch C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 173
ERROR - 2020-11-13 10:43:22 --> Severity: Notice --> Undefined index: assign_branch C:\xampp\htdocs\xpdc\application\views\master_tracking\master_tracking_update.php 174
ERROR - 2020-11-13 11:03:51 --> Severity: Compile Error --> Cannot use isset() on the result of an expression (you can use "null !== expression" instead) C:\xampp\htdocs\xpdc\application\views\shipment\shipment_bill.php 55
ERROR - 2020-11-13 13:31:54 --> Severity: Notice --> Undefined variable: datadb C:\xampp\htdocs\xpdc\application\controllers\User.php 87
ERROR - 2020-11-13 13:31:54 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\controllers\User.php 87
ERROR - 2020-11-13 14:14:21 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-13 14:14:31 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-11-13 14:15:19 --> 404 Page Not Found: User/favicon.ico
ERROR - 2020-11-13 14:19:11 --> Severity: Notice --> Undefined variable: branch_list C:\xampp\htdocs\xpdc\application\views\shipment\shipment_assign.php 68
ERROR - 2020-11-13 14:19:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\shipment\shipment_assign.php 68
ERROR - 2020-11-13 16:24:10 --> Severity: error --> Exception: syntax error, unexpected 'l' (T_STRING), expecting ',' or ';' C:\xampp\htdocs\xpdc\application\views\shipment\shipment_cost.php 480
ERROR - 2020-11-13 16:24:46 --> Severity: error --> Exception: syntax error, unexpected 'l' (T_STRING), expecting ',' or ';' C:\xampp\htdocs\xpdc\application\views\shipment\shipment_cost.php 480
