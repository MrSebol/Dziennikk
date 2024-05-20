-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 20, 2024 at 12:01 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `grade` float NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `subject`, `grade`, `user_id`) VALUES
(1, 'Matematyka', 4.5, 1),
(2, 'Fizyka', 3.8, 1),
(3, 'Język polski', 4.2, 1),
(4, 'Chemia', 4, 1),
(5, 'Historia', 4.5, 1),
(6, 'Wychowanie fizyczne', 5, 1),
(7, 'Język angielski', 4.8, 1),
(8, 'Biologia', 4.3, 1),
(9, 'Informatyka', 4.5, 1),
(10, 'Matematyka', 4, 1),
(11, 'Fizyka', 5, 1),
(12, 'Matematyka', 5, 1),
(13, 'Polski', 5, 2),
(14, 'Matematyka', 3, 2),
(15, 'Informatyka', 6, 2),
(16, 'Informatyka', 6, 2),
(17, 'Matematyka', 5, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timetable`
--

CREATE TABLE `timetable` (
  `lesson_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` time NOT NULL,
  `subject` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`lesson_id`, `day`, `time`, `subject`, `user_id`) VALUES
(46, 'Poniedziałek', '08:00:00', 'Matematyka', 1),
(47, 'Poniedziałek', '10:00:00', 'Fizyka', 1),
(48, 'Poniedziałek', '12:00:00', 'Język polski', 1),
(49, 'Wtorek', '08:00:00', 'Chemia', 1),
(50, 'Wtorek', '10:00:00', 'Historia', 1),
(51, 'Wtorek', '12:00:00', 'Wychowanie fizyczne', 1),
(52, 'Środa', '08:00:00', 'Język angielski', 1),
(53, 'Środa', '10:00:00', 'Biologia', 1),
(54, 'Środa', '12:00:00', 'Geografia', 1),
(55, 'Czwartek', '08:00:00', 'Informatyka', 1),
(56, 'Czwartek', '10:00:00', 'Matematyka', 1),
(57, 'Czwartek', '12:00:00', 'Fizyka', 1),
(58, 'Piątek', '08:00:00', 'Język angielski', 1),
(59, 'Piątek', '10:00:00', 'Chemia', 1),
(60, 'Piątek', '12:00:00', 'Biologia', 1),
(65, 'Poniedziałek', '09:00:00', 'Polski', 2),
(66, 'Poniedziałek', '10:00:00', 'Matematyka', 2),
(67, 'Poniedziałek', '11:00:00', 'Informatyka', 2),
(68, 'Poniedziałek', '11:00:00', 'Informatyka', 2),
(69, 'Poniedziałek', '09:00:00', 'Matematyka', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'Kamil', '1234'),
(2, 'ktos', '1111'),
(3, 'Piotr', '55555');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
