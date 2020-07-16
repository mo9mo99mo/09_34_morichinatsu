-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 16 日 17:14
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `test_imp`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kqfm_like_table`
--

CREATE TABLE `kqfm_like_table` (
  `like_id` int(12) NOT NULL,
  `like_username` varchar(24) NOT NULL,
  `like_news_id` int(12) NOT NULL,
  `like_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `kqfm_like_table`
--

INSERT INTO `kqfm_like_table` (`like_id`, `like_username`, `like_news_id`, `like_created_at`) VALUES
(2, 'testuser', 3, '2020-07-11 15:17:57'),
(4, 'yumie.k', 3, '2020-07-11 16:01:56'),
(5, 'hello', 3, '2020-07-11 16:01:57'),
(6, 'testuser', 2, '2020-07-11 16:01:58'),
(7, 'testuser', 1, '2020-07-11 16:01:58'),
(8, 'ゆみえん', 4, '2020-07-11 16:01:59'),
(9, 'どらえもん', 4, '2020-07-11 16:02:00'),
(10, 'KITAJIMA', 4, '2020-07-11 16:02:00'),
(14, 'KITAJIMA', 2, '2020-07-11 16:32:07'),
(15, 'KITAJIMA', 3, '2020-07-11 16:32:08'),
(19, 'yumie.k', 2, '2020-07-11 16:33:06'),
(21, 'KITAJIMA', 1, '2020-07-11 16:33:42'),
(23, 'ゆみえん', 3, '2020-07-11 16:35:58'),
(24, 'どらえもん', 3, '2020-07-11 16:36:16'),
(25, 'ゆみえん', 5, '2020-07-11 16:37:12');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kqfm_like_table`
--
ALTER TABLE `kqfm_like_table`
  ADD PRIMARY KEY (`like_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `kqfm_like_table`
--
ALTER TABLE `kqfm_like_table`
  MODIFY `like_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
