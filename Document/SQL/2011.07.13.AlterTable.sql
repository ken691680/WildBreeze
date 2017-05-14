alter table `picnicspotmessage` add column `ps01` varchar(17) default NULL;

CREATE TABLE `websitebanner` (
	`wb01` varchar(17) NOT NULL default '',
	`wb02` varchar(50) default NULL,
	`wb03` varchar(100) default NULL,
	`wb04` varchar(300) default NULL,
	`wb05` datetime default NULL,
	`wb06` datetime default NULL,
	`wb07` varchar(50) default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`wb01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `websitebannercount` (
	`wbc01` varchar(17) default NULL,
	`wbc02` varchar(50) default NULL,
	`wbc03` varchar(200) default NULL,
  `lasttime` datetime default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `property` (
  `pr01` varchar(17) NOT NULL default '',
  `pr02` varchar(100) default NULL,
  `pr03` varchar(500) default NULL,
  `pr04` varchar(17) default NULL,
  `pr05` int(4) default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`pr01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `epaper` (
	`ep01` varchar(17) NOT NULL default '',
	`ep02` varchar(100) default NULL,
	`ep03` varchar(20) default NULL,
	`ep04` longtext default NULL,
	`ep05` varchar(200) default NULL,
	`ep06` varchar(20) default NULL,
	`ep07` varchar(200) default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`ep01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `datacode` (
	`dc01` varchar(17) NOT NULL default '',
	`dc02` varchar(200) default NULL,
	`dc03` varchar(50) default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`dc01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `productinfo` (
	`pi01` varchar(17) NOT NULL default '',
	`pi02` varchar(200) default NULL,
	`pi03` int(4) default NULL,
	`pi04` int(4) default NULL,
	`pi05` longtext default NULL,
	`pi06` varchar(10) default NULL,
	`pi07` varchar(10) default NULL,
	`pi08` datetime default NULL,
	`pi09` datetime default NULL,
	`pi10` varchar(200) default NULL,
	`pi11` varchar(200) default NULL,
	`pi12` varchar(200) default NULL,
	`pi13` varchar(200) default NULL,
	`pi14` varchar(200) default NULL,
	`pi15` longtext default NULL,
	`pi16` varchar(200) default NULL,
	`pi17` varchar(200) default NULL,
	`pi18` varchar(200) default NULL,
	`pi19` varchar(200) default NULL,
	`pi20` varchar(200) default NULL,
	`pi21` varchar(200) default NULL,
	`pi22` varchar(200) default NULL,
	`pi23` varchar(200) default NULL,
	`pi24` varchar(200) default NULL,
	`pi25` varchar(200) default NULL,
	`pi26` int(4) default NULL,
	`pi27` int(4) default NULL,
	`pr01` varchar(17) default NULL,
  `ma01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`pi01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orderdetailtemp` (
	`odt01` varchar(17) NOT NULL default '',
	`odt02` int(4) default NULL,
	`odt03` int(4) default NULL,
	`pi01` varchar(17) default NULL,
	`pi02` varchar(200) default NULL,
	`pi04` int(4) default NULL,
	`pi13` varchar(200) default NULL,
	`pi14` varchar(200) default NULL,
  `me01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`odt01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orderheader` (
	`oh01` varchar(17) NOT NULL default '',
	`oh02` varchar(20) default NULL,
	`oh03` datetime default NULL,
	`oh04` varchar(17) default NULL,
	`oh05` varchar(200) default NULL,
	`oh06` int(4) default NULL,
	`oh07` varchar(50) default NULL,
	`oh08` varchar(20) default NULL,
	`oh09` varchar(50) default NULL,
	`oh10` varchar(50) default NULL,
	`oh11` varchar(50) default NULL,
	`oh12` varchar(10) default NULL,
	`oh13` varchar(200) default NULL,
	`oh14` varchar(50) default NULL,
	`oh15` varchar(200) default NULL,
	`oh16` varchar(50) default NULL,
	`oh17` varchar(20) default NULL,
	`oh18` varchar(100) default NULL,
	`oh19` varchar(50) default NULL,
	`oh20` varchar(20) default NULL,
	`oh21` varchar(50) default NULL,
	`oh22` varchar(50) default NULL,
	`oh23` varchar(50) default NULL,
	`oh24` varchar(10) default NULL,
	`oh25` varchar(200) default NULL,
	`oh26` varchar(20) default NULL,
	`oh27` longtext default NULL,
  `me01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`oh01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orderdetail` (
	`od01` varchar(17) NOT NULL default '',
	`od02` int(4) default NULL,
	`od03` int(4) default NULL,
	`pi01` varchar(17) default NULL,
	`pi02` varchar(200) default NULL,
	`pi04` int(4) default NULL,
	`pi13` varchar(200) default NULL,
	`pi14` varchar(200) default NULL,
	`oh01` varchar(17) default NULL,
  `me01` varchar(200) default NULL,
  `lasttime` datetime default NULL,
  PRIMARY KEY  (`od01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `productinfocount` (
	`pic01` varchar(17) default NULL,
	`pic02` varchar(50) default NULL,
	`pic03` varchar(200) default NULL,
  `lasttime` datetime default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
