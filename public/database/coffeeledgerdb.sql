-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2024 at 04:18 AM
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
(93, NULL, 69, '420.00', 3, 'Medium', 'oncart', '2024-04-03 01:53:55', '2024-04-03 01:53:55'),
(94, NULL, 36, '300.00', 2, 'Medium', 'oncart', '2024-04-03 02:36:19', '2024-04-03 02:36:19'),
(96, NULL, 2, '960.00', 8, 'Medium', 'oncart', '2024-04-17 03:58:38', '2024-04-17 03:58:38'),
(97, NULL, 55, '270.00', 6, 'Medium', 'oncart', '2024-04-17 09:07:11', '2024-04-17 09:07:11'),
(99, NULL, 57, '1280.00', 16, 'Medium', 'oncart', '2024-04-17 09:11:04', '2024-04-17 09:11:04'),
(111, 25, 67, '390.00', 3, 'Medium', 'oncart', '2024-06-12 04:30:12', '2024-06-12 04:30:12'),
(112, 25, 40, '400.00', 2, 'Medium', 'oncart', '2024-06-12 11:17:57', '2024-06-12 11:17:57'),
(114, 25, 95, '160.00', 2, 'Medium', 'oncart', '2024-06-16 03:47:33', '2024-06-16 03:47:33'),
(115, 24, 3, '240.00', 2, 'Medium', 'oncart', '2024-06-20 09:27:38', '2024-06-20 09:27:38');

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
-- Table structure for table `droptableproducts`
--

CREATE TABLE `droptableproducts` (
  `DropID` int NOT NULL,
  `TableID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `Size` varchar(10) NOT NULL,
  `productCode` text NOT NULL,
  `Created_At` timestamp NOT NULL
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
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `feedbackID` int NOT NULL,
  `ratings` int NOT NULL,
  `comment` varchar(150) NOT NULL,
  `orderID` int NOT NULL,
  `ProductID` int NOT NULL,
  `CustomerID` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback_tbl`
--

INSERT INTO `feedback_tbl` (`feedbackID`, `ratings`, `comment`, `orderID`, `ProductID`, `CustomerID`, `created_at`, `updated_at`) VALUES
(1, 0, 'masarap naman siya malinamnam', 2, 2, 1, '2024-04-21 11:25:30', '2024-04-21 11:25:30'),
(2, 2, 'masarap naman siya malinamnam', 2, 2, 1, '2024-04-21 11:26:19', '2024-04-21 11:26:19'),
(3, 1, 'hello', 59, 1, 22, '2024-05-05 14:08:33', '2024-05-05 14:08:33'),
(4, 3, 'hello', 59, 1, 22, '2024-05-05 14:21:44', '2024-05-05 14:21:44'),
(5, 3, 'hello', 59, 1, 22, '2024-05-05 14:26:42', '2024-05-05 14:26:42'),
(6, 4, 'hello hi', 59, 1, 22, '2024-05-05 14:44:58', '2024-05-05 14:44:58'),
(7, 3, 'ASDNJSAD', 59, 1, 22, '2024-05-05 14:49:21', '2024-05-05 14:49:21'),
(8, 3, 'alkjsdkjas', 59, 1, 22, '2024-05-05 14:52:01', '2024-05-05 14:52:01'),
(9, 3, 'asdakslj', 59, 1, 22, '2024-05-05 15:03:43', '2024-05-05 15:03:43'),
(10, 2, 'hellos', 58, 3, 22, '2024-05-05 15:04:27', '2024-05-05 15:04:27'),
(11, 1, 'hello', 59, 1, 22, '2024-05-10 07:58:31', '2024-05-10 07:58:31'),
(12, 1, 'hello', 59, 1, 22, '2024-05-11 13:45:50', '2024-05-11 13:45:50'),
(13, 1, 'hello\r\n', 59, 1, 22, '2024-05-11 13:47:09', '2024-05-11 13:47:09'),
(14, 1, 'hello', 59, 1, 22, '2024-05-11 13:48:21', '2024-05-11 13:48:21'),
(15, 1, 'pangit ang star', 135, 2, 25, '2024-05-20 05:00:59', '2024-05-20 05:00:59'),
(16, 2, 'mamamo', 136, 48, 25, '2024-05-22 02:26:08', '2024-05-22 02:26:08'),
(17, 4, 'masarap naman ito', 137, 2, 25, '2024-05-22 02:40:00', '2024-05-22 02:40:00'),
(18, 4, 'sarap', 138, 3, 25, '2024-05-22 02:55:23', '2024-05-22 02:55:23'),
(19, 1, 'masarap naman siya kaso sa sobrang tagal ng deliver hindi na siya malamig', 139, 52, 25, '2024-05-22 02:58:36', '2024-05-22 02:58:36');

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
(58, 22, 3, '', 'onHouse', '2024-02-29 14:43:14', '320.00', 2, 'Large', '6I7QND1IAI', 'AcceptOrder'),
(59, 22, 1, '', 'onHouse', '2024-02-29 14:43:14', '320.00', 2, 'Medium', '6I7QND1IAI', 'OrderReceived'),
(60, 22, 2, '', 'onHouse', '2024-02-29 14:44:11', '240.00', 2, 'Medium', 'LT0AKASK4K', 'AcceptOrder'),
(61, 22, 39, '', 'onHouse', '2024-02-29 15:19:24', '500.00', 2, 'Medium', 'Z6C0SBGYX5', 'AcceptOrder'),
(62, 22, 3, '', 'onHouse', '2024-02-29 15:19:24', '240.00', 2, 'Medium', 'Z6C0SBGYX5', 'AcceptOrder'),
(63, 22, 2, '', 'onHouse', '2024-05-11 21:59:26', '240.00', 2, 'Medium', 'C983R8FASY', 'AcceptOrder'),
(134, NULL, NULL, '', '', '2024-05-11 22:44:16', '320.00', 0, '', '', ''),
(135, 25, 2, '', 'onHouse', '2024-05-15 11:40:06', '120.00', 1, 'Medium', 'CRossOnline-KZK0WC7JJ6', 'OrderReceived'),
(136, 25, 48, '', 'onHouse', '2024-05-15 11:40:06', '155.00', 1, 'Medium', 'CRossOnline-KZK0WC7JJ6', 'OrderReceived'),
(137, 25, 2, '', 'onHouse', '2024-05-20 12:59:51', '120.00', 1, 'Medium', 'CRossOnline-PFJKNJA432', 'OrderReceived'),
(138, 25, 3, '', 'onHouse', '2024-05-22 10:46:01', '120.00', 1, 'Medium', 'CRossOnline-N07PLNKQP6', 'OrderReceived'),
(139, 25, 52, '', 'onHouse', '2024-05-22 10:57:03', '145.00', 1, 'Medium', 'CRossOnline-6PWSJKOXXQ', 'OrderReceived'),
(140, 25, 2, '', 'onHouse', '2024-05-25 11:23:07', '120.00', 1, 'Medium', 'CRossOnline-ABY5ZPJLQ1', 'AcceptOrder');

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
  `prod_img` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_desc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_code` text NOT NULL,
  `product_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`prod_id`, `prod_name`, `prod_quantity`, `prod_mprice`, `prod_lprice`, `prod_categ`, `prod_img`, `prod_desc`, `prod_code`, `product_status`) VALUES
(1, 'Quesadillas', 100, '168.00', 0.00, 'Appetizer', 'quesadillas.jpg', 'This is a Mexican dish made of a flour tortilla folded like a pizza with mayonnaise and tomato on top.', 'qd123456', 'Available'),
(2, 'Nachos', 100, '168.00', 0.00, 'Appetizer', 'nachos.jpg', 'Also a Mexican dish made with corn chips, vegetables, and other ingredients on top.', 'nc789012', 'Available'),
(3, 'Fries', 100, '140.00', 0.00, 'Appetizer', 'fries.jpg', 'One of the most sell appetizer is our fries because of its crispiness and smell with perfect combination of our sauce. ', 'fr345678', 'Available'),
(4, 'Burger Steak w/ egg', 100, '188.00', 0.00, 'Meals', 'burgersteak.jpg', 'Burger steak with egg is a hearty and flavorful dish that combines a juicy beef patty with a perfectly cooked egg. ', 'bs901234', 'Available'),
(5, 'Tapsilog ', 100, '148.00', 0.00, 'Meals', 'tapsilog.jpg', 'Tapsilog is a popular dish with tapa (cured beef), sinangag (garlic fried rice), and itlog (fried egg).', 'tpg67890', 'Available'),
(6, 'Lechon Kawali', 100, '168.00', 0.00, 'Meals', 'lechonkawali.jpg', 'Breakfast dish that consists of smoked  bacon and fried egg.', 'lk123456', 'Available'),
(7, 'Smoked Bacon and Egg', 100, '158.00', 0.00, 'Meals', 'baconegg.jpg', 'Steak that are smothered in our delicious mushroom gra sauce.vy', 'bs789012', 'Available'),
(8, 'Spam and Egg', 100, '138.00', 0.00, 'Meals', 'spamegg.jpg', 'Breakfast dish that consists of meaty and fatty fried slices of spam and fried egg.', 'sp345678', 'Available'),
(9, 'Pepper Beef Steak', 100, '188.00', 0.00, 'Meals', 'beeftapa.jpg', 'Savor the flavor of our pepper beef steak. Juicy, tender, and perfectly seasoned Beefy steak partner with our mushroom gravy.', 'pb901234', 'Available'),
(10, 'Crispy Lechon Sisig', 100, '199.00', 0.00, 'Meals', 'crispysisig.jpg', 'Crispy grilled sisig with the combination of rice and egg.', 'cl567890', 'Available'),
(11, 'Bacon and Egg', 100, '188.00', 0.00, 'Sandwich', 'baconeggsandwich.jpg', 'Sandwich with consist of sliced bacon and fried egg.', 'be234567', 'Available'),
(12, 'Cheesy Bacon Mushroom', 100, '199.00', 0.00, 'Sandwich', 'cheesybacon.jpg', 'Made with freshly cooked bacon, sautéed mushrooms, and melted cheese.', 'cb765432', 'Available'),
(13, 'Tuna Sandwich', 100, '188.00', 0.00, 'Sandwich', 'tunasandwich.jpg', 'Sandwich made with tuna, partner with our mushroom sauce.', 'ts543210', 'Available'),
(14, 'Beef Burger', 100, '178.00', 0.00, 'Sandwich', 'beefburger.jpg', 'Seasoned beef, crisp veggies, and creamy sauces, all nestled in a soft, toasted bun.', 'bb321098', 'Available'),
(15, 'Chicken Burger', 100, '188.00', 0.00, 'Sandwich', 'chickenburger.jpg', '\nA chicken burger is a delicious and versatile sandwich featuring a seasoned and cooked chicken patty as its main component. ', 'kb890123', 'Available'),
(16, 'Honey Garlic C & B', 100, '260.00', 0.00, 'Sandwich', 'honeygarlic.jpg', 'Honey Garlic C & B is a flavorful and healthy dish that combines tender pieces of chicken and crisp broccoli with sweet and savory sauce.', 'cp456789', 'Available'),
(17, 'Boneless Fried Chicken', 100, '158.00', 0.00, 'Chicken', 'bonelessfc.jpg', 'Boneless fried chicken features tender, marinated pieces coated in seasoned batter and deep-fried to a golden, crispy perfection.', 'bf012345', 'Available'),
(18, 'Honey Garlic Chicken', 100, '188.00', 0.00, 'Chicken', 'honeychicken.jpg', 'Crispy fried chicken breaded with honey', 'hgc67890', 'Available'),
(19, 'Orange Chicken', 100, '188.00', 0.00, 'Chicken', 'orangechicken.jpg', 'A dish of fried chicken in a sweet orange-flavored', 'oc123456', 'Available'),
(20, 'Chicken Parmegiana', 100, '208.00', 0.00, 'Chicken', 'chickenparmegiana.jpg', 'Flavorful tomato sauce served and is topped with crispy chicken breasts covered in melty cheese.', 'cp456789', 'Available'),
(21, 'Carbonara', 100, '188.00', 0.00, 'Pasta', 'carbonara.jpg', 'Carbonara with its flavorful cream sauce with combination of sandwich.', 'c9012345', 'Available'),
(22, 'Classic Spaghetti', 100, '188.00', 0.00, 'Pasta', 'classicspag.jpg', 'Spaghetti with its tomato sauce and lot of cheese on top.', 'cs678901', 'Available'),
(30, 'Truffle Pasta', 100, '188.00', 0.00, 'Pasta', 'trufflepasta.jpg', 'Combines cooked pasta with a creamy sauce made with truffle oil, mushrooms, cream and herbs.', 'tp234567', 'Available'),
(31, 'Chicken Alfredo', 100, '188.00', 0.00, 'Pasta', 'chickenalfredo.jpg', 'Pasta dish that consists of cooked chicken and fettuccine noodles tossed in a creamy white sauce made with butter, heavy cream and garlic.', 'ca890123', 'Available'),
(32, 'Tuna Pesto', 100, '178.00', 0.00, 'Pasta', 'tunapesto.jpg', 'Dish that combines canned tuna with pesto sauce.', 'tp456789', 'Available'),
(33, 'Classic Ceasar', 100, '188.00', 0.00, 'Salad', 'ceasar.jpg', 'Crunchy lettuce leaves tossed in a creamy dressing of mayonnaise.', 'cc678901', 'Available'),
(34, 'Chef Salad', 100, '188.00', 0.00, 'Salad', 'chefsalad.jpg', 'Consists of hard-boiled eggs, sliced meats, cheese, tomatoes, cucumbers, and lettuce, may also include anchovies, olives, onions, etc.', 'cs234567', 'Available'),
(35, 'Chicken Salad', 100, '188.00', 0.00, 'Salad', 'chickensalad.jpg', 'Consists of chopped cooked chicken, and mixed with other ingredients, such as mayonnaise, celery, onion, herbs, and seasonings.', 'cks56789', 'Available'),
(36, 'Tuna Salad', 100, '188.00', 0.00, 'Salad', 'tunasalad.jpg', 'Salad with a blended of tuna and mayonnaise.', 'ts678901', 'Available'),
(38, 'Chicken Highfive', 100, '160.00', 0.00, 'Chicken Fillet', 'chickenhv.jpg', 'Chicken High Five is a fun and flavorful dish featuring five distinct and delicious chicken preparations, with a size of 5-6 inches.', 'chv012345', 'Available'),
(39, 'Chicken Titan ', 100, '240.00', 0.00, 'Chicken Fillet', 'chickentt.jpg', 'Chicken Titan is a dish that combines robust flavors and generous portions. It typically features a large, chicken breast or thigh with a size of 10-12 inches.', 'ctt78901', 'Available'),
(40, 'Brewed Coffee', 100, '60.00', 70.00, 'Hot Coffee', 'hotbrewedcoffee.jpg', 'Classic and rich coffee made through traditional brewing methods.', 'bc210987', 'Available'),
(41, 'Espresso', 100, '55.00', 70.00, 'Hot Coffee', 'hotespresso.jpg', 'Intense and concentrated coffee shot, the base for various coffee drinks.', 'ep109876', 'Available'),
(42, 'Cappuccino', 100, '80.00', 90.00, 'Hot Coffee', 'hotcappuccino.jpg', 'A balanced blend of espresso, steamed milk, and frothy foam.', 'cp098765', 'Available'),
(43, 'Caphe Vietname', 100, '98.00', 0.00, 'Hot Coffee', 'hotcaphevietnam.jpg', 'Vietnamese coffee, often strong and sweet, served with condensed milk.', 'cv987654', 'Available'),
(44, 'Americano', 100, '90.00', 100.00, 'Hot Coffee', 'hotamericano.png', 'Diluted espresso with hot water, offering a milder flavor.', 'ar72c3d4', 'Available'),
(45, 'Caffee Latte', 100, '105.00', 115.00, 'Hot Coffee', 'hotcaffelatte.jpg', 'Smooth and creamy coffee with espresso and steamed milk.', 'cl83d4e5', 'Available'),
(46, 'Vanilla Latte', 100, '105.00', 115.00, 'Hot Coffee', 'hotvanilla.png', 'Latte with a sweet hint of vanilla flavor.', 'vl94e5f6', 'Available'),
(47, 'Mocha Latte', 100, '105.00', 120.00, 'Hot Coffee', 'hotmocha.jpg', 'Latte with chocolate syrup for a delightful chocolatey twist.', 'vl15f6g7', 'Available'),
(48, 'Caramel Latte', 100, '110.00', 115.00, 'Hot Coffee', 'hotcaramel.jpg', 'Latte with a sweet caramel infusion.', 'cl56G7h8', 'Available'),
(49, 'Spanish Latte', 100, '105.00', 115.00, 'Hot Coffee', 'hotspanish.jpg', 'Latte with a touch of condensed milk, providing a rich and sweet taste.', 'sl47h8i9', 'Available'),
(50, 'Caphe Vietnam', 100, '135.00', 0.00, 'Iced Coffee', 'icedcaphevietnam.jpg', 'Vietnamese iced coffee, bold and sweet, often served over ice with condensed milk, offering a cool and rich experience.', 'cv29j0k1', 'Available'),
(51, 'Americano', 100, '105.00', 125.00, 'Iced Coffee', 'icedamericano.jpg', 'Chilled perfection of diluted espresso over ice, maintaining its smooth and robust character for a refreshing sip.', 'ar38I9j0', 'Available'),
(52, 'Caffe Latte', 100, '145.00', 155.00, 'Iced Coffee', 'icedcafe.jpg', 'Iced version of the classic latte, blending espresso and cold milk over ice for a cool, creamy indulgence.', 'cl10k1l2', 'Available'),
(53, 'Vanilla Latte', 100, '155.00', 170.00, 'Flavored Coffee', 'vanillalatte.jpg', 'Delight featuring the sweet harmony of vanilla-infused coffee and cold milk over ice.', 'vl765432', 'Available'),
(54, 'Mocha Latte', 100, '155.00', 170.00, 'Flavored Coffee', 'mochalatte.jpg', 'A cool blend of iced coffee and chocolate, creating a rich and indulgent beverage.', 'ml654321', 'Available'),
(55, 'Caramel Latte', 100, '160.00', 175.00, 'Flavored Coffee', 'caramellatte.png', 'Coffee adorned with the sweet allure of caramel, providing a luscious and refreshing experience.', 'cl543210', 'Available'),
(56, 'Cookies and Cream', 100, '165.00', 185.00, 'Flavored Coffee', 'icedcookiesncream.jpg', 'Iced coffee with a twist, combining the classic flavors of cookies and cream for a delightful chill.', 'cc432109', 'Available'),
(57, 'Spanish Latte', 100, '155.00', 170.00, 'Flavored Coffee', 'spanishlatte.jpg', 'A balanced blend of espresso, steamed milk, and frothy foam.', 'cp098765', 'Available'),
(58, 'Vanilla', 100, '160.00', 170.00, 'Frappe', 'vanillafrap.jpg', 'A frappe that captivates with the classic sweetness of vanilla, blended to perfection.', 'cv987654', 'Available'),
(59, 'Mocha', 100, '160.00', 175.00, 'Frappe', 'mochafrap.jpg', 'Tempting blend of chocolate and creamy goodness in a non-coffee frappe for a delightful treat.', 'mc72m3n', 'Available'),
(60, 'Caramel', 100, '165.00', 180.00, 'Frappe', 'caramelfrap.jpg', 'Indulgent non-coffee frappe featuring the rich and buttery flavor of caramel, a sweet escape.', 'cr63n4o5', 'Available'),
(61, 'Cookies and Cream', 100, '165.00', 195.00, 'Frappe', 'icedcookiesncream.jpg', 'Irresistible non-coffee frappe combining the crunch of cookies with the creaminess of a frosty treat.', 'cc34o5p6', 'Available'),
(62, 'Hazel Nut', 100, '165.00', 180.00, 'Frappe', 'hazelfrap.jpg', 'A nutty twist in a non-coffee frappe, hazelnut-infused and velvety smooth.', 'hn55p6q7', 'Available'),
(63, 'Java Chip', 100, '170.00', 185.00, 'Frappe', 'javafrap.jpg', 'Non-coffee frappe with a delectable mix of chocolate chips, offering a rich and satisfying experience.', 'jc16q7r8', 'Available'),
(64, 'Salted Caramel', 100, '170.00', 185.00, 'Frappe', 'saltedcaramelfrap.jpg', 'A sweet and savory non-coffee frappe, combining the allure of caramel with a touch of salt for a unique taste.', 'sc27r8s9', 'Available'),
(65, 'Double Dutch', 100, '160.00', 175.00, 'Frappe', 'doubledutch.jpg', 'A non-coffee frappe extravaganza with a blend of chocolate and vanilla, offering a doubly delightful frozen treat.', 'dd89t0u1', 'Available'),
(66, 'Blueberry', 100, '89.00', 0.00, 'Lemonade', 'blueberry.jpg', 'A blueberry drink is a refreshing beverage that captures the sweet and tangy essence of fresh blueberries.', 'bb29j0k1', 'Available'),
(67, 'Lychee', 100, '89.00', 0.00, 'Lemonade', 'lychee.jpg', 'Typically, this drink is made by blending or muddling fresh lychee fruit with water, ice, and optionally a sweetener such as simple syrup or agave nectar to enhance its natural sweetness.', 'ly10k1l2', 'Available'),
(68, 'Green Apple', 100, '89.00', 0.00, 'Lemonade', 'greenapple.jpg', 'Typically prepared by blending or juicing fresh green apples with ice and water, this drink showcases the tart and slightly sweet flavor profile of the fruit.', 'ga41l2m3', 'Available'),
(69, 'Strawberry', 100, '89.00', 0.00, 'Lemonade', 'strawberry.jpg', 'Strawberry drink is a luscious and refreshing beverage that celebrates the sweet and juicy flavor of ripe strawberries. ', 'st72m3n4', 'Available'),
(70, 'Bubblegum', 100, '89.00', 0.00, 'Lemonade', 'bubblegum.jpg', 'This drink is created using a blend of fruity syrups or extracts that mimic the distinct taste of bubblegum, combined with soda water or lemon-lime soda to create a fizzy base.', 'bg63n4o5', 'Available'),
(71, 'Peach', 100, '89.00', 0.00, 'Lemonade', 'peach.jpg', 'A peach drink is a delightful and fruity beverage that captures the essence of ripe peaches.', 'pc34o5p6', 'Available'),
(72, 'Mango', 100, '89.00', 0.00, 'Lemonade', 'mango.jpg', 'By blending fresh mangoes with ice and a liquid base such as water, coconut water, or yogurt, this drink showcases the vibrant orange-yellow hue and natural sweetness of the fruit.', 'mg55p6q7', 'Available'),
(73, 'Cucumber', 100, '89.00', 0.00, 'Lemonade', 'cucumber.jpg', 'A cucumber drink is a cool and refreshing beverage that highlights the crisp and mildly sweet flavor of cucumbers. ', 'cc16q7r8', 'Available'),
(74, 'House Iced Tea', 100, '58.00', 0.00, 'Lemonade', 'icedtea.jpg', 'A refreshing classic, house iced tea is a chilled and flavorful beverage, perfect for cooling down on a warm day.', 'hi098765', 'Available'),
(75, 'Hot Chocolate', 100, '95.00', 0.00, 'Others', 'hotchocolate.jpg', 'A comforting and rich beverage, hot chocolate offers a velvety blend of cocoa and milk, perfect for warming up', 'hc210987', 'Available'),
(76, 'Hot Pure Vanilla', 100, '95.00', 0.00, 'Others', 'hotpurevanilla.jpg', 'A soothing and aromatic hot drink, featuring the pure essence of vanilla for a delightful and fragrant experience.', 'hp109876', 'Available'),
(87, 'Iced Tea Pitcher', 100, '125.00', 0.00, 'Others', 'icedteapitcher.jpg', 'A cool and convenient way to enjoy the timeless goodness of iced tea, served in a pitcher for easy sharing and sipping.', 'it098765', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `rawproducttable`
--

CREATE TABLE `rawproducttable` (
  `rawID` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stocks` float NOT NULL,
  `stock_type` varchar(150) DEFAULT NULL,
  `barcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_categ` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rawproducttable`
--

INSERT INTO `rawproducttable` (`rawID`, `name`, `stocks`, `stock_type`, `barcode`, `item_categ`) VALUES
(1, 'Espresso Machine', 1, NULL, 'c2c9f960', 'Equipment'),
(2, 'Coffee Grinder', 1, NULL, '6f6254f5', 'Equipment'),
(3, 'Commercial Coffee Brewer', 1, NULL, 'c5b460b0', 'Equipment'),
(4, 'Milk Steamer/Frother', 1, NULL, 'e86cc6be', 'Equipment'),
(5, 'Commercial Blender', 1, NULL, '4d4edffc', 'Equipment'),
(6, 'Coffee Roaster', 1, NULL, '7e920ee1', 'Equipment'),
(7, 'Water Filtration System', 1, NULL, 'a0f515a9', 'Equipment'),
(8, 'Coffee Servers', 20, NULL, '58cac5ec', 'Equipment'),
(9, 'Coffee Beans', 940, 'g', '83ddc61f', 'Raw Materials'),
(10, 'Milk', 42, 'boxes', '295bb025', 'Raw Materials'),
(11, 'Sweetened Milk', 50, 'boxes', 'db61a4bd', 'Raw Materials'),
(12, 'Heavy  Cream', 50, 'cups', '26aa569b', 'Raw Materials'),
(13, 'Whipped  Cream', 50, 'cups', '3c675c26', 'Raw Materials'),
(14, 'Syrup', 1000, 'ml', 'eac44b44', 'Raw Materials'),
(15, 'Sauce', 1000, 'ml', '32d3a4f9', 'Raw Materials'),
(16, 'Frappes Powder', 1000, 'g', 'e1c88f79', 'Raw Materials'),
(17, 'White Sugar', 1000, 'g', 'b3462475', 'Raw Materials'),
(18, 'Brown Sugar', 990, 'g', '798cc88b', 'Raw Materials'),
(19, 'Chicken', 10, 'kg', '72f29dcb', 'Raw Materials'),
(20, 'Pork', 5, 'kg', '553a4758', 'Raw Materials'),
(21, 'Beef', 10, 'kg', 'aecf14b7', 'Raw Materials'),
(22, 'Tortillas', -2.75, 'packs', '50b60415', 'Raw Materials'),
(23, 'Eden Cheese', 10, 'packs', '311962f1', 'Raw Materials'),
(24, 'Shrimp', 5, 'kg', '9ec8f066', 'Raw Materials'),
(25, 'Disposable Cups', 50, NULL, '11a78ac4', 'Supplies'),
(26, 'Paper Hot Cups and Lids', 30, NULL, '6ce08ef4', 'Supplies'),
(27, 'White Straws', 50, NULL, 'b877bb6b', 'Supplies'),
(28, 'Napkins', 30, NULL, '18ee0a59', 'Supplies'),
(29, 'Stirrers', 5, NULL, '66c3a4e4', 'Supplies'),
(30, 'Black Straws', 50, NULL, 'ef811424', 'Supplies'),
(31, 'Plastic Spoon and Fork', 5, NULL, 'c35b440e', 'Supplies'),
(32, 'Tooth Pick', 10, NULL, 'd673842e', 'Supplies'),
(33, 'Grease Paper', 10, NULL, '5d64f57a', 'Supplies'),
(34, 'Take out Box for Salad', 50, NULL, 'a6057858', 'Supplies'),
(35, 'Take out Box for Sandwich', 50, NULL, '4bf1a16c', 'Supplies'),
(36, 'Take out Box for Rice', 50, NULL, '1c2f4143', 'Supplies'),
(37, 'Large Cups for Hot Coffee', 100, NULL, '45e1edfe', 'Supplies'),
(38, 'Large Cups for Iced Coffee', 100, NULL, '410cf925', 'Supplies'),
(39, 'Large Cups for Blended', 100, NULL, '0f373c70', 'Supplies'),
(40, 'Regular Cups for Hot Coffee', 100, NULL, '1d91737f', 'Supplies'),
(41, 'Regular Cups for Iced Coffee', 100, NULL, '895534a6', 'Supplies'),
(42, 'Regular Cups for Blended', 100, NULL, 'da256cc2', 'Supplies'),
(43, 'Chocolate Fudge', 50, 'pcs', 'da22901d', 'Raw Materials'),
(44, 'Sliced Cheese', 500, 'g', 'b3a6ddf0', 'Raw Materials'),
(45, 'Quick Melt', 5, 'packs', '78c119bf', 'Raw Materials'),
(46, 'Egg', 10, 'trays', 'b6cdc4f2', 'Raw Materials'),
(47, 'Lettuce', 10, 'pcs', '823644d8', 'Raw Materials'),
(48, 'Tuna', 3, 'kg', '6b26b29e', 'Raw Materials'),
(49, 'Bacon', 10, 'packs', '8fe716e7', 'Raw Materials'),
(50, 'Pulled Pork', 10, 'lb', 'ecdc8d46', 'Raw Materials'),
(51, 'Bratwurst', 5, 'packs', 'da4bc01d', 'Raw Materials'),
(52, 'Smoked Ham', 10, 'pcs', '80adec8e', 'Raw Materials'),
(53, 'Pork Ribs', 5, 'kg', 'c4221f5b', 'Raw Materials'),
(54, 'Ground Beef', 10, 'kg', '9a90a0a5', 'Raw Materials'),
(55, 'Liempo', 5, 'kg', 'ba1bb70a', 'Raw Materials'),
(56, 'Tapa Beef', 5, 'kg', '5482f734', 'Raw Materials'),
(57, 'Thousand Islands', 7, 'L', '95c79bdd', 'Raw Materials'),
(58, 'Ceasar Islands', 4, 'L', 'fa3cfacd', 'Raw Materials'),
(59, 'Mustard', 2.968, 'bottles', 'ae9457e9', 'Raw Materials'),
(60, 'Mapple Syrup', 5, 'bottles', '6ce4edab', 'Raw Materials'),
(61, 'Mushroom', 476.72, 'g', '8e048dc9', 'Raw Materials'),
(62, 'Onion', 3.9, 'kg', 'a28217b1', 'Raw Materials'),
(63, 'Garlic', 5, 'kg', '2d5ae95f', 'Raw Materials'),
(64, 'Parsley', 5, 'bunch', '60242ccb', 'Raw Materials'),
(65, 'Spring Onion', 5, 'kg', '108c0dcf', 'Raw Materials'),
(66, 'Bell Pepper', 5, 'kg', '2714da9b', 'Raw Materials'),
(67, 'Oil ', 9.36, 'bottles', '9b0fc39a', 'Raw Materials'),
(68, 'Soy Sauce', 5, 'bottles', '85d0809d', 'Raw Materials'),
(69, 'Vinegar', 5, 'bottles', '9aef3cb2', 'Raw Materials'),
(70, 'Knor Seasoning', 5, 'packs', '8cfedf88', 'Raw Materials'),
(71, 'Knor Cubes', 5, 'bottles', '7a881602', 'Raw Materials'),
(72, 'Ketchup', 5, 'bottles', '0413f47c', 'Raw Materials'),
(73, 'Salt', 10, 'packs', '0bb08f3d', 'Raw Materials'),
(74, 'Pepper', 10, 'bottles', 'c238daee', 'Raw Materials'),
(75, 'Butter', 10, 'packs', '66b63eed', 'Raw Materials'),
(76, 'Mayonnaise', 5, 'bottles', 'a765f6ed', 'Raw Materials'),
(77, 'Star Margarine', 20, 'pcs', '67a190a5', 'Raw Materials'),
(78, 'Ice Cream', 5, 'container', '229006da', 'Raw Materials'),
(79, 'Tomato Sauce', 3.2, 'bottles', '8e6166b2', 'Raw Materials'),
(80, 'Potato', 2.968, 'kg', '92ca2a9f', 'Raw Materials'),
(81, 'Pasta', 10, 'packs', '09f69c17', 'Raw Materials'),
(82, 'Bread for Sub Sandwich', 5, 'packs', 'efb9c409', 'Raw Materials'),
(83, 'Bread for Soup', 5, 'packs', '61eb0872', 'Raw Materials'),
(84, '1.5 Coke', 10, 'bottles', '279fb018', 'Raw Materials'),
(85, 'Refrigerator', 1, NULL, 'ccd214d0', 'Equipment'),
(86, 'Beverage Refrigerator', 1, NULL, 'aaaad5a2', 'Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `tableno`
--

CREATE TABLE `tableno` (
  `Id` int NOT NULL,
  `TableNo.` int NOT NULL,
  `Created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tablereservation`
--

CREATE TABLE `tablereservation` (
  `TableID` int NOT NULL,
  `CustomerID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `TypeEvent` varchar(150) NOT NULL,
  `barCode` text NOT NULL,
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

INSERT INTO `tablereservation` (`TableID`, `CustomerID`, `ProductID`, `TypeEvent`, `barCode`, `apppointmentDate`, `totalPayment`, `TableType`, `paymentStatus`, `Message`, `reservationDate`) VALUES
(1, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(2, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(3, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(4, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(5, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(6, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', 'hajhdkjsahdsad\r\n', '2024-03-03 23:20:52'),
(7, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(8, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(9, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(10, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(11, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(12, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', 'asdsadsadsa', '2024-03-03 23:21:12'),
(13, NULL, NULL, '', '', '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:21:56'),
(14, NULL, NULL, '', '', '2024-03-05 23:24:00', 0.00, '', '', 'sadsadsad\r\n', '2024-03-03 23:24:41'),
(15, NULL, NULL, '', '', '2024-03-06 23:26:00', 0.00, '', '', 'sadasdsa\r\n\r\n', '2024-03-03 23:26:22'),
(16, NULL, NULL, '', '', '2024-03-05 23:28:00', 0.00, 'Triple', '', 'jkasjdlksaj\r\n', '2024-03-03 23:28:58'),
(17, NULL, NULL, '', '', '2024-03-21 09:23:00', 0.00, 'Triple', '', 'hello world', '2024-03-07 09:24:15'),
(18, NULL, NULL, '', '', '2024-03-29 17:22:47', 0.00, 'Tropa_size', '', 'gusto ko to', '2024-03-28 17:22:33'),
(19, NULL, NULL, '', '', '2024-04-18 22:10:00', 0.00, 'Triple', '', 'jdsfdshgf\r\n', '2024-04-17 16:57:20'),
(20, NULL, NULL, '', '', '2024-04-18 11:59:00', 0.00, 'Triple', '', 'jhsadkjhsad\r\n', '2024-04-17 16:59:16'),
(21, NULL, NULL, '', '', '2024-04-25 10:20:00', 0.00, 'Triple', '', '2', '2024-04-19 13:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `table_type`
--

CREATE TABLE `table_type` (
  `TableID` int NOT NULL,
  `table_Type` text NOT NULL,
  `TableNum` int NOT NULL,
  `Status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int NOT NULL,
  `CustomerID` int DEFAULT NULL,
  `OrderID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `ordertype` text NOT NULL,
  `quantity` int NOT NULL,
  `size` text NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` double(10,2) NOT NULL,
  `orderCode` int NOT NULL,
  `amount_paid` double(10,2) NOT NULL,
  `change_amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `CustomerID`, `OrderID`, `ProductID`, `ordertype`, `quantity`, `size`, `order_date`, `total_amount`, `orderCode`, `amount_paid`, `change_amount`) VALUES
(1, NULL, NULL, 17, '', 1, '', '2024-05-15 11:06:12', 170.00, 0, 500.00, 175.00),
(2, NULL, NULL, 69, '', 1, '', '2024-05-15 11:06:12', 155.00, 0, 500.00, 175.00),
(3, NULL, NULL, 1, '', 1, '', '2024-05-15 15:36:55', 520.00, 0, 600.00, 80.00),
(4, NULL, NULL, 2, '', 2, '', '2024-05-15 15:36:55', 120.00, 0, 600.00, 80.00),
(5, NULL, NULL, 3, '', 1, '', '2024-05-15 15:36:55', 120.00, 0, 600.00, 80.00),
(6, NULL, NULL, 20, '', 1, '', '2024-05-15 20:28:49', 170.00, 0, 200.00, 30.00),
(7, NULL, NULL, 3, '', 1, '', '2024-05-20 12:57:18', 2365.00, 0, 5000.00, 2635.00),
(8, NULL, NULL, 45, '', 1, '', '2024-05-20 12:57:18', 165.00, 0, 5000.00, 2635.00),
(9, NULL, NULL, 44, '', 13, '', '2024-05-20 12:57:18', 160.00, 0, 5000.00, 2635.00),
(10, NULL, NULL, 3, '', 1, '', '2024-05-21 20:06:14', 120.00, 0, 200.00, 80.00),
(11, NULL, NULL, 17, '', 1, '', '2024-05-21 20:08:47', 170.00, 0, 200.00, 30.00),
(12, NULL, NULL, 2, '', 1, '', '2024-05-21 20:27:35', 120.00, 0, 200.00, 80.00),
(13, NULL, NULL, 17, '', 2, '', '2024-05-21 20:30:41', 340.00, 0, 500.00, 160.00);

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
  `code` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `LastName`, `FirstName`, `UserRole`, `birthdate`, `email`, `Username`, `Password`, `ContactNo`, `gender`, `address`, `profile_img`, `code`, `status`, `CreatedAt`, `UpdatedAt`) VALUES
(22, 'Rontale', 'Dan Keneth', 'Customer', '2003-07-06', 'rontaledankeneth@gmail.com', 'rontale12', '$2y$10$ZzyvbfKv12K40hMePj.wY.h66BOiJOPWZaoXGQS65smd2sBdUl57O', 9085353978, 'Male', 'Tawiran Calapan City', 'profile.png', '3d5093e5', 'pending', '2024-04-21 16:10:49', '2024-04-21 16:10:49'),
(24, 'Reyes', 'Colleen', 'Admin', '2003-05-27', 'rcolleen@gmail.com', 'rcolleen', '$2y$10$usZyT1zB61Vnyg1Ho3UEa.isfO16aQ1m69IIIURi6prHG1ispSVaC', 9286341210, 'Female', 'Masipit, Calapan City', 'profile.png', 'f71bfaf7', 'pending', '2024-04-27 14:24:19', '2024-04-27 14:24:19'),
(25, 'Gutierrez', 'Nicolle', 'Customer', '2003-07-17', 'nicolle@gmail.com', 'nicsxxx17', '$2y$10$leq.7kiCRllYStOVelY0UeQk8n1gt5x51oO7rChoaDGjpV8ZmynXK', 9944838485, 'Female', 'Dao Naujan, Oriental Mindoro', 'dp.jpg', '329e90f5', 'pending', '2024-04-27 14:34:43', '2024-04-27 14:34:43');

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
-- Indexes for table `droptableproducts`
--
ALTER TABLE `droptableproducts`
  ADD PRIMARY KEY (`DropID`),
  ADD KEY `TableID` (`TableID`,`ProductID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`feedbackID`);

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
-- Indexes for table `tableno`
--
ALTER TABLE `tableno`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD PRIMARY KEY (`TableID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `table_type`
--
ALTER TABLE `table_type`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerID` (`CustomerID`,`OrderID`,`ProductID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
-- AUTO_INCREMENT for table `droptableproducts`
--
ALTER TABLE `droptableproducts`
  MODIFY `DropID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  MODIFY `feedbackID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `orderhistoryID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `prod_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tableno`
--
ALTER TABLE `tableno`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tablereservation`
--
ALTER TABLE `tablereservation`
  MODIFY `TableID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `table_type`
--
ALTER TABLE `table_type`
  MODIFY `TableID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `tablereservation_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `tablereservation_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order` (`orderID`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`ProductID`) REFERENCES `product_tbl` (`prod_id`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
