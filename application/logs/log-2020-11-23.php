<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<<<<<<< HEAD
ERROR - 2020-11-23 08:26:06 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-11-23 08:26:14 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-23 08:26:21 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-11-23 08:41:10 --> 404 Page Not Found: Report/favicon.ico
ERROR - 2020-11-23 13:07:31 --> Query error: Unknown column 'create_date' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `create_date` >= '2020-10-01'
AND `create_date` <= '2020-10-31'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:31 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:32 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_no C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 42
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: invoice_date C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 43
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: payment_terms C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 44
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: vat C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 45
ERROR - 2020-11-23 13:08:33 --> Severity: Notice --> Undefined index: discount C:\xampp\htdocs\xpdc\application\views\report\summary_report_excel.php 46
ERROR - 2020-11-23 13:18:57 --> Query error: Table 'ehxnbljayf.shipment_detail' doesn't exist - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `created_date` >= '2020-10-01'
AND `created_date` <= '2020-10-31'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-11-23 13:19:01 --> Query error: Table 'ehxnbljayf.shipment_detail' doesn't exist - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `created_date` >= '2020-10-01'
AND `created_date` <= '2020-10-31'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-11-23 14:35:06 --> Query error: Unknown column 'status_bill' in 'field list' - Invalid query: SELECT 
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
    SUM(IF(status = 'Cancelled', 1, 0)) as 'Cancelled',
    SUM(IF(status_driver_pickup = '1' AND driver_pickup = '1', 1, 0)) as 'Outstanding Pickup',
    SUM(IF(status_driver_pickup = '2' AND driver_pickup = '1', 1, 0)) as 'Done Pickup',
    SUM(IF(status_driver_deliver = '1' AND driver_deliver = '1', 1, 0)) as 'Outstanding Deliver',
    SUM(IF(status_driver_deliver = '2' AND driver_deliver = '1', 1, 0)) as 'Done Deliver',
    SUM(IF(status_bill = '0', 1, 0)) as 'Unbilled',
    SUM(IF(status_bill = '1', 1, 0)) as 'Billed',
    SUM(IF(status_bill = '2', 1, 0)) as 'Paid'
    FROM shipment WHERE status_delete = '1'
ERROR - 2020-11-23 14:35:09 --> Query error: Unknown column 'status_bill' in 'field list' - Invalid query: SELECT 
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
    SUM(IF(status = 'Cancelled', 1, 0)) as 'Cancelled',
    SUM(IF(status_driver_pickup = '1' AND driver_pickup = '1', 1, 0)) as 'Outstanding Pickup',
    SUM(IF(status_driver_pickup = '2' AND driver_pickup = '1', 1, 0)) as 'Done Pickup',
    SUM(IF(status_driver_deliver = '1' AND driver_deliver = '1', 1, 0)) as 'Outstanding Deliver',
    SUM(IF(status_driver_deliver = '2' AND driver_deliver = '1', 1, 0)) as 'Done Deliver',
    SUM(IF(status_bill = '0', 1, 0)) as 'Unbilled',
    SUM(IF(status_bill = '1', 1, 0)) as 'Billed',
    SUM(IF(status_bill = '2', 1, 0)) as 'Paid'
    FROM shipment WHERE status_delete = '1'
ERROR - 2020-11-23 14:38:32 --> Query error: Unknown column 'shipment.id_shipment' in 'on clause' - Invalid query: SELECT 
    SUM(IF(shipment.status = 'Booked', 1, 0)) as 'Booked', 
    SUM(IF(shipment.status = 'Booking Confirmed', 1, 0)) as 'Booking Confirmed', 
    SUM(IF(shipment.status = 'Picked up', 1, 0)) as 'Picked up', 
    SUM(IF(shipment.status = 'Pending Payment', 1, 0)) as 'Pending Payment', 
    SUM(IF(shipment.status = 'Service Center', 1, 0)) as 'Service Center', 
    SUM(IF(shipment.status = 'Departed', 1, 0)) as 'Departed', 
    SUM(IF(shipment.status = 'Arrived', 1, 0)) as 'Arrived', 
    SUM(IF(shipment.status = 'In Transit', 1, 0)) as 'In Transit', 
    SUM(IF(shipment.status = 'Returned', 1, 0)) as 'Returned', 
    SUM(IF(shipment.status = 'Clearance Event', 1, 0)) as 'Clearance Event', 
    SUM(IF(shipment.status = 'Clearance Complete', 1, 0)) as 'Clearance Complete', 
    SUM(IF(shipment.status = 'With Courier', 1, 0)) as 'With Courier', 
    SUM(IF(shipment.status = 'Delivered', 1, 0)) as 'Delivered', 
    SUM(IF(shipment.status = 'On Hold', 1, 0)) as 'On Hold', 
    SUM(IF(shipment.status = 'Cancelled', 1, 0)) as 'Cancelled',
    SUM(IF(shipment.status_driver_pickup = '1' AND shipment.driver_pickup = '1', 1, 0)) as 'Outstanding Pickup',
    SUM(IF(shipment.status_driver_pickup = '2' AND shipment.driver_pickup = '1', 1, 0)) as 'Done Pickup',
    SUM(IF(shipment.status_driver_deliver = '1' AND shipment.driver_deliver = '1', 1, 0)) as 'Outstanding Deliver',
    SUM(IF(shipment.status_driver_deliver = '2' AND shipment.driver_deliver = '1', 1, 0)) as 'Done Deliver',
    SUM(IF(shipment_detail.status_bill = '0', 1, 0)) as 'Unbilled',
    SUM(IF(shipment_detail.status_bill = '1', 1, 0)) as 'Billed',
    SUM(IF(shipment_detail.status_bill = '2', 1, 0)) as 'Paid'
    FROM shipment JOIN shipment_detail ON shipment.id = shipment.id_shipment WHERE shipment.status_delete = '1'
ERROR - 2020-11-23 14:59:44 --> Query error: Unknown column 'status_delete1' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `status_delete1` = 1
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-11-23 15:00:52 --> Query error: Unknown column 'status_bill1' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `status_delete` = 1
AND `status_bill1` LIKE '%1%'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-11-23 15:01:05 --> Query error: Unknown column 'status_bill1' in 'where clause' - Invalid query: SELECT *
FROM `shipment`
JOIN `shipment_detail` ON `shipment`.`id` = `shipment_detail`.`id_shipment`
WHERE `status_delete` = 1
AND `status_bill1` LIKE '%1%'
AND `status_delete` = '1'
ORDER BY `shipment`.`created_date` DESC, `shipment`.`tracking_no` DESC
ERROR - 2020-11-23 15:46:45 --> 404 Page Not Found: Branch/favicon.ico
ERROR - 2020-11-23 15:48:30 --> 404 Page Not Found: User/favicon.ico
=======
ERROR - 2020-11-23 14:55:55 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'ehxnbljayf' C:\xampp\htdocs\xpdc\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-23 14:55:55 --> Unable to connect to the database
ERROR - 2020-11-23 14:56:31 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-11-23 14:57:09 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-23 14:57:14 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-11-23 14:57:53 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-11-23 14:59:08 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-23 14:59:15 --> 404 Page Not Found: Shipment/favicon.ico
ERROR - 2020-11-23 15:00:20 --> 404 Page Not Found: Master_tracking/favicon.ico
ERROR - 2020-11-23 15:04:09 --> 404 Page Not Found: Assets/favicon.ico
ERROR - 2020-11-23 15:04:25 --> 404 Page Not Found: Home/favicon.ico
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Shipment.php 92
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 17
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 18
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 24
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 25
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 31
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 32
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 38
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 39
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 45
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 46
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 52
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 53
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 59
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 60
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 66
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 67
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 76
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 77
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 83
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 84
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 90
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 91
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 97
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 98
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 104
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 105
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 111
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 112
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 118
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 119
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 125
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 126
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 139
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 140
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 146
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 147
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 153
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 154
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 160
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 161
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 167
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 168
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 174
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 175
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 181
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 182
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 188
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 189
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 197
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 200
ERROR - 2020-11-23 15:39:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 200
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 240
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 241
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 247
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 248
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 268
ERROR - 2020-11-23 15:39:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 268
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 288
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 289
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 290
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 296
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 297
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 303
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 304
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 310
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 311
ERROR - 2020-11-23 15:39:15 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 317
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 318
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 324
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 325
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 331
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 332
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 338
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 339
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 345
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 346
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 355
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 356
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 362
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 369
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 370
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 376
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 377
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 383
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 384
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 390
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 391
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 397
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 398
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 404
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 405
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 411
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 412
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 418
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 419
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 425
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 425
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 425
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 426
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 427
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 433
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 433
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 433
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 434
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 435
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 441
ERROR - 2020-11-23 15:39:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_receipt.php 442
ERROR - 2020-11-23 15:39:23 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\xpdc\application\controllers\Shipment.php 861
ERROR - 2020-11-23 15:39:23 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_track.php 22
ERROR - 2020-11-23 15:39:23 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_track.php 25
ERROR - 2020-11-23 15:39:23 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_track.php 31
ERROR - 2020-11-23 15:39:23 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_track.php 35
ERROR - 2020-11-23 15:39:23 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_track.php 39
ERROR - 2020-11-23 15:39:23 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\xpdc\application\views\shipment\shipment_track.php 47
>>>>>>> master
