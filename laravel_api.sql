# Host: localhost  (Version: 5.7.26)
# Date: 2020-12-22 09:33:11
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "activity"
#

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '负责人Id',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活动标题',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活动内容',
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活动地址',
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活动规则',
  `prize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活动奖品',
  `start` date DEFAULT NULL COMMENT '活动开始时间',
  `end` date DEFAULT NULL COMMENT '活动结束时间',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0-审核中，1-通过审核待上架（未开始），2-上架中,3-下架（已结束）,4-删除',
  `isRotation` int(11) NOT NULL DEFAULT '0' COMMENT '0-不展示,1-展示',
  `isInformation` int(11) NOT NULL DEFAULT '0' COMMENT '0-不展示,1-展示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "activity"
#

/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (1,4,'最美校园手绘-第二届卓越杯高校手绘大赛 ','题，提高艺术与设计类同学手绘专业素养，展现个人手绘魅力','天狮岭公园','活动期间注意安全/注意森林防火','作品出版书籍副主编+作品出版+','2020-11-11','2020-11-23',1,1,1,NULL,'2020-12-19 17:48:06'),(2,4,'计算机大赛','意安全，注意森林防火，与此同时，要注意毒虫等危险生物。活动优势：具有一定的挑战性及吸引力','活动中心','作品要单独完成/不准抄袭，一经发现，不授予比赛资格','留学奖金6000元','2020-11-11','2020-11-23',1,1,1,NULL,'2020-12-19 17:52:35'),(3,4,'计算机大赛','全国大学生【最美校园手绘大赛】，以“弘扬校园文化，展现手绘风采”为主','教学楼','作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','作品出版书籍副主编+作品出版+','2020-11-11','2020-11-23',1,1,1,NULL,'2020-12-19 17:52:36'),(4,4,'最美校园手绘-第二届卓越杯高校手绘大赛 ','同学们需完成短期野外生存考验，并且，定期到达目标地点，搭建帐篷，获取食材等主要任务。注意：活动期间注','天狮岭公园','作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','1000元现金','2020-11-11','2020-11-23',1,1,1,NULL,'2020-12-19 17:52:36'),(5,4,'环湖跑','照片或视频就可以，来记录校园内发生的你所见到的各种“事”，当然可以是美事、喜事、大事，以可以多人组队或个人参赛，如宿舍内拍的宿舍幽默小短片，个人生活中搞怪片段，温情感动的校园生活片段等等....','田径场','活动期间注意安全/注意森林防火','现金奖金3000元','2020-11-11','2020-11-23',1,1,1,NULL,'2020-12-19 17:52:37'),(6,4,'野外生存活动','照片或视频就可以，来记录校园内发生的你所见到的各种“事”，当然可以是美事、喜事、大事，以可以多人组队或个人参赛，如宿舍内拍的宿舍幽默小短片，个人生活中搞怪片段，温情感动的校园生活片段等等....','图书馆','活动期间注意安全/注意森林防火','证书+奖杯','2020-11-11','2020-11-23',1,1,1,NULL,'2020-12-19 17:52:38'),(7,4,'野外生存活动','题，提高艺术与设计类同学手绘专业素养，展现个人手绘魅力','活动中心','活动期间注意安全/注意森林防火','留学奖金6000元','2020-11-11','2020-11-23',1,1,1,NULL,'2020-12-19 17:52:39'),(8,4,'野外生存活动','同学们需完成短期野外生存考验，并且，定期到达目标地点，搭建帐篷，获取食材等主要任务。注意：活动期间注','图书馆','作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','1000元现金','2020-11-11','2020-11-23',1,1,0,NULL,'2020-12-19 17:52:42'),(9,4,'最美校园手绘-第二届卓越杯高校手绘大赛 ','题，提高艺术与设计类同学手绘专业素养，展现个人手绘魅力','校门口','作品要单独完成/不准抄袭，一经发现，不授予比赛资格','现金奖金2000元','2020-11-11','2020-11-23',1,0,0,NULL,'2020-12-19 17:52:43'),(10,4,'校园拍客大赛','照片或视频就可以，来记录校园内发生的你所见到的各种“事”，当然可以是美事、喜事、大事，以可以多人组队或个人参赛，如宿舍内拍的宿舍幽默小短片，个人生活中搞怪片段，温情感动的校园生活片段等等....','图书馆','作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','证书+奖杯','2020-11-11','2020-11-23',1,0,0,NULL,'2020-12-19 17:52:44'),(11,4,'最美校园手绘-第二届卓越杯高校手绘大赛 ','意安全，注意森林防火，与此同时，要注意毒虫等危险生物。活动优势：具有一定的挑战性及吸引力','教学楼','作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','留学奖金10000元','2020-11-11','2020-11-23',0,0,0,NULL,NULL),(12,4,'校园拍客大赛','照片或视频就可以，来记录校园内发生的你所见到的各种“事”，当然可以是美事、喜事、大事，以可以多人组队或个人参赛，如宿舍内拍的宿舍幽默小短片，个人生活中搞怪片段，温情感动的校园生活片段等等....','行政楼','作品要单独完成/不准抄袭，一经发现，不授予比赛资格','留学奖金10000元','2020-11-11','2020-11-23',0,0,0,NULL,NULL),(13,4,'环湖跑','同学们需完成短期野外生存考验，并且，定期到达目标地点，搭建帐篷，获取食材等主要任务。注意：活动期间注','教学楼','活动期间注意安全/注意森林防火','留学奖金10000元','2020-11-11','2020-11-23',0,0,0,NULL,NULL),(14,4,'野外生存活动','全国大学生【最美校园手绘大赛】，以“弘扬校园文化，展现手绘风采”为主','校门口','作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','留学奖金10000元','2020-11-11','2020-11-23',0,0,0,NULL,NULL),(15,4,'校园拍客大赛','同学们需完成短期野外生存考验，并且，定期到达目标地点，搭建帐篷，获取食材等主要任务。注意：活动期间注','教学楼','作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','留学奖金10000元','2020-11-11','2020-11-23',0,0,0,NULL,NULL),(16,4,'计算机大赛','意安全，注意森林防火，与此同时，要注意毒虫等危险生物。活动优势：具有一定的挑战性及吸引力','天狮岭公园','活动期间注意安全/注意森林防火','证书+奖杯','2020-11-11','2020-11-23',0,0,0,NULL,NULL),(17,4,'最美校园手绘-第二届卓越杯高校手绘大赛 ','意安全，注意森林防火，与此同时，要注意毒虫等危险生物。活动优势：具有一定的挑战性及吸引力','教学楼','活动期间注意安全/注意森林防火','留学奖金6000元','2020-11-11','2020-11-23',0,0,0,NULL,NULL),(18,3,'活动测试（一）','展会长期立足于中国重要的烧烤市场基地，深挖京津冀地域国内众多领军行业企业，包括各类烧烤经销商、BBQ 卖场、BC 类超市、连锁店、商场、酒店等；烧烤店等终端用户；各类连锁便利店负责人；各类餐饮设备食材进出口商；电子商务等新兴渠道商；相关生产企业；相关技术人员；各类生产配套及服务企业；行业组织；媒体等','学生活动中心','不准自带食物/不准随意乱跑/不准破环设备/','一等奖奖杯/二等奖奖杯/三等奖奖杯/','2020-12-20','2020-12-31',1,0,0,'2020-12-19 18:52:59','2020-12-19 18:56:57');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;

#
# Structure for table "activity_material"
#

DROP TABLE IF EXISTS `activity_material`;
CREATE TABLE `activity_material` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '负责人Id',
  `activity_id` int(11) NOT NULL COMMENT '活动Id',
  `material_id` int(11) NOT NULL COMMENT '物资id',
  `num` int(11) NOT NULL COMMENT '物资数量',
  `apply_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '租借状态,0-未审核，1-已发放，2-已归还',
  `operater` int(11) DEFAULT NULL COMMENT '操作者',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "activity_material"
#

/*!40000 ALTER TABLE `activity_material` DISABLE KEYS */;
INSERT INTO `activity_material` VALUES (1,4,1,1,1,0,NULL,NULL,NULL),(2,4,1,2,4,0,NULL,NULL,NULL),(3,4,1,3,1,0,NULL,NULL,NULL),(4,4,1,4,1,0,NULL,NULL,NULL),(5,4,1,5,1,0,NULL,NULL,NULL),(6,4,1,6,1,0,NULL,NULL,NULL),(7,4,1,7,10,0,NULL,NULL,NULL),(8,3,18,1,1,1,NULL,'2020-12-19 19:22:52','2020-12-19 20:16:26'),(9,3,18,2,1,1,NULL,'2020-12-19 19:23:00','2020-12-19 20:16:27'),(10,3,18,3,1,1,NULL,'2020-12-19 19:23:04','2020-12-19 20:16:29'),(11,3,18,5,1,1,NULL,'2020-12-19 19:23:08','2020-12-19 20:16:33');
/*!40000 ALTER TABLE `activity_material` ENABLE KEYS */;

#
# Structure for table "activity_type"
#

DROP TABLE IF EXISTS `activity_type`;
CREATE TABLE `activity_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活动类型名称',
  `ActivityCode` int(11) DEFAULT NULL COMMENT '活动类型代号',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "activity_type"
#

/*!40000 ALTER TABLE `activity_type` DISABLE KEYS */;
INSERT INTO `activity_type` VALUES (1,'体育类',100,NULL,NULL),(2,'文化类',200,NULL,NULL),(3,'创业类',300,NULL,NULL),(4,'学术类',400,NULL,NULL),(5,'科技类',500,NULL,NULL);
/*!40000 ALTER TABLE `activity_type` ENABLE KEYS */;

#
# Structure for table "activity_user"
#

DROP TABLE IF EXISTS `activity_user`;
CREATE TABLE `activity_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '参加者id',
  `activity_id` int(11) NOT NULL COMMENT '活动id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '参加者状态,false-未签到，true-已签到',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "activity_user"
#

/*!40000 ALTER TABLE `activity_user` DISABLE KEYS */;
INSERT INTO `activity_user` VALUES (1,1,1,1,NULL,NULL),(2,6,1,0,NULL,'2020-12-22 09:20:05'),(3,7,1,0,NULL,NULL),(4,8,1,0,NULL,NULL),(5,9,1,0,NULL,NULL),(6,1,2,0,'2020-12-21 19:52:14','2020-12-21 19:52:14'),(7,1,4,0,'2020-12-21 19:57:18','2020-12-21 19:57:18');
/*!40000 ALTER TABLE `activity_user` ENABLE KEYS */;

#
# Structure for table "dialogue"
#

DROP TABLE IF EXISTS `dialogue`;
CREATE TABLE `dialogue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `launch_id` int(11) NOT NULL COMMENT '发起者id',
  `target_id` int(11) NOT NULL COMMENT '接收者id',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-未读，1-已读',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "dialogue"
#

/*!40000 ALTER TABLE `dialogue` DISABLE KEYS */;
/*!40000 ALTER TABLE `dialogue` ENABLE KEYS */;

#
# Structure for table "email_info"
#

DROP TABLE IF EXISTS `email_info`;
CREATE TABLE `email_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `launch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '发起的邮箱',
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '目标的邮箱',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邮箱发送的题目',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT '邮箱发送内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "email_info"
#

/*!40000 ALTER TABLE `email_info` DISABLE KEYS */;
INSERT INTO `email_info` VALUES (1,1,'987896519@qq.com','987896519@qq.com','请同学赶紧参加活动','请同学赶紧参加活动','2020-12-21 14:11:13','2020-12-21 14:11:13'),(2,1,'987896519@qq.com','510728980@qq.com','最美校园手绘-第二届卓越杯高校手绘大赛开赛通知','同学你好，我们是最美校园手绘-第二届卓越杯高校手绘大赛主办方。现邀请你在本周六15:30在教学楼A2-203参加美校园手绘-第二届卓越杯高校手绘大赛','2020-12-21 14:27:09','2020-12-21 14:27:09'),(3,1,'987896519@qq.com','377415390@qq.com','最美校园手绘-第二届卓越杯高校手绘大赛开赛通知','同学你好，我们是最美校园手绘-第二届卓越杯高校手绘大赛主办方。现邀请你在本周六15:30在教学楼A2-203参加美校园手绘-第二届卓越杯高校手绘大赛','2020-12-21 14:27:10','2020-12-21 14:27:10'),(4,1,'987896519@qq.com','49630061@qq.com','最美校园手绘-第二届卓越杯高校手绘大赛开赛通知','同学你好，我们是最美校园手绘-第二届卓越杯高校手绘大赛主办方。现邀请你在本周六15:30在教学楼A2-203参加美校园手绘-第二届卓越杯高校手绘大赛','2020-12-21 14:27:10','2020-12-21 14:27:10'),(5,1,'987896519@qq.com','974994372@qq.com','最美校园手绘-第二届卓越杯高校手绘大赛开赛通知','同学你好，我们是最美校园手绘-第二届卓越杯高校手绘大赛主办方。现邀请你在本周六15:30在教学楼A2-203参加美校园手绘-第二届卓越杯高校手绘大赛','2020-12-21 14:27:11','2020-12-21 14:27:11'),(6,1,'987896519@qq.com','49630061@qq.com','开出','开除','2020-12-21 15:30:05','2020-12-21 15:30:05'),(7,1,'987896519@qq.com','974994372@qq.com','开出','开除','2020-12-21 15:30:05','2020-12-21 15:30:05'),(8,1,'987896519@qq.com','377415390@qq.com','开出','开除','2020-12-21 15:30:06','2020-12-21 15:30:06'),(9,1,'987896519@qq.com','2323702224@qq.com','开出','开除','2020-12-21 15:30:06','2020-12-21 15:30:06'),(10,1,'987896519@qq.com','510728980@qq.com','关于明天的社团会议','请各位社团负责于本周四下午2点30分到A3-202开会','2020-12-21 15:45:42','2020-12-21 15:45:42'),(11,1,'987896519@qq.com','49630061@qq.com','关于明天的社团会议','请各位社团负责于本周四下午2点30分到A3-202开会','2020-12-21 15:45:43','2020-12-21 15:45:43'),(12,1,'987896519@qq.com','974994372@qq.com','关于明天的社团会议','请各位社团负责于本周四下午2点30分到A3-202开会','2020-12-21 15:45:43','2020-12-21 15:45:43');
/*!40000 ALTER TABLE `email_info` ENABLE KEYS */;

#
# Structure for table "images"
#

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) DEFAULT NULL COMMENT '活动id',
  `type` tinyint(4) NOT NULL DEFAULT '2' COMMENT '类型,1-头像,2-活动',
  `OriginalName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '原文件名',
  `fileName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '文件名',
  `fileType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '文件类型',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '地址',
  `operter` int(11) NOT NULL COMMENT '操作者id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "images"
#

/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,5,2,'img_0','img_0','image/jpeg','/file/5.jpg',2,NULL,NULL),(2,8,2,'img_1','img_1','image/jpeg','/file/4.jpg',2,NULL,NULL),(3,6,2,'img_2','img_2','image/jpeg','/file/1.jpg',2,NULL,NULL),(4,1,2,'img_3','img_3','image/jpeg','/file/4.jpg',2,NULL,NULL),(5,3,2,'img_4','img_4','image/jpeg','/file/8.jpg',2,NULL,NULL),(6,2,2,'img_5','img_5','image/jpeg','/file/10.jpg',2,NULL,NULL),(7,9,2,'img_6','img_6','image/jpeg','/file/6.jpg',2,NULL,NULL),(8,8,2,'img_7','img_7','image/jpeg','/file/1.jpg',2,NULL,NULL),(9,4,2,'img_8','img_8','image/jpeg','/file/8.jpg',2,NULL,NULL),(10,8,2,'img_9','img_9','image/jpeg','/file/3.jpg',2,NULL,NULL),(11,2,2,'img_10','img_10','image/jpeg','/file/2.jpg',2,NULL,NULL),(12,5,2,'img_11','img_11','image/jpeg','/file/8.jpg',2,NULL,NULL),(13,10,2,'img_12','img_12','image/jpeg','/file/5.jpg',2,NULL,NULL),(14,1,2,'img_13','img_13','image/jpeg','/file/5.jpg',2,NULL,NULL),(15,3,2,'img_14','img_14','image/jpeg','/file/1.jpg',2,NULL,NULL),(16,8,2,'img_15','img_15','image/jpeg','/file/9.jpg',2,NULL,NULL),(17,7,2,'img_16','img_16','image/jpeg','/file/4.jpg',2,NULL,NULL),(18,2,2,'img_17','img_17','image/jpeg','/file/10.jpg',2,NULL,NULL),(19,6,2,'img_18','img_18','image/jpeg','/file/6.jpg',2,NULL,NULL),(20,2,2,'img_19','img_19','image/jpeg','/file/2.jpg',2,NULL,NULL),(21,5,2,'img_20','img_20','image/jpeg','/file/5.jpg',2,NULL,NULL),(22,1,2,'img_21','img_21','image/jpeg','/file/8.jpg',2,NULL,NULL),(23,5,2,'img_22','img_22','image/jpeg','/file/10.jpg',2,NULL,NULL),(24,2,2,'img_23','img_23','image/jpeg','/file/10.jpg',2,NULL,NULL),(25,6,2,'img_24','img_24','image/jpeg','/file/5.jpg',2,NULL,NULL),(26,2,2,'img_25','img_25','image/jpeg','/file/8.jpg',2,NULL,NULL),(27,2,2,'img_26','img_26','image/jpeg','/file/1.jpg',2,NULL,NULL),(28,7,2,'img_27','img_27','image/jpeg','/file/5.jpg',2,NULL,NULL),(29,10,2,'img_28','img_28','image/jpeg','/file/5.jpg',2,NULL,NULL),(30,7,2,'img_29','img_29','image/jpeg','/file/3.jpg',2,NULL,NULL),(31,3,2,'img_30','img_30','image/jpeg','/file/2.jpg',2,NULL,NULL),(32,1,2,'img_31','img_31','image/jpeg','/file/7.jpg',2,NULL,NULL),(33,8,2,'img_32','img_32','image/jpeg','/file/4.jpg',2,NULL,NULL),(34,5,2,'img_33','img_33','image/jpeg','/file/6.jpg',2,NULL,NULL),(35,7,2,'img_34','img_34','image/jpeg','/file/9.jpg',2,NULL,NULL),(36,3,2,'img_35','img_35','image/jpeg','/file/5.jpg',2,NULL,NULL),(37,8,2,'img_36','img_36','image/jpeg','/file/4.jpg',2,NULL,NULL),(38,1,2,'img_37','img_37','image/jpeg','/file/7.jpg',2,NULL,NULL),(39,10,2,'img_38','img_38','image/jpeg','/file/6.jpg',2,NULL,NULL),(40,2,2,'img_39','img_39','image/jpeg','/file/2.jpg',2,NULL,NULL),(41,18,2,'1.jpg','20201219-5fdddb771b850.jpg','image/jpeg','/file/20201219-5fdddb771b850.jpg',3,'2020-12-19 18:52:39','2020-12-19 18:52:59'),(42,18,2,'2.jpg','20201219-5fdddb79bbaa5.jpg','image/jpeg','/file/20201219-5fdddb79bbaa5.jpg',3,'2020-12-19 18:52:41','2020-12-19 18:52:59');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

#
# Structure for table "mailbox"
#

DROP TABLE IF EXISTS `mailbox`;
CREATE TABLE `mailbox` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mail_adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `authorizationCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '授权码',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mailbox_user_id_unique` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "mailbox"
#

/*!40000 ALTER TABLE `mailbox` DISABLE KEYS */;
INSERT INTO `mailbox` VALUES (1,'987896519@qq.com',1,'vajsccydudpobbbf','2020-12-21 13:57:01','2020-12-21 13:57:01');
/*!40000 ALTER TABLE `mailbox` ENABLE KEYS */;

#
# Structure for table "material"
#

DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '物资名称',
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '物资描述',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否需要归还,0-不需要，1-需要',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "material"
#

/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'大帐篷','一个很大的帐篷',0,NULL,NULL),(2,'BT纸','BT纸',0,NULL,NULL),(3,'剪刀','剪刀',0,NULL,NULL),(4,'桌子','桌子',0,NULL,NULL),(5,'红胶凳','红胶凳',0,NULL,NULL),(6,'小推车','小推车',0,NULL,NULL),(7,'气球','气球',0,NULL,NULL);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2020_11_11_015143_create_role_table',1),(3,'2020_11_11_015524_create_activity_table',1),(4,'2020_11_11_015538_create_role_user_table',1),(5,'2020_11_11_020121_create_mailbox_table',1),(6,'2020_11_11_020229_create_images_table',1),(7,'2020_11_11_020256_create_dialogue_table',1),(8,'2020_11_11_020335_create_activity_users_table',1),(9,'2020_11_11_024253_create_email_info_table',1),(10,'2020_11_21_162950_create_activity_type_table',1),(11,'2020_11_23_102811_create_material_table',1),(12,'2020_11_23_103815_create_activity_material_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

#
# Structure for table "role"
#

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '权限名称',
  `Role_Key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '权限值',
  `permissions` tinyint(4) NOT NULL DEFAULT '0' COMMENT '权限:1->管理员，2->老师，3->社团管理员,4->游客(活动报名)',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '权限描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "role"
#

/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'管理员','ADMIN',1,'拥有其他角色的所有权限',NULL,NULL),(2,'老师','TEACHER',2,'可以审核活动和群发邮件',NULL,NULL),(3,'社团负责人','COMMUNITY',3,'可以申请活动和编辑活动，群发邮件',NULL,NULL),(4,'学生','STUDENT',4,'可以浏览活动和参加活动',NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

#
# Structure for table "role_user"
#

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户Id',
  `role_id` int(11) NOT NULL COMMENT '权限Id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "role_user"
#

/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(4,4,4,NULL,NULL),(5,5,4,NULL,NULL),(6,6,4,NULL,NULL),(7,7,4,NULL,NULL),(8,8,4,NULL,NULL),(9,9,4,NULL,NULL),(10,10,4,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名称',
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `name` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '用户姓名',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '电话',
  `email` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '电子邮箱',
  `classNum` int(11) DEFAULT NULL COMMENT '年级',
  `academy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '学院',
  `major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '专业',
  `last_token` text COLLATE utf8mb4_unicode_ci COMMENT '登陆时的token',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户状态 -1代表已删除 0代表正常 1代表冻结',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$206ZavKdfBH3j6xDpOSycO40oHeULeER6ImZiLTzCT6DF8ewdf4gG','管理员',NULL,'987896519@qq.com',NULL,NULL,NULL,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC92MVwvam9pbi11c2VyXC9zaWduIiwiaWF0IjoxNjA4NTQ4NTk0LCJleHAiOjE2MDg2MzU4ODgsIm5iZiI6MTYwODU5OTg4OCwianRpIjoieFpkT2tmN282ajFDcUdtdiIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyIsImd1YXJkIjoiYXBpIn0.SsUM7duGtJl6VSJfp3QznZhRDikcQliNOs_mMlttePQ',0,NULL,'2020-12-22 09:18:08'),(2,'teacher','$2y$10$qgT0sdsrmfxuc45W6ChKveyEzHP.2BodG9w8OwWGJtuJQmAhuN9pK','老师',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(3,'student','$2y$10$6ZYETULVmNjC6mQUzC/0Suq8zsq7kL.cR7IRvdNcNRX.Vs05gCPsW','计算机协会',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2020-12-19 20:25:15'),(4,'community','$2y$10$dhY9IDlcr.8Xo.rftaPvNuIr75fQwyY52DHu2qJqOJbWzFTE1nu2y','社团管理员',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(5,'zhangsan','$2y$10$HpvT.mfZjiBKV4d.lf0XIuLgWWAVa3iZ03IeSAhYbjF2ofwBiQ0Mq','张三',NULL,'987896519@qq.com',2017,'计算机工程学院','软件工程',NULL,0,NULL,NULL),(6,'lisi','$2y$10$lPw.xwZjVO90sBCmgeLaUOA9bTsy43VlygbnkxEH16fXNrfsk39Ke','李四',NULL,'510728980@qq.com',2018,'电气工程学院','电气',NULL,0,NULL,NULL),(7,'wangwu','$2y$10$tm7Z3vJcZvEaWnUQUhvQuOCL7OPZb7TyFcx8L93TBrFZY.K.bcnFO','王五',NULL,'49630061@qq.com',2019,'汽车学院','汽修',NULL,0,NULL,NULL),(8,'liuliu','$2y$10$9fh5S489O1gki1aljgF5Zuihx3o1E4cpdSQQoIfpOzBLyiV0EXFXO','刘六',NULL,'974994372@qq.com',2020,'管理学院','会计',NULL,0,NULL,NULL),(9,'wangqi','$2y$10$rR25P7yspf3hYT9MVN9tku31Ln2cvSF3yRPn74J4aSsCAGhYLw6Hm','王七',NULL,'377415390@qq.com',2021,'计算机工程学院','软件工程',NULL,0,NULL,NULL),(10,'ruanba','$2y$10$68f7Lyu7vSyCi2WUGqg0puTcaG4D/ImRNEtMH77FsPfpTbvosFq0y','阮八',NULL,'2323702224@qq.com',2022,'管理学院','电子商务',NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
