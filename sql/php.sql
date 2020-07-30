/*
Navicat MySQL Data Transfer

Source Server         : movie
Source Server Version : 50530
Source Host           : localhost:3306
Source Database       : php

Target Server Type    : MYSQL
Target Server Version : 50530
File Encoding         : 65001

Date: 2020-07-30 11:35:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for biaobai
-- ----------------------------
DROP TABLE IF EXISTS `biaobai`;
CREATE TABLE `biaobai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `user_img_t` varchar(255) DEFAULT NULL,
  `user_img_f` varchar(255) DEFAULT NULL,
  `up_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biaobai
-- ----------------------------
INSERT INTO `biaobai` VALUES ('1', '疯狂的等待', '我要陪你到老，不离不弃，永远爱你', './image/background02.jpg', null, '2019-11-25 03:02:12');
INSERT INTO `biaobai` VALUES ('2', '\r\n萌萌侵略者', '我……我喜欢你，我会一直一直陪着你，永远的，我会永远在你身后', './image/background02.jpg', null, '2019-11-26 06:41:28');
INSERT INTO `biaobai` VALUES ('5', '超出', '是我误会你，对不起 现在只能默默喜欢你', './image/background02.jpg', null, '2019-11-28 11:47:29');
INSERT INTO `biaobai` VALUES ('6', '江广源', '李鹭:我喜欢你很久了，每到晚上都会想起你的样子，梦见的那个我最喜欢的人！', './image/background02.jpg', null, '2019-12-02 06:14:46');
INSERT INTO `biaobai` VALUES ('7', '\r\n小肉灵', '我想你好久了，张可奕，自从小学毕业后我们分开了好久，没有你的日子里，我不再是我自己了，我忘记了什么是笑，我忘了，忘的干干净净！', './image/background02.jpg', null, '2019-11-20 14:17:59');
INSERT INTO `biaobai` VALUES ('8', '江广源', '江广源:我爱你你', './image/background02.jpg', null, '2019-12-03 02:00:45');

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `press` varchar(40) DEFAULT NULL,
  `publish` date DEFAULT NULL,
  `ISBN` varchar(50) DEFAULT NULL,
  `rush_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `pages` varchar(40) DEFAULT NULL,
  `synopsis` varchar(3000) DEFAULT NULL,
  `book_img` varchar(255) DEFAULT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`b_id`,`c_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `categry` FOREIGN KEY (`c_id`) REFERENCES `categry` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10012 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('10001', '刀剑神域', '川原砾', '电击文库', '2009-04-10', '214511', '38.00', '80.00', '500', '《刀剑神域》是由川原砾著作，abec负责插画，电击文库所属的轻小说，也是作者继《加速世界》后又一文库化的作品。繁体中文版由台湾角川发行，简体中文版由天闻角川发行，并授权爱奇艺轻小说、SF轻小说、咪咕阅读在其平台上发布电子版。', 'daojianshenyu01.jpg', '1');
INSERT INTO `book` VALUES ('10002', '盾之勇者成名录', 'Aneko Yusagi', '角川书店', '2013-08-23', '659329', '45.00', '75.00', '500', '《盾之勇者成名录》是网络小说家Aneko Yusagi著作，插画家弥南星罗负责插画的网络小说。\r\n作品最早是于“成为小说家吧”上连载的长篇网络小说，后由角川书店发行实体书。\r\n繁体中文版由东立出版社发行，简体中文版由天闻角川发行。', 'dunyun01.jpg', '1');
INSERT INTO `book` VALUES ('10003', '约会大作战', '橘公司', '富士见Fantasia文库', '2011-03-19', '982659', '78.00', '90.00', '600', '《约会大作战》是轻小说家橘公司著作，插画家Tsunako负责插画，富士见Fantasia文库所属的轻小说。\r\n繁体中文版由台湾角川发行，简体中文版由天闻角川发行，电子版由爱奇艺轻小说发布。', 'yuehuidazuozhan01.jpg', '1');
INSERT INTO `book` VALUES ('10004', '路人女主的养成方法', '丸户史明', '富士见书房', '2012-07-20', '784248', '50.00', '60.00', '400', '《路人女主的养成方法》是日本剧本作家丸户史明的首部轻小说著作、由插画家深崎暮人负责插图。单行本由日本的富士见书房出版发行，繁体中文版有中国台湾的台湾角川书店代理发行。该作品是缔造“贩售即完售”的话题作品，日本出版第一集时，仅仅出版四天便随即宣布紧急再版，且从第一刷（2012年7月）出版至同年11月已累计再版至第五刷的佳绩。日本出版第二集的同时，宣布本作在日本三本漫画杂志上连载漫画版。作品亦改编成同名电视动画。', 'lurennvzhu01.jpg', '1');
INSERT INTO `book` VALUES ('10005', '打工吧！魔王大人', '和原聪司', '电击文库', '2011-02-10', '134555', '56.00', '89.00', '500', '《打工吧！魔王大人》是日本轻小说家和原聪司著作，插画家029负责插画，电击文库所属的轻小说。\r\n作品是第17届“电击小说大奖”银奖获奖作，也是作者的出道作。当时的作品名为《魔王城は六畳一间!》，后来改名为《打工吧！魔王大人》出版。\r\n繁体中文版由台湾角川发行，简体中文版由天闻角川发行，并授权腾讯动漫在其平台上刊行电子版 [1]  ，韩文版由鹤山文化社发行。\r\n作品曾获得《这本轻小说真厉害！》2014年第6名的成绩。', 'dagongbamowangdaren01', '1');
INSERT INTO `book` VALUES ('10006', '我的妹妹哪有这么可爱！', '伏见司', '电击文库', '2008-08-10', '565435', '65.00', '87.00', '600', '《我的妹妹哪有这么可爱！》是日本轻小说家伏见司创作，插画家神崎广负责插画，电击文库所属的轻小说。官方日文简称《俺の妹》 [1]  或《俺妹》 [2]  ，中文简称《我妹》 [3]  、《我的妹妹》 [4]  或《俺妹》 [5]  。单行本累计发行超过500万部', 'wodemeimeibukenengnamakeai01', '1');
INSERT INTO `book` VALUES ('10007', '追寻生命的意义', '弗兰克尔', '新华出版社', '2003-08-01', '10位[7501162735] 13位[9787501162734]', '11.00', '12.00', '155', '《追寻生命的意义》是一个人面对巨大的苦难时，用来拯救自己的内在世界，同时也是一个关于每个人存在的价值和能者多劳们生存的社会所应担负职责的思考。本书对于每一个想要了解我们这个时代的人来说，都是一部必不可少的读物。这是一部令人鼓舞的杰作……他是一个不可思议的人，任何人都可以从他无比痛苦的经历中，获得拯救自己的经验……', 'e4dde71190ef76c6b7fdbeb19616fdfaaf516778.jpg', '3');
INSERT INTO `book` VALUES ('10008', '拖延心理学', '简·博克、莱诺拉·袁', '中国人民大学出版社', '2009-12-01', '9787300113906', '34.00', '39.80', '246', '从学生到科学家，从秘书到总裁，从家庭主妇到销售员，拖延的问题几乎会影响到每一个人。本书的两位作者基于他们备受好评和极具开创性的拖延工作坊和从众多心理咨询领域中汲取的丰富理论和经验，对拖延作了一次仔细、详尽、有时也颇为幽默的探索。\r\n通过鉴别和检查那些我们将事情推掉的背后原因——对失败、成功、控制、疏远和依附的恐惧，加上我们的时间概念问题和大脑的神经学因素——为我们学会怎样理解拖延的冲动以及怎样以全新方式采取行动做了一件非常扎实的基础工作。 [1] \r\n作者为我们提供了达成目标、管理时间、谋求支持和处理压力等一系列方案来克服拖延问题，她们提供的方案极为实用并经受过实践的检验。本书还考虑到工作和生活节奏不断加快的当代文化诉求，以及诸如注意力缺失紊乱症、执行功能障碍症等神经认知问题对拖延的影响。本书甚至还为生活和工作在拖延者身边的人群提供了不少实用性建议。', 'f703738da977391261e484d7fa198618377ae242.jpg', '3');
INSERT INTO `book` VALUES ('10009', '红楼梦', '曹雪芹等（有争议）', '人民文学出版社', '2008-07-01', '9787512029840', '39.80', '98.00', '1602', '《红楼梦》塑造了众多的人物形象，他们各自具有自己独特而鲜明的个性特征，成为不朽的艺术典型，在中国文学史和世界文学史上永远放射着奇光异彩。　　《红楼梦》是一部具有高度思想性和高度艺术性的伟大作品，从《红楼梦》反映的思想倾向来看，作者具有初步的民主主义思想，他对现实社会包括宫廷及官场的黑暗，封建贵族阶级及其家庭的腐朽，封建的科举制度、婚姻制度、奴婢制度、等级制度，以及与此相适应的社会统治思想即孔孟之道和程朱理学、社会道德观念等等，都进行了深刻的批判并且提出了朦胧的带有初步民主主义性质的理想和主张。这些理想和主张正是当时正在滋长的资本主义经济萌芽因素的曲折反映。', 'd01373f082025aaff3cec4b8f1edab64024f1ac0.jpg', '2');
INSERT INTO `book` VALUES ('10010', '三国演义', '罗贯中', '人民文学出版社', '2006-03-01', '9787020008728', '31.20', '39.50', '990', '《三国演义（套装上下册）》是罗贯中在民间传说和有关话本、戏曲的基础上改编而成的。作者通过集中描绘三国时代各封建统治集团之间的政治、军事、外交斗争，揭示了东汉末年社会的动荡和黑暗，谴责了封建统治者的暴虐，反映了民众的苦难和他们呼唤明君、呼唤安定的强烈愿望。 小说塑造了大量栩栩如生的人物，宽厚仁爱的刘备，残暴奸诈的曹操，一身正气的关羽，粗中有细的张飞，还有头戴纶巾、手摇羽扇的诸葛亮，以计谋见长的周瑜和司马懿。他们斗智斗勇的故事早已给人们留下了深刻的印象……', '622762d0f703918f79cb435b5b3d269759eec40d.jpg', '2');
INSERT INTO `book` VALUES ('10011', '贫穷的本质：我们为什么摆脱不了贫穷', '阿比吉特·巴纳吉', '中信出版集团 ', '2018-09-01', '9787508687216', '34.80', '58.00', '990', '重新理解贫穷，探究穷人之所以贫穷的根源。\r\n\r\n《金融时报》-高盛2011年度*佳商业图书，诺贝尔经济学奖得主罗伯特?默顿·索洛、阿马蒂亚?森、《魔鬼经济学》作者史蒂芬·列维特，\r\n\r\n《经济学人》《福布斯》《纽约时报》《金融时报》《华尔街日报》《卫报》《快公司》等\r\n\r\n推荐', '3b292df5e0fe99254c48c39d3ea85edf8cb171b3.jpg', '6');

-- ----------------------------
-- Table structure for categry
-- ----------------------------
DROP TABLE IF EXISTS `categry`;
CREATE TABLE `categry` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `categry` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categry
-- ----------------------------
INSERT INTO `categry` VALUES ('1', '轻小说');
INSERT INTO `categry` VALUES ('2', '小说');
INSERT INTO `categry` VALUES ('3', '文学');
INSERT INTO `categry` VALUES ('4', '传记');
INSERT INTO `categry` VALUES ('5', '艺术');
INSERT INTO `categry` VALUES ('6', '经济');
INSERT INTO `categry` VALUES ('7', '管理');
INSERT INTO `categry` VALUES ('8', '生活');

-- ----------------------------
-- Table structure for huifu
-- ----------------------------
DROP TABLE IF EXISTS `huifu`;
CREATE TABLE `huifu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `h_content` varchar(255) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL,
  `user_img_t` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of huifu
-- ----------------------------
INSERT INTO `huifu` VALUES ('1', 'we', '1111', '1', './image/background02.jpg');
INSERT INTO `huifu` VALUES ('2', 'we', '11111', '2', './image/background02.jpg');
INSERT INTO `huifu` VALUES ('3', '江广源', 'kkkk', '1', './image/background02.jpg');
INSERT INTO `huifu` VALUES ('4', '江广源', 'sss\n', '1', './image/background02.jpg');
INSERT INTO `huifu` VALUES ('5', '江广源', '杀杀杀', '8', './image/background02.jpg');

-- ----------------------------
-- Table structure for shopcar
-- ----------------------------
DROP TABLE IF EXISTS `shopcar`;
CREATE TABLE `shopcar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `s_img` varchar(255) DEFAULT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `s_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopcar
-- ----------------------------
INSERT INTO `shopcar` VALUES ('3', '4', 'wodemeimeibukenengnamakeai01', '我的妹妹哪有这么可爱！', '65.00');
INSERT INTO `shopcar` VALUES ('4', '4', '3b292df5e0fe99254c48c39d3ea85edf8cb171b3.jpg', '贫穷的本质：我们为什么摆脱不了贫穷', '34.80');
INSERT INTO `shopcar` VALUES ('5', '4', 'd01373f082025aaff3cec4b8f1edab64024f1ac0.jpg', '红楼梦', '39.80');
INSERT INTO `shopcar` VALUES ('6', '4', 'dagongbamowangdaren01', '打工吧！魔王大人', '56.00');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `sex` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'we', '123', './image/background02.jpg', '男');
INSERT INTO `user` VALUES ('2', 'we1', '123', './image/background02.jpg', '女');
INSERT INTO `user` VALUES ('4', '江广源', 'll5201314', './image/background02.jpg', '男');
