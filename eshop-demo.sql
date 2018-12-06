-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 11:16 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop-demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(45) COLLATE utf8_bin NOT NULL,
  `postal` varchar(45) COLLATE utf8_bin NOT NULL,
  `country` varchar(45) COLLATE utf8_bin NOT NULL,
  `address_line` varchar(45) COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` longtext COLLATE utf8_bin,
  `parent_category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `parent_category_id`) VALUES
(1, 'kompiuteriai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si quicquam extra virtutem habeatur in bonis. Cum praesertim illa perdiscere ludus esset. At enim hic etiam dolore. Sed hoc sane concedamus. Duo Reges: constructio interrete. Confecta res esset. \r\n\r\nQuantum Aristoxeni ingenium consumptum videmus in musicis? Cur id non ita fit? Iam id ipsum absurdum, maximum malum neglegi. Quis istum dolorem timet? \r\n\r\nSi longus, levis; Quonam, inquit, modo? Sin aliud quid voles, postea. Recte dicis; Primum Theophrasti, Strato, physicum se voluit; Quis non odit sordidos, vanos, leves, futtiles? ', NULL),
(2, 'nešiojamieji', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid enim? Sed hoc sane concedamus. Ecce aliud simile dissimile. Multoque hoc melius nos veriusque quam Stoici. \r\n\r\nIstam voluptatem, inquit, Epicurus ignorat? Quae cum dixisset paulumque institisset, Quid est? Nosti, credo, illud: Nemo pius est, qui pietatem-; Sed ille, ut dixi, vitiose. \r\n\r\nQuae diligentissime contra Aristonem dicuntur a Chryippo. Bestiarum vero nullum iudicium puto. Primum in nostrane potestate est, quid meminerimus? Quae quidem sapientes sequuntur duce natura tamquam videntes; Duo Reges: constructio interrete. Aperiendum est igitur, quid sit voluptas; ', 1),
(3, 'stacionarūs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Haeret in salebra. Apud ceteros autem philosophos, qui quaesivit aliquid, tacet; At multis malis affectus. Quis est tam dissimile homini. Itaque contra est, ac dicitis; \r\n\r\nItaque ab his ordiamur. Quae contraria sunt his, malane? Hos contra singulos dici est melius. Quis non odit sordidos, vanos, leves, futtiles? Quod totum contra est. Nihilo beatiorem esse Metellum quam Regulum. At enim sequor utilitatem. Rationis enim perfectio est virtus; \r\n\r\nDuo Reges: constructio interrete. Sic enim censent, oportunitatis esse beate vivere. Cur iustitia laudatur? Nemo igitur esse beatus potest. Magna laus. Itaque hic ipse iam pridem est reiectus; Eam tum adesse, cum dolor omnis absit; Quorum altera prosunt, nocent altera. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` longtext COLLATE utf8_bin,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `products_in_orders`
--

CREATE TABLE `products_in_orders` (
  `products_id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(45) COLLATE utf8_bin NOT NULL,
  `role` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_addresses_users1_idx` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`address_id`,`user_id`),
  ADD KEY `fk_orders_addresses1_idx` (`address_id`),
  ADD KEY `fk_orders_users1_idx` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`category_id`),
  ADD KEY `fk_products_categories1_idx` (`category_id`);

--
-- Indexes for table `products_in_orders`
--
ALTER TABLE `products_in_orders`
  ADD PRIMARY KEY (`products_id`,`orders_id`),
  ADD KEY `fk_products_has_orders_orders1_idx` (`orders_id`),
  ADD KEY `fk_products_has_orders_products1_idx` (`products_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `fk_addresses_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_addresses1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products_in_orders`
--
ALTER TABLE `products_in_orders`
  ADD CONSTRAINT `fk_products_has_orders_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_has_orders_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `categories` CHANGE `parent_category_id` `parent_category_id` INT(10) UNSIGNED NOT NULL DEFAULT '0'; 

ALTER TABLE `users` CHANGE `role` `role` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'user'; 

