-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2020 at 04:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martdevelopers_iLibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `iL_BookCategories`
--

CREATE TABLE `iL_BookCategories` (
  `bc_id` int(20) NOT NULL,
  `bc_code` varchar(200) NOT NULL,
  `bc_name` varchar(200) NOT NULL,
  `bc_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_BookCategories`
--

INSERT INTO `iL_BookCategories` (`bc_id`, `bc_code`, `bc_name`, `bc_desc`) VALUES
(4, 'BC-CAVGI', 'Non-fiction', 'Nonfiction or non-fiction is content that purports in good faith to represent truth and accuracy regarding information, events, or people. Nonfiction content may be presented either objectively or subjectively, and may sometimes take the form of a story. This is an updated book category description'),
(5, 'BC-JVQBM', 'Fiction', 'A fiction is a deliberately fabricated account of something. It can also be a literary work based on imagination rather than on fact, like a novel or short story. The Latin word fictus means â€œto form,â€ which seems like a good source for the English word fiction, since fiction is formed in the imagination.'),
(6, 'BC-AHGWJ', 'References', 'Reference materials are various sources that provide background information or quick facts on any given topic.');

-- --------------------------------------------------------

--
-- Table structure for table `iL_Books`
--

CREATE TABLE `iL_Books` (
  `b_id` int(20) NOT NULL,
  `b_title` varchar(200) NOT NULL,
  `b_author` varchar(200) NOT NULL,
  `b_isbn_no` varchar(200) NOT NULL,
  `b_publisher` varchar(200) NOT NULL,
  `b_coverimage` varchar(200) NOT NULL,
  `bc_id` varchar(200) NOT NULL,
  `bc_name` varchar(200) NOT NULL,
  `b_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `b_summary` longtext NOT NULL,
  `b_copies` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_Books`
--

INSERT INTO `iL_Books` (`b_id`, `b_title`, `b_author`, `b_isbn_no`, `b_publisher`, `b_coverimage`, `bc_id`, `bc_name`, `b_status`, `created_at`, `b_summary`, `b_copies`) VALUES
(1, 'Practical Web 2.0 Applications With PHP', 'Quentin Zervaas', '978-1-59059-906-8', 'Apress', 'Screenshot from 2020-04-03 12-16-57.png', '6', 'References', 'Available', '2020-04-23 13:32:20.331824', 'Many of today\'s web development books and articles cover single aspects of the development life cycle, delving only into specific features rather than looking at the whole picture. In this book, we will develop a complete web application. Although we will be using various third-party libraries and tools to aid in development, we will be developing the application from start to finish. The focus of this book is on Web 2. 0, a catchphrase that has been in use for a few years now and is typically used to refer to web sites or web applications that have particular char- teristics. Some of these characteristics include the following:  Correctly using HTML/XHTML, CSS, and other standards Using Ajax (Asynchronous JavaScript and XML) to provide a responsive application without requiring a full refresh of pages  Allowing syndication of web site content using RSS Adding wikis, blogs, or tags Although not everybody is an advocate of the Web 2. 0 phrase, the term does signify forward progress in web development. And although not everybody has the need to provide a wiki or a blog on their web site, the other characteristics listed (such as correct standards usage) provide a good basis for a web site and should be used by all developers, regardless of how they want their web site or application categorized. I wrote this book because I want to share with other users how I build web sites.', '49'),
(2, 'Adobe Dreamweaver CS4 Complete', 'Shelly Wells', 'ISBN-13: 978-0-324-78832-7', 'Cengange Learning', 'IMG_20200413_112931_6.jpg', '6', 'References', 'Available', '2020-04-21 11:42:33.568354', 'Adobe Dreamweaver CS4: Complete Concepts and Techniques gives students a complete introduction to Web design and Development using the Adobe Dreamweaver CS4 software.Visually-dynamic chapters and ongoing central project allow students to gain the skills necessary to build exciting, professional looking websites and more! Real-World, hands on training successful prepares students to use Dreamweaver CS4 in their professional and personal lives.', '86'),
(3, 'Unix Fundermentals', 'Harley Hann', 'ISBN 0-07-025511-3', 'Mc Graw Hill', 'IMG_20200413_111712_8.jpg', '6', 'References', 'Available', '2020-04-20 11:07:34.340681', 'This book will show you how to Use Unix operating system effectively.You will learn: What is UNIX, and why is so important, useful and satisfying. How UNIX world is connected, How to start using Unix and which UNIX programs and features you can use immediately.', '46'),
(4, 'The Immortal Life of Henrietta Lacks', 'Rebecca Skloot', 'ISBN 0-13-681095-1', 'Crown Publishing Group', 'Rebecca Skloot.jpeg', '4', 'Non-fiction', 'Available', '2020-04-23 11:02:42.194390', 'The book is about Henrietta Lacks and the immortal cell line, known as HeLa, that came from Lacks\'s cervical cancer cells in 1951. Skloot became interested in Lacks after a biology teacher referenced her, but didn\'t know much about her. Skloot began conducting extensive research on her and worked with Lacks\' family to create the book. The book is notable for its science writing and dealing with ethical issues of race and class in medical research. Skloot said that some of the information was taken from the journal of Deborah Lacks, Henrietta Lacks\'s daughter, as well as from \"archival photos and documents, scientific and historical research.\" It is Skloot\'s first book.', '198'),
(5, 'Nineteen Eighty-Four', 'George Orwell', 'ISBN 0-13-379061-1', 'Secker & Warburg Publishers', '1984.jpg', '5', 'Fiction', 'Available', '2020-04-23 10:58:42.497288', 'Nineteen Eighty-Four: A Novel, often published as 1984, is a dystopian novel by English novelist George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell\'s ninth and final book completed in his lifetime. The story was mostly written at Barnhill, a farmhouse on the Scottish island of Jura, at times while Orwell suffered from severe tuberculosis. Thematically, Nineteen Eighty-Four centres on the consequences of government over-reach, totalitarianism, mass surveillance, and repressive regimentation of all persons and behaviours within society.\r\n\r\nThe story takes place in an imagined future, the year 1984, when much of the world has fallen victim to perpetual war, omnipresent government surveillance, historical negationism, and propaganda. Great Britain, known as Airstrip One, has become a province of a superstate named Oceania that is ruled by the Party who employ the Thought Police to persecute individuality and independent thinking.[4] Big Brother, the leader of the Party, enjoys an intense cult of personality despite the fact that he may not exist. The protagonist, Winston Smith, is a diligent and skillful rank-and-file worker and Party member who secretly hates the Party and dreams of rebellion. He enters a forbidden relationship with a co-worker, Julia.\r\n\r\nNineteen Eighty-Four has become a classic literary example of political and dystopian fiction. Many terms used in the novel have entered common usage, including Big Brother, doublethink, thoughtcrime, Newspeak, Room 101, telescreen, 2 + 2 = 5, prole, and memory hole. Nineteen Eighty-Four also popularised the adjective \"Orwellian\", connoting things such as official deception, secret surveillance, brazenly misleading terminology, and manipulation of recorded history by a totalitarian or authoritarian state. Time included it on its 100 best English-language novels from 1923 to 2005.[5] It was placed on the Modern Library\'s 100 Best Novels, reaching No. 13 on the editors\' list and No. 6 on the readers\' list.[6] In 2003, the novel was listed at No. 8 on The Big Read survey by the BBC.[7] Parallels have been drawn between the novel\'s subject matter and real life instances of totalitarianism, communism, mass surveillance, and violations of freedom of expression among other themes.', '56');

-- --------------------------------------------------------

--
-- Table structure for table `iL_ChargesRates`
--

CREATE TABLE `iL_ChargesRates` (
  `cr_id` int(20) NOT NULL,
  `cr_code` varchar(200) NOT NULL,
  `cr_name` varchar(200) NOT NULL,
  `cr_amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_ChargesRates`
--

INSERT INTO `iL_ChargesRates` (`cr_id`, `cr_code`, `cr_name`, `cr_amount`) VALUES
(1, 'XTUOB', 'Lost Book', '1000'),
(2, 'QPDSY', 'Damaged Book', '600'),
(4, 'EVNUI', 'Late Return', '500');

-- --------------------------------------------------------

--
-- Table structure for table `iL_Fines`
--

CREATE TABLE `iL_Fines` (
  `f_id` int(200) NOT NULL,
  `f_type` varchar(200) NOT NULL,
  `f_amt` varchar(200) NOT NULL,
  `f_payment_code` varchar(200) NOT NULL,
  `s_id` varchar(200) NOT NULL,
  `s_number` varchar(200) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `f_status` varchar(200) NOT NULL,
  `f_checksum` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_Fines`
--

INSERT INTO `iL_Fines` (`f_id`, `f_type`, `f_amt`, `f_payment_code`, `s_id`, `s_number`, `s_name`, `f_status`, `f_checksum`, `created_at`) VALUES
(11, 'Damaged Book', '600', 'TQSZPCUBHR', '6', 'iLib-59213', 'Student 004', 'Paid', '3f7ac931a9f7042411f7d851459d441258ef1af4', '2020-04-23 13:41:53.411860'),
(12, 'Lost Book', '1000', 'KVNLBTUXGP', '6', 'iLib-59213', 'Student 004', 'Paid', '52faed65cfc51f15802600f8ec7cb27da65cddac', '2020-04-23 13:48:22.641902');

-- --------------------------------------------------------

--
-- Table structure for table `iL_Librarians`
--

CREATE TABLE `iL_Librarians` (
  `l_id` int(20) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `l_number` varchar(200) NOT NULL,
  `l_email` varchar(200) NOT NULL,
  `l_pwd` varchar(200) NOT NULL,
  `l_bio` longtext NOT NULL,
  `l_phone` varchar(200) NOT NULL,
  `l_adr` varchar(200) NOT NULL,
  `l_dpic` varchar(200) NOT NULL,
  `l_acc_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_Librarians`
--

INSERT INTO `iL_Librarians` (`l_id`, `l_name`, `l_number`, `l_email`, `l_pwd`, `l_bio`, `l_phone`, `l_adr`, `l_dpic`, `l_acc_status`, `created_at`) VALUES
(2, 'Librarian 001', 'iLib-10794', 'lib001@ilib.org', 'c6bd71c6e0f6a6c9b71d0b8571c99c27bfa7e8f0', '', '+254740847563', '127001 Localhost', '', 'Active', '2020-04-19 16:35:30.235126'),
(3, 'Librarian 002', 'iLib-24567', 'lib002@ilib.org', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '+254740847908', '127001 Localhost', 'juan1.png', 'Active', '2020-04-21 09:44:07.011690');

-- --------------------------------------------------------

--
-- Table structure for table `iL_LibraryOperations`
--

CREATE TABLE `iL_LibraryOperations` (
  `lo_id` int(20) NOT NULL,
  `lo_type` varchar(200) NOT NULL,
  `lo_number` varchar(200) NOT NULL,
  `s_id` varchar(200) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_number` varchar(200) NOT NULL,
  `l_id` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `l_number` varchar(200) NOT NULL,
  `bc_id` varchar(200) NOT NULL,
  `bc_name` varchar(200) NOT NULL,
  `b_id` varchar(200) NOT NULL,
  `b_title` varchar(200) NOT NULL,
  `b_isbn_no` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `lo_checksum` varchar(200) NOT NULL,
  `lo_status` varchar(200) NOT NULL,
  `lo_return_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_LibraryOperations`
--

INSERT INTO `iL_LibraryOperations` (`lo_id`, `lo_type`, `lo_number`, `s_id`, `s_name`, `s_number`, `l_id`, `l_name`, `l_number`, `bc_id`, `bc_name`, `b_id`, `b_title`, `b_isbn_no`, `created_at`, `lo_checksum`, `lo_status`, `lo_return_date`) VALUES
(21, 'Borrow', '895476', '6', 'Student 004', 'iLib-59213', '', '', '', '6', 'References', '1', 'Practical Web 2.0 Applications With PHP', '978-1-59059-906-8', '2020-04-23 10:55:09.161761', 'zdrimafphnwuvbyxtjcq', 'Returned', '2020-04-30'),
(22, 'Borrow', '801253', '6', 'Student 004', 'iLib-59213', '', '', '', '5', 'Fiction', '5', 'Nineteen Eighty-Four', 'ISBN 0-13-379061-1', '2020-04-23 10:58:42.371502', 'rwgnxszehkymvbcqdipj', 'Damanged', '2020-04-30'),
(23, 'Borrow', '259640', '6', 'Student 004', 'iLib-59213', '', '', '', '4', 'Non-fiction', '4', 'The Immortal Life of Henrietta Lacks', 'ISBN 0-13-681095-1', '2020-04-23 11:02:42.094734', 'mfxuzywbitdlaqrgskco', 'Lost', '2020-04-30'),
(24, 'Borrow', '481207', '6', 'Student 004', 'iLib-59213', '', '', '', '6', 'References', '1', 'Practical Web 2.0 Applications With PHP', '978-1-59059-906-8', '2020-04-23 13:32:20.039884', '50590c4ab6f21319f14b03e6c05c45bc7a87f503', '', '2020-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `iL_messages`
--

CREATE TABLE `iL_messages` (
  `id` int(20) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `receiver_id` varchar(200) NOT NULL,
  `send_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_messages`
--

INSERT INTO `iL_messages` (`id`, `sender`, `receiver`, `content`, `sender_id`, `receiver_id`, `send_at`) VALUES
(2, 'TrueHost Inc', 'MartDevelopers Inc', 'Hi @MartDeveloper,hope you doing good. Your invoice has been processed.', '0', '1', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `iL_notifications`
--

CREATE TABLE `iL_notifications` (
  `id` int(20) NOT NULL,
  `content` longtext NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_notifications`
--

INSERT INTO `iL_notifications` (`id`, `content`, `user_id`, `created_at`) VALUES
(1, 'Server 001 (Orion Server) operating at 100 % optimum.', '1', '0000-00-00 00:00:00.000000'),
(2, 'Practical Web 2.0 Applications With PHP, ISBN NO: 978-1-59059-906-8 Has been borrowed', '1', '2020-04-20 10:54:30.414376'),
(3, 'Adobe Dreamweaver CS4 Complete, ISBN NO: ISBN-13: 978-0-324-78832-7 Has been returned', '1', '2020-04-20 10:58:51.725060'),
(4, 'Practical Web 2.0 Applications With PHP, ISBN NO: 978-1-59059-906-8 Has been reported lost.', '1', '2020-04-20 11:02:25.052180'),
(5, 'Unix Fundermentals, ISBN NO: ISBN 0-07-025511-3 Has been borrowed', '1', '2020-04-20 11:07:10.641909'),
(6, 'Unix Fundermentals, ISBN NO: ISBN 0-07-025511-3 Has been returned as a damanged book.', '1', '2020-04-20 11:07:34.499307'),
(7, 'Ksh 1000 Has been paid as a fine for Lost Book', '1', '2020-04-20 11:12:00.421075'),
(8, 'Ksh 1000 Has been paid as a fine for Lost Book', '1', '2020-04-20 11:12:33.908551'),
(9, 'Adobe Dreamweaver CS4 Complete, ISBN NO: ISBN-13: 978-0-324-78832-7 Has been borrowed', '1', '2020-04-21 11:26:24.578722'),
(10, 'Adobe Dreamweaver CS4 Complete, ISBN NO: ISBN-13: 978-0-324-78832-7 Has been borrowed', '1', '2020-04-21 11:26:59.547041'),
(11, 'Nineteen Eighty-Four, ISBN NO: ISBN 0-13-379061-1 Has been borrowed', '1', '2020-04-21 11:27:50.671456'),
(12, 'The Immortal Life of Henrietta Lacks, ISBN NO: ISBN 0-13-681095-1 Has been borrowed', '1', '2020-04-21 11:29:39.512183'),
(13, 'Adobe Dreamweaver CS4 Complete, ISBN NO: ISBN-13: 978-0-324-78832-7 Has been returned', '1', '2020-04-21 11:37:10.097938'),
(14, 'Nineteen Eighty-Four, ISBN NO: ISBN 0-13-379061-1 Has been reported lost.', '1', '2020-04-21 11:40:01.880245'),
(15, 'Adobe Dreamweaver CS4 Complete, ISBN NO: ISBN-13: 978-0-324-78832-7 Has been returned as a damanged book.', '1', '2020-04-21 11:42:33.931608'),
(16, 'The Immortal Life of Henrietta Lacks, ISBN NO: ISBN 0-13-681095-1 Has been returned', '1', '2020-04-21 11:49:22.880157'),
(17, 'Ksh 1000 Has been paid as a fine for Lost Book', '1', '2020-04-21 12:20:16.850445'),
(18, 'Ksh 600 Has been paid as a fine for Damaged Book', '1', '2020-04-21 12:20:32.977956'),
(19, 'Practical Web 2.0 Applications With PHP, ISBN NO: 978-1-59059-906-8 Has been borrowed', '1', '2020-04-23 10:34:36.988780'),
(20, 'Practical Web 2.0 Applications With PHP, ISBN NO: 978-1-59059-906-8 Has been returned', '1', '2020-04-23 10:55:09.309200'),
(21, 'Nineteen Eighty-Four, ISBN NO: ISBN 0-13-379061-1 Has been borrowed', '1', '2020-04-23 10:58:23.022505'),
(22, 'Nineteen Eighty-Four, ISBN NO: ISBN 0-13-379061-1 Has been returned as a damanged book.', '1', '2020-04-23 10:58:42.680808'),
(23, 'The Immortal Life of Henrietta Lacks, ISBN NO: ISBN 0-13-681095-1 Has been borrowed', '1', '2020-04-23 11:01:54.950067'),
(24, 'The Immortal Life of Henrietta Lacks, ISBN NO: ISBN 0-13-681095-1 Has been reported lost.', '1', '2020-04-23 11:02:42.303080'),
(25, 'Practical Web 2.0 Applications With PHP, ISBN NO: 978-1-59059-906-8 Has been borrowed', '1', '2020-04-23 13:32:20.448552'),
(26, 'Ksh 600 Has been paid as a fine for Damaged Book', '1', '2020-04-23 13:41:53.263587'),
(27, 'Ksh 1000 Has been paid as a fine for Lost Book', '1', '2020-04-23 13:48:22.361684');

-- --------------------------------------------------------

--
-- Table structure for table `iL_PasswordResets`
--

CREATE TABLE `iL_PasswordResets` (
  `pr_id` int(20) NOT NULL,
  `pr_useremail` varchar(200) NOT NULL,
  `pr_usertype` varchar(200) NOT NULL,
  `pr_dummypwd` varchar(200) NOT NULL,
  `pr_token` varchar(200) NOT NULL,
  `pr_status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_PasswordResets`
--

INSERT INTO `iL_PasswordResets` (`pr_id`, `pr_useremail`, `pr_usertype`, `pr_dummypwd`, `pr_token`, `pr_status`, `created_at`) VALUES
(4, 'lib002@ilib.org', 'Librarian', '9UWEOL5YMF', '8b652d8ad3549176cdc3d78fc59bfc71f5810b86', 'Pending', '2020-04-20 21:34:36'),
(5, 'student004@gmail.com', 'Student', 'PHTIFKQGU2', 'c22335c0f48a0309b57c1f009ddae19e3dbafa88', 'Pending', '2020-04-23 10:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `iL_Reccomendations`
--

CREATE TABLE `iL_Reccomendations` (
  `iR_id` int(20) NOT NULL,
  `iR_Booktitle` varchar(200) NOT NULL,
  `iR_author` varchar(200) NOT NULL,
  `iR_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_Reccomendations`
--

INSERT INTO `iL_Reccomendations` (`iR_id`, `iR_Booktitle`, `iR_author`, `iR_desc`) VALUES
(1, 'HTML and CSS: Design and Build Websites', 'Jon Duckett', 'A full-color introduction to the basics of HTML and CSS from the publishers of Wrox! \r\n\r\nEvery day, more and more people want to learn some HTML and CSS. Joining the professional web designers and programmers are new audiences who need to know a little bit of code at work (update a content management system or e-commerce store) and those who want to make their personal blogs more attractive. Many books teaching HTML and CSS are dry and only written for those who want to become programmers, which is why this book takes an entirely new approach.\r\n\r\n    Introduces HTML and CSS in a way that makes them accessible to everyoneâ€”hobbyists, students, and professionalsâ€”and itâ€™s full-color throughout\r\n    Utilizes information graphics and lifestyle photography to explain the topics in a simple way that is engaging\r\n    Boasts a unique structure that allows you to progress through the chapters from beginning to end or just dip into topics of particular interest at your leisure\r\n\r\nThis educational book is one that you will enjoy picking up, reading, then referring back to. It will make you wish other technical topics were presented in such a simple, attractive and engaging way!\r\n\r\nThis book is also available as part of a set in hardcover - Web Design with HTML, CSS, JavaScript and jQuery, 9781119038634; and in softcover - Web Design with HTML, CSS, JavaScript and jQuery, 9781118907443.');

-- --------------------------------------------------------

--
-- Table structure for table `iL_receivedMails`
--

CREATE TABLE `iL_receivedMails` (
  `rm_id` int(20) NOT NULL,
  `sm_id` varchar(200) NOT NULL,
  `sm_title` varchar(200) NOT NULL,
  `sm_receiverNo` varchar(200) NOT NULL,
  `sm_senderNo` varchar(200) NOT NULL,
  `sm_senderName` varchar(200) NOT NULL,
  `sm_receiverName` varchar(200) NOT NULL,
  `sm_reply` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iL_sendMails`
--

CREATE TABLE `iL_sendMails` (
  `sm_id` int(20) NOT NULL,
  `sm_title` varchar(200) NOT NULL,
  `sm_senderNo` varchar(200) NOT NULL,
  `sm_receiverNo` varchar(200) NOT NULL,
  `sm_senderName` varchar(200) NOT NULL,
  `sm_receiverName` varchar(200) NOT NULL,
  `sm_sentMail` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_sendMails`
--

INSERT INTO `iL_sendMails` (`sm_id`, `sm_title`, `sm_senderNo`, `sm_receiverNo`, `sm_senderName`, `sm_receiverName`, `sm_sentMail`, `created_at`) VALUES
(1, 'Test Mail', '', 'iLib-37508', 'System Admin', 'Student 001', 'Hello this is a test mail.', '2020-04-18 13:23:17.946244'),
(2, 'Test Mail 2', '', 'iLib-89325', 'System Admin', 'Student 002', 'This is not an emergency broadcast. Its a mail functionality test', '2020-04-18 13:26:22.527257'),
(3, 'Lost Book Payment', '', 'iLib-74291', 'Library Staff', 'Student 005', 'Hello, hope you are doing well, please make sure you pay for the lost book asap.', '2020-04-22 13:14:59.155093'),
(4, 'Test Mail', '', 'iLib-24567', 'System Admin', 'Library Staff', 'Hello @ Librarian 002. Hope you doing good, so hows the going?\r\n', '2020-04-22 13:30:42.802898');

-- --------------------------------------------------------

--
-- Table structure for table `iL_Students`
--

CREATE TABLE `iL_Students` (
  `s_id` int(20) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_number` varchar(200) NOT NULL,
  `s_email` varchar(200) NOT NULL,
  `s_pwd` varchar(200) NOT NULL,
  `s_sex` varchar(200) NOT NULL,
  `s_phone` varchar(200) NOT NULL,
  `s_bio` longtext NOT NULL,
  `s_adr` varchar(200) NOT NULL,
  `s_dpic` varchar(200) NOT NULL,
  `s_acc_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_Students`
--

INSERT INTO `iL_Students` (`s_id`, `s_name`, `s_number`, `s_email`, `s_pwd`, `s_sex`, `s_phone`, `s_bio`, `s_adr`, `s_dpic`, `s_acc_status`, `created_at`) VALUES
(3, 'Student 001', 'iLib-37508', 'student001@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Male', '+906756432', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '127001 Localhost', '', 'Active', '2020-04-21 10:34:53.036587'),
(4, 'Student 002', 'iLib-89325', 'student002@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Female', '+23498876547', '', '127001 Localhost', '', 'Active', '2020-04-13 09:45:02.370674'),
(5, 'Student 003', 'iLib-12487', 'student003@gmail.com', 'c6bd71c6e0f6a6c9b71d0b8571c99c27bfa7e8f0', 'Male', '+9007675438', '', '127001 Localhost', '', 'Active', '2020-04-19 16:40:36.869892'),
(6, 'Student 004', 'iLib-59213', 'student004@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Male', '+9007675460', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac neque eu augue sollicitudin fringilla eget vel nibh. Sed id eleifend magna. Aliquam vitae imperdiet enim, et ornare elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus varius eros justo, nec tristique ligula faucibus in. Mauris lacinia libero et accumsan sodales. Donec facilisis egestas libero, et molestie eros euismod a. Quisque nulla nulla, porta nec faucibus volutpat, volutpat eget libero. Proin efficitur tortor porttitor mi convallis semper ac sed dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ', '127001 Localhost', 'Orion-1.jpg', 'Active', '2020-04-23 13:16:01.678945'),
(7, 'Student 005', 'iLib-74291', 'student005@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Female', '+4567890998', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '127001 Localhost', '', 'Active', '2020-04-21 10:07:40.792002');

-- --------------------------------------------------------

--
-- Table structure for table `iL_Subscriptions`
--

CREATE TABLE `iL_Subscriptions` (
  `s_id` int(20) NOT NULL,
  `s_title` varchar(200) NOT NULL,
  `s_code` varchar(200) NOT NULL,
  `s_category` varchar(200) NOT NULL,
  `s_desc` longtext NOT NULL,
  `s_cover_img` varchar(200) NOT NULL,
  `s_created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `s_file` varchar(200) NOT NULL,
  `s_publisher` varchar(200) NOT NULL,
  `s_year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_Subscriptions`
--

INSERT INTO `iL_Subscriptions` (`s_id`, `s_title`, `s_code`, `s_category`, `s_desc`, `s_cover_img`, `s_created_at`, `s_file`, `s_publisher`, `s_year`) VALUES
(1, 'Architectural Digest', 'SUB-31095', 'Art & Architecture', 'Architectural Digest is the world\'s foremost design authority, showcasing the work of top architects and interior decorators. It continues to set new benchmarks for how to live wellâ€”what to buy, what to see and do, where to travel, and who to watch on the fast-paced, multifaceted global design scene.', 'Architectural Digest .jpg', '2020-04-14 14:09:36.687535', 'Architectural_Digest_November_2015.pdf', 'Conde Nast US', 'April 2020');

-- --------------------------------------------------------

--
-- Table structure for table `iL_sudo`
--

CREATE TABLE `iL_sudo` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `bio` longtext NOT NULL,
  `phone` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iL_sudo`
--

INSERT INTO `iL_sudo` (`id`, `username`, `number`, `email`, `password`, `profile_pic`, `bio`, `phone`, `created_at`) VALUES
(1, 'MartDevelopers Inc', '7OBA6', 'martdevelopers@ilib.org', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '3.jpg', 'Et sequi sit sit in eius officia est corrupti illo amet expedita labore sed sunt iusto numquam quod sapiente iusto laboriosam debitis qui sapiente dolorem alias vel aut explicabo iure culpa inventore ut debitis voluptate non libero autem voluptas ad ipsa nisi enim voluptatem qui nihil omnis ut voluptas numquam qui vel voluptatum commodi earum aut quibusdam impedit voluptatem exercitationem odio dolores ab reprehenderit nesciunt exercitationem vero libero ut ad aperiam laboriosam aut animi voluptatem perspiciatis voluptas unde id delectus omnis sint laboriosam sit enim tempore recusandae distinctio sequi et eveniet. ', '(705)397-8233', '2020-04-07 17:10:21.224760');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iL_BookCategories`
--
ALTER TABLE `iL_BookCategories`
  ADD PRIMARY KEY (`bc_id`);

--
-- Indexes for table `iL_Books`
--
ALTER TABLE `iL_Books`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `iL_ChargesRates`
--
ALTER TABLE `iL_ChargesRates`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `iL_Fines`
--
ALTER TABLE `iL_Fines`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `iL_Librarians`
--
ALTER TABLE `iL_Librarians`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `iL_LibraryOperations`
--
ALTER TABLE `iL_LibraryOperations`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `iL_messages`
--
ALTER TABLE `iL_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iL_notifications`
--
ALTER TABLE `iL_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iL_PasswordResets`
--
ALTER TABLE `iL_PasswordResets`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `iL_Reccomendations`
--
ALTER TABLE `iL_Reccomendations`
  ADD PRIMARY KEY (`iR_id`);

--
-- Indexes for table `iL_receivedMails`
--
ALTER TABLE `iL_receivedMails`
  ADD PRIMARY KEY (`rm_id`);

--
-- Indexes for table `iL_sendMails`
--
ALTER TABLE `iL_sendMails`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `iL_Students`
--
ALTER TABLE `iL_Students`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `iL_Subscriptions`
--
ALTER TABLE `iL_Subscriptions`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `iL_sudo`
--
ALTER TABLE `iL_sudo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iL_BookCategories`
--
ALTER TABLE `iL_BookCategories`
  MODIFY `bc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `iL_Books`
--
ALTER TABLE `iL_Books`
  MODIFY `b_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iL_ChargesRates`
--
ALTER TABLE `iL_ChargesRates`
  MODIFY `cr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iL_Fines`
--
ALTER TABLE `iL_Fines`
  MODIFY `f_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `iL_Librarians`
--
ALTER TABLE `iL_Librarians`
  MODIFY `l_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iL_LibraryOperations`
--
ALTER TABLE `iL_LibraryOperations`
  MODIFY `lo_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `iL_messages`
--
ALTER TABLE `iL_messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iL_notifications`
--
ALTER TABLE `iL_notifications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `iL_PasswordResets`
--
ALTER TABLE `iL_PasswordResets`
  MODIFY `pr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iL_Reccomendations`
--
ALTER TABLE `iL_Reccomendations`
  MODIFY `iR_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iL_receivedMails`
--
ALTER TABLE `iL_receivedMails`
  MODIFY `rm_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iL_sendMails`
--
ALTER TABLE `iL_sendMails`
  MODIFY `sm_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iL_Students`
--
ALTER TABLE `iL_Students`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iL_Subscriptions`
--
ALTER TABLE `iL_Subscriptions`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iL_sudo`
--
ALTER TABLE `iL_sudo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
