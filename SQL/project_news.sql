-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 05:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_name` varchar(250) NOT NULL,
  `descripion` text NOT NULL,
  `image_banner` varchar(250) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `view` varchar(50) NOT NULL,
  `keyword_seo` varchar(500) NOT NULL,
  `descripion_seo` varchar(500) NOT NULL,
  `url_articles_seo` varchar(350) NOT NULL,
  `update_at` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `user_id`, `topic_name`, `descripion`, `image_banner`, `create_at`, `view`, `keyword_seo`, `descripion_seo`, `url_articles_seo`, `update_at`, `update_by`, `status`) VALUES
(89, 19, 37, 'asdasd', '<p>asdasdasd</p>\r\n', '1395515081.jpg', '2023-05-29 08:19:21', '0', 'asdasd', 'asdasdas', 'asdasd', '2029-05-23 10:19:21', 37, 0),
(97, 9, 37, 'บุหรี่อันตราย เลิกสูบ ลดเสี่ยง คุณทำได้', '<p>บุหรี่อันตราย เลิกสูบ ลดเสี่ยง คุณทำได้</p>\r\n', '1737468328.jpg', '2023-05-29 08:05:20', '0', 'บุหรี่อันตราย ', 'บุหรี่อันตราย เลิกสูบ ลดเสี่ยง คุณทำได้', 'บุหรี่อันตราย-เลิกสูบ-ลดเสี่ยง-คุณทำได้', '0000-00-00 00:00:00', 0, 0),
(98, 15, 37, 'เทศกาลกินเจ 2565 ทั่วไทย อิ่มสุขอิ่มบุญกันปีละครั้ง', '<p>เทศกาลกินเจ 2565 ทั่วไทย อิ่มสุขอิ่มบุญกันปีละครั้ง</p>\r\n', '1899360134.jpg', '2023-05-29 08:18:55', '0', 'เทศกาลกินเจ 2565 ทั่วไทย อิ่มสุขอิ่มบุญกันปีละครั้ง', 'เทศกาลกินเจ 2565 ทั่วไทย อิ่มสุขอิ่มบุญกันปีละครั้ง', 'เทศกาลกินเจ-2565-ทั่วไทย-อิ่มสุขอิ่มบุญกันปีละครั้ง', '0000-00-00 00:00:00', 0, 0),
(99, 14, 37, 'งานบุญศีลกินทานอุบลราชธานี', '<p>งานบุญศีลกินทานอุบลราชธานี</p>\r\n', '1280890823.jpg', '2023-05-29 08:20:01', '0', 'งานบุญศีลกินทานอุบลราชธานี', 'งานบุญศีลกินทานอุบลราชธานี', 'งานบุญศีลกินทานอุบลราชธานี', '0000-00-00 00:00:00', 0, 0),
(100, 11, 37, 'test1', '<p>test1</p>\r\n', '445683373.jpg', '2023-05-29 08:36:09', '0', 'test1', 'test1', 'test1', '0000-00-00 00:00:00', 0, 0),
(101, 12, 37, 'มีไอเดีย ความสำเร็จเกิดขึ้นได้ง่ายๆ ดื่มน้ำคนมีไอเดีย', '<p>test2</p>\r\n', '1509813919.jpg', '2023-05-31 16:08:04', '2', 'test2', 'มีไอเดีย ความสำเร็จเกิดขึ้นได้ง่ายๆ ดื่มน้ำคนมีไอเดีย', 'มีไอเดีย-ความสำเร็จเกิดขึ้นได้ง่ายๆ-ดื่มน้ำคนมีไอเดีย', '2029-05-23 13:17:18', 37, 0),
(102, 12, 37, 'ว่าด้วยความแซด มื้ออาหารของเด็กๆ กับ “ภาวะทุพโภชนาการ” ปัญหาใกล้ตัวกว่าที่คิด', '<p>test3</p>\r\n', '1401796858.jpg', '2023-05-31 20:41:34', '0', 'test3', 'เลขที่ 99/8 ซอยงามดูพลี แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120เลขที่ 99/8 ซอยงามดูพลี แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120เลขที่ 99/8 ซอยงามดูพลี แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120เลขที่ 99/8 ซอยงามดูพลี แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120', 'ว่าด้วยความแซด-มื้ออาหารของเด็กๆ-กับ-??ภาวะทุพโภชนาการ-??-ปัญหาใกล้ตัวกว่าที่คิด', '2031-05-23 22:41:34', 37, 0),
(103, 13, 37, 'เลขที่ 99/8 ซอยงามดูพลี แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120เลขที่ 99/8 ซอยงามดูพลี แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120', '<p>test4</p>\r\n', '1084719180.jpg', '2023-05-30 08:53:51', '0', 'test4', 'test4', 'เลขที่-99-8-ซอยงามดูพลี-แขวงทุ่งมหาเมฆ-เขตสาทร-กรุงเทพฯ-10120เลขที่-99-8-ซอยงามดูพลี-แขวงทุ่งมหาเมฆ-เขตสาทร-กรุงเทพฯ-10120', '2030-05-23 10:53:51', 37, 0),
(104, 14, 37, 'ปัญหาความเหลื่อมล้ำเป็นปัญหาที่ซับซ้อนและเป็นปัญหารากฐานที่สำคัญอย่างหนึ่งของสังคมไทย ', '<p>test4test4</p>\r\n', '1477416563.jpg', '2023-05-31 20:39:56', '1', 'test4test4', 'ปัญหาความเหลื่อมล้ำเป็นปัญหาที่ซับซ้อนและเป็นปัญหารากฐานที่สำคัญอย่างหนึ่งของสังคมไทย โดยเฉพาะเรื่อง “การศึกษา” ที่เป็นปัญหาเรื้อรังมาอย่างยาวนาน เราต่างรู้กันดีว่า “การศึกษาคุณภาพ” คือโอกาสที่สามารถช่วยให้คนยกระดับคุณภาพชีวิตในระยะยาวได้ แต่ในทางกลับกันในประเทศไทยก็ยังมีคนที่เข้าไม่ถึงการศึกษา โดยเฉพาะเด็กๆ ในพื้นที่ห่างไกล เพราะติดกับดักความยากจนเข้ามาซ้ำเติมแม้จะมีนโยบายเรียนฟรี แต่เด็กจำนวนไม่น้อยก็ยังขาดแคลนทุนทรัพย์สำ', 'ปัญหาความเหลื่อมล้ำเป็นปัญหาที่ซับซ้อนและเป็นปัญหารากฐานที่สำคัญอย่างหนึ่งของสังคมไทย', '2031-05-23 22:39:56', 37, 0),
(105, 15, 37, 'test4test4test4', '<p>test4test4test4</p>\r\n', '1909271588.jpg', '2023-05-29 08:38:27', '0', 'test4test4test4', 'test4test4test4', 'test4test4test4', '0000-00-00 00:00:00', 0, 0),
(106, 16, 37, 'test5', '<p>test5</p>\r\n', '1159908263.jpg', '2023-05-29 08:38:25', '0', 'test5', 'test5', 'test5', '0000-00-00 00:00:00', 0, 0),
(107, 17, 37, 'test56', '<p>test56</p>\r\n', '1621746636.jpg', '2023-05-29 08:38:26', '0', 'test56', 'test56', 'test56', '0000-00-00 00:00:00', 0, 0),
(108, 18, 37, 'อาจเป็นปีที่เขียนบทความเชิงกำลังใจมากหน่อย แต่สำหรับ 10 อันดับบทความดี ๆ ที่มีผู้เข้าชมมากที่สุดประจำเว็บเราปีนี้จะเป็นเรื่องใดบ้าง', '<p>test7</p>\r\n', '1557685320.jpg', '2023-06-01 19:23:12', '0', 'test7', 'test7', 'อาจเป็นปีที่เขียนบทความเชิงกำลังใจมากหน่อย-แต่สำหรับ-10-อันดับบทความดี-ๆ-ที่มีผู้เข้าชมมากที่สุดประจำเว็บเราปีนี้จะเป็นเรื่องใดบ้าง', '2001-06-23 21:23:12', 37, 0),
(109, 19, 37, 'การเดินทางตลอดหนึ่งปีที่ผ่านมา เราต้องเจอกับเรื่องราวมากมาย', '<p>งานวิจัย</p>\r\n', '1486158604.jpg', '2023-05-29 09:35:51', '0', 'งานวิจัย', 'งานวิจัย', 'การเดินทางตลอดหนึ่งปีที่ผ่านมา-เราต้องเจอกับเรื่องราวมากมาย', '2029-05-23 11:35:51', 37, 0),
(110, 9, 40, 'ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน)', '<p>testuser</p>\r\n', '330201781.jpg', '2023-05-31 20:25:06', '0', 'testuser', 'ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน)ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน)ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน)', 'ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน-mojo-อีสาน', '2031-05-23 22:25:06', 37, 0),
(111, 18, 37, 'จากยอดผู้ชมจัดอันดับเฉพาะสถิติเฉพาะปีนี้เท่านั้น สามารถคลิ๊กที่ชื่อบทความเพื่อเข้าไปอ่านได้เลยครับ', '<p>จากยอดผู้ชมจัดอันดับเฉพาะสถิติเฉพาะปีนี้เท่านั้น สามารถคลิ๊กที่ชื่อบทความเพื่อเข้าไปอ่านได้เลยครับ</p>\r\n', '936637857.jpg', '2023-06-01 19:27:53', '0', 'จากยอดผู้ชมจัดอันดับเฉพาะสถิติเฉพาะปีนี้เท่านั้น สามารถคลิ๊กที่ชื่อบทความเพื่อเข้าไปอ่านได้เลยครับ', 'จากยอดผู้ชมจัดอันดับเฉพาะสถิติเฉพาะปีนี้เท่านั้น สามารถคลิ๊กที่ชื่อบทความเพื่อเข้าไปอ่านได้เลยครับจากยอดผู้ชมจัดอันดับเฉพาะสถิติเฉพาะปีนี้เท่านั้น สามารถคลิ๊กที่ชื่อบทความเพื่อเข้าไปอ่านได้เลยครับ', 'จากยอดผู้ชมจัดอันดับเฉพาะสถิติเฉพาะปีนี้เท่านั้น-สามารถคลิ๊กที่ชื่อบทความเพื่อเข้าไปอ่านได้เลยครับ', '0000-00-00 00:00:00', 0, 0),
(112, 18, 37, 'คงไม่สำคัญว่า 10 อันดับบทความจะถูกใจหรือไม่ แต่เชื่อว่าทั้ง 10 บทความมีประโยชน์ไม่มากก็น้อยต่างกันไป หากถูกใจก็แชร์ต่อไปให้คนได้ประโยชน์ร่วมกันนะครับ', '<p>คงไม่สำคัญว่า 10 อันดับบทความจะถูกใจหรือไม่ แต่เชื่อว่าทั้ง 10 บทความมีประโยชน์ไม่มากก็น้อยต่างกันไป หากถูกใจก็แชร์ต่อไปให้คนได้ประโยชน์ร่วมกันนะครับ</p>\r\n', '1242206325.jpg', '2023-06-01 19:27:54', '0', 'คงไม่สำคัญว่า 10 อันดับบทความจะถูกใจหรือไม่ แต่เชื่อว่าทั้ง 10 บทความมีประโยชน์ไม่มากก็น้อยต่างกันไป หากถูกใจก็แชร์ต่อไปให้คนได้ประโยชน์ร่วมกันนะครับ', 'คงไม่สำคัญว่า 10 อันดับบทความจะถูกใจหรือไม่ แต่เชื่อว่าทั้ง 10 บทความมีประโยชน์ไม่มากก็น้อยต่างกันไป หากถูกใจก็แชร์ต่อไปให้คนได้ประโยชน์ร่วมกันนะครับ', 'คงไม่สำคัญว่า-10-อันดับบทความจะถูกใจหรือไม่-แต่เชื่อว่าทั้ง-10-บทความมีประโยชน์ไม่มากก็น้อยต่างกันไป-หากถูกใจก็แชร์ต่อไปให้คนได้ประโยชน์ร่วมกันนะครับ', '0000-00-00 00:00:00', 0, 0),
(113, 15, 37, 'ก็หากถูกใจ หรือชอบบทความไหนอยากให้คอมเม้นท์บอกกันบ้างนะครับ หรืออยากให้เขียนเรื่องอะไร แนะนำกันมาได้เช่นกัน…', '<p>ก็หากถูกใจ หรือชอบบทความไหนอยากให้คอมเม้นท์บอกกันบ้างนะครับ หรืออยากให้เขียนเรื่องอะไร แนะนำกันมาได้เช่นกัน&hellip;</p>\r\n', '1265177924.jpg', '2023-06-01 20:18:54', '0', 'ก็หากถูกใจ หรือชอบบทความไหนอยากให้คอมเม้นท์บอกกันบ้างนะครับ หรืออยากให้เขียนเรื่องอะไร แนะนำกันมาได้เช่นกัน…', 'ก็หากถูกใจ หรือชอบบทความไหนอยากให้คอมเม้นท์บอกกันบ้างนะครับ หรืออยากให้เขียนเรื่องอะไร แนะนำกันมาได้เช่นกัน…', 'ก็หากถูกใจ-หรือชอบบทความไหนอยากให้คอมเม้นท์บอกกันบ้างนะครับ-หรืออยากให้เขียนเรื่องอะไร-แนะนำกันมาได้เช่นกัน-??', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `page_id` int(10) NOT NULL,
  `cate_url` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `page_id`, `cate_url`) VALUES
(9, 'โครงการ EVENT พื้นที่/ชุมชน', 1, 'โครงการ-event-พื้นที่-ชุมชน'),
(10, 'บุญศิลกินทาน', 1, 'บุญศิลกินทาน'),
(11, 'สถานการณ์พื่นที่', 1, 'สถานการณ์พื่นที่'),
(12, 'เศรฐกิจชุมชน/เมือง', 1, 'เศรฐกิจชุมชน-เมือง'),
(13, 'HEALTH/สุขภาพ', 1, 'health-สุขภาพ'),
(14, 'การศึกษา', 2, 'การศึกษา'),
(15, 'ทัศนะคติ', 2, 'ทัศนะคติ'),
(16, 'กาย+จิต+สังคม+ปัญญา', 2, 'กาย-จิต-สังคม-ปัญญา'),
(17, 'สุขภาวะ', 2, 'สุขภาวะ'),
(18, 'ให้ความรู้', 2, 'ให้ความรู้'),
(19, 'งานวิจัย', 3, 'งานวิจัย');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `avthur_name` varchar(250) NOT NULL,
  `rating_score` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `comment` varchar(450) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_articles`
--

CREATE TABLE `image_articles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image_podcast` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`id`, `name`, `location`, `image_podcast`, `title`, `category_id`, `user_id`, `create_at`, `status`) VALUES
(3, 'Justine-Wizkid.mp3', '643207077.mp3', '1343073424.jpg', 'นิทานก้อม', 1, 37, '2023-05-30 06:26:41', 0),
(4, '154176472.mp3', '544056531.mp3', '1872865452.jpg', 'ไทบ้านโสเหล่', 2, 37, '2023-05-30 06:26:41', 0),
(5, '643207077.mp3', '367438047.mp3', '508646906.jpg', 'ออนซอนอีสาน', 3, 38, '2023-05-30 06:26:41', 0),
(6, '154176472.mp3', '942655102.mp3', '2132916185.jpg', 'หมอลำพาม่วน', 4, 40, '2023-06-02 11:15:29', 0),
(7, '643207077.mp3', '155130692.mp3', '692508752.jpg', 'AAAAAA', 1, 40, '2023-05-31 01:55:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `keyword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `name`, `keyword`) VALUES
(1, 'Admin', 'A'),
(2, 'Webmaster', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tag_url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `tag_url`, `user_id`, `create_at`) VALUES
(15, 'tag 3', 'tag-3', 36, '2022-02-17 02:37:14'),
(16, 'tag 4', 'tag-4', 36, '2022-02-17 02:34:15'),
(18, 'น้ำท่วม', 'น้ำท่วม', 37, '2023-05-31 13:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `tag_log`
--

CREATE TABLE `tag_log` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tag_log`
--

INSERT INTO `tag_log` (`id`, `tag_id`, `articles_id`, `create_by`) VALUES
(250, 15, 80, 0),
(185, 16, 82, 0),
(244, 16, 71, 0),
(239, 15, 73, 0),
(204, 15, 74, 0),
(203, 14, 74, 0),
(241, 15, 79, 0),
(240, 14, 79, 0),
(248, 14, 78, 0),
(247, 17, 78, 0),
(249, 14, 80, 0),
(193, 15, 77, 0),
(192, 14, 77, 0),
(255, 13, 75, 0),
(254, 15, 75, 0),
(238, 13, 73, 0),
(237, 14, 72, 0),
(236, 15, 72, 0),
(243, 13, 71, 0),
(242, 14, 71, 0),
(184, 15, 82, 0),
(246, 17, 83, 0),
(245, 14, 83, 0),
(257, 14, 84, 0),
(256, 13, 84, 0),
(253, 15, 85, 0),
(252, 14, 85, 0),
(251, 16, 85, 0),
(265, 14, 15, 0),
(266, 16, 8, 0),
(267, 15, 14, 0),
(268, 16, 87, 40),
(269, 15, 88, 37),
(285, 17, 89, 0),
(284, 15, 89, 0),
(281, 17, 90, 0),
(280, 16, 90, 0),
(275, 16, 93, 38),
(276, 16, 94, 37),
(277, 17, 94, 37),
(282, 16, 97, 37),
(283, 15, 98, 37),
(286, 16, 99, 37),
(287, 16, 100, 37),
(298, 17, 101, 0),
(305, 18, 102, 0),
(301, 17, 103, 0),
(304, 15, 104, 0),
(292, 17, 105, 37),
(293, 15, 106, 37),
(294, 14, 107, 37),
(306, 16, 108, 0),
(297, 13, 109, 0),
(307, 18, 111, 37);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `firstname`, `lastname`, `email`, `province`, `username`, `password`, `image_path`, `status`) VALUES
(37, 1, 'admin', 'admin', 'sattakitkk@gmail.com', 'yasothon', 'admin', '6c31fc0f69bbf07cba275ff861d99123', '1721305661.jpg', 0),
(38, 2, 'a1', 'a1', ' sattakit_kk@hotmail.com', ' yasothon', 'a1', '202cb962ac59075b964b07152d234b70', '1896891735.jpg', 0),
(40, 2, 'กฤษณะ', 'แสวงสุข', ' tom@gmail.com', 'อุบลราชธานี', 'tomyou', '572966786f1d41604c7a687db3b245a0', '1334813037.png', 1),
(42, 2, 'aaa', 'bbb', ' ccc@ccc@gmail.com', ' asdads', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '1383958600.png', 1),
(43, 2, 'asdasda', 'sdasdas', ' dasd', ' asdasdas', 'dasdas', '0df01ae7dd51cec48fed56952f40842b', '326643883.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `v_title` varchar(255) NOT NULL,
  `videoUrl` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image_video` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `v_title`, `videoUrl`, `location`, `image_video`, `user_id`, `create_at`, `status`) VALUES
(20, NULL, 'ชีวิตคือการเดินทางชีวิตคือการเดินทางชีวิตคือการเดินทางชีวิตคือการเดินทางชีวิตคือการเดินทางชีวิตคือการเดินทาง', 'https://youtu.be/X1NszMxd0Yc', NULL, '', 40, '2023-05-31 11:30:18', 0),
(21, NULL, 'ฝันครั้งที่1ฝันครั้งที่1ฝันครั้งที่1ฝันครั้งที่1ฝันครั้งที่1ฝันครั้งที่1ฝันครั้งที่1', 'https://youtu.be/3O_Hxdtoyac', NULL, '', 37, '2023-05-31 11:30:17', 0),
(22, NULL, 'ฝันครั้งที่2ฝันครั้งที่2ฝันครั้งที่2ฝันครั้งที่2ฝันครั้งที่2ฝันครั้งที่2ฝันครั้งที่2ฝันครั้งที่2', 'https://youtu.be/3O_Hxdtoyac', NULL, '', 37, '2023-05-30 06:18:45', 0),
(23, NULL, 'ฝันครั้งที่3ฝันครั้งที่3ฝันครั้งที่3ฝันครั้งที่3ฝันครั้งที่3ฝันครั้งที่3ฝันครั้งที่3ฝันครั้งที่3ฝันครั้งที่3', 'https://youtu.be/3O_Hxdtoyac', NULL, '', 37, '2023-05-31 11:20:41', 1),
(24, NULL, 'ลืมแทบไม่ไหว', 'https://youtu.be/qisB560o2Pc', NULL, '', 40, '2023-05-30 06:23:33', 0),
(43, 'keshi-limbo-visualizer-easysave.net.mp4', 'sgsgsthstha5tgha5gahg323525425', NULL, '163649892.mp4', '', 0, '2023-06-13 15:16:01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_articles`
--
ALTER TABLE `image_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_log`
--
ALTER TABLE `tag_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `image_articles`
--
ALTER TABLE `image_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tag_log`
--
ALTER TABLE `tag_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
