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
-- テーブルの構造 `kqfm_user_table`
--

CREATE TABLE `kqfm_user_table` (
  `user_id` int(12) NOT NULL,
  `user_username` varchar(24) NOT NULL,
  `user_password` varchar(12) NOT NULL,
  `user_is_deleted` int(1) NOT NULL,
  `user_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `kqfm_user_table`
--

INSERT INTO `kqfm_user_table` (`user_id`, `user_username`, `user_password`, `user_is_deleted`, `user_created_at`) VALUES
(1, '北島由美恵', 'aiueo', 0, '2020-07-02 21:59:15'),
(3, 'KITAJIMA', 'qwert', 0, '2020-07-02 22:07:58'),
(4, 'yumie.k', 'poiuy', 0, '2020-07-02 22:08:59'),
(5, 'ゆみえん', '988765', 0, '2020-07-02 22:09:47'),
(7, 'YU', '987554', 0, '2020-07-02 22:26:27'),
(8, 'KITAYU', 'nyuih', 0, '2020-07-02 22:27:39'),
(9, 'KONI', 'sdfgh', 0, '2020-07-02 22:28:43'),
(10, 'EIMYU', 'skolgf', 0, '2020-07-02 22:29:39'),
(11, 'testuser', '123456', 0, '2020-07-04 15:49:19'),
(12, 'ppppp', 'y9u7m2i2', 0, '2020-07-04 17:11:57'),
(13, 'ゆみえきたじま', '98765', 0, '2020-07-04 17:14:26'),
(14, 'こんにちわ', '00000', 0, '2020-07-07 00:14:15'),
(15, 'hello', 'world', 0, '2020-07-07 00:49:58');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kqfm_user_table`
--
ALTER TABLE `kqfm_user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `kqfm_user_table`
--
ALTER TABLE `kqfm_user_table`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
