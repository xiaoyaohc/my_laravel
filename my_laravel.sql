/*
Navicat MySQL Data Transfer

Source Server         : 虚拟机(apache)
Source Server Version : 50548
Source Host           : 10.82.8.213:3306
Source Database       : my_laravel

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2018-04-26 17:55:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(20) NOT NULL COMMENT '类别名称',
  `category_no` int(11) DEFAULT NULL COMMENT '类别排序',
  `preview` varchar(100) DEFAULT NULL COMMENT '类别预览图',
  `parent_id` int(11) DEFAULT NULL COMMENT '父类别id',
  `created_at` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='类别表';

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `nickname` varchar(16) DEFAULT NULL COMMENT '昵称',
  `phone` varchar(20) NOT NULL COMMENT '手机号',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Table structure for pdt_content
-- ----------------------------
DROP TABLE IF EXISTS `pdt_content`;
CREATE TABLE `pdt_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `content` text COMMENT '详情内容',
  `product_id` int(11) DEFAULT NULL COMMENT '所属产品(外键)',
  `created_at` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品详情表';

-- ----------------------------
-- Table structure for pdt_images
-- ----------------------------
DROP TABLE IF EXISTS `pdt_images`;
CREATE TABLE `pdt_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `image_path` varchar(200) DEFAULT NULL COMMENT '图片地址',
  `image_no` int(11) DEFAULT NULL COMMENT '图片排列顺序',
  `product_id` int(11) DEFAULT NULL COMMENT '图片所属产品(外键)',
  `created_at` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品缩略图表';

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(20) DEFAULT NULL COMMENT '产品名称',
  `summary` varchar(200) DEFAULT NULL COMMENT '产品概述',
  `price` decimal(10,2) DEFAULT NULL COMMENT '产品价格',
  `preview` varchar(200) DEFAULT NULL COMMENT '产品预览图',
  `category_id` int(11) DEFAULT NULL COMMENT '所属类别(外键)',
  `created_at` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品表';

-- ----------------------------
-- Table structure for temp_phone
-- ----------------------------
DROP TABLE IF EXISTS `temp_phone`;
CREATE TABLE `temp_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `code` int(11) NOT NULL COMMENT '手机号验证码',
  `deadline` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '有效期',
  PRIMARY KEY (`id`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='手机发送验证码表';
