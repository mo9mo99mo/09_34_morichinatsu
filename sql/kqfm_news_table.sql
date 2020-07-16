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
-- テーブルの構造 `kqfm_news_table`
--

CREATE TABLE `kqfm_news_table` (
  `news_id` int(12) NOT NULL,
  `news_title` varchar(64) NOT NULL,
  `news_category` varchar(24) NOT NULL,
  `news_url` varchar(128) NOT NULL,
  `news_user_id` int(12) NOT NULL,
  `news_comment` mediumtext NOT NULL,
  `news_created_at` datetime NOT NULL,
  `news_updated_at` datetime NOT NULL,
  `news_is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `kqfm_news_table`
--

INSERT INTO `kqfm_news_table` (`news_id`, `news_title`, `news_category`, `news_url`, `news_user_id`, `news_comment`, `news_created_at`, `news_updated_at`, `news_is_deleted`) VALUES
(1, 'たいとる', 'かてごり', 'ゆーあーるえる', 1, 'こめんとください', '2020-07-15 00:36:50', '2020-07-15 00:36:50', 0),
(2, 'タイトル2', 'プログラミング', 'https://gsacademy.jp/', 11, 'テストコメントテストコメントテストコメントテストコメントテストコメントテストコメント', '2020-07-16 16:25:09', '2020-07-16 16:25:09', 0),
(3, 'タイトル3', 'javascript', 'https://developer.mozilla.org/ja/docs/Learn/JavaScript/First_steps/What_is_JavaScript', 2, 'テストコメント2テストコメント2テストコメント2テストコメント2テストコメント2テストコメント2テストコメント2テストコメント2テストコメント2テストコメント2', '2020-07-15 16:28:57', '2020-07-15 16:28:57', 0),
(4, 'タイトル4', 'php', 'https://developer.mozilla.org/ja/', 4, 'テストコメント4テストコメント4テストコメント4テストコメント4テストコメント4テストコメント4テストコメント4テストコメント4テストコメント4', '2020-07-16 16:30:37', '2020-07-16 00:36:50', 0),
(5, 'タイトル5', 'python', 'https://www.python.jp/', 3, 'テストコメント5テストコメント5テストコメント5テストコメント5テストコメント5テストコメント5テストコメント5', '2020-07-16 16:32:13', '2020-07-16 00:36:50', 0),
(6, 'タイトル6', 'javascript', 'https://developer.mozilla.org/ja/docs/Glossary/JavaScript', 2, 'テストコメント6テストコメント6テストコメント6テストコメント6テストコメント6テストコメント6テストコメント6テストコメント6', '2020-07-16 16:34:46', '2020-07-16 16:34:46', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kqfm_news_table`
--
ALTER TABLE `kqfm_news_table`
  ADD PRIMARY KEY (`news_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `kqfm_news_table`
--
ALTER TABLE `kqfm_news_table`
  MODIFY `news_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
