-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2024 at 12:35 AM
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
  `requiredDate` datetime NOT NULL,
  `shippDate` datetime NOT NULL,
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
  `rawID` int NOT NULL,
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

INSERT INTO `product_tbl` (`prod_id`, `rawID`, `prod_name`, `prod_quantity`, `prod_mprice`, `prod_lprice`, `prod_categ`, `prod_code`, `prod_img`) VALUES
(1, 0, 'Quesadillas', 50, '160.00', 0.00, 'Appetizer', '00001', 'quesadillas.jpg'),
(2, 0, 'Nachos', 4, '120.00', 0.00, 'Appetizer', '121212121', 'nachos.jpg'),
(3, 0, 'Fries', 8, '120.00', 0.00, 'Appetizer', '8', 'fries.jpg'),
(4, 0, 'Fried Chicken w/ Gravy', 5, '148.00', 0.00, 'Meals', '00777', 'fchicken.jpg'),
(5, 0, 'Honey Garlic Chicken', 6, '155.00', 0.00, 'Meals', '3', 'honeychicken.jpg'),
(6, 0, 'Orange Chicken', 5, '155.00', 0.00, 'Meals', '8', 'orangechicken.jpg'),
(7, 0, 'Burger Steak', 9, '160.00', 0.00, 'Meals', '8', 'burgersteak.jpg'),
(8, 0, 'Sizzling Pepper Beef Steak', 7, '165.00', 0.00, 'Meals', '3', 'sizzlingsteak.jpg'),
(9, 0, 'Beef Tapa', 1, '128.00', 0.00, 'Meals', '1', 'beeftapa.jpg'),
(10, 0, 'Crispy Lechon Sisig', 2, '165.00', 0.00, 'Meals', '9', 'crispysisig.jpg'),
(11, 0, 'Lechon Kawali', 1, '148.00', 0.00, 'Meals', '1', 'lechonkawali.jpg'),
(12, 0, 'Bacon and Egg', 1, '155.00', 0.00, 'Meals', '2334', 'baconegg.jpg'),
(13, 0, 'Spam and Egg', 1, '115.00', 0.00, 'Meals', '1', 'spamegg.jpg'),
(14, 0, 'Beef Bulgogi', 1, '168.00', 0.00, 'Meals', '1', 'beefbulgogi.jpg'),
(15, 0, 'Korean Beef Stew', 1, '188.00', 0.00, 'Meals', '1', 'beefstew.jpg'),
(16, 0, 'Chicken Parmegiana', 1, '168.00', 0.00, 'Meals', '1', 'chickenparmegiana.jpg'),
(17, 0, 'Carbonara', 1, '170.00', 0.00, 'Pasta', '10121', 'carbonara.jpg'),
(18, 0, 'Classic Spaghetti', 1, '170.00', 0.00, 'Pasta', '1', 'classicspag.jpg'),
(19, 0, 'Truffle Pasta', 1, '170.00', 0.00, 'Pasta', '1', 'trufflepasta.jpg'),
(20, 0, 'Chicken Alfrado', 1, '170.00', 0.00, 'Pasta', '1', 'chickenalfrado.jpg'),
(21, 0, 'Tuna Pesto', 1, '170.00', 0.00, 'Pasta', '1', 'tunapesto.jpg'),
(22, 0, 'Parmegiana Meatball', 1, '190.00', 0.00, 'Pasta', '1', 'parmegianameatball.jpg'),
(30, 0, 'Classic Caesar', 1, '180.00', 0.00, 'Salad', '1', 'ceasar.jpg'),
(31, 0, 'Chef Salad', 1, '180.00', 0.00, 'Salad', '1', 'chefsalad.jpg'),
(32, 0, 'Chicken Salad', 1, '180.00', 0.00, 'Salad', '1', 'chickensalad.jpg'),
(33, 0, 'Tuna Salad', 1, '180.00', 0.00, 'Salad', '1', 'tunasalad.jpg'),
(34, 0, 'Mushroom Soup', 12, '150.00', 0.00, 'Soup', '128212', 'mushroomsoup.jpg'),
(35, 0, 'Crab and Corn', 1, '150.00', 0.00, 'Soup', '1', 'crabandcornsoup.jpg'),
(36, 0, 'Pumpkin Soup', 1, '150.00', 0.00, 'Soup', '1', 'pumpkinsoup.jpg'),
(37, 0, 'Beef Bulgogi', 10, '160.00', 0.00, 'Meals', '1', 'beefbulgogi.jpg'),
(38, 0, 'Pork BBQ Teriyaki', 1, '180.00', 0.00, 'Sandwich', '1', 'bbqteriyaki.jpg'),
(39, 0, 'Smoke Beef and Cheese Brisket', 1, '250.00', 0.00, 'Sandwich', '1', 'smokebeef.jpg'),
(40, 0, 'Meat Balls', 1, '200.00', 0.00, 'Sandwich', '1', 'meatballsandwich.jpg'),
(41, 0, 'Cheesy Egg', 1, '140.00', 0.00, 'Sandwich', '1', 'cheesyegg.jpg'),
(42, 0, 'Cheesy Pepperoni', 1, '180.00', 0.00, 'Sandwich', '1', 'chessypepperoni.jpg'),
(43, 0, 'Vanilla', 10, '145.00', 160.00, 'Coffee Frappe', '102012', 'vanillafrap.jpg'),
(44, 0, 'Mocha', 13, '145.00', 160.00, 'Coffee Frappe', '1237', 'mochafrap.jpg'),
(45, 0, 'Caramel', 7, '150.00', 165.00, 'Coffee Frappe', '19199', 'caramelfrap.jpg'),
(46, 0, 'Cookies and Cream', 15, '165.00', 180.00, 'Coffee Frappe', '1636', 'cookiesncreamfrap.jpg'),
(47, 0, 'Hazel Nut', 14, '150.00', 165.00, 'Coffee Frappe', '1325', 'hazelfrap.jpg'),
(48, 0, 'Java Chip', 32, '155.00', 170.00, 'Coffee Frappe', '131424', 'javafrap.jpg'),
(49, 0, 'Salted Caramel', 16, '155.00', 170.00, 'Coffee Frappe', '1212', 'saltedcaramelfrap.jpg'),
(50, 0, 'Vanilla Latte', 18, '140.00', 150.00, 'Flavored Coffee', '123', 'icedvanillalatte.jpg'),
(51, 0, 'Mocha Latte', 12, '140.00', 155.00, 'Flavored Coffee', '213', 'mochalatte.jpg'),
(52, 0, 'Caramel Latte', 45, '145.00', 180.00, 'Flavored Coffee', '1245', 'icedcaramellatte.jpg'),
(53, 0, 'Cookies and Cream', 13, '150.00', 170.00, 'Flavored Coffee', '32422', 'icedcookiesncream.jpg'),
(54, 0, 'Spanish Latte', 23, '140.00', 155.00, 'Flavored Coffee', '61361', 'icedspanishlatte.jpg'),
(55, 0, 'Brewed Coffee', 23, '45.00', 0.00, 'Hot Coffee', '0027', 'brewedcoffee.jpg'),
(56, 0, 'Espresso', 34, '40.00', 55.00, 'Hot Coffee', '1213', 'espresso.jpg'),
(57, 0, 'Capuccino', 24, '80.00', 90.00, 'Hot Coffee', 'q7275', 'capuccino.jpg'),
(58, 0, 'Caphe Vietnam', 23, '80.00', 0.00, 'Hot Coffee', '43', 'caphevietnam.jpg'),
(59, 0, 'Americano', 21, '80.00', 100.00, 'Hot Coffee', '213', 'hotamericano.jpg'),
(60, 0, 'Caffe Latte', 32, '90.00', 100.00, 'Hot Coffee', '13', 'caffelatte.jpg'),
(61, 0, 'Vanilla Latte', 25, '90.00', 100.00, 'Hot Coffee', '1213', 'hotvanilla.jpg'),
(62, 0, 'Mocha Latte', 12, '90.00', 100.00, 'Hot Coffee', '123', 'hotmocha.jpg'),
(63, 0, 'Caramel Latte', 1, '95.00', 105.00, 'Hot Coffee', '1265', 'hotcaramel.jpg'),
(64, 0, 'Spanish Latte', 18, '90.00', 100.00, 'Hot Coffee', '123', 'hotpanish.jpg'),
(65, 0, 'Americano', 12, '90.00', 0.00, 'Iced Coffee', '1010', 'icedamericano.jpg'),
(66, 0, 'Caphe Vietnam', 23, '120.00', 0.00, 'Iced Coffee', '1', 'caphevietnam.jpg'),
(67, 0, 'Caffe Latte', 12, '130.00', 140.00, 'Iced Coffee', '21', 'icedcafe.jpg'),
(68, 0, 'Vanilla', 12, '140.00', 155.00, 'Non Coffee Frappe', '2', 'vanillafrap.jpg'),
(69, 0, 'Mocha', 12, '140.00', 155.00, 'Non Coffee Frappe', '1', 'mochafrap.jpg'),
(70, 0, 'Caramel', 20, '140.00', 155.00, 'Non Coffee Frappe', '12', 'caramelfrap.jpg'),
(71, 0, 'Cookies and Cream', 23, '150.00', 175.00, 'Non Coffee Frappe', '1', 'cookiesncreamfrap.jpg'),
(72, 0, 'Hazel Nut', 23, '150.00', 165.00, 'Non Coffee Frappe', '1', 'hazelfrap.jpg'),
(73, 0, 'Java Chip', 12, '150.00', 175.00, 'Non Coffee Frappe', '12', 'javafrap.jpg'),
(74, 0, 'Salted Caramel', 1, '150.00', 165.00, 'Non Coffee Frappe', '12', 'saltedcaramelfrap.jpg'),
(75, 0, 'Taro Cream Cheese', 24, '150.00', 165.00, 'Non Coffee Frappe', '12', 'tarocreamcheese.jpg'),
(76, 0, 'Double Dutch', 34, '150.00', 165.00, 'Non Coffee Frappe', '1', 'doubledutch.jpg'),
(87, 0, 'Smoked Ham', 1, '200.00', 0.00, 'Sandwich', '86', 'smokeham.jpg'),
(88, 0, 'Truffle Smoked Ham', 6, '200.00', 0.00, 'Sandwich', '27', 'trufflesmokeham.jpg'),
(89, 0, 'Bacon and Egg', 88, '180.00', 0.00, 'Sandwich', '5', 'baconeggsandwich.jpg'),
(90, 0, 'Cheesy Bacon Mushroom', 56, '180.00', 0.00, 'Sandwich', '08', 'cheesybacon.jpg'),
(91, 0, 'Pulled Pork', 87, '170.00', 0.00, 'Sandwich', '64', 'pulledpork.jpg'),
(92, 0, 'Tuna', 8, '170.00', 0.00, 'Sandwich', '5', 'tunasandwich.jpg'),
(93, 0, 'Chicken', 6, '170.00', 0.00, 'Sandwich', '55', 'chickensandwich.jpg'),
(94, 0, 'Beef Burger', 7, '160.00', 0.00, 'Sandwich', '882', 'beefburger.jpg'),
(95, 0, 'Hot Chocolate', 1, '80.00', 0.00, 'Others', '12', 'hotchocolate.jpg'),
(96, 0, 'Hot Pure Vanilla', 12, '80.00', 0.00, 'Others', '6', 'hotpurevanilla.jpg'),
(97, 0, 'Housed Iced Tea', 8, '55.00', 0.00, 'Others', '4', 'icedtea.jpg'),
(98, 0, 'Iced Tea Pitcher', 5, '110.00', 0.00, 'Others', '5', 'icedteapitcher.jpg'),
(106, 0, 'Iced Coffee Cream Cheese', 15, '165.00', 0.00, 'Flavored Coffee', '87666', 'icedcoffeecheese.jpg');

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
  `CustomerID` int NOT NULL,
  `productID` int NOT NULL,
  `emplpyeeID` int NOT NULL,
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
(6, 6, '2023-07-06 06:30:00', 32.50, 40.00, 7.50),
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
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `LastName`, `FirstName`, `UserRole`, `birthdate`, `email`, `Username`, `Password`, `ContactNo`, `gender`, `address`, `CreatedAt`, `UpdatedAt`) VALUES
(4, 'rontale', 'dan keneth', 'customer', '2012-12-12', 'rontaledankeneth@gmail.com', 'danken', '$2y$10$MmcOz.MHf9Z0H/ImNvPFxeGx0xcjeWPTlMBHgB0ioxImapIwkoZRO', 9085353978, 'male', 'tawiran calapan', '2024-02-03 21:27:33', '2024-02-03 21:27:33'),
(5, 'hehe', 'hehe', 'customer', '2002-12-12', 'hehe@gmail.com', 'hehe', '$2y$10$W8/FbsSWqjGAJqNNmkGQWu50IztALekIh7L7qhJ9rw3H/y/TM29oS', 9568319369, 'male', 'tawiran calapan', '2024-02-03 21:30:24', '2024-02-03 21:30:24'),
(6, 'Gutierrez', 'Nicolle', 'customer', '2003-07-17', 'gutierreznicollecatly@gmail.com', 'nicsxxx17', '$2y$10$PNubDWrxYZDSQCv9MCNSsejg2OLgpS.ZtZ1EyPw62/TsZgE0/c6yK', 639286341210, 'female', 'Dao Naujan, Oriental Mindoro', '2024-02-11 09:31:51', '2024-02-11 09:31:51');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `rawID` (`rawID`);

--
-- Indexes for table `rawproducttable`
--
ALTER TABLE `rawproducttable`
  ADD PRIMARY KEY (`rawID`);

--
-- Indexes for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD PRIMARY KEY (`TableID`),
  ADD KEY `CustomerID` (`CustomerID`,`productID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `emplpyeeID` (`emplpyeeID`);

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
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD CONSTRAINT `tablereservation_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tablereservation_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tablereservation_ibfk_3` FOREIGN KEY (`emplpyeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `product_tbl` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
