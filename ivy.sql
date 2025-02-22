-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-03-20 07:31:41
-- 服务器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ivy`
--

-- --------------------------------------------------------

--
-- 表的结构 `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Ivy615` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `customers`
--

INSERT INTO `customers` (`id`, `username`, `Ivy615`, `password`, `phone`, `address`, `city`, `email`, `create_date`) VALUES
(1, 'Ivy', '', '$2y$10$N.m/I2tN1NWEJ2BSUV1i2ubtUyAO.eHB9KFgo4VV997xEjiZ0oINe', 5252541, 'ningbo', 'Ningbo', '312312@qq.com', '2024-03-20 14:06:32'),
(2, 'Jack', '', '$2y$10$xBmqU2KykJuvjM5YtiGTRe4YXqO0I.jVe/hRkZ94f4UZ44MCQlswy', 2147483647, '123456', 'Ningbo', 'ZxXZxZX', '2024-01-28 13:42:27');

-- --------------------------------------------------------

--
-- 表的结构 `ecommerce15`
--

CREATE TABLE `ecommerce15` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 转存表中的数据 `ecommerce15`
--

INSERT INTO `ecommerce15` (`id`, `name`, `code`, `brand`, `image`, `price`) VALUES
(1, 'Red bean toast', 'Lucas Loaves1', 'Made from yogurt and wheat', 'product-images/1.jpg', 8.00),
(2, 'Sponge cake', 'Lucas Loaves2', 'Using red beans and small ones', 'product-images/2.jpg', 16.00),
(3, 'Caramel bread', 'Lucas Loaves3', 'Sausage and wheat', 'product-images/3.jpg', 10.00),
(4, 'Purple Potato Bun\n', 'Lucas Loaves4', 'Wheat and flour', 'product-images/4.jpg', 8.00),
(5, 'Multi-Grain Bread', 'Lucas Loaves5', 'Matcha powder and wheat', 'product-images/5.jpg', 10.00),
(6, 'Sugar bread', 'Lucas Loaves6', 'Made with eggs and cream', 'product-images/6.jpg', 9.00),
(7, 'Toast', 'Lucas Loaves7', 'Strawberries, eggs, and cream', 'product-images/7.jpg', 15.00),
(8, 'Shredded meat bread', 'Lucas Loaves8', 'Red beans and wheat', 'product-images/8.jpg', 7.00),
(9, 'Coconut bread', 'Lucas Loaves9', 'Eggs and wheat', 'product-images/9.jpg', 10.00),
(10, 'Coconut oil bread', 'Lucas Loaves10', 'Egg wheat', 'product-images/10.jpg', 8.00),
(11, 'Sandwich bread', 'Lucas Loaves11', 'White sugar wheat', 'product-images/11.jpg', 5.00),
(12, 'Hand torn bread', 'Lucas Loaves12', 'Caramel and white flour', 'product-images/12.jpg', 20.00),
(13, 'Raisin toast', 'Lucas Loaves13', 'Carotenoids and cream', 'product-images/13.jpg', 9.00),
(14, 'Rye Bread', 'Lucas Loaves14', 'Chocolate and cream', 'product-images/14.jpg', 10.00),
(15, 'Coarse grain bread', 'Lucas Loaves15', 'Strawberries and cream', 'product-images/15.jpg', 5.00);

--
-- 转储表的索引
--

--
-- 表的索引 `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `ecommerce15`
--
ALTER TABLE `ecommerce15`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `ecommerce15`
--
ALTER TABLE `ecommerce15`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
