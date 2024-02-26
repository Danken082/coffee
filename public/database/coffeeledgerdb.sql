-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2024 at 04:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeledgerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `id` int NOT NULL,
  `CustomerID` int NOT NULL,
  `ProductID` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `Status` text NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`id`, `CustomerID`, `ProductID`, `total`, `quantity`, `Status`, `Created_at`, `Updated_at`) VALUES
(16, 10, 1, '320.00', 2, 'oncart', '2024-02-22 05:48:35', '2024-02-22 05:48:35'),
(17, 6, 2, '240.00', 2, 'oncart', '2024-02-22 23:28:20', '2024-02-22 23:28:20'),
(18, 6, 3, '120.00', 1, 'oncart', '2024-02-22 23:28:35', '2024-02-22 23:28:35'),
(19, 6, 1, '800.00', 5, 'oncart', '2024-02-24 01:15:20', '2024-02-24 01:15:20'),
(20, 6, 3, '240.00', 2, 'oncart', '2024-02-24 06:49:17', '2024-02-24 06:49:17'),
(21, 6, 73, '300.00', 2, 'oncart', '2024-02-25 01:31:00', '2024-02-25 01:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int NOT NULL,
  `Complaint` varchar(150) NOT NULL,
  `CustomerID` int NOT NULL,
  `ProductID` int NOT NULL,
  `Ratings` int NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int NOT NULL,
  `UserID` int NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `EmployeeType` varchar(150) NOT NULL,
  `ContactNo` int NOT NULL,
  `email` varchar(150) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `idNumber` int NOT NULL,
  `IDType` varchar(150) NOT NULL,
  `EmployeeSchedule` datetime NOT NULL,
  `EmployeeSalary` double(10,2) NOT NULL,
  `EmployeeStatus` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int NOT NULL,
  `CustomerID` int NOT NULL,
  `empID` int NOT NULL,
  `ProductID` int NOT NULL,
  `paymentStatus` text NOT NULL,
  `orderType` text NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalPrice` double(10,2) NOT NULL,
  `Quantity` int NOT NULL,
  `orderStatus` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `orderhistoryID` int NOT NULL,
  `OrderID` int NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `prod_id` int NOT NULL,
  `prod_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_quantity` int NOT NULL,
  `prod_mprice` decimal(10,2) NOT NULL,
  `prod_lprice` double(10,2) NOT NULL,
  `prod_categ` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_img` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`prod_id`, `prod_name`, `prod_quantity`, `prod_mprice`, `prod_lprice`, `prod_categ`, `prod_code`, `prod_img`) VALUES
(1, 'Quesadillas', 50, '160.00', 0.00, 'Appetizer', '00001', 'quesadillas.jpg'),
(2, 'Nachos', 4, '120.00', 0.00, 'Appetizer', '121212121', 'nachos.jpg'),
(3, 'Fries', 8, '120.00', 0.00, 'Appetizer', '8', 'fries.jpg'),
(4, 'Fried Chicken w/ Gravy', 5, '148.00', 0.00, 'Meals', '00777', 'fchicken.jpg'),
(5, 'Honey Garlic Chicken', 6, '155.00', 0.00, 'Meals', '3', 'honeychicken.jpg'),
(6, 'Orange Chicken', 5, '155.00', 0.00, 'Meals', '8', 'orangechicken.jpg'),
(7, 'Burger Steak', 9, '160.00', 0.00, 'Meals', '8', 'burgersteak.jpg'),
(8, 'Sizzling Pepper Beef Steak', 7, '165.00', 0.00, 'Meals', '3', 'sizzlingsteak.jpg'),
(9, 'Beef Tapa', 1, '120.00', 0.00, 'Meals', '1', 'beeftapa.jpg'),
(10, 'Crispy Lechon Sisig', 2, '165.00', 0.00, 'Meals', '9', 'crispysisig.jpg'),
(11, 'Lechon Kawali', 1, '148.00', 0.00, 'Meals', '1', 'lechonkawali.jpg'),
(12, 'Bacon and Egg', 1, '155.00', 0.00, 'Meals', '2334', 'baconegg.jpg'),
(13, 'Spam and Egg', 1, '115.00', 0.00, 'Meals', '1', 'spamegg.jpg'),
(14, 'Beef Bulgogi', 1, '168.00', 0.00, 'Meals', '1', 'beefbulgogi.jpg'),
(15, 'Korean Beef Stew', 1, '188.00', 0.00, 'Meals', '1', 'beefstew.jpg'),
(16, 'Chicken Parmegiana', 1, '168.00', 0.00, 'Meals', '1', 'chickenparmegiana.jpg'),
(17, 'Carbonara', 1, '170.00', 0.00, 'Pasta', '10121', 'carbonara.jpg'),
(18, 'Classic Spaghetti', 1, '170.00', 0.00, 'Pasta', '1', 'classicspag.jpg'),
(19, 'Truffle Pasta', 1, '170.00', 0.00, 'Pasta', '1', 'trufflepasta.jpg'),
(20, 'Chicken Alfrado', 1, '170.00', 0.00, 'Pasta', '1', 'chickenalfrado.jpg'),
(21, 'Tuna Pesto', 1, '170.00', 0.00, 'Pasta', '1', 'tunapesto.jpg'),
(22, 'Parmegiana Meatball', 1, '190.00', 0.00, 'Pasta', '1', 'parmegianameatball.png'),
(30, 'Classic Caesar', 1, '180.00', 0.00, 'Salad', '1', 'ceasar.jpg'),
(31, 'Chef Salad', 1, '180.00', 0.00, 'Salad', '1', 'chefsalad.jpg'),
(32, 'Chicken Salad', 1, '180.00', 0.00, 'Salad', '1', 'chickensalad.jpg'),
(33, 'Tuna Salad', 1, '180.00', 0.00, 'Salad', '1', 'tunasalad.jpg'),
(34, 'Mushroom Soup', 12, '150.00', 0.00, 'Soup', '128212', 'mushroomsoup.jpg'),
(35, 'Crab and Corn', 1, '150.00', 0.00, 'Soup', '1', 'crabandcornsoup.jpg'),
(36, 'Pumpkin Soup', 1, '150.00', 0.00, 'Soup', '1', 'pumpkinsoup.jpg'),
(37, 'Beef Bulgogi', 10, '160.00', 0.00, 'Meals', '1', 'beefbulgogi.jpg'),
(38, 'Pork BBQ Teriyaki', 1, '180.00', 0.00, 'Sandwich', '1', 'bbqteriyaki.jpg'),
(39, 'Smoke Beef and Cheese Brisket', 1, '250.00', 0.00, 'Sandwich', '1', 'smokebeef.jpg'),
(40, 'Meat Balls', 1, '200.00', 0.00, 'Sandwich', '1', 'meatballsandwich.jpg'),
(41, 'Cheesy Egg', 1, '140.00', 0.00, 'Sandwich', '1', 'cheesyegg.jpg'),
(42, 'Cheesy Pepperoni', 1, '180.00', 0.00, 'Sandwich', '1', 'cheesypepperoni.jpg'),
(43, 'Vanilla', 10, '145.00', 160.00, 'Coffee Frappe', '102012', 'vanillafrap.jpg'),
(44, 'Mocha', 13, '145.00', 160.00, 'Coffee Frappe', '1237', 'mochafrap.jpg'),
(45, 'Caramel', 7, '150.00', 165.00, 'Coffee Frappe', '19199', 'caramelfrap.jpg'),
(46, 'Cookies and Cream', 15, '165.00', 180.00, 'Coffee Frappe', '1636', 'cookiesncreamfrap.png'),
(47, 'Hazel Nut', 14, '150.00', 165.00, 'Coffee Frappe', '1325', 'hazelfrap.jpg'),
(48, 'Java Chip', 32, '155.00', 170.00, 'Coffee Frappe', '131424', 'javafrap.jpg'),
(49, 'Salted Caramel', 16, '155.00', 170.00, 'Coffee Frappe', '1212', 'saltedcaramelfrap.jpg'),
(50, 'Vanilla Latte', 18, '140.00', 150.00, 'Flavored Coffee', '123', 'icedvanillalatte.jpg'),
(51, 'Mocha Latte', 12, '140.00', 155.00, 'Flavored Coffee', '213', 'mochalatte.jpg'),
(52, 'Caramel Latte', 45, '145.00', 180.00, 'Flavored Coffee', '1245', 'icedcaramellatte.png'),
(53, 'Cookies and Cream', 13, '150.00', 170.00, 'Flavored Coffee', '32422', 'icedcookiesncream.jpg'),
(54, 'Spanish Latte', 23, '140.00', 155.00, 'Flavored Coffee', '61361', 'icedspanishlatte.jpg'),
(55, 'Brewed Coffee', 23, '45.00', 0.00, 'Hot Coffee', '0027', 'brewedcoffee.jpg'),
(56, 'Espresso', 34, '40.00', 55.00, 'Hot Coffee', '1213', 'espresso.jpg'),
(57, 'Capuccino', 24, '80.00', 90.00, 'Hot Coffee', 'q7275', 'cappuccino.jpg'),
(58, 'Caphe Vietnam', 23, '80.00', 0.00, 'Hot Coffee', '43', 'caphevietnam.jpg'),
(59, 'Americano', 21, '80.00', 100.00, 'Hot Coffee', '213', 'hotamericano.jpg'),
(60, 'Caffe Latte', 32, '90.00', 100.00, 'Hot Coffee', '13', 'caffelatte.jpg'),
(61, 'Vanilla Latte', 25, '90.00', 100.00, 'Hot Coffee', '1213', 'hotvanilla.jpg'),
(62, 'Mocha Latte', 12, '90.00', 100.00, 'Hot Coffee', '123', 'hotmocha.jpg'),
(63, 'Caramel Latte', 1, '95.00', 105.00, 'Hot Coffee', '1265', 'hotcaramel.jpg'),
(64, 'Spanish Latte', 18, '90.00', 100.00, 'Hot Coffee', '123', 'hotspanish.jpg'),
(65, 'Americano', 12, '90.00', 0.00, 'Iced Coffee', '1010', 'icedamericano.jpg'),
(66, 'Caphe Vietnam', 23, '120.00', 0.00, 'Iced Coffee', '1', 'caphevietnam.jpg'),
(67, 'Caffe Latte', 12, '130.00', 140.00, 'Iced Coffee', '21', 'icedcafe.jpg'),
(68, 'Vanilla', 12, '140.00', 155.00, 'Non Coffee Frappe', '2', 'vanillafrap.jpg'),
(69, 'Mocha', 12, '140.00', 155.00, 'Non Coffee Frappe', '1', 'mochafrap.jpg'),
(70, 'Caramel', 20, '140.00', 155.00, 'Non Coffee Frappe', '12', 'caramelfrap.jpg'),
(71, 'Cookies and Cream', 23, '150.00', 175.00, 'Non Coffee Frappe', '1', 'cookiesncreamfrap.png'),
(72, 'Hazel Nut', 23, '150.00', 165.00, 'Non Coffee Frappe', '1', 'hazelfrap.jpg'),
(73, 'Java Chip', 12, '150.00', 175.00, 'Non Coffee Frappe', '12', 'javafrap.jpg'),
(74, 'Salted Caramel', 1, '150.00', 165.00, 'Non Coffee Frappe', '12', 'saltedcaramelfrap.jpg'),
(75, 'Taro Cream Cheese', 24, '150.00', 165.00, 'Non Coffee Frappe', '12', 'tarocreamcheese.jpg'),
(76, 'Double Dutch', 34, '150.00', 165.00, 'Non Coffee Frappe', '1', 'doubledutch.jpg'),
(87, 'Smoked Ham', 1, '200.00', 0.00, 'Sandwich', '86', 'smokeham.jpg'),
(88, 'Truffle Smoked Ham', 6, '200.00', 0.00, 'Sandwich', '27', 'trufflesmokeham.jpg'),
(89, 'Bacon and Egg', 88, '180.00', 0.00, 'Sandwich', '5', 'baconeggsandwich.jpg'),
(90, 'Cheesy Bacon Mushroom', 56, '180.00', 0.00, 'Sandwich', '08', 'cheesybacon.jpg'),
(91, 'Pulled Pork', 87, '170.00', 0.00, 'Sandwich', '64', 'pulledpork.jpg'),
(92, 'Tuna', 8, '170.00', 0.00, 'Sandwich', '5', 'tunasandwich.jpg'),
(93, 'Chicken', 6, '170.00', 0.00, 'Sandwich', '55', 'chickensandwich.jpg'),
(94, 'Beef Burger', 7, '160.00', 0.00, 'Sandwich', '882', 'beefburger.jpg'),
(95, 'Hot Chocolate', 1, '80.00', 0.00, 'Others', '12', 'hotchocolate.jpg'),
(96, 'Hot Pure Vanilla', 12, '80.00', 0.00, 'Others', '6', 'hotpurevanilla.jpg'),
(97, 'Housed Iced Tea', 8, '55.00', 0.00, 'Others', '4', 'icedtea.jpg'),
(98, 'Iced Tea Pitcher', 5, '110.00', 0.00, 'Others', '5', 'icedteapitcher.jpg'),
(99, 'Iced Coffee Cream Cheese', 15, '165.00', 0.00, 'Flavored Coffee', '87666', 'icedcoffeecheese.png');

-- --------------------------------------------------------

--
-- Table structure for table `rawproducttable`
--

CREATE TABLE `rawproducttable` (
  `rawID` int NOT NULL,
  `product` text NOT NULL,
  `quantity` int NOT NULL,
  `stocks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tablereservation`
--

CREATE TABLE `tablereservation` (
  `TableID` int NOT NULL,
  `LastName` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contactNo` bigint NOT NULL,
  `apppointmentDate` datetime NOT NULL,
  `totalPayment` double(10,2) NOT NULL,
  `TableCategory` varchar(150) NOT NULL,
  `TableType` int NOT NULL,
  `paymentStatus` varchar(150) NOT NULL,
  `reservationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` double(10,2) NOT NULL,
  `amount_paid` double(10,2) NOT NULL,
  `change_amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `user_id`, `order_date`, `total_amount`, `amount_paid`, `change_amount`) VALUES
(1, 1, '2023-07-01 01:30:00', 25.50, 30.00, 4.50),
(2, 2, '2023-07-02 07:45:00', 42.75, 50.00, 7.25),
(3, 3, '2023-07-03 03:20:00', 17.25, 20.00, 2.75),
(4, 4, '2023-07-04 10:15:00', 28.75, 30.00, 1.25),
(5, 5, '2023-07-05 04:00:00', 18.25, 20.00, 1.75),
(6, 6, '2023-10-06 06:30:00', 32.50, 40.00, 7.50),
(7, 7, '2023-07-07 02:15:00', 9.25, 10.00, 0.75),
(8, 8, '2023-07-09 23:25:35', 31.94, 40.00, 8.06),
(9, 9, '2023-07-09 23:25:59', 25.00, 30.00, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `UserRole` varchar(150) NOT NULL,
  `birthdate` date NOT NULL,
  `email` text NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `ContactNo` bigint NOT NULL,
  `gender` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `profile_img` varchar(150) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `LastName`, `FirstName`, `UserRole`, `birthdate`, `email`, `Username`, `Password`, `ContactNo`, `gender`, `address`, `profile_img`, `CreatedAt`, `UpdatedAt`) VALUES
(6, 'Gutierrez', 'Nicolle', 'Customer', '2003-07-17', 'gutierreznicollecatly@gmail.com', 'nicsxxx17', '$2y$10$PNubDWrxYZDSQCv9MCNSsejg2OLgpS.ZtZ1EyPw62/TsZgE0/c6yK', 639286341210, 'Female', 'Dao Naujan, Oriental Mindoro', 'person_4.jpg', '2024-02-11 09:31:51', '2024-02-11 09:31:51'),
(8, 'asheru', 'maleke', 'Customer', '2002-12-21', 'admin@gmail.com', 'admin', '$2y$10$vUHXKEoaiTiUFOCOlaumdul4t7iQOdPKlDq9dicU8XolHK4.D.WYm', 639085353978, 'Male', 'Di makita', '', '2024-02-15 13:11:42', '2024-02-15 13:11:42'),
(9, 'asheru', 'maleke', 'Customer', '2003-12-12', 'admin23@gmail.com', 'admin', '$2y$10$PQzeig639sc14GPCsyQnRuf4.Ov.1G57j/LOR61E4gydKkbEonmIm', 639668859435, 'Male', 'Di makita', '', '2024-02-15 13:12:50', '2024-02-15 13:12:50'),
(10, 'rontale', 'dan keneth', 'Customer', '2003-07-06', 'rontaledankeneth@gmail.com', 'rontale12', '$2y$10$dxjq8ZxY9q2evZ0eyAbjFOtGAen/.LNr3Ks3fgU.c.empymWLFF46', 639085353978, 'Male', 'tawiran calapan', '', '2024-02-22 00:49:35', '2024-02-22 00:49:35'),
(12, 'Mendoza', 'Aldrich', 'Customer', '2005-09-09', 'aldrich@gmail.com', 'aldrich0909', '$2y$10$6RTk9/ZvS2BsAwQlfKCz/Oh0y582ATC9pRyQn0YBcePgEpKxt8JjS', 63928426108, 'Male', 'Lalud, Calapan City', '', '2024-02-25 08:24:17', '2024-02-25 08:24:17'),
(13, 'Santos', 'Ava', 'Admin', '1998-06-18', 'santosava@example.com', 'ava25', '$2y$10$6YxlUlQDhCsV256PKnG.ceZbeFpqRsEh0lxUopLmQfvQKkNPdiAFe', 639876732543, '', 'Bayanan II, Calapan City', '', '2024-02-25 08:32:02', '2024-02-25 08:32:02'),
(17, 'Doe', 'John', 'Admin', '1997-07-09', 'johndoe@gmail.com', 'john12', '$2y$10$WouvDnBoT98Ec/uj0BZ1TuQ/rI2Ertidm5jDS0d2CBPO4CYrYiaFC', 9230475961, 'Male', 'Masipit, Calapan City', '', '2024-02-25 10:09:56', '2024-02-25 10:09:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CustomerID` (`CustomerID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintID`),
  ADD KEY `CustomerID` (`CustomerID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `CustomerID` (`CustomerID`,`empID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `ProductID_2` (`ProductID`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`orderhistoryID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `rawproducttable`
--
ALTER TABLE `rawproducttable`
  ADD PRIMARY KEY (`rawID`);

--
-- Indexes for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `orderhistoryID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `prod_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `rawproducttable`
--
ALTER TABLE `rawproducttable`
  MODIFY `rawID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tablereservation`
--
ALTER TABLE `tablereservation`
  MODIFY `TableID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`EmployeeID`) ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `product_tbl` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
