-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 06:25 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `book_image` text NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_pages` int(10) NOT NULL,
  `book_date` date NOT NULL,
  `book_synopsis` text NOT NULL,
  `book_desc` text NOT NULL,
  `book_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `cat_id`, `book_image`, `book_title`, `book_author`, `book_pages`, `book_date`, `book_synopsis`, `book_desc`, `book_file`) VALUES
(14, 2, 'onegodonelordbyMarkGrantDaves.jpg', 'One God One Lord', 'Mark Dave Grant', 48, '2018-04-23', '&quot;Who do you say that I am?&quot;. Jesus of Nazareth posed this question to his followers nearly two thousand years ago, but the question still hangs in the air, requesting an answer from every person. Indeed, the question of the identity of Jesus Christ is the most important theological issue of all human history, because he claimed to be the human Son of the one true God.', '&quot;Who do you say that I am?&quot;. Jesus of Nazareth posed this question to his followers nearly two thousand years ago, but the question still hangs in the air', 'One God One Lord.pdf'),
(15, 2, 'deathafterlifeMarkGrantDavis.jpg', 'Death After Life', 'Mark Grant Davis', 31, '2018-04-23', 'A Pictorial Introduction To Death, The Resurrection Of The Just, The Resurrection Of The Unjust And The Sudden Gathering (‘Harpazo’) Of Living Believers And Dead Believers Into The Clouds When The ‘Last Trump’ Is Blown', 'A Pictorial Introduction To Death, The Resurrection Of The Just, The Resurrection Of The Unjust And The Sudden Gathering (‘Harpazo’) Of Living Believers And Dead Believers', 'Death After Life – A Grave Issue.pdf'),
(16, 5, 'shadowlineJosephConrad.jpg', 'Shadow Line Confession', 'Joseph Conrad', 216, '2018-04-23', 'The Shadow-Line depicts a young man at a crossroads in his life, facing a desperate crisis that marks the “shadow-line” between youth and maturity.', 'The Shadow-Line depicts a young man at a crossroads in his life, facing a desperate crisis that marks the “shadow-line” between youth and maturity.', 'shadowlineconfession.pdf'),
(18, 5, 'homegoing.jpg', 'Homegoing', 'Yaa Gyasi', 300, '2018-04-23', 'hjjhhj', 'hjhjk', 'Homegoing_ A Novel - Yaa Gyasi.epub'),
(19, 1, 'Gabrielle.jpg', 'We are going to need more wine', 'Gabrielle Union', 139, '2018-04-27', 'In this moving collection of thought provoking essays infused with her unique wisdom and deep humor, Union uses that same fearlessness to tell astonishingly personal and true stories about power, color, gender, feminism, and fame. Union tackles a range of experiences, including bullying, beauty standards, and competition between women in Hollywood, growing up in white California suburbia and then spending summers with her black relatives in Nebraska, coping with crushes, puberty, and the divorce of her parents.', 'Union tackles a range of experiences, including bullying, beauty standards, and competition between women in Hollywood, growing up in white California suburbia and then spending summers with her black relatives in Nebraska, coping with crushes, puberty, and the divorce of her parents', 'Were Going to Need More Wine by Gabrielle Union.pdf'),
(20, 1, 'subtle.jpg', 'The Subtle Art of not giving a fuck', 'Mark Manson', 105, '2018-04-27', 'In his wildly popular Internet blog, Manson doesn’t sugarcoat or equivocate. He tells it like it is—a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, let’s-all-feel-good mindset that has infected modern society and spoiled a generation, rewarding them with gold medals just for showing up.', 'For decades, we’ve been told that positive thinking is the key to a happy, rich life. &quot;F**k positivity,&quot; Mark Manson says. &quot;Let’s be honest, shit is f**ked and we have to live with it', 'The Suttle Art of not Giving a Fuck.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`) VALUES
(1, 'Comic'),
(2, 'Christian'),
(3, 'Crime'),
(4, 'Fantasy'),
(5, 'Fiction'),
(6, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES
('ndmx', 'claire.chemutai@ashesi.edu.gh', 'jkdcx', 'njdmsx'),
('mary', 'clairechemutai12@gmail.com', 'very good books', 'good books'),
('k', 'kj', 'jk', 'kj');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(10) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_email`, `member_pass`) VALUES
(1, 'Claire', 'claire.chemutai@ashesi.edu.gh', '4ebe6b84b5451c6b3956ef4bd3146151');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `s_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`s_id`, `book_id`, `ip_add`) VALUES
(43, 15, '127'),
(44, 14, '127');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
