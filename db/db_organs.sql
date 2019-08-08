-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 05:12 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_how`
--

CREATE TABLE `tbl_how` (
  `how_id` tinyint(2) UNSIGNED NOT NULL,
  `how_title` varchar(50) NOT NULL,
  `how_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_how`
--

INSERT INTO `tbl_how` (`how_id`, `how_title`, `how_text`) VALUES
(1, 'SIT DOWN', 'It\'s so simple all you have to do is sit and visit beadonor.ca. Every three days someone dies waiting for a transplant, only 1 out of 4 people are a donor.'),
(2, 'SIGN UP', 'It only takes 2 minutes to register to be a donor, it\'s that simple. All you need is your health card and beadonor.ca to be registered.'),
(3, 'SAVE LIVES', 'By signing up and becoming a organ donor, you have the chance to save 8 other lives just by registering. It\'s simple just donate in 2 minutes.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_myths`
--

CREATE TABLE `tbl_myths` (
  `myths_id` tinyint(2) UNSIGNED NOT NULL,
  `myths_false` text NOT NULL,
  `myths_true` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_myths`
--

INSERT INTO `tbl_myths` (`myths_id`, `myths_false`, `myths_true`) VALUES
(1, 'Bodies are not mangled during operation, they are taken under the same sterile conditions as any medical procedure. A donor’s body is never disfigured or thorwn away and you can still have an open casket.', 'All major religions support organ donation. A donor’s body is never disfigured mangled or and donation does not interfere with funeral arrangements or family plans after a donation.'),
(2, 'Rich people always recieve better care. Wrong, doctors treat all donors the same. They save lives every minute, your helping them and others by being a donor.', 'All doctors will treat you the same. They will do all they can to save your life no matter what and donation only occurs after the death of a patient is declared by physicians and consent from family.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organlightbox`
--

CREATE TABLE `tbl_organlightbox` (
  `organ_id` tinyint(2) UNSIGNED NOT NULL,
  `organ_img` varchar(50) NOT NULL,
  `organ_name` varchar(50) NOT NULL,
  `organ_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_organlightbox`
--

INSERT INTO `tbl_organlightbox` (`organ_id`, `organ_img`, `organ_name`, `organ_text`) VALUES
(1, 'liver_img.png', 'The Liver', 'The liver helps fight off infections and clean your blood. It also helps digest food and stores energy when needed. A liver transplant replaces a diseased liver when all other options have failed.'),
(2, 'lungs_img.png', 'The Lungs', 'A lung transplant can replace one or both diseased lungs due to chronic obstructive pulmonary fibrosis, intestinal lung disease, or pulmonary hypertension among many other reasons. Its very curcial to find a donor for a person who is in need as our lungs play a very important role in our bodies.'),
(3, 'intestines_img.png', 'The Intestines', 'The Instestines can replace a diseased small bowel with a healthy bowel from a donor. There are some people who are born with a irreversible intestinal failure that causes a persons instestines to not be able to digest food and nutrients properly. Therefore, its very important and crucial that people who are in need of a transplant gets it.'),
(4, 'bone_img.png', 'The Skeletal System', 'Bone grafts can repair and rebuild diseased bones in hips, knees, spine, and many other joints due to fractures or cancer. A bone transplant will provide a framwork for the growth of new living bones, which is imparative for some who are in need.'),
(5, 'heart_img.png', 'The Heart', 'A heart transplant replaces a damaged or diseased heart with a healthy heart from a donor who has died. This is mainly the only treatment option for people with heart failure. Heart failure may occur due to congenital heart disease, coronary heart disease, damaged heart valves, heart muscles, or viral infections.'),
(6, 'kidneys_img.png', 'The Kidneys', 'The kidneys are two bean-shaped organs in the renal system. They help pass waste as urine in the body that performs crucial functions that the human body requires. About 71% of people are currently waiting on a list for a kidney transplant. A kidney transplant will work for two kidneys that have failed to perform their duty in the body when a donor is able to donate.'),
(7, 'pancreas_img.png', 'The Pancreas', 'The pancreas is very helpful as it makes insulin and enzymes that will help the body digest food. A pancreas transplant can be performed to replaced due to a failing organ with a healthy new pancreas from a donor. The common reason for a pancreas transplant can be from a person who has diabetes.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stories`
--

CREATE TABLE `tbl_stories` (
  `story_id` tinyint(3) UNSIGNED NOT NULL,
  `story_bio` text NOT NULL,
  `story_image` varchar(50) NOT NULL,
  `story_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stories`
--

INSERT INTO `tbl_stories` (`story_id`, `story_bio`, `story_image`, `story_name`) VALUES
(1, 'I just signed up to be a donor and I found out that I can save up to 8 lives just by signing up in 2 easy and quick minutes. It was that simple. Now I feel like a superhero, want to join me?', 'signhold.png', 'John Crazinski'),
(13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel accumsan nisi. Etiam non mi nec dolor euismod pharetra. Aliquam vel mauris hendrerit, tincidunt justo sit amet.', 'signhold.png', 'Dave Smith');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_lvl` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_verify` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_lvl`, `user_date`, `user_verify`) VALUES
(2, 'Quinn', 'quinnedy', '$2y$10$AhSYkNpyqI8H60LAlpLP8.ZItfY9ECQgKfI6Tdkp7UAkhGpFBRLdi', 'qnnkennedy922@gmail.com', '1', '2018-03-05 22:01:02', 'yay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `video_id` tinyint(2) UNSIGNED NOT NULL,
  `video_src` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_src`) VALUES
(1, 'organ_donations.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_why`
--

CREATE TABLE `tbl_why` (
  `why_id` tinyint(2) UNSIGNED NOT NULL,
  `why_text` text NOT NULL,
  `why_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_why`
--

INSERT INTO `tbl_why` (`why_id`, `why_text`, `why_img`) VALUES
(1, 'It\'s Simple just donate and become a organ donor. It\'s that simple to become an organ donor because it just takes 2 minutes. There\'s no long wait or a long list of questions, it\'s just a few clicks at beadonor.ca to help save lives and make an impact in people\'s lives.', 'phoneorgansite.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_how`
--
ALTER TABLE `tbl_how`
  ADD PRIMARY KEY (`how_id`);

--
-- Indexes for table `tbl_myths`
--
ALTER TABLE `tbl_myths`
  ADD PRIMARY KEY (`myths_id`);

--
-- Indexes for table `tbl_organlightbox`
--
ALTER TABLE `tbl_organlightbox`
  ADD PRIMARY KEY (`organ_id`);

--
-- Indexes for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `tbl_why`
--
ALTER TABLE `tbl_why`
  ADD PRIMARY KEY (`why_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_how`
--
ALTER TABLE `tbl_how`
  MODIFY `how_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_myths`
--
ALTER TABLE `tbl_myths`
  MODIFY `myths_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_organlightbox`
--
ALTER TABLE `tbl_organlightbox`
  MODIFY `organ_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  MODIFY `story_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `video_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_why`
--
ALTER TABLE `tbl_why`
  MODIFY `why_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
