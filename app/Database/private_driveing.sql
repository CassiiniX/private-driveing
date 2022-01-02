-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 01:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `private_driveing`
--

-- --------------------------------------------------------

--
-- Table structure for table `articels`
--

CREATE TABLE `articels` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` text NOT NULL DEFAULT 'default.png',
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articels`
--

INSERT INTO `articels` (`id`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'articel 0', 'default-1.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(2, 'articel 1', 'default-6.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(3, 'articel 2', 'default-3.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(4, 'articel 3', 'default-1.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(5, 'articel 4', 'default-5.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(6, 'articel 5', 'default-6.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(7, 'articel 6', 'default-4.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(8, 'articel 7', 'default-6.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53'),
(9, 'articel 8', 'default-4.png', '<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>', '2021-01-12 06:15:53', '2021-01-12 06:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Kursus Mengemudi', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(2, 'course_max_hour', '3', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(3, 'payment_day', '3', '2021-01-12 06:15:49', '2021-01-12 06:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'user0', 'user@user0.com', '089999990', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(2, 'user1', 'user@user1.com', '089999991', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(3, 'user2', 'user@user2.com', '089999992', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(4, 'user3', 'user@user3.com', '089999993', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(5, 'user4', 'user@user4.com', '089999994', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(6, 'user5', 'user@user5.com', '089999995', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(7, 'user6', 'user@user6.com', '089999996', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(8, 'user7', 'user@user7.com', '089999997', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(9, 'user8', 'user@user8.com', '089999998', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(10, 'user9', 'user@user9.com', '089999999', 'MESSAGE', '2021-01-12 06:15:49', '2021-01-12 06:15:49'),
(11, 'user10', 'user@user10.com', '0899999910', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(12, 'user11', 'user@user11.com', '0899999911', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(13, 'user12', 'user@user12.com', '0899999912', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(14, 'user13', 'user@user13.com', '0899999913', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(15, 'user14', 'user@user14.com', '0899999914', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(16, 'user15', 'user@user15.com', '0899999915', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(17, 'user16', 'user@user16.com', '0899999916', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(18, 'user17', 'user@user17.com', '0899999917', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(19, 'user18', 'user@user18.com', '0899999918', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(20, 'user19', 'user@user19.com', '0899999919', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(21, 'user20', 'user@user20.com', '0899999920', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(22, 'user21', 'user@user21.com', '0899999921', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(23, 'user22', 'user@user22.com', '0899999922', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(24, 'user23', 'user@user23.com', '0899999923', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(25, 'user24', 'user@user24.com', '0899999924', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(26, 'user25', 'user@user25.com', '0899999925', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(27, 'user26', 'user@user26.com', '0899999926', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(28, 'user27', 'user@user27.com', '0899999927', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(29, 'user28', 'user@user28.com', '0899999928', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(30, 'user29', 'user@user29.com', '0899999929', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(31, 'user30', 'user@user30.com', '0899999930', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(32, 'user31', 'user@user31.com', '0899999931', 'MESSAGE', '2021-01-12 06:15:50', '2021-01-12 06:15:50'),
(33, 'user32', 'user@user32.com', '0899999932', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(34, 'user33', 'user@user33.com', '0899999933', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(35, 'user34', 'user@user34.com', '0899999934', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(36, 'user35', 'user@user35.com', '0899999935', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(37, 'user36', 'user@user36.com', '0899999936', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(38, 'user37', 'user@user37.com', '0899999937', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(39, 'user38', 'user@user38.com', '0899999938', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(40, 'user39', 'user@user39.com', '0899999939', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(41, 'user40', 'user@user40.com', '0899999940', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(42, 'user41', 'user@user41.com', '0899999941', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(43, 'user42', 'user@user42.com', '0899999942', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(44, 'user43', 'user@user43.com', '0899999943', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(45, 'user44', 'user@user44.com', '0899999944', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(46, 'user45', 'user@user45.com', '0899999945', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(47, 'user46', 'user@user46.com', '0899999946', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(48, 'user47', 'user@user47.com', '0899999947', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(49, 'user48', 'user@user48.com', '0899999948', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(50, 'user49', 'user@user49.com', '0899999949', 'MESSAGE', '2021-01-12 06:15:51', '2021-01-12 06:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `instructur_id` int(11) UNSIGNED NOT NULL,
  `meet` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `clock_start` time NOT NULL,
  `status` enum('pending','payment','waiting','running','success','failed','canceled','rejected') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `galeries`
--

CREATE TABLE `galeries` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `images` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeries`
--

INSERT INTO `galeries` (`id`, `title`, `images`, `created_at`, `updated_at`) VALUES
(1, 'galery 1', '[\"default.png\",\"default-1.png\",\"default-2.png\"]', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(2, 'galery 2', '[\"default-3.png\",\"default-4.png\",\"default-5.png\"]', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(3, 'galery 3', '[\"default-6.png\"]', '2021-01-12 06:15:53', '2021-01-12 06:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `instructurs`
--

CREATE TABLE `instructurs` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `star` int(5) NOT NULL DEFAULT 0,
  `photo` varchar(50) NOT NULL DEFAULT 'default.png',
  `status` enum('active','nonactive','hire') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructurs`
--

INSERT INTO `instructurs` (`id`, `name`, `email`, `phone`, `star`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'instructur0', 'instructur@instructur0.com', '089999990', 0, 'default.png', 'active', '2021-01-12 06:15:51', '2021-01-12 06:15:51'),
(2, 'instructur1', 'instructur@instructur1.com', '089999991', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(3, 'instructur2', 'instructur@instructur2.com', '089999992', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(4, 'instructur3', 'instructur@instructur3.com', '089999993', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(5, 'instructur4', 'instructur@instructur4.com', '089999994', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(6, 'instructur5', 'instructur@instructur5.com', '089999995', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(7, 'instructur6', 'instructur@instructur6.com', '089999996', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(8, 'instructur7', 'instructur@instructur7.com', '089999997', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(9, 'instructur8', 'instructur@instructur8.com', '089999998', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(10, 'instructur9', 'instructur@instructur9.com', '089999999', 0, 'default.png', 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `instructur_feedbacks`
--

CREATE TABLE `instructur_feedbacks` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `instructur_id` int(11) UNSIGNED NOT NULL,
  `star` int(5) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manual_payments`
--

CREATE TABLE `manual_payments` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL,
  `proof` text NOT NULL,
  `description` text NOT NULL,
  `status` enum('failed','success','validasi') NOT NULL DEFAULT 'validasi',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-16-123212', 'App\\Database\\Migrations\\Users', 'default', 'App', 1610453664, 1),
(2, '2020-12-16-123227', 'App\\Database\\Migrations\\Configs', 'default', 'App', 1610453665, 1),
(3, '2020-12-16-123351', 'App\\Database\\Migrations\\Contacts', 'default', 'App', 1610453665, 1),
(4, '2020-12-16-123456', 'App\\Database\\Migrations\\Instructurs', 'default', 'App', 1610453666, 1),
(5, '2020-12-16-123509', 'App\\Database\\Migrations\\Packages', 'default', 'App', 1610453666, 1),
(6, '2020-12-16-123520', 'App\\Database\\Migrations\\Courses', 'default', 'App', 1610453666, 1),
(7, '2020-12-16-123552', 'App\\Database\\Migrations\\Articels', 'default', 'App', 1610453666, 1),
(8, '2020-12-16-123558', 'App\\Database\\Migrations\\Galeries', 'default', 'App', 1610453667, 1),
(9, '2020-12-16-123625', 'App\\Database\\Migrations\\InstructurFeedbacks', 'default', 'App', 1610453667, 1),
(10, '2021-01-08-091807', 'App\\Database\\Migrations\\ManualPayments', 'default', 'App', 1610453668, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `meet` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` enum('active','nonactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `meet`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'package - 0', 11, 220747, 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(2, 'package - 1', 6, 282328, 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(3, 'package - 2', 14, 497783, 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(4, 'package - 3', 17, 419759, 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52'),
(5, 'package - 4', 7, 416591, 'active', '2021-01-12 06:15:52', '2021-01-12 06:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'default.png',
  `phone` varchar(25) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `photo`, `phone`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2a$12$ufd6ehUwj0kvabfXbkarvemJSOBepLuT6rvM/j4NPgqQ15OR7R7wS', 'default.png', '089999999999', 'admin', '2021-01-12 06:14:51', '2021-01-12 06:14:51'),
(2, 'user', 'user@user.com', '$2a$12$ZLrtWbbKyw9Sr0A8UY1wjechDwOnhK9Cw9Q54YNmqbCEp0De/jbfi', 'default.png', '08888888888', 'user', '2021-01-12 06:14:52', '2021-01-12 06:14:52'),
(3, 'user0', 'user0@user.com', '$2a$12$Eowbm/W8TWzI4LCgdzbEn.D4dejo6YMTmd7bGRg/tAn0GqxIXmVcu', 'default.png', '0898989890', 'user', '2021-01-12 06:14:53', '2021-01-12 06:14:53'),
(4, 'user1', 'user1@user.com', '$2a$12$EV9WpV0hR/LjmMqIw3HMueZ89XI3rKWEWcumrIhNZqgwLAvBZ5LiK', 'default.png', '0898989891', 'user', '2021-01-12 06:14:53', '2021-01-12 06:14:53'),
(5, 'user2', 'user2@user.com', '$2a$12$aBoFVZkYbPHfWDzMQa/Mluq.7x4.4NX2zZuHK94wT1HvvQtv4Ji6O', 'default.png', '0898989892', 'user', '2021-01-12 06:14:54', '2021-01-12 06:14:54'),
(6, 'user3', 'user3@user.com', '$2a$12$gx5B8HMZsCOfjic3l20Mx.nuc57qnGI.ONjuMTSe01MSLp0e3C452', 'default.png', '0898989893', 'user', '2021-01-12 06:14:54', '2021-01-12 06:14:54'),
(7, 'user4', 'user4@user.com', '$2a$12$oMdHNA51W8T4Zd0e0ry5fer70fhryUgm2YrU/6INUHWYz9MWqNTSe', 'default.png', '0898989894', 'user', '2021-01-12 06:14:55', '2021-01-12 06:14:55'),
(8, 'user5', 'user5@user.com', '$2a$12$uzN6cCROkrdwTUMOIgJVg.S1cFmMrJjdX0c0mi1gKlOJoxCis.m1m', 'default.png', '0898989895', 'user', '2021-01-12 06:14:55', '2021-01-12 06:14:55'),
(9, 'user6', 'user6@user.com', '$2a$12$B1D3VIy1KBrH5zb3Low2FeH98hPr6tH9iwUmS1Tm7jnydZnkSYm4K', 'default.png', '0898989896', 'user', '2021-01-12 06:14:56', '2021-01-12 06:14:56'),
(10, 'user7', 'user7@user.com', '$2a$12$wXcaLaobzS3ptHTMgTLSfuK/Zc0r2riTTDPAW./IVfAIbvJChfwWe', 'default.png', '0898989897', 'user', '2021-01-12 06:14:56', '2021-01-12 06:14:56'),
(11, 'user8', 'user8@user.com', '$2a$12$Rb/9ElCnGO2lBgruQUpffecUk45tWiK3cwPYpzpzQx8iMLx..L3R6', 'default.png', '0898989898', 'user', '2021-01-12 06:14:57', '2021-01-12 06:14:57'),
(12, 'user9', 'user9@user.com', '$2a$12$sLviiZyCwrCxI8qLwdKTke8nHP2NGo6QBGFGdSE/DEqZS7k9E/ztG', 'default.png', '0898989899', 'user', '2021-01-12 06:14:58', '2021-01-12 06:14:58'),
(13, 'user10', 'user10@user.com', '$2a$12$Pu4D/L7TknXAowd6.gB1CuD.IyW51jyKaiwqd0k3zx9FgAqy7YZ1.', 'default.png', '08989898910', 'user', '2021-01-12 06:14:58', '2021-01-12 06:14:58'),
(14, 'user11', 'user11@user.com', '$2a$12$QrhioD0u3Re6xpykmRL.6uCY4TUP6y9isxogvYKyP5OfWg0T8PdVO', 'default.png', '08989898911', 'user', '2021-01-12 06:14:59', '2021-01-12 06:14:59'),
(15, 'user12', 'user12@user.com', '$2a$12$UB6rqkdVFzw0dqeL.Px3NOP76lh9XY7Sx2j74OpBENja23byiBtjK', 'default.png', '08989898912', 'user', '2021-01-12 06:15:00', '2021-01-12 06:15:00'),
(16, 'user13', 'user13@user.com', '$2a$12$YoE67ogGQuH1JLRTpJotueyCIZ.F5ub6KVqpXC4uUDZpK/vJy1OJS', 'default.png', '08989898913', 'user', '2021-01-12 06:15:00', '2021-01-12 06:15:00'),
(17, 'user14', 'user14@user.com', '$2a$12$w.cdXQ3dlMjaRSf8gj94EekrEQv.bE3AcLShqMBKKBmkA2cZy1OTG', 'default.png', '08989898914', 'user', '2021-01-12 06:15:01', '2021-01-12 06:15:01'),
(18, 'user15', 'user15@user.com', '$2a$12$UsE1B2XUBG/C9lMMjqh9ruhDaYbpGXxxYB5zxKZ9uz9WQHSf3L/2K', 'default.png', '08989898915', 'user', '2021-01-12 06:15:01', '2021-01-12 06:15:01'),
(19, 'user16', 'user16@user.com', '$2a$12$yshTZ5rJByTQGYEX/mYXAO5atibtG/f.WCAO3Gq3zPO0y2SuZShcm', 'default.png', '08989898916', 'user', '2021-01-12 06:15:02', '2021-01-12 06:15:02'),
(20, 'user17', 'user17@user.com', '$2a$12$.yQISlHRCrg7G.TnFwtnHuov5JP2G5.184SZOrUXocTF/GCWsdvFW', 'default.png', '08989898917', 'user', '2021-01-12 06:15:03', '2021-01-12 06:15:03'),
(21, 'user18', 'user18@user.com', '$2a$12$4mcY5nFpiNk8iB8s2epPZ.JGCs9E/1lEB.RNP130Lfqba/u3u35Je', 'default.png', '08989898918', 'user', '2021-01-12 06:15:03', '2021-01-12 06:15:03'),
(22, 'user19', 'user19@user.com', '$2a$12$KgK8sOy8IjhhQfwisaEIyuuX9asQsgfhis4u5qxJ8aETFmktZhpZ.', 'default.png', '08989898919', 'user', '2021-01-12 06:15:04', '2021-01-12 06:15:04'),
(23, 'user20', 'user20@user.com', '$2a$12$MZRzaCM1cAtMFRgJYpVCyORdXuN4MDMbj39HJy0DjR8i9kbeX4yqi', 'default.png', '08989898920', 'user', '2021-01-12 06:15:04', '2021-01-12 06:15:04'),
(24, 'user21', 'user21@user.com', '$2a$12$KTfqXW6QrdoGoNjZLEXMdevmb4YrxxuYTQOq5ZGRaSNQHpHW/tUqu', 'default.png', '08989898921', 'user', '2021-01-12 06:15:05', '2021-01-12 06:15:05'),
(25, 'user22', 'user22@user.com', '$2a$12$MqUK7VtyyOL6HPgbeXVzOu.qm0HITr0ngeKSAZm/PSeCeTeF6Pb3K', 'default.png', '08989898922', 'user', '2021-01-12 06:15:06', '2021-01-12 06:15:06'),
(26, 'user23', 'user23@user.com', '$2a$12$cQK9nxj9hM6evbVdyxz4U.YE59FucEvK.Aoqt5Z0sna3WCnrfO1iC', 'default.png', '08989898923', 'user', '2021-01-12 06:15:06', '2021-01-12 06:15:06'),
(27, 'user24', 'user24@user.com', '$2a$12$ZRN7x0afEwoOhgUkJrI6J..hYyxd5EnbntRN3GaavFBxv/p6P/x4K', 'default.png', '08989898924', 'user', '2021-01-12 06:15:07', '2021-01-12 06:15:07'),
(28, 'user25', 'user25@user.com', '$2a$12$klMu/Pl1PyKWpGgXEZ2ihejy1AT67UpKSuqVOoseAqvlu/IEigDGK', 'default.png', '08989898925', 'user', '2021-01-12 06:15:08', '2021-01-12 06:15:08'),
(29, 'user26', 'user26@user.com', '$2a$12$r9LZTjdDSUntLCuZtBOisepH5dp/QRqM.mRDipvFYEE6WQiitEHue', 'default.png', '08989898926', 'user', '2021-01-12 06:15:08', '2021-01-12 06:15:08'),
(30, 'user27', 'user27@user.com', '$2a$12$R/eP8Eduw0Pe90pFlFqdBOqzDVrRQ1yJOTXtk.TH7Y5GMD1b7.G4K', 'default.png', '08989898927', 'user', '2021-01-12 06:15:09', '2021-01-12 06:15:09'),
(31, 'user28', 'user28@user.com', '$2a$12$zReVrjecV9a9tRGKkJZZi.hL2ezZ9/x6B02j2W.sanKLEa7vOZ1sC', 'default.png', '08989898928', 'user', '2021-01-12 06:15:10', '2021-01-12 06:15:10'),
(32, 'user29', 'user29@user.com', '$2a$12$PVZ8HUgFvIhJOTfl6khMxu5edO5qyXcobI2b7Ib7fOf1EqfJ1X4vq', 'default.png', '08989898929', 'user', '2021-01-12 06:15:10', '2021-01-12 06:15:10'),
(33, 'user30', 'user30@user.com', '$2a$12$Q2l8v3OrtgUr9Pt8cmCAQOZ3CTXWZei1RnsTTcOTL0O1Dp4rB6KmC', 'default.png', '08989898930', 'user', '2021-01-12 06:15:11', '2021-01-12 06:15:11'),
(34, 'user31', 'user31@user.com', '$2a$12$D/AhYXd2dAsSVdlqrZPI9ecQ0ljqiDi8hGXJb9b74A6BsQ95c8dIy', 'default.png', '08989898931', 'user', '2021-01-12 06:15:11', '2021-01-12 06:15:11'),
(35, 'user32', 'user32@user.com', '$2a$12$UM/cTJIEo0KXqRZlRDZsj.Xl8VmUCKUbXse0JMuo3JS8I.NzpSP9y', 'default.png', '08989898932', 'user', '2021-01-12 06:15:12', '2021-01-12 06:15:12'),
(36, 'user33', 'user33@user.com', '$2a$12$X5NWjC0zEbkGRNFj/poi8uCIsClr7NFkMf5wKZL1638/Uyp2Ynbja', 'default.png', '08989898933', 'user', '2021-01-12 06:15:13', '2021-01-12 06:15:13'),
(37, 'user34', 'user34@user.com', '$2a$12$2TmytXZYRCuAocsWjWptkObaB9tz6PV8M5tufPekI6Kab0Im8o.8q', 'default.png', '08989898934', 'user', '2021-01-12 06:15:13', '2021-01-12 06:15:13'),
(38, 'user35', 'user35@user.com', '$2a$12$0ImnnWbFsF/z0a3SyAhdDu71Tf80QNT64ZfcuBcl3lvpxd2eUNUMi', 'default.png', '08989898935', 'user', '2021-01-12 06:15:14', '2021-01-12 06:15:14'),
(39, 'user36', 'user36@user.com', '$2a$12$89X3tZ2nwf42EIzvUqu0luNgFD8W/4VNx5j3j0z1vjC44OTaIxiZG', 'default.png', '08989898936', 'user', '2021-01-12 06:15:14', '2021-01-12 06:15:14'),
(40, 'user37', 'user37@user.com', '$2a$12$5Hjy51O5DnNWXiY16qaXq.xYffVRAaEmQQWzPtWG/D8WrjCHu07t6', 'default.png', '08989898937', 'user', '2021-01-12 06:15:15', '2021-01-12 06:15:15'),
(41, 'user38', 'user38@user.com', '$2a$12$/rRHgHER1ApJU6wmqn4BeuAg5pFhfG5A1mlqPXmRGOcZtDM79Xtp.', 'default.png', '08989898938', 'user', '2021-01-12 06:15:15', '2021-01-12 06:15:15'),
(42, 'user39', 'user39@user.com', '$2a$12$WFl6t2b/2ELxlHsJ6mdYXe5VrlRBnpIhE/.vViiv60T28R2LTqlTu', 'default.png', '08989898939', 'user', '2021-01-12 06:15:16', '2021-01-12 06:15:16'),
(43, 'user40', 'user40@user.com', '$2a$12$u4xPPV/9Rig33p62P4vxiuHvHxBuhqPffU5q2uELNXwNJukuQUsVu', 'default.png', '08989898940', 'user', '2021-01-12 06:15:16', '2021-01-12 06:15:16'),
(44, 'user41', 'user41@user.com', '$2a$12$ZaCwt.D.K98x4vxc/RQ3LuSKXWJkQYsa/y3l6G/0iZeXfplspWTQa', 'default.png', '08989898941', 'user', '2021-01-12 06:15:17', '2021-01-12 06:15:17'),
(45, 'user42', 'user42@user.com', '$2a$12$Ke6LHEoVIyDagPqEOXZpNOOgataJow.0Ic.Irl4Im5VwZ/N7ebEYa', 'default.png', '08989898942', 'user', '2021-01-12 06:15:18', '2021-01-12 06:15:18'),
(46, 'user43', 'user43@user.com', '$2a$12$RM4XwMJ8IbXfsWDWF3k1G.3ioUe.Fm/IDRVMDj1.BqOVEonwA.MXG', 'default.png', '08989898943', 'user', '2021-01-12 06:15:18', '2021-01-12 06:15:18'),
(47, 'user44', 'user44@user.com', '$2a$12$fsXp6KcfShJEn9.FnnU8XeqR1/w7Dn8BkDGR/QgVl28jXJH29XKvO', 'default.png', '08989898944', 'user', '2021-01-12 06:15:19', '2021-01-12 06:15:19'),
(48, 'user45', 'user45@user.com', '$2a$12$FzPn7ASW2MmK3JmRnWumDemMcBcteclFIsjiBm9Vm81Rz8hCSggo6', 'default.png', '08989898945', 'user', '2021-01-12 06:15:19', '2021-01-12 06:15:19'),
(49, 'user46', 'user46@user.com', '$2a$12$KnmLsL.hgwo/6/lG1LblhOaJ4j5yOMz5fOK8GbTKXxLkFQ2FlezLW', 'default.png', '08989898946', 'user', '2021-01-12 06:15:20', '2021-01-12 06:15:20'),
(50, 'user47', 'user47@user.com', '$2a$12$ySR3HUZxdHvJ6csx.9ndCOjzm/y.DDng3M6VF8XLhg7MvL9trt4wq', 'default.png', '08989898947', 'user', '2021-01-12 06:15:21', '2021-01-12 06:15:21'),
(51, 'user48', 'user48@user.com', '$2a$12$xQSTxDoAcG8mbItIsX2eHOf/lYKlpQNozDNL1vJSbblQDI.2pZBki', 'default.png', '08989898948', 'user', '2021-01-12 06:15:21', '2021-01-12 06:15:21'),
(52, 'user49', 'user49@user.com', '$2a$12$Gu3In7DjwP5TNKkVwbEJpe/PfYvtQjELhieWTLJxsLhQVle7.DvMy', 'default.png', '08989898949', 'user', '2021-01-12 06:15:22', '2021-01-12 06:15:22'),
(53, 'user50', 'user50@user.com', '$2a$12$oHsGi2d6Yq9jE9sC7ftFR.LKm3Fmp92B6EUL33vHUiPHaCZCyA.Qe', 'default.png', '08989898950', 'user', '2021-01-12 06:15:22', '2021-01-12 06:15:22'),
(54, 'user51', 'user51@user.com', '$2a$12$gL9slJ2RSuB8PEciJUhLSe6KyUOu3GnotLrjRFJ9jGZWOFLsSUOju', 'default.png', '08989898951', 'user', '2021-01-12 06:15:23', '2021-01-12 06:15:23'),
(55, 'user52', 'user52@user.com', '$2a$12$gbgVJGiYGM07Bk3z0.TS0OF/Xl7fkj2AJCFktg9KFSHrRad6CMrIW', 'default.png', '08989898952', 'user', '2021-01-12 06:15:23', '2021-01-12 06:15:23'),
(56, 'user53', 'user53@user.com', '$2a$12$tL0uGqfvsjEvN9htcOMWZu.cnTaKfWU80pKcmdRyRzrFlcVNZJYkW', 'default.png', '08989898953', 'user', '2021-01-12 06:15:24', '2021-01-12 06:15:24'),
(57, 'user54', 'user54@user.com', '$2a$12$wMrfG35Kd/caDuepxqlr7uTjwIkwcX2W5KwJIq5ezMoc04llaqUBW', 'default.png', '08989898954', 'user', '2021-01-12 06:15:25', '2021-01-12 06:15:25'),
(58, 'user55', 'user55@user.com', '$2a$12$He8ko/IdR8M6tKwoCAsp/.c1W71OFgAewI5iNll/exQ8FKyQs4uO6', 'default.png', '08989898955', 'user', '2021-01-12 06:15:25', '2021-01-12 06:15:25'),
(59, 'user56', 'user56@user.com', '$2a$12$xb1W12QB6S6y2q.uf2bOXuGwD.EIfQuLQwPPpLYI9SjmJro1pyQua', 'default.png', '08989898956', 'user', '2021-01-12 06:15:26', '2021-01-12 06:15:26'),
(60, 'user57', 'user57@user.com', '$2a$12$eSrlF8jhqwKWBRFue3IEW.dzNDQTnDBrSHkhOodgKYle9Ybo0sToy', 'default.png', '08989898957', 'user', '2021-01-12 06:15:26', '2021-01-12 06:15:26'),
(61, 'user58', 'user58@user.com', '$2a$12$ZW5TxlrOB0ieYXpOkpXPcuzk9CxQz5fTByOhaxyJYoL32JsqtgWe2', 'default.png', '08989898958', 'user', '2021-01-12 06:15:27', '2021-01-12 06:15:27'),
(62, 'user59', 'user59@user.com', '$2a$12$n3z3T5vWUU8pA.HhjAYHa.otrgauRB5jL7afat2Xkm.UXM7gY7HHG', 'default.png', '08989898959', 'user', '2021-01-12 06:15:27', '2021-01-12 06:15:27'),
(63, 'user60', 'user60@user.com', '$2a$12$62SDDfuwivjg./L1Hm0WJOCAzcoSxghfK8aQuFhboJtjoDo5TfVXy', 'default.png', '08989898960', 'user', '2021-01-12 06:15:28', '2021-01-12 06:15:28'),
(64, 'user61', 'user61@user.com', '$2a$12$K2UEn3peCVd6yzFCCBQRy.wi/V45lzGBiFb3zeNc8luwpQbhJVT0u', 'default.png', '08989898961', 'user', '2021-01-12 06:15:29', '2021-01-12 06:15:29'),
(65, 'user62', 'user62@user.com', '$2a$12$B/EfdC5xwBi8u6nmTzrMleKLMSMMoKmVjpgwxv9MKMguLE70G/vB2', 'default.png', '08989898962', 'user', '2021-01-12 06:15:29', '2021-01-12 06:15:29'),
(66, 'user63', 'user63@user.com', '$2a$12$i7hBORasAJingSdYPq2G7uEXaIPIAcV5kveH1RY/8fTrNPka4Esh2', 'default.png', '08989898963', 'user', '2021-01-12 06:15:30', '2021-01-12 06:15:30'),
(67, 'user64', 'user64@user.com', '$2a$12$bFnYxTOG6BgUo/FP8oTsi.yqlxxe4LdESv4Ebefnk92XdpYwHuyHS', 'default.png', '08989898964', 'user', '2021-01-12 06:15:30', '2021-01-12 06:15:30'),
(68, 'user65', 'user65@user.com', '$2a$12$eA8Ox9tZpOxmipPKoIXfjuxqvF6r7zg8YT5JmNE5IZ8ymv8e53RhS', 'default.png', '08989898965', 'user', '2021-01-12 06:15:31', '2021-01-12 06:15:31'),
(69, 'user66', 'user66@user.com', '$2a$12$Jom1FZBavIDXZ4MK4IbjXeKO/w9JAt4S4FiQWzZc2Yb5uvEcw9va6', 'default.png', '08989898966', 'user', '2021-01-12 06:15:31', '2021-01-12 06:15:31'),
(70, 'user67', 'user67@user.com', '$2a$12$zmpEtpRJJUV76RQROzdAoOWiWzkxxrdYBKfR8ZP51e4e9sZ9zM9ee', 'default.png', '08989898967', 'user', '2021-01-12 06:15:32', '2021-01-12 06:15:32'),
(71, 'user68', 'user68@user.com', '$2a$12$DnMGVSiP8YMxGrOWcCllLeOar0ovR4Q8.Dfr.AVPKg14HIbsyTo8C', 'default.png', '08989898968', 'user', '2021-01-12 06:15:32', '2021-01-12 06:15:32'),
(72, 'user69', 'user69@user.com', '$2a$12$sqnMwqyM/ZydCzrVHTJxEOTjaPBaCSFvWiIBEAh/DluefyHND3Q42', 'default.png', '08989898969', 'user', '2021-01-12 06:15:33', '2021-01-12 06:15:33'),
(73, 'user70', 'user70@user.com', '$2a$12$EohMB/dFcm2GKjeKX8s6ROe2LJb2zoCTySdWNom1TV3NhrHy2yd3i', 'default.png', '08989898970', 'user', '2021-01-12 06:15:33', '2021-01-12 06:15:33'),
(74, 'user71', 'user71@user.com', '$2a$12$cZ5NhF1Z/ZTkCp3uSmFUOuvyW7uqzn2tDrjc9gZqds2ezL5FRlDLO', 'default.png', '08989898971', 'user', '2021-01-12 06:15:34', '2021-01-12 06:15:34'),
(75, 'user72', 'user72@user.com', '$2a$12$/4LaX20jBQUTNlo9Cf6CV.lHj/V85jksyOPhZNww.8.qJ39P62tOa', 'default.png', '08989898972', 'user', '2021-01-12 06:15:34', '2021-01-12 06:15:34'),
(76, 'user73', 'user73@user.com', '$2a$12$OwME1EyFEBeirYg18oerBul9qyd3cHfYgFnI9IjvPkkVjpAr.c99W', 'default.png', '08989898973', 'user', '2021-01-12 06:15:35', '2021-01-12 06:15:35'),
(77, 'user74', 'user74@user.com', '$2a$12$dHt/nv2OOqbxYeu1q.vsnuSSGnKrl5jCJknAFYxesjpg3J0pdyoMa', 'default.png', '08989898974', 'user', '2021-01-12 06:15:35', '2021-01-12 06:15:35'),
(78, 'user75', 'user75@user.com', '$2a$12$APz20khzebIcbrAof8gmb.VB5fLf3LLsfydB3Wc6KkKE8/sVG/m0q', 'default.png', '08989898975', 'user', '2021-01-12 06:15:36', '2021-01-12 06:15:36'),
(79, 'user76', 'user76@user.com', '$2a$12$U/aMgBgBMaJSiOiou2vM6ens8IdKc6De6GhK.47rDGaS73y/nXQka', 'default.png', '08989898976', 'user', '2021-01-12 06:15:36', '2021-01-12 06:15:36'),
(80, 'user77', 'user77@user.com', '$2a$12$DEjwIpygUVCY7BKcUWj.G.k94QB9UCO91HCX5g2gdmCzWj1FFd1cu', 'default.png', '08989898977', 'user', '2021-01-12 06:15:37', '2021-01-12 06:15:37'),
(81, 'user78', 'user78@user.com', '$2a$12$iijYVFDZWhYZQptgVNEW1Oukriaz.o2Fp3SqcK.N4RBWiT.pHvhsu', 'default.png', '08989898978', 'user', '2021-01-12 06:15:37', '2021-01-12 06:15:37'),
(82, 'user79', 'user79@user.com', '$2a$12$/nryFJjoyATM9TuOJtfTfOxLd.hfA4ILzeZhEcZlV16hkGDcMRYpu', 'default.png', '08989898979', 'user', '2021-01-12 06:15:38', '2021-01-12 06:15:38'),
(83, 'user80', 'user80@user.com', '$2a$12$FHdYwxqfKnjCg670FFoAf.JmLY.5qR1uEFbZlplCrJW7kjdHRN.Zu', 'default.png', '08989898980', 'user', '2021-01-12 06:15:38', '2021-01-12 06:15:38'),
(84, 'user81', 'user81@user.com', '$2a$12$y.vZ5lMaXcXpdI.IRkxlo.7fFP77hkIITmMZ2ERx.5yt4mm2fr2TC', 'default.png', '08989898981', 'user', '2021-01-12 06:15:39', '2021-01-12 06:15:39'),
(85, 'user82', 'user82@user.com', '$2a$12$1fiWCdhRE.ZZKQj4tkRQ6eDdCIXJGrrg1.R3ViTLCFKlCFKNB9/iS', 'default.png', '08989898982', 'user', '2021-01-12 06:15:39', '2021-01-12 06:15:39'),
(86, 'user83', 'user83@user.com', '$2a$12$GhmdbB.QQk9uq1RsWwKJ5eLKTIWJA/vmI/ncoOgOfG/nSFNemy47q', 'default.png', '08989898983', 'user', '2021-01-12 06:15:40', '2021-01-12 06:15:40'),
(87, 'user84', 'user84@user.com', '$2a$12$aV3JEK9g5eeazDbvxTdLfu.psMU7aLYZ.3kwLhqUhc5dva8udDe5K', 'default.png', '08989898984', 'user', '2021-01-12 06:15:40', '2021-01-12 06:15:40'),
(88, 'user85', 'user85@user.com', '$2a$12$Y8uc/SPY8JGrQHjCT5dwY./06E/D0OpC.C8tMRQUSKKgSPkM5uww2', 'default.png', '08989898985', 'user', '2021-01-12 06:15:41', '2021-01-12 06:15:41'),
(89, 'user86', 'user86@user.com', '$2a$12$5U5cWpi4rq7q/VxEIphkSusJNDNpsnjUw9OIWOsur79mGJYiAkCUK', 'default.png', '08989898986', 'user', '2021-01-12 06:15:42', '2021-01-12 06:15:42'),
(90, 'user87', 'user87@user.com', '$2a$12$QZW3dg9DN.LGH4.6Ow9MZuok9PidGQuUXNTfFqbdLAzFrypd37OBG', 'default.png', '08989898987', 'user', '2021-01-12 06:15:42', '2021-01-12 06:15:42'),
(91, 'user88', 'user88@user.com', '$2a$12$nP6Ra6Xzlfyxiy45ggzcC.xbC6wL0PDkO8BRMOoIbsVUGn9fRKvA2', 'default.png', '08989898988', 'user', '2021-01-12 06:15:43', '2021-01-12 06:15:43'),
(92, 'user89', 'user89@user.com', '$2a$12$MXly8T.unln67aUKuRk8UuZSk88yWG5iib//rzEjZ6HY0hbGuH9PO', 'default.png', '08989898989', 'user', '2021-01-12 06:15:43', '2021-01-12 06:15:43'),
(93, 'user90', 'user90@user.com', '$2a$12$Gxll0IVl87EnQUmZMZbT0uK6el75/xon8Y.jq0g6AtzIDHXCRMBFu', 'default.png', '08989898990', 'user', '2021-01-12 06:15:44', '2021-01-12 06:15:44'),
(94, 'user91', 'user91@user.com', '$2a$12$MPU8WMODIgXSsxCztaIvreEipXISXPLGgB5lqSTnsWfdRu2opGPr.', 'default.png', '08989898991', 'user', '2021-01-12 06:15:44', '2021-01-12 06:15:44'),
(95, 'user92', 'user92@user.com', '$2a$12$ou6EhlNsS5QrLOExJ/0PpeD7InKbLtmKnkxdSk8wnSozXitCx/UdG', 'default.png', '08989898992', 'user', '2021-01-12 06:15:45', '2021-01-12 06:15:45'),
(96, 'user93', 'user93@user.com', '$2a$12$U6jjtZ9ZoZf5GWj7P0sKouSG4JCd.J5oIx8uxCquTPkLOT3hnqLIK', 'default.png', '08989898993', 'user', '2021-01-12 06:15:45', '2021-01-12 06:15:45'),
(97, 'user94', 'user94@user.com', '$2a$12$PlgmWqyKpp8vv/NlZ4dwWO7uiA7eZNG1ZiPnvVuN.wsUApiiwfC/a', 'default.png', '08989898994', 'user', '2021-01-12 06:15:46', '2021-01-12 06:15:46'),
(98, 'user95', 'user95@user.com', '$2a$12$KeOF4M49NlRfwrKQHCQTAOdZPoGadHbvJH90rflgGtbGhiRkLH2O6', 'default.png', '08989898995', 'user', '2021-01-12 06:15:46', '2021-01-12 06:15:46'),
(99, 'user96', 'user96@user.com', '$2a$12$SE45sX/uhNwgNXVR.t8EauEjsqxXyOkbs0P5.2TJfCveF59yXikRq', 'default.png', '08989898996', 'user', '2021-01-12 06:15:47', '2021-01-12 06:15:47'),
(100, 'user97', 'user97@user.com', '$2a$12$MF/6wLSWdyqt6MLD5kbMiu6jG/QdgGVaTR6SAYzDxhdjwKXdLQ7dG', 'default.png', '08989898997', 'user', '2021-01-12 06:15:47', '2021-01-12 06:15:47'),
(101, 'user98', 'user98@user.com', '$2a$12$iJ.mv4u3RdX6OBmbaIbJ.eWsQhYuw386vXtE.V9oIUHez/gF4fTdC', 'default.png', '08989898998', 'user', '2021-01-12 06:15:48', '2021-01-12 06:15:48'),
(102, 'user99', 'user99@user.com', '$2a$12$hYSqbADTub.9a65IWaFW.urvZ829IMCqlnJ8KSRX3NLDtU7tOjLJy', 'default.png', '08989898999', 'user', '2021-01-12 06:15:48', '2021-01-12 06:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articels`
--
ALTER TABLE `articels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_foreign` (`user_id`),
  ADD KEY `courses_instructur_id_foreign` (`instructur_id`);

--
-- Indexes for table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructurs`
--
ALTER TABLE `instructurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `instructur_feedbacks`
--
ALTER TABLE `instructur_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructur_feedbacks_user_id_foreign` (`user_id`),
  ADD KEY `instructur_feedbacks_instructur_id_foreign` (`instructur_id`);

--
-- Indexes for table `manual_payments`
--
ALTER TABLE `manual_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manual_payments_user_id_foreign` (`user_id`),
  ADD KEY `manual_payments_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articels`
--
ALTER TABLE `articels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructurs`
--
ALTER TABLE `instructurs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instructur_feedbacks`
--
ALTER TABLE `instructur_feedbacks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_payments`
--
ALTER TABLE `manual_payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_instructur_id_foreign` FOREIGN KEY (`instructur_id`) REFERENCES `instructurs` (`id`),
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `instructur_feedbacks`
--
ALTER TABLE `instructur_feedbacks`
  ADD CONSTRAINT `instructur_feedbacks_instructur_id_foreign` FOREIGN KEY (`instructur_id`) REFERENCES `instructurs` (`id`),
  ADD CONSTRAINT `instructur_feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `manual_payments`
--
ALTER TABLE `manual_payments`
  ADD CONSTRAINT `manual_payments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `manual_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
