-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2024 at 04:20 PM
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
  `CustomerID` int DEFAULT NULL,
  `ProductID` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `size` varchar(10) NOT NULL,
  `Status` text NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`id`, `CustomerID`, `ProductID`, `total`, `quantity`, `size`, `Status`, `Created_at`, `Updated_at`) VALUES
(60, 18, 2, 120.00, 1, 'Medium', 'oncart', '2024-02-28 11:53:03', '2024-02-28 11:53:03'),
(61, 18, 97, 110.00, 2, 'Medium', 'oncart', '2024-02-28 11:53:29', '2024-02-28 11:53:29'),
(62, 18, 69, 155.00, 1, 'Large', 'oncart', '2024-02-28 12:00:20', '2024-02-28 12:00:20');

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
  `CustomerID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `paymentStatus` text NOT NULL,
  `orderType` text NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `size` varchar(150) NOT NULL,
  `barcode` varchar(140) NOT NULL,
  `orderStatus` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `CustomerID`, `ProductID`, `paymentStatus`, `orderType`, `orderDate`, `total`, `quantity`, `size`, `barcode`, `orderStatus`) VALUES
(58, 17, 3, '', 'onHouse', '2024-02-29 14:43:14', 320.00, 2, 'Large', '6I7QND1IAI', 'onProcess'),
(59, 17, 1, '', 'onHouse', '2024-02-29 14:43:14', 320.00, 2, 'Medium', '6I7QND1IAI', 'onProcess'),
(60, 17, 2, '', 'onHouse', '2024-02-29 14:44:11', 240.00, 2, 'Medium', 'LT0AKASK4K', 'onProcess'),
(61, 17, 39, '', 'onHouse', '2024-02-29 15:19:24', 500.00, 2, 'Medium', 'Z6C0SBGYX5', 'onProcess'),
(62, 17, 3, '', 'onHouse', '2024-02-29 15:19:24', 240.00, 2, 'Medium', 'Z6C0SBGYX5', 'onProcess');

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
  `prod_img` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_desc` varchar(150) NOT NULL,
  `product_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`prod_id`, `prod_name`, `prod_quantity`, `prod_mprice`, `prod_lprice`, `prod_categ`, `prod_code`, `prod_img`, `prod_desc`, `product_status`) VALUES
(1, 'Quesadillas', 50, 160.00, 0.00, 'Appetizer', '00001', 'quesadillas.jpg', 'This is a Mexican dish made of a flour tortilla folded like a pizza with mayonnaise and tomato on top.', 'Unavailable'),
(2, 'Nachos', 4, 120.00, 0.00, 'Appetizer', '121212121', 'nachos.jpg', 'Also a Mexican dish made with corn chips, vegetables, and other ingredients on top.', 'Unavailable'),
(3, 'Fries', 8, 120.00, 0.00, 'Appetizer', '8', 'fries.jpg', 'One of the most sell appetizer is our fries because of its crispiness and smell with perfect combination of our sauce. ', 'Available'),
(4, 'Fried Chicken w/ Gravy', 5, 148.00, 0.00, 'Meals', '00777', 'fchicken.jpg', 'Crispy and juicy fried chicken with our best gravy', 'Available'),
(5, 'Honey Garlic Chicken', 6, 155.00, 0.00, 'Meals', '3', 'honeychicken.jpg', 'Crispy fried chicken breaded with honey', 'Available'),
(6, 'Orange Chicken', 5, 155.00, 0.00, 'Meals', '8', 'orangechicken.jpg', 'Crunchy sweet breaded chicken with citrus flavor, partnered with our garlic fried rice.', 'Available'),
(7, 'Burger Steak', 9, 160.00, 0.00, 'Meals', '8', 'burgersteak.jpg', 'Steak that are smothered in our delicious mushroom gra sauce.vy', 'Available'),
(8, 'Sizzling Pepper Beef Steak', 7, 165.00, 0.00, 'Meals', '3', 'sizzlingsteak.jpg', 'Beefy, juicylicious sizzling pepper beef steak partner with our mushroom gravy', 'Available'),
(9, 'Beef Tapa', 1, 120.00, 0.00, 'Meals', '1', 'beeftapa.jpg', 'Beefy tapa served with green onion and combination of rice, egg and our best gravy', 'Available'),
(10, 'Crispy Lechon Sisig', 2, 165.00, 0.00, 'Meals', '9', 'crispysisig.jpg', 'Crispy grilled sisig with the combination of rice and egg.', 'Available'),
(11, 'Lechon Kawali', 1, 148.00, 0.00, 'Meals', '1', 'lechonkawali.jpg', 'Crispy deep fried pork belly with our savory gravy sauce', 'Available'),
(12, 'Bacon and Egg', 1, 155.00, 0.00, 'Meals', '2334', 'baconegg.jpg', 'Breakfast dish that consists of fried slices of bacon and fried egg.', 'Available'),
(13, 'Spam and Egg', 1, 115.00, 0.00, 'Meals', '1', 'spamegg.jpg', 'Breakfast dish that consists of meaty and fatty fried slices of spam and fried egg.', 'Available'),
(14, 'Beef Bulgogi', 1, 168.00, 0.00, 'Meals', '1', 'beefbulgogi.jpg', 'Made with the finest cuts of beef marinated in a flavorful blend of soy sauce, sesame oil, garlic, and ginger.', 'Available'),
(15, 'Korean Beef Stew', 1, 188.00, 0.00, 'Meals', '1', 'beefstew.jpg', 'A spicy soup made with beef, vegetables, and a variety of spices. The stew is typically served with a bowl of steamed rice.', 'Available'),
(16, 'Chicken Parmegiana', 1, 168.00, 0.00, 'Meals', '1', 'chickenparmegiana.jpg', 'Flavorful tomato sauce served and is topped with crispy chicken breasts covered in melty cheese.', 'Available'),
(17, 'Carbonara', 1, 170.00, 0.00, 'Pasta', '10121', 'carbonara.jpg', 'Carbonara with its flavorful cream sauce with combination of sandwich.', 'Available'),
(18, 'Classic Spaghetti', 1, 170.00, 0.00, 'Pasta', '1', 'classicspag.jpg', 'Spaghetti with its tomato sauce and lot of cheese on top.', 'Unavailable'),
(19, 'Truffle Pasta', 1, 170.00, 0.00, 'Pasta', '1', 'trufflepasta.jpg', 'Combines cooked pasta with a creamy sauce made with truffle oil, mushrooms, cream and herbs. ', 'Available'),
(20, 'Chicken Alfredo', 1, 170.00, 0.00, 'Pasta', '1', 'chickenalfredo.jpg', 'Pasta dish that consists of cooked chicken and fettuccine noodles tossed in a creamy white sauce made with butter, heavy cream and garlic.', 'Available'),
(21, 'Tuna Pesto', 1, 170.00, 0.00, 'Pasta', '1', 'tunapesto.jpg', 'Dish that combines canned tuna with pesto sauce.', 'Available'),
(22, 'Parmegiana Meatball', 1, 190.00, 0.00, 'Pasta', '1', 'parmegianameatball.png', 'Parmegiana pasta is made with the freshest ingredients, including meat balls, parmesan cheese, and a savory tomato sauce. ', 'Available'),
(30, 'Classic Caesar', 1, 180.00, 0.00, 'Salad', '1', 'ceasar.jpg', ' Crunchy lettuce leaves tossed in a creamy dressing of mayonnaise.', 'Available'),
(31, 'Chef Salad', 1, 180.00, 0.00, 'Salad', '1', 'chefsalad.jpg', ' Consists of hard-boiled eggs, sliced meats, cheese, tomatoes, cucumbers, and lettuce, may also include anchovies, olives, onions, etc..', 'Available'),
(32, 'Chicken Salad', 1, 180.00, 0.00, 'Salad', '1', 'chickensalad.jpg', 'Consists of chopped cooked chicken, and mixed with other ingredients, such as mayonnaise, celery, onion, herbs, and seasonings.', 'Available'),
(33, 'Tuna Salad', 1, 180.00, 0.00, 'Salad', '1', 'tunasalad.jpg', 'Salad with a blended of tuna and mayonnaise.', ''),
(34, 'Mushroom Soup', 12, 150.00, 0.00, 'Soup', '128212', 'mushroomsoup.jpg', 'Soup in a bread made with mushrooms and milk.', ''),
(35, 'Crab and Corn', 1, 150.00, 0.00, 'Soup', '1', 'crabandcornsoup.jpg', ' Creamy soup made with chicken broth, corn, crab meat inside of bread.', ''),
(36, 'Pumpkin Soup', 1, 150.00, 0.00, 'Soup', '1', 'pumpkinsoup.jpg', 'Made from pureed pumpkin, usually blended with broth, cream, onion, garlic, and spices inside of bread.', ''),
(38, 'Pork BBQ Teriyaki', 1, 180.00, 0.00, 'Sandwich', '1', 'bbqteriyaki.jpg', 'Juicy bbq pork sandwich slices pork marinated in a sweet and savory sauce made with soy sauce, sugar, garlic, ginger, and other ingredients.', ''),
(39, 'Smoke Beef and Cheese Brisket', 1, 250.00, 0.00, 'Sandwich', '1', 'smokebeef.jpg', 'Delicious sandwich that combines tender smoked brisket with melted cheese and barbecue sauce.', ''),
(40, 'Meat Balls', 1, 200.00, 0.00, 'Sandwich', '1', 'meatballsandwich.jpg', 'Sandwich that consists of meatballs and a tomato sauce.', ''),
(41, 'Cheesy Egg', 1, 140.00, 0.00, 'Sandwich', '1', 'cheesyegg.jpg', 'Sandwich with a lot of cheese and egg.', ''),
(42, 'Cheesy Pepperoni', 1, 180.00, 0.00, 'Sandwich', '1', 'cheesypepperoni.jpg', 'Made with freshly sliced pepperoni, melted cheese.', ''),
(43, 'Vanilla', 10, 145.00, 160.00, 'Coffee Frappe', '102012', 'vanillafrap.jpg', '', ''),
(44, 'Mocha', 13, 145.00, 160.00, 'Coffee Frappe', '1237', 'mochafrap.jpg', '', ''),
(45, 'Caramel', 7, 150.00, 165.00, 'Coffee Frappe', '19199', 'caramelfrap.jpg', '', 'Available'),
(46, 'Cookies and Cream', 15, 165.00, 180.00, 'Coffee Frappe', '1636', 'cookiesncreamfrap.png', '', ''),
(47, 'Hazel Nut', 14, 150.00, 165.00, 'Coffee Frappe', '1325', 'hazelfrap.jpg', '', ''),
(48, 'Java Chip', 32, 155.00, 170.00, 'Coffee Frappe', '131424', 'javafrap.jpg', '', ''),
(49, 'Salted Caramel', 16, 155.00, 170.00, 'Coffee Frappe', '1212', 'saltedcaramelfrap.jpg', '', ''),
(50, 'Vanilla Latte', 18, 140.00, 150.00, 'Flavored Coffee', '123', 'icedvanillalatte.jpg', '', 'Unavailable'),
(51, 'Mocha Latte', 12, 140.00, 155.00, 'Flavored Coffee', '213', 'mochalatte.jpg', '', 'Available'),
(52, 'Caramel Latte', 45, 145.00, 180.00, 'Flavored Coffee', '1245', 'icedcaramellatte.png', '', 'Available'),
(53, 'Cookies and Cream', 13, 150.00, 170.00, 'Flavored Coffee', '32422', 'icedcookiesncream.jpg', '', 'Available'),
(54, 'Spanish Latte', 23, 140.00, 155.00, 'Flavored Coffee', '61361', 'icedspanishlatte.jpg', '', 'Available'),
(55, 'Brewed Coffee', 23, 45.00, 0.00, 'Hot Coffee', '0027', 'brewedcoffee.jpg', '', ''),
(56, 'Espresso', 34, 40.00, 55.00, 'Hot Coffee', '1213', 'espresso.jpg', '', ''),
(57, 'Capuccino', 24, 80.00, 90.00, 'Hot Coffee', 'q7275', 'cappuccino.jpg', '', ''),
(58, 'Caphe Vietnam', 23, 80.00, 0.00, 'Hot Coffee', '43', 'caphevietnam.jpg', '', ''),
(59, 'Americano', 21, 80.00, 100.00, 'Hot Coffee', '213', 'hotamericano.jpg', '', ''),
(60, 'Caffe Latte', 32, 90.00, 100.00, 'Hot Coffee', '13', 'caffelatte.jpg', '', ''),
(61, 'Vanilla Latte', 25, 90.00, 100.00, 'Hot Coffee', '1213', 'hotvanilla.jpg', '', ''),
(62, 'Mocha Latte', 12, 90.00, 100.00, 'Hot Coffee', '123', 'hotmocha.jpg', '', ''),
(63, 'Caramel Latte', 1, 95.00, 105.00, 'Hot Coffee', '1265', 'hotcaramel.jpg', '', ''),
(64, 'Spanish Latte', 18, 90.00, 100.00, 'Hot Coffee', '123', 'hotspanish.jpg', '', ''),
(65, 'Americano', 12, 90.00, 0.00, 'Iced Coffee', '1010', 'icedamericano.jpg', '', ''),
(66, 'Caphe Vietnam', 23, 120.00, 0.00, 'Iced Coffee', '1', 'caphevietnam.jpg', '', ''),
(67, 'Caffe Latte', 12, 130.00, 140.00, 'Iced Coffee', '21', 'icedcafe.jpg', '', ''),
(68, 'Vanilla', 12, 140.00, 155.00, 'Non Coffee Frappe', '2', 'vanillafrap.jpg', '', ''),
(69, 'Mocha', 12, 140.00, 155.00, 'Non Coffee Frappe', '1', 'mochafrap.jpg', '', ''),
(70, 'Caramel', 20, 140.00, 155.00, 'Non Coffee Frappe', '12', 'caramelfrap.jpg', '', ''),
(71, 'Cookies and Cream', 23, 150.00, 175.00, 'Non Coffee Frappe', '1', 'cookiesncreamfrap.png', '', ''),
(72, 'Hazel Nut', 23, 150.00, 165.00, 'Non Coffee Frappe', '1', 'hazelfrap.jpg', '', ''),
(73, 'Java Chip', 12, 150.00, 175.00, 'Non Coffee Frappe', '12', 'javafrap.jpg', '', ''),
(74, 'Salted Caramel', 1, 150.00, 165.00, 'Non Coffee Frappe', '12', 'saltedcaramelfrap.jpg', '', ''),
(75, 'Taro Cream Cheese', 24, 150.00, 165.00, 'Non Coffee Frappe', '12', 'tarocreamcheese.jpg', '', ''),
(76, 'Double Dutch', 34, 150.00, 165.00, 'Non Coffee Frappe', '1', 'doubledutch.jpg', '', ''),
(87, 'Smoked Ham', 1, 200.00, 0.00, 'Sandwich', '86', 'smokeham.jpg', 'Ham is hung in a smokehouse and allowed to absorb smoke from smoldering fires, which gives added flavor and color to meat.', ''),
(88, 'Truffle Smoked Ham', 6, 200.00, 0.00, 'Sandwich', '27', 'trufflesmokeham.jpg', 'Round ball of cured meat is commonly a whole boneless cut of pork that’s been cured in a sweet glaze.', ''),
(89, 'Bacon and Egg', 88, 180.00, 0.00, 'Sandwich', '5', 'baconeggsandwich.jpg', 'Sandwich with consist of sliced bacon and fried egg.', ''),
(90, 'Cheesy Bacon Mushroom', 56, 180.00, 0.00, 'Sandwich', '08', 'cheesybacon.jpg', ' Made with freshly cooked bacon, sautéed mushrooms, and melted cheese.', ''),
(91, 'Pulled Pork', 87, 170.00, 0.00, 'Sandwich', '64', 'pulledpork.jpg', 'Sandwich made with tender, juicy pulled pork with cabbage', ''),
(92, 'Tuna Sandwich', 8, 170.00, 0.00, 'Sandwich', '5', 'tunasandwich.jpg', 'Sandwich made with tuna, partner with our mushroom sauce.', ''),
(93, 'Chicken Sandwich', 6, 170.00, 0.00, 'Sandwich', '55', 'chickensandwich.jpg', 'Sandwich made with chicken, partner with our tomato sauce.', ''),
(94, 'Beef Burger', 7, 160.00, 0.00, 'Sandwich', '882', 'beefburger.jpg', 'Seasoned beef, crisp veggies, and creamy sauces, all nestled in a soft, toasted bun.', ''),
(95, 'Hot Chocolate', 1, 80.00, 0.00, 'Others', '12', 'hotchocolate.jpg', '', ''),
(96, 'Hot Pure Vanilla', 12, 80.00, 0.00, 'Others', '6', 'hotpurevanilla.jpg', '', ''),
(97, 'Housed Iced Tea', 8, 55.00, 0.00, 'Others', '4', 'icedtea.jpg', '', ''),
(98, 'Iced Tea Pitcher', 5, 110.00, 0.00, 'Others', '5', 'icedteapitcher.jpg', '', ''),
(99, 'Iced Coffee Cream Cheese', 15, 165.00, 0.00, 'Flavored Coffee', '87666', 'icedcoffeecheese.png', '', 'Available');

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
  `CustomerID` int DEFAULT NULL,
  `apppointmentDate` datetime NOT NULL,
  `totalPayment` double(10,2) NOT NULL,
  `TableType` varchar(20) NOT NULL,
  `paymentStatus` varchar(150) NOT NULL,
  `Message` varchar(60) NOT NULL,
  `reservationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tablereservation`
--

INSERT INTO `tablereservation` (`TableID`, `CustomerID`, `apppointmentDate`, `totalPayment`, `TableType`, `paymentStatus`, `Message`, `reservationDate`) VALUES
(1, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(2, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(3, 17, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(4, 17, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(5, 17, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(6, 17, '0000-00-00 00:00:00', 0.00, '', '', 'hajhdkjsahdsad\r\n', '2024-03-03 23:20:52'),
(7, 17, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(8, 17, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(9, 17, '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(10, 17, '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(11, 17, '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(12, 17, '0000-00-00 00:00:00', 0.00, '', '', 'asdsadsadsa', '2024-03-03 23:21:12'),
(13, 17, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:21:56'),
(14, 17, '2024-03-05 23:24:00', 0.00, '', '', 'sadsadsad\r\n', '2024-03-03 23:24:41'),
(15, 17, '2024-03-06 23:26:00', 0.00, '', '', 'sadasdsa\r\n\r\n', '2024-03-03 23:26:22'),
(16, 17, '2024-03-05 23:28:00', 0.00, 'Triple', '', 'jkasjdlksaj\r\n', '2024-03-03 23:28:58'),
(17, 17, '2024-03-21 09:23:00', 0.00, 'Triple', '', 'hello world', '2024-03-07 09:24:15');

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
(17, 'rontale', 'Danna Bhabes', 'Customer', '1999-12-12', 'danna@gmail.com', 'Danna27', '$2y$10$T6WaTpXANGeDVVHNyUxXjuZdRw.eS8uxwjgh2075IUlpNFzUlcBJG', 9085353978, 'Male', 'tawiran calapan', '', '2024-02-26 20:22:13', '2024-02-26 20:22:13'),
(18, 'Gutierrez', 'Nicolle', 'Customer', '2003-07-17', 'gutierreznicollecatly@gmail.com', 'nicsxxx17', '$2y$10$f3toU55KK3P56oSyG7Iu9.rlI516lk5LZvJw83naTa/mdDBiP8sy2', 9286341210, 'Female', 'Dao Naujan, Oriental Mindoro', 'default.avif', '2024-02-28 19:47:53', '2024-02-28 19:47:53');

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
  ADD KEY `CustomerID` (`CustomerID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

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
  ADD PRIMARY KEY (`TableID`),
  ADD KEY `CustomerID` (`CustomerID`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  MODIFY `TableID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD CONSTRAINT `tablereservation_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `product_tbl` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
