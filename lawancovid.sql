-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2025 at 02:19 AM
-- Server version: 8.0.26
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawancovid`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `IDDept` int NOT NULL,
  `nama_dept` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`IDDept`, `nama_dept`) VALUES
(1, 'IT'),
(2, 'Finance'),
(3, 'Procurement'),
(4, 'Marketing'),
(6, 'HRD');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int NOT NULL,
  `IDKaryawan` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kota_tinggal` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `department` int NOT NULL,
  `kota_penempatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `IDKaryawan`, `nama`, `no_ktp`, `telp`, `kota_tinggal`, `tanggal_lahir`, `tanggal_masuk`, `department`, `kota_penempatan`) VALUES
(10, 250101, 'Hannah Ayala', '123456789', '087313166633', 'Malang', '1999-11-23', '2020-03-10', 6, 'gresik'),
(11, 250102, 'Agus Prasetyo', '3561212777333', '0873136663133', 'Tuban', '1998-08-13', '2023-03-01', 1, 'surabaya'),
(12, 250103, 'Caleb Rogers', '32131241414', '12451515121243', 'Ngawi', '1973-02-26', '2018-04-26', 2, 'surabaya'),
(13, 250104, 'Andana Widanda', '1314124124', '11111111111', 'Malang Kota', '1999-01-14', '2020-03-30', 3, 'nganjuk'),
(14, 250105, 'Illiana Acevedo', '12321321', '42142155', 'Surabaya', '1990-07-26', '2012-07-05', 4, 'surabaya'),
(15, 250106, 'Scott Mcintyre', '41123213124', '11232132', 'Bojonegoro', '1994-01-20', '2018-06-18', 6, 'nganjuk'),
(17, 250108, 'Jessamine Fernandez', '21341241245', '31241232112', 'Unde voluptas commod', '2001-11-26', '1998-10-10', 2, 'gresik'),
(18, 250109, 'Erasmus Salinas', '1919231312444', '21341241241', 'Fugiat recusandae ', '1975-12-02', '1990-12-14', 1, 'jakarta'),
(19, 250110, 'Fleur Dominguez', '08313137773113', '081321313313', 'Makasar', '1986-08-16', '2020-11-24', 1, 'surabaya'),
(20, 250111, 'Caldwell Black', '75433242423423', '312314121312', 'Jombang', '1991-11-25', '2023-02-17', 4, 'surabaya');

--
-- Triggers `karyawan`
--
DELIMITER $$
CREATE TRIGGER `trg_generate_idkaryawan` BEFORE INSERT ON `karyawan` FOR EACH ROW BEGIN
    DECLARE YYMM VARCHAR(4);
    DECLARE newIDKaryawan VARCHAR(6);
    DECLARE lastID VARCHAR(6);
    DECLARE nextID INT;

    -- Get current year and month in YYMM format
    SET YYMM = DATE_FORMAT(CURDATE(), '%y%m');

    -- Get the last inserted IDKaryawan value for the current month (if any)
    SELECT IDKaryawan INTO lastID
    FROM Karyawan
    WHERE IDKaryawan LIKE CONCAT(YYMM, '%')
    ORDER BY id DESC
    LIMIT 1;

    -- If there's no previous IDKaryawan, set nextID to 1
    IF lastID IS NULL THEN
        SET nextID = 1;
    ELSE
        -- Extract the numeric part of the last IDKaryawan and increment it
        SET nextID = CAST(SUBSTRING(lastID, 5, 2) AS UNSIGNED) + 1;
    END IF;

    -- Construct the new IDKaryawan
    SET newIDKaryawan = CONCAT(YYMM, LPAD(nextID, 2, '0'));

    -- Assign the generated IDKaryawan to the new row
    SET NEW.IDKaryawan = newIDKaryawan;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`IDDept`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index_id_karyawan` (`IDKaryawan`),
  ADD KEY `fk_department` (`department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `IDDept` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department`) REFERENCES `department` (`IDDept`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
