-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 172.16.5.194
-- Generation Time: Jul 27, 2012 at 01:11 PM
-- Server version: 5.0.83
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db1180156_chris`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category` varchar(50) default NULL,
  `url_name` varchar(10) default NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `url_name`) VALUES
(1, 'home', 'home'),
(2, 'animation', 'ani'),
(3, 'illustration', 'ill'),
(4, 'book', 'bks'),
(5, 'project', 'prj'),
(6, 'movie', 'mov'),
(7, 'sketch', 'sk'),
(8, 'app', 'app'),
(9, 'fairtrade', 'ft');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  PRIMARY KEY  (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`) VALUES
(1, 'Chris Haughton');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL auto_increment,
  `thumb_id` int(11) default NULL,
  `display_text_line1` varchar(200) default NULL,
  `display_text_line2` varchar(200) default NULL,
  `display_text_line3` varchar(200) default NULL,
  `file_ref` varchar(20) default NULL,
  `file_type` varchar(20) default 'image',
  PRIMARY KEY  (`image_id`),
  KEY `image-project` (`thumb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=427 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `thumb_id`, `display_text_line1`, `display_text_line2`, `display_text_line3`, `file_ref`, `file_type`) VALUES
(1, 1, 'communion W', 'Hong Kong', '', '1.jpg', 'image'),
(2, 2, 'communion W ', 'Hong Kong', '', '2.jpg', 'image'),
(3, 3, 'communion W ', 'Hong Kong', '', '3.jpg', 'image'),
(4, 4, 'VQ magazine', 'Hong Kong', '', '4.jpg', 'image'),
(5, 5, 'VQ magazine', 'Hong Kong', '', '5.jpg', 'image'),
(6, 6, 'BBOO', 'Hong Kong', '', '6.jpg', 'image'),
(7, 7, '', '', '', '7.jpg', 'image'),
(8, 8, 'Laurence King ', 'London', '', '8.jpg', 'image'),
(9, 9, 'Front end synthetics', 'Dublin', '', '9.jpg', 'image'),
(10, 10, 'Trinity mirror', 'London', '', '10.jpg', 'image'),
(11, 11, 'Cawley Nea TBWA ', 'Dublin', '', '11.jpg', 'image'),
(12, 12, 'Cawley Nea TBWA ', 'Dublin', '', '12.jpg', 'image'),
(13, 13, 'M&C Saatchi', 'Hong Kong', '', '13.jpg', 'image'),
(14, 14, 'M&C Saatchi', 'Hong Kong', '', '14.jpg', 'image'),
(15, 15, 'Designworks', 'Dublin', '', '15.jpg', 'image'),
(16, 16, 'M&C Saatchi', 'Hong Kong', '', '16.jpg', 'image'),
(17, 17, 'Ireland''s knowledge economy', 'Cara Magazine', 'Ireland', '17.jpg', 'image'),
(18, 18, 'Drive Magazine', 'Dublin', '', '18.jpg', 'image'),
(19, 19, 'IGI 3rd prize', 'Editorial illustration 2006', '''''---people who know exactly where they are going are rare and rather frighteningâ€¦'''' Guardian', '19.jpg', 'image'),
(20, 20, 'Studioaka', 'London', '', '20.jpg', 'image'),
(21, 21, 'Time Magazine', 'Hong Kong', '', '21.jpg', 'image'),
(22, 22, '''The Quiet Invasion''', 'Cara Magazine', '', '22.jpg', 'image'),
(23, 23, 'Next generation mobile phones', 'Cara Magazine', 'Art Director: Lizzie Meagher', '23.jpg', 'image'),
(24, 24, 'Next generation mobile phones', 'Cara Magazine', 'Art Director: Lizzie Meagher', '24.jpg', 'image'),
(26, 25, 'MBNA', 'Underdog Creative ', 'Art Director: Ken Davies', '25.jpg', 'image'),
(27, 26, 'Liverpool Bienniel', '2006', '', '26.jpg', 'image'),
(28, 27, 'Cleara Communications', 'XMAS card 2006', '', '27.jpg', 'image'),
(29, 28, 'Cleara Communications', '', '', '28.jpg', 'image'),
(30, 29, 'Cleara Communications', '', '', '29.jpg', 'image'),
(31, 30, 'Food Safety Authority', 'Studioaka', 'Character design', '30.jpg', 'image'),
(32, 31, 'Adverbs. Daniel Handler', 'The Times Book Review', 'London', '31.jpg', 'image'),
(33, 32, '', '', '', '32.jpg', 'image'),
(34, 33, 'Syft records', 'Japan', '', '33.jpg', 'image'),
(35, 34, '', '', '', '34.jpg', 'image'),
(36, 35, 'Digital digging', 'Res magazine', 'New York', '35.jpg', 'image'),
(37, 36, 'Shoreditch map', 'AUG 2006', 'London', '36.jpg', 'image'),
(38, 37, 'Shoreditch map', 'AUG 2006', '', '37.jpg', 'image'),
(40, 38, '', '', '', '38.jpg', 'image'),
(44, 39, 'Orange', 'Exchange magazine ', '', '39.jpg', 'image'),
(45, 40, 'Orange', 'Exchange magazine ', '', '40.jpg', 'image'),
(46, 41, 'CO2 emissions per person TEARFUND Campign ', 'Art Director: Kevin McDermott', 'Premmdesign', '41.jpg', 'image'),
(47, 42, 'Sweden to convert to zero carbon economy by 2020', 'European Bursiness Magazine', 'Art Director: Steven Traylor', '42.jpg', 'image'),
(48, 43, '', '', '', '43.jpg', 'image'),
(49, 44, 'CARS vs Public Transportation', '', '', '44.jpg', 'image'),
(50, 45, '', '', '', '45.jpg', 'image'),
(51, 46, 'Greener Living', 'GRAND DESIGNS MAGAZINE', 'Art Director: Elliott Prentice', '46.jpg', 'image'),
(52, 47, 'Greener Living', 'GRAND DESIGNS MAGAZINE', 'Art Director: Elliott Prentice', '47.jpg', 'image'),
(53, 48, 'Greener Living', 'GRAND DESIGNS MAGAZINE', 'Art Director: Elliott Prentice', '48.jpg', 'image'),
(54, 49, '', '', '', '49.jpg', 'image'),
(55, 50, 'ICONS for SIOLTA', 'Irish Government agency', 'REDDOGS AD: Kim Robinson', '50.jpg', 'image'),
(74, 65, 'Nominated for the ICAD AWARD for Illustration 2003', 'xhibited at the IRISH NATIONAL PRINT MUSEUM', 'Dublin', '65.jpg', 'image'),
(75, 66, 'Meteor Ireland Music Award', 'Ireland', '', '66.jpg', 'image'),
(78, 67, 'LISDOONVARNA ', 'Design/Art Direction Irish music festival (designed with Neil O''DWYER)', 'Visuals/ Posters/ tv advert/ +merchandise design for one of Irelands largest outdoor events (30.000 people) ', '67.jpg', 'image'),
(79, 68, 'Lisdoonvarna Music Festival ', 'Ireland', '', '68.jpg', 'image'),
(80, 69, 'THINK! UK Department for Transport', 'AMVBBDO', 'Art Director: Pete Davies', '69.jpg', 'image'),
(81, 70, 'THINK! UK Department for Transport', 'AMVBBDO', 'Art Director: Pete Davies', '70.jpg', 'image'),
(82, 71, 'THINK! UK Department for Transport', 'AMVBBDO', 'Art Director: Pete Davies', '71.jpg', 'image'),
(83, 72, 'THINK! UK Department for Transport', 'AMVBBDO', 'Art Director: Pete Davies', '72.jpg', 'image'),
(84, 73, 'AMVBBDO LONDON', 'Bar/Restaurant/Main Lobby window vinyl-cut Idea', 'Art Director: Alex Diewert', '73.jpg', 'image'),
(85, 74, 'PAINTED IN SEPT 2005', 'Visit the shop atâ€¦ 5-12-10 Shinku-mae Shibuya-ku TOKYO', 'the image was since used as backdrop by musician Takashi Tsukamoto for his cd cover', '74.jpg', 'image'),
(86, 75, 'People Tree Mural', 'Tokio', '', '75.jpg', 'image'),
(87, 76, 'PAINTED IN SEPT 2005 ', 'Visit the shop at... 5-12-10 Shinku-mas shibuya', 'Tokio', '76.jpg', 'image'),
(88, 77, 'People Tree Mural', 'Shop interior', 'Tokio', '77.jpg', 'image'),
(89, 78, 'Water Witness Logo', 'English / Swahili', '', '78.jpg', 'image'),
(90, 79, 'The TOPSHOP flag store on Oxford St. LONDON', 'VINYL CUT on light box display', '', '79.jpg', 'image'),
(91, 80, 'Syril from People Tree''s Assissi clothing. Tamil Nadu', 'at the TOPSHOP flag store on Oxford St. LONDON', '', '80.jpg', 'image'),
(92, 81, 'People Tree catalogue cover design', 'United Kingdom', '', '81.jpg', 'image'),
(93, 82, 'People Tree catalogue cover design', 'United Kingdom', '', '82.jpg', 'image'),
(94, 83, '', '', '', '83.jpg', 'image'),
(107, 94, '', '', '', '94.jpg', 'image'),
(108, 95, '', '', '', '95.jpg', 'image'),
(109, 96, '', '', '', '96.jpg', 'image'),
(110, 97, '', '', '', '97.jpg', 'image'),
(111, 98, '', '', '', '98.jpg', 'image'),
(112, 99, '', '', '', '99.jpg', 'image'),
(113, 100, '', '', '', '100.jpg', 'image'),
(114, 101, '', '', '', '101.jpg', 'image'),
(115, 102, '', '', '', '102.jpg', 'image'),
(116, 103, '', '', '', '103.jpg', 'image'),
(117, 104, '', '', '', '104.jpg', 'image'),
(118, 105, '', '', '', '105.jpg', 'image'),
(119, 106, '', '', '', '106.jpg', 'image'),
(120, 107, '', '', '', '107.jpg', 'image'),
(121, 108, '', '', '', '108.jpg', 'image'),
(122, 109, '', '', '', '109.jpg', 'image'),
(123, 110, '', '', '', '110.jpg', 'image'),
(124, 111, '', '', '', '111.jpg', 'image'),
(125, 112, '', '', '', '112.jpg', 'image'),
(126, 113, 'bread + circus', '', '', '113.jpg', 'image'),
(134, 114, '', '', '', '114.jpg', 'image'),
(135, 115, '', '', '', '115.jpg', 'image'),
(136, 116, '', '', '', '116.jpg', 'image'),
(137, 117, '', '', '', '117.jpg', 'image'),
(138, 118, '', '', '', '118.jpg', 'image'),
(139, 119, '', '', '', '119.jpg', 'image'),
(140, 120, '', '', '', '120.jpg', 'image'),
(141, 121, '', '', '', '121.jpg', 'image'),
(142, 122, '', '', '', '122.jpg', 'image'),
(143, 123, 'CAPITAL RADIO stencil designs', 'DLKW', 'Stencils created by MOOSE', '123.jpg', 'image'),
(144, 124, 'CAPITAL RADIO stencil designs', 'DLKW', 'Stencils created by MOOSE', '124.jpg', 'image'),
(145, 125, 'CAPITAL RADIO stencil designs', 'DLKW', 'Stencils created by MOOSE', '125.jpg', 'image'),
(146, 126, 'CAPITAL RADIO stencil designs', 'DLKW', 'Stencils created by MOOSE', '126.jpg', 'image'),
(147, 127, 'CAPITAL RADIO stencil designs', 'DLKW', 'Stencils created by MOOSE', '127.jpg', 'image'),
(168, 148, '', '', '', '148.jpg', 'image'),
(169, 149, '', '', '', '149.jpg', 'image'),
(170, 150, '', '', '', '150.jpg', 'image'),
(171, 151, '', '', '', '151.jpg', 'image'),
(172, 152, 'Burton Snowboards', 'Art Design', '', '152.jpg', 'image'),
(186, 153, 'BBC Poetry Season Illustrations', '', '', '153.jpg', 'image'),
(187, 154, 'BBC Poetry Season Illustrations', '', '', '154.jpg', 'image'),
(188, 155, 'BBC Poetry Season Illustrations', '', '', '155.jpg', 'image'),
(189, 156, 'BBC Poetry Season Illustrations', '', '', '156.jpg', 'image'),
(190, 157, 'BBC Poetry Season Illustrations', '', '', '157.jpg', 'image'),
(191, 158, 'BBC Poetry Season Illustrations', '', '', '158.jpg', 'image'),
(205, 169, '', '', '', '169.jpg', 'image'),
(206, 170, 'LUCE IRIGARAY: SHARING THE WORLD', 'Book Cover ', '', '170.jpg', 'image'),
(207, 171, 'Guardian Weekend ', 'Relationships page', '', '171.jpg', 'image'),
(208, 172, 'How to: GOSSIP', 'Guardian Weekend', 'Art Director: Bruno Hayward', '172.jpg', 'image'),
(209, 173, 'If you could do anything tomorrow what would it be', '', '', '173.jpg', 'image'),
(210, 174, 'EU vs Microsoft ', 'European Business Magazine', 'Art Director: Stephen Traylor', '174.jpg', 'image'),
(211, 175, '''''If you want to run with big dogs, you''ve got learn how to piss in the long grass''''', 'GUARDIAN article on management-speak', '', '175.jpg', 'image'),
(212, 176, 'Created with Lola Duval', '', '', '176.jpg', 'image'),
(213, 177, 'Interiors planning lighting + space', 'GRAND DESIGNS MAGAZINE', 'Art Director: Elliott Prentice', '177.jpg', 'image'),
(214, 178, '', '', '', '178.jpg', 'image'),
(215, 179, '', '', '', '179.jpg', 'image'),
(218, 180, '', '', '', '180.jpg', 'image'),
(219, 181, '', '', '', '181.jpg', 'image'),
(224, 182, 'Gibson Hotel Interior Artwork', 'Dublin', '', '182.jpg', 'image'),
(225, 183, 'Gibson Hotel Interior Artwork', 'Dublin', '', '183.jpg', 'image'),
(226, 184, 'Gibson Hotel Interior Artwork', 'Dublin', '', '184.jpg', 'image'),
(227, 185, 'Gibson Hotel Interior Artwork', 'Dublin', '', '185.jpg', 'image'),
(228, 186, 'Gibson Hotel Interior Artwork', 'Dublin', '', '186.jpg', 'image'),
(229, 187, 'Pecha Kucha Night', 'Kathmandu', '', '187.jpg', 'image'),
(230, 188, 'Pecha Kucha Night', 'Kathmandu', '', '188.jpg', 'image'),
(231, 189, 'Pecha Kucha Night', 'Kathmandu', '', '189.jpg', 'image'),
(232, 190, 'Pecha Kucha Night', 'Kathmandu', '', '190.jpg', 'image'),
(233, 191, 'Pecha Kucha Night', 'Kathmandu', '', '191.jpg', 'image'),
(239, 192, 'About the People Tree Producers', '', '', '192.jpg', 'image'),
(240, 193, 'About the People Tree Producers', '', '', '193.jpg', 'image'),
(241, 194, 'About the People Tree Producers', '', '', '194.jpg', 'image'),
(242, 195, 'About the People Tree Producers', '', '', '195.jpg', 'image'),
(243, 196, 'About the People Tree Producers', '', '', '196.jpg', 'image'),
(244, 197, 'About the People Tree Producers', '', '', '197.jpg', 'image'),
(245, 198, 'People Tree Mens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2005', '198.jpg', 'image'),
(246, 199, 'People Tree Mens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2005', '199.jpg', 'image'),
(247, 200, 'People Tree Mens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2006', '200.jpg', 'image'),
(248, 201, 'People Tree Mens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2006', '201.jpg', 'image'),
(249, 202, 'People Tree Mens T-shirts', '', '', '202.jpg', 'image'),
(264, 203, 'People Tree Womens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2005', '203.jpg', 'image'),
(265, 204, 'People Tree Womens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2005', '204.jpg', 'image'),
(266, 205, 'People Tree Womens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2006', '205.jpg', 'image'),
(267, 206, 'People Tree Womens T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2006', '206.jpg', 'image'),
(268, 207, 'People Tree Womens T-shirts', '', '', '207.jpg', 'image'),
(270, 208, 'People Tree Kids T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2005', '208.jpg', 'image'),
(271, 209, 'People Tree Kids T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2005', '209.jpg', 'image'),
(272, 210, 'People Tree Kids T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2005', '210.jpg', 'image'),
(273, 211, 'People Tree Kids T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2006', '211.jpg', 'image'),
(274, 212, 'People Tree Kids T-shirts', '100% Organic Cotton. Made in India.', 'Autumn/Winter 2006', '212.jpg', 'image'),
(275, 213, 'People Tree Kids T-shirts', '', '', '213.jpg', 'image'),
(276, 214, 'Diary 2010', 'People Tree', '', '214.jpg', 'image'),
(277, 215, 'Japanese diary 2006 (year of the dog)', 'Hand made. Made in bangladesh', 'Screen-print on cotton', '215.jpg', 'image'),
(278, 216, 'Year of the mouse organizer', '', '', '216.jpg', 'image'),
(279, 217, 'Hand made', 'Pineapple + jute paper', 'Made in Bangladesh', '217.jpg', 'image'),
(280, 218, '', '', '', '218.jpg', 'image'),
(281, 219, '', '', '', '219.jpg', 'image'),
(282, 220, '', '', '', '220.jpg', 'image'),
(283, 221, '', '', '', '221.jpg', 'image'),
(284, 222, 'Pig-man said he forgot about the fork thing. He is sorry about that.', 'Maybe he will remember tomorrow.', 'The rice is finished. Its time to watch TV.', '222.jpg', 'image'),
(285, 223, 'Pig-man can eat very fast.', 'He forgot about the fork thing.', '', '223.jpg', 'image'),
(286, 224, 'Oh no! Pig-man is using his hands again.', 'Sandals is a little disappointed.', '', '224.jpg', 'image'),
(287, 225, 'Pig-man watches the rice carefully.', 'He can use his knife and fork very well.', 'He is very exited about eating.', '225.jpg', 'image'),
(288, 226, 'Sandals carries the rice. It is very heavy and very hot.', 'He is worried that it is going to drop.', 'Be careful Sandals!', '226.jpg', 'image'),
(289, 227, 'Ah! It is little Pig-man. He can smell rice. ', 'Look! Pig-man is able to hold a fork!', 'Sandals taught him about knives and forks.', '227.jpg', 'image'),
(290, 228, 'Oh look! it is Sandals O Hagan. He is cooking rice. ', 'He is concentrating very hard.', 'It smells very nice.', '228.jpg', 'image'),
(291, 229, 'The story of vegetable fried rice', 'A short story in still (almost-moving) images ', 'A sequel coming soonâ€¦.', '229.jpg', 'image'),
(294, 230, 'St Patricks Day 2006', '1min animated card', '', '230.jpg', 'image'),
(295, 231, 'UBIACH the talking email doll', 'Colaborative project with Gilad Lotan/Gu Min Lee/Chunxi Jiang/Young Taek Oh', 'NYU', '231.jpg', 'image'),
(296, 232, 'Dr Damo 2001', 'Short animated gameshow..', '', '232.jpg', 'image'),
(297, 233, '', '', '', '233.jpg', 'image'),
(298, 234, '', '', '', '234.jpg', 'image'),
(299, 235, 'The most fantastic thing 5mins', 'PITOH FOR THE IRISH FILM BOARD ', 'Co-written with andy keogh. a wordless six minute animation that follows one character through a storage and unfriendly town where he finds himself involved in a bizarre local ritual. ', '235.jpg', 'image'),
(300, 236, 'Forest''s summer', 'Collaboration with fraterfilms', '', '236.jpg', 'image'),
(301, 237, 'Music video pitch/ super furry animals 2004', 'Music video design for Â·the man don''t give a fuckÂ·', 'Created with the very nice Uptheresolution', '237.jpg', 'image'),
(302, 238, 'MTV load', 'animation/live action idea', '', '238.jpg', 'image'),
(303, 239, 'The stranger 3.20', 'A short surreal films made with  still images', '', '239.jpg', 'image'),
(304, 240, 'Design for KPMG animation ', 'Here comes the boss.com', 'Hason character design', '240.jpg', 'image'),
(305, 241, 'Sailor girl 7.20 2003', 'Written by Damin Mckenna', 'A short film told in still images a story about a young who fails in love with', '241.jpg', 'image'),
(311, 242, 'NO MORE SILLY EXCUSESâ€¦ ', 'DVLA: UK Car Tax Authoritu | DLKW', 'Art Director: Remco Graham', '242.jpg', 'image'),
(312, 243, 'NO MORE SILLY EXCUSESâ€¦ ', 'DVLA: UK Car Tax Authoritu | DLKW', 'Art Director: Remco Graham', '243.jpg', 'image'),
(313, 244, 'NO MORE SILLY EXCUSESâ€¦ ', 'DVLA: UK Car Tax Authoritu | DLKW', 'Art Director: Remco Graham', '244.jpg', 'image'),
(314, 245, 'Hundreds of beautifully made products from 60 difference co-operatives and projects in 15 developing countries  amiable to by online ', 'audio by Lee Scratch Perry', '', '245.jpg', 'image'),
(315, 246, 'More information at Pesticide Action Network, Organic cotton in India', 'Design by Chris Haughton ', 'Animation by Marc Wilson. Sound by Matt Wand ', '246.jpg', 'image'),
(316, 247, 'Littlewoods', 'STUDIOAKA', 'Art Director: Grant Orchard', '247.jpg', 'image'),
(317, 248, 'Littlewoods', 'STUDIOAKA', 'Art Director: Grant Orchard', '248.jpg', 'image'),
(318, 249, 'Littlewoods', 'STUDIOAKA', 'Art Director: Grant Orchard', '249.jpg', 'image'),
(319, 250, 'Littlewoods', 'STUDIOAKA', 'Art Director: Grant Orchard', '250.jpg', 'image'),
(320, 251, 'Littlewoods', 'STUDIOAKA', 'Art Director: Grant Orchard', '251.jpg', 'image'),
(331, 252, '', '', '', '252.jpg', 'image'),
(332, 253, '', '', '', '253.jpg', 'image'),
(333, 254, '', '', '', '254.jpg', 'image'),
(334, 255, '', '', '', '255.jpg', 'image'),
(335, 256, '', '', '', '256.jpg', 'image'),
(336, 257, 'The Law Centres', 'Shami Chakrabarti and Studioaka', '', '257.jpg', 'image'),
(337, 258, 'The Law Centres', 'Shami Chakrabarti and Studioaka', '', '258.jpg', 'image'),
(338, 259, 'The Law Centres', 'Shami Chakrabarti and Studioaka', '', '259.jpg', 'image'),
(339, 260, 'The Law Centres', 'Shami Chakrabarti and Studioaka', '', '260.jpg', 'image'),
(340, 261, 'The Law Centres', 'Shami Chakrabarti and Studioaka', '', '261.jpg', 'image'),
(348, 262, '', '', '', '262.jpg', 'image'),
(349, 263, '', '', '', '263.jpg', 'image'),
(350, 264, '', '', '', '264.jpg', 'image'),
(351, 265, '', '', '', '265.jpg', 'image'),
(352, 266, '', '', '', '266.jpg', 'image'),
(353, 267, '', '', '', '267.jpg', 'image'),
(354, 268, '', '', '', '268.jpg', 'image'),
(392, 269, '', '', '', '269.jpg', 'image'),
(393, 270, '', '', '', '270.jpg', 'image'),
(394, 271, '', '', '', '271.jpg', 'image'),
(395, 272, '', '', '', '272.jpg', 'image'),
(396, 273, '', '', '', '273.jpg', 'image'),
(397, 274, '', '', '', '274.jpg', 'image'),
(398, 275, '', '', '', '275.jpg', 'image'),
(399, 276, '', '', '', '276.jpg', 'image'),
(400, 277, '', '', '', '277.jpg', 'image'),
(401, 278, '', '', '', '278.jpg', 'image'),
(402, 279, '', '', '', '279.jpg', 'image'),
(403, 280, '', '', '', '280.jpg', 'image'),
(404, 281, '', '', '', '281.jpg', 'image'),
(405, 282, '', '', '', '282.jpg', 'image'),
(406, 283, '', '', '', '283.jpg', 'image'),
(407, 284, '', '', '', '284.jpg', 'image'),
(408, 285, '', '', '', '285.jpg', 'image'),
(409, 286, '', '', '', '286.jpg', 'image'),
(410, 287, '', '', '', '287.jpg', 'image'),
(411, 288, '', '', '', '288.jpg', 'image'),
(412, 289, '', '', '', '289.jpg', 'image'),
(413, 290, '', '', '', '290.jpg', 'image'),
(414, 291, '', '', '', '291.jpg', 'image'),
(415, 292, '', '', '', '292.jpg', 'image'),
(416, 293, '', '', '', '293.jpg', 'image'),
(417, 294, '', '', '', '294.jpg', 'image'),
(418, 295, '', '', '', '295.jpg', 'image'),
(419, 296, '', '', '', '296.jpg', 'image'),
(420, 297, '', '', '', '297.jpg', 'image'),
(421, 298, '', '', '', '298.jpg', 'image'),
(422, 299, '', '', '', '299.jpg', 'image'),
(423, 300, '', '', '', '300.jpg', 'image'),
(424, 301, '', '', '', '301.jpg', 'image'),
(425, 302, '', '', '', '302.jpg', 'image'),
(426, 303, '', '', '', '303.jpg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL auto_increment,
  `url` varchar(100) default NULL,
  `image_id` int(11) default NULL,
  PRIMARY KEY  (`link_id`),
  KEY `image-link` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`link_id`, `url`, `image_id`) VALUES
(2, 'illustratorsireland.com/index.php/news/fullstory/gold_bronze_for_ireland/', 26),
(3, 'digitalshow.co.uk', 27),
(4, 'cleara.com/?f', 28),
(8, ' www.abyss.tv', 78),
(9, 'drugdrive.direct.gov.uk', 83),
(10, 'http://waterwitness.org/ ', 89),
(11, 'peopletree.co.uk', 93),
(12, 'caat.org.uk/', 94),
(13, 'dsei.org/ ', 94),
(14, 'dsei.co.uk/ ', 94),
(26, 'symbollix.com/', 143),
(27, 'symbollix.com/', 144),
(28, 'symbollix.com/', 145),
(29, 'symbollix.com/', 146),
(30, 'symbollix.com/', 147),
(38, 'gb.burton.com/on/demandware.store/Sites-Burton_GB-Site/default', 172),
(44, 'amazon.com/Sharing-World-Luce-Irigaray/dp/184706034X', 206),
(45, 'ifyoucould.co.uk/issue2', 209),
(46, 'pechakucha-kathmandu.com/', 229),
(47, 'pechakucha-kathmandu.com/', 230),
(48, 'pechakucha-kathmandu.com/', 231),
(49, 'pechakucha-kathmandu.com/', 232),
(50, 'pechakucha-kathmandu.com/', 233),
(51, 'peopletree.co.uk', 242),
(52, 'peopletree.co.uk', 243),
(53, 'peopletree.co.uk', 244),
(54, 'peopletree.co.uk', 249),
(57, 'peopletree.co.uk', 268),
(58, 'peopletree.co.uk', 275),
(59, 'peopletree.co.uk', 276),
(60, 'peopletree.co.uk', 277),
(61, 'peopletree.co.uk', 278),
(62, 'peopletree.co.uk', 279),
(63, 'peopletree.co.uk', 280),
(64, 'peopletree.co.uk', 281),
(65, 'peopletree.co.uk', 282),
(66, 'peopletree.co.uk', 283),
(68, 'vegetablefriedrice.com/ubiachmov.html', 295),
(69, 'fraterfilms.com', 300),
(70, 'uptheresolution.co.uk', 301),
(71, 'youtube.com/watch?v=zfHKuLd5WLs', 303),
(72, 'boss.com', 304),
(73, 'bravenewtalent.com/', 304),
(74, 'boss.com', 304),
(75, 'bravenewtalent.com/', 304),
(76, 'youtube.com/watch?v=GLZ-Kns1k7A', 305),
(84, 'youtube.com/watch?v=hQjhC9jBYAo&feature=channel_page', 311),
(85, 'youtube.com/watch?v=hQjhC9jBYAo&feature=channel_page', 312),
(86, 'youtube.com/watch?v=hQjhC9jBYAo&feature=channel_page', 313),
(87, 'youtube.com/watch?v=5vS9ub_9WUs', 314),
(88, 'people.co.uk', 314),
(89, 'youtube.com/watch?v=6P3Y1ZrWhvM', 315),
(90, 'peopletree.co.uk', 315),
(91, 'studioaka.co.uk/html/index.html', 316),
(92, 'studioaka.co.uk/html/index.html', 317),
(93, 'studioaka.co.uk/html/index.html', 318),
(94, 'studioaka.co.uk/html/index.html', 319),
(95, 'studioaka.co.uk/html/index.html', 320);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `client_id` int(11) default '1',
  `category_id` int(11) default NULL,
  `featured` varchar(1) default 'N',
  PRIMARY KEY  (`project_id`),
  KEY `project-client` (`client_id`),
  KEY `project-category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `title`, `client_id`, `category_id`, `featured`) VALUES
(2, '001', 1, 3, 'N'),
(3, '002', 1, 3, 'N'),
(4, '003', 1, 3, 'N'),
(5, '004', 1, 3, 'N'),
(6, '005', 1, 3, 'N'),
(7, '006', 1, 3, 'N'),
(8, '007', 1, 3, 'N'),
(9, '008', 1, 3, 'N'),
(10, '009', 1, 3, 'N'),
(11, '010', 1, 3, 'N'),
(12, '011', 1, 3, 'N'),
(13, '012', 1, 3, 'N'),
(14, '013', 1, 3, 'N'),
(15, '014', 1, 3, 'N'),
(16, '015', 1, 3, 'N'),
(17, '016', 1, 3, 'N'),
(18, '017', 1, 3, 'N'),
(20, '018', 1, 3, 'N'),
(22, '019', 1, 3, 'N'),
(23, '020', 1, 3, 'N'),
(24, '021', 1, 3, 'N'),
(25, '022', 1, 3, 'N'),
(26, '023', 1, 3, 'N'),
(27, '024', 1, 3, 'N'),
(28, '025', 1, 3, 'N'),
(29, '026', 1, 3, 'N'),
(30, '027', 1, 3, 'N'),
(31, '028', 1, 3, 'N'),
(32, '029', 1, 3, 'N'),
(34, '030', 1, 3, 'N'),
(36, '031', 1, 3, 'N'),
(37, '032', 1, 3, 'N'),
(38, '033', 1, 3, 'N'),
(39, '034', 1, 3, 'N'),
(40, '035', 1, 3, 'N'),
(41, '036', 1, 3, 'N'),
(42, '037', 1, 3, 'N'),
(43, '038', 1, 3, 'N'),
(44, '039', 1, 3, 'N'),
(61, '001', 1, 5, 'N'),
(63, '002', 1, 5, 'N'),
(64, '003', 1, 5, 'N'),
(66, '004', 1, 5, 'N'),
(67, '005', 1, 5, 'N'),
(69, '006', 1, 5, 'N'),
(70, '007', 1, 5, 'N'),
(71, '008', 1, 5, 'N'),
(72, '009', 1, 5, 'N'),
(73, '010', 1, 5, 'N'),
(76, '001', 1, 7, 'N'),
(77, '002', 1, 7, 'N'),
(79, '003', 1, 7, 'N'),
(80, '004', 1, 7, 'N'),
(81, '005', 1, 7, 'N'),
(82, '006', 1, 7, 'N'),
(83, '007', 1, 7, 'N'),
(84, '008', 1, 7, 'N'),
(85, '009', 1, 7, 'N'),
(86, '010', 1, 7, 'N'),
(87, '011', 1, 7, 'N'),
(89, '012', 1, 7, 'N'),
(90, '013', 1, 7, 'N'),
(91, '014', 1, 7, 'N'),
(93, '015', 1, 7, 'N'),
(94, '016', 1, 7, 'N'),
(95, '017', 1, 7, 'N'),
(96, '018', 1, 7, 'N'),
(97, '019', 1, 7, 'N'),
(98, '020', 1, 7, 'N'),
(101, '011', 1, 5, 'N'),
(102, '012', 1, 5, 'N'),
(109, '013', 1, 5, 'N'),
(110, '014', 1, 5, 'N'),
(115, '015', 1, 5, 'N'),
(119, '040', 1, 3, 'N'),
(120, '041', 1, 3, 'N'),
(121, '042', 1, 3, 'N'),
(122, '043', 1, 3, 'N'),
(123, '044', 1, 3, 'N'),
(124, '045', 1, 3, 'N'),
(125, '046', 1, 3, 'N'),
(126, '047', 1, 3, 'N'),
(127, '048', 1, 3, 'N'),
(128, '049', 1, 3, 'N'),
(130, '050', 1, 3, 'N'),
(131, '051', 1, 3, 'N'),
(133, '016', 1, 5, 'N'),
(134, '017', 1, 5, 'N'),
(136, '001', 1, 9, 'N'),
(137, '002', 1, 9, 'N'),
(142, '003', 1, 9, 'N'),
(144, '004', 1, 9, 'N'),
(145, '005', 1, 9, 'N'),
(146, '001', 1, 2, 'N'),
(149, '002', 1, 2, 'N'),
(150, '003', 1, 2, 'N'),
(151, '004', 1, 2, 'N'),
(152, '005', 1, 2, 'N'),
(153, '006', 1, 2, 'N'),
(154, '007', 1, 2, 'N'),
(155, '008', 1, 2, 'N'),
(156, '009', 1, 2, 'N'),
(157, '010', 1, 2, 'N'),
(158, '011', 1, 2, 'N'),
(162, '012', 1, 2, 'N'),
(164, '013', 1, 2, 'N'),
(165, '014', 1, 2, 'N'),
(166, '015', 1, 2, 'N'),
(170, '016', 1, 2, 'N'),
(171, '017', 1, 2, 'N'),
(175, '001', 1, 4, 'N'),
(186, '002', 1, 4, 'N'),
(187, '003', 1, 4, 'N'),
(188, '004', 1, 4, 'N'),
(189, '005', 1, 4, 'N'),
(190, '006', 1, 4, 'N'),
(191, '007', 1, 4, 'N'),
(192, '008', 1, 4, 'N'),
(193, '009', 1, 4, 'N'),
(194, '010', 1, 4, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `thumb`
--

CREATE TABLE IF NOT EXISTS `thumb` (
  `thumb_id` int(11) NOT NULL auto_increment,
  `project_id` int(11) default NULL,
  `file_ref` varchar(20) default NULL,
  `file_type` varchar(10) default 'image',
  PRIMARY KEY  (`thumb_id`),
  KEY `thumb-project` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=305 ;

--
-- Dumping data for table `thumb`
--

INSERT INTO `thumb` (`thumb_id`, `project_id`, `file_ref`, `file_type`) VALUES
(1, 2, '1.jpg', 'image'),
(2, 2, '2.jpg', 'image'),
(3, 2, '3.jpg', 'image'),
(4, 3, '4.jpg', 'image'),
(5, 3, '5.jpg', 'image'),
(6, 4, '6.jpg', 'image'),
(7, 5, '7.jpg', 'image'),
(8, 6, '8.jpg', 'image'),
(9, 7, '9.jpg', 'image'),
(10, 8, '10.jpg', 'image'),
(11, 9, '11.jpg', 'image'),
(12, 9, '12.jpg', 'image'),
(13, 10, '13.jpg', 'image'),
(14, 10, '14.jpg', 'image'),
(15, 11, '15.jpg', 'image'),
(16, 12, '16.jpg', 'image'),
(17, 13, '17.jpg', 'image'),
(18, 14, '18.jpg', 'image'),
(19, 15, '19.jpg', 'image'),
(20, 16, '20.jpg', 'image'),
(21, 17, '21.jpg', 'image'),
(22, 18, '22.jpg', 'image'),
(23, 20, '23.jpg', 'image'),
(24, 20, '24.jpg', 'image'),
(25, 22, '25.jpg', 'image'),
(26, 23, '26.jpg', 'image'),
(27, 24, '27.jpg', 'image'),
(28, 24, '28.jpg', 'image'),
(29, 24, '29.jpg', 'image'),
(30, 25, '30.jpg', 'image'),
(31, 26, '31.jpg', 'image'),
(32, 27, '32.jpg', 'image'),
(33, 28, '33.jpg', 'image'),
(34, 29, '34.jpg', 'image'),
(35, 30, '35.jpg', 'image'),
(36, 31, '36.jpg', 'image'),
(37, 32, '37.jpg', 'image'),
(38, 34, '38.jpg', 'image'),
(39, 36, '39.jpg', 'image'),
(40, 36, '40.jpg', 'image'),
(41, 37, '41.jpg', 'image'),
(42, 38, '42.jpg', 'image'),
(43, 39, '43.jpg', 'image'),
(44, 40, '44.jpg', 'image'),
(45, 41, '45.jpg', 'image'),
(46, 42, '46.jpg', 'image'),
(47, 42, '47.jpg', 'image'),
(48, 42, '48.jpg', 'image'),
(49, 43, '49.jpg', 'image'),
(50, 44, '50.jpg', 'image'),
(65, 61, '65.jpg', 'image'),
(66, 61, '66.jpg', 'image'),
(67, 63, '67.jpg', 'image'),
(68, 63, '68.jpg', 'image'),
(69, 64, '69.jpg', 'image'),
(70, 64, '70.jpg', 'image'),
(71, 64, '71.jpg', 'image'),
(72, 64, '72.jpg', 'image'),
(73, 66, '73.jpg', 'image'),
(74, 67, '74.jpg', 'image'),
(75, 67, '75.jpg', 'image'),
(76, 69, '76.jpg', 'image'),
(77, 69, '77.jpg', 'image'),
(78, 70, '78.jpg', 'image'),
(79, 71, '79.jpg', 'image'),
(80, 71, '80.jpg', 'image'),
(81, 72, '81.jpg', 'image'),
(82, 72, '82.jpg', 'image'),
(83, 73, '83.jpg', 'image'),
(94, 76, '94.jpg', 'image'),
(95, 77, '95.jpg', 'image'),
(96, 79, '96.jpg', 'image'),
(97, 80, '97.jpg', 'image'),
(98, 81, '98.jpg', 'image'),
(99, 82, '99.jpg', 'image'),
(100, 83, '100.jpg', 'image'),
(101, 84, '101.jpg', 'image'),
(102, 85, '102.jpg', 'image'),
(103, 86, '103.jpg', 'image'),
(104, 87, '104.jpg', 'image'),
(105, 89, '105.jpg', 'image'),
(106, 90, '106.jpg', 'image'),
(107, 91, '107.jpg', 'image'),
(108, 93, '108.jpg', 'image'),
(109, 94, '109.jpg', 'image'),
(110, 95, '110.jpg', 'image'),
(111, 96, '111.jpg', 'image'),
(112, 97, '112.jpg', 'image'),
(113, 98, '113.jpg', 'image'),
(114, 101, '114.jpg', 'image'),
(115, 101, '115.jpg', 'image'),
(116, 101, '116.jpg', 'image'),
(117, 101, '117.jpg', 'image'),
(118, 101, '118.jpg', 'image'),
(119, 101, '119.jpg', 'image'),
(120, 101, '120.jpg', 'image'),
(121, 101, '121.jpg', 'image'),
(122, 101, '122.jpg', 'image'),
(123, 102, '123.jpg', 'image'),
(124, 102, '124.jpg', 'image'),
(125, 102, '125.jpg', 'image'),
(126, 102, '126.jpg', 'image'),
(127, 102, '127.jpg', 'image'),
(148, 109, '148.jpg', 'image'),
(149, 109, '149.jpg', 'image'),
(150, 110, '150.jpg', 'image'),
(151, 110, '151.jpg', 'image'),
(152, 110, '152.jpg', 'image'),
(153, 115, '153.jpg', 'image'),
(154, 115, '154.jpg', 'image'),
(155, 115, '155.jpg', 'image'),
(156, 115, '156.jpg', 'image'),
(157, 115, '157.jpg', 'image'),
(158, 115, '158.jpg', 'image'),
(169, 119, '169.jpg', 'image'),
(170, 120, '170.jpg', 'image'),
(171, 121, '171.jpg', 'image'),
(172, 122, '172.jpg', 'image'),
(173, 123, '173.jpg', 'image'),
(174, 124, '174.jpg', 'image'),
(175, 125, '175.jpg', 'image'),
(176, 126, '176.jpg', 'image'),
(177, 127, '177.jpg', 'image'),
(178, 128, '178.jpg', 'image'),
(179, 128, '179.jpg', 'image'),
(180, 130, '180.jpg', 'image'),
(181, 131, '181.jpg', 'image'),
(182, 133, '182.jpg', 'image'),
(183, 133, '183.jpg', 'image'),
(184, 133, '184.jpg', 'image'),
(185, 133, '185.jpg', 'image'),
(186, 133, '186.jpg', 'image'),
(187, 134, '187.jpg', 'image'),
(188, 134, '188.jpg', 'image'),
(189, 134, '189.jpg', 'image'),
(190, 134, '190.jpg', 'image'),
(191, 134, '191.jpg', 'image'),
(192, 136, '192.jpg', 'image'),
(193, 136, '193.jpg', 'image'),
(194, 136, '194.jpg', 'image'),
(195, 136, '195.jpg', 'image'),
(196, 136, '196.jpg', 'image'),
(197, 136, '197.jpg', 'image'),
(198, 137, '198.jpg', 'image'),
(199, 137, '199.jpg', 'image'),
(200, 137, '200.jpg', 'image'),
(201, 137, '201.jpg', 'image'),
(202, 137, '202.jpg', 'image'),
(203, 142, '203.jpg', 'image'),
(204, 142, '204.jpg', 'image'),
(205, 142, '205.jpg', 'image'),
(206, 142, '206.jpg', 'image'),
(207, 142, '207.jpg', 'image'),
(208, 144, '208.jpg', 'image'),
(209, 144, '209.jpg', 'image'),
(210, 144, '210.jpg', 'image'),
(211, 144, '211.jpg', 'image'),
(212, 144, '212.jpg', 'image'),
(213, 144, '213.jpg', 'image'),
(214, 145, '214.jpg', 'image'),
(215, 145, '215.jpg', 'image'),
(216, 145, '216.jpg', 'image'),
(217, 145, '217.jpg', 'image'),
(218, 145, '218.jpg', 'image'),
(219, 145, '219.jpg', 'image'),
(220, 145, '220.jpg', 'image'),
(221, 145, '221.jpg', 'image'),
(222, 146, '222.jpg', 'image'),
(223, 146, '223.jpg', 'image'),
(224, 146, '224.jpg', 'image'),
(225, 146, '225.jpg', 'image'),
(226, 146, '226.jpg', 'image'),
(227, 146, '227.jpg', 'image'),
(228, 146, '228.jpg', 'image'),
(229, 146, '229.jpg', 'image'),
(230, 149, '230.jpg', 'image'),
(231, 150, '231.jpg', 'image'),
(232, 151, '232.jpg', 'image'),
(233, 152, '233.jpg', 'image'),
(234, 152, '234.jpg', 'image'),
(235, 152, '235.jpg', 'image'),
(236, 153, '236.jpg', 'image'),
(237, 154, '237.jpg', 'image'),
(238, 155, '238.jpg', 'image'),
(239, 156, '239.jpg', 'image'),
(240, 157, '240.jpg', 'image'),
(241, 158, '241.jpg', 'image'),
(242, 162, '242.jpg', 'image'),
(243, 162, '243.jpg', 'image'),
(244, 162, '244.jpg', 'image'),
(245, 164, '245.jpg', 'image'),
(246, 165, '246.jpg', 'image'),
(247, 166, '247.jpg', 'image'),
(248, 166, '248.jpg', 'image'),
(249, 166, '249.jpg', 'image'),
(250, 166, '250.jpg', 'image'),
(251, 166, '251.jpg', 'image'),
(252, 170, '252.jpg', 'image'),
(253, 170, '253.jpg', 'image'),
(254, 170, '254.jpg', 'image'),
(255, 170, '255.jpg', 'image'),
(256, 170, '256.jpg', 'image'),
(257, 171, '257.jpg', 'image'),
(258, 171, '258.jpg', 'image'),
(259, 171, '259.jpg', 'image'),
(260, 171, '260.jpg', 'image'),
(261, 171, '261.jpg', 'image'),
(262, 175, '262.jpg', 'image'),
(263, 175, '263.jpg', 'image'),
(264, 175, '264.jpg', 'image'),
(265, 175, '265.jpg', 'image'),
(266, 175, '266.jpg', 'image'),
(267, 175, '267.jpg', 'image'),
(268, 175, '268.jpg', 'image'),
(269, 186, '269.jpg', 'image'),
(270, 186, '270.jpg', 'image'),
(271, 186, '271.jpg', 'image'),
(272, 186, '272.jpg', 'image'),
(273, 187, '273.jpg', 'image'),
(274, 187, '274.jpg', 'image'),
(275, 187, '275.jpg', 'image'),
(276, 187, '276.jpg', 'image'),
(277, 187, '277.jpg', 'image'),
(278, 187, '278.jpg', 'image'),
(279, 187, '279.jpg', 'image'),
(280, 187, '280.jpg', 'image'),
(281, 187, '281.jpg', 'image'),
(282, 187, '282.jpg', 'image'),
(283, 187, '283.jpg', 'image'),
(284, 187, '284.jpg', 'image'),
(285, 187, '285.jpg', 'image'),
(286, 188, '286.jpg', 'image'),
(287, 189, '287.jpg', 'image'),
(288, 189, '288.jpg', 'image'),
(289, 189, '289.jpg', 'image'),
(290, 190, '290.jpg', 'image'),
(291, 190, '291.jpg', 'image'),
(292, 190, '292.jpg', 'image'),
(293, 190, '293.jpg', 'image'),
(294, 190, '294.jpg', 'image'),
(295, 190, '295.jpg', 'image'),
(296, 190, '296.jpg', 'image'),
(297, 190, '297.jpg', 'image'),
(298, 191, '298.jpg', 'image'),
(299, 191, '299.jpg', 'image'),
(300, 192, '300.jpg', 'image'),
(301, 193, '301.jpg', 'image'),
(302, 193, '302.jpg', 'image'),
(303, 194, '303.jpg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(30) default NULL,
  `password` char(40) default NULL,
  `logged_in` varchar(1) default 'N',
  `user_type` varchar(11) default 'general',
  `session_id` varchar(100) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `logged_in`, `user_type`, `session_id`) VALUES
(1, 'chrishaughton', 'chris123', 'N', 'admin', 'NULL'),
(2, 'anonymous', 'xyz', 'N', 'general', NULL),
(3, 'noelle', 'noelle123', 'Y', 'admin', 'a9e7c0123abd3d8d657c9fb916016e80'),
(4, 'omar', 'omar123', 'N', 'superadmin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(11) NOT NULL auto_increment,
  `thumb_id` int(11) default NULL,
  PRIMARY KEY  (`video_id`),
  KEY `video-thumb` (`thumb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `video`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image-thumb` FOREIGN KEY (`thumb_id`) REFERENCES `thumb` (`thumb_id`);

--
-- Constraints for table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `image-link` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project-category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `project-client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `thumb`
--
ALTER TABLE `thumb`
  ADD CONSTRAINT `thumb-project` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video-thumb` FOREIGN KEY (`thumb_id`) REFERENCES `thumb` (`thumb_id`);
