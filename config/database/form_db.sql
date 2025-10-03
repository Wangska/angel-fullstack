-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `house_no` varchar(10) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `subdivision` varchar(100) DEFAULT NULL,
  `baranggay` varchar(50) DEFAULT NULL,
  `city_municipality` varchar(50) DEFAULT NULL,
  `province_home` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `user_id`, `unit`, `house_no`, `street`, `subdivision`, `baranggay`, `city_municipality`, `province_home`, `country`, `zip`) VALUES
(94, 98, 'Unit 1', 'House 12', 'Main Street', 'Subshine Subdivison', 'Tunghaan', 'Minglanilla', 'Cebu', 'Philippines', '6046'),
(95, 99, 'Unit 2', 'House 12', 'Main Street', 'Subshine Subdivison', 'Tungkop', 'Minglanilla', 'Cebu', 'Philippines', '6046'),
(96, 100, 'Unit 3', 'Molestias ', 'Blanditiis accusamus', 'Velmiro Subdivision', 'Calajoan', 'Minglanilla', 'Cebu', 'Philippines', '6046'),
(97, 101, 'Unit 4', 'Block 7', 'Hillside', 'Village Modena', 'Linao', 'Minglanilla', 'Cebu', 'Philippines', '6046'),
(98, 102, 'Unit 5', 'House 12', 'Katipunan Street', 'PalmView Subdivision', 'Tungkil', 'Minglanilla', 'Cebu', 'Philippines', '6046'),
(99, 103, 'Unit 1', 'House 12', 'Main Street', 'East Ridge SUbdivision', 'Lawaan', 'Talisay', 'Cebu', 'Philippines', '6045'),
(100, 104, 'Unit 6', 'House 12', 'Main Street', 'Village Ni', 'Pakigne', 'Minglanilla', 'Cebu', 'Philippines', '6046'),
(101, 105, 'Unit 2', 'House 2', 'Magsaysay', 'Seaside Residence', 'Poblacion', 'Talisay', 'Cebu', 'Philippines', '6045'),
(102, 106, 'Unit 3', 'Molestias ', 'Magallanes Street', 'South Crest Homes', 'Lagtang', 'Talisay', 'Cebu', 'Philippines', '6045'),
(103, 107, 'Unit 4', 'Block 4', 'Bonifacio Street', 'Villa Teresa', 'Tabunok', 'Talisay', 'Cebu', 'Philippines', '6045'),
(104, 108, 'Unit 5', 'Block 5', 'Aguinaldo', 'Mountview', 'Biasong', 'Talisay', 'Cebu', 'Philippines', '6045'),
(105, 109, 'Unit 6', 'House 12', 'Main Street', 'Subshine Subdivison', 'Lipata', 'Talisay', 'Cebu', 'Philippines', '6045'),
(106, 110, 'Unit 1', 'House 12', 'Main Street', 'Subshine Subdivison', 'Poblacion', 'Naga', 'Cebu', 'Philippines', '6037'),
(107, 111, 'Unit 2', 'Consectetu', 'Neque fugiat quas m', 'Qui Nam voluptas inc', 'Langtad', 'Naga', 'Cebu', 'Philippines', '6037'),
(108, 112, 'Unit 3', 'House 12', 'Main Street', 'Minima numquam et om', 'Tinaan', 'Naga', 'Cebu', 'Philippines', '6037'),
(109, 113, 'Unit 4', 'House 12', 'Main Street', 'Subshine Subdivison', 'Inayagan', 'Naga', 'Cebu', 'Philippines', '6037'),
(110, 114, 'Unit 5', 'House 5', 'Main Street', 'Velmiro Subdivision', 'Uling', 'Naga', 'Cebu', 'Philippines', '6037'),
(111, 115, 'Unit 6', 'House 12', 'Aguinaldo', 'Subshine Subdivison', 'Lutac', 'Naga', 'Cebu', 'Philippines', '6037'),
(112, 116, 'Unit 1', 'House 1 Ca', 'Mabini Street', 'Subshine Subdivison', 'Perrelos', 'Carcar', 'Cebu', 'Philippines', '6019'),
(113, 117, 'Unit 2', 'House 12', 'Bonifacio Street', 'Subshine Subdivison', 'Poblacion', 'Carcar', 'Cebu', 'Philippines', '6019'),
(114, 118, 'Unit 3', 'Blcok 1333', 'Aguinaldo Street', 'Village Modena', 'Bolinawan', 'CarCar', 'Cebu', 'Philippines', '6019'),
(115, 119, 'Unit 4', 'House 12', 'Magllanes', 'Velmiro Subdivision', 'Valladolid', 'Carcar', 'Cebu', 'Philippines', '6019'),
(116, 120, 'Unit 5', 'House 12', 'Main Street', 'PalmView Subdivision', 'Canasujan', 'CarCar', 'Cebu', 'Philippines', '6019'),
(117, 121, 'Unit 6', 'House 12', 'Lopez Street', 'Subshine Subdivison', 'Liburon', 'Carcar', 'Cebu', 'Philippines', '6019'),
(118, 122, 'Unit 1', 'House 1', 'Mabin', 'Subshine Subdivison', 'Suba', 'Danao', 'Cebu', 'Philippines', '6004'),
(119, 123, 'Unit 2', 'House 2', 'Katipunan Street', 'Minima numquam et om', 'Suba', 'Danao', 'Cebu', 'Philippines', '6004'),
(120, 124, 'Unit 3', 'House 12', 'Estaca Street', 'Subshine Subdivison', 'Poblacion', 'Danao', 'Cebu', 'Philippines', '6004'),
(121, 125, 'Unit 4', 'House 12', 'Magallanes Street', 'Village Modena', 'Guinsay', 'Danao', 'Cebu', 'Philippines', '6004'),
(122, 126, 'Unit 5', 'House 12', 'Janasa Steet', 'Minima numquam et om', 'Sabang', 'Danao', 'Cebu', 'Philippines', '6004'),
(123, 127, 'Unit 6', 'House 12', 'San Pedro', 'Subshine Subdivison', 'Taboc', 'Danao', 'Cebu', 'Philippines', '6004'),
(124, 128, 'Unit 1', 'House 12', 'Main Street', 'Subshine Subdivison', 'Poblacion', 'Toledo', 'Cebu', 'Philippines', '6038'),
(125, 129, 'Unit 2', 'House 2', 'Street Main', 'Subshine Subdivison', 'Poog', 'Toledo', 'Cebu', 'Philippines', '6038'),
(126, 130, 'Unit 3', 'House 3', 'Third Street', 'Subshine Subdivison', 'DAS', 'Toledo', 'Cebu', 'Philippines', '6038'),
(127, 131, 'Unit 4', 'House 12', 'Fourth Street', 'Subshine Subdivison', 'Bato', 'Toledo', 'Cebu', 'Philippines', '6038'),
(128, 132, 'Unit 5', 'House 12', 'Firfth  Street', 'Velmiro Subdivision', 'Ibo', 'Toledo', 'Cebu', 'Philippines', '6038'),
(129, 133, 'Unit 6', 'House 6', 'Sixth Street', 'Minima numquam et om', 'Media', 'Toledo', 'Cebu', 'Philippines', '6038');

-- --------------------------------------------------------

--
-- Table structure for table `birth_place`
--

CREATE TABLE `birth_place` (
  `birth_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `b_unit` varchar(100) NOT NULL,
  `b_house` varchar(255) NOT NULL,
  `b_street` varchar(100) NOT NULL,
  `b_subdivision` varchar(100) NOT NULL,
  `b_baranggay` varchar(100) NOT NULL,
  `b_country` varchar(100) NOT NULL,
  `b_zip` int(50) NOT NULL,
  `municipality_birth` varchar(100) NOT NULL,
  `province_birth` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birth_place`
--

INSERT INTO `birth_place` (`birth_id`, `user_id`, `b_unit`, `b_house`, `b_street`, `b_subdivision`, `b_baranggay`, `b_country`, `b_zip`, `municipality_birth`, `province_birth`) VALUES
(75, 98, 'Unit 3', 'Block 5', 'Rizal Street', 'Green Meadows Subdivision', 'Tunghaan', 'Philippines', 6046, 'Minglanilla', 'Cebu'),
(76, 99, 'Unit 3', 'Block 5', 'Purok Bolinao', 'Sunrise Meadows Subdivision', 'Tungkop', 'Philippines', 6046, 'Minglanilla', 'Cebu'),
(77, 100, 'Unit 12', 'House 2', 'Colon Street', 'Velmiro', 'Calajoan', 'Philippines', 6046, 'Minglanilla', 'Cebu'),
(78, 101, 'Quo ut magni excepte', 'Et eligendi dolore s', 'Aliquip rerum illo p', 'Iure velit ut qui s', 'Dolor ducimus perfe', 'Botswana', 18590, 'Voluptas sunt in in', 'Quaerat obcaecati si'),
(79, 102, 'Et rem libero totam', 'Incididunt et qui qu', 'Consequatur Laborum', 'Maxime doloribus rat', 'Aliquam adipisicing', 'United States', 96155, 'Velit aut harum cum', 'Nesciunt fugit mag'),
(80, 103, 'Aspernatur sint et v', 'Fugiat obcaecati te', 'Voluptas sint quia a', 'Ut quia ipsam quam s', 'Enim quos ut similiq', 'South Korea', 43652, 'Veniam eum sed esse', 'Dolor aute sint sus'),
(81, 104, 'Dolores laboris prae', 'Dicta repellendus A', 'Non eum quis perspic', 'Sequi voluptate quia', 'Amet pariatur In n', 'Bosnia and Herzegovina', 16956, 'Praesentium providen', 'Proident incidunt'),
(82, 105, 'Autem ullam eveniet', 'Reprehenderit nostr', 'Magna ut qui debitis', 'Exercitation laborum', 'Sapiente magni neces', 'Maldives', 62313, 'Molestiae aut quo an', 'Incididunt odit dolo'),
(83, 106, 'Soluta reprehenderit', 'Est dolor qui culpa', 'Assumenda voluptatib', 'Rerum ut velit amet', 'Est nihil pariatur', 'Lithuania', 45001, 'Quia incidunt velit', 'Cum suscipit sunt mi'),
(84, 107, 'Nam mollitia rerum i', 'Voluptas quidem blan', 'Cum iste et ipsum qu', 'Vero adipisci sequi', 'Similique dolor et h', 'Brazil', 23890, 'Eum fugit labore iu', 'Voluptatem soluta q'),
(85, 108, 'Lorem ut veritatis t', 'Aut nihil et et anim', 'Saepe ad facilis ut', 'Amet laboris omnis', 'Doloribus incidunt', 'Indonesia', 82894, 'Eaque architecto mol', 'Et repellendus Mole'),
(86, 109, 'Voluptatem possimus', 'Nemo assumenda et il', 'Est qui quas qui pr', 'Aut iusto occaecat m', 'Corrupti voluptas a', 'Chile', 97218, 'Quo dolore autem com', 'Ratione praesentium'),
(87, 110, 'Unit 1', 'House 1', 'Rizal Street', 'Baywalk Residence', 'Poblacion', 'Philippines', 6037, 'Naga', 'Cebu'),
(88, 111, 'Nam elit esse quis', 'Nam sed sed dolore v', 'Magsaysayn', 'Dolores minus consec', 'Langtad', 'Albania', 6037, 'Naga', 'Earum tempor nisi vi'),
(89, 112, 'Unit 3', 'House 3', 'Kaipunan', 'Distinctio Voluptat', 'Tinaan', 'Philippines', 6037, 'Naga', 'Cebu'),
(90, 113, 'Unit 4', 'Block 4', 'Bonifacio', 'Velmiro', 'Inayagan', 'Philippines', 6037, 'Naga', 'Cebu'),
(91, 114, 'Unit 5', 'Neque fas', 'Magsaysayn', 'Sunrise Meadows Subdivision', 'Uling', 'Philippines', 6037, 'Naga', 'Cebu'),
(92, 115, 'Unit 6', 'House 6', 'Aguinaldo', 'Green Meadows Subdivision', 'Lutac', 'Philippines', 6037, 'Naga', 'Cebu'),
(93, 116, 'Unit 1', 'Block 1111', 'Mabini Street', 'Heritage Homes', 'Poblacion', 'Philippines', 6019, 'Carcar', 'Cebu'),
(94, 117, 'Unit 2', 'Block 222', 'Boifcaio', 'Palm BEach', 'Poblacion', 'Philippines', 6019, 'Carcar', 'Cebu'),
(95, 118, 'Unit 3', 'Block 333', 'Aguinaldo', 'Villa San Pedto', 'Bolinawan', 'Philippines', 6019, 'CarCar', 'Cebu'),
(96, 119, 'Unit 4', 'Neque fas', 'Magsaysayn', 'Green Meadows Subdivision', 'Valladolid', 'Philippines', 6019, 'Carcar', 'Cebu'),
(97, 120, 'Unit 5', 'House 2', 'Rizal', 'Green Meadows Subdivision', 'Canasujan', 'Philippines', 6019, 'CarCar', 'Cebu'),
(98, 121, 'Unit 6', 'Neque fas', 'Lopez Street', 'Baywalk Residence', 'Liburon', 'Philippines', 6019, 'Carcar', 'Cebu'),
(99, 122, 'Unit 1', 'House 1', 'Mabini Street', 'Sunrise Meadows Subdivision', 'Suba', 'Philippines', 6004, 'Danao', 'Cebu'),
(100, 123, 'Unit 2', 'Block 2', 'Kayipunan', 'Green Meadows Subdivision', 'Taytay', 'Philippines', 6004, 'Danao', 'Cebu'),
(101, 124, 'Unit 3', 'Block 5', 'Estaca Street', 'Green Meadows Subdivision', 'Poblacion', 'Philippines', 6004, 'Danao', 'Cebu'),
(102, 125, 'Unit 4', 'Mollitia neque ullam', 'Magallanes Street', 'Ea et aut debitis co', 'Guinsay', 'Philippines', 6004, 'Danao', 'Cebu'),
(103, 126, 'Unit 5', 'Block 5', 'Jaenat Street', 'Baywalk Residence', 'Sabang', 'Philippines', 6004, 'Danao', 'Cebu'),
(104, 127, 'Unit 6', 'House 6', 'San Pedro', 'Seaview Homes', 'Taboc', 'Philippines', 6004, 'Danao', 'Cebu'),
(105, 128, 'Unit 1', 'Block 1', 'Steet Ni', 'Green Meadows Subdivision', 'Poblacion', 'Philippines', 6038, 'Toledo', 'Cebu'),
(106, 129, 'Unit 2', 'House 2', 'Street Main', 'Green Meadows Subdivision', 'Poog', 'Philippines', 6038, 'Toledo', 'Cebu'),
(107, 130, 'Unit 3', 'Block 5', 'Magsayasan', 'Baywalk Residence', 'DAS', 'Philippines', 6038, 'Toledo', 'Cebu'),
(108, 131, 'Unit 4', 'Block 4', 'Fourth Street', 'Sunrise Meadows Subdivision', 'Bato', 'Philippines', 6038, 'Toledo', 'Cebu'),
(109, 132, 'Unit 5', 'Block 5', 'Fifth Strreet', 'Seaview Homes', 'Ibo', 'Philippines', 6038, 'Toledo', 'Cebu'),
(110, 133, 'Unit 6', 'House 6', 'Sixth Street', 'Green Meadows Subdivision', 'Media Once', 'Philippines', 6038, 'Toledo', 'Cebu');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `user_id`, `mobile`, `email`, `telephone`) VALUES
(87, 98, '0995012312', 'qifo@mailinator.com', '+1 (204) 173-4125'),
(88, 99, '0995012312', 'vehyrunize@mailinator.com', '+1 (755) 459-8656'),
(89, 100, '0995012312', 'nefu@mailinator.com', '+1 (359) 142-2834'),
(90, 101, '0995012312', 'loxonal@mailinator.com', '+1 (627) 732-5623'),
(91, 102, '0995012312', 'vonasebo@mailinator.com', '+1 (594) 856-7911'),
(92, 103, '0995012312', 'reze@mailinator.com', '+1 (977) 154-3686'),
(93, 104, '0995012312', 'madad@mailinator.com', '+1 (133) 119-9605'),
(94, 105, '0995012312', 'qilosowaza@mailinator.com', '+1 (756) 224-9924'),
(95, 106, '0995012312', 'kasymihob@mailinator.com', '+1 (495) 279-3555'),
(96, 107, '0995012312', 'bebalyt@mailinator.com', '+1 (134) 691-2232'),
(97, 108, '0995012312', 'zerusa@mailinator.com', '+1 (494) 903-3923'),
(98, 109, '0995012312', 'wutavy@mailinator.com', '+1 (764) 154-9951'),
(99, 110, '0995012312', 'bowuwahuke@mailinator.com', '+1 (768) 974-1641'),
(100, 111, '0995012312', 'goxamobyj@mailinator.com', '+1 (592) 934-7676'),
(101, 112, '0995012312', 'qagon@mailinator.com', '+1 (678) 484-5646'),
(102, 113, '0995012312', 'cyzu@mailinator.com', '+1 (774) 391-2016'),
(103, 114, '0995012312', 'kosydujyt@mailinator.com', '+1 (754) 254-5722'),
(104, 115, '0995012312', 'bibadijepy@mailinator.com', '+1 (966) 736-6461'),
(105, 116, '0995012312', 'lewad@mailinator.com', '+1 (311) 163-6644'),
(106, 117, '0995012312', 'mudyhyci@mailinator.com', '+1 (352) 138-3331'),
(107, 118, '0995012312', 'hakolynib@mailinator.com', '+1 (646) 486-1179'),
(108, 119, '0995012312', 'fyjy@mailinator.com', '+1 (843) 669-4412'),
(109, 120, '0995012312', 'bixuqa@mailinator.com', '+1 (111) 106-1194'),
(110, 121, '0995012312', 'qifypifu@mailinator.com', '+1 (662) 657-6634'),
(111, 122, '0995012312', 'sazofa@mailinator.com', '+1 (213) 316-5575'),
(112, 123, '0995012312', 'sibewixuc@mailinator.com', '+1 (607) 825-1926'),
(113, 124, '0995012312', 'hyhuz@mailinator.com', '+1 (992) 162-6362'),
(114, 125, '0995012312', 'papyzyn@mailinator.com', '+1 (828) 951-3226'),
(115, 126, '0995012312', 'netirahasu@mailinator.com', '+1 (876) 915-9967'),
(116, 127, '0995012312', 'hehegasyve@mailinator.com', '+1 (662) 364-9261'),
(117, 128, '0995012312', 'qewej@mailinator.com', '+1 (923) 664-3165'),
(118, 129, '0995012312', 'joneha@mailinator.com', '+1 (253) 517-8516'),
(119, 130, '0995012312', 'ragodaxav@mailinator.com', '+1 (922) 334-6984'),
(120, 131, '0995012312', 'bapuw@mailinator.com', '+1 (621) 284-8521'),
(121, 132, '0995012312', 'colarywyk@mailinator.com', '+1 (402) 897-5916'),
(122, 133, '0995012312', 'ropyxeb@mailinator.com', '+1 (559) 812-9567');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `father_lastname` varchar(50) NOT NULL,
  `father_firstname` varchar(50) NOT NULL,
  `father_middleinitial` varchar(10) DEFAULT NULL,
  `mother_lastname` varchar(50) NOT NULL,
  `mother_firstname` varchar(50) NOT NULL,
  `mother_middleinitial` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `user_id`, `father_lastname`, `father_firstname`, `father_middleinitial`, `mother_lastname`, `mother_firstname`, `mother_middleinitial`) VALUES
(70, 98, 'Sharpe', 'Stacey', 'Non tempor', 'Frazier', 'Indigo', 'Perferendi'),
(71, 99, 'Mccarthy', 'Montana', 'Soluta aut', 'Byers', 'Derek', 'Sit et est'),
(72, 100, 'Duncan', 'Ori', 'Rem nihil ', 'Hancock', 'Giselle', 'Cupiditate'),
(73, 101, 'Woodard', 'Alexandra', 'Qui laboru', 'Kim', 'Paloma', 'Eum conseq'),
(74, 102, 'Snyder', 'Hermione', 'Libero sap', 'Ware', 'Bo', 'In dicta r'),
(75, 103, 'Juarez', 'Leigh', 'Quas ullam', 'Weeks', 'Laith', 'Sed aliqui'),
(76, 104, 'Whitfield', 'Wilma', 'Et quaerat', 'Lang', 'Arden', 'Commodi ob'),
(77, 105, 'Abbott', 'Sylvia', 'Tempor tem', 'Padilla', 'Tatiana', 'Aut recusa'),
(78, 106, 'Fletcher', 'Barry', 'Voluptatem', 'Perez', 'Dennis', 'Qui alias '),
(79, 107, 'Ewing', 'Jeremy', 'Recusandae', 'Anderson', 'Lilah', 'Ad duis do'),
(80, 108, 'Blevins', 'Tanisha', 'Laudantium', 'Farmer', 'Rinah', 'Provident '),
(81, 109, 'Britt', 'Martin', 'Ullam anim', 'Bennett', 'Barclay', 'Hic conseq'),
(82, 110, 'Bowers', 'Ocean', 'Sit non qu', 'Morton', 'Cassandra', 'Magnam fug'),
(83, 111, 'Burnett', 'Doris', 'Eligendi o', 'Carpenter', 'Ainsley', 'Error nost'),
(84, 112, 'Sears', 'Rhea', 'Incididunt', 'Bass', 'Calvin', 'Iste lorem'),
(85, 113, 'Gordon', 'Brynne', 'Fugit sit ', 'Camacho', 'Blythe', 'Dolore lab'),
(86, 114, 'Molina', 'Daria', 'Cumque opt', 'Walters', 'Brendan', 'Fuga Imped'),
(87, 115, 'Vinson', 'Dylan', 'Earum nost', 'Henson', 'Chelsea', 'Ut vero op'),
(88, 116, 'Snider', 'Ivana', 'Mollit sin', 'Potts', 'Chancellor', 'Sint elige'),
(89, 117, 'Palmer', 'Tara', 'Facere id ', 'Cole', 'Ainsley', 'Officiis t'),
(90, 118, 'Herring', 'Ignatius', 'Id labore ', 'Stanton', 'Keith', 'Fuga Et cu'),
(91, 119, 'White', 'Kirby', 'Expedita d', 'Hobbs', 'Dean', 'Officia te'),
(92, 120, 'Cherry', 'Ariana', 'Ad et iure', 'Waller', 'Kevyn', 'Et omnis d'),
(93, 121, 'Sloan', 'Serena', 'Est provid', 'Sims', 'Jelani', 'Consequatu'),
(94, 122, 'Dickerson', 'Scott', 'Adipisci e', 'Brewer', 'Abbot', 'Sunt et li'),
(95, 123, 'Dunn', 'Keefe', 'Ratione qu', 'Cooper', 'Simon', 'Ab maxime '),
(96, 124, 'Sloan', 'Clinton', 'Minim cons', 'English', 'Dolan', 'Temporibus'),
(97, 125, 'Farrell', 'Vance', 'Repellendu', 'Chase', 'Kimberly', 'Voluptate '),
(98, 126, 'Meadows', 'Avye', 'Enim ipsa ', 'Kinney', 'Iola', 'Do expedit'),
(99, 127, 'Parrish', 'Octavius', 'Aute persp', 'Bruce', 'Lani', 'Voluptatem'),
(100, 128, 'Mosley', 'Jana', 'Aut quo fu', 'Cabrera', 'Sandra', 'Adipisicin'),
(101, 129, 'Irwin', 'Ira', 'Eius accus', 'Drake', 'Quyn', 'Ut dolore '),
(102, 130, 'Gill', 'Lara', 'Non ut ass', 'Burt', 'Jana', 'Eligendi s'),
(103, 131, 'Wilkinson', 'Caryn', 'Dolore cor', 'Barry', 'Tiger', 'Eos eiusmo'),
(104, 132, 'Jennings', 'Harding', 'Sint facer', 'Bowman', 'Sybill', 'Velit maio'),
(105, 133, 'Montgomery', 'Maris', 'Sit incidu', 'Workman', 'Kirestin', 'Quibusdam ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middle` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(50) NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `other_status` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `middle`, `dob`, `age`, `sex`, `civil_status`, `other_status`, `tax`, `nationality`, `religion`, `status`) VALUES
(98, 'Bevis', 'Powell', 'S', '1987-02-27', 38, 'Male', 'Widowed', '', '123-45-4762', 'Magnam tempora eos', 'Nostrud deleniti qui', 'Active'),
(99, 'Louis', 'Yang', 'C', '1970-06-26', 54, 'Male', 'Married', '', '123-45-4762', 'Sed ea cillum blandi', 'Iste est fugiat porr', 'Active'),
(100, 'Orson', 'Mccullough', 'A', '1970-08-25', 54, 'Male', 'Single', '', '123-45-4762', 'Aut est omnis eum te', 'Quia maiores iste re', 'Active'),
(101, 'Priscilla', 'Mccarthy', 'I', '1989-02-18', 36, 'Female', 'Legally Separated', '', '123-45-4762', 'Vel qui ipsum aliqua', 'Et facere dolorem co', 'Active'),
(102, 'Veda', 'Key', 'P', '1977-06-12', 47, 'Female', 'Single', '', '123-45-4762', 'Eaque labore iste vi', 'Facere repudiandae r', 'Active'),
(103, 'Raymond', 'Snyder', 'I', '1995-03-15', 30, 'Female', 'Legally Separated', '', '123-45-4762', 'Ad autem qui quia eu', 'Suscipit commodo num', 'Active'),
(104, 'Nathaniel', 'Tyler', 'Q', '1975-10-17', 49, 'Male', 'Legally Separated', '', '123-45-4762', 'Quaerat pariatur Ni', 'Quo commodo assumend', 'Active'),
(105, 'Sigourney', 'Alexander', 'Q', '1982-08-16', 42, 'Male', 'Single', 'Complicated', '123-45-4762', 'Nobis dolor possimus', 'Qui fugiat ut est', 'Active'),
(106, 'Tashya', 'Thomas', 'A', '1996-08-13', 28, 'Male', 'Widowed', '', '123-45-4764', 'Proident minim veli', 'Soluta quae at dolor', 'Active'),
(107, 'Conan', 'Vazquez', 'D', '1973-10-06', 51, 'Female', 'Legally Separated', '', '123-45-4762', 'Voluptates anim quas', 'Pariatur Nemo sed l', 'Active'),
(108, 'Claudia', 'Waters', 'A', '1988-01-02', 37, 'Male', 'Single', '', '123-45-4762', 'Velit commodi sunt l', 'Minus ab fugiat nis', 'Active'),
(109, 'Ora', 'Brewer', 'I', '1999-06-14', 25, 'Male', 'Legally Separated', '', '123-45-4762', 'Et nemo aut cum inci', 'Totam blanditiis sol', 'Active'),
(110, 'Kerry', 'Benjamin', 'E', '2002-04-21', 22, 'Female', 'Single', '', '123-45-4762', 'Id id temporibus dig', 'Tempora tenetur nequ', 'Active'),
(111, 'Bertha', 'Anderson', 'S', '1972-09-03', 52, 'Male', 'Single', '', '123-45-4762', 'Rerum quasi ut id se', 'Aperiam reprehenderi', 'Active'),
(112, 'Eliana', 'Barlow', 'L', '1983-05-03', 41, 'Male', 'Married', '', '123-45-4762', 'Et est ipsam earum q', 'Perferendis aut in a', 'Active'),
(113, 'Ocean', 'Pena', 'Q', '1997-04-25', 27, 'Female', 'Legally Separated', '', '123-45-4762', 'Quibusdam quisquam e', 'Qui excepteur volupt', 'Active'),
(114, 'Lacy', 'Meyer', 'Q', '1979-12-25', 45, 'Male', 'Married', '', '123-45-4762', 'Et alias eos quaera', 'Eum nulla temporibus', 'Active'),
(115, 'Rama', 'Rutledge', 'V', '1987-08-18', 37, 'Female', 'Married', '', '123-45-4762', 'Aliquid ad voluptatu', 'Provident dolor mol', 'Active'),
(116, 'Carly', 'Estrada', 'N', '1994-02-12', 31, 'Male', 'Legally Separated', '', '123-45-4762', 'Mollit sapiente enim', 'Occaecat esse ea en', 'Active'),
(117, 'Amela', 'Haynes', 'S', '1985-12-16', 39, 'Male', 'Widowed', '', '123-45-4762', 'Aute cumque dolor su', 'Id quae nostrud amet', 'Active'),
(118, 'Cameran', 'Page', 'D', '1994-07-29', 30, 'Male', 'Single', '', '123-45-4769', 'Aliquip unde nobis l', 'Mollitia ut aut solu', 'Active'),
(119, 'Sylvia', 'Weeks', 'Q', '1999-01-23', 26, 'Female', 'Widowed', '', '123-45-4762', 'Doloremque et consec', 'Voluptate ea ea illo', 'Active'),
(120, 'Ashton', 'Fuentes', 'A', '2004-02-25', 21, 'Male', 'Single', 'Complicated', '123-45-4762', 'Ea molestiae in cons', 'Laborum Qui dolore', 'Active'),
(121, 'Eaton', 'Austin', 'E', '1998-10-09', 26, 'Male', 'Married', '', '123-45-4762', 'Ea doloribus sequi a', 'Quibusdam consequatu', 'Active'),
(122, 'Kevyn', 'Young', 'D', '1980-11-23', 44, 'Female', 'Single', '', '123-45-4762', 'Expedita expedita ni', 'Et praesentium fugit', 'Active'),
(123, 'Nichole', 'Wilkinson', 'I', '2002-02-19', 23, 'Female', 'Single', '', '123-45-4762', 'Odit dolore similiqu', 'Aut quo maiores quae', 'Active'),
(124, 'Fiona', 'Dean', 'Q', '1993-04-02', 31, 'Female', 'Single', '', '123-45-4762', 'Reiciendis est vel', 'Qui tenetur ut ut co', 'Active'),
(125, 'Sylvia', 'Elliott', 'A', '1990-02-02', 35, 'Male', 'Married', '', '123-45-4762', 'Cupiditate ut nisi c', 'Est nobis sunt tempo', 'Active'),
(126, 'Kaitlin', 'Reed', 'E', '1977-12-13', 47, 'Female', 'Widowed', '', '123-45-4762', 'Ipsum sed fuga Qui', 'Vitae voluptatem ev', 'Active'),
(127, 'Autumn', 'Perez', 'P', '1990-01-23', 35, 'Male', 'Single', '', '123-45-4762', 'Officiis asperiores', 'Recusandae Cupidata', 'Active'),
(128, 'Benedict', 'Monroe', 'E', '1999-10-11', 25, 'Male', 'Single', '', '123-45-4762', 'Hic et odio beatae e', 'Earum ut velit aper', 'Active'),
(129, 'Lucian', 'Pugh', 'M', '2003-04-02', 21, 'Female', 'Single', '', '123-45-4763', 'Et veritatis nulla e', 'Minus veniam at lab', 'Active'),
(130, 'Mira', 'Oconnor', 'N', '1974-09-30', 50, 'Male', 'Widowed', '', '123-45-4762', 'Tempora deserunt min', 'Quia architecto haru', 'Active'),
(131, 'Shea', 'Harding', 'I', '1996-01-26', 29, 'Female', 'Single', '', '123-45-4762', 'Maxime asperiores ve', 'Fugiat quidem eaque', 'Active'),
(132, 'Drake', 'Weber', 'D', '1982-03-10', 43, 'Female', 'Legally Separated', 'Optio deserunt simi', '123-45-4762', 'Magnam vel sequi dol', 'Sunt lorem laborum', 'Active'),
(133, 'Seth', 'Ellis', 'V', '2001-09-05', 23, 'Female', 'Married', '', '123-45-4762', 'Molestias omnis cupi', 'Et mollitia ut porro', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `birth_place`
--
ALTER TABLE `birth_place`
  ADD PRIMARY KEY (`birth_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `birth_place`
--
ALTER TABLE `birth_place`
  MODIFY `birth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `birth_place`
--
ALTER TABLE `birth_place`
  ADD CONSTRAINT `birth_place_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
