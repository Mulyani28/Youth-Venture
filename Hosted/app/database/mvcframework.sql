-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 05:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvcframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicinfo`
--

CREATE TABLE `academicinfo` (
  `profileId` int(11) NOT NULL,
  `institution` varchar(150) NOT NULL,
  `major` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academicinfo`
--

INSERT INTO `academicinfo` (`profileId`, `institution`, `major`) VALUES
(1, 'University of Technology Malaysia', 'Bachelor of Computer Science (Data Engineering)');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `act_id` int(11) NOT NULL,
  `act_title` varchar(255) NOT NULL,
  `act_desc` text NOT NULL,
  `act_datetime` datetime NOT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `badgeId` int(11) NOT NULL,
  `badgeName` varchar(150) NOT NULL,
  `badgeDesc` text NOT NULL,
  `badgeCriteria` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`badgeId`, `badgeName`, `badgeDesc`, `badgeCriteria`) VALUES
(1, 'Multitalented Achiever', 'This student is very active in joining activities!!', 'Join 20 activities'),
(2, 'Reward Pioneer', 'This student successfully claimed rewards across different types.', 'Claim 1 reward from each reward category: Cultural Events, Sports Activities, Outdoor Adventures, Service Initiatives and Education Empowerment'),
(4, 'Active User', 'This user has been active for 1 year!', 'Active for 1 year');

-- --------------------------------------------------------

--
-- Table structure for table `extracurricular`
--

CREATE TABLE `extracurricular` (
  `extracurricularId` int(11) NOT NULL,
  `profileId` int(11) NOT NULL,
  `extraCuriTitle` varchar(250) NOT NULL,
  `extraCuriPlace` varchar(250) NOT NULL,
  `position` varchar(250) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extracurricular`
--

INSERT INTO `extracurricular` (`extracurricularId`, `profileId`, `extraCuriTitle`, `extraCuriPlace`, `position`, `startDate`, `endDate`) VALUES
(1, 1, 'Coding Club', 'University of Malaya', 'President', '2019-08-01', '2022-05-01'),
(2, 1, 'Environmental Cleanup', 'Green Earth Organization', 'Volunteer', '2020-06-01', '2021-08-01'),
(3, 1, 'Debate Team', 'High School', 'Team Member', '2017-09-01', '2019-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(2, 1, 'This is my second post.', 'This is the content of my second post.', '2023-12-05 10:00:04'),
(3, 1, 'Siti', 'test test', '0000-00-00 00:00:00'),
(4, 1, 'ewf', 'ref', '0000-00-00 00:00:00'),
(5, 1, 'Siti', '', '0000-00-00 00:00:00'),
(6, 1, 'Ali', 'ikan', '0000-00-00 00:00:00'),
(7, 1, 'Eat', 'Sleep', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profileId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `totalPoints` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `profileImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profileId`, `studentId`, `totalPoints`, `username`, `profileImage`) VALUES
(1, 1, 1000, 'izzah', '');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `reg_id` int(11) NOT NULL,
  `reg_title` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_status` varchar(20) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`reg_id`, `reg_title`, `reg_date`, `reg_status`, `users_id`) VALUES
(2, 'First Year Experience', '2023-12-19', 'Pending', 3),
(0, 'test title', '2023-12-14', 'pending', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `reg_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`reg_id`, `title`, `description`, `url`, `status`, `created_at`, `updated_at`, `users_id`) VALUES
(1, 'Sample Event', 'Description of the sample event.', 'https://example.com/sample-event', 'pending', '2023-12-29 07:58:17', '2023-12-29 07:58:17', NULL),
(3, '', 'Kambing', 'https://example.com/sample-event', 'Active', '2024-01-02 02:43:55', '2024-01-02 02:43:55', NULL),
(4, 'Kuda', 'kuda', 'https://example.com/sample-event', 'Active', '2024-01-02 02:44:59', '2024-01-02 02:44:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `rewardId` int(11) NOT NULL,
  `rewardCategory` varchar(150) NOT NULL,
  `rewardName` varchar(150) NOT NULL,
  `rewardDesc` text NOT NULL,
  `rewardPoints` int(11) NOT NULL,
  `rewardCriteria` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`rewardId`, `rewardCategory`, `rewardName`, `rewardDesc`, `rewardPoints`, `rewardCriteria`) VALUES
(1, 'Sports Activities', 'Competitive Spirit Distinction', 'User who demonstrate exceptional competitiveness, dedication, and sportsmanship in their participation in sports activities.', 50, 'Join at least 15 of event under category of sports activity.'),
(2, 'Sports Activities', '6km Finisher', 'The users participated in organized running events and completing the challenging 6-kilometer distance', 5, 'Completion of the race entire distance.'),
(3, 'Cultural Events', 'Dance Dynamo Award', 'Given to individuals who exhibit exceptional enthusiasm and participation in cultural events centered around dance.', 50, 'Active 15 participation in dance events.'),
(4, 'Service Initiatives', 'Wellness Hero Honor', 'The individuals who contribute significantly to community health and wellness through active participation in initiatives related to healthcare, fitness, or mental health awareness.', 5, 'Active participation in community health and wellness program.'),
(5, 'Cultural Events', 'Participation Award', 'Recognition for active involvement in cultural activities', 50, 'Active involvement in at least two performances'),
(6, 'Cultural Events', 'Workshop Organizer', 'Acknowledgment for organizing a successful cultural workshop', 75, 'Successful planning and execution of the workshop'),
(7, 'Cultural Events', 'Dance Competition Achievement', 'Recognition for outstanding performance in a dance competition', 60, 'Received positive feedback from the judges'),
(8, 'Cultural Events', 'Art Exhibition Contributor', 'Appreciation for contributions to a collaborative art exhibition', 12, 'Contributed artwork and participated in the exhibition'),
(9, 'Cultural Events', 'Cultural Quiz Host', 'Recognition for hosting an engaging cultural quiz', 45, 'Created engaging quiz questions and managed the event smoothly'),
(10, 'Cultural Events', 'Art Festival', 'Celebrate creativity with various art forms', 8, 'Submit your original artwork'),
(11, 'Cultural Events', 'Music Concert', 'Enjoy a night of live music performances', 12, 'Attend and share your favorite song'),
(12, 'Cultural Events', 'Literary Meetup', 'Explore the world of literature and storytelling', 20, 'Write and share a short story or poem'),
(13, 'Cultural Events', 'Dance Workshop', 'Learn new dance styles and express yourself', 15, 'Participate and perform in the workshop'),
(14, 'Cultural Events', 'Film Screening', 'Watch thought-provoking films with fellow enthusiasts', 10, 'Write a review for one of the screened films'),
(15, 'Cultural Events', 'Photography Exhibition', 'Showcase your photography skills and perspectives', 25, 'Submit your best photographs for display'),
(17, 'Cultural Events', 'Theater Performance', 'Experience the magic of live theater', 30, 'Attend and share your thoughts on the performance'),
(18, 'Cultural Events', 'Historical Tour', 'Explore the history of our city', 5, 'Take part in a guided historical tour'),
(19, 'Cultural Events', 'Language Exchange', 'Connect with others and practice different languages', 7, 'Engage in a language exchange conversation'),
(20, 'Sports Activities', 'Running Challenge', 'Participate in a community running event', 10, 'Complete a 5K run'),
(21, 'Sports Activities', 'Basketball Tournament', 'Showcase your basketball skills in a friendly competition', 15, 'Join and play in the tournament'),
(22, 'Sports Activities', 'Yoga Class', 'Experience the benefits of yoga and mindfulness', 8, 'Attend a yoga class and practice regularly'),
(23, 'Sports Activities', 'Swimming Session', 'Improve your swimming skills and stay fit', 12, 'Take part in a swimming training session'),
(24, 'Sports Activities', 'Cycling Adventure', 'Explore scenic routes on a cycling adventure', 20, 'Complete a challenging cycling route'),
(25, 'Sports Activities', 'Football Match', 'Enjoy the thrill of a football match with friends', 25, 'Participate in a local football match'),
(26, 'Sports Activities', 'Golf Lesson', 'Learn the art of golfing with professional instructors', 18, 'Attend a golf lesson and practice on the course'),
(27, 'Sports Activities', 'Tennis Practice', 'Sharpen your tennis skills with regular practice', 30, 'Participate in a tennis practice session'),
(28, 'Sports Activities', 'Fitness Bootcamp', 'Join an intense fitness bootcamp for a full-body workout', 15, 'Complete a fitness bootcamp program'),
(29, 'Sports Activities', 'Rock Climbing Adventure', 'Challenge yourself with an exciting rock climbing experience', 22, 'Conquer a difficult rock climbing route'),
(30, 'Sports Activities', 'Athletic Achievement', 'Achieve excellence in a specific sport', 25, 'Win a sports competition');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registered` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `ic` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT 'student',
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date_registered`, `name`, `birthday`, `gender`, `ic`, `street`, `city`, `state`, `postal_code`, `country`, `roles`, `phone`) VALUES
(2, 'aliatul', '', '$2y$10$Knmz2/3GABJk0Yh6DdRtaucLWYH4m3u/wGjEHQvOPIPw7P3Mr5ENi', NULL, 'firstname', NULL, '', '', '', '', '', '', '', 'student', NULL),
(3, 'mulyani', 'mulyanisaripuddin28@gmail.com', '$2y$10$tR4FjoytK0c6ksn2MygxYO6N2Zg0bWYwZCwaRcRc2hJJQStemTOva', NULL, 'firstname', NULL, '', '', '', '', '', '', '', 'student', NULL),
(4, 'mulyani', 'mulyanisaripuddin28@gmail.com', '$2y$10$tf3q6vYZTF5iWE/TgP1TwOlCNGaNML6q.Vxg6Qv92m4SxJRPwQS..', NULL, 'firstname', NULL, '', '', '', '', '', '', '', 'student', NULL),
(5, 'ayam', 'ayam@gmail.com', '$2y$10$G8YkLEJUi78VknnV2UU/cuB4qnmLeOfBnXpulUwAzjby94.kNKOBe', NULL, 'firstname', NULL, '', '', '', '', '', '', '', 'student', NULL),
(7, 'izzah', 'izzahalia6@gmail.com', '$2y$10$yCBpIk8wOe8YLDGT1oXIa.6xy2BKiVC9qyPjeSNKsg6F44gIWXqcC', '2024-01-02 00:00:00', 'ALIATUL IZZAH', '2024-01-02', 'female', '050605030135', 'B4-14,Jalan TBP 2', 'Subang Jaya', 'Select Region', '47500', 'Malaysia', 'student', '010 654 8554');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`badgeId`);

--
-- Indexes for table `extracurricular`
--
ALTER TABLE `extracurricular`
  ADD PRIMARY KEY (`extracurricularId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profileId`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD KEY `fk_users_id` (`users_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`rewardId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `badgeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extracurricular`
--
ALTER TABLE `extracurricular`
  MODIFY `extracurricularId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `rewardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registers`
--
ALTER TABLE `registers`
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

