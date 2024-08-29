-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 07:03 AM
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
-- Database: `allsmartphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `allsmartphone`
--

CREATE TABLE `allsmartphone` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `launch` varchar(100) NOT NULL,
  `display` varchar(100) NOT NULL,
  `chipset` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `camera` varchar(100) NOT NULL,
  `battery` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allsmartphone`
--

INSERT INTO `allsmartphone` (`id`, `name`, `launch`, `display`, `chipset`, `os`, `ram`, `camera`, `battery`, `price`, `image`) VALUES
(1, 'Apple iPhone 15 Pro Max', '2023, September 22', '6.7&quot; Super Retina XDR OLED, 120Hz,', 'Apple A17 Pro (3 nm)', 'iOS 17', '8GB/256GB', 'f Single 12 MP / b Triple	48 MP', '4441 mAh', '$999.90', 'apple-iphone-15-pro-max.jpg'),
(2, 'Apple iPhone X', '2017, November 03', '6.6&quot; Dynamic AMOLED 2X, 120Hz', 'Apple A11 Bionic (10 nm)', 'iOS 11.1.1', '3GB/64GB ', ' f Single 7 MP / b Dual 12 MP', ' 3700 mAh', '$150', 'apple-iphone-x.jpg'),
(3, 'Samsung Galaxy S23+', 'Released 2023, August 11', '6.6&quot; Dynamic AMOLED 2X, 120Hz', 'Qualcomm SM8550-AC Snapdragon 8 Gen 2 (4 nm)', 'Android 14, One UI 6.1', '16GB/256GB', 'f Single 32 MP / b Triple	50 MP', '5000mAh', '$999.90', 'samsung-galaxy-s23-plus-5g.jpg'),
(4, 'Samsung Galaxy s24 ultra', 'Released 2023, August 11', '6.6&quot; Dynamic AMOLED 2X, 120Hz', 'Qualcomm SM8550-AC Snapdragon 8 Gen 2 (4 nm)', 'Android 14, HyperOS', '8GB / 512GB', 'f Single 32 MP / b Triple	50 MP', '4880 mAh', '$150', 'samsung-galaxy-s24-ultra-5g-sm-s928-stylus.jpg'),
(5, 'Google Pixel 8 Pro', 'Released 2023, August 11', '6.7&quot; AMOLED, 1B colors ', 'Foldable Dynamic AMOLED 2X, 120Hz', 'Android 14, One UI 6.1', '8GB / 512GB', 'f Single 12 MP / b Triple 50 MP', '5000mAh', '$450', 'google-pixel-8-pro.jpg'),
(6, 'Xiaomi 14 Pro', 'Released 2023, August 11', '5.8&quot; Super Retina OLED,', 'LTPO AMOLED, 68B colors, 120Hz', 'Android 14, HyperOS', '3GB/64GB ', ' f Single 7 MP / b Dual 12 MP', '4880 mAh', '$450', 'xiaomi-14-pro.jpg'),
(7, 'Xiaomi Poco F6', 'Released 2023, August 11', '5.8&quot; Super Retina OLED,', 'LTPO AMOLED, 68B colors, 120Hz', 'iOS 11.1.1', '16GB/256GB', 'f Single 12 MP / b Triple 50 MP', '4880 mAh', '$999.90', 'xiaomi-poco-f6.jpg'),
(8, 'Realme Narzo 60 Pro', '2024, May 23', '6.7&quot; AMOLED, 1B colors ', 'LTPO AMOLED, 68B colors, 120Hz', 'Android 13, XOS 13', '3GB/64GB ', 'f Single 32 MP / b Triple	50 MP', '4880 mAh', '$133', 'realme-narzo60-pro-5g.jpg'),
(24, 'ffs', 'fsdfa', 'sdfsdf', 'asfd', 'asdfd', 'asdfsd', 'adf', 'adf', 'afd', '6697167722633.jpg'),
(25, 'admin', '2023, September 22', '5.8&quot; Super Retina OLED,', 'Qualcomm SM8550-AC Snapdragon 8 Gen 2 (4 nm)', 'iOS 11.1.1', '8GB/128GB', ' f Single 7 MP / b Dual 12 MP', '4880 mAh', '$555', '66971694cbf4c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phonename`
--

CREATE TABLE `phonename` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phonename`
--

INSERT INTO `phonename` (`id`, `name`) VALUES
(1, 'SAMSUNG'),
(2, 'APPLE'),
(3, 'HUAWEI'),
(4, 'NOKIA'),
(5, 'SONY'),
(6, 'LG'),
(7, 'HTC'),
(8, 'MOTOROLA'),
(9, 'LENOVO'),
(10, 'XIAOMI'),
(11, 'GOOGLE'),
(12, 'HONOR'),
(13, 'OPPO'),
(14, 'REALME'),
(15, 'ONEPLUS'),
(16, 'NOTHING'),
(17, 'VIVO'),
(18, 'MEIZU'),
(19, 'ASUS'),
(20, 'ALCATEL'),
(21, 'ZTE'),
(22, 'MICROSOFT'),
(23, 'UMIDIGI'),
(24, 'ENERGIZER'),
(25, 'CAT'),
(26, 'SHARP'),
(27, 'SHARP'),
(28, 'MICROMAX'),
(29, 'INFINIX'),
(30, 'ULEFONE'),
(31, 'TECNO'),
(32, 'DOOGEE'),
(33, 'BLACKVIEW'),
(34, 'CUBOT'),
(35, 'ITEL'),
(36, 'TCL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'ekoysrn', '$2y$10$0eHfkkPJSan/wpDVw0byRu1KfU.ORfW8yzn2ldAkm7fXtpCB8c1Xy', ''),
(2, 'ekoysrn', '$2y$10$ZHqT5/gLqYfNwdxlw9FYe.NGt51GTEHTGyn7JzU3rVwcKpfcjfD3u', ''),
(3, 'fdsf', '$2y$10$VbBh4S9vkANk0ZgWQNmZCeN/ISvQ0NDGPllror/Wre.nLQafJFLia', ''),
(4, 'eko', '$2y$10$h1tC9zU64naB1M.kgjLmieORF5v1lARW.KSxm8y/FXdQJKejlII7W', ''),
(5, 'ekoysrn', '$2y$10$qLQ8.nRrucbDFDzxHI7tNOpu5UhNBtqnChUDeZ5tuhIHofE9L7wZq', ''),
(6, 'ekoysrn', '$2y$10$2/2JzHMQ8qqzJUsJHdtaSuqmqN8YYz9KltpxpV0UqybOeMBcCoZgG', ''),
(7, 'ekoysrn', '$2y$10$T7kZ2PpBnbT1WkKui/o5ou2LqNoWhU3PhWS5CMCpxB9yigdbGWPZ2', ''),
(8, 'ekoysrn', '$2y$10$AI.R2Ebd01G/x6dhxNEs1OMpcZZs2ODSr29ueqlOS.4uGYmF2cupC', ''),
(9, 'ekoysrn', '$2y$10$TWldZbbUYA6aezelAsgUZe8KlMGtxwZhRhos48hqGVafoYM3YgdR.', ''),
(10, 'admin', '$2y$10$E5UETJVq.bIgZvYJHkdFg./xjlPCjjXw5QZWPhfNTeVk/INRAbndW', ''),
(11, 'your', '$2y$10$7quvan1F9crH4g.ORuwm0.WIvjtDCAkwuBn6fyg7w37VjPtuoGWPi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allsmartphone`
--
ALTER TABLE `allsmartphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonename`
--
ALTER TABLE `phonename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allsmartphone`
--
ALTER TABLE `allsmartphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `phonename`
--
ALTER TABLE `phonename`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
