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
CREATE TABLE `rose_activities` ( `id` BIGINT(20) NOT NULL AUTO_INCREMENT , `ins` INT(4) NULL DEFAULT NULL , `user_id` BIGINT(20) NULL DEFAULT NULL , `module` VARCHAR(20) NULL DEFAULT NULL , `refer` BIGINT(20) NOT NULL , `action` VARCHAR(255) NOT NULL , `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
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