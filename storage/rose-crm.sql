-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `rose_accounts`;
CREATE TABLE `rose_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(80) NOT NULL,
  `holder` varchar(200) NOT NULL,
  `balance` decimal(16,4) DEFAULT '0.0000',
  `debit` decimal(16,2) NOT NULL,
  `code` varchar(60) DEFAULT NULL,
  `account_type` varchar(100) NOT NULL DEFAULT 'Basic',
  `note` varchar(255) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `acn` (`number`,`ins`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `rose_accounts_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_accounts` (`id`, `number`, `holder`, `balance`, `debit`, `code`, `account_type`, `note`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'Default Account',	'Default Account',	20.0000,	0.00,	'1234',	'Basic',	NULL,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(2,	'Default Account Purchase',	'Default Account Purchase',	0.0000,	0.00,	'12345678',	'Basic',	NULL,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_additionals`;
CREATE TABLE `rose_additionals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` decimal(10,4) unsigned DEFAULT '0.0000',
  `class` int(1) unsigned NOT NULL,
  `type1` enum('%','flat','b_flat','b_per') NOT NULL DEFAULT '%',
  `type2` enum('inclusive','exclusive') DEFAULT 'exclusive',
  `type3` enum('inclusive','exclusive','cgst','igst') DEFAULT 'exclusive',
  `default_a` int(1) unsigned DEFAULT '0',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `additionals_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_additionals` (`id`, `name`, `value`, `class`, `type1`, `type2`, `type3`, `default_a`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'Tax Exclusive',	14.0000,	1,	'%',	'exclusive',	'exclusive',	NULL,	1,	NULL,	NULL),
(2,	'Discount % (after Tax) ',	0.0000,	2,	'%',	'exclusive',	'exclusive',	NULL,	1,	NULL,	NULL),
(3,	'Tax Inclusive',	0.0000,	1,	'%',	'inclusive',	'inclusive',	NULL,	1,	NULL,	NULL),
(4,	'Discount flat (after Tax) ',	0.0000,	2,	'flat',	'exclusive',	'exclusive',	NULL,	1,	NULL,	NULL),
(7,	'Discount flat (before Tax) ',	0.0000,	2,	'b_flat',	'exclusive',	'exclusive',	NULL,	1,	NULL,	NULL),
(8,	'Discount % (before Tax) ',	0.0000,	2,	'b_per',	'exclusive',	'exclusive',	NULL,	1,	NULL,	NULL),
(9,	'VAT 10%',	10.7000,	1,	'%',	'exclusive',	'exclusive',	NULL,	1,	NULL,	NULL),
(10,	'CGST + SGST 14%',	14.0000,	1,	'%',	'exclusive',	'cgst',	NULL,	1,	NULL,	NULL),
(11,	'IGST 4%',	4.0000,	1,	'%',	'exclusive',	'igst',	NULL,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `rose_attendances`;
CREATE TABLE `rose_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `present` date NOT NULL,
  `t_from` time NOT NULL,
  `t_to` time NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `actual_hours` int(11) unsigned DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `attendances_fk1` (`ins`) USING BTREE,
  KEY `attendances_fk2` (`user_id`) USING BTREE,
  CONSTRAINT `attendances_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `attendances_fk2` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_banks`;
CREATE TABLE `rose_banks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `number` varchar(70) NOT NULL,
  `code` varchar(60) DEFAULT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `enable` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `banks_fk1` (`ins`) USING BTREE,
  CONSTRAINT `banks_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_channel`;
CREATE TABLE `rose_channel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ins` int(4) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rose_channel_bill`;
CREATE TABLE `rose_channel_bill` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` bigint(20) unsigned DEFAULT NULL,
  `c_id` bigint(20) unsigned DEFAULT NULL,
  `ref` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`),
  KEY `bill_id` (`bill_id`),
  CONSTRAINT `rose_channel_bill_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `rose_channel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rose_companies`;
CREATE TABLE `rose_companies` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `cname` char(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(60) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `postbox` varchar(15) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `taxid` varchar(30) DEFAULT NULL,
  `tax` int(11) unsigned DEFAULT NULL,
  `currency` varchar(4) NOT NULL,
  `currency_format` int(1) unsigned NOT NULL,
  `main_date_format` enum('d-m-Y','m-d-Y','Y-m-d') NOT NULL DEFAULT 'd-m-Y',
  `user_date_format` enum('DD-MM-YYYY','MM-DD-YYYY','YYYY-MM-DD','') NOT NULL DEFAULT 'DD-MM-YYYY',
  `zone` varchar(25) NOT NULL,
  `logo` varchar(30) DEFAULT NULL,
  `theme_logo` varchar(255) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `lang` varchar(20) DEFAULT 'english',
  `valid` int(1) unsigned DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_companies` (`id`, `cname`, `address`, `city`, `region`, `country`, `postbox`, `phone`, `email`, `taxid`, `tax`, `currency`, `currency_format`, `main_date_format`, `user_date_format`, `zone`, `logo`, `theme_logo`, `icon`, `lang`, `valid`, `created_at`, `updated_at`) VALUES
(1,	'ABC Company up',	'412 Example South Street',	'Los Angeles',	'FL',	'USA',	'123',	'410-987-89-60',	'support@ultimatekode.com',	'23442',	0,	'E',	0,	'd-m-Y',	'DD-MM-YYYY',	'Asia/Calcutta',	NULL,	NULL,	NULL,	'english',	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_config_meta`;
CREATE TABLE `rose_config_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `feature_id` int(10) unsigned NOT NULL,
  `feature_value` int(10) NOT NULL,
  `value1` varchar(400) DEFAULT NULL,
  `value2` varchar(400) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `feature_id` (`feature_id`,`ins`) USING BTREE,
  KEY `config_meta_fk1` (`ins`) USING BTREE,
  CONSTRAINT `config_meta_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_config_meta` (`id`, `feature_id`, `feature_value`, `value1`, `value2`, `ins`, `created_at`, `updated_at`) VALUES
(2,	2,	1,	'default_currency',	'{\"key\":\"api_key\",\"base_currency\":\"USD\",\"endpoint\":\"live\",\"enable\":\"0\"}',	1,	NULL,	NULL),
(3,	1,	1,	'default_warehouse',	'noti@email.com',	1,	NULL,	NULL),
(4,	3,	11,	'default_discount',	'%',	1,	NULL,	NULL),
(5,	4,	9,	'default_tax',	'0',	1,	NULL,	NULL),
(6,	5,	1,	'online_payment',	'1',	1,	NULL,	NULL),
(7,	6,	1,	'online_payment_account',	'',	1,	NULL,	NULL),
(8,	7,	0,	'url_shorten_service',	'56546x',	1,	NULL,	NULL),
(9,	8,	1,	'1',	'Tm5WcmE2UUN6T1lYU3JqWXFTd2pTQT09',	1,	NULL,	NULL),
(18,	9,	1,	'jpeg,gif,png,pdf,xls',	'no',	1,	NULL,	NULL),
(19,	10,	2,	'2',	'due',	1,	NULL,	NULL),
(20,	11,	0,	'sample@email.com',	'{\"new_invoice\":\"0\",\"new_trans\":\"0\",\"cust_new_invoice\":\"0\",\"del_invoice\":\"0\",\"del_trans\":\"0\",\"sms_new_invoice\":\"0\",\"task_new\":\"0\"}',	1,	NULL,	NULL),
(21,	12,	0,	'sample@email.com',	'h',	1,	NULL,	NULL),
(22,	13,	0,	'1',	'2',	1,	NULL,	NULL),
(23,	14,	0,	'0',	'auto_sms_email',	1,	NULL,	NULL),
(235,	15,	1,	'ltr',	'ltr_rtl',	1,	NULL,	NULL),
(371,	16,	1,	'2',	'done_due_status',	1,	NULL,	NULL),
(436,	17,	1,	'[\"Basic\",\"Assets\",\"Equity\",\"Expenses\",\"Income\",\"Liabilities\",\"Test\"]',	'[\"Cash\",\"Bank Transfer\",\"Cheque\",\"Prepaid Card\",\"Other\"]',	1,	NULL,	NULL),
(454,	18,	0,	'crm_hrm',	'1',	1,	NULL,	NULL),
(455,	19,	0,	'{\"address\":\"10.10.10.11\",\"port\":\"9100\",\"mode\":\"1\"}',	'9100',	1,	NULL,	NULL);

DROP TABLE IF EXISTS `rose_currencies`;
CREATE TABLE `rose_currencies` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) DEFAULT NULL,
  `symbol` varchar(3) DEFAULT NULL,
  `rate` decimal(10,4) unsigned NOT NULL DEFAULT '0.0000',
  `thousand_sep` char(1) DEFAULT NULL,
  `decimal_sep` char(1) DEFAULT NULL,
  `precision_point` tinyint(2) NOT NULL,
  `symbol_position` tinyint(1) NOT NULL DEFAULT '1',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `currencies_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_currencies` (`id`, `code`, `symbol`, `rate`, `thousand_sep`, `decimal_sep`, `precision_point`, `symbol_position`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'USD',	'$',	1.0000,	',',	'.',	2,	0,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_customers`;
CREATE TABLE `rose_customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `main` tinyint(2) unsigned DEFAULT '1',
  `rel_id` bigint(20) unsigned DEFAULT '0',
  `employee_id` int(11) DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postbox` varchar(20) DEFAULT NULL,
  `email` varchar(90) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `taxid` varchar(100) DEFAULT NULL,
  `name_s` varchar(100) DEFAULT NULL,
  `phone_s` varchar(100) DEFAULT NULL,
  `email_s` varchar(100) DEFAULT NULL,
  `address_s` varchar(100) DEFAULT NULL,
  `city_s` varchar(100) DEFAULT NULL,
  `region_s` varchar(100) DEFAULT NULL,
  `country_s` varchar(100) DEFAULT NULL,
  `postbox_s` varchar(100) DEFAULT NULL,
  `balance` decimal(16,2) DEFAULT '0.00',
  `docid` varchar(255) DEFAULT NULL,
  `custom1` varchar(255) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `active` int(1) unsigned DEFAULT '1',
  `password` varchar(191) DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`,`ins`) USING BTREE,
  KEY `name` (`name`) USING BTREE,
  KEY `email_2` (`email`) USING BTREE,
  KEY `phone` (`phone`) USING BTREE,
  KEY `customers_fk1` (`ins`) USING BTREE,
  CONSTRAINT `customers_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_customers` (`id`, `main`, `rel_id`, `employee_id`, `name`, `phone`, `address`, `city`, `region`, `country`, `postbox`, `email`, `picture`, `company`, `taxid`, `name_s`, `phone_s`, `email_s`, `address_s`, `city_s`, `region_s`, `country_s`, `postbox_s`, `balance`, `docid`, `custom1`, `ins`, `active`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	0,	1,	'Walk In',	'123456',	'Address Line 1',	'City',	'Region',	'Country',	'Post Boxx',	'customer@example.com',	NULL,	'Company',	'Tax ID',	'Shipping Name',	'Shipping Phone',	'email_s',	'Shipping Address',	'Shipping City',	'Shiping Region',	'Shipiing Country',	'Post Box',	0.00,	'Document ID ',	NULL,	1,	1,	'$2y$10$fVzntgWDFOapAa3LJlW8EOGwFBovLnc88GXqMKD4sSOneLP7NUuPG',	0,	NULL,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_customer_groups`;
CREATE TABLE `rose_customer_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `summary` varchar(250) DEFAULT NULL,
  `disc_rate` decimal(10,4) DEFAULT '0.0000',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `customer_groups_fk1` (`ins`) USING BTREE,
  CONSTRAINT `customer_groups_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_customer_groups` (`id`, `title`, `summary`, `disc_rate`, `ins`, `created_at`, `updated_at`) VALUES
(6,	'Same Group',	'sample',	0.0000,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_customer_group_entries`;
CREATE TABLE `rose_customer_group_entries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `customer_group_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `customer_id` (`customer_id`,`customer_group_id`) USING BTREE,
  KEY `customer_group_id` (`customer_group_id`) USING BTREE,
  CONSTRAINT `customer_group_entries_fk1` FOREIGN KEY (`customer_group_id`) REFERENCES `rose_customer_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `customer_group_entries_fk2` FOREIGN KEY (`customer_id`) REFERENCES `rose_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_custom_entries`;
CREATE TABLE `rose_custom_entries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `custom_field_id` int(11) unsigned NOT NULL,
  `rid` int(11) unsigned DEFAULT NULL,
  `module` int(3) unsigned DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fid` (`custom_field_id`,`rid`) USING BTREE,
  KEY `custom_entries_fk1` (`ins`) USING BTREE,
  CONSTRAINT `custom_entries_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `custom_entries_fk2` FOREIGN KEY (`custom_field_id`) REFERENCES `rose_custom_fields` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_custom_fields`;
CREATE TABLE `rose_custom_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(3) NOT NULL,
  `field_type` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `placeholder` varchar(30) DEFAULT NULL,
  `default_data` text,
  `field_view` tinyint(2) NOT NULL,
  `other` varchar(50) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `f_module` (`module_id`) USING BTREE,
  KEY `custom_fields_fk1` (`ins`) USING BTREE,
  CONSTRAINT `custom_fields_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_departments`;
CREATE TABLE `rose_departments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `departments_fk1` (`ins`) USING BTREE,
  CONSTRAINT `departments_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_departments` (`id`, `name`, `note`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'Sample Departmet',	'Sample Departmet',	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_drafts`;
CREATE TABLE `rose_drafts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) unsigned NOT NULL,
  `invoicedate` date NOT NULL,
  `invoiceduedate` date NOT NULL,
  `subtotal` decimal(16,4) DEFAULT '0.0000',
  `shipping` decimal(16,4) DEFAULT '0.0000',
  `ship_tax` decimal(16,4) DEFAULT '0.0000',
  `ship_tax_type` enum('inclusive','exclusive','off','none') DEFAULT 'off',
  `ship_tax_rate` decimal(16,4) DEFAULT '0.0000',
  `discount` decimal(16,4) DEFAULT '0.0000',
  `extra_discount` decimal(16,4) DEFAULT '0.0000',
  `discount_rate` decimal(10,4) DEFAULT '0.0000',
  `tax` decimal(16,4) DEFAULT '0.0000',
  `total` decimal(16,4) DEFAULT '0.0000',
  `pmethod` varchar(25) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` enum('paid','due','canceled','partial') NOT NULL DEFAULT 'due',
  `customer_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `pamnt` decimal(16,4) DEFAULT '0.0000',
  `items` decimal(10,4) NOT NULL,
  `tax_format` enum('exclusive','inclusive','off','cgst','igst') NOT NULL DEFAULT 'exclusive',
  `tax_id` bigint(20) DEFAULT '0',
  `discount_format` enum('%','flat','b_flat','b_per') NOT NULL DEFAULT '%',
  `refer` varchar(20) DEFAULT NULL,
  `term_id` bigint(20) unsigned DEFAULT NULL,
  `currency` int(4) DEFAULT NULL,
  `i_class` int(1) NOT NULL DEFAULT '0',
  `r_time` varchar(10) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `invoices_fk1` (`ins`) USING BTREE,
  KEY `customer_id` (`customer_id`) USING BTREE,
  KEY `invoices_fk3` (`term_id`) USING BTREE,
  KEY `invoices_fk4` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_draft_items`;
CREATE TABLE `rose_draft_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `product_name` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `product_qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `product_price` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `product_tax` decimal(16,4) DEFAULT '0.0000',
  `product_discount` decimal(16,4) DEFAULT '0.0000',
  `product_subtotal` decimal(16,4) DEFAULT '0.0000',
  `total_tax` decimal(16,4) DEFAULT '0.0000',
  `total_discount` decimal(16,4) DEFAULT '0.0000',
  `product_des` text,
  `i_class` int(1) NOT NULL DEFAULT '0',
  `unit` varchar(5) DEFAULT NULL,
  `serial` varchar(100) DEFAULT NULL,
  `unit_value` decimal(16,4) NOT NULL DEFAULT '1.0000',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `i_class` (`i_class`) USING BTREE,
  KEY `invoice_items_fk1` (`ins`) USING BTREE,
  KEY `invoice_items_fk2` (`invoice_id`) USING BTREE,
  CONSTRAINT `rose_draft_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `rose_drafts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_email_settings`;
CREATE TABLE `rose_email_settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `driver` varchar(50) NOT NULL DEFAULT 'smtp',
  `host` varchar(100) NOT NULL,
  `port` int(11) NOT NULL,
  `auth` enum('true','false') NOT NULL,
  `auth_type` enum('none','tls','ssl') NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `email_settings_fk1` (`ins`) USING BTREE,
  CONSTRAINT `email_settings_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_email_settings` (`id`, `active`, `driver`, `host`, `port`, `auth`, `auth_type`, `username`, `password`, `sender`, `ins`, `created_at`, `updated_at`) VALUES
(1,	0,	'smtp',	'smtp.com2',	587,	'true',	'none',	'support@example.com',	'',	'supportq@example.com',	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_events`;
CREATE TABLE `rose_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ins` int(4) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `rose_events_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_event_relations`;
CREATE TABLE `rose_event_relations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned DEFAULT NULL,
  `related` int(3) unsigned DEFAULT NULL,
  `r_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `event_id` (`event_id`) USING BTREE,
  CONSTRAINT `rose_event_relations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `rose_events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_history`;
CREATE TABLE `rose_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `entity_id` int(10) unsigned DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `class` varchar(191) DEFAULT NULL,
  `text` varchar(191) NOT NULL,
  `assets` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `history_type_id_foreign` (`type_id`) USING BTREE,
  KEY `history_user_id_foreign` (`user_id`) USING BTREE,
  CONSTRAINT `history_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `rose_history_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_history_types`;
CREATE TABLE `rose_history_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_history_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'User',	'2021-06-01 00:07:55',	NULL),
(2,	'Role',	'2021-06-01 00:07:55',	NULL),
(3,	'Permission',	'2021-06-01 00:07:55',	NULL),
(4,	'Test1',	'2021-06-01 00:07:55',	NULL),
(5,	'Test2',	'2021-06-01 00:07:55',	NULL),
(6,	'Test3',	'2021-06-01 00:07:55',	NULL),
(7,	'Test4',	'2021-06-01 00:07:55',	NULL),
(8,	'Test5',	'2021-06-01 00:07:55',	NULL);

DROP TABLE IF EXISTS `rose_hrm_metas`;
CREATE TABLE `rose_hrm_metas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `salary` decimal(16,4) DEFAULT NULL,
  `hra` decimal(16,4) DEFAULT NULL,
  `entry_time` time DEFAULT NULL,
  `exit_time` time DEFAULT NULL,
  `clock` int(1) DEFAULT NULL,
  `clock_in` int(11) DEFAULT NULL,
  `clock_out` int(11) DEFAULT NULL,
  `commission` decimal(10,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `department_id` (`department_id`) USING BTREE,
  CONSTRAINT `hrm_metas_fk1` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_hrm_metas` (`id`, `user_id`, `department_id`, `salary`, `hra`, `entry_time`, `exit_time`, `clock`, `clock_in`, `clock_out`, `commission`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	7.0000,	5.0000,	'00:02:00',	'02:00:00',	0,	0,	1582821197,	15.0000,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_invoices`;
CREATE TABLE `rose_invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) unsigned NOT NULL,
  `invoicedate` date NOT NULL,
  `invoiceduedate` date NOT NULL,
  `subtotal` decimal(16,4) DEFAULT '0.0000',
  `shipping` decimal(16,4) DEFAULT '0.0000',
  `ship_tax` decimal(16,4) DEFAULT '0.0000',
  `ship_tax_type` enum('inclusive','exclusive','off','none') DEFAULT 'off',
  `ship_tax_rate` decimal(16,4) DEFAULT '0.0000',
  `discount` decimal(16,4) DEFAULT '0.0000',
  `extra_discount` decimal(16,4) DEFAULT '0.0000',
  `discount_rate` decimal(10,4) DEFAULT '0.0000',
  `tax` decimal(16,4) DEFAULT '0.0000',
  `total` decimal(16,4) DEFAULT '0.0000',
  `pmethod` varchar(25) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` enum('paid','due','canceled','partial','pending','overdue') NOT NULL DEFAULT 'due',
  `customer_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `pamnt` decimal(16,4) DEFAULT '0.0000',
  `items` decimal(10,4) NOT NULL,
  `tax_format` enum('exclusive','inclusive','off','cgst','igst') NOT NULL DEFAULT 'exclusive',
  `tax_id` bigint(20) DEFAULT '0',
  `discount_format` enum('%','flat','b_flat','b_per') NOT NULL DEFAULT '%',
  `refer` varchar(20) DEFAULT NULL,
  `term_id` bigint(20) unsigned DEFAULT NULL,
  `currency` int(4) DEFAULT NULL,
  `i_class` int(1) NOT NULL DEFAULT '0',
  `r_time` varchar(10) NOT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `order_id` varchar(30) DEFAULT NULL,
  `mdata` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `invoices_fk1` (`ins`) USING BTREE,
  KEY `customer_id` (`customer_id`) USING BTREE,
  KEY `invoices_fk3` (`term_id`) USING BTREE,
  KEY `invoices_fk4` (`user_id`) USING BTREE,
  CONSTRAINT `invoices_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `invoices_fk2` FOREIGN KEY (`customer_id`) REFERENCES `rose_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `invoices_fk3` FOREIGN KEY (`term_id`) REFERENCES `rose_terms` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `invoices_fk4` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_invoice_items`;
CREATE TABLE `rose_invoice_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `product_name` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `product_qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `product_price` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `product_tax` decimal(16,4) DEFAULT '0.0000',
  `product_discount` decimal(16,4) DEFAULT '0.0000',
  `product_subtotal` decimal(16,4) DEFAULT '0.0000',
  `total_tax` decimal(16,4) DEFAULT '0.0000',
  `total_discount` decimal(16,4) DEFAULT '0.0000',
  `product_des` text,
  `i_class` int(1) NOT NULL DEFAULT '0',
  `unit` varchar(5) DEFAULT NULL,
  `serial` varchar(100) DEFAULT NULL,
  `unit_value` decimal(16,4) NOT NULL DEFAULT '1.0000',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `i_class` (`i_class`) USING BTREE,
  KEY `invoice_items_fk1` (`ins`) USING BTREE,
  KEY `invoice_items_fk2` (`invoice_id`) USING BTREE,
  CONSTRAINT `invoice_items_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `invoice_items_fk2` FOREIGN KEY (`invoice_id`) REFERENCES `rose_invoices` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_menus`;
CREATE TABLE `rose_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('backend','frontend') NOT NULL,
  `name` varchar(191) NOT NULL,
  `items` text,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_messages`;
CREATE TABLE `rose_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `messages_fk1` (`user_id`) USING BTREE,
  CONSTRAINT `messages_fk1` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_meta_entries`;
CREATE TABLE `rose_meta_entries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rel_type` int(2) unsigned NOT NULL DEFAULT '0',
  `rel_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `value` varchar(255) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `meta_entries_fk1` (`ins`) USING BTREE,
  CONSTRAINT `meta_entries_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_migrations`;
CREATE TABLE `rose_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_miscs`;
CREATE TABLE `rose_miscs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(7) DEFAULT '#0b97c4',
  `section` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `miscs_fk1` (`ins`) USING BTREE,
  KEY `section` (`section`) USING BTREE,
  CONSTRAINT `miscs_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_miscs` (`id`, `ins`, `name`, `color`, `section`, `created_at`, `updated_at`) VALUES
(1,	1,	'Done',	'#12C538',	2,	NULL,	NULL),
(2,	1,	'Due',	'#FF0000',	2,	NULL,	NULL);

DROP TABLE IF EXISTS `rose_notes`;
CREATE TABLE `rose_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `user_id` int(10) unsigned DEFAULT NULL,
  `section` tinyint(1) DEFAULT '0',
  `ins` int(4) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `rose_notes_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_notifications`;
CREATE TABLE `rose_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `rose_orders`;
CREATE TABLE `rose_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) NOT NULL,
  `invoicedate` date NOT NULL,
  `invoiceduedate` date NOT NULL,
  `subtotal` decimal(16,4) DEFAULT '0.0000',
  `shipping` decimal(16,4) DEFAULT '0.0000',
  `ship_tax` decimal(16,4) DEFAULT '0.0000',
  `ship_tax_type` enum('inclusive','exclusive','off','none') DEFAULT 'off',
  `ship_tax_rate` decimal(16,4) DEFAULT '0.0000',
  `discount` decimal(16,4) DEFAULT '0.0000',
  `extra_discount` decimal(16,4) DEFAULT '0.0000',
  `discount_rate` decimal(10,4) DEFAULT '0.0000',
  `tax` decimal(16,4) DEFAULT '0.0000',
  `total` decimal(16,4) DEFAULT '0.0000',
  `pmethod` varchar(14) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` enum('paid','due','canceled','partial') NOT NULL DEFAULT 'due',
  `customer_id` bigint(20) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `pamnt` decimal(16,4) DEFAULT '0.0000',
  `items` decimal(10,4) NOT NULL,
  `tax_format` enum('exclusive','inclusive','off','cgst','igst') NOT NULL DEFAULT 'exclusive',
  `tax_id` bigint(20) DEFAULT '0',
  `discount_format` enum('%','flat','b_flat','b_per') NOT NULL DEFAULT '%',
  `refer` varchar(20) DEFAULT NULL,
  `term_id` bigint(20) unsigned DEFAULT NULL,
  `currency` int(4) DEFAULT NULL,
  `i_class` int(1) NOT NULL DEFAULT '0',
  `r_time` varchar(10) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `csd` (`customer_id`) USING BTREE,
  KEY `invoice` (`tid`) USING BTREE,
  KEY `i_class` (`i_class`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `term_id` (`term_id`) USING BTREE,
  KEY `orders_fk1` (`ins`) USING BTREE,
  CONSTRAINT `orders_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `orders_fk2` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `rose_orders_ibfk_1` FOREIGN KEY (`term_id`) REFERENCES `rose_terms` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_order_items`;
CREATE TABLE `rose_order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `product_name` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `product_qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `product_price` decimal(16,4) unsigned NOT NULL DEFAULT '0.0000',
  `product_tax` decimal(16,4) DEFAULT '0.0000',
  `product_discount` decimal(16,4) DEFAULT '0.0000',
  `product_subtotal` decimal(16,4) DEFAULT '0.0000',
  `total_tax` decimal(16,4) DEFAULT '0.0000',
  `total_discount` decimal(16,4) DEFAULT '0.0000',
  `product_des` text,
  `i_class` int(1) unsigned NOT NULL DEFAULT '0',
  `unit` varchar(5) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `order_items_fk1` (`ins`) USING BTREE,
  KEY `order_items_fk2` (`order_id`) USING BTREE,
  CONSTRAINT `order_items_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `order_items_fk2` FOREIGN KEY (`order_id`) REFERENCES `rose_orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_pages`;
CREATE TABLE `rose_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `page_slug` varchar(191) NOT NULL,
  `description` text,
  `cannonical_link` varchar(191) DEFAULT NULL,
  `seo_title` varchar(191) DEFAULT NULL,
  `seo_keyword` varchar(191) DEFAULT NULL,
  `seo_description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `pages_page_slug_unique` (`page_slug`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_participants`;
CREATE TABLE `rose_participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `last_read` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `rose_participants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_password_resets`;
CREATE TABLE `rose_password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_permissions`;
CREATE TABLE `rose_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `permissions_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_permissions` (`id`, `name`, `display_name`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'billing',	'Admin Billing DashBoard',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	'manage-general',	'General Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	'manage-customer',	'Customers View',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(4,	'customer-create',	'Customer Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(5,	'edit-customer',	'Customer Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(6,	'delete-customer',	'Customer Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(7,	'service-payment',	'Service Payment',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(8,	'manage-customergroup',	'Customergroup Manage Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(9,	'create-customergroup',	'Customergroup Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(10,	'edit-customergroup',	'Customergroup Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(11,	'delete-customergroup',	'Customergroup Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(12,	'manage-warehouse',	'Warehouse Manage Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(13,	'warehouse-data',	'Warehouse Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(14,	'productcategory-manage',	'Product Category View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(15,	'productcategory-data',	'Product Category Create-Update-Deletee Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(16,	'product-manage',	'Products View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(17,	'product-create',	'Product Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(18,	'product-edit',	'Product Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(19,	'product-delete',	'Product Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(20,	'invoice-manage',	'Invoices View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(21,	'invoice-create',	'Invoice Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(22,	'invoice-edit',	'Invoice Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(23,	'invoice-delete',	'Invoice Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(24,	'crm',	'Customer Search',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(25,	'account-manage',	'Accounts View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(26,	'account-data',	'Account Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(27,	'transaction-manage',	'Transactions View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(28,	'transaction-data',	'Transactions Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(29,	'manage-hrm',	'Employee Management Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(30,	'department-manage',	'Employee Departments View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(31,	'department-data',	'Employee Department Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(32,	'quote-manage',	'Quotes View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(33,	'quote-create',	'Quote Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(34,	'quote-edit',	'Quote Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(35,	'quote-delete',	'Quote Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(36,	'purchaseorder-manage',	'Purchase Order View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(37,	'purchaseorder-data',	'Purchase Order Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(38,	'supplier-manage',	'Suppliers View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(39,	'supplier-data',	'Supplier Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(40,	'dashboard-owner',	'Dashboard Business Owner',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(41,	'dashboard-stock',	'Extra 2',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(42,	'dashboard-self',	'Extra 1',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(43,	'reports-statements',	'Reports & Statements',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(44,	'stockreturn-manage',	'Stock Returns View Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(45,	'stockreturn-data',	'Stock Return Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(46,	'creditnote-manage',	'Credit Notes View',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(47,	'data-creditnote',	'Credit Note Create-Update-Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(48,	'stocktransfer',	'Stock Transfer Management',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(49,	'business_settings',	'Business Admin Settings',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(50,	'task-manage',	'Task Manage Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(51,	'task-create',	'Task Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(52,	'task-edit',	'Task Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(53,	'task-delete',	'Task Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(54,	'misc-manage',	'Tags & Status Manage',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(55,	'misc-create',	'Tags & Status Create Misc Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(56,	'misc-data',	'Tags & Status - Edit Delete',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(57,	'project-manage',	'Project Manage Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(58,	'project-create',	'Project Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(59,	'project-edit',	'Project Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(60,	'project-delete',	'Project Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(61,	'note-manage',	'Note Manage Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(62,	'note-create',	'Note Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(63,	'note-data',	'Note Edit Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(64,	'manage-event',	'Event Manage Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(65,	'create-event',	'Event Create Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(66,	'edit-event',	'Event Edit Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(67,	'delete-event',	'Event Delete Permission',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(68,	'communication',	'Send Email & SMS',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(69,	'make-payment',	'Make Receive Payments',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(70,	'wallet',	'Customer Wallet',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(71,	'product_search',	'Product Search',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(72,	'pos',	'POS Screen',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(73,	'import',	'Data Import',	0,	1,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `rose_permission_role`;
CREATE TABLE `rose_permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `permission_role_permission_id_foreign` (`permission_id`) USING BTREE,
  KEY `permission_role_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `rose_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `rose_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1,	1,	2),
(2,	2,	2),
(3,	3,	2),
(4,	4,	2),
(5,	5,	2),
(6,	6,	2),
(7,	7,	2),
(8,	8,	2),
(9,	9,	2),
(10,	10,	2),
(11,	11,	2),
(12,	12,	2),
(13,	13,	2),
(14,	14,	2),
(15,	15,	2),
(16,	16,	2),
(17,	17,	2),
(18,	18,	2),
(19,	19,	2),
(20,	20,	2),
(21,	21,	2),
(22,	22,	2),
(23,	23,	2),
(24,	24,	2),
(25,	25,	2),
(26,	26,	2),
(27,	27,	2),
(28,	28,	2),
(29,	29,	2),
(30,	30,	2),
(31,	31,	2),
(32,	32,	2),
(33,	33,	2),
(34,	34,	2),
(35,	35,	2),
(36,	36,	2),
(37,	37,	2),
(38,	38,	2),
(39,	39,	2),
(40,	40,	2),
(41,	41,	2),
(42,	42,	2),
(43,	43,	2),
(44,	44,	2),
(45,	45,	2),
(46,	46,	2),
(47,	47,	2),
(48,	48,	2),
(49,	49,	2),
(50,	50,	2),
(51,	51,	2),
(52,	52,	2),
(53,	53,	2),
(54,	54,	2),
(55,	55,	2),
(56,	56,	2),
(57,	57,	2),
(58,	58,	2),
(59,	59,	2),
(60,	60,	2),
(61,	61,	2),
(62,	62,	2),
(63,	63,	2),
(64,	64,	2),
(65,	65,	2),
(66,	66,	2),
(67,	67,	2),
(68,	68,	2),
(69,	69,	2),
(70,	70,	2),
(71,	71,	2),
(72,	72,	2),
(73,	2,	3),
(74,	3,	3),
(75,	4,	3),
(76,	5,	3),
(77,	6,	3),
(78,	8,	3),
(79,	9,	3),
(80,	10,	3),
(81,	11,	3),
(82,	12,	3),
(83,	13,	3),
(84,	14,	3),
(85,	15,	3),
(86,	16,	3),
(87,	17,	3),
(88,	18,	3),
(89,	19,	3),
(90,	20,	3),
(91,	21,	3),
(92,	22,	3),
(93,	23,	3),
(94,	24,	3),
(95,	25,	3),
(96,	26,	3),
(97,	27,	3),
(98,	28,	3),
(99,	29,	3),
(100,	30,	3),
(101,	31,	3),
(102,	32,	3),
(103,	33,	3),
(104,	34,	3),
(105,	35,	3),
(106,	36,	3),
(107,	37,	3),
(108,	38,	3),
(109,	39,	3),
(110,	40,	3),
(111,	43,	3),
(112,	44,	3),
(113,	45,	3),
(114,	46,	3),
(115,	47,	3),
(116,	48,	3),
(117,	49,	3),
(118,	50,	3),
(119,	51,	3),
(120,	52,	3),
(121,	53,	3),
(122,	54,	3),
(123,	55,	3),
(124,	56,	3),
(125,	57,	3),
(126,	58,	3),
(127,	59,	3),
(128,	60,	3),
(129,	61,	3),
(130,	62,	3),
(131,	63,	3),
(132,	64,	3),
(133,	65,	3),
(134,	66,	3),
(135,	67,	3),
(136,	68,	3),
(137,	69,	3),
(138,	70,	3),
(139,	71,	3),
(140,	72,	3),
(142,	20,	4),
(143,	21,	4),
(144,	22,	4),
(145,	23,	4),
(146,	72,	4),
(147,	73,	2);

DROP TABLE IF EXISTS `rose_permission_user`;
CREATE TABLE `rose_permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `permission_user_permission_id_foreign` (`permission_id`) USING BTREE,
  KEY `permission_user_user_id_foreign` (`user_id`) USING BTREE,
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `rose_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_permission_user` (`id`, `permission_id`, `user_id`) VALUES
(1,	1,	1),
(2,	2,	1),
(3,	3,	1),
(4,	4,	1),
(5,	5,	1),
(6,	6,	1),
(7,	7,	1),
(8,	8,	1),
(9,	9,	1),
(10,	10,	1),
(11,	11,	1),
(12,	12,	1),
(13,	13,	1),
(14,	14,	1),
(15,	15,	1),
(16,	16,	1),
(17,	17,	1),
(18,	18,	1),
(19,	19,	1),
(20,	20,	1),
(21,	21,	1),
(22,	22,	1),
(23,	23,	1),
(24,	24,	1),
(25,	25,	1),
(26,	26,	1),
(27,	27,	1),
(28,	28,	1),
(29,	29,	1),
(30,	30,	1),
(31,	31,	1),
(32,	32,	1),
(33,	33,	1),
(34,	34,	1),
(35,	35,	1),
(36,	36,	1),
(37,	37,	1),
(38,	38,	1),
(39,	39,	1),
(40,	40,	1),
(41,	41,	1),
(42,	42,	1),
(43,	43,	1),
(44,	44,	1),
(45,	45,	1),
(46,	46,	1),
(47,	47,	1),
(48,	48,	1),
(49,	49,	1),
(50,	50,	1),
(51,	51,	1),
(52,	52,	1),
(53,	53,	1),
(54,	54,	1),
(55,	55,	1),
(56,	56,	1),
(57,	57,	1),
(58,	58,	1),
(59,	59,	1),
(60,	60,	1),
(61,	61,	1),
(62,	62,	1),
(63,	63,	1),
(64,	64,	1),
(65,	65,	1),
(66,	66,	1),
(67,	67,	1),
(68,	68,	1),
(69,	69,	1),
(70,	70,	1),
(71,	71,	1),
(72,	72,	1),
(73,	73,	1);

DROP TABLE IF EXISTS `rose_prefixes`;
CREATE TABLE `rose_prefixes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ins` int(4) unsigned NOT NULL,
  `class` int(2) unsigned NOT NULL DEFAULT '1',
  `value` varchar(10) DEFAULT NULL,
  `note` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `prefixes_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_prefixes` (`id`, `ins`, `class`, `value`, `note`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'INV',	'invoice',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(4,	1,	2,	'DO',	'delivery_note',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(5,	1,	3,	'PRO',	'proforma_invoice',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(6,	1,	4,	'REC',	'payment_receipt',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(16,	1,	5,	'QT',	'quotes',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(17,	1,	6,	'SUB',	'subscriptions',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(18,	1,	7,	'CN',	'credit_note',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(19,	1,	8,	'SR',	'stock_return',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(20,	1,	9,	'PO',	'purchase_order',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(30,	1,	10,	'POS',	'POS',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_products`;
CREATE TABLE `rose_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `productcategory_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `name` varchar(80) NOT NULL,
  `taxrate` decimal(16,4) DEFAULT '0.0000',
  `product_des` text,
  `unit` varchar(4) DEFAULT NULL,
  `code_type` varchar(8) DEFAULT 'EAN13',
  `sub_cat_id` int(11) unsigned DEFAULT '0',
  `brand_id` int(11) unsigned DEFAULT '0',
  `stock_type` int(1) unsigned DEFAULT '1',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `pcat` (`productcategory_id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `products_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `products_fk2` FOREIGN KEY (`productcategory_id`) REFERENCES `rose_product_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_product_categories`;
CREATE TABLE `rose_product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `c_type` int(2) unsigned DEFAULT '0',
  `rel_id` int(11) unsigned DEFAULT '0',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `product_categories_fk1` (`ins`) USING BTREE,
  CONSTRAINT `product_categories_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_product_categories` (`id`, `title`, `extra`, `c_type`, `rel_id`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'Default Product Category',	'Default Product Category',	0,	0,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_product_meta`;
CREATE TABLE `rose_product_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rel_type` int(2) unsigned NOT NULL DEFAULT '0',
  `rel_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ref_id` bigint(20) unsigned DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `value2` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ref_id` (`ref_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_product_variables`;
CREATE TABLE `rose_product_variables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `code` varchar(5) NOT NULL,
  `type` int(1) NOT NULL,
  `val` decimal(16,4) DEFAULT NULL,
  `rid` int(11) NOT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `rose_product_variables_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_product_variations`;
CREATE TABLE `rose_product_variations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned DEFAULT '0',
  `parent_id` bigint(20) unsigned DEFAULT '0',
  `variation_class` int(1) unsigned DEFAULT '0',
  `name` varchar(250) DEFAULT NULL,
  `warehouse_id` int(10) unsigned NOT NULL DEFAULT '1',
  `code` varchar(30) DEFAULT NULL,
  `price` decimal(16,4) DEFAULT '0.0000',
  `purchase_price` decimal(16,4) DEFAULT '0.0000',
  `disrate` decimal(16,4) DEFAULT '0.0000',
  `qty` decimal(10,4) NOT NULL,
  `alert` int(11) unsigned DEFAULT NULL,
  `image` varchar(120) DEFAULT 'default.png',
  `barcode` varchar(16) DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `product_variations_fk1` (`ins`) USING BTREE,
  KEY `product_variations_fk2` (`product_id`) USING BTREE,
  KEY `product_variations_fk3` (`warehouse_id`) USING BTREE,
  CONSTRAINT `product_variations_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `product_variations_fk2` FOREIGN KEY (`product_id`) REFERENCES `rose_products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `product_variations_fk3` FOREIGN KEY (`warehouse_id`) REFERENCES `rose_warehouses` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_projects`;
CREATE TABLE `rose_projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `priority` enum('Low','Medium','High','Urgent') NOT NULL DEFAULT 'Medium',
  `progress` int(3) unsigned NOT NULL,
  `customer_id` bigint(20) unsigned DEFAULT NULL,
  `start_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `note` text,
  `worth` decimal(16,4) DEFAULT '0.0000',
  `project_share` int(1) unsigned NOT NULL DEFAULT '0',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `projects_fk1` (`ins`) USING BTREE,
  KEY `customer_id` (`customer_id`) USING BTREE,
  CONSTRAINT `projects_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `rose_projects_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `rose_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_project_logs`;
CREATE TABLE `rose_project_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned DEFAULT NULL,
  `value` varchar(250) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `project_id` (`project_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `rose_project_logs_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `rose_projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `rose_project_logs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_project_meta`;
CREATE TABLE `rose_project_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `meta_key` int(11) NOT NULL,
  `meta_data` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `key3` varchar(255) DEFAULT NULL,
  `key4` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `project_id` (`project_id`) USING BTREE,
  CONSTRAINT `rose_project_meta_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `rose_projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_project_milestones`;
CREATE TABLE `rose_project_milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` bigint(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text,
  `color` varchar(10) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `project_id` (`project_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `rose_project_milestones_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `rose_projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `rose_project_milestones_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_project_relations`;
CREATE TABLE `rose_project_relations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `related` int(11) unsigned NOT NULL,
  `rid` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `project_id` (`project_id`) USING BTREE,
  CONSTRAINT `rose_project_relations_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `rose_projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_purchase_orders`;
CREATE TABLE `rose_purchase_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) unsigned NOT NULL,
  `invoicedate` date NOT NULL,
  `invoiceduedate` date NOT NULL,
  `subtotal` decimal(16,4) DEFAULT '0.0000',
  `shipping` decimal(16,4) DEFAULT '0.0000',
  `ship_tax` decimal(16,4) DEFAULT '0.0000',
  `ship_tax_type` enum('inclusive','exclusive','off','none') DEFAULT 'off',
  `ship_tax_rate` decimal(16,4) DEFAULT '0.0000',
  `discount` decimal(16,4) DEFAULT '0.0000',
  `extra_discount` decimal(16,4) DEFAULT '0.0000',
  `discount_rate` decimal(10,4) DEFAULT '0.0000',
  `tax` decimal(16,4) DEFAULT '0.0000',
  `total` decimal(16,4) DEFAULT '0.0000',
  `pmethod` varchar(14) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` enum('paid','due','canceled','partial') NOT NULL DEFAULT 'due',
  `supplier_id` bigint(20) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `pamnt` decimal(16,4) DEFAULT '0.0000',
  `items` decimal(10,4) NOT NULL,
  `tax_format` enum('exclusive','inclusive','off','cgst','igst') NOT NULL DEFAULT 'exclusive',
  `tax_id` bigint(20) unsigned DEFAULT '0',
  `discount_format` enum('%','flat','b_flat','b_per') NOT NULL DEFAULT '%',
  `refer` varchar(20) DEFAULT NULL,
  `term_id` bigint(20) unsigned NOT NULL,
  `currency` int(4) unsigned DEFAULT NULL,
  `i_class` int(1) unsigned DEFAULT '0',
  `r_time` varchar(10) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `purchase_orders_fk1` (`ins`) USING BTREE,
  KEY `purchase_orders_fk2` (`user_id`) USING BTREE,
  CONSTRAINT `purchase_orders_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `purchase_orders_fk2` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_purchase_order_items`;
CREATE TABLE `rose_purchase_order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `product_name` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `product_qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `product_price` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `product_tax` decimal(16,4) DEFAULT '0.0000',
  `product_discount` decimal(16,4) DEFAULT '0.0000',
  `product_subtotal` decimal(16,4) DEFAULT '0.0000',
  `total_tax` decimal(16,4) DEFAULT '0.0000',
  `total_discount` decimal(16,4) DEFAULT '0.0000',
  `product_des` text,
  `i_class` int(1) unsigned DEFAULT '0',
  `unit` varchar(5) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `purchase_order_items_fk1` (`ins`) USING BTREE,
  KEY `purchase_order_items_fk2` (`bill_id`) USING BTREE,
  CONSTRAINT `purchase_order_items_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `purchase_order_items_fk2` FOREIGN KEY (`bill_id`) REFERENCES `rose_purchase_orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_quotes`;
CREATE TABLE `rose_quotes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) unsigned NOT NULL,
  `invoicedate` date NOT NULL,
  `invoiceduedate` date NOT NULL,
  `subtotal` decimal(16,4) DEFAULT '0.0000',
  `shipping` decimal(16,4) DEFAULT '0.0000',
  `ship_tax` decimal(16,4) DEFAULT '0.0000',
  `ship_tax_type` enum('inclusive','exclusive','off','none') DEFAULT 'off',
  `ship_tax_rate` decimal(16,4) DEFAULT '0.0000',
  `discount` decimal(16,4) DEFAULT '0.0000',
  `extra_discount` decimal(16,4) DEFAULT '0.0000',
  `discount_rate` decimal(10,4) DEFAULT '0.0000',
  `tax` decimal(16,4) DEFAULT '0.0000',
  `total` decimal(16,4) DEFAULT '0.0000',
  `pmethod` varchar(14) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` enum('approved','canceled','pending','client_approved') NOT NULL DEFAULT 'pending',
  `customer_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `pamnt` decimal(16,4) DEFAULT '0.0000',
  `items` decimal(10,4) NOT NULL,
  `tax_format` enum('exclusive','inclusive','off','cgst','igst') NOT NULL DEFAULT 'exclusive',
  `tax_id` bigint(20) unsigned DEFAULT '0',
  `discount_format` enum('%','flat','b_flat','b_per') NOT NULL DEFAULT '%',
  `refer` varchar(20) DEFAULT NULL,
  `term_id` bigint(20) unsigned DEFAULT NULL,
  `currency` int(4) unsigned DEFAULT NULL,
  `i_class` int(1) unsigned DEFAULT '0',
  `r_time` varchar(10) DEFAULT NULL,
  `proposal` text,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `quotes_fk1` (`ins`) USING BTREE,
  KEY `quotes_fk2` (`user_id`) USING BTREE,
  KEY `quotes_fk3` (`term_id`) USING BTREE,
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `quotes_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `quotes_fk2` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `quotes_fk3` FOREIGN KEY (`term_id`) REFERENCES `rose_terms` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `rose_quotes_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `rose_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_quote_items`;
CREATE TABLE `rose_quote_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quote_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `product_name` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `product_qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `product_price` decimal(16,4) NOT NULL DEFAULT '0.0000',
  `product_tax` decimal(16,4) DEFAULT '0.0000',
  `product_discount` decimal(16,4) DEFAULT '0.0000',
  `product_subtotal` decimal(16,4) DEFAULT '0.0000',
  `total_tax` decimal(16,4) DEFAULT '0.0000',
  `total_discount` decimal(16,4) DEFAULT '0.0000',
  `product_des` text,
  `i_class` int(1) unsigned NOT NULL DEFAULT '0',
  `unit` varchar(5) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `quote_items_fk1` (`ins`) USING BTREE,
  KEY `quote_items_fk2` (`quote_id`) USING BTREE,
  CONSTRAINT `quote_items_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `quote_items_fk2` FOREIGN KEY (`quote_id`) REFERENCES `rose_quotes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_registers`;
CREATE TABLE `rose_registers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ins` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `data` varchar(800) DEFAULT NULL,
  `data1` varchar(500) DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `rose_registers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `rose_roles`;
CREATE TABLE `rose_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ins` int(4) unsigned DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `roles_name_unique` (`name`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `rose_roles_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_roles` (`id`, `name`, `all`, `sort`, `status`, `ins`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2,	'Business Owner User',	0,	2,	0,	NULL,	1,	1,	NULL,	NULL,	NULL),
(3,	'Business Employee - Manager',	0,	3,	0,	NULL,	1,	1,	NULL,	NULL,	NULL),
(4,	'Business Employee - Sales Manager',	0,	5,	0,	NULL,	1,	1,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `rose_role_user`;
CREATE TABLE `rose_role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `role_user_user_id_foreign` (`user_id`) USING BTREE,
  KEY `role_user_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `rose_roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_sessions`;
CREATE TABLE `rose_sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_sms_settings`;
CREATE TABLE `rose_sms_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `driver_id` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `driver` varchar(50) NOT NULL DEFAULT 'Twilio',
  `username` varchar(400) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `data` varchar(400) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `email_settings_fk1` (`ins`) USING BTREE,
  CONSTRAINT `rose_sms_settings_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_sms_settings` (`id`, `active`, `driver_id`, `driver`, `username`, `password`, `sender`, `data`, `ins`, `created_at`, `updated_at`) VALUES
(1,	1,	7,	'Generic',	'send_field_name={to_mobile},message_field_name={to_message},METHOD=POST,URL=http://api.example.com/xyz,field1=abc,field2=YYY',	'pass',	'sender',	'fgfd',	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_suppliers`;
CREATE TABLE `rose_suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postbox` varchar(20) DEFAULT NULL,
  `email` varchar(90) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `taxid` varchar(100) DEFAULT NULL,
  `balance` float(16,2) DEFAULT '0.00',
  `docid` varchar(255) DEFAULT NULL,
  `custom1` varchar(255) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `password` varchar(191) DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `suppliers_fk1` (`ins`) USING BTREE,
  CONSTRAINT `suppliers_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_templates`;
CREATE TABLE `rose_templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ins` int(4) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `category` int(11) NOT NULL,
  `other` int(11) DEFAULT NULL,
  `info` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `rose_templates_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_templates` (`id`, `ins`, `title`, `body`, `category`, `other`, `info`, `created_at`, `updated_at`) VALUES
(1,	1,	'[{Company}] Invoice #{BillNumber} Generated',	'\r\nDear {Name},\r\n\r\n\r\nWe are contacting you in regard to an invoice # {BillNumber} that has been created on your account. You may find the invoice with below link.\r\n\r\nView Invoice\r\n{URL}\r\n\r\nWe look forward to conducting future business with you.\r\n\r\nKind Regards,\r\nTeam\r\n{CompanyDetails}\r\n\r\n',	1,	1,	'invoice_generated',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(2,	1,	'[{Company}] Invoice #{BillNumber} Payment Reminder',	'\r\nDear Client,\r\n\r\nWe are contacting you in regard to a payment reminder of invoice # {BillNumber} that has been created on your account. You may find the invoice with below link. Please pay the balance of {Amount} due by {DueDate}.\r\n\r\n\r\n\r\nView Invoice\r\n\r\n{URL}\r\n\r\n\r\n\r\nWe look forward to conducting future business with you.\r\n\r\n\r\n\r\nKind Regards,\r\n\r\n\r\n\r\nTeam\r\n\r\n\r\n\r\n{CompanyDetails}\r\n\r\n',	1,	2,	'invoice_payment_reminder',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(3,	1,	'[{Company}] Invoice #{BillNumber} Payment Received',	'\r\nDear Client,\r\n\r\n\r\nWe are contacting you in regard to a payment received for invoice  # {BillNumber} that has been created on your account. You can find the invoice with below link.\r\n\r\n\r\n\r\nView Invoice\r\n\r\n\r\n{URL}\r\n\r\n\r\n\r\nWe look forward to conducting future business with you.\r\n\r\n\r\n\r\nKind Regards,\r\n\r\n\r\n\r\nTeam\r\n\r\n\r\n\r\n{CompanyDetails}\r\n\r\n',	1,	3,	'invoice_payment_received',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(4,	1,	'{Company} Invoice #{BillNumber} OverDue',	'\r\nDear Client,\r\n\r\n\r\nWe are contacting you in regard to an Overdue Notice for invoice # {BillNumber} that has been created on your account. You may find the invoice with below link.\r\nPlease pay the balance of {Amount} due by {DueDate}.\r\n\r\n\r\nView Invoice\r\n\r\n\r\n{URL}\r\n\r\n\r\n\r\nWe look forward to conducting future business with you.\r\n\r\n\r\n\r\nKind Regards,\r\n\r\n\r\n\r\nTeam\r\n\r\n\r\n\r\n{CompanyDetails}\r\n\r\n',	1,	4,	'invoice_payment_overdue',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(5,	1,	'{Company} Invoice #{BillNumber} Refund Proceeded',	'\r\nDear Client,\r\n\r\n\r\nWe are contacting you in regard to a refund request processed for invoice # {BillNumber} that has been created on your account. You may find the invoice with below link. Please pay the balance of {Amount}  by {DueDate}.\r\n\r\n\r\n\r\nView Invoice\r\n\r\n\r\n{URL}\r\n\r\n\r\n\r\nWe look forward to conducting future business with you.\r\n\r\n\r\n\r\nKind Regards,\r\n\r\n\r\n\r\nTeam\r\n\r\n{CompanyDetails}\r\n\r\n',	1,	5,	'invoice_payment_refund',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(6,	1,	'SMS - New Invoice Notification',	'Dear Customer, new invoice  # {BillNumber} generated. {URL} Regards',	2,	11,	's_invoice_generated',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(7,	1,	'SMS - Invoice Payment Reminder',	'Dear Customer, Please make payment of invoice  # {BillNumber}. {URL} Regards',	2,	12,	's_invoice_payment_reminder',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(8,	1,	'SMS - Invoice Refund Proceeded',	'Dear Customer, Refund generated of invoice # {BillNumber}. {URL} Regards',	2,	15,	's_invoice_payment_refund',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(9,	1,	'SMS - Invoice payment Received',	'Dear Customer, Payment received of invoice # {BillNumber}. {URL} Regards',	2,	13,	's_invoice_payment_received',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(10,	1,	'SMS-Invoice Overdue Notice',	'Dear Customer, Dear Customer,Payment is overdue of invoice # {BillNumber}. {URL} Regards',	2,	14,	's_invoice_payment_overdue',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(161,	1,	'[{Company}] Quote #{BillNumber} Generated',	'\r\nDear {Name},\r\n\r\n\r\nWe are contacting you in regard to a quote # {BillNumber} that has been created on your account. You may find the quote with the below link.\r\n\r\nView Quote\r\n{URL}\r\n\r\nWe look forward to conducting future business with you.\r\n\r\nKind Regards,\r\nTeam\r\n{CompanyDetails}\r\n\r\n',	4,	6,	'quote_proposal',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(162,	1,	'SMS - New Quote Notification',	'Dear Customer, new Quote  # {BillNumber} generated. {URL} Regards',	4,	16,	's_quote_proposal',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(163,	1,	'[{Company}] {BillType} #{BillNumber} Generated',	'\r\nDear {Name},\r\n\r\n\r\nWe are contacting you in regard to a {BillType} # {BillNumber} that has been created on your account. You may find the {BillType} with the below link.\r\n\r\nView {BillType}\r\n{URL}\r\n\r\nWe look forward to conducting future business with you.\r\n\r\nKind Regards,\r\nTeam\r\n{CompanyDetails}\r\n\r\n',	5,	7,	'BillType_notification',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(164,	1,	'SMS - New {BillType} Notification',	'Dear Customer, new {BillType} # {BillNumber} generated. {URL} Regards',	5,	17,	's_BillType_notification',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(165,	1,	'[{Company}] {BillType} #{BillNumber} Generated',	'\r\nDear {Name},\r\n\r\n\r\nWe are contacting you in regard to a {BillType} # {BillNumber} that has been created on your account. You may find the {BillType} with the below link.\r\n\r\nView {BillType}\r\n{URL}\r\n\r\nWe look forward to conducting future business with you.\r\n\r\nKind Regards,\r\nTeam\r\n{CompanyDetails}\r\n\r\n',	9,	8,	'purchase_orders',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_terms`;
CREATE TABLE `rose_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` int(1) unsigned NOT NULL,
  `terms` text NOT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `terms_fk1` (`ins`) USING BTREE,
  CONSTRAINT `terms_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_terms` (`id`, `title`, `type`, `terms`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'Default Term',	0,	'Default Term',	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_threads`;
CREATE TABLE `rose_threads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `rose_todolists`;
CREATE TABLE `rose_todolists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `duedate` datetime NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `description` text,
  `creator_id` int(10) unsigned NOT NULL,
  `priority` enum('Low','Medium','High','Urgent') NOT NULL DEFAULT 'Medium',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `star` tinyint(1) unsigned DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `todolists_fk1` (`ins`) USING BTREE,
  CONSTRAINT `todolists_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_todolist_relations`;
CREATE TABLE `rose_todolist_relations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `todolist_id` bigint(20) unsigned NOT NULL,
  `related` int(11) unsigned NOT NULL,
  `rid` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `todolist_relations_fk1` (`todolist_id`) USING BTREE,
  CONSTRAINT `todolist_relations_fk1` FOREIGN KEY (`todolist_id`) REFERENCES `rose_todolists` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_transactions`;
CREATE TABLE `rose_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` bigint(20) unsigned NOT NULL,
  `trans_category_id` int(10) unsigned NOT NULL,
  `debit` decimal(16,4) DEFAULT '0.0000',
  `credit` decimal(16,4) DEFAULT '0.0000',
  `payer` varchar(200) DEFAULT NULL,
  `payer_id` bigint(20) unsigned DEFAULT '0',
  `method` varchar(100) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `bill_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `relation_id` int(1) unsigned DEFAULT '0',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `transactions_fk1` (`ins`) USING BTREE,
  KEY `transactions_fk3` (`trans_category_id`) USING BTREE,
  KEY `transactions_fk4` (`user_id`) USING BTREE,
  KEY `transactions_fk2` (`account_id`) USING BTREE,
  CONSTRAINT `transactions_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `transactions_fk2` FOREIGN KEY (`account_id`) REFERENCES `rose_accounts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `transactions_fk3` FOREIGN KEY (`trans_category_id`) REFERENCES `rose_transaction_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `transactions_fk4` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_transaction_categories`;
CREATE TABLE `rose_transaction_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `sub_category` int(1) unsigned DEFAULT '0',
  `sub_category_id` int(20) unsigned DEFAULT '0',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `transaction_categories_fk1` (`ins`) USING BTREE,
  CONSTRAINT `transaction_categories_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_transaction_categories` (`id`, `name`, `note`, `sub_category`, `sub_category_id`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'Sales Transactions',	'Sales Transactions',	0,	0,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(2,	'Purchase Transactions',	'Purchase Transactions',	0,	0,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_transaction_history`;
CREATE TABLE `rose_transaction_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `party_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `relation_id` int(1) unsigned DEFAULT '0',
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `transactions_fk1` (`ins`) USING BTREE,
  KEY `transactions_fk4` (`user_id`) USING BTREE,
  CONSTRAINT `rose_transaction_history_ibfk_1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rose_users`;
CREATE TABLE `rose_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_term_accept` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not accepted,1 = accepted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ins` int(4) unsigned DEFAULT NULL,
  `lang` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  KEY `users_fk1` (`ins`) USING BTREE,
  CONSTRAINT `users_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rose_users` (`id`, `first_name`, `last_name`, `email`, `picture`, `signature`, `password`, `status`, `confirmation_code`, `confirmed`, `is_term_accept`, `remember_token`, `ins`, `lang`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'John',	'Doe',	'superadmin@example.com',	NULL,	NULL,	'$2y$10$7YCZfHg7utfj59VHutaRyeUZoxl6C/FDW5glOWJbgB4iIEcWXZDWS',	1,	NULL,	1,	0,	NULL,	1,	'en',	1,	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55',	NULL);

DROP TABLE IF EXISTS `rose_user_gateways`;
CREATE TABLE `rose_user_gateways` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `fields` varchar(255) NOT NULL,
  `enable` enum('Yes','No') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rose_user_gateways` (`id`, `name`, `fields`, `enable`, `created_at`, `updated_at`) VALUES
(1,	'Stripe',	'{\"1\":\"key1\",\"2\":\"key2\"}',	'Yes',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(2,	'Paypal',	' {\"1\":\"key1\",\"2\":\"key2\"}',	'Yes',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55'),
(3,	'Test Gate',	'{\"1\":\"key1\",\"2\":\"key2\"}',	'No',	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

DROP TABLE IF EXISTS `rose_user_gateway_entries`;
CREATE TABLE `rose_user_gateway_entries` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_gateway_id` int(5) unsigned DEFAULT '0',
  `enable` enum('Yes','No') NOT NULL,
  `key1` varchar(255) NOT NULL,
  `key2` varchar(255) DEFAULT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'USD',
  `dev_mode` enum('true','false') NOT NULL DEFAULT 'true',
  `ord` int(5) unsigned NOT NULL,
  `surcharge` decimal(16,2) unsigned NOT NULL,
  `extra` varchar(40) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_index` (`user_gateway_id`,`ins`) USING BTREE,
  KEY `user_gateway_entries_fk1` (`ins`) USING BTREE,
  CONSTRAINT `user_gateway_entries_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `user_gateway_entries_fk2` FOREIGN KEY (`user_gateway_id`) REFERENCES `rose_user_gateways` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `rose_user_profiles`;
CREATE TABLE `rose_user_profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_profiles_user_id_foreign` (`user_id`) USING BTREE,
  CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `rose_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rose_user_profiles` (`id`, `user_id`, `address_1`, `city`, `state`, `country`, `postal`, `company`, `contact`, `tax_id`, `created_at`, `updated_at`) VALUES
(1,	1,	'Test Street',	'City',	'State',	'Country',	'123456',	'UltimateKode',	'07867867867',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `rose_warehouses`;
CREATE TABLE `rose_warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `ins` int(4) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ins` (`ins`) USING BTREE,
  CONSTRAINT `warehouses_fk1` FOREIGN KEY (`ins`) REFERENCES `rose_companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rose_warehouses` (`id`, `title`, `extra`, `ins`, `created_at`, `updated_at`) VALUES
(1,	'Default Product Warehouse',	'Default Product Warehouse',	1,	'2021-06-01 00:07:55',	'2021-06-01 00:07:55');

ALTER TABLE `rose_invoice_items` ADD `purchase_price` DECIMAL(16,4) NULL DEFAULT NULL AFTER `product_price`;

CREATE TABLE `rose_goals` ( `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT , `ins` BIGINT(20) UNSIGNED NOT NULL , `sales` DECIMAL UNSIGNED NULL DEFAULT NULL , `stock` DECIMAL UNSIGNED NULL DEFAULT NULL , `customers` INT UNSIGNED NULL DEFAULT NULL , `income` DECIMAL UNSIGNED NULL DEFAULT NULL , `expense` DECIMAL UNSIGNED NULL DEFAULT NULL , `month` INT UNSIGNED NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '1', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '2', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '3', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '4', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '5', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '6', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '7', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '8', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '9', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '10', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '11', current_timestamp(), current_timestamp());
INSERT INTO `rose_goals` (`id`, `ins`, `sales`, `stock`, `customers`, `income`, `expense`, `month`, `created_at`, `updated_at`) VALUES (NULL, '1', '10000', '50', '50', '10000', '10000', '12', current_timestamp(), current_timestamp());

ALTER TABLE `rose_companies` ADD `identy` VARCHAR(10) NULL DEFAULT NULL AFTER `valid`, ADD INDEX (`identy`);

INSERT INTO `rose_templates` (`id`, `ins`, `title`, `body`, `category`, `other`, `info`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Customer Account Activation', 'Dear Customer, Please activate your account using this link {URL} \r\nRegards', '1', '18', 'account_verification', current_timestamp(), current_timestamp());

CREATE TABLE `rose_activities` ( `id` BIGINT(20)  AUTO_INCREMENT , `ins` INT(4) NULL DEFAULT NULL , `user_id` BIGINT(20) NULL DEFAULT NULL , `module` VARCHAR(20) NULL DEFAULT NULL , `refer` BIGINT(20) NOT NULL , `action` VARCHAR(255) NOT NULL , `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `rose_oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `rose_oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `rose_oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `rose_oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `rose_oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `rose_oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rose_oauth_access_tokens_user_id_index` (`user_id`);
ALTER TABLE `rose_oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rose_oauth_auth_codes_user_id_index` (`user_id`);
ALTER TABLE `rose_oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rose_oauth_clients_user_id_index` (`user_id`);
ALTER TABLE `rose_oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `rose_oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rose_oauth_refresh_tokens_access_token_id_index` (`access_token_id`);
ALTER TABLE `rose_oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `rose_oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


-- 2021-06-01 00:10:50
