-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 06:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_agama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `nama_agama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2026-04-20 02:38:49', '2026-04-20 02:38:49'),
(2, 'Kristen Protestan', '2026-04-20 02:38:49', '2026-04-20 02:38:49'),
(3, 'Kristen Katolik', '2026-04-20 02:38:49', '2026-04-20 02:38:49'),
(4, 'Hindu', '2026-04-20 02:38:49', '2026-04-20 02:38:49'),
(5, 'Buddha', '2026-04-20 02:38:49', '2026-04-20 02:38:49'),
(6, 'Konghucu', '2026-04-20 02:38:49', '2026-04-20 02:38:49');

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
-- Table structure for table `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupatens`
--

INSERT INTO `kabupatens` (`id`, `provinsi_id`, `nama_kabupaten`) VALUES
(1, 1, 'Aceh Barat'),
(2, 1, 'Aceh Barat Daya'),
(3, 1, 'Aceh Besar'),
(4, 1, 'Aceh Jaya'),
(5, 1, 'Aceh Selatan'),
(6, 1, 'Aceh Singkil'),
(7, 1, 'Aceh Tamiang'),
(8, 1, 'Aceh Tengah'),
(9, 1, 'Aceh Tenggara'),
(10, 1, 'Aceh Timur'),
(11, 1, 'Aceh Utara'),
(12, 1, 'Bener Meriah'),
(13, 1, 'Bireuen'),
(14, 1, 'Gayo Lues'),
(15, 1, 'Nagan Raya'),
(16, 1, 'Pidie'),
(17, 1, 'Pidie Jaya'),
(18, 1, 'Simeulue'),
(19, 1, 'Kota Banda Aceh'),
(20, 1, 'Kota Langsa'),
(21, 1, 'Kota Lhokseumawe'),
(22, 1, 'Kota Sabang'),
(23, 1, 'Kota Subulussalam'),
(24, 2, 'Asahan'),
(25, 2, 'Batubara'),
(26, 2, 'Dairi'),
(27, 2, 'Deli Serdang'),
(28, 2, 'Humbang Hasundutan'),
(29, 2, 'Karo'),
(30, 2, 'Labuhanbatu'),
(31, 2, 'Labuhanbatu Selatan'),
(32, 2, 'Labuhanbatu Utara'),
(33, 2, 'Langkat'),
(34, 2, 'Mandailing Natal'),
(35, 2, 'Nias'),
(36, 2, 'Nias Barat'),
(37, 2, 'Nias Selatan'),
(38, 2, 'Nias Utara'),
(39, 2, 'Padang Lawas'),
(40, 2, 'Padang Lawas Utara'),
(41, 2, 'Pakpak Bharat'),
(42, 2, 'Samosir'),
(43, 2, 'Serdang Bedagai'),
(44, 2, 'Simalungun'),
(45, 2, 'Tapanuli Selatan'),
(46, 2, 'Tapanuli Tengah'),
(47, 2, 'Tapanuli Utara'),
(48, 2, 'Toba Samosir'),
(49, 2, 'Kota Binjai'),
(50, 2, 'Kota Gunungsitoli'),
(51, 2, 'Kota Medan'),
(52, 2, 'Kota Padangsidempuan'),
(53, 2, 'Kota Pematangsiantar'),
(54, 2, 'Kota Sibolga'),
(55, 2, 'Kota Tanjungbalai'),
(56, 2, 'Kota Tebing Tinggi'),
(57, 3, 'Agam'),
(58, 3, 'Dharmasraya'),
(59, 3, 'Kepulauan Mentawai'),
(60, 3, 'Lima Puluh Kota'),
(61, 3, 'Padang Pariaman'),
(62, 3, 'Pasaman'),
(63, 3, 'Pasaman Barat'),
(64, 3, 'Pesisir Selatan'),
(65, 3, 'Sijunjung'),
(66, 3, 'Solok'),
(67, 3, 'Solok Selatan'),
(68, 3, 'Tanah Datar'),
(69, 3, 'Kota Bukittinggi'),
(70, 3, 'Kota Padang'),
(71, 3, 'Kota Padangpanjang'),
(72, 3, 'Kota Pariaman'),
(73, 3, 'Kota Payakumbuh'),
(74, 3, 'Kota Sawahlunto'),
(75, 3, 'Kota Solok'),
(76, 4, 'Banyuasin'),
(77, 4, 'Empat Lawang'),
(78, 4, 'Lahat'),
(79, 4, 'Muara Enim'),
(80, 4, 'Musi Banyuasin'),
(81, 4, 'Musi Rawas'),
(82, 4, 'Musi Rawas Utara'),
(83, 4, 'Ogan Ilir'),
(84, 4, 'Ogan Komering Ilir'),
(85, 4, 'Ogan Komering Ulu'),
(86, 4, 'Ogan Komering Ulu Selatan'),
(87, 4, 'Ogan Komering Ulu Timur'),
(88, 4, 'Penukal Abab Lematang Ilir'),
(89, 4, 'Kota Lubuklinggau'),
(90, 4, 'Kota Pagar Alam'),
(91, 4, 'Kota Palembang'),
(92, 4, 'Kota Prabumulih'),
(93, 5, 'Bengkalis'),
(94, 5, 'Indragiri Hilir'),
(95, 5, 'Indragiri Hulu'),
(96, 5, 'Kampar'),
(97, 5, 'Kepulauan Meranti'),
(98, 5, 'Kuantan Singingi'),
(99, 5, 'Pelalawan'),
(100, 5, 'Rokan Hilir'),
(101, 5, 'Rokan Hulu'),
(102, 5, 'Siak'),
(103, 5, 'Kota Dumai'),
(104, 5, 'Kota Pekanbaru'),
(105, 6, 'Bintan'),
(106, 6, 'Karimun'),
(107, 6, 'Kepulauan Anambas'),
(108, 6, 'Lingga'),
(109, 6, 'Natuna'),
(110, 6, 'Kota Batam'),
(111, 6, 'Kota Tanjung Pinang'),
(112, 7, 'Batanghari'),
(113, 7, 'Bungo'),
(114, 7, 'Kerinci'),
(115, 7, 'Merangin'),
(116, 7, 'Muaro Jambi'),
(117, 7, 'Sarolangun'),
(118, 7, 'Tanjung Jabung Barat'),
(119, 7, 'Tanjung Jabung Timur'),
(120, 7, 'Tebo'),
(121, 7, 'Kota Jambi'),
(122, 7, 'Kota Sungai Penuh'),
(123, 8, 'Bengkulu Selatan'),
(124, 8, 'Bengkulu Tengah'),
(125, 8, 'Bengkulu Utara'),
(126, 8, 'Kaur'),
(127, 8, 'Kepahiang'),
(128, 8, 'Lebong'),
(129, 8, 'Mukomuko'),
(130, 8, 'Rejang Lebong'),
(131, 8, 'Seluma'),
(132, 8, 'Kota Bengkulu'),
(133, 9, 'Bangka'),
(134, 9, 'Bangka Barat'),
(135, 9, 'Bangka Selatan'),
(136, 9, 'Bangka Tengah'),
(137, 9, 'Belitung'),
(138, 9, 'Belitung Timur'),
(139, 9, 'Kota Pangkal Pinang'),
(140, 10, 'Lampung Tengah'),
(141, 10, 'Lampung Utara'),
(142, 10, 'Lampung Selatan'),
(143, 10, 'Lampung Barat'),
(144, 10, 'Lampung Timur'),
(145, 10, 'Mesuji'),
(146, 10, 'Pesawaran'),
(147, 10, 'Pesisir Barat'),
(148, 10, 'Pringsewu'),
(149, 10, 'Tulang Bawang'),
(150, 10, 'Tulang Bawang Barat'),
(151, 10, 'Tanggamus'),
(152, 10, 'Way Kanan'),
(153, 10, 'Kota Bandar Lampung'),
(154, 10, 'Kota Metro'),
(155, 11, 'Lebak'),
(156, 11, 'Pandeglang'),
(157, 11, 'Serang'),
(158, 11, 'Tangerang'),
(159, 11, 'Kota Cilegon'),
(160, 11, 'Kota Serang'),
(161, 11, 'Kota Tangerang'),
(162, 11, 'Kota Tangerang Selatan'),
(163, 12, 'Bandung'),
(164, 12, 'Bandung Barat'),
(165, 12, 'Bekasi'),
(166, 12, 'Bogor'),
(167, 12, 'Ciamis'),
(168, 12, 'Cianjur'),
(169, 12, 'Cirebon'),
(170, 12, 'Garut'),
(171, 12, 'Indramayu'),
(172, 12, 'Karawang'),
(173, 12, 'Kuningan'),
(174, 12, 'Majalengka'),
(175, 12, 'Pangandaran'),
(176, 12, 'Purwakarta'),
(177, 12, 'Subang'),
(178, 12, 'Sukabumi'),
(179, 12, 'Sumedang'),
(180, 12, 'Tasikmalaya'),
(181, 12, 'Kota Bandung'),
(182, 12, 'Kota Banjar'),
(183, 12, 'Kota Bekasi'),
(184, 12, 'Kota Bogor'),
(185, 12, 'Kota Cimahi'),
(186, 12, 'Kota Cirebon'),
(187, 12, 'Kota Depok'),
(188, 12, 'Kota Sukabumi'),
(189, 12, 'Kota Tasikmalaya'),
(190, 13, 'Banjarnegara'),
(191, 13, 'Banyumas'),
(192, 13, 'Batang'),
(193, 13, 'Blora'),
(194, 13, 'Boyolali'),
(195, 13, 'Brebes'),
(196, 13, 'Cilacap'),
(197, 13, 'Demak'),
(198, 13, 'Grobogan'),
(199, 13, 'Jepara'),
(200, 13, 'Karanganyar'),
(201, 13, 'Kebumen'),
(202, 13, 'Kendal'),
(203, 13, 'Klaten'),
(204, 13, 'Kudus'),
(205, 13, 'Magelang'),
(206, 13, 'Pati'),
(207, 13, 'Pekalongan'),
(208, 13, 'Pemalang'),
(209, 13, 'Purbalingga'),
(210, 13, 'Purworejo'),
(211, 13, 'Rembang'),
(212, 13, 'Semarang'),
(213, 13, 'Sragen'),
(214, 13, 'Sukoharjo'),
(215, 13, 'Tegal'),
(216, 13, 'Temanggung'),
(217, 13, 'Wonogiri'),
(218, 13, 'Wonosobo'),
(219, 13, 'Kota Magelang'),
(220, 13, 'Kota Pekalongan'),
(221, 13, 'Kota Salatiga'),
(222, 13, 'Kota Semarang'),
(223, 13, 'Kota Surakarta'),
(224, 13, 'Kota Tegal'),
(225, 14, 'Bangkalan'),
(226, 14, 'Banyuwangi'),
(227, 14, 'Blitar'),
(228, 14, 'Bojonegoro'),
(229, 14, 'Bondowoso'),
(230, 14, 'Gresik'),
(231, 14, 'Jember'),
(232, 14, 'Jombang'),
(233, 14, 'Kediri'),
(234, 14, 'Lamongan'),
(235, 14, 'Lumajang'),
(236, 14, 'Madiun'),
(237, 14, 'Magetan'),
(238, 14, 'Malang'),
(239, 14, 'Mojokerto'),
(240, 14, 'Nganjuk'),
(241, 14, 'Ngawi'),
(242, 14, 'Pacitan'),
(243, 14, 'Pamekasan'),
(244, 14, 'Pasuruan'),
(245, 14, 'Ponorogo'),
(246, 14, 'Probolinggo'),
(247, 14, 'Sampang'),
(248, 14, 'Sidoarjo'),
(249, 14, 'Situbondo'),
(250, 14, 'Sumenep'),
(251, 14, 'Trenggalek'),
(252, 14, 'Tuban'),
(253, 14, 'Tulungagung'),
(254, 14, 'Kota Batu'),
(255, 14, 'Kota Blitar'),
(256, 14, 'Kota Kediri'),
(257, 14, 'Kota Madiun'),
(258, 14, 'Kota Malang'),
(259, 14, 'Kota Mojokerto'),
(260, 14, 'Kota Pasuruan'),
(261, 14, 'Kota Probolinggo'),
(262, 14, 'Kota Surabaya'),
(263, 15, 'Kota Administrasi Jakarta Barat'),
(264, 15, 'Kota Administrasi Jakarta Pusat'),
(265, 15, 'Kota Administrasi Jakarta Selatan'),
(266, 15, 'Kota Administrasi Jakarta Timur'),
(267, 15, 'Kota Administrasi Jakarta Utara'),
(268, 15, 'Administrasi Kepulauan Seribu'),
(269, 16, 'Bantul'),
(270, 16, 'Gunungkidul'),
(271, 16, 'Kulon Progo'),
(272, 16, 'Sleman'),
(273, 16, 'Kota Yogyakarta'),
(274, 17, 'Badung'),
(275, 17, 'Bangli'),
(276, 17, 'Buleleng'),
(277, 17, 'Gianyar'),
(278, 17, 'Jembrana'),
(279, 17, 'Karangasem'),
(280, 17, 'Klungkung'),
(281, 17, 'Tabanan'),
(282, 17, 'Kota Denpasar'),
(283, 18, 'Bima'),
(284, 18, 'Dompu'),
(285, 18, 'Lombok Barat'),
(286, 18, 'Lombok Tengah'),
(287, 18, 'Lombok Timur'),
(288, 18, 'Lombok Utara'),
(289, 18, 'Sumbawa'),
(290, 18, 'Sumbawa Barat'),
(291, 18, 'Kota Bima'),
(292, 18, 'Kota Mataram'),
(293, 19, 'Alor'),
(294, 19, 'Belu'),
(295, 19, 'Ende'),
(296, 19, 'Flores Timur'),
(297, 19, 'Kupang'),
(298, 19, 'Lembata'),
(299, 19, 'Malaka'),
(300, 19, 'Manggarai'),
(301, 19, 'Manggarai Barat'),
(302, 19, 'Manggarai Timur'),
(303, 19, 'Ngada'),
(304, 19, 'Nagekeo'),
(305, 19, 'Rote Ndao'),
(306, 19, 'Sabu Raijua'),
(307, 19, 'Sikka'),
(308, 19, 'Sumba Barat'),
(309, 19, 'Sumba Barat Daya'),
(310, 19, 'Sumba Tengah'),
(311, 19, 'Sumba Timur'),
(312, 19, 'Timor Tengah Selatan'),
(313, 19, 'Timor Tengah Utara'),
(314, 19, 'Kota Kupang'),
(315, 20, 'Bengkayang'),
(316, 20, 'Kapuas Hulu'),
(317, 20, 'Kayong Utara'),
(318, 20, 'Ketapang'),
(319, 20, 'Kubu Raya'),
(320, 20, 'Landak'),
(321, 20, 'Melawi'),
(322, 20, 'Mempawah'),
(323, 20, 'Sambas'),
(324, 20, 'Sanggau'),
(325, 20, 'Sekadau'),
(326, 20, 'Sintang'),
(327, 20, 'Kota Pontianak'),
(328, 20, 'Kota Singkawang'),
(329, 21, 'Balangan'),
(330, 21, 'Banjar'),
(331, 21, 'Barito Kuala'),
(332, 21, 'Hulu Sungai Selatan'),
(333, 21, 'Hulu Sungai Tengah'),
(334, 21, 'Hulu Sungai Utara'),
(335, 21, 'Kotabaru'),
(336, 21, 'Tabalong'),
(337, 21, 'Tanah Bumbu'),
(338, 21, 'Tanah Laut'),
(339, 21, 'Tapin'),
(340, 21, 'Kota Banjarbaru'),
(341, 21, 'Kota Banjarmasin'),
(342, 22, 'Barito Selatan'),
(343, 22, 'Barito Timur'),
(344, 22, 'Barito Utara'),
(345, 22, 'Gunung Mas'),
(346, 22, 'Kapuas'),
(347, 22, 'Katingan'),
(348, 22, 'Kotawaringin Barat'),
(349, 22, 'Kotawaringin Timur'),
(350, 22, 'Lamandau'),
(351, 22, 'Murung Raya'),
(352, 22, 'Pulang Pisau'),
(353, 22, 'Sukamara'),
(354, 22, 'Seruyan'),
(355, 22, 'Kota Palangka Raya'),
(356, 23, 'Berau'),
(357, 23, 'Kutai Barat'),
(358, 23, 'Kutai Kartanegara'),
(359, 23, 'Kutai Timur'),
(360, 23, 'Mahakam Ulu'),
(361, 23, 'Paser'),
(362, 23, 'Penajam Paser Utara'),
(363, 23, 'Kota Balikpapan'),
(364, 23, 'Kota Bontang'),
(365, 23, 'Kota Samarinda'),
(366, 24, 'Bulungan'),
(367, 24, 'Malinau'),
(368, 24, 'Nunukan'),
(369, 24, 'Tana Tidung'),
(370, 24, 'Kota Tarakan'),
(371, 25, 'Boalemo'),
(372, 25, 'Bone Bolango'),
(373, 25, 'Gorontalo'),
(374, 25, 'Gorontalo Utara'),
(375, 25, 'Pohuwato'),
(376, 25, 'Kota Gorontalo'),
(377, 26, 'Bantaeng'),
(378, 26, 'Barru'),
(379, 26, 'Bone'),
(380, 26, 'Bulukumba'),
(381, 26, 'Enrekang'),
(382, 26, 'Gowa'),
(383, 26, 'Jeneponto'),
(384, 26, 'Kepulauan Selayar'),
(385, 26, 'Luwu'),
(386, 26, 'Luwu Timur'),
(387, 26, 'Luwu Utara'),
(388, 26, 'Maros'),
(389, 26, 'Pangkajene dan Kepulauan'),
(390, 26, 'Pinrang'),
(391, 26, 'Sidenreng Rappang'),
(392, 26, 'Sinjai'),
(393, 26, 'Soppeng'),
(394, 26, 'Takalar'),
(395, 26, 'Tana Toraja'),
(396, 26, 'Toraja Utara'),
(397, 26, 'Wajo'),
(398, 26, 'Kota Makassar'),
(399, 26, 'Kota Palopo'),
(400, 26, 'Kota Parepare'),
(401, 27, 'Bombana'),
(402, 27, 'Buton'),
(403, 27, 'Buton Selatan'),
(404, 27, 'Buton Tengah'),
(405, 27, 'Buton Utara'),
(406, 27, 'Kolaka'),
(407, 27, 'Kolaka Timur'),
(408, 27, 'Kolaka Utara'),
(409, 27, 'Konawe'),
(410, 27, 'Konawe Kepulauan'),
(411, 27, 'Konawe Selatan'),
(412, 27, 'Konawe Utara'),
(413, 27, 'Muna'),
(414, 27, 'Muna Barat'),
(415, 27, 'Wakatobi'),
(416, 27, 'Kota Bau-Bau'),
(417, 27, 'Kota Kendari'),
(418, 28, 'Banggai'),
(419, 28, 'Banggai Kepulauan'),
(420, 28, 'Banggai Laut'),
(421, 28, 'Buol'),
(422, 28, 'Donggala'),
(423, 28, 'Morowali'),
(424, 28, 'Morowali Utara'),
(425, 28, 'Parigi Moutong'),
(426, 28, 'Poso'),
(427, 28, 'Sigi'),
(428, 28, 'Tojo Una-Una'),
(429, 28, 'Toli-Toli'),
(430, 28, 'Kota Palu'),
(431, 29, 'Bolaang Mongondow'),
(432, 29, 'Bolaang Mongondow Selatan'),
(433, 29, 'Bolaang Mongondow Timur'),
(434, 29, 'Bolaang Mongondow Utara'),
(435, 29, 'Kepulauan Sangihe'),
(436, 29, 'Kepulauan Siau Tagulandang Biaro'),
(437, 29, 'Kepulauan Talaud'),
(438, 29, 'Minahasa'),
(439, 29, 'Minahasa Selatan'),
(440, 29, 'Minahasa Tenggara'),
(441, 29, 'Minahasa Utara'),
(442, 29, 'Kota Bitung'),
(443, 29, 'Kota Kotamobagu'),
(444, 29, 'Kota Manado'),
(445, 29, 'Kota Tomohon'),
(446, 30, 'Majene'),
(447, 30, 'Mamasa'),
(448, 30, 'Mamuju'),
(449, 30, 'Mamuju Tengah'),
(450, 30, 'Mamuju Utara'),
(451, 30, 'Polewali Mandar'),
(452, 30, 'Kota Mamuju'),
(453, 31, 'Buru'),
(454, 31, 'Buru Selatan'),
(455, 31, 'Kepulauan Aru'),
(456, 31, 'Maluku Barat Daya'),
(457, 31, 'Maluku Tengah'),
(458, 31, 'Maluku Tenggara'),
(459, 31, 'Maluku Tenggara Barat'),
(460, 31, 'Seram Bagian Barat'),
(461, 31, 'Seram Bagian Timur'),
(462, 31, 'Kota Ambon'),
(463, 31, 'Kota Tual'),
(464, 32, 'Halmahera Barat'),
(465, 32, 'Halmahera Tengah'),
(466, 32, 'Halmahera Utara'),
(467, 32, 'Halmahera Selatan'),
(468, 32, 'Kepulauan Sula'),
(469, 32, 'Halmahera Timur'),
(470, 32, 'Pulau Morotai'),
(471, 32, 'Pulau Taliabu'),
(472, 32, 'Kota Ternate'),
(473, 32, 'Kota Tidore Kepulauan'),
(474, 33, 'Asmat'),
(475, 33, 'Biak Numfor'),
(476, 33, 'Boven Digoel'),
(477, 33, 'Deiyai'),
(478, 33, 'Dogiyai'),
(479, 33, 'Intan Jaya'),
(480, 33, 'Jayapura'),
(481, 33, 'Jayawijaya'),
(482, 33, 'Keerom'),
(483, 33, 'Kepulauan Yapen'),
(484, 33, 'Lanny Jaya'),
(485, 33, 'Mamberamo Raya'),
(486, 33, 'Mamberamo Tengah'),
(487, 33, 'Mappi'),
(488, 33, 'Merauke'),
(489, 33, 'Mimika'),
(490, 33, 'Nabire'),
(491, 33, 'Nduga'),
(492, 33, 'Paniai'),
(493, 33, 'Pegunungan Bintang'),
(494, 33, 'Puncak'),
(495, 33, 'Puncak Jaya'),
(496, 33, 'Sarmi'),
(497, 33, 'Supiori'),
(498, 33, 'Tolikara'),
(499, 33, 'Waropen'),
(500, 33, 'Yahukimo'),
(501, 33, 'Yalimo'),
(502, 33, 'Kota Jayapura'),
(503, 34, 'Fakfak'),
(504, 34, 'Kaimana'),
(505, 34, 'Manokwari'),
(506, 34, 'Manokwari Selatan'),
(507, 34, 'Maybrat'),
(508, 34, 'Pegunungan Arfak'),
(509, 34, 'Raja Ampat'),
(510, 34, 'Sorong'),
(511, 34, 'Sorong Selatan'),
(512, 34, 'Tambrauw'),
(513, 34, 'Teluk Bintuni'),
(514, 34, 'Teluk Wondama');

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
(4, '2026_04_20_034231_create_provinsis_table', 1),
(5, '2026_04_20_034246_create_kabupatens_table', 1),
(6, '2026_04_20_034254_create_agamas_table', 1),
(7, '2026_04_20_034304_create_pendaftarans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_pendaftaran` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `jurusan_sekolah` varchar(255) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `prodi_pilihan_1` varchar(255) NOT NULL,
  `prodi_pilihan_2` varchar(255) DEFAULT NULL,
  `status` enum('pending','diterima','ditolak') NOT NULL DEFAULT 'pending',
  `catatan_admin` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `user_id`, `no_pendaftaran`, `nama_lengkap`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama_id`, `alamat`, `provinsi_id`, `kabupaten_id`, `kode_pos`, `no_hp`, `email`, `asal_sekolah`, `jurusan_sekolah`, `tahun_lulus`, `nisn`, `prodi_pilihan_1`, `prodi_pilihan_2`, `status`, `catatan_admin`, `created_at`, `updated_at`) VALUES
(1, 2, 'PMB-2026-D98OFG', 'Stella Ana', '3211234567890005', 'P', 'Jakarta', '2007-06-18', 2, 'Jalan Sudirman No.450', 15, 264, '51234', '088712345678', 'stellana@mail.com', 'SMAN 1 Jakarta', 'IPA', 2024, '0098424102', 'Sistem Informasi', 'Keamanan Siber', 'diterima', NULL, '2026-04-20 02:49:24', '2026-04-20 02:52:21'),
(2, 3, 'PMB-2026-EJAXCF', 'Nafari', '3211234567890001', 'P', 'Banyumas', '2008-01-20', 1, 'Jl. Satria No.20', 13, 191, '51235', '0987654321', 'nafariwulan@mail.com', 'SMAN 1 Purwokerto', 'IPA', 2026, '0098424106', 'Rekayasa Perangkat Lunak', 'Sistem Informasi', 'ditolak', NULL, '2026-04-20 08:09:25', '2026-04-20 08:24:42'),
(3, 4, 'PMB-2026-THMNPT', 'Dimas Ezar', '3221234567890009', 'L', 'Banyumas', '2009-12-24', 1, 'Jl.Karang Aglik No.150', 13, 191, '53176', '0812344321569', 'dimasezar@mail.com', 'SMK Karya Teknologi', 'Teknik Mesin', 2026, '0098420990', 'Teknik Industri', 'Teknik Elektro', 'diterima', NULL, '2026-04-20 08:22:40', '2026-04-20 08:24:32'),
(5, 6, 'PMB-2026-SIW5XE', 'Nanda Fadillah', '3211234567890001', 'P', 'Banyumas', '2004-01-21', 1, 'Jl.Jeruk No.107', 13, 191, '53176', '088712345643', 'nandawulandari756@gmail.com', 'SMK Telkom Purwokerto', 'RPL', 2025, '0098424102', 'Teknik Informatika', 'Sistem Informasi', 'diterima', NULL, '2026-04-21 00:07:24', '2026-04-21 00:08:49'),
(6, 8, 'PMB-2026-ZED3XY', 'Mark Lee', '3211234567890099', 'L', 'Kanada', '1999-08-02', 2, 'Jl.Toronto No.199', 15, 264, '51115', '089902081999', 'marklee@mail.com', 'SMAN 1 Jakarta', 'IPA', 2026, '0098424105', 'Teknik Informatika', 'Sistem Informasi', 'diterima', 'SELAMAT!', '2026-04-21 02:55:52', '2026-04-21 02:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `nama_provinsi`) VALUES
(1, 'NAD Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Sumatera Selatan'),
(5, 'Riau'),
(6, 'Kepulauan Riau'),
(7, 'Jambi'),
(8, 'Bengkulu'),
(9, 'Bangka Belitung'),
(10, 'Lampung'),
(11, 'Banten'),
(12, 'Jawa Barat'),
(13, 'Jawa Tengah'),
(14, 'JawaTimur'),
(15, 'DKI Jakarta'),
(16, 'Daerah Istimewa Yogyakarta'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Selatan'),
(22, 'Kalimantan Tengah'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Gorontalo'),
(26, 'Sulawesi Selatan'),
(27, 'Sulawesi Tenggara'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Utara'),
(30, 'Sulawesi Barat'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat');

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
('PvwYejNdL9DJWB2lew0TjTus5JyQUQv0T1vQenoO', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZFM2NGdWbURUNFVtT2ZHUW5ScEE1UVlMYnROTlkxUjNrcnpaRHhiSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2Vycy9jcmVhdGUiO3M6NToicm91dGUiO3M6MTg6ImFkbWluLnVzZXJzLmNyZWF0ZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1776765620);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL DEFAULT 'mahasiswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@pmb.ac.id', NULL, '$2y$12$XfmcM5Fjzq6xJUdF0422kORAjS8RC6s49.vJfVV0SVaXyJSHu2x6u', 'admin', NULL, '2026-04-20 02:38:49', '2026-04-20 02:38:49'),
(2, 'Stella Ana', 'stellana@mail.com', NULL, '$2y$12$PzTni7KsTxkxXzdr33oDvOabt6/nc3Ejug863oEc.Q6uEttw/f3VO', 'mahasiswa', NULL, '2026-04-20 02:43:46', '2026-04-20 02:43:46'),
(3, 'Nafari Wulan', 'nafariwulan@mail.com', NULL, '$2y$12$G/4O4wAUuOPUXtyUC8Xk4.kDNHxOWHhV1El4a69McxKYcul/85XJS', 'mahasiswa', NULL, '2026-04-20 07:52:06', '2026-04-20 07:52:06'),
(4, 'Dimas Ezar', 'dimasezar@mail.com', NULL, '$2y$12$8KbmPZBsR5y4bBh1KdwJr.lQJdowDQHU2ys5lFMc4Ccug8qxXhKJC', 'mahasiswa', NULL, '2026-04-20 08:17:10', '2026-04-20 08:17:10'),
(6, 'Nanda Fadillah', 'nandawulandari756@gmail.com', NULL, '$2y$12$iTEYgVaBNXlZ7aTDkCVqc.TokS/Y0UkT34UOTxqiRcGLO3HCCZEPG', 'mahasiswa', NULL, '2026-04-21 00:05:28', '2026-04-21 00:05:28'),
(7, 'Stella Ana', 'stellaana@mail.com', NULL, '$2y$12$9RGvDAcvbzgcirtq4xRNauZ5AT3ecJgu5SdP6H3f2J/dtS.4610SW', 'mahasiswa', NULL, '2026-04-21 00:10:17', '2026-04-21 00:10:17'),
(8, 'Mark Lee', 'marklee@mail.com', NULL, '$2y$12$cAtj48woHgtb4gETMlRydulWNFxFX4OrtP1UojCLKOheilqVxqoWK', 'mahasiswa', NULL, '2026-04-21 02:46:56', '2026-04-21 02:46:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kabupatens_provinsi_id_foreign` (`provinsi_id`);

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
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftarans_no_pendaftaran_unique` (`no_pendaftaran`),
  ADD KEY `pendaftarans_user_id_foreign` (`user_id`),
  ADD KEY `pendaftarans_agama_id_foreign` (`agama_id`),
  ADD KEY `pendaftarans_provinsi_id_foreign` (`provinsi_id`),
  ADD KEY `pendaftarans_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD CONSTRAINT `kabupatens_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD CONSTRAINT `pendaftarans_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `agamas` (`id`),
  ADD CONSTRAINT `pendaftarans_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`),
  ADD CONSTRAINT `pendaftarans_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`),
  ADD CONSTRAINT `pendaftarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
