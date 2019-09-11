SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `vcpu` varchar(255) DEFAULT NULL,
  `vhost` varchar(255) DEFAULT NULL,
  `vinfo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'luis', '4', '1', 'a');
INSERT INTO `users` VALUES ('2', 'renato', '2', '5', 'c');
INSERT INTO `users` VALUES ('3', 'jr', '8', '4', 'b');
SET FOREIGN_KEY_CHECKS=1;
