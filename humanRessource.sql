-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 07, 2023 at 06:42 PM
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
(1, 'Argentina', 'AR', 3),
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
(10, 'Administration', 200, 8),
(20, 'Marketing', 201, 9),
(30, 'Purchasing', 114, 8),
(40, 'Human Resources', 203, 15),
(50, 'Shipping', 121, 6),
(60, 'IT', 103, 5),
(70, 'Public Relations', 204, 18),
(80, 'Sales', 145, 16),
(90, 'Executive', 100, 8),
(100, 'Finance', 108, 8),
(110, 'Accounting', 205, 8),
(120, 'Treasury', 0, 8),
(130, 'Corporate Tax', 0, 8),
(140, 'Control And Credit', 0, 8),
(150, 'Shareholder Services', 0, 8),
(160, 'Benefits', 0, 8),
(170, 'Manufacturing', 0, 8),
(180, 'Construction', 0, 8),
(190, 'Contracting', 0, 8),
(200, 'Operations', 0, 8),
(210, 'IT Support', 0, 8),
(220, 'NOC', 0, 8),
(230, 'IT Helpdesk', 0, 8),
(240, 'Government Sales', 0, 8),
(250, 'Retail Sales', 0, 8),
(260, 'Recruiting', 0, 8),
(270, 'Payroll', 0, 8);

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
(100, 'Steven', 'King', 'SKING@gmail.com', '515.123.4567', '1987-06-17', 5, 24000, 0, 0, 90),
(101, 'Neena', 'Kochhar', 'NKOCHHAR@gmail.com', '515.123.4568', '1987-06-18', 6, 17000, 0, 100, 90),
(102, 'Lex', 'De Haan', 'LDEHAAN@gmail.com', '515.123.4569', '1987-06-19', 6, 17000, 0, 100, 90),
(103, 'Alexander', 'Hunold', 'AHUNOLD@gmail.com', '590.423.4567', '1987-06-20', 10, 9000, 0, 102, 60),
(104, 'Bruce', 'Ernst', 'BERNST@gmail.com', '590.423.4568', '1987-06-21', 10, 6000, 0, 103, 60),
(105, 'David', 'Austin', 'DAUSTIN@gmail.com', '590.423.4569', '1987-06-22', 10, 4800, 0, 103, 60),
(106, 'Valli', 'Pataballa', 'VPATABAL@gmail.com', '590.423.4560', '1987-06-23', 10, 4800, 0, 103, 60),
(107, 'Diana', 'Lorentz', 'DLORENTZ@gmail.com', '590.423.5567', '1987-06-24', 10, 4200, 0, 103, 60),
(108, 'Nancy', 'Greenberg', 'NGREENBE@gmail.com', '515.124.4569', '1987-06-25', 8, 12000, 0, 101, 100),
(109, 'Daniel', 'Faviet', 'DFAVIET@gmail.com', '515.124.4169', '1987-06-26', 7, 9000, 0, 108, 100),
(110, 'John', 'Chen', 'JCHEN@gmail.com', '515.124.4269', '1987-06-27', 7, 8200, 0, 108, 100),
(111, 'Ismael', 'Sciarra', 'ISCIARRA@gmail.com', '515.124.4369', '1987-06-28', 7, 7700, 0, 108, 100),
(112, 'Jose Manuel', 'Urman', 'JMURMAN@gmail.com', '515.124.4469', '1987-06-29', 7, 7800, 0, 108, 100),
(113, 'Luis', 'Popp', 'LPOPP@gmail.com', '515.124.4567', '1987-06-30', 7, 6900, 0, 108, 100),
(114, 'Den', 'Raphaely', 'DRAPHEAL@gmail.com', '515.127.4561', '1987-07-01', 15, 11000, 0, 100, 30),
(115, 'Alexander', 'Khoo', 'AKHOO@gmail.com', '515.127.4562', '1987-07-02', 14, 3100, 0, 114, 30),
(116, 'Shelli', 'Baida', 'SBAIDA@gmail.com', '515.127.4563', '1987-07-03', 14, 2900, 0, 114, 30),
(117, 'Sigal', 'Tobias', 'STOBIAS@gmail.com', '515.127.4564', '1987-07-04', 14, 2800, 0, 114, 30),
(118, 'Guy', 'Himuro', 'GHIMURO@gmail.com', '515.127.4565', '1987-07-05', 14, 2600, 0, 114, 30),
(119, 'Karen', 'Colmenares', 'KCOLMENA@gmail.com', '515.127.4566', '1987-07-06', 14, 2500, 0, 114, 30),
(120, 'Matthew', 'Weiss', 'MWEISS@gmail.com', '650.123.1234', '1987-07-07', 20, 8000, 0, 100, 50),
(121, 'Adam', 'Fripp', 'AFRIPP@gmail.com', '650.123.2234', '1987-07-08', 20, 8200, 0, 100, 50),
(122, 'Payam', 'Kaufling', 'PKAUFLIN@gmail.com', '650.123.3234', '1987-07-09', 20, 7900, 0, 100, 50),
(123, 'Shanta', 'Vollman', 'SVOLLMAN@gmail.com', '650.123.4234', '1987-07-10', 20, 6500, 0, 100, 50),
(124, 'Kevin', 'Mourgos', 'KMOURGOS@gmail.com', '650.123.5234', '1987-07-11', 20, 5800, 0, 100, 50),
(125, 'Julia', 'Nayer', 'JNAYER@gmail.com', '650.124.1214', '1987-07-12', 19, 3200, 0, 120, 50),
(126, 'Irene', 'Mikkilineni', 'IMIKKILI@gmail.com', '650.124.1224', '1987-07-13', 19, 2700, 0, 120, 50),
(127, 'James', 'Landry', 'JLANDRY@gmail.com', '650.124.1334', '1987-07-14', 19, 2400, 0, 120, 50),
(128, 'Steven', 'Markle', 'SMARKLE@gmail.com', '650.124.1434', '1987-07-15', 19, 2200, 0, 120, 50),
(129, 'Laura', 'Bissot', 'LBISSOT@gmail.com', '650.124.5234', '1987-07-16', 19, 3300, 0, 121, 50),
(130, 'Mozhe', 'Atkinson', 'MATKINSO@gmail.com', '650.124.6234', '1987-07-17', 19, 2800, 0, 121, 50),
(131, 'James', 'Marlow', 'JAMRLOW@gmail.com', '650.124.7234', '1987-07-18', 19, 2500, 0, 121, 50),
(132, 'TJ', 'Olson', 'TJOLSON@gmail.com', '650.124.8234', '1987-07-19', 19, 2100, 0, 121, 50),
(133, 'Jason', 'Mallin', 'JMALLIN@gmail.com', '650.127.1934', '1987-07-20', 19, 3300, 0, 122, 50),
(134, 'Michael', 'Rogers', 'MROGERS@gmail.com', '650.127.1834', '1987-07-21', 19, 2900, 0, 122, 50),
(135, 'Ki', 'Gee', 'KGEE@gmail.com', '650.127.1734', '1987-07-22', 19, 2400, 0, 122, 50),
(136, 'Hazel', 'Philtanker', 'HPHILTAN@gmail.com', '650.127.1634', '1987-07-23', 19, 2200, 0, 122, 50),
(137, 'Renske', 'Ladwig', 'RLADWIG@gmail.com', '650.121.1234', '1987-07-24', 19, 3600, 0, 123, 50),
(138, 'Stephen', 'Stiles', 'SSTILES@gmail.com', '650.121.2034', '1987-07-25', 19, 3200, 0, 123, 50),
(139, 'John', 'Seo', 'JSEO@gmail.com', '650.121.2019', '1987-07-26', 19, 2700, 0, 123, 50),
(140, 'Joshua', 'Patel', 'JPATEL@gmail.com', '650.121.1834', '1987-07-27', 19, 2500, 0, 123, 50),
(141, 'Trenna', 'Rajs', 'TRAJS@gmail.com', '650.121.8009', '1987-07-28', 19, 3500, 0, 124, 50),
(142, 'Curtis', 'Davies', 'CDAVIES@gmail.com', '650.121.2994', '1987-07-29', 19, 3100, 0, 124, 50),
(143, 'Randall', 'Matos', 'RMATOS@gmail.com', '650.121.2874', '1987-07-30', 19, 2600, 0, 124, 50),
(144, 'Peter', 'Vargas', 'PVARGAS@gmail.com', '650.121.2004', '1987-07-31', 19, 2500, 0, 124, 50),
(145, 'John', 'Russell', 'JRUSSEL@gmail.com', '011.44.1344.429268', '1987-08-01', 16, 14000, 0, 100, 80),
(146, 'Karen', 'Partners', 'KPARTNER@gmail.com', '011.44.1344.467268', '1987-08-02', 16, 13500, 0, 100, 80),
(147, 'Alberto', 'Errazuriz', 'AERRAZUR@gmail.com', '011.44.1344.429278', '1987-08-03', 16, 12000, 0, 100, 80),
(148, 'Gerald', 'Cambrault', 'GCAMBRAU@gmail.com', '011.44.1344.619268', '1987-08-04', 16, 11000, 0, 100, 80),
(149, 'Eleni', 'Zlotkey', 'EZLOTKEY@gmail.com', '011.44.1344.429018', '1987-08-05', 16, 10500, 0, 100, 80),
(150, 'Peter', 'Tucker', 'PTUCKER@gmail.com', '011.44.1344.129268', '1987-08-06', 17, 10000, 0, 145, 80),
(151, 'David', 'Bernstein', 'DBERNSTE@gmail.com', '011.44.1344.345268', '1987-08-07', 17, 9500, 0, 145, 80),
(152, 'Peter', 'Hall', 'PHALL@gmail.com', '011.44.1344.478968', '1987-08-08', 17, 9000, 0, 145, 80),
(153, 'Christopher', 'Olsen', 'COLSEN@gmail.com', '011.44.1344.498718', '1987-08-09', 17, 8000, 0, 145, 80),
(154, 'Nanette', 'Cambrault', 'NCAMBRAU@gmail.com', '011.44.1344.987668', '1987-08-10', 17, 7500, 0, 145, 80),
(155, 'Oliver', 'Tuvault', 'OTUVAULT@gmail.com', '011.44.1344.486508', '1987-08-11', 17, 7000, 0, 145, 80),
(156, 'Janette', 'King', 'JKING@gmail.com', '011.44.1345.429268', '1987-08-12', 17, 10000, 0, 146, 80),
(157, 'Patrick', 'Sully', 'PSULLY@gmail.com', '011.44.1345.929268', '1987-08-13', 17, 9500, 0, 146, 80),
(158, 'Allan', 'McEwen', 'AMCEWEN@gmail.com', '011.44.1345.829268', '1987-08-14', 17, 9000, 0, 146, 80),
(159, 'Lindsey', 'Smith', 'LSMITH@gmail.com', '011.44.1345.729268', '1987-08-15', 17, 8000, 0, 146, 80),
(160, 'Louise', 'Doran', 'LDORAN@gmail.com', '011.44.1345.629268', '1987-08-16', 17, 7500, 0, 146, 80),
(161, 'Sarath', 'Sewall', 'SSEWALL@gmail.com', '011.44.1345.529268', '1987-08-17', 17, 7000, 0, 146, 80),
(162, 'Clara', 'Vishney', 'CVISHNEY@gmail.com', '011.44.1346.129268', '1987-08-18', 17, 10500, 0, 147, 80),
(163, 'Danielle', 'Greene', 'DGREENE@gmail.com', '011.44.1346.229268', '1987-08-19', 17, 9500, 0, 147, 80),
(164, 'Mattea', 'Marvins', 'MMARVINS@gmail.com', '011.44.1346.329268', '1987-08-20', 17, 7200, 0, 147, 80),
(165, 'David', 'Lee', 'DLEE@gmail.com', '011.44.1346.529268', '1987-08-21', 17, 6800, 0, 147, 80),
(166, 'Sundar', 'Ande', 'SANDE@gmail.com', '011.44.1346.629268', '1987-08-22', 17, 6400, 0, 147, 80),
(167, 'Amit', 'Banda', 'ABANDA@gmail.com', '011.44.1346.729268', '1987-08-23', 17, 6200, 0, 147, 80),
(168, 'Lisa', 'Ozer', 'LOZER@gmail.com', '011.44.1343.929268', '1987-08-24', 17, 11500, 0, 148, 80),
(169, 'Harrison', 'Bloom', 'HBLOOM@gmail.com', '011.44.1343.829268', '1987-08-25', 17, 10000, 0, 148, 80),
(170, 'Tayler', 'Fox', 'TFOX@gmail.com', '011.44.1343.729268', '1987-08-26', 17, 9600, 0, 148, 80),
(171, 'William', 'Smith', 'WSMITH@gmail.com', '011.44.1343.629268', '1987-08-27', 17, 7400, 0, 148, 80),
(172, 'Elizabeth', 'Bates', 'EBATES@gmail.com', '011.44.1343.529268', '1987-08-28', 17, 7300, 0, 148, 80),
(173, 'Sundita', 'Kumar', 'SKUMAR@gmail.com', '011.44.1343.329268', '1987-08-29', 17, 6100, 0, 148, 80),
(174, 'Ellen', 'Abel', 'EABEL@gmail.com', '011.44.1644.429267', '1987-08-30', 17, 11000, 0, 149, 80),
(175, 'Alyssa', 'Hutton', 'AHUTTON@gmail.com', '011.44.1644.429266', '1987-08-31', 17, 8800, 0, 149, 80),
(176, 'Jonathon', 'Taylor', 'JTAYLOR@gmail.com', '011.44.1644.429265', '1987-09-01', 17, 8600, 0, 149, 80),
(177, 'Jack', 'Livingston', 'JLIVINGS@gmail.com', '011.44.1644.429264', '1987-09-02', 17, 8400, 0, 149, 80),
(178, 'Kimberely', 'Grant', 'KGRANT@gmail.com', '011.44.1644.429263', '1987-09-03', 17, 7000, 0, 149, 0),
(179, 'Charles', 'Johnson', 'CJOHNSON@gmail.com', '011.44.1644.429262', '1987-09-04', 17, 6200, 0, 149, 80),
(180, 'Winston', 'Taylor', 'WTAYLOR@gmail.com', '650.507.9876', '1987-09-05', 18, 3200, 0, 120, 50),
(181, 'Jean', 'Fleaur', 'JFLEAUR@gmail.com', '650.507.9877', '1987-09-06', 18, 3100, 0, 120, 50),
(182, 'Martha', 'Sullivan', 'MSULLIVA@gmail.com', '650.507.9878', '1987-09-07', 18, 2500, 0, 120, 50),
(183, 'Girard', 'Geoni', 'GGEONI@gmail.com', '650.507.9879', '1987-09-08', 18, 2800, 0, 120, 50),
(184, 'Nandita', 'Sarchand', 'NSARCHAN@gmail.com', '650.509.1876', '1987-09-09', 18, 4200, 0, 121, 50),
(185, 'Alexis', 'Bull', 'ABULL@gmail.com', '650.509.2876', '1987-09-10', 18, 4100, 0, 121, 50),
(186, 'Julia', 'Dellinger', 'JDELLING@gmail.com', '650.509.3876', '1987-09-11', 18, 3400, 0, 121, 50),
(187, 'Anthony', 'Cabrio', 'ACABRIO@gmail.com', '650.509.4876', '1987-09-12', 18, 3000, 0, 121, 50),
(188, 'Kelly', 'Chung', 'KCHUNG@gmail.com', '650.505.1876', '1987-09-13', 18, 3800, 0, 122, 50),
(189, 'Jennifer', 'Dilly', 'JDILLY@gmail.com', '650.505.2876', '1987-09-14', 18, 3600, 0, 122, 50),
(190, 'Timothy', 'Gates', 'TGATES@gmail.com', '650.505.3876', '1987-09-15', 18, 2900, 0, 122, 50),
(191, 'Randall', 'Perkins', 'RPERKINS@gmail.com', '650.505.4876', '1987-09-16', 18, 2500, 0, 122, 50),
(192, 'Sarah', 'Bell', 'SBELL@gmail.com', '650.501.1876', '1987-09-17', 18, 4000, 0, 123, 50),
(193, 'Britney', 'Everett', 'BEVERETT@gmail.com', '650.501.2876', '1987-09-18', 18, 3900, 0, 123, 50),
(194, 'Samuel', 'McCain', 'SMCCAIN@gmail.com', '650.501.3876', '1987-09-19', 18, 3200, 0, 123, 50),
(195, 'Vance', 'Jones', 'VJONES@gmail.com', '650.501.4876', '1987-09-20', 18, 2800, 0, 123, 50),
(196, 'Alana', 'Walsh', 'AWALSH@gmail.com', '650.507.9811', '1987-09-21', 18, 3100, 0, 124, 50),
(197, 'Kevin', 'Feeney', 'KFEENEY@gmail.com', '650.507.9822', '1987-09-22', 18, 3000, 0, 124, 50),
(198, 'Donald', 'OConnell', 'DOCONNEL@gmail.com', '650.507.9833', '1987-09-23', 18, 2600, 0, 124, 50),
(199, 'Douglas', 'Grant', 'DGRANT@gmail.com', '650.507.9844', '1987-09-24', 18, 2600, 0, 124, 50),
(200, 'Jennifer', 'Whalen', 'JWHALEN@gmail.com', '515.123.4444', '1987-09-25', 4, 4400, 0, 101, 10),
(201, 'Michael', 'Hartstein', 'MHARTSTE@gmail.com', '515.123.5555', '1987-09-26', 11, 13000, 0, 100, 20),
(202, 'Pat', 'Fay', 'PFAY@gmail.com', '603.123.6666', '1987-09-27', 12, 6000, 0, 201, 20),
(203, 'Susan', 'Mavris', 'SMAVRIS@gmail.com', '515.123.7777', '1987-09-28', 9, 6500, 0, 101, 40),
(204, 'Hermann', 'Baer', 'HBAER@gmail.com', '515.123.8888', '1987-09-29', 13, 10000, 0, 101, 70),
(205, 'Shelley', 'Higgins', 'SHIGGINS@gmail.com', '515.123.8080', '1987-09-30', 3, 12000, 0, 101, 110),
(206, 'William', 'Gietz', 'WGIETZ@gmail.com', '515.123.8181', '1987-10-01', 2, 8300, 0, 205, 110);

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

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`id`, `START_DATE`, `END_DATE`, `JOB_ID`, `DEPARTMENT_ID`) VALUES
(100, '1989-09-21', '1993-10-27', 2, 110),
(101, '1993-10-28', '1997-03-15', 3, 110),
(102, '1993-01-13', '1998-07-24', 10, 60),
(114, '1998-03-24', '1999-12-31', 19, 50),
(122, '1999-01-01', '1999-12-31', 19, 50),
(176, '1998-03-24', '1998-12-31', 17, 80),
(177, '1999-01-01', '1999-12-31', 16, 80),
(199, '1987-09-17', '1993-06-17', 4, 90),
(200, '1994-07-01', '1998-12-31', 2, 90),
(201, '1996-02-17', '1999-12-19', 12, 20);

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
(1, 'test', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'prof', 'e575eea0c2225232bed67f0451bbede5');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
