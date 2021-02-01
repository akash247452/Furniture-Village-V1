-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2020 at 06:49 PM
-- Server version: 5.7.30
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
-- Database: `furnitur_village`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`, `timestamp`) VALUES
(1, 'Akash@253011', 'Akash@1999', '2020-04-08 21:07:41'),
(2, 'vipinrana87', 'Vipin@1993', '2020-04-08 21:08:10'),
(3, 'Furniturevillage', 'Administrator@2020', '2020-04-24 16:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `qty`, `addedon`) VALUES
(1, 1, 1, 1, '2020-04-24 18:06:25'),
(2, 1, 4, 1, '2020-04-24 19:33:58'),
(3, 1, 5, 1, '2020-04-24 19:34:04'),
(4, 5, 5, 1, '2020-04-25 04:11:55'),
(5, 6, 4, 5, '2020-04-25 13:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(39, 'Wardrobes', 1),
(40, 'Sofas', 1),
(41, 'Foldables', 1),
(43, 'Beds', 1),
(46, 'Dinning', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `delivery_charges` float DEFAULT NULL,
  `each_price` float DEFAULT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `design` varchar(100) NOT NULL,
  `mrp` float NOT NULL,
  `sp` float NOT NULL,
  `qty` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_desc` text NOT NULL,
  `height` varchar(255) NOT NULL,
  `warranty_info` varchar(2000) DEFAULT NULL,
  `meta_tittle` text NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `design`, `mrp`, `sp`, `qty`, `img`, `dimensions`, `description`, `short_desc`, `height`, `warranty_info`, `meta_tittle`, `meta_desc`, `meta_keyword`, `status`, `timestamp`) VALUES
(1, 'Venus Single Bed', '43', '1', 19374, 15499, 1, 'Screenshot 2020-04-24 at 11.32.27 PM.png', '82 L x 40 W', 'Material :Sheesham Wood             Finish :Honey Finish.       Overview :-     1. Venus single bed reflects the modern comforts without losing the roots of conventional looks. The slatted headboard is making this bed more royal and appealing. 2. Made from the robust and durable Sheesham wood. â€‹3. Wide range of finish options is available to meet your aesthetic needs.', ' SEESHAM WOOD AND HONEY FINISH', '35', '', '', '', '', 1, '2020-04-24 18:04:03'),
(2, 'Walken Bed With Storage', '43', '3', 53499, 42799, 5, 'Screenshot 2020-04-25 at 12.02.29 AM.png', '88 L x 75 W', '1. Walken bed with storage is very convenient furniture to invite in the bedroom. Firstly, it is contemporary furniture design. Secondly, the backrest has two drop-down drawers, and each of those has an upholstered panel for more comfort. Thirdly, headboard and drawer storage provide spacious places to store more. 2. Sheesham wood crafting of the bed makes it very durable. â€‹3. Along with it, honey, teak, walnut, and mahogany finish options increase the variety to pick from.', 'King Size And Honey Finish', '33', 'Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight', '', '', '', 1, '2020-04-24 18:43:30'),
(3, 'Cambrey Hydraulic Bed', '43', '4', 68749, 54999, 5, 'Screenshot 2020-04-25 at 12.16.46 AM.png', '190 L x 190 W', ' 1. Cambrey Hydraulic bed is an epitome of traditional furniture design. The intricately detailed pattern over the back panel depicts the perfect picture. With it, the hydraulic feature gives ease in accessing the storage. 2. Crafted in Sheesham wood, quality is never a question. â€‹3. This bed is further available in honey, teak and walnut finish options.', 'King Size, Honey Finish', '40', 'Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight', '', '', '', 1, '2020-04-24 18:57:58'),
(4, 'Solace L-Shaped Wooden Sofa', '40', '5', 34999, 30799, 5, 'Screenshot 2020-04-25 at 1.26.57 AM.png', '32 L x 33 W', 'MaterialSheesham Wood.   1. Inspired with the modern decor, Marriott wooden sofa set has all the qualities of the same. This sofa set has a 3 seater sofa paired with two single seater sofas that invite ample seating space. Each of the sofas have indented box at the sides that add to the aesthetics of the furniture. 2. This sofa set is made in sheesham wood and is further coated in wooden grain shade. â€‹3. It is available in three finish options of honey, teak and walnut finish.', 'Honey Finish And Sheesham Wood', '30', 'Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight', '', '', '', 1, '2020-04-24 19:03:13'),
(5, 'Riota Sofa Cum Bed With Storage', '41', '8', 49749, 39799, 5, 'Screenshot 2020-04-25 at 12.35.51 AM.png', '190 L x 190 W   Sofa:60 L x 30 W', '1. The clean and sleek design of Riota can surely grab anyoneâ€™s attention in a single glance. 2. The different sizes of blocks at footboard make this design more appealing Crafted from premium quality of Sheesham wood. â€‹3. Various finish options are available to blend with your home interiors.', 'Queen Size, Walnut Finish, Sheesham Wood', 'Bed: 30    Sofa: 30.5', 'Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight', '', '', '', 1, '2020-04-24 19:15:22'),
(6, 'Neeson Multi Utility Wardrobe', '39', '9', 41861, 33489, 5, 'Screenshot 2020-04-25 at 1.02.19 AM.png', '36 L x 20 W ', 'Neeson multi utility wardrobe in the honey finish has zig-zag design pattern on the front panel. The design is more attractive, as this solid wood furniture is highlighted in the alternate dark and light shade pattern. This wardrobe has storage in the form of shelves in three different sizes.Neeson multi utility wardrobe is a contemporary style furniture unit which has a frame built of Sheesham wood that emboldens the classic looks of it. This bedroom furniture unit comes in different beautiful finishes like: Teak, Honey, Mahogany and Walnut which spills the distinct aura in your bedroom.', 'Honey Finish,Sheesham Wood', '72', 'Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight', '', '', '', 1, '2020-04-24 19:20:34'),
(7, 'Travis Multi Utility Wardrobe', '39', '10', 55374, 34944, 3, 'Screenshot 2020-04-25 at 1.05.07 AM.png', '35 L x 20 W', 'Cleaning Technique Wipe off the dirt from the furniture with a soft cotton cloth. Also avoid using the excess water for cleaning, take moistened cloth to wipe off the dirt.  Avoid Chemicals Avoid chemical contact with the furniture as it may harm the natural finish and further the durability. Also, make sure to avoid application of polyurethane paints on the furniture.  Scratch & Burn Remedy Scratches, burns, residue and any other surface damage can be taken off with a fine-grit sandpaper. Reapply mineral oil after sanding.', 'Walnut Finish,Sheesham Wood', '72', 'Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight', '', '', '', 1, '2020-04-24 19:39:33'),
(8, 'Felner 2 Door Multi Utility Wardrobe', '39', '11', 62486, 49989, 2, 'Screenshot 2020-04-25 at 1.13.55 AM.png', '36 L x 22 W', '1. Felner wardrobe is a rustic furniture unit design. It has a cupboard followed by three broad drawers below. The cupboard has vertical slates indented in it, while the drawers follow horizontal slated pattern upon it. The cupboard has shelves of different sizes with two drawers in it. Each of the drawers and doors have black metallic hemispherical handles embossed upon it. 2. This furniture unit is made in sheesham wood. â€‹3. It has three finish options of honey, teak and walnut available with it.', 'Walnut Finish,Sheesham Wood', '72', 'Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight', '', '', '', 1, '2020-04-24 19:46:19'),
(9, 'Cambrey 2 Door Wardrobe with Mirror', '39', '12', 42874, 34874, 5, 'Screenshot 2020-04-25 at 1.18.32 AM.png', '36 L x 22 W', '1. Cambrey is an epitome of a traditional furniture design. It has two doors with an embossed frame and mirror on other side of door. This unit offers storage in the form of shelves and drawers. 2. It is made from Sheesham wood, which makes it highly durable and sturdy. â€‹3. It is available in different finish options to make it much more impressive and gorgeous.', 'Honey Finish And Sheesham Wood', '72', 'This product comes with a 1-year warranty which covers manufacturing defects, inherent termites and borer issues.  For upholstered products, the warranty applies to the frame, padding and mechanisms, if any.  This limited warranty does not apply to the following:  Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight  Decaying of wood due to consistent exposure to water  Upholstery fabrics such as seat covers have no warranty  Non-standard dry-cleaning procedures or use of harsh chemicals  As per the industry standards, unevenness of up to 5 mm is accepted widely due to differences in floor and surface levels. This is not covered in warranty.', '', '', '', 1, '2020-04-24 19:51:00'),
(10, 'Portus Multi Utility Wardrobe', '39', '13', 43749, 34899, 3, 'Screenshot 2020-04-25 at 1.23.43 AM.png', '36 L x 20 W', '1. Portus multi-utility wardrobe is a simple mid-century wardrobe inspired by the modern style. It is a perfect ensemble for storing the items. Storage in this wardrobe is present in term of racks and four drawers at the bottom. 2. Portus Wardrobe is crafted from premium-quality Sheesham wood. â€‹3. Three finish options available in this are honey, walnut, and teak.', 'Honey Finish And Sheesham Wood', '72', 'This product comes with a 1-year warranty which covers manufacturing defects, inherent termites and borer issues.  For upholstered products, the warranty applies to the frame, padding and mechanisms, if any.  This limited warranty does not apply to the following:  Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight  Decaying of wood due to consistent exposure to water  Upholstery fabrics such as seat covers have no warranty  Non-standard dry-cleaning procedures or use of harsh chemicals  As per the industry standards, unevenness of up to 5 mm is accepted widely due to differences in floor and surface levels. This is not covered in warranty.', '', '', '', 1, '2020-04-24 19:55:54'),
(11, 'Marriott Wooden Sofa 3+1+1 Set', '40', '14', 34499, 28999, 1, 'Screenshot 2020-04-25 at 12.29.42 AM.png', '86 L x 34 W', '1. The Solace L-Shaped Wooden Sofa is worth adding in the home as its sharp and smooth features make this sofa elegant and attractive. The side storage cabinets near the armrest summate additional features to the unit. With this, the sturdy and sober backrest amplifies the beauty of the furniture. 2. Sheesham wood makes this sofa more promising to serve longer. â€‹3. This furniture unit is available in honey, teak and walnut finish.', 'Teak Finish, Seesham wood', '31', 'This product comes with a 1-year warranty which covers manufacturing defects, inherent termites and borer issues.  For upholstered products, the warranty applies to the frame, padding and mechanisms, if any.  This limited warranty does not apply to the following:  Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight  Decaying of wood due to consistent exposure to water  Upholstery fabrics such as seat covers have no warranty  Non-standard dry-cleaning procedures or use of harsh chemicals  As per the industry standards, unevenness of up to 5 mm is accepted widely due to differences in floor and surface levels. This is not covered in warranty.', '', '', '', 1, '2020-04-24 19:59:31'),
(12, 'Miller 2 Door Multi Utility Wardrobe', '39', 'Wardrobe_202014', 44999, 41999, 5, 'Miller_2_Door_LP.jpg', '90 L x 45 W', '1. Cambrey is an epitome of a traditional furniture design. 2. This unit offers storage in the form of shelves and drawers. 3. It is made from Sheesham wood, which makes it highly durable and sturdy. â€‹4. It is available in different finish options to make it much more impressive and gorgeous.', 'Walnut Finish,Sheesham Wood', '180', 'This product comes with a 1-year warranty which covers manufacturing defects, inherent termites and borer issues.  For upholstered products, the warranty applies to the frame, padding and mechanisms, if any.  This limited warranty does not apply to the following:  Normal wear and tear of the product over prolonged use  Small cuts, scratches or damages due to wrong cleaning methods or impacts/accidents  Damage caused due incorrect installation/assembly by the customer  Cracks developed due to displacement of the product  Fading due to direct exposure to sunlight  Decaying of wood due to consistent exposure to water  Upholstery fabrics such as seat covers have no warranty  Non-standard dry-cleaning procedures or use of harsh chemicals  As per the industry standards, unevenness of up to 5 mm is accepted widely due to differences in floor and surface levels. This is not covered in warranty.', '.', '.', '.', 1, '2020-04-30 16:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `query_master`
--

CREATE TABLE `query_master` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` bigint(255) NOT NULL,
  `subject` text NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(10) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `emial` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `star` int(11) NOT NULL,
  `preference` int(255) NOT NULL DEFAULT '0',
  `added_on` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `dob` text,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `name`, `email`, `password`, `address`, `dob`, `img`, `status`, `addedon`) VALUES
(1, 'Akash Rana', 'iitjee247452@gmail.com', 'Akash@1999', '37,sector 63', '2020-04-22', 'LRM_EXPORT_22940214400476_20190915_231855919.jpeg', 1, '2020-04-24 06:34:49'),
(2, 'saurabh rana', '1999saurabhrana@gmail.com', 'Saurabh@1234', 'bihari', '2020-04-13', '', 1, '2020-04-24 04:12:18'),
(3, 'Ankit Rana', 'ankitrana745207@gmail.com', 'Ankit@1999', NULL, NULL, NULL, 1, '2020-04-24 09:04:52'),
(4, 'Md Yusuf', 'cseincu@gmai', 'Yusuf23@', NULL, NULL, NULL, 1, '2020-04-25 00:36:46'),
(5, 'Vijay ', 'vijayrana967585@gmail.com', 'Vijay@253011', NULL, NULL, NULL, 1, '2020-04-25 04:11:02'),
(7, 'Abhishek Kaushik', 'abhishekkaushik000111@gmail.com', 'Abhi@4321', NULL, NULL, NULL, 1, '2020-04-26 14:11:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `design` (`design`);

--
-- Indexes for table `query_master`
--
ALTER TABLE `query_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_name`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `query_master`
--
ALTER TABLE `query_master`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
