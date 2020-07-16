-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 16 日 17:15
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
-- テーブルの構造 `kqfm_favo_table`
--

CREATE TABLE `kqfm_favo_table` (
  `favo_id` int(12) NOT NULL,
  `favo_news_id` int(12) NOT NULL,
  `favo_username` varchar(128) NOT NULL,
  `favo_rating` int(1) NOT NULL,
  `favo_comment` mediumtext NOT NULL,
  `favo_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `kqfm_favo_table`
--

INSERT INTO `kqfm_favo_table` (`favo_id`, `favo_news_id`, `favo_username`, `favo_rating`, `favo_comment`, `favo_created_at`) VALUES
(1, 3, 'どらえもん', 3, 'コメント1コメント1コメント1コメント1コメント1コメント1コメント1コメント1コメント1', '2020-07-16 17:31:19'),
(2, 5, 'ゆみえん', 5, 'コメント2コメント2コメント2コメント2コメント2コメント2コメント2コメント2', '2020-07-16 17:33:20'),
(3, 3, 'ゆみえん', 3, 'コメント3コメント3コメント3コメント3', '2020-07-16 21:56:52');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kqfm_favo_table`
--
ALTER TABLE `kqfm_favo_table`
  ADD PRIMARY KEY (`favo_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `kqfm_favo_table`
--
ALTER TABLE `kqfm_favo_table`
  MODIFY `favo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
