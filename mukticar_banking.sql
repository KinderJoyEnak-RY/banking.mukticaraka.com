-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2023 at 09:19 AM
-- Server version: 10.6.15-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mukticar_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bpd_forms`
--

CREATE TABLE `bpd_forms` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto_ktp_nasabah` varchar(255) DEFAULT NULL,
  `foto_toko` varchar(255) DEFAULT NULL,
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `nik_nasabah` varchar(50) DEFAULT NULL,
  `no_hp_nasabah` varchar(255) DEFAULT NULL,
  `email_nasabah` varchar(254) DEFAULT NULL,
  `nama_merchant` varchar(255) DEFAULT NULL,
  `alamat_merchant` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `spv` varchar(255) DEFAULT NULL,
  `koor` varchar(255) DEFAULT NULL,
  `asm` varchar(255) DEFAULT NULL,
  `dsr_code` varchar(50) DEFAULT NULL,
  `dsr_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bpd_forms`
--

INSERT INTO `bpd_forms` (`id`, `tanggal`, `foto_ktp_nasabah`, `foto_toko`, `nama_nasabah`, `nik_nasabah`, `no_hp_nasabah`, `email_nasabah`, `nama_merchant`, `alamat_merchant`, `provinsi`, `kabupaten`, `kecamatan`, `kota`, `code`, `spv`, `koor`, `asm`, `dsr_code`, `dsr_name`) VALUES
(5, '2023-10-27 08:58:18', 'bg_cover7.jpg', 'bg_cover8.jpg', 'Testing input', '12312321', '123456781', 'abc@gmail.com', 'toko jago 2', 'jalan mangga', 'Di Yogyakarta', 'Kabupaten Sleman', 'Turi', NULL, 'dummydsr', 'DUMMYSPV-NANDO', 'DUMMYKOOR-NANDO', 'DUMMYASM-NANDO', 'dummydsr', 'dummydsr');

-- --------------------------------------------------------

--
-- Table structure for table `bsi_forms`
--

CREATE TABLE `bsi_forms` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `no_hp_nasabah` varchar(20) DEFAULT NULL,
  `no_rek_bsi_syariah_nasabah` varchar(50) DEFAULT NULL,
  `ss_info_rekening` varchar(255) DEFAULT NULL,
  `ss_dashboard` varchar(255) DEFAULT NULL,
  `foto_ktp_nasabah` varchar(255) DEFAULT NULL,
  `jenis_laporan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `code` varchar(50) NOT NULL,
  `spv` varchar(255) DEFAULT NULL,
  `koor` varchar(255) DEFAULT NULL,
  `asm` varchar(255) DEFAULT NULL,
  `dsr_code` varchar(50) DEFAULT NULL,
  `dsr_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cimb_forms`
--

CREATE TABLE `cimb_forms` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_skema` varchar(255) DEFAULT NULL,
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `no_rek_nasabah` varchar(50) DEFAULT NULL,
  `nama_toko_merchant` varchar(255) DEFAULT NULL,
  `no_mid` varchar(50) DEFAULT NULL,
  `dashboard_octo_merchant` varchar(255) DEFAULT NULL,
  `foto_toko` varchar(255) DEFAULT NULL,
  `alamat_toko` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `spv` varchar(255) DEFAULT NULL,
  `koor` varchar(255) DEFAULT NULL,
  `asm` varchar(255) DEFAULT NULL,
  `dsr_code` varchar(50) DEFAULT NULL,
  `dsr_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cimb_forms`
--

INSERT INTO `cimb_forms` (`id`, `tanggal`, `jenis_skema`, `nama_nasabah`, `no_rek_nasabah`, `nama_toko_merchant`, `no_mid`, `dashboard_octo_merchant`, `foto_toko`, `alamat_toko`, `provinsi`, `kabupaten`, `kecamatan`, `code`, `spv`, `koor`, `asm`, `dsr_code`, `dsr_name`) VALUES
(17, '2023-10-26 08:13:51', 'minyak', 'UJANG LESMANA', '707530052700', 'GUNTING RAMBUT UJANG UJAY', '000008277948919', 'Screenshot_2023-10-26-07-24-07-72.jpg', 'TimePhoto_20231026_072544.jpg', 'Pasar Palabuhanratu Blok K no. 90, Kel. Palabuhanratu', 'Jawa Barat', 'Kabupaten Sukabumi', 'Palabuhanratu', 'B110169', 'ANDI RUSLI', 'DUMMY KOOR-deza', 'DEZA RAHMAT SAPUTRA', 'B110169', 'M IKHSAN ARDANI'),
(19, '2023-10-26 09:08:30', 'non_minyak', 'Maswiya', '0', 'MC', '000008577921254', 'IMG-20231025-WA0068.jpg', 'IMG-20231026-WA0006.jpg', 'Jl merpati , tuban', 'Bali', 'Kabupaten Badung', 'Kuta', 'B110099', 'DUMMYSPV-DEO', 'DEO FERNANDO KAKOMORE', 'DUMMY ASM', 'B110099', 'I KOMANG YOGA HARTA'),
(21, '2023-10-26 10:38:53', 'non_minyak', 'Nur Fatimah', '000000000000', 'Nur Wr', '000008576356840', 'Screenshot_20231026-113749_WhatsApp.jpg', 'Screenshot_20231026-113751_WhatsApp.jpg', 'Jl merpati , tuban', 'Bali', 'Kabupaten Badung', 'Kuta', 'B110099', 'DUMMYSPV-DEO', 'DEO FERNANDO KAKOMORE', 'DUMMY ASM', 'B110099', 'I KOMANG YOGA HARTA'),
(22, '2023-10-26 10:41:10', 'non_minyak', 'Ana widiyastuti', '00000000', 'Ana', '000008575361834', 'Screenshot_20231026-113942_WhatsApp.jpg', 'Screenshot_20231026-113944_WhatsApp.jpg', 'Jl merpati , tuban', 'Bali', 'Kabupaten Badung', '', 'B110099', 'DUMMYSPV-DEO', 'DEO FERNANDO KAKOMORE', 'DUMMY ASM', 'B110099', 'I KOMANG YOGA HARTA'),
(23, '2023-10-26 10:47:33', 'non_minyak', 'Dwi wahyu candra dewi', '00000000000', 'Dwi shop', '000008571073346', 'Screenshot_20231026-114157_WhatsApp.jpg', 'Screenshot_20231026-114214_WhatsApp.jpg', 'Tuban', 'Bali', 'Kabupaten Badung', 'Kuta', 'B110099', 'DUMMYSPV-DEO', 'DEO FERNANDO KAKOMORE', 'DUMMY ASM', 'B110099', 'I KOMANG YOGA HARTA'),
(24, '2023-10-26 10:59:05', 'non_minyak', 'Riskiyawati', '00', 'Riski', '000008471346843', 'Screenshot_20231026-115639_WhatsApp4.jpg', 'Screenshot_20231026-115636_WhatsApp4.jpg', 'Raya kuta', 'Bali', 'Kabupaten Badung', 'Kuta', 'B110099', 'DUMMYSPV-DEO', 'DEO FERNANDO KAKOMORE', 'DUMMY ASM', 'B110099', 'I KOMANG YOGA HARTA'),
(25, '2023-10-26 19:21:00', 'minyak', 'Asep Sutisna', '763296305700', 'ZM PRODUCT', '000008271564252', 'IMG-20231026-WA0055.jpg', 'IMG-20231026-WA0058.jpg', 'Kp Rancakemit 008/012, solokanjeruk, solokanjeruk', 'Jawa Barat', 'Kabupaten Bandung', 'Solokan Jeruk', 'B110050', 'LINDA SUKMAWATI', 'DUMMY KOOR-deza', 'DEZA RAHMAT SAPUTRA', 'B110050', 'RADEN ADYA NAUFAL MAHDI'),
(27, '2023-10-27 11:19:47', 'minyak', 'Rustini', '763297319300', 'RG', '000008477786941', 'IMG-20231027-WA00376.jpg', 'IMG-20231027-WA0000.jpg', 'Kp.krajan kalibagor', 'Jawa Timur', 'Kabupaten Situbondo', 'Situbondo', 'B110110', 'ALARIC DEMAS RAVENDRA', 'ARIFIN', 'DUMMY ASM', 'B110110', 'JAMILA EKA RATNASARI'),
(28, '2023-10-27 11:26:23', 'minyak', 'Ningsih', '763302145600', 'HJ', '000008479697914', 'IMG-20231027-WA0043.jpg', 'IMG-20231027-WA0001.jpg', 'Kp.krajan kalibagor', 'Jawa Timur', 'Kabupaten Situbondo', 'Situbondo', 'B110110', 'ALARIC DEMAS RAVENDRA', 'ARIFIN', 'DUMMY ASM', 'B110110', 'JAMILA EKA RATNASARI'),
(29, '2023-10-27 15:17:10', 'non_minyak', 'Naela Aliyatul Wardah', '763201630900', 'Naela Fashion', '000008377328136', 'Screenshot_20231027-151536_WhatsApp.jpg', 'Screenshot_20231011-113924_WhatsApp.jpg', 'Singorojo', 'Jawa Tengah', 'Kabupaten Jepara', 'Mayong', 'B110113', 'IQBAL SETIAWAN', 'AHMAD KHOLAS SYIHAB', 'MUJAHWIRUL ILMA', 'B110113', 'PUTRA SETYAWAN'),
(30, '2023-10-28 11:22:14', 'non_minyak', 'Zeinodin', '707531130300', 'Bengkel Motor', '000008973130336', 'IMG-20231027-WA0021.jpg', 'IMG-20231028-WA0018.jpg', 'Japlaksari Bromonilan RT.004 RW.002 PURWOMARTANI KALASAN', 'Di Yogyakarta', 'Kabupaten Sleman', 'Kalasan', 'B110252', 'DUMMYSPV-DEZA', 'DUMMY KOOR-deza', 'DEZA RAHMAT SAPUTRA', 'B110252', 'DEDIK PERASTIAWAN'),
(31, '2023-10-28 12:31:13', 'non_minyak', 'Dadik Indarjo', '707526095000', 'Angkringan Hanif', '000008971939497', 'IMG_20231025_142249_800.jpg', 'IMG_20231028_114446_924_(1).jpg', 'Jl. Anggrek Ringinsari RT.001 RW. 049 Maguwoharjo Depok', 'Di Yogyakarta', 'Kabupaten Sleman', 'Depok', 'B110252', 'DUMMYSPV-DEZA', 'DUMMY KOOR-deza', 'DEZA RAHMAT SAPUTRA', 'B110252', 'DEDIK PERASTIAWAN'),
(32, '2023-10-28 14:01:38', 'non_minyak', 'SUNENTI', '763303791800', 'WARMINDO BERKAH PUTRA PUTRI', '000008277825421', 'IMG-20231027-WA0051.jpg', 'IMG-20231028-WA0016.jpg', 'Tamantirto', 'Di Yogyakarta', 'Kabupaten Bantul', 'Kasihan', 'B110250', 'DUMMYSPV-DEZA', 'DUMMY KOOR-deza', 'DEZA RAHMAT SAPUTRA', 'B110250', 'NICO SATYA'),
(33, '2023-10-28 14:57:51', 'non_minyak', 'Mukti Syarifiah', '763302171300', 'Mukti Plastik', '000008973110639', 'IMG-20231028-WA0058.jpg', 'IMG-20231026-WA0560.jpg', 'Pasar Gentan jalan kaliurang km 10', 'Di Yogyakarta', 'Kabupaten Sleman', 'Ngaglik', 'B110062', 'NEVIANA TETERISSA', 'TAUFIQ', 'DUMMY ASM', 'B110062', 'MUTIARA LAVIANI KURNIA PUTRI');

-- --------------------------------------------------------

--
-- Table structure for table `line_forms`
--

CREATE TABLE `line_forms` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `no_hp_nasabah` varchar(255) DEFAULT NULL,
  `no_rek_line_nasabah` varchar(50) DEFAULT NULL,
  `ss_detail_dashboard` varchar(255) DEFAULT NULL,
  `foto_ktp_nasabah` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `spv` varchar(255) DEFAULT NULL,
  `koor` varchar(255) DEFAULT NULL,
  `asm` varchar(255) DEFAULT NULL,
  `dsr_code` varchar(50) DEFAULT NULL,
  `dsr_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uob_forms`
--

CREATE TABLE `uob_forms` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_skema` varchar(255) DEFAULT NULL,
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `no_hp_nasabah` varchar(255) DEFAULT NULL,
  `no_rek_nasabah` varchar(50) DEFAULT NULL,
  `foto_ktp_nasabah` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `spv` varchar(255) DEFAULT NULL,
  `koor` varchar(255) DEFAULT NULL,
  `asm` varchar(255) DEFAULT NULL,
  `dsr_code` varchar(50) DEFAULT NULL,
  `dsr_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uob_forms`
--

INSERT INTO `uob_forms` (`id`, `tanggal`, `jenis_skema`, `nama_nasabah`, `no_hp_nasabah`, `no_rek_nasabah`, `foto_ktp_nasabah`, `kota`, `provinsi`, `kabupaten`, `code`, `spv`, `koor`, `asm`, `dsr_code`, `dsr_name`) VALUES
(7, '2023-10-25 21:13:39', 'minyak', 'UJANG MAMAN', '085772666437', '7443076585', 'Compress_20231025_210900_0447.jpg', '', 'Jawa Barat', 'Kabupaten Sukabumi', 'B110169', 'ANDI RUSLI', 'DUMMY KOOR-deza', 'DEZA RAHMAT SAPUTRA', 'B110169', 'M IKHSAN ARDANI'),
(8, '2023-10-25 21:17:57', 'minyak', 'JAJAT SUDARJAT', '085862976560', '7443076844', 'Compress_20231025_210942_2109.jpg', '', 'Jawa Barat', 'Kabupaten Sukabumi', 'B110169', 'ANDI RUSLI', 'DUMMY KOOR-deza', 'DEZA RAHMAT SAPUTRA', 'B110169', 'M IKHSAN ARDANI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','BSH','ASM','KOOR','SPV','DSR') NOT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `parent_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `code`, `password`, `level`, `referral`, `parent_code`) VALUES
(1, 'Randis Yustico01', '2000-06-25', 'admin1', '$2y$10$iKBfgX7VX0Rq5LVYjGdKTeDJBfPEXsuPAeM4WyIOO24YbD7TgnCMy', 'admin', '', NULL),
(24, 'Randis Yustico02', '2000-06-25', 'admin2', '$2y$10$0G3ghtP9jmbf1gSQJe4eFOv1oym7spYKgeaJyWSvkO1fTx4X0aqty', 'admin', '', NULL),
(148, 'INDRATIAS', '1986-06-20', 'INDRATIAS', '$2y$10$dLjq5SY6rE62HXjNTrDdueS5u5DxMyzaqhYzfMjBZ3iQNKnuH9g0y', 'admin', '', NULL),
(158, 'NANDA CALVIANTO', '1994-04-08', 'B150001', '$2y$10$KgPmDyYlKrlNVDbZvQz2Y.Rnn5SbjP0m6NnoZeZzyjICmPxdkhR7.', 'BSH', '', ''),
(159, 'DEZA RAHMAT SAPUTRA', '1997-05-14', 'B130001', '$2y$10$ITZWssX1T6q2VnDHW2Yuyu5UYB4283vTStihpPFUtMKuLnV1BNRYO', 'ASM', '', 'B150001'),
(160, 'MUJAHWIRUL ILMA', '2023-10-25', 'B130002', '$2y$10$/rnvx8EOwf4dwcpAvYVrvuGwzzq5Yu7pTyztMry5lcrKSx23CVds.', 'ASM', '', 'B150001'),
(161, 'SRI DHARMA HERMAWAN', '2023-10-25', 'B130003', '$2y$10$HdpfB2MAY6O1YUJqKedkJOT5FW6RZBFC/nmXwxi8TWcX3A..93pwi', 'ASM', '', 'B150001'),
(162, 'DUMMY ASM', '2023-10-25', 'DUMMYASM', '$2y$10$TTXzJ6Fzq6lL29yNbqD/Qenp4cugKBTuci/KkvSvdIml4qx5FFd7.', 'ASM', '', 'B150001'),
(163, 'ARIF MUSTOFA', '1999-02-24', 'B140001', '$2y$10$G0oWZ51nCYoxC/oReqLHIO9F7DWJ/5aOImT2/bQGPxWlBl9aacxAK', 'KOOR', '', 'DUMMYASM'),
(164, 'DEO FERNANDO KAKOMORE', '1992-10-28', 'B140002', '$2y$10$NaANSgDhutn1pH955goKieMWyZfEG3asTe1ZNsT17j/ASpBMVroSS', 'KOOR', '', 'DUMMYASM'),
(165, 'ARIFIN', '1975-01-06', 'B140003', '$2y$10$BNjuLF72asv8oJTo/3g0JO/shTev6.CgTxRPSyenIGCNEDnyUgMkW', 'KOOR', '', 'DUMMYASM'),
(166, 'HASNAWATI', '1972-07-07', 'B140004', '$2y$10$jsf2CLekG.mf2yXdZX.Rz.wmYhz2dkitF7yLWMx6QyjMTlOzmb3XC', 'KOOR', '', 'DUMMYASM'),
(167, 'ADY WIBOWO', '1971-03-22', 'B140005', '$2y$10$9Ny7XdzmSA6DnTbpeFamDusN9a54o.64NcTQEqLjkFD7YysFwjt56', 'KOOR', '', 'B130001'),
(168, 'AHMAD KHOLAS SYIHAB', '1993-10-04', 'B140006', '$2y$10$cCKaiN9fNHltTn1IjS5JiO8yk6YJY5yupXS.DYdGfXOy1K/kKaBAi', 'KOOR', '', 'B130002'),
(169, 'TAUFIQ', '1976-12-18', 'B140008', '$2y$10$YlQKbbwwr/u7NRywz/3HAOnyDZBAs0Nqy9lC5CleOiGvsBKKHH.JC', 'KOOR', '', 'DUMMYASM'),
(170, 'MUHAMMADUN', '1981-12-06', 'B140007', '$2y$10$aboSTZcVawyjDxjEuhKcQOiN4JLhreUNbgThbgApQQ4mDSkcXGO4a', 'KOOR', '', 'B130002'),
(171, 'OKE MUHAMAD IS FERYANTO, S.SI', '1979-10-07', 'B140010', '$2y$10$XLQOH2vIHivl3YQfNPLFdudYTtJ2zHyxbeuEb8FMRImcvyBfDPLAG', 'KOOR', '', 'B130001'),
(172, 'DUMMY KOOR-deza', '2023-10-25', 'DUMMYKOORdeza', '$2y$10$S3Krifp4cWtKm1.V4.ukZOK8bflnJ0KXXah9TiTN/n.QSu5Mxm0E.', 'KOOR', '', 'B130001'),
(173, 'FELDY ADHITIYAR', '1994-03-23', 'B120001', '$2y$10$9l.guLrHs7Zda4AlZTgN4.gu5BeRwCNz/SzKhnaGwAn..n7.5oZ/.', 'SPV', '', 'DUMMYKOORdeza'),
(174, 'ERIS BENTAR RAHMAWATI', '1989-07-10', 'B140012', '$2y$10$wr6JmmBnI5qoHNnZbPbPAOb79XjuvC2ur243bHC4grOsicCt4xLnW', 'KOOR', '', 'DUMMYASM'),
(175, 'DUMMY KOOR-dummy asm', '2023-10-25', 'dummykoorasm', '$2y$10$mNFajDQmRJVP/X38wP10GOap0.bsihkfb7qtbDGY1SrMImGCoHJtK', 'KOOR', '', 'DUMMYASM'),
(176, 'EDI WIRAWAN', '1980-09-21', 'B120002', '$2y$10$IIPjRcGrfs.HekQNGNZl4OoaHTj3xrd6CCdMryhgOxD9KjcX0GOIu', 'SPV', '', 'dummykoorasm'),
(177, 'NASIKIN', '2003-04-02', 'B120003', '$2y$10$DzRMxK.UBOrxZLIJJvv0IOJoNRtBMVImiaJnl28LXXo6NIWPulgIG', 'SPV', '', 'B140001'),
(178, 'FEBBY RESDIAN', '1981-11-09', 'B120010', '$2y$10$sQjmymBTsNv67oKxxLUQPeNdRJ/6nz6o.hZGQNb8TmxR338/ehCzi', 'SPV', '', 'B140005'),
(179, 'RADEN BUDI SANTOSA', '1972-10-08', 'B120011', '$2y$10$xqXeSkzppAFBFFhJXK7P0eP4Y0cX195vl5VM0RFt/4V4qnGmdGzdy', 'SPV', '', 'B140005'),
(180, 'LINDA SUKMAWATI', '1979-04-15', 'B120012', '$2y$10$AvXwWjNAIA164DHPTIe4f.Mh16x/Dmf1fdLK9h43NN8ttzoN5//FW', 'SPV', '', 'DUMMYKOORdeza'),
(181, 'IWAN SETIAWAN', '1968-06-15', 'B120014', '$2y$10$tkAqWn0BzjkK.6ZM5isjZu/iznuc/vxBPvQZeAFMGMCj0yjtHtqOa', 'SPV', '', 'DUMMYKOORdeza'),
(182, 'ANDI RUSLI', '1976-10-01', 'B120022', '$2y$10$u7HC7.wX/oNheAZSJdvdsOcXPRMJV13t4JPfez2bO5Iv9zrPQtkJG', 'SPV', '', 'DUMMYKOORdeza'),
(183, 'NURZAMZAM FAUZAN MUHAMMAD', '1997-08-01', 'B120027', '$2y$10$xP9pwjjVisjzq/p5N0J7guMu.JxzXnFzYpVdJ65V2wJuymkxT0a26', 'SPV', '', 'DUMMYKOORdeza'),
(184, 'FIRGO SETIAWAN', '2000-10-13', 'B120007', '$2y$10$jV1i/oVMV2ySnTcjpq.8JuDOmKlYbkjsEO11uZIcOVz2nkql05DqS', 'SPV', '', 'B140007'),
(185, 'MUSTAGHFIROH', '1990-12-20', 'B120016', '$2y$10$vi7yQbOCau7oyhU/LF.ymuVwdvX7TZGL0T1GwNapkSdNkm6gZOYMO', 'SPV', '', 'B140006'),
(186, 'BUSYROL KARIM', '1987-10-12', 'B120017', '$2y$10$/pa3/WiZjkrHPeTvzDmH6u0/vB/77xrWYBoEw3k04SKbfBUDMfQGC', 'SPV', '', 'B140006'),
(187, 'MUH. SRI USMAWATI', '1983-07-03', 'B120020', '$2y$10$0Qm4N2BiyMHi0ECJMF3DQ.w26XNosREqGdSW0Lrt8KNepqdni6Ox.', 'SPV', '', 'B140007'),
(188, 'SRI USMAWATI', '1989-12-30', 'B120026', '$2y$10$E9f6/fTYI4G.xQxEVN0u3u3ytsp51U8B4iFiLG.pvHswcziRa7DxO', 'SPV', '', 'B140007'),
(189, 'NUR ANISAH', '1993-01-21', 'B110001', '$2y$10$JGQfugIgtVDeALqWn40nE.eAkHWbhYbAi.qrABk3LGTpxiuH8/ASm', 'DSR', 'BSPMCS249', 'B120001'),
(190, 'SRI AYU', '2004-05-08', 'B110002', '$2y$10$PvDu7JuSuzIDtzQaXOrQ8uDPxEW.otUkAUtBO6o7qdJATSYhtpn7O', 'DSR', 'BSPMCS250', 'B120001'),
(191, 'NAHDIYA FITRIYANI', '2001-03-26', 'B110021', '$2y$10$WYcVNdYnmgxPNd4T6JCx1uSFVjRdhY1qhdPw6/yvfm52YNy4p50IK', 'DSR', 'BSPMCS245', 'B120001'),
(192, 'ERWIN FIRMANSAH', '1991-06-18', 'B110034', '$2y$10$WInYWsSFUx2wHw2bgMxkcOJKrOSyf1769HYdA7W0sMja4ULLw/E1C', 'DSR', 'BSPMCS268', 'B120014'),
(193, 'USEP SUTISNA', '1991-09-06', 'B110036', '$2y$10$Zlj2OGdfVu6ytHYYZ3udm.5/j6CpGCyXrbs0d9XUtG9Z3JuKCkWdG', 'DSR', 'BSPMCS305', 'B120027'),
(194, 'AHID AFANDI', '1980-09-03', 'B110037', '$2y$10$sG5sbQD5.91B30aVUSW04.aGY1ZdgdAnzB9j2i22UNkNAtpY2d74K', 'DSR', 'BSPMCS277', 'B120012'),
(195, 'ASWAN BUDIARSO', '1985-06-25', 'B110038', '$2y$10$/xP/2t4WH5u3k0qPdDAATu/k8LQ895olEvudZf0vCLncjXglmnUuG', 'DSR', 'BSPMCS278', 'B120012'),
(196, 'BILMAN POLTAK SIMANJORANG', '1970-10-10', 'B110039', '$2y$10$AMVl.905RIKtRQ9w9g9BX.ChdljHub8V.eiYSvMXC9ancMH5FHIxO', 'DSR', 'BSPMCS279', 'B120012'),
(197, 'MUHIBIN', '1998-08-21', 'B110040', '$2y$10$LILPyC8TEQyrXVc/BhlWzOlej4wxwbiAd02RYoWqXf9VxG/iP.kHu', 'DSR', 'BSPMCS306', 'B120027'),
(198, 'DIDIN JAENUDIN', '1974-03-23', 'B110041', '$2y$10$cwVexHh/UyEcAkRPoS1qheoAxg4hpn9GwPKVzzWrSUZjwyQYD4jgO', 'DSR', 'BSPMCS280', 'B120012'),
(199, 'RIFKY APRIZAL', '1995-04-30', 'B110045', '$2y$10$4yg8HbyB95fxeCmSFAzBL.nuHrq44R19ujal8kag/6obDH4a9REPW', 'DSR', 'BSPMCS307', 'B120027'),
(200, 'OKTIANI', '1994-07-10', 'B110048', '$2y$10$2.DVSO5wg0S50BheE7rRQOkPTfWTIyslsfoFCzIcevSBRlXwHj1Ry', 'DSR', 'BSPMCS281', 'B120012'),
(201, 'MAULANA YUSUP', '1999-05-05', 'B110049', '$2y$10$nCtVP5xcF8InzO7zw4.VY.Nnj37kzMbpBhm6i0r/uWZjpzZCd2Heq', 'DSR', 'BSPMCS308', 'B120027'),
(202, 'RADEN ADYA NAUFAL MAHDI', '2002-04-19', 'B110050', '$2y$10$W4G99NjaKxhu7Vy0rP1WnuTt.0l0KnmbODgAT3G.bNbXgLqDl07/C', 'DSR', 'BSPMCS282', 'B120012'),
(203, 'DINI HARTINI RAHMAN', '2001-02-12', 'B110052', '$2y$10$7ttM6kUAjexZ7e8NqxWS/ero3Rw7hBwkz3VsGM87gMaD61jZbJSsi', 'DSR', 'BSPMCS309', 'B120027'),
(204, 'SUCI YULIA RAHAYU', '1997-07-07', 'B110055', '$2y$10$fIAGFrxzSUFbr0Yy1my2vO9o8mbRdiZuljH66dUF7e0IAVV9Z5X3K', 'DSR', 'BSPMCS269', 'B120014'),
(205, 'AINI RIZKIYAH', '2004-11-27', 'B110059', '$2y$10$GGRMUMinBBvJt3anZUQf5uzUKTwZPYg1fCaKOHvuBBaCygaZ15U9m', 'DSR', 'BSPMCS270', 'B120014'),
(206, 'BUDI RUSTANDI', '1977-09-27', '27091977', '$2y$10$LIBM189V.aEUz1BgElEk3OyO4/TY7fXmnaWZOYsALnVYB6eG4n0s.', 'DSR', 'BSPMCS239', 'B120010'),
(207, 'YANI MARYANI', '1980-06-05', 'B110061', '$2y$10$cg3igo5eieZZAORWP9oHK.VzyPwY/ySrrxXXGqAMXXQqljxIMNuma', 'DSR', 'BSPMCS240', 'B120010'),
(208, 'VIVI NATALIA SARAGIH', '1978-12-28', 'B110065', '$2y$10$M5JFayTWcW9DCswDJIfvLu/5PHiCoLbTYwJ3mrHxFngsBJvR4nUPO', 'DSR', 'BSPMCS241', 'B120010'),
(209, 'ARIF SETYA DERMAWAN', '1977-08-17', 'B110070', '$2y$10$nDz9T3Mhk/GahkMjMSSQXumZsYMbL71NB.Af0sR8vEI6KuzGWru06', 'DSR', 'BSPMCS283', 'B120012'),
(210, 'MARIZAN HAMZAH HIDAYATULLOH', '1995-07-22', 'B110071', '$2y$10$fmuGI8WZPn5f4zROuXlUfeBM8JgR0Bbg30v2c69LAlm68PpHV0b0m', 'DSR', 'BSPMCS284', 'B120012'),
(211, 'RONY TUA POHAN', '1974-03-10', 'B110073', '$2y$10$snxv10FWgKZ4rWjdP55BUOO4sEML/tQJKBR3XOCn.pHme4Fl9Dcye', 'DSR', 'BSPMCS285', 'B120012'),
(212, 'SITI SRI RAHAYU', '1997-05-04', 'B110074', '$2y$10$jwANHHrP9ennwQWGaaSlgONt9ZmrPA2W/ZsoVNM1hVj3bRiPyoRri', 'DSR', 'BSPMCS311', 'B120027'),
(213, 'RUDIANA', '1984-10-17', 'B110084', '$2y$10$G1d7gIsvCiZ6fSF5ZJKCluupEmQEszenCukLvLeG7hPXu6FSmLXbO', 'DSR', 'BSPMCS242', 'B120010'),
(214, 'IVAN SULISTIA ISMUNANDAR', '1984-09-24', 'B110089', '$2y$10$cGyprQepskQPRLvdvIJMyOoWKzrYSw2a4Bh3GME9wsaXGtUhL1MGC', 'DSR', 'BSPMCS271', 'B120014'),
(215, 'VERA DAMAYANTI', '2003-12-23', 'B110090', '$2y$10$vlr3X0pCTsPwby5y2lICfuYpvD7HDp5kgxKJIaOj9EZL2lZkzJyTG', 'DSR', 'BSPMCS272', 'B120014'),
(216, 'LESTARI LASRIA PINTUBATU', '2004-09-26', 'B110100', '$2y$10$UKYl80G3yFgyz6Eo.T9/B.qRr6YSgVDt8N/JzBopg3f/qbbq6FyPC', 'DSR', 'BSPMCS286', 'B120012'),
(217, 'ASEP TOMMY S', '1974-09-21', 'B110101', '$2y$10$7C8RIhV2U6hbg1ZZjIjkcOZJ7XJUHQ9dGlinpi5VYXOKwOLLta.L.', 'DSR', 'BSPMCS243', 'B120010'),
(218, 'PEGI MAULANA YUSUF', '1998-07-15', 'B110102', '$2y$10$GUkx34vDlJZNsXkypHb7muN2UgF4gr3NQaL3hro6PaErkyHRpxb.K', 'DSR', 'BSPMCS287', 'B120012'),
(219, 'NURMALA SARI', '2003-09-24', 'B110103', '$2y$10$26eTwbcE1tIjRVM8BPqSpOclIhlLfxz35nXsFtvJuB6mDmd3sG/Di', 'DSR', 'BSPMCS288', 'B120012'),
(220, 'YOHANA FEBILIA BR PINTUBATU', '2004-01-15', 'B110107', '$2y$10$0BZjuf9aZ2i914JDA9SeGeYOGb7tMr53fmozo9vCFZ5TBfPw4AnfW', 'DSR', 'BSPMCS289', 'B120012'),
(221, 'DEDEN SUPRIATNA NUGRAHA', '1986-06-20', 'B110108', '$2y$10$WRKLT/0LtdYcetUnymjvp.UjHo5dpC5Ip1n5ncRxitt0aj87HIk8.', 'DSR', 'BSPMCS290', 'B120012'),
(222, 'MOCH RIZAL MAULANA', '2000-09-26', 'B110111', '$2y$10$cA/sSgtiYF8eloJLnYllFeUUJTMh0EdA2jm/EEPUbv5oiL2fcQglm', 'DSR', 'BSPMCS291', 'B120012'),
(223, 'RIDWAN MAULANA', '2000-10-02', 'B110115', '$2y$10$gL04LHZW37gNV43ce1I/4edXtBi1Pj2OHoIEt60sYz6vsV7/sPClu', 'DSR', 'BSPMCS292', 'B120012'),
(224, 'ADE RIHSAN HARIANDJA', '1981-02-23', 'B110116', '$2y$10$VxozAWTXExiveLxO1q7tsuQvb5MxH0dc7vdiPzDAlajCXJDkYZ1NS', 'DSR', 'BSPMCS273', 'B120014'),
(225, 'ADIL PRATAMA PUTRA', '1996-09-16', 'B110120', '$2y$10$Jbd.BjoiC42krt947PhYkegu8NsKGQ90bq1BQ0p0RlpkbLbqy3TS2', 'DSR', 'BSPMCS293', 'B120012'),
(226, 'SITI NINGRUM KHADIZAH', '1996-09-19', 'B110122', '$2y$10$yOzfAe4Nu8KHAWT7ijslROiCv5ftYAps8lltMh1wB6jIWAQ8IPOFi', 'DSR', 'BSPMCS310', 'B120027'),
(227, 'TOTON SUHARTONO', '1997-11-13', 'B110123', '$2y$10$cVOI9dS890SsfDmOSZ9d4eMUCzO8.oV6VC1iOY/9SMnvB8F0JtWte', 'DSR', 'BSPMCS246', 'B120001'),
(228, 'IMAM MOCHAMAD RAMADHAN', '1995-07-02', 'B110134', '$2y$10$vNcwB9DqcMyHbG7qxu24n.iuxEP3lXaS1AJp28Vfy7jWFknSZvnYG', 'DSR', 'BSPMCS294', 'B120012'),
(229, 'ZAHRA PUTRIA APRIZAL', '2006-07-19', 'B110135', '$2y$10$bQQXAqnt8EkAHSt8RJEIKuHNCCRX69uK.vovaWh12Ek2pwRMiUo6.', 'DSR', 'BSPMCS295', 'B120012'),
(230, 'WINARTI', '1995-12-10', 'B110147', '$2y$10$Y.qfh86US4AhvLkUOv.DneOlMNvNOg/MZmYFPFfSDwQWDJdg8Y.y6', 'DSR', 'BSPMCS215', 'B120022'),
(231, 'MIRNAWATI', '1995-02-02', 'B110150', '$2y$10$yI.q2wC.GVUdkgV.LpNR6uT85g7YnYnV4GNo5r6noWDBDb/Tiwtti', 'DSR', 'BSPMCS274', 'B120014'),
(232, 'RIZKY FUZI BERLINA', '1987-10-31', 'B110152', '$2y$10$OGq9bdVmIHVWide2h4Rx2e62uWxWfcTG9JIOB2k/vjuCOOZg1O0uq', 'DSR', 'BSPMCS209', 'B120022'),
(233, 'AMAR RUSTANDI', '1980-10-12', 'B110157', '$2y$10$iYTxjuVrmJhHtlekqUYYEOmfTMIsloSSp7ZPJleJg10OWWftiq56W', 'DSR', 'BSPMCS210', 'B120022'),
(234, 'ACHMAD HAMBALI', '1967-06-21', 'B110159', '$2y$10$GaRQrGpB81vhVE10JGNwceTRZyNkqQk.Z1KDRu9BmQqFKEhXNoqN.', 'DSR', 'BSPMCS296', 'B120012'),
(235, 'AULIYAH', '2002-02-19', 'B110160', '$2y$10$wDFovM9wfuFZjk3/L3nweObipRI.Cb6d7DQIRnJkTL2UNPcJ5wY9W', 'DSR', 'BSPMCS247', 'B120001'),
(236, 'IMAM MUHDI', '1982-05-07', 'B110165', '$2y$10$QCOVz2IPRfxVt3bFOtbp7uXy8BS/dqaYr3aBBSvAipKts6VRtUJoC', 'DSR', 'BSPMCS275', 'B120014'),
(237, 'ALI NURDIN', '1979-04-23', 'B110166', '$2y$10$9vi.GFTp1o4YR49e2pokGeNRxDdFn55oQ6L.a1J3y5eyb/mjazFGm', 'DSR', 'BSPMCS276', 'B120014'),
(238, 'MAMAN', '1975-01-07', 'B110167', '$2y$10$9MtTqclwPXjUFvUVsAzEyud.QRBA/N3vHbkKyjPhoNtC12v2uvLOe', 'DSR', 'BSPMCS211', 'B120022'),
(239, 'M IKHSAN ARDANI', '2003-09-16', 'B110169', '$2y$10$f1dQGU4E6okrdGdF5m09MuoO.Qj7bJMwej8ls5ha5cCpMTniaPVEe', 'DSR', 'BSPMCS212', 'B120022'),
(240, 'PUTRI APRILIANI', '1992-04-30', 'B110173', '$2y$10$txtCpgWV3JYfV1oN6OZYsOLoobI8hRk3jxEEeAPHsHnTUv8cXfmJu', 'DSR', 'BSPMCS244', 'B120010'),
(241, 'WAWAN SETIAWAN', '1975-08-07', 'B110174', '$2y$10$196FC6ImRTGdT42n6X8cReiEWvOYjQj2AIv6v0aAn5W4rTrEZTSJ.', 'DSR', 'BSPMCS213', 'B120022'),
(242, 'ANNISA NURUL AZIZAH', '2000-05-14', 'B110175', '$2y$10$m/Oq6FynaXlJ2wWpQwyyWuURsntO.r39472PUMjLa8PhIbG7izO4e', 'DSR', 'BSPMCS248', 'B120001'),
(243, 'RISKAN AGUSTIAN', '1993-07-19', 'B110179', '$2y$10$wxiBMLA5IEHkyVK4f3ChL.6B.zsR9auE/0je6kPsnYbuyW5YX8PCC', 'DSR', 'BSPMCS214', 'B120022'),
(244, 'VIVIN MERIANA', '1989-05-19', 'B110181', '$2y$10$8prX.vPDkC.pCfVIVRr5vuTiKqTIac9vCIwRtTA8fc9l4CYYmI9Zm', 'DSR', 'BSPMCS238', 'B120010'),
(245, 'ABDULLAH KAFABIH', '2003-03-14', 'B110057', '$2y$10$gOBSSXzxUb9DIFWjii84VurpuFhbtbfZJIPkVfQ9LYSc.dEF7YzjK', 'DSR', 'BSPMCS252', 'B120007'),
(246, 'WINDI HARJO', '1983-01-21', 'B110058', '$2y$10$/lIKxwSN/D2GDFtmlj9JPOR/QsTYqsne0UTbKJ.B4JuKYaOUK0LaG', 'DSR', 'BSPMCS253', 'B120007'),
(247, 'IQBAL SETIAWAN', '2004-01-01', 'B120023', '$2y$10$sKbLPTtb2UGm.uZR2JQbUe1GeHWJuMo4TQvCnA/LNvsRfI4tInCW.', 'SPV', '', 'B140006'),
(248, 'KHOIRUN NISAK', '1998-06-14', 'B110072', '$2y$10$FbtLJ7N4w5ogEenrYTmvEegT4FqXR58TEpXuqex7kuNDHno.xOXLe', 'DSR', 'BSPMCS257', 'B120023'),
(249, 'RIAN PRATAMA', '2003-12-04', 'B110082', '$2y$10$aLGCInZ9hXprChrUKzC3AufLq3qOpbl9XVP7QdciQfMxzuZtObwp2', 'DSR', 'BSPMCS265', 'B120023'),
(250, 'BASIRUN', '1992-03-25', 'B110083', '$2y$10$NQ45LlCfM6yNcGE8Whmy4eFECqYiSEa48q.u8soscBYMHvvTDGsQC', 'DSR', 'BSPMCS266', 'B120023'),
(251, 'IQBAL FIRDAUS', '1999-03-21', 'B110091', '$2y$10$C752TGvuk88aAqqUjairsuWPJVpRSpEmnr1tvuzGGcwinAi9.MYNW', 'DSR', 'BSPMCS258', 'B120023'),
(252, 'UMI ATIKAH', '1988-03-13', 'B110094', '$2y$10$fDWL32Ih3ZVlUlDlhtSqV.ypLzyYkW0y7aZdi65k13JUehH5JDdb.', 'DSR', 'BSPMCS254', 'B120007'),
(253, 'MUHAMMAD NAILUL AUTHOR', '1999-05-27', 'B110112', '$2y$10$6t00QTLIhDaeJcvtjZPIK.VFbSO8MQIVmG4yNKCwUT7MPhSdu49L2', 'DSR', 'BSPMCS216', 'B120017'),
(254, 'PUTRA SETYAWAN', '2002-08-25', 'B110113', '$2y$10$XBg.r5blS.G3.x3vPw9dturTrCjiAAZPKytckowykakc357VN9ZhC', 'DSR', 'BSPMCS267', 'B120023'),
(255, 'HUDAL LILMUSTA\'IN', '1997-06-03', 'B110114', '$2y$10$O.4s5D/ev8u5J6GLZdDjXeAt9omOyvzMkxLkYOpWFcHfWReDfpnmK', 'DSR', 'BSPMCS259', 'B120023'),
(256, 'MUHAMMAD DIAN ALMAS', '2000-10-15', 'B110117', '$2y$10$k1l9scVhsMXjfcheO1S6s.7dAW53brAGpyktR/X/iuvGFZXaWd8F2', 'DSR', 'BSPMCS217', 'B120017'),
(257, 'HERU BUDI UTOMO', '1985-12-26', 'B110119', '$2y$10$S/VENxaaXmG3GrV3R0xU0epp3jJHjnwGzQjY.NUsk8YKaTWkEiNVO', 'DSR', 'BSPMCS218', 'B120017'),
(258, 'AHMAD CHASAN', '1995-09-12', 'B110121', '$2y$10$JRB95YMU2O8gSzc3bxT7aeGu5nKtkKO10Z39dzpeLh.TR.JbEQMCS', 'DSR', 'BSPMCS219', 'B120017'),
(259, 'ACHMAD MUHIBBI', '1988-10-05', 'B110124', '$2y$10$D1KhrWOpjAb6PXoPzBdsSuR4YObzUo319rSf9t3B.5C53/evmqjZy', 'DSR', 'BSPMCS220', 'B120017'),
(260, 'ANDY SUPRIYANTO', '1980-07-14', 'B110126', '$2y$10$FiKyKrkqK0rwOXLWIkLgxObzKtZbzbykWdatD9ye2ohKKxe6B1h7C', 'DSR', 'BSPMCS221', 'B120017'),
(261, 'DEVITA MEGA FATIMAH', '2000-03-09', 'B110129', '$2y$10$hNPyRkK5AcypC03Zv8JraewqkL6KIy/VSz11aXUYeFdvmwzrsfHGW', 'DSR', 'BSPMCS224', 'B120017'),
(262, 'CHOIRUL ABSOR', '1994-03-22', 'B110131', '$2y$10$S74OKtT36pYgsmlAGrKdjual8dl5aRMhplwvRyMASj3k.gy7ozL3S', 'DSR', 'BSPMCS222', 'B120017'),
(263, 'BUSERI', '1975-05-04', 'B110133', '$2y$10$ADehyETev38SwTIOh4EApeIEGcsF2eWOelAMMRzceZNGz3fdDJQqy', 'DSR', 'BSPMCS225', 'B120017'),
(264, 'ABDUL QODIR EBS', '1980-06-22', 'B110140', '$2y$10$G2C2ANbOJufg61arX/whAuiiAUmLXxnkQp3paEPzqYaQW64MtP5y6', 'DSR', 'BSPMCS223', 'B120017'),
(265, 'NOVA DENI SAFLINA', '2002-12-30', 'B110141', '$2y$10$ZHUVhetosMS3lR1ubnQ3Uu.HoLM2D811E2EfQw66KUKtTvCR4NuGK', 'DSR', 'BSPMCS260', 'B120023'),
(266, 'NADIAN MUSTOFA', '2002-07-29', 'B110145', '$2y$10$1kn7ETDG/yurdg2pKwl5HeLCbQVskRbInl.QPSSnrN49JE/coRCiu', 'DSR', 'BSPMCS261', 'B120023'),
(267, 'MUHAMMAD ROSY', '1999-10-27', 'B110146', '$2y$10$QwdOKjQcu4OawIi8TVjAAuCNK65c2TUiIHWWk7jYv4PGyc97TiCkW', 'DSR', 'BSPMCS262', 'B120023'),
(268, 'DUMMYSPV-ahmad', '2023-10-25', 'DUMMYSPV-ahmad', '$2y$10$czf.8fKjgE5AW9FQRwP7nOK9VJ8CYnDMcLh1kg8y4GGKpF3E/RyVC', 'SPV', '', 'B140006'),
(269, 'DUMMYSPV-muhammadun', '2023-10-25', 'DUMMYSPV-muhammadun', '$2y$10$Lxo5URw56MH3K8eXSRmhQeWCSL7O7uX1bTNez0OQ2ytN7tC8M7AVi', 'SPV', '', 'B140007'),
(270, 'ABDULLAH AL HUSAINI', '2023-10-25', 'B110137', '$2y$10$9qyj7LVJdjM4QUGbkTk6q.NjJ2rksYFWmJDXevqvBcCnSFRAl.dhu', 'DSR', 'BSPMCS236', 'DUMMYSPV-ahmad'),
(271, 'KHOLIFATUR ROHMAH', '2000-12-19', 'B110168', '$2y$10$yDMKPB/oXSxXaKaVY.i.mOlwwPIKKCQvdzemKwoOPQ1UM4sPa1ChK', 'DSR', 'BSPMCS237', 'DUMMYSPV-muhammadun'),
(272, 'LIYA SAROH', '1993-03-27', 'B110170', '$2y$10$oR0Vw4RRcifBkGgb0STG1e5bmsE5zS5qFqijwdj4YDnaic5Lb7kkK', 'DSR', 'BSPMCS313', 'B120026'),
(273, 'ZUMROTUN', '1980-01-18', 'B110171', '$2y$10$rOjrKyX1NC5Mlcek.PUKLexyR0BntcyjXLCHT5GmavFZ7v5/zGMum', 'DSR', 'BSPMCS314', 'B120026'),
(274, 'KHOZIROTUS SA\'DIYAH', '1985-04-04', 'B110172', '$2y$10$sbd3M9pPO9yP03IBlvLyOePzd2kmAkpH3RqbhOZg4Ww.OHipSlnOy', 'DSR', 'BSPMCS315', 'B120026'),
(275, 'ACHMAT BAHAUDDIN', '1990-04-14', 'B110178', '$2y$10$hW3eDh99p1TtokGs/IB3Qe6egtu3MvTl4vBmfwruFbah.gw.nnEX2', 'DSR', 'BSPMCS263', 'B120023'),
(276, 'MUHAMMAD NASIH KHILMI', '2000-12-18', 'B110182', '$2y$10$kpjUExOBRkTAOqFyYe.u8OzgoVYe4SGK2yeaMjV0.g8mg99g8nzp2', 'DSR', 'BSPMCS251', 'B120007'),
(277, 'USWATUN HASANAH', '1978-02-15', 'B110077', '$2y$10$WK76Y.BP6XGOZ1AfEDSzmuKlypeWByLRivD6x9xVMYOUzg4bnPC8O', 'DSR', 'BSPMCS316', 'B120026'),
(278, 'SITI MARIA ULFA', '1983-02-17', 'B110078', '$2y$10$yHMBe6ITrJqanQ8JlZ9KT.Uh25NJHCBKxvaAValHUi69jN4391Lb.', 'DSR', 'BSPMCS317', 'B120026'),
(279, 'IMAM SYAFII', '1989-01-26', 'B110080', '$2y$10$566QL/EeYH/ymHtsPzN4Y.nXtQlPd7lmjhqDLa6T9ixAe7hrZSDHu', 'DSR', 'BSPMCS264', 'B120023'),
(280, 'rohim', '2023-10-25', 'ROHIM', '$2y$10$45qqnGRblbJPPBpB9uj4oOs6pJl3lDftUg/ZrCn.5ReLU4TJu0KDC', 'admin', '', ''),
(281, 'DUMMYASM-NANDO', '2023-10-25', 'dummyasm-nando', '$2y$10$DvnQmIJdgSzQAczZrnUaOecpiFZNKDLu4PyofJBYGw0XnDufON.92', 'ASM', '', 'B150001'),
(282, 'DUMMYKOOR-NANDO', '2023-10-25', 'dummykoor-nando', '$2y$10$Pf82YjhyQQETGqlNH83fm.Ke4n1CicsTiZOFgaL1ErVw3XKUdGWlW', 'KOOR', '', 'dummyasm-nando'),
(283, 'DUMMYSPV-NANDO', '2023-10-25', 'dummyspv-nando', '$2y$10$CvHhtVnMxz714Q48gXcZxe98xUrjG.Y.vAgGfAVPFvbEHDBpaZQ9a', 'SPV', '', 'dummykoor-nando'),
(284, 'NEVIANA TETERISSA', '2023-10-25', 'B120009', '$2y$10$nVIGxnF0TF43LONGm5wkw.6DqCxA9dhSxgFnAeOpMFDRqGo2kQT4u', 'SPV', '', 'B140008'),
(285, 'AIDA LUTFIAH MAWADDAH', '2023-10-25', 'B120018', '$2y$10$7B3Kmy/.FZxoX20ABz1IO.2TzO8UBYFtIJCmJ5fVeJF54/Q7nHNMq', 'SPV', '', 'B140003'),
(286, 'MIFTAHUL ARIFIN', '2023-10-25', 'B120019', '$2y$10$GMQVzpuNKhArYMZMGRVS9Orlh5xde6uAZhvPA4LhiINPluZZp4Yci', 'SPV', '', 'B140003'),
(287, 'TEGUH WALUYO', '1981-10-15', 'B120024', '$2y$10$fki/fuXrVOi5s0PQgbhg5Oew5q2Sw5Kk6lBVxFOy9iot6K1fVadrK', 'SPV', '', 'dummykoor-nando'),
(288, 'ALARIC DEMAS RAVENDRA', '1992-08-17', 'B120025', '$2y$10$fUVvK0zLKDp9vc2475LYmuTIicKC5w8H83pOIApN74PKbFSEQbU8q', 'SPV', '', 'B140003'),
(289, 'KORI ASTUTI', '1982-02-20', 'B120034', '$2y$10$5FkZqthdIfhX8TT/ZlqbmuXHj/CZKob9Q2DuSuHSly/4SjQfpY/Be', 'SPV', '', 'B140012'),
(290, 'HERMASARI', '1978-12-21', 'B110005', '$2y$10$1xkNRMjCVT2oga2igyeVLeqvC/NzHpU8NUS0fsX3mqB4nIoZNLZpG', 'DSR', 'BSPMCS321', 'B120024'),
(291, 'UNTUNG SUBARKAH', '1990-09-16', 'B110007', '$2y$10$Sos2I78U7qpICQiEnUrqHeoGXGeM4EUPsdfG3.oUHW996W9nEw/0W', 'DSR', 'BSPMCS227', 'dummyspv-arifmustofa'),
(292, 'YOKTAN ADI PRAKOSO', '2001-02-25', 'B110008', '$2y$10$14pauMJIGrrsrDZ9Ni81sOUJPvxy1Ws1Scdrsdrjf6axM48KQk0ke', 'DSR', 'BSPMCS322', 'B120024'),
(293, 'KHULWANNUR MUHAROM', '1984-10-21', 'B110009', '$2y$10$QOqgYjkO2GiE4JIqAy9FOOCTkV2fkHI7yF2x8l8Ev4jjwQibYExHu', 'DSR', 'BSPMCS228', 'dummyspv-arifmustofa'),
(294, 'FANI FAUZIAH', '2000-07-01', 'B110010', '$2y$10$yimEmvyTisOOZ053xCwt4uw8BQm67jDIQbY1rXTAPZwciH7aHjXpK', 'DSR', 'BSPMCS230', 'dummyspv-arifmustofa'),
(295, 'JOKO RUSDIONO', '1989-04-09', 'B110013', '$2y$10$MWZ0HK/yAp/k4R5vBJkIwOWY26lxW1jZJNX/QkQc0JidUhESI4a4S', 'DSR', 'BSPMCS318', 'B120024'),
(296, 'YUYUN WINDARTO', '1981-08-28', 'B110015', '$2y$10$NGJOHeYHlMDxDDT.Gco1veWPriRJ7ujAd65xEdRhjzQF4m6mQ3xGO', 'DSR', 'BSPMCS229', 'dummyspv-arifmustofa'),
(297, 'OCTAVIA EKAWATI', '1982-10-19', 'B110016', '$2y$10$lWcVc..Q5HKGnyRzi9qvauwKWP6NBIejpMbx1qqvwln5YYbJ3ufoe', 'DSR', 'BSPMCS319', 'B120024'),
(298, 'PUTRI TESSA IRIANTARI', '1995-12-04', 'B110044', '$2y$10$lRdUlSYwX9ovQnaQTzDAVuCJUNwyfoZzZY4yGAMxeSbLfaaN5dXgy', 'DSR', 'BSPMCS320', 'B120024'),
(299, 'SRI WIDURI INDAYANI', '1973-01-12', 'B110054', '$2y$10$7VuZUxgerlLayfWE4is68..FciAmjFpUNGbDPu7BmsZvaN5fUNMCW', 'DSR', 'BSPMCS255', 'dummyspv-nando'),
(300, 'MUTIARA LAVIANI KURNIA PUTRI', '1994-08-13', 'B110062', '$2y$10$BSrwxhqHam4dEhM.wa/7wOutbdlH6BiL.CFibgjVm5rznFz7KbMD2', 'DSR', 'BSPMCS302', 'B120009'),
(301, 'ANDRI YULI KURNIAWAN', '1990-07-25', 'B110068', '$2y$10$teopah.gI5AJDhSv.9/KLeBAIiYT8oZGIyxP9PiK6hny7In86IFzq', 'DSR', 'BSPMCS226', 'dummyspv-arifmustofa'),
(302, 'MATHILDA MARYATI', '1970-03-14', 'B110069', '$2y$10$sTFG7W7twkAXRl5c1ojWl.PkljtTc8csr.ByYQgEWTECq3YQcLZZK', 'DSR', 'BSPMCS303', 'B120009'),
(303, 'DANI MAULANA', '2023-10-25', 'B110075', '$2y$10$W6RbnAog4ziXR0n.OJxZXu/sfBGbISjr70zUIbCOR27vfz1uIDwQO', 'DSR', 'BSPMCS299', 'B120019'),
(304, 'TENDI RAMADAN', '2004-05-11', 'B110085', '$2y$10$sgZAqdaV7AqWKqCzbfkKoOgzcaHtDPQ1hWU4XGvginBXHnZb2.akG', 'DSR', 'BSPMCS231', 'dummyspv-deo'),
(305, 'DENAD MUHAMAD NABIL', '2003-10-20', 'B110086', '$2y$10$aI3mixoma./sfU/izBpzzemX6wkAw5d9h7vLUcGU03jXVfySA.13S', 'DSR', 'BSPMCS232', 'dummyspv-deo'),
(306, 'TOMI NUGRAHA', '1998-08-17', 'B110087', '$2y$10$h2rSLuNFSiEPFO5HG270IuVjVp1Q7n0zWHi.dgj3zHcXwOsk6CfGi', 'DSR', 'BSPMCS233', 'dummyspv-deo'),
(307, 'NUR AZIZI', '1996-01-08', 'B110092', '$2y$10$k4Fv9Tj0XAw1oNmSnm0kgOklYFH/tCJ/4SHvum9GJLvE0rmezNkj6', 'DSR', 'BSPMCS297', 'B120019'),
(308, 'DUMMYSPV-DEO', '2023-10-25', 'dummyspv-deo', '$2y$10$PSnpG8u3KOBne46FbzNI0eJBWXl7geKh7jtyOES83jaJeb4TBDfNu', 'SPV', '', 'B140002'),
(309, 'I KOMANG YOGA HARTA', '1996-05-27', 'B110099', '$2y$10$5B7yxpk0L3UkMJa2TDvEm.YE.Mj16GKGgZTmtBJSReXSYlin.9G/W', 'DSR', 'BSPMCS234', 'dummyspv-deo'),
(310, 'R. ANGGA RIZKIANSYAH PUTRA', '2001-07-04', 'B110164', '$2y$10$7RrvdZDhCm01VssnIRM6q.zv6hTTOBF5I59Xz4kkDsBN.JfBD0BAe', 'DSR', 'BSPMCS235', 'dummyspv-deo'),
(311, 'DUMMYSPV-ARIF', '1999-02-24', 'dummyspv-arifmustofa', '$2y$10$Qdq8uoaDMtdlUkgnl98.vO6zTS4agYU7R5vNm6TeDa2TrjBPXUGxC', 'SPV', '', 'B140001'),
(312, 'IMAM MASBUKIM', '1984-04-25', 'B110192', '$2y$10$ywjanmywjdeBf.C0LQ3v0O.wb01O1HMZQ5uneMt97Jez9ysomN.VC', 'DSR', 'BSPMCS326', 'dummyspv-arifmustofa'),
(313, 'SUTCI ARI WIYANTI', '1982-07-01', 'B110109', '$2y$10$t3q/v0aXsotPKyem27APiey7VnqC/S1h.Ew7VrlfTSlJBCZu2IQHO', 'DSR', 'BSPMCS304', 'B120009'),
(314, 'JAMILA EKA RATNASARI', '1986-09-17', 'B110110', '$2y$10$qRz1r07l8FUeInemWWP3MeFbvtqvZCmOwNHsfTrU59xYfkqxPbwo.', 'DSR', 'BSPMCS204', 'B120025'),
(315, 'JAZILATUL FARIHA', '2000-09-09', 'B110127', '$2y$10$6WJJcRmCO45XiSufwZ1oXeJoZ7jZpr/8.NeY4jJRkfTDTBd12g2Tu', 'DSR', 'BSPMCS201', 'B120018'),
(316, 'ALVI AULA CAHYA NINGRAT', '1996-04-26', 'B110128', '$2y$10$UNBeqwoWdA3rb9SFVfn1QO3.p7cjcPkoJ3nJK/8C98rcxWPi9cm6S', 'DSR', 'BSPMCS301', 'B120019'),
(317, 'NANIK NURFARISTANINGSIH', '1983-11-08', 'B110130', '$2y$10$rgAKZeV3f7SQIXi3JpRqWOKCWkjqc.ITz1uMNHCsHKezJekLh85gG', 'DSR', 'BSPMCS206', 'B120025'),
(318, 'MUH. MASRUL KHOIRUNNAS', '1996-01-07', 'B110132', '$2y$10$u4bEY.Sf7oxZHcIzdb8tQ.swAbNc9yGiIYTbO196CQDKq/Xo3sPy.', 'DSR', 'BSPMCS208', 'B120025'),
(319, 'AHMAD SAINURI', '1998-05-30', 'B110138', '$2y$10$EoPExNQT8ES/tybZd.bLyuxeylquiUnjGVFAhcwEIVLBsTH/mZ1iW', 'DSR', 'BSPMCS300', 'B120019'),
(320, 'HAMZAH MALIK MALAYSIA', '2001-07-06', 'B110139', '$2y$10$5eK.8Ik8417Pju2jcCZ2judcttClmOelShY40ZnRgJj69XOKz3a1q', 'DSR', 'BSPMCS207', 'B120025'),
(321, 'SRI AGUNG SUGIYANI', '1972-12-02', 'B110143', '$2y$10$1Xa9elJz53OwvYOssbHg1.AprngFJs.1wrnhQd1wEtwbxLj7Q6Um.', 'DSR', 'BSPMCS256', 'B120009'),
(322, 'LAILATUL MAGHFIROH', '2004-03-27', 'B110144', '$2y$10$2DdNAd25fAn6mXb6VcUhQOhu5BRuyWc44ZHCoITR34aZE11GD6TfK', 'DSR', 'BSPMCS203', 'B120018'),
(323, 'IDA FATMAWATI', '1998-06-16', 'B110156', '$2y$10$mn8vy3o43JYtdDgWmcUuMurykN.Wbrq7tNtLJNOyPH/kAgRJ.xaLu', 'DSR', 'BSPMCS298', 'B120019'),
(324, 'SYAIFUL KHAIR', '1980-10-01', 'B110163', '$2y$10$4NL2p095wyQz9TUSfUMWeezqsbHsnWzEEHMUpGkjqmsjhSQ7kajd.', 'DSR', 'BSPMCS202', 'B120018'),
(325, 'PANDHITA GALIH PAMUNGKAS', '2001-07-13', 'B110177', '$2y$10$2MrgJsPqLhZBnOE1ASIw0uIbDSjMogXDv/AsdPZG4Y3OaP99Nf4U.', 'DSR', 'BSPMCS325', 'B120024'),
(326, 'DIYAH PERMATASARI', '1996-03-13', 'B110180', '$2y$10$Px1U3nKxHO2FtkvVIeQ...TZEKfKuI2vgRJjxSYMHzq/UeYknV0me', 'DSR', 'BSPMCS205', 'B120025'),
(327, 'AIDA NURDIANA', '1977-01-03', 'B110193', '$2y$10$YuiOpGz0VUAV8bg4kVt/EObx8U2gh7hoH.0tKFD5HaRQNNbf3fH5y', 'DSR', 'BSPMCS327', 'B120009'),
(328, 'CHARIS DINARYANTO', '1987-12-08', 'B110194', '$2y$10$IJWagO2LHT1UkqXhJDmRIOYfkkZd750Xe7S5jSj4V1ZgWb6OHPlY6', 'DSR', 'BSPMCS358', 'B120034'),
(329, 'PUTRA AKBAR BAGASWARA', '1992-08-17', 'B110195', '$2y$10$B2KB605FHpO.AeqRBu7QwO70rnPI4gI7oi25tCqZ77NReFVccZuFO', 'DSR', 'BSPMCS359', 'B120034'),
(330, 'FEBRI SASONGKO', '1988-02-18', 'B110196', '$2y$10$f2w0CzMEWfpImgvDakzaYeY8PBhPJncFvs3dN9iua27YiLvo/LTIi', 'DSR', 'BSPMCS360', 'B120034'),
(331, 'ROSHIKHUL HUDA', '1990-07-14', 'B110197', '$2y$10$FC.Yt3ir5vNm7hrveAG2H.smyAidQGNSM.GLfNlKFpFkXjmi9vp3q', 'DSR', 'BSPMCS361', 'B120034'),
(332, 'MOHAMAD ALI THOYYIBI', '1989-08-26', 'B110198', '$2y$10$ecU7n6V8.hr/ErEo..ys3eFfFVzuPpQXr58uS2Eov/idupDhfS7Oy', 'DSR', 'BSPMCS362', 'B120034'),
(333, 'BUDIHARTA', '1995-01-09', 'B110199', '$2y$10$Y1pZawnc0wwd/pR/b8JobueC62AXFeHgGIpgBoaAYtxN/V7psJBre', 'DSR', 'BSPMCS363', 'B120034'),
(334, 'SADDAM HUSEN', '1993-06-16', 'B140011', '$2y$10$HHxTd5BS4I0vW/MZRCt8VO70kCZK0Dd54m.qKUp7OUAT2i0njNtnq', 'KOOR', 'BSPMCS328', 'dummyasm-nando'),
(335, 'dummydsr', '2023-10-26', 'dummydsr', '$2y$10$MHp3kfpAF4OAy7UG/n.8f.QEzUqyePKQExwKNZDfcWAj8qtqiJyFC', 'DSR', 'BSPMCS000', 'dummyspv-nando'),
(336, 'TERAIMA', '2023-10-26', 'HRDCODE', '$2y$10$GZFVoeycuKAWKglAkIq39.puOnbhJPOqVADnty/UjZdHkh6S66qim', 'admin', '', NULL),
(337, 'EVIKA PUTRI PANGESTI', '1999-11-27', 'B110241', '$2y$10$8kBsuVl4LATLbQ881.dLW.4JQ30CPiQTrHYDsQ/okoB3Op9ks0WQq', 'DSR', 'BSPMCS79', 'dummyspv-deza'),
(338, 'DIMAS PURWANTO', '2001-11-28', 'B110242', '$2y$10$srN5V9Nj5iRfbBFzyzjjw.FAbt9c6CMl1BreT01ScRTAOC1pjgYsC', 'DSR', 'BSPMCS76', 'dummyspv-deza'),
(339, 'DANANG PRIANTO', '1978-04-09', 'B110249', '$2y$10$y6YA8c5ub26DShjAA0Y1V.omRbqWgRqum27rrNfY6UMDiBzDY5n5a', 'DSR', 'BSPMCS82', 'dummyspv-deza'),
(340, 'NICO SATYA', '1991-01-10', 'B110250', '$2y$10$Pbw.yDL.JeiHVjoTlkn8Ze7S8KD1C4MCVymWY6yNflJbqlv29r2cC', 'DSR', 'BSPMCS84', 'dummyspv-deza'),
(341, 'ARIA YUNALDINSYAH', '1989-06-23', 'B110251', '$2y$10$eGsu5k2m2lx3MKtBuEajr.o.5.jHkuh3rSTfEaJsjj3l0Mv/Ih5jO', 'DSR', 'BSPMCS83', 'dummyspv-deza'),
(342, 'DEDIK PERASTIAWAN', '1992-05-25', 'B110252', '$2y$10$Oxf9Le.6Eh1zk0tH219t9u0Ayk.ZD2s/H.zeQduk9RsPKy6vJTcZ6', 'DSR', 'BSPMCS77', 'dummyspv-deza'),
(343, 'MUHAMMAD DAVID MAULANA', '2001-08-10', 'B110253', '$2y$10$LyRjnkX726e0mtHa5qZ0buyToC7j8cKbBkYlie/lNqXZJSBKSbVIC', 'DSR', 'BSPMCS81', 'dummyspv-deza'),
(344, 'DUMMYSPV-DEZA', '2023-10-27', 'dummyspv-deza', '$2y$10$qpBwyCMjo8mX.h7JdHVKPufos4toHnjjlyMN7YGjyML3KC1nRMalq', 'SPV', '', 'DUMMYKOORdeza'),
(345, 'DODI JUNAEDI', '1987-07-31', 'B120040', '$2y$10$vv1lL0DwuqBzVOKjVzsT6.OhXtrcdaf20dAR1Tnl8LvVP.R9X3NRK', 'SPV', '', 'DUMMYKOORdeza'),
(346, 'MUHAMAD ISA IDRIS', '1997-07-09', 'B110254', '$2y$10$AXOuEeC.3F9SQ9JJV4igSO.T.oZoHLlqlSimduVerSlpAuacQD152', 'DSR', 'BSPMCS386', 'B120040');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bpd_forms`
--
ALTER TABLE `bpd_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsi_forms`
--
ALTER TABLE `bsi_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cimb_forms`
--
ALTER TABLE `cimb_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_forms`
--
ALTER TABLE `line_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uob_forms`
--
ALTER TABLE `uob_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bpd_forms`
--
ALTER TABLE `bpd_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bsi_forms`
--
ALTER TABLE `bsi_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cimb_forms`
--
ALTER TABLE `cimb_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `line_forms`
--
ALTER TABLE `line_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uob_forms`
--
ALTER TABLE `uob_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
