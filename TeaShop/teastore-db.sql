-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2022 at 04:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teastore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` tinyint(4) NOT NULL,
  `tea_type` varchar(20) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `tea_type`, `description`) VALUES
(1, 'Black', 'Black teas tend to be relatively high in caffeine, with about half as much caffeine as a cup of coffee. They brew up a dark, coppery color, and usually have a stronger, more robust flavor than other types of tea. \r\n\r\n'),
(2, 'Green', 'Green teas often brew up a light green or yellow color, and tend to have a lighter body and milder taste. They contain about half as much caffeine as black tea (about a quarter that of a cup of coffee.)'),
(3, 'White', 'White tea has a light body and a mild flavor with a crisp, clean finish. White tea tends to be very low in caffeine, although some silver tip teas may be slightly higher in caffeine.'),
(4, 'Oolong', 'Oolong is a partially oxidized tea, placing it somewhere in between black and green teas in terms of oxidation. Oolong teas can range from around 10-80% oxidation, and can brew up anywhere from a pale yellow to a rich amber cup of tea.'),
(5, 'Herbal', 'Herbal teas are composed of a blend of different herbs and spices. In general, herbal teas contain no caffeine. Herbal blends often have medicinal properties, and depending on the blend can be used to treat everything from sore throats to upset stomachs. ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brand`, `category_id`, `price`, `image`, `description`) VALUES
(1, 'Assam', 'Tea Revival Company', 1, '9.99', 'https://en.wikipedia.org/wiki/Assam_tea#/media/File:Assam-Tee_SFTGFOP1.jpg', 'Assam tea is a black tea named after the region of its production, Assam, India. It is manufactured specifically from the plant Camellia sinensis var. assamica.'),
(2, 'Keemun', 'T2 Tea', 1, '12.00', 'https://en.wikipedia.org/wiki/File:Keemun_FTGFOP_(1).JPG', 'Keemun is a famous Chinese black tea. First produced in the late 19th century, it quickly became popular in the West and is still used for a number of classic blends.'),
(3, 'Nilgiri', 'Fresh Roasted Coffee', 1, '15.95', 'https://en.wikipedia.org/wiki/File:Nilgiritea.jpg', 'Nilgiri tea is a drink made by infusing leaves of Camellia sinensis that is grown and processed in the Nilgiris district in Tamil Nadu, India.'),
(4, 'Jin Jun Mei', 'Master\'s Tea', 1, '10.00', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Jin_Jun_Mei.jpg/200px-Jin_Jun_Mei.jpg', 'Jinjunmei is a celebrated black tea from the Wuyi Mountains in Fujian Province, China. It is made exclusively from the buds plucked in early spring from the tea plant.'),
(5, 'Sencha', 'Ocha & Co', 2, '14.00', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/2017_Kagoshima_sencha.jpg/220px-2017_Kagoshima_sencha.jpg', 'Sencha is a type of Japanese ryokucha which is prepared by infusing the processed whole tea leaves in hot water.'),
(6, 'Gyokuro', 'Ippado Tea USA', 2, '30.00', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Gyokuro_img_0067.jpg/200px-Gyokuro_img_0067.jpg', 'Gyokuro is a type of shaded green tea from Japan. It differs from the standard sencha in being grown under the shade rather than the full sun.'),
(7, 'Matcha', 'Jade Leaf Matcha', 2, '44.95', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Matcha_Scoop.jpg/200px-Matcha_Scoop.jpg', 'Matcha is finely ground powder of specially grown and processed green tea leaves, traditionally consumed in East Asia.'),
(8, 'White Peony', 'Harney and Sons Fine Tea', 3, '20.00', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Baimudan.JPG/195px-Baimudan.JPG', 'It is made from the unopened tea bud and the first two leaves on the shoot, all of which are harvested in early spring, before fully opening.'),
(9, 'Silver Needle', 'The TeaHouse', 3, '65.99', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Bai_Hao_Yin_Zhen_tea_leaf_%28Fuding%29.jpg/220px-Bai_Hao_Yin_Zhen_tea_leaf_%28Fuding%29.jpg', 'Chinese Silver Needle (Yin Zhen) is widely considered the best white tea in the world. It is a beauty to behold with all the fuzzy tea buds. The light brew is a subtle and slightly sweet delight.'),
(10, 'Shou Mei', 'EnjoyingTea', 3, '18.98', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Shou_Mei_tea.JPG/220px-Shou_Mei_tea.JPG', 'Shou Mei  (aka. Longevity Eyebrow) is a deliciously refreshing Chinese white tea with a pronounced fruity and floral flavours.'),
(11, 'Phoenix', 'Steven Smith', 4, '20.00', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Mi_Lan_Xiang_Oolong_Tea_cropped.jpg/220px-Mi_Lan_Xiang_Oolong_Tea_cropped.jpg', 'Phoenix oolong tea is produced in the Guangdong province of China and is among the bestsellers. The Chinese name for this tea means “single bush.\" The leaves of Phoenix oolong teas are harvested from one single bush of the tea plant.'),
(12, 'Tieguanyin', 'Rishi Tea', 4, '60.00', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Tieguanyin2.jpg/220px-Tieguanyin2.jpg', 'Tieguanyin is a variety of Chinese oolong tea that originated in the 19th century in Anxi in Fujian province. Tieguanyin produced in different areas of Anxi have different gastronomic characteristics.'),
(13, 'Chamomile', 'Taylors of Harrogate ', 5, '28.39', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Loose_leaf_chamomile_tea.jpg/220px-Loose_leaf_chamomile_tea.jpg', 'Chamomile tea has a hint of apple alongside a mellow type sweetness. It typically is grown in India, South America, South Africa and Australia.'),
(14, 'Peppermint', 'Twinnings of London ', 5, '26.22', 'https://upload.wikimedia.org/wikipedia/commons/b/b4/Peppermint-tea_hg.jpg', 'Peppermint tea is known for its great impact on the digestive system and general health. Twinning of London\'s peppermint leaves are carefully sources from Egypt and are abundant in vitamins, minerals, and antioxidants. '),
(15, 'Ginger', 'Traditional Medicinals', 5, '30.08', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Ginger_tea.jpg/200px-Ginger_tea.jpg', 'Ginger tea helps with digestion as well as prevents nausea. It has a warm and spicy taste. The plant grows in subtropical and tropical climates. It is commercially grown in South and Southeast Asia.');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `description` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `description`) VALUES
(1, 'admin', 'Administrative access and control over the site.'),
(2, 'guest', 'Guest access to the site.'),
(3, 'member', 'Returning member access to site.'),
(4, 'vendor', 'Vendor access to site.'),
(5, 'business ', 'Business access to site.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `role_id`) VALUES
(1, 'Jon', 'Richardson', 'jonr', 'pass1223', 1),
(2, 'Don', 'Major', 'dMajor', '1234', 2),
(3, 'Michael', 'Vick', 'MVick1', 'secretive', 2),
(4, 'Monica', 'Galvez', 'mogalvez', 'mg1345', 1),
(5, 'Olivia', 'Solano', 'Osolano', 'oso342', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
