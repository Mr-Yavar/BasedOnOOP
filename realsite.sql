-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2022 at 11:45 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `created_at`, `user_id`, `title`, `body`) VALUES
(4, '2022-08-01 06:43:07', 16, 'Lorem Ipsum!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus vel. Laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Justo eget magna fermentum iaculis. Donec adipiscing tristique risus nec feugiat. Velit scelerisque in dictum non consectetur a erat nam at. Condimentum id venenatis a condimentum. Et ligula ullamcorper malesuada proin libero nunc. Felis eget velit aliquet sagittis id. Placerat vestibulum lectus mauris ultrices. Justo eget magna fermentum iaculis.\r\n\r\nGravida arcu ac tortor dignissim convallis aenean et tortor at. Euismod elementum nisi quis eleifend quam adipiscing. Elit at imperdiet dui accumsan. Tempus imperdiet nulla malesuada pellentesque elit eget gravida cum. A erat nam at lectus urna duis. Ut sem viverra aliquet eget. Dolor sit amet consectetur adipiscing elit duis tristique. Rhoncus est pellentesque elit ullamcorper dignissim cras. At tempor commodo ullamcorper a lacus vestibulum sed arcu non. Vehicula ipsum a arcu cursus. Arcu ac tortor dignissim convallis aenean. Ullamcorper morbi tincidunt ornare massa eget egestas purus viverra. Pretium lectus quam id leo. Nisi lacus sed viverra tellus in. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Id nibh tortor id aliquet. Urna porttitor rhoncus dolor purus non enim. Ipsum a arcu cursus vitae congue mauris rhoncus aenean. Et pharetra pharetra massa massa ultricies mi quis hendrerit. In eu mi bibendum neque egestas congue quisque egestas diam.'),
(6, '2022-08-01 06:43:34', 16, 'Lorem Ipsum! 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus vel. Laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Justo eget magna fermentum iaculis. Donec adipiscing tristique risus nec feugiat. Velit scelerisque in dictum non consectetur a erat nam at. Condimentum id venenatis a condimentum. Et ligula ullamcorper malesuada proin libero nunc. Felis eget velit aliquet sagittis id. Placerat vestibulum lectus mauris ultrices. Justo eget magna fermentum iaculis.\r\n\r\nGravida arcu ac tortor dignissim convallis aenean et tortor at. Euismod elementum nisi quis eleifend quam adipiscing. Elit at imperdiet dui accumsan. Tempus imperdiet nulla malesuada pellentesque elit eget gravida cum. A erat nam at lectus urna duis. Ut sem viverra aliquet eget. Dolor sit amet consectetur adipiscing elit duis tristique. Rhoncus est pellentesque elit ullamcorper dignissim cras. At tempor commodo ullamcorper a lacus vestibulum sed arcu non. Vehicula ipsum a arcu cursus. Arcu ac tortor dignissim convallis aenean. Ullamcorper morbi tincidunt ornare massa eget egestas purus viverra. Pretium lectus quam id leo. Nisi lacus sed viverra tellus in. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Id nibh tortor id aliquet. Urna porttitor rhoncus dolor purus non enim. Ipsum a arcu cursus vitae congue mauris rhoncus aenean. Et pharetra pharetra massa massa ultricies mi quis hendrerit. In eu mi bibendum neque egestas congue quisque egestas diam.'),
(5, '2022-08-01 06:43:17', 16, 'Lorem Ipsum! 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus vel. Laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Justo eget magna fermentum iaculis. Donec adipiscing tristique risus nec feugiat. Velit scelerisque in dictum non consectetur a erat nam at. Condimentum id venenatis a condimentum. Et ligula ullamcorper malesuada proin libero nunc. Felis eget velit aliquet sagittis id. Placerat vestibulum lectus mauris ultrices. Justo eget magna fermentum iaculis.\r\n\r\nGravida arcu ac tortor dignissim convallis aenean et tortor at. Euismod elementum nisi quis eleifend quam adipiscing. Elit at imperdiet dui accumsan. Tempus imperdiet nulla malesuada pellentesque elit eget gravida cum. A erat nam at lectus urna duis. Ut sem viverra aliquet eget. Dolor sit amet consectetur adipiscing elit duis tristique. Rhoncus est pellentesque elit ullamcorper dignissim cras. At tempor commodo ullamcorper a lacus vestibulum sed arcu non. Vehicula ipsum a arcu cursus. Arcu ac tortor dignissim convallis aenean. Ullamcorper morbi tincidunt ornare massa eget egestas purus viverra. Pretium lectus quam id leo. Nisi lacus sed viverra tellus in. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Id nibh tortor id aliquet. Urna porttitor rhoncus dolor purus non enim. Ipsum a arcu cursus vitae congue mauris rhoncus aenean. Et pharetra pharetra massa massa ultricies mi quis hendrerit. In eu mi bibendum neque egestas congue quisque egestas diam.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(256) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(72) NOT NULL,
  `t` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `remember_token`, `password`, `created_at`, `username`, `t`) VALUES
(1, 'admin', 'Alex', 'Alex@email.com', 'lryJuzEXeAQxAY8RaxO01IOeb0RnWwRxYwgef8yRhRoo59JhxaJWWYg8Im46KAvB712dFd0Lqjc2j6bIkqzwraw5CNN8OgeJO1kCGbn3YswQRddzLbGxsvZCh9bzjCtsGgUPSKGI21aHGwxVkK8SPEWdeUIQ3BLX6s8oV6f2W5rvsWFK8SXwhRJAjpqwQa2bUVYC5M95GgadqkgdxgI5XDmJzOEjxlf4CcsIjlFSyy3hMSXAWep2LZ1UjL', 'GCq+Ok1QgrJ7HhKht4fDRg==', '2021-08-10 19:30:00', 'mr_yavar', ''),
(2, 'user', 'Mike', 'mike@outlook.com', NULL, 'GCq+Ok1QgrJ7HhKht4fDRg==', '2021-08-11 19:30:00', 'sir_yavar', ''),
(16, 'admin', 'John', 'john@outlook.com', NULL, 'vJP+RBORy+EaFBTXnkN3wg==', '2022-07-31 19:30:00', 'mr_yava1r', ''),
(17, 'user', 'shahin', 'shahin@email.com', NULL, 'GCq+Ok1QgrJ7HhKht4fDRg==', '2022-07-31 19:30:00', 'shahin', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
