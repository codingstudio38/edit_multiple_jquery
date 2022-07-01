-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 10:23 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `link`) VALUES
(1, 'Difference between JavaScript and jQuery || JavaScript VS jQuery ||', 'https://www.youtube.com/watch?v=fDl6iAkdR6E'),
(2, 'How to upload file using AJAX and PHP || Without Page Refresh ||', 'https://www.youtube.com/watch?v=kA4OWq6FEoo'),
(3, 'How to upload,rename & validation a file using PHP? 3 Tricks in 1 Video', 'https://www.youtube.com/watch?v=RZNaevVSKnE&t=1s'),
(4, 'How to Insert Data Into MySQL Database Table Using PHP ?', 'https://www.youtube.com/watch?v=I7FeDmyfJvA'),
(5, 'How to show and hide password in a web page using javascript ??', 'https://www.youtube.com/watch?v=kaSaKq_J5w8'),
(6, 'How to validate a form using HTML & Javascript ?', 'https://www.youtube.com/watch?v=D6NAAnCUzyE&t=26s'),
(7, 'How to disable right click, content copy,Ctrl+u key on a webpage using HTML,JAVASCRIPT', 'https://www.youtube.com/watch?v=WKTB7HpGalM&t=77s'),
(8, 'How to render & view PDF to CANVAS in a web page using html and javascript ?', 'https://www.youtube.com/watch?v=nAF-WHgjJ5g&t=1s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
