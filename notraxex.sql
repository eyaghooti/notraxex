-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notrax`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `title_fa` varchar(500) NOT NULL,
  `content_fa` text NOT NULL,
  `url` varchar(1000) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `source` varchar(255) DEFAULT NULL,
  `archived` tinyint(1) DEFAULT 0,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `title_fa`, `content_fa`, `url`, `tags`, `created_at`, `source`, `archived`, `link`) VALUES
(1, 'Questionable decentralization: Sui network freezes $220 million from hack', 'The Sui Foundation coordinated the freezing of stolen funds from the Cetus hack, raising questions about decentralization. The article Questionable decentralization: Sui network freezes $220 million from hack was first published on Crypto Valley Journal.', '📌 Questionable decentralization: Sui network freezes $220 million from hack', 'The Sui Foundation coordinated the freezing of stolen funds from the Cetus hack, raising questions about decentralization. The article Questionable decentralization: Sui network freezes $220 million from hack was first published on Crypto Valley Journal.', '', NULL, '2025-05-30 08:18:28', NULL, 0, NULL),
(2, 'Enerji ithalat faturası nisan ayında %3,2 azaldı: Petrol fiyatlarındaki düşüş enerji ithalatını geriletti', '', '', '', '', NULL, '2025-05-29 15:53:13', '', 0, NULL),
(3, 'Trump’a mahkeme freni, demir cevherine can verdi: Demir fiyatları yeniden yükselişe geçti', '', '', '', '', NULL, '2025-05-29 15:51:37', '', 0, NULL),
(4, 'RedStone и Securitize запустили токенизированные активы на Solana для DeFi-протоколов', '', '', '', '', NULL, '2025-05-29 15:51:18', '', 0, NULL),
(5, 'Goldman Sachs: Mahkeme kararı ABD’nin başlıca ticaret ortakları için nihai sonucu değiştirmeyebilir', '', '', '', '', NULL, '2025-05-29 15:50:34', '', 0, NULL),
(6, 'Wen FOMO kicks in', '', '', '', '', NULL, '2025-05-29 15:50:21', '', 0, NULL),
(7, 'Musk Exits DOGE After Political Backlash and Legal Heat', '', '', '', '', NULL, '2025-05-29 15:47:11', '', 0, NULL),
(8, 'GMOコイン、最大10万円相当のNOT A HOTEL COIN（NAC）プレゼントキャンペーン開催', '', '', '', '', NULL, '2025-05-29 15:46:41', '', 0, NULL),
(9, 'Sony si prepara a scorporare il ramo finanziario: un passo storico per il colosso giapponese', '', '', '', '', NULL, '2025-05-29 15:45:45', '', 0, NULL),
(10, 'Ripple Highlights RLUSD’s Role in Expanding $31.6 Trillion Cross-Border Payments Market', '', '', '', '', NULL, '2025-05-29 15:45:00', '', 0, NULL),
(11, 'Trump’ın tarife freni, petrol fiyatlarını ateşledi', '', '', '', '', NULL, '2025-05-29 15:43:47', '', 0, NULL),
(12, 'Nvidia supera previsiones pese a veto a China y pérdida de 8.000 millones', '', '', '', '', NULL, '2025-05-29 15:43:25', '', 0, NULL),
(13, 'Mahkemeden Trump’a Tarife Freni', '', '', '', '', NULL, '2025-05-29 15:43:07', '', 0, NULL),
(14, 'وزارة العمل الأمريكية ترفع القيود المفروضة على العملات الرقمية في عهد بايدن على خطط التقاعد 401 (ك)', '', '', '', '', NULL, '2025-05-29 15:42:34', '', 0, NULL),
(15, 'Министерство труда США отменило введенные Байденом ограничения на криптовалюты для пенсионных планов 401(k)', '', '', '', '', NULL, '2025-05-29 15:42:34', '', 0, NULL),
(16, 'El Departamento de Trabajo de EEUU levanta las restricciones criptográficas de la era Biden para los planes de jubilación 401(k)', '', '', '', '', NULL, '2025-05-29 15:42:34', '', 0, NULL),
(17, 'US-Arbeitsministerium hebt Biden-Ära Krypto-Beschränkungen für 401(k)-Rentenpläne auf', '', '', '', '', NULL, '2025-05-29 15:42:34', '', 0, NULL),
(18, 'US Labor Dept Lifts Biden-Era Crypto Restrictions for 401(k) Retirement Plans', '', '', '', '', NULL, '2025-05-29 15:42:34', '', 0, NULL),
(19, 'ZKsync запускает Prividium — решение для выхода традиционных финансов в Web3', '', '', '', '', NULL, '2025-05-29 15:42:32', '', 0, NULL),
(20, 'Rusya’dan Kripto İçin Kritik Yeşil Işık: Bağlantılı Ürünlere İzin Verdi!', '', '', '', '', NULL, '2025-05-29 15:41:52', '', 0, NULL),
(21, 'Глава MARA призвал власти США заняться майнингом для пополнения биткоин-резерва', '', '', '', '', NULL, '2025-05-29 15:41:01', '', 0, NULL),
(22, '5 acciones en el foco este jueves: BBY, HRL, NVDA, DELL y COST', '', '', '', '', NULL, '2025-05-29 15:56:54', '', 0, NULL),
(23, 'Binance Japan Achieves ISO/IEC Certifications for Security, Privacy', '', '', '', '', NULL, '2025-05-29 15:56:16', '', 0, NULL),
(24, 'İngiltere hizmet sektörü güveni 2,5 yılın en düşük seviyesinde', '', '', '', '', NULL, '2025-05-29 15:55:54', '', 0, NULL),
(25, 'ビットコイン 2025年末までにいくらになるか？ 13万ドルから100万ドル超まで最新予測まとめ', '', '', '', '', NULL, '2025-05-29 15:55:00', '', 0, NULL),
(26, 'Ethereum koers knalt door $2.700: begin van nieuwe bullrun?', '', '', '', '', NULL, '2025-05-29 15:54:00', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `created_at`) VALUES
(1, 'تحلیل تکنیکال بیت‌کوین امروز', '2025-05-18 20:26:25'),
(2, 'بررسی تفاوت کیف پول سخت‌افزاری و نرم‌افزاری', '2025-05-18 20:26:25'),
(3, '۵ اشتباه رایج در خرید و فروش رمز ارز', '2025-05-18 20:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `national_id` varchar(20) DEFAULT NULL,
  `selfie_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kyc_requests`
--

CREATE TABLE `kyc_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_image` varchar(255) DEFAULT NULL,
  `selfie_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kyc_requests`
--

INSERT INTO `kyc_requests` (`id`, `user_id`, `card_image`, `selfie_image`, `description`, `status`, `created_at`) VALUES
(1, 1, 'روی کارت ملی.jpg', 'روی کارت ملی.jpg', 'سلام', 'pending', '2025-05-18 19:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('buy','sell') NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `amount` decimal(20,8) NOT NULL,
  `price` decimal(20,8) NOT NULL,
  `total` decimal(20,8) GENERATED ALWAYS AS (`amount` * `price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL,
  `used` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pair` varchar(20) NOT NULL,
  `type` enum('buy','sell') NOT NULL,
  `price` decimal(18,8) NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `status` enum('open','closed','cancelled') NOT NULL DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('deposit','withdraw') NOT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `amount` decimal(20,8) NOT NULL,
  `txid` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` decimal(20,8) DEFAULT NULL,
  `order_type` enum('market','limit') NOT NULL DEFAULT 'limit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `type`, `symbol`, `amount`, `txid`, `status`, `created_at`, `price`, `order_type`) VALUES
(1, 1, 'deposit', NULL, 1212.00000000, '123', 'approved', '2025-05-18 20:31:59', NULL, 'limit'),
(24, 1, '', 'BTCUSDT', 120120120.00000000, NULL, 'pending', '2025-05-18 22:35:18', NULL, 'limit'),
(25, 1, '', 'BTCUSDT', 101.00000000, NULL, 'pending', '2025-05-20 21:06:57', NULL, 'limit'),
(26, 1, '', 'BTCUSDT', 20.00000000, NULL, 'pending', '2025-05-21 12:56:09', NULL, 'limit'),
(27, 1, '', 'BTCUSDT', 1.00000000, NULL, 'pending', '2025-05-21 14:09:41', NULL, 'limit'),
(29, 1, '', 'BTCUSDT', 10.00000000, NULL, 'pending', '2025-05-24 20:32:10', NULL, 'limit'),
(34, 1, '', 'BTCUSDT', 0.50000000, NULL, 'pending', '2025-05-24 21:40:17', 65000.00000000, 'limit'),
(35, 1, '', 'BTCUSDT', 23.00000000, NULL, 'pending', '2025-05-24 21:40:35', NULL, 'market'),
(36, 1, '', 'BTCUSDT', 500.00000000, NULL, 'pending', '2025-05-25 19:58:31', 107756.50000000, 'market'),
(37, 1, 'deposit', 'USDTUSDT', 100000000.00000000, NULL, 'approved', '2025-05-27 08:10:09', NULL, 'limit'),
(38, 1, 'deposit', 'IRTUSDT', 2000000.00000000, NULL, 'approved', '2025-05-27 08:34:24', NULL, 'limit'),
(39, 1, 'deposit', 'USDTUSDT', 10.00000000, NULL, 'approved', '2025-05-29 22:38:48', NULL, 'limit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `login_alerts` tinyint(1) DEFAULT 1,
  `ip_address` varchar(45) DEFAULT NULL,
  `language` varchar(10) DEFAULT 'fa',
  `theme` varchar(10) DEFAULT 'light',
  `2fa_enabled` tinyint(1) DEFAULT 0,
  `2fa_code` varchar(10) DEFAULT NULL,
  `2fa_expires` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) DEFAULT 'user',
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `is_admin`, `last_login`, `login_alerts`, `ip_address`, `language`, `theme`, `2fa_enabled`, `2fa_code`, `2fa_expires`, `is_verified`, `created_at`, `role`, `reset_token`, `reset_expires`) VALUES
(1, 'e.yaghooti@gmail.com', NULL, '$2y$10$LilUUBZVwvlsGfXuHPV2w.MNGIh2/WjIRidNBX2IY1t5SYf2bRleu', 0, '2025-05-28 09:37:22', 1, '::1', 'fa', 'light', 0, NULL, NULL, 1, '2025-05-18 22:03:41', 'admin', NULL, NULL),
(8, 'e.yaghouti@outlook.com', 'ey', '$2y$10$OZllG8F/g3TTVM5uITZD..4XGPoYuck3OAJwBEmdoDVChkGigCkCq', 0, NULL, 1, NULL, 'fa', 'light', 0, NULL, NULL, 1, '2025-06-01 18:52:09', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` decimal(20,8) DEFAULT 0.00000000,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `currency` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `updated_at`, `currency`, `address`) VALUES
(1, 1, 1725.00000000, '2025-05-27 08:12:32', 'BTC', NULL),
(3, 1, 0.00000000, '2025-05-18 21:37:39', 'ETH', 'ETH-d25cb291151a'),
(4, 1, 44696410.47000000, '2025-05-29 22:43:05', 'USDT', 'USDT-2d498e8505ca'),
(5, 1, 2000000.00000000, '2025-05-27 08:34:24', 'IRT', 'IRT-3311dec5e887'),
(6, 1, 0.00000000, '2025-05-29 22:40:37', 'BNB', 'BNB-1699e5d8332b'),
(7, 1, 0.00000000, '2025-05-29 22:40:37', 'XRP', 'XRP-45a027522e4b'),
(8, 1, 0.00000000, '2025-05-29 22:40:37', 'SOL', 'SOL-5e090ab2d7a8');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` decimal(20,8) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kyc_requests`
--
ALTER TABLE `kyc_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`type`,`symbol`,`amount`,`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`currency`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`currency`,`amount`,`address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kyc_requests`
--
ALTER TABLE `kyc_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trades`
--
ALTER TABLE `trades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kyc`
--
ALTER TABLE `kyc`
  ADD CONSTRAINT `kyc_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trades`
--
ALTER TABLE `trades`
  ADD CONSTRAINT `trades_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
