-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 10:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watchs`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `facebook` varchar(191) NOT NULL,
  `twitter` varchar(191) NOT NULL,
  `instagram` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `logo` varchar(191) NOT NULL,
  `thank` text DEFAULT NULL,
  `pixel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `title`, `phone`, `email`, `facebook`, `twitter`, `instagram`, `address`, `logo`, `thank`, `pixel`) VALUES
(1, 'ساعات اصلية ', '0661266637', 'example@gmail.com', 'https://www.facebook.com/profile.php?id=100055225800369', 'https://twitter.com/uBXDxk4qrdE80nO', 'https://www.instagram.com/mehrane_menasri/?hl=fr', 'بوسعادة - المسيلة - 28000', '17639_26854_1288_6.png', 'شكرا لشراء منتجاتنا و زيارة متجرنا', 'jldsfsdjsdmfjsqmdfkjsdqmlkfjsdmlfjsdlkfjsmldkfj lkdj mjfdsmf ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'انتظار',
  `product_id` int(11) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer`, `phone`, `location`, `address`, `order_qty`, `order_status`, `product_id`, `create_at`) VALUES
(45, 'MESSAOUD', '0550635123', 'الشلف', 'HGKK', 1, 'اتصال 1', 34, '2022-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_gallery1` varchar(255) DEFAULT NULL,
  `product_gallery2` varchar(255) DEFAULT NULL,
  `product_gallery3` varchar(255) DEFAULT NULL,
  `product_gallery4` varchar(255) DEFAULT NULL,
  `product_gallery5` varchar(255) DEFAULT NULL,
  `product_gallery6` varchar(255) DEFAULT NULL,
  `product_gallery7` varchar(255) DEFAULT NULL,
  `product_gallery8` varchar(255) DEFAULT NULL,
  `product_gallery9` varchar(255) DEFAULT NULL,
  `product_gallery10` varchar(191) DEFAULT NULL,
  `product_gallery11` varchar(191) DEFAULT NULL,
  `product_gallery12` varchar(191) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_discount`, `discount_percentage`, `product_image`, `product_gallery1`, `product_gallery2`, `product_gallery3`, `product_gallery4`, `product_gallery5`, `product_gallery6`, `product_gallery7`, `product_gallery8`, `product_gallery9`, `product_gallery10`, `product_gallery11`, `product_gallery12`, `rating`, `created_at`) VALUES
(33, 'آخر منتج', '<p>الوصف لآخر منتج</p>', 15000, 10000, 33, '63795_10.png', '', '52560_1288_6.png', '32552_1288_6.png', '89060_', '77955_', '18686_', '4166_', '74515_', '67094_', '92597_17639_26854_1288_6.png', '58959_17639_26854_1288_6.png', '53084_20235_26854_1288_6.png', 5, '2022-10-16'),
(34, 'ساعة جديدة', '<p>حقيبة صغيرة Mini Sac من جلد الطبيعي صناعة يدوية<br>تم التقييم بـ 5.00 من 5 بناءً على تقييم عميل واحد (1 customer review) 0 sold<br>5,900د.ج</p><p>البهجة و الجمال مع البساطة<br>لانها صنع يدوي بالكامل هذه الحقيبة تاخذ منا اياما نتقن فيها صنع كل التفاصيل بدقة ????<br>من الجلد الطبيعي و الاصلي 100%&nbsp;<br>مميزة فهي من تصميمنا بالكامل<br>هدية مميزة و مناسبة لكل الاعمار</p>', 23333, 19000, 30, '3811_4.png', '78685_2.png', '37272_8.png', '44509_9.png', '81973_1.png', '50150_4.png', '98907_8.png', '9108_1.png', '75476_5.png', '45485_10.png', '7789_3.png', '81364_10.png', '7061_3.png', 4, '2022-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `full_name`, `is_admin`, `user_status`) VALUES
(1, 'Mehrane', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mehranemen@gmail.com', 'Mehrane Menasri', 1, 1),
(2, 'ahmed', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ahmed@gmail.com', 'ahmed ahmed', 0, 0),
(3, 'admin', '7c222fb2927d828af22f592134e8932480637c0d', 'meh@gamil.com', 'sdf dfdf sd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `visit_date`) VALUES
(1, '127.0.0.1', '2022-09-19 21:00:35'),
(2, '::1', '2022-09-19 21:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_order` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `product_order` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
