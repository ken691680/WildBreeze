CREATE TABLE `manage` (
  `ma01` varchar(200) NOT NULL default '',
  `ma02` varchar(20) default NULL,
  `ma03` varchar(50) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`ma01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `news` (
  `ne01` varchar(17) NOT NULL default '',
	`ne02` varchar(200) default NULL,
	`ne03` longtext	default NULL,
	`ne04` varchar(200) default NULL,
	`ne05` datetime	default NULL,
	`ne06` datetime	default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`ne01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `events` (
  `ev01` varchar(17) NOT NULL default '',
	`ev02` varchar(200) default NULL,
	`ev03` longtext	default NULL,
	`ev04` varchar(200) default NULL,
	`ev05` varchar(200) default NULL,
	`ev06` varchar(200) default NULL,
	`ev07` datetime	default NULL,
	`ev08` varchar(200) default NULL,
	`ev09` int(4) default NULL,
	`ev10` varchar(200) default NULL,
	`ev11` longtext	default NULL,
	`ev12` longtext	default NULL,
	`ev13` varchar(10) default NULL,
	`ev14` varchar(10) default NULL,
	`ev15` varchar(50) default NULL,
	`ev16` varchar(100) default NULL,
	`ev17` datetime	default NULL,
	`ev18` datetime	default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`ev01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `eventsregistration` (
  `er01` varchar(17) NOT NULL default '',
	`er02` varchar(50) default NULL,
	`er03` varchar(200) default NULL,
	`er04` varchar(50) default NULL,
	`er05` varchar(50) default NULL,
	`me01` varchar(200) default NULL,
  `ev01` varchar(17) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`er01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `picnicspot` (
  `ps01` varchar(17) NOT NULL default '',
	`ps02` varchar(200) default NULL,
	`ps03` longtext	default NULL,
	`ps04` varchar(200) default NULL,
	`ps05` varchar(200) default NULL,
	`ps06` varchar(200) default NULL,
	`ps07` varchar(200) default NULL,
	`ps08` varchar(200) default NULL,
	`ps09` varchar(200) default NULL,
	`ps10` varchar(200) default NULL,
	`ps11` varchar(200) default NULL,
	`ps12` varchar(200) default NULL,
	`ps13` varchar(200) default NULL,
	`ps14` varchar(200) default NULL,
	`ps15` varchar(200) default NULL,
	`ps16` varchar(200) default NULL,
	`ps17` varchar(200) default NULL,
	`ps18` varchar(200) default NULL,
	`ps19` varchar(200) default NULL,
	`ps20` varchar(200) default NULL,
	`ps21` varchar(200) default NULL,
	`ps22` varchar(200) default NULL,
	`ps23` varchar(200) default NULL,
	`ps24` int(4) default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`ps01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `member` (
  `me01` varchar(200) NOT NULL default '',
	`me02` varchar(50) default NULL,
	`me03` varchar(50) default NULL,
	`me04` varchar(20) default NULL,
	`me05` varchar(50) default NULL,
	`me06` varchar(50) default NULL,
	`me07` varchar(50) default NULL,
	`me08` varchar(10) default NULL,
	`me09` varchar(200) default NULL,
	`me10` varchar(10) default NULL,
  `jointime` datetime default NULL,
  PRIMARY KEY  (`me01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `picnicspotmessage` (
  `psm01` varchar(200) NOT NULL default '',
	`psm02` varchar(200) default NULL,
	`psm03` longtext default NULL,
	`psm04` varchar(10) default NULL,
	`me01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`psm01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `servicerecord` (
  `sr01` varchar(200) NOT NULL default '',
	`sr02` varchar(200) default NULL,
	`sr03` longtext default NULL,
	`sr04` varchar(10) default NULL,
	`sr05` varchar(100) default NULL,
	`sr06` varchar(200) default NULL,
	`sr07` varchar(50) default NULL,
	`me01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`sr01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `memberevaluate` (
  `mee01` varchar(17) NOT NULL default '',
	`mee02` varchar(200) default NULL,
	`mee03` longtext default NULL,
	`mee04` varchar(10) default NULL,
	`mee05` varchar(100) default NULL,
	`me01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`mee01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `newsview` (
	`nv01` varchar(200) DEFAULT NULL,
	`ne01` varchar(17) DEFAULT NULL,
	`lasttime` datetime DEFAULT NULL,
	KEY `nv01` (`nv01`),
	KEY `ne01` (`ne01`),
	KEY `lasttime` (`lasttime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `memberloginview` (
	`mlv01` varchar(200) DEFAULT NULL,
	`me01` varchar(200) DEFAULT NULL,
	`lasttime` datetime DEFAULT NULL,
	KEY `mlv01` (`mlv01`),
	KEY `me01` (`me01`),
	KEY `lasttime` (`lasttime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shoppingdescriptionclass` (
  `sdc01` varchar(17) NOT NULL default '',
	`sdc02` varchar(200) default NULL,
	`ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`sdc01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shoppingdescription` (
  `sd01` varchar(17) NOT NULL default '',
	`sd02` varchar(200) default NULL,
	`sd03` longtext default NULL,
	`sdc01` varchar(17) default NULL,
	`ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`sd01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `storelocations` (
  `sl01` varchar(17) NOT NULL default '',
	`sl02` varchar(200) default NULL,
	`sl03` longtext default NULL,
	`sl04` varchar(200) default NULL,
	`ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`sl01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

