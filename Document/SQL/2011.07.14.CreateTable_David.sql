CREATE TABLE `brands` (
	`br01` varchar(17) NOT NULL default '',
	`br02` varchar(200) default NULL,
	`br03` varchar(200) default NULL,
	`br04` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`br01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
