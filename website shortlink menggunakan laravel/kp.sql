-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 19, 2024 at 09:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp`
--
-- --------------------------------------------------------
--
-- Table structure for table `cache`
--
CREATE TABLE
    `cache` (
        `key` varchar(255) NOT NULL,
        `value` mediumtext NOT NULL,
        `expiration` int (11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `cache_locks`
--
CREATE TABLE
    `cache_locks` (
        `key` varchar(255) NOT NULL,
        `owner` varchar(255) NOT NULL,
        `expiration` int (11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `failed_jobs`
--
CREATE TABLE
    `failed_jobs` (
        `id` bigint (20) UNSIGNED NOT NULL,
        `uuid` varchar(255) NOT NULL,
        `connection` text NOT NULL,
        `queue` text NOT NULL,
        `payload` longtext NOT NULL,
        `exception` longtext NOT NULL,
        `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `jobs`
--
CREATE TABLE
    `jobs` (
        `id` bigint (20) UNSIGNED NOT NULL,
        `queue` varchar(255) NOT NULL,
        `payload` longtext NOT NULL,
        `attempts` tinyint (3) UNSIGNED NOT NULL,
        `reserved_at` int (10) UNSIGNED DEFAULT NULL,
        `available_at` int (10) UNSIGNED NOT NULL,
        `created_at` int (10) UNSIGNED NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `job_batches`
--
CREATE TABLE
    `job_batches` (
        `id` varchar(255) NOT NULL,
        `name` varchar(255) NOT NULL,
        `total_jobs` int (11) NOT NULL,
        `pending_jobs` int (11) NOT NULL,
        `failed_jobs` int (11) NOT NULL,
        `failed_job_ids` longtext NOT NULL,
        `options` mediumtext DEFAULT NULL,
        `cancelled_at` int (11) DEFAULT NULL,
        `created_at` int (11) NOT NULL,
        `finished_at` int (11) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `migrations`
--
CREATE TABLE
    `migrations` (
        `id` int (10) UNSIGNED NOT NULL,
        `migration` varchar(255) NOT NULL,
        `batch` int (11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--
INSERT INTO
    `migrations` (`id`, `migration`, `batch`)
VALUES
    (1, '0001_01_01_000000_create_users_table', 1),
    (2, '0001_01_01_000001_create_cache_table', 1),
    (3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------
--
-- Table structure for table `myurl`
--
CREATE TABLE
    `myurl` (
        `id` int (11) NOT NULL,
        `url_id` int (11) NOT NULL,
        `visited_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `status` varchar(255) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Table structure for table `password_reset_tokens`
--
CREATE TABLE
    `password_reset_tokens` (
        `email` varchar(255) NOT NULL,
        `token` varchar(255) NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `sessions`
--
CREATE TABLE
    `sessions` (
        `id` varchar(255) NOT NULL,
        `user_id` bigint (20) UNSIGNED DEFAULT NULL,
        `ip_address` varchar(45) DEFAULT NULL,
        `user_agent` text DEFAULT NULL,
        `payload` longtext NOT NULL,
        `last_activity` int (11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--
INSERT INTO
    `sessions` (
        `id`,
        `user_id`,
        `ip_address`,
        `user_agent`,
        `payload`,
        `last_activity`
    )
VALUES
    (
        '8jZm68mzCgVuWzuIfR3NSiHQ4I31ZK8eoPGuF5DD',
        1,
        '127.0.0.1',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
        'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkFPbkFVbTdzMWx1Rld1OGEwS2htREt1MmQzODA3aGtmWUh2TTBaayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teXVybD9wYWdlPTciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',
        1734596600
    ),
    (
        'f0QI6if5ilppEck3xWLECdR5hIw3WNSqiYyUQL49',
        1,
        '127.0.0.1',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
        'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibTFDZktCV2JVSGNpakhLSDNpTkdsUktTTWV6eHdBWExXaUZnQ0F5OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teXVybCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',
        1734531414
    );

-- --------------------------------------------------------
--
-- Table structure for table `urls`
--
CREATE TABLE
    `urls` (
        `id` int (11) NOT NULL,
        `long_url` text NOT NULL,
        `short_url` varchar(255) NOT NULL,
        `status` enum ('draft', 'online') NOT NULL DEFAULT 'draft',
        `visits` int (11) DEFAULT 0,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `urls`
--
INSERT INTO
    `urls` (
        `id`,
        `long_url`,
        `short_url`,
        `status`,
        `visits`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        'https://www.pertanian.go.id',
        'http://short.ly/abc123',
        'online',
        10,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        2,
        'https://www.kemendagri.go.id',
        'http://short.ly/def456',
        'online',
        15,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        3,
        'https://www.kemenkeu.go.id',
        'http://short.ly/ghi789',
        'draft',
        0,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        4,
        'https://www.kemenag.go.id',
        'http://short.ly/jkl012',
        'online',
        5,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        5,
        'https://www.kemenkes.go.id',
        'http://short.ly/mno345',
        'online',
        20,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        6,
        'https://www.kemenlu.go.id',
        'http://short.ly/pqr678',
        'online',
        8,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        7,
        'https://www.kemendikbud.go.id',
        'http://short.ly/stu901',
        'draft',
        0,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        8,
        'https://www.kemensos.go.id',
        'http://short.ly/vwx234',
        'online',
        25,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        9,
        'https://www.kemenperin.go.id',
        'http://short.ly/yza567',
        'online',
        12,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        10,
        'https://www.kemenpar.go.id',
        'http://short.ly/bcd890',
        'draft',
        0,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        11,
        'https://www.kemendag.go.id',
        'http://short.ly/efg123',
        'online',
        7,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        12,
        'https://www.kemenag.go.id',
        'http://short.ly/hij456',
        'online',
        14,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        13,
        'https://www.kemenkes.go.id',
        'http://short.ly/klm789',
        'draft',
        0,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        14,
        'https://www.kemlu.go.id',
        'http://short.ly/nop012',
        'online',
        18,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        15,
        'https://www.kemendikbud.go.id',
        'http://short.ly/qrw345',
        'draft',
        0,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        16,
        'https://www.kemensos.go.id',
        'http://short.ly/stz678',
        'online',
        22,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        17,
        'https://www.kemenperin.go.id',
        'http://short.ly/uvw901',
        'online',
        10,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        18,
        'https://www.kemenpar.go.id',
        'http://short.ly/xyz234',
        'draft',
        0,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        19,
        'https://www.kemenlu.go.id',
        'http://short.ly/abc567',
        'online',
        30,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        20,
        'https://www.kemendagri.go.id',
        'http://short.ly/def890',
        'online',
        17,
        '2024-12-19 08:06:29',
        '2024-12-19 08:06:29'
    ),
    (
        21,
        'https://www.wikipedia.org',
        'http://short.ly/wik456',
        'online',
        45,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        22,
        'https://www.amazon.com',
        'http://short.ly/amn678',
        'online',
        120,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        23,
        'https://www.stackoverflow.com',
        'http://short.ly/sof234',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        24,
        'https://www.udemy.com',
        'http://short.ly/ude123',
        'online',
        78,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        25,
        'https://www.github.com',
        'http://short.ly/git345',
        'online',
        54,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        26,
        'https://www.reddit.com',
        'http://short.ly/red567',
        'online',
        39,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        27,
        'https://www.medium.com',
        'http://short.ly/med890',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        28,
        'https://www.coursera.org',
        'http://short.ly/cor234',
        'online',
        88,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        29,
        'https://www.netflix.com',
        'http://short.ly/net789',
        'online',
        256,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        30,
        'https://www.ebay.com',
        'http://short.ly/ebc678',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        31,
        'https://www.nike.com',
        'http://short.ly/nik234',
        'online',
        32,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        32,
        'https://www.bbc.com',
        'http://short.ly/bbc567',
        'online',
        45,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        33,
        'https://www.spotify.com',
        'http://short.ly/spo890',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        34,
        'https://www.ted.com',
        'http://short.ly/ted234',
        'online',
        68,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        35,
        'https://www.airbnb.com',
        'http://short.ly/air567',
        'online',
        91,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        36,
        'https://www.vimeo.com',
        'http://short.ly/vim345',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        37,
        'https://www.pinterest.com',
        'http://short.ly/pin678',
        'online',
        134,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        38,
        'https://www.linkedin.com',
        'http://short.ly/lin890',
        'online',
        102,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        39,
        'https://www.booking.com',
        'http://short.ly/boo234',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        40,
        'https://www.dropbox.com',
        'http://short.ly/dro123',
        'online',
        67,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        41,
        'https://www.yelp.com',
        'http://short.ly/yel567',
        'online',
        29,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        42,
        'https://www.snapchat.com',
        'http://short.ly/sna890',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        43,
        'https://www.twitch.tv',
        'http://short.ly/twi234',
        'online',
        158,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        44,
        'https://www.aliexpress.com',
        'http://short.ly/ali567',
        'online',
        89,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        45,
        'https://www.khanacademy.org',
        'http://short.ly/kha890',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        46,
        'https://www.quora.com',
        'http://short.ly/quora123',
        'online',
        73,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        47,
        'https://www.medium.com',
        'http://short.ly/med345',
        'online',
        42,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        48,
        'https://www.apple.com',
        'http://short.ly/app678',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        49,
        'https://www.wordpress.com',
        'http://short.ly/wor234',
        'online',
        59,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        50,
        'https://www.adobe.com',
        'http://short.ly/ado123',
        'online',
        112,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        51,
        'https://www.walmart.com',
        'http://short.ly/wal234',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        52,
        'https://www.asos.com',
        'http://short.ly/aso567',
        'online',
        45,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        53,
        'https://www.hulu.com',
        'http://short.ly/hul890',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        54,
        'https://www.paypal.com',
        'http://short.ly/pay123',
        'online',
        67,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        55,
        'https://www.dailymotion.com',
        'http://short.ly/dai234',
        'online',
        92,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        56,
        'https://www.weather.com',
        'http://short.ly/wea567',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        57,
        'https://www.blogger.com',
        'http://short.ly/blo890',
        'online',
        34,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        58,
        'https://www.airbnb.com',
        'http://short.ly/air345',
        'online',
        145,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        59,
        'https://www.cnn.com',
        'http://short.ly/cnn234',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        60,
        'https://www.imdb.com',
        'http://short.ly/imdb678',
        'online',
        214,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        61,
        'https://www.shopify.com',
        'http://short.ly/sho890',
        'online',
        101,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        62,
        'https://www.samsung.com',
        'http://short.ly/sam234',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        63,
        'https://www.target.com',
        'http://short.ly/tar567',
        'online',
        23,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        64,
        'https://www.bestbuy.com',
        'http://short.ly/bes890',
        'online',
        89,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        65,
        'https://www.nytimes.com',
        'http://short.ly/nyt234',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        66,
        'https://www.asos.com',
        'http://short.ly/aso123',
        'online',
        30,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        67,
        'https://www.tesla.com',
        'http://short.ly/tes567',
        'online',
        56,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        68,
        'https://www.bbc.co.uk',
        'http://short.ly/bbc890',
        'draft',
        0,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        69,
        'https://www.walmart.ca',
        'http://short.ly/wal678',
        'online',
        48,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        70,
        'https://www.hbo.com',
        'http://short.ly/hbo234',
        'online',
        108,
        '2024-12-19 08:18:37',
        '2024-12-19 08:18:37'
    ),
    (
        71,
        'https://www.reuters.com',
        'http://short.ly/reu123',
        'online',
        150,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        72,
        'https://www.cnbc.com',
        'http://short.ly/cnb234',
        'online',
        220,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        73,
        'https://www.forbes.com',
        'http://short.ly/for567',
        'online',
        175,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        74,
        'https://www.businessinsider.com',
        'http://short.ly/bus890',
        'online',
        98,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        75,
        'https://www.theguardian.com',
        'http://short.ly/gua123',
        'online',
        60,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        76,
        'https://www.npr.org',
        'http://short.ly/npr234',
        'online',
        42,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        77,
        'https://www.bloomberg.com',
        'http://short.ly/blo567',
        'draft',
        0,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        78,
        'https://www.smithsonianmag.com',
        'http://short.ly/smi890',
        'online',
        35,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        79,
        'https://www.nationalgeographic.com',
        'http://short.ly/nat123',
        'online',
        120,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        80,
        'https://www.history.com',
        'http://short.ly/his234',
        'online',
        80,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        81,
        'https://www.scribd.com',
        'http://short.ly/scr567',
        'online',
        47,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        82,
        'https://www.pbs.org',
        'http://short.ly/pbs890',
        'draft',
        0,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        83,
        'https://www.sfgate.com',
        'http://short.ly/sfg123',
        'online',
        55,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        84,
        'https://www.washingtonpost.com',
        'http://short.ly/wpo234',
        'online',
        165,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        85,
        'https://www.chicagotribune.com',
        'http://short.ly/chi567',
        'online',
        140,
        '2024-12-19 08:20:13',
        '2024-12-19 08:20:13'
    ),
    (
        86,
        'https://www.youtube.com',
        'http://short.ly/yut456',
        'online',
        100,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        87,
        'https://www.twitter.com',
        'http://short.ly/twi789',
        'online',
        150,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        88,
        'https://www.instagram.com',
        'http://short.ly/ins234',
        'draft',
        0,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        89,
        'https://www.pinterest.com',
        'http://short.ly/pin890',
        'online',
        75,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        90,
        'https://www.snapchat.com',
        'http://short.ly/sna567',
        'online',
        40,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        91,
        'https://www.vimeo.com',
        'http://short.ly/vim123',
        'draft',
        0,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        92,
        'https://www.spotify.com',
        'http://short.ly/spo567',
        'online',
        180,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        93,
        'https://www.twitch.tv',
        'http://short.ly/twi345',
        'draft',
        0,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        94,
        'https://www.tiktok.com',
        'http://short.ly/tik678',
        'online',
        110,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    ),
    (
        95,
        'https://www.netflix.com',
        'http://short.ly/net456',
        'online',
        200,
        '2024-12-19 08:21:01',
        '2024-12-19 08:21:01'
    );

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE
    `users` (
        `id` int (11) NOT NULL,
        `name` varchar(255) DEFAULT NULL,
        `email` varchar(255) NOT NULL,
        `email_verified_at` timestamp NULL DEFAULT NULL,
        `password` varchar(255) NOT NULL,
        `remember_token` varchar(100) DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `users`
--
INSERT INTO
    `users` (
        `id`,
        `name`,
        `email`,
        `email_verified_at`,
        `password`,
        `remember_token`,
        `created_at`,
        `updated_at`
    )
VALUES
    (
        1,
        'fery andriawan',
        '411212045@mahasiswa.undira.ac.id',
        '2024-12-01 01:49:26',
        '$2y$10$rWT2u1lONSdZmwdiCyxE2OCsRynQo18rSzF8h9vqTM3/3XMtPfGta',
        '$2y$10$rWT2u1lONSdZmwdiCyxE2OCsRynQo18rSzF8h9vqTM3/3XMtPfGta',
        '2024-12-01 01:49:26',
        '2024-12-02 03:25:56'
    ),
    (
        3,
        'fery',
        'fery@gmail.com',
        '2024-12-02 01:48:49',
        '$2y$10$BY7eEeMgyCy3RVxJ24j/0uII0AWo3bmOFBsZSnEI2bp1xw2zMvXH2',
        'pQZvSfVzRKEqITW6cxLYq8LonHXfoSbz9Zf3ca6Gpi4QsMplDDnwBR7GAVWg',
        '2024-12-01 05:19:03',
        '2024-12-05 16:02:01'
    );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `cache`
--
ALTER TABLE `cache` ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks` ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs` ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs` ADD PRIMARY KEY (`id`),
ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myurl`
--
ALTER TABLE `myurl` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens` ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions` ADD PRIMARY KEY (`id`),
ADD KEY `sessions_user_id_index` (`user_id`),
ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls` ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `short_url` (`short_url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs` MODIFY `id` bigint (20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs` MODIFY `id` bigint (20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations` MODIFY `id` int (10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `myurl`
--
ALTER TABLE `myurl` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
