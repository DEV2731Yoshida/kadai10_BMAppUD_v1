-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-11 10:57:50
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db_kadai3`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_table`
--

CREATE TABLE `gs_kadai_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `age` int(4) NOT NULL,
  `email` varchar(128) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_kadai_table`
--

INSERT INTO `gs_kadai_table` (`id`, `name`, `age`, `email`, `content`) VALUES
(1, 'ジーズ太郎', 41, 'test1@test.jp', 'コンテントです'),
(8, 'ジーズ二郎', 42, 'test2@test.jp', 'コンテントで'),
(9, 'ジーズ三郎', 43, 'test3@test.jp', 'コンテント'),
(10, 'ジーズ四郎', 44, 'test4@test.jp', 'コンテン'),
(11, 'ジーズ五郎', 45, 'test5@test.jp', 'コンテ'),
(12, 'ジーズ六郎', 42, 'test2@test.jp', 'コンテントで'),
(13, 'ジーズ七郎', 43, 'test3@test.jp', 'コンテント'),
(16, '吉田健二', 44, 'test4@test.jp', 'ああああああああ');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_kadai_table`
--
ALTER TABLE `gs_kadai_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_kadai_table`
--
ALTER TABLE `gs_kadai_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
