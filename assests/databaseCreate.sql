CREATE DATABASE `titanic` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */
CREATE TABLE `titanic3` (
  `pclass` smallint DEFAULT NULL,
  `survived` smallint DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `age` double(7,4) DEFAULT NULL,
  `sibsp` smallint DEFAULT NULL,
  `parch` smallint DEFAULT NULL,
  `ticket` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fare` double(10,3) DEFAULT NULL,
  `cabin` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `embarked` varchar(4) DEFAULT NULL,
  `boat` varchar(10) DEFAULT NULL,
  `body` smallint DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8
