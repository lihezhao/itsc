-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-09 11:33:16
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
  `apertureFNumber` int(11) NOT NULL COMMENT '快门光圈',
  `maxApertureValue` int(11) NOT NULL COMMENT '最大光圈值',
  `exposureTime` int(11) NOT NULL COMMENT '曝光时间',
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
-- 表的结构 `t_image`
--

CREATE TABLE `t_image` (
  `id` char(32) NOT NULL DEFAULT '',
  `path` varchar(512) NOT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_exif`
--
ALTER TABLE `t_exif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_image`
--
ALTER TABLE `t_image`
  ADD PRIMARY KEY (`id`);

--
-- 限制导出的表
--

--
-- 限制表 `t_exif`
--
ALTER TABLE `t_exif`
  ADD CONSTRAINT `t_exif_ibfk_1` FOREIGN KEY (`id`) REFERENCES `t_image` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
