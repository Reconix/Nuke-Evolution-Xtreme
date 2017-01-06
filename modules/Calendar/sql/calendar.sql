# $Id: calendar.sql,v 20.1 2004/01/05 22:43:49 EllselAn Exp $

# --------------------------------------------------------

#
# Table structure for table `mx_events`
#

CREATE TABLE `mx_events` (
  `eid` int(11) NOT NULL auto_increment,
  `aid` varchar(25) NOT NULL default '',
  `title` varchar(150) NOT NULL default '',
  `posteddate` datetime NOT NULL default '0000-00-00 00:00:00',
  `hometext` text,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(25) NOT NULL default '',
  `startDate` date NOT NULL default '0000-00-00',
  `endDate` date NOT NULL default '0000-00-00',
  `startTime` time default NULL,
  `endTime` time default NULL,
  `alldayevent` int(1) NOT NULL default '0',
  `categorie` char(2) default NULL,
  `activ` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`eid`),
  KEY `topic` (`topic`),
  KEY `categorie` (`categorie`),
  KEY `title` (`title`),
  KEY `activ` (`activ`),
  KEY `evbegin` (`startDate`,`startTime`),
  KEY `evtime` (`startTime`,`endTime`)
) TYPE=MyISAM PACK_KEYS=1;