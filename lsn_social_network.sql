-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Värd: 10.209.1.136
-- Skapad: 30 apr 2015 kl 10:01
-- Serverversion: 5.5.32
-- PHP-version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `198884-scrollpaging`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `attempts`
--

CREATE TABLE IF NOT EXISTS `attempts` (
  `AttemptID` int(11) NOT NULL AUTO_INCREMENT,
  `AttemptTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IpAddress` varchar(150) NOT NULL,
  `Result` tinyint(1) NOT NULL,
  `Username` varchar(20) NOT NULL,
  PRIMARY KEY (`AttemptID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=271 ;

--
-- Dumpning av Data i tabell `attempts`
--

INSERT INTO `attempts` (`AttemptID`, `AttemptTime`, `IpAddress`, `Result`, `Username`) VALUES
(229, '2015-04-24 20:56:35', '127.0.0.1', 1, 'Tommy'),
(230, '2015-04-26 11:15:52', '127.0.0.1', 0, 'Tommy'),
(231, '2015-04-26 11:15:59', '127.0.0.1', 1, 'Tommy'),
(232, '2015-04-26 11:19:13', '127.0.0.1', 1, 'Tommy'),
(233, '2015-04-26 11:22:13', '127.0.0.1', 1, 'Tommy'),
(234, '2015-04-27 11:37:33', '127.0.0.1', 1, 'Tommy'),
(235, '2015-04-27 11:39:55', '127.0.0.1', 1, 'Asoglu'),
(236, '2015-04-27 11:52:22', '127.0.0.1', 0, 'Tommy'),
(237, '2015-04-27 11:52:25', '127.0.0.1', 1, 'Tommy'),
(238, '2015-04-27 11:52:39', '127.0.0.1', 1, 'Asoglu'),
(239, '2015-04-27 11:54:14', '127.0.0.1', 1, 'Tommy'),
(240, '2015-04-27 11:56:20', '127.0.0.1', 1, 'Asoglu'),
(241, '2015-04-27 16:46:47', '127.0.0.1', 1, 'Tommy'),
(242, '2015-04-27 17:41:34', '127.0.0.1', 1, 'ssss'),
(243, '2015-04-27 18:13:07', '127.0.0.1', 1, 'ssss'),
(244, '2015-04-27 18:28:16', '127.0.0.1', 1, 'ssss'),
(245, '2015-04-27 18:34:41', '127.0.0.1', 1, 'ssss'),
(246, '2015-04-27 18:38:40', '127.0.0.1', 1, 'ssss'),
(247, '2015-04-27 20:07:16', '127.0.0.1', 0, 'tommy'),
(248, '2015-04-27 20:08:18', '127.0.0.1', 0, 'tommy'),
(249, '2015-04-27 20:08:26', '127.0.0.1', 0, 'tommy'),
(250, '2015-04-27 20:09:04', '127.0.0.1', 1, 'ssss'),
(251, '2015-04-27 20:14:48', '127.0.0.1', 1, 'ssss'),
(252, '2015-04-27 20:45:48', '127.0.0.1', 1, 'ssss'),
(253, '2015-04-28 13:17:04', '127.0.0.1', 1, 'ssss'),
(254, '2015-04-28 13:17:22', '127.0.0.1', 1, 'ssss'),
(255, '2015-04-28 13:26:00', '127.0.0.1', 1, 'ssss'),
(256, '2015-04-28 13:33:19', '127.0.0.1', 1, 'ssss'),
(257, '2015-04-28 16:35:43', '127.0.0.1', 1, 'ssss'),
(258, '2015-04-28 17:12:41', '127.0.0.1', 1, 'ssss'),
(259, '2015-04-28 17:17:43', '127.0.0.1', 1, 'ssss'),
(260, '2015-04-28 17:23:39', '127.0.0.1', 1, 'ssss'),
(261, '2015-04-28 17:23:52', '127.0.0.1', 1, 'ssss'),
(262, '2015-04-28 17:25:22', '127.0.0.1', 1, 'ssss'),
(263, '2015-04-29 22:59:53', '127.0.0.1', 1, 'Tommy'),
(264, '2015-04-30 05:28:53', '85.226.121.140', 1, 'Tommy'),
(265, '2015-04-30 07:23:28', '194.47.173.94', 1, 'sss'),
(266, '2015-04-30 07:24:57', '194.47.173.94', 1, 'Tommy'),
(267, '2015-04-30 07:25:54', '194.47.173.94', 1, 'Tommy'),
(268, '2015-04-30 07:26:23', '194.47.173.94', 0, 'hejhejhej'),
(269, '2015-04-30 07:26:31', '194.47.173.94', 1, 'Sahib'),
(270, '2015-04-30 07:28:30', '194.47.173.94', 1, 'Tommy');

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `CommentId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(10) NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`CommentId`),
  KEY `PostId` (`id`),
  KEY `id` (`id`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumpning av Data i tabell `comments`
--

INSERT INTO `comments` (`CommentId`, `body`, `date`, `id`, `UserId`) VALUES
(3, 'dsds', '2015-04-29 22:21:27', 295, 37),
(4, 'dsksdk', '2015-04-29 22:36:30', 295, 37),
(5, 'dsds', '2015-04-29 22:37:48', 297, 37),
(9, 'dssld', '2015-04-29 23:00:02', 297, 37),
(10, 'dssd', '2015-04-29 23:05:32', 297, 37);

-- --------------------------------------------------------

--
-- Tabellstruktur `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(100) NOT NULL,
  `CourseCode` varchar(20) NOT NULL,
  PRIMARY KEY (`CourseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`CourseId`, `CourseName`, `CourseCode`) VALUES
(16, 'Inledande programmering med C#', 'eeewf'),
(17, 'Javascript', '309DVK'),
(18, 'Shaderprogrammering', '309DVd'),
(19, 'Inledande programmering med PHP', '309DV2'),
(20, 'Java programmering', '309DV3'),
(21, 'test', '409Dsf');

-- --------------------------------------------------------

--
-- Tabellstruktur `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgName` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Post` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `imgName` (`imgName`,`code`),
  KEY `id_2` (`id`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=300 ;

--
-- Dumpning av Data i tabell `feed`
--

INSERT INTO `feed` (`id`, `imgName`, `Title`, `Post`, `code`, `Date`, `UserId`) VALUES
(295, NULL, NULL, 'dsds', NULL, '2015-04-27 11:56:13', 37),
(296, NULL, NULL, 'dsldsl', NULL, '2015-04-29 22:36:34', 37),
(297, NULL, NULL, 'dsds', NULL, '2015-04-29 22:37:43', 37);

-- --------------------------------------------------------

--
-- Tabellstruktur `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `imgId` int(11) NOT NULL AUTO_INCREMENT,
  `imgName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`imgId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ProgramId` int(11) NOT NULL AUTO_INCREMENT,
  `ProgramName` varchar(100) NOT NULL,
  PRIMARY KEY (`ProgramId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumpning av Data i tabell `program`
--

INSERT INTO `program` (`ProgramId`, `ProgramName`) VALUES
(1, 'Webbprogrammerare'),
(2, 'Utvecklare av digitala tjänster'),
(3, 'Interaktionsdesigner');

-- --------------------------------------------------------

--
-- Tabellstruktur `programcourse`
--

CREATE TABLE IF NOT EXISTS `programcourse` (
  `ProgramCourseId` int(11) NOT NULL AUTO_INCREMENT,
  `ProgramId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  PRIMARY KEY (`ProgramCourseId`),
  KEY `CourseId` (`CourseId`),
  KEY `ProgramId` (`ProgramId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumpning av Data i tabell `programcourse`
--

INSERT INTO `programcourse` (`ProgramCourseId`, `ProgramId`, `CourseId`) VALUES
(14, 2, 16),
(15, 2, 17),
(16, 3, 18),
(17, 1, 19),
(18, 2, 19),
(19, 1, 20),
(20, 2, 20),
(21, 1, 21),
(22, 2, 21),
(23, 3, 21);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `Hash` varchar(255) NOT NULL,
  `Role` int(11) NOT NULL DEFAULT '3',
  `passreset` int(11) NOT NULL,
  `imgName` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Name` (`Username`),
  UNIQUE KEY `email` (`email`),
  KEY `Id` (`UserId`),
  KEY `Id_2` (`UserId`),
  KEY `Id_3` (`UserId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`UserId`, `Username`, `email`, `Hash`, `Role`, `passreset`, `imgName`, `date`) VALUES
(37, 'Tommy', 'tn222eb@student.lnu.se', '$2a$10$yAWlJc1O1Afw.OzqHRvege3No/vPsPQiAGD6QXctK9ThN02S.EaEq', 1, 713847, '20150408_101646.jpg', '2015-04-30 00:41:35'),
(38, 'Asoglu', 'asoglu@hotmail.com', '$2a$10$d/FkM6YjVwh9bLaapb90zuOSh9qnfJRk.rPdqti6akCwF3R5TBueS', 3, 0, NULL, NULL),
(39, 'ssss', 'sahandsdsdd@hotmail.com', '$2a$10$19pBtKlQu2TVLEMmISkpDexYqbYQqWW0CITrx1dHAhV4mPa0wLhxS', 1, 0, NULL, NULL),
(40, 'Sahib', 'sahib@hotmail.se', '$2a$10$4/BfdHHdF3tT9X364LT9.Os2I5wtNtcRp39g5n6FR2nSDJNJviaYO', 1, 962622, NULL, '2015-04-30 00:17:47'),
(41, 'sss', 'saj@hotmail.com', '$2a$10$kpS3ODI0btKFcQQjhHJqOuN8t6qm60g/ZE.AGerJGUQzw74scF1xW', 3, 0, NULL, '2015-04-30 07:23:25');

-- --------------------------------------------------------

--
-- Tabellstruktur `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `userDetailid` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birthday` date DEFAULT NULL,
  `schoolForm` varchar(50) NOT NULL,
  `ProgramId` int(11) NOT NULL,
  PRIMARY KEY (`userDetailid`),
  KEY `UserId` (`UserId`),
  KEY `ProgramId` (`ProgramId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumpning av Data i tabell `userdetails`
--

INSERT INTO `userdetails` (`userDetailid`, `UserId`, `firstname`, `lastname`, `sex`, `birthday`, `schoolForm`, `ProgramId`) VALUES
(34, 37, 'Tommy', 'Nguyen', 'Man', '1994-06-13', 'Campus', 2),
(35, 38, 'Asoglu', 'Abdi', 'Man', '0000-00-00', 'Campus', 2),
(36, 39, 'ssss', 'ssss', 'Man', '1992-05-12', 'Campus', 2),
(37, 40, 'Sahib', 'Sahib', 'Man', '1990-08-05', 'Campus', 2),
(38, 41, 'sds', 'dfsfd', 'Man', '1992-12-02', 'Campus', 2);

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dsdsaads` FOREIGN KEY (`id`) REFERENCES `feed` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `feed`
--
ALTER TABLE `feed`
  ADD CONSTRAINT `feed_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `programcourse`
--
ALTER TABLE `programcourse`
  ADD CONSTRAINT `programcourse_ibfk_2` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `programcourse_ibfk_1` FOREIGN KEY (`ProgramId`) REFERENCES `program` (`ProgramId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriktioner för tabell `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_ibfk_2` FOREIGN KEY (`ProgramId`) REFERENCES `program` (`ProgramId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userdetails_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
