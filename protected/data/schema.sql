-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-01 11:51:28
-- 服务器版本： 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsc`
--

-- --------------------------------------------------------

--
-- 表的结构 `t_aperturefnumber`
--

CREATE TABLE `t_aperturefnumber` (
  `apertureFNumber` varchar(16) NOT NULL COMMENT '快门光圈',
  `count` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_comment`
--

CREATE TABLE `t_comment` (
  `id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `t_exif`
--

CREATE TABLE `t_exif` (
  `id` char(32) NOT NULL,
  `pathName` varchar(512) NOT NULL,
  `fileName` varchar(256) NOT NULL COMMENT '文件名',
  `fileType` int(11) NOT NULL COMMENT '文件类型',
  `mimeType` varchar(16) NOT NULL COMMENT '文件格式',
  `fileSize` int(11) NOT NULL COMMENT '文件大小',
  `fileDateTime` datetime NOT NULL COMMENT '时间戳',
  `imageDescription` varchar(1024) NOT NULL COMMENT '图片说明',
  `make` varchar(128) NOT NULL COMMENT '制造商',
  `model` varchar(128) NOT NULL COMMENT '型号',
  `orientation` int(11) NOT NULL COMMENT '方向',
  `xResolution` varchar(10) NOT NULL COMMENT '水平分辨率',
  `yResolution` varchar(10) NOT NULL COMMENT '垂直分辨率',
  `resolutionUnit` int(11) NOT NULL COMMENT 'Resolution Unit',
  `software` varchar(128) NOT NULL COMMENT '创建软件',
  `dateTime` datetime NOT NULL COMMENT '修改时间',
  `artist` varchar(128) NOT NULL COMMENT '作者',
  `ycbCrPositioning` int(11) NOT NULL COMMENT 'YCbCr位置控制',
  `copyright` varchar(128) NOT NULL COMMENT '版权',
  `copyrightPhotographer` varchar(128) NOT NULL COMMENT '摄影版权',
  `copyrightEditor` varchar(128) NOT NULL COMMENT '编辑版权',
  `exifVersion` varchar(10) NOT NULL COMMENT 'Exif版本',
  `flashPixVersion` int(11) NOT NULL COMMENT 'FlashPix版本',
  `dateTimeOriginal` datetime NOT NULL COMMENT '拍摄时间',
  `dateTimeDigitized` datetime NOT NULL COMMENT '数字化时间',
  `height` int(11) NOT NULL COMMENT '拍摄分辨率高',
  `width` int(11) NOT NULL COMMENT '拍摄分辨率宽',
  `apertureValue` int(11) NOT NULL COMMENT '光圈',
  `shutterSpeedValue` int(11) NOT NULL COMMENT '快门速度',
  `apertureFNumber` varchar(16) NOT NULL COMMENT '快门光圈',
  `maxApertureValue` int(11) NOT NULL COMMENT '最大光圈值',
  `exposureTime` varchar(8) NOT NULL COMMENT '曝光时间',
  `fNumber` int(11) NOT NULL COMMENT 'F-Number',
  `meteringMode` int(11) NOT NULL COMMENT '测光模式',
  `lightSource` int(11) NOT NULL COMMENT '光源',
  `flash` int(11) NOT NULL COMMENT '闪光灯',
  `exposureMode` int(11) NOT NULL COMMENT '曝光模式',
  `whiteBalance` int(11) NOT NULL COMMENT '白平衡',
  `exposureProgram` int(11) NOT NULL COMMENT '曝光程序',
  `exposureBiasValue` int(11) NOT NULL COMMENT '曝光补偿',
  `ISOSpeedRatings` int(11) NOT NULL COMMENT 'ISO感光度',
  `componentsConfiguration` int(11) NOT NULL COMMENT '分量配置',
  `compressedBitsPerPixel` int(11) NOT NULL COMMENT '图像压缩率',
  `focusDistance` int(11) NOT NULL COMMENT '对焦距离',
  `focalLength` int(11) NOT NULL COMMENT '焦距',
  `focalLengthIn35mmFilm` int(11) NOT NULL COMMENT '等价35mm焦距',
  `userCommentEncoding` int(11) NOT NULL COMMENT '用户注释编码',
  `userComment` varchar(512) NOT NULL COMMENT '用户注释',
  `colorSpace` int(11) NOT NULL COMMENT '色彩空间',
  `exifImageLength` int(11) NOT NULL COMMENT 'Exif图像宽度',
  `exifImageWidth` int(11) NOT NULL COMMENT 'Exif图像高度',
  `fileSource` int(11) NOT NULL COMMENT '文件来源',
  `sceneType` int(11) NOT NULL COMMENT '场景类型',
  `thumbnailFileType` int(11) NOT NULL COMMENT '缩略图文件格式',
  `thumbnailMimeType` int(11) NOT NULL COMMENT '缩略图Mime格式'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_exposuretime`
--

CREATE TABLE `t_exposuretime` (
  `exposureTime` varchar(8) NOT NULL COMMENT '曝光时间',
  `count` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_flash`
--

CREATE TABLE `t_flash` (
  `flash` int(11) NOT NULL COMMENT '闪光灯',
  `count` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_focallength`
--

CREATE TABLE `t_focallength` (
  `focalLength` int(11) NOT NULL COMMENT '焦距',
  `count` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_folder`
--

CREATE TABLE `t_folder` (
  `path` varchar(512) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_image`
--

CREATE TABLE `t_image` (
  `id` char(32) NOT NULL DEFAULT '',
  `path` varchar(512) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_isospeedratings`
--

CREATE TABLE `t_isospeedratings` (
  `ISOSpeedRatings` int(11) NOT NULL COMMENT 'ISO感光度',
  `count` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_lookup`
--

CREATE TABLE `t_lookup` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `t_make`
--

CREATE TABLE `t_make` (
  `make` varchar(128) NOT NULL COMMENT '制造商',
  `count` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_model`
--

CREATE TABLE `t_model` (
  `model` varchar(128) NOT NULL COMMENT '型号',
  `count` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_post`
--

CREATE TABLE `t_post` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `t_tag`
--

CREATE TABLE `t_tag` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE `t_user` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`);

--
-- Indexes for table `t_exif`
--
ALTER TABLE `t_exif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_folder`
--
ALTER TABLE `t_folder`
  ADD KEY `path` (`path`(255));

--
-- Indexes for table `t_image`
--
ALTER TABLE `t_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_lookup`
--
ALTER TABLE `t_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_post`
--
ALTER TABLE `t_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_author` (`author_id`);

--
-- Indexes for table `t_tag`
--
ALTER TABLE `t_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_lookup`
--
ALTER TABLE `t_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 限制导出的表
--

--
-- 限制表 `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `t_post` (`id`) ON DELETE CASCADE;

--
-- 限制表 `t_exif`
--
ALTER TABLE `t_exif`
  ADD CONSTRAINT `t_exif_ibfk_1` FOREIGN KEY (`id`) REFERENCES `t_image` (`id`);

--
-- 限制表 `t_post`
--
ALTER TABLE `t_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `t_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
