-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 09:35 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Web Design1 '),
(2, 'JavaScript1 '),
(3, 'HTML'),
(4, 'CSS');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `body`, `author`, `tags`, `date`, `img`) VALUES
(1, 1, 'Ask FM Resuorses', 'Lorem ipsumdolor sit amet,consectetur adipisicing elit. Reiciendis aliquid atque,nulla?Quos cum ex quis soluta,a laboriosam.Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!', 'Mostafa Biar', 'Design HTML Css javascript  ', '2017-11-16 02:16:49', '/600x400/black-and-white-image-of-laptop-computer-keyboard-mobile-phone-and-headphones (1).jpg'),
(7, 3, 'HTML5 ', '        Ø§Ù„Ø³Ù„Ø§Ù… Ø¹Ù„ÙŠÙƒÙ… ÙˆØ±Ø­Ù…Ø© Ø§Ù„Ù„Ù‡ ÙˆØ¨Ø±ÙƒØ§ØªÙ‡    aasfsfddfsretaetgfxcv  \r\n          ', 'Ashraf El Alfy', 'HTml Design     ', '2017-11-22 06:27:42', '/600x400/old-shoes-shirts-interior (1).jpg   '),
(8, 4, 'Successfull Reading Post   ', '                                    You Gaveasfg;lmeqrpojgpoajdsoihfiuGUYAVFBSDkjfHAKJSDHLGKHLAKJDSHGKJHQERWAIUAGHILUSDHVAKJXB,MVNDF,MNBGKLBIUHGERITHPO;OWJFLKJSALKDFJKHADKFSHGIUWEUAHRDAKJFGLJOI;TJWOIHJDPOSFJOHJOSPDJGPQEJRAJKGDKJFBKJFAKYou Gaveasfg;lmeqrpojgpoajdsoihfiuGUYAVFBSDkjfHAKJSDHLGKHLAKJDSHGKJHQERWAIUAGHILUSDHVAKJXB,MVNDF,MNBGKLBIUHGERITHPO;OWJFLKJSALKDFJKHADKFSHGIUWEUAHRDAKJFGLJOI;TJWOIHJDPOSFJOHJOSPDJGPQEJRAJKGDKJFBKJFAKYou Gaveasfg;lmeqrpojgpoajdsoihfiuGUYAVFBSDkjfHAKJSDHLGKHLAKJDSHGKJHQERWAIUAGHILUSDHVAKJXB,MVNDF,MNBGKLBIUHGERITHPO;OWJFLKJSALKDFJKHADKFSHGIUWEUAHRDAKJFGLJOI;TJWOIHJDPOSFJOHJOSPDJGPQEJRAJKGDKJFBKJFAK \r\n           \r\n           \r\n          ', 'Ahmed Gendy', 'Reading Web Designning         ', '2017-11-22 06:36:17', '/600x400/book-fair-fair-shopping-leipzig-event-business (1).jpg   '),
(9, 2, 'HTML5 actions', 'dasdasfdgtrhytjyukuilkugfdsVBGznfhxgjchvnxfgdsADsd', 'Ramy Diab', 'Javascript loogs Drop', '2017-11-22 19:41:23', '/600x400/laptop-and-digital-tablet-on-wooden-table (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
