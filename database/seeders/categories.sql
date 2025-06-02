-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2025 pada 10.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babies`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Activities', 'activities', NULL, 'active', '2025-05-21 08:43:20', NULL),
(2, 'Sensory', 'sensory', NULL, 'active', '2025-05-21 08:43:20', NULL),
(3, 'Age', 'age', NULL, 'active', '2025-05-21 08:43:20', NULL),
(4, 'Crafts', 'crafts', NULL, 'active', '2025-05-21 08:43:20', NULL),
(5, 'Learning', 'learning', NULL, 'active', '2025-05-21 08:43:20', NULL),
(6, 'Painting', 'painting', NULL, 'active', '2025-05-21 08:43:20', NULL),
(7, 'Coloring page', 'coloring-page', 1, 'active', '2025-05-21 08:43:20', NULL),
(8, 'Jokes for kids', 'jokes-for-kids', 1, 'active', '2025-05-21 08:43:20', NULL),
(9, 'Indoor activities', 'indoor-activities', 1, 'active', '2025-05-21 08:43:20', NULL),
(10, 'Outdoor activities', 'outdoor-activities', 1, 'active', '2025-05-21 08:43:20', NULL),
(11, 'Rainy day activities', 'rainy-day-activities', 1, 'active', '2025-05-21 08:43:20', NULL),
(12, 'Play Dough', 'play-dough', 2, 'active', '2025-05-21 08:43:20', NULL),
(13, 'Sensory Bins, Bottles and Bags', 'sensory-bins-bottles-and-bags', 2, 'active', '2025-05-21 08:43:20', NULL),
(14, 'Slime', 'slime', 2, 'active', '2025-05-21 08:43:20', NULL),
(15, 'Water Beads', 'water-beads', 2, 'active', '2025-05-21 08:43:20', NULL),
(16, 'Baby', 'baby', 3, 'active', '2025-05-21 08:43:20', NULL),
(17, 'Toddler', 'toddler', 3, 'active', '2025-05-21 08:43:20', NULL),
(18, 'Preschooler', 'preschooler', 3, 'active', '2025-05-21 08:43:20', NULL),
(19, 'Kindergartner', 'kindergartner', 3, 'active', '2025-05-21 08:43:20', NULL),
(20, 'big Kid', 'big-kid', 3, 'active', '2025-05-21 08:43:20', NULL),
(21, 'Animal Crafts', 'animal-crafts', 4, 'active', '2025-05-21 08:43:20', NULL),
(22, 'Cardboard Crafts', 'cardboard-crafts', 4, 'active', '2025-05-21 08:43:20', NULL),
(23, 'Paper Plate Crafts', 'paper-plate-crafts', 4, 'active', '2025-05-21 08:43:20', NULL),
(24, 'Pipe Cleaner Crafts', 'pipe-cleaner-crafts', 4, 'active', '2025-05-21 08:43:20', NULL),
(25, 'Colors', 'colors', 5, 'active', '2025-05-21 08:43:20', NULL),
(26, 'Fine Motor Skills', 'fine-motor-skills', 5, 'active', '2025-05-21 08:43:20', NULL),
(27, 'Gross Motor Skills', 'gross-motor-skills', 5, 'active', '2025-05-21 08:43:20', NULL),
(28, 'Letters', 'letters', 5, 'active', '2025-05-21 08:43:20', NULL),
(29, 'Math', 'math', 5, 'active', '2025-05-21 08:43:20', NULL),
(30, 'STEM', 'stem', 5, 'active', '2025-05-21 08:43:20', NULL),
(31, 'Edible Painting', 'edible-painting', 6, 'active', '2025-05-21 08:43:20', NULL),
(32, 'Rocking Painting', 'rocking-painting', 6, 'active', '2025-05-21 08:43:20', NULL),
(33, 'Salt Painting', 'salt-painting', 6, 'active', '2025-05-21 08:43:20', NULL),
(34, 'Watercolor Painting', 'watercolor-painting', 6, 'active', '2025-05-21 08:43:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
