-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 05:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virttour`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `posted` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `price` int(100) NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `tour_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `location`, `posted`, `description`, `price`, `image_src`, `tour_link`) VALUES
(1, 'grange hill', 'January 14 ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet fugiat rerum consequatur. Eaque delectus voluptates aliquid temporibus quibusdam magni quidem, nesciunt hic atque laborum consequatur fugiat aut sunt dolores quam?', 3125476, 'https://images.pexels.com/photos/2102587/pexels-photo-2102587.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'http://localhost/vtour/tour.html'),
(2, 'Mandeville', 'February 19', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae amet obcaecati facere nam ducimus excepturi eum atque neque perspiciatis, delectus reiciendis tempora voluptas laboriosam consequuntur exercitationem quibusdam, in facilis temporibus.', 25140234, 'https://images.pexels.com/photos/280222/pexels-photo-280222.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', 'http://localhost/vtour/tour.html'),
(3, 'Kingston', 'January 12', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet labore hic fugiat vitae id illum numquam quo voluptate, culpa voluptas nulla ipsa impedit expedita laborum ea corporis repellat? Placeat, illum?', 1052442, 'https://images.pexels.com/photos/1974596/pexels-photo-1974596.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'http://localhost/vtour/tour.html'),
(4, 'Lucea', 'December 30', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, quidem eaque? Laudantium cupiditate quibusdam molestias nulla, possimus quae nihil exercitationem temporibus ad atque quasi, error harum eos fuga consequuntur pariatur!', 3524432, 'https://images.pexels.com/photos/3958954/pexels-photo-3958954.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', 'http://localhost/vtour/tour.html');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`) VALUES
(1, 't@y.com', '123'),
(2, 'hello@hi.hey', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_pref`
--

CREATE TABLE `user_pref` (
  `user_no` int(11) NOT NULL,
  `mil_1` int(11) NOT NULL,
  `mil_2` int(11) NOT NULL,
  `mil_3` int(11) NOT NULL,
  `loc_l` int(11) NOT NULL,
  `loc_m` int(11) NOT NULL,
  `loc_k` int(11) NOT NULL,
  `loc_g` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_pref`
--

INSERT INTO `user_pref` (`user_no`, `mil_1`, `mil_2`, `mil_3`, `loc_l`, `loc_m`, `loc_k`, `loc_g`) VALUES
(1, 2, 4, 1, 2, 4, 3, 0),
(2, 2, 6, 7, 2, 6, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_pref`
--
ALTER TABLE `user_pref`
  ADD PRIMARY KEY (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
