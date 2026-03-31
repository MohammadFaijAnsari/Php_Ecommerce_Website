-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 04:21 AM
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
-- Database: `php_ecommerce_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(20) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`) VALUES
(3, 'Yuraj Singh', 'yuraj@gmail.com', '12345@', 'css.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(20) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', 'Best'),
(2, 'Women', 'Best');

-- --------------------------------------------------------

--
-- Table structure for table `customers_order`
--

CREATE TABLE `customers_order` (
  `order_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `invoice_number` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `size` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `due_amount` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_order`
--

INSERT INTO `customers_order` (`order_id`, `customer_id`, `product_id`, `invoice_number`, `qty`, `size`, `order_date`, `due_amount`, `order_status`) VALUES
(2, 4, 1, 67505652, 1, '0', '2025-04-08', 1299, 'pending'),
(7, 4, 1, 1125656358, 1, '0', '2025-04-17', 1299, 'pending'),
(8, 6, 1, 1780258987, 1, '0', '2025-04-18', 1299, 'pending'),
(9, 15, 1, 881891903, 2, '0', '2025-04-21', 2598, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Mohammad Faij Ansari', 'faija639@gmail.com', 'Best', 'Problem the Product Purchasing time'),
(3, 'Mohammad Faij Ansari', 'faija639@gmail.com', 'Best ', 'Best Not Product'),
(5, 'Mohammad Faij Ansari', 'faija639@gmail.com', 'Problem in delivery ', 'Testing'),
(6, 'Lavkush Yadav', 'lavkushyadav097@gmai', 'You will happy in yo', 'Testing'),
(7, 'Lavkush Yadav', 'lavkushyaddav97@gmai', 'Be happy in your lid', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(20) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `trans_number` int(20) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `invoice_id`, `amount`, `payment_mode`, `trans_number`, `payment_date`) VALUES
(1, 1234, 1499, 'Paypal', 765367, '2025-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `p_cat_Id` int(20) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_img1` varchar(255) NOT NULL,
  `product_img2` varchar(255) NOT NULL,
  `product_img3` varchar(255) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `actual_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_cat_Id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`, `actual_price`) VALUES
(1, 1, 1, '2025-03-20', 'Baby Cloth', 'kids1.jpeg', 'kids2.jpeg', 'kids3.jpeg', 1299, 'Best Product', 'Best Product', 2000),
(2, 2, 1, '2025-03-21', 'Watch', 'watch1.jpeg', 'watch2.jpeg', 'watch3.jpeg', 1499, 'Best Product', 'Best Product', 1599),
(10, 2, 1, '2025-03-26', 'MackBook', 'laptop1.jpeg', 'laptop2.jpeg', 'laptop3.jpeg', 49999, 'Best Product', 'Best Product', 50999),
(11, 1, 2, '2025-03-27', 'Kurti', 'kurti1.jpeg', 'kurti2.jpeg', 'kurti3.jpeg', 1499, 'Best Product', 'Best Product', 2099),
(12, 2, 1, '2025-04-18', 'Samsung S22 Ultra ', 'phone1.jpeg', 'phone2.jpeg', 'phone3.jpeg', 73199, 'Best Phone', 'Best Product', 73264);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_Id` int(20) NOT NULL,
  `p_cat_title` varchar(255) NOT NULL,
  `p_cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_Id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Cloths', 'Best'),
(2, 'Accessories', 'Best');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `c_id` int(20) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`c_id`, `c_name`, `c_email`, `c_pass`, `c_image`, `c_ip`) VALUES
(4, 'Mukesh Sharma', 'mukesh@gmail.com', '12345@', 'download1.jpeg', '::1'),
(15, 'Rajesh Bhau', 'smartboyraja97@gmail.coom', '1234', '2.jpg', '::1'),
(16, 'Faij Ansari', 'faija639@gmail.com', '1234', '2.jpg', '::1'),
(17, 'Ashish', 'ashishshen20@gmail.com', '11991911', '2.jpg', '::1'),
(18, 'Rajesh Bhai', 'smartboyraja97@gmail.com', '1234', '1.gif', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_url` varchar(25) NOT NULL,
  `slider_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_url`, `slider_image`) VALUES
(1, 'Slider3', 'slider.jpeg', 'slider3.jpeg'),
(2, 'Slider4', 'slider4.jpeg', 'slider4.jpeg'),
(3, 'Slider5', 'slider5.jpeg', 'slider5.jpeg'),
(4, '3Slider', '3slider.jpeg', '3.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers_order`
--
ALTER TABLE `customers_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_Id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers_order`
--
ALTER TABLE `customers_order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
