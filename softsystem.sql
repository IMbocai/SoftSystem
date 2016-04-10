-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 10 日 16:00
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `softsystem`
--
CREATE DATABASE IF NOT EXISTS `softsystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `softsystem`;

-- --------------------------------------------------------

--
-- 表的结构 `sf_admin`
--

CREATE TABLE IF NOT EXISTS `sf_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '登陆名',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别',
  `tel` varchar(11) NOT NULL COMMENT '联系方式',
  `password` varchar(20) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sf_admin`
--

INSERT INTO `sf_admin` (`id`, `username`, `sex`, `tel`, `password`) VALUES
(1, 'user_name', 1, '13631334830', 'admin'),
(2, 'hello', 1, '1234', 'hello');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
