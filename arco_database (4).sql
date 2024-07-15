-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:46 AM
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
-- Database: `arco_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `annualreports`
--

CREATE TABLE `annualreports` (
  `report_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `executive_summary` text DEFAULT NULL,
  `company_achievements` text DEFAULT NULL,
  `financial_statements` text DEFAULT NULL,
  `management_discussion` text DEFAULT NULL,
  `future_outlook` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annualreports`
--

INSERT INTO `annualreports` (`report_id`, `user_id`, `title`, `year`, `executive_summary`, `company_achievements`, `financial_statements`, `management_discussion`, `future_outlook`, `created_at`) VALUES
(15, 2, 'ARCO Republic', 2023, 'In 2023, our company achieved significant milestones, including expanding our market presence and launching innovative products. We focused on sustainability and corporate responsibility, ensuring long-term growth and value for our stakeholders.', 'In 2023, we successfully launched three new products, expanded into two new international markets, and increased our customer base by 25%. Our commitment to innovation and quality has been recognized with several industry awards.', 'Our financial performance in 2023 was robust, with a 15% increase in revenue and a 10% rise in net profit compared to the previous year. We maintained strong cash flow and reduced our debt-to-equity ratio, positioning us well for future growth.', 'The management team focused on strategic initiatives to drive growth and efficiency. We invested in technology and talent, streamlined operations, and enhanced our customer service capabilities. These efforts have resulted in improved operational performance and customer satisfaction.', 'Looking ahead, we are optimistic about our growth prospects. We plan to continue our expansion into new markets, invest in research and development, and pursue strategic partnerships. Our focus will remain on innovation, sustainability, and delivering value to our shareholders.', '2024-05-22'),
(16, 2, 'ICTE Solutions Annual Report', 2024, 'In 2023, our company reached unprecedented heights, driven by our relentless pursuit of excellence and innovation. We expanded our global footprint, introduced groundbreaking products, and strengthened our commitment to sustainability. Our strategic initiatives have positioned us as a leader in our industry, delivering exceptional value to our stakeholders.', 'Throughout 2023, we launched five innovative products that have set new standards in the market. We entered three new international markets, significantly increasing our global presence. Our customer base grew by 30%, and we received numerous accolades for our commitment to quality and innovation.', 'The financial performance in 2023 was outstanding, with a 20% increase in revenue and a 12% rise in net profit compared to the previous year. Our strong cash flow and prudent financial management allowed us to reduce our debt-to-equity ratio further, ensuring a solid foundation for future growth.', 'The management team focused on executing strategic initiatives that drive growth and operational efficiency. Investments in cutting-edge technology and top-tier talent have streamlined our operations and enhanced our customer service capabilities. These efforts have resulted in significant improvements in operational performance and customer satisfaction.', 'Looking forward, we are excited about the opportunities that lie ahead. Our plans include further expansion into emerging markets, increased investment in research and development, and the pursuit of strategic partnerships. Our unwavering focus on innovation, sustainability, and shareholder value will continue to guide our efforts as we strive for excellence in all aspects of our business.', '2024-05-22'),
(17, 2, 'SALT Solutions 2024', 2024, 'In 2023, our company achieved remarkable success through strategic initiatives and innovative solutions. We expanded our market reach, introduced cutting-edge products, and reinforced our commitment to sustainability. Our efforts have resulted in significant growth and value creation for our stakeholders.', 'In 2023, we launched four groundbreaking products that have revolutionized the industry. We expanded into two new international markets, enhancing our global footprint. Our customer base grew by 28%, and we received several prestigious awards for our innovation and quality.', 'Our financial performance in 2023 was exceptional, with a 18% increase in revenue and a 14% rise in net profit compared to the previous year. We maintained robust cash flow and further reduced our debt-to-equity ratio, positioning us strongly for future growth.', 'The management team focused on strategic initiatives to drive growth and operational efficiency. We invested in advanced technology and top-tier talent, streamlined our operations, and enhanced our customer service capabilities. These efforts have led to significant improvements in operational performance and customer satisfaction.', 'Looking ahead, we are optimistic about our growth prospects. We plan to continue our expansion into new markets, invest in research and development, and pursue strategic partnerships. Our focus will remain on innovation, sustainability, and delivering value to our shareholders.', '2024-05-22'),
(21, 2, 'Arco Report', 2024, 'Arco Annual Report', 'Arco Annual Report', 'Arco Annual Report', 'Arco Annual Report', 'Arco Annual Report', '2024-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `collage`
--

CREATE TABLE `collage` (
  `collage_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `event_id` bigint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collage`
--

INSERT INTO `collage` (`collage_id`, `user_id`, `image_path`, `event_id`) VALUES
(30, 1, 'images/Project_Report.pdf', NULL),
(32, NULL, 'images/Project_Report.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventexpenses`
--

CREATE TABLE `eventexpenses` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expense_item1` varchar(255) DEFAULT NULL,
  `expense_amount1` int(11) DEFAULT NULL,
  `expense_item2` varchar(255) DEFAULT NULL,
  `expense_amount2` int(11) DEFAULT NULL,
  `expense_item3` varchar(255) DEFAULT NULL,
  `expense_amount3` int(11) DEFAULT NULL,
  `expense_item4` varchar(255) DEFAULT NULL,
  `expense_amount4` int(11) DEFAULT NULL,
  `expense_item5` varchar(255) DEFAULT NULL,
  `expense_amount5` int(11) DEFAULT NULL,
  `expense_item6` varchar(255) DEFAULT NULL,
  `expense_amount6` int(11) DEFAULT NULL,
  `expense_item7` varchar(255) DEFAULT NULL,
  `expense_amount7` int(11) DEFAULT NULL,
  `expense_item8` varchar(255) DEFAULT NULL,
  `expense_amount8` int(11) DEFAULT NULL,
  `expense_item9` varchar(255) DEFAULT NULL,
  `expense_amount9` int(11) DEFAULT NULL,
  `expense_item10` varchar(255) DEFAULT NULL,
  `expense_amount10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventreports`
--

CREATE TABLE `eventreports` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `expected_participants` int(11) DEFAULT NULL,
  `total_participants` int(11) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventreports`
--

INSERT INTO `eventreports` (`event_id`, `event_name`, `event_date`, `event_title`, `address`, `expected_participants`, `total_participants`, `summary`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'Annual Tech Conference', '2024-06-15', 'Innovations in Technology', '123 Tech Avenue, Silicon Valley, CA', 500, 480, 'The Annual Tech Conference 2024 focused on the latest innovations in technology. Industry leaders shared insights on emerging trends, and several new products were unveiled. The event was well-received, with high engagement from participants.', 2, '2024-05-22 03:35:41', '2024-05-22 03:35:41'),
(13, 'ICTE Annual Conference', '2024-06-15', 'The ICTE Yearly Reviews', '9348, Mulawin OG, Olongapo City', 500, 480, 'The Annual Tech Conference 2024 focused on the latest innovations in technology. Industry leaders shared insights on emerging trends, and several new products were unveiled. The event was well-received, with high engagement from participants.', 2, '2024-05-22 03:39:01', '2024-05-22 03:39:01'),
(14, 'SALT Solutions Conference', '2024-05-22', 'Solution Based Conference', '283, Sta Rita, Olongapo City', 500, 480, 'The Annual Tech Conference 2024 focused on the latest innovations in technology. Industry leaders shared insights on emerging trends, and several new products were unveiled. The event was well-received, with high engagement from participants.', 2, '2024-05-22 03:40:22', '2024-05-22 03:40:22'),
(15, 'Gordon College Innovative Youth', '2024-05-21', 'Innovation for Solution', '283, Sta Rita, Olongapo City', 500, 480, 'The Annual Tech Conference 2024 focused on the latest innovations in technology. Industry leaders shared insights on emerging trends, and several new products were unveiled. The event was well-received, with high engagement from participants.', 2, '2024-05-22 03:41:20', '2024-05-22 03:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `financialreports`
--

CREATE TABLE `financialreports` (
  `financialreport_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `report_title` varchar(255) NOT NULL,
  `prepared_by` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `income1` varchar(255) NOT NULL,
  `income_salary1` decimal(10,2) NOT NULL,
  `income2` varchar(255) DEFAULT NULL,
  `income_salary2` decimal(10,2) DEFAULT NULL,
  `income3` varchar(255) DEFAULT NULL,
  `income_salary3` decimal(10,2) DEFAULT NULL,
  `income4` varchar(255) DEFAULT NULL,
  `income_salary4` decimal(10,2) DEFAULT NULL,
  `income5` varchar(255) DEFAULT NULL,
  `income_salary5` decimal(10,2) DEFAULT NULL,
  `income6` varchar(255) DEFAULT NULL,
  `income_salary6` decimal(10,2) DEFAULT NULL,
  `income7` varchar(255) DEFAULT NULL,
  `income_salary7` decimal(10,2) DEFAULT NULL,
  `income8` varchar(255) DEFAULT NULL,
  `income_salary8` decimal(10,2) DEFAULT NULL,
  `income9` varchar(255) DEFAULT NULL,
  `income_salary9` decimal(10,2) DEFAULT NULL,
  `income10` varchar(255) DEFAULT NULL,
  `income_salary10` decimal(10,2) DEFAULT NULL,
  `expense_item1` varchar(255) NOT NULL,
  `expense_amount1` decimal(10,2) NOT NULL,
  `expense_item2` varchar(255) DEFAULT NULL,
  `expense_amount2` decimal(10,2) DEFAULT NULL,
  `expense_item3` varchar(255) DEFAULT NULL,
  `expense_amount3` decimal(10,2) DEFAULT NULL,
  `expense_item4` varchar(255) DEFAULT NULL,
  `expense_amount4` decimal(10,2) DEFAULT NULL,
  `expense_item5` varchar(255) DEFAULT NULL,
  `expense_amount5` decimal(10,2) DEFAULT NULL,
  `expense_item6` varchar(255) DEFAULT NULL,
  `expense_amount6` decimal(10,2) DEFAULT NULL,
  `expense_item7` varchar(255) DEFAULT NULL,
  `expense_amount7` decimal(10,2) DEFAULT NULL,
  `expense_item8` varchar(255) DEFAULT NULL,
  `expense_amount8` decimal(10,2) DEFAULT NULL,
  `expense_item9` varchar(255) DEFAULT NULL,
  `expense_amount9` decimal(10,2) DEFAULT NULL,
  `expense_item10` varchar(255) DEFAULT NULL,
  `expense_amount10` decimal(10,2) DEFAULT NULL,
  `executive_summary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financialreports`
--

INSERT INTO `financialreports` (`financialreport_id`, `user_id`, `date_created`, `report_title`, `prepared_by`, `start_date`, `end_date`, `income1`, `income_salary1`, `income2`, `income_salary2`, `income3`, `income_salary3`, `income4`, `income_salary4`, `income5`, `income_salary5`, `income6`, `income_salary6`, `income7`, `income_salary7`, `income8`, `income_salary8`, `income9`, `income_salary9`, `income10`, `income_salary10`, `expense_item1`, `expense_amount1`, `expense_item2`, `expense_amount2`, `expense_item3`, `expense_amount3`, `expense_item4`, `expense_amount4`, `expense_item5`, `expense_amount5`, `expense_item6`, `expense_amount6`, `expense_item7`, `expense_amount7`, `expense_item8`, `expense_amount8`, `expense_item9`, `expense_amount9`, `expense_item10`, `expense_amount10`, `executive_summary`) VALUES
(6, 2, '2024-05-22 03:44:21', 'Monthly Financial Report', 'John Doe', '2024-05-01', '2024-05-31', '50000', 30000.00, '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Office Supplies', 5000.00, 'Travel', 3000.00, 'Utilities', 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In May 2024, our company demonstrated strong financial performance, with total income reaching Major income sources included 50,000 from primary operations and 20,000 from secondary activities. Expenses were well-managed, totaling 10,000, with significant expenditures on office supplies, travel, and utilities. The net income for the month was 60,000, reflecting our continued focus on cost efficiency and revenue growth.'),
(7, 2, '2024-05-22 03:44:23', 'Monthly Financial Report', 'Asher James', '2024-05-01', '2024-05-31', '50000', 30000.00, '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Office Supplies', 5000.00, 'Travel', 3000.00, 'Utilities', 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'This report provides a brief overview of the expenses for office supplies, travel, and utilities for the month of May 2024.'),
(8, 2, '2024-05-22 03:45:04', 'ARCO Financial Report', 'Red Anicas', '2024-05-01', '2024-05-31', '50000', 30000.00, '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Office Supplies', 5000.00, 'Travel', 3000.00, 'Utilities', 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'This report provides a brief overview of the expenses for office supplies, travel, and utilities for the month of May 2024, This report provides a brief overview of the expenses for office supplies, travel, and utilities for the month of May 2024, This report provides a brief overview of the expenses for office supplies, travel, and utilities for the month of May 2024.'),
(9, 2, '2024-05-22 03:45:57', 'SALT Solutions Financial Report', 'Asher Mayson', '2024-05-01', '2024-05-31', '70000', 3000.00, '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Office Supplies', 938488.00, 'Travel', 338493.00, 'Workforce', 200000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In the fiscal year 2023, The SALT Solutions Company successfully generated a revenue of 500 million pesos. The expenses incurred during this period were allocated as follows. Everything was used for its purpose.'),
(10, 2, '2024-05-22 03:47:14', 'April Solutions Financial Report', 'Asher Mayson', '2024-04-01', '0000-00-00', '70000', 3000.00, '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Office Supplies', 5000.00, 'Travel', 3000.00, 'Utilities', 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'April 2024 The SALT Solutions Company successfully generated a revenue of 500 million pesos. The expenses incurred during this period were allocated as follows. Everything was used for its purpose.'),
(11, 2, '2024-05-25 07:50:58', 'dsfsd', 'ksf', '2024-12-01', '2024-12-02', 'kdfksd', 234.00, 'kdfk', 888.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kldnkfs', 88.00, 'kdnfkn', 99.00, 'jkhkjsdfjk', 939.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfsdgw'),
(12, 2, '2024-05-27 03:26:17', 'This is the financial Report', 'Asher James Mayson', '2024-05-26', '2024-05-28', 'dfkjsh', 3840.00, 'oirkdf', 95349.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kjfsdjk', 9024.00, 'DSSDGSD', 23432.00, 'GDFGD', 34534.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GDFGDFG'),
(13, 2, '2024-05-27 04:51:23', 'This is the report', 'Asher James', '2023-12-07', '2024-12-07', 'Source of income', 2384.00, 'sdsdfsd', 23423.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, 'sdfsdfs', 23423.00, 'fsdfsdf', 2342.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, 'dfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `flipbook`
--

CREATE TABLE `flipbook` (
  `flipbook_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `collage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectreport`
--

CREATE TABLE `projectreport` (
  `projectID` int(11) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `projectName` varchar(999) DEFAULT NULL,
  `projectManager` varchar(999) DEFAULT NULL,
  `statusDesc` varchar(999) DEFAULT NULL,
  `overallProgress` varchar(999) DEFAULT NULL,
  `milestoneDesc` varchar(999) DEFAULT NULL,
  `compeDate` date DEFAULT NULL,
  `taskDesc` varchar(999) DEFAULT NULL,
  `stat` varchar(999) DEFAULT NULL,
  `issuesName` varchar(999) DEFAULT NULL,
  `issuesPrio` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projectreport`
--

INSERT INTO `projectreport` (`projectID`, `startDate`, `endDate`, `projectName`, `projectManager`, `statusDesc`, `overallProgress`, `milestoneDesc`, `compeDate`, `taskDesc`, `stat`, `issuesName`, `issuesPrio`) VALUES
(1, '2024-01-02', '2024-01-20', 'Annual Reports', 'Brian Gonzales', 'On Track', '50%', 'kuyuf', '2024-01-12', 'jggf', 'hg', 'kfhlah', 'djaduiag');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `title`, `description`, `date_created`, `user_id`) VALUES
(37, 'Test Report', 'This is a test', '2024-03-12', 1),
(38, 'Test Report', 'This is a test', '2024-03-12', 1),
(39, 'dddd', 'ddd', '2024-03-12', 1),
(45, 'Test 123 123', 'File 123 123 test', '2024-03-12', 1),
(46, 'Testing 12344', 'Day light like daylight we daylight like dayligh we do the daylight we do the daylight we do it daylight we do the daylght', '2024-03-12', 1),
(47, 'Presentation Day', 'Presentation 123', '2024-03-12', 1),
(48, 'Asher', 'This is a report', '2024-04-19', 1),
(49, 'Asher', 'This is a report', '2024-04-19', 1),
(50, 'Asher', 'This is a report', '2024-04-19', 1),
(51, 'Asher', 'working', '2024-04-19', 1),
(52, 'jhh', 'jhjhjh', '2024-04-20', 1),
(53, 'Hello', 'Hello this is me ', '2024-04-20', 1),
(54, 'Hello World', 'This is me ', '2024-04-20', 1),
(55, 'Asher', 'This is working', '2024-04-20', 1),
(56, 'Hello', 'Can i finally send the data?', '2024-04-20', 1),
(57, 'Pantropiko', 'Ph Pantropiko', '2024-04-20', 1),
(58, 'Pantropiko', 'Ph Pantropiko', '2024-04-20', 1),
(59, 'Anicas', 'Frederick is this', '2024-04-20', 1),
(60, 'October Dump', 'This is the october dump', '2024-04-20', 1),
(61, 'Anicas', 'Frederick S.', '2024-04-20', 1),
(62, 'Anicas', 'Frederick S.', '2024-04-20', 1),
(63, 'Hello ', 'This is fredderick', '2024-04-20', 1),
(64, 'This is', 'This is frederick', '2024-04-20', 1),
(65, 'Test2', 'TestRun@', '2024-04-20', 1),
(66, 'Collage', '1234', '2024-04-20', 1),
(67, 'Running', 'Test Run', '2024-04-20', 1),
(68, '', '', '2024-04-20', 1),
(69, 'This is the form', 'I WANT TO SUBMIT A DATA', '2024-04-20', 1),
(70, 'testtestesttest', 'testtesttest', '2024-04-20', 1),
(71, 'Test555', 'test555', '2024-04-20', 1),
(73, 'Email to asher', 'Email to asher i will be needing to add inputs and data from the hotel and marine', '2024-04-20', 1),
(74, 'Type', 'Script', '2024-04-20', 1),
(75, 'TEST RUN', 'TEST RUNTEST RUN TEST RUN TEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUN TEST RUNTEST RUN TEST RUN TEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTEST RUNTE', '2024-04-20', 1),
(76, 'Wednesday', 'Report', '2024-04-24', 1),
(77, 'bfffdgdg', 'hfhffhfh', '2024-04-24', 1),
(78, 'k hkh kd', 'kxhckshkdhc', '2024-04-24', 1),
(79, 'test123', 'test123', '2024-04-24', 1),
(80, 'ajhsja', 'jhajsah', '2024-04-24', 1),
(81, 'Asher', 'This is working', '2024-04-27', 1),
(82, 'Asher', 'This is working', '2024-04-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'edit test', 'admin@gmail.com', '$2y$10$DVR3tqc8YSAGfBe80TU1zeULw0MDyusQ3q1JpugF6Qw'),
(2, 'Asher', 'arcowebadmin@gmail.com', '$2y$10$dx0qSxh6xLc31KBUNUxc9OS/HwRsyOhnLQ0MVYzMLK17M3JRoh8gm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annualreports`
--
ALTER TABLE `annualreports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `collage`
--
ALTER TABLE `collage`
  ADD PRIMARY KEY (`collage_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_event_id` (`event_id`);

--
-- Indexes for table `eventexpenses`
--
ALTER TABLE `eventexpenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `fk_eventexpenses_user_id` (`user_id`);

--
-- Indexes for table `eventreports`
--
ALTER TABLE `eventreports`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `financialreports`
--
ALTER TABLE `financialreports`
  ADD PRIMARY KEY (`financialreport_id`),
  ADD KEY `fk_financialreports_user_id` (`user_id`);

--
-- Indexes for table `flipbook`
--
ALTER TABLE `flipbook`
  ADD PRIMARY KEY (`flipbook_id`),
  ADD KEY `fk_flipbook_user` (`user_id`),
  ADD KEY `fk_flipbook_report` (`report_id`),
  ADD KEY `fk_flipbook_collage` (`collage_id`);

--
-- Indexes for table `projectreport`
--
ALTER TABLE `projectreport`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `fk_reports_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annualreports`
--
ALTER TABLE `annualreports`
  MODIFY `report_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `collage`
--
ALTER TABLE `collage`
  MODIFY `collage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `eventexpenses`
--
ALTER TABLE `eventexpenses`
  MODIFY `expense_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `eventreports`
--
ALTER TABLE `eventreports`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `financialreports`
--
ALTER TABLE `financialreports`
  MODIFY `financialreport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `flipbook`
--
ALTER TABLE `flipbook`
  MODIFY `flipbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projectreport`
--
ALTER TABLE `projectreport`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annualreports`
--
ALTER TABLE `annualreports`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `collage`
--
ALTER TABLE `collage`
  ADD CONSTRAINT `collage_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_event_id` FOREIGN KEY (`event_id`) REFERENCES `eventreports` (`event_id`) ON DELETE CASCADE;

--
-- Constraints for table `eventexpenses`
--
ALTER TABLE `eventexpenses`
  ADD CONSTRAINT `eventexpenses_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `eventreports` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_eventexpenses_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `eventreports`
--
ALTER TABLE `eventreports`
  ADD CONSTRAINT `eventreports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `financialreports`
--
ALTER TABLE `financialreports`
  ADD CONSTRAINT `fk_financialreports_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `flipbook`
--
ALTER TABLE `flipbook`
  ADD CONSTRAINT `fk_flipbook_collage` FOREIGN KEY (`collage_id`) REFERENCES `collage` (`collage_id`),
  ADD CONSTRAINT `fk_flipbook_report` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_flipbook_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_reports_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
