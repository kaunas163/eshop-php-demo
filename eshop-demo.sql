-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 04:09 AM
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
  `parent_category_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `parent_category_id`) VALUES
(1, 'kompiuteriai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si quicquam extra virtutem habeatur in bonis. Cum praesertim illa perdiscere ludus esset. At enim hic etiam dolore. Sed hoc sane concedamus. Duo Reges: constructio interrete. Confecta res esset. \r\n\r\nQuantum Aristoxeni ingenium consumptum videmus in musicis? Cur id non ita fit? Iam id ipsum absurdum, maximum malum neglegi. Quis istum dolorem timet? \r\n\r\nSi longus, levis; Quonam, inquit, modo? Sin aliud quid voles, postea. Recte dicis; Primum Theophrasti, Strato, physicum se voluit; Quis non odit sordidos, vanos, leves, futtiles? ', 0),
(4, 'nauja kompiuteriu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eademne, quae restincta siti? Haeret in salebra. Cyrenaici quidem non recusant; Falli igitur possumus.', 1),
(5, 'naujai atnaujinta', 'nauja aprasymo dalis t aliquid scire se gaudeant? Quamquam id quidem, infinitum est in hac urbe; Tuo vero id quidem, inquam, arbitratu. Duo Reges: constructio interrete. An haec ab eo non dicuntur? Gerendus est mos, modo recte sentiat. Avaritiamne minuis? ', 1),
(6, 'dar viena', 'Quamquam ab iis philosophiam et omnes ingenuas disciplinas habemus; Non autem hoc: igitur ne illud quidem. Cur id non ita fit? Qui ita affectus, beatum esse numquam probabis; Quid sequatur, quid repugnet, vident. Aliter enim explicari, quod quaeritur, non potest.  Quamquam ab iis philosophiam et omnes ingenuas disciplinas habemus; Non autem hoc: igitur ne illud quidem. Cur id non ita fit? Qui ita affectus, beatum esse numquam probabis; Quid sequatur, quid repugnet, vident. Aliter enim explicari, quod quaeritur, non potest. ', 0),
(7, 'blahbs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit enim idem caecus, debilis. Ille incendat? Itaque his sapiens semper vacabit. Graece donan, Latine voluptatem vocant. Beatum, inquit. \r\n\r\nTamen a proposito, inquam, aberramus. Quis istud, quaeso, nesciebat? Scrupulum, inquam, abeunti; Huius, Lyco, oratione locuples, rebus ipsis ielunior. Igitur ne dolorem quidem. Sit enim idem caecus, debilis. Aliter enim nosmet ipsos nosse non possumus. At enim hic etiam dolore. \r\n\r\nEtiam beatissimum? Sed fortuna fortis; An potest cupiditas finiri? Duo Reges: constructio interrete. ', 6),
(8, 'werty', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur id non ita fit? Non est igitur voluptas bonum. Duo Reges: constructio interrete. An tu me de L. Sed quid attinet de rebus tam apertis plura requirere? Facile est hoc cernere in primis puerorum aetatulis. \r\n\r\nSed mehercule pergrata mihi oratio tua. Erat enim res aperta. \r\n\r\nQuae diligentissime contra Aristonem dicuntur a Chryippo. Invidiosum nomen est, infame, suspectum. Ego vero isti, inquam, permitto. Nam ista vestra: Si gravis, brevis; ', 7),
(9, 'agfsdg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequentia exquirere, quoad sit id, quod volumus, effectum. Cui Tubuli nomen odio non est? Quod autem ratione actum est, id officium appellamus. Duo Reges: constructio interrete. Polycratem Samium felicem appellabant. Duarum enim vitarum nobis erunt instituta capienda. ', 4),
(10, 'affsdg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duo Reges: constructio interrete. An haec ab eo non dicuntur? ide, quantum, inquam, fallare, Torquate. Negat enim summo bono afferre incrementum diem. Sed hoc sane concedamus. Itaque his sapiens semper vacabit. ', 1);

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

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `category_id`) VALUES
(1, 'pirma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duo Reges: constructio interrete. Quid de Pythagora? Quod quidem iam fit etiam in Academia. An eiusdem modi? Utram tandem linguam nescio?', '10', 1),
(2, 'antra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non semper, inquam; Refert tamen, quo modo. Quo modo autem philosophus loquitur? Sed quod proximum fuit non vidit. Duo Reges: constructio interrete. Nihil enim hoc differt. Aliter enim explicari, quod quaeritur, non potest. Sedulo, inquam, faciam. Quid est igitur, inquit, quod requiras?', '15', 1),
(3, 'trecia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sequitur disserendi ratio cognitioque naturae; Tibi hoc incredibile, quod beatissimum. Ita nemo beato beatior. Tollenda est atque extrahenda radicitus. Illa tamen simplicia, vestra versuta. Ecce aliud simile dissimile. ', '20', 4),
(4, 'Ergo, inquit, tibi ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In schola desinis. Hoc tu nunc in illo probas. Duo Reges: constructio interrete. Compensabatur, inquit, cum summis doloribus laetitia. ', '8', 5),
(5, 'constructio interrete', 'Facile est hoc cernere in primis puerorum aetatulis. Duo Reges: constructio interrete. Aliter enim nosmet ipsos nosse non possumus. Primum in nostrane potestate est, quid meminerimus? Praeteritis, inquit, gaudeo. Id Sextilius factum negabat. ', '7', 5),
(6, 'Tollenda est atque ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliter enim explicari, quod quaeritur, non potest. Hoc non est positum in nostra actione. Quod cum dixissent, ille contra. Tollenda est atque extrahenda radicitus. dem modo? Duo Reges: constructio interrete. Quarum ambarum rerum cum medicinam pollicetur, luxuriae licentiam pollicetur. Recte, inquit, intellegis. ', '9', 6),
(7, 'Polemonis. Negat esse ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed plane dicit quod intellegit. Duo Reges: constructio interrete. Quare attende, quaeso. Sed haec in pueris; Erat enim Polemonis. Negat esse eam, inquit, propter se expetendam. Sed nimis multa. Aliter autem vobis placet. ', '45', 1),
(8, 'Iuppiter quam Epicurusaaaaaa', 'aaaaaLorem ipsum dolor sit amet, consectetur adipiscing elit. Bonum incolumis acies: misera caecitas. Videamus igitur sententias eorum, tum ad verba redeamus. Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; Beatum, inquit. Sed ad illum redeo. Duo Reges: constructio interrete. ', '887', 1),
(10, 'afsdg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Haec para/doca illi, nos admirabilia dicamus. Restinguet citius, si ardentem acceperit. Negare non possum. Duo enim genera quae erant, fecit tria. Tria genera bonorum; An eiusdem modi? ', '8778', 6),
(11, 'afsdfgs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Qui est in parvis malis. Quorum sine causa fieri nihil putandum est. Scrupulum, inquam, abeunti; Ipse Epicurus fortasse redderet, ut Sextus Peducaeus, Sex. ', '78', 5);

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
  `role` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(3, 'testas', '00d70a471879136635979f5441e3da51', 'user'),
(4, 'naujas', '8b5038bb02a5e0d3db1c729d552b98fe', 'user'),
(5, 'darvienas', 'fbde9b95f89bdfd3d502147003289c52', 'user');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
