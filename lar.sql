/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.53 : Database - lar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lar` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `lar`;

/*Table structure for table `blog_article` */

DROP TABLE IF EXISTS `blog_article`;

CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) DEFAULT NULL COMMENT '文章标题',
  `art_tag` varchar(100) DEFAULT NULL COMMENT '关键词',
  `art_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `art_thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `art_content` text COMMENT '内容',
  `art_time` int(11) DEFAULT NULL COMMENT '发布时间',
  `art_editor` varchar(50) DEFAULT NULL COMMENT '作者',
  `art_view` int(11) DEFAULT '0' COMMENT '查看次数',
  `cate_id` int(11) DEFAULT '0' COMMENT '分类id',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章';

/*Data for the table `blog_article` */

insert  into `blog_article`(`art_id`,`art_title`,`art_tag`,`art_description`,`art_thumb`,`art_content`,`art_time`,`art_editor`,`art_view`,`cate_id`) values (1,'2','4','5','/storage/app/uploads/2018-01-02-15-38-06-5a4b36de2c3e4.png','<p>6</p>',1514878866,'3',0,1),(2,'2','4','5','/storage/app/uploads/2018-01-02-15-38-45-5a4b3705dad46.png','<p>6</p>',1514878866,'3',0,1),(3,'标题','关键词','描述','/storage/app/uploads/2018-01-02-15-39-28-5a4b3730803fb.png','<p>这是文章的内容</p>',1514878866,'作者',0,1);

/*Table structure for table `blog_category` */

DROP TABLE IF EXISTS `blog_category`;

CREATE TABLE `blog_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `cate_title` varchar(255) DEFAULT NULL COMMENT '分类说明',
  `cate_keywords` varchar(255) DEFAULT NULL COMMENT '关键词描述',
  `cate_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `cate_view` int(10) DEFAULT '0' COMMENT '查看次数',
  `cate_order` tinyint(4) DEFAULT '0' COMMENT '排序',
  `cate_pid` int(11) DEFAULT '0' COMMENT '父类id',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='文章分类';

/*Data for the table `blog_category` */

insert  into `blog_category`(`cate_id`,`cate_name`,`cate_title`,`cate_keywords`,`cate_description`,`cate_view`,`cate_order`,`cate_pid`) values (1,'新闻','搜集国内外最新资讯',NULL,NULL,0,1,0),(2,'体育','发展体育事业,增强国民体质',NULL,NULL,0,2,0),(16,'娱乐','最新娱乐新闻','','',0,3,0),(4,'热门新闻','最新新闻事件',NULL,NULL,0,2,1),(6,'体育彩票','国家体育总局体育彩票管理中心官方网站',NULL,NULL,0,3,2),(7,'腾讯体育','腾讯体育_腾讯网',NULL,NULL,0,1,2),(8,'新浪体育','新浪体育_新浪网','fxvsd','xczzx',0,2,2),(11,'体育播报','最新的体育信息','最新的体育信息','最新的体育信息',0,4,2),(14,'军事新闻','最新新闻事件','sadasd','xvccgfd',0,1,1);

/*Table structure for table `blog_doc` */

DROP TABLE IF EXISTS `blog_doc`;

CREATE TABLE `blog_doc` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `d_name` varchar(255) DEFAULT NULL COMMENT '文档名称',
  `d_path` varchar(255) DEFAULT NULL COMMENT '文档路径',
  `d_goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `blog_doc` */

/*Table structure for table `blog_goods` */

DROP TABLE IF EXISTS `blog_goods`;

CREATE TABLE `blog_goods` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `g_name` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `g_jian` text COMMENT '商品简介',
  `g_content` text COMMENT '商品内容',
  `g_quality` varchar(100) DEFAULT NULL COMMENT '保质期',
  `g_condition` varchar(50) DEFAULT NULL COMMENT '保存条件',
  `gp_id` int(11) DEFAULT NULL COMMENT '商品图片id',
  `g_createtime` varchar(20) DEFAULT NULL COMMENT '创建时间',
  `gc_id` int(11) DEFAULT NULL COMMENT '分类id',
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `blog_goods` */

insert  into `blog_goods`(`g_id`,`g_name`,`g_jian`,`g_content`,`g_quality`,`g_condition`,`gp_id`,`g_createtime`,`gc_id`) values (1,'艾斯德斯','萨达萨达',NULL,NULL,NULL,0,'1515999467',1),(2,'傻掉了静安','萨达撒出V型','<p>阿斯顿撒操行送东方闪电</p>',NULL,NULL,0,'1516073223',1),(3,'dasd ','sdadasd','<p>asdsad</p>',NULL,NULL,0,'1516073590',1),(4,'chvl啥打开了','sad现在才','<p>话费卡兰尼克李彩霞</p>',NULL,NULL,0,'1516073711',1);

/*Table structure for table `blog_goods_cate` */

DROP TABLE IF EXISTS `blog_goods_cate`;

CREATE TABLE `blog_goods_cate` (
  `gc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `gc_title` varchar(100) DEFAULT NULL COMMENT '商品分类名称',
  `gc_pid` int(11) DEFAULT NULL COMMENT '商品父类id',
  `gc_createtime` varchar(50) DEFAULT NULL COMMENT '创建时间',
  `gc_status` tinyint(4) DEFAULT NULL COMMENT '0显示 1不显示',
  `gc_order` tinyint(4) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`gc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `blog_goods_cate` */

insert  into `blog_goods_cate`(`gc_id`,`gc_title`,`gc_pid`,`gc_createtime`,`gc_status`,`gc_order`) values (1,'商品分类1',0,'1515986485',0,1),(2,'商品分类2',0,'1515986485',0,1),(7,'小分类1',1,'1515986485',0,1);

/*Table structure for table `blog_goods_photo` */

DROP TABLE IF EXISTS `blog_goods_photo`;

CREATE TABLE `blog_goods_photo` (
  `gp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id',
  `gp_photo` varchar(255) DEFAULT NULL COMMENT '原图',
  `gp_thum` varchar(255) DEFAULT NULL COMMENT '中图',
  `gp_small` varchar(255) DEFAULT NULL COMMENT '小图',
  `g_id` int(11) DEFAULT NULL COMMENT '商品id',
  `gp_createtime` varchar(30) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`gp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `blog_goods_photo` */

insert  into `blog_goods_photo`(`gp_id`,`gp_photo`,`gp_thum`,`gp_small`,`g_id`,`gp_createtime`) values (1,'/uploads/2018-01-18/20180118153640191.jpg','uploads/2018-01-18/thum_20180118153640191.jpg','uploads/2018-01-18/small_20180118153640191.jpg',1,'1516261000'),(2,'uploads/2018-01-18/20180118153640191.jpg','uploads/2018-01-18/thum_20180118153640191.jpg','uploads/2018-01-18/small_20180118153640191.jpg',1,'1516261000'),(3,'uploads/2018-01-18/20180118153640191.jpg','uploads/2018-01-18/thum_20180118153640191.jpg','uploads/2018-01-18/small_20180118153640191.jpg',1,'1516261000'),(4,'uploads/2018-01-18/20180118153640191.jpg','uploads/2018-01-18/thum_20180118153640191.jpg','uploads/2018-01-18/small_20180118153640191.jpg',1,'1516261000'),(5,'uploads/2018-01-19/20180119120926972.png','uploads/2018-01-18/thum_20180119120926972.png','uploads/2018-01-18/small_20180119120926972.png',2,'1516334967'),(6,'uploads/2018-01-19/20180119133106551.jpg','uploads/2018-01-18/thum_20180119133106551.jpg','uploads/2018-01-18/small_20180119133106551.jpg',2,'1516339866'),(7,'uploads/2018-01-19/20180119133106551.jpg','uploads/2018-01-18/thum_20180119133106551.jpg','uploads/2018-01-18/small_20180119133106551.jpg',2,'1516339866'),(8,'uploads/2018-01-19/20180119133106551.jpg','uploads/2018-01-18/thum_20180119133106551.jpg','uploads/2018-01-18/small_20180119133106551.jpg',2,'1516339866');

/*Table structure for table `blog_number` */

DROP TABLE IF EXISTS `blog_number`;

CREATE TABLE `blog_number` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '货号id',
  `n_number` varchar(50) DEFAULT NULL COMMENT '商品货号',
  `n_spec` varchar(20) DEFAULT NULL COMMENT '规格',
  `n_price` varchar(20) DEFAULT NULL COMMENT '商品参考价格',
  `n_case` int(11) DEFAULT '0' COMMENT '试剂盒id',
  `n_goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `blog_number` */

/*Table structure for table `blog_user` */

DROP TABLE IF EXISTS `blog_user`;

CREATE TABLE `blog_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `user_pass` varchar(255) DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

/*Data for the table `blog_user` */

insert  into `blog_user`(`user_id`,`user_name`,`user_pass`) values (1,'admin','eyJpdiI6IkZMaThQVzl1WUx6RnowblwvbVAwTVN3PT0iLCJ2YWx1ZSI6IjBIblNpakpHa05UNms2Z0h5cElYNnc9PSIsIm1hYyI6IjI3NDU4YmU1OTQxOGE5NjQxM2EwYzA0Yzk0YmVhZDAxYjg4MDI2NDkwN2NhNjA4MmU4M2E1ZGZjOWVkNWRkYjYifQ==');

/*Table structure for table `image` */

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id',
  `img_photo` varchar(255) DEFAULT NULL COMMENT '原图',
  `img_thum` varchar(255) DEFAULT NULL COMMENT '中图',
  `img_small` varchar(255) DEFAULT NULL COMMENT '小图',
  `g_id` int(11) DEFAULT NULL COMMENT '商品id',
  `img_create` varchar(30) DEFAULT NULL COMMENT '上传时间',
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `image` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
