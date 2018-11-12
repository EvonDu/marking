-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-11-12 18:48:57
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marking`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'vPqX05jGH_JKmPgcF61FNFWSdMLQIRSh', '$2y$13$NFQdLUJfGqbmfFG0WjDDq.fhu4V4DV8hZm/AzHYYHAE8AYpHGcqjm', NULL, 'admin@yii.com', 10, 1541681567, 1541681567);

-- --------------------------------------------------------

--
-- 表的结构 `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `num` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pdf` varchar(512) DEFAULT NULL,
  `ppt` varchar(512) DEFAULT NULL,
  `swf` varchar(512) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `material`
--

INSERT INTO `material` (`id`, `num`, `name`, `pdf`, `ppt`, `swf`) VALUES
(1, '123', '测试队伍1', '20181111/5be714c8497e5.pdf', NULL, NULL),
(2, '队伍2', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1541681563),
('m130524_201442_init', 1541681566),
('m180424_005201_admin', 1541681567),
('m180424_005747_rbac', 1541681570),
('m180424_012504_userinfo', 1541681570);

-- --------------------------------------------------------

--
-- 表的结构 `score_item`
--

CREATE TABLE `score_item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(512) DEFAULT '',
  `max` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `score_item`
--

INSERT INTO `score_item` (`id`, `name`, `description`, `max`) VALUES
(1, '价值贡献', '对公司主营业务的是否有贡献价值，或对公司数字化转型能够提供支持', 10),
(2, '技术描述', '技术是否成熟、新颖，描述是否条理清晰， “数字化”技术应用情况', 10),
(3, '项目描述', '准确定义所提供的产品、技术、概念产品， 针对解决的问题，如何满足市场需求 ，项目所具有的独创性、领先型。', 10),
(4, '方案可行性', '业务主旨、资金筹备方案合理性、管理背景和能力 产品、服务、技术含量和创新型', 15),
(5, '行业规模', '描述行业的整体发展情况、细分市场情况 、市场动态以及客户规模。', 10),
(6, '市场机会', '详细的市场调查，分析面对的市场状况、发展趋势、 竞争状况、市场定位。清晰的产业和市场竞争环境， 市场机会和有效的市场需求', 10),
(7, '营销策略', '根据项目的特点，制定合适的市场营销策略， 包括营销渠道，促销方式，产品的生产、 服务计划，经营难度，资源需求', 10),
(8, '协同能力', '充分展示出内外部协同能力，资源整合能力和创业团队的能力建设与提升', 8),
(9, 'PPT制作及演讲形式', 'PPT制作结构严谨、构思巧妙、一目了然， 能够达到更有效的沟通；演讲形式新颖，产品展示生动形象', 8),
(10, '现场展示', '演讲者预言规范、语速恰当、表达清楚、流畅 ，具有较强的感染力。营造良好的演讲效果 演讲时间控释在9分钟之内', 9);

-- --------------------------------------------------------

--
-- 表的结构 `score_submit`
--

CREATE TABLE `score_submit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num` varchar(50) NOT NULL,
  `fund` int(11) DEFAULT '0',
  `s1` int(11) DEFAULT '0',
  `s2` int(11) DEFAULT '0',
  `s3` int(11) DEFAULT '0',
  `s4` int(11) DEFAULT '0',
  `s5` int(11) DEFAULT '0',
  `s6` int(11) DEFAULT '0',
  `s7` int(11) DEFAULT '0',
  `s8` int(11) DEFAULT '0',
  `s9` int(11) DEFAULT '0',
  `s10` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `score_submit`
--

INSERT INTO `score_submit` (`id`, `user_id`, `num`, `fund`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`) VALUES
(12, 2, '123', 21, 10, 10, 10, 15, 10, 10, 10, 8, 8, 9),
(13, 2, '队伍2', 49, 10, 10, 10, 15, 10, 10, 10, 8, 8, 9),
(14, 3, '123', 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `fund` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `fund`) VALUES
(1, 'user', 'J116BH1pO5kGB7Vl596zgs3gnxxVnRDc', '$2y$13$kXqATUSyFpW6l71L.u57MeKZEuEInyRdK1aOuuYkpOc77a.pAkYfy', NULL, 'user@test.com', 10, 1541681567, 1542038783, 10000),
(2, 'user2', '7kJdxq5aTdU7vMB3pB5ioHv3Q80oBzIv', '$2y$13$FqzYaiHm9CdyclV/9Rnmp.MU1p6MlZ0ByFGaWgK4AzdQnl0w2/FJW', NULL, 'user2@test.com', 10, 1541869848, 1542047336, 9825),
(3, 'test3', 'ouqHdnJTaLMvxsYpcLkwJSdups1XrS-i', '$2y$13$RKJxHpyjiN8i3QtF71RhF.Fr.qzquym9P/AY0O5a67cfybSIr2OFO', NULL, 'test@test.com', 10, 1542040630, 1542040630, 1000);

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `score_item`
--
ALTER TABLE `score_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_submit`
--
ALTER TABLE `score_submit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_num` (`user_id`,`num`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `score_item`
--
ALTER TABLE `score_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `score_submit`
--
ALTER TABLE `score_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 限制导出的表
--

--
-- 限制表 `admin_info`
--
ALTER TABLE `admin_info`
  ADD CONSTRAINT `admin_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `score_submit`
--
ALTER TABLE `score_submit`
  ADD CONSTRAINT `FK_score_submit_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
