-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2016 年 02 月 18 日 04:32
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `c++`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `example`
-- 

CREATE TABLE `example` (
  `id` int(11) NOT NULL,
  `what` varchar(100) NOT NULL,
  `code` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- 
-- 导出表中的数据 `example`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `instruction`
-- 

CREATE TABLE `instruction` (
  `menu_id` int(11) NOT NULL,
  `次序` tinyint(4) NOT NULL,
  `what` varchar(100) NOT NULL,
  `how` varchar(100) NOT NULL,
  `赞` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- 
-- 导出表中的数据 `instruction`
-- 

INSERT INTO `instruction` VALUES (1, 1, '终止程序，输出出错信息到standard error device', '', 0);
INSERT INTO `instruction` VALUES (2, 1, '在assert.h之前，使所有assert失效', '', 0);
INSERT INTO `instruction` VALUES (3, 1, '处理字符', '', 0);
INSERT INTO `instruction` VALUES (4, 1, '判断字符类别', 'images/c++/字符/字符分类/字符分类.png', 0);
INSERT INTO `instruction` VALUES (5, 1, '调试', '', 0);
INSERT INTO `instruction` VALUES (6, 1, '判断字符是否是字母或数字', '', 0);
INSERT INTO `instruction` VALUES (7, 1, '判断字符是否是字母', '', 0);
INSERT INTO `instruction` VALUES (8, 1, '判断字符是否是单词间的空白分隔符', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `menu`
-- 

CREATE TABLE `menu` (
  `id` int(11) NOT NULL auto_increment,
  `why` int(11) NOT NULL,
  `类别` varchar(20) NOT NULL,
  `when` varchar(20) character set utf8 collate utf8_unicode_ci default NULL,
  `where` varchar(30) character set utf8 collate utf8_unicode_ci default NULL,
  `who` varchar(30) character set utf8 collate utf8_unicode_ci default NULL,
  `修饰` varchar(30) character set utf8 collate utf8_unicode_ci default NULL,
  `继承` varchar(30) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`),
  KEY `who` (`who`),
  FULLTEXT KEY `who_2` (`who`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COMMENT='c++菜单(一级目录：why；根据类别和who建子目录)' AUTO_INCREMENT=9 ;

-- 
-- 导出表中的数据 `menu`
-- 

INSERT INTO `menu` VALUES (1, 5, '宏', NULL, 'assert.h', 'assert', NULL, NULL);
INSERT INTO `menu` VALUES (2, 5, '宏', NULL, NULL, 'NDEBUG', NULL, NULL);
INSERT INTO `menu` VALUES (3, 0, '目录', NULL, NULL, '字符', NULL, NULL);
INSERT INTO `menu` VALUES (4, 3, '目录', NULL, NULL, '字符分类', NULL, NULL);
INSERT INTO `menu` VALUES (5, 0, '目录', NULL, NULL, 'debug', NULL, NULL);
INSERT INTO `menu` VALUES (6, 4, '函数', NULL, 'ctype.h', 'isalnum', NULL, NULL);
INSERT INTO `menu` VALUES (7, 4, '函数', NULL, 'ctype.h', 'isalpha', NULL, NULL);
INSERT INTO `menu` VALUES (8, 4, '函数', NULL, 'ctype.h', 'isblank', NULL, NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `parameters`
-- 

CREATE TABLE `parameters` (
  `menu_id` int(11) NOT NULL,
  `重载号` tinyint(4) NOT NULL,
  `次序` tinyint(4) NOT NULL,
  `数据类型` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `parameter` varchar(30) character set utf8 collate utf8_unicode_ci default NULL,
  `修饰` varchar(20) character set utf8 collate utf8_unicode_ci default NULL,
  `输入/出` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 COMMENT='c++参数表(类别+who=菜单项)';

-- 
-- 导出表中的数据 `parameters`
-- 

INSERT INTO `parameters` VALUES (1, 0, 2, '', '_Expression', NULL, '输入');
INSERT INTO `parameters` VALUES (6, 0, 0, 'int', NULL, NULL, '输出');
INSERT INTO `parameters` VALUES (6, 0, 2, 'int', 'c', NULL, '输入');
INSERT INTO `parameters` VALUES (7, 0, 0, 'int', NULL, NULL, '输出');
INSERT INTO `parameters` VALUES (7, 0, 2, 'int', 'c', NULL, '输入');
INSERT INTO `parameters` VALUES (8, 0, 0, 'int', NULL, NULL, '输出');
INSERT INTO `parameters` VALUES (8, 0, 2, 'int', 'c', NULL, '输入');

-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `realName` varchar(10) NOT NULL,
  `IDCard` varchar(18) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `QQ` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `regTime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `grade` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- 
-- 导出表中的数据 `user`
-- 

