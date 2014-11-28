-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2014 at 12:25 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ricetransport`
--
CREATE DATABASE `ricetransport` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ricetransport`;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `from` text NOT NULL COMMENT '出发地',
  `to` text NOT NULL COMMENT '目的地',
  `price` decimal(10,0) NOT NULL COMMENT '订单价格',
  `freight` decimal(10,0) NOT NULL COMMENT '运费',
  `ward` decimal(10,0) NOT NULL COMMENT '运费奖励',
  `status` enum('new','onTheWay','finish') NOT NULL COMMENT '状态',
  `restaurantid` int(11) NOT NULL COMMENT '商家id',
  `tranportboyid` int(11) NOT NULL COMMENT '送货员id',
  `time` datetime NOT NULL COMMENT '订单生成时间',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='所有订单列表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `name` text NOT NULL COMMENT '商店名称',
  `location` text NOT NULL COMMENT '地址',
  `phone` int(11) NOT NULL COMMENT '电话',
  `host` text NOT NULL COMMENT '老板名字',
  `reputation` int(11) NOT NULL COMMENT '信誉额度',
  `cipher` text NOT NULL COMMENT '密码',
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='所有商家表单';

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`name`, `location`, `phone`, `host`, `reputation`, `cipher`, `id`) VALUES
('DSA为', 'dasdas', 0, 'DASDSA', 0, '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transportboy`
--

CREATE TABLE IF NOT EXISTS `transportboy` (
  `name` text NOT NULL COMMENT '送货人员名称',
  `IDNumber` int(11) NOT NULL COMMENT '身份证号码',
  `phone` int(11) NOT NULL COMMENT '手机号码',
  `location` text NOT NULL COMMENT '地址',
  `reputation` int(11) NOT NULL COMMENT '信誉额度',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='所有送货员名单' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
