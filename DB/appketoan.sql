-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 11:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appketoan`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `em_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `em_id`) VALUES
(1, 'avu7212@gmail.com', '123', 1),
(2, 'nhanvien@gmail.com', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `banking`
--

CREATE TABLE `banking` (
  `id` int(255) NOT NULL,
  `dateTime` date NOT NULL,
  `content` varchar(255) NOT NULL,
  `object` varchar(255) NOT NULL,
  `person` varchar(255) DEFAULT NULL,
  `totalAmount` int(255) NOT NULL,
  `receiptPayment` varchar(20) NOT NULL,
  `employeeid` int(255) NOT NULL,
  `budgetid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banking`
--

INSERT INTO `banking` (`id`, `dateTime`, `content`, `object`, `person`, `totalAmount`, `receiptPayment`, `employeeid`, `budgetid`) VALUES
(2, '2022-03-28', 'adfasd', 'hoang vu', 'hoang vu', 1000000, 'receipt', 1, 1),
(3, '2022-04-04', 'thu tiền cho sếp', 'anh long', 'hoang vu', 2120, 'receipt', 1, 1),
(4, '0000-00-00', 'nhặt được ', 'hoang vu', 'hoang vu', 121210, 'receipt', 1, 1),
(5, '0000-00-00', 'adfasádfds', 'hoang son211222', 'hoang vu', 134230, 'payment', 1, 1),
(6, '2022-04-05', 'chi tiền 5/4/2022', 'hoang son211222', 'hoang vu', 12120, 'receipt', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(255) NOT NULL,
  `budget` int(255) NOT NULL,
  `cash` int(255) NOT NULL,
  `banking` int(255) NOT NULL,
  `dateTime` date NOT NULL,
  `customerDebt` int(255) NOT NULL,
  `supplierDebt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `budget`, `cash`, `banking`, `dateTime`, `customerDebt`, `supplierDebt`) VALUES
(1, 5446450, 5434340, 5012110, '2022-03-23', 10000000, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(255) NOT NULL,
  `dateTime` date NOT NULL,
  `content` varchar(255) NOT NULL,
  `object` varchar(255) NOT NULL,
  `person` varchar(255) DEFAULT NULL,
  `totalAmount` int(255) NOT NULL,
  `employeeid` int(255) NOT NULL,
  `receiptPayment` varchar(255) NOT NULL,
  `budgetid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id`, `dateTime`, `content`, `object`, `person`, `totalAmount`, `employeeid`, `receiptPayment`, `budgetid`) VALUES
(5, '2022-03-27', 'qweq', 'hoang vu', 'hoang vu', 1000000, 1, 'receipt', 1),
(9, '2022-03-27', 'nop tien 27/3/2022', 'hoang vu', 'hoang vu', 1000000, 1, 'receipt', 1),
(10, '2022-03-27', 'nop tien 28/3/2022', 'hoang vu', 'hoang vu 2', 1000000, 1, 'payment', 1),
(11, '2022-03-28', 'nop tien 27/3/2022 1212133', 'hoang vu', 'hoang vu 2', 1231120, 1, 'receipt', 1),
(12, '0000-00-00', 'adfas', 'cty xi măng hoàng sơn', 'hoang vu', 1110, 1, 'receipt', 1),
(20, '2022-02-04', 'thu tiền cho sếp', 'hoang son211222', 'hoang vu', 1212120, 1, 'receipt', 1),
(21, '2022-04-05', 'nhận tiền của khách hàng', 'hoang son211', 'hoang vu', 2222210, 1, 'receipt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `catename` varchar(255) NOT NULL,
  `companyid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catename`, `companyid`) VALUES
(1, 'vật liệu xây dựng', 1),
(2, 'dịch vụ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkcash`
--

CREATE TABLE `checkcash` (
  `id` int(255) NOT NULL,
  `dateTime` date NOT NULL,
  `dateTimeTo` date NOT NULL,
  `moneyUnit` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkcash`
--

INSERT INTO `checkcash` (`id`, `dateTime`, `dateTimeTo`, `moneyUnit`, `content`) VALUES
(14, '2022-04-04', '2022-04-04', ' VND', 'Kiểm kê tiền mặt tại quỹ đến ngày2022-04-04'),
(15, '2022-04-05', '2022-04-05', ' VND', 'Kiểm kê tiền mặt tại quỹ đến ngày2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `checkinventory`
--

CREATE TABLE `checkinventory` (
  `id` int(255) NOT NULL,
  `dateTimeTo` date NOT NULL,
  `dateTime` date NOT NULL,
  `employeeid` int(255) NOT NULL,
  `inventoryid` int(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `categoryid` int(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(255) NOT NULL,
  `amount` int(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `conclude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkinventory`
--

INSERT INTO `checkinventory` (`id`, `dateTimeTo`, `dateTime`, `employeeid`, `inventoryid`, `productid`, `categoryid`, `unit`, `quantity`, `amount`, `content`, `conclude`) VALUES
(6, '2022-04-01', '2022-04-01', 1, 1, 8, 1, 'tấn', 200, 2131231, 'kiểm tra kho', 'đầy đủ');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `budget` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `location`, `budget`) VALUES
(1, 'VINASIMEX', '102, phạm văn đồng, bình thạnh , hồ chí minh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `source` varchar(255) NOT NULL,
  `stage` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `Operation_field` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `lastname`, `name`, `phoneNumber`, `source`, `stage`, `birthday`, `gender`, `Operation_field`, `address`) VALUES
(1, 'avu7212@gmail.com', 'nguyễn hoàng tuấn', 'Vũ', 935794380, 'faceBook', 'Lead', '2022-04-02', 'nam', 'Công an', '13413 HCM');

-- --------------------------------------------------------

--
-- Table structure for table `countmoney`
--

CREATE TABLE `countmoney` (
  `id` int(255) NOT NULL,
  `money` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `checkCashid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countmoney`
--

INSERT INTO `countmoney` (`id`, `money`, `quantity`, `amount`, `description`, `checkCashid`) VALUES
(49, 500000, 20, 10000000, '', 14),
(50, 200000, 20, 4000000, '', 14),
(51, 100000, 30, 3000000, '', 14),
(52, 50000, 50, 2500000, '', 14),
(53, 20000, 0, 0, '', 14),
(54, 10000, 0, 0, '', 14),
(55, 5000, 0, 0, '', 14),
(56, 2000, 60, 120000, '', 14),
(57, 1000, 0, 0, '', 14),
(58, 500000, 20, 10000000, '', 15),
(59, 200000, 20, 4000000, '', 15),
(60, 100000, 50, 5000000, '', 15),
(61, 50000, 50, 2500000, '', 15),
(62, 20000, 20, 400000, '', 15),
(63, 10000, 10, 100000, '', 15),
(64, 5000, 70, 350000, '', 15),
(65, 2000, 0, 0, '', 15),
(66, 1000, 0, 0, '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phoneNumber` int(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `tax` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `location`, `phoneNumber`, `email`, `tax`) VALUES
(2, 'anh long', '103 hà nội', 934732324, 'along@gmail.com', 32147123);

-- --------------------------------------------------------

--
-- Table structure for table `customerdebt`
--

CREATE TABLE `customerdebt` (
  `CusDid` int(255) NOT NULL,
  `customerid` int(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `debt` int(255) NOT NULL,
  `duration` date NOT NULL,
  `collect` varchar(20) NOT NULL,
  `salesid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerdebt`
--

INSERT INTO `customerdebt` (`CusDid`, `customerid`, `customername`, `debt`, `duration`, `collect`, `salesid`) VALUES
(6, 2, 'anh long', 28866950, '2022-05-08', 'not collect', 16),
(8, 2, 'anh long', 100000000, '2022-05-08', 'not collect', 18);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `age` int(100) DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `phoneNumber` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `staffName`, `age`, `location`, `gender`, `phoneNumber`) VALUES
(1, 'hoang vu', 22, '102 sdfasf', 'nam', 92342342),
(2, 'nhan vien', 22, '102 sai gon', 'nam', 934732324);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `companyId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `location`, `companyId`) VALUES
(1, 'kho hà nội', '111 lãng hạ, hà nội', 1),
(2, 'kho sài gòn', '1231adsfasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryhistory`
--

CREATE TABLE `inventoryhistory` (
  `id` int(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL,
  `productid` int(255) NOT NULL,
  `categoryid` int(255) NOT NULL,
  `inventoryQuantity` int(255) NOT NULL,
  `price` int(100) NOT NULL,
  `person` varchar(255) NOT NULL,
  `employeeid` int(255) NOT NULL,
  `inventoryid` int(255) NOT NULL,
  `supplierid` int(255) NOT NULL,
  `imExport` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventoryhistory`
--

INSERT INTO `inventoryhistory` (`id`, `content`, `dateTime`, `productid`, `categoryid`, `inventoryQuantity`, `price`, `person`, `employeeid`, `inventoryid`, `supplierid`, `imExport`) VALUES
(4, 'nhập kho', '2022-04-01 09:38:20', 9, 1, 231, 500000, 'haong vu', 1, 1, 5, 'import'),
(5, ' nhập, xuất kho ngày2022-04-04', '2022-04-04 12:05:00', 8, 1, 1210, 21310, 'hoang vu', 1, 1, 5, 'import'),
(6, ' nhập, xuất kho ngày2022-04-04', '2022-04-04 14:02:00', 8, 1, 210, 1231230, 'hoang vu', 1, 1, 6, 'export'),
(7, ' nhập, xuất kho ngày2022-04-04', '2022-04-04 23:38:00', 8, 1, 2000, 300000, 'hoang vu', 1, 1, 5, 'import');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(255) NOT NULL,
  `group_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_match` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `group_id`, `name`, `url_match`) VALUES
(1, 1, 'Xóa bảng kiểm kê', 'addData\\.php\\?cashNav=cashThird&data=delete&id=\\d+$'),
(3, 3, 'Sửa thông tin nhà cung cấp', 'addData\\.php\\?purchaseNav=purchaseThird&data=edit&id=\\d+$'),
(4, 3, 'Xóa nhà cung cấp', 'addData\\.php\\?purchaseNav=purchaseThird&data=delete&id=\\d+$'),
(5, 3, 'Sửa hàng hóa', 'addData\\.php\\?purchaseNav=purchaseFourth&data=edit&id=\\d+$'),
(6, 3, 'Xóa sản phẩm', 'addData\\.php\\?purchaseNav=purchaseFourth&data=delete&id=\\d+$'),
(7, 4, 'Sửa thông tin khách hàng', 'addData\\.php\\?salesNav=salesThird&data=edit&id=\\d+$'),
(8, 4, 'Xóa thông tin khách hàng', 'addData\\.php\\?salesNav=salesThird&data=delete&id=\\d+$'),
(9, 4, 'Sửa thông tin sản phẩm', 'addData\\.php\\?salesNav=salesFourth&data=edit&id=\\d+$'),
(10, 4, 'Xóa thông tin sản phẩm ', 'addData\\.php\\?salesNav=salesFourth&data=delete&id=\\d+$'),
(11, 5, 'Xóa kiểm kê kho', 'addData\\.php\\?inventoryNav=inventoryThird&data=delete&id=\\d+$'),
(12, 5, 'Sửa thông tin hàng hóa', 'addData\\.php\\?inventoryNav=inventoryFourth&data=edit&id=\\d+$'),
(13, 5, 'Xóa sản phẩm', 'addData\\.php\\?inventoryNav=inventoryFourth&data=delete&id=\\d+$'),
(14, 6, 'View quản lý nhân viên', 'employee\\.php'),
(16, 6, 'Phân quyền ', 'privilege\\.php\\?&id=\\d+$');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_group`
--

CREATE TABLE `privilege_group` (
  `id` int(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `position` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege_group`
--

INSERT INTO `privilege_group` (`id`, `group_name`, `position`) VALUES
(1, 'Tiền mặt', 1),
(2, 'Tiền gửi', 2),
(3, 'Mua hàng', 3),
(4, 'Bán hàng', 4),
(5, 'Kho', 5),
(6, 'Nhân viên', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) DEFAULT NULL,
  `minimumQuantity` int(255) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `inventoryid` int(255) NOT NULL,
  `categoryid` int(255) NOT NULL,
  `supplierid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `proname`, `price`, `quantity`, `minimumQuantity`, `unit`, `inventoryid`, `categoryid`, `supplierid`) VALUES
(8, 'đá', 30000, 2100, 300, 'khối', 2, 2, 6),
(9, 'thép', 500000, 1310, 20, 'tấn', 1, 1, 5),
(10, 'gạch', 2000, 100, 2000, 'Bao', 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(255) NOT NULL,
  `dateTime` date NOT NULL,
  `content` varchar(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `supplierid` int(255) NOT NULL,
  `person` varchar(100) DEFAULT NULL,
  `employeeid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `dateTime`, `content`, `productid`, `quantity`, `price`, `supplierid`, `person`, `employeeid`) VALUES
(18, '0000-00-00', 'adfas', 9, 1111, 1210, 5, 'hoang vu', 1),
(19, '2022-04-04', 'mua hàng', 9, 1210, 400000, 5, 'hoang vu', 1),
(20, '2022-04-04', 'mua đá', 8, 2000, 30000, 5, 'hoang vu', 1),
(21, '2022-04-05', 'mua nợ 2 200 khối đá ', 8, 2000, 50000, 6, 'hoang vu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(255) NOT NULL,
  `dateTime` date NOT NULL,
  `customerid` int(255) NOT NULL,
  `poductid` int(255) NOT NULL,
  `categoryid` int(255) NOT NULL,
  `employeeid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `totalMoney` int(255) NOT NULL,
  `invoice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `dateTime`, `customerid`, `poductid`, `categoryid`, `employeeid`, `quantity`, `totalMoney`, `invoice`) VALUES
(16, '2022-04-01', 2, 9, 1, 1, 2345, 28866950, 0),
(18, '2022-04-05', 2, 8, 1, 1, 2000, 100000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `id` int(255) NOT NULL,
  `postedDate` date NOT NULL,
  `voucherDate` date NOT NULL,
  `description` int(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `tax` int(255) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `location`, `tax`, `phonenumber`, `email`) VALUES
(5, 'hoang son211222', 'hoang hoa tham', 12334, 935794380, 'admin@gmail.con'),
(6, 'cty xi măng hoàng sơn 3', '13413 HCM', 3242342, 9234232, 'tuanvu8102000@gamil.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplierdebt`
--

CREATE TABLE `supplierdebt` (
  `id` int(255) NOT NULL,
  `supplierid` int(255) NOT NULL,
  `suppliername` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` varchar(255) NOT NULL,
  `debt` int(255) NOT NULL,
  `duration` date NOT NULL,
  `paid` varchar(20) NOT NULL,
  `purchaseid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplierdebt`
--

INSERT INTO `supplierdebt` (`id`, `supplierid`, `suppliername`, `content`, `debt`, `duration`, `paid`, `purchaseid`) VALUES
(13, 5, 'hoang son211222', 'adfas', 1344310, '2022-04-03', 'unpaid', 18),
(14, 5, 'hoang son211222', 'mua hàng', 484000000, '2022-05-08', 'unpaid', 19),
(15, 5, 'hoang son211222', 'mua đá', 60000000, '2022-05-08', 'unpaid', 20),
(16, 6, 'cty xi măng hoàng sơn 3', 'mua nợ 2 200 khối đá ', 100000000, '2022-04-05', 'unpaid', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege`
--

CREATE TABLE `user_privilege` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `privilege_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_privilege`
--

INSERT INTO `user_privilege` (`id`, `user_id`, `privilege_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 1, 11),
(11, 1, 12),
(12, 1, 13),
(13, 1, 14),
(18, 1, 16),
(92, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `em_id` (`em_id`);

--
-- Indexes for table `banking`
--
ALTER TABLE `banking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budgetid` (`budgetid`),
  ADD KEY `employeeid` (`employeeid`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerDebt` (`customerDebt`,`supplierDebt`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budgetid` (`budgetid`),
  ADD KEY `employeeid` (`employeeid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplierid` (`companyid`);

--
-- Indexes for table `checkcash`
--
ALTER TABLE `checkcash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkinventory`
--
ALTER TABLE `checkinventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventoryid` (`inventoryid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `employeeid` (`employeeid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countmoney`
--
ALTER TABLE `countmoney`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkCashid` (`checkCashid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdebt`
--
ALTER TABLE `customerdebt`
  ADD PRIMARY KEY (`CusDid`),
  ADD KEY `object` (`customerid`),
  ADD KEY `salesid` (`salesid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyName` (`companyId`),
  ADD KEY `companyId` (`companyId`);

--
-- Indexes for table `inventoryhistory`
--
ALTER TABLE `inventoryhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `inventotyid` (`inventoryid`),
  ADD KEY `employeeid` (`employeeid`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `supplierid` (`supplierid`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `privilege_group`
--
ALTER TABLE `privilege_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventoryid` (`inventoryid`,`categoryid`,`supplierid`),
  ADD KEY `supplierid` (`supplierid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplierid` (`supplierid`),
  ADD KEY `employeeid` (`employeeid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `poductid` (`poductid`),
  ADD KEY `employeeid` (`employeeid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplierdebt`
--
ALTER TABLE `supplierdebt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object` (`supplierid`),
  ADD KEY `purchaseid` (`purchaseid`);

--
-- Indexes for table `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banking`
--
ALTER TABLE `banking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkcash`
--
ALTER TABLE `checkcash`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `checkinventory`
--
ALTER TABLE `checkinventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countmoney`
--
ALTER TABLE `countmoney`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerdebt`
--
ALTER TABLE `customerdebt`
  MODIFY `CusDid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventoryhistory`
--
ALTER TABLE `inventoryhistory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `privilege_group`
--
ALTER TABLE `privilege_group`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplierdebt`
--
ALTER TABLE `supplierdebt`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`em_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banking`
--
ALTER TABLE `banking`
  ADD CONSTRAINT `banking_ibfk_1` FOREIGN KEY (`budgetid`) REFERENCES `budget` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banking_ibfk_2` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cash`
--
ALTER TABLE `cash`
  ADD CONSTRAINT `cash_ibfk_1` FOREIGN KEY (`budgetid`) REFERENCES `budget` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cash_ibfk_2` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`companyid`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkinventory`
--
ALTER TABLE `checkinventory`
  ADD CONSTRAINT `checkinventory_ibfk_1` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkinventory_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkinventory_ibfk_3` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkinventory_ibfk_4` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `countmoney`
--
ALTER TABLE `countmoney`
  ADD CONSTRAINT `countmoney_ibfk_1` FOREIGN KEY (`checkCashid`) REFERENCES `checkcash` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customerdebt`
--
ALTER TABLE `customerdebt`
  ADD CONSTRAINT `customerdebt_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerdebt_ibfk_2` FOREIGN KEY (`salesid`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventoryhistory`
--
ALTER TABLE `inventoryhistory`
  ADD CONSTRAINT `inventoryhistory_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventoryhistory_ibfk_2` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventoryhistory_ibfk_3` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventoryhistory_ibfk_4` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventoryhistory_ibfk_5` FOREIGN KEY (`supplierid`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `privilege_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplierid`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`supplierid`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`poductid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_4` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplierdebt`
--
ALTER TABLE `supplierdebt`
  ADD CONSTRAINT `supplierdebt_ibfk_1` FOREIGN KEY (`supplierid`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplierdebt_ibfk_2` FOREIGN KEY (`purchaseid`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD CONSTRAINT `user_privilege_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_privilege_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
