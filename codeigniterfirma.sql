/*
Navicat MySQL Data Transfer

Source Server         : Codeigniter
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : codeigniterfirma

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-02-01 21:12:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tblaboutus
-- ----------------------------
DROP TABLE IF EXISTS `tblaboutus`;
CREATE TABLE `tblaboutus` (
  `aboutUsID` int(11) NOT NULL AUTO_INCREMENT,
  `aboutUsImage` varchar(500) DEFAULT NULL,
  `aboutUsTitle` varchar(500) DEFAULT NULL,
  `aboutUsContent` text,
  `aboutUsStatus` tinyint(4) DEFAULT NULL,
  `aboutUsRank` int(11) DEFAULT '0',
  `aboutUsCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`aboutUsID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblaboutus
-- ----------------------------
INSERT INTO `tblaboutus` VALUES ('1', 'aboutUs/6002c618bfe32.jpg', 'Let’s Introduce Ourselvess', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo tellus pulvinar. Donec sodales tortor vitae leo bibendum tincidunt. Suspendisse posuere quam eget porta tempor. Cras tempor bibendum libero, non semper velit bibendum. Integer posuere augue eu feugiat congue.s</p>\r\n', '1', '0', '2020-12-26');

-- ----------------------------
-- Table structure for tbladmin
-- ----------------------------
DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE `tbladmin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(100) DEFAULT NULL,
  `adminImage` varchar(250) DEFAULT NULL,
  `adminMail` varchar(100) DEFAULT NULL,
  `adminPassword` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbladmin
-- ----------------------------
INSERT INTO `tbladmin` VALUES ('1', 'Erdem DOĞANAY', 'adminImages/5ffc2d8971779.PNG', 'erdemdoganayiletisim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for tblalbums
-- ----------------------------
DROP TABLE IF EXISTS `tblalbums`;
CREATE TABLE `tblalbums` (
  `albumsID` int(11) NOT NULL AUTO_INCREMENT,
  `albumsImage` varchar(500) DEFAULT NULL,
  `albumsTitle` varchar(250) DEFAULT NULL,
  `albumsStatus` tinyint(4) DEFAULT NULL,
  `albumsRank` int(11) DEFAULT '0',
  `albumsCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`albumsID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblalbums
-- ----------------------------
INSERT INTO `tblalbums` VALUES ('1', 'albums/5fe9e3c9e7e99.png', 'Gökhan Eroll', '1', '0', '2020-12-28');
INSERT INTO `tblalbums` VALUES ('3', 'albums/5feb2818bdb30.png', 'Gökhan Erol', '1', '1', '2020-12-29');

-- ----------------------------
-- Table structure for tblalbumsphotos
-- ----------------------------
DROP TABLE IF EXISTS `tblalbumsphotos`;
CREATE TABLE `tblalbumsphotos` (
  `albumsPhotosID` int(11) NOT NULL AUTO_INCREMENT,
  `albumsPhotosImage` varchar(500) DEFAULT NULL,
  `albumsPhotosStatus` tinyint(4) DEFAULT NULL,
  `albumsPhotosRank` int(11) DEFAULT '0',
  `albumsPhotosCreatedAt` date DEFAULT NULL,
  `albumsID` int(11) DEFAULT NULL,
  PRIMARY KEY (`albumsPhotosID`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblalbumsphotos
-- ----------------------------
INSERT INTO `tblalbumsphotos` VALUES ('133', 'albumsPhotos/6006e9dd47567.PNG', '1', '0', '2021-01-19', '3');
INSERT INTO `tblalbumsphotos` VALUES ('132', 'albumsPhotos/5fef210c66c7b.png', '1', '2', '2021-01-01', '1');
INSERT INTO `tblalbumsphotos` VALUES ('131', 'albumsPhotos/5fef210b335a9.png', '1', '1', '2021-01-01', '1');
INSERT INTO `tblalbumsphotos` VALUES ('130', 'albumsPhotos/5fef1fe56e4d4.png', '1', '0', '2021-01-01', '1');

-- ----------------------------
-- Table structure for tblbrands
-- ----------------------------
DROP TABLE IF EXISTS `tblbrands`;
CREATE TABLE `tblbrands` (
  `brandsID` int(11) NOT NULL AUTO_INCREMENT,
  `brandsImage` varchar(500) DEFAULT NULL,
  `brandsTitle` varchar(250) DEFAULT NULL,
  `brandsLink` varchar(500) DEFAULT NULL,
  `brandsStatus` tinyint(4) DEFAULT NULL,
  `brandsRank` int(11) DEFAULT '0',
  `brandsCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`brandsID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblbrands
-- ----------------------------
INSERT INTO `tblbrands` VALUES ('1', 'brands/60084674c372a.jpg', 'Referans Başlığıı', 'referance.comm', '1', '0', '2020-12-26');
INSERT INTO `tblbrands` VALUES ('2', 'brands/6008468030515.jpg', 'Referans Başlığı', 'referance.com', '1', '1', '2020-12-26');
INSERT INTO `tblbrands` VALUES ('6', 'brands/600846a88c5ad.jpg', 'Türksat', 'türksat.com', '1', '0', '2021-01-20');
INSERT INTO `tblbrands` VALUES ('5', 'brands/6008468e1fa19.png', 'Referans Başlığı', 'referance.com', '1', '2', '2021-01-01');

-- ----------------------------
-- Table structure for tblclientcomment
-- ----------------------------
DROP TABLE IF EXISTS `tblclientcomment`;
CREATE TABLE `tblclientcomment` (
  `clientCommentID` int(11) NOT NULL AUTO_INCREMENT,
  `clientCommentImage` varchar(500) DEFAULT NULL,
  `clientCommentName` varchar(500) DEFAULT NULL,
  `clientCommentContent` varchar(250) DEFAULT NULL,
  `clientCommentDegree` varchar(250) DEFAULT NULL,
  `clientCommentStatus` tinyint(4) DEFAULT NULL,
  `clientCommentRank` int(11) DEFAULT '0',
  `clientCommentCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`clientCommentID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblclientcomment
-- ----------------------------
INSERT INTO `tblclientcomment` VALUES ('1', 'clientComment/5fd50f0411b61.jpg', 'Erdem Doğanay', 'kjhgjg', 'Müdür', '1', '0', '2020-12-12');
INSERT INTO `tblclientcomment` VALUES ('2', 'clientComment/5fd50f55cb0b2.jpg', 'Erdem Doğanay', '<p>kkkk</p>\r\n', 'Müdür', '1', '1', '2020-12-12');
INSERT INTO `tblclientcomment` VALUES ('12', 'clientComment/5fe9bf610a760.png', 'Erdem Doğanay', '<p>kıkk</p>\r\n', 'Müdür', '1', '4', '2020-12-28');
INSERT INTO `tblclientcomment` VALUES ('8', 'clientComment/5fe7568b21bea.png', 'Erdem Doğanay', '<p>4215</p>\r\n', 'Müdür', '1', '2', '2020-12-26');
INSERT INTO `tblclientcomment` VALUES ('11', 'clientComment/5fe9bed1e1b66.png', 'Erdem Doğanay', '<p>4545</p>\r\n', 'Müdür', '1', '3', '2020-12-28');
INSERT INTO `tblclientcomment` VALUES ('7', 'clientComment/5fe756449cb18.png', 'Erdem Doğanay', '<p>32</p>\r\n', 'Müdür', '1', '1', '2020-12-26');

-- ----------------------------
-- Table structure for tblcounter
-- ----------------------------
DROP TABLE IF EXISTS `tblcounter`;
CREATE TABLE `tblcounter` (
  `counterID` int(11) NOT NULL AUTO_INCREMENT,
  `counterTitle` varchar(250) DEFAULT NULL,
  `counterIcon` varchar(250) DEFAULT NULL,
  `counterCount` int(11) DEFAULT NULL,
  `counterStatus` tinyint(4) DEFAULT NULL,
  `counterRank` int(11) DEFAULT NULL,
  `counterCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`counterID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcounter
-- ----------------------------
INSERT INTO `tblcounter` VALUES ('1', 'PROJECTS DONE', ' fa fa-desktop', '1000', '1', '1', '2021-01-01');
INSERT INTO `tblcounter` VALUES ('4', 'HAPPY CLIENTS', 'fa fa-smile-o', '2000', '1', '2', '2021-01-16');
INSERT INTO `tblcounter` VALUES ('5', 'EMPLOYEES', 'fa fa-users', '250', '1', '3', '2021-01-16');
INSERT INTO `tblcounter` VALUES ('6', 'AWARDS', 'fa fa-trophy', '3000', '1', '4', '2021-01-16');

-- ----------------------------
-- Table structure for tblfaq
-- ----------------------------
DROP TABLE IF EXISTS `tblfaq`;
CREATE TABLE `tblfaq` (
  `faqID` int(11) NOT NULL AUTO_INCREMENT,
  `faqTitle` varchar(250) DEFAULT NULL,
  `faqIcon` varchar(250) DEFAULT NULL,
  `faqContent` text,
  `faqStatus` tinyint(4) DEFAULT NULL,
  `faqRank` int(11) DEFAULT NULL,
  `faqCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`faqID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblfaq
-- ----------------------------
INSERT INTO `tblfaq` VALUES ('1', 'Fazla mı iyisiniz ?', 'fas fa-question-circle', '<p>Evet fazla iyiyiz</p>\r\n', '1', '0', '2020-12-28');
INSERT INTO `tblfaq` VALUES ('2', 'Neden fazla iyisiniz ?', 'fas fa-question-circle', '<p>&Ccedil;&uuml;nk&uuml; fazla iyiyiz</p>\r\n', '1', '1', '2020-12-28');
INSERT INTO `tblfaq` VALUES ('4', 'Sebebi Nedir', 'fas fa-question-circle', 'iyi olduğumuzdan kaynaklı', '1', '2', '2021-01-19');

-- ----------------------------
-- Table structure for tblmessages
-- ----------------------------
DROP TABLE IF EXISTS `tblmessages`;
CREATE TABLE `tblmessages` (
  `messagesID` int(11) NOT NULL AUTO_INCREMENT,
  `messagesName` varchar(250) DEFAULT NULL,
  `messagesSubject` varchar(250) DEFAULT NULL,
  `messagesContent` text,
  `messagesMail` varchar(250) DEFAULT NULL,
  `messagesPhone` varchar(11) DEFAULT NULL,
  `messagesStatus` tinyint(4) DEFAULT NULL,
  `messagesCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`messagesID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblmessages
-- ----------------------------
INSERT INTO `tblmessages` VALUES ('1', 'Erdem Doğanay', 'Panel Tasarımı', 'Panel tasarımı çok güzel oluyor.', 'erdemdoganay58@gmail.com', '05344983176', '0', '2021-01-07');
INSERT INTO `tblmessages` VALUES ('2', 'Erdem Doğanay', 'Tebrik Mesajı', 'harika yaaa emeğine sağlık', 'erdemdoganay58@gmail.com', '05426485842', '0', '2021-01-07');

-- ----------------------------
-- Table structure for tblmission
-- ----------------------------
DROP TABLE IF EXISTS `tblmission`;
CREATE TABLE `tblmission` (
  `missionID` int(11) NOT NULL AUTO_INCREMENT,
  `missionImage` varchar(500) DEFAULT NULL,
  `missionTitle` varchar(500) DEFAULT NULL,
  `missionContent` text,
  `missionStatus` tinyint(4) DEFAULT NULL,
  `missionRank` int(11) DEFAULT '0',
  `missionCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`missionID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblmission
-- ----------------------------
INSERT INTO `tblmission` VALUES ('1', 'mission/5fe7778636ab7.png', 'WHAT CLIENT SAYY', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo tellus pulvinar. Donec sodales tortor vitae leo bibendum tincidunt. Suspendisse posuere quam eget porta tempor. Cras tempor bibendum libero, non semper velit bibendum. Integer posuere augue eu feugiat congue.C</p>\r\n', '1', '0', '2020-12-26');

-- ----------------------------
-- Table structure for tblnews
-- ----------------------------
DROP TABLE IF EXISTS `tblnews`;
CREATE TABLE `tblnews` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `newsImage` varchar(500) DEFAULT NULL,
  `newsTitle` varchar(500) DEFAULT NULL,
  `newsContent` text,
  `newsSeoTags` varchar(500) DEFAULT NULL,
  `newsStatus` tinyint(4) DEFAULT NULL,
  `newsCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`newsID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblnews
-- ----------------------------
INSERT INTO `tblnews` VALUES ('4', 'news/5ff05690651b6.png', 'Gökhan Erol Bağlamacı', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Saz, akor ', '1', '2021-01-02');
INSERT INTO `tblnews` VALUES ('5', 'news/6007e69089a2a.png', 'Siyah Bg\'li Gökhan Erol', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Saz, akor', '1', '2021-01-20');
INSERT INTO `tblnews` VALUES ('6', 'news/60080c95c9281.jpg', 'Karanlık Wallpaper', '<p>Karanlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık WallpaperKaranlık Wallpaper</p>\r\n', 'wallpaper,bg,dark,black', '1', '2021-01-20');

-- ----------------------------
-- Table structure for tblpages
-- ----------------------------
DROP TABLE IF EXISTS `tblpages`;
CREATE TABLE `tblpages` (
  `pagesID` int(11) NOT NULL AUTO_INCREMENT,
  `pagesTitle` varchar(250) DEFAULT NULL,
  `pagesIcon` varchar(250) DEFAULT NULL,
  `pagesContent` text,
  `pagesStatus` tinyint(4) DEFAULT NULL,
  `pagesRank` int(11) DEFAULT NULL,
  `pagesCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`pagesID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblpages
-- ----------------------------
INSERT INTO `tblpages` VALUES ('1', 'Pages İnformation', '   fa fa-caret-right  ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a vulputate nulla. Aenean accumsan arcu id sem dapibus tincidunt vitae sed tortor. Vestibulum iaculis sem eget neque posuere, eget pulvinar tortor posuere. Praesent facilisis eget odio at dictum. Cras sit amet molestie erat, maximus accumsan velit. Phasellus rutrum, leo aliquam mattis pretium, dolor quam viverra quam, ac rhoncus erat felis eget nunc. In urna nulla, aliquam nec sem ac, lobortis porttitor mauris. Integer massa libero, elementum in volutpat at, dignissim sit amet nunc. Ut vitae dictum urna, id semper diam. Suspendisse ac vehicula orci. Vivamus congue dui ut iaculis condimentum. Integer pretium posuere nulla, sit amet scelerisque tellus condimentum sit amet. Curabitur sed dui quis nunc laoreet blandit sit amet et mauris. Quisque malesuada urna id metus aliquet rutrum.</p>\r\n\r\n<p>Duis finibus quis felis vel tincidunt. Aenean condimentum justo eu metus malesuada ornare. Donec mattis vel arcu sit amet venenatis. Donec porttitor consectetur sodales. Integer felis ante, luctus in blandit at, efficitur eget mauris. Fusce commodo ligula justo, non dictum risus suscipit eget. Quisque ut nulla vel mi blandit semper. Integer tincidunt turpis a dui eleifend, a molestie nulla tempus. Quisque quis libero posuere, dapibus nibh efficitur, semper ante. Curabitur tristique, neque non finibus dictum, arcu sapien euismod elit, et scelerisque ante urna et magna. Donec interdum tempor arcu, imperdiet iaculis nisi dictum in. Pellentesque pellentesque feugiat mi at scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum porta lectus, nec ornare lacus suscipit eu. Vivamus aliquet turpis eu odio sodales blandit.</p>\r\n\r\n<p>Aenean faucibus mattis odio, vitae laoreet magna convallis non. Nam finibus, mi ac rutrum aliquet, nunc nisi tristique dolor, id laoreet dolor dolor sit amet dolor. Vivamus nec molestie sem. Phasellus ac elit vel justo accumsan bibendum vitae convallis orci. In hac habitasse platea dictumst. Cras pharetra lacinia blandit. Aliquam nec posuere lorem. Pellentesque accumsan neque vel lacus condimentum, at sagittis est pellentesque. Curabitur eu massa quam. Suspendisse iaculis dapibus gravida. Pellentesque a sapien vitae nibh gravida porttitor.</p>\r\n\r\n<p>Pellentesque bibendum gravida justo, ac gravida quam imperdiet nec. Morbi sed enim nec dui cursus pulvinar venenatis nec enim. Etiam hendrerit rhoncus ullamcorper. Curabitur sollicitudin semper nibh, sed facilisis lectus cursus vitae. Pellentesque non aliquet dolor, at efficitur nisl. Proin vulputate nisi tortor, a tempor odio elementum eget. Nunc placerat efficitur massa, lacinia luctus nisl iaculis ut. Donec pellentesque blandit sodales.</p>\r\n\r\n<p>Integer sit amet fringilla est. Cras condimentum volutpat odio. Praesent aliquam purus ut cursus condimentum. Cras porta lectus vitae justo consequat, a placerat neque sagittis. Praesent faucibus et tellus in mollis. Sed congue felis est, vel rutrum quam imperdiet ac. Mauris finibus enim ut leo malesuada, maximus ultricies mi lobortis. Maecenas elementum, metus quis cursus ullamcorper, neque justo gravida purus, et pharetra nunc elit quis turpis. Nam dictum rhoncus est. Phasellus finibus scelerisque mauris a dictum. Donec semper ex non orci vehicula hendrerit. In at pellentesque sapien. Praesent lorem nulla, luctus sit amet mauris maximus, tincidunt ultrices velit. Nunc porta nisi sed tortor maximus, nec accumsan orci tempus. Morbi vel velit a orci condimentum interdum sit amet sit amet lorem. Donec pulvinar tellus non massa mollis, at tincidunt eros posuere.</p>\r\n\r\n<p>Aliquam at sapien euismod, consectetur ipsum eu, vestibulum sapien. Sed ut lacus ac libero tempor luctus vehicula eu eros. Sed id viverra lectus. Integer egestas, purus id convallis ultrices, velit eros facilisis elit, iaculis laoreet tellus enim posuere turpis. Mauris aliquam, purus sed faucibus euismod, velit justo pellentesque sem, sed efficitur enim lectus id purus. Fusce convallis consectetur dictum. In velit tortor, dapibus eget arcu sed, scelerisque faucibus ex. In eget lectus sed nibh convallis tempor sed ut orci.</p>\r\n\r\n<p>Duis at ligula placerat, lobortis elit nec, cursus ante. Ut tincidunt et purus vel bibendum. Sed porttitor egestas risus, at dapibus tortor pellentesque sit amet. Donec et porta turpis, eget fringilla nisl. Fusce mollis ligula vel efficitur eleifend. Mauris odio nulla, auctor et arcu sed, dapibus fermentum magna. Nam eget mauris pellentesque, tempor tellus vitae, fringilla turpis. Etiam eget ex volutpat, laoreet felis in, egestas risus. Donec luctus viverra ligula non iaculis. Pellentesque ornare volutpat hendrerit. Phasellus accumsan mattis molestie. Nullam gravida, ipsum et laoreet porta, purus arcu maximus lorem, non bibendum massa nisl quis sem. Proin purus justo, varius quis vestibulum sit amet, luctus scelerisque nibh.</p>\r\n\r\n<p>Proin iaculis aliquam turpis, vitae ullamcorper eros posuere quis. Quisque semper ornare tortor consequat elementum. Proin non sem laoreet, pharetra urna nec, rhoncus erat. Duis eu consequat nibh. Maecenas pulvinar tincidunt tortor, elementum volutpat justo consequat ut. Etiam ultricies tortor ex, vel tincidunt enim sollicitudin id. Sed arcu lorem, eleifend sit amet dolor at, congue euismod nibh. Nunc convallis risus nec leo maximus vulputate. Quisque sed viverra orci. Mauris eu sem quis dolor venenatis ornare a eget ligula. Proin posuere, justo nec pellentesque posuere, mi quam dignissim massa, ut lobortis nibh odio quis libero. Vestibulum tincidunt dui nec scelerisque varius.</p>\r\n\r\n<p>Curabitur in urna tortor. Nulla fermentum sit amet eros in consequat. Nunc est lectus, aliquam non venenatis ut, malesuada quis mauris. Sed vitae ligula eros. Phasellus vulputate nunc neque, finibus vehicula urna pulvinar in. Ut elementum sem id mi tincidunt cursus. Sed gravida erat eu turpis fringilla, at laoreet metus congue. Nunc at lacus tristique, tristique tellus quis, tristique mauris. Maecenas accumsan sit amet nibh quis ullamcorper. Curabitur at sem nec odio maximus tristique. Pellentesque volutpat rutrum lorem vel tristique. Donec vel maximus neque. Nulla in scelerisque dui. In hac habitasse platea dictumst.</p>\r\n\r\n<p>Proin imperdiet egestas lectus, quis tempor dolor tincidunt eu. Nunc vestibulum urna vitae consequat sagittis. Proin hendrerit tellus quis bibendum aliquet. Vivamus vitae neque ac dui convallis bibendum. Morbi vitae mi convallis, pretium tellus in, imperdiet massa. Cras faucibus justo in risus feugiat, ac dapibus nunc laoreet. Suspendisse dignissim mauris vitae mi scelerisque, quis suscipit lectus porta. Nullam molestie mattis nunc, a posuere lacus molestie eget. In leo libero, ultrices et magna eu, laoreet rhoncus massa. Praesent at risus ut lorem porttitor bibendum at vitae est. Vestibulum sit amet suscipit lacus. Vestibulum eros nunc, dapibus quis bibendum ac, pellentesque id orci. In a mi elementum, varius nulla in, rutrum lorem. Ut dapibus nisi nisi, ac convallis massa commodo ut.</p>\r\n\r\n<p>Ut euismod dolor id tincidunt facilisis. Donec eleifend, odio quis feugiat convallis, nisl arcu consectetur arcu, vitae varius quam nulla ut neque. Morbi at fermentum sem, ut scelerisque lacus. Quisque at nulla ac libero egestas pretium. Nullam id vulputate mauris. Nam ac nisi felis. Sed molestie dolor velit, ac tincidunt nulla elementum non.</p>\r\n\r\n<p>Ut tempus ligula nec turpis facilisis consectetur. Etiam et convallis risus, nec consequat sapien. Mauris eget fringilla ligula. Aliquam erat volutpat. Sed sodales diam odio, et iaculis arcu aliquet sit amet. Nulla sit amet aliquam nisl. Nunc quis mauris lectus. Donec ac nulla eget nulla euismod dictum. In hac habitasse platea dictumst. Quisque eget urna arcu. Cras risus risus, porttitor non urna id, molestie porta lacus. Pellentesque sit amet augue consectetur, fermentum enim a, sollicitudin dolor. Curabitur non facilisis eros.</p>\r\n\r\n<p>Nunc tortor arcu, ultricies ac elementum eu, venenatis ac massa. Nam laoreet nisi justo, faucibus interdum nunc dignissim lobortis. Donec sagittis interdum lectus, varius auctor felis auctor quis. Ut vehicula, leo vitae dapibus convallis, sem metus cursus quam, id pharetra arcu justo ut sapien. In massa nunc, vulputate vitae pulvinar ut, tincidunt quis libero. Nulla consequat luctus augue, ac lacinia erat. Sed a ex lacus. Vestibulum dictum facilisis maximus. Cras nec convallis sapien, nec faucibus urna. Nulla sit amet porta mauris. Cras eget auctor libero. Pellentesque in eleifend purus. Ut ullamcorper elit ex, quis consequat leo laoreet a.</p>\r\n\r\n<p>Nulla vel sagittis tortor. Nam sed eros bibendum, condimentum tellus ac, eleifend odio. Donec ut mauris pharetra nulla placerat feugiat. Aenean facilisis ligula id facilisis convallis. Ut ullamcorper lectus nibh. Etiam tempus dapibus metus vitae blandit. Duis sodales ante quis sem convallis, vitae dignissim elit mollis.</p>\r\n\r\n<p>In sit amet nunc porta, consectetur ante vitae, suscipit nunc. Ut a lacinia velit, at venenatis massa. Vestibulum ornare malesuada sapien sit amet posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam tristique, tortor sodales iaculis maximus, ipsum elit lobortis lacus, aliquam accumsan ante turpis quis nibh. Nulla blandit libero in purus vestibulum, vitae condimentum mi fringilla. Aliquam non dolor quis mi elementum placerat eu non ex. Nulla vitae scelerisque felis, ut tempor urna. Nam congue pulvinar urna, tincidunt sollicitudin felis feugiat ac.</p>\r\n', '1', '0', '2021-01-01');
INSERT INTO `tblpages` VALUES ('2', 'Tester Pages', '  fa fa-caret-right ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a vulputate nulla. Aenean accumsan arcu id sem dapibus tincidunt vitae sed tortor. Vestibulum iaculis sem eget neque posuere, eget pulvinar tortor posuere. Praesent facilisis eget odio at dictum. Cras sit amet molestie erat, maximus accumsan velit. Phasellus rutrum, leo aliquam mattis pretium, dolor quam viverra quam, ac rhoncus erat felis eget nunc. In urna nulla, aliquam nec sem ac, lobortis porttitor mauris. Integer massa libero, elementum in volutpat at, dignissim sit amet nunc. Ut vitae dictum urna, id semper diam. Suspendisse ac vehicula orci. Vivamus congue dui ut iaculis condimentum. Integer pretium posuere nulla, sit amet scelerisque tellus condimentum sit amet. Curabitur sed dui quis nunc laoreet blandit sit amet et mauris. Quisque malesuada urna id metus aliquet rutrum. Duis finibus quis felis vel tincidunt. Aenean condimentum justo eu metus malesuada ornare. Donec mattis vel arcu sit amet venenatis. Donec porttitor consectetur sodales. Integer felis ante, luctus in blandit at, efficitur eget mauris. Fusce commodo ligula justo, non dictum risus suscipit eget. Quisque ut nulla vel mi blandit semper. Integer tincidunt turpis a dui eleifend, a molestie nulla tempus. Quisque quis libero posuere, dapibus nibh efficitur, semper ante. Curabitur tristique, neque non finibus dictum, arcu sapien euismod elit, et scelerisque ante urna et magna. Donec interdum tempor arcu, imperdiet iaculis nisi dictum in. Pellentesque pellentesque feugiat mi at scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum porta lectus, nec ornare lacus suscipit eu. Vivamus aliquet turpis eu odio sodales blandit. Aenean faucibus mattis odio, vitae laoreet magna convallis non. Nam finibus, mi ac rutrum aliquet, nunc nisi tristique dolor, id laoreet dolor dolor sit amet dolor. Vivamus nec molestie sem. Phasellus ac elit vel justo accumsan bibendum vitae convallis orci. In hac habitasse platea dictumst. Cras pharetra lacinia blandit. Aliquam nec posuere lorem. Pellentesque accumsan neque vel lacus condimentum, at sagittis est pellentesque. Curabitur eu massa quam. Suspendisse iaculis dapibus gravida. Pellentesque a sapien vitae nibh gravida porttitor. Pellentesque bibendum gravida justo, ac gravida quam imperdiet nec. Morbi sed enim nec dui cursus pulvinar venenatis nec enim. Etiam hendrerit rhoncus ullamcorper. Curabitur sollicitudin semper nibh, sed facilisis lectus cursus vitae. Pellentesque non aliquet dolor, at efficitur nisl. Proin vulputate nisi tortor, a tempor odio elementum eget. Nunc placerat efficitur massa, lacinia luctus nisl iaculis ut. Donec pellentesque blandit sodales. Integer sit amet fringilla est. Cras condimentum volutpat odio. Praesent aliquam purus ut cursus condimentum. Cras porta lectus vitae justo consequat, a placerat neque sagittis. Praesent faucibus et tellus in mollis. Sed congue felis est, vel rutrum quam imperdiet ac. Mauris finibus enim ut leo malesuada, maximus ultricies mi lobortis. Maecenas elementum, metus quis cursus ullamcorper, neque justo gravida purus, et pharetra nunc elit quis turpis. Nam dictum rhoncus est. Phasellus finibus scelerisque mauris a dictum. Donec semper ex non orci vehicula hendrerit. In at pellentesque sapien. Praesent lorem nulla, luctus sit amet mauris maximus, tincidunt ultrices velit. Nunc porta nisi sed tortor maximus, nec accumsan orci tempus. Morbi vel velit a orci condimentum interdum sit amet sit amet lorem. Donec pulvinar tellus non massa mollis, at tincidunt eros posuere. Aliquam at sapien euismod, consectetur ipsum eu, vestibulum sapien. Sed ut lacus ac libero tempor luctus vehicula eu eros. Sed id viverra lectus. Integer egestas, purus id convallis ultrices, velit eros facilisis elit, iaculis laoreet tellus enim posuere turpis. Mauris aliquam, purus sed faucibus euismod, velit justo pellentesque sem, sed efficitur enim lectus id purus. Fusce convallis consectetur dictum. In velit tortor, dapibus eget arcu sed, scelerisque faucibus ex. In eget lectus sed nibh convallis tempor sed ut orci. Duis at ligula placerat, lobortis elit nec, cursus ante. Ut tincidunt et purus vel bibendum. Sed porttitor egestas risus, at dapibus tortor pellentesque sit amet. Donec et porta turpis, eget fringilla nisl. Fusce mollis ligula vel efficitur eleifend. Mauris odio nulla, auctor et arcu sed, dapibus fermentum magna. Nam eget mauris pellentesque, tempor tellus vitae, fringilla turpis. Etiam eget ex volutpat, laoreet felis in, egestas risus. Donec luctus viverra ligula non iaculis. Pellentesque ornare volutpat hendrerit. Phasellus accumsan mattis molestie. Nullam gravida, ipsum et laoreet porta, purus arcu maximus lorem, non bibendum massa nisl quis sem. Proin purus justo, varius quis vestibulum sit amet, luctus scelerisque nibh. Proin iaculis aliquam turpis, vitae ullamcorper eros posuere quis. Quisque semper ornare tortor consequat elementum. Proin non sem laoreet, pharetra urna nec, rhoncus erat. Duis eu consequat nibh. Maecenas pulvinar tincidunt tortor, elementum volutpat justo consequat ut. Etiam ultricies tortor ex, vel tincidunt enim sollicitudin id. Sed arcu lorem, eleifend sit amet dolor at, congue euismod nibh. Nunc convallis risus nec leo maximus vulputate. Quisque sed viverra orci. Mauris eu sem quis dolor venenatis ornare a eget ligula. Proin posuere, justo nec pellentesque posuere, mi quam dignissim massa, ut lobortis nibh odio quis libero. Vestibulum tincidunt dui nec scelerisque varius. Curabitur in urna tortor. Nulla fermentum sit amet eros in consequat. Nunc est lectus, aliquam non venenatis ut, malesuada quis mauris. Sed vitae ligula eros. Phasellus vulputate nunc neque, finibus vehicula urna pulvinar in. Ut elementum sem id mi tincidunt cursus. Sed gravida erat eu turpis fringilla, at laoreet metus congue. Nunc at lacus tristique, tristique tellus quis, tristique mauris. Maecenas accumsan sit amet nibh quis ullamcorper. Curabitur at sem nec odio maximus tristique. Pellentesque volutpat rutrum lorem vel tristique. Donec vel maximus neque. Nulla in scelerisque dui. In hac habitasse platea dictumst. Proin imperdiet egestas lectus, quis tempor dolor tincidunt eu. Nunc vestibulum urna vitae consequat sagittis. Proin hendrerit tellus quis bibendum aliquet. Vivamus vitae neque ac dui convallis bibendum. Morbi vitae mi convallis, pretium tellus in, imperdiet massa. Cras faucibus justo in risus feugiat, ac dapibus nunc laoreet. Suspendisse dignissim mauris vitae mi scelerisque, quis suscipit lectus porta. Nullam molestie mattis nunc, a posuere lacus molestie eget. In leo libero, ultrices et magna eu, laoreet rhoncus massa. Praesent at risus ut lorem porttitor bibendum at vitae est. Vestibulum sit amet suscipit lacus. Vestibulum eros nunc, dapibus quis bibendum ac, pellentesque id orci. In a mi elementum, varius nulla in, rutrum lorem. Ut dapibus nisi nisi, ac convallis massa commodo ut. Ut euismod dolor id tincidunt facilisis. Donec eleifend, odio quis feugiat convallis, nisl arcu consectetur arcu, vitae varius quam nulla ut neque. Morbi at fermentum sem, ut scelerisque lacus. Quisque at nulla ac libero egestas pretium. Nullam id vulputate mauris. Nam ac nisi felis. Sed molestie dolor velit, ac tincidunt nulla elementum non. Ut tempus ligula nec turpis facilisis consectetur. Etiam et convallis risus, nec consequat sapien. Mauris eget fringilla ligula. Aliquam erat volutpat. Sed sodales diam odio, et iaculis arcu aliquet sit amet. Nulla sit amet aliquam nisl. Nunc quis mauris lectus. Donec ac nulla eget nulla euismod dictum. In hac habitasse platea dictumst. Quisque eget urna arcu. Cras risus risus, porttitor non urna id, molestie porta lacus. Pellentesque sit amet augue consectetur, fermentum enim a, sollicitudin dolor. Curabitur non facilisis eros. Nunc tortor arcu, ultricies ac elementum eu, venenatis ac massa. Nam laoreet nisi justo, faucibus interdum nunc dignissim lobortis. Donec sagittis interdum lectus, varius auctor felis auctor quis. Ut vehicula, leo vitae dapibus convallis, sem metus cursus quam, id pharetra arcu justo ut sapien. In massa nunc, vulputate vitae pulvinar ut, tincidunt quis libero. Nulla consequat luctus augue, ac lacinia erat. Sed a ex lacus. Vestibulum dictum facilisis maximus. Cras nec convallis sapien, nec faucibus urna. Nulla sit amet porta mauris. Cras eget auctor libero. Pellentesque in eleifend purus. Ut ullamcorper elit ex, quis consequat leo laoreet a. Nulla vel sagittis tortor. Nam sed eros bibendum, condimentum tellus ac, eleifend odio. Donec ut mauris pharetra nulla placerat feugiat. Aenean facilisis ligula id facilisis convallis. Ut ullamcorper lectus nibh. Etiam tempus dapibus metus vitae blandit. Duis sodales ante quis sem convallis, vitae dignissim elit mollis. In sit amet nunc porta, consectetur ante vitae, suscipit nunc. Ut a lacinia velit, at venenatis massa. Vestibulum ornare malesuada sapien sit amet posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam tristique, tortor sodales iaculis maximus, ipsum elit lobortis lacus, aliquam accumsan ante turpis quis nibh. Nulla blandit libero in purus vestibulum, vitae condimentum mi fringilla. Aliquam non dolor quis mi elementum placerat eu non ex. Nulla vitae scelerisque felis, ut tempor urna. Nam congue pulvinar urna, tincidunt sollicitudin felis feugiat ac.</p>\r\n', '1', '1', '2021-01-01');

-- ----------------------------
-- Table structure for tblproject
-- ----------------------------
DROP TABLE IF EXISTS `tblproject`;
CREATE TABLE `tblproject` (
  `projectID` int(11) NOT NULL AUTO_INCREMENT,
  `projectImage` varchar(500) DEFAULT NULL,
  `projectTitle` varchar(250) DEFAULT NULL,
  `projectLink` varchar(500) DEFAULT NULL,
  `projectStatus` tinyint(4) DEFAULT NULL,
  `projectRank` int(11) DEFAULT '0',
  `projectCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`projectID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblproject
-- ----------------------------
INSERT INTO `tblproject` VALUES ('8', 'project/600558a3aef95.jpg', 'Digitatek', 'www.digitatek.com', '1', '0', '2020-12-12');
INSERT INTO `tblproject` VALUES ('31', 'project/600558d31ca83.jpg', 'Digitatek', 'www.digitatek.com', '1', '1', '2020-12-16');
INSERT INTO `tblproject` VALUES ('32', 'project/60055916b339b.jpg', 'Digitatekk', 'www.digitatek.com', '1', '2', '2020-12-16');

-- ----------------------------
-- Table structure for tblservices
-- ----------------------------
DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE `tblservices` (
  `servicesID` int(11) NOT NULL AUTO_INCREMENT,
  `servicesTitle` varchar(250) DEFAULT NULL,
  `servicesIcon` varchar(250) DEFAULT NULL,
  `servicesContent` text,
  `servicesStatus` tinyint(4) DEFAULT NULL,
  `servicesRank` int(11) DEFAULT NULL,
  `servicesCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`servicesID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblservices
-- ----------------------------
INSERT INTO `tblservices` VALUES ('1', 'Financial Planning', 'fa fa-graduation-cap', '<p>Business Loan Our cross stage cunt be applications intended for iPhone, Blackberry, Android and so on run consistt</p>\r\n', '1', '0', '2020-12-28');
INSERT INTO `tblservices` VALUES ('2', 'Business Loan', 'fa fa-credit-card', '<p>Business Loan Our cross stage cunt be applications intended for iPhone, Blackberry, Android and so on run consist</p>\r\n', '1', '1', '2020-12-28');
INSERT INTO `tblservices` VALUES ('3', 'Retairement Planning', 'fa fa-subway', '<p>Business Loan Our cross stage cunt be applications intended for iPhone, Blackberry, Android and so on run consist</p>\r\n', '1', '2', '2020-12-28');
INSERT INTO `tblservices` VALUES ('4', 'Insurance Consulting', 'fa fa-archive', '<p>Business Loan Our cross stage cunt be applications intended for iPhone, Blackberry, Android and so on run consistt</p>\r\n', '1', '3', '2020-12-28');
INSERT INTO `tblservices` VALUES ('5', 'Taxes Planning', 'fa fa-rocket', '<p>Business Loan Our cross stage cunt be applications intended for iPhone, Blackberry, Android and so on run consist</p>\r\n', '1', '4', '2020-12-28');
INSERT INTO `tblservices` VALUES ('6', 'Mutual Funds', 'fa fa-universal-access', '<p>Business Loan Our cross stage cunt be applications intended for iPhone, Blackberry, Android and so on run consist</p>\r\n', '1', '5', '2020-12-28');

-- ----------------------------
-- Table structure for tblsettings
-- ----------------------------
DROP TABLE IF EXISTS `tblsettings`;
CREATE TABLE `tblsettings` (
  `siteID` int(11) NOT NULL,
  `siteTitle` varchar(1000) DEFAULT NULL,
  `siteDescription` text,
  `siteAuthor` varchar(255) DEFAULT NULL,
  `siteKeywords` text,
  `siteFooter` varchar(1000) DEFAULT NULL,
  `sitePhone` varchar(250) DEFAULT NULL,
  `siteAdress` text,
  `siteMaps` text,
  `siteSmtpHost` varchar(255) DEFAULT NULL,
  `siteSmtpUserMail` varchar(255) DEFAULT NULL,
  `siteSmtpUserPassword` varchar(255) DEFAULT NULL,
  `siteSmtpPort` varchar(255) DEFAULT NULL,
  `siteSmtpNotification` varchar(255) DEFAULT NULL,
  `siteLogo` varchar(255) DEFAULT NULL,
  `siteFavicon` varchar(255) DEFAULT NULL,
  `siteMail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`siteID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblsettings
-- ----------------------------
INSERT INTO `tblsettings` VALUES ('1', 'Admin Panel | Dashboard', 'Proje bazlı Codeigniter çalışması.', 'Erdem Doğanay', 'php, codeigniter', '© Copyright 2021. All Rights Reserved.', '05324985225', 'Ankara/Türkiye', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24484.645683757135!2d32.91498713955077!3d39.90601890000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d35049aeced9dd%3A0xdcf737f6a04d9125!2zRUdPIDMuIELDtmxnZSBNw7xkw7xybMO8xJ_DvA!5e0!3m2!1str!2str!4v1611148375181!5m2!1str!2str\" width=\"100%\" height=\"100%\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 'ssl://smtp.gmail.com', 'codeignitercompany@gmail.com', 'Erdem123123', '465', 'edoganay@digitatek.com', 'logoAndFavicon/600564fa16a3a.PNG', 'logoAndFavicon/5fc7800b204a0.svg', 'edoganay@digitatek.com');

-- ----------------------------
-- Table structure for tblslider
-- ----------------------------
DROP TABLE IF EXISTS `tblslider`;
CREATE TABLE `tblslider` (
  `sliderID` int(11) NOT NULL AUTO_INCREMENT,
  `sliderTitle` varchar(250) DEFAULT NULL,
  `sliderImage` varchar(500) DEFAULT NULL,
  `sliderContent` text,
  `sliderBtnLeft` varchar(500) DEFAULT NULL,
  `sliderBtnLeftLink` varchar(500) DEFAULT NULL,
  `sliderBtnRight` varchar(500) DEFAULT NULL,
  `sliderBtnRightLink` varchar(500) DEFAULT NULL,
  `sliderStatus` tinyint(4) DEFAULT NULL,
  `sliderRank` int(11) DEFAULT '0',
  `sliderCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`sliderID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblslider
-- ----------------------------
INSERT INTO `tblslider` VALUES ('1', 'GROW YOUR BUSINESS', 'sliders/6001f330a2d98.jpg', '<p>This heavier package contains plenty of plugins suitable for various different needss</p>\r\n', 'Erdemm', 'ErdemLinkk', 'Doğanayy', 'DoğanayLinkk', '1', '0', null);
INSERT INTO `tblslider` VALUES ('16', null, 'sliders/6001f34a2138a.jpg', '<p>654</p>\r\n', 'Erdem', 'ErdemLinkk', 'Doğanay', 'SagButtonAciklama', '1', '2', '2020-12-16');
INSERT INTO `tblslider` VALUES ('17', null, 'sliders/6001f359ee273.jpg', '<p>654</p>\r\n', 'Erdem', 'SolButtonAciklama', 'Doğanay', 'DoğanayLinkk', '1', '3', '2020-12-16');
INSERT INTO `tblslider` VALUES ('9', null, 'sliders/6001f33d8e3ea.jpg', '<p>849849</p>\r\n', 'Erdem', 'SolButtonAciklama', 'Doğanay', 'SagButtonAciklama', '1', '1', '2020-12-12');

-- ----------------------------
-- Table structure for tblsocial
-- ----------------------------
DROP TABLE IF EXISTS `tblsocial`;
CREATE TABLE `tblsocial` (
  `socialID` int(11) NOT NULL AUTO_INCREMENT,
  `socialTitle` varchar(250) DEFAULT NULL,
  `socialIcon` varchar(250) DEFAULT NULL,
  `socialLink` varchar(500) DEFAULT NULL,
  `socialStatus` tinyint(4) DEFAULT NULL,
  `socialCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`socialID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblsocial
-- ----------------------------
INSERT INTO `tblsocial` VALUES ('2', 'Facebook', 'fab fa-facebook', 'https://www.facebook.com', '1', '2020-12-02');
INSERT INTO `tblsocial` VALUES ('3', 'Twitter', 'fab fa-twitter', 'https://www.twitter.com', '1', '2020-12-02');
INSERT INTO `tblsocial` VALUES ('4', 'İnstagram', 'fab fa-instagram', 'https://www.instagram.com', '1', '2020-12-02');
INSERT INTO `tblsocial` VALUES ('5', 'Youtube', 'fab fa-youtube', 'https://www.youtube.com/watch=?17252416288165', '1', '2020-12-02');

-- ----------------------------
-- Table structure for tblsubscribers
-- ----------------------------
DROP TABLE IF EXISTS `tblsubscribers`;
CREATE TABLE `tblsubscribers` (
  `subscribersID` int(11) NOT NULL AUTO_INCREMENT,
  `subscribersMail` varchar(250) DEFAULT NULL,
  `subscribersStatus` tinyint(4) DEFAULT '0',
  `subscribersCreatedAt` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscribersID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblsubscribers
-- ----------------------------
INSERT INTO `tblsubscribers` VALUES ('1', 'erdemdoganay58@gmail.com', '0', '2021-01-02 20:07:06');
INSERT INTO `tblsubscribers` VALUES ('3', 'erdemdiletisim@gmail.com', '0', '2021-01-07 08:06:14');
INSERT INTO `tblsubscribers` VALUES ('4', 'haydariligece@gmail.com', '0', '2021-01-09 15:18:00');
INSERT INTO `tblsubscribers` VALUES ('6', 'deneme@gmail.com', '0', '2021-01-09 11:12:02');
INSERT INTO `tblsubscribers` VALUES ('7', 'test@gmail.com', '0', '2021-01-09 15:18:57');
INSERT INTO `tblsubscribers` VALUES ('9', 'test2@mgial.com', '0', '2021-01-09 15:20:30');
INSERT INTO `tblsubscribers` VALUES ('11', 'tster@gmail.com', '0', '2021-01-09 15:29:03');
INSERT INTO `tblsubscribers` VALUES ('12', 'ee@gmail.com', '0', '2021-01-18 15:06:54');
INSERT INTO `tblsubscribers` VALUES ('13', 'ee@gmail.com', '0', '2021-01-18 15:06:55');
INSERT INTO `tblsubscribers` VALUES ('14', 'edg@gmail.com', '0', '0000-00-00 00:00:00');
INSERT INTO `tblsubscribers` VALUES ('15', 'harikahaber@gmail.com', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tblteam
-- ----------------------------
DROP TABLE IF EXISTS `tblteam`;
CREATE TABLE `tblteam` (
  `teamID` int(11) NOT NULL AUTO_INCREMENT,
  `teamImage` varchar(500) DEFAULT NULL,
  `teamName` varchar(250) DEFAULT NULL,
  `teamTitle` varchar(250) DEFAULT NULL,
  `teamTwitter` varchar(250) DEFAULT NULL,
  `teamLinkedin` varchar(250) DEFAULT NULL,
  `teamGoogle` varchar(250) DEFAULT NULL,
  `teamFacebook` varchar(250) DEFAULT NULL,
  `teamDegree` varchar(250) DEFAULT NULL,
  `teamStatus` tinyint(4) DEFAULT NULL,
  `teamRank` int(11) DEFAULT '0',
  `teamCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`teamID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblteam
-- ----------------------------
INSERT INTO `tblteam` VALUES ('11', 'team/6002dc3d738a1.jpg', 'Harun Sinanoğlu', null, null, null, null, null, 'Çalışan', '1', '2', '2020-12-12');
INSERT INTO `tblteam` VALUES ('12', 'team/6002d9590e122.jpg', 'Halis Karataş', null, null, null, null, null, 'Müdür', '1', '1', '2020-12-12');
INSERT INTO `tblteam` VALUES ('13', 'team/6002d94865792.jpg', 'Sabri Çelik', null, 'www.twitter.com', 'www.linkedin.com', 'www.google.com', 'www.facebook.com', 'Müdür Yardımcısı', '1', '0', '2020-12-12');
INSERT INTO `tblteam` VALUES ('14', 'team/6002d9d55e911.jpg', 'Mücahit Sarı', null, null, null, null, null, 'Ticaret Müdürü', '1', '3', '2020-12-15');

-- ----------------------------
-- Table structure for tblvideos
-- ----------------------------
DROP TABLE IF EXISTS `tblvideos`;
CREATE TABLE `tblvideos` (
  `videosID` int(11) NOT NULL AUTO_INCREMENT,
  `videosLink` varchar(500) DEFAULT NULL,
  `videosTitle` varchar(250) DEFAULT NULL,
  `videosStatus` tinyint(4) DEFAULT NULL,
  `videosRank` int(11) DEFAULT '0',
  `videosCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`videosID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblvideos
-- ----------------------------
INSERT INTO `tblvideos` VALUES ('1', 'K189GsKqs9w', 'Kuzey Güney', '1', '0', '2021-01-01');
INSERT INTO `tblvideos` VALUES ('3', 'XqZsoesa55w', 'Baby Shark', '1', '1', '2021-01-01');
INSERT INTO `tblvideos` VALUES ('4', 'gd8z5Qv_sqc', 'Küçük Kırmızı Tavuk', '1', '2', '2021-01-19');

-- ----------------------------
-- Table structure for tblvision
-- ----------------------------
DROP TABLE IF EXISTS `tblvision`;
CREATE TABLE `tblvision` (
  `visionID` int(11) NOT NULL AUTO_INCREMENT,
  `visionImage` varchar(500) DEFAULT NULL,
  `visionTitle` varchar(500) DEFAULT NULL,
  `visionContent` text,
  `visionStatus` tinyint(4) DEFAULT NULL,
  `visionRank` int(11) DEFAULT '0',
  `visionCreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`visionID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblvision
-- ----------------------------
INSERT INTO `tblvision` VALUES ('1', 'vision/5fe778ffacd40.png', 'Let’s Introduce Ourselvess', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo tellus pulvinar. Donec sodales tortor vitae leo bibendum tincidunt. Suspendisse posuere quam eget porta tempor. Cras tempor bibendum libero, non semper velit bibendum. Integer posuere augue eu feugiat congue..</p>\r\n', '1', '0', '2020-12-26');
