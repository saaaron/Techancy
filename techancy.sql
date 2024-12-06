-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 02:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Techancy is an open-source platform dedicated to connecting tech talents with job opportunities across the industry. Our goal is to provide a streamlined job search experience, focusing exclusively on tech roles, while offering employers an efficient way to discover and hire the best candidates. Whether you\'re looking to start your career or find your next big opportunity, Techancy brings together top talent and employers in one place.\n\n##### Features\nTechancy comes packed with a variety of features designed to make the recruitment process seamless for employers and job seekers alike:\n* **Comprehensive Dashboard:** Employers have access to a powerful dashboard to manage job posts. Easily create, edit, or delete job listings, and manage submitted resumes and cover letters, all from one place.\n* **Resume and Cover Letter Submissions:** Job seekers can upload their resumes and write personalized cover letters directly on the platform. Applications are submitted straight to the company’s dashboard, ensuring a smooth and direct application process.\n* **Job Post Management:** Employers can efficiently handle multiple job posts, tracking applications and communicating with potential hires, all within the platform.\nWe are committed to making the hiring process as simple and effective as possible for tech companies and professionals.', '2024-10-14 09:03:53', '2024-11-25 20:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@techancy.app', '$2y$12$zVRQhtAppAfA0CSIfhWfouEw6TkIOcp35NTELmYf27s0Qi9FtJuU.', '2024-10-13 17:46:30', '2024-10-13 17:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delete_acct_tokens`
--

CREATE TABLE `delete_acct_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_reset_tokens`
--

CREATE TABLE `email_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_verification_tokens`
--

CREATE TABLE `email_verification_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_page`
--

CREATE TABLE `faq_page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_page`
--

INSERT INTO `faq_page` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How do I create an account', 'To create an account, goto the sign up page and input all the necessary information required', '2024-11-25 19:47:37', '2024-11-25 19:47:37'),
(2, 'How to post a job', 'To post a job, log into your account and click on the **\"Post A Job\"** button', '2024-11-25 19:48:39', '2024-11-25 20:17:42'),
(3, 'How to change my password', 'To change your password, log into your account and navigate to **Settings / Account / Change password**', '2024-11-25 19:50:07', '2024-11-25 19:50:07'),
(4, 'How to change my email address', 'To change your email address, log into your account and navigate to **Settings / Account / Change email address**', '2024-11-25 19:50:32', '2024-11-25 19:50:32'),
(5, 'How to delete my account', 'To delete your account, log into your account and navigate to **Settings / Account / Delete my account**', '2024-11-25 19:51:22', '2024-11-25 19:51:22'),
(6, 'How to change my job posts currency', 'To change your job posts currency, log into your account and navigate to **Settings / Jobs / Change job posts currency**', '2024-11-25 19:52:16', '2024-11-25 19:56:09'),
(7, 'How to edit or delete my job posts', 'To edit or delete job posts, log into your account and navigate to **\"Jobs\"** tab where you will see all your job posts. Open the job post of your choice and click on the **edit** or **delete** button to proceed', '2024-11-25 19:55:27', '2024-11-25 19:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Artificial Intelligence', 'ai', '2024-10-14 08:16:52', '2024-10-14 08:16:52'),
(2, 'Back-End Development', 'backend_dev', '2024-10-14 08:29:12', '2024-10-14 08:16:59'),
(3, 'Blockchain Development', 'blockchain_dev', '2024-10-14 08:17:13', '2024-10-14 08:17:13'),
(4, 'Cloud Computing', 'cloud_comp', '2024-10-14 08:18:02', '2024-10-14 08:18:02'),
(5, 'Cybersecurity', 'cyber_sec', '2024-10-14 08:18:16', '2024-10-14 08:18:16'),
(6, 'Data Science & Analytics', 'data_sci_n_analytics', '2024-10-14 08:19:14', '2024-10-14 08:19:14'),
(7, 'DevOps & SRE', 'devops_n_sre', '2024-10-14 08:20:25', '2024-10-14 08:20:25'),
(8, 'Front-End Development', 'frontend_dev', '2024-10-14 08:20:48', '2024-10-14 08:20:48'),
(9, 'Full-Stack Development', 'fullstack_dev', '2024-10-14 08:21:03', '2024-10-14 08:21:03'),
(10, 'Game Development', 'game_dev', '2024-10-14 08:21:16', '2024-10-14 08:21:16'),
(11, 'IT Support & Helpdesk', 'it_support_n_helpd', '2024-10-14 08:21:50', '2024-10-14 08:21:50'),
(12, 'Machine Learning Engineering', 'mac_learning_engr', '2024-10-14 08:22:24', '2024-10-14 08:22:24'),
(13, 'Mobile App Development', 'mobile_app_dev', '2024-10-14 08:22:41', '2024-10-14 08:22:41'),
(14, 'Network Engineering', 'net_engr', '2024-10-14 08:22:57', '2024-10-14 08:22:57'),
(15, 'Product Management', 'prod_mgt', '2024-10-14 08:23:10', '2024-10-14 08:23:10'),
(16, 'QA Testing & Automation', 'qa_test_n_auto', '2024-10-14 08:23:26', '2024-10-14 08:23:26'),
(17, 'Software Engineering', 'software_engr', '2024-10-14 08:23:42', '2024-10-14 08:23:42'),
(18, 'Systems Administration', 'systems_admin', '2024-10-14 08:24:00', '2024-10-14 08:24:00'),
(19, 'UI/UX Design', 'uiux_design', '2024-10-14 08:24:33', '2024-10-14 08:24:33'),
(20, 'Web Development', 'web_dev', '2024-10-14 08:24:48', '2024-10-14 08:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `job_levels`
--

CREATE TABLE `job_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_levels`
--

INSERT INTO `job_levels` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Intern', 'intern', '2024-10-14 08:11:59', '2024-10-14 08:11:59'),
(2, 'Entry', 'entry', '2024-10-14 08:12:14', '2024-10-14 08:12:14'),
(3, 'Mid', 'mid', '2024-10-14 08:12:25', '2024-10-14 08:12:25'),
(4, 'Senior', 'senior', '2024-10-14 08:12:39', '2024-10-14 08:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `job_payment_days`
--

CREATE TABLE `job_payment_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_payment_days`
--

INSERT INTO `job_payment_days` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hourly', 'hour', '2024-10-14 08:13:42', '2024-10-14 08:13:42'),
(2, 'Monthly', 'month', '2024-10-14 08:13:51', '2024-10-14 08:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `by_user` int(11) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicants` int(11) NOT NULL,
  `applicants_applied` int(11) NOT NULL DEFAULT 0,
  `payment` int(11) NOT NULL,
  `payment_day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `unique_id`, `by_user`, `role`, `level`, `description`, `type`, `applicants`, `applicants_applied`, `payment`, `payment_day`, `views`, `created_at`, `updated_at`) VALUES
(9, 'fKqSB', 9, 'backend_dev', 'mid', 'We are in need of a back-end developer that can work with Python\'s Django web framework to help build back-end structure for our web application.\n\nWork days: Mon - Fri\nWork hours: 3hr a day', 'remote', 6, 0, 850000, 'month', 0, '2024-10-16 06:48:42', '2024-11-20 20:06:42'),
(10, 'yrm1e', 9, 'cyber_sec', 'senior', 'We are in need of an experienced cybersecuirty analyst/whitehat hacker to help protect our servers from attackers and exploiters. \nWork days: Mon - Web\nWork hours: 4hr per day\nWe are a startup looking forward to work with professionals in this field; we will further discuss more on interview.', 'hybrid', 5, 0, 1080000, 'month', 0, '2024-10-16 06:54:15', '2024-10-19 11:12:38'),
(11, 'GJl2t', 9, 'mobile_app_dev', 'mid', 'We are in need to a mobile app developer to join our team build an e-commerce app for a fourth coming project we are working on.\n\nDeveloper must be able to work with Dart & Flutter, and Git for version control (GitHub).\n\nWe will further discuss work hours and others during interview.\n\n', 'remote', 10, 0, 800000, 'month', 0, '2024-10-16 06:58:07', '2024-11-20 20:04:33'),
(12, 'xQ3bO', 9, 'uiux_design', 'intern', 'Our startup is now open for interns who are looking forward to grow in UI/UX design, work with professionals and gain industry experience.\n\nApply if interested', 'remote', 8, 0, 150000, 'month', 0, '2024-10-16 07:00:38', '2024-11-20 20:03:27'),
(13, '7vhji', 9, 'web_dev', 'entry', 'We are in need of a PHP web developer who can work with Laravel in building an online student learning plaform.\n\nPerequisites:\n1. Livewire\n2. Bootstrap 5/Tailwind CSS\n3. Filament\n4. Laravel 11 \n\nWe want the project to be completed in 1 month', 'remote', 5, 0, 900000, 'month', 0, '2024-10-16 07:04:44', '2024-11-20 20:02:51'),
(14, '2pEgI', 9, 'software_engr', 'entry', 'We are in need to a Software Engineer who can work with Python and Django to join our team in building an online marketplace.\n\nWe will discuss more during interview.', 'remote', 6, 0, 700000, 'hour', 0, '2024-10-16 07:07:04', '2024-11-20 20:01:49'),
(15, 'r3Vfi', 9, 'net_engr', 'mid', 'We are in need of a network engineer to help us on build a secure network for our company.\n\nWe will discuss more during interview', 'on-site', 4, 0, 2000000, 'month', 0, '2024-10-16 07:08:25', '2024-10-19 11:09:52'),
(16, 'ZpyO1', 9, 'web_dev', 'senior', 'We are in need of a full-stack nodejs web developer to help build an app market. \n\nSalary: NGN900,000 - NGN1,500,000\n\nWe will discuss more during interview', 'remote', 1, 1, 900000, 'month', 0, '2024-10-16 07:10:34', '2024-11-24 20:48:44'),
(17, 'oMWoL', 9, 'frontend_dev', 'mid', 'We are in need of a front-end developer who can work with React Js & Tailwind CSS to build dynamic front-end interfaces for a project.\n\nDeveloper will work with a back-end development team and must be able to work with Git for version control', 'remote', 5, 2, 500000, 'month', 1, '2024-10-16 07:12:33', '2024-11-18 20:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_applicants`
--

CREATE TABLE `job_post_applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `for_notification` varchar(255) NOT NULL,
  `for_job_post` varchar(255) NOT NULL,
  `for_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `cover_letter` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_applicants`
--

INSERT INTO `job_post_applicants` (`id`, `for_notification`, `for_job_post`, `for_user`, `name`, `email`, `resume`, `cover_letter`, `created_at`, `updated_at`) VALUES
(9, 'iRoYs', 'oMWoL', 9, 'John Doe', 'johndoe@mail.com', 'resumes/JohnDoe(johndoe@mail.com)_Resume_oMWoL.docx', 'Hello! I see you need a front-end developer who will work with your back-end team and can use Git for version control. I have over 5+ years of experience as a front-end developer and have built applications with dynamic and responsive UIs. I am reliable and trustworthy. \n\nBelow is a link to my portfolio https://saaaron.github.io', '2024-11-18 20:14:24', '2024-11-18 20:14:24'),
(10, 'JliDJ', 'oMWoL', 9, 'Jane Doe', 'janedoe@mail.com', 'resumes/JaneDoe(janedoe@mail.com)_Resume_oMWoL.docx', 'Hello! I see you need a front-end developer who will work with your back-end team and can use Git for version control. I have over 5+ years of experience as a front-end developer and have built applications with dynamic and responsive UIs. I am reliable and trustworthy. \n\nBelow is a link to my portfolio https://saaaron.github.io', '2024-11-18 20:15:18', '2024-11-18 20:15:18'),
(12, 'GJUNp', 'ZpyO1', 9, 'John Doe', 'johndoe@mail.com', 'resumes/JohnDoe(johndoe@mail.com)_Resume_ZpyO1.docx', 'Hello! I see you need a full-stack web developer who will build an app market for you. I have over 5+ years of experience as a front-end developer and have built applications with dynamic and responsive UIs and with robust backend systems. I am reliable and trustworthy. \n\nBelow is a link to my portfolio https://saaaron.github.io', '2024-11-24 20:48:44', '2024-11-24 20:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_views`
--

CREATE TABLE `job_post_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `for_job_post` varchar(255) NOT NULL,
  `for_user` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_views`
--

INSERT INTO `job_post_views` (`id`, `for_job_post`, `for_user`, `ip_address`, `created_at`, `updated_at`) VALUES
(2, 'oMWoL', 9, '127.0.0.1', '2024-11-18 19:45:50', '2024-11-18 19:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Remote', 'remote', '2024-10-14 08:14:55', '2024-10-14 08:14:55'),
(2, 'Hybrid', 'hybrid', '2024-10-14 08:15:08', '2024-10-14 08:15:08'),
(3, 'On-site', 'on-site', '2024-10-14 08:15:24', '2024-10-14 08:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_13_182610_admins', 2),
(5, '2024_10_13_185154_job_categories', 3),
(6, '2024_10_13_185202_job_levels', 3),
(7, '2024_10_13_185210_job_types', 3),
(8, '2024_10_13_190413_job_posts', 4),
(9, '2024_10_13_191905_job_payment_days', 4),
(10, '2024_10_14_093444_about_page', 5),
(11, '2024_10_14_093503_privacy_policy_page', 5),
(12, '2024_10_14_093513_faq_page', 5),
(13, '2024_10_14_100758_terms_of_use_page', 6),
(14, '2024_10_15_195019_job_post_views', 7),
(15, '2024_10_15_195030_job_post_applicants', 7),
(16, '2024_11_18_200502_user_notifications', 8),
(17, '2024_11_18_202350_job_post_views', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy_page`
--

CREATE TABLE `privacy_policy_page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy_policy` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policy_page`
--

INSERT INTO `privacy_policy_page` (`id`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, 'At Techancy, we respect your privacy and are committed to protecting your personal information. This Privacy Policy outlines how we collect, use, and safeguard your information when you use our platform. By accessing or using Techancy, you agree to the terms of this Privacy Policy.\n\n##### 1. Information We Collect\nWe collect the following types of information to provide and improve our services:\n* **Account Information:** When employers create an account, we collect personal information such as name, email address, company information, and password.\n* **Job Seekers:** When submitting applications, we collect information such as resumes, cover letters, and other relevant job-seeking data.\n* **Usage Data:** We collect information about your interaction with the platform, such as pages viewed, time spent, and other usage statistics.\n* **Cookies:** We use cookies to enhance your experience by tracking preferences, login sessions, and performance analytics.\n\n##### 2. How We Use Your Information\nWe use the collected information for the following purposes:\n* **Providing Services:** To operate and improve the Techancy platform, allowing employers to post jobs and job seekers to apply for positions.\n* **Account Management:** To manage your account, including sending notifications, updates, and security alerts.\n* **Communication:** To respond to inquiries and provide customer support.\n* **Improving the Platform:** To analyze trends, usage, and activities to improve the platform\'s functionality and performance.\n* **Legal Obligations:** To comply with any applicable laws or regulations.\n\n##### 3. Sharing Your Information\nWe do not sell or rent your personal information to third parties. We may share your information in the following circumstances:\n* **With Employers:** Resumes, cover letters, and job application information are shared with employers through their dashboard when you apply for a job.\n* **Service Providers:** We may share your information with trusted third-party service providers who help us operate and improve the platform (e.g., hosting, analytics, and email services). These providers are required to protect your information.\n* **Legal Compliance:** We may disclose your information when required by law, legal processes, or to protect the rights, property, or safety of Techancy, our users, or others.\n\n##### 4. Data Security\nWe take reasonable measures to protect your personal information from unauthorized access, use, or disclosure. However, no method of data transmission over the internet or storage is 100% secure, and we cannot guarantee absolute security.\n\n##### 5. Your Choices and Rights\nYou have certain rights concerning your personal information:\n* **Access and Update:** You can access and update your account information by logging into your account.\n* **Delete Your Account:** You can deactivate your account at any time. Upon deactivation, we will retain certain information as required by law or for legitimate business purposes.\n* **Opt-Out of Communications:** You can unsubscribe from marketing emails at any time by following the unsubscribe link in the email.\n\n##### 6. Cookies and Tracking Technologies\nWe use cookies and similar tracking technologies to collect usage information and improve the platform experience. You can control cookie preferences through your browser settings.\n\n##### 7. Third-Party Links\nTechancy may contain links to third-party websites. We are not responsible for the privacy practices or content of these websites. Please review their privacy policies before providing any personal information.\n\n##### 8. Children’s Privacy\nTechancy is not intended for use by children under the age of 18. We do not knowingly collect personal information from children. If you believe we have collected such information, please contact us, and we will take appropriate steps to delete it.\n\n##### 9. Changes to This Privacy Policy\nWe may update this Privacy Policy from time to time. When we do, we will post the revised policy on this page and update the effective date. Your continued use of the platform after changes have been made constitutes your acceptance of the updated policy.\n\n##### 10. Contact Us\nIf you have any questions or concerns about this Privacy Policy, please contact us at [support@techancy.com].', '2024-10-14 09:25:38', '2024-11-25 20:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mHVIhyKuWQj04I5yJ14Kf7MHppIFRm2E88jDPiWs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiZUJ4UkJCUjJGSVZoZ2gwQ0cwNndkYXEzTGQ5UGxnSDZWZWpiZVdvViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1733240089);

-- --------------------------------------------------------

--
-- Table structure for table `terms_of_use_page`
--

CREATE TABLE `terms_of_use_page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms_of_use` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_of_use_page`
--

INSERT INTO `terms_of_use_page` (`id`, `terms_of_use`, `created_at`, `updated_at`) VALUES
(1, 'Techancy is an open-source platform dedicated to connecting tech talents with job opportunities across the industry. Our goal is to provide a streamlined job search experience, focusing exclusively on tech roles, while offering employers an efficient way to discover and hire the best candidates. Whether you\'re looking to start your career or find your next big opportunity, Techancy brings together top talent and employers in one place.\n\nWelcome to Techancy, a platform dedicated to connecting tech professionals with job opportunities. By accessing or using Techancy, you agree to comply with and be bound by the following terms and conditions.\n\n##### 1. Acceptance of Terms\nBy using the Techancy platform, you agree to abide by these Terms of Use and any modifications that may be made to them from time to time. If you do not agree to these terms, you must discontinue using the platform immediately.\n##### 2. Account Registration\n* Only employers and recruiters are allowed to create accounts on Techancy to post jobs.\n* You are responsible for maintaining the confidentiality of your account and password and for any activities that occur under your account.\n* You agree to provide accurate and complete information during registration and maintain the accuracy of your information.\n* \n##### 3. Job Posting and Management\n* Employers have access to a comprehensive dashboard to manage job posts, including the ability to create, edit, delete, and track job applications.\n* Job posts must be accurate, lawful, and free from misleading information. Techancy reserves the right to remove any post that violates these terms.\n* Employers may not use the platform for illegal recruitment practices or to promote job opportunities that are not related to the tech industry.\n\n##### 4. Application Process\n* Job seekers can submit resumes and cover letters directly through the platform. Resumes and cover letters will be sent to the company’s dashboard for review.\n* Techancy is not responsible for the outcome of any job application or employment relationship that results from interactions on the platform.\n\n##### 5. User Conduct\n* Users must use the platform for lawful purposes and comply with all applicable laws and regulations.\n* Harassment, abusive language, or any form of discrimination against other users, whether employers or job seekers, is strictly prohibited.\n* You agree not to use any automated systems (such as bots) to access the platform in any way that may overload or disrupt its functionality.\n\n##### 6. Content Ownership and License\n* All content posted by employers (including job descriptions) remains the property of the employer. By submitting content, you grant Techancy a non-exclusive, royalty-free, worldwide license to use, modify, and display the content for the purposes of operating the platform.\n* Techancy reserves the right to remove any content that violates these Terms of Use.\n\n##### 7. Privacy\nTechancy is committed to protecting the privacy of its users. Please review our Privacy Policy to understand how we collect, use, and safeguard your information.\n\n##### 8. Termination of Use\n* Techancy reserves the right to suspend or terminate your account if you violate these terms or engage in prohibited conduct.\n* Employers and job seekers may deactivate their accounts at any time, but Techancy may retain certain information as required by law or for legitimate business purposes.\n\n##### 9. Limitation of Liability\n* Techancy is a platform for connecting employers and job seekers and does not guarantee employment or the suitability of any job applicant or employer.\n* Techancy is not liable for any direct, indirect, incidental, or consequential damages arising from the use of the platform.\n\n##### 10. Changes to Terms\nTechancy reserves the right to modify these Terms of Use at any time. Users will be notified of any significant changes, and continued use of the platform after such changes constitute acceptance of the new terms.\n\nIf you have any questions about these Terms of Use, please contact us at [support@techancy.com].', '2024-10-14 09:18:38', '2024-11-25 20:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_photo` varchar(255) NOT NULL DEFAULT 'profile_photos/default.png',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `currency` enum('NGN','USD','POUND','EURO','YEN') NOT NULL DEFAULT 'NGN',
  `email_verified` enum('yes','no') NOT NULL DEFAULT 'no',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_photo`, `name`, `email`, `bio`, `website`, `location`, `currency`, `email_verified`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(9, 'profile_photos/Techancy_1732483229924112024.png', 'Techancy', 'aaronicmatter@gmail.com', 'A new tech company', 'https://saaaron.github.io', 'Kaduna, Nigeria', 'NGN', 'yes', '2024-11-12 19:57:12', '$2y$12$YcPWMXJZzn42W1XEYPxPVuNmjNkXeJYSak8qIx8ZLLCLkzwSA/5BC', '2024-10-10 10:08:58', '2024-11-24 20:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `for_job_post` varchar(255) NOT NULL,
  `for_user` int(11) NOT NULL,
  `type` enum('view','applicant') NOT NULL,
  `seen` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `unique_id`, `for_job_post`, `for_user`, `type`, `seen`, `created_at`, `updated_at`) VALUES
(2, '0Vzbm', 'oMWoL', 9, 'view', 'yes', '2024-11-18 19:45:50', '2024-11-24 20:51:45'),
(6, 'iRoYs', 'oMWoL', 9, 'applicant', 'yes', '2024-11-18 20:14:24', '2024-11-24 20:51:45'),
(7, 'JliDJ', 'oMWoL', 9, 'applicant', 'yes', '2024-11-18 20:15:18', '2024-11-24 20:51:45'),
(8, 'GJUNp', 'ZpyO1', 9, 'applicant', 'yes', '2024-11-24 20:48:44', '2024-11-24 20:51:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `delete_acct_tokens`
--
ALTER TABLE `delete_acct_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `email_reset_tokens`
--
ALTER TABLE `email_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `email_verification_tokens`
--
ALTER TABLE `email_verification_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq_page`
--
ALTER TABLE `faq_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_categories_slug_unique` (`slug`);

--
-- Indexes for table `job_levels`
--
ALTER TABLE `job_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_levels_slug_unique` (`slug`);

--
-- Indexes for table `job_payment_days`
--
ALTER TABLE `job_payment_days`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_payment_days_slug_unique` (`slug`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post_applicants`
--
ALTER TABLE `job_post_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post_views`
--
ALTER TABLE `job_post_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_types_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `privacy_policy_page`
--
ALTER TABLE `privacy_policy_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `terms_of_use_page`
--
ALTER TABLE `terms_of_use_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_page`
--
ALTER TABLE `faq_page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `job_levels`
--
ALTER TABLE `job_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_payment_days`
--
ALTER TABLE `job_payment_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_post_applicants`
--
ALTER TABLE `job_post_applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_post_views`
--
ALTER TABLE `job_post_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `privacy_policy_page`
--
ALTER TABLE `privacy_policy_page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_of_use_page`
--
ALTER TABLE `terms_of_use_page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
