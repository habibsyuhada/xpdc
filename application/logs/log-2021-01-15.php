<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-15 10:09:27 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2021-01-15 10:09:40 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2021-01-15 10:10:40 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2021-01-15 10:12:39 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Driver.php 101
ERROR - 2021-01-15 10:12:39 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\controllers\Driver.php 109
ERROR - 2021-01-15 10:12:39 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 58
ERROR - 2021-01-15 10:12:39 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 61
ERROR - 2021-01-15 10:12:39 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 82
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 88
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 94
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 100
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 106
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 112
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 118
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 124
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 133
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 139
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 145
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 151
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 157
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 163
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 169
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 175
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 220
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 251
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 277
ERROR - 2021-01-15 10:12:40 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\driver\driver_update.php 308
ERROR - 2021-01-15 10:15:00 --> 404 Page Not Found: Quotation/favicon.ico
ERROR - 2021-01-15 11:21:05 --> 404 Page Not Found: Zone/favicon.ico
ERROR - 2021-01-15 11:23:02 --> Query error: Unknown column 'a.destination_country' in 'field list' - Invalid query: SELECT `a`.`id`, `c`.`name`, `a`.`zone_name`, `a`.`destination_country`, `a`.`category`, `a`.`created_by`, `a`.`created_date`, GROUP_CONCAT(b.country) as country
FROM `mst_zone` `a`
LEFT OUTER JOIN `mst_zone_detail` `b` ON `a`.`id` = `b`.`id_zone`
LEFT OUTER JOIN `branch` `c` ON `a`.`id_branch` = `c`.`id`
GROUP BY `a`.`id`, `c`.`name`, `a`.`zone_name`, `a`.`destination_country`, `a`.`category`, `a`.`created_by`, `a`.`created_date`
ERROR - 2021-01-15 11:48:10 --> Severity: error --> Exception: Call to undefined method Zone_mod::subzone_list_db() C:\xampp\htdocs\xpdc\application\controllers\Zone.php 154
ERROR - 2021-01-15 13:40:25 --> Severity: error --> Exception: Call to undefined method Zone_mod::subzone_list_db() C:\xampp\htdocs\xpdc\application\controllers\Zone.php 154
ERROR - 2021-01-15 15:31:14 --> Query error: Table 'eHxnBLJAYf.mst_subzone' doesn't exist - Invalid query: SELECT *
FROM `mst_subzone`
WHERE `id_zone` = '1'
ORDER BY `created_date` DESC
ERROR - 2021-01-15 15:31:22 --> Query error: Unknown column 'created_date' in 'order clause' - Invalid query: SELECT *
FROM `mst_sub_zone`
WHERE `id_zone` = '1'
ORDER BY `created_date` DESC
ERROR - 2021-01-15 15:31:51 --> Query error: Unknown column 'created_date' in 'order clause' - Invalid query: SELECT *
FROM `mst_sub_zone`
WHERE `id_zone` = '1'
ORDER BY `created_date` DESC
ERROR - 2021-01-15 16:15:12 --> 404 Page Not Found: Zone/favicon.ico
ERROR - 2021-01-15 16:16:12 --> 404 Page Not Found: Zone/favicon.ico
ERROR - 2021-01-15 16:16:33 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2021-01-15 16:19:35 --> Severity: Notice --> Undefined variable: zone_list C:\xampp\htdocs\xpdc\application\views\zone\subzone_list.php 21
ERROR - 2021-01-15 16:19:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\zone\subzone_list.php 21
ERROR - 2021-01-15 16:19:37 --> Severity: Notice --> Undefined variable: zone_list C:\xampp\htdocs\xpdc\application\views\zone\subzone_list.php 21
ERROR - 2021-01-15 16:19:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\zone\subzone_list.php 21
