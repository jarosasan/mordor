-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017 m. Lap 21 d. 09:02
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morder`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `link` varchar(300) COLLATE utf8_bin NOT NULL,
  `image` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sukurta duomenų kopija lentelei `banners`
--

INSERT INTO `banners` (`id`, `name`, `link`, `image`) VALUES
(1, 'delfi', 'delfi.lt', ''),
(2, '15min', '15min.lt', ''),
(3, 'bite', 'bite.lt', ''),
(4, 'codeacademy', 'codeacademy.lt', ''),
(5, 'telia', 'telia.lt', ''),
(6, 'skalbiu', 'skelbiu.lt', '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `isRealPage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sukurta duomenų kopija lentelei `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `isRealPage`) VALUES
(3, 'Blog', '', 1),
(2, 'Contacts', 'Be sure you’ve loaded the alert plugin, or the compiled Bootstrap JavaScript.\r\nIf you’re building our JavaScript from source, it requires util.js. The compiled version includes this.\r\nAdd a dismiss button and the .alert-dismissible class, which adds extra padding to the right of the alert and positions the .close button.\r\nOn the dismiss button, add the data-dismiss=\"alert\" attribute, which triggers the JavaScript functionality. ', 1),
(1, 'Home', 'Be sure you’ve loaded the alert plugin, or the compiled Bootstrap JavaScript.\r\nIf you’re building our JavaScript from source, it requires util.js. The compiled version includes this.\r\nAdd a dismiss button and the .alert-dismissible class, which adds extra padding to the right of the alert and positions the .close button.\r\nOn the dismiss button, add the data-dismiss=\"alert\" attribute, which triggers the JavaScript functionality. ', 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sukurta duomenų kopija lentelei `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `date`) VALUES
(1, 'labas', 'For more straightforward sizing in CSS, we switch the global box-sizing value from content-box to border-box. This ensures padding does not affect the final computed width of an element, but it can cause problems with some third party software like Google Maps and Google Custom Search Engine.\r\n\r\nOn the rare occasion you need to override it, use something like the following:$title): array\r\n', '0000-00-00 00:00:00'),
(2, 'viso', 'For more straightforward sizing in CSS, we switch the global box-sizing value from content-box to border-box. This ensures padding does not affect the final computed width of an element, but it can cause problems with some third party software like Google Maps and Google Custom Search Engine.\r\n\r\nOn the rare occasion you need to override it, use something like the following:', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`title`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
