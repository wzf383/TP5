-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-18 12:51:29
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '班级主键',
  `name` varchar(30) DEFAULT NULL,
  `length` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `grade`
--

INSERT INTO `grade` (`id`, `name`, `length`, `price`, `status`, `create_time`, `update_time`, `delete_time`, `is_delete`) VALUES
(1, 'PHP11', '6个月', 1000, 0, NULL, 1525869626, NULL, 1),
(2, 'java', '5个月 ', 11, 1, NULL, NULL, NULL, 0),
(4, 'Android', '3个月', 789, 1, 1524483501, 1524483501, NULL, NULL),
(5, 'JAVA', '9个月', 10000, 1, 1524483754, 1524484611, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `age` tinyint(4) UNSIGNED DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `name`, `sex`, `age`, `mobile`, `email`, `status`, `start_time`, `create_time`, `update_time`, `delete_time`, `is_delete`, `grade_id`) VALUES
(1, '张三1', 0, 18, '1365555', '38@qq.com', 1, -28800, 1524569015, 1524573739, NULL, NULL, 2),
(2, '李四', 1, 20, '136555468', '383@qq.com', 0, 903, 1524570857, 1524573897, NULL, 1, 2),
(3, '王五', 1, 19, '1325477', '3832256@qq.com', 1, 603, 1524571594, 1524573897, NULL, 1, 4),
(4, '凯看', 1, 5, '12333', '599949', 0, 1522252800, 1524574252, 1524574283, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `degree` varchar(30) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `hiredate` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT '1',
  `status` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `degree`, `mobile`, `school`, `hiredate`, `create_time`, `update_time`, `delete_time`, `is_delete`, `status`, `grade_id`) VALUES
(1, '王老师111111119', '1', '13692018247', '北京大学', 20102400, 1524468611, 1524539956, NULL, 1, 0, 1),
(2, ' 陈老师', '1', '1111111', '清华大学', 1, 1524483664, 1524539956, NULL, 1, 1, 4),
(3, '存老师', '3', '110', '复旦大学', 1543680000, 1524538883, 1524539956, NULL, 1, 1, 0),
(6, '哦老师', '1', '1234', '试试大学', 1522339200, 1524539421, 1524539956, NULL, 1, 1, 0),
(7, '等老师', '1', '9999', '试试大学', 1522771200, 1524539496, 1524539956, NULL, 1, 1, 0),
(8, '李老师', '1', '9987', '河北大学', 1522684800, 1524539653, 1524539956, NULL, 1, 1, 0),
(9, '张老师', '1', '6547', '海南大学', 1522944000, 1524539719, 1524539956, NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `role` tinyint(2) UNSIGNED DEFAULT '0',
  `status` int(2) UNSIGNED DEFAULT '0',
  `delete_time` int(11) DEFAULT NULL,
  `login_time` int(11) UNSIGNED DEFAULT NULL,
  `login_count` int(11) UNSIGNED DEFAULT NULL,
  `is_delete` int(2) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `create_time`, `update_time`, `role`, `status`, `delete_time`, `login_time`, `login_count`, `is_delete`) VALUES
(2, 'peter', '1232133', '3333@qq.com', 1523868876, 1523868876, 0, 0, NULL, NULL, 12, NULL),
(7, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '383225639@qq,com', 1524058639, 1524495378, 1, 1, NULL, 1523933121, 10, 1),
(3, 'jjjj', '14e1b600b1fd579f47433b88e8d85291', '3832256@qq.com', 1523931931, 1523933121, 0, 0, NULL, 1523933121, 1, NULL),
(4, 'lll', '123456', '3832256@qq.com', 1523933919, 1523933919, 1, 1, NULL, NULL, NULL, NULL),
(5, 'admindd', '123456', '33@qq.com', 1524058338, 1524058338, 0, 1, NULL, NULL, NULL, NULL),
(6, 'QQQ', 'e10adc3949ba59abbe56e057f20f883e', '33338@qq.com', 66, 1525869607, 0, 1, NULL, NULL, NULL, 1),
(8, 'AAAD', '123', '1111', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL),
(9, 'qqqd', 'ww', '333', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(10, 'AAAS', 'AAAA', 'ASASA', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(11, 'wzf', 'wzf', 'wzf', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(12, 'wocaonima', 'vvv', '843469317@qq..com', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL),
(13, 'peter1', '123', '3333@qq.com', NULL, NULL, 0, 0, NULL, NULL, NULL, 1),
(14, 'cc', 'cc', 'ccc@qq.com', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(15, 'VBN', '', '', NULL, NULL, 0, 0, NULL, NULL, NULL, 1),
(16, 'MMMML', 'MMM', 'MMMM', NULL, 1524493903, 1, 1, NULL, NULL, 0, 1),
(17, 'CESHI', '111', 'sss', 1524381887, 1524484237, 0, 0, 1524484237, NULL, 0, 1),
(18, 'PPPp', '111', '111', 1, 1, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wxfl`
--

DROP TABLE IF EXISTS `wxfl`;
CREATE TABLE IF NOT EXISTS `wxfl` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(64) NOT NULL COMMENT '类别名称',
  `pid` int(11) NOT NULL COMMENT '父类',
  `path` varchar(128) NOT NULL COMMENT '路劲',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wxfl`
--

INSERT INTO `wxfl` (`id`, `name`, `pid`, `path`) VALUES
(1, 'æœè£…', 0, '0,'),
(2, 'æ•°ç ', 0, '0,'),
(3, 'é£Ÿå“', 0, '0,'),
(4, 'è¥¿è£…', 1, '0,1,'),
(5, 'å„¿ç«¥è¥¿è£…', 4, '0,1,4,'),
(6, 'ç›¸æœº', 2, '0,2,'),
(14, 'åŽç¡•ç¬”è®°æœ¬', 13, '0,2,13,'),
(13, 'ç¬”è®°æœ¬', 2, '0,2,');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
