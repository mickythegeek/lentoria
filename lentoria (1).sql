-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 02:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lentoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_topics`
--

CREATE TABLE `category_topics` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_topics`
--

INSERT INTO `category_topics` (`sn`, `title`, `slug`, `description`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Graphics Design', '833808-graphics-design', 'Our graphic design courses can prepare you for a wide range of careers, from video game design to marketing. Whether you want to learn a new design software like Affinity Designer, improve your drawing skills.', 3, NULL, '2021-08-11 14:03:43', '2021-08-11 14:03:43'),
(2, 'User Experience Design', '891823-user-experience-design', 'User Experience Design Essentials - Adobe XD UI/UX Design\r\nUse Adobe XD to get a job in UI Design, User Interface, User Experience design, UX design & Web Design.', 3, NULL, '2021-08-11 14:05:22', '2021-08-11 14:05:22'),
(3, 'Logo Design', '568499-logo-design', 'Logo Design in Adobe Illustrator - for Beginners & Beyond\r\nLearn how to design a logo by Published, Multi-Award Winning Logo Designers!', 3, NULL, '2021-08-11 14:07:24', '2021-08-11 14:07:24'),
(4, 'Digital Marketing', '496077-digital-marketing', 'Understanding online marketing channels can feel almost as overwhelming as being on the receiving end of digital marketing campaigns.', 2, NULL, '2021-08-11 14:11:02', '2021-08-11 14:11:02'),
(5, 'Web Development', '957020-web-development', 'Want to be responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications? Strive to create visually appealing sites that feature user-friendly design and clear navigation.', 1, NULL, '2021-08-11 14:19:30', '2021-08-11 14:19:30'),
(6, 'Mobile Development', '792960-mobile-development', 'The mobile application market is growing incredibly fast. According to predictions by Gartner, the demand mobile app development services will grow faster to exceed the internal IT organizations’ capacity to deliver by the end of the year.', 1, NULL, '2021-08-11 14:25:30', '2021-08-11 14:25:30'),
(7, 'Database Design and Development', '33097-database-design-and-development', 'Database application development is the process of obtaining real-world requirements, analyzing requirements, designing the data and functions of the system, and then implementing the operations in the system.', 1, NULL, '2021-08-11 14:26:19', '2021-08-11 14:26:19'),
(8, 'Content Marketing', '314771-content-marketing', 'Content marketers are responsible for planning, creating, and sharing valuable content to grow their readership and relationships to potentially create new business for the company they represent.', 2, NULL, '2021-08-11 14:27:56', '2021-08-11 14:27:56'),
(9, 'Social Media Marketing', '127608-social-media-marketing', 'The social marketer creates promotions and programs aimed at influencing public health in a positive manner. The emphasis in social marketing is based on consumer wants and needs to dictate the direction of the marketing campaign.', 2, NULL, '2021-08-11 14:28:38', '2021-08-11 14:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `false_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficulty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_type` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `requirement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whoCanTake` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatToLearn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_topic_id` bigint(20) UNSIGNED NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `free` bigint(20) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `ratings` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`sn`, `title`, `slug`, `description`, `false_price`, `price`, `duration`, `difficulty`, `image`, `course_type`, `user_id`, `status`, `requirement`, `prerequisite`, `whoCanTake`, `whatToLearn`, `created_at`, `updated_at`, `deleted_at`, `category_id`, `category_topic_id`, `certificate`, `free`, `views`, `ratings`) VALUES
(1, 'Adobe Illustrator CC - Essentials Training Course', '606239-adobe-illustrator-cc---essentials-training-course', 'Whether you\'re brand new to Illustrator, or have played around with it but need more guidance, this course will help you feel confident and comfortable using the industry-standard vector-based graphic application.', '30000', '14700', NULL, 'Intermediate', 'course_cover_image1628692725116275.jpg', 0, 0, '0', NULL, NULL, NULL, NULL, '2021-08-11 14:38:45', '2021-08-11 14:38:45', NULL, 3, 1, '0', 0, 0, 0),
(2, 'Learn to Build a Website Using HTML and CSS', '762440-learn-to-build-a-website-using-html-and-css', 'Want to learn how to create a website with HTML and CSS?\r\n\r\nYou’re in the right place. In this guide, we show you all the steps to get from a blank screen to a working website that’s optimized and quite good-looking at the same time.', '25000', '10000', NULL, 'Intermediate', 'course_cover_image1628757277191140.png', 0, 0, '0', NULL, NULL, NULL, NULL, '2021-08-12 08:34:37', '2021-08-12 08:34:37', NULL, 1, 5, '0', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_assignments`
--

CREATE TABLE `course_assignments` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_assignment_answers`
--

CREATE TABLE `course_assignment_answers` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_assignment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`sn`, `title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Development', '566964-development', 'Courses to get you started', NULL, 1, '2021-08-11 13:59:04', '2021-08-11 13:59:04'),
(2, 'Marketing', '212267-marketing', 'Learn in-demand skills on how to sell anything to anyone.', NULL, 1, '2021-08-11 14:00:32', '2021-08-11 14:00:32'),
(3, 'Design', '604429-design', 'Learn Design at your own pace, with lifetime access on mobile and desktop.', NULL, 1, '2021-08-11 14:01:29', '2021-08-11 14:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `course_comments`
--

CREATE TABLE `course_comments` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `sn` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `resources` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`sn`, `topic_id`, `title`, `video_url`, `notes`, `resources`, `updated_at`, `created_at`, `ord`) VALUES
(1, 1, 'How To Sell Drugs Online(FAST)', 'https://www.youtube.com/embed/JRzWRZahOVU?autoplay=4', '<p><strong>Laravel is a web application framework with expressive, elegant syntax. We&rsquo;ve already laid the foundation &mdash; freeing you to create without sweating the small things.</strong></p>\r\n\r\n<h1><strong>Laravel Vapor</strong></h1>\r\n\r\n<p>Laravel Vapor is a serverless deployment platform for Laravel, powered by AWS. Launch your Laravel infrastructure on Vapor and fall in love with the scalable simplicity of serverless.</p>', 'http://ng1lib.org/s/?q=laravel+API', '2021-08-10 08:05:03', '2021-08-10 08:05:03', 0),
(2, 2, 'Validation Bypass', 'https://www.youtube.com/embed/JRzWRZahOVU?autoplay=5', '<p>Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:Add Content For Tempering Client-side Parameter:</p>', 'http://ng1lib.org/s/?q=laravel+API', '2021-08-10 11:52:33', '2021-08-10 11:52:33', 0),
(3, 1, 'Validation Bypass', 'https://www.youtube.com/embed/JRzWRZahOVU?autoplay=5', '<p>addContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContentaddContent</p>', 'http://ng1lib.org/s/?q=laravel+API', '2021-08-10 11:57:30', '2021-08-10 11:57:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_faq`
--

CREATE TABLE `course_faq` (
  `sn` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `questions` text DEFAULT NULL,
  `answers` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_faq`
--

INSERT INTO `course_faq` (`sn`, `course_id`, `slug`, `questions`, `answers`, `created_at`, `updated_at`) VALUES
(1, 6, '840373-6', 'HI! What is the relevance of this course to my Software development career?', 'courseIdcourseIdcourseIdcourseIdcourseIdcourseIdcourseId', '2021-08-08 17:24:25', '2021-08-08 17:24:25'),
(2, 6, '186181-6', 'Why Is My Internet Connection Slow?', 'If your internet connection is slow it could mean that there are spyware or virus issues. So if your businesses internet is slow, it could be because one of your employees was on a site that they shouldn’t have been on.', '2021-08-08 17:42:35', '2021-08-08 17:42:35'),
(3, 7, '162121-7', 'Why Is My Internet Connection Slow?', 'Why Is My Internet Connection Slow?Why Is My Internet Connection Slow?Why Is My Internet Connection Slow?Why Is My Internet Connection Slow?', '2021-08-09 08:20:54', '2021-08-09 08:20:54'),
(4, 7, '128734-7', 'Want icons in your web project stat?', 'Here’s the fastest and easiest way to use Font Awesome in your web-based projects', '2021-08-09 09:22:49', '2021-08-09 09:22:49'),
(5, 1, '826249-1', 'What is Illustrator and who is it for?', 'Adobe Illustrator is the industry-standard vector graphics software used worldwide by designers of all types who want to create digital graphics, illustrations, and typography for all kinds of media: print, web, interactive, video, and mobile. Learn more about Illustrator at https://helpx.adobe.com/illustrator/how-to/what-is-illustrator.html?set=illustrator--get-started--overview.\r\n\r\nAs Illustrator is part of Adobe Creative Cloud, you get access to all the latest updates and future releases the moment they’re available. Learn more about Creative Cloud.', '2021-08-13 10:17:20', '2021-08-13 10:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `course_introductions`
--

CREATE TABLE `course_introductions` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_introductions`
--

INSERT INTO `course_introductions` (`sn`, `course_id`, `user_id`, `body`, `video_url`, `image_url`, `created_at`, `updated_at`) VALUES
(2, 2, 0, '<h1>No internet</h1>\r\n\r\n<p>Try:</p>\r\n\r\n<ul>\r\n	<li>Checking the network cables, modem, and router</li>\r\n	<li>Reconnecting to Wi-Fi</li>\r\n	<li><a href=\"javascript:diagnoseErrors()\">Running Windows Network Diagnostics</a></li>\r\n</ul>\r\n\r\n<p>DNS_PROBE_FINISHED_NO_INTERNET</p>\r\n', 'https://www.youtube.com/watch?v=8H7yZf68Lzw', 'cover_image1628757719223456.png', '2021-08-05 12:17:27', '2021-08-05 12:19:40'),
(3, 3, 0, '<p>Building cross-platform applications that responsive and progressive.&nbsp;</p>\r\n\r\n<p>Building cross-platform applic</p>\r\n\r\n<p>Building cross-platform applications that responsive and progressive.</p>\r\n\r\n<p>Building cross-platform applications that responsive and progressive.</p>\r\n\r\n<p>Building cross-platform applications that responsive and progressive.</p>\r\n', 'https://www.youtube.com/watch?v=8H7yZf68Lzw', 'course_cover_image1628173594139169.jpg', '2021-08-05 14:26:34', '2021-08-05 14:26:34'),
(4, 4, 0, '<p>Building cross-platform applications that responsive and progressive.&nbsp;</p>\r\n\r\n<p>Building cross-platform applic</p>\r\n\r\n<p>Building cross-platform applications that responsive and progressive.</p>\r\n\r\n<p>Building cross-platform applications that responsive and progressive.</p>\r\n\r\n<p>Building cross-platform applications that responsive and progressive.</p>\r\n', 'https://www.youtube.com/watch?v=8H7yZf68Lzw', 'course_cover_image1628173834156976.jpg', '2021-08-05 14:30:34', '2021-08-05 14:30:34'),
(5, 5, 0, '<p>front end developmentfront end developmentfront end developmentfront end development</p>\r\n', 'https://www.youtube.com/watch?v=8H7yZf68Lzw', 'cover_image1628676650299686.jpg', '2021-08-05 14:39:08', '2021-08-05 14:39:08'),
(6, 6, 0, '<p><s><strong><em>Represent your course.Help people find your courses by choosing categories that represent your course.Help people find your courses by choosing categories that represent your course..</em></strong></s></p>', 'https://www.youtube.com/embed/', 'cover_image1628509290826919.jpg', '2021-08-06 07:40:47', '2021-08-06 07:40:47'),
(7, 7, 0, '<p>Machine learning here (which you&rsquo;ll learn about next!), but the key difference is</p>', 'https://www.youtube.com/watch?v=x0uinJvhNxI', 'cover_image1628676174155253.jpg', '2021-08-08 18:14:56', '2021-08-08 18:14:56'),
(8, 8, 0, '<h2>Syllabus</h2>\r\n\r\n<ul>\r\n	<li>Introduction to Deep Learning\r\n	<ul>\r\n		<li>Analyze the major trends driving the rise of deep learning, and give examples of where and how it is applied today.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Neural Networks Basics\r\n	<ul>\r\n		<li>Set up a machine learning problem with a neural network mindset and use vectorization to speed up your models.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Shallow Neural Networks\r\n	<ul>\r\n		<li>Build a neural network with one hidden layer, using forward propagation and backpropagation.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Deep Neural Networks\r\n	<ul>\r\n		<li>Analyze the key computations underlying deep learning, then use them to build and train deep neural networks for computer vision tasks.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 'https://www.youtube.com/watch?v=x0uinJvhNxI', 'course_cover_image1628504185119911.jpg', '2021-08-09 10:16:25', '2021-08-09 10:16:25'),
(9, 1, 0, '<p>This course is a collaboration between <strong>Morawo Olalekan&nbsp;&amp; Shaba Japhe</strong>t&nbsp;who have worked together to design a course that you&#39;ll love. These top-rated instructors have taught hundreds of thousands of students around the world, and can&#39;t wait to serve you.</p>\r\n', 'https://www.youtube.com/embed/j7PEuMumhMs', 'course_cover_image1628692725116275.jpg', '2021-08-11 14:38:45', '2021-08-11 14:38:45'),
(10, 2, 0, '<p>So, the first thing you need even before creating a website with <strong>HTML</strong> and <strong>CSS</strong> is a text editor. Don&rsquo;t worry, though; you don&rsquo;t have to pay to get one, there are so many free and easy to use text editors online such as VScode, sublime text, bracket etc.</p>\r\n', 'https://www.youtube.com/embed/uyaV_EWWRmo', 'course_cover_image1628757277191140.png', '2021-08-12 08:34:37', '2021-08-12 08:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE `course_modules` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`sn`, `course_id`, `title`, `slug`, `description`, `created_at`, `updated_at`, `order`) VALUES
(15, 1, 'Introduction to Adobe Illustrator Essentials', '357987-introduction-to-adobe-illustrator-essentials', 'Are you frustrated trying to teach yourself Adobe Illustrator?! This course will quickly allow you to start getting paid for your Illustrator skills.', '2021-08-11 14:41:18', '2021-08-11 14:41:18', NULL),
(16, 1, 'Drawing in Adobe Illustrator CC', '825288-drawing-in-adobe-illustrator-cc', 'You can draw lines, shapes, and freeform illustrations and with ten drawing layers and a photo layer.', '2021-08-11 14:44:02', '2021-08-11 14:44:02', NULL),
(17, 1, 'Types and Fonts in Adobe Illustrator CC', '401196-types-and-fonts-in-adobe-illustrator-cc', 'Learn about formatting text, such as how to change appearance of characters, work with OpenType fonts, and more.', '2021-08-11 14:45:18', '2021-08-11 14:45:18', NULL),
(18, 1, 'Color in Adobe Illustrator CC', '76853-color-in-adobe-illustrator-cc', 'Control panel, Color panel, Swatches panel, Gradient panel, or a swatch library.', '2021-08-11 16:20:49', '2021-08-11 16:20:49', NULL),
(19, 2, 'Learn the Basics of HTML', '810255-learn-the-basics-of-html', 'The basics of HTML involves structures and structures are made up of tags', '2021-08-12 08:40:03', '2021-08-12 08:40:03', NULL),
(20, 2, 'Understand HTML Document Structure', '358994-understand-html-document-structure', 'Think of your HTML page as if it was built of Legos. You put different bricks on top of one another to end up with a given bigger structure.', '2021-08-12 08:41:00', '2021-08-12 08:41:00', NULL),
(21, 2, 'Get to Know CSS Selectors', '671888-get-to-know-css-selectors', 'Just like HTML has its tags, CSS has selectors.', '2021-08-12 08:43:01', '2021-08-12 08:43:01', NULL),
(22, 2, 'Put Together a CSS Stylesheet', '894589-put-together-a-css-stylesheet', 'CSS documents are often referred to as stylesheets.', '2021-08-12 08:44:03', '2021-08-12 08:44:03', NULL),
(23, 2, 'Download/Install Bootstrap', '20634-download-install-bootstrap', 'Bootstrap is an open-source toolkit for creating a website with HTML and CSS.', '2021-08-12 08:44:43', '2021-08-12 08:44:43', NULL),
(24, 2, 'Pick a Design', '564086-pick-a-design', 'When you’re creating a website with HTML and CSS, you are free to use any Bootstrap template you like. They should all work similarly enough.', '2021-08-12 08:45:45', '2021-08-12 08:45:45', NULL),
(25, 2, 'Customize Your Website With HTML and CSS', '867659-customize-your-website-with-html-and-css', 'Let’s work on the homepage of the design first. This is going to show us how to replace the graphics, texts, and tune everything up in general.', '2021-08-12 08:46:58', '2021-08-12 08:46:58', NULL),
(26, 2, 'Add Content and Images', '373335-add-content-and-images', 'he first thing you’ll want to do is change the title of the page.', '2021-08-12 08:49:03', '2021-08-12 08:49:03', NULL),
(27, 1, 'CSS Box Sizing', '404329-css-box-sizing', 'https://vimeo.com/577373529https://vimeo.com/577373529', '2021-08-13 10:39:49', '2021-08-13 10:39:49', NULL),
(28, 1, 'adding the javascript required option', '646454-adding-the-javascript-required-option', 'https://vimeo.com/577373529adding the javascript required option', '2021-08-13 10:40:04', '2021-08-13 10:40:04', NULL),
(29, 1, 'creating the form', '765295-creating-the-form', 'adding the javascript required option', '2021-08-13 10:40:15', '2021-08-13 10:40:15', NULL),
(30, 1, 'form validation with javascript', '856898-form-validation-with-javascript', 'adding the javascript required optionadding the javascript required option', '2021-08-13 10:40:24', '2021-08-13 10:40:24', NULL),
(31, 1, 'adding the javascript required option', '333318-adding-the-javascript-required-option', 'adding the javascript required optionadding the javascript required option', '2021-08-13 10:40:47', '2021-08-13 10:40:47', NULL),
(32, 1, 'validation with javascript', '69603-validation-with-javascript', 'adding the javascript required optionadding the javascript required option', '2021-08-13 10:41:00', '2021-08-13 10:41:00', NULL),
(33, 1, 'Box Sizing', '76556-box-sizing', 'adding the javascript required optionadding the javascript required option', '2021-08-13 10:41:10', '2021-08-13 10:41:10', NULL),
(34, 1, 'the form', '584083-the-form', 'adding the javascript required optionadding the javascript required option', '2021-08-13 10:41:22', '2021-08-13 10:41:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_quizzes`
--

CREATE TABLE `course_quizzes` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_a_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_b_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_c_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_d_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_recommenders`
--

CREATE TABLE `course_recommenders` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_subscribers`
--

CREATE TABLE `course_subscribers` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_subscribers`
--

INSERT INTO `course_subscribers` (`sn`, `user_id`, `owner_id`, `course_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '50000', NULL, NULL),
(2, 1, 1, 2, '55000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_testimonials`
--

CREATE TABLE `course_testimonials` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screenshot_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_topics`
--

CREATE TABLE `course_topics` (
  `sn` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `resources` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_topics`
--

INSERT INTO `course_topics` (`sn`, `slug`, `module_id`, `title`, `video_url`, `notes`, `resources`, `created_at`, `updated_at`, `ord`) VALUES
(1, '379837-tempering-client-side-parameter-validation-bypass', 2, 'Tempering Client-side Parameter: Validation Bypass', NULL, NULL, NULL, '2021-08-06 10:34:10', '2021-08-06 10:34:10', 0),
(2, '234893-python-module-for-validation-bypass', 2, 'Python Module for Validation Bypass', NULL, NULL, NULL, '2021-08-06 10:45:31', '2021-08-06 10:45:31', 0),
(3, '979801-server-side-validation', 2, 'Server-side Validation', 'https://www.youtube.com/embed/JRzWRZahOVU?', 'addslashes(valEmpty($_POST[\'notes\'], \'Notes\', 10))addslashes(valEmpty($_POST[\'notes\'], \'Notes\', 10))addslashes(valEmpty($_POST[\'notes\'], \'Notes\', 10))addslashes(valEmpty($_POST[\'notes\'], \'Notes\', 10))addslashes(valEmpty($_POST[\'notes\'], \'Notes\', 10))addslashes(valEmpty($_POST[\'notes\'], \'Notes\', 10))', 'http://ng1lib.org/s/?q=laravel', '2021-08-06 10:47:22', '2021-08-06 10:47:22', 0),
(4, '278222-hjbadfnkclmvs-', 6, 'hjbadfnkclmvs.', NULL, NULL, NULL, '2021-08-06 10:48:46', '2021-08-06 10:48:46', 0),
(5, '58613-create-complete-school-management-system-project-with-laravel-8', 8, 'Create Complete School Management System Project with Laravel 8', NULL, NULL, NULL, '2021-08-09 14:41:02', '2021-08-09 14:41:02', 0),
(7, '197072-validation-bypass', 2, 'Validation Bypass', 'https://www.youtube.com/embed/0VTLrjJfH2c', '<p>About 106,000,000 results (1.68 seconds) </p>\r\n\r\n<h1>Search Results</h1>\r\n\r\n<h2>Web results</h2>\r\n\r\n<p> </p>\r\n\r\n<h3><a href=\"https://en.wikipedia.org/wiki/Dubbing_(filmmaking)\">Dubbing (filmmaking) - Wikipedia</a></h3>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Dubbing_(filmmaking)\"><cite>https://en.wikipedia.org › wiki › Dubbing_(filmmaking)</cite></a></p>\r\n\r\n<ol>\r\n	<li> </li>\r\n	<li> </li>\r\n</ol>\r\n\r\n<p>Some voice actors that have <em>dubbed</em> for celebrities in the European French language are listed below. <em>show</em>European French <em>dubbing</em> artists, Actor(s)/Actress(es) ...</p>\r\n\r\n<p>‎<a href=\"https://en.wikipedia.org/wiki/Dubbing_(filmmaking)#Methods\">Methods</a> · ‎<a href=\"https://en.wikipedia.org/wiki/Dubbing_(filmmaking)#Global_use\">Global use</a> · ‎<a href=\"https://en.wikipedia.org/wiki/Dubbing_(filmmaking)#Europe\">Europe</a> · ‎<a href=\"https://en.wikipedia.org/wiki/Dubbing_(filmmaking)#Asia\">Asia</a></p>\r\n\r\n<h3>People also ask</h3>\r\n\r\n<p>What does it mean when a TV show is dubbed?</p>\r\n\r\n<p>Dubbing is <strong>the act of providing a film soundtrack in a different language than the original</strong>. ... To dub a show, the script first needs to be translated into the target language. The script has to be specially crafted to keep the show\'s original narrative style the same.28 Jul 2020</p>\r\n\r\n<p> </p>\r\n\r\n<h3><a href=\"https://acutrans.com/your-favorite-tv-show-may-be-dubbed/\">Your Favorite TV Show May Be Dubbed! But You Probably ...</a></h3>\r\n\r\n<p><a href=\"https://acutrans.com/your-favorite-tv-show-may-be-dubbed/\"><cite>https://acutrans.com › your-favorite-tv-show-may-be-d...</cite></a></p>\r\n\r\n<ol>\r\n	<li> </li>\r\n</ol>\r\n\r\n<p>Search for: <a href=\"https://www.google.com/search?sxsrf=ALeKk00yx3_L4IJeLaDjfB_n7_vEOSaCFg:1628597919903&q=What+does+it+mean+when+a+TV+show+is+dubbed%3F&sa=X&ved=2ahUKEwiljf2DuKbyAhULohQKHWvMCTUQzmd6BAgPEAU\">What does it mean when a TV show is dubbed?</a></p>\r\n\r\n<p>What does dubbed mean in movies?</p>', 'https://www.offensive-security.com/kali-linux/kali-linux-customization/', '2021-08-10 13:21:32', '2021-08-10 13:21:32', 0),
(8, '393763-dom-animation-part-1', 14, 'DOM Animation Part 1', 'https://www.youtube.com/results?search', '<p>Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.Learn to create HTML animations using JavaScript.</p>', 'https://www.youtube.com/watch?v=vLqehXj', '2021-08-11 08:32:34', '2021-08-11 08:32:34', 0),
(9, '878400-dom-animation-part-2', 14, 'DOM Animation Part 2', 'https://www.youtube.com/results', '<h2><strong>Animation Code</strong></h2>\r\n\r\n<p>JavaScript animations are done by programming gradual changes in an element&#39;s style.</p>\r\n\r\n<p>The changes are called by a timer. When the timer interval is small, the animation looks continuous.</p>\r\n\r\n<p>The basic code is:</p>', 'https://www.youtube.com/watch', '2021-08-11 08:34:40', '2021-08-11 08:34:40', 0),
(10, '391494-getting-familiar-with-the-adobe-cc-environment', 15, 'Getting familiar with the Adobe CC environment', 'https://www.youtube.com/embed/01yk4wsOFdQ', '<p>Now together, me and you, are going to go through this course, and make beautiful art work together, using Illustrator. During this course, you won\'t just learn how to use this tool, we\'ll work through real world practical projects. Now this course is aimed at people completely new to Illustrator and maybe to Design, in general. We\'re going to start absolutely right at the beginning and work our way through step by step. Introduction To Adobe Illustrator CC for beginners - Adobe Illustrator CC 2018 Tutorial by Bring Your Own Laptop, get your free downloadable exercise files and printable PDF</p>', 'https://www.pinterest.com/CharlesWDavis/adobe-illustrator-resources-tuts/', '2021-08-11 14:48:02', '2021-08-11 14:48:02', 0),
(11, '144672-download-the-course-project-files', 15, 'Download the Course Project Files', 'https://www.youtube.com/embed/aetEn5jaZQo', '<p>All right, time to get started. There&#39;s a couple of things you need to do first.</p>\r\n\r\n<p>One is, download the exercise files. There&rsquo;ll&nbsp;be a link on the page to download those, you can play along. There&#39;s another link there saying, The Completed Files. You don&#39;t need these, but they&#39;re handy. What I do, at the end of every video I kind of save where I&#39;m up to. So that, maybe yours is not quite working, you just want to see how I made mine. You can download that Illustrator file just to check against yours.</p>', 'https://www.pinterest.com/CharlesWDavis/adobe-illustrator-resources-tuts/', '2021-08-11 14:52:55', '2021-08-11 14:52:55', 0),
(12, '933818-getting-started-with-illustrator', 15, 'Getting Started with Illustrator', 'https://www.youtube.com/embed/9Iv2VejN1uM', '<p>Hi there, in this video we&#39;re going to look at getting started with Illustrator. Basically some navigation of the interface, and just getting Illustrator set up, so that we can all work together, and you can follow along with me.</p>', 'https://www.pinterest.com/navigatemadness/adobe-illustrator-resources-tutorials/', '2021-08-11 14:55:41', '2021-08-11 14:55:41', 0),
(13, '566269-drawing-with-shape-and-line-tools', 16, 'Drawing with Shape and Line Tools', 'https://www.youtube.com/embed/iJmeef5ysOY', '<p>In this tutorial we&#39;re going to draw from this drawing that I&#39;ve made. Just to make it simple, so we can all follow along. What I&#39;d like to do is, in Illustrator we&#39;re going to go to &#39;File&#39;, &#39;New&#39;. Pick a document size, I&#39;m going to start with &#39;Print&#39;. I&#39;m going to use &#39;US Letter&#39;, I&#39;m going to use &#39;Landscape&#39;. I&#39;m not going to change anything else, just going to click &#39;Create&#39;. I&#39;m going to save it, so I&#39;m going to go to &#39;File&#39;, &#39;Save&#39;. What we&#39;ll do for this class, is I&#39;ll put everything on my Desktop, you do the same.&nbsp;</p>', 'https://www.creativebloq.com/illustrator/resources-113968', '2021-08-11 15:02:17', '2021-08-11 15:02:17', 0),
(14, '884034-improve-your-designs-with-the-shape-buildelr-too', 16, 'Improve Your Designs with the Shape Buildelr Too', 'https://www.youtube.com/embed/izi0mtItHh4', '<p>In this video we&#39;re going to look at the Shape Builder Tool, I love this tool. It&#39;s absolutely my most favorite tool out of all the tools in Illustrator. We&#39;re going to take this drawing that we did of the fox with simple shapes, and add some kind of shadows to it. Well, not so much exciting about the shadows but more of the technique that we used the Shape Builder Tool to kind of be able to carve out extra colors within other shapes. I love it. Let&#39;s go and learn how to use it now.</p>', 'https://www.jotform.com/blog/a-gold-mine-of-adobe-illustrator-resources/', '2021-08-11 15:03:45', '2021-08-11 15:03:45', 0),
(15, '420889-draw-a-custom-logo-the-impossible-shape-', 16, 'Draw a Custom Logo (The Impossible Shape!)', 'https://www.youtube.com/embed/8nebVCVsgFY', '<p><strong>Hi there, in this video we&#39;re going to draw this shape here. We&#39;re going to use the Shape Builder Tool. I know I&#39;ve used it for a couple of tutorials already, but it&#39;s a really versatile tool. I use it so much that, yes, it gets three videos.</strong></p>', 'https://www.webfx.com/blog/web-design/20-exceptional-websites-for-learning-adobe-illustrator/', '2021-08-11 15:05:23', '2021-08-11 15:05:23', 0),
(16, '292416-how-to-use-type-fonts', 17, 'How to use Type & Fonts', 'https://www.youtube.com/embed/8iGlWF9G_KY', '<p><strong>Hi there, in this video we&#39;re going to make this simple post card. We&#39;re going to look at fonts that are installed on your machine, and we&#39;re going to look at something called TypeKit, which is fonts that Adobe give you. We can download them for free, and use them as part of our designs. All right, let&#39;s go and learn how to do that now in Illustrator</strong></p>', 'https://www.creativestudiosderby.co.uk/top-5-free-vector-resources-illustrator/', '2021-08-11 15:17:35', '2021-08-11 15:17:35', 0),
(17, '899247-design-a-badge-logo', 17, 'Design a Badge Logo', 'https://www.youtube.com/embed/2DDvAIDEO2Y', '<p><strong>Create your own &#39;hipster&#39; badge logo using the type on a path skills you just learned.</strong></p>', 'https://www.creativeboom.com/resources/50-fresh-essential-and-free-resources-for-your-graphic-design-projects/', '2021-08-11 15:19:13', '2021-08-11 15:19:13', 0),
(18, '463388-break-apart-destroy-text', 17, 'Break Apart & Destroy Text', 'https://www.youtube.com/embed/wkA1AYDX7ho', '<p><strong>Hey there, in this tutorial we are going to make text follow a path, like this curvy one here. We&#39;ll also do a badge, where we do the text along the top and the bottom. Let&#39;s get into it now using Adobe Illustrator</strong></p>', 'https://design.tutsplus.com/articles/free-resources-for-adobe-illustrator-on-deviantart--vector-4237', '2021-08-11 15:20:32', '2021-08-11 15:20:32', 0),
(19, '717192-what-is-rgb-cmyk-', 18, 'What is RGB & CMYK?', 'https://player.vimeo.com/video/11115288', '<p><strong>Hi there, in this video we&#39;re going to talk about RGB versus CMYK. You might have come across this, you might have not. It&#39;s kind of essential, I guess, to understand the basics, so let&#39;s cover them quickly</strong></p>', 'http://ng1lib.org/s/?q=laravel', '2021-08-11 16:22:56', '2021-08-11 16:22:56', 0),
(20, '274192-so-what-is-html-', 19, 'So what is HTML?', 'https://player.vimeo.com/video/581014653', '<p>HTML is a <em>markup language</em> that defines the structure of your content. HTML consists of a series of <strong><a href=\"https://developer.mozilla.org/en-US/docs/Glossary/Element\">elements</a></strong>, which you use to enclose, or wrap, different parts of the content to make it appear a certain way, or act a certain way. The enclosing <a href=\"https://developer.mozilla.org/en-US/docs/Glossary/Tag\">tags</a> can make a word or image hyperlink to somewhere else, can italicize words, can make the font bigger or smaller, and so on.  For example, take the following line of content:</p>\r\n\r\n<pre>\r\nMy cat is very grumpy</pre>\r\n\r\n<p>If we wanted the line to stand by itself, we could specify that it is a paragraph by enclosing it in paragraph tags:</p>\r\n\r\n<pre>\r\n<code><p>My cat is very grumpy</p></code>\r\n</pre>', 'https://vimeo.com/581728609', '2021-08-12 09:18:44', '2021-08-12 09:18:44', 0),
(21, '489473-anatomy-of-an-html-element', 19, 'Anatomy of an HTML element', 'https://player.vimeo.com/video/581728609', '<p><img alt=\"\" src=\"https://developer.mozilla.org/en-US/docs/Learn/Getting_started_with_the_web/HTML_basics/grumpy-cat-small.png\" width=\"821\" /></p>\r\n\r\n<p>The main parts of our element are as follows:</p>\r\n\r\n<ol>\r\n	<li><strong>The opening tag:</strong>&nbsp;This consists of the name of the element (in this case, p), wrapped in opening and closing&nbsp;<strong>angle brackets</strong>. This states where the element begins or starts to take effect &mdash; in this case where the paragraph begins.</li>\r\n	<li><strong>The closing tag:</strong>&nbsp;This is the same as the opening tag, except that it includes a&nbsp;<em>forward slash</em>&nbsp;before the element name. This states where the element ends &mdash; in this case where the paragraph ends. Failing to add a closing tag is one of the standard beginner errors and can lead to strange results.</li>\r\n	<li><strong>The content:</strong>&nbsp;This is the content of the element, which in this case, is just text.</li>\r\n	<li><strong>The element:</strong>&nbsp;The opening tag, the closing tag, and the content together comprise the element.</li>\r\n</ol>\r\n\r\n<p>Elements can also have attributes&nbsp;that&nbsp;look like the following:</p>\r\n\r\n<p><img alt=\"\" src=\"https://developer.mozilla.org/en-US/docs/Learn/Getting_started_with_the_web/HTML_basics/grumpy-cat-attribute-small.png\" width=\"1287\" /></p>', 'https://vimeo.com/581728609', '2021-08-12 09:28:57', '2021-08-12 09:28:57', 0),
(22, '356287-the-head-element', 21, 'The HEAD element', 'https://player.vimeo.com/video/581825413', '<p><em>Start tag:&nbsp;<strong>optional</strong>, End tag:&nbsp;<strong>optional</strong></em></p>\r\n\r\n<p><em>Attribute definitions</em></p>\r\n\r\n<p><a name=\"adef-profile\"><samp>profile</samp></a>&nbsp;=&nbsp;<a href=\"https://www.w3.org/TR/html401/types.html#type-uri\"><em>uri</em></a>&nbsp;<a href=\"https://www.w3.org/TR/html401/types.html#see-type-for-case\">[CT]</a></p>\r\n\r\n<p>This attribute specifies the location of one or more meta data profiles, separated by white space. For future extensions, user agents should consider the value to be a list even though this specification only considers the first URI to be significant.&nbsp;<a href=\"https://www.w3.org/TR/html401/struct/global.html#profiles\">Profiles</a>&nbsp;are discussed below in the section on&nbsp;<a href=\"https://www.w3.org/TR/html401/struct/global.html#meta-data\">meta data</a>.</p>\r\n\r\n<p><em>Attributes defined elsewhere</em></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.w3.org/TR/html401/struct/dirlang.html#adef-lang\"><samp>lang</samp></a>&nbsp;(<a href=\"https://www.w3.org/TR/html401/struct/dirlang.html#language-info\">language information</a>),&nbsp;<a href=\"https://www.w3.org/TR/html401/struct/dirlang.html#adef-dir\"><samp>dir</samp></a>&nbsp;(<a href=\"https://www.w3.org/TR/html401/struct/dirlang.html#bidirection\">text direction</a>)</li>\r\n</ul>\r\n\r\n<p>The&nbsp;<a href=\"https://www.w3.org/TR/html401/struct/global.html#edef-HEAD\"><samp>HEAD</samp></a>&nbsp;element contains information about the current document, such as its title, keywords that may be useful to search engines, and other data that is not considered document content. User agents do not generally render elements that appear in the&nbsp;<a href=\"https://www.w3.org/TR/html401/struct/global.html#edef-HEAD\"><samp>HEAD</samp></a>&nbsp;as content. They may, however, make information in the&nbsp;<a href=\"https://www.w3.org/TR/html401/struct/global.html#edef-HEAD\"><samp>HEAD</samp></a>&nbsp;available to users through other mechanisms.</p>', 'https://vimeo.com/581825413', '2021-08-12 10:00:05', '2021-08-12 10:00:05', 0),
(23, '288337-adobe-illustrator', 15, 'Adobe Illustrator', 'https://player.vimeo.com/video/577373529', '<h2>About the course</h2>\r\n\r\n<p>Vue.js is a fantastic JavaScript framework, that is performant, progressive, and remarkably easy to start using. This is our course on the very basics of Vue.js - The Vue.js Fundamentals.</p>\r\n\r\n<p>In this course, we will teach you the fundamental concepts of Vue.js 3 and create a solid foundation for your Vue journey.</p>\r\n\r\n<h3>The Vue.js 3 Fundamentals course covers:</h3>\r\n\r\n<ul>\r\n	<li>Introduction to two-way data binding</li>\r\n	<li>Template syntax and expressions</li>\r\n	<li>Vue directives, loops and conditional rendering</li>\r\n	<li>Vue Devtools</li>\r\n	<li>Handling user Inputs</li>\r\n	<li>Handling Events</li>\r\n	<li>Vue.js Methods and Computed Properties</li>\r\n	<li>Attribute Bindings and dynamic classes</li>\r\n</ul>\r\n\r\n<p>The course is suitable for developers who do not yet</p>', 'https://vimeo.com/577373529', '2021-08-13 10:20:57', '2021-08-13 10:20:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_achievements`
--

CREATE TABLE `instructor_achievements` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_education`
--

CREATE TABLE `instructor_education` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institution` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discipline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_experiences`
--

CREATE TABLE `instructor_experiences` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_testimonials`
--

CREATE TABLE `instructor_testimonials` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` int(10) UNSIGNED DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screenshot_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_modules`
--

CREATE TABLE `lesson_modules` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `user_course_id` bigint(20) DEFAULT NULL,
  `module_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE `payment_histories` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_ref` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffrole`
--

CREATE TABLE `staffrole` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `detail` varchar(10000) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` int(10) UNSIGNED DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screenshot_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(35) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(55) DEFAULT NULL,
  `live_id` int(11) NOT NULL DEFAULT 0,
  `sex` varchar(8) DEFAULT NULL,
  `pass` varchar(86) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `firstname`, `lastname`, `created_at`, `updated_at`, `email`, `live_id`, `sex`, `pass`, `phone`, `status`) VALUES
(1, 'Aladesuyi', 'Titilayo', '2021-08-17 09:47:20', '2021-08-17 10:06:47', 'aladesuyi@gmail.com', 84, NULL, NULL, '09038772366', 1),
(4, 'Adu', 'Sukanmi', '2021-08-17 10:07:21', '2021-08-17 10:07:21', 'adusukanmi@gmail.com', 82, NULL, NULL, '123543455545', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(245) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sin` double(8,2) NOT NULL DEFAULT 0.00,
  `cos` double(8,2) NOT NULL DEFAULT 0.00,
  `tan` double(8,2) NOT NULL DEFAULT 0.00,
  `ctime` bigint(20) DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 1,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rep` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_topics`
--
ALTER TABLE `category_topics`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `category_topics_slug_unique` (`slug`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `courses_sn_unique` (`sn`);

--
-- Indexes for table `course_assignments`
--
ALTER TABLE `course_assignments`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_assignments_sn_unique` (`sn`);

--
-- Indexes for table `course_assignment_answers`
--
ALTER TABLE `course_assignment_answers`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_assignment_answers_sn_unique` (`sn`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`);

--
-- Indexes for table `course_comments`
--
ALTER TABLE `course_comments`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_comments_sn_unique` (`sn`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `course_faq`
--
ALTER TABLE `course_faq`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `course_introductions`
--
ALTER TABLE `course_introductions`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_introductions_sn_unique` (`sn`);

--
-- Indexes for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_modules_sn_unique` (`sn`);

--
-- Indexes for table `course_quizzes`
--
ALTER TABLE `course_quizzes`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `course_recommenders`
--
ALTER TABLE `course_recommenders`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_recommenders_sn_unique` (`sn`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_sections_sn_unique` (`sn`);

--
-- Indexes for table `course_subscribers`
--
ALTER TABLE `course_subscribers`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_subscribers_sn_unique` (`sn`);

--
-- Indexes for table `course_testimonials`
--
ALTER TABLE `course_testimonials`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_testimonials_sn_unique` (`sn`);

--
-- Indexes for table `course_topics`
--
ALTER TABLE `course_topics`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `course_types_sn_unique` (`sn`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `instructors_sn_unique` (`sn`);

--
-- Indexes for table `instructor_achievements`
--
ALTER TABLE `instructor_achievements`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `instructor_achievements_sn_unique` (`sn`);

--
-- Indexes for table `instructor_education`
--
ALTER TABLE `instructor_education`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `instructor_education_sn_unique` (`sn`);

--
-- Indexes for table `instructor_experiences`
--
ALTER TABLE `instructor_experiences`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `instructor_experiences_sn_unique` (`sn`);

--
-- Indexes for table `instructor_testimonials`
--
ALTER TABLE `instructor_testimonials`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `instructor_testimonials_sn_unique` (`sn`);

--
-- Indexes for table `lesson_modules`
--
ALTER TABLE `lesson_modules`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `lesson_modules_sn_unique` (`sn`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `payment_histories_sn_unique` (`sn`);

--
-- Indexes for table `staffrole`
--
ALTER TABLE `staffrole`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `testimonials_sn_unique` (`sn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `sn_UNIQUE` (`sn`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `wallets_sn_unique` (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_topics`
--
ALTER TABLE `category_topics`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_assignments`
--
ALTER TABLE `course_assignments`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_assignment_answers`
--
ALTER TABLE `course_assignment_answers`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_comments`
--
ALTER TABLE `course_comments`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_faq`
--
ALTER TABLE `course_faq`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_introductions`
--
ALTER TABLE `course_introductions`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `course_quizzes`
--
ALTER TABLE `course_quizzes`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_recommenders`
--
ALTER TABLE `course_recommenders`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_sections`
--
ALTER TABLE `course_sections`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_subscribers`
--
ALTER TABLE `course_subscribers`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_testimonials`
--
ALTER TABLE `course_testimonials`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_topics`
--
ALTER TABLE `course_topics`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_achievements`
--
ALTER TABLE `instructor_achievements`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_education`
--
ALTER TABLE `instructor_education`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_experiences`
--
ALTER TABLE `instructor_experiences`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_testimonials`
--
ALTER TABLE `instructor_testimonials`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_modules`
--
ALTER TABLE `lesson_modules`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffrole`
--
ALTER TABLE `staffrole`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
