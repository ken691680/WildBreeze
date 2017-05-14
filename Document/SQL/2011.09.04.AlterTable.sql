DROP TABLE epaper;

CREATE TABLE `epaper` (
  `ep01` varchar(17) NOT NULL DEFAULT '',
  `ep02` varchar(100) DEFAULT NULL,
  `ep03` longtext,
  `epc01` varchar(17) DEFAULT NULL,
  `ma01` varchar(200) DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  `ep04` varchar(300) DEFAULT NULL,
  `ep05` int(4) DEFAULT NULL,
  `ep06` int(4) DEFAULT NULL,
  PRIMARY KEY (`ep01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
CREATE TABLE `epaperclass` (
  `epc01` varchar(17) NOT NULL DEFAULT '',
  `epc02` varchar(50) DEFAULT NULL,
  `ma01` varchar(200) DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  PRIMARY KEY (`epc01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `epaperimportlist` (
  `eil01` varchar(17) NOT NULL DEFAULT '',
  `eil02` varchar(100) DEFAULT NULL,
  `eil03` varchar(100) DEFAULT NULL,
  `eil04` varchar(100) DEFAULT NULL,
  `eil05` varchar(300) DEFAULT NULL,
  `eil06` int(4) DEFAULT NULL,
  `eil07` int(4) DEFAULT NULL,
  `ma01` varchar(200) DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  PRIMARY KEY (`eil01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `epapersubscribe` (
  `me01` varchar(200) NOT NULL DEFAULT '',
  `epc01` varchar(17) NOT NULL DEFAULT '',
  `eps01` varchar(20) DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  PRIMARY KEY (`me01`,`epc01`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;