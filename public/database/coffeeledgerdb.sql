-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2024 at 02:43 PM
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
(99, NULL, 57, '1280.00', 16, 'Medium', 'oncart', '2024-04-17 09:11:04', '2024-04-17 09:11:04');

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
(2, 2, 'masarap naman siya malinamnam', 2, 2, 1, '2024-04-21 11:26:19', '2024-04-21 11:26:19');

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
(58, NULL, 3, '', 'onHouse', '2024-02-29 14:43:14', '320.00', 2, 'Large', '6I7QND1IAI', 'onProcess'),
(59, NULL, 1, '', 'onHouse', '2024-02-29 14:43:14', '320.00', 2, 'Medium', '6I7QND1IAI', 'onProcess'),
(60, NULL, 2, '', 'onHouse', '2024-02-29 14:44:11', '240.00', 2, 'Medium', 'LT0AKASK4K', 'onProcess'),
(61, NULL, 39, '', 'onHouse', '2024-02-29 15:19:24', '500.00', 2, 'Medium', 'Z6C0SBGYX5', 'onProcess'),
(62, NULL, 3, '', 'onHouse', '2024-02-29 15:19:24', '240.00', 2, 'Medium', 'Z6C0SBGYX5', 'onProcess');

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
  `prod_desc` varchar(150) NOT NULL,
  `prod_code` text NOT NULL,
  `product_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`prod_id`, `prod_name`, `prod_quantity`, `prod_mprice`, `prod_lprice`, `prod_categ`, `prod_img`, `prod_desc`, `prod_code`, `product_status`) VALUES
(1, 'Quesadillas', 50, '160.00', 0.00, 'Appetizer', 'quesadillas.jpg', 'This is a Mexican dish made of a flour tortilla folded like a pizza with mayonnaise and tomato on top.', '', 'Unavailable'),
(2, 'Nachos', 4, '120.00', 0.00, 'Appetizer', 'nachos.png', 'Also a Mexican dish made with corn chips, vegetables, and other ingredients on top.', '', 'Available'),
(3, 'Fries', 8, '120.00', 0.00, 'Appetizer', 'fries.jpg', 'One of the most sell appetizer is our fries because of its crispiness and smell with perfect combination of our sauce. ', '', 'Available'),
(4, 'Fried Chicken w/ Gravy', 5, '148.00', 0.00, 'Meals', 'fchicken.jpg', 'Crispy and juicy fried chicken with our best gravy', '', 'Available'),
(5, 'Honey Garlic Chicken', 6, '155.00', 0.00, 'Meals', 'honeychicken.jpg', 'Crispy fried chicken breaded with honey', '', 'Available'),
(6, 'Orange Chicken', 5, '155.00', 0.00, 'Meals', 'orangechicken.jpg', 'A dish of fried chicken in a sweet orange-flavored, partnered with our garlic fried rice.', '', 'Available'),
(7, 'Burger Steak', 9, '160.00', 0.00, 'Meals', 'burgersteak.jpg', 'Steak that are smothered in our delicious mushroom gra sauce.vy', '', 'Available'),
(8, 'Sizzling Pepper Beef Steak', 7, '165.00', 0.00, 'Meals', 'sizzlingsteak.jpg', 'Beefy, juicylicious sizzling pepper beef steak partner with our mushroom gravy', '', 'Available'),
(9, 'Beef Tapa', 1, '120.00', 0.00, 'Meals', 'beeftapa.jpg', 'Beefy tapa served with green onion and combination of rice, egg and our best gravy', '', 'Available'),
(10, 'Crispy Lechon Sisig', 2, '165.00', 0.00, 'Meals', 'crispysisig.jpg', 'Crispy grilled sisig with the combination of rice and egg.', '', 'Available'),
(11, 'Lechon Kawali', 1, '148.00', 0.00, 'Meals', 'lechonkawali.jpg', 'Crispy deep fried pork belly with our savory gravy sauce', '', 'Available'),
(12, 'Bacon and Egg', 1, '155.00', 0.00, 'Meals', 'baconegg.jpg', 'Breakfast dish that consists of fried slices of bacon and fried egg.', '', 'Available'),
(13, 'Spam and Egg', 1, '115.00', 0.00, 'Meals', 'spamegg.jpg', 'Breakfast dish that consists of meaty and fatty fried slices of spam and fried egg.', '', 'Available'),
(14, 'Beef Bulgogi', 1, '168.00', 0.00, 'Meals', 'beefbulgogi.jpg', 'Made with the finest cuts of beef marinated in a flavorful blend of soy sauce, sesame oil, garlic, and ginger.', '', 'Available'),
(15, 'Korean Beef Stew', 1, '188.00', 0.00, 'Meals', 'beefstew.jpg', 'A spicy soup made with beef, vegetables, and a variety of spices. The stew is typically served with a bowl of steamed rice.', '', 'Available'),
(16, 'Chicken Parmegiana', 1, '168.00', 0.00, 'Meals', 'chickenparmegiana.jpg', 'Flavorful tomato sauce served and is topped with crispy chicken breasts covered in melty cheese.', '', 'Available'),
(17, 'Carbonara', 1, '170.00', 0.00, 'Pasta', 'carbonara.jpg', 'Carbonara with its flavorful cream sauce with combination of sandwich.', '', 'Available'),
(18, 'Classic Spaghetti', 1, '170.00', 0.00, 'Pasta', 'classicspag.jpg', 'Spaghetti with its tomato sauce and lot of cheese on top.', '', 'Available'),
(19, 'Truffle Pasta', 1, '170.00', 0.00, 'Pasta', 'trufflepasta.jpg', 'Combines cooked pasta with a creamy sauce made with truffle oil, mushrooms, cream and herbs. ', '', 'Available'),
(20, 'Chicken Alfredo', 1, '170.00', 0.00, 'Pasta', 'chickenalfredo.jpg', 'Pasta dish that consists of cooked chicken and fettuccine noodles tossed in a creamy white sauce made with butter, heavy cream and garlic.', '', 'Available'),
(21, 'Tuna Pesto', 1, '170.00', 0.00, 'Pasta', 'tunapesto.jpg', 'Dish that combines canned tuna with pesto sauce.', '', 'Available'),
(22, 'Parmegiana Meatball', 1, '190.00', 0.00, 'Pasta', 'parmegianameatball.png', 'Parmegiana pasta is made with the freshest ingredients, including meat balls, parmesan cheese, and a savory tomato sauce. ', '', 'Available'),
(30, 'Classic Caesar', 1, '180.00', 0.00, 'Salad', 'ceasar.jpg', ' Crunchy lettuce leaves tossed in a creamy dressing of mayonnaise.', '', 'Available'),
(31, 'Chef Salad', 1, '180.00', 0.00, 'Salad', 'chefsalad.jpg', ' Consists of hard-boiled eggs, sliced meats, cheese, tomatoes, cucumbers, and lettuce, may also include anchovies, olives, onions, etc..', '', 'Available'),
(32, 'Chicken Salad', 1, '180.00', 0.00, 'Salad', 'chickensalad.jpg', 'Consists of chopped cooked chicken, and mixed with other ingredients, such as mayonnaise, celery, onion, herbs, and seasonings.', '', 'Available'),
(33, 'Tuna Salad', 1, '180.00', 0.00, 'Salad', 'tunasalad.jpg', 'Salad with a blended of tuna and mayonnaise.', '', 'Available'),
(34, 'Mushroom Soup', 12, '150.00', 0.00, 'Soup', 'mushroomsoup.jpg', 'Soup in a bread made with mushrooms and milk.', '', 'Unavailable'),
(35, 'Crab and Corn', 1, '150.00', 0.00, 'Soup', 'crabandcornsoup.jpg', ' Creamy soup made with chicken broth, corn, crab meat inside of bread.', '', 'Available'),
(36, 'Pumpkin Soup', 1, '150.00', 0.00, 'Soup', 'pumpkinsoup.jpg', 'Made from pureed pumpkin, usually blended with broth, cream, onion, garlic, and spices inside of bread.', '', 'Available'),
(38, 'Pork BBQ Teriyaki', 1, '180.00', 0.00, 'Sandwich', 'bbqteriyaki.jpg', 'Juicy bbq pork sandwich slices pork marinated in a sweet and savory sauce made with soy sauce, sugar, garlic, ginger, and other ingredients.', '', 'Available'),
(39, 'Smoke Beef and Cheese Brisket', 1, '250.00', 0.00, 'Sandwich', 'smokebeef.jpg', 'Delicious sandwich that combines tender smoked brisket with melted cheese and barbecue sauce.', '', 'Available'),
(40, 'Meat Balls', 1, '200.00', 0.00, 'Sandwich', 'meatballsandwich.jpg', 'Sandwich that consists of meatballs and a tomato sauce.', '', 'Unavailable'),
(41, 'Cheesy Egg', 1, '140.00', 0.00, 'Sandwich', 'cheesyegg.jpg', 'Sandwich with a lot of cheese and egg.', '', 'Available'),
(42, 'Cheesy Pepperoni', 1, '180.00', 0.00, 'Sandwich', 'cheesypepperoni.jpg', 'Made with freshly sliced pepperoni, melted cheese.', '', 'Available'),
(43, 'Vanilla', 10, '145.00', 160.00, 'Coffee Frappe', 'vanillafrap.jpg', 'A luscious coffee frappe with the classic sweetness of vanilla, delivering a smooth and indulgent experience.', '', 'Available'),
(44, 'Mocha', 13, '145.00', 160.00, 'Coffee Frappe', 'mochafrap.jpg', 'Tempting blend of coffee and chocolate in a frosty treat, providing a rich and delightful combination.', '', 'Available'),
(45, 'Caramel', 7, '150.00', 165.00, 'Coffee Frappe', 'caramelfrap.jpg', 'Indulge in the buttery sweetness of caramel with this creamy and flavorful coffee frappe.', '', 'Unavailable'),
(46, 'Cookies and Cream', 15, '165.00', 180.00, 'Coffee Frappe', 'icedcookiesncream.jpg', 'Irresistible non-coffee frappe combining the crunch of cookies with the creaminess of a frosty treat.', '', 'Available'),
(47, 'Hazel Nut', 14, '150.00', 165.00, 'Coffee Frappe', 'hazelfrap.jpg', 'Savor the nutty goodness of hazelnut in this velvety coffee frappe, a delightful and aromatic experience.', '', 'Available'),
(48, 'Java Chip', 32, '155.00', 170.00, 'Coffee Frappe', 'javafrap.jpg', 'A coffee frappe adorned with chocolate chips, providing a satisfying blend of coffee and cocoa.', '', 'Available'),
(49, 'Salted Caramel', 16, '155.00', 170.00, 'Coffee Frappe', 'saltedcaramelfrap.jpg', 'Indulge in the perfect balance of sweet and salty with this delightful salted caramel-infused coffee frappe.', '', 'Available'),
(50, 'Vanilla Latte', 18, '140.00', 150.00, 'Flavored Coffee', 'icedvanillalatte.jpg', 'Iced delight featuring the sweet harmony of vanilla-infused coffee and cold milk over ice.', '', 'Unavailable'),
(51, 'Mocha Latte', 12, '140.00', 155.00, 'Flavored Coffee', 'mochalatte.jpg', 'A cool blend of iced coffee and chocolate, creating a rich and indulgent beverage.', '', 'Available'),
(52, 'Caramel Latte', 45, '145.00', 180.00, 'Flavored Coffee', 'icedcaramellatte.png', 'Iced coffee adorned with the sweet allure of caramel, providing a luscious and refreshing experience.', '', 'Available'),
(53, 'Cookies and Cream', 13, '150.00', 170.00, 'Flavored Coffee', 'icedcookiesncream.jpg', 'Iced coffee with a twist, combining the classic flavors of cookies and cream for a delightful chill.', '', 'Available'),
(54, 'Spanish Latte', 23, '140.00', 155.00, 'Flavored Coffee', 'icedspanishlatte.jpg', 'Cold and sweetened coffee with a touch of condensed milk, offering a unique and cooling Spanish-inspired taste.', '', 'Available'),
(55, 'Brewed Coffee', 24, '45.00', 0.00, 'Hot Coffee', 'hotbrewedcoffee.jpg', 'Classic and rich coffee made through traditional brewing methods.', '', 'Unavailable'),
(56, 'Espresso', 34, '40.00', 55.00, 'Hot Coffee', 'hotespresso.jpg', 'Intense and concentrated coffee shot, the base for various coffee drinks.', '', 'Unavailable'),
(57, 'Capuccino', 24, '80.00', 90.00, 'Hot Coffee', 'hotcappuccino.jpg', 'A balanced blend of espresso, steamed milk, and frothy foam.', '', 'Available'),
(58, 'Caphe Vietnam', 23, '80.00', 0.00, 'Hot Coffee', 'hotcaphevietnam.jpg', 'Vietnamese coffee, often strong and sweet, served with condensed milk.', '', 'Available'),
(59, 'Americano', 21, '80.00', 100.00, 'Hot Coffee', 'hotamericano.png', 'Diluted espresso with hot water, offering a milder flavor.', '', 'Available'),
(60, 'Caffe Latte', 32, '90.00', 100.00, 'Hot Coffee', 'hotcaffelatte.jpg', 'Smooth and creamy coffee with espresso and steamed milk.', '', 'Available'),
(61, 'Vanilla Latte', 25, '90.00', 100.00, 'Hot Coffee', 'hotvanilla.png', 'Latte with a sweet hint of vanilla flavor.', '', 'Available'),
(62, 'Mocha Latte', 12, '90.00', 100.00, 'Hot Coffee', 'hotmocha.jpg', 'Latte with chocolate syrup for a delightful chocolatey twist.', '', 'Available'),
(63, 'Caramel Latte', 1, '95.00', 105.00, 'Hot Coffee', 'hotcaramel.jpg', 'Latte with a sweet caramel infusion.', '', 'Available'),
(64, 'Spanish Latte', 18, '90.00', 100.00, 'Hot Coffee', 'hotspanish.jpg', 'Latte with a touch of condensed milk, providing a rich and sweet taste.', '', 'Available'),
(65, 'Americano', 12, '90.00', 100.00, 'Iced Coffee', 'icedamericano.jpg', 'Chilled perfection of diluted espresso over ice, maintaining its smooth and robust character for a refreshing sip.', '', 'Available'),
(66, 'Caphe Vietnam', 23, '120.00', 100.00, 'Iced Coffee', 'icedcaphevietnam.jpg', 'Vietnamese iced coffee, bold and sweet, often served over ice with condensed milk, offering a cool and rich experience.', '', 'Available'),
(67, 'Caffe Latte', 12, '130.00', 140.00, 'Iced Coffee', 'icedcafe.jpg', 'Iced version of the classic latte, blending espresso and cold milk over ice for a cool, creamy indulgence.', '', 'Available'),
(68, 'Vanilla', 12, '140.00', 155.00, 'Non Coffee Frappe', 'vanillafrap.jpg', 'A non-coffee frappe that captivates with the classic sweetness of vanilla, blended to perfection.', '', 'Available'),
(69, 'Mocha', 12, '140.00', 155.00, 'Non Coffee Frappe', 'mochafrap.jpg', 'Tempting blend of chocolate and creamy goodness in a non-coffee frappe for a delightful treat.', '', 'Available'),
(70, 'Caramel', 20, '140.00', 155.00, 'Non Coffee Frappe', 'caramelfrap.jpg', 'Indulgent non-coffee frappe featuring the rich and buttery flavor of caramel, a sweet escape.', '', 'Available'),
(71, 'Cookies and Cream', 23, '150.00', 175.00, 'Non Coffee Frappe', 'icedcookiesncream.jpg', 'Irresistible non-coffee frappe combining the crunch of cookies with the creaminess of a frosty treat.', '', 'Available'),
(72, 'Hazel Nut', 23, '150.00', 165.00, 'Non Coffee Frappe', 'hazelfrap.jpg', 'A nutty twist in a non-coffee frappe, hazelnut-infused and velvety smooth.', '', 'Available'),
(73, 'Java Chip', 12, '150.00', 175.00, 'Non Coffee Frappe', 'javafrap.jpg', 'Non-coffee frappe with a delectable mix of chocolate chips, offering a rich and satisfying experience.', '', 'Available'),
(74, 'Salted Caramel', 1, '150.00', 165.00, 'Non Coffee Frappe', 'saltedcaramelfrap.jpg', 'A sweet and savory non-coffee frappe, combining the allure of caramel with a touch of salt for a unique taste.', '', 'Unavailable'),
(75, 'Taro Cream Cheese', 24, '150.00', 165.00, 'Non Coffee Frappe', 'tarocreamcheese.jpg', 'An exotic non-coffee frappe featuring taro and creamy cheese, creating a refreshing and delightful beverage.', '', 'Available'),
(76, 'Double Dutch', 34, '150.00', 165.00, 'Non Coffee Frappe', 'doubledutch.jpg', 'A non-coffee frappe extravaganza with a blend of chocolate and vanilla, offering a doubly delightful frozen treat.', '', 'Available'),
(87, 'Smoked Ham', 1, '200.00', 0.00, 'Sandwich', 'smokeham.jpg', 'Ham is hung in a smokehouse and allowed to absorb smoke from smoldering fires, which gives added flavor and color to meat.', '', 'Available'),
(88, 'Truffle Smoked Ham', 6, '200.00', 0.00, 'Sandwich', 'trufflesmokeham.jpg', 'Round ball of cured meat is commonly a whole boneless cut of pork that’s been cured in a sweet glaze.', '', 'Available'),
(89, 'Bacon and Egg', 88, '180.00', 0.00, 'Sandwich', 'baconeggsandwich.jpg', 'Sandwich with consist of sliced bacon and fried egg.', '', 'Available'),
(90, 'Cheesy Bacon Mushroom', 56, '180.00', 0.00, 'Sandwich', 'cheesybacon.jpg', ' Made with freshly cooked bacon, sautéed mushrooms, and melted cheese.', '', 'Available'),
(91, 'Pulled Pork', 87, '170.00', 0.00, 'Sandwich', 'pulledpork.jpg', 'Sandwich made with tender, juicy pulled pork with cabbage', '', 'Available'),
(92, 'Tuna Sandwich', 8, '170.00', 0.00, 'Sandwich', 'tunasandwich.jpg', 'Sandwich made with tuna, partner with our mushroom sauce.', '', 'Available'),
(93, 'Chicken Sandwich', 6, '170.00', 0.00, 'Sandwich', 'chickensandwich.jpg', 'Sandwich made with chicken, partner with our tomato sauce.', '', 'Available'),
(94, 'Beef Burger', 7, '160.00', 0.00, 'Sandwich', 'beefburger.jpg', 'Seasoned beef, crisp veggies, and creamy sauces, all nestled in a soft, toasted bun.', '', 'Available'),
(95, 'Hot Chocolate', 1, '80.00', 0.00, 'Others', 'hotchocolate.jpg', 'A comforting and rich beverage, hot chocolate offers a velvety blend of cocoa and milk, perfect for warming up', '', 'Available'),
(96, 'Hot Pure Vanilla', 12, '80.00', 0.00, 'Others', 'hotpurevanilla.jpg', 'A soothing and aromatic hot drink, featuring the pure essence of vanilla for a delightful and fragrant experience.', '', 'Available'),
(97, 'Housed Iced Tea', 8, '55.00', 0.00, 'Others', 'icedtea.jpg', 'A refreshing classic, house iced tea is a chilled and flavorful beverage, perfect for cooling down on a warm day.', '', 'Available'),
(98, 'Iced Tea Pitcher', 5, '110.00', 0.00, 'Others', 'icedteapitcher.jpg', 'A cool and convenient way to enjoy the timeless goodness of iced tea, served in a pitcher for easy sharing and sipping.', '', 'Available'),
(99, 'Iced Coffee Cream Cheese', 15, '165.00', 180.00, 'Flavored Coffee', 'icedcoffeecheese.jpg', 'An unconventional treat, iced coffee blended with creamy and tangy cream cheese for a refreshing and surprising twist.', '', 'Available'),
(107, 'ice coffee black', 100, '90.00', 110.00, 'Hot Coffee', 'ssspo.png', 'hello coffee', 'fef1c08e', ''),
(108, 'Spanish Latte', 12, '100.00', 120.00, 'Iced Coffee', 'Screenshot 2024-04-04 215018.png', 'hello coffee', 'e78e3f89', 'Available');

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
(3, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(4, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(5, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(6, NULL, '0000-00-00 00:00:00', 0.00, '', '', 'hajhdkjsahdsad\r\n', '2024-03-03 23:20:52'),
(7, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(8, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:20:52'),
(9, NULL, '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(10, NULL, '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(11, NULL, '0000-00-00 00:00:00', 0.00, '', '', 'asdas\r\n', '2024-03-03 23:20:52'),
(12, NULL, '0000-00-00 00:00:00', 0.00, '', '', 'asdsadsadsa', '2024-03-03 23:21:12'),
(13, NULL, '0000-00-00 00:00:00', 0.00, '', '', '', '2024-03-03 23:21:56'),
(14, NULL, '2024-03-05 23:24:00', 0.00, '', '', 'sadsadsad\r\n', '2024-03-03 23:24:41'),
(15, NULL, '2024-03-06 23:26:00', 0.00, '', '', 'sadasdsa\r\n\r\n', '2024-03-03 23:26:22'),
(16, NULL, '2024-03-05 23:28:00', 0.00, 'Triple', '', 'jkasjdlksaj\r\n', '2024-03-03 23:28:58'),
(17, NULL, '2024-03-21 09:23:00', 0.00, 'Triple', '', 'hello world', '2024-03-07 09:24:15'),
(18, NULL, '2024-03-29 17:22:47', 0.00, 'Tropa_size', '', 'gusto ko to', '2024-03-28 17:22:33'),
(19, NULL, '2024-04-18 22:10:00', 0.00, 'Triple', '', 'jdsfdshgf\r\n', '2024-04-17 16:57:20'),
(20, NULL, '2024-04-18 11:59:00', 0.00, 'Triple', '', 'jhsadkjhsad\r\n', '2024-04-17 16:59:16'),
(21, NULL, '2024-04-25 10:20:00', 0.00, 'Triple', '', '2', '2024-04-19 13:14:58');

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
(1, 1, '2023-07-01 01:30:00', 1472.63, 30.00, 4.50),
(2, 2, '2023-07-02 07:45:00', 2444.85, 50.00, 7.25),
(3, 3, '2023-07-03 03:20:00', 986.52, 20.00, 2.75),
(4, 4, '2023-07-04 10:15:00', 1644.20, 30.00, 1.25),
(5, 5, '2023-07-05 04:00:00', 1043.71, 20.00, 1.75),
(6, 6, '2023-10-06 06:30:00', 1858.66, 40.00, 7.50),
(7, 7, '2023-07-07 02:15:00', 529.20, 10.00, 0.75),
(8, 8, '2023-07-09 23:25:35', 1826.63, 40.00, 8.06),
(9, 9, '2023-07-09 23:25:59', 1429.74, 30.00, 5.00),
(10, 10, '2023-08-08 10:51:03', 1200.50, 60.00, 40.00),
(11, 27, '2024-01-25 09:21:02', 1990.25, 100.00, 30.00),
(12, 15, '2023-10-30 12:01:56', 1300.25, 500.00, 40.00),
(13, 31, '2024-02-29 04:47:02', 2246.00, 100.00, 50.00),
(17, 18, '2023-11-30 11:03:09', 2000.00, 200.00, 99.00),
(18, 34, '2024-03-23 12:21:02', 990.75, 100.00, 50.00),
(21, 25, '2024-01-03 08:21:02', 1300.75, 500.00, 40.00),
(22, 32, '2024-03-04 07:31:02', 1907.75, 500.00, 40.00),
(30, 33, '2024-03-17 05:55:02', 2980.00, 500.00, 100.00),
(32, 38, '2024-04-17 05:40:29', 850.00, 200.00, 50.00),
(36, 35, '2024-03-31 06:40:29', 999.25, 500.00, 50.00),
(39, 37, '2024-04-09 11:11:29', 1000.25, 500.00, 100.00),
(40, 22, '2023-12-25 01:13:39', 4500.56, 500.00, 100.00),
(42, 13, '2023-09-20 04:00:40', 2000.00, 200.00, 99.00),
(46, 26, '2024-01-17 05:21:02', 990.00, 200.00, 50.00),
(51, 36, '2024-04-02 10:40:29', 800.00, 200.00, 50.00),
(53, 23, '2023-12-28 04:30:14', 4000.10, 500.00, 40.00),
(55, 21, '2023-12-18 07:13:39', 1880.50, 500.00, 40.00),
(57, 28, '2024-01-31 07:49:02', 2000.00, 200.00, 99.00),
(58, 30, '2024-02-22 03:47:02', 1245.25, 200.00, 50.00),
(60, 14, '2023-10-11 10:55:30', 1540.00, 500.00, 389.00),
(63, 24, '2023-12-31 06:30:14', 5259.50, 500.00, 50.00),
(65, 20, '2023-12-09 04:11:57', 1300.75, 100.00, 40.00),
(72, 19, '2023-12-01 03:30:28', 3000.00, 500.00, 200.00),
(73, 11, '2023-08-24 01:30:03', 1490.75, 85.00, 39.00),
(89, 12, '2023-09-05 11:00:55', 789.00, 100.00, 30.00),
(90, 29, '2024-02-14 11:21:02', 5678.00, 500.00, 50.00),
(92, 17, '2023-11-21 02:28:09', 800.00, 100.00, 30.00),
(99, 16, '2023-11-09 12:46:09', 990.00, 200.00, 50.00);

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
(22, 'Rontale', 'Dan Keneth', 'Customer', '2003-07-06', 'rontaledankeneth@gmail.com', 'rontale12', '$2y$10$ZzyvbfKv12K40hMePj.wY.h66BOiJOPWZaoXGQS65smd2sBdUl57O', 9085353978, 'Male', 'Tawiran Calapan City', 'profile.png', '3d5093e5', 'pending', '2024-04-21 16:10:49', '2024-04-21 16:10:49');

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
-- Indexes for table `table_type`
--
ALTER TABLE `table_type`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

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
-- AUTO_INCREMENT for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  MODIFY `feedbackID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `prod_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `rawproducttable`
--
ALTER TABLE `rawproducttable`
  MODIFY `rawID` int NOT NULL AUTO_INCREMENT;

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
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
