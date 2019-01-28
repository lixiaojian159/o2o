-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-01-28 10:05:04
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `o2o`
--

-- --------------------------------------------------------

--
-- 表的结构 `o2o_area`
--

CREATE TABLE `o2o_area` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_bis`
--

CREATE TABLE `o2o_bis` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `licence_logo` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_path` varchar(30) NOT NULL DEFAULT '',
  `bank_info` varchar(255) NOT NULL DEFAULT '',
  `money` decimal(20,2) NOT NULL DEFAULT '0.00',
  `bank_name` varchar(200) NOT NULL DEFAULT '',
  `bank_user` varchar(20) NOT NULL DEFAULT '',
  `faren` varchar(20) NOT NULL DEFAULT '',
  `faren_tel` varchar(11) NOT NULL DEFAULT '',
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_bis_account`
--

CREATE TABLE `o2o_bis_account` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `code` varchar(10) NOT NULL DEFAULT '',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `last_login_ip` varchar(30) NOT NULL DEFAULT '',
  `last_login_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_main` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_bis_location`
--

CREATE TABLE `o2o_bis_location` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `logo` varchar(30) NOT NULL DEFAULT '',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `address` varchar(200) NOT NULL DEFAULT '',
  `tel` varchar(11) NOT NULL DEFAULT '',
  `contact` varchar(30) NOT NULL DEFAULT '',
  `xpoint` varchar(10) NOT NULL DEFAULT '',
  `ypoint` varchar(10) NOT NULL DEFAULT '',
  `open_time` varchar(11) NOT NULL DEFAULT '0',
  `is_main` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `api_address` varchar(200) NOT NULL DEFAULT '',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_path` varchar(30) NOT NULL DEFAULT '',
  `category_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `category_path` varchar(30) NOT NULL DEFAULT '',
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_category`
--

CREATE TABLE `o2o_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_city`
--

CREATE TABLE `o2o_city` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `uname` varchar(20) NOT NULL DEFAULT '',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_deal`
--

CREATE TABLE `o2o_deal` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `location_ids` varchar(30) NOT NULL DEFAULT '0',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `category_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `se_category_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `start_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `end_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `origin_price` decimal(20,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `current_price` decimal(20,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `buy_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `total_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `coupons_start_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `coupons_end_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `xpoint` varchar(10) NOT NULL DEFAULT '',
  `ypoint` varchar(10) NOT NULL DEFAULT '',
  `bis_account_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `balance_price` decimal(20,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `notes` text NOT NULL,
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_featuerd`
--

CREATE TABLE `o2o_featuerd` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_user`
--

CREATE TABLE `o2o_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `code` varchar(10) NOT NULL DEFAULT '',
  `last_login_ip` varchar(30) NOT NULL DEFAULT '',
  `last_login_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(200) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL DEFAULT '',
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `o2o_area`
--
ALTER TABLE `o2o_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `city_id` (`city_id`);

--
-- 表的索引 `o2o_bis`
--
ALTER TABLE `o2o_bis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `name` (`name`);

--
-- 表的索引 `o2o_bis_account`
--
ALTER TABLE `o2o_bis_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bis_id` (`bis_id`),
  ADD KEY `username` (`username`);

--
-- 表的索引 `o2o_bis_location`
--
ALTER TABLE `o2o_bis_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bis_id` (`bis_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `name` (`name`);

--
-- 表的索引 `o2o_category`
--
ALTER TABLE `o2o_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- 表的索引 `o2o_city`
--
ALTER TABLE `o2o_city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `parent_id` (`parent_id`);

--
-- 表的索引 `o2o_deal`
--
ALTER TABLE `o2o_deal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `se_category_id` (`se_category_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `start_time` (`start_time`),
  ADD KEY `end_time` (`end_time`);

--
-- 表的索引 `o2o_featuerd`
--
ALTER TABLE `o2o_featuerd`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `o2o_user`
--
ALTER TABLE `o2o_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `o2o_area`
--
ALTER TABLE `o2o_area`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_bis`
--
ALTER TABLE `o2o_bis`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_bis_account`
--
ALTER TABLE `o2o_bis_account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_bis_location`
--
ALTER TABLE `o2o_bis_location`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_category`
--
ALTER TABLE `o2o_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_city`
--
ALTER TABLE `o2o_city`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_deal`
--
ALTER TABLE `o2o_deal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_featuerd`
--
ALTER TABLE `o2o_featuerd`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_user`
--
ALTER TABLE `o2o_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
