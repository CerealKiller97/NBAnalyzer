-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 09:47 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nba-final`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answerID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `questionID` int(11) NOT NULL,
  `suggestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answerID`, `userID`, `timestamp`, `questionID`, `suggestionID`) VALUES
(1, 18, '2018-06-19 09:51:06', 8, 2),
(2, 18, '2018-06-19 09:51:33', 8, 2),
(3, 18, '2018-06-19 09:55:34', 8, 2),
(4, 18, '2018-06-19 09:56:13', 1, 1),
(5, 18, '2018-06-19 10:09:16', 2, 1),
(6, 18, '2018-06-19 10:11:37', 3, 1),
(7, 22, '2018-06-19 15:00:31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `arena`
--

CREATE TABLE `arena` (
  `arenaID` int(11) NOT NULL,
  `arena` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `arena`
--

INSERT INTO `arena` (`arenaID`, `arena`) VALUES
(1, 'Philips Arena'),
(2, 'TD Garden'),
(3, 'Barclays Center'),
(4, 'Spectrum Center'),
(5, 'United Center'),
(6, 'Quicken Loans Arena'),
(7, 'American Airlines Center'),
(8, 'Pepsi Center'),
(9, 'Little Caesars Arena'),
(10, 'Oracle Arena'),
(11, 'Toyota Center'),
(12, 'Bankers Life Fieldhouse'),
(13, 'Staples Center'),
(14, 'FedExForum'),
(16, 'Wisconsin Entertainment and Sports Center'),
(17, 'Target Center'),
(18, 'Smoothie King Center'),
(19, 'Madison Square Garden'),
(20, 'Chesapeake Energy Arena'),
(21, 'Amway Center'),
(22, 'Wells Fargo Center'),
(23, 'Talking Stick Resort Arena'),
(24, 'Moda Center'),
(25, 'Golden 1 Center'),
(26, 'AT&T Center'),
(27, 'Air Canada Centre'),
(28, 'Vivint Smart Home Arena'),
(29, 'Capital One Arena');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coachID` int(11) NOT NULL,
  `fullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coachID`, `fullName`) VALUES
(1, 'Lloyd Pierce'),
(2, 'Brad Stevens'),
(3, 'Kenny Atkinson'),
(4, 'James Borrego'),
(5, 'Fred Hoiberg'),
(6, 'Tyronn Lue'),
(7, 'Rick Carlisle'),
(8, 'Michael Malone'),
(9, 'Dwayne Casey'),
(10, 'Steve Kerr'),
(11, 'Mike D\'Antoni'),
(12, 'Nate McMillan'),
(13, 'Doc Rivers'),
(14, 'Luke Walton'),
(15, 'J. B. Bickerstaff'),
(16, 'Erik Spoelstra'),
(17, 'Mike Budenholzer'),
(18, 'Tom Thibodeau'),
(19, 'Alvin Gentry'),
(20, 'David Fizdale'),
(21, 'Billy Donovan'),
(22, 'Steve Clifford'),
(23, 'Brett Brown'),
(24, 'Igor Kokoškov'),
(25, 'Terry Stotts'),
(26, 'Dave Joerger'),
(27, 'Gregg Popovich'),
(28, 'Nick Nurse'),
(29, 'Quin Snyder'),
(30, 'Scott Brooks');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `body`, `postID`, `userID`, `time`) VALUES
(1, 'Dasdasddasd', 1, 12, '2018-06-12 12:12:11'),
(2, 'Deandre Ayton is mostly going to be #1 overall but I personally think that coach Kokoskov clearly wants Luka.But as yo know in NBA management gives final decision', 1, 16, '2018-06-12 17:47:03'),
(3, 'Nicee', 3, 18, '2018-06-18 21:26:27'),
(4, 'Lonzo is overrated player..', 4, 18, '2018-06-18 22:37:27'),
(5, 'Man that will be awesome if you pair Lillard,Booker and Ayton damnnnn wish that would happen :D ', 15, 16, '2018-06-19 02:31:52'),
(6, 'Awesomee', 15, 18, '2018-06-19 02:57:49'),
(7, 'Covek kidaaaaaa', 9, 18, '2018-06-19 03:49:37'),
(8, 'Covek kidaaaaaa', 9, 18, '2018-06-19 03:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `conferenceID` int(11) NOT NULL,
  `conference` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`conferenceID`, `conference`) VALUES
(1, 'Eastern'),
(2, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `divisionID` int(11) NOT NULL,
  `division` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `conferenceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`divisionID`, `division`, `conferenceID`) VALUES
(1, 'Atlantic', 1),
(2, 'Central', 1),
(3, 'Southeast', 1),
(4, 'Northwest', 2),
(5, 'Pacific', 2),
(6, 'Southwest', 2);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `navigationID` int(11) NOT NULL,
  `page` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`navigationID`, `page`, `href`, `parent`, `level`, `position`) VALUES
(1, 'Home', 'home', 0, 0, 1),
(2, 'Teams', 'teams', 0, 0, 2),
(3, 'News', 'news', 0, 0, 3),
(4, 'Draft 2018', 'draft', 3, 1, 4),
(5, 'Trade', 'trade', 3, 1, 5),
(6, 'Contact', 'contact', 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `playerID` int(11) NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `teamID` int(11) NOT NULL,
  `positionID` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `born` date NOT NULL,
  `age` int(11) NOT NULL,
  `jersey` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`playerID`, `firstName`, `lastName`, `teamID`, `positionID`, `height`, `weight`, `born`, `age`, `jersey`, `img`) VALUES
(1, 'Devin', 'Booker', 26, 2, 198, 95, '1996-10-30', 21, 1, '1626164.png'),
(2, 'Dragan', 'Bender', 26, 4, 216, 102, '1997-11-17', 20, 35, '1627733.png'),
(3, 'Tyson', 'Chandler', 26, 5, 216, 109, '1982-02-10', 35, 4, '2199.png'),
(4, 'Marquese', 'Chriss', 26, 4, 208, 109, '1997-02-07', 20, 0, '1627737.png'),
(5, 'Troy', 'Daniels', 26, 2, 193, 93, '1991-07-15', 26, 30, '203584.png'),
(6, 'Jared', 'Dudley', 26, 4, 201, 109, '1985-10-07', 32, 3, '201162.png'),
(7, 'Danuel', 'House', 26, 3, 201, 100, '1993-07-06', 24, 23, '1627863.png'),
(8, 'Josh', 'Jackson', 26, 3, 203, 90, '1997-10-02', 21, 20, '1628367.png'),
(9, 'Brandon', 'Knight', 26, 1, 190, 89, '1991-02-11', 26, 11, '202688.png'),
(10, 'Alex', 'Len', 26, 5, 216, 113, '1993-06-16', 24, 21, '203458.png'),
(11, 'Elfrid', 'Payton', 26, 1, 193, 84, '1994-02-22', 24, 2, '203901.png'),
(12, 'Alec', 'Peters', 26, 3, 206, 107, '1995-04-13', 23, 25, '1628409.png'),
(13, 'Davon', 'Reed', 26, 2, 198, 95, '1995-06-11', 22, 32, '1628432.png'),
(14, 'Tyler', 'Ulis', 26, 1, 178, 72, '1996-01-05', 22, 8, '1627755.png'),
(15, 'TJ', 'Warren', 26, 3, 203, 98, '1993-09-05', 24, 12, '203933.png'),
(16, 'Alan', 'Williams', 26, 5, 203, 120, '1993-01-23', 25, 15, '1626210.png'),
(17, 'Kent', 'Bazemore', 1, 2, 196, 91, '1989-07-01', 28, 24, '203145.png'),
(18, 'Deandre', 'Bembry', 1, 2, 198, 95, '1994-07-04', 23, 95, '1627761.png'),
(19, 'Tyler', 'Cavanaugh', 1, 4, 206, 108, '1994-02-09', 24, 34, '1628463.png'),
(20, 'Antonius', 'Cleveland', 1, 2, 198, 88, '1994-02-02', 24, 0, '1628499.png'),
(21, 'John', 'Collins', 1, 5, 208, 107, '1997-09-23', 20, 20, '1628381.png'),
(22, 'Dewayne', 'Dedmon', 1, 5, 213, 111, '1989-08-12', 28, 14, '203473.png'),
(23, 'Malcolm', 'Delaney', 1, 1, 190, 86, '1989-03-11', 29, 5, '1627098.png'),
(24, 'Kadeem', 'Allen', 2, 2, 190, 91, '1993-01-15', 25, 45, '1628443.png'),
(25, 'Jabari', 'Bird', 2, 2, 198, 90, '1994-07-03', 23, 26, '1628444.png'),
(26, 'Gordon', 'Hayward', 2, 4, 203, 103, '1990-03-23', 28, 20, '202330.png'),
(27, 'Quincy', 'Acy', 3, 4, 201, 109, '1990-10-06', 27, 13, '203112.png'),
(28, 'Dante', 'Cunningham', 3, 4, 203, 104, '1987-04-22', 31, 44, '201967.png'),
(29, 'Spencer', 'Dinwiddie', 3, 2, 198, 91, '1993-04-06', 25, 8, '203915.png'),
(30, 'Dwayne ', 'Bacon', 4, 4, 201, 100, '1995-08-30', 22, 7, '1628407.png'),
(31, 'Michael', 'Carter-williams', 4, 2, 198, 86, '1991-10-10', 26, 10, '203487.png'),
(32, 'Dwight', 'Howard', 4, 2, 211, 120, '1985-12-08', 32, 12, '2730.png'),
(33, 'Ryan', 'Arcidiacono', 5, 2, 190, 89, '1994-03-26', 24, 15, '1627853.png'),
(34, 'Omer', 'Asik', 5, 2, 213, 116, '1986-07-04', 31, 3, '201600.png'),
(35, 'Kris', 'Dunn', 5, 2, 193, 95, '1994-03-18', 24, 32, '1627739.png'),
(36, 'Jose ', 'Calderon', 6, 2, 190, 91, '1981-09-28', 36, 81, '101181.png'),
(37, 'Jordan', 'Clarkson', 6, 2, 196, 88, '1992-06-07', 26, 8, '203903.png'),
(38, 'Jeff', 'Green', 6, 4, 206, 107, '1986-08-28', 31, 32, '201145.png'),
(39, 'J.J', 'Barea', 16, 2, 183, 84, '1984-06-26', 33, 5, '200826.png'),
(40, 'Harrison', 'Barners', 16, 4, 203, 102, '1992-05-30', 26, 40, '203084.png'),
(41, 'Seth', 'Curry', 16, 2, 188, 84, '1990-08-23', 27, 30, '203552.png'),
(42, 'Darrell', 'Arthur', 17, 4, 206, 107, '1998-03-25', 30, 0, '201589.png'),
(43, 'Malik', 'Beasley', 17, 2, 196, 89, '1996-11-26', 21, 25, '1627736.png'),
(44, 'Wilson', 'Chandler', 17, 4, 206, 102, '1987-05-10', 31, 21, '201163.png'),
(45, 'dwight', 'Buycks', 7, 2, 190, 86, '1989-03-06', 29, 20, '202779.png'),
(46, 'Henry', 'Ellenson', 7, 4, 211, 111, '1997-01-13', 21, 8, '1627740.png'),
(47, 'James', 'Ennis', 7, 4, 201, 95, '1990-07-01', 27, 33, '203516.png'),
(48, 'Chris', 'Boucher', 18, 4, 208, 91, '1993-01-11', 25, 25, '1628449.png'),
(49, 'Stephen', 'Curry', 18, 2, 190, 86, '1988-03-14', 30, 30, '201939.png'),
(50, 'Draymond', 'Green', 18, 4, 201, 104, '1990-03-04', 28, 23, '203110.png'),
(51, 'Ryan', 'Anderson', 19, 4, 208, 109, '1988-05-06', 30, 33, '201583.png'),
(52, 'Markel', 'Brown', 19, 2, 190, 86, '1992-01-29', 26, 26, '203900.png'),
(53, 'James', 'Harden', 19, 2, 196, 100, '1989-08-26', 28, 13, '201935.png'),
(54, 'Trevor', 'Booker', 8, 4, 203, 103, '1987-11-25', 30, 20, '202344.png'),
(55, 'Daren', 'Collinson', 8, 2, 188, 84, '1987-08-23', 30, 2, '201954.png'),
(56, 'Cory', 'Joseph', 8, 2, 190, 86, '1991-08-20', 26, 6, '202709.png'),
(57, 'Patrick', 'Beverley', 20, 2, 185, 84, '1988-07-12', 29, 21, '201976.png'),
(58, 'Avery', 'Bradly', 20, 2, 188, 82, '1990-11-26', 27, 11, '202340.png'),
(59, 'Danilo', 'Gallinari', 20, 4, 208, 102, '1988-08-08', 29, 8, '201568.png'),
(60, 'Lonzo', 'Ball', 21, 2, 198, 86, '1997-10-27', 20, 2, '1628366.png'),
(61, 'Kentavious', 'Caldwell', 21, 2, 196, 93, '1993-02-18', 25, 1, '203484.png'),
(62, 'Tyler', 'Ennis', 21, 2, 190, 88, '1994-08-24', 23, 10, '203898.png'),
(63, 'Mario', 'Charmers', 22, 2, 188, 86, '1986-05-19', 32, 6, '201596.png'),
(64, 'Omari', 'Johnson', 22, 4, 206, 100, '1989-05-26', 29, 14, '204179.png'),
(65, 'Jarell', 'Martin', 22, 4, 208, 108, '1994-05-24', 24, 1, '1626185.png'),
(66, 'Luke', 'Babbitt', 9, 4, 206, 102, '1989-06-20', 28, 22, '202337.png'),
(67, 'Wayne', 'Ellington', 9, 2, 196, 91, '1987-11-29', 30, 2, '201961.png'),
(68, 'James', 'Johnson', 9, 4, 203, 109, '1987-02-20', 31, 16, '201949.png'),
(69, 'Giannis', 'Antetokounmpo', 10, 4, 211, 101, '1994-12-06', 23, 34, '203507.png'),
(70, 'Xavier', 'Munford', 10, 2, 193, 79, '1992-06-01', 26, 0, '204098.png'),
(71, 'jabari', 'Parker', 10, 4, 203, 113, '1995-03-15', 23, 12, '203953.png'),
(72, 'Nemanja', 'Bjelica', 23, 4, 208, 104, '1988-05-09', 30, 8, '202357.png'),
(73, 'Jimmy', 'Butler', 23, 2, 203, 107, '1989-09-14', 28, 23, '202710.png'),
(74, 'Aaron', 'Brooks', 23, 2, 183, 73, '1985-01-14', 33, 30, '201166.png'),
(75, 'Jordan', 'Cravford', 24, 2, 196, 89, '1988-10-23', 29, 27, '202348.png'),
(76, 'Frank', 'Jackson', 24, 2, 190, 93, '1998-05-04', 20, 15, '1628402.png'),
(77, 'Ian', 'Clark', 24, 2, 190, 80, '1991-03-07', 27, 2, '203546.png'),
(78, 'Ron', 'Baker', 11, 2, 193, 100, '1993-03-30', 25, 31, '1627758.png'),
(79, 'Trey', 'Burke', 11, 2, 185, 87, '1992-11-12', 25, 23, '203504.png'),
(80, 'Courtney', 'Lee', 11, 2, 196, 91, '1985-10-03', 32, 5, '201584.png'),
(81, 'Alex', 'Abrines', 25, 2, 198, 86, '1993-08-01', 24, 8, '203518.png'),
(82, 'Carmelo', 'Anthony', 25, 4, 203, 109, '1984-05-29', 34, 7, '2546.png'),
(83, 'Pj', 'Dozier', 25, 2, 198, 93, '1996-10-25', 21, 35, '1628408.png'),
(84, 'Arron', 'Affalo', 12, 2, 196, 95, '1985-10-15', 32, 4, '201167.png'),
(85, 'Jamel', 'Artis', 12, 2, 201, 97, '1993-01-12', 25, 0, '1628503.png'),
(86, 'D.J', 'Augustin', 12, 2, 183, 83, '1987-11-10', 30, 14, '201571.png'),
(87, 'Jerryd', 'Bayless', 13, 2, 190, 91, '1988-08-20', 29, 0, '201573.png'),
(88, 'Robert', 'Covington', 13, 4, 206, 102, '1990-12-14', 27, 33, '203496.png'),
(89, 'Markelle', 'Fultz', 13, 2, 193, 91, '1998-05-29', 20, 20, '1628365.png'),
(90, 'Og', 'Anunoby', 14, 4, 203, 107, '1997-07-17', 20, 3, '1628384.png'),
(91, 'Lorenzo', 'Brown', 14, 2, 196, 86, '1990-08-26', 27, 4, '203485.png'),
(92, 'DeMar', 'Derozan', 14, 2, 201, 100, '1989-08-07', 28, 10, '201942.png'),
(93, 'Bradley', 'Beal', 15, 2, 196, 94, '1993-06-28', 24, 3, '203078.png'),
(94, 'Tim', 'Frazier', 15, 2, 185, 77, '1990-11-01', 27, 8, '204025.png'),
(95, 'Ty', 'Lawson', 15, 2, 180, 89, '1987-11-03', 30, 4, '201951.png'),
(96, 'Al-farouq', 'Aminu', 27, 4, 206, 100, '1990-09-21', 27, 8, '202329.png'),
(97, 'Cj', 'Mccollum', 27, 2, 190, 86, '1991-09-19', 26, 3, '203468.png\r\n'),
(98, 'Maurice ', 'Harkless', 27, 4, 206, 100, '1993-05-11', 25, 4, '203090.png'),
(99, 'Bogdan', 'Bogdanovic', 28, 2, 198, 93, '1992-08-18', 25, 8, '203992.png'),
(100, 'Bruno', 'Caboclo', 28, 4, 206, 93, '1995-09-21', 22, 22, '203998.png'),
(101, 'Justin', 'Jackson', 28, 4, 203, 95, '1995-03-28', 23, 25, '1628382.png'),
(102, 'Lamarcus', 'Aldrigdge', 29, 4, 211, 118, '1985-07-19', 32, 12, '200746.png'),
(103, 'Bryn', 'Forbes', 29, 2, 190, 86, '1993-07-23', 24, 11, '1627854.png\r\n'),
(104, 'Kyle', 'Anderson', 29, 4, 206, 104, '1993-09-20', 24, 1, '203937.png'),
(105, 'Alec', 'Burks', 30, 2, 198, 97, '1991-07-20', 26, 10, '202692.png'),
(106, 'Dante', 'Exum', 30, 2, 198, 86, '1995-07-13', 22, 11, '203957.png'),
(107, 'Jae', 'Crowder', 30, 4, 198, 107, '1990-07-06', 27, 99, '203109.png');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `positionID` int(1) NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positionID`, `position`, `abbreviation`) VALUES
(1, 'Playmaker', 'PG'),
(2, 'Shooting Guard', 'SG'),
(3, 'Small Forward', 'SF'),
(4, 'Power Forward', 'PF'),
(5, 'Center', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `title`, `body`, `img`, `time`, `draft`, `userID`) VALUES
(1, 'Luka Doncic vs. Deandre Ayton is the draft’s great debate', 'We’re just three weeks from the 2018 NBA Draft. The Phoenix Suns are on the clock with the No. 1 pick, and they’re expected to chose between Arizona center Deandre Ayton and Slovenian teen prodigy Luka Doncic.\r\n\r\nThe debate at the top of the draft offers a lens into the type of player teams will value as the NBA game continues to evolve. Ayton is the type of dominant center that would have been a no-brainer top pick for much of the league’s history, but he’s entering the pro game at a time when traditional centers are becoming marginalized, particularly when they struggle on the defensive end.\r\n\r\nDoncic isn’t the type of pure athlete that typically goes No. 1 overall, but his skill level is so advanced and his production is so impressive that he’s turned himself into a worthy candidate.\r\n\r\nWhat will Phoenix do? We’ll know soon enough. \r\n\r\n<h3> 1. Phoenix Suns - Luka Doncic, G, Slovenia </h3>\r\n\r\nWe’ve had Doncic at No. 1 on our board since last June, and we’re not changing it until there’s real confirmation Phoenix is going in another direction. Ayton remains the popular choice in most mocks to go No. 1, but there’s still reason to believe Doncic could be the pick. For one: the Suns made an outside-the-box coaching hire with Igor Kokoskov this summer, who coached Doncic to a gold medal with Slovenia at EuroBasket. Phoenix will be more familiar with Doncic’s game than any other team in the lottery.\r\n</br> </br>\r\nDoncic is also a great fit around Phoenix’s existing roster. He would give the Suns an offensive initiator who could play well off Devin Booker. Doncic’s box score numbers might never look as eye-catching as Ayton’s, but there’s a good argument to made that his all-around game is simply more conducive to helping win games. \r\n\r\n<h3> 2. Sacramento Kings - Deandre Ayton, C, Arizona </h3>\r\n\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/y6j4Mr-Q9tY\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n\r\n</br></br>\r\n\r\nAyton being available at No. 2 is a dream scenario for a Kings team that has been looking for the next face of the franchise since trading DeMarcus Cousins. Like Boogie, Ayton is a supremely gifted 7-footer who can score with his back to the basket or with a face-up jumper while dominating the glass. The defensive concerns with Ayton are real. He simply didn’t show good instincts during his one year at Arizona. That said, his combination of size and explosiveness is as good as any player to come through the draft this decade. He has every physical tool necessary to become a star.', 'assets/posts/post-img-1.png', '2018-06-12 17:44:16', 1, 16),
(3, 'Suns reportedly want to bring in Trae Young for workout', 'The Suns have the No. 1 overall pick in the 2018 NBA Draft, and it seems very likely they\'re going to take Deandre Ayton with that pick. They also have another pick in the first round at No. 16. This gives the Suns a lot of options on how to approach the draft. One of those options is trading their second first-rounder. </br>\r\n\r\nAccording to Jonathan Wasserman of Bleacher Report, Phoenix is trying to bring in Oklahoma guard Trae Young for a workout. Young probably isn\'t going No. 1 overall, but somewhere in the top 10 sounds far more likely. Could the Suns be doing their homework on Young because they\'re looking to move up and add him to their extremely young core? </br> </br>\r\n\r\nYoung and Ayton together, along with Josh Jackson and Devin Booker, would give the Suns a young core to build around. There\'s a lot to be excited about there. They would need to give up a young asset of some kind to move up for Young, but Booker and Jackson are probably as close to untouchable as it gets for the Suns.\r\n\r\nThe question is what are the Suns willing to give up to take Young. Are they hoping to offload a veteran like Tyson Chandler, or will they be willing to move an asset such as Dragan Bender? There\'s also the question of what teams are willing to move back in the draft. The Magic, a common Trae Young destination in mock drafts, could be a possibility. If Orlando isn\'t thrilled with Young then the Magic could take him, make a deal with Phoenix on draft night, and then move back in the draft to make a pick at No. 16 instead.', 'assets/posts/post-img-2.jpg', '2018-06-14 18:26:06', 1, 16),
(4, 'Spurs Have ‘Zero Interest’ In Lonzo Ball For Potential Kawhi Leonard Trade With Lakers', 'Following a report about Kawhi Leonard not wanting to return to the San Antonio Spurs for the 2018-19 NBA season, the offseason has kicked into high gear. As the Los Angeles Lakers are Leonard’s preferred destination, one intriguing scenario involves him, LeBron James and Paul George teaming up. </br> </br>\r\n\r\nWith the Lakers having necessary salary cap space to sign both James and George in free agency, they have previously are said to have informed teams no player is considered untouchable. As a result, the Lakers can put together an attractive trade offer for Leonard. \r\n\r\nor the Spurs, they are in unfamiliar territory as the NBA’s model franchise. While it appeared Leonard had an opportunity to play his entire career for one franchise, a right quadriceps injury that forced him to miss all but nine games created tension and the relationship is deemed irreparable.\r\n</br>\r\nAs for the Lakers, they are in a good position after rebuilding through the NBA Draft. Although they have struck out in free agency in recent years, Leonard now joins George as players who want to play in Los Angeles.\r\n</br>\r\nWhile it would be difficult to part with the team’s young core, president of basketball operations Magic Johnson and general manager Rob Pelinka are looking to end their playoff drought and become a perennial championship contender once again. ', 'assets/posts/Lonzo-Ball-36-640x448.jpg', '2018-06-18 22:19:27', 0, 16),
(5, 'Who could Sixers target in top 5 of 2018 NBA draft?', '\r\nLuka Doncic is one of the most accomplished NBA Draft prospects ever, having led the best non-NBA team in the world to a championship while snatching the league MVP, championship MVP, and dubbing the name “Wonder Boy” by 19 years of age. He’s put up unprecedented numbers in Liga ACB and EuroLeague for someone his age, thriving while playing among full grown adults rather than college kids\r\n\r\n<h1> Luka Doncic, G/F, Real Madrid (6-8/228) </h1>\r\nDoncic would make a ton of sense for the Sixers. The Slovenian wing is known for his elite playmaking ability. He’s an excellent ball handler and has an incredible offensive feel for a player his age. He also played in the second-best league in the world and excelled, taking home MVP of the EuroLeague at just 19 years old. <br> <br>\r\n\r\nThe biggest concerns will be his lack of elite athleticism and a somewhat inconsistent jumper. His lack of athleticism shows on drives to the basket and when he’s asked to guard smaller, quicker players. That could be an issue with the Sixers, who switch on everything. The jumper is there (80 percent free throw shooter as a pro), he just needs to show more consistency with it. <br><br>\r\n\r\nIt’d be interesting to see what Doncic can do with a big man like Embiid and a point guard with Simmons’ vision. Doncic’s ability in the pick-and-roll could be lethal when paired with a player like Embiid. His overall offensive feel should help take some pressure off Simmons as a ball handler. If Markelle Fultz develops into the player the Sixers hoped, there’s no reason to think Doncic can’t play alongside the 2017 No. 1 overall pick. <br><br>\r\n\r\nIt’s also worth noting Doncic’s draft stock has slipped every-so-slightly recently — he was projected to go No. 1 or 2 when the process started — over fears of his ability to adjust to NBA athletes. The Sixers could be gauging to see where he slips and pounce. If I were a betting man — I’m not — my money would be on Doncic as the player they’re targeting. <br><br>\r\n\r\n<h1> Michael Porter Jr., F, Missouri, (6-10/211) </h1>\r\nLike Doncic, Porter Jr. is a bit of an enigma but for a different reason. Porter Jr., considered by many to be the top recruit coming out of high school, suffered a back injury that required a microdiscectomy on his L3-L4 spinal discs. He was only able to play in three games at Missouri and clearly lacked explosiveness.<br><br>\r\n\r\nPorter Jr. may be a better fit than Doncic from a basketball standpoint. Porter Jr. has a smooth shooting stroke, which is his most translatable NBA skill. He’s good both off the dribble and in catch-and-shoot opportunities. He’s also a good cutter and is better at playing off the ball. With his length, quickness and athleticism, he’d fit with what the Sixers do defensively with the ability to guard multiple positions. <br><br>\r\n\r\nWhile his shot should be there at the next level, he still has work to do on the rest of his offensive game. He doesn’t have great vision or feel and his handle will need to tighten up. Defensively, he lacks grit and physicality. He’s a poor rebounder for his size as well. There have also been questions about his maturity and whether he’s a good teammate. <br><br>\r\n\r\nWith news that Porter Jr. had to cancel a pre-draft workout because of hip spasms, the injury history is a little scary. With that said, reports say his medical records are fairly clean. Given the Sixers’ recent history with injured draft picks, they’re kind of uniquely qualified to handle the situation. On the court, he should provide spacing for Embiid and Simmons with pot ential to grow on both ends of the floor. <br><br>\r\n\r\n<h1> Marvin Bagley, F/C, Duke (6-11/234) </h1>\r\nBagley is sort of the dark horse here. Before the college season began, it was either Porter Jr. or Bagley that most considered to be the best player out of high school. Bagley is probably the safest bet of these three players after finishing an outstanding freshman season at Duke, winning ACC Player of the Year with a clean bill of health. He may also be the oddest fit for the Sixers. <br><br>\r\n\r\nBagley is an outstanding athlete with great basketball instincts. He has the potential to have a strong jumper, shooting well from three (40 percent), but with a small sample size (58 attempts). He’s an outstanding rebounder (11.1) and plays hard and aggressively on defense. He excels in the pick and roll. He has a quick first step and has the potential to be a strong driver and finisher at the next level. <br><br>\r\n\r\nBagley’s biggest issue is that he’s kind of a tweener. He lacks the length and girth to play the five and may not be a strong enough shooter to be a modern NBA four. He’s a little too left-hand dependent with his drives and finishes. He’s more a strong team defender than an on-the-ball one. <br><br>\r\n\r\nThe Sixers are already set at center and arguably at the four with Dario Saric coming off a strong sophomore campaign and Jonah Bolden possibly coming from overseas. But Bagley could help in a few different scenarios. If the roster stays as is, Bagley could fight Bolden for minutes as a backup four and five. Saric is also a very attractive trade piece. If he’s moved in any type of deal, Bagley could be his replacement. Although it’s worth noting that if Saric is moved for a veteran piece, the Sixers will likely include the No. 10 pick in that deal and not move up. Bagley seems like the most unrealistic player to move up for, but you never know.<br><br>', 'assets/posts/nba-draft-top-pick-race.jpg', '2018-06-18 22:51:21', 1, 16),
(6, '2018 NBA Draft: Luka Doncic Scouting Report and Highlights', 'It’s not an understatement to call Luka Doncic the most accomplished teenage international prospect ever to make the leap to the NBA. Just 19 years old, he’s fresh off a Euroleague title and Final Four MVP honors with one of the top clubs in the world in Real Madrid. <br> \r\n\r\nLast summer he partnered with countryman Goran Dragic and led Slovenia to a Eurobasket championship, showing out against NBA players along the way. His advanced feel for the game and playmaking skills coupled with his size make him a clear candidate to engineer an offense in an evolving, perimeter-centric NBA. <br>\r\n\r\n<h1>Luka Doncic, G, Real Madrid </h1>\r\n\r\n<p>\r\nHeight: 6\'8\" | Weight: 220 | DOB: 2/28/99 (19)\r\nStats (All competitions): 14.2 PPG, 5.2 RPG, 4.6 APG \r\n</p>\r\n\r\n<h1>Strengths</h1>\r\n\r\nPlus-plus basketball comprehension and floor vision. Feels out plays one or two steps ahead, and tall enough to see over the defense. Great in the pick-and-roll. Almost too intelligent to not succeed. </br> </br>\r\n\r\n• Great size for his position. Similar dimensions to Joe Johnson. Comfortable handling the ball and running a team. Could also move over to the wing and make an impact, but you want the ball in his hands most of the time. <br> </br>\r\n\r\n• Brings a level of versatility as a scorer. Can shoot off the dribble, post up smaller players, attack gaps and get to the basket. Shooting 45% from the floor, which can improve. <br> </br>\r\n\r\n• Reads the ball well off the glass. Likes to grab and go. Will advance the ball with the pass. <br> </br>\r\n\r\n• Production and level of success is unprecedented for his age. Has competed and thrived playing with and against grown men. Will benefit from what is essentially a massive competitive head start over his peers <br> </br>\r\n\r\n<h1>Weaknesses</h1>\r\n\r\n• Athletic ability has come into question. Quick enough off the floor and can elevate for dunks, but relies on his size and change of speeds to get into the paint and finish. Will face an adjustment to the speed of the NBA game. <br> </br>\r\n\r\n• Not an elite creator for himself off the dribble. Relies on using his body to shield the ball and change direction. Quicker defenders can get into him and make him uncomfortable. Can be forced into settling for his jumper in isolation situations. <br> </br>\r\n\r\n• Shooting just 30% from three-point range this season. Ball looks good coming out of his hand – higher degree of difficulty shots may factor in. Stands to benefit from more open, set looks when placed alongside other playmakers. <br> </br>\r\n\r\n• Big and strong enough to stay on the floor defensively, but may have difficulty defending elite athletes on the wing. <br> </br>\r\n\r\n<h1>Highlights</h1>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/lI37S-8T9zs\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n', 'assets/posts/doncic_ben_simmons.jpg', '2018-06-19 00:27:18', 1, 16),
(7, '2018 NBA Draft: Deandre Ayton Scouting Report and Highlights', 'Deandre Ayton showed up at Arizona as a hyped-but-unrefined prospect. He leaves having transformed himself physically and answered many of the questions surrounding his approach to basketball. He began lifting weights for the first time last summer and saw immediate dividends on the court, too big or strong for any college defender to properly handle around the basket and establishing himself as the front-runner for the No. 1 selection in the draft. </br>\r\n\r\nA native of the Bahamas, Ayton has a gregarious personality, boasts a soft shooting touch and an improving feel and skill set. If he puts in the work to become a better defender and rim protector, he should become a franchise cornerstone. </br>\r\n\r\n <h1> Deandre Ayton, C, Arizona | Freshman </h1>\r\n<p>\r\nHeight: 7’1” | Weight: 260 | DOB: 7/23/98 (19)\r\nStats: 20.1 PPG, 11.6 RPG, 1.9 BPG\r\n<p>\r\n\r\n<h1>Strengths</h1>\r\n\r\n• Elite physical specimen. Lean, muscular frame with 7’5” wingspan and 9’3” standing reach, similar to Joel Embiid. Already in the upper echelon of NBA bigs from an athletic standpoint. </br> </br>\r\n\r\n• Nice-looking, projectable jump shot with range. Made 12 of 35 three-pointers and 73% of his free throws. </br> </br>\r\n\r\n• Able to score over either shoulder in the paint or simply overpower opponents for dunks. Learning to use his size and strength to his advantage. Powerful finisher, particularly off a clean gather. </br> </br>\r\n\r\n• Good passer out of double teams. Feels pressure coming and is willing to find open teammates. </br> </br>\r\n \r\n• Excellent rebounder within his area. Size allows him to corral balls other players can’t. Rated 16th nationally in defensive rebound percentage and 40th in offensive rebound percentage. </br> </br>\r\n\r\n• Quick enough feet to have utility defending mobile big men in space and help hedge on ball screens. </br> </br>\r\n\r\n• Responded well to being seriously coached and challenged for the first time at Arizona. When his competitive juices are flowing, he can be extremely difficult to stop.</br> </br>\r\n\r\n<h1>Weaknesses </h1>\r\n\r\n• Mediocre defensive awareness. Misses rotations and occasionally takes plays off entirely. Good but not great shot-blocker who should improve with better positioning. </br> </br>\r\n\r\n• Played out of position at power forward next to a pure center in Dusan Ristic, which may have been a setback in processing help defense and other principles. </br> </br>\r\n\r\n• Prefers to elevate and go get the ball rather than box out his man, which will be harder to get away with in the NBA. </br> </br>\r\n \r\n• Not consistent running the floor. Tends to trail the play and seek spot-up opportunities instead of getting out ahead for easy baskets. </br> </br>\r\n\r\n• Had a reputation for dogging it in high school. Chance remains he reverts to his old ways and doesn’t fulfill his full potential. </br> </br>\r\n\r\n<h1>Highlights</h1>\r\n\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rJ8hEttrFco\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n\r\n', 'assets/posts/deandre-ayton-ftr-jpg_1chdogqm3as0t10ka8w7dvapb6.jpg', '2018-06-19 00:46:00', 1, 16),
(8, '2018 NBA Draft: Jaren Jackson Jr. Scouting Report and Highlights', 'Jaren Jackson Jr. played his way into the draft’s top group of prospects with a freshman season that included some eye-popping moments. Capable of stretching the floor on one end and altering shots on the other, his theoretical versatility at center sets him apart from most every other prospect in the draft. </br>\r\n\r\nJackson comes from basketball bloodlines: his father played in the NBA for a decade, and his mother works for the WNBA Players’ Association. As one of the youngest draft-eligible players, he offers a lot of room for improvement.</br>\r\n\r\n<h1>\r\nJaren Jackson Jr., C, Michigan State | Freshman </h1>\r\n<p>\r\nHeight: 6\'11\" | Weight: 235 | DOB: 9/15/99 (18)\r\nStats: 10.9 PPG, 5.8 RPG, 3.0 BPG\r\n</p>\r\n\r\n<h1>Strengths</h1>\r\n\r\n• Enviable physical tools, having measured with a 7’4” wingspan and 9’1” standing reach. Nimble feet allow him mobility on both sides of the floor. Should be able to pack on muscle. </br></br>\r\n\r\n• Strong rim-protection potential (averaged 4.9 blocks per-36 and his 14.3% block rate was fourth-best nationally). Has the fluidity to defend in space and a feel for timing, making him an ideal defensive prospect for a modern center. </br></br>\r\n\r\n• Shot 39.6% from three, offering potential to grow into a consistent floor-spacing threat. </br></br>\r\n\r\n• Developing offensive skill level. Showed flashes of being able to handle and drive from the perimeter. Has made huge strides dating back to his senior year of high school.</br></br>\r\n\r\n<h1>Weaknesses</h1>\r\n\r\n• Can be pushed around on the interior. Not overly explosive off the gather, which creates issues playing and finishing in traffic. Not a go-to scorer on the block yet. </br></br>\r\n\r\n• Shooting form isn’t ideal. Has a push mechanism were he lets it go in front of his face. Can make jumpers when wide open but could pose some issues when being closely contested. </br></br>\r\n\r\n• Needs to mature both physically and mentally. Gets visibly aggravated at times when the game doesn’t go his way. Battled foul trouble often. </br></br>\r\n\r\n<h1>Highlights</h1>\r\n\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/A7yQ7wmPzC0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'assets/posts/906543166.jpg.0.jpg', '2018-06-19 00:53:31', 1, 16),
(9, '2018 NBA Draft: Marvin Bagley III Scouting Report and Highlights', 'After spending time at three different high schools, Marvin Bagley III reclassified to skip his senior year and attend Duke, where he put together a prolific statistical case as one of the draft’s top prospects and helped the Blue Devils to the Sweet 16. </br>\r\n\r\nKnown for his high-energy game and unusual athleticism, Bagley continues to improve and expand his skills and could become a mismatch problem at the next level. His defensive struggles were somewhat exposed last season, but he remains a prospect with significant upside and room for growth. Bagley is the grandson of former NBA and ABA All-Star Joe Caldwell.</br>\r\n\r\n<h1>Marvin Bagley III, F/C, Duke | Freshman</h1>\r\n<p>\r\nHeight: 6’11” | Weight: 235 | DOB: 3/14/99 (19)\r\nStats: 21.2 PPG, 11.3 RPG, 61.4% FG\r\n</p>\r\n\r\n<h1>Strengths</h1>\r\n\r\n• Terrific athlete. Coordinated. Moves like a wing and can face-up and get by opposing defenders. Strong body and runs the floor for easy baskets. </br></br>\r\n\r\n• Good finisher in traffic. Explosive enough to elevate over defenders and catch lobs. </br></br>\r\n \r\n• Elite offensive rebounder (averaged 4.0 per game). Aggressive in pursuit of the ball off the glass and rarely takes plays off. Quick first and second jump off the ground. </br></br>\r\n\r\n• Skill potential. Has a functional handle and shooting ability at an early stage of his development. Room to grow. </br></br>\r\n\r\n• Athletic enough to defend one-on-one in space. Potential to guard on the perimeter with more experience and coaching.</br></br>\r\n\r\n<h1>Weaknesses</h1>\r\n\r\n• Poor defensive awareness. Has a tendency to ball-watch. His struggles in this area were a big part of Duke’s need to play a 2-3 zone. </br></br>\r\n\r\n\r\n\r\n• Not a rim protector. Averaged less than a block per game. Average wingspan (7’0”) for his height may leave him unable to defend NBA centers.</br></br>\r\n\r\n• Extremely lefthand dominant. Finishes almost everything going back to his left. Tall, athletic defenders may be able to sit on it.</br></br>\r\n\r\n• Has a hard, flat jumper. Made 39.7% of threes but just 62.7% of free throws. Touch is just OK. Without stretch-offense component, could end up stuck between positions.</br></br>\r\n\r\n<h1>Highlights</h1>\r\n\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LUYwt0yMncM\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\r\n', 'assets/posts/1 y-eFCNh9H0r1Jgjho6NN7Q.jpeg', '2018-06-19 01:11:54', 1, 16),
(10, 'Trade packages that could land the Lakers Kawhi Leonard', 'The years of suffering might finally be coming to an end. According to multiple reports, San Antonio Spurs All-Star Kawhi Leonard wants a trade out of San Antonio, and the Los Angeles Lakers are his preferred destination. </br></br>\r\n\r\nThis isn’t the first time an All-Star small forward in his mid-20s has tried to force a trade to Los Angeles, but the Lakers have every reason to pull the trigger on a trade this year. With Paul George and LeBron James looking for a new place to call home, a trade for Leonard could make the Lakers an immediate favorite, even more so than they are now. </br></br>\r\n\r\nWith the 2018 NBA Draft less than a week away, a trade would likely have to be done sooner rather than later, going with the safe assumption that picks from this year’s draft would be involved.</br></br>\r\n\r\nHere are a few trade packages that the Lakers could put together to peak R.C. Buford’s interest.</br>\r\n\r\n<h1>Best-case</h1>\r\n\r\nLakers get: Kawhi Leonard </br></br>\r\n\r\nSpurs get: Luol Deng, Brandon Ingram, 2018 first-round pick (via CLE), 2019 first-round pick </br></br>\r\n\r\nIf you were expecting none of these trades to include one or more of your favorite players on the current roster, I’m sorry I have to be the one to tell you that just isn’t possible. Even in the best-case scenario, the Lakers would have to bid farewell to at least one of their promising young players. </br></br>\r\n\r\nGiven that the Spurs would be trading their starting small forward, it’s safe to assume the starting point to any talks will be Ingram. </br></br>\r\n\r\nThe No. 2 pick in the 2016 draft, Ingram hasn’t broken out the way some of the other rookies in his draft class have, like Jaylen Brown and Ben Simmons. However, in his sophomore season with the Lakers, Ingram showed flashes of being someone who can be a nightmare on both ends if he puts the work in.</br></br>\r\n\r\nParting with Ingram before he develops into the player fans were hoping he’d be will sting, but when you’re getting a player of Leonard’s caliber in return, those tears dry on their own. </br></br>\r\n\r\n <h1> “Realistic” </h1>\r\n\r\nLakers gets: Kawhi Leonard </br></br>\r\n\r\nSpurs get: Brandon Ingram, Kyle Kuzma, Luol Deng, 2018 first-round pick (via CLE), 2019 second-round pick (via CHI)</br>\r\n\r\nIf you weren’t a fan of the first trade, you might want to sit down for this one.</br></br>\r\n\r\nThe biggest challenge in making any trade with the Spurs for Leonard is going to be matching salaries. The easiest way to do this is by throwing Luol Deng as salary filler, but even for a team that’s seemingly headed for a rebuild like the Spurs, Deng’s contract, which is guaranteed for $36 million through 2020 is a tough pill to swallow. </br></br>\r\n\r\nIn order to soften the blow, the Lakers would likely have to send more than one of their brightest youngsters, including the aforementioned Ingram and Kyle Kuzma, who the Spurs were reportedly high on leading up to the draft last year. </br></br>\r\n\r\nKuzma shattered any and all expectations for him in his rookie season and it doesn’t look like he plans on slowing down any time soon. Even at 22 years old, it’s not impractical to think Kuzma is nowhere near his ceiling and if the Lakers are lucky, the Spurs are thinking the same thing. </br></br>\r\n\r\nAgain, it’s not going to be easy to come to terms with the fact that both Ingram and Kuzma could be playing for another team next season, but if it means landing both Paul George and LeBron James, it’s worth it. </br></br>\r\n\r\n<h1> Worst-case </h1>\r\n\r\nLakers get: Kawhi Leonard, 2018 first-round pick </br></br>\r\n\r\nSpurs get: Brandon Ingram, Kyle Kuzma, Josh Hart, Luol Deng, 2018 first-round pick </br></br>\r\n\r\nI should preface this trade by saying this isn’t technically the worst-case scenario. The worst-case scenario would involve the Lakers trading Lonzo Ball with no solid backup plan at point guard, unless you consider Tyler Ennis a solid backup plan. </br></br>\r\n\r\nIf that is the case for you, dear reader, I strongly suggest you seek help. My DMs are open (@RadRivas). </br></br>\r\n\r\nBut giving up not one, not two, but three players on rookie contracts for a player that can leave in a year is a risky move, even if it means getting out of a bad contract. </br></br>\r\n\r\nNo, Ingram, Kuzma, nor Hart can hold a candle to what Leonard has accomplished in his seven-year career, but teams with no depth don’t usually don’t fare well deep in the playoffs. Just ask the Cleveland Cavaliers, or the Oklahoma City Thunder. </br></br>\r\n\r\nNow that the season is over, the Lakers and the Spurs can start negotiating trades immediately. However, it’s possible the Spurs are holding out on hope that Gregg Popovich and Leonard can reach an armistice of sorts following their meeting, which reportedly has not yet happened. </br></br>\r\n\r\nIf the two parties can’t reach an agreement, you can bet on Rob Pelinka shooting “You up?” texts to Buford and Co. until a deal is done, even if trading Leonard to the Lakers isn’t the Spurs’ top option.</br></br>', 'assets/posts/usa_today_10701082.0.jpg', '2018-06-19 01:51:28', 0, 16),
(11, 'NBA trade rumors: Celtics interested in Mo Bamba, could move up in draft, SN sources say', 'The Celtics were eliminated from the postseason just days ago, but they’ve established themselves as an up-and-coming group that figures to contend for a championship next season. The one hole in what is a mostly loaded roster, though, is in the middle. </br></br>\r\n\r\nAnd while there have been ample rumors in the past year about Boston chasing the likes of Anthony Davis and Karl-Anthony Towns, the answer could be slightly different: Texas center Mo Bamba, who is expected to be one of the top picks in this year’s draft.</br></br>\r\n\r\nSources told Sporting News that Boston has expressed interest in Bamba, including interviewing him at the Chicago pre-draft combine two weeks ago. Bamba measured in with a record wingspan of 7-10 in Chicago, reinforcing his status as the most ready-made rim protector in the draft.</br></br>\r\n\r\nOf course, the challenge is securing a pick that will be high enough to land Bamba. He could go as high as No. 3 to the Hawks, and there has also been talk that the Magic — picking sixth — are high on Bamba and won’t let him drop past their slot.</br></br>\r\n\r\nThe Celtics have the No. 27 pick, but they have multiple assets on hand that could help them move into the top five of the draft, where the Grizzlies (No. 4) and Mavericks (No. 5) have made it clear they’re willing to make a deal.</br></br>\r\n\r\nIt’s almost certain that the Celtics would not move rookie forward Jayson Tatum, who just wrapped up the postseason as the team’s leading scorer, at 18.5 points per game. Less certain, though, is what Boston might do with point guard Terry Rozier (16.5 points, 5.7 assists and 5.3 rebounds per game in the playoffs) or swingman Jaylen Brown (18.0 points per game in the playoffs).</br></br>\r\n\r\nThe Celtics were without star point guard Kyrie Irving in the playoffs and major free-agent signee Gordon Hayward for all but the first five minutes of the season. Both players will return, reducing the the roles of players like Rozier and Brown.</br></br>\r\n\r\nTeam president Danny Ainge has been aggressive in his attempts to build the Celtics into a championship-caliber team, so even as Rozier and Brown have become fan favorites, a deal involving either (or both) is not out of the question.</br></br>\r\n\r\nIn order to move into the top five of the draft, the Celtics would likely have to give up either Rozier or Brown — Dallas (Dennis Smith Jr.) and Memphis (Mike Conley) already have point guards, and would almost certainly prefer Brown. </br></br>\r\n\r\nAnd Boston probably would have to include this year’s draft pick, as well as at least one pick next year, when the Celtics own Sacramento’s pick (protected for the first overall pick) as well as Memphis’ pick (top-eight protected). </br></br>\r\n\r\nBut the Celtics have a near-complete roster. A rim protector like Bamba — who has also shown flashes of offensive improvement heading into the draft — could be a solid finishing touch. </br></br>\r\n', 'assets/posts/mohamed-bamba-ftr-021318jpg_crsg9mdqbttz1c65q1ty6wb5w.jpg', '2018-06-19 01:56:48', 0, 16),
(12, '2018 NBA Draft roundtable: Should the Atlanta Hawks attempt to trade down from No. 3 overall?', 'The 2018 NBA Draft is nearly here and, before it arrives on June 21, the Peachtree Hoops staff gathered in roundtable fashion to answer a few pertinent questions. In the fourth installment, the panel considers the looming question surrounding whether the Atlanta Hawks should consider accepting an offer to move down from No. 3 overall. </br></br>\r\n\r\n<strong>Brad Rowland:\r\n</strong> It’s tough. This is a draft in which the Hawks need to come away with a premium asset and, at least on my personal board, there is a four-player top tier. With that said, a player like Trae Young could easily be seen as a top-tier talent (with unquestionably high upside) and, if Atlanta has a longer tier than I do at the top, a good way to find added value would be to slide back a spot or two in pursuit of additional assets. It’s impossible without knowing exactly what they can get but nothing should be OFF the table at this point, even if it would take a lot to justify this kind of move.</br></br>\r\n\r\n<strong>Jeff Siegel:</strong>  If they do, it should only be a few spots. Trading down significantly, say for the Clippers’ No. 12 and No. 13 picks, plus a future asset, puts them one year behind on getting a potential superstar, most of whom come at the top of the draft. If a team like Dallas or Orlando bowls them over with an offer to move down from No. 3 to No. 5 or 6, then that makes more sense, but my board differs from Brad’s in that way; I have Doncic in a tier by himself at the top, then six or seven players in the next group below him, all with their strengths and weaknesses.</br></br>\r\n\r\n<strong>Graham Chapple:</strong>  It really depends on who the Hawks are targeting. I’m sure they have a very rough idea who they want to select with that third pick by this stage. Someone like Marvin Bagley III probably isn’t going to be available after No. 3 or No. 4, should the Hawks trade down. If Atlanta are OK with that -- and they’re targeting someone like Trae Young, Mo Bamba or Michael Porter Jr. instead -- then they should explore what package is available for them to do that and if the returns are that where it’s in Atlanta’s interest. Would I do it? No, probably not but, of course, it all depends on the offer that comes in. The Hawks are in a great spot regardless -- one of Ayton, Doncic or Bagley/Jackson are in their grasp at No. 3 and they can gauge offers from other teams about moving up. A great position to be in. </br></br>\r\n\r\n', 'assets/posts/usa_today_10706248.0.jpg', '2018-06-19 02:00:38', 0, 16),
(13, 'NBA Trade Rumors: Should the Cleveland Cavaliers trade Kevin Love for the No. 4 pick?', 'ith rumors all over the NBA, should the Cleveland Cavaliers take on the action on the Grizzlies fielding their No. 4 overall pick? </br></br>\r\n\r\nPaul George, Kawhi Leonard, Kemba Walker and many more NBA stars have had trade rumors swirling around this offseason. While the Cleveland Cavaliers might not capitalize on those rumors, they should capitalize on this one, but only under the right circumstances. </br></br>\r\n\r\nPer The Athletic, the Memphis Grizzlies have been open to trading the No. 4 overall pick. </br></br>\r\n\r\n    The Memphis Grizzlies have gauged the trade market on a package of Chandler Parsons and the No. 4 overall pick, league sources told The Athletic. </br></br>\r\n\r\n    Parsons, who has missed 94 combined games over the past two seasons, is owed $49.2 million guaranteed over the next two seasons. </br></br>\r\n\r\nNBADraft.net has the Grizzlies taking Jaren Jackson Jr. with the No. 4 overall. Clearly, one of two ideas are catching steam in the Grizzlies front office. Either they are really not impressed with any prospect outside of the top three. Or, they really do plan to hit 50+ wins next season like their owner said they would. </br></br>\r\n\r\nI think it’s easy to assume that it’s the latter. </br></br>\r\n\r\nCombining the pick and Parsons would do two things. It would allow Memphis to free up enough cap to possibly sign a player like DeMarcus Cousins or Aaron Gordan. Then, on top of signing a big name free agent, they’ll have an all-star level talent that they traded their pick for. </br></br>\r\n\r\nThink about rolling out a lineup with Mike Conley, Aaron Godran, DeMarcus Cousins, and Kevin Love. That lineup would thrive even again Golden State. However, for Memphis, would it really be worth it? </br></br>', 'assets/posts/asdasdasda8798465465.jpg', '2018-06-19 02:03:10', 0, 16),
(14, 'Here’s how the Lakers can land LeBron James, Kawhi Leonard, and Paul George next season', 'LeBron James is about to be a free agent. Paul George is expected to become one, too. Now Kawhi Leonard wants out of San Antonio, and according to ESPN’s Adrian Wojnarowski, his preferred destination is in Los Angeles with the Lakers. That’s the same place James owns two homes, and the same place George has not-so-subtly been angling to play. </br></br>\r\n\r\n<h1>Renounce all of their free agents</h1>\r\n\r\nThe Lakers currently project to have more cap space available than any other team for the upcoming free agency period. The cap is currently projected to come in at $101 million, giving the Lakers about $66 million in cap space, according to Spotrac. </br></br>\r\n\r\nBut to get there, they have to sever ties with their free-agents-to-be. That means Los Angeles has to renounce their rights to Julius Randle — allowing the talented forward to become an unrestricted free agent this summer — as well as Brook Lopez, Isaiah Thomas, Kentavious Caldwell-Pope, Channing Frye, Andre Ingram, and Travis Wear. Tyler Ennis, Ivica Zubac, and Thomas Bryant have small non-guaranteed contracts that can be released as well. It doesn’t mean they can’t re-sign these players; Los Angeles just won’t be able to exceed the salary cap with more than a minimum contract to re-sign them. </br></br>\r\n\r\nIf they renounce everyone as expected, Los Angeles would have about $37 million in guaranteed salaries committed for the 2018-19 season. </br></br>\r\n\r\nYes, it would come at the cost of parting ways with Randle, but his name has been swirling in trade rumors for years. Losing him for a chance at landing three superstars is a no-brainer. </br></br>\r\n\r\nIn order to hit that $34.56 million cap mark, the Lakers would also need to trade the No. 25 pick in  this year’s draft to free themselves of the cap hold of 120 percent of the rookie scale contract. Here’s how they do that. </br></br>', 'assets/posts/6578y89yh4654654.jpg', '2018-06-19 02:11:59', 0, 16),
(15, 'Surprising: Damian Lillard Demands Trade, Ends Up In Phoenix', 'During his tenure with the Portland Trail Blazers, Damian Lillard quickly went from being an undervalued kid from a mid-level college to becoming one of the premier point guards in the NBA. You will have a hard time finding anyone who will deny that Lillard is one of the best guards in the league today. Lillard is a premier talent, and he has the numbers to prove it. During the regular season, Damian averaged almost 27 points per game and performed countless late-game heroics to lift Portland during close affairs. However, the playoffs this year proved that whatever they are doing up there in Oregon is not going to be enough for Lillard to take another step forward in his career. </br></br>\r\n\r\nThis is why we believe that it wouldn’t be too farfetched to imagine this guy demanding a trade just like Kyrie Irving that last year. </br></br>\r\n\r\n<i><b>Yes, he is their franchise player, but there is not much Portland could do if he decided he did not want to play for them anymore.</b></i></br></br>\r\n\r\nAnd in a way, maybe they could get some valuable pieces going forward if they decided to trade the guy. After all, Lillard was terrible during the playoffs, as he averaged a little over 18 points per game while shooting an abysmal 35 percent from the field.</br></br>\r\n\r\nAs for where he could go, there have been whispers this offseason that the Suns are interested in Lillard, but what they could give up is another story. Yes, they have the no.1 overall pick, but it\'s more likely they\'d trade some younger players on their roster, while bringing in Lillard to pair with whomever they draft 1st overall.</br></br>', 'assets/posts/USA_Damian-Lillard-1.jpg', '2018-06-19 02:17:14', 0, 16),
(16, 'Gara sisa', '<p><i>Gara </i><strong>sisetina&nbsp;</strong></p><p>&nbsp;</p><p>najveca&nbsp;</p><p>na svetu</p>', 'assets/posts/152950697932889414_2144409962255843_4612966769085120512_n.jpg', '2018-06-20 15:02:59', 1, 16),
(17, 'Joca picketina', '<p>asddsadsadsasdasadsda</p>', 'assets/posts/152950703632934626_2393086654038481_1829434971769536512_n.jpg', '2018-06-20 15:03:56', 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `questionBody` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `questionBody`, `timestamp`) VALUES
(1, 'Who is going to be #1 pick?', '2018-06-16 21:57:32'),
(2, 'Who is the greatest player of all time?', '2018-06-16 21:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `suggestionID` int(11) NOT NULL,
  `suggestionBody` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`suggestionID`, `suggestionBody`, `questionID`) VALUES
(1, 'Deandre Ayton', 1),
(2, 'Luka Doncic', 1),
(3, 'Marvin III Bagley', 1),
(4, 'Mo Bamba', 1),
(5, 'Trae Young', 1),
(6, 'Michael Jordan', 2),
(7, 'Kobe Bryant', 2),
(8, 'Lebron James', 2);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `conferenceID` int(1) NOT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `coachID` int(11) NOT NULL,
  `founded` int(4) NOT NULL,
  `divisionID` int(11) NOT NULL,
  `arenaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamID`, `name`, `conferenceID`, `picture`, `coachID`, `founded`, `divisionID`, `arenaID`) VALUES
(1, 'Atlanta Hawks', 1, 'assets/NBAnalyzer/East/atlanta-hawks.png', 1, 1946, 3, 1),
(2, 'Boston Celtics', 1, 'assets/NBAnalyzer/East/boston-celtics.png', 2, 1946, 1, 2),
(3, 'Brooklyn Nets', 1, 'assets/NBAnalyzer/East/brooklyn-nets.png', 3, 1967, 1, 3),
(4, 'Charlotte Hornets', 1, 'assets/NBAnalyzer/East/charlotte-hornets.png', 4, 1988, 3, 4),
(5, 'Chicago Bulls', 1, 'assets/NBAnalyzer/East/chicago-bulls.png', 5, 1966, 2, 5),
(6, 'Cleveland Cavaliers', 1, 'assets/NBAnalyzer/East/cleveland-cavaliers.png', 6, 1970, 2, 6),
(7, 'Detroit Pistons', 1, 'assets/NBAnalyzer/East/detroit-pistons.png', 9, 1980, 2, 9),
(8, 'Indiana Pacers', 1, 'assets/NBAnalyzer/East/indiana-pacers.png', 12, 1967, 2, 12),
(9, 'Miami Heat', 1, 'assets/NBAnalyzer/East/miami-heat.png', 16, 1988, 3, 7),
(10, 'Milwaukee Bucks', 1, 'assets/NBAnalyzer/East/milwaukee-bucks.png', 17, 1968, 2, 16),
(11, 'New York Knicks', 1, 'assets/NBAnalyzer/East/new-york-knicks.png', 20, 1946, 1, 19),
(12, 'Orlando Magic', 1, 'assets/NBAnalyzer/East/orlando-magic.png', 22, 1989, 3, 21),
(13, 'Philadelphia 76ers', 1, 'assets/NBAnalyzer/East/philadelphia-76ers.png', 23, 1946, 1, 22),
(14, 'Toronto Raptors', 1, 'assets/NBAnalyzer/East/toronto-raptors.png', 28, 1995, 1, 27),
(15, 'Washington Wizzards', 1, 'assets/NBAnalyzer/East/washington-wizards.png', 30, 1961, 3, 29),
(16, 'Dallas Mavericks', 2, 'assets/NBAnalyzer/West/dallas-mavericks.png', 7, 1980, 6, 7),
(17, 'Denver Nuggets', 2, 'assets/NBAnalyzer/West/denver-nuggets.png', 8, 1967, 4, 8),
(18, 'Golden State Warriors', 2, 'assets/NBAnalyzer/West/golden-state-warriors.png', 10, 1946, 5, 10),
(19, 'Houston Rockets', 2, 'assets/NBAnalyzer/West/houston-rockets.png', 11, 1967, 6, 11),
(20, 'Los Angeles Clippers', 2, 'assets/NBAnalyzer/West/los-angeles-clippers.png', 13, 1970, 5, 13),
(21, 'Los Angeles Lakers', 2, 'assets/NBAnalyzer/West/los-angeles-lakers.png', 14, 1947, 5, 13),
(22, 'Memphis Grizzlies', 2, 'assets/NBAnalyzer/West/memphis-grizzlies.png', 15, 1995, 6, 14),
(23, 'Minnesota Timberwolves', 2, 'assets/NBAnalyzer/West/minnesota-timberwolves.png', 18, 1989, 4, 17),
(24, 'New Orleans Pelicans', 2, 'assets/NBAnalyzer/West/new-orleans-pelicans.png', 19, 2002, 6, 18),
(25, 'Oklahoma City Thunder', 2, 'assets/NBAnalyzer/West/oklahoma-city-thunder.png', 21, 1967, 4, 20),
(26, 'Phoenix Suns', 2, 'assets/NBAnalyzer/West/phoenix-suns.png', 24, 1968, 5, 23),
(27, 'Portland Trail Blazzers', 2, 'assets/NBAnalyzer/West/portland-trail-blazers.png', 25, 1970, 4, 24),
(28, 'Sacramento Kings', 2, 'assets/NBAnalyzer/West/sacramento-kings.png', 26, 1923, 5, 25),
(29, 'San Antonio Spurs', 2, 'assets/NBAnalyzer/West/san-antonio-spurs.png', 27, 1967, 6, 26),
(30, 'Utah Jazz', 2, 'assets/NBAnalyzer/West/utah-jazz.png', 29, 1974, 4, 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `favouriteTeam` int(1) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `registredAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `roleID` int(11) NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `username`, `favouriteTeam`, `password`, `token`, `registredAt`, `email`, `roleID`, `avatar`, `active`, `deleted`) VALUES
(10, 'Dadsad', 'Dadad', 'danijela', 16, '$2y$10$ywhEMPKBbhG6g3qbZ6SuDOoRpHAyBJDqFJgRBHELYnCJIJMgKBA3u', '5c804e0fa93a2eb33a393c14a3a005a4ee2cf268c13fb5702fa19ed3357e', '2018-06-20 15:09:48', 'daadad11@dasd.dad', 2, 'assets/avatars/user.png', 1, 1),
(12, 'Danijela', 'Nikitin', 'danijela1', 16, '$2y$10$iyDEgL2mMKbrRXnHsyPHYuKhol0vGGu5A/bqZhD0t2hJRIVU81LVG', 'ef92b3347a92fef5160efc5904ce7173e596fcc05bf7e97b939d40ac3934', '2018-06-20 15:09:50', 'danijela@gmail.com', 2, 'assets/avatars/user.png', 1, 1),
(16, 'Stefan', 'Bogdanovic', 'CerealKiller', 26, '$2y$10$ky3EMrKtzlK5x/0.mSOs4e9Gcv3bfVyRjwgamkqrlmPUqGSdBulya', 'af791a93eb79dd752f9ce2628014e710d8b535f863bf2556d9a63c748205bebd33fcd534a2fa63b26be7208f9b026927c61dbb6e3b065167eb72d533', '2018-06-19 17:23:26', 'bogdanovicstefan1997@gmail.com', 1, 'assets/avatars/100x100.png', 1, 0),
(17, 'Zoran', 'Bogdanovic', 'Zoki', 12, '$2y$10$0Ba8lwKCHA8pKyLxHrmGN.NR9Q1iCInL10c5KPvlG7XHdyt22BaJS', 'ad2fe43af59fa9ae8c76fd37557a062367e46468a8f1f63c89bbade84bca54c942bea6407bbbf8bdca2e4f1f379f8819a88cbb3f1b403941ce22ccf7', '2018-06-19 16:44:58', 'bzka53@gmail.com', 2, 'assets/avatars/user.png', 0, 0),
(18, 'Jaksa', 'Malisic', 'Hipsterjs', 26, '$2y$10$ayNLN8xMhdPtTuAnDBA/HOf0dF9omu/b9obGFq2uJnozcKZpDKgB2', '2a8b17a9498025c410311d122340bb61d64594acb50d7ed4c70030b21d4d890add03e597858ab06ea5a4c6b7b66031feab37726c553bbf4aa5b54268', '2018-06-19 03:46:52', 'jaksa.malisic@gmail.com', 2, 'assets/avatars/152938001235102297_1052127884938804_188852009812623360_n.jpg', 1, 0),
(20, 'Uros', 'Obradovic', 'asdsadsdasad', 1, '$2y$10$b5GdpEFNGpcbcNwDaVyIQuKRcbiO1bTCmqZi3eRYC6qaHU6rhAXG6', '85e96f3191b238a76f3165bb1c2f2d828c80fc374ae190538b491766dffd2134f84b1144b019b5265fb024a5bcf9c2e910b1f34b50c3cb3df045978e', '2018-06-20 15:09:36', 'uros.obradovic.92.16@ict.edu.rs', 2, 'assets/avatars/user.png', 0, 0),
(21, 'Uros', 'Obradovic', 'drfeelgood', 18, '$2y$10$F94hmTfcthbBNQ7PkNu/aOsdeJDQKLcZxs15h4vCS.u8DwvR.2Giu', '4398767dd13690451f041531f2a8d99866308480c77939fa38b5f612da29d6631d1b949d9af8d14366e3d6b602942909931e5bcc0353dd41153fbb7a', '2018-06-20 15:09:38', 'uros.obradovic.90.16@ict.edu.rs', 2, 'assets/avatars/user.png', 1, 0),
(22, 'Luka', 'Vukotic', 'Skajdzzz', 28, '$2y$10$VagcoG21MwacCo4GCNaEmeFEMGAWNUg/k7.6E1OX.SNgirO484KLS', 'bbd4e7bb80cd1047ac29bdf15be1e6923ea3839195711699b0bf980ff340e1ecd5bbf419d1ded2248a04335f88104cc8c255463b92969a07dfba24c4', '2018-06-19 15:08:05', 'luka.vukotic.140.16@ict.edu.rs', 2, 'assets/avatars/1529420885kala_d_ort.JPG', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `userID` (`userID`,`questionID`,`suggestionID`);

--
-- Indexes for table `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`arenaID`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coachID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `postID` (`postID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`conferenceID`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`divisionID`),
  ADD UNIQUE KEY `name` (`division`),
  ADD KEY `conferenceID` (`conferenceID`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`navigationID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`playerID`),
  ADD KEY `teamID` (`teamID`,`positionID`),
  ADD KEY `positionID` (`positionID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`suggestionID`),
  ADD KEY `questionID` (`questionID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamID`),
  ADD KEY `conferenceID` (`conferenceID`),
  ADD KEY `coachID` (`coachID`,`divisionID`,`arenaID`),
  ADD KEY `arenaID` (`arenaID`),
  ADD KEY `divisionID` (`divisionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `favouriteTeam` (`favouriteTeam`,`roleID`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `arena`
--
ALTER TABLE `arena`
  MODIFY `arenaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `coachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `conferenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `divisionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `navigationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `positionID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `suggestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `division`
--
ALTER TABLE `division`
  ADD CONSTRAINT `division_ibfk_1` FOREIGN KEY (`conferenceID`) REFERENCES `conference` (`conferenceID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`positionID`) REFERENCES `position` (`positionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`conferenceID`) REFERENCES `conference` (`conferenceID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`coachID`) REFERENCES `coach` (`coachID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_ibfk_3` FOREIGN KEY (`arenaID`) REFERENCES `arena` (`arenaID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_ibfk_4` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`favouriteTeam`) REFERENCES `team` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
