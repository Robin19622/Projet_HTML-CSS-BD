-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 05, 2023 at 09:14 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humanRessource`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `COUNTRIES_NAMES` varchar(255) NOT NULL,
  `SHORT_NAMES` varchar(2) NOT NULL,
  `REGION_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `COUNTRIES_NAMES`, `SHORT_NAMES`, `REGION_ID`) VALUES
(1, 'Argentina', 'AR', 2),
(2, 'Australia', 'AU', 3),
(3, 'Belgium', 'BE', 1),
(4, 'Brazil', 'BR', 2),
(5, 'Canada', 'CA', 2),
(6, 'Switzerland', 'CH', 1),
(7, 'China', 'CN', 3),
(8, 'Germany', 'DE', 1),
(9, 'Denmark', 'DK', 1),
(10, 'Egypt', 'EG', 4),
(11, 'France', 'FR', 1),
(12, 'HongKong', 'HK', 3),
(13, 'Israel', 'IL', 4),
(14, 'India', 'IN', 3),
(15, 'Italy', 'IT', 1),
(16, 'Japan', 'JP', 3),
(17, 'Kuwait', 'KW', 4),
(18, 'Mexico', 'MX', 2),
(19, 'Nigeria', 'NG', 4),
(20, 'Netherlands', 'NL', 1),
(21, 'Singapore', 'SG', 3),
(22, 'United Kingdom', 'UK', 1),
(23, 'United States of America', 'US', 2),
(24, 'Zambia', 'ZM', 4),
(25, 'Zimbabwe', 'ZW', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `DEPARTMENT_NAME` varchar(255) NOT NULL,
  `MANAGER_ID` int NOT NULL,
  `LOCATION_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `DEPARTMENT_NAME`, `MANAGER_ID`, `LOCATION_ID`) VALUES
(1, 'Administration', 200, 1700),
(2, 'Marketing', 201, 1800),
(3, 'Purchasing', 114, 1700),
(4, 'Human Resources', 203, 2400),
(5, 'Shipping', 121, 1500),
(6, 'IT', 103, 1400),
(7, 'Public Relations', 204, 2700),
(8, 'Sales', 145, 2500),
(9, 'Executive', 100, 1700),
(10, 'Finance', 108, 1700),
(11, 'Accounting', 205, 1700),
(12, 'Treasury', 0, 1700),
(13, 'Corporate Tax', 0, 1700),
(14, 'Control And Credit', 0, 1700),
(15, 'Shareholder Services', 0, 1700),
(16, 'Benefits', 0, 1700),
(17, 'Manufacturing', 0, 1700),
(18, 'Construction', 0, 1700),
(19, 'Contracting', 0, 1700),
(20, 'Operations', 0, 1700),
(21, 'IT Support', 0, 1700),
(22, 'NOC', 0, 1700),
(23, 'IT Helpdesk', 0, 1700),
(24, 'Government Sales', 0, 1700),
(25, 'Retail Sales', 0, 1700),
(26, 'Recruiting', 0, 1700),
(27, 'Payroll', 0, 1700);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `HIRE_DATE` date NOT NULL,
  `JOB_ID` int NOT NULL,
  `SALARY` int NOT NULL,
  `COMMISSION_PCT` int NOT NULL,
  `MANAGER_ID` int NOT NULL,
  `DEPARTMENT_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PHONE_NUMBER`, `HIRE_DATE`, `JOB_ID`, `SALARY`, `COMMISSION_PCT`, `MANAGER_ID`, `DEPARTMENT_ID`) VALUES
(1, 'Neena', 'Kochhar', 't@gmail.com', '515.123.4568', '2023-12-01', 2, 17000, 0, 0, 10),
(2, 'Lex', 'De Haan', 'LDEHAAN@gmail.com', '515.123.4569', '1987-06-19', 8, 17000, 0, 0, 90),
(3, 'Alexander', 'Hunold', 'AHUNOLD@gmail.com', '590.423.4567', '1987-06-20', 5, 9000, 0, 2, 60),
(4, 'Bruce', 'Ernst', 'BERNST@gmail.com', '590.423.4568', '1987-06-21', 5, 6000, 0, 3, 60),
(5, 'David', 'Austin', 'DAUSTIN@gmail.com', '590.423.4569', '1987-06-22', 5, 4800, 0, 3, 60),
(6, 'Valli', 'Pataballa', 'VPATABAL@gmail.com', '590.423.4560', '1987-06-23', 5, 4800, 0, 3, 60),
(7, 'Diana', 'Lorentz', 'DLORENTZ@gmail.com', '590.423.5567', '1987-06-24', 5, 4200, 0, 3, 60),
(8, 'Nancy', 'Greenberg', 'NGREENBE@gmail.com', '515.124.4569', '1987-06-25', 9, 12000, 0, 9, 100),
(9, 'Daniel', 'Faviet', 'DFAVIET@gmail.com', '515.124.4169', '1987-06-26', 6, 9000, 0, 8, 100),
(10, 'John', 'Chen', 'JCHEN@gmail.com', '515.124.4269', '1987-06-27', 6, 8200, 0, 8, 100),
(11, 'Ismael', 'Sciarra', 'ISCIARRA@gmail.com', '515.124.4369', '1987-06-28', 6, 7700, 0, 8, 100),
(12, 'Jose Manuel', 'Urman', 'JMURMAN@gmail.com', '515.124.4469', '1987-06-29', 6, 7800, 0, 8, 100),
(13, 'Luis', 'Popp', 'LPOPP@gmail.com', '515.124.4567', '1987-06-30', 6, 6900, 0, 8, 100),
(14, 'Den', 'Raphaely', 'DRAPHEAL@gmail.com', '515.127.4561', '1987-07-01', 3, 11000, 0, -1, 30),
(15, 'Alexander', 'Khoo', 'AKHOO@gmail.com', '515.127.4562', '1987-07-02', 7, 3100, 0, 14, 30),
(16, 'Shelli', 'Baida', 'SBAIDA@gmail.com', '515.127.4563', '1987-07-03', 7, 2900, 0, 14, 30),
(17, 'Sigal', 'Tobias', 'STOBIAS@gmail.com', '515.127.4564', '1987-07-04', 7, 2800, 0, 14, 30),
(18, 'Guy', 'Himuro', 'GHIMURO@gmail.com', '515.127.4565', '1987-07-05', 7, 2600, 0, 14, 30),
(19, 'Karen', 'Colmenares', 'KCOLMENA@gmail.com', '515.127.4566', '1987-07-06', 7, 2500, 0, 14, 30),
(20, 'Matthew', 'Weiss', 'MWEISS@gmail.com', '650.123.1234', '1987-07-07', 3, 8000, 0, -1, 50),
(21, 'Adam', 'Fripp', 'AFRIPP@gmail.com', '650.123.2234', '1987-07-08', 3, 8200, 0, 20, 50),
(22, 'Payam', 'Kaufling', 'PKAUFLIN@gmail.com', '650.123.3234', '1987-07-09', 3, 7900, 0, 20, 50),
(23, 'Shanta', 'Vollman', 'SVOLLMAN@gmail.com', '650.123.4234', '1987-07-10', 3, 6500, 0, 20, 50),
(24, 'Kevin', 'Mourgos', 'KMOURGOS@gmail.com', '650.123.5234', '1987-07-11', 3, 5800, 0, 20, 50),
(26, 'Steven', 'King', 'SKING@gmail.com', '515.123.4567', '1987-06-17', 1, 24000, 0, -1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `JOB_TITLE` varchar(255) NOT NULL,
  `MIN_SALARY` int NOT NULL,
  `MAX_SALARY` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `JOB_TITLE`, `MIN_SALARY`, `MAX_SALARY`) VALUES
(2, 'Public Accountant', 4200, 9000),
(3, 'Accounting Manager', 8200, 16000),
(4, 'Administration Assistant', 3000, 6000),
(5, 'President', 20000, 40000),
(6, 'Administration Vice President', 15000, 30000),
(7, 'Accountant', 4200, 9000),
(8, 'Finance Manager', 8200, 16000),
(9, 'Human Resources Representative', 4000, 9000),
(10, 'Programmer', 4000, 10000),
(11, 'Marketing Manager', 9000, 15000),
(12, 'Marketing Representative', 4000, 9000),
(13, 'Public Relations Representative', 4500, 10500),
(14, 'Purchasing Clerk', 2500, 5500),
(15, 'Purchasing Manager', 8000, 15000),
(16, 'Sales Manager', 10000, 20000),
(17, 'Sales Representative', 6000, 12000),
(18, 'Shipping Clerk', 2500, 5500),
(19, 'Stock Clerk', 2000, 5000),
(20, 'Stock Manager', 5500, 8500);

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `id` int NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `JOB_ID` int NOT NULL,
  `DEPARTMENT_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `STREET_ADDRESS` varchar(255) NOT NULL,
  `POSTAL_CODE` varchar(255) NOT NULL,
  `CITY` varchar(255) NOT NULL,
  `STATE_PROVINCE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `COUNTRY_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `STREET_ADDRESS`, `POSTAL_CODE`, `CITY`, `STATE_PROVINCE`, `COUNTRY_ID`) VALUES
(1, '1297 Via Cola di Rie', '989', 'Roma', NULL, 15),
(2, '93091 Calle della Testa', '10934', 'Venice', NULL, 15),
(3, '2017 Shinjuku-ku', '1689', 'Tokyo', 'Tokyo Prefecture', 16),
(4, '9450 Kamiya-cho', '6823', 'Hiroshima', NULL, 16),
(5, '2014 Jabberwocky Rd', '26192', 'Southlake', 'Texas', 23),
(6, '2011 Interiors Blvd', '99236', 'South San Francisco', 'California', 23),
(7, '2007 Zagora St', '50090', 'South Brunswick', 'New Jersey', 23),
(8, '2004 Charade Rd', '98199', 'Seattle', 'Washington', 23),
(9, '147 Spadina Ave', 'M5V-2L7', 'Toronto', 'Ontario', 5),
(10, '6092 Boxwood St', 'YSW-9T2', 'Whitehorse', 'Yukon', 5),
(11, '40-5-12 Laogianggen', '190518', 'Beijing', NULL, 7),
(12, '1298 Vileparle (E)', '490231', 'Bombay', 'Maharashtra', 14),
(13, '12-98 Victoria Street', '2901', 'Sydney', 'New South Wales', 2),
(14, '198 Clementi North', '540198', 'Singapore', NULL, 21),
(15, '8204 Arthur St', 'EC4R9AT', 'London', NULL, 22),
(16, 'Magdalen Centre', 'OX99ZB', 'Oxford', 'Ox', 22),
(17, '9702 Chester Road', '9629850293', 'Stretford', 'Manchester', 22),
(18, 'Schwanthalerstr. 7031', '80925', 'Munich', 'Bavaria', 8),
(19, 'Rua Frei Caneca 1360', '01307-002', 'Sao Paulo', 'Sao Paulo', 4),
(20, '20 Rue des Corps-Saints', '1730', 'Geneva', 'Geneve', 6),
(21, 'Murtenstrasse 921', '3095', 'Bern', 'BE', 6),
(22, 'Pieter Breughelstraat 837', '3029SK', 'Utrecht', 'Utrecht', 20),
(23, 'Mariano Escobedo 9991', '11932', 'Mexico City', 'Distrito Federal', 18);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int NOT NULL,
  `REGIONS_NAMES` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `REGIONS_NAMES`) VALUES
(1, 'Europe'),
(2, 'Americas'),
(3, 'Asia'),
(4, 'Middle East and Africa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
