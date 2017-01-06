CREATE TABLE `nuke_authors` (
  `aid` varchar(25) NOT NULL default '',
  `name` varchar(50) default NULL,
  `url` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `pwd` varchar(40) default NULL,
  `counter` int(11) NOT NULL default '0',
  `radminsuper` tinyint(1) NOT NULL default '1',
  `admlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_authors`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_autonews`
--

CREATE TABLE `nuke_autonews` (
  `anid` int(10) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `aid` varchar(30) NOT NULL,
  `title` varchar(80) NOT NULL,
  `time` varchar(19) NOT NULL default '',
  `hometext` text NOT NULL,
  `bodytext` text NOT NULL,
  `topic` int(11) NOT NULL default '1',
  `informant` varchar(40) NOT NULL,
  `notes` text NOT NULL,
  `ihome` tinyint(4) NOT NULL default '0',
  `alanguage` varchar(30) NOT NULL,
  `acomm` tinyint(4) NOT NULL default '0',
  `associated` text NOT NULL,
  `ticon` tinyint(1) NOT NULL default '0',
  `writes` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`anid`),
  UNIQUE KEY `anid` (`anid`)
);

--
-- Dumping data for table `nuke_autonews`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_banner`
--

CREATE TABLE `nuke_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `alttext` varchar(255) NOT NULL default '',
  `date` datetime default NULL,
  `dateend` datetime default NULL,
  `position` int(10) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '1',
  `ad_class` varchar(5) NOT NULL default '',
  `ad_code` text NOT NULL,
  `ad_width` int(4) default '0',
  `ad_height` int(4) default '0',
  `type` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`bid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_banner_clients`
--

CREATE TABLE `nuke_banner_clients` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `contact` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `login` varchar(10) NOT NULL default '',
  `passwd` varchar(10) NOT NULL default '',
  `extrainfo` text NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_banner_clients`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_banner_plans`
--

CREATE TABLE `nuke_banner_plans` (
  `pid` int(10) NOT NULL auto_increment,
  `active` tinyint(1) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `delivery` varchar(10) NOT NULL default '',
  `delivery_type` varchar(25) NOT NULL default '',
  `price` varchar(25) NOT NULL default '0',
  `buy_links` text NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_banner_plans`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_banner_positions`
--

CREATE TABLE `nuke_banner_positions` (
  `apid` int(10) NOT NULL auto_increment,
  `position_number` int(5) NOT NULL default '0',
  `position_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`apid`),
  KEY `position_number` (`position_number`)
) ENGINE=MyISAM AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nuke_banner_positions`
--

INSERT INTO `nuke_banner_positions` VALUES(1, 0, 'Page Top');
INSERT INTO `nuke_banner_positions` VALUES(2, 1, 'Left Block');
INSERT INTO `nuke_banner_positions` VALUES(3, 2, 'Page Bottom');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_banner_terms`
--

CREATE TABLE `nuke_banner_terms` (
  `terms_body` text NOT NULL,
  `country` varchar(255) NOT NULL default ''
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_banner_terms`
--

INSERT INTO `nuke_banner_terms` VALUES('<div align="justify"><strong>Introduction:</strong> This Agreement between you and&nbsp;[sitename] consists of these Terms and Conditions. &quot;You&quot; or &quot;Advertiser&quot; means the entity identified in this enrollment form, and/or any agency acting on its behalf, which shall also be bound by the terms of this Agreement. Please read very carefully these Terms and Conditions.<br /><strong><br />Uses:</strong> You agree that your ads may be placed on (i) [sitename] web site and (ii) Any ads may be modified without your consent to comply with any policy of [sitename]. [sitename] reserves the right to, and in its sole discretion may, at any time review, reject, modify, or remove any ad. No liability of [sitename] and/or its owner(s) shall result from any such decision.<br /><br /></div><div align="justify"><strong>Parties'' Responsibilities:</strong> You are responsible of your own site and/or service advertised in [sitename] web site. You are solely responsible for the advertising image creation, advertising text and for the content of your ads, including URL links. [sitename] is not responsible for anything regarding your Web site(s) including, but not limited to, maintenance of your Web site(s), order entry, customer service, payment processing, shipping, cancellations or returns.<br /><br /></div><div align="justify"><strong>Impressions Count:</strong> Any hit to [sitename] web site is counted as an impression. Due to our advertising price we don''t discriminate from users or automated robots. Even if you access to [sitename] web site and see your own banner ad it will be counted as a valid impression. Only in the case of [sitename] web site administrator, the impressions will not be counted.<br /><br /></div><div align="justify"><strong>Termination, Cancellation:</strong> [sitename] may at any time, in its sole discretion, terminate the Campaign, terminate this Agreement, or cancel any ad(s) or your use of any Target. [sitename] will notify you via email of any such termination or cancellation, which shall be effective immediately. No refund will be made for any reason. Remaining impressions will be stored in a database and you''ll be able to request another campaign to complete your inventory. You may cancel any ad and/or terminate this Agreement with or without cause at any time. Termination of your account shall be effective when [sitename] receives your notice via email. No refund will be made for any reason. Remaining impressions will be stored in a database for future uses by you and/or your company.<br /><br /></div><div align="justify"><strong>Content:</strong> [sitename] web site doesn''t accepts advertising that contains: (i) pornography, (ii) explicit adult content, (iii) moral questionable content, (iv) illegal content of any kind, (v) illegal drugs promotion, (vi) racism, (vii) politics content, (viii) religious content, and/or (ix) fraudulent suspicious content. If your advertising and/or target web site has any of this content and you purchased an advertising package, you''ll not receive refund of any kind but your banners ads impressions will be stored for future use.<br /><br /></div><div align="justify"><strong>Confidentiality:</strong> Each party agrees not to disclose Confidential Information of the other party without prior written consent except as provided herein. &quot;Confidential Information&quot; includes (i) ads, prior to publication, (ii) submissions or modifications relating to any advertising campaign, (iii) clickthrough rates or other statistics (except in an aggregated form that includes no identifiable information about you), and (iv) any other information designated in writing as &quot;Confidential.&quot; It does not include information that has become publicly known through no breach by a party, or has been (i) independently developed without access to the other party''s Confidential Information; (ii) rightfully received from a third party; or (iii) required to be disclosed by law or by a governmental authority.<br /><br /></div><div align="justify"><strong>No Guarantee:</strong> [sitename] makes no guarantee regarding the levels of clicks for any ad on its site. [sitename] may offer the same Target to more than one advertiser. You may not receive exclusivity unless special private contract between [sitename] and you.<br /><br /></div><div align="justify"><strong>No Warranty:</strong> [sitename] MAKES NO WARRANTY, EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION WITH RESPECT TO ADVERTISING AND OTHER SERVICES, AND EXPRESSLY DISCLAIMS THE WARRANTIES OR CONDITIONS OF NONINFRINGEMENT, MERCHANTABILITY AND FITNESS FOR ANY PARTICULAR PURPOSE.<br /><br /></div><div align="justify"><strong>Limitations of Liability:</strong> In no event shall [sitename] be liable for any act or omission, or any event directly or indirectly resulting from any act or omission of Advertiser, Partner, or any third parties (if any). EXCEPT FOR THE PARTIES'' INDEMNIFICATION AND CONFIDENTIALITY OBLIGATIONS HEREUNDER, (i) IN NO EVENT SHALL EITHER PARTY BE LIABLE UNDER THIS AGREEMENT FOR ANY CONSEQUENTIAL, SPECIAL, INDIRECT, EXEMPLARY, PUNITIVE, OR OTHER DAMAGES WHETHER IN CONTRACT, TORT OR ANY OTHER LEGAL THEORY, EVEN IF SUCH PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES AND NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY AND (ii) [sitename] AGGREGATE LIABILITY TO ADVERTISER UNDER THIS AGREEMENT FOR ANY CLAIM IS LIMITED TO THE AMOUNT PAID TO [sitename] BY ADVERTISER FOR THE AD GIVING RISE TO THE CLAIM. Each party acknowledges that the other party has entered into this Agreement relying on the limitations of liability stated herein and that those limitations are an essential basis of the bargain between the parties. Without limiting the foregoing and except for payment obligations, neither party shall have any liability for any failure or delay resulting from any condition beyond the reasonable control of such party, including but not limited to governmental action or acts of terrorism, earthquake or other acts of God, labor conditions, and power failures.<br /><br /></div><div align="justify"><strong>Payment:</strong> You agree to pay in advance the cost of the advertising. [sitename] will not setup any banner ads campaign(s) unless the payment process is complete. [sitename] may change its pricing at any time without prior notice. If you have an advertising campaign running and/or impressions stored for future use for any mentioned cause and [sitename] changes its pricing, you''ll not need to pay any difference. Your purchased banners fee will remain the same. Charges shall be calculated solely based on records maintained by [sitename]. No other measurements or statistics of any kind shall be accepted by [sitename] or have any effect under this Agreement.<br /><br /></div><div align="justify"><strong>Representations and Warranties:</strong> You represent and warrant that (a) all of the information provided by you to [sitename] to enroll in the Advertising Campaign is correct and current; (b) you hold all rights to permit [sitename] and any Partner(s) to use, reproduce, display, transmit and distribute your ad(s); and (c) [sitename] and any Partner(s) Use, your Target(s), and any site(s) linked to, and products or services to which users are directed, will not, in any state or country where the ad is displayed (i) violate any criminal laws or third party rights giving rise to civil liability, including but not limited to trademark rights or rights relating to the performance of music; or (ii) encourage conduct that would violate any criminal or civil law. You further represent and warrant that any Web site linked to your ad(s) (i) complies with all laws and regulations in any state or country where the ad is displayed; (ii) does not breach and has not breached any duty toward or rights of any person or entity including, without limitation, rights of publicity or privacy, or rights or duties under consumer protection, product liability, tort, or contract theories; and (iii) is not false, misleading, defamatory, libelous, slanderous or threatening.<br /><br /></div><div align="justify"><strong>Your Obligation to Indemnify:</strong> You agree to indemnify, defend and hold [sitename], its agents, affiliates, subsidiaries, directors, officers, employees, and applicable third parties (e.g., all relevant Partner(s), licensors, licensees, consultants and contractors) (&quot;Indemnified Person(s)&quot;) harmless from and against any and all third party claims, liability, loss, and expense (including damage awards, settlement amounts, and reasonable legal fees), brought against any Indemnified Person(s), arising out of, related to or which may arise from your use of the Advertising Program, your Web site, and/or your breach of any term of this Agreement. Customer understands and agrees that each Partner, as defined herein, has the right to assert and enforce its rights under this Section directly on its own behalf as a third party beneficiary.<br /><br /></div><div align="justify"><strong>Information Rights:</strong> [sitename] may retain and use for its own purposes all information you provide, including but not limited to Targets, URLs, the content of ads, and contact and billing information. [sitename] may share this information about you with business partners and/or sponsors. [sitename] will not sell your information. Your name, web site''s URL and related graphics shall be used by [sitename] in its own web site at any time as a sample to the public, even if your Advertising Campaign has been finished.<br /><br /></div><div align="justify"><strong>Miscellaneous:</strong> Any decision made by [sitename] under this Agreement shall be final. [sitename] shall have no liability for any such decision. You will be responsible for all reasonable expenses (including attorneys'' fees) incurred by [sitename] in collecting unpaid amounts under this Agreement. This Agreement shall be governed by the laws of [country]. Any dispute or claim arising out of or in connection with this Agreement shall be adjudicated in [country]. This constitutes the entire agreement between the parties with respect to the subject matter hereof. Advertiser may not resell, assign, or transfer any of its rights hereunder. Any such attempt may result in termination of this Agreement, without liability to [sitename] and without any refund. The relationship(s) between [sitename] and the &quot;Partners&quot; is not one of a legal partnership relationship, but is one of independent contractors. This Agreement shall be construed as if both parties jointly wrote it.</div>', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbadvanced_username_color`
--

CREATE TABLE `nuke_bbadvanced_username_color` (
  `group_id` int(10) unsigned NOT NULL auto_increment,
  `group_name` varchar(255) NOT NULL default '',
  `group_color` varchar(6) NOT NULL default '',
  `group_weight` smallint(2) NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nuke_bbadvanced_username_color`
--

INSERT INTO `nuke_bbadvanced_username_color` VALUES(1, 'Administrators', 'FFA34F', 1);
INSERT INTO `nuke_bbadvanced_username_color` VALUES(2, 'Moderators', '006600', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbarcade`
--

CREATE TABLE `nuke_bbarcade` (
  `arcade_name` varchar(255) NOT NULL default '',
  `arcade_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`arcade_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbarcade`
--

INSERT INTO `nuke_bbarcade` VALUES('use_category_mod', '1');
INSERT INTO `nuke_bbarcade` VALUES('category_preview_games', '5');
INSERT INTO `nuke_bbarcade` VALUES('games_par_page', '15');
INSERT INTO `nuke_bbarcade` VALUES('game_order', 'Alpha');
INSERT INTO `nuke_bbarcade` VALUES('display_winner_avatar', '1');
INSERT INTO `nuke_bbarcade` VALUES('stat_par_page', '10');
INSERT INTO `nuke_bbarcade` VALUES('winner_avatar_position', 'left');
INSERT INTO `nuke_bbarcade` VALUES('maxsize_avatar', '200');
INSERT INTO `nuke_bbarcade` VALUES('linkcat_align', '2');
INSERT INTO `nuke_bbarcade` VALUES('limit_by_posts', '0');
INSERT INTO `nuke_bbarcade` VALUES('posts_needed', '5');
INSERT INTO `nuke_bbarcade` VALUES('days_limit', '5');
INSERT INTO `nuke_bbarcade` VALUES('limit_type', 'date');
INSERT INTO `nuke_bbarcade` VALUES('use_fav_category', '1');
INSERT INTO `nuke_bbarcade` VALUES('arcade_announcement', 'Welcome to the Arcade!<br />Enjoy!');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbarcade_categories`
--

CREATE TABLE `nuke_bbarcade_categories` (
  `arcade_catid` mediumint(8) unsigned NOT NULL auto_increment,
  `arcade_cattitle` varchar(100) NOT NULL default '',
  `arcade_nbelmt` mediumint(8) unsigned NOT NULL default '0',
  `arcade_catorder` mediumint(8) unsigned NOT NULL default '0',
  `arcade_catauth` tinyint(2) NOT NULL,
  KEY `arcade_catid` (`arcade_catid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_bbarcade_categories`
--

INSERT INTO `nuke_bbarcade_categories` VALUES(1, 'Arcade', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbarcade_comments`
--

CREATE TABLE `nuke_bbarcade_comments` (
  `game_id` mediumint(8) NOT NULL default '0',
  `comments_value` varchar(255) NOT NULL default ''
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbarcade_comments`
--

INSERT INTO `nuke_bbarcade_comments` VALUES(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbarcade_fav`
--

CREATE TABLE `nuke_bbarcade_fav` (
  `order` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `game_id` mediumint(8) NOT NULL default '0'
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbarcade_fav`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbattachments`
--

CREATE TABLE `nuke_bbattachments` (
  `attach_id` mediumint(8) unsigned NOT NULL default '0',
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `privmsgs_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id_1` mediumint(8) NOT NULL default '0',
  `user_id_2` mediumint(8) NOT NULL default '0',
  KEY `attach_id_post_id` (`attach_id`,`post_id`),
  KEY `attach_id_privmsgs_id` (`attach_id`,`privmsgs_id`),
  KEY `post_id` (`post_id`),
  KEY `privmsgs_id` (`privmsgs_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbattachments`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbattachments_config`
--

CREATE TABLE `nuke_bbattachments_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbattachments_config`
--

INSERT INTO `nuke_bbattachments_config` VALUES('upload_dir', 'modules/Forums/files');
INSERT INTO `nuke_bbattachments_config` VALUES('upload_img', 'modules/Forums/images/icon_clip.gif');
INSERT INTO `nuke_bbattachments_config` VALUES('topic_icon', 'modules/Forums/images/icon_clip.gif');
INSERT INTO `nuke_bbattachments_config` VALUES('display_order', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('max_filesize', '262144');
INSERT INTO `nuke_bbattachments_config` VALUES('attachment_quota', '52428800');
INSERT INTO `nuke_bbattachments_config` VALUES('max_filesize_pm', '262144');
INSERT INTO `nuke_bbattachments_config` VALUES('max_attachments', '3');
INSERT INTO `nuke_bbattachments_config` VALUES('max_attachments_pm', '1');
INSERT INTO `nuke_bbattachments_config` VALUES('disable_mod', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('allow_pm_attach', '1');
INSERT INTO `nuke_bbattachments_config` VALUES('attachment_topic_review', '1');
INSERT INTO `nuke_bbattachments_config` VALUES('allow_ftp_upload', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('show_apcp', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('attach_version', '2.4.5');
INSERT INTO `nuke_bbattachments_config` VALUES('default_upload_quota', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('default_pm_quota', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('ftp_server', 'ftp.yoursite.com');
INSERT INTO `nuke_bbattachments_config` VALUES('ftp_path', '/public_html/modules/Forums/files');
INSERT INTO `nuke_bbattachments_config` VALUES('download_path', 'http://www.yoursite.com/modules/Forums/files');
INSERT INTO `nuke_bbattachments_config` VALUES('ftp_user', '');
INSERT INTO `nuke_bbattachments_config` VALUES('ftp_pass', '');
INSERT INTO `nuke_bbattachments_config` VALUES('ftp_pasv_mode', '1');
INSERT INTO `nuke_bbattachments_config` VALUES('img_display_inlined', '1');
INSERT INTO `nuke_bbattachments_config` VALUES('img_max_width', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('img_max_height', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('img_link_width', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('img_link_height', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('img_create_thumbnail', '1');
INSERT INTO `nuke_bbattachments_config` VALUES('img_min_thumb_filesize', '12000');
INSERT INTO `nuke_bbattachments_config` VALUES('img_imagick', '/usr/bin/convert');
INSERT INTO `nuke_bbattachments_config` VALUES('use_gd2', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('wma_autoplay', '0');
INSERT INTO `nuke_bbattachments_config` VALUES('flash_autoplay', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbattachments_desc`
--

CREATE TABLE `nuke_bbattachments_desc` (
  `attach_id` mediumint(8) unsigned NOT NULL auto_increment,
  `physical_filename` varchar(255) NOT NULL default '',
  `real_filename` varchar(255) NOT NULL default '',
  `download_count` mediumint(8) unsigned NOT NULL default '0',
  `comment` varchar(255) default NULL,
  `extension` varchar(100) default NULL,
  `mimetype` varchar(100) default NULL,
  `filesize` int(20) NOT NULL default '0',
  `filetime` int(11) NOT NULL default '0',
  `thumbnail` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`attach_id`),
  KEY `filetime` (`filetime`),
  KEY `physical_filename` (`physical_filename`(10)),
  KEY `filesize` (`filesize`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbattachments_desc`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbattach_quota`
--

CREATE TABLE `nuke_bbattach_quota` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `quota_type` smallint(2) NOT NULL default '0',
  `quota_limit_id` mediumint(8) unsigned NOT NULL default '0',
  KEY `quota_type` (`quota_type`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbattach_quota`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbauth_access`
--

CREATE TABLE `nuke_bbauth_access` (
  `group_id` mediumint(8) NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `auth_view` tinyint(1) NOT NULL default '0',
  `auth_read` tinyint(1) NOT NULL default '0',
  `auth_post` tinyint(1) NOT NULL default '0',
  `auth_reply` tinyint(1) NOT NULL default '0',
  `auth_edit` tinyint(1) NOT NULL default '0',
  `auth_delete` tinyint(1) NOT NULL default '0',
  `auth_sticky` tinyint(1) NOT NULL default '0',
  `auth_announce` tinyint(1) NOT NULL default '0',
  `auth_globalannounce` tinyint(1) NOT NULL default '0',
  `auth_vote` tinyint(1) NOT NULL default '0',
  `auth_pollcreate` tinyint(1) NOT NULL default '0',
  `auth_attachments` tinyint(1) NOT NULL default '0',
  `auth_mod` tinyint(1) NOT NULL default '0',
  `auth_download` tinyint(1) NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbauth_access`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbauth_arcade_access`
--

CREATE TABLE `nuke_bbauth_arcade_access` (
  `group_id` mediumint(8) NOT NULL default '0',
  `arcade_catid` mediumint(8) unsigned NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `arcade_catid` (`arcade_catid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbauth_arcade_access`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbbanlist`
--

CREATE TABLE `nuke_bbbanlist` (
  `ban_id` mediumint(8) unsigned NOT NULL auto_increment,
  `ban_userid` mediumint(8) NOT NULL default '0',
  `ban_ip` varchar(8) NOT NULL default '',
  `ban_email` varchar(255) default NULL,
  `ban_time` int(11) default NULL,
  PRIMARY KEY  (`ban_id`),
  KEY `ban_ip_user_id` (`ban_ip`,`ban_userid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbbanlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbcategories`
--

CREATE TABLE `nuke_bbcategories` (
  `cat_id` mediumint(8) unsigned NOT NULL auto_increment,
  `cat_title` varchar(100) default NULL,
  `cat_order` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_order` (`cat_order`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_bbcategories`
--

INSERT INTO `nuke_bbcategories` VALUES(1, 'General', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbconfig`
--

CREATE TABLE `nuke_bbconfig` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbconfig`
--

INSERT INTO `nuke_bbconfig` VALUES('config_id', '1');
INSERT INTO `nuke_bbconfig` VALUES('board_disable', '0');
INSERT INTO `nuke_bbconfig` VALUES('board_disable_adminview', '1');
INSERT INTO `nuke_bbconfig` VALUES('board_disable_msg', 'The board is currently disabled...');
INSERT INTO `nuke_bbconfig` VALUES('sitename', 'My Site');
INSERT INTO `nuke_bbconfig` VALUES('site_desc', '');
INSERT INTO `nuke_bbconfig` VALUES('cookie_name', 'nukeevo');
INSERT INTO `nuke_bbconfig` VALUES('cookie_path', '/');
INSERT INTO `nuke_bbconfig` VALUES('cookie_domain', 'MySite.com');
INSERT INTO `nuke_bbconfig` VALUES('cookie_secure', '0');
INSERT INTO `nuke_bbconfig` VALUES('session_length', '3600');
INSERT INTO `nuke_bbconfig` VALUES('allow_html', '1');
INSERT INTO `nuke_bbconfig` VALUES('allow_html_tags', 'b,i,u,pre');
INSERT INTO `nuke_bbconfig` VALUES('allow_bbcode', '1');
INSERT INTO `nuke_bbconfig` VALUES('allow_smilies', '1');
INSERT INTO `nuke_bbconfig` VALUES('allow_sig', '1');
INSERT INTO `nuke_bbconfig` VALUES('allow_namechange', '0');
INSERT INTO `nuke_bbconfig` VALUES('allow_theme_create', '0');
INSERT INTO `nuke_bbconfig` VALUES('allow_avatar_local', '1');
INSERT INTO `nuke_bbconfig` VALUES('allow_avatar_remote', '0');
INSERT INTO `nuke_bbconfig` VALUES('allow_avatar_upload', '0');
INSERT INTO `nuke_bbconfig` VALUES('override_user_style', '1');
INSERT INTO `nuke_bbconfig` VALUES('posts_per_page', '15');
INSERT INTO `nuke_bbconfig` VALUES('topics_per_page', '50');
INSERT INTO `nuke_bbconfig` VALUES('hot_threshold', '25');
INSERT INTO `nuke_bbconfig` VALUES('max_poll_options', '10');
INSERT INTO `nuke_bbconfig` VALUES('max_sig_chars', '255');
INSERT INTO `nuke_bbconfig` VALUES('max_smilies', '15');
INSERT INTO `nuke_bbconfig` VALUES('max_inbox_privmsgs', '100');
INSERT INTO `nuke_bbconfig` VALUES('max_sentbox_privmsgs', '100');
INSERT INTO `nuke_bbconfig` VALUES('max_savebox_privmsgs', '100');
INSERT INTO `nuke_bbconfig` VALUES('board_email_sig', 'Thanks, Webmaster@MySite.com');
INSERT INTO `nuke_bbconfig` VALUES('board_email', 'Webmaster@MySite.com');
INSERT INTO `nuke_bbconfig` VALUES('smtp_delivery', '0');
INSERT INTO `nuke_bbconfig` VALUES('smtp_host', '');
INSERT INTO `nuke_bbconfig` VALUES('require_activation', '0');
INSERT INTO `nuke_bbconfig` VALUES('flood_interval', '15');
INSERT INTO `nuke_bbconfig` VALUES('search_flood_interval', '15');
INSERT INTO `nuke_bbconfig` VALUES('board_email_form', '0');
INSERT INTO `nuke_bbconfig` VALUES('avatar_filesize', '6144');
INSERT INTO `nuke_bbconfig` VALUES('avatar_max_width', '80');
INSERT INTO `nuke_bbconfig` VALUES('avatar_max_height', '80');
INSERT INTO `nuke_bbconfig` VALUES('avatar_path', 'modules/Forums/images/avatars');
INSERT INTO `nuke_bbconfig` VALUES('avatar_gallery_path', 'modules/Forums/images/avatars');
INSERT INTO `nuke_bbconfig` VALUES('smilies_path', 'modules/Forums/images/smiles');
INSERT INTO `nuke_bbconfig` VALUES('default_style', '1');
INSERT INTO `nuke_bbconfig` VALUES('default_dateformat', 'D M d, Y g:i a');
INSERT INTO `nuke_bbconfig` VALUES('board_timezone', '10');
INSERT INTO `nuke_bbconfig` VALUES('prune_enable', '0');
INSERT INTO `nuke_bbconfig` VALUES('privmsg_disable', '0');
INSERT INTO `nuke_bbconfig` VALUES('gzip_compress', '0');
INSERT INTO `nuke_bbconfig` VALUES('coppa_fax', '');
INSERT INTO `nuke_bbconfig` VALUES('coppa_mail', '');
INSERT INTO `nuke_bbconfig` VALUES('board_startdate', '1131089812');
INSERT INTO `nuke_bbconfig` VALUES('default_lang', 'english');
INSERT INTO `nuke_bbconfig` VALUES('smtp_username', '');
INSERT INTO `nuke_bbconfig` VALUES('smtp_password', '');
INSERT INTO `nuke_bbconfig` VALUES('record_online_users', '2');
INSERT INTO `nuke_bbconfig` VALUES('record_online_date', '1034668530');
INSERT INTO `nuke_bbconfig` VALUES('server_name', 'MySite.com');
INSERT INTO `nuke_bbconfig` VALUES('server_port', '80');
INSERT INTO `nuke_bbconfig` VALUES('script_path', '/modules/Forums/');
INSERT INTO `nuke_bbconfig` VALUES('version', '.0.23');
INSERT INTO `nuke_bbconfig` VALUES('enable_confirm', '0');
INSERT INTO `nuke_bbconfig` VALUES('sendmail_fix', '0');
INSERT INTO `nuke_bbconfig` VALUES('sig_max_lines', '5');
INSERT INTO `nuke_bbconfig` VALUES('sig_wordwrap', '100');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_font_sizes', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_min_font_size', '7');
INSERT INTO `nuke_bbconfig` VALUES('sig_max_font_size', '12');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_bold', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_italic', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_underline', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_colors', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_quote', '0');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_code', '0');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_list', '0');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_url', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_images', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_max_images', '0');
INSERT INTO `nuke_bbconfig` VALUES('sig_max_img_height', '75');
INSERT INTO `nuke_bbconfig` VALUES('sig_max_img_width', '500');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_on_max_img_size_fail', '0');
INSERT INTO `nuke_bbconfig` VALUES('sig_max_img_files_size', '10');
INSERT INTO `nuke_bbconfig` VALUES('sig_max_img_av_files_size', '0');
INSERT INTO `nuke_bbconfig` VALUES('sig_exotic_bbcodes_disallowed', '');
INSERT INTO `nuke_bbconfig` VALUES('sig_allow_smilies', '1');
INSERT INTO `nuke_bbconfig` VALUES('report_email', '1');
INSERT INTO `nuke_bbconfig` VALUES('ropm_quick_reply', '1');
INSERT INTO `nuke_bbconfig` VALUES('ropm_quick_reply_bbc', '1');
INSERT INTO `nuke_bbconfig` VALUES('ropm_quick_reply_smilies', '22');
INSERT INTO `nuke_bbconfig` VALUES('wrap_enable', '1');
INSERT INTO `nuke_bbconfig` VALUES('wrap_min', '50');
INSERT INTO `nuke_bbconfig` VALUES('wrap_max', '99');
INSERT INTO `nuke_bbconfig` VALUES('wrap_def', '70');
INSERT INTO `nuke_bbconfig` VALUES('allow_quickreply', '1');
INSERT INTO `nuke_bbconfig` VALUES('anonymous_show_sqr', '0');
INSERT INTO `nuke_bbconfig` VALUES('anonymous_sqr_mode', '0');
INSERT INTO `nuke_bbconfig` VALUES('quick_search_enable', '1');
INSERT INTO `nuke_bbconfig` VALUES('sig_line', '<hr>');
INSERT INTO `nuke_bbconfig` VALUES('default_avatar_guests_url', 'modules/Forums/images/avatars/blank.gif');
INSERT INTO `nuke_bbconfig` VALUES('default_avatar_users_url', 'modules/Forums/images/avatars/blank.gif');
INSERT INTO `nuke_bbconfig` VALUES('default_avatar_set', '2');
INSERT INTO `nuke_bbconfig` VALUES('pm_allow_threshold', '0');
INSERT INTO `nuke_bbconfig` VALUES('welcome_pm', '0');
INSERT INTO `nuke_bbconfig` VALUES('default_time_mode', '6');
INSERT INTO `nuke_bbconfig` VALUES('default_dst_time_lag', '60');
INSERT INTO `nuke_bbconfig` VALUES('glance_show', '1');
INSERT INTO `nuke_bbconfig` VALUES('glance_show_override', '1');
INSERT INTO `nuke_bbconfig` VALUES('glance_news_id', '0');
INSERT INTO `nuke_bbconfig` VALUES('glance_num_news', '0');
INSERT INTO `nuke_bbconfig` VALUES('glance_num', '6');
INSERT INTO `nuke_bbconfig` VALUES('glance_ignore_forums', '0');
INSERT INTO `nuke_bbconfig` VALUES('glance_table_width', '100%');
INSERT INTO `nuke_bbconfig` VALUES('glance_auth_read', '1');
INSERT INTO `nuke_bbconfig` VALUES('glance_topic_length', '0');
INSERT INTO `nuke_bbconfig` VALUES('online_time', '300');
INSERT INTO `nuke_bbconfig` VALUES('display_users_today', '0');
INSERT INTO `nuke_bbconfig` VALUES('locked_view_open', 'Locked: <strike>');
INSERT INTO `nuke_bbconfig` VALUES('locked_view_close', '</strike>');
INSERT INTO `nuke_bbconfig` VALUES('global_view_open', 'Global Announcement:');
INSERT INTO `nuke_bbconfig` VALUES('global_view_close', '');
INSERT INTO `nuke_bbconfig` VALUES('announce_view_open', 'Announcement:');
INSERT INTO `nuke_bbconfig` VALUES('announce_view_close', '');
INSERT INTO `nuke_bbconfig` VALUES('sticky_view_open', 'Sticky:');
INSERT INTO `nuke_bbconfig` VALUES('sticky_view_close', '');
INSERT INTO `nuke_bbconfig` VALUES('moved_view_open', 'Moved:');
INSERT INTO `nuke_bbconfig` VALUES('moved_view_close', '');
INSERT INTO `nuke_bbconfig` VALUES('initial_group_id', '5');
INSERT INTO `nuke_bbconfig` VALUES('hide_links', '0');
INSERT INTO `nuke_bbconfig` VALUES('hide_emails', '0');
INSERT INTO `nuke_bbconfig` VALUES('hide_images', '0');
INSERT INTO `nuke_bbconfig` VALUES('use_dhtml', '1');
INSERT INTO `nuke_bbconfig` VALUES('anonymous_open_sqr', '0');
INSERT INTO `nuke_bbconfig` VALUES('smilies_in_titles', '1');
INSERT INTO `nuke_bbconfig` VALUES('show_edited_logs', '1');
INSERT INTO `nuke_bbconfig` VALUES('show_locked_logs', '1');
INSERT INTO `nuke_bbconfig` VALUES('show_unlocked_logs', '1');
INSERT INTO `nuke_bbconfig` VALUES('show_splitted_logs', '1');
INSERT INTO `nuke_bbconfig` VALUES('show_moved_logs', '1');
INSERT INTO `nuke_bbconfig` VALUES('logs_view_level', '2');
INSERT INTO `nuke_bbconfig` VALUES('aprvmArchive', '0');
INSERT INTO `nuke_bbconfig` VALUES('aprvmVersion', '1.6.0');
INSERT INTO `nuke_bbconfig` VALUES('aprvmView', '0');
INSERT INTO `nuke_bbconfig` VALUES('aprvmRows', '25');
INSERT INTO `nuke_bbconfig` VALUES('aprvmIP', '1');
INSERT INTO `nuke_bbconfig` VALUES('image_resize_width', '400');
INSERT INTO `nuke_bbconfig` VALUES('image_resize_height', '400');
INSERT INTO `nuke_bbconfig` VALUES('use_theme_style', '1');
INSERT INTO `nuke_bbconfig` VALUES('allow_autologin', '1');
INSERT INTO `nuke_bbconfig` VALUES('max_autologin_time', '0');
INSERT INTO `nuke_bbconfig` VALUES('max_login_attempts', '5');
INSERT INTO `nuke_bbconfig` VALUES('login_reset_time', '30');
INSERT INTO `nuke_bbconfig` VALUES('show_sig_once', '0');
INSERT INTO `nuke_bbconfig` VALUES('show_avatar_once', '0');
INSERT INTO `nuke_bbconfig` VALUES('show_rank_once', '0');
INSERT INTO `nuke_bbconfig` VALUES('loginpage', '1');
INSERT INTO `nuke_bbconfig` VALUES('rand_seed', '0');
INSERT INTO `nuke_bbconfig` VALUES('ftr_msg', 'Sorry *u*, you need to read our topic: &quot;*t*&quot; for new users. After you read it, you can proceed to browse our posts normally. <br><br> Please click *l* to view the post.');
INSERT INTO `nuke_bbconfig` VALUES('ftr_topic', '1');
INSERT INTO `nuke_bbconfig` VALUES('ftr_active', '0');
INSERT INTO `nuke_bbconfig` VALUES('ftr_who', '2');
INSERT INTO `nuke_bbconfig` VALUES('ftr_installed', '1241642769');
INSERT INTO `nuke_bbconfig` VALUES('global_title', 'Nuke-Evolution Xtreme!');
INSERT INTO `nuke_bbconfig` VALUES('global_announcement', 'DarkForge Graphics brings you a fully loaded version of Nuke-Evolution.');
INSERT INTO `nuke_bbconfig` VALUES('global_enable', '1');
INSERT INTO `nuke_bbconfig` VALUES('marquee_disable', '0');
INSERT INTO `nuke_bbconfig` VALUES('version_check_delay', '1241641548');
INSERT INTO `nuke_bbconfig` VALUES('bday_show', '1');
INSERT INTO `nuke_bbconfig` VALUES('bday_require', '0');
INSERT INTO `nuke_bbconfig` VALUES('bday_year', '0');
INSERT INTO `nuke_bbconfig` VALUES('bday_lock', '0');
INSERT INTO `nuke_bbconfig` VALUES('bday_lookahead', '7');
INSERT INTO `nuke_bbconfig` VALUES('bday_max', '100');
INSERT INTO `nuke_bbconfig` VALUES('bday_min', '5');
INSERT INTO `nuke_bbconfig` VALUES('bday_hide', '0');
INSERT INTO `nuke_bbconfig` VALUES('bday_greeting', '0');
INSERT INTO `nuke_bbconfig` VALUES('icon_per_row', '10');
INSERT INTO `nuke_bbconfig` VALUES('ad_after_post', '');
INSERT INTO `nuke_bbconfig` VALUES('ad_post_threshold', '');
INSERT INTO `nuke_bbconfig` VALUES('ad_every_post', '3');
INSERT INTO `nuke_bbconfig` VALUES('ad_who', '1');
INSERT INTO `nuke_bbconfig` VALUES('ad_no_forums', '');
INSERT INTO `nuke_bbconfig` VALUES('ad_no_groups', '');
INSERT INTO `nuke_bbconfig` VALUES('ad_old_style', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbdisallow`
--

CREATE TABLE `nuke_bbdisallow` (
  `disallow_id` mediumint(8) unsigned NOT NULL auto_increment,
  `disallow_username` varchar(25) default NULL,
  PRIMARY KEY  (`disallow_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbdisallow`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbextensions`
--

CREATE TABLE `nuke_bbextensions` (
  `ext_id` mediumint(8) unsigned NOT NULL auto_increment,
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `extension` varchar(100) NOT NULL default '',
  `comment` varchar(100) default NULL,
  PRIMARY KEY  (`ext_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 ;

--
-- Dumping data for table `nuke_bbextensions`
--

INSERT INTO `nuke_bbextensions` VALUES(1, 1, 'gif', '');
INSERT INTO `nuke_bbextensions` VALUES(2, 1, 'png', '');
INSERT INTO `nuke_bbextensions` VALUES(3, 1, 'jpeg', '');
INSERT INTO `nuke_bbextensions` VALUES(4, 1, 'jpg', '');
INSERT INTO `nuke_bbextensions` VALUES(5, 1, 'tif', '');
INSERT INTO `nuke_bbextensions` VALUES(6, 1, 'tga', '');
INSERT INTO `nuke_bbextensions` VALUES(7, 2, 'gtar', '');
INSERT INTO `nuke_bbextensions` VALUES(8, 2, 'gz', '');
INSERT INTO `nuke_bbextensions` VALUES(9, 2, 'tar', '');
INSERT INTO `nuke_bbextensions` VALUES(10, 2, 'zip', '');
INSERT INTO `nuke_bbextensions` VALUES(11, 2, 'rar', '');
INSERT INTO `nuke_bbextensions` VALUES(12, 2, 'ace', '');
INSERT INTO `nuke_bbextensions` VALUES(13, 3, 'txt', '');
INSERT INTO `nuke_bbextensions` VALUES(14, 3, 'c', '');
INSERT INTO `nuke_bbextensions` VALUES(15, 3, 'h', '');
INSERT INTO `nuke_bbextensions` VALUES(16, 3, 'cpp', '');
INSERT INTO `nuke_bbextensions` VALUES(17, 3, 'hpp', '');
INSERT INTO `nuke_bbextensions` VALUES(18, 3, 'diz', '');
INSERT INTO `nuke_bbextensions` VALUES(19, 4, 'xls', '');
INSERT INTO `nuke_bbextensions` VALUES(20, 4, 'doc', '');
INSERT INTO `nuke_bbextensions` VALUES(21, 4, 'dot', '');
INSERT INTO `nuke_bbextensions` VALUES(22, 4, 'pdf', '');
INSERT INTO `nuke_bbextensions` VALUES(23, 4, 'ai', '');
INSERT INTO `nuke_bbextensions` VALUES(24, 4, 'ps', '');
INSERT INTO `nuke_bbextensions` VALUES(25, 4, 'ppt', '');
INSERT INTO `nuke_bbextensions` VALUES(26, 5, 'rm', '');
INSERT INTO `nuke_bbextensions` VALUES(27, 6, 'wma', '');
INSERT INTO `nuke_bbextensions` VALUES(28, 7, 'swf', '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbextension_groups`
--

CREATE TABLE `nuke_bbextension_groups` (
  `group_id` mediumint(8) NOT NULL auto_increment,
  `group_name` varchar(20) NOT NULL default '',
  `cat_id` tinyint(2) NOT NULL default '0',
  `allow_group` tinyint(1) NOT NULL default '0',
  `download_mode` tinyint(1) unsigned NOT NULL default '1',
  `upload_icon` varchar(100) default '',
  `max_filesize` int(20) NOT NULL default '0',
  `forum_permissions` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nuke_bbextension_groups`
--

INSERT INTO `nuke_bbextension_groups` VALUES(1, 'Images', 1, 1, 2, '', 262144, '');
INSERT INTO `nuke_bbextension_groups` VALUES(2, 'Archives', 0, 1, 2, '', 262144, '');
INSERT INTO `nuke_bbextension_groups` VALUES(3, 'Plain Text', 0, 0, 2, '', 262144, '');
INSERT INTO `nuke_bbextension_groups` VALUES(4, 'Documents', 0, 0, 2, '', 262144, '');
INSERT INTO `nuke_bbextension_groups` VALUES(5, 'Real Media', 0, 0, 2, '', 262144, '');
INSERT INTO `nuke_bbextension_groups` VALUES(6, 'Streams', 2, 0, 2, '', 262144, '');
INSERT INTO `nuke_bbextension_groups` VALUES(7, 'Flash Files', 3, 0, 2, '', 262144, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbflags`
--

CREATE TABLE `nuke_bbflags` (
  `flag_id` int(10) NOT NULL auto_increment,
  `flag_name` varchar(25) default NULL,
  `flag_image` varchar(25) default NULL,
  PRIMARY KEY  (`flag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 ;

--
-- Dumping data for table `nuke_bbflags`
--

INSERT INTO `nuke_bbflags` VALUES(1, 'usa', 'usa.png');
INSERT INTO `nuke_bbflags` VALUES(2, 'afghanistan', 'afghanistan.png');
INSERT INTO `nuke_bbflags` VALUES(3, 'albania', 'albania.png');
INSERT INTO `nuke_bbflags` VALUES(4, 'algeria', 'algeria.png');
INSERT INTO `nuke_bbflags` VALUES(5, 'andorra', 'andorra.png');
INSERT INTO `nuke_bbflags` VALUES(6, 'antigua and barbuda', 'antiguabarbuda.png');
INSERT INTO `nuke_bbflags` VALUES(7, 'argentina', 'argentina.png');
INSERT INTO `nuke_bbflags` VALUES(8, 'armenia', 'armenia.png');
INSERT INTO `nuke_bbflags` VALUES(9, 'australia', 'australia.png');
INSERT INTO `nuke_bbflags` VALUES(10, 'austria', 'austria.png');
INSERT INTO `nuke_bbflags` VALUES(11, 'azerbaijan', 'azerbaijan.png');
INSERT INTO `nuke_bbflags` VALUES(12, 'bahamas', 'bahamas.png');
INSERT INTO `nuke_bbflags` VALUES(13, 'bahrain', 'bahrain.png');
INSERT INTO `nuke_bbflags` VALUES(14, 'bangladesh', 'bangladesh.png');
INSERT INTO `nuke_bbflags` VALUES(15, 'barbados', 'barbados.png');
INSERT INTO `nuke_bbflags` VALUES(16, 'belarus', 'belarus.png');
INSERT INTO `nuke_bbflags` VALUES(17, 'belgium', 'belgium.png');
INSERT INTO `nuke_bbflags` VALUES(18, 'belize', 'belize.png');
INSERT INTO `nuke_bbflags` VALUES(19, 'benin', 'benin.png');
INSERT INTO `nuke_bbflags` VALUES(20, 'bhutan', 'bhutan.png');
INSERT INTO `nuke_bbflags` VALUES(21, 'bolivia', 'bolivia.png');
INSERT INTO `nuke_bbflags` VALUES(22, 'bosnia herzegovina', 'bosnia_herzegovina.png');
INSERT INTO `nuke_bbflags` VALUES(23, 'botswana', 'botswana.png');
INSERT INTO `nuke_bbflags` VALUES(24, 'brazil', 'brazil.png');
INSERT INTO `nuke_bbflags` VALUES(25, 'brunei', 'brunei.png');
INSERT INTO `nuke_bbflags` VALUES(26, 'bulgaria', 'bulgaria.png');
INSERT INTO `nuke_bbflags` VALUES(27, 'burkinafaso', 'burkinafaso.png');
INSERT INTO `nuke_bbflags` VALUES(28, 'burma', 'burma.png');
INSERT INTO `nuke_bbflags` VALUES(29, 'burundi', 'burundi.png');
INSERT INTO `nuke_bbflags` VALUES(30, 'cambodia', 'cambodia.png');
INSERT INTO `nuke_bbflags` VALUES(31, 'cameroon', 'cameroon.png');
INSERT INTO `nuke_bbflags` VALUES(32, 'canada', 'canada.png');
INSERT INTO `nuke_bbflags` VALUES(33, 'chad', 'chad.png');
INSERT INTO `nuke_bbflags` VALUES(34, 'chile', 'chile.png');
INSERT INTO `nuke_bbflags` VALUES(35, 'china', 'china.png');
INSERT INTO `nuke_bbflags` VALUES(36, 'columbia', 'columbia.png');
INSERT INTO `nuke_bbflags` VALUES(37, 'comoros', 'comoros.png');
INSERT INTO `nuke_bbflags` VALUES(38, 'congo', 'congo.png');
INSERT INTO `nuke_bbflags` VALUES(39, 'croatia', 'croatia.png');
INSERT INTO `nuke_bbflags` VALUES(40, 'cuba', 'cuba.png');
INSERT INTO `nuke_bbflags` VALUES(41, 'cyprus', 'cyprus.png');
INSERT INTO `nuke_bbflags` VALUES(42, 'denmark', 'denmark.png');
INSERT INTO `nuke_bbflags` VALUES(43, 'djibouti', 'djibouti.png');
INSERT INTO `nuke_bbflags` VALUES(44, 'dominica', 'dominica.png');
INSERT INTO `nuke_bbflags` VALUES(45, 'dominican rep', 'dominicanrep.png');
INSERT INTO `nuke_bbflags` VALUES(46, 'ecuador', 'ecuador.png');
INSERT INTO `nuke_bbflags` VALUES(47, 'egypt', 'egypt.png');
INSERT INTO `nuke_bbflags` VALUES(48, 'elsalvador', 'elsalvador.png');
INSERT INTO `nuke_bbflags` VALUES(49, 'england', 'england.png');
INSERT INTO `nuke_bbflags` VALUES(50, 'eq guinea', 'eq_guinea.png');
INSERT INTO `nuke_bbflags` VALUES(51, 'eritrea', 'eritrea.png');
INSERT INTO `nuke_bbflags` VALUES(52, 'estonia', 'estonia.png');
INSERT INTO `nuke_bbflags` VALUES(53, 'ethiopia', 'ethiopia.png');
INSERT INTO `nuke_bbflags` VALUES(54, 'fiji', 'fiji.png');
INSERT INTO `nuke_bbflags` VALUES(55, 'finland', 'finland.png');
INSERT INTO `nuke_bbflags` VALUES(56, 'france', 'france.png');
INSERT INTO `nuke_bbflags` VALUES(57, 'gabon', 'gabon.png');
INSERT INTO `nuke_bbflags` VALUES(58, 'gambia', 'gambia.png');
INSERT INTO `nuke_bbflags` VALUES(59, 'georgia', 'georgia.png');
INSERT INTO `nuke_bbflags` VALUES(60, 'germany', 'germany.png');
INSERT INTO `nuke_bbflags` VALUES(61, 'ghana', 'ghana.png');
INSERT INTO `nuke_bbflags` VALUES(62, 'greece', 'greece.png');
INSERT INTO `nuke_bbflags` VALUES(63, 'grenada', 'grenada.png');
INSERT INTO `nuke_bbflags` VALUES(64, 'grenadines', 'grenadines.png');
INSERT INTO `nuke_bbflags` VALUES(65, 'guatemala', 'guatemala.png');
INSERT INTO `nuke_bbflags` VALUES(66, 'guinea', 'guinea.png');
INSERT INTO `nuke_bbflags` VALUES(67, 'guyana', 'guyana.png');
INSERT INTO `nuke_bbflags` VALUES(68, 'haiti', 'haiti.png');
INSERT INTO `nuke_bbflags` VALUES(69, 'honduras', 'honduras.png');
INSERT INTO `nuke_bbflags` VALUES(70, 'hong kong', 'hong_kong.png');
INSERT INTO `nuke_bbflags` VALUES(71, 'hungary', 'hungary.png');
INSERT INTO `nuke_bbflags` VALUES(72, 'iceland', 'iceland.png');
INSERT INTO `nuke_bbflags` VALUES(73, 'india', 'india.png');
INSERT INTO `nuke_bbflags` VALUES(74, 'indonesia', 'indonesia.png');
INSERT INTO `nuke_bbflags` VALUES(75, 'iran', 'iran.png');
INSERT INTO `nuke_bbflags` VALUES(76, 'iraq', 'iraq.png');
INSERT INTO `nuke_bbflags` VALUES(77, 'ireland', 'ireland.png');
INSERT INTO `nuke_bbflags` VALUES(78, 'israel', 'israel.png');
INSERT INTO `nuke_bbflags` VALUES(79, 'italy', 'italy.png');
INSERT INTO `nuke_bbflags` VALUES(80, 'jamaica', 'jamaica.png');
INSERT INTO `nuke_bbflags` VALUES(81, 'japan', 'japan.png');
INSERT INTO `nuke_bbflags` VALUES(82, 'jordan', 'jordan.png');
INSERT INTO `nuke_bbflags` VALUES(83, 'kazakhstan', 'kazakhstan.png');
INSERT INTO `nuke_bbflags` VALUES(84, 'kenya', 'kenya.png');
INSERT INTO `nuke_bbflags` VALUES(85, 'kiribati', 'kiribati.png');
INSERT INTO `nuke_bbflags` VALUES(86, 'kuwait', 'kuwait.png');
INSERT INTO `nuke_bbflags` VALUES(87, 'kyrgyzstan', 'kyrgyzstan.png');
INSERT INTO `nuke_bbflags` VALUES(88, 'laos', 'laos.png');
INSERT INTO `nuke_bbflags` VALUES(89, 'latvia', 'latvia.png');
INSERT INTO `nuke_bbflags` VALUES(90, 'lebanon', 'lebanon.png');
INSERT INTO `nuke_bbflags` VALUES(91, 'liberia', 'liberia.png');
INSERT INTO `nuke_bbflags` VALUES(92, 'libya', 'libya.png');
INSERT INTO `nuke_bbflags` VALUES(93, 'liechtenstein', 'liechtenstein.png');
INSERT INTO `nuke_bbflags` VALUES(94, 'lithuania', 'lithuania.png');
INSERT INTO `nuke_bbflags` VALUES(95, 'luxembourg', 'luxembourg.png');
INSERT INTO `nuke_bbflags` VALUES(96, 'macau', 'macau.png');
INSERT INTO `nuke_bbflags` VALUES(97, 'madagascar', 'madagascar.png');
INSERT INTO `nuke_bbflags` VALUES(98, 'malawi', 'malawi.png');
INSERT INTO `nuke_bbflags` VALUES(99, 'malaysia', 'malaysia.png');
INSERT INTO `nuke_bbflags` VALUES(100, 'maldives', 'maldives.png');
INSERT INTO `nuke_bbflags` VALUES(101, 'mali', 'mali.png');
INSERT INTO `nuke_bbflags` VALUES(102, 'malta', 'malta.png');
INSERT INTO `nuke_bbflags` VALUES(103, 'mauritania', 'mauritania.png');
INSERT INTO `nuke_bbflags` VALUES(104, 'mauritius', 'mauritius.png');
INSERT INTO `nuke_bbflags` VALUES(105, 'mexico', 'mexico.png');
INSERT INTO `nuke_bbflags` VALUES(106, 'micronesia', 'micronesia.png');
INSERT INTO `nuke_bbflags` VALUES(107, 'moldova', 'moldova.png');
INSERT INTO `nuke_bbflags` VALUES(108, 'monaco', 'monaco.png');
INSERT INTO `nuke_bbflags` VALUES(109, 'mongolia', 'mongolia.png');
INSERT INTO `nuke_bbflags` VALUES(110, 'morocco', 'morocco.png');
INSERT INTO `nuke_bbflags` VALUES(111, 'mozambique', 'mozambique.png');
INSERT INTO `nuke_bbflags` VALUES(112, 'namibia', 'namibia.png');
INSERT INTO `nuke_bbflags` VALUES(113, 'nauru', 'nauru.png');
INSERT INTO `nuke_bbflags` VALUES(114, 'nepal', 'nepal.png');
INSERT INTO `nuke_bbflags` VALUES(115, 'netherlands', 'netherlands.png');
INSERT INTO `nuke_bbflags` VALUES(116, 'nicaragua', 'nicaragua.png');
INSERT INTO `nuke_bbflags` VALUES(117, 'niger', 'niger.png');
INSERT INTO `nuke_bbflags` VALUES(118, 'nigeria', 'nigeria.png');
INSERT INTO `nuke_bbflags` VALUES(119, 'norway', 'norway.png');
INSERT INTO `nuke_bbflags` VALUES(120, 'oman', 'oman.png');
INSERT INTO `nuke_bbflags` VALUES(121, 'pakistan', 'pakistan.png');
INSERT INTO `nuke_bbflags` VALUES(122, 'panama', 'panama.png');
INSERT INTO `nuke_bbflags` VALUES(123, 'paraguay', 'paraguay.png');
INSERT INTO `nuke_bbflags` VALUES(124, 'peru', 'peru.png');
INSERT INTO `nuke_bbflags` VALUES(125, 'philippines', 'philippines.png');
INSERT INTO `nuke_bbflags` VALUES(126, 'poland', 'poland.png');
INSERT INTO `nuke_bbflags` VALUES(127, 'portugal', 'portugal.png');
INSERT INTO `nuke_bbflags` VALUES(128, 'qatar', 'qatar.png');
INSERT INTO `nuke_bbflags` VALUES(129, 'romania', 'romania.png');
INSERT INTO `nuke_bbflags` VALUES(130, 'russia', 'russia.png');
INSERT INTO `nuke_bbflags` VALUES(131, 'sao tome', 'sao_tome.png');
INSERT INTO `nuke_bbflags` VALUES(132, 'senegal', 'senegal.png');
INSERT INTO `nuke_bbflags` VALUES(133, 'serbia', 'serbia.png');
INSERT INTO `nuke_bbflags` VALUES(134, 'seychelles', 'seychelles.png');
INSERT INTO `nuke_bbflags` VALUES(135, 'sierraleone', 'sierraleone.png');
INSERT INTO `nuke_bbflags` VALUES(136, 'singapore', 'singapore.png');
INSERT INTO `nuke_bbflags` VALUES(137, 'slovakia', 'slovakia.png');
INSERT INTO `nuke_bbflags` VALUES(138, 'slovenia', 'slovenia.png');
INSERT INTO `nuke_bbflags` VALUES(139, 'solomon islands', 'solomon_islands.png');
INSERT INTO `nuke_bbflags` VALUES(140, 'somalia', 'somalia.png');
INSERT INTO `nuke_bbflags` VALUES(141, 'south_korea', 'south_korea.png');
INSERT INTO `nuke_bbflags` VALUES(142, 'spain', 'spain.png');
INSERT INTO `nuke_bbflags` VALUES(143, 'stkitts nevis', 'stkitts_nevis.png');
INSERT INTO `nuke_bbflags` VALUES(144, 'stlucia', 'stlucia.png');
INSERT INTO `nuke_bbflags` VALUES(145, 'sudan', 'sudan.png');
INSERT INTO `nuke_bbflags` VALUES(146, 'suriname', 'suriname.png');
INSERT INTO `nuke_bbflags` VALUES(147, 'sweden', 'sweden.png');
INSERT INTO `nuke_bbflags` VALUES(148, 'switzerland', 'switzerland.png');
INSERT INTO `nuke_bbflags` VALUES(149, 'syria', 'syria.png');
INSERT INTO `nuke_bbflags` VALUES(150, 'taiwan', 'taiwan.png');
INSERT INTO `nuke_bbflags` VALUES(151, 'tajikistan', 'tajikistan.png');
INSERT INTO `nuke_bbflags` VALUES(152, 'tanzania', 'tanzania.png');
INSERT INTO `nuke_bbflags` VALUES(153, 'thailand', 'thailand.png');
INSERT INTO `nuke_bbflags` VALUES(154, 'togo', 'togo.png');
INSERT INTO `nuke_bbflags` VALUES(155, 'tonga', 'tonga.png');
INSERT INTO `nuke_bbflags` VALUES(156, 'tunisia', 'tunisia.png');
INSERT INTO `nuke_bbflags` VALUES(157, 'turkey', 'turkey.png');
INSERT INTO `nuke_bbflags` VALUES(158, 'turkmenistan', 'turkmenistan.png');
INSERT INTO `nuke_bbflags` VALUES(159, 'tuvala', 'tuvala.png');
INSERT INTO `nuke_bbflags` VALUES(160, 'uganda', 'uganda.png');
INSERT INTO `nuke_bbflags` VALUES(161, 'uk', 'uk.png');
INSERT INTO `nuke_bbflags` VALUES(162, 'ukraine', 'ukraine.png');
INSERT INTO `nuke_bbflags` VALUES(163, 'uruguay', 'uruguay.png');
INSERT INTO `nuke_bbflags` VALUES(164, 'uzbekistan', 'uzbekistan.png');
INSERT INTO `nuke_bbflags` VALUES(165, 'vanuatu', 'vanuatu.png');
INSERT INTO `nuke_bbflags` VALUES(166, 'venezuela', 'venezuela.png');
INSERT INTO `nuke_bbflags` VALUES(167, 'vietnam', 'vietnam.png');
INSERT INTO `nuke_bbflags` VALUES(168, 'western samoa', 'western_samoa.png');
INSERT INTO `nuke_bbflags` VALUES(169, 'yemen', 'yemen.png');
INSERT INTO `nuke_bbflags` VALUES(170, 'yugoslavia', 'yugoslavia.png');
INSERT INTO `nuke_bbflags` VALUES(171, 'zambia', 'zambia.png');
INSERT INTO `nuke_bbflags` VALUES(172, 'zimbabwe', 'zimbabwe.png');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbforbidden_extensions`
--

CREATE TABLE `nuke_bbforbidden_extensions` (
  `ext_id` mediumint(8) unsigned NOT NULL auto_increment,
  `extension` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`ext_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 ;

--
-- Dumping data for table `nuke_bbforbidden_extensions`
--

INSERT INTO `nuke_bbforbidden_extensions` VALUES(1, 'php');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(2, 'php3');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(3, 'php4');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(4, 'phtml');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(5, 'pl');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(6, 'asp');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(7, 'cgi');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(8, 'com');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(9, 'bat');
INSERT INTO `nuke_bbforbidden_extensions` VALUES(10, 'scr');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbforums`
--

CREATE TABLE `nuke_bbforums` (
  `forum_id` smallint(5) unsigned NOT NULL auto_increment,
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_name` varchar(150) default NULL,
  `forum_desc` text,
  `forum_status` tinyint(4) NOT NULL default '0',
  `forum_order` mediumint(8) unsigned NOT NULL default '1',
  `forum_posts` mediumint(8) unsigned NOT NULL default '0',
  `forum_topics` mediumint(8) unsigned NOT NULL default '0',
  `forum_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `prune_next` int(11) default NULL,
  `prune_enable` tinyint(1) NOT NULL default '1',
  `auth_view` tinyint(2) NOT NULL default '0',
  `auth_read` tinyint(2) NOT NULL default '0',
  `auth_post` tinyint(2) NOT NULL default '0',
  `auth_reply` tinyint(2) NOT NULL default '0',
  `auth_edit` tinyint(2) NOT NULL default '0',
  `auth_delete` tinyint(2) NOT NULL default '0',
  `auth_sticky` tinyint(2) NOT NULL default '0',
  `auth_announce` tinyint(2) NOT NULL default '0',
  `auth_globalannounce` tinyint(2) NOT NULL default '3',
  `auth_vote` tinyint(2) NOT NULL default '0',
  `auth_pollcreate` tinyint(2) NOT NULL default '0',
  `auth_attachments` tinyint(2) NOT NULL default '0',
  `forum_display_sort` tinyint(1) NOT NULL default '0',
  `forum_display_order` tinyint(1) NOT NULL default '0',
  `auth_download` tinyint(2) NOT NULL default '0',
  `forum_parent` int(11) NOT NULL default '0',
  `forum_color` varchar(6) NOT NULL default '',
  `title_is_link` tinyint(1) NOT NULL default '0',
  `weblink` varchar(200) NOT NULL,
  `forum_link_icon` varchar(200) NOT NULL,
  `forum_link_count` mediumint(8) unsigned NOT NULL,
  `forum_link_target` tinyint(1) NOT NULL default '0',
  `forum_icon` varchar(255) default NULL,
  `forum_thank` tinyint(1) NOT NULL default '0',
  `forum_password` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`forum_id`),
  KEY `forums_order` (`forum_order`),
  KEY `cat_id` (`cat_id`),
  KEY `forum_last_post_id` (`forum_last_post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_bbforums`
--

INSERT INTO `nuke_bbforums` VALUES(1, 1, 'Site', '', 0, 10, 1, 1, 2, NULL, 0, 0, 0, 1, 1, 1, 1, 3, 3, 3, 1, 1, 1, 0, 0, 1, 0, 'd40000', 0, 'http://', '', 0, 0, 'images/forum_icons/general.png', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbforum_prune`
--

CREATE TABLE `nuke_bbforum_prune` (
  `prune_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `prune_days` tinyint(4) unsigned NOT NULL default '0',
  `prune_freq` tinyint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`prune_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbforum_prune`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbgamehash`
--

CREATE TABLE `nuke_bbgamehash` (
  `gamehash_id` char(32) NOT NULL,
  `game_id` mediumint(8) NOT NULL,
  `user_id` mediumint(8) NOT NULL,
  `hash_date` int(11) NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbgamehash`
--

INSERT INTO `nuke_bbgamehash` VALUES('2831531a4b315cface4aa7b4b407737e', 1, 14, 1243799167);
INSERT INTO `nuke_bbgamehash` VALUES('af91f2f362cf263b05d87c969560e6ed', 1, 14, 1243798783);
INSERT INTO `nuke_bbgamehash` VALUES('bc45ca43ec051ff1c3e81aa0f7853397', 1, 14, 1243798574);
INSERT INTO `nuke_bbgamehash` VALUES('aa63eacff0b985227853ebbab58a3d2f', 1, 14, 1243798654);
INSERT INTO `nuke_bbgamehash` VALUES('d5daabfb1c1cf7ac3533114a5c26c2f5', 1, 14, 1243798569);
INSERT INTO `nuke_bbgamehash` VALUES('c5176e5b8e7f3c711d91ab608885f6f2', 1, 14, 1243799172);
INSERT INTO `nuke_bbgamehash` VALUES('04887b4f7591c9d5a755d073e488fd09', 1, 26, 1243869607);
INSERT INTO `nuke_bbgamehash` VALUES('e1a8c5aaf0a057af8884d3db957a773b', 1, 26, 1243869608);
INSERT INTO `nuke_bbgamehash` VALUES('c93c35ada756d320067e4e81692aed00', 1, 26, 1243869608);
INSERT INTO `nuke_bbgamehash` VALUES('5b6258ef67e44bfdf399861be8a511e5', 1, 26, 1243869797);
INSERT INTO `nuke_bbgamehash` VALUES('183552c7d3a11a68211e89f6199f3cb2', 1, 26, 1243869797);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbgames`
--

CREATE TABLE `nuke_bbgames` (
  `game_id` mediumint(8) NOT NULL auto_increment,
  `game_pic` varchar(50) NOT NULL default '',
  `game_desc` varchar(255) NOT NULL default '',
  `game_highscore` int(11) NOT NULL default '0',
  `game_highdate` int(11) NOT NULL default '0',
  `game_highuser` mediumint(8) NOT NULL default '0',
  `game_name` varchar(50) NOT NULL default '',
  `game_swf` varchar(50) NOT NULL default '',
  `game_scorevar` varchar(50) NOT NULL default '',
  `game_type` tinyint(4) NOT NULL default '0',
  `game_width` mediumint(5) NOT NULL default '550',
  `game_height` varchar(5) NOT NULL default '380',
  `game_order` mediumint(8) NOT NULL default '0',
  `game_set` mediumint(8) NOT NULL default '0',
  `arcade_catid` mediumint(8) NOT NULL default '1',
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_bbgames`
--

INSERT INTO `nuke_bbgames` VALUES(1, 'airport1.gif', '', 0, 0, 0, 'airport', 'airport.swf', 'airport', 3, 550, '380', 10, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbgroups`
--

CREATE TABLE `nuke_bbgroups` (
  `group_id` mediumint(8) NOT NULL auto_increment,
  `group_type` tinyint(4) NOT NULL default '1',
  `group_name` varchar(40) NOT NULL default '',
  `group_description` varchar(255) NOT NULL default '',
  `group_moderator` mediumint(8) NOT NULL default '0',
  `group_single_user` tinyint(1) NOT NULL default '1',
  `group_allow_pm` tinyint(2) NOT NULL default '5',
  `group_color` varchar(15) NOT NULL default '',
  `group_rank` varchar(5) NOT NULL default '0',
  `max_inbox` mediumint(10) NOT NULL default '100',
  `max_sentbox` mediumint(10) NOT NULL default '100',
  `max_savebox` mediumint(10) NOT NULL default '100',
  `override_max_inbox` tinyint(1) NOT NULL default '0',
  `override_max_sentbox` tinyint(1) NOT NULL default '0',
  `override_max_savebox` tinyint(1) NOT NULL default '0',
  `group_count` int(4) unsigned default '99999999',
  `group_count_max` int(4) unsigned default '99999999',
  `group_count_enable` smallint(2) unsigned default '0',
  PRIMARY KEY  (`group_id`),
  KEY `group_single_user` (`group_single_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nuke_bbgroups`
--

INSERT INTO `nuke_bbgroups` VALUES(1, 1, 'Anonymous', 'Personal User', 0, 1, 0, '', '', 0, 0, 0, 0, 0, 0, '99999999', '99999999', '0');
INSERT INTO `nuke_bbgroups` VALUES(3, 2, 'Moderators', 'Moderators of this Forum', 2, 0, 5, '', '', 0, 0, 0, 0, 0, 0, '99999999', '99999999', '0');
INSERT INTO `nuke_bbgroups` VALUES(5, 0, 'Users', 'Default Usergroup', 2, 0, 5, '', '', 0, 0, 0, 0, 0, 0, '99999999', '99999999', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbhackgame`
--

CREATE TABLE `nuke_bbhackgame` (
  `user_id` mediumint(8) NOT NULL,
  `game_id` mediumint(8) NOT NULL,
  `date_hack` int(11) NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbhackgame`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbinline_ads`
--

CREATE TABLE `nuke_bbinline_ads` (
  `ad_id` tinyint(5) NOT NULL auto_increment,
  `ad_code` text NOT NULL,
  `ad_name` char(25) NOT NULL,
  PRIMARY KEY  (`ad_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbinline_ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bblogs`
--

CREATE TABLE `nuke_bblogs` (
  `log_id` mediumint(10) NOT NULL auto_increment,
  `mode` varchar(50) default '',
  `topic_id` mediumint(10) default '0',
  `user_id` mediumint(8) default '0',
  `username` varchar(255) default '',
  `user_ip` varchar(8) NOT NULL default '0',
  `time` int(11) default '0',
  `new_topic_id` mediumint(10) NOT NULL default '0',
  `forum_id` mediumint(10) NOT NULL default '0',
  `new_forum_id` mediumint(10) NOT NULL default '0',
  `last_post_id` mediumint(10) NOT NULL default '0',
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bblogs`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bblogs_config`
--

CREATE TABLE `nuke_bblogs_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bblogs_config`
--

INSERT INTO `nuke_bblogs_config` VALUES('all_admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbposts`
--

CREATE TABLE `nuke_bbposts` (
  `post_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `poster_id` mediumint(8) NOT NULL default '0',
  `post_time` int(11) NOT NULL default '0',
  `poster_ip` varchar(8) NOT NULL default '',
  `post_username` varchar(25) default NULL,
  `enable_bbcode` tinyint(1) NOT NULL default '1',
  `enable_html` tinyint(1) NOT NULL default '0',
  `enable_smilies` tinyint(1) NOT NULL default '1',
  `enable_sig` tinyint(1) NOT NULL default '1',
  `post_edit_time` int(11) default NULL,
  `post_edit_count` smallint(5) unsigned NOT NULL default '0',
  `post_attachment` tinyint(1) NOT NULL default '0',
  `post_move` tinyint(1) NOT NULL default '0',
  `post_icon` tinyint(2) default NULL,
  PRIMARY KEY  (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `post_time` (`post_time`),
  KEY `post_icon` (`post_icon`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_bbposts`
--

INSERT INTO `nuke_bbposts` VALUES(2, 2, 1, 2, 1247494961, '4434c95e', '', 1, 1, 1, 0, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbposts_text`
--

CREATE TABLE `nuke_bbposts_text` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `bbcode_uid` varchar(10) NOT NULL default '',
  `post_subject` varchar(60) default NULL,
  `post_text` text,
  PRIMARY KEY  (`post_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbposts_text`
--

INSERT INTO `nuke_bbposts_text` VALUES(2, 'f749d4a527', 'Welcome to Nuke-Evolution Xtreme!', 'Thanks for installing Nuke-Evolution Xtreme Edition. The Evo Xtreme Team has put a lot of hard work into this release to make it the fastest, most functional and most secure version of PHP-Nuke ever. We encourage you to read through all of the included documentation so you fully understand the power within Evo.\n\nInside the original archive you downloaded you will find several folders containing helpful information.\n\nThe first is the &quot;Install&quot; folder which we hope you are already familiar with. This folder contains three documents which help you properly install and configure your new Evo site. If you haven''t fully gone through these already please do it now!\n\nThe second is the &quot;Help&quot; folder. Inside this folder you will find some very helpful documents that our team has put together to explain some of the features inside Evo. You will also find some documents that will help resolve a few errors you may run in to due to browser settings or improperly setup software.\n\nThe third is the &quot;Theme Edits&quot; folder. If you would like to convert a PHP-Nuke theme to work with Evo you must follow the provided instructions within this folder.\n\nWe trust that Evo will be the best Nuke software you have ever run. Enjoy and be sure to stop by www.evolution-xtreme.com for support, updates or just to say hi!\n\n- The Nuke-Evolution Team');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbpost_reports`
--

CREATE TABLE `nuke_bbpost_reports` (
  `report_id` mediumint(8) NOT NULL auto_increment,
  `post_id` mediumint(8) NOT NULL default '0',
  `reporter_id` mediumint(8) NOT NULL default '0',
  `report_status` tinyint(1) NOT NULL default '0',
  `report_time` int(11) NOT NULL default '0',
  `report_comments` text,
  `last_action_user_id` mediumint(8) default '0',
  `last_action_time` int(11) NOT NULL default '0',
  `last_action_comments` text,
  PRIMARY KEY  (`report_id`)
);

--
-- Dumping data for table `nuke_bbpost_reports`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbprivmsgs`
--

CREATE TABLE `nuke_bbprivmsgs` (
  `privmsgs_id` mediumint(8) unsigned NOT NULL auto_increment,
  `privmsgs_type` tinyint(4) NOT NULL default '0',
  `privmsgs_subject` varchar(255) NOT NULL default '0',
  `privmsgs_from_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_to_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_date` int(11) NOT NULL default '0',
  `privmsgs_ip` varchar(8) NOT NULL default '',
  `privmsgs_enable_bbcode` tinyint(1) NOT NULL default '1',
  `privmsgs_enable_html` tinyint(1) NOT NULL default '0',
  `privmsgs_enable_smilies` tinyint(1) NOT NULL default '1',
  `privmsgs_attach_sig` tinyint(1) NOT NULL default '1',
  `privmsgs_attachment` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`privmsgs_id`),
  KEY `privmsgs_from_userid` (`privmsgs_from_userid`),
  KEY `privmsgs_to_userid` (`privmsgs_to_userid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbprivmsgs`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbprivmsgs_archive`
--

CREATE TABLE `nuke_bbprivmsgs_archive` (
  `privmsgs_id` mediumint(8) unsigned NOT NULL auto_increment,
  `privmsgs_type` tinyint(4) NOT NULL default '0',
  `privmsgs_subject` varchar(255) NOT NULL default '0',
  `privmsgs_from_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_to_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_date` int(11) NOT NULL default '0',
  `privmsgs_ip` varchar(8) NOT NULL default '',
  `privmsgs_enable_bbcode` tinyint(1) NOT NULL default '1',
  `privmsgs_enable_html` tinyint(1) NOT NULL default '0',
  `privmsgs_enable_smilies` tinyint(1) NOT NULL default '1',
  `privmsgs_attach_sig` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`privmsgs_id`),
  KEY `privmsgs_from_userid` (`privmsgs_from_userid`),
  KEY `privmsgs_to_userid` (`privmsgs_to_userid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbprivmsgs_archive`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbprivmsgs_text`
--

CREATE TABLE `nuke_bbprivmsgs_text` (
  `privmsgs_text_id` mediumint(8) unsigned NOT NULL default '0',
  `privmsgs_bbcode_uid` varchar(10) NOT NULL default '0',
  `privmsgs_text` text,
  PRIMARY KEY  (`privmsgs_text_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbprivmsgs_text`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbquicksearch`
--

CREATE TABLE `nuke_bbquicksearch` (
  `search_id` mediumint(8) unsigned NOT NULL auto_increment,
  `search_name` varchar(255) NOT NULL default '',
  `search_url1` varchar(255) NOT NULL default '',
  `search_url2` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`search_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_bbquicksearch`
--

INSERT INTO `nuke_bbquicksearch` VALUES(1, 'Google', 'http://www.google.com/search?hl=en&ie=UTF-8&oe=UTF-8&q=', '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbquota_limits`
--

CREATE TABLE `nuke_bbquota_limits` (
  `quota_limit_id` mediumint(8) unsigned NOT NULL auto_increment,
  `quota_desc` varchar(20) NOT NULL default '',
  `quota_limit` bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (`quota_limit_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbquota_limits`
--

INSERT INTO `nuke_bbquota_limits` (quota_limit_id, quota_desc, quota_limit) VALUES (1, 'Low', 262144);
INSERT INTO `nuke_bbquota_limits` (quota_limit_id, quota_desc, quota_limit) VALUES (2, 'Medium', 2097152);
INSERT INTO `nuke_bbquota_limits` (quota_limit_id, quota_desc, quota_limit) VALUES (3, 'High', 5242880);


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbranks`
--

CREATE TABLE `nuke_bbranks` (
  `rank_id` smallint(5) unsigned NOT NULL auto_increment,
  `rank_title` varchar(100) NOT NULL default '',
  `rank_min` mediumint(8) NOT NULL default '0',
  `rank_special` tinyint(1) default '0',
  `rank_image` varchar(255) default NULL,
  PRIMARY KEY  (`rank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nuke_bbranks`
--

INSERT INTO `nuke_bbranks` VALUES(1, 'Site Owner', -1, 1, 'images/ranks/site_owner.gif');
INSERT INTO `nuke_bbranks` VALUES(2, 'Site Admin', -1, 1, 'images/ranks/admin.gif');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbreputation`
--

CREATE TABLE `nuke_bbreputation` (
  `user_id` mediumint(8) NOT NULL default '0',
  `user_id_2` mediumint(8) NOT NULL default '0',
  `post_id` mediumint(8) NOT NULL default '0',
  `rep_sum` float NOT NULL default '0',
  `rep_neg` tinyint(1) NOT NULL default '0',
  `rep_comment` varchar(200) NOT NULL default '',
  `rep_time` int(11) NOT NULL default '0',
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbreputation`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbreputation_config`
--

CREATE TABLE `nuke_bbreputation_config` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbreputation_config`
--

INSERT INTO `nuke_bbreputation_config` VALUES('posts_to_earn', '5');
INSERT INTO `nuke_bbreputation_config` VALUES('rep_disable', '0');
INSERT INTO `nuke_bbreputation_config` VALUES('days_to_earn', '30');
INSERT INTO `nuke_bbreputation_config` VALUES('flood_control_time', '30');
INSERT INTO `nuke_bbreputation_config` VALUES('graphic_version', '0');
INSERT INTO `nuke_bbreputation_config` VALUES('medal4_to_earn', '10');
INSERT INTO `nuke_bbreputation_config` VALUES('medal3_to_earn', '50');
INSERT INTO `nuke_bbreputation_config` VALUES('medal2_to_earn', '100');
INSERT INTO `nuke_bbreputation_config` VALUES('medal1_to_earn', '200');
INSERT INTO `nuke_bbreputation_config` VALUES('given_rep_to_earn', '20');
INSERT INTO `nuke_bbreputation_config` VALUES('show_stats_to_mods', '0');
INSERT INTO `nuke_bbreputation_config` VALUES('repsum_limit', '0');
INSERT INTO `nuke_bbreputation_config` VALUES('pm_notify', '0');
INSERT INTO `nuke_bbreputation_config` VALUES('default_amount', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbscores`
--

CREATE TABLE `nuke_bbscores` (
  `game_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `score_game` int(11) NOT NULL default '0',
  `score_date` int(11) NOT NULL default '0',
  `score_time` int(11) NOT NULL default '0',
  `score_set` mediumint(8) NOT NULL default '0',
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbscores`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbsearch_rebuild`
--

CREATE TABLE `nuke_bbsearch_rebuild` (
  `rebuild_session_id` mediumint(8) unsigned NOT NULL auto_increment,
  `start_post_id` mediumint(8) unsigned NOT NULL default '0',
  `end_post_id` mediumint(8) unsigned NOT NULL default '0',
  `start_time` int(11) NOT NULL default '0',
  `end_time` int(11) NOT NULL default '0',
  `last_cycle_time` int(11) NOT NULL default '0',
  `session_time` int(11) NOT NULL default '0',
  `session_posts` mediumint(8) unsigned NOT NULL default '0',
  `session_cycles` mediumint(8) unsigned NOT NULL default '0',
  `search_size` int(10) unsigned NOT NULL default '0',
  `rebuild_session_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`rebuild_session_id`),
  KEY `end_post_id` (`end_post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_bbsearch_rebuild`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbsearch_results`
--

CREATE TABLE `nuke_bbsearch_results` (
  `search_id` int(11) unsigned NOT NULL default '0',
  `session_id` varchar(32) NOT NULL default '',
  `search_array` text NOT NULL,
  `search_time` int(11) NOT NULL default '0',
  PRIMARY KEY  (`search_id`),
  KEY `session_id` (`session_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbsearch_results`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbsearch_wordlist`
--

CREATE TABLE `nuke_bbsearch_wordlist` (
   `word_text` varchar(255) binary NOT NULL DEFAULT '',
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word_common` mediumint(8) unsigned NOT NULL default '0',
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`word_text`),
  KEY `word_id` (`word_id`)
);

--
-- Dumping data for table `nuke_bbsearch_wordlist`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbsearch_wordmatch`
--

CREATE TABLE `nuke_bbsearch_wordmatch` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `word_id` mediumint(8) unsigned NOT NULL default '0',
  `title_match` tinyint(1) NOT NULL default '0',
  INDEX `post_id` (`post_id`),
  KEY `word_id` (`word_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbsearch_wordmatch`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbsessions`
--

CREATE TABLE `nuke_bbsessions` (
  `session_id` varchar(32) NOT NULL default '',
  `session_user_id` mediumint(8) NOT NULL default '0',
  `session_start` int(11) NOT NULL default '0',
  `session_time` int(11) NOT NULL default '0',
  `session_ip` varchar(8) NOT NULL default '0',
  `session_page` int(11) NOT NULL default '0',
  `session_logged_in` tinyint(1) NOT NULL default '0',
  `session_admin` tinyint(2) NOT NULL default '0',
  `session_url_qs` text NOT NULL,
  `session_url_ps` text NOT NULL,
  `session_url_specific` int(10) NOT NULL default '0',
  PRIMARY KEY  (`session_id`),
  KEY `session_user_id` (`session_user_id`),
  KEY `session_id_ip_user_id` (`session_id`,`session_ip`,`session_user_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbsessions`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbsessions_keys`
--

CREATE TABLE `nuke_bbsessions_keys` (
    `key_id` varchar(32) DEFAULT '0' NOT NULL,
    `user_id` mediumint(8) DEFAULT '0' NOT NULL,
    `last_ip` varchar(8) DEFAULT '0' NOT NULL,
    `last_login` int(11) DEFAULT '0' NOT NULL,
    PRIMARY KEY (key_id, user_id),
    KEY last_login (last_login)
);


--
-- Dumping data for table `nuke_bbsessions_keys`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbsmilies`
--

CREATE TABLE `nuke_bbsmilies` (
  `smilies_id` smallint(5) unsigned NOT NULL auto_increment,
  `code` varchar(50) default NULL,
  `smile_url` varchar(100) default NULL,
  `emoticon` varchar(75) default NULL,
  `smile_stat` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`smilies_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 ;

--
-- Dumping data for table `nuke_bbsmilies`
--

INSERT INTO `nuke_bbsmilies` VALUES(1, ':D', 'icon_biggrin.gif', 'Very Happy', 0);
INSERT INTO `nuke_bbsmilies` VALUES(2, ':-D', 'icon_biggrin.gif', 'Very Happy', 0);
INSERT INTO `nuke_bbsmilies` VALUES(3, ':grin:', 'icon_biggrin.gif', 'Very Happy', 0);
INSERT INTO `nuke_bbsmilies` VALUES(4, ':)', 'icon_smile.gif', 'Smile', 0);
INSERT INTO `nuke_bbsmilies` VALUES(5, ':-)', 'icon_smile.gif', 'Smile', 0);
INSERT INTO `nuke_bbsmilies` VALUES(6, ':smile:', 'icon_smile.gif', 'Smile', 0);
INSERT INTO `nuke_bbsmilies` VALUES(7, ':(', 'icon_sad.gif', 'Sad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(8, ':-(', 'icon_sad.gif', 'Sad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(9, ':sad:', 'icon_sad.gif', 'Sad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(10, ':o', 'icon_surprised.gif', 'Surprised', 0);
INSERT INTO `nuke_bbsmilies` VALUES(11, ':-o', 'icon_surprised.gif', 'Surprised', 0);
INSERT INTO `nuke_bbsmilies` VALUES(12, ':eek:', 'icon_surprised.gif', 'Surprised', 0);
INSERT INTO `nuke_bbsmilies` VALUES(13, '8O', 'icon_eek.gif', 'Shocked', 0);
INSERT INTO `nuke_bbsmilies` VALUES(14, '8-O', 'icon_eek.gif', 'Shocked', 0);
INSERT INTO `nuke_bbsmilies` VALUES(15, ':shock:', 'icon_eek.gif', 'Shocked', 0);
INSERT INTO `nuke_bbsmilies` VALUES(16, ':?', 'icon_confused.gif', 'Confused', 0);
INSERT INTO `nuke_bbsmilies` VALUES(17, ':-?', 'icon_confused.gif', 'Confused', 0);
INSERT INTO `nuke_bbsmilies` VALUES(18, ':???:', 'icon_confused.gif', 'Confused', 0);
INSERT INTO `nuke_bbsmilies` VALUES(19, '8)', 'icon_cool.gif', 'Cool', 0);
INSERT INTO `nuke_bbsmilies` VALUES(20, '8-)', 'icon_cool.gif', 'Cool', 0);
INSERT INTO `nuke_bbsmilies` VALUES(21, ':cool:', 'icon_cool.gif', 'Cool', 0);
INSERT INTO `nuke_bbsmilies` VALUES(22, ':lol:', 'icon_lol.gif', 'Laughing', 0);
INSERT INTO `nuke_bbsmilies` VALUES(23, ':x', 'icon_mad.gif', 'Mad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(24, ':-x', 'icon_mad.gif', 'Mad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(25, ':mad:', 'icon_mad.gif', 'Mad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(26, ':P', 'icon_razz.gif', 'Razz', 0);
INSERT INTO `nuke_bbsmilies` VALUES(27, ':-P', 'icon_razz.gif', 'Razz', 0);
INSERT INTO `nuke_bbsmilies` VALUES(28, ':razz:', 'icon_razz.gif', 'Razz', 0);
INSERT INTO `nuke_bbsmilies` VALUES(29, ':oops:', 'icon_redface.gif', 'Embarassed', 0);
INSERT INTO `nuke_bbsmilies` VALUES(30, ':cry:', 'icon_cry.gif', 'Crying or Very sad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(31, ':evil:', 'icon_evil.gif', 'Evil or Very Mad', 0);
INSERT INTO `nuke_bbsmilies` VALUES(32, ':twisted:', 'icon_twisted.gif', 'Twisted Evil', 0);
INSERT INTO `nuke_bbsmilies` VALUES(33, ':roll:', 'icon_rolleyes.gif', 'Rolling Eyes', 0);
INSERT INTO `nuke_bbsmilies` VALUES(34, ':wink:', 'icon_wink.gif', 'Wink', 0);
INSERT INTO `nuke_bbsmilies` VALUES(35, ';)', 'icon_wink.gif', 'Wink', 0);
INSERT INTO `nuke_bbsmilies` VALUES(36, ';-)', 'icon_wink.gif', 'Wink', 0);
INSERT INTO `nuke_bbsmilies` VALUES(37, ':!:', 'icon_exclaim.gif', 'Exclamation', 0);
INSERT INTO `nuke_bbsmilies` VALUES(38, ':?:', 'icon_question.gif', 'Question', 0);
INSERT INTO `nuke_bbsmilies` VALUES(39, ':idea:', 'icon_idea.gif', 'Idea', 0);
INSERT INTO `nuke_bbsmilies` VALUES(40, ':arrow:', 'icon_arrow.gif', 'Arrow', 0);
INSERT INTO `nuke_bbsmilies` VALUES(41, ':|', 'icon_neutral.gif', 'Neutral', 0);
INSERT INTO `nuke_bbsmilies` VALUES(42, ':-|', 'icon_neutral.gif', 'Neutral', 0);
INSERT INTO `nuke_bbsmilies` VALUES(43, ':neutral:', 'icon_neutral.gif', 'Neutral', 0);
INSERT INTO `nuke_bbsmilies` VALUES(44, ':mrgreen:', 'icon_mrgreen.gif', 'Mr. Green', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_config`
--

CREATE TABLE `nuke_bbstats_config` (
  `config_name` varchar(100) NOT NULL default '',
  `config_value` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbstats_config`
--

INSERT INTO `nuke_bbstats_config` VALUES('install_date', '0');
INSERT INTO `nuke_bbstats_config` VALUES('return_limit', '10');
INSERT INTO `nuke_bbstats_config` VALUES('version', '3.0.0');
INSERT INTO `nuke_bbstats_config` VALUES('page_views', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_modules`
--

CREATE TABLE `nuke_bbstats_modules` (
  `module_id` mediumint(8) unsigned NOT NULL auto_increment,
  `short_name` varchar(100) default NULL,
  `update_time` mediumint(8) NOT NULL default '0',
  `module_order` mediumint(8) NOT NULL default '0',
  `active` tinyint(2) NOT NULL default '0',
  `perm_all` tinyint(2) unsigned NOT NULL default '1',
  `perm_reg` tinyint(2) unsigned NOT NULL default '1',
  `perm_mod` tinyint(2) unsigned NOT NULL default '1',
  `perm_admin` tinyint(2) unsigned NOT NULL default '1',
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 ;

--
-- Dumping data for table `nuke_bbstats_modules`
--

INSERT INTO `nuke_bbstats_modules` VALUES(1, 'stats_overview', 360, 10, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(2, 'top_posters', 360, 30, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(3, 'admin_statistics', 360, 20, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(4, 'most_viewed_topics', 360, 80, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(5, 'top_posters_month', 360, 60, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(6, 'topics_by_month', 360, 100, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(7, 'most_interesting_topics', 360, 120, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(8, 'top_words', 360, 90, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(9, 'least_interesting_topics', 360, 130, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(10, 'most_active_topicstarter', 360, 40, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(11, 'top_smilies', 0, 110, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(12, 'users_by_month', 360, 140, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(13, 'posts_by_month', 360, 150, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(14, 'top_posters_week', 360, 50, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(15, 'top_attachments', 360, 160, 1, 1, 1, 1, 1);
INSERT INTO `nuke_bbstats_modules` VALUES(16, 'most_active_topics', 360, 70, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_module_admin_panel`
--

CREATE TABLE `nuke_bbstats_module_admin_panel` (
  `module_id` mediumint(8) unsigned NOT NULL default '0',
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  `config_type` varchar(20) NOT NULL default '',
  `config_title` varchar(100) NOT NULL default '',
  `config_explain` varchar(100) default NULL,
  `config_trigger` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbstats_module_admin_panel`
--

INSERT INTO `nuke_bbstats_module_admin_panel` VALUES(1, 'num_columns', '2', 'number', 'num_columns_title', 'num_columns_explain', 'integer');
INSERT INTO `nuke_bbstats_module_admin_panel` VALUES(15, 'exclude_images', '0', 'number', 'exclude_images_title', 'exclude_images_explain', 'enum');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_module_cache`
--

CREATE TABLE `nuke_bbstats_module_cache` (
  `module_id` mediumint(8) NOT NULL default '0',
  `module_cache_time` int(12) NOT NULL default '0',
  `db_cache` text NOT NULL,
  `priority` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbstats_module_cache`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_module_group_auth`
--

CREATE TABLE `nuke_bbstats_module_group_auth` (
  `module_id` mediumint(8) unsigned NOT NULL default '0',
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbstats_module_group_auth`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_module_info`
--

CREATE TABLE `nuke_bbstats_module_info` (
  `module_id` mediumint(8) NOT NULL default '0',
  `long_name` varchar(100) NOT NULL default '',
  `author` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `url` varchar(100) default NULL,
  `version` varchar(10) NOT NULL default '',
  `update_site` varchar(100) default NULL,
  `extra_info` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbstats_module_info`
--

INSERT INTO `nuke_bbstats_module_info` VALUES(1, 'Statistics Overview Section', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module will print out a link Block with Links to the current Module at the Statistics Site.\nYou are able to define the number of columns displayed for this Module within the Administration Panel -&gt; Edit Module.');
INSERT INTO `nuke_bbstats_module_info` VALUES(2, 'Top Posters', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module displays the Top Posters from your board.\nAnonymous Poster are not counted.');
INSERT INTO `nuke_bbstats_module_info` VALUES(3, 'Administrative Statistics', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module displays some Admin Statistics about your Board.\nIt is nearly the same you are able to see within the first Administration Panel visit.');
INSERT INTO `nuke_bbstats_module_info` VALUES(4, 'Most viewed topics', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module displays the most viewed topics at your board.');
INSERT INTO `nuke_bbstats_module_info` VALUES(5, 'Top Posters this Month (Site History Mod)', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module does NOT require the Site History Mod,\nit will display the Top Posters on a Monthly basis.');
INSERT INTO `nuke_bbstats_module_info` VALUES(6, 'New topics by month', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module will display the topics created at your Board in a monthly statistic.');
INSERT INTO `nuke_bbstats_module_info` VALUES(7, 'Most Interesting Topics', 'JRSweets', 'JRSweets@gmail.com', 'http://www.jeffrusso.net', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This module will show the most intresting topics.');
INSERT INTO `nuke_bbstats_module_info` VALUES(8, 'Top Words', 'JRSweets', 'JRSweets@gmail.com', 'http://www.jeffrusso.net', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module displays the most used words on your board.');
INSERT INTO `nuke_bbstats_module_info` VALUES(9, 'Least Interesting Topics', 'JRSweets', 'JRSweets@gmail.com', 'http://www.jeffrusso.net', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This module will show the least intresting topics.');
INSERT INTO `nuke_bbstats_module_info` VALUES(10, 'Most Active Topicstarter', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module displays the most active topicstarter on your board.\nAnonymous Poster are not counted.');
INSERT INTO `nuke_bbstats_module_info` VALUES(11, 'Top Smilies', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module displays the Top Smilies used at your board.\nThis Module uses an Smilie Index Table for caching the smilie data and to not\nrequire re-indexing of all posts.');
INSERT INTO `nuke_bbstats_module_info` VALUES(12, 'New users by month', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module will display the users registered to your Board in a monthly statistic.');
INSERT INTO `nuke_bbstats_module_info` VALUES(13, 'New posts by month', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module will display the posts created at your Board in a monthly statistic.');
INSERT INTO `nuke_bbstats_module_info` VALUES(14, 'Top Posters this Week (Site History Mod)', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module does NOT require the Site History Mod,\nit will display the Top Posters on a Weekly basis.');
INSERT INTO `nuke_bbstats_module_info` VALUES(15, 'Top Downloaded Attachments', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module will print out the most downloaded Files.\nThe Attachment Mod Version 2.3.x have to be installed in order to let this Module work.\nYou are able to exclude Images from the statistic too.');
INSERT INTO `nuke_bbstats_module_info` VALUES(16, 'Most active Topics', 'Acyd Burn', 'acyd.burn@gmx.de', 'http://www.opentools.de', '3.0.0', 'http://www.opentools.de/board/show_modules.php', 'This Module displays the most active topics at your board.');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_smilies_index`
--

CREATE TABLE `nuke_bbstats_smilies_index` (
  `code` varchar(50) NOT NULL default '',
  `smile_url` varchar(100) default NULL,
  `smile_count` mediumint(8) default '0',
  PRIMARY KEY  (`code`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbstats_smilies_index`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbstats_smilies_info`
--

CREATE TABLE `nuke_bbstats_smilies_info` (
  `last_post_id` mediumint(8) NOT NULL default '0',
  `last_update_time` int(12) NOT NULL default '0',
  `update_time` mediumint(8) NOT NULL default '10080',
  PRIMARY KEY  (`last_post_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbstats_smilies_info`
--

INSERT INTO `nuke_bbstats_smilies_info` VALUES(0, 0, 10080);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbthanks`
--

CREATE TABLE `nuke_bbthanks` (
  `topic_id` mediumint(8) NOT NULL,
  `user_id` mediumint(8) NOT NULL,
  `thanks_time` int(11) NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbthanks`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbthemes`
--

CREATE TABLE `nuke_bbthemes` (
  `themes_id` mediumint(8) unsigned NOT NULL auto_increment,
  `template_name` varchar(30) NOT NULL default '',
  `style_name` varchar(30) NOT NULL default '',
  `head_stylesheet` varchar(100) default NULL,
  `body_background` varchar(100) default NULL,
  `body_bgcolor` varchar(6) default NULL,
  `body_text` varchar(6) default NULL,
  `body_link` varchar(6) default NULL,
  `body_vlink` varchar(6) default NULL,
  `body_alink` varchar(6) default NULL,
  `body_hlink` varchar(6) default NULL,
  `tr_color1` varchar(6) default NULL,
  `tr_color2` varchar(6) default NULL,
  `tr_color3` varchar(6) default NULL,
  `tr_class1` varchar(25) default NULL,
  `tr_class2` varchar(25) default NULL,
  `tr_class3` varchar(25) default NULL,
  `th_color1` varchar(6) default NULL,
  `th_color2` varchar(6) default NULL,
  `th_color3` varchar(6) default NULL,
  `th_class1` varchar(25) default NULL,
  `th_class2` varchar(25) default NULL,
  `th_class3` varchar(25) default NULL,
  `td_color1` varchar(6) default NULL,
  `td_color2` varchar(6) default NULL,
  `td_color3` varchar(6) default NULL,
  `td_class1` varchar(25) default NULL,
  `td_class2` varchar(25) default NULL,
  `td_class3` varchar(25) default NULL,
  `fontface1` varchar(50) default NULL,
  `fontface2` varchar(50) default NULL,
  `fontface3` varchar(50) default NULL,
  `fontsize1` tinyint(4) default NULL,
  `fontsize2` tinyint(4) default NULL,
  `fontsize3` tinyint(4) default NULL,
  `fontcolor1` varchar(6) default NULL,
  `fontcolor2` varchar(6) default NULL,
  `fontcolor3` varchar(6) default NULL,
  `span_class1` varchar(25) default NULL,
  `span_class2` varchar(25) default NULL,
  `span_class3` varchar(25) default NULL,
  `img_size_poll` smallint(5) unsigned default NULL,
  `img_size_privmsg` smallint(5) unsigned default NULL,
  `online_color` varchar(6) NOT NULL default '',
  `offline_color` varchar(6) NOT NULL default '',
  `hidden_color` varchar(6) NOT NULL default '',
  PRIMARY KEY  (`themes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_bbthemes`
--

INSERT INTO `nuke_bbthemes` VALUES(1, 'subSilver', 'subSilver', 'subSilver.css', '', '0E3259', '000000', '006699', '5493B4', '', 'DD6900', 'EFEFEF', 'DEE3E7', 'D1D7DC', '', '', '', '98AAB1', '006699', 'FFFFFF', 'cellpic1.gif', 'cellpic3.gif', 'cellpic2.jpg', 'FAFAFA', 'FFFFFF', '', 'row1', 'row2', '', 'Verdana, Arial, Helvetica, sans-serif', 'Trebuchet MS', 'Courier, ''Courier New'', sans-serif', 10, 11, 12, '444444', '006600', 'FFA34F', '', '', '', NULL, NULL, '008500', 'DF0000', 'EBD400');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbthemes_name`
--

CREATE TABLE `nuke_bbthemes_name` (
  `themes_id` smallint(5) unsigned NOT NULL default '0',
  `tr_color1_name` char(50) default NULL,
  `tr_color2_name` char(50) default NULL,
  `tr_color3_name` char(50) default NULL,
  `tr_class1_name` char(50) default NULL,
  `tr_class2_name` char(50) default NULL,
  `tr_class3_name` char(50) default NULL,
  `th_color1_name` char(50) default NULL,
  `th_color2_name` char(50) default NULL,
  `th_color3_name` char(50) default NULL,
  `th_class1_name` char(50) default NULL,
  `th_class2_name` char(50) default NULL,
  `th_class3_name` char(50) default NULL,
  `td_color1_name` char(50) default NULL,
  `td_color2_name` char(50) default NULL,
  `td_color3_name` char(50) default NULL,
  `td_class1_name` char(50) default NULL,
  `td_class2_name` char(50) default NULL,
  `td_class3_name` char(50) default NULL,
  `fontface1_name` char(50) default NULL,
  `fontface2_name` char(50) default NULL,
  `fontface3_name` char(50) default NULL,
  `fontsize1_name` char(50) default NULL,
  `fontsize2_name` char(50) default NULL,
  `fontsize3_name` char(50) default NULL,
  `fontcolor1_name` char(50) default NULL,
  `fontcolor2_name` char(50) default NULL,
  `fontcolor3_name` char(50) default NULL,
  `span_class1_name` char(50) default NULL,
  `span_class2_name` char(50) default NULL,
  `span_class3_name` char(50) default NULL,
  PRIMARY KEY  (`themes_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbthemes_name`
--

INSERT INTO `nuke_bbthemes_name` VALUES(1, 'The lightest row colour', 'The medium row color', 'The darkest row colour', '', '', '', 'Border round the whole page', 'Outer table border', 'Inner table border', 'Silver gradient picture', 'Blue gradient picture', 'Fade-out gradient on index', 'Background for quote boxes', 'All white areas', '', 'Background for topic posts', '2nd background for topic posts', '', 'Main fonts', 'Additional topic title font', 'Form fonts', 'Smallest font size', 'Medium font size', 'Normal font size (post body etc)', 'Quote & copyright text', 'Code text colour', 'Main table header text colour', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbtopics`
--

CREATE TABLE `nuke_bbtopics` (
  `topic_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(8) unsigned NOT NULL default '0',
  `topic_title` char(60) NOT NULL default '',
  `topic_poster` mediumint(8) NOT NULL default '0',
  `topic_time` int(11) NOT NULL default '0',
  `topic_views` mediumint(8) unsigned NOT NULL default '0',
  `topic_replies` mediumint(8) unsigned NOT NULL default '0',
  `topic_status` tinyint(3) NOT NULL default '0',
  `topic_vote` tinyint(1) NOT NULL default '0',
  `topic_type` tinyint(3) NOT NULL default '0',
  `topic_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_first_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_moved_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_priority` smallint(6) NOT NULL default '0',
  `topic_attachment` tinyint(1) NOT NULL default '0',
  `topic_glance_priority` smallint(6) NOT NULL default '0',
  `topic_icon` tinyint(2) default NULL,
  PRIMARY KEY  (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_moved_id` (`topic_moved_id`),
  KEY `topic_status` (`topic_status`),
  KEY `topic_type` (`topic_type`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbtopics`
--

INSERT INTO `nuke_bbtopics` VALUES(2, 1, 'Welcome to Nuke-Evolution Xtreme!', 2, 1247494961, 8, 0, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbtopics_email`
--

CREATE TABLE `nuke_bbtopics_email` (
  `user_id` mediumint(8) NOT NULL,
  `friend_name` varchar(100) NOT NULL,
  `friend_email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL default '',
  `topic_id` mediumint(8) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbtopics_email`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbtopics_watch`
--

CREATE TABLE `nuke_bbtopics_watch` (
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `notify_status` tinyint(1) NOT NULL default '0',
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_status` (`notify_status`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbtopics_watch`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbtopic_moved`
--

CREATE TABLE `nuke_bbtopic_moved` (
  `moved_id` mediumint(8) unsigned NOT NULL auto_increment,
  `moved_topic_id` mediumint(8) unsigned NOT NULL default '0',
  `moved_oldtopic_id` mediumint(8) unsigned default '0',
  `moved_type` varchar(8) NOT NULL default '0',
  `moved_parent` mediumint(8) unsigned default '0',
  `moved_target` mediumint(8) unsigned default '0',
  `moved_mod` mediumint(8) NOT NULL default '0',
  `moved_time` int(11) NOT NULL default '0',
  `last_post_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`moved_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbtopic_moved`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbuser_group`
--

CREATE TABLE `nuke_bbuser_group` (
  `group_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `user_pending` tinyint(1) default NULL,
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbuser_group`
--

INSERT INTO `nuke_bbuser_group` VALUES(1, -1, 0);
INSERT INTO `nuke_bbuser_group` VALUES(3, 2, 0);
INSERT INTO `nuke_bbuser_group` VALUES(5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbvote_desc`
--

CREATE TABLE `nuke_bbvote_desc` (
  `vote_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_text` text NOT NULL,
  `vote_start` int(11) NOT NULL default '0',
  `vote_length` int(11) NOT NULL default '0',
  `poll_view_toggle` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`vote_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbvote_desc`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbvote_results`
--

CREATE TABLE `nuke_bbvote_results` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_option_id` tinyint(4) unsigned NOT NULL default '0',
  `vote_option_text` varchar(255) NOT NULL default '',
  `vote_result` int(11) NOT NULL default '0',
  KEY `vote_option_id` (`vote_option_id`),
  KEY `vote_id` (`vote_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbvote_results`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbvote_voters`
--

CREATE TABLE `nuke_bbvote_voters` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_user_id` mediumint(8) NOT NULL default '0',
  `vote_user_ip` char(8) NOT NULL default '',
  `vote_cast` tinyint(4) unsigned NOT NULL default '0',
  KEY `vote_id` (`vote_id`),
  KEY `vote_user_id` (`vote_user_id`),
  KEY `vote_user_ip` (`vote_user_ip`),
  KEY `vote_cast` (`vote_cast`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbvote_voters`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbwords`
--

CREATE TABLE `nuke_bbwords` (
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word` char(100) NOT NULL default '',
  `replacement` char(100) NOT NULL default '',
  PRIMARY KEY  (`word_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_bbwords`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbxdata_auth`
--

CREATE TABLE `nuke_bbxdata_auth` (
  `field_id` smallint(5) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  `auth_value` tinyint(1) NOT NULL
);

--
-- Dumping data for table `nuke_bbxdata_auth`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbxdata_data`
--

CREATE TABLE `nuke_bbxdata_data` (
  `field_id` smallint(5) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `xdata_value` text NOT NULL
);

--
-- Dumping data for table `nuke_bbxdata_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_bbxdata_fields`
--

CREATE TABLE `nuke_bbxdata_fields` (
  `field_id` smallint(5) unsigned NOT NULL,
  `field_name` varchar(255) NOT NULL default '',
  `field_desc` text NOT NULL,
  `field_type` varchar(255) NOT NULL default '',
  `field_order` smallint(5) unsigned NOT NULL default '0',
  `code_name` varchar(255) NOT NULL default '',
  `field_length` mediumint(8) unsigned NOT NULL default '0',
  `field_values` text NOT NULL,
  `field_regexp` text NOT NULL,
  `manditory` tinyint(1) NOT NULL default '0',
  `default_auth` tinyint(1) NOT NULL default '1',
  `display_register` tinyint(1) NOT NULL default '1',
  `display_viewprofile` tinyint(1) NOT NULL default '0',
  `display_posting` tinyint(1) NOT NULL default '0',
  `handle_input` tinyint(1) NOT NULL default '0',
  `allow_html` tinyint(1) NOT NULL default '0',
  `allow_bbcode` tinyint(1) NOT NULL default '0',
  `allow_smilies` tinyint(1) NOT NULL default '0',
  `viewtopic` tinyint(1) NOT NULL default '0',
  `signup` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`field_id`),
  UNIQUE KEY `code_name` (`code_name`)
);

--
-- Dumping data for table `nuke_bbxdata_fields`
--

INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (1, 'ICQ Number', 'special', '1', 'icq', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (2, 'AIM Address', 'special', '2', 'aim', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (3, 'MSN Messenger', 'special', '3', 'msn', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (4, 'Yahoo Messenger', 'special', '4', 'yim', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (5, 'Website', 'special', '5', 'website', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (6, 'Location', 'special', '6', 'location', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (7, 'Occupation', 'special', '7', 'occupation', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (8, 'Interests', 'special', '8', 'interests', 2);
INSERT INTO `nuke_bbxdata_fields` (field_id, field_name, field_type, field_order, code_name, display_register) VALUES (9, 'Signature', 'special', '9', 'signature', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_blocks`
--

CREATE TABLE `nuke_blocks` (
  `bid` int(10) NOT NULL auto_increment,
  `bkey` varchar(15) NOT NULL default '',
  `title` varchar(60) NOT NULL default '',
  `content` text NOT NULL,
  `url` varchar(200) NOT NULL default '',
  `bposition` char(1) NOT NULL default '',
  `weight` int(10) NOT NULL default '1',
  `active` int(1) NOT NULL default '1',
  `refresh` int(10) NOT NULL default '0',
  `time` varchar(14) NOT NULL default '0',
  `blanguage` varchar(30) NOT NULL default '',
  `blockfile` varchar(255) NOT NULL default '',
  `view` VARCHAR( 50 ) NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `title` (`title`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_blocks`
--

INSERT INTO `nuke_blocks` VALUES(1, '', 'Main Menu', '', '', 'l', 1, 1, 1800, '0', '', 'block-Modules.php', '1');
INSERT INTO `nuke_blocks` VALUES(2, '', 'Administration', '', '', 'l', 0, 1, 0, '', '', 'block-Administration.php', '4');
INSERT INTO `nuke_blocks` VALUES(3, '', 'Search', '', '', 'l', 4, 1, 3600, '', '', 'block-Search.php', '0');
INSERT INTO `nuke_blocks` VALUES(4, '', 'Survey', '', '', 'r', 4, 0, 3600, '', '', 'block-Survey.php', '0');
INSERT INTO `nuke_blocks` VALUES(5, '', 'Information', '<br /><center><span class="content">\r\n<a href="http://phpnuke.org"><img src="images/powered/powered8.jpg" border="0" alt="Powered by PHP-Nuke" title="Powered by PHP-Nuke" width="88" height="31" /></a>\r\n<br /><br />\r\n<a href="http://validator.w3.org/check/referer"><img src="images/html401.gif" width="88" height="31" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" border="0" /></a>\r\n<br /><br />\r\n<a href="http://jigsaw.w3.org/css-validator"><img src="images/css.gif" width="88" height="31" alt="Valid CSS!" title="Valid CSS!" border="0" /></a></span></center><br />', '', 'r', 5, 1, 0, '', '', '', '0');
INSERT INTO `nuke_blocks` VALUES(6, '', 'User Info', '', '', 'r', 0, 1, 0, '', '', 'block-Evo_User_Info.php', '0');
INSERT INTO `nuke_blocks` VALUES(7, '', 'Nuke-Evolution', '', '', 'c', 1, 0, 0, '', '', 'block-Nuke-Evolution.php', '0');
INSERT INTO `nuke_blocks` VALUES(8, '', 'Hacker Beware', '', '', 'l', 5, 0, 3600, '', '', 'block-Hacker_Beware2.php', '0');
INSERT INTO `nuke_blocks` VALUES(9, '', 'Tutorials', '', '', 'r', 6, 0, 3600, '0', '', 'block-SimpleTutorials.php', '1');
INSERT INTO `nuke_blocks` VALUES(10, '', 'Top 10 Links', '', '', 'r', 7, 0, 3600, '', '', 'block-Top10_Links.php', '0');
INSERT INTO `nuke_blocks` VALUES(11, '', 'Forums', '', '', 'c', 0, 1, 3600, '', '', 'block-Forums.php', '0');
INSERT INTO `nuke_blocks` VALUES(12, '', 'Submissions', '', '', 'l', 2, 0, 0, '', '', 'block-Submissions.php', '4');
INSERT INTO `nuke_blocks` VALUES(13, '', 'Link-us', '', '', 'r', 2, 0, 3600, '0', '', 'block-Link-us.php', '1');
INSERT INTO `nuke_blocks` VALUES(14, '', 'Shout Box', '', '', 'r', 3, 0, 3600, '0', '', 'block-Shout_Box.php', '1');
INSERT INTO `nuke_blocks` VALUES(15, '', 'News Center', '', '', 'd', 0, 0, 3600, '0', '', 'block-News_Center.php', '1');
INSERT INTO `nuke_blocks` VALUES(16, '', 'Donations', '', '', 'r', 1, 0, 3600, '0', '', 'block-Donations.php', '0');
INSERT INTO `nuke_blocks` VALUES(17, '', 'Arcade Center', '', '', 'd', 1, 0, 3600, '0', '', 'block-Arcade_Center.php', '1');
INSERT INTO `nuke_blocks` VALUES(18, '', 'Calendar', '', '', 'l', 3, 0, 3600, '0', '', 'block-Calendar_month.php', '1');
INSERT INTO `nuke_blocks` VALUES(19, '', 'Security', '', '', 'd', 2, 1, 3600, '0', '', 'block-Sentinel_Center.php', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_cnbya_config`
--

CREATE TABLE `nuke_cnbya_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` longtext,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_cnbya_config`
--

INSERT INTO `nuke_cnbya_config` VALUES('sendaddmail', '0');
INSERT INTO `nuke_cnbya_config` VALUES('senddeletemail', '0');
INSERT INTO `nuke_cnbya_config` VALUES('allowuserdelete', '0');
INSERT INTO `nuke_cnbya_config` VALUES('allowusertheme', '0');
INSERT INTO `nuke_cnbya_config` VALUES('allowuserreg', '0');
INSERT INTO `nuke_cnbya_config` VALUES('allowmailchange', '1');
INSERT INTO `nuke_cnbya_config` VALUES('emailvalidate', '0');
INSERT INTO `nuke_cnbya_config` VALUES('requireadmin', '0');
INSERT INTO `nuke_cnbya_config` VALUES('servermail', '0');
INSERT INTO `nuke_cnbya_config` VALUES('useactivate', '0');
INSERT INTO `nuke_cnbya_config` VALUES('autosuspend', '0');
INSERT INTO `nuke_cnbya_config` VALUES('perpage', '100');
INSERT INTO `nuke_cnbya_config` VALUES('expiring', '86400');
INSERT INTO `nuke_cnbya_config` VALUES('nick_min', '4');
INSERT INTO `nuke_cnbya_config` VALUES('nick_max', '20');
INSERT INTO `nuke_cnbya_config` VALUES('pass_min', '4');
INSERT INTO `nuke_cnbya_config` VALUES('pass_max', '20');
INSERT INTO `nuke_cnbya_config` VALUES('bad_mail', 'yoursite.com\r\nmysite.com');
INSERT INTO `nuke_cnbya_config` VALUES('bad_nick', 'adm\r\nadmin\r\nanonimo\r\nanonymous\r\nannimo\r\ngod\r\nlinux\r\nnobody\r\noperator\r\nroot\r\nstaff\r\nwebmaster');
INSERT INTO `nuke_cnbya_config` VALUES('coppa', '0');
INSERT INTO `nuke_cnbya_config` VALUES('tos', '0');
INSERT INTO `nuke_cnbya_config` VALUES('tosall', '1');
INSERT INTO `nuke_cnbya_config` VALUES('cookiecheck', '1');
INSERT INTO `nuke_cnbya_config` VALUES('cookiecleaner', '1');
INSERT INTO `nuke_cnbya_config` VALUES('cookietimelife', '2592000');
INSERT INTO `nuke_cnbya_config` VALUES('cookiepath', '');
INSERT INTO `nuke_cnbya_config` VALUES('cookieinactivity', '-');
INSERT INTO `nuke_cnbya_config` VALUES('autosuspendmain', '0');
INSERT INTO `nuke_cnbya_config` VALUES('doublecheckemail', '0');
INSERT INTO `nuke_cnbya_config` VALUES('version', '4.4.2');
INSERT INTO `nuke_cnbya_config` VALUES('tos_text', 'This is your default TOS. You may edit this through the Your Account Admin Panel.');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_cnbya_field`
--

CREATE TABLE `nuke_cnbya_field` (
  `fid` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default 'field',
  `value` varchar(255) default NULL,
  `size` int(3) default NULL,
  `need` int(1) NOT NULL default '1',
  `pos` int(3) default NULL,
  `public` int(1) NOT NULL default '1',
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_cnbya_field`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_cnbya_value`
--

CREATE TABLE `nuke_cnbya_value` (
  `vid` int(10) NOT NULL auto_increment,
  `uid` int(10) NOT NULL default '0',
  `fid` int(10) NOT NULL default '0',
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`vid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_cnbya_value`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_cnbya_value_temp`
--

CREATE TABLE `nuke_cnbya_value_temp` (
  `vid` int(10) NOT NULL auto_increment,
  `uid` int(10) NOT NULL default '0',
  `fid` int(10) NOT NULL default '0',
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`vid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_cnbya_value_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_comments`
--

CREATE TABLE `nuke_comments` (
  `tid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `date` datetime default NULL,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) default NULL,
  `url` varchar(60) default NULL,
  `host_name` varchar(60) default NULL,
  `subject` varchar(85) NOT NULL default '',
  `comment` text NOT NULL,
  `score` tinyint(4) NOT NULL default '0',
  `reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `pid` (`pid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_config`
--

CREATE TABLE `nuke_config` (
  `sitename` varchar(255) NOT NULL default '',
  `nukeurl` varchar(255) NOT NULL default '',
  `site_logo` varchar(255) NOT NULL default '',
  `slogan` varchar(255) NOT NULL default '',
  `startdate` varchar(50) NOT NULL default '',
  `adminmail` varchar(255) NOT NULL default '',
  `anonpost` tinyint(1) NOT NULL default '0',
  `default_Theme` varchar(255) NOT NULL default '',
  `foot1` text NOT NULL,
  `foot2` text NOT NULL,
  `foot3` text NOT NULL,
  `commentlimit` int(9) NOT NULL default '4096',
  `anonymous` varchar(255) NOT NULL default '',
  `minpass` tinyint(1) NOT NULL default '5',
  `pollcomm` tinyint(1) NOT NULL default '1',
  `articlecomm` tinyint(1) NOT NULL default '1',
  `broadcast_msg` tinyint(1) NOT NULL default '1',
  `my_headlines` tinyint(1) NOT NULL default '1',
  `top` int(3) NOT NULL default '10',
  `storyhome` int(2) NOT NULL default '10',
  `user_news` tinyint(1) NOT NULL default '1',
  `oldnum` int(2) NOT NULL default '30',
  `ultramode` tinyint(1) NOT NULL default '0',
  `banners` tinyint(1) NOT NULL default '1',
  `backend_title` varchar(255) NOT NULL default '',
  `backend_language` varchar(10) NOT NULL default '',
  `language` varchar(100) NOT NULL default '',
  `locale` varchar(10) NOT NULL default '',
  `multilingual` tinyint(1) NOT NULL default '0',
  `useflags` tinyint(1) NOT NULL default '0',
  `notify` tinyint(1) NOT NULL default '0',
  `notify_email` varchar(255) NOT NULL default '',
  `notify_subject` varchar(255) NOT NULL default '',
  `notify_message` varchar(255) NOT NULL default '',
  `notify_from` varchar(255) NOT NULL default '',
  `moderate` tinyint(1) NOT NULL default '0',
  `admingraphic` tinyint(1) NOT NULL default '1',
  `httpref` tinyint(1) NOT NULL default '1',
  `httprefmax` int(5) NOT NULL default '1000',
  `CensorMode` tinyint(1) NOT NULL default '3',
  `CensorReplace` varchar(10) NOT NULL default '',
  `copyright` text NOT NULL,
  `Version_Num` varchar(10) NOT NULL default '',
  `admin_pos` tinyint(1) NOT NULL default '1',
  `admin_log_lines` int(11) NOT NULL default '0',
  `error_log_lines` int(11) NOT NULL default '0',
  `cache_data` mediumblob NOT NULL,
  PRIMARY KEY  (`sitename`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_config`
--

INSERT INTO `nuke_config` VALUES('My Site', 'http://--------.---', 'logo.gif', 'Your slogan here', 'December 2005', 'webmaster@------.---', 0, 'EvoXtreme', '<a href="modules.php?name=Spambot_Killer" target="_blank">Spambot Killer</a><br /><a href="modules.php?name=Site_Map" target="_blank"><strong>Site Map</strong></a><br />', '<a href="rss.php?feed=news" target="_blank"><img border="0" src="images/powered/feed_20_news.png" width="94" height="15" alt="[News Feed]" title="News Feed" /></a> <a href="rss.php?feed=forums" target="_blank"><img border="0" src="images/powered/feed_20_forums.png" width="94" height="15" alt="[Forums Feed]" title="Forums Feed" /></a> <a href="rss.php?feed=downloads" target="_blank" /><img border="0" src="images/powered/feed_20_down.png" width="94" height="15" alt="[Downloads Feed]" title="Downloads Feed" /></a> <a href="rss.php?feed=weblinks" target="_blank"><img border="0" src="images/powered/feed_20_links.png" width="94" height="15" alt="[Web Links Feed]" title="Web Links Feed" /></a> <a href="http://htmlpurifier.org/"><img src="images/powered/html_purifier_powered.png" alt="Powered by HTML Purifier" border="0" /></a><a href="http://tool.motoricerca.info/robots-checker.phtml?checkreferer=1" target="_blank"><img border="0" src="images/powered/valid-robots.png" width="80" height="15" alt="[Validate robots.txt]" title="Validate robots.txt" /></a><br />', '', 4096, 'Anonymous', 5, 1, 1, 1, 1, 10, 10, 1, 30, 1, 0, 'Nuke-Evolution 2.0.7 Powered - Xtreme 2.0 Edition', 'en-us', 'english', 'en_US', 0, 0, 0, 'webmaster@---------.---', 'NEWS for my site', 'Hey! You got a new submission for your site.', 'webmaster', 0, 1, 1, 1000, 3, '*****', 'PHP-Nuke Copyright &copy; 2006 by Francisco Burzi.<br>All logos, trademarks and posts in this site are property of their respective owners, all the rest &copy; 2006 by the site owner.<br>Powered by <a href="http://www.nuke-evolution.com" target="_blank">Nuke Evolution 2.0.7</a> - <a href="http://www.evolution-xtreme.com" target="_blank">Nuke-Evolution Xtreme 2.0 Edition</a>.<br>', '7.6.0', 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_confirm`
--

CREATE TABLE `nuke_confirm` (
  `confirm_id` char(32) NOT NULL default '',
  `session_id` char(32) NOT NULL default '',
  `code` char(6) NOT NULL default '',
  PRIMARY KEY  (`session_id`,`confirm_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_confirm`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_counter`
--

CREATE TABLE `nuke_counter` (
  `type` varchar(80) NOT NULL default '',
  `var` varchar(80) NOT NULL default '',
  `count` int(10) unsigned NOT NULL default '0',
  KEY `var` (`var`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_counter`
--

INSERT INTO `nuke_counter` VALUES ('total', 'hits', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Avant', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Camino', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Crazy', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'DEVONtech', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Dillo', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Galeon', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'ELinks', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Epiphany', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Firefox', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'iRider', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'K-Meleon', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Konqueror', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Lynx', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Maxthon', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Mozilla', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'MSIE', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'MultiZilla', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'NetCaptor', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Netscape', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'OmniWeb', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Opera', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Safari', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Shiira', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Voyager', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'w3m', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'WAP', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'WebWasher', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Bot', '0');
INSERT INTO `nuke_counter` VALUES ('browser', 'Other', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'Windows', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'Linspire', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'Linux', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'Mac', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'FreeBSD', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'SunOS', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'IRIX', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'OS/2', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'AIX', '0');
INSERT INTO `nuke_counter` VALUES ('os', 'Other', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_country`
--

CREATE TABLE `nuke_country` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(80) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_country`
--

INSERT INTO `nuke_country` VALUES(1, 'United States');
INSERT INTO `nuke_country` VALUES(2, 'United Kingdom');
INSERT INTO `nuke_country` VALUES(3, 'France');
INSERT INTO `nuke_country` VALUES(4, 'Switzerland');
INSERT INTO `nuke_country` VALUES(5, 'Afghanistan');
INSERT INTO `nuke_country` VALUES(6, 'Albania');
INSERT INTO `nuke_country` VALUES(7, 'Algeria');
INSERT INTO `nuke_country` VALUES(8, 'American Somoa');
INSERT INTO `nuke_country` VALUES(9, 'Andorra');
INSERT INTO `nuke_country` VALUES(10, 'Angola');
INSERT INTO `nuke_country` VALUES(11, 'Anguilla');
INSERT INTO `nuke_country` VALUES(12, 'Antartica');
INSERT INTO `nuke_country` VALUES(13, 'Antigua & Barbuda');
INSERT INTO `nuke_country` VALUES(14, 'Argentina');
INSERT INTO `nuke_country` VALUES(15, 'Armenia');
INSERT INTO `nuke_country` VALUES(16, 'Aruba');
INSERT INTO `nuke_country` VALUES(17, 'Australia');
INSERT INTO `nuke_country` VALUES(18, 'Austria');
INSERT INTO `nuke_country` VALUES(19, 'Azerbaijan');
INSERT INTO `nuke_country` VALUES(20, 'Azores');
INSERT INTO `nuke_country` VALUES(21, 'Bahamas');
INSERT INTO `nuke_country` VALUES(22, 'Bahrain');
INSERT INTO `nuke_country` VALUES(23, 'Balearic Islands');
INSERT INTO `nuke_country` VALUES(24, 'Bangladesh');
INSERT INTO `nuke_country` VALUES(25, 'Barbados');
INSERT INTO `nuke_country` VALUES(26, 'Belarus');
INSERT INTO `nuke_country` VALUES(27, 'Belgium');
INSERT INTO `nuke_country` VALUES(28, 'Belize');
INSERT INTO `nuke_country` VALUES(29, 'Benin');
INSERT INTO `nuke_country` VALUES(30, 'Bermuda');
INSERT INTO `nuke_country` VALUES(31, 'Bhutan');
INSERT INTO `nuke_country` VALUES(32, 'Bolivia');
INSERT INTO `nuke_country` VALUES(33, 'Bonaire');
INSERT INTO `nuke_country` VALUES(34, 'Bosnia & Herzegovinia');
INSERT INTO `nuke_country` VALUES(35, 'Botswana');
INSERT INTO `nuke_country` VALUES(36, 'Brazil');
INSERT INTO `nuke_country` VALUES(37, 'Brunei');
INSERT INTO `nuke_country` VALUES(38, 'Bulgaria');
INSERT INTO `nuke_country` VALUES(39, 'BurkinaFaso');
INSERT INTO `nuke_country` VALUES(40, 'Burundi');
INSERT INTO `nuke_country` VALUES(41, 'Cambodia');
INSERT INTO `nuke_country` VALUES(42, 'Cameroon');
INSERT INTO `nuke_country` VALUES(43, 'Canada');
INSERT INTO `nuke_country` VALUES(44, 'Canary Islands');
INSERT INTO `nuke_country` VALUES(45, 'Cape Verde');
INSERT INTO `nuke_country` VALUES(46, 'Cayman Islands');
INSERT INTO `nuke_country` VALUES(47, 'Central Africa Republic');
INSERT INTO `nuke_country` VALUES(48, 'Chad');
INSERT INTO `nuke_country` VALUES(49, 'Chile');
INSERT INTO `nuke_country` VALUES(50, 'China');
INSERT INTO `nuke_country` VALUES(51, 'Colombia');
INSERT INTO `nuke_country` VALUES(52, 'Comoros');
INSERT INTO `nuke_country` VALUES(53, 'Congo');
INSERT INTO `nuke_country` VALUES(54, 'CostaRica');
INSERT INTO `nuke_country` VALUES(55, 'Croatia');
INSERT INTO `nuke_country` VALUES(56, 'Cuba');
INSERT INTO `nuke_country` VALUES(57, 'Curacao');
INSERT INTO `nuke_country` VALUES(58, 'Cyprus');
INSERT INTO `nuke_country` VALUES(59, 'Czech Republic');
INSERT INTO `nuke_country` VALUES(60, 'Denmark');
INSERT INTO `nuke_country` VALUES(61, 'Djibouti');
INSERT INTO `nuke_country` VALUES(62, 'Dominican Republic');
INSERT INTO `nuke_country` VALUES(63, 'Ecuador');
INSERT INTO `nuke_country` VALUES(64, 'Egypt');
INSERT INTO `nuke_country` VALUES(65, 'ElSalvador');
INSERT INTO `nuke_country` VALUES(66, 'Equatorial Guinea');
INSERT INTO `nuke_country` VALUES(67, 'Eritrea');
INSERT INTO `nuke_country` VALUES(68, 'Estonia');
INSERT INTO `nuke_country` VALUES(69, 'Ethiopia');
INSERT INTO `nuke_country` VALUES(70, 'Falkland Islands');
INSERT INTO `nuke_country` VALUES(71, 'Fiji');
INSERT INTO `nuke_country` VALUES(72, 'Finland');
INSERT INTO `nuke_country` VALUES(73, 'French Guiana');
INSERT INTO `nuke_country` VALUES(74, 'Gambia');
INSERT INTO `nuke_country` VALUES(75, 'Georgia');
INSERT INTO `nuke_country` VALUES(76, 'Germany');
INSERT INTO `nuke_country` VALUES(77, 'Ghana');
INSERT INTO `nuke_country` VALUES(78, 'Gibraltar');
INSERT INTO `nuke_country` VALUES(79, 'Greece');
INSERT INTO `nuke_country` VALUES(80, 'Greenland');
INSERT INTO `nuke_country` VALUES(81, 'Grenada');
INSERT INTO `nuke_country` VALUES(82, 'Guadeloupe');
INSERT INTO `nuke_country` VALUES(83, 'Guatemala');
INSERT INTO `nuke_country` VALUES(84, 'Guernsey');
INSERT INTO `nuke_country` VALUES(85, 'Guinea Bissau');
INSERT INTO `nuke_country` VALUES(86, 'Guyana');
INSERT INTO `nuke_country` VALUES(87, 'Haiti');
INSERT INTO `nuke_country` VALUES(88, 'Honduras');
INSERT INTO `nuke_country` VALUES(89, 'HongKong');
INSERT INTO `nuke_country` VALUES(90, 'Hungary');
INSERT INTO `nuke_country` VALUES(91, 'Iceland');
INSERT INTO `nuke_country` VALUES(92, 'India');
INSERT INTO `nuke_country` VALUES(93, 'Indonesia');
INSERT INTO `nuke_country` VALUES(94, 'Iran');
INSERT INTO `nuke_country` VALUES(95, 'Iraq');
INSERT INTO `nuke_country` VALUES(96, 'Ireland');
INSERT INTO `nuke_country` VALUES(97, 'Israel');
INSERT INTO `nuke_country` VALUES(98, 'Italy');
INSERT INTO `nuke_country` VALUES(99, 'IvoryCoast');
INSERT INTO `nuke_country` VALUES(100, 'Jamaica');
INSERT INTO `nuke_country` VALUES(101, 'Japan');
INSERT INTO `nuke_country` VALUES(102, 'Jersey');
INSERT INTO `nuke_country` VALUES(103, 'Jordan');
INSERT INTO `nuke_country` VALUES(104, 'Kazakhstan');
INSERT INTO `nuke_country` VALUES(105, 'Kenya');
INSERT INTO `nuke_country` VALUES(106, 'Kuwait');
INSERT INTO `nuke_country` VALUES(107, 'Kyrgyzstan');
INSERT INTO `nuke_country` VALUES(108, 'Laos');
INSERT INTO `nuke_country` VALUES(109, 'Latvia');
INSERT INTO `nuke_country` VALUES(110, 'Lebanon');
INSERT INTO `nuke_country` VALUES(111, 'Lesotho');
INSERT INTO `nuke_country` VALUES(112, 'Liberia');
INSERT INTO `nuke_country` VALUES(113, 'Libya');
INSERT INTO `nuke_country` VALUES(114, 'Liechtenstein');
INSERT INTO `nuke_country` VALUES(115, 'Lithuania');
INSERT INTO `nuke_country` VALUES(116, 'Luxembourg');
INSERT INTO `nuke_country` VALUES(117, 'Macau');
INSERT INTO `nuke_country` VALUES(118, 'Macedonia');
INSERT INTO `nuke_country` VALUES(119, 'Madagascar');
INSERT INTO `nuke_country` VALUES(120, 'Maderia');
INSERT INTO `nuke_country` VALUES(121, 'Malawi');
INSERT INTO `nuke_country` VALUES(122, 'Malaysia');
INSERT INTO `nuke_country` VALUES(123, 'Maldives');
INSERT INTO `nuke_country` VALUES(124, 'Mali');
INSERT INTO `nuke_country` VALUES(125, 'Malta');
INSERT INTO `nuke_country` VALUES(126, 'Martinique');
INSERT INTO `nuke_country` VALUES(127, 'Mauritania');
INSERT INTO `nuke_country` VALUES(128, 'Mauritius');
INSERT INTO `nuke_country` VALUES(129, 'Mexico');
INSERT INTO `nuke_country` VALUES(130, 'Moldova');
INSERT INTO `nuke_country` VALUES(131, 'Monaco');
INSERT INTO `nuke_country` VALUES(132, 'Mongolia');
INSERT INTO `nuke_country` VALUES(133, 'Montserrat');
INSERT INTO `nuke_country` VALUES(134, 'Morocco');
INSERT INTO `nuke_country` VALUES(135, 'Mozambique');
INSERT INTO `nuke_country` VALUES(136, 'Myanmar');
INSERT INTO `nuke_country` VALUES(137, 'Myanmer');
INSERT INTO `nuke_country` VALUES(138, 'Namibia');
INSERT INTO `nuke_country` VALUES(139, 'Nauru');
INSERT INTO `nuke_country` VALUES(140, 'Nepal');
INSERT INTO `nuke_country` VALUES(141, 'Netherlands');
INSERT INTO `nuke_country` VALUES(142, 'New Caledonia');
INSERT INTO `nuke_country` VALUES(143, 'New Zealand');
INSERT INTO `nuke_country` VALUES(144, 'Nicaragua');
INSERT INTO `nuke_country` VALUES(145, 'Niger');
INSERT INTO `nuke_country` VALUES(146, 'Nigeria');
INSERT INTO `nuke_country` VALUES(147, 'North Korea');
INSERT INTO `nuke_country` VALUES(148, 'Norway');
INSERT INTO `nuke_country` VALUES(149, 'Oman');
INSERT INTO `nuke_country` VALUES(150, 'Pakistan');
INSERT INTO `nuke_country` VALUES(151, 'Panama');
INSERT INTO `nuke_country` VALUES(152, 'Papua New Guinea');
INSERT INTO `nuke_country` VALUES(153, 'Paraguay');
INSERT INTO `nuke_country` VALUES(154, 'Peru');
INSERT INTO `nuke_country` VALUES(155, 'Philippines');
INSERT INTO `nuke_country` VALUES(156, 'Poland');
INSERT INTO `nuke_country` VALUES(157, 'Portugal');
INSERT INTO `nuke_country` VALUES(158, 'PuertoRico');
INSERT INTO `nuke_country` VALUES(159, 'Qatar');
INSERT INTO `nuke_country` VALUES(160, 'Reunion');
INSERT INTO `nuke_country` VALUES(161, 'Romania');
INSERT INTO `nuke_country` VALUES(162, 'Russia');
INSERT INTO `nuke_country` VALUES(163, 'Rwanda');
INSERT INTO `nuke_country` VALUES(164, 'Saint Eustatius');
INSERT INTO `nuke_country` VALUES(165, 'Saint Kitts and Nevis');
INSERT INTO `nuke_country` VALUES(166, 'Saint Lucia');
INSERT INTO `nuke_country` VALUES(167, 'Saint Vincent and the Grenadines');
INSERT INTO `nuke_country` VALUES(168, 'San Marino');
INSERT INTO `nuke_country` VALUES(169, 'Sao Tome');
INSERT INTO `nuke_country` VALUES(170, 'Saudi Arabia');
INSERT INTO `nuke_country` VALUES(171, 'Senegal');
INSERT INTO `nuke_country` VALUES(172, 'Seychelles');
INSERT INTO `nuke_country` VALUES(173, 'SierraLeone');
INSERT INTO `nuke_country` VALUES(174, 'Singapore');
INSERT INTO `nuke_country` VALUES(175, 'Slovakia');
INSERT INTO `nuke_country` VALUES(176, 'Slovenia');
INSERT INTO `nuke_country` VALUES(177, 'Solomon Islands');
INSERT INTO `nuke_country` VALUES(178, 'Somalia');
INSERT INTO `nuke_country` VALUES(179, 'South Africa');
INSERT INTO `nuke_country` VALUES(180, 'South Korea');
INSERT INTO `nuke_country` VALUES(181, 'Spain');
INSERT INTO `nuke_country` VALUES(182, 'Sri Lanka');
INSERT INTO `nuke_country` VALUES(183, 'St Maarten');
INSERT INTO `nuke_country` VALUES(184, 'Sudan');
INSERT INTO `nuke_country` VALUES(185, 'Suriname');
INSERT INTO `nuke_country` VALUES(186, 'Swaziland');
INSERT INTO `nuke_country` VALUES(187, 'Sweden');
INSERT INTO `nuke_country` VALUES(188, 'Syria');
INSERT INTO `nuke_country` VALUES(189, 'Taiwan');
INSERT INTO `nuke_country` VALUES(190, 'Tajikistan');
INSERT INTO `nuke_country` VALUES(191, 'Tanzania');
INSERT INTO `nuke_country` VALUES(192, 'Thailand');
INSERT INTO `nuke_country` VALUES(193, 'Togo');
INSERT INTO `nuke_country` VALUES(194, 'Trinidad and Tobago');
INSERT INTO `nuke_country` VALUES(195, 'Tunisia');
INSERT INTO `nuke_country` VALUES(196, 'Turkey');
INSERT INTO `nuke_country` VALUES(197, 'Turkmenistan');
INSERT INTO `nuke_country` VALUES(198, 'Turks and Caicos Islands');
INSERT INTO `nuke_country` VALUES(199, 'Tuvalu');
INSERT INTO `nuke_country` VALUES(200, 'Uganda');
INSERT INTO `nuke_country` VALUES(201, 'Ukraine');
INSERT INTO `nuke_country` VALUES(202, 'UnitedArabEmirates');
INSERT INTO `nuke_country` VALUES(203, 'Uruguay');
INSERT INTO `nuke_country` VALUES(205, 'Uzbekistan');
INSERT INTO `nuke_country` VALUES(206, 'Vanuatu');
INSERT INTO `nuke_country` VALUES(207, 'VaticanCity');
INSERT INTO `nuke_country` VALUES(208, 'Venezuela');
INSERT INTO `nuke_country` VALUES(209, 'Vietnam');
INSERT INTO `nuke_country` VALUES(210, 'Virgin Islands - British');
INSERT INTO `nuke_country` VALUES(211, 'Virgin Islands - US');
INSERT INTO `nuke_country` VALUES(212, 'Yemen');
INSERT INTO `nuke_country` VALUES(213, 'Yugoslavia');
INSERT INTO `nuke_country` VALUES(214, 'Zaire (Congo)');
INSERT INTO `nuke_country` VALUES(215, 'Zambia');
INSERT INTO `nuke_country` VALUES(216, 'Zanzibar Island');
INSERT INTO `nuke_country` VALUES(217, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_czuser_config`
--

CREATE TABLE `nuke_czuser_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_czuser_config`
--

INSERT INTO `nuke_czuser_config` VALUES('czuser_ip', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_pms', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_pms_alert', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_posts', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_avatar', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_bbrank', '0');
INSERT INTO `nuke_czuser_config` VALUES('czuser_mostonline', '0');
INSERT INTO `nuke_czuser_config` VALUES('czuser_stats', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_groups', '0');
INSERT INTO `nuke_czuser_config` VALUES('czuser_tooltip', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_online', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_guests', '1');
INSERT INTO `nuke_czuser_config` VALUES('czuser_pick', '0');
INSERT INTO `nuke_czuser_config` VALUES('czuser_mode', '2');
INSERT INTO `nuke_czuser_config` VALUES('tooltip_avatar', '0');
INSERT INTO `nuke_czuser_config` VALUES('tooltip_username', '1');
INSERT INTO `nuke_czuser_config` VALUES('tooltip_email', '1');
INSERT INTO `nuke_czuser_config` VALUES('tooltip_reg_date', '1');
INSERT INTO `nuke_czuser_config` VALUES('tooltip_posts', '1');
INSERT INTO `nuke_czuser_config` VALUES('tooltip_theme', '1');
INSERT INTO `nuke_czuser_config` VALUES('tooltip_where', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_czuser_images`
--

CREATE TABLE `nuke_czuser_images` (
  `account_info` varchar(255) NOT NULL default '',
  `member_ship` varchar(255) NOT NULL default '',
  `most_online` varchar(255) NOT NULL default '',
  `online_stats` varchar(255) NOT NULL default '',
  `page_views` varchar(255) NOT NULL default '',
  `member_group` varchar(255) NOT NULL default '',
  `online_mem` varchar(255) NOT NULL default '',
  `sub_img` varchar(255) NOT NULL default ''
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_czuser_images`
--

INSERT INTO `nuke_czuser_images` VALUES('images/CZUser/home.gif', 'images/CZUser/members.gif', 'images/CZUser/stats.gif', 'images/CZUser/group.gif', 'images/CZUser/stats.gif', 'images/CZUser/group-2.gif', 'images/CZUser/online.gif', 'images/CZUser/li.gif');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_czuser_info`
--

CREATE TABLE `nuke_czuser_info` (
  `pic` varchar(40) NOT NULL default '',
  `view` varchar(40) NOT NULL default '',
  `king` tinyint(2) NOT NULL default '0',
  `gname` varchar(40) NOT NULL default '',
  `caption` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`view`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_czuser_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_czuser_mostonline`
--

CREATE TABLE `nuke_czuser_mostonline` (
  `total` int(10) NOT NULL default '0',
  `members` int(10) NOT NULL default '0',
  `spiders` int(10) NOT NULL default '0',
  `nonmembers` int(10) NOT NULL default '0',
  PRIMARY KEY  (`total`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_czuser_mostonline`
--

INSERT INTO `nuke_czuser_mostonline` VALUES(1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_czuser_ranks`
--

CREATE TABLE `nuke_czuser_ranks` (
  `img_id` int(11) NOT NULL auto_increment,
  `img_pic` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nuke_czuser_ranks`
--

INSERT INTO `nuke_czuser_ranks` VALUES(1, 'admin.gif');
INSERT INTO `nuke_czuser_ranks` VALUES(2, 'clan-member.gif');
INSERT INTO `nuke_czuser_ranks` VALUES(3, 'elite-mem.gif');
INSERT INTO `nuke_czuser_ranks` VALUES(4, 'clan-leader.gif');
INSERT INTO `nuke_czuser_ranks` VALUES(5, 'owner.gif');
INSERT INTO `nuke_czuser_ranks` VALUES(6, 'recruiter.gif');
INSERT INTO `nuke_czuser_ranks` VALUES(7, 'staff.gif');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_donators`
--

CREATE TABLE `nuke_donators` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(60) NOT NULL default '',
  `fname` varchar(25) NOT NULL default '',
  `lname` varchar(25) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `donated` decimal(8,2) NOT NULL default '0.00',
  `dondate` varchar(255) NOT NULL default '',
  `donshow` tinyint(1) NOT NULL default '0',
  `uip` varchar(255) NOT NULL default '',
  `donok` tinyint(1) NOT NULL default '0',
  `msg` text,
  `donto` VARCHAR( 255 ) NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_donators`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_donators_config`
--

CREATE TABLE `nuke_donators_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_donators_config`
--

INSERT INTO `nuke_donators_config` VALUES('values', '5,10,25,50,100');
INSERT INTO `nuke_donators_config` VALUES('block_show_amount', 'yes');
INSERT INTO `nuke_donators_config` VALUES('block_show_anon_amount', 'yes');
INSERT INTO `nuke_donators_config` VALUES('block_button_image', 'images/donations/x-click-but04.gif');
INSERT INTO `nuke_donators_config` VALUES('block_num_donations', '10');
INSERT INTO `nuke_donators_config` VALUES('block_show_dates', 'yes');
INSERT INTO `nuke_donators_config` VALUES('block_message', 'Find our site useful? Make a small donation to show your support.');
INSERT INTO `nuke_donators_config` VALUES('block_show_goal', 'no');
INSERT INTO `nuke_donators_config` VALUES('block_scroll', 'yes');
INSERT INTO `nuke_donators_config` VALUES('block_numbers', 'no');
INSERT INTO `nuke_donators_config` VALUES('page_num_donations', '25');
INSERT INTO `nuke_donators_config` VALUES('page_show_anon_amount', 'yes');
INSERT INTO `nuke_donators_config` VALUES('page_show_amount', 'yes');
INSERT INTO `nuke_donators_config` VALUES('page_show_dates', 'no');
INSERT INTO `nuke_donators_config` VALUES('page_header_image', '');
INSERT INTO `nuke_donators_config` VALUES('gen_pp_email', '');
INSERT INTO `nuke_donators_config` VALUES('gen_donation_name', 'Site Donation');
INSERT INTO `nuke_donators_config` VALUES('gen_donation_code', 'site_donation');
INSERT INTO `nuke_donators_config` VALUES('gen_button_image', 'images/donations/x-click-butcc-donate.gif');
INSERT INTO `nuke_donators_config` VALUES('gen_currency', 'USD');
INSERT INTO `nuke_donators_config` VALUES('gen_monthly_goal', '50.00');
INSERT INTO `nuke_donators_config` VALUES('gen_date_format', 'm/d/Y');
INSERT INTO `nuke_donators_config` VALUES('gen_type_private', 'no');
INSERT INTO `nuke_donators_config` VALUES('gen_type_anon', 'no');
INSERT INTO `nuke_donators_config` VALUES('gen_thank_image', '');
INSERT INTO `nuke_donators_config` VALUES('gen_thank_message', 'Thank you for your kind donation!<br /><br />Please come again!');
INSERT INTO `nuke_donators_config` VALUES('gen_cancel_image', 'images/logo.gif');
INSERT INTO `nuke_donators_config` VALUES('gen_cancel_message', 'Sorry you could not donate!<br /><br />Please come again!');
INSERT INTO `nuke_donators_config` VALUES('gen_page_image', 'images/logo.gif');
INSERT INTO `nuke_donators_config` VALUES('gen_message', 'yes');
INSERT INTO `nuke_donators_config` VALUES('gen_codes', '');
INSERT INTO `nuke_donators_config` VALUES('gen_cookie', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_downloads_accesses`
--

CREATE TABLE `nuke_downloads_accesses` (
  `username` varchar(60) NOT NULL default '',
  `downloads` int(11) NOT NULL default '0',
  `uploads` int(11) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_downloads_accesses`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_downloads_categories`
--

CREATE TABLE `nuke_downloads_categories` (
  `cid` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `cdescription` text NOT NULL,
  `parentid` int(11) NOT NULL default '0',
  `whoadd` tinyint(2) NOT NULL default '0',
  `uploaddir` varchar(255) NOT NULL default '',
  `canupload` tinyint(2) NOT NULL default '0',
  `active` tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (`cid`),
  KEY `title` (`title`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_downloads_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_downloads_config`
--

CREATE TABLE `nuke_downloads_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_downloads_config`
--

INSERT INTO `nuke_downloads_config` VALUES('admperpage', '50');
INSERT INTO `nuke_downloads_config` VALUES('blockunregmodify', '0');
INSERT INTO `nuke_downloads_config` VALUES('dateformat', 'D M j G:i:s T Y');
INSERT INTO `nuke_downloads_config` VALUES('mostpopular', '25');
INSERT INTO `nuke_downloads_config` VALUES('mostpopulartrig', '0');
INSERT INTO `nuke_downloads_config` VALUES('perpage', '10');
INSERT INTO `nuke_downloads_config` VALUES('popular', '500');
INSERT INTO `nuke_downloads_config` VALUES('results', '10');
INSERT INTO `nuke_downloads_config` VALUES('show_download', '0');
INSERT INTO `nuke_downloads_config` VALUES('show_links_num', '0');
INSERT INTO `nuke_downloads_config` VALUES('usegfxcheck', '0');

-- --------------------------------------------------------


--
-- Table structure for table `nuke_downloads_downloads`
--

CREATE TABLE `nuke_downloads_downloads` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `external_mirror1` varchar(255) NOT NULL default '',
  `external_mirror2` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `fixes` text NOT NULL,
  `features` text NOT NULL,
  `screenshot1` varchar(255) NOT NULL default '',
  `screenshot2` varchar(255) NOT NULL default '',
  `screenshot3` varchar(255) NOT NULL default '',
  `screenshot4` varchar(255) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `hits` int(11) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  `active` tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`),
  KEY `title` (`title`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_downloads_downloads`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_downloads_extensions`
--

CREATE TABLE `nuke_downloads_extensions` (
  `eid` int(11) NOT NULL auto_increment,
  `ext` varchar(6) NOT NULL default '',
  `file` tinyint(1) NOT NULL default '0',
  `image` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`eid`),
  KEY `ext` (`ext`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_downloads_extensions`
--

INSERT INTO `nuke_downloads_extensions` VALUES(1, '.ace', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(2, '.arj', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(3, '.bz', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(4, '.bz2', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(5, '.cab', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(6, '.exe', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(7, '.gif', 0, 1);
INSERT INTO `nuke_downloads_extensions` VALUES(8, '.gz', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(9, '.iso', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(10, '.jpeg', 0, 1);
INSERT INTO `nuke_downloads_extensions` VALUES(11, '.jpg', 0, 1);
INSERT INTO `nuke_downloads_extensions` VALUES(12, '.lha', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(13, '.lzh', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(14, '.png', 0, 1);
INSERT INTO `nuke_downloads_extensions` VALUES(15, '.rar', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(16, '.tar', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(17, '.tgz', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(18, '.uue', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(19, '.zip', 1, 0);
INSERT INTO `nuke_downloads_extensions` VALUES(20, '.zoo', 1, 0);

-- --------------------------------------------------------


--
-- Table structure for table `nuke_downloads_mods`
--

CREATE TABLE `nuke_downloads_mods` (
  `rid` int(11) NOT NULL auto_increment,
  `lid` int(11) NOT NULL default '0',
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `modifier` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `brokendownload` int(3) NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`rid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_downloads_mods`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_downloads_new`
--

CREATE TABLE `nuke_downloads_new` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `submitter` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`),
  KEY `title` (`title`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_downloads_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_events`
--

CREATE TABLE `nuke_events` (
  `eid` int(11) NOT NULL auto_increment,
  `aid` varchar(25) NOT NULL,
  `title` varchar(150) NOT NULL,
  `posteddate` datetime NOT NULL,
  `hometext` text,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(25) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
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
) ENGINE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_events`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_evolution`
--

CREATE TABLE `nuke_evolution` (
  `evo_field` varchar(50) NOT NULL default '',
  `evo_value` text NOT NULL,
  PRIMARY KEY  (`evo_field`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_evolution`
--

INSERT INTO `nuke_evolution` VALUES('sub', 'Xtreme');
INSERT INTO `nuke_evolution` VALUES('ver_check', '0');
INSERT INTO `nuke_evolution` VALUES('ver_previous', '0');
INSERT INTO `nuke_evolution` VALUES('lock_modules', '0');
INSERT INTO `nuke_evolution` VALUES('queries_count', '1');
INSERT INTO `nuke_evolution` VALUES('adminssl', '0');
INSERT INTO `nuke_evolution` VALUES('poll_random', '0');
INSERT INTO `nuke_evolution` VALUES('poll_days', '30');
INSERT INTO `nuke_evolution` VALUES('censor_words', 'ass asshole arse bitch bullshit c0ck clit cock crap cum cunt fag faggot fuck fucker fucking fuk fuking motherfucker pussy shit tits twat');
INSERT INTO `nuke_evolution` VALUES('censor', '0');
INSERT INTO `nuke_evolution` VALUES('usrclearcache', '0');
INSERT INTO `nuke_evolution` VALUES('cache_last_cleared', UNIX_TIMESTAMP( ));
INSERT INTO `nuke_evolution` VALUES('textarea', 'ckeditor');
INSERT INTO `nuke_evolution` VALUES('use_colors', '1');
INSERT INTO `nuke_evolution` VALUES('usegfxcheck', '0');
INSERT INTO `nuke_evolution` VALUES('codesize', '7');
INSERT INTO `nuke_evolution` VALUES('codefont', 'verdana');
INSERT INTO `nuke_evolution` VALUES('useimage', '1');
INSERT INTO `nuke_evolution` VALUES('lazy_tap', '0');
INSERT INTO `nuke_evolution` VALUES('img_resize', '1');
INSERT INTO `nuke_evolution` VALUES('img_width', '300');
INSERT INTO `nuke_evolution` VALUES('img_height', '300');
INSERT INTO `nuke_evolution` VALUES('capfile', '');
INSERT INTO `nuke_evolution` VALUES('module_collapse', '1');
INSERT INTO `nuke_evolution` VALUES('collapse', '1');
INSERT INTO `nuke_evolution` VALUES('evouserinfo_ec', '1');
INSERT INTO `nuke_evolution` VALUES('collapsetype', '0');
INSERT INTO `nuke_evolution` VALUES('analytics', '');
INSERT INTO `nuke_evolution` VALUES('use_stream', '1');
INSERT INTO `nuke_evolution` VALUES('html_auth', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_evo_userinfo`
--

CREATE TABLE `nuke_evo_userinfo` (
`name` VARCHAR( 25 ) NOT NULL ,
`filename` VARCHAR( 25 ) NOT NULL ,
`active` TINYINT( 1 ) DEFAULT '0' NOT NULL ,
`position` INT(10) NOT NULL,
`image` VARCHAR( 255 ) NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_evo_userinfo`
--

INSERT INTO `nuke_evo_userinfo` VALUES('Good Afternoon', 'good_afternoon', 1, 1, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Username', 'username', 0, 3, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Rank', 'rank', 1, 5, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Login/logout/register', 'login', 1, 8, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Current Online', 'online', 1, 10, '');
INSERT INTO `nuke_evo_userinfo` VALUES('PMs', 'pms', 1, 7, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Users', 'users', 1, 11, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Most Ever', 'mostever', 1, 13, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Members', 'members', 1, 4, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Avatar', 'avatar', 1, 2, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Personal Message', 'personal_message', 0, 2, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Language', 'language', 0, 4, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Posts', 'posts', 1, 15, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Break', 'Break', 1, 12, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Break', 'Break', 1, 9, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Break', 'Break', 1, 6, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Break', 'Break', 1, 3, '');
INSERT INTO `nuke_evo_userinfo` VALUES('Break', 'Break', 1, 14, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_evo_userinfo_addons`
--

CREATE TABLE `nuke_evo_userinfo_addons` (
`name` VARCHAR( 255 ) NOT NULL ,
`value` TEXT NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_evo_userinfo_addons`
--

INSERT INTO `nuke_evo_userinfo_addons` VALUES('good_afternoon_message', 'Good morning %name%:');
INSERT INTO `nuke_evo_userinfo_addons` VALUES('personal_message_message', '<div align="center">Hello %name%, <br />\r\nWelcome to %site%.</div>');
INSERT INTO `nuke_evo_userinfo_addons` VALUES('username_center', 'yes');
INSERT INTO `nuke_evo_userinfo_addons` VALUES('online_show_hv', 'no');
INSERT INTO `nuke_evo_userinfo_addons` VALUES('online_scroll', 'yes');
INSERT INTO `nuke_evo_userinfo_addons` VALUES('online_show_members', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_faqanswer`
--

CREATE TABLE `nuke_faqanswer` (
  `id` int(25) NOT NULL auto_increment,
  `id_cat` int(25) NOT NULL default '0',
  `question` varchar(255) default '',
  `answer` text,
  PRIMARY KEY  (`id`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_faqanswer`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_faqcategories`
--

CREATE TABLE `nuke_faqcategories` (
  `id_cat` tinyint(3) NOT NULL auto_increment,
  `categories` varchar(255) default NULL,
  `flanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id_cat`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_faqcategories`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_headlines`
--

CREATE TABLE `nuke_headlines` (
  `hid` int(11) NOT NULL auto_increment,
  `sitename` varchar(30) NOT NULL default '',
  `headlinesurl` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`hid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 ;

--
-- Dumping data for table `nuke_headlines`
--

INSERT INTO `nuke_headlines` VALUES(1, 'AbsoluteGames', 'http://files.gameaholic.com/agfa.rdf');
INSERT INTO `nuke_headlines` VALUES(2, 'BrunchingShuttlecocks', 'http://www.brunching.com/brunching.rdf');
INSERT INTO `nuke_headlines` VALUES(3, 'DailyDaemonNews', 'http://daily.daemonnews.org/ddn.rdf.php3');
INSERT INTO `nuke_headlines` VALUES(4, 'DigitalTheatre', 'http://www.dtheatre.com/backend.php3?xml=yes');
INSERT INTO `nuke_headlines` VALUES(5, 'DotKDE', 'http://dot.kde.org/rdf');
INSERT INTO `nuke_headlines` VALUES(6, 'FreeDOS', 'http://sourceforge.net/export/rss2_projnews.php?group_id=5109');
INSERT INTO `nuke_headlines` VALUES(7, 'Freshmeat', 'http://freshmeat.net/backend/fm.rdf');
INSERT INTO `nuke_headlines` VALUES(8, 'Gnome Desktop', 'http://www.gnomedesktop.org/backend.php');
INSERT INTO `nuke_headlines` VALUES(9, 'HappyPenguin', 'http://happypenguin.org/html/news.rdf');
INSERT INTO `nuke_headlines` VALUES(10, 'HollywoodBitchslap', 'http://hollywoodbitchslap.com/hbs.rdf');
INSERT INTO `nuke_headlines` VALUES(11, 'Learning Linux', 'http://www.learninglinux.com/backend.php');
INSERT INTO `nuke_headlines` VALUES(12, 'LinuxCentral', 'http://linuxcentral.com/backend/lcnew.rdf');
INSERT INTO `nuke_headlines` VALUES(13, 'LinuxJournal', 'http://www.linuxjournal.com/news.rss');
INSERT INTO `nuke_headlines` VALUES(14, 'LinuxWeelyNews', 'http://lwn.net/headlines/rss');
INSERT INTO `nuke_headlines` VALUES(15, 'Listology', 'http://listology.com/recent.rdf');
INSERT INTO `nuke_headlines` VALUES(16, 'MozillaNews', 'http://www.mozilla.org/news.rdf');
INSERT INTO `nuke_headlines` VALUES(17, 'NewsForge', 'http://www.newsforge.com/newsforge.rdf');
INSERT INTO `nuke_headlines` VALUES(18, 'Nuke-Evolution', 'http://www.nuke-evolution.com/rss.php?feed=news');
INSERT INTO `nuke_headlines` VALUES(19, 'NukeResources', 'http://www.nukeresources.com/backend.php');
INSERT INTO `nuke_headlines` VALUES(20, 'NukeScripts', 'http://www.nukescripts.net/backend.php');
INSERT INTO `nuke_headlines` VALUES(21, 'PDABuzz', 'http://www.pdabuzz.com/Home/tabid/54/moduleid/489/RSS.aspx');
INSERT INTO `nuke_headlines` VALUES(22, 'PHP-Nuke', 'http://phpnuke.org/backend.php');
INSERT INTO `nuke_headlines` VALUES(23, 'PHP.net', 'http://www.php.net/news.rss');
INSERT INTO `nuke_headlines` VALUES(24, 'PHPBuilder', 'http://phpbuilder.com/rss_feed.php');
INSERT INTO `nuke_headlines` VALUES(25, 'PerlMonks', 'http://www.perlmonks.org/headlines.rdf');
INSERT INTO `nuke_headlines` VALUES(26, 'TheNextLevel', 'http://www.the-nextlevel.com/rss/news');
INSERT INTO `nuke_headlines` VALUES(27, 'WebReference', 'http://webreference.com/webreference.rdf');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_hnl_categories`
--

CREATE TABLE `nuke_hnl_categories` (
  `cid` int(11) NOT NULL auto_increment,
  `ctitle` varchar(50) NOT NULL default '',
  `cdescription` text NOT NULL,
  `cblocklimit` int(4) NOT NULL default '10',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nuke_hnl_categories`
--

INSERT INTO `nuke_hnl_categories` VALUES(1, '*Unassigned*', 'This is a catch-all category where newsletters can default to or if all other categories are removed.  Do NOT remove this category!  This category of newsletters are only shown to the Admins.  ', 5);
INSERT INTO `nuke_hnl_categories` VALUES(2, 'Archived Newsletters', 'This category is for newsletter subscribers.', 5);
INSERT INTO `nuke_hnl_categories` VALUES(3, 'Archived Mass Mails', 'This category is used for mass mails.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_hnl_cfg`
--

CREATE TABLE `nuke_hnl_cfg` (
  `cfg_nm` varchar(255) NOT NULL default '',
  `cfg_val` longtext NOT NULL,
  PRIMARY KEY  (`cfg_nm`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_hnl_cfg`
--

INSERT INTO `nuke_hnl_cfg` VALUES('debug_mode', 'ERROR');
INSERT INTO `nuke_hnl_cfg` VALUES('debug_output', 'DISPLAY');
INSERT INTO `nuke_hnl_cfg` VALUES('show_blocks', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('dl_module', 'downloads');
INSERT INTO `nuke_hnl_cfg` VALUES('blk_lmt', '10');
INSERT INTO `nuke_hnl_cfg` VALUES('scroll', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('scroll_height', '180');
INSERT INTO `nuke_hnl_cfg` VALUES('scroll_amt', '2');
INSERT INTO `nuke_hnl_cfg` VALUES('scroll_delay', '100');
INSERT INTO `nuke_hnl_cfg` VALUES('version', '1.3.0');
INSERT INTO `nuke_hnl_cfg` VALUES('show_hits', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('show_dates', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('show_sender', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('show_categories', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('nsn_groups', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('latest_news', '5');
INSERT INTO `nuke_hnl_cfg` VALUES('latest_downloads', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('latest_links', '5');
INSERT INTO `nuke_hnl_cfg` VALUES('latest_forums', '5');
INSERT INTO `nuke_hnl_cfg` VALUES('latest_reviews', '0');
INSERT INTO `nuke_hnl_cfg` VALUES('wysiwyg_on', '1');
INSERT INTO `nuke_hnl_cfg` VALUES('wysiwyg_rows', '30');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_hnl_newsletters`
--

CREATE TABLE `nuke_hnl_newsletters` (
  `nid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '1',
  `topic` varchar(100) NOT NULL default '',
  `sender` varchar(20) NOT NULL default '',
  `filename` varchar(32) NOT NULL default '',
  `datesent` date default NULL,
  `view` int(1) NOT NULL default '0',
  `groups` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`nid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nuke_hnl_newsletters`
--

INSERT INTO `nuke_hnl_newsletters` VALUES(1, 1, 'PREVIEW Newsletter File', 'Admin', 'tmp.php', '0000-00-00', 99, '', 0);
INSERT INTO `nuke_hnl_newsletters` VALUES(2, 1, 'Tested Email Temporary File', 'Admin', 'testemail.php', '0000-00-00', 99, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_jag_whos_been`
--

CREATE TABLE `nuke_jag_whos_been` (
  `jag_whos_been_id` int(15) NOT NULL auto_increment,
  `jag_whos_been_user_id` int(11) NOT NULL default '0',
  `jag_whos_been_username` varchar(25) NOT NULL default '',
  `jag_whos_been_time` int(15) default NULL,
  `jag_whos_been_ip` varchar(50) default NULL,
  PRIMARY KEY  (`jag_whos_been_id`),
  UNIQUE KEY `id` (`jag_whos_been_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_jag_whos_been`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_jag_whos_been_config`
--

CREATE TABLE `nuke_jag_whos_been_config` (
  `jag_whos_been_user_maxi` int(5) NOT NULL default '0',
  `jag_whos_been_show_numb` int(1) NOT NULL default '0',
  `jag_whos_been_numb_lead` int(5) NOT NULL default '0',
  `jag_whos_been_name_leng` int(5) NOT NULL default '0',
  `jag_whos_been_show_expl` int(1) NOT NULL default '0',
  `jag_whos_been_expl_name` varchar(50) NOT NULL default ''
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_jag_whos_been_config`
--

INSERT INTO `nuke_jag_whos_been_config` VALUES(10, 0, 0, 15, 0, '[Shown as HH:MM:SS]');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_jmap`
--

CREATE TABLE `nuke_jmap` (
  `name` varchar(255) NOT NULL default '',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_jmap`
--

INSERT INTO `nuke_jmap` VALUES('xml', '1');
INSERT INTO `nuke_jmap` VALUES('ntopics', '10');
INSERT INTO `nuke_jmap` VALUES('nnews', '15');
INSERT INTO `nuke_jmap` VALUES('ndown', '10');
INSERT INTO `nuke_jmap` VALUES('nrev', '10');
INSERT INTO `nuke_jmap` VALUES('nuser', '5');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_links_categories`
--

CREATE TABLE `nuke_links_categories` (
  `cid` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `cdescription` text NOT NULL,
  `parentid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_links_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_links_editorials`
--

CREATE TABLE `nuke_links_editorials` (
  `linkid` int(11) NOT NULL default '0',
  `adminid` varchar(60) NOT NULL default '',
  `editorialtimestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `editorialtext` text NOT NULL,
  `editorialtitle` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`linkid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_links_editorials`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_links_links`
--

CREATE TABLE `nuke_links_links` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime default NULL,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `hits` int(11) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `linkratingsummary` double(6,4) NOT NULL default '0.0000',
  `totalvotes` int(11) NOT NULL default '0',
  `totalcomments` int(11) NOT NULL default '0',
  PRIMARY KEY  (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_links_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_links_modrequest`
--

CREATE TABLE `nuke_links_modrequest` (
  `requestid` int(11) NOT NULL auto_increment,
  `lid` int(11) NOT NULL default '0',
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `modifysubmitter` varchar(60) NOT NULL default '',
  `brokenlink` int(3) NOT NULL default '0',
  PRIMARY KEY  (`requestid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_links_modrequest`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_links_newlink`
--

CREATE TABLE `nuke_links_newlink` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `submitter` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_links_newlink`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_links_votedata`
--

CREATE TABLE `nuke_links_votedata` (
  `ratingdbid` int(11) NOT NULL auto_increment,
  `ratinglid` int(11) NOT NULL default '0',
  `ratinguser` varchar(60) NOT NULL default '',
  `rating` int(11) NOT NULL default '0',
  `ratinghostname` varchar(60) NOT NULL default '',
  `ratingcomments` text NOT NULL,
  `ratingtimestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ratingdbid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_links_votedata`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_link_us`
--

CREATE TABLE `nuke_link_us` (
  `id` int(255) NOT NULL auto_increment,
  `site_name` varchar(60) NOT NULL default '',
  `site_url` varchar(255) NOT NULL default '',
  `site_image` varchar(255) NOT NULL default '',
  `site_description` text NOT NULL,
  `site_hits` int(10) NOT NULL default '0',
  `site_status` int(1) NOT NULL default '0',
  `date_added` varchar(255) NOT NULL default '',
  `button_type` smallint(1) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `user_name` varchar(60) NOT NULL default '',
  `user_email` varchar(60) NOT NULL default '',
  `user_ip` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nuke_link_us`
--

INSERT INTO `nuke_link_us` VALUES(1, 'DarkForge Graphics', 'http://darkforgegfx.com', 'http://darkforgegfx.com/images/dfg_links/dark1.gif', 'Custom themes, modules and graphics. Web Hosting, Game Hosting, Theme Tutorials and more nuke tutorials.', 209, 1, '1221447923', 1, 0, 'killigan', 'killigan@darkforgegfx.com', '68.52.201.94');
INSERT INTO `nuke_link_us` VALUES(2, 'Realm Designz', 'http://www.realmdesignz.com', 'modules/Link_Us/buttons/RealmDesignz.gif', 'Realm Designz --&amp;gt; Designing Quality Themes You Trust!!', 184, 1, '1223603476', 1, 8, 'TheMortal', 'rd.themortal@gmail.com', '67.114.108.50');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_link_us_config`
--

CREATE TABLE `nuke_link_us_config` (
  `my_image` varchar(255) NOT NULL default '',
  `fade_effect` smallint(1) NOT NULL default '0',
  `marquee` smallint(1) NOT NULL default '0',
  `marquee_direction` smallint(1) NOT NULL default '0',
  `marquee_scroll` smallint(1) NOT NULL default '0',
  `block_height` smallint(1) NOT NULL default '0',
  `show_clicks` smallint(1) NOT NULL default '0',
  `button_seperate` smallint(1) NOT NULL default '0',
  `user_submit` smallint(1) NOT NULL default '0',
  `button_method` smallint(1) NOT NULL default '0',
  `button_height` tinyint(4) NOT NULL default '0',
  `button_banner_height` tinyint(4) NOT NULL default '0',
  `button_ressource_height` tinyint(4) NOT NULL default '0',
  `button_width` tinyint(4) NOT NULL default '0',
  `button_banner_width` tinyint(4) NOT NULL default '0',
  `button_ressource_width` tinyint(4) NOT NULL default '0',
  `upload_file` varchar(255) NOT NULL default '',
  `button_standard` smallint(1) NOT NULL default '0',
  `button_banner` smallint(1) NOT NULL default '0',
  `button_resource` smallint(1) NOT NULL default '0'
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_link_us_config`
--

INSERT INTO `nuke_link_us_config` VALUES('images/evo/minilogo.gif', 1, 1, 1, 2, 1, 0, 1, 1, 1, 31, 45, 31, 88, 127, 88, 'modules/Link_Us/buttons/', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_main`
--

CREATE TABLE `nuke_main` (
  `main_module` varchar(255) NOT NULL default '',
  KEY `main_module` (`main_module`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_main`
--

INSERT INTO `nuke_main` VALUES('News');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_MA_mapcfg`
--

CREATE TABLE `nuke_MA_mapcfg` (
  `keyfld` int(11) NOT NULL auto_increment,
  `apptxt` longtext NOT NULL,
  `admaddr` text NOT NULL,
  `emdetail` tinyint(1) NOT NULL default '0',
  `fpdetail` tinyint(1) NOT NULL default '0',
  `group_id` mediumint(8) NOT NULL default '0',
  `forum_id` smallint(5) NOT NULL default '0',
  `tytxt` longtext NOT NULL,
  `noapptxt` longtext NOT NULL,
  `appson` tinyint(1) NOT NULL default '1',
  `current` tinyint(1) NOT NULL default '0',
  `formtitle` varchar(64) NOT NULL default '',
  `appslimit` tinyint(1) NOT NULL default '0',
  `appslimitno` int(11) NOT NULL default '0',
  `appsfull` tinyint(1) NOT NULL default '0',
  `group_add` mediumint(8) NOT NULL default '0',
  `block_multi_apps` tinyint(1) NOT NULL default '1',
  `email_admin` tinyint(1) NOT NULL default '1',
  `mailgroup` tinyint(1) NOT NULL default '0',
  `topicwatch` tinyint(1) NOT NULL default '0',
  `emuser` tinyint(1) NOT NULL default '0',
  `formno` int(11) NOT NULL default '0',
  `annon` tinyint(1) NOT NULL default '0',
  `VertAlign` tinyint(1) NOT NULL default '0',
  `auto_group` tinyint(1) NOT NULL default '0',
  `approvtxt` longtext NOT NULL,
  `denytxt` longtext NOT NULL,
  `formlist` tinyint(1) NOT NULL default '0',
  `compat` tinyint(1) NOT NULL default '0',
  `emhtml` tinyint(1) NOT NULL default '0',
  UNIQUE KEY `keyfld` (`keyfld`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_MA_mapcfg`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_MA_mapp`
--

CREATE TABLE `nuke_MA_mapp` (
  `fldnum` int(10) unsigned NOT NULL auto_increment,
  `fldord` int(11) NOT NULL default '0',
  `fldname` text NOT NULL,
  `requrd` char(1) NOT NULL default '',
  `inuse` char(1) NOT NULL default '',
  `format` char(1) NOT NULL default '',
  `parent` smallint(6) NOT NULL default '0',
  `isdel` tinyint(1) NOT NULL default '0',
  `formno` int(11) NOT NULL default '0',
  `rgextxt` text,
  UNIQUE KEY `fldnum` (`fldnum`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_MA_mapp`
--

INSERT INTO `nuke_MA_mapp` VALUES(2, 0, 'User IP', '0', '0', 't', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_MA_mappresp`
--

CREATE TABLE `nuke_MA_mappresp` (
  `recno` bigint(11) NOT NULL auto_increment,
  `appnum` bigint(20) NOT NULL default '0',
  `userno` bigint(20) NOT NULL default '0',
  `qno` bigint(20) NOT NULL default '0',
  `response` longtext NOT NULL,
  `adate` text NOT NULL,
  `formno` int(11) NOT NULL default '0',
  `appstatus` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`recno`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_MA_mappresp`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_message`
--

CREATE TABLE `nuke_message` (
  `mid` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `content` text NOT NULL,
  `date` varchar(14) NOT NULL default '',
  `expire` int(7) NOT NULL default '0',
  `active` int(1) NOT NULL default '1',
  `view` int(1) NOT NULL default '1',
  `groups` TEXT NOT NULL,
  `mlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`mid`),
  UNIQUE KEY `mid` (`mid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_message`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_meta`
--

CREATE TABLE `nuke_meta` (
  `meta_name` varchar(50) NOT NULL default '',
  `meta_content` text NOT NULL,
  PRIMARY KEY  (`meta_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_meta`
--

INSERT INTO `nuke_meta` VALUES('resource-type', 'document');
INSERT INTO `nuke_meta` VALUES('distribution', 'global');
INSERT INTO `nuke_meta` VALUES('author', 'Nuke-Evolution Xtreme');
INSERT INTO `nuke_meta` VALUES('copyright', 'Copyright (c) by Nuke-Evolution');
INSERT INTO `nuke_meta` VALUES('keywords', 'Nuke-Evolution, evo, pne, evolution, nuke, php-nuke, software, downloads, community, forums, bulletin, boards, cms, nuke-evo, phpnuke');
INSERT INTO `nuke_meta` VALUES('description', 'Nuke-Evolution Xtreme');
INSERT INTO `nuke_meta` VALUES('robots', 'index, follow');
INSERT INTO `nuke_meta` VALUES('revisit-after', '1 days');
INSERT INTO `nuke_meta` VALUES('rating', 'general');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_modules`
--

CREATE TABLE `nuke_modules` (
    `mid` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `custom_title` VARCHAR(255) NOT NULL,
    `active` TINYINT(4) DEFAULT '0' NOT NULL,
    `view` TINYINT(4) DEFAULT '0' NOT NULL,
    `inmenu` TINYINT(4) DEFAULT '1' NOT NULL,
    `pos` TINYINT(4) DEFAULT '0' NOT NULL,
    `cat_id` TINYINT(4) DEFAULT '0' NOT NULL,
    `blocks` TINYINT(4) DEFAULT '1' NOT NULL,
  `admins` varchar(255) NOT NULL default '',
    `groups` VARCHAR(50) NULL,
  PRIMARY KEY  (`mid`),
  UNIQUE KEY `mid` (`mid`),
  KEY `title` (`title`),
  KEY `custom_title` (`custom_title`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_modules`
--

INSERT INTO `nuke_modules` VALUES(1, 'Advertising', 'Advertising', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(2, 'Content', 'Content', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(3, 'Docs', 'Docs', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(4, 'Downloads', 'Downloads', 1, 0, 1, 0, 5, 1, '', '');
INSERT INTO `nuke_modules` VALUES(6, 'FAQ', 'FAQ', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(7, 'Feedback', 'Feedback', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(8, 'Forums', 'Forums', 1, 0, 1, 0, 3, 1, '', '');
INSERT INTO `nuke_modules` VALUES(9, 'Groups', 'Groups', 1, 0, 1, 0, 2, 1, '', '');
INSERT INTO `nuke_modules` VALUES(10, 'Members_List', 'Members List', 1, 1, 1, 0, 2, 1, '', '');
INSERT INTO `nuke_modules` VALUES(11, 'News', 'News', 1, 0, 1, 0, 6, 3, '', '');
INSERT INTO `nuke_modules` VALUES(12, 'NukeSentinel', 'NukeSentinel', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(13, 'Private_Messages', 'Private Messages', 1, 0, 1, 0, 2, 1, '', '');
INSERT INTO `nuke_modules` VALUES(14, 'Profile', 'Profile', 1, 0, 1, 0, 2, 1, '', '');
INSERT INTO `nuke_modules` VALUES(15, 'Recommend_Us', 'Recommend Us', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(16, 'Reviews', 'Reviews', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(17, 'Search', 'Search', 1, 0, 1, 0, 3, 1, '', '');
INSERT INTO `nuke_modules` VALUES(18, 'Spambot_Killer', 'Spambot Killer', 1, 0, 0, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(19, 'Statistics', 'Statistics', 1, 0, 1, 0, 4, 1, '', '');
INSERT INTO `nuke_modules` VALUES(20, 'Stories_Archive', 'Stories Archive', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(21, 'Submit_News', 'Submit News', 1, 0, 1, 0, 6, 1, '', '');
INSERT INTO `nuke_modules` VALUES(22, 'Supporters', 'Supporters', 1, 0, 1, 0, 3, 1, '', '');
INSERT INTO `nuke_modules` VALUES(23, 'Surveys', 'Surveys', 1, 0, 1, 0, 3, 1, '', '');
INSERT INTO `nuke_modules` VALUES(24, 'Top', 'Top 10', 1, 0, 1, 0, 4, 1, '', '');
INSERT INTO `nuke_modules` VALUES(25, 'Topics', 'Topics', 1, 0, 1, 0, 6, 1, '', '');
INSERT INTO `nuke_modules` VALUES(26, 'Web_Links', 'Web Links', 1, 0, 1, 0, 5, 1, '', '');
INSERT INTO `nuke_modules` VALUES(27, 'Your_Account', 'Your Account', 1, 0, 1, 0, 2, 1, '', '');
INSERT INTO `nuke_modules` VALUES(28, 'Site_Map', 'Site Map', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(29, 'Donations', 'Donations', 1, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(30, 'Arcade_Tweaks', 'Arcade Tweaks', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(31, 'Calendar', 'Calendar', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(33, 'Evo_UserBlock', 'Evo UserBlock', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(34, 'HTML_Newsletter', 'HTML Newsletter', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(35, 'Link_Us', 'Link Us', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(36, 'Member_Application', 'Member Application', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(37, 'Projects', 'Projects', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(38, 'Shout_Box', 'Shout Box', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(39, 'Teamspeak', 'Teamspeak', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(40, 'Tutorials', 'Tutorials', 0, 0, 1, 0, 7, 1, '', '');
INSERT INTO `nuke_modules` VALUES(41, 'Who-is-Where', 'Who-is-Where', 0, 0, 1, 0, 7, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_modules_cat`
--

CREATE TABLE `nuke_modules_cat` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `image` text NOT NULL,
  `pos` tinyint(4) NOT NULL default '0',
  `link_type` tinyint(4) NOT NULL default '0',
  `link` varchar(255) NOT NULL,
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_modules_cat`
--

INSERT INTO `nuke_modules_cat` VALUES(1, 'Home', 'icon_home.gif', 0, 2, 'index.php');
INSERT INTO `nuke_modules_cat` VALUES(2, 'Members', 'icon_members.gif', 1, 0, '');
INSERT INTO `nuke_modules_cat` VALUES(3, 'Community', 'icon_community.gif', 2, 0, '');
INSERT INTO `nuke_modules_cat` VALUES(4, 'Statistics', 'icon_poll.gif', 3, 0, '');
INSERT INTO `nuke_modules_cat` VALUES(5, 'Files &amp; Links', 'icon_web.gif', 4, 0, '');
INSERT INTO `nuke_modules_cat` VALUES(6, 'News', 'icon_pencil.gif', 5, 0, '');
INSERT INTO `nuke_modules_cat` VALUES(7, 'Other', 'icon_general.gif', 6, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_modules_links`
--

CREATE TABLE `nuke_modules_links` (
  `lid` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(30) NOT NULL,
  `link_type` tinyint(4) NOT NULL default '0',
  `link` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL default '0',
  `view` tinyint(4) NOT NULL default '0',
  `pos` tinyint(4) NOT NULL default '0',
  `cat_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`lid`),
  UNIQUE KEY `lid` (`lid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_modules_links`
--

INSERT INTO `nuke_modules_links` VALUES(2, 'Home', 1, 'index.php', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_mostonline`
--

CREATE TABLE `nuke_mostonline` (
  `total` int(10) NOT NULL default '0',
  `members` int(10) NOT NULL default '0',
  `nonmembers` int(10) NOT NULL default '0',
  PRIMARY KEY  (`total`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_mostonline`
--

INSERT INTO `nuke_mostonline` VALUES(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsncb_blocks`
--

CREATE TABLE `nuke_nsncb_blocks` (
  `rid` tinyint(2) NOT NULL default '0',
  `cgid` tinyint(2) NOT NULL default '0',
  `cbid` tinyint(2) NOT NULL default '0',
  `title` varchar(60) NOT NULL default '',
  `filename` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `wtype` tinyint(1) NOT NULL default '0',
  `width` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`rid`),
  UNIQUE KEY `rid` (`rid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsncb_blocks`
--

INSERT INTO `nuke_nsncb_blocks` VALUES(1, 1, 1, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(2, 1, 2, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(3, 1, 3, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(4, 1, 4, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(5, 2, 1, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(6, 2, 2, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(7, 2, 3, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(8, 2, 4, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(9, 3, 1, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(10, 3, 2, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(11, 3, 3, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(12, 3, 4, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(13, 4, 1, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(14, 4, 2, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(15, 4, 3, 'Place Holder', '', 'This is only a place holder', 1, 25);
INSERT INTO `nuke_nsncb_blocks` VALUES(16, 4, 4, 'Place Holder', '', 'This is only a place holder', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsncb_config`
--

CREATE TABLE `nuke_nsncb_config` (
  `cgid` tinyint(1) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `height` smallint(6) NOT NULL,
  `count` tinyint(1) NOT NULL,
  PRIMARY KEY  (`cgid`),
  UNIQUE KEY `cfgid` (`cgid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsncb_config`
--

INSERT INTO `nuke_nsncb_config` VALUES(1, 0, 0, 0);
INSERT INTO `nuke_nsncb_config` VALUES(2, 0, 0, 0);
INSERT INTO `nuke_nsncb_config` VALUES(3, 0, 0, 0);
INSERT INTO `nuke_nsncb_config` VALUES(4, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnne_config`
--

CREATE TABLE `nuke_nsnne_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` longtext NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnne_config`
--

INSERT INTO `nuke_nsnne_config` VALUES('columns', '0');
INSERT INTO `nuke_nsnne_config` VALUES('readmore', '0');
INSERT INTO `nuke_nsnne_config` VALUES('texttype', '0');
INSERT INTO `nuke_nsnne_config` VALUES('notifyauth', '0');
INSERT INTO `nuke_nsnne_config` VALUES('homenumber', '0');
INSERT INTO `nuke_nsnne_config` VALUES('hometopic', '0');
INSERT INTO `nuke_nsnne_config` VALUES('version_number', '1.1.6');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_config`
--

CREATE TABLE `nuke_nsnpj_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnpj_config`
--

INSERT INTO `nuke_nsnpj_config` VALUES('admin_report_email', 'webmaster@yoursite.com');
INSERT INTO `nuke_nsnpj_config` VALUES('admin_request_email', 'webmaster@yoursite.com');
INSERT INTO `nuke_nsnpj_config` VALUES('location', 'Projects');
INSERT INTO `nuke_nsnpj_config` VALUES('new_project_position', '2');
INSERT INTO `nuke_nsnpj_config` VALUES('new_project_priority', '4');
INSERT INTO `nuke_nsnpj_config` VALUES('new_project_status', '3');
INSERT INTO `nuke_nsnpj_config` VALUES('new_report_position', '2');
INSERT INTO `nuke_nsnpj_config` VALUES('new_report_status', '1');
INSERT INTO `nuke_nsnpj_config` VALUES('new_report_type', '1');
INSERT INTO `nuke_nsnpj_config` VALUES('new_request_position', '2');
INSERT INTO `nuke_nsnpj_config` VALUES('new_request_status', '6');
INSERT INTO `nuke_nsnpj_config` VALUES('new_request_type', '1');
INSERT INTO `nuke_nsnpj_config` VALUES('new_task_position', '2');
INSERT INTO `nuke_nsnpj_config` VALUES('new_task_priority', '4');
INSERT INTO `nuke_nsnpj_config` VALUES('new_task_status', '4');
INSERT INTO `nuke_nsnpj_config` VALUES('notify_report_admin', '1');
INSERT INTO `nuke_nsnpj_config` VALUES('notify_report_submitter', '1');
INSERT INTO `nuke_nsnpj_config` VALUES('notify_request_admin', '1');
INSERT INTO `nuke_nsnpj_config` VALUES('notify_request_submitter', '1');
INSERT INTO `nuke_nsnpj_config` VALUES('project_date_format', 'Y-m-d H:i:s');
INSERT INTO `nuke_nsnpj_config` VALUES('report_date_format', 'Y-m-d H:i:s');
INSERT INTO `nuke_nsnpj_config` VALUES('request_date_format', 'Y-m-d H:i:s');
INSERT INTO `nuke_nsnpj_config` VALUES('task_date_format', 'Y-m-d H:i:s');
INSERT INTO `nuke_nsnpj_config` VALUES('version_number', '2.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_members`
--

CREATE TABLE `nuke_nsnpj_members` (
  `member_id` int(11) NOT NULL auto_increment,
  `member_name` varchar(255) NOT NULL default '',
  `member_email` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`member_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnpj_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_members_positions`
--

CREATE TABLE `nuke_nsnpj_members_positions` (
  `position_id` int(11) NOT NULL auto_increment,
  `position_name` varchar(255) NOT NULL default '',
  `position_weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`position_id`),
  KEY `position_id` (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nuke_nsnpj_members_positions`
--

INSERT INTO `nuke_nsnpj_members_positions` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_members_positions` VALUES(1, 'Manager', 1);
INSERT INTO `nuke_nsnpj_members_positions` VALUES(2, 'Developer', 2);
INSERT INTO `nuke_nsnpj_members_positions` VALUES(3, 'Tester', 3);
INSERT INTO `nuke_nsnpj_members_positions` VALUES(4, 'Sponsor', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_projects`
--

CREATE TABLE `nuke_nsnpj_projects` (
  `project_id` int(11) NOT NULL auto_increment,
  `project_name` varchar(255) NOT NULL default '',
  `project_description` text NOT NULL,
  `project_site` varchar(255) NOT NULL default '',
  `priority_id` int(11) NOT NULL default '0',
  `status_id` int(11) NOT NULL default '0',
  `project_percent` float NOT NULL default '0',
  `weight` int(11) NOT NULL default '0',
  `featured` tinyint(2) NOT NULL default '0',
  `allowreports` tinyint(2) NOT NULL default '0',
  `allowrequests` tinyint(2) NOT NULL default '0',
  `date_created` int(14) NOT NULL default '0',
  `date_started` int(14) NOT NULL default '0',
  `date_finished` int(14) NOT NULL default '0',
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnpj_projects`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_projects_members`
--

CREATE TABLE `nuke_nsnpj_projects_members` (
  `project_id` int(11) NOT NULL default '0',
  `member_id` int(11) NOT NULL default '0',
  `position_id` int(11) NOT NULL default '0',
  KEY `project_id` (`project_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnpj_projects_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_projects_priorities`
--

CREATE TABLE `nuke_nsnpj_projects_priorities` (
  `priority_id` int(11) NOT NULL auto_increment,
  `priority_name` varchar(30) NOT NULL default '',
  `priority_weight` int(11) NOT NULL default '1',
  PRIMARY KEY  (`priority_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nuke_nsnpj_projects_priorities`
--

INSERT INTO `nuke_nsnpj_projects_priorities` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_projects_priorities` VALUES(1, 'Low', 1);
INSERT INTO `nuke_nsnpj_projects_priorities` VALUES(2, 'Low-Med', 2);
INSERT INTO `nuke_nsnpj_projects_priorities` VALUES(3, 'Medium', 3);
INSERT INTO `nuke_nsnpj_projects_priorities` VALUES(4, 'High-Med', 4);
INSERT INTO `nuke_nsnpj_projects_priorities` VALUES(5, 'High', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_projects_status`
--

CREATE TABLE `nuke_nsnpj_projects_status` (
  `status_id` int(11) NOT NULL auto_increment,
  `status_name` varchar(255) NOT NULL default '',
  `status_weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nuke_nsnpj_projects_status`
--

INSERT INTO `nuke_nsnpj_projects_status` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_projects_status` VALUES(1, 'Pending', 1);
INSERT INTO `nuke_nsnpj_projects_status` VALUES(2, 'Completed', 2);
INSERT INTO `nuke_nsnpj_projects_status` VALUES(3, 'Active', 3);
INSERT INTO `nuke_nsnpj_projects_status` VALUES(4, 'Inactive', 4);
INSERT INTO `nuke_nsnpj_projects_status` VALUES(5, 'Released', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_reports`
--

CREATE TABLE `nuke_nsnpj_reports` (
  `report_id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL default '0',
  `type_id` int(11) NOT NULL default '0',
  `status_id` int(11) NOT NULL default '0',
  `report_name` varchar(255) NOT NULL default '',
  `report_description` text NOT NULL,
  `submitter_name` varchar(32) NOT NULL default '',
  `submitter_email` varchar(255) NOT NULL default '',
  `submitter_ip` varchar(20) NOT NULL default '0.0.0.0',
  `date_submitted` int(14) NOT NULL default '0',
  `date_commented` int(14) NOT NULL default '0',
  `date_modified` int(14) NOT NULL default '0',
  PRIMARY KEY  (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnpj_reports`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_reports_comments`
--

CREATE TABLE `nuke_nsnpj_reports_comments` (
  `comment_id` int(11) NOT NULL auto_increment,
  `report_id` int(11) NOT NULL default '0',
  `commenter_name` varchar(32) NOT NULL default '',
  `commenter_email` varchar(255) NOT NULL default '',
  `commenter_ip` varchar(20) NOT NULL default '0.0.0.0',
  `comment_description` text NOT NULL,
  `date_commented` int(14) NOT NULL default '0',
  PRIMARY KEY  (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnpj_reports_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_reports_members`
--

CREATE TABLE `nuke_nsnpj_reports_members` (
  `report_id` int(11) NOT NULL default '0',
  `member_id` int(11) NOT NULL default '0',
  `position_id` int(11) NOT NULL default '0',
  KEY `report_id` (`report_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnpj_reports_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_reports_status`
--

CREATE TABLE `nuke_nsnpj_reports_status` (
  `status_id` int(11) NOT NULL auto_increment,
  `status_name` varchar(255) NOT NULL default '',
  `status_weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nuke_nsnpj_reports_status`
--

INSERT INTO `nuke_nsnpj_reports_status` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(1, 'Open', 1);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(2, 'Closed', 2);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(3, 'Duplicate', 3);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(4, 'Feedback', 4);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(5, 'Submitted', 5);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(6, 'Suspended', 6);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(7, 'Assigned', 7);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(8, 'Info Needed', 8);
INSERT INTO `nuke_nsnpj_reports_status` VALUES(9, 'Unverifiable', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_reports_types`
--

CREATE TABLE `nuke_nsnpj_reports_types` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(255) NOT NULL default '',
  `type_weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_nsnpj_reports_types`
--

INSERT INTO `nuke_nsnpj_reports_types` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_reports_types` VALUES(1, 'General', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_requests`
--

CREATE TABLE `nuke_nsnpj_requests` (
  `request_id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL default '0',
  `type_id` int(11) NOT NULL default '0',
  `status_id` int(11) NOT NULL default '0',
  `request_name` varchar(255) NOT NULL default '',
  `request_description` text NOT NULL,
  `submitter_name` varchar(32) NOT NULL default '',
  `submitter_email` varchar(255) NOT NULL default '',
  `submitter_ip` varchar(20) NOT NULL default '0.0.0.0',
  `date_submitted` int(14) NOT NULL default '0',
  `date_commented` int(14) NOT NULL default '0',
  `date_modified` int(14) NOT NULL default '0',
  PRIMARY KEY  (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnpj_requests`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_requests_comments`
--

CREATE TABLE `nuke_nsnpj_requests_comments` (
  `comment_id` int(11) NOT NULL auto_increment,
  `request_id` int(11) NOT NULL default '0',
  `commenter_name` varchar(32) NOT NULL default '',
  `commenter_email` varchar(255) NOT NULL default '',
  `commenter_ip` varchar(20) NOT NULL default '0.0.0.0',
  `comment_description` text NOT NULL,
  `date_commented` int(14) NOT NULL default '0',
  PRIMARY KEY  (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnpj_requests_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_requests_members`
--

CREATE TABLE `nuke_nsnpj_requests_members` (
  `request_id` int(11) NOT NULL default '0',
  `member_id` int(11) NOT NULL default '0',
  `position_id` int(11) NOT NULL default '0',
  KEY `request_id` (`request_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnpj_requests_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_requests_status`
--

CREATE TABLE `nuke_nsnpj_requests_status` (
  `status_id` int(11) NOT NULL auto_increment,
  `status_name` varchar(255) NOT NULL default '',
  `status_weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 ;

--
-- Dumping data for table `nuke_nsnpj_requests_status`
--

INSERT INTO `nuke_nsnpj_requests_status` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(1, 'Duplicate', 1);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(2, 'Closed', 2);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(3, 'Inclusion', 3);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(4, 'Open', 4);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(5, 'Feedback', 5);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(6, 'Submitted', 6);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(7, 'Discarded', 7);
INSERT INTO `nuke_nsnpj_requests_status` VALUES(8, 'Assigned', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_requests_types`
--

CREATE TABLE `nuke_nsnpj_requests_types` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(255) NOT NULL default '',
  `type_weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_nsnpj_requests_types`
--

INSERT INTO `nuke_nsnpj_requests_types` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_requests_types` VALUES(1, 'General', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_tasks`
--

CREATE TABLE `nuke_nsnpj_tasks` (
  `task_id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL default '0',
  `task_name` varchar(255) NOT NULL default '',
  `task_description` text NOT NULL,
  `priority_id` int(11) NOT NULL default '1',
  `status_id` int(11) NOT NULL default '0',
  `task_percent` float NOT NULL default '0',
  `date_created` int(14) NOT NULL default '0',
  `date_started` int(14) NOT NULL default '0',
  `date_finished` int(14) NOT NULL default '0',
  PRIMARY KEY  (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnpj_tasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_tasks_members`
--

CREATE TABLE `nuke_nsnpj_tasks_members` (
  `task_id` int(11) NOT NULL default '0',
  `member_id` int(11) NOT NULL default '0',
  `position_id` int(11) NOT NULL default '0',
  KEY `task_id` (`task_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnpj_tasks_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_tasks_priorities`
--

CREATE TABLE `nuke_nsnpj_tasks_priorities` (
  `priority_id` int(11) NOT NULL auto_increment,
  `priority_name` varchar(30) NOT NULL default '',
  `priority_weight` int(11) NOT NULL default '1',
  PRIMARY KEY  (`priority_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nuke_nsnpj_tasks_priorities`
--

INSERT INTO `nuke_nsnpj_tasks_priorities` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_tasks_priorities` VALUES(1, 'Low', 1);
INSERT INTO `nuke_nsnpj_tasks_priorities` VALUES(2, 'Low-Med', 2);
INSERT INTO `nuke_nsnpj_tasks_priorities` VALUES(3, 'Medium', 3);
INSERT INTO `nuke_nsnpj_tasks_priorities` VALUES(4, 'High-Med', 4);
INSERT INTO `nuke_nsnpj_tasks_priorities` VALUES(5, 'High', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnpj_tasks_status`
--

CREATE TABLE `nuke_nsnpj_tasks_status` (
  `status_id` int(11) NOT NULL auto_increment,
  `status_name` varchar(255) NOT NULL default '',
  `status_weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nuke_nsnpj_tasks_status`
--

INSERT INTO `nuke_nsnpj_tasks_status` VALUES(-1, 'N/A', 0);
INSERT INTO `nuke_nsnpj_tasks_status` VALUES(1, 'Inactive', 1);
INSERT INTO `nuke_nsnpj_tasks_status` VALUES(2, 'On Going', 2);
INSERT INTO `nuke_nsnpj_tasks_status` VALUES(3, 'Holding', 3);
INSERT INTO `nuke_nsnpj_tasks_status` VALUES(4, 'Open', 4);
INSERT INTO `nuke_nsnpj_tasks_status` VALUES(5, 'Completed', 5);
INSERT INTO `nuke_nsnpj_tasks_status` VALUES(6, 'Discontinued', 6);
INSERT INTO `nuke_nsnpj_tasks_status` VALUES(7, 'Active', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnsp_config`
--

CREATE TABLE `nuke_nsnsp_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnsp_config`
--

INSERT INTO `nuke_nsnsp_config` VALUES('require_user', '1');
INSERT INTO `nuke_nsnsp_config` VALUES('image_type', '0');
INSERT INTO `nuke_nsnsp_config` VALUES('max_width', '88');
INSERT INTO `nuke_nsnsp_config` VALUES('max_height', '31');
INSERT INTO `nuke_nsnsp_config` VALUES('version_number', '1.3.0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnsp_sites`
--

CREATE TABLE `nuke_nsnsp_sites` (
  `site_id` int(11) NOT NULL auto_increment,
  `site_name` varchar(60) NOT NULL default '',
  `site_url` varchar(255) NOT NULL default '',
  `site_image` varchar(255) NOT NULL default '',
  `site_status` int(1) NOT NULL default '0',
  `site_hits` int(10) NOT NULL default '0',
  `site_date` date NOT NULL default '0000-00-00',
  `site_description` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `user_name` varchar(60) NOT NULL default '',
  `user_email` varchar(60) NOT NULL default '',
  `user_ip` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`site_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnsp_sites`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_admins`
--

CREATE TABLE `nuke_nsnst_admins` (
  `aid` varchar(25) NOT NULL default '',
  `login` varchar(25) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `password_md5` varchar(60) NOT NULL default '',
  `password_crypt` varchar(60) NOT NULL default '',
  `protected` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`aid`),
  KEY `password_md5` (`password_md5`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_admins`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_blocked_ips`
--

CREATE TABLE `nuke_nsnst_blocked_ips` (
  `ip_addr` varchar(15) NOT NULL default '',
  `ip_long` int(10) unsigned NOT NULL default '0',
  `user_id` int(11) NOT NULL default '1',
  `username` varchar(60) NOT NULL default 'Anonymous',
  `user_agent` text NOT NULL,
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `reason` tinyint(1) NOT NULL default '0',
  `query_string` text NOT NULL,
  `get_string` text NOT NULL,
  `post_string` text NOT NULL,
  `x_forward_for` varchar(32) NOT NULL default 'None',
  `client_ip` varchar(32) NOT NULL default 'None',
  `remote_addr` varchar(32) NOT NULL default '',
  `remote_port` varchar(11) NOT NULL default 'Unknown',
  `request_method` varchar(10) NOT NULL default '',
  `expires` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  PRIMARY KEY  (`ip_addr`),
  KEY `ip_long` (`ip_long`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_blocked_ips`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_blocked_ranges`
--

CREATE TABLE `nuke_nsnst_blocked_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `reason` tinyint(1) NOT NULL default '0',
  `expires` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_blocked_ranges`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_blockers`
--

CREATE TABLE `nuke_nsnst_blockers` (
  `blocker` int(4) NOT NULL default '0',
  `block_name` varchar(20) NOT NULL default '',
  `activate` int(4) NOT NULL default '0',
  `block_type` int(4) NOT NULL default '0',
  `email_lookup` int(4) NOT NULL default '0',
  `forward` varchar(255) NOT NULL default '',
  `reason` varchar(20) NOT NULL default '',
  `template` varchar(255) NOT NULL default '',
  `duration` int(20) NOT NULL default '0',
  `htaccess` int(4) NOT NULL default '0',
  `list` longtext NOT NULL,
  PRIMARY KEY  (`blocker`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_blockers`
--

INSERT INTO `nuke_nsnst_blockers` VALUES(0, 'other', 0, 0, 0, '', 'Abuse-Other', 'abuse_default.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(1, 'union', 5, 0, 2, '', 'Abuse-Union', 'abuse_union.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(2, 'clike', 5, 0, 2, '', 'Abuse-CLike', 'abuse_clike.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(3, 'harvester', 0, 0, 0, '', 'Abuse-Harvest', 'abuse_harvester.tpl', 0, 0, '@yahoo.com\r\nalexibot\r\nalligator\r\nanonymiz\r\nasterias\r\nbackdoorbot\r\nblack hole\r\nblackwidow\r\nblowfish\r\nbotalot\r\nbuiltbottough\r\nbullseye\r\nbunnyslippers\r\ncatch\r\ncegbfeieh\r\ncharon\r\ncheesebot\r\ncherrypicker\r\nchinaclaw\r\ncombine\r\ncopyrightcheck\r\ncosmos\r\ncrescent\r\ncurl\r\ndbrowse\r\ndisco\r\ndittospyder\r\ndlman\r\ndnloadmage\r\ndownload\r\ndreampassport\r\ndts agent\r\necatch\r\neirgrabber\r\nerocrawler\r\nexpress webpictures\r\nextractorpro\r\neyenetie\r\nfantombrowser\r\nfantomcrew browser\r\nfileheap\r\nfilehound\r\nflashget\r\nfoobot\r\nfranklin locator\r\nfreshdownload\r\nfscrawler\r\ngamespy_arcade\r\ngetbot\r\ngetright\r\ngetweb\r\ngo!zilla\r\ngo-ahead-got-it\r\ngrab\r\ngrafula\r\ngsa-crawler\r\nharvest\r\nhloader\r\nhmview\r\nhttplib\r\nhttpresume\r\nhttrack\r\nhumanlinks\r\nigetter\r\nimage stripper\r\nimage sucker\r\nindustry program\r\nindy library\r\ninfonavirobot\r\ninstallshield digitalwizard\r\nINTerget\r\niria\r\nirvine\r\niupui research bot\r\njbh agent\r\njennybot\r\njetcar\r\njobo\r\njoc\r\nkapere\r\nkenjin spider\r\nkeyword density\r\nlarbin\r\nleechftp\r\nleechget\r\nlexibot\r\nlibweb/clshttp\r\nlibwww-perl\r\nlightningdownload\r\nlincoln state web browser\r\nlinkextractorpro\r\nlinkscan/8.1a.unix\r\nlinkwalker\r\nlwp-trivial\r\nlwp::simple\r\nmac finder\r\nmata hari\r\nmediasearch\r\nmetaproducts\r\nmicrosoft url control\r\nmidown tool\r\nmiixpc\r\nmissauga locate\r\nmissouri college browse\r\nmister pix\r\nmoget\r\nmozilla.*newt\r\nmozilla/3.0 (compatible)\r\nmozilla/3.mozilla/2.01\r\nmsie 4.0 (win95)\r\nmultiblocker browser\r\nmydaemon\r\nmygetright\r\nnabot\r\nnavroad\r\nnearsite\r\nnet vampire\r\nnetants\r\nnetmechanic\r\nnetpumper\r\nnetspider\r\nnewsearchengine\r\nnicerspro\r\nninja\r\nnitro downloader\r\nnpbot\r\noctopus\r\noffline explorer\r\noffline navigator\r\nopenfind\r\npagegrabber\r\npapa foto\r\npavuk\r\npbrowse\r\npcbrowser\r\npeval\r\npompos/\r\nprogram shareware\r\npropowerbot\r\nprowebwalker\r\npsurf\r\npuf\r\npuxarapido\r\nqueryn metasearch\r\nrealdownload\r\nreget\r\nrepomonkey\r\nrsurf\r\nrumours-agent\r\nsakura\r\nscan4mail\r\nsemanticdiscovery\r\nsitesnagger\r\nslysearch\r\nspankbot\r\nspanner \r\nspiderzilla\r\nsq webscanner\r\nstamina\r\nstar downloader\r\nsteeler\r\nsteeler\r\nstrip\r\nsuperbot\r\nsuperhttp\r\nsurfbot\r\nsuzuran\r\nswbot\r\nszukacz\r\ntakeout\r\nteleport\r\ntelesoft\r\ntest spider\r\nthe INTraformant\r\nthenomad\r\ntighttwatbot\r\ntitan\r\ntocrawl/urldispatcher\r\ntrue_robot\r\ntsurf\r\nturing machine\r\nturingos\r\nurlblaze\r\nurlgetfile\r\nurly warning\r\nutilmind\r\nvci\r\nvoideye\r\nweb image collector\r\nweb sucker\r\nwebauto\r\nwebbandit\r\nwebcapture\r\nwebcollage\r\nwebcopier\r\nwebenhancer\r\nwebfetch\r\nwebgo\r\nwebleacher\r\nwebmasterworldforumbot\r\nwebql\r\nwebreaper\r\nwebsite extractor\r\nwebsite quester\r\nwebster\r\nwebstripper\r\nwebwhacker\r\nwep search\r\nwget\r\nwhizbang\r\nwidow\r\nwildsoft surfer\r\nwww-collector-e\r\nwww.netwu.com\r\nwwwoffle\r\nxaldon\r\nxenu\r\nzeus\r\nziggy\r\nzippy');
INSERT INTO `nuke_nsnst_blockers` VALUES(4, 'script', 5, 0, 2, '', 'Abuse-Script', 'abuse_script.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(5, 'author', 5, 0, 2, '', 'Abuse-Author', 'abuse_author.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(6, 'referer', 5, 0, 2, '', 'Abuse-Referer', 'abuse_referer.tpl', 0, 0, '121hr.com\r\n1st-call.net\r\n1stcool.com\r\n5000n.com\r\n69-xxx.com\r\n9irl.com\r\n9uy.com\r\na-day-at-the-party.com\r\naccessthepeace.com\r\nadult-model-nude-pictures.com\r\nadult-sex-toys-free-porn.com\r\nagnitum.com\r\nalfonssackpfeiffe.com\r\nalongwayfrommars.com\r\nanime-sex-1.com\r\nanorex-sf-stimulant-free.com\r\nantibot.net\r\nantique-tokiwa.com\r\napotheke-heute.com\r\narmada31.com\r\nartark.com\r\nartlilei.com\r\nascendbtg.com\r\naschalaecheck.com\r\nasian-sex-free-sex.com\r\naslowspeeker.com\r\nassasinatedfrogs.com\r\nathirst-for-tranquillity.net\r\naubonpanier.com\r\navalonumc.com\r\nayingba.com\r\nbayofnoreturn.com\r\nbbw4phonesex.com\r\nbeersarenotfree.com\r\nbierikiuetsch.com\r\nbilingualannouncements.com\r\nblack-pussy-toon-clip-anal-lover-single.com\r\nblownapart.com\r\nblueroutes.com\r\nboasex.com\r\nbooksandpages.com\r\nbootyquake.com\r\nbossyhunter.com\r\nboyz-sex.com\r\nbrokersaandpokers.com\r\nbrowserwindowcleaner.com\r\nbudobytes.com\r\nbusiness2fun.com\r\nbuymyshitz.com\r\nbyuntaesex.com\r\ncaniputsomeloveINToyou.com\r\ncartoons.net.ru\r\ncaverunsailing.com\r\ncertainhealth.com\r\nclantea.com\r\nclose-protection-services.com\r\nclubcanino.com\r\nclubstic.com\r\ncobrakai-skf.com\r\ncollegefucktour.co.uk\r\ncommanderspank.com\r\ncoolenabled.com\r\ncrusecountryart.com\r\ncrusingforsex.co.uk\r\ncunt-twat-pussy-juice-clit-licking.com\r\ncustomerhandshaker.com\r\ncyborgrama.com\r\ndarkprofits.co.uk\r\ndatingforme.co.uk\r\ndatingmind.com\r\ndegree.org.ru\r\ndelorentos.com\r\ndiggydigger.com\r\ndinkydonkyaussie.com\r\ndjpritchard.com\r\ndjtop.com\r\ndraufgeschissen.com\r\ndreamerteens.co.uk\r\nebonyarchives.co.uk\r\nebonyplaya.co.uk\r\necobuilder2000.com\r\nemailandemail.com\r\nemedici.net\r\nengine-on-fire.com\r\nerocity.co.uk\r\nesport3.com\r\neteenbabes.com\r\neurofreepages.com\r\neurotexans.com\r\nevolucionweb.com\r\nfakoli.com\r\nfe4ba.com\r\nferienschweden.com\r\nfindly.com\r\nfirsttimeteadrinker.com\r\nfishing.net.ru\r\nflatwonkers.com\r\nflowershopentertainment.com\r\nflymario.com\r\nfree-xxx-pictures-porno-gallery.com\r\nfreebestporn.com\r\nfreefuckingmovies.co.uk\r\nfreexxxstuff.co.uk\r\nfruitologist.net\r\nfruitsandbolts.com\r\nfuck-cumshots-free-midget-movie-clips.com\r\nfuck-michaelmoore.com\r\nfundacep.com\r\ngadless.com\r\ngallapagosrangers.com\r\ngalleries4free.co.uk\r\ngalofu.com\r\ngaypixpost.co.uk\r\ngeomasti.com\r\ngirltime.co.uk\r\nglassrope.com\r\ngodjustblessyouall.com\r\ngoldenageresort.com\r\ngonnabedaddies.com\r\ngranadasexi.com\r\ngranadasexi.com\r\nguardingtheangels.com\r\nguyprofiles.co.uk\r\nhappy1225.com\r\nhappychappywacky.com\r\nhealth.org.ru\r\nhexplas.com\r\nhighheelsmodels4fun.com\r\nhillsweb.com\r\nhiptuner.com\r\nhistoryINTospace.com\r\nhoa-tuoi.com\r\nhomebuyinginatlanta.com\r\nhorizonultra.com\r\nhorseminiature.net\r\nhotkiss.co.uk\r\nhotlivegirls.co.uk\r\nhotmatchup.co.uk\r\nhusler.co.uk\r\niaentertainment.com\r\niamnotsomeone.com\r\niconsofcorruption.com\r\nihavenotrustinyou.com\r\ninformat-systems.com\r\nINTeriorproshop.com\r\nINTersoftnetworks.com\r\nINThecrib.com\r\ninvestment4cashiers.com\r\niti-trailers.com\r\njackpot-hacker.com\r\njacks-world.com\r\njamesthesailorbasher.com\r\njesuislemonds.com\r\njustanotherdomainname.com\r\nkampelicka.com\r\nkanalrattenarsch.com\r\nkatzasher.com\r\nkerosinjunkie.com\r\nkillasvideo.com\r\nkoenigspisser.com\r\nkontorpara.com\r\nl8t.com\r\nlaestacion101.com\r\nlambuschlamppen.com\r\nlankasex.co.uk\r\nlaser-creations.com\r\nle-tour-du-monde.com\r\nlecraft.com\r\nledo-design.com\r\nleftregistration.com\r\nlekkikoomastas.com\r\nlepommeau.com\r\nlibr-animal.com\r\nlibraries.org.ru\r\nlikewaterlikewind.com\r\nlimbojumpers.com\r\nlink.ru\r\nlockportlinks.com\r\nloiproject.com\r\nlongtermalternatives.com\r\nlottoeco.com\r\nlucalozzi.com\r\nmaki-e-pens.com\r\nmalepayperview.co.uk\r\nmangaxoxo.com\r\nmaps.org.ru\r\nmarcofields.com\r\nmasterofcheese.com\r\nmasteroftheblasterhill.com\r\nmastheadwankers.com\r\nmegafrontier.com\r\nmeinschuppen.com\r\nmercurybar.com\r\nmetapannas.com\r\nmicelebre.com\r\nmidnightlaundries.com\r\nmikeapartment.co.uk\r\nmillenniumchorus.com\r\nmimundial2002.com\r\nminiaturegallerymm.com\r\nmixtaperadio.com\r\nmondialcoral.com\r\nmonja-wakamatsu.com\r\nmonstermonkey.net\r\nmouthfreshners.com\r\nmullensholiday.com\r\nmusilo.com\r\nmyhollowlog.com\r\nmyhomephonenumber.com\r\nmykeyboardisbroken.com\r\nmysofia.net\r\nnaked-cheaters.com\r\nnaked-old-women.com\r\nnastygirls.co.uk\r\nnationclan.net\r\nnatterratter.com\r\nnaughtyadam.com\r\nnestbeschmutzer.com\r\nnetwu.com\r\nnewrealeaseonline.com\r\nnewrealeasesonline.com\r\nnextfrontiersonline.com\r\nnikostaxi.com\r\nnotorious7.com\r\nnrecruiter.com\r\nnursingdepot.com\r\nnustramosse.com\r\nnuturalhicks.com\r\noccaz-auto49.com\r\nocean-db.net\r\noilburnerservice.net\r\nomburo.com\r\noneoz.com\r\nonepageahead.net\r\nonlinewithaline.com\r\norganizate.net\r\nourownweddingsong.com\r\nowen-music.com\r\np-partners.com\r\npaginadeautor.com\r\npakistandutyfree.com\r\npamanderson.co.uk\r\nparentsense.net\r\nparticlewave.net\r\npay-clic.com\r\npay4link.net\r\npcisp.com\r\npersist-pharma.com\r\npeteband.com\r\npetplusindia.com\r\npickabbw.co.uk\r\npicture-oral-position-lesbian.com\r\npl8again.com\r\nplaneting.net\r\npopusky.com\r\nporn-expert.com\r\npromoblitza.com\r\nproproducts-usa.com\r\nptcgzone.com\r\nptporn.com\r\npublishmybong.com\r\nputtingtogether.com\r\nqualifiedcancelations.com\r\nrahost.com\r\nrainbow21.com\r\nrakkashakka.com\r\nrandomfeeding.com\r\nrape-art.com\r\nrd-brains.com\r\nrealestateonthehill.net\r\nrebuscadobot\r\nrequested-stuff.com\r\nretrotrasher.com\r\nricopositive.com\r\nrisorseinrete.com\r\nrotatingcunts.com\r\nrunawayclicks.com\r\nrutalibre.com\r\ns-marche.com\r\nsabrosojazz.com\r\nsamuraidojo.com\r\nsanaldarbe.com\r\nsasseminars.com\r\nschlampenbruzzler.com\r\nsearchmybong.com\r\nseckur.com\r\nsex-asian-porn-INTerracial-photo.com\r\nsex-porn-fuck-hardcore-movie.com\r\nsexa3.net\r\nsexer.com\r\nsexINTention.com\r\nsexnet24.tv\r\nsexomundo.com\r\nsharks.com.ru\r\nshells.com.ru\r\nshop-ecosafe.com\r\nshop-toon-hardcore-fuck-cum-pics.com\r\nsilverfussions.com\r\nsin-city-sex.net\r\nsluisvan.com\r\nsmutshots.com\r\nsnagglersmaggler.com\r\nsomethingtoforgetit.com\r\nsophiesplace.net\r\nsoursushi.com\r\nsouthernxstables.com\r\nspeed467.com\r\nspeedpal4you.com\r\nsporty.org.ru\r\nstopdriving.net\r\nstw.org.ru\r\nsufficientlife.com\r\nsussexboats.net\r\nswinger-party-free-dating-porn-sluts.com\r\nsydneyhay.com\r\nszmjht.com\r\nteninchtrout.com\r\nthebalancedfruits.com\r\ntheendofthesummit.com\r\nthiswillbeit.com\r\nthosethosethose.com\r\nticyclesofindia.com\r\ntits-gay-fagot-black-tits-bigtits-amateur.com\r\ntonius.com\r\ntoohsoft.com\r\ntoolvalley.com\r\ntooporno.net\r\ntoosexual.com\r\ntorngat.com\r\ntour.org.ru\r\ntowneluxury.com\r\ntrafficmogger.com\r\ntriacoach.net\r\ntrottinbob.com\r\ntttframes.com\r\ntvjukebox.net\r\nundercvr.com\r\nunfinished-desires.com\r\nunicornonero.com\r\nunionvillefire.com\r\nupsandowns.com\r\nupthehillanddown.com\r\nvallartavideo.com\r\nvietnamdatingservices.com\r\nvinegarlemonshots.com\r\nvizy.net.ru\r\nvnladiesdatingservices.com\r\nvomitandbusted.com\r\nwalkingthewalking.com\r\nwell-I-am-the-type-of-boy.com\r\nwhales.com.ru\r\nwhincer.net\r\nwhitpagesrippers.com\r\nwhois.sc\r\nwipperrippers.com\r\nwordfilebooklets.com\r\nworld-sexs.com\r\nxsay.com\r\nxxxchyangel.com\r\nxxxzips.com\r\nyouarelostINTransit.com\r\nyuppieslovestocks.com\r\nyuzhouhuagong.com\r\nzhaori-food.com\r\nzwiebelbacke.com');
INSERT INTO `nuke_nsnst_blockers` VALUES(7, 'filter', 5, 0, 2, '', 'Abuse-Filter', 'abuse_filter.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(8, 'request', 0, 0, 0, '', 'Abuse-Request', 'abuse_request.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(9, 'string', 0, 0, 0, '', 'Abuse-String', 'abuse_string.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(10, 'admin', 0, 0, 0, '', 'Abuse-Admin', 'abuse_admin.tpl', 0, 0, '');
INSERT INTO `nuke_nsnst_blockers` VALUES(11, 'flood', 0, 1, 2, '', 'Abuse-Flood', 'abuse_flood.tpl', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_cidrs`
--

CREATE TABLE `nuke_nsnst_cidrs` (
  `cidr` int(2) NOT NULL default '0',
  `hosts` int(10) NOT NULL default '0',
  `mask` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`cidr`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_cidrs`
--

INSERT INTO `nuke_nsnst_cidrs` VALUES(1, 2147483647, '127.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(2, 1073741824, '63.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(3, 536870912, '31.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(4, 268435456, '15.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(5, 134217728, '7.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(6, 67108864, '3.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(7, 33554432, '1.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(8, 16777216, '0.255.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(9, 8388608, '0.127.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(10, 4194304, '0.63.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(11, 2097152, '0.31.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(12, 1048576, '0.15.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(13, 524288, '0.7.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(14, 262144, '0.3.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(15, 131072, '0.1.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(16, 65536, '0.0.255.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(17, 32768, '0.0.127.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(18, 16384, '0.0.63.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(19, 8192, '0.0.31.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(20, 4096, '0.0.15.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(21, 2048, '0.0.7.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(22, 1024, '0.0.3.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(23, 512, '0.0.1.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(24, 256, '0.0.0.255');
INSERT INTO `nuke_nsnst_cidrs` VALUES(25, 128, '0.0.0.127');
INSERT INTO `nuke_nsnst_cidrs` VALUES(26, 64, '0.0.0.63');
INSERT INTO `nuke_nsnst_cidrs` VALUES(27, 32, '0.0.0.31');
INSERT INTO `nuke_nsnst_cidrs` VALUES(28, 16, '0.0.0.15');
INSERT INTO `nuke_nsnst_cidrs` VALUES(29, 8, '0.0.0.7');
INSERT INTO `nuke_nsnst_cidrs` VALUES(30, 4, '0.0.0.3');
INSERT INTO `nuke_nsnst_cidrs` VALUES(31, 2, '0.0.0.1');
INSERT INTO `nuke_nsnst_cidrs` VALUES(32, 1, '0.0.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_config`
--

CREATE TABLE `nuke_nsnst_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` longtext NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_config`
--

INSERT INTO `nuke_nsnst_config` VALUES('admin_contact', 'webmaster@yoursite.com');
INSERT INTO `nuke_nsnst_config` VALUES('block_perpage', '50');
INSERT INTO `nuke_nsnst_config` VALUES('block_sort_column', 'date');
INSERT INTO `nuke_nsnst_config` VALUES('block_sort_direction', 'desc');
INSERT INTO `nuke_nsnst_config` VALUES('crypt_salt', 'N$');
INSERT INTO `nuke_nsnst_config` VALUES('display_link', '3');
INSERT INTO `nuke_nsnst_config` VALUES('display_reason', '3');
INSERT INTO `nuke_nsnst_config` VALUES('force_nukeurl', '0');
INSERT INTO `nuke_nsnst_config` VALUES('help_switch', '1');
INSERT INTO `nuke_nsnst_config` VALUES('htaccess_path', '');
INSERT INTO `nuke_nsnst_config` VALUES('http_auth', '0');
INSERT INTO `nuke_nsnst_config` VALUES('lookup_link', 'http://www.DNSstuff.com/tools/whois.ch?ip=');
INSERT INTO `nuke_nsnst_config` VALUES('page_delay', '5');
INSERT INTO `nuke_nsnst_config` VALUES('prevent_dos', '1');
INSERT INTO `nuke_nsnst_config` VALUES('proxy_reason', 'admin_proxy_reason.tpl');
INSERT INTO `nuke_nsnst_config` VALUES('proxy_switch', '0');
INSERT INTO `nuke_nsnst_config` VALUES('santy_protection', '1');
INSERT INTO `nuke_nsnst_config` VALUES('self_expire', '0');
INSERT INTO `nuke_nsnst_config` VALUES('site_reason', 'admin_site_reason.tpl');
INSERT INTO `nuke_nsnst_config` VALUES('site_switch', '0');
INSERT INTO `nuke_nsnst_config` VALUES('staccess_path', '');
INSERT INTO `nuke_nsnst_config` VALUES('track_active', '1');
INSERT INTO `nuke_nsnst_config` VALUES('track_max', '604800');
INSERT INTO `nuke_nsnst_config` VALUES('track_perpage', '50');
INSERT INTO `nuke_nsnst_config` VALUES('track_sort_column', '6');
INSERT INTO `nuke_nsnst_config` VALUES('track_sort_direction', 'desc');
INSERT INTO `nuke_nsnst_config` VALUES('ip_reason', 'admin_ip_reason.tpl');
INSERT INTO `nuke_nsnst_config` VALUES('ip_switch', '0');
INSERT INTO `nuke_nsnst_config` VALUES('ftaccess_path', '');
INSERT INTO `nuke_nsnst_config` VALUES('flood_delay', '2');
INSERT INTO `nuke_nsnst_config` VALUES('disable_switch', '0');
INSERT INTO `nuke_nsnst_config` VALUES('track_clear', '0');
INSERT INTO `nuke_nsnst_config` VALUES('blocked_clear', '0');
INSERT INTO `nuke_nsnst_config` VALUES('version_check', '$checktime');
INSERT INTO `nuke_nsnst_config` VALUES('version_newest', '2.6.01');
INSERT INTO `nuke_nsnst_config` VALUES('version_number', '2.6.01');
INSERT INTO `nuke_nsnst_config` VALUES('dump_directory', '');
INSERT INTO `nuke_nsnst_config` VALUES('show_right', '0');
INSERT INTO `nuke_nsnst_config` VALUES('test_switch', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_countries`
--

CREATE TABLE `nuke_nsnst_countries` (
  `c2c` char(2) NOT NULL default '',
  `country` varchar(60) NOT NULL default '',
  KEY `c2c` (`c2c`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_countries`
--

INSERT INTO `nuke_nsnst_countries` VALUES('00', 'Unknown');
INSERT INTO `nuke_nsnst_countries` VALUES('01', 'IANA Reserved');
INSERT INTO `nuke_nsnst_countries` VALUES('ac', 'Ascension Island');
INSERT INTO `nuke_nsnst_countries` VALUES('ad', 'Andorra');
INSERT INTO `nuke_nsnst_countries` VALUES('ae', 'United Arab Emirates');
INSERT INTO `nuke_nsnst_countries` VALUES('af', 'Afghanistan');
INSERT INTO `nuke_nsnst_countries` VALUES('ag', 'Antigua And Barbuda');
INSERT INTO `nuke_nsnst_countries` VALUES('ai', 'Anguilla');
INSERT INTO `nuke_nsnst_countries` VALUES('al', 'Albania');
INSERT INTO `nuke_nsnst_countries` VALUES('am', 'Armenia');
INSERT INTO `nuke_nsnst_countries` VALUES('an', 'Netherlands Antilles');
INSERT INTO `nuke_nsnst_countries` VALUES('ao', 'Angola');
INSERT INTO `nuke_nsnst_countries` VALUES('ap', 'Aripo');
INSERT INTO `nuke_nsnst_countries` VALUES('aq', 'Antartica');
INSERT INTO `nuke_nsnst_countries` VALUES('ar', 'Argentina');
INSERT INTO `nuke_nsnst_countries` VALUES('as', 'Samoa, American');
INSERT INTO `nuke_nsnst_countries` VALUES('at', 'Austria');
INSERT INTO `nuke_nsnst_countries` VALUES('au', 'Australia');
INSERT INTO `nuke_nsnst_countries` VALUES('aw', 'Aruba');
INSERT INTO `nuke_nsnst_countries` VALUES('ax', 'Aaland Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('az', 'Azerbaijan');
INSERT INTO `nuke_nsnst_countries` VALUES('ba', 'Bosnia And Herzegovina');
INSERT INTO `nuke_nsnst_countries` VALUES('bb', 'Barbados');
INSERT INTO `nuke_nsnst_countries` VALUES('bd', 'Bangladesh');
INSERT INTO `nuke_nsnst_countries` VALUES('be', 'Belgium');
INSERT INTO `nuke_nsnst_countries` VALUES('bf', 'Burkina Faso');
INSERT INTO `nuke_nsnst_countries` VALUES('bg', 'Bulgaria');
INSERT INTO `nuke_nsnst_countries` VALUES('bh', 'Bahrain');
INSERT INTO `nuke_nsnst_countries` VALUES('bi', 'Burundi');
INSERT INTO `nuke_nsnst_countries` VALUES('bj', 'Benin');
INSERT INTO `nuke_nsnst_countries` VALUES('bm', 'Bermuda');
INSERT INTO `nuke_nsnst_countries` VALUES('bn', 'Brunei Darussalam');
INSERT INTO `nuke_nsnst_countries` VALUES('bo', 'Bolivia');
INSERT INTO `nuke_nsnst_countries` VALUES('br', 'Brazil');
INSERT INTO `nuke_nsnst_countries` VALUES('bs', 'Bahamas');
INSERT INTO `nuke_nsnst_countries` VALUES('bt', 'Bhutan');
INSERT INTO `nuke_nsnst_countries` VALUES('bv', 'Bouvet Island');
INSERT INTO `nuke_nsnst_countries` VALUES('bw', 'Botswana');
INSERT INTO `nuke_nsnst_countries` VALUES('by', 'Belarus');
INSERT INTO `nuke_nsnst_countries` VALUES('bz', 'Belize');
INSERT INTO `nuke_nsnst_countries` VALUES('ca', 'Canada');
INSERT INTO `nuke_nsnst_countries` VALUES('cc', 'Cocos (Keeling) Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('cd', 'Congo, Democratic Republic Of The');
INSERT INTO `nuke_nsnst_countries` VALUES('cf', 'Central African Republic');
INSERT INTO `nuke_nsnst_countries` VALUES('cg', 'Congo, Republic Of The');
INSERT INTO `nuke_nsnst_countries` VALUES('ch', 'Switzerland');
INSERT INTO `nuke_nsnst_countries` VALUES('ci', 'Cote D''ivoire');
INSERT INTO `nuke_nsnst_countries` VALUES('ck', 'Cook Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('cl', 'Chile');
INSERT INTO `nuke_nsnst_countries` VALUES('cm', 'Cameroon');
INSERT INTO `nuke_nsnst_countries` VALUES('cn', 'China');
INSERT INTO `nuke_nsnst_countries` VALUES('co', 'Colombia');
INSERT INTO `nuke_nsnst_countries` VALUES('cr', 'Costa Rica');
INSERT INTO `nuke_nsnst_countries` VALUES('cs', 'Czechoslovakia (Former)');
INSERT INTO `nuke_nsnst_countries` VALUES('cu', 'Cuba');
INSERT INTO `nuke_nsnst_countries` VALUES('cv', 'Cape Verde');
INSERT INTO `nuke_nsnst_countries` VALUES('cx', 'Christmas Island');
INSERT INTO `nuke_nsnst_countries` VALUES('cy', 'Cyprus');
INSERT INTO `nuke_nsnst_countries` VALUES('cz', 'Czech Republic');
INSERT INTO `nuke_nsnst_countries` VALUES('de', 'Germany');
INSERT INTO `nuke_nsnst_countries` VALUES('dj', 'Djibouti');
INSERT INTO `nuke_nsnst_countries` VALUES('dk', 'Denmark');
INSERT INTO `nuke_nsnst_countries` VALUES('dm', 'Dominica');
INSERT INTO `nuke_nsnst_countries` VALUES('do', 'Dominican Republic');
INSERT INTO `nuke_nsnst_countries` VALUES('dz', 'Algeria');
INSERT INTO `nuke_nsnst_countries` VALUES('ec', 'Ecuador');
INSERT INTO `nuke_nsnst_countries` VALUES('ee', 'Estonia');
INSERT INTO `nuke_nsnst_countries` VALUES('eg', 'Egypt');
INSERT INTO `nuke_nsnst_countries` VALUES('eh', 'Western Sahara');
INSERT INTO `nuke_nsnst_countries` VALUES('er', 'Eritrea');
INSERT INTO `nuke_nsnst_countries` VALUES('es', 'Spain');
INSERT INTO `nuke_nsnst_countries` VALUES('et', 'Ethiopia');
INSERT INTO `nuke_nsnst_countries` VALUES('eu', 'European Union');
INSERT INTO `nuke_nsnst_countries` VALUES('fi', 'Finland');
INSERT INTO `nuke_nsnst_countries` VALUES('fj', 'Fiji');
INSERT INTO `nuke_nsnst_countries` VALUES('fk', 'Falkland Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('fm', 'Micronesia, Federated States Of');
INSERT INTO `nuke_nsnst_countries` VALUES('fo', 'Faroe Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('fr', 'France');
INSERT INTO `nuke_nsnst_countries` VALUES('fx', 'France, Metropolitan');
INSERT INTO `nuke_nsnst_countries` VALUES('ga', 'Gabon');
INSERT INTO `nuke_nsnst_countries` VALUES('gb', 'United Kingdom');
INSERT INTO `nuke_nsnst_countries` VALUES('gd', 'Grenada');
INSERT INTO `nuke_nsnst_countries` VALUES('ge', 'Georgia');
INSERT INTO `nuke_nsnst_countries` VALUES('gf', 'French Guiana');
INSERT INTO `nuke_nsnst_countries` VALUES('gg', 'Guernsey');
INSERT INTO `nuke_nsnst_countries` VALUES('gh', 'Ghana');
INSERT INTO `nuke_nsnst_countries` VALUES('gi', 'Gibraltar');
INSERT INTO `nuke_nsnst_countries` VALUES('gl', 'Greenland');
INSERT INTO `nuke_nsnst_countries` VALUES('gm', 'Gambia, The');
INSERT INTO `nuke_nsnst_countries` VALUES('gn', 'Guinea');
INSERT INTO `nuke_nsnst_countries` VALUES('gp', 'Guadeloupe');
INSERT INTO `nuke_nsnst_countries` VALUES('gq', 'Equatorial Guinea');
INSERT INTO `nuke_nsnst_countries` VALUES('gr', 'Greece');
INSERT INTO `nuke_nsnst_countries` VALUES('gs', 'South Georgia and The Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('gt', 'Guatemala');
INSERT INTO `nuke_nsnst_countries` VALUES('gu', 'Guam');
INSERT INTO `nuke_nsnst_countries` VALUES('gw', 'Guinea-Bissau');
INSERT INTO `nuke_nsnst_countries` VALUES('gy', 'Guyana');
INSERT INTO `nuke_nsnst_countries` VALUES('hk', 'Hong Kong');
INSERT INTO `nuke_nsnst_countries` VALUES('hm', 'Heard and Mc Donald Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('hn', 'Honduras');
INSERT INTO `nuke_nsnst_countries` VALUES('hr', 'Croatia');
INSERT INTO `nuke_nsnst_countries` VALUES('ht', 'Haiti');
INSERT INTO `nuke_nsnst_countries` VALUES('hu', 'Hungary');
INSERT INTO `nuke_nsnst_countries` VALUES('id', 'Indonesia');
INSERT INTO `nuke_nsnst_countries` VALUES('ie', 'Ireland');
INSERT INTO `nuke_nsnst_countries` VALUES('il', 'Israel');
INSERT INTO `nuke_nsnst_countries` VALUES('im', 'Isle Of Man');
INSERT INTO `nuke_nsnst_countries` VALUES('in', 'India');
INSERT INTO `nuke_nsnst_countries` VALUES('io', 'British Indian Ocean Territory');
INSERT INTO `nuke_nsnst_countries` VALUES('iq', 'Iraq');
INSERT INTO `nuke_nsnst_countries` VALUES('ir', 'Iran');
INSERT INTO `nuke_nsnst_countries` VALUES('is', 'Iceland');
INSERT INTO `nuke_nsnst_countries` VALUES('it', 'Italy');
INSERT INTO `nuke_nsnst_countries` VALUES('je', 'Jersey');
INSERT INTO `nuke_nsnst_countries` VALUES('jm', 'Jamaica');
INSERT INTO `nuke_nsnst_countries` VALUES('jo', 'Jordan');
INSERT INTO `nuke_nsnst_countries` VALUES('jp', 'Japan');
INSERT INTO `nuke_nsnst_countries` VALUES('ke', 'Kenya');
INSERT INTO `nuke_nsnst_countries` VALUES('kg', 'Kyrgyzstan');
INSERT INTO `nuke_nsnst_countries` VALUES('kh', 'Cambodia');
INSERT INTO `nuke_nsnst_countries` VALUES('ki', 'Kiribati');
INSERT INTO `nuke_nsnst_countries` VALUES('km', 'Comoros');
INSERT INTO `nuke_nsnst_countries` VALUES('kn', 'SaINT Kitts And Nevis');
INSERT INTO `nuke_nsnst_countries` VALUES('kp', 'Korea, North');
INSERT INTO `nuke_nsnst_countries` VALUES('kr', 'Korea, South');
INSERT INTO `nuke_nsnst_countries` VALUES('kw', 'Kuwait');
INSERT INTO `nuke_nsnst_countries` VALUES('ky', 'Cayman Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('kz', 'Kazakhstan');
INSERT INTO `nuke_nsnst_countries` VALUES('la', 'Laos');
INSERT INTO `nuke_nsnst_countries` VALUES('lb', 'Lebanon');
INSERT INTO `nuke_nsnst_countries` VALUES('lc', 'SaINT Lucia');
INSERT INTO `nuke_nsnst_countries` VALUES('li', 'Liechtenstein');
INSERT INTO `nuke_nsnst_countries` VALUES('lk', 'Sri Lanka');
INSERT INTO `nuke_nsnst_countries` VALUES('lr', 'Liberia');
INSERT INTO `nuke_nsnst_countries` VALUES('ls', 'Lesotho');
INSERT INTO `nuke_nsnst_countries` VALUES('lt', 'Lithuania');
INSERT INTO `nuke_nsnst_countries` VALUES('lu', 'Luxembourg');
INSERT INTO `nuke_nsnst_countries` VALUES('lv', 'Latvia');
INSERT INTO `nuke_nsnst_countries` VALUES('ly', 'Libya');
INSERT INTO `nuke_nsnst_countries` VALUES('ma', 'Morocco');
INSERT INTO `nuke_nsnst_countries` VALUES('mc', 'Monaco');
INSERT INTO `nuke_nsnst_countries` VALUES('md', 'Moldova');
INSERT INTO `nuke_nsnst_countries` VALUES('me', 'Montenegro');
INSERT INTO `nuke_nsnst_countries` VALUES('mg', 'Madagascar');
INSERT INTO `nuke_nsnst_countries` VALUES('mh', 'Marshall Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('mk', 'Macedonia');
INSERT INTO `nuke_nsnst_countries` VALUES('ml', 'Mali');
INSERT INTO `nuke_nsnst_countries` VALUES('mm', 'Myanmar');
INSERT INTO `nuke_nsnst_countries` VALUES('mn', 'Mongolia');
INSERT INTO `nuke_nsnst_countries` VALUES('mo', 'Macau');
INSERT INTO `nuke_nsnst_countries` VALUES('mp', 'Northern Mariana Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('mq', 'Martinique');
INSERT INTO `nuke_nsnst_countries` VALUES('mr', 'Mauritania');
INSERT INTO `nuke_nsnst_countries` VALUES('ms', 'Montserrat');
INSERT INTO `nuke_nsnst_countries` VALUES('mt', 'Malta');
INSERT INTO `nuke_nsnst_countries` VALUES('mu', 'Mauritius');
INSERT INTO `nuke_nsnst_countries` VALUES('mv', 'Maldives');
INSERT INTO `nuke_nsnst_countries` VALUES('mw', 'Malawi');
INSERT INTO `nuke_nsnst_countries` VALUES('mx', 'Mexico');
INSERT INTO `nuke_nsnst_countries` VALUES('my', 'Malaysia');
INSERT INTO `nuke_nsnst_countries` VALUES('mz', 'Mozambique');
INSERT INTO `nuke_nsnst_countries` VALUES('na', 'Namibia');
INSERT INTO `nuke_nsnst_countries` VALUES('nc', 'New Caledonia');
INSERT INTO `nuke_nsnst_countries` VALUES('ne', 'Niger');
INSERT INTO `nuke_nsnst_countries` VALUES('nf', 'Norfork Island');
INSERT INTO `nuke_nsnst_countries` VALUES('ng', 'Nigeria');
INSERT INTO `nuke_nsnst_countries` VALUES('ni', 'Nicaragua');
INSERT INTO `nuke_nsnst_countries` VALUES('nl', 'Netherlands');
INSERT INTO `nuke_nsnst_countries` VALUES('no', 'Norway');
INSERT INTO `nuke_nsnst_countries` VALUES('np', 'Nepal');
INSERT INTO `nuke_nsnst_countries` VALUES('nr', 'Nauru');
INSERT INTO `nuke_nsnst_countries` VALUES('nu', 'Niue');
INSERT INTO `nuke_nsnst_countries` VALUES('nz', 'New Zealand');
INSERT INTO `nuke_nsnst_countries` VALUES('om', 'Oman');
INSERT INTO `nuke_nsnst_countries` VALUES('pa', 'Panama');
INSERT INTO `nuke_nsnst_countries` VALUES('pe', 'Peru');
INSERT INTO `nuke_nsnst_countries` VALUES('pf', 'French Polynesia');
INSERT INTO `nuke_nsnst_countries` VALUES('pg', 'Papua New Guinea');
INSERT INTO `nuke_nsnst_countries` VALUES('ph', 'Philippines');
INSERT INTO `nuke_nsnst_countries` VALUES('pk', 'Pakistan');
INSERT INTO `nuke_nsnst_countries` VALUES('pl', 'Poland');
INSERT INTO `nuke_nsnst_countries` VALUES('pm', 'SaINT Pierre and Miquelon');
INSERT INTO `nuke_nsnst_countries` VALUES('pn', 'Pitcairn Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('pr', 'Puerto Rico');
INSERT INTO `nuke_nsnst_countries` VALUES('ps', 'Palestine');
INSERT INTO `nuke_nsnst_countries` VALUES('pt', 'Portugal');
INSERT INTO `nuke_nsnst_countries` VALUES('pw', 'Palau');
INSERT INTO `nuke_nsnst_countries` VALUES('py', 'Paraguay');
INSERT INTO `nuke_nsnst_countries` VALUES('qa', 'Qatar');
INSERT INTO `nuke_nsnst_countries` VALUES('re', 'Reunion');
INSERT INTO `nuke_nsnst_countries` VALUES('rs', 'Serbia');
INSERT INTO `nuke_nsnst_countries` VALUES('ro', 'Romania');
INSERT INTO `nuke_nsnst_countries` VALUES('ru', 'Russia');
INSERT INTO `nuke_nsnst_countries` VALUES('rw', 'Rwanda');
INSERT INTO `nuke_nsnst_countries` VALUES('sa', 'Saudi Arabia');
INSERT INTO `nuke_nsnst_countries` VALUES('sb', 'Solomon Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('sc', 'Seychelles');
INSERT INTO `nuke_nsnst_countries` VALUES('sd', 'Sudan');
INSERT INTO `nuke_nsnst_countries` VALUES('se', 'Sweden');
INSERT INTO `nuke_nsnst_countries` VALUES('sg', 'Singapore');
INSERT INTO `nuke_nsnst_countries` VALUES('sh', 'SaINT Helena');
INSERT INTO `nuke_nsnst_countries` VALUES('si', 'Slovenia');
INSERT INTO `nuke_nsnst_countries` VALUES('sj', 'Svalbard');
INSERT INTO `nuke_nsnst_countries` VALUES('sk', 'Slovakia');
INSERT INTO `nuke_nsnst_countries` VALUES('sl', 'Sierra Leone');
INSERT INTO `nuke_nsnst_countries` VALUES('sm', 'San Marino');
INSERT INTO `nuke_nsnst_countries` VALUES('sn', 'Senegal');
INSERT INTO `nuke_nsnst_countries` VALUES('so', 'Somalia');
INSERT INTO `nuke_nsnst_countries` VALUES('sr', 'Suriname');
INSERT INTO `nuke_nsnst_countries` VALUES('st', 'Sao Tome And Principe');
INSERT INTO `nuke_nsnst_countries` VALUES('su', 'Soviet Union');
INSERT INTO `nuke_nsnst_countries` VALUES('sv', 'El Salvador');
INSERT INTO `nuke_nsnst_countries` VALUES('sy', 'Syria');
INSERT INTO `nuke_nsnst_countries` VALUES('sz', 'Swaziland');
INSERT INTO `nuke_nsnst_countries` VALUES('tc', 'Turks And Caicos Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('td', 'Chad');
INSERT INTO `nuke_nsnst_countries` VALUES('tf', 'French Southern Territories');
INSERT INTO `nuke_nsnst_countries` VALUES('tg', 'Togo');
INSERT INTO `nuke_nsnst_countries` VALUES('th', 'Thailand');
INSERT INTO `nuke_nsnst_countries` VALUES('tj', 'Tajikistan');
INSERT INTO `nuke_nsnst_countries` VALUES('tk', 'Tokelau');
INSERT INTO `nuke_nsnst_countries` VALUES('tl', 'Timor-leste');
INSERT INTO `nuke_nsnst_countries` VALUES('tm', 'Turkmenistan');
INSERT INTO `nuke_nsnst_countries` VALUES('tn', 'Tunisia');
INSERT INTO `nuke_nsnst_countries` VALUES('to', 'Tonga');
INSERT INTO `nuke_nsnst_countries` VALUES('tp', 'East Timor');
INSERT INTO `nuke_nsnst_countries` VALUES('tr', 'Turkey');
INSERT INTO `nuke_nsnst_countries` VALUES('tt', 'Trinidad And Tobago');
INSERT INTO `nuke_nsnst_countries` VALUES('tv', 'Tuvalu');
INSERT INTO `nuke_nsnst_countries` VALUES('tw', 'Taiwan');
INSERT INTO `nuke_nsnst_countries` VALUES('tz', 'Tanzania');
INSERT INTO `nuke_nsnst_countries` VALUES('ua', 'Ukraine');
INSERT INTO `nuke_nsnst_countries` VALUES('ug', 'Uganda');
INSERT INTO `nuke_nsnst_countries` VALUES('um', 'United States Minor Outlying Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('un', 'United Nations');
INSERT INTO `nuke_nsnst_countries` VALUES('us', 'United States');
INSERT INTO `nuke_nsnst_countries` VALUES('uy', 'Uruguay');
INSERT INTO `nuke_nsnst_countries` VALUES('uz', 'Uzbekistan');
INSERT INTO `nuke_nsnst_countries` VALUES('va', 'Vatican City State');
INSERT INTO `nuke_nsnst_countries` VALUES('vc', 'SaINT Vincent And The Grenadines');
INSERT INTO `nuke_nsnst_countries` VALUES('ve', 'Venezuela');
INSERT INTO `nuke_nsnst_countries` VALUES('vg', 'Virgin Islands, British');
INSERT INTO `nuke_nsnst_countries` VALUES('vi', 'Virgin Islands, American');
INSERT INTO `nuke_nsnst_countries` VALUES('vn', 'Viet Nam');
INSERT INTO `nuke_nsnst_countries` VALUES('vu', 'Vanuatu');
INSERT INTO `nuke_nsnst_countries` VALUES('wf', 'Wallis and Futuna Islands');
INSERT INTO `nuke_nsnst_countries` VALUES('ws', 'Samoa');
INSERT INTO `nuke_nsnst_countries` VALUES('xe', 'England');
INSERT INTO `nuke_nsnst_countries` VALUES('xs', 'Scotland');
INSERT INTO `nuke_nsnst_countries` VALUES('xw', 'Wales');
INSERT INTO `nuke_nsnst_countries` VALUES('ye', 'Yemen');
INSERT INTO `nuke_nsnst_countries` VALUES('yt', 'Mayotte');
INSERT INTO `nuke_nsnst_countries` VALUES('yu', 'Yugoslavia');
INSERT INTO `nuke_nsnst_countries` VALUES('za', 'South Africa');
INSERT INTO `nuke_nsnst_countries` VALUES('zm', 'Zambia');
INSERT INTO `nuke_nsnst_countries` VALUES('zw', 'Zimbabwe');
INSERT INTO `nuke_nsnst_countries` VALUES('02', 'UnAllocated');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_excluded_ranges`
--

CREATE TABLE `nuke_nsnst_excluded_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_excluded_ranges`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_harvesters`
--

CREATE TABLE `nuke_nsnst_harvesters` (
  `hid` int(2) NOT NULL auto_increment,
  `harvester` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`harvester`),
  KEY `hid` (`hid`)
) ENGINE=MyISAM AUTO_INCREMENT=220 ;

--
-- Dumping data for table `nuke_nsnst_harvesters`
--

INSERT INTO `nuke_nsnst_harvesters` VALUES(1, '@yahoo.com');
INSERT INTO `nuke_nsnst_harvesters` VALUES(2, 'alexibot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(3, 'alligator');
INSERT INTO `nuke_nsnst_harvesters` VALUES(4, 'anonymiz');
INSERT INTO `nuke_nsnst_harvesters` VALUES(5, 'asterias');
INSERT INTO `nuke_nsnst_harvesters` VALUES(6, 'backdoorbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(7, 'black hole');
INSERT INTO `nuke_nsnst_harvesters` VALUES(8, 'blackwidow');
INSERT INTO `nuke_nsnst_harvesters` VALUES(9, 'blowfish');
INSERT INTO `nuke_nsnst_harvesters` VALUES(10, 'botalot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(11, 'builtbottough');
INSERT INTO `nuke_nsnst_harvesters` VALUES(12, 'bullseye');
INSERT INTO `nuke_nsnst_harvesters` VALUES(13, 'bunnyslippers');
INSERT INTO `nuke_nsnst_harvesters` VALUES(14, 'catch');
INSERT INTO `nuke_nsnst_harvesters` VALUES(15, 'cegbfeieh');
INSERT INTO `nuke_nsnst_harvesters` VALUES(16, 'charon');
INSERT INTO `nuke_nsnst_harvesters` VALUES(17, 'cheesebot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(18, 'cherrypicker');
INSERT INTO `nuke_nsnst_harvesters` VALUES(19, 'chinaclaw');
INSERT INTO `nuke_nsnst_harvesters` VALUES(20, 'combine');
INSERT INTO `nuke_nsnst_harvesters` VALUES(21, 'copyrightcheck');
INSERT INTO `nuke_nsnst_harvesters` VALUES(22, 'cosmos');
INSERT INTO `nuke_nsnst_harvesters` VALUES(23, 'crescent');
INSERT INTO `nuke_nsnst_harvesters` VALUES(24, 'curl');
INSERT INTO `nuke_nsnst_harvesters` VALUES(25, 'dbrowse');
INSERT INTO `nuke_nsnst_harvesters` VALUES(26, 'disco');
INSERT INTO `nuke_nsnst_harvesters` VALUES(27, 'dittospyder');
INSERT INTO `nuke_nsnst_harvesters` VALUES(28, 'dlman');
INSERT INTO `nuke_nsnst_harvesters` VALUES(29, 'dnloadmage');
INSERT INTO `nuke_nsnst_harvesters` VALUES(30, 'download');
INSERT INTO `nuke_nsnst_harvesters` VALUES(31, 'dreampassport');
INSERT INTO `nuke_nsnst_harvesters` VALUES(32, 'dts agent');
INSERT INTO `nuke_nsnst_harvesters` VALUES(33, 'ecatch');
INSERT INTO `nuke_nsnst_harvesters` VALUES(34, 'eirgrabber');
INSERT INTO `nuke_nsnst_harvesters` VALUES(35, 'erocrawler');
INSERT INTO `nuke_nsnst_harvesters` VALUES(36, 'express webpictures');
INSERT INTO `nuke_nsnst_harvesters` VALUES(37, 'extractorpro');
INSERT INTO `nuke_nsnst_harvesters` VALUES(38, 'eyenetie');
INSERT INTO `nuke_nsnst_harvesters` VALUES(39, 'fantombrowser');
INSERT INTO `nuke_nsnst_harvesters` VALUES(40, 'fantomcrew browser');
INSERT INTO `nuke_nsnst_harvesters` VALUES(41, 'fileheap');
INSERT INTO `nuke_nsnst_harvesters` VALUES(42, 'filehound');
INSERT INTO `nuke_nsnst_harvesters` VALUES(43, 'flashget');
INSERT INTO `nuke_nsnst_harvesters` VALUES(44, 'foobot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(45, 'franklin locator');
INSERT INTO `nuke_nsnst_harvesters` VALUES(46, 'freshdownload');
INSERT INTO `nuke_nsnst_harvesters` VALUES(47, 'fscrawler');
INSERT INTO `nuke_nsnst_harvesters` VALUES(48, 'gamespy_arcade');
INSERT INTO `nuke_nsnst_harvesters` VALUES(49, 'getbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(50, 'getright');
INSERT INTO `nuke_nsnst_harvesters` VALUES(51, 'getweb');
INSERT INTO `nuke_nsnst_harvesters` VALUES(52, 'go!zilla');
INSERT INTO `nuke_nsnst_harvesters` VALUES(53, 'go-ahead-got-it');
INSERT INTO `nuke_nsnst_harvesters` VALUES(54, 'grab');
INSERT INTO `nuke_nsnst_harvesters` VALUES(55, 'grafula');
INSERT INTO `nuke_nsnst_harvesters` VALUES(56, 'gsa-crawler');
INSERT INTO `nuke_nsnst_harvesters` VALUES(57, 'harvest');
INSERT INTO `nuke_nsnst_harvesters` VALUES(58, 'hloader');
INSERT INTO `nuke_nsnst_harvesters` VALUES(59, 'hmview');
INSERT INTO `nuke_nsnst_harvesters` VALUES(60, 'httplib');
INSERT INTO `nuke_nsnst_harvesters` VALUES(61, 'httpresume');
INSERT INTO `nuke_nsnst_harvesters` VALUES(62, 'httrack');
INSERT INTO `nuke_nsnst_harvesters` VALUES(63, 'humanlinks');
INSERT INTO `nuke_nsnst_harvesters` VALUES(64, 'igetter');
INSERT INTO `nuke_nsnst_harvesters` VALUES(65, 'image stripper');
INSERT INTO `nuke_nsnst_harvesters` VALUES(66, 'image sucker');
INSERT INTO `nuke_nsnst_harvesters` VALUES(67, 'industry program');
INSERT INTO `nuke_nsnst_harvesters` VALUES(68, 'indy library');
INSERT INTO `nuke_nsnst_harvesters` VALUES(69, 'infonavirobot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(70, 'installshield digitalwizard');
INSERT INTO `nuke_nsnst_harvesters` VALUES(71, 'interget');
INSERT INTO `nuke_nsnst_harvesters` VALUES(72, 'iria');
INSERT INTO `nuke_nsnst_harvesters` VALUES(73, 'irvine');
INSERT INTO `nuke_nsnst_harvesters` VALUES(74, 'iupui research bot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(75, 'jbh agent');
INSERT INTO `nuke_nsnst_harvesters` VALUES(76, 'jennybot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(77, 'jetcar');
INSERT INTO `nuke_nsnst_harvesters` VALUES(78, 'jobo');
INSERT INTO `nuke_nsnst_harvesters` VALUES(79, 'joc');
INSERT INTO `nuke_nsnst_harvesters` VALUES(80, 'kapere');
INSERT INTO `nuke_nsnst_harvesters` VALUES(81, 'kenjin spider');
INSERT INTO `nuke_nsnst_harvesters` VALUES(82, 'keyword density');
INSERT INTO `nuke_nsnst_harvesters` VALUES(83, 'larbin');
INSERT INTO `nuke_nsnst_harvesters` VALUES(84, 'leechftp');
INSERT INTO `nuke_nsnst_harvesters` VALUES(85, 'leechget');
INSERT INTO `nuke_nsnst_harvesters` VALUES(86, 'lexibot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(87, 'libweb/clshttp');
INSERT INTO `nuke_nsnst_harvesters` VALUES(88, 'libwww-perl');
INSERT INTO `nuke_nsnst_harvesters` VALUES(89, 'lightningdownload');
INSERT INTO `nuke_nsnst_harvesters` VALUES(90, 'lincoln state web browser');
INSERT INTO `nuke_nsnst_harvesters` VALUES(91, 'linkextractorpro');
INSERT INTO `nuke_nsnst_harvesters` VALUES(92, 'linkscan/8.1a.unix');
INSERT INTO `nuke_nsnst_harvesters` VALUES(93, 'linkwalker');
INSERT INTO `nuke_nsnst_harvesters` VALUES(94, 'lwp-trivial');
INSERT INTO `nuke_nsnst_harvesters` VALUES(95, 'lwp::simple');
INSERT INTO `nuke_nsnst_harvesters` VALUES(96, 'mac finder');
INSERT INTO `nuke_nsnst_harvesters` VALUES(97, 'mata hari');
INSERT INTO `nuke_nsnst_harvesters` VALUES(98, 'mediasearch');
INSERT INTO `nuke_nsnst_harvesters` VALUES(99, 'metaproducts');
INSERT INTO `nuke_nsnst_harvesters` VALUES(100, 'microsoft url control');
INSERT INTO `nuke_nsnst_harvesters` VALUES(101, 'midown tool');
INSERT INTO `nuke_nsnst_harvesters` VALUES(102, 'miixpc');
INSERT INTO `nuke_nsnst_harvesters` VALUES(103, 'missauga locate');
INSERT INTO `nuke_nsnst_harvesters` VALUES(104, 'missouri college browse');
INSERT INTO `nuke_nsnst_harvesters` VALUES(105, 'mister pix');
INSERT INTO `nuke_nsnst_harvesters` VALUES(106, 'moget');
INSERT INTO `nuke_nsnst_harvesters` VALUES(107, 'mozilla.*newt');
INSERT INTO `nuke_nsnst_harvesters` VALUES(108, 'mozilla/3.0 (compatible)');
INSERT INTO `nuke_nsnst_harvesters` VALUES(109, 'mozilla/3.mozilla/2.01');
INSERT INTO `nuke_nsnst_harvesters` VALUES(110, 'msie 4.0 (win95)');
INSERT INTO `nuke_nsnst_harvesters` VALUES(111, 'multiblocker browser');
INSERT INTO `nuke_nsnst_harvesters` VALUES(112, 'mydaemon');
INSERT INTO `nuke_nsnst_harvesters` VALUES(113, 'mygetright');
INSERT INTO `nuke_nsnst_harvesters` VALUES(114, 'nabot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(115, 'navroad');
INSERT INTO `nuke_nsnst_harvesters` VALUES(116, 'nearsite');
INSERT INTO `nuke_nsnst_harvesters` VALUES(117, 'net vampire');
INSERT INTO `nuke_nsnst_harvesters` VALUES(118, 'netants');
INSERT INTO `nuke_nsnst_harvesters` VALUES(119, 'netmechanic');
INSERT INTO `nuke_nsnst_harvesters` VALUES(120, 'netpumper');
INSERT INTO `nuke_nsnst_harvesters` VALUES(121, 'netspider');
INSERT INTO `nuke_nsnst_harvesters` VALUES(122, 'newsearchengine');
INSERT INTO `nuke_nsnst_harvesters` VALUES(123, 'nicerspro');
INSERT INTO `nuke_nsnst_harvesters` VALUES(124, 'ninja');
INSERT INTO `nuke_nsnst_harvesters` VALUES(125, 'nitro downloader');
INSERT INTO `nuke_nsnst_harvesters` VALUES(126, 'npbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(127, 'octopus');
INSERT INTO `nuke_nsnst_harvesters` VALUES(128, 'offline explorer');
INSERT INTO `nuke_nsnst_harvesters` VALUES(129, 'offline navigator');
INSERT INTO `nuke_nsnst_harvesters` VALUES(130, 'openfind');
INSERT INTO `nuke_nsnst_harvesters` VALUES(131, 'pagegrabber');
INSERT INTO `nuke_nsnst_harvesters` VALUES(132, 'papa foto');
INSERT INTO `nuke_nsnst_harvesters` VALUES(133, 'pavuk');
INSERT INTO `nuke_nsnst_harvesters` VALUES(134, 'pbrowse');
INSERT INTO `nuke_nsnst_harvesters` VALUES(135, 'pcbrowser');
INSERT INTO `nuke_nsnst_harvesters` VALUES(136, 'peval');
INSERT INTO `nuke_nsnst_harvesters` VALUES(137, 'pompos/');
INSERT INTO `nuke_nsnst_harvesters` VALUES(138, 'program shareware');
INSERT INTO `nuke_nsnst_harvesters` VALUES(139, 'propowerbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(140, 'prowebwalker');
INSERT INTO `nuke_nsnst_harvesters` VALUES(141, 'psurf');
INSERT INTO `nuke_nsnst_harvesters` VALUES(142, 'puf');
INSERT INTO `nuke_nsnst_harvesters` VALUES(143, 'puxarapido');
INSERT INTO `nuke_nsnst_harvesters` VALUES(144, 'queryn metasearch');
INSERT INTO `nuke_nsnst_harvesters` VALUES(145, 'realdownload');
INSERT INTO `nuke_nsnst_harvesters` VALUES(146, 'reget');
INSERT INTO `nuke_nsnst_harvesters` VALUES(147, 'repomonkey');
INSERT INTO `nuke_nsnst_harvesters` VALUES(148, 'rsurf');
INSERT INTO `nuke_nsnst_harvesters` VALUES(149, 'rumours-agent');
INSERT INTO `nuke_nsnst_harvesters` VALUES(150, 'sakura');
INSERT INTO `nuke_nsnst_harvesters` VALUES(151, 'scan4mail');
INSERT INTO `nuke_nsnst_harvesters` VALUES(152, 'semanticdiscovery');
INSERT INTO `nuke_nsnst_harvesters` VALUES(153, 'sitesnagger');
INSERT INTO `nuke_nsnst_harvesters` VALUES(154, 'slysearch');
INSERT INTO `nuke_nsnst_harvesters` VALUES(155, 'spankbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(156, 'spanner ');
INSERT INTO `nuke_nsnst_harvesters` VALUES(157, 'spiderzilla');
INSERT INTO `nuke_nsnst_harvesters` VALUES(158, 'sq webscanner');
INSERT INTO `nuke_nsnst_harvesters` VALUES(159, 'stamina');
INSERT INTO `nuke_nsnst_harvesters` VALUES(160, 'star downloader');
INSERT INTO `nuke_nsnst_harvesters` VALUES(161, 'steeler');
INSERT INTO `nuke_nsnst_harvesters` VALUES(162, 'strip');
INSERT INTO `nuke_nsnst_harvesters` VALUES(163, 'superbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(164, 'superhttp');
INSERT INTO `nuke_nsnst_harvesters` VALUES(165, 'surfbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(166, 'suzuran');
INSERT INTO `nuke_nsnst_harvesters` VALUES(167, 'swbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(168, 'szukacz');
INSERT INTO `nuke_nsnst_harvesters` VALUES(169, 'takeout');
INSERT INTO `nuke_nsnst_harvesters` VALUES(170, 'teleport');
INSERT INTO `nuke_nsnst_harvesters` VALUES(171, 'telesoft');
INSERT INTO `nuke_nsnst_harvesters` VALUES(172, 'test spider');
INSERT INTO `nuke_nsnst_harvesters` VALUES(173, 'the intraformant');
INSERT INTO `nuke_nsnst_harvesters` VALUES(174, 'thenomad');
INSERT INTO `nuke_nsnst_harvesters` VALUES(175, 'tighttwatbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(176, 'titan');
INSERT INTO `nuke_nsnst_harvesters` VALUES(177, 'tocrawl/urldispatcher');
INSERT INTO `nuke_nsnst_harvesters` VALUES(178, 'true_robot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(179, 'tsurf');
INSERT INTO `nuke_nsnst_harvesters` VALUES(180, 'turing machine');
INSERT INTO `nuke_nsnst_harvesters` VALUES(181, 'turingos');
INSERT INTO `nuke_nsnst_harvesters` VALUES(182, 'urlblaze');
INSERT INTO `nuke_nsnst_harvesters` VALUES(183, 'urlgetfile');
INSERT INTO `nuke_nsnst_harvesters` VALUES(184, 'urly warning');
INSERT INTO `nuke_nsnst_harvesters` VALUES(185, 'utilmind');
INSERT INTO `nuke_nsnst_harvesters` VALUES(186, 'vci');
INSERT INTO `nuke_nsnst_harvesters` VALUES(187, 'voideye');
INSERT INTO `nuke_nsnst_harvesters` VALUES(188, 'web image collector');
INSERT INTO `nuke_nsnst_harvesters` VALUES(189, 'web sucker');
INSERT INTO `nuke_nsnst_harvesters` VALUES(190, 'webauto');
INSERT INTO `nuke_nsnst_harvesters` VALUES(191, 'webbandit');
INSERT INTO `nuke_nsnst_harvesters` VALUES(192, 'webcapture');
INSERT INTO `nuke_nsnst_harvesters` VALUES(193, 'webcollage');
INSERT INTO `nuke_nsnst_harvesters` VALUES(194, 'webcopier');
INSERT INTO `nuke_nsnst_harvesters` VALUES(195, 'webenhancer');
INSERT INTO `nuke_nsnst_harvesters` VALUES(196, 'webfetch');
INSERT INTO `nuke_nsnst_harvesters` VALUES(197, 'webgo');
INSERT INTO `nuke_nsnst_harvesters` VALUES(198, 'webleacher');
INSERT INTO `nuke_nsnst_harvesters` VALUES(199, 'webmasterworldforumbot');
INSERT INTO `nuke_nsnst_harvesters` VALUES(200, 'webql');
INSERT INTO `nuke_nsnst_harvesters` VALUES(201, 'webreaper');
INSERT INTO `nuke_nsnst_harvesters` VALUES(202, 'website extractor');
INSERT INTO `nuke_nsnst_harvesters` VALUES(203, 'website quester');
INSERT INTO `nuke_nsnst_harvesters` VALUES(204, 'webster');
INSERT INTO `nuke_nsnst_harvesters` VALUES(205, 'webstripper');
INSERT INTO `nuke_nsnst_harvesters` VALUES(206, 'webwhacker');
INSERT INTO `nuke_nsnst_harvesters` VALUES(207, 'wep search');
INSERT INTO `nuke_nsnst_harvesters` VALUES(208, 'wget');
INSERT INTO `nuke_nsnst_harvesters` VALUES(209, 'whizbang');
INSERT INTO `nuke_nsnst_harvesters` VALUES(210, 'widow');
INSERT INTO `nuke_nsnst_harvesters` VALUES(211, 'wildsoft surfer');
INSERT INTO `nuke_nsnst_harvesters` VALUES(212, 'www-collector-e');
INSERT INTO `nuke_nsnst_harvesters` VALUES(213, 'www.netwu.com');
INSERT INTO `nuke_nsnst_harvesters` VALUES(214, 'wwwoffle');
INSERT INTO `nuke_nsnst_harvesters` VALUES(215, 'xaldon');
INSERT INTO `nuke_nsnst_harvesters` VALUES(216, 'xenu');
INSERT INTO `nuke_nsnst_harvesters` VALUES(217, 'zeus');
INSERT INTO `nuke_nsnst_harvesters` VALUES(218, 'ziggy');
INSERT INTO `nuke_nsnst_harvesters` VALUES(219, 'zippy');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_ip2country`
--

CREATE TABLE `nuke_nsnst_ip2country` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_ip2country`
--

INSERT INTO `nuke_nsnst_ip2country` VALUES(0, 16777215, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(16777216, 33554431, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(33554432, 50331647, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(83886080, 100663295, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(117440512, 134217727, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(167772160, 184549375, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(234881024, 251658239, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(385875968, 402653183, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(452984832, 469762047, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(520093696, 536870911, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(603979776, 620756991, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(620756992, 637534207, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(687865856, 704643071, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(704643072, 721420287, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1241513984, 1258291199, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1258291200, 1275068415, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1291845632, 1308622847, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1308622848, 1325400063, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1325400064, 1342177279, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1526726656, 1543503871, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1543503872, 1560281087, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1560281088, 1577058303, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1577058304, 1593835519, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1593835520, 1610612735, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1610612736, 1627389951, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1627389952, 1644167167, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1644167168, 1660944383, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1660944384, 1677721599, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1677721600, 1694498815, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1694498816, 1711276031, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1711276032, 1728053247, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1728053248, 1744830463, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1744830464, 1761607679, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1761607680, 1778384895, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1778384896, 1795162111, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1795162112, 1811939327, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1811939328, 1828716543, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1828716544, 1845493759, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1845493760, 1862270975, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1862270976, 1879048191, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1879048192, 1895825407, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1895825408, 1912602623, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1912602624, 1929379839, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1929379840, 1946157055, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1946157056, 1962934271, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1962934272, 1979711487, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1979711488, 1996488703, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(1996488704, 2013265919, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2013265920, 2030043135, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2080374784, 2097151999, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2097152000, 2113929215, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2113929216, 2130706431, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2130706432, 2147483647, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2851995648, 2852061183, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2886729728, 2887778303, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2902458368, 2919235583, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2919235584, 2936012799, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2936012800, 2952790015, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2952790016, 2969567231, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2969567232, 2986344447, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(2986344448, 3003121663, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3003121664, 3019898879, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3019898880, 3036676095, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3036676096, 3053453311, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3053453312, 3070230527, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3070230528, 3087007743, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3087007744, 3103784959, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3103784960, 3120562175, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3120562176, 3137339391, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3137339392, 3154116607, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3187671040, 3204448255, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3221225472, 3221258239, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3305111552, 3321888767, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3741319168, 3758096383, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3758096384, 3774873599, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3774873600, 3791650815, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3791650816, 3808428031, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3808428032, 3825205247, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3825205248, 3841982463, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3841982464, 3858759679, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3858759680, 3875536895, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3875536896, 3892314111, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3892314112, 3909091327, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3909091328, 3925868543, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3925868544, 3942645759, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3942645760, 3959422975, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3959422976, 3976200191, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3976200192, 3992977407, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(3992977408, 4009754623, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4009754624, 4026531839, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4026531840, 4043309055, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4043309056, 4060086271, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4060086272, 4076863487, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4076863488, 4093640703, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4093640704, 4110417919, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4110417920, 4127195135, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4127195136, 4143972351, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4143972352, 4160749567, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4160749568, 4177526783, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4177526784, 4194303999, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4194304000, 4211081215, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4211081216, 4227858431, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4227858432, 4244635647, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4244635648, 4261412863, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4261412864, 4278190079, 1098424776, '01');
INSERT INTO `nuke_nsnst_ip2country` VALUES(4278190080, 4294967295, 1098424776, '01');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_protected_ranges`
--

CREATE TABLE `nuke_nsnst_protected_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_protected_ranges`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_referers`
--

CREATE TABLE `nuke_nsnst_referers` (
  `rid` int(2) NOT NULL auto_increment,
  `referer` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`referer`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=366 ;

--
-- Dumping data for table `nuke_nsnst_referers`
--

INSERT INTO `nuke_nsnst_referers` VALUES(1, '121hr.com');
INSERT INTO `nuke_nsnst_referers` VALUES(2, '1st-call.net');
INSERT INTO `nuke_nsnst_referers` VALUES(3, '1stcool.com');
INSERT INTO `nuke_nsnst_referers` VALUES(4, '5000n.com');
INSERT INTO `nuke_nsnst_referers` VALUES(5, '69-xxx.com');
INSERT INTO `nuke_nsnst_referers` VALUES(6, '9irl.com');
INSERT INTO `nuke_nsnst_referers` VALUES(7, '9uy.com');
INSERT INTO `nuke_nsnst_referers` VALUES(8, 'a-day-at-the-party.com');
INSERT INTO `nuke_nsnst_referers` VALUES(9, 'accessthepeace.com');
INSERT INTO `nuke_nsnst_referers` VALUES(10, 'adult-model-nude-pictures.com');
INSERT INTO `nuke_nsnst_referers` VALUES(11, 'adult-sex-toys-free-porn.com');
INSERT INTO `nuke_nsnst_referers` VALUES(12, 'agnitum.com');
INSERT INTO `nuke_nsnst_referers` VALUES(13, 'alfonssackpfeiffe.com');
INSERT INTO `nuke_nsnst_referers` VALUES(14, 'alongwayfrommars.com');
INSERT INTO `nuke_nsnst_referers` VALUES(15, 'anime-sex-1.com');
INSERT INTO `nuke_nsnst_referers` VALUES(16, 'anorex-sf-stimulant-free.com');
INSERT INTO `nuke_nsnst_referers` VALUES(17, 'antibot.net');
INSERT INTO `nuke_nsnst_referers` VALUES(18, 'antique-tokiwa.com');
INSERT INTO `nuke_nsnst_referers` VALUES(19, 'apotheke-heute.com');
INSERT INTO `nuke_nsnst_referers` VALUES(20, 'armada31.com');
INSERT INTO `nuke_nsnst_referers` VALUES(21, 'artark.com');
INSERT INTO `nuke_nsnst_referers` VALUES(22, 'artlilei.com');
INSERT INTO `nuke_nsnst_referers` VALUES(23, 'ascendbtg.com');
INSERT INTO `nuke_nsnst_referers` VALUES(24, 'aschalaecheck.com');
INSERT INTO `nuke_nsnst_referers` VALUES(25, 'asian-sex-free-sex.com');
INSERT INTO `nuke_nsnst_referers` VALUES(26, 'aslowspeeker.com');
INSERT INTO `nuke_nsnst_referers` VALUES(27, 'assasinatedfrogs.com');
INSERT INTO `nuke_nsnst_referers` VALUES(28, 'athirst-for-tranquillity.net');
INSERT INTO `nuke_nsnst_referers` VALUES(29, 'aubonpanier.com');
INSERT INTO `nuke_nsnst_referers` VALUES(30, 'avalonumc.com');
INSERT INTO `nuke_nsnst_referers` VALUES(31, 'ayingba.com');
INSERT INTO `nuke_nsnst_referers` VALUES(32, 'bayofnoreturn.com');
INSERT INTO `nuke_nsnst_referers` VALUES(33, 'bbw4phonesex.com');
INSERT INTO `nuke_nsnst_referers` VALUES(34, 'beersarenotfree.com');
INSERT INTO `nuke_nsnst_referers` VALUES(35, 'bierikiuetsch.com');
INSERT INTO `nuke_nsnst_referers` VALUES(36, 'bilingualannouncements.com');
INSERT INTO `nuke_nsnst_referers` VALUES(37, 'black-pussy-toon-clip-anal-lover-single.com');
INSERT INTO `nuke_nsnst_referers` VALUES(38, 'blownapart.com');
INSERT INTO `nuke_nsnst_referers` VALUES(39, 'blueroutes.com');
INSERT INTO `nuke_nsnst_referers` VALUES(40, 'boasex.com');
INSERT INTO `nuke_nsnst_referers` VALUES(41, 'booksandpages.com');
INSERT INTO `nuke_nsnst_referers` VALUES(42, 'bootyquake.com');
INSERT INTO `nuke_nsnst_referers` VALUES(43, 'bossyhunter.com');
INSERT INTO `nuke_nsnst_referers` VALUES(44, 'boyz-sex.com');
INSERT INTO `nuke_nsnst_referers` VALUES(45, 'brokersaandpokers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(46, 'browserwindowcleaner.com');
INSERT INTO `nuke_nsnst_referers` VALUES(47, 'budobytes.com');
INSERT INTO `nuke_nsnst_referers` VALUES(48, 'business2fun.com');
INSERT INTO `nuke_nsnst_referers` VALUES(49, 'buymyshitz.com');
INSERT INTO `nuke_nsnst_referers` VALUES(50, 'byuntaesex.com');
INSERT INTO `nuke_nsnst_referers` VALUES(51, 'caniputsomeloveintoyou.com');
INSERT INTO `nuke_nsnst_referers` VALUES(52, 'cartoons.net.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(53, 'caverunsailing.com');
INSERT INTO `nuke_nsnst_referers` VALUES(54, 'certainhealth.com');
INSERT INTO `nuke_nsnst_referers` VALUES(55, 'clantea.com');
INSERT INTO `nuke_nsnst_referers` VALUES(56, 'close-protection-services.com');
INSERT INTO `nuke_nsnst_referers` VALUES(57, 'clubcanino.com');
INSERT INTO `nuke_nsnst_referers` VALUES(58, 'clubstic.com');
INSERT INTO `nuke_nsnst_referers` VALUES(59, 'cobrakai-skf.com');
INSERT INTO `nuke_nsnst_referers` VALUES(60, 'collegefucktour.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(61, 'commanderspank.com');
INSERT INTO `nuke_nsnst_referers` VALUES(62, 'coolenabled.com');
INSERT INTO `nuke_nsnst_referers` VALUES(63, 'crusecountryart.com');
INSERT INTO `nuke_nsnst_referers` VALUES(64, 'crusingforsex.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(65, 'cunt-twat-pussy-juice-clit-licking.com');
INSERT INTO `nuke_nsnst_referers` VALUES(66, 'customerhandshaker.com');
INSERT INTO `nuke_nsnst_referers` VALUES(67, 'cyborgrama.com');
INSERT INTO `nuke_nsnst_referers` VALUES(68, 'darkprofits.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(69, 'datingforme.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(70, 'datingmind.com');
INSERT INTO `nuke_nsnst_referers` VALUES(71, 'degree.org.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(72, 'delorentos.com');
INSERT INTO `nuke_nsnst_referers` VALUES(73, 'diggydigger.com');
INSERT INTO `nuke_nsnst_referers` VALUES(74, 'dinkydonkyaussie.com');
INSERT INTO `nuke_nsnst_referers` VALUES(75, 'djpritchard.com');
INSERT INTO `nuke_nsnst_referers` VALUES(76, 'djtop.com');
INSERT INTO `nuke_nsnst_referers` VALUES(77, 'draufgeschissen.com');
INSERT INTO `nuke_nsnst_referers` VALUES(78, 'dreamerteens.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(79, 'ebonyarchives.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(80, 'ebonyplaya.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(81, 'ecobuilder2000.com');
INSERT INTO `nuke_nsnst_referers` VALUES(82, 'emailandemail.com');
INSERT INTO `nuke_nsnst_referers` VALUES(83, 'emedici.net');
INSERT INTO `nuke_nsnst_referers` VALUES(84, 'engine-on-fire.com');
INSERT INTO `nuke_nsnst_referers` VALUES(85, 'erocity.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(86, 'esport3.com');
INSERT INTO `nuke_nsnst_referers` VALUES(87, 'eteenbabes.com');
INSERT INTO `nuke_nsnst_referers` VALUES(88, 'eurofreepages.com');
INSERT INTO `nuke_nsnst_referers` VALUES(89, 'eurotexans.com');
INSERT INTO `nuke_nsnst_referers` VALUES(90, 'evolucionweb.com');
INSERT INTO `nuke_nsnst_referers` VALUES(91, 'fakoli.com');
INSERT INTO `nuke_nsnst_referers` VALUES(92, 'fe4ba.com');
INSERT INTO `nuke_nsnst_referers` VALUES(93, 'ferienschweden.com');
INSERT INTO `nuke_nsnst_referers` VALUES(94, 'findly.com');
INSERT INTO `nuke_nsnst_referers` VALUES(95, 'firsttimeteadrinker.com');
INSERT INTO `nuke_nsnst_referers` VALUES(96, 'fishing.net.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(97, 'flatwonkers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(98, 'flowershopentertainment.com');
INSERT INTO `nuke_nsnst_referers` VALUES(99, 'flymario.com');
INSERT INTO `nuke_nsnst_referers` VALUES(100, 'free-xxx-pictures-porno-gallery.com');
INSERT INTO `nuke_nsnst_referers` VALUES(101, 'freebestporn.com');
INSERT INTO `nuke_nsnst_referers` VALUES(102, 'freefuckingmovies.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(103, 'freexxxstuff.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(104, 'fruitologist.net');
INSERT INTO `nuke_nsnst_referers` VALUES(105, 'fruitsandbolts.com');
INSERT INTO `nuke_nsnst_referers` VALUES(106, 'fudge-cumshots-free-midget-movie-clips.com');
INSERT INTO `nuke_nsnst_referers` VALUES(107, 'fudge-michaelmoore.com');
INSERT INTO `nuke_nsnst_referers` VALUES(108, 'fundacep.com');
INSERT INTO `nuke_nsnst_referers` VALUES(109, 'gadless.com');
INSERT INTO `nuke_nsnst_referers` VALUES(110, 'gallapagosrangers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(111, 'galleries4free.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(112, 'galofu.com');
INSERT INTO `nuke_nsnst_referers` VALUES(113, 'gaypixpost.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(114, 'geomasti.com');
INSERT INTO `nuke_nsnst_referers` VALUES(115, 'girltime.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(116, 'glassrope.com');
INSERT INTO `nuke_nsnst_referers` VALUES(117, 'godjustblessyouall.com');
INSERT INTO `nuke_nsnst_referers` VALUES(118, 'goldenageresort.com');
INSERT INTO `nuke_nsnst_referers` VALUES(119, 'gonnabedaddies.com');
INSERT INTO `nuke_nsnst_referers` VALUES(120, 'granadasexi.com');
INSERT INTO `nuke_nsnst_referers` VALUES(121, 'guardingtheangels.com');
INSERT INTO `nuke_nsnst_referers` VALUES(122, 'guyprofiles.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(123, 'happy1225.com');
INSERT INTO `nuke_nsnst_referers` VALUES(124, 'happychappywacky.com');
INSERT INTO `nuke_nsnst_referers` VALUES(125, 'health.org.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(126, 'hexplas.com');
INSERT INTO `nuke_nsnst_referers` VALUES(127, 'highheelsmodels4fun.com');
INSERT INTO `nuke_nsnst_referers` VALUES(128, 'hillsweb.com');
INSERT INTO `nuke_nsnst_referers` VALUES(129, 'hiptuner.com');
INSERT INTO `nuke_nsnst_referers` VALUES(130, 'historyintospace.com');
INSERT INTO `nuke_nsnst_referers` VALUES(131, 'hoa-tuoi.com');
INSERT INTO `nuke_nsnst_referers` VALUES(132, 'homebuyinginatlanta.com');
INSERT INTO `nuke_nsnst_referers` VALUES(133, 'horizonultra.com');
INSERT INTO `nuke_nsnst_referers` VALUES(134, 'horseminiature.net');
INSERT INTO `nuke_nsnst_referers` VALUES(135, 'hotkiss.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(136, 'hotlivegirls.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(137, 'hotmatchup.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(138, 'husler.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(139, 'iaentertainment.com');
INSERT INTO `nuke_nsnst_referers` VALUES(140, 'iamnotsomeone.com');
INSERT INTO `nuke_nsnst_referers` VALUES(141, 'iconsofcorruption.com');
INSERT INTO `nuke_nsnst_referers` VALUES(142, 'ihavenotrustinyou.com');
INSERT INTO `nuke_nsnst_referers` VALUES(143, 'informat-systems.com');
INSERT INTO `nuke_nsnst_referers` VALUES(144, 'interiorproshop.com');
INSERT INTO `nuke_nsnst_referers` VALUES(145, 'intersoftnetworks.com');
INSERT INTO `nuke_nsnst_referers` VALUES(146, 'inthecrib.com');
INSERT INTO `nuke_nsnst_referers` VALUES(147, 'investment4cashiers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(148, 'iti-trailers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(149, 'jackpot-hacker.com');
INSERT INTO `nuke_nsnst_referers` VALUES(150, 'jacks-world.com');
INSERT INTO `nuke_nsnst_referers` VALUES(151, 'jamesthesailorbasher.com');
INSERT INTO `nuke_nsnst_referers` VALUES(152, 'jesuislemonds.com');
INSERT INTO `nuke_nsnst_referers` VALUES(153, 'justanotherdomainname.com');
INSERT INTO `nuke_nsnst_referers` VALUES(154, 'kampelicka.com');
INSERT INTO `nuke_nsnst_referers` VALUES(155, 'kanalrattenarsch.com');
INSERT INTO `nuke_nsnst_referers` VALUES(156, 'katzasher.com');
INSERT INTO `nuke_nsnst_referers` VALUES(157, 'kerosinjunkie.com');
INSERT INTO `nuke_nsnst_referers` VALUES(158, 'killasvideo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(159, 'koenigspisser.com');
INSERT INTO `nuke_nsnst_referers` VALUES(160, 'kontorpara.com');
INSERT INTO `nuke_nsnst_referers` VALUES(161, 'l8t.com');
INSERT INTO `nuke_nsnst_referers` VALUES(162, 'laestacion101.com');
INSERT INTO `nuke_nsnst_referers` VALUES(163, 'lambuschlamppen.com');
INSERT INTO `nuke_nsnst_referers` VALUES(164, 'lankasex.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(165, 'laser-creations.com');
INSERT INTO `nuke_nsnst_referers` VALUES(166, 'le-tour-du-monde.com');
INSERT INTO `nuke_nsnst_referers` VALUES(167, 'lecraft.com');
INSERT INTO `nuke_nsnst_referers` VALUES(168, 'ledo-design.com');
INSERT INTO `nuke_nsnst_referers` VALUES(169, 'leftregistration.com');
INSERT INTO `nuke_nsnst_referers` VALUES(170, 'lekkikoomastas.com');
INSERT INTO `nuke_nsnst_referers` VALUES(171, 'lepommeau.com');
INSERT INTO `nuke_nsnst_referers` VALUES(172, 'libr-animal.com');
INSERT INTO `nuke_nsnst_referers` VALUES(173, 'libraries.org.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(174, 'likewaterlikewind.com');
INSERT INTO `nuke_nsnst_referers` VALUES(175, 'limbojumpers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(176, 'link.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(177, 'lockportlinks.com');
INSERT INTO `nuke_nsnst_referers` VALUES(178, 'loiproject.com');
INSERT INTO `nuke_nsnst_referers` VALUES(179, 'longtermalternatives.com');
INSERT INTO `nuke_nsnst_referers` VALUES(180, 'lottoeco.com');
INSERT INTO `nuke_nsnst_referers` VALUES(181, 'lucalozzi.com');
INSERT INTO `nuke_nsnst_referers` VALUES(182, 'maki-e-pens.com');
INSERT INTO `nuke_nsnst_referers` VALUES(183, 'malepayperview.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(184, 'mangaxoxo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(185, 'maps.org.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(186, 'marcofields.com');
INSERT INTO `nuke_nsnst_referers` VALUES(187, 'masterofcheese.com');
INSERT INTO `nuke_nsnst_referers` VALUES(188, 'masteroftheblasterhill.com');
INSERT INTO `nuke_nsnst_referers` VALUES(189, 'mastheadwankers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(190, 'megafrontier.com');
INSERT INTO `nuke_nsnst_referers` VALUES(191, 'meinschuppen.com');
INSERT INTO `nuke_nsnst_referers` VALUES(192, 'mercurybar.com');
INSERT INTO `nuke_nsnst_referers` VALUES(193, 'metapannas.com');
INSERT INTO `nuke_nsnst_referers` VALUES(194, 'micelebre.com');
INSERT INTO `nuke_nsnst_referers` VALUES(195, 'midnightlaundries.com');
INSERT INTO `nuke_nsnst_referers` VALUES(196, 'mikeapartment.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(197, 'millenniumchorus.com');
INSERT INTO `nuke_nsnst_referers` VALUES(198, 'mimundial2002.com');
INSERT INTO `nuke_nsnst_referers` VALUES(199, 'miniaturegallerymm.com');
INSERT INTO `nuke_nsnst_referers` VALUES(200, 'mixtaperadio.com');
INSERT INTO `nuke_nsnst_referers` VALUES(201, 'mondialcoral.com');
INSERT INTO `nuke_nsnst_referers` VALUES(202, 'monja-wakamatsu.com');
INSERT INTO `nuke_nsnst_referers` VALUES(203, 'monstermonkey.net');
INSERT INTO `nuke_nsnst_referers` VALUES(204, 'mouthfreshners.com');
INSERT INTO `nuke_nsnst_referers` VALUES(205, 'mullensholiday.com');
INSERT INTO `nuke_nsnst_referers` VALUES(206, 'musilo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(207, 'myhollowlog.com');
INSERT INTO `nuke_nsnst_referers` VALUES(208, 'myhomephonenumber.com');
INSERT INTO `nuke_nsnst_referers` VALUES(209, 'mykeyboardisbroken.com');
INSERT INTO `nuke_nsnst_referers` VALUES(210, 'mysofia.net');
INSERT INTO `nuke_nsnst_referers` VALUES(211, 'naked-cheaters.com');
INSERT INTO `nuke_nsnst_referers` VALUES(212, 'naked-old-women.com');
INSERT INTO `nuke_nsnst_referers` VALUES(213, 'nastygirls.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(214, 'nationclan.net');
INSERT INTO `nuke_nsnst_referers` VALUES(215, 'natterratter.com');
INSERT INTO `nuke_nsnst_referers` VALUES(216, 'naughtyadam.com');
INSERT INTO `nuke_nsnst_referers` VALUES(217, 'nestbeschmutzer.com');
INSERT INTO `nuke_nsnst_referers` VALUES(218, 'netwu.com');
INSERT INTO `nuke_nsnst_referers` VALUES(219, 'newrealeaseonline.com');
INSERT INTO `nuke_nsnst_referers` VALUES(220, 'newrealeasesonline.com');
INSERT INTO `nuke_nsnst_referers` VALUES(221, 'nextfrontiersonline.com');
INSERT INTO `nuke_nsnst_referers` VALUES(222, 'nikostaxi.com');
INSERT INTO `nuke_nsnst_referers` VALUES(223, 'notorious7.com');
INSERT INTO `nuke_nsnst_referers` VALUES(224, 'nrecruiter.com');
INSERT INTO `nuke_nsnst_referers` VALUES(225, 'nursingdepot.com');
INSERT INTO `nuke_nsnst_referers` VALUES(226, 'nustramosse.com');
INSERT INTO `nuke_nsnst_referers` VALUES(227, 'nuturalhicks.com');
INSERT INTO `nuke_nsnst_referers` VALUES(228, 'occaz-auto49.com');
INSERT INTO `nuke_nsnst_referers` VALUES(229, 'ocean-db.net');
INSERT INTO `nuke_nsnst_referers` VALUES(230, 'oilburnerservice.net');
INSERT INTO `nuke_nsnst_referers` VALUES(231, 'omburo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(232, 'oneoz.com');
INSERT INTO `nuke_nsnst_referers` VALUES(233, 'onepageahead.net');
INSERT INTO `nuke_nsnst_referers` VALUES(234, 'onlinewithaline.com');
INSERT INTO `nuke_nsnst_referers` VALUES(235, 'organizate.net');
INSERT INTO `nuke_nsnst_referers` VALUES(236, 'ourownweddingsong.com');
INSERT INTO `nuke_nsnst_referers` VALUES(237, 'owen-music.com');
INSERT INTO `nuke_nsnst_referers` VALUES(238, 'p-partners.com');
INSERT INTO `nuke_nsnst_referers` VALUES(239, 'paginadeautor.com');
INSERT INTO `nuke_nsnst_referers` VALUES(240, 'pakistandutyfree.com');
INSERT INTO `nuke_nsnst_referers` VALUES(241, 'pamanderson.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(242, 'parentsense.net');
INSERT INTO `nuke_nsnst_referers` VALUES(243, 'particlewave.net');
INSERT INTO `nuke_nsnst_referers` VALUES(244, 'pay-clic.com');
INSERT INTO `nuke_nsnst_referers` VALUES(245, 'pay4link.net');
INSERT INTO `nuke_nsnst_referers` VALUES(246, 'pcisp.com');
INSERT INTO `nuke_nsnst_referers` VALUES(247, 'persist-pharma.com');
INSERT INTO `nuke_nsnst_referers` VALUES(248, 'peteband.com');
INSERT INTO `nuke_nsnst_referers` VALUES(249, 'petplusindia.com');
INSERT INTO `nuke_nsnst_referers` VALUES(250, 'pickabbw.co.uk');
INSERT INTO `nuke_nsnst_referers` VALUES(251, 'picture-oral-position-lesbian.com');
INSERT INTO `nuke_nsnst_referers` VALUES(252, 'pl8again.com');
INSERT INTO `nuke_nsnst_referers` VALUES(253, 'planeting.net');
INSERT INTO `nuke_nsnst_referers` VALUES(254, 'popusky.com');
INSERT INTO `nuke_nsnst_referers` VALUES(255, 'porn-expert.com');
INSERT INTO `nuke_nsnst_referers` VALUES(256, 'promoblitza.com');
INSERT INTO `nuke_nsnst_referers` VALUES(257, 'proproducts-usa.com');
INSERT INTO `nuke_nsnst_referers` VALUES(258, 'ptcgzone.com');
INSERT INTO `nuke_nsnst_referers` VALUES(259, 'ptporn.com');
INSERT INTO `nuke_nsnst_referers` VALUES(260, 'publishmybong.com');
INSERT INTO `nuke_nsnst_referers` VALUES(261, 'puttingtogether.com');
INSERT INTO `nuke_nsnst_referers` VALUES(262, 'qualifiedcancelations.com');
INSERT INTO `nuke_nsnst_referers` VALUES(263, 'rahost.com');
INSERT INTO `nuke_nsnst_referers` VALUES(264, 'rainbow21.com');
INSERT INTO `nuke_nsnst_referers` VALUES(265, 'rakkashakka.com');
INSERT INTO `nuke_nsnst_referers` VALUES(266, 'randomfeeding.com');
INSERT INTO `nuke_nsnst_referers` VALUES(267, 'rape-art.com');
INSERT INTO `nuke_nsnst_referers` VALUES(268, 'rd-brains.com');
INSERT INTO `nuke_nsnst_referers` VALUES(269, 'realestateonthehill.net');
INSERT INTO `nuke_nsnst_referers` VALUES(270, 'rebuscadobot');
INSERT INTO `nuke_nsnst_referers` VALUES(271, 'requested-stuff.com');
INSERT INTO `nuke_nsnst_referers` VALUES(272, 'retrotrasher.com');
INSERT INTO `nuke_nsnst_referers` VALUES(273, 'ricopositive.com');
INSERT INTO `nuke_nsnst_referers` VALUES(274, 'risorseinrete.com');
INSERT INTO `nuke_nsnst_referers` VALUES(275, 'rotatingcunts.com');
INSERT INTO `nuke_nsnst_referers` VALUES(276, 'runawayclicks.com');
INSERT INTO `nuke_nsnst_referers` VALUES(277, 'rutalibre.com');
INSERT INTO `nuke_nsnst_referers` VALUES(278, 's-marche.com');
INSERT INTO `nuke_nsnst_referers` VALUES(279, 'sabrosojazz.com');
INSERT INTO `nuke_nsnst_referers` VALUES(280, 'samuraidojo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(281, 'sanaldarbe.com');
INSERT INTO `nuke_nsnst_referers` VALUES(282, 'sasseminars.com');
INSERT INTO `nuke_nsnst_referers` VALUES(283, 'schlampenbruzzler.com');
INSERT INTO `nuke_nsnst_referers` VALUES(284, 'searchmybong.com');
INSERT INTO `nuke_nsnst_referers` VALUES(285, 'seckur.com');
INSERT INTO `nuke_nsnst_referers` VALUES(286, 'sex-asian-porn-interracial-photo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(287, 'sex-porn-fudge-hardcore-movie.com');
INSERT INTO `nuke_nsnst_referers` VALUES(288, 'sexa3.net');
INSERT INTO `nuke_nsnst_referers` VALUES(289, 'sexer.com');
INSERT INTO `nuke_nsnst_referers` VALUES(290, 'sexintention.com');
INSERT INTO `nuke_nsnst_referers` VALUES(291, 'sexnet24.tv');
INSERT INTO `nuke_nsnst_referers` VALUES(292, 'sexomundo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(293, 'sharks.com.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(294, 'shells.com.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(295, 'shop-ecosafe.com');
INSERT INTO `nuke_nsnst_referers` VALUES(296, 'shop-toon-hardcore-fudge-cum-pics.com');
INSERT INTO `nuke_nsnst_referers` VALUES(297, 'silverfussions.com');
INSERT INTO `nuke_nsnst_referers` VALUES(298, 'sin-city-sex.net');
INSERT INTO `nuke_nsnst_referers` VALUES(299, 'sluisvan.com');
INSERT INTO `nuke_nsnst_referers` VALUES(300, 'smutshots.com');
INSERT INTO `nuke_nsnst_referers` VALUES(301, 'snagglersmaggler.com');
INSERT INTO `nuke_nsnst_referers` VALUES(302, 'somethingtoforgetit.com');
INSERT INTO `nuke_nsnst_referers` VALUES(303, 'sophiesplace.net');
INSERT INTO `nuke_nsnst_referers` VALUES(304, 'soursushi.com');
INSERT INTO `nuke_nsnst_referers` VALUES(305, 'southernxstables.com');
INSERT INTO `nuke_nsnst_referers` VALUES(306, 'speed467.com');
INSERT INTO `nuke_nsnst_referers` VALUES(307, 'speedpal4you.com');
INSERT INTO `nuke_nsnst_referers` VALUES(308, 'sporty.org.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(309, 'stopdriving.net');
INSERT INTO `nuke_nsnst_referers` VALUES(310, 'stw.org.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(311, 'sufficientlife.com');
INSERT INTO `nuke_nsnst_referers` VALUES(312, 'sussexboats.net');
INSERT INTO `nuke_nsnst_referers` VALUES(313, 'swinger-party-free-dating-porn-sluts.com');
INSERT INTO `nuke_nsnst_referers` VALUES(314, 'sydneyhay.com');
INSERT INTO `nuke_nsnst_referers` VALUES(315, 'szmjht.com');
INSERT INTO `nuke_nsnst_referers` VALUES(316, 'teninchtrout.com');
INSERT INTO `nuke_nsnst_referers` VALUES(317, 'thebalancedfruits.com');
INSERT INTO `nuke_nsnst_referers` VALUES(318, 'theendofthesummit.com');
INSERT INTO `nuke_nsnst_referers` VALUES(319, 'thiswillbeit.com');
INSERT INTO `nuke_nsnst_referers` VALUES(320, 'thosethosethose.com');
INSERT INTO `nuke_nsnst_referers` VALUES(321, 'ticyclesofindia.com');
INSERT INTO `nuke_nsnst_referers` VALUES(322, 'tits-gay-fagot-black-tits-bigtits-amateur.com');
INSERT INTO `nuke_nsnst_referers` VALUES(323, 'tonius.com');
INSERT INTO `nuke_nsnst_referers` VALUES(324, 'toohsoft.com');
INSERT INTO `nuke_nsnst_referers` VALUES(325, 'toolvalley.com');
INSERT INTO `nuke_nsnst_referers` VALUES(326, 'tooporno.net');
INSERT INTO `nuke_nsnst_referers` VALUES(327, 'toosexual.com');
INSERT INTO `nuke_nsnst_referers` VALUES(328, 'torngat.com');
INSERT INTO `nuke_nsnst_referers` VALUES(329, 'tour.org.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(330, 'towneluxury.com');
INSERT INTO `nuke_nsnst_referers` VALUES(331, 'trafficmogger.com');
INSERT INTO `nuke_nsnst_referers` VALUES(332, 'triacoach.net');
INSERT INTO `nuke_nsnst_referers` VALUES(333, 'trottinbob.com');
INSERT INTO `nuke_nsnst_referers` VALUES(334, 'tttframes.com');
INSERT INTO `nuke_nsnst_referers` VALUES(335, 'tvjukebox.net');
INSERT INTO `nuke_nsnst_referers` VALUES(336, 'undercvr.com');
INSERT INTO `nuke_nsnst_referers` VALUES(337, 'unfinished-desires.com');
INSERT INTO `nuke_nsnst_referers` VALUES(338, 'unicornonero.com');
INSERT INTO `nuke_nsnst_referers` VALUES(339, 'unionvillefire.com');
INSERT INTO `nuke_nsnst_referers` VALUES(340, 'upsandowns.com');
INSERT INTO `nuke_nsnst_referers` VALUES(341, 'upthehillanddown.com');
INSERT INTO `nuke_nsnst_referers` VALUES(342, 'vallartavideo.com');
INSERT INTO `nuke_nsnst_referers` VALUES(343, 'vietnamdatingservices.com');
INSERT INTO `nuke_nsnst_referers` VALUES(344, 'vinegarlemonshots.com');
INSERT INTO `nuke_nsnst_referers` VALUES(345, 'vizy.net.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(346, 'vnladiesdatingservices.com');
INSERT INTO `nuke_nsnst_referers` VALUES(347, 'vomitandbusted.com');
INSERT INTO `nuke_nsnst_referers` VALUES(348, 'walkingthewalking.com');
INSERT INTO `nuke_nsnst_referers` VALUES(349, 'well-I-am-the-type-of-boy.com');
INSERT INTO `nuke_nsnst_referers` VALUES(350, 'whales.com.ru');
INSERT INTO `nuke_nsnst_referers` VALUES(351, 'whincer.net');
INSERT INTO `nuke_nsnst_referers` VALUES(352, 'whitpagesrippers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(353, 'whois.sc');
INSERT INTO `nuke_nsnst_referers` VALUES(354, 'wipperrippers.com');
INSERT INTO `nuke_nsnst_referers` VALUES(355, 'wordfilebooklets.com');
INSERT INTO `nuke_nsnst_referers` VALUES(356, 'world-sexs.com');
INSERT INTO `nuke_nsnst_referers` VALUES(357, 'xsay.com');
INSERT INTO `nuke_nsnst_referers` VALUES(358, 'xxxchyangel.com');
INSERT INTO `nuke_nsnst_referers` VALUES(359, 'xxxx:');
INSERT INTO `nuke_nsnst_referers` VALUES(360, 'xxxzips.com');
INSERT INTO `nuke_nsnst_referers` VALUES(361, 'youarelostintransit.com');
INSERT INTO `nuke_nsnst_referers` VALUES(362, 'yuppieslovestocks.com');
INSERT INTO `nuke_nsnst_referers` VALUES(363, 'yuzhouhuagong.com');
INSERT INTO `nuke_nsnst_referers` VALUES(364, 'zhaori-food.com');
INSERT INTO `nuke_nsnst_referers` VALUES(365, 'zwiebelbacke.com');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_strings`
--

CREATE TABLE `nuke_nsnst_strings` (
  `string` varchar(60) NOT NULL default ''
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_nsnst_strings`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_nsnst_tracked_ips`
--

CREATE TABLE `nuke_nsnst_tracked_ips` (
  `tid` int(10) NOT NULL auto_increment,
  `ip_addr` varchar(15) NOT NULL default '',
  `ip_long` int(10) unsigned NOT NULL default '0',
  `user_id` int(11) NOT NULL default '1',
  `username` varchar(60) NOT NULL default '',
  `user_agent` text NOT NULL,
  `refered_from` text NOT NULL,
  `date` int(20) NOT NULL default '0',
  `page` text NOT NULL,
  `x_forward_for` varchar(32) NOT NULL default '',
  `client_ip` varchar(32) NOT NULL default '',
  `remote_addr` varchar(32) NOT NULL default '',
  `remote_port` varchar(11) NOT NULL default '',
  `request_method` varchar(10) NOT NULL default '',
  `c2c` char(2) NOT NULL default '00',
  PRIMARY KEY  (`tid`),
  KEY `maintracking` (`ip_addr`,`ip_long`),
  KEY `ip_addr` (`ip_addr`),
  KEY `ip_long` (`ip_long`),
  KEY `user_id` (`user_id`),
  KEY `username` (`username`),
  KEY `user_agent` (`user_agent`(255)),
  KEY `refered_from` (`refered_from`(255)),
  KEY `date` (`date`),
  KEY `page` (`page`(255)),
  KEY `c2c` (`c2c`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_nsnst_tracked_ips`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_pages`
--

CREATE TABLE `nuke_pages` (
  `pid` int(10) NOT NULL auto_increment,
  `cid` int(10) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `subtitle` varchar(255) NOT NULL default '',
  `active` int(1) NOT NULL default '0',
  `page_header` text NOT NULL,
  `text` text NOT NULL,
  `page_footer` text NOT NULL,
  `signature` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `counter` int(10) NOT NULL default '0',
  `clanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_pages_categories`
--

CREATE TABLE `nuke_pages_categories` (
  `cid` int(10) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_pages_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_pollcomments`
--

CREATE TABLE `nuke_pollcomments` (
  `tid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL default '0',
  `pollID` int(11) NOT NULL default '0',
  `date` datetime default NULL,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) default NULL,
  `url` varchar(60) default NULL,
  `host_name` varchar(60) default NULL,
  `subject` varchar(60) NOT NULL default '',
  `comment` text NOT NULL,
  `score` tinyint(4) NOT NULL default '0',
  `reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `pid` (`pid`),
  KEY `pollID` (`pollID`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_pollcomments`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_poll_check`
--

CREATE TABLE `nuke_poll_check` (
  `ip` varchar(20) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `pollID` int(10) NOT NULL default '0'
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_poll_check`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_poll_data`
--

CREATE TABLE `nuke_poll_data` (
  `pollID` int(11) NOT NULL default '0',
  `optionText` char(50) NOT NULL default '',
  `optionCount` int(11) NOT NULL default '0',
  `voteID` int(11) NOT NULL default '0'
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_poll_data`
--

INSERT INTO `nuke_poll_data` VALUES(1, 'Ummmm, not bad', 0, 1);
INSERT INTO `nuke_poll_data` VALUES(1, 'Cool', 0, 2);
INSERT INTO `nuke_poll_data` VALUES(1, 'Terrific', 0, 3);
INSERT INTO `nuke_poll_data` VALUES(1, 'The best one!', 0, 4);
INSERT INTO `nuke_poll_data` VALUES(1, 'what the hell is this?', 0, 5);
INSERT INTO `nuke_poll_data` VALUES(1, '', 0, 6);
INSERT INTO `nuke_poll_data` VALUES(1, '', 0, 7);
INSERT INTO `nuke_poll_data` VALUES(1, '', 0, 8);
INSERT INTO `nuke_poll_data` VALUES(1, '', 0, 9);
INSERT INTO `nuke_poll_data` VALUES(1, '', 0, 10);
INSERT INTO `nuke_poll_data` VALUES(1, '', 0, 11);
INSERT INTO `nuke_poll_data` VALUES(1, '', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_poll_desc`
--

CREATE TABLE `nuke_poll_desc` (
  `pollID` int(11) NOT NULL auto_increment,
  `pollTitle` varchar(100) NOT NULL default '',
  `timeStamp` int(11) NOT NULL default '0',
  `voters` mediumint(9) NOT NULL default '0',
  `planguage` varchar(30) NOT NULL default '',
  `artid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`pollID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_poll_desc`
--

INSERT INTO `nuke_poll_desc` VALUES(1, 'What do you think about this site?', 961405160, 0, 'english', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_queue`
--

CREATE TABLE `nuke_queue` (
  `qid` smallint(5) unsigned NOT NULL auto_increment,
  `uid` mediumint(9) NOT NULL default '0',
  `uname` varchar(40) NOT NULL default '',
  `subject` varchar(100) NOT NULL default '',
  `story` text,
  `storyext` text NOT NULL,
  `timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `topic` varchar(20) NOT NULL default '',
  `alanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`qid`),
  KEY `uid` (`uid`),
  KEY `uname` (`uname`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_queue`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_quotes`
--

CREATE TABLE `nuke_quotes` (
  `qid` int(10) unsigned NOT NULL auto_increment,
  `quote` text,
  PRIMARY KEY  (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_quotes`
--

INSERT INTO `nuke_quotes` VALUES(1, 'Nos morituri te salutamus - CBHS');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_referer`
--

CREATE TABLE `nuke_referer` (
  `url` varchar(100) NOT NULL,
   `lasttime` int(10) unsigned DEFAULT '0' NOT NULL,
   `link` VARCHAR( 100 ) NOT NULL,
  PRIMARY KEY  (`url`),
  KEY `lasttime` (`lasttime`)
);

--
-- Dumping data for table `nuke_referer`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_related`
--

CREATE TABLE `nuke_related` (
  `rid` int(11) NOT NULL auto_increment,
  `tid` int(11) NOT NULL default '0',
  `name` varchar(30) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_related`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_reviews`
--

CREATE TABLE `nuke_reviews` (
  `id` int(10) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  `title` varchar(150) NOT NULL default '',
  `text` text NOT NULL,
  `reviewer` varchar(25) default NULL,
  `email` varchar(60) default NULL,
  `score` int(10) NOT NULL default '0',
  `cover` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `url_title` varchar(50) NOT NULL default '',
  `hits` int(10) NOT NULL default '0',
  `rlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_reviews`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_reviews_add`
--

CREATE TABLE `nuke_reviews_add` (
  `id` int(10) NOT NULL auto_increment,
  `date` date default NULL,
  `title` varchar(150) NOT NULL default '',
  `text` text NOT NULL,
  `reviewer` varchar(25) NOT NULL default '',
  `email` varchar(60) default NULL,
  `score` int(10) NOT NULL default '0',
  `url` varchar(100) NOT NULL default '',
  `url_title` varchar(50) NOT NULL default '',
  `rlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_reviews_add`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_reviews_comments`
--

CREATE TABLE `nuke_reviews_comments` (
  `cid` int(10) NOT NULL auto_increment,
  `rid` int(10) NOT NULL default '0',
  `userid` varchar(25) NOT NULL default '',
  `date` datetime default NULL,
  `comments` text,
  `score` int(10) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `rid` (`rid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_reviews_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_reviews_main`
--

CREATE TABLE `nuke_reviews_main` (
  `title` varchar(100) default NULL,
  `description` text,
  KEY `title` (`title`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_reviews_main`
--

INSERT INTO `nuke_reviews_main` VALUES('Reviews Section Title', 'Reviews Section Long Description');

-- --------------------------------------------------------


--
-- Table structure for table `nuke_security_agents`
--

CREATE TABLE `nuke_security_agents` (
  `agent_name` VARCHAR(20) NOT NULL default '',
  `agent_fullname` VARCHAR(30) NULL default '',
  `agent_hostname` VARCHAR(30) NULL default '',
  `agent_url` varchar(80) NULL default '',
  `agent_ban` INT(1) NOT NULL default 0,
  `agent_desc` text NULL,
  PRIMARY KEY  (`agent_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_security_agents`
--

INSERT INTO `nuke_security_agents` VALUES('1Noon', '1Noonbot', NULL, '1nooncorp.com', -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('AI', 'AIBOT', NULL, '21seek.com', 0, '(China) robot (218.17.90.xxx)');
INSERT INTO `nuke_security_agents` VALUES('aip', 'aipbot/', NULL, 'nameprotect.com', 0, 'copyright search robot (24.177.134.x), s. also\r\n- np/0.1_(np;_http://www.nameprotect.com...\r\n- abot/0.1 (abot; http://www.abot.com...');
INSERT INTO `nuke_security_agents` VALUES('Alexa', 'ia_archiver', '.alexa.com', 'alexa.com', 0, 'Alexa (209.237.238.1xx)');
INSERT INTO `nuke_security_agents` VALUES('Archive', 'ia_archiver', '.archive.org', 'archive.org', 0, 'The Internet Archive (209.237.238.1xx)');
INSERT INTO `nuke_security_agents` VALUES('AltaVista', 'Scooter', NULL, 'altavista.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Amfibi', 'Amfibibot', NULL, 'amfibi.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Ansearch', 'AnsearchBot/', NULL, 'ansearch.com.au', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('AnswerBus', 'AnswerBus', NULL, 'answerbus.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Argus', 'Argus/', NULL, 'simpy.com/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Arachmo', 'Arachmo', NULL, NULL, -1, 'Impolite bandwidth sucker. Netblock owned by SOFTBANK BB CORP, Japan.\r\nDoesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Ask Jeeves', 'Ask Jeeves/Teoma', '.ask.com', 'sp.ask.com/docs/about/tech_crawling.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('ASPseek', 'ASPseek/', NULL, 'aspseek.org', 0, 'search engine software');
INSERT INTO `nuke_security_agents` VALUES('AvantGo', 'AvantGo', 'avantgo.com', 'avantgo.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Axadine', 'Axadine Crawler', NULL, 'axada.de', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Baidu', 'Baiduspider', NULL, 'baidu.com/search/spider.htm', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Become', 'BecomeBot', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('BigClique', 'BigCliqueBOT', NULL, 'bigclique.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('BilderSauger', 'BilderSauger', NULL, 'google.com/search?q=BilderSauger+data+becker', -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('BitTorrent', 'btbot/', NULL, 'btbot.com/btbot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Bruin', 'BruinBot', NULL, 'webarchive.cs.ucla.edu/bruinbot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('cfetch', 'cfetch/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Cipinet', 'Cipinet', NULL, 'cipinet.com/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Combine', 'Combine/', NULL, 'lub.lu.se/combine/', -1, 'harvesting robot');
INSERT INTO `nuke_security_agents` VALUES('Convera', 'ConveraCrawler/', NULL, 'authoritativeweb.com/crawl', -1, 'Impolite robot. Netblock owned by Convera Corp, Vienna');
INSERT INTO `nuke_security_agents` VALUES('Cydral', 'CydralSpider', NULL, 'cydral.com', 0, 'Cydral Web Image Search');
INSERT INTO `nuke_security_agents` VALUES('curl', 'curl/', NULL, 'curl.haxx.se', 0, 'file transferring tool');
INSERT INTO `nuke_security_agents` VALUES('Datapark', 'DataparkSearch/', NULL, 'dataparksearch.org', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Demo', 'Demo Bot', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('DHCrawler', 'DHCrawler', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Diamond', 'DiamondBot', NULL, 'searchscout.com', -1, 'Claria (ex Gator) robot (64.152.73.xx), s. also Claria');
INSERT INTO `nuke_security_agents` VALUES('DISCo', 'DISCo Pump', NULL, NULL, -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Dragonfly CMS', 'Dragonfly File Reader', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Drecom', 'Drecombot/', 'drecom.jp', 'career.drecom.jp/bot.html', -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Dumbfind', 'Dumbot', NULL, 'dumbfind.com/dumbot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('e-Society', 'e-SocietyRobot', NULL, 'yama.info.waseda.ac.jp/~yamana/es/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('EmailSiphon', 'EmailSiphon', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('EmeraldShield', 'EmeraldShield.com WebBot', NULL, 'emeraldshield.com/webbot.aspx', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Educate', 'Educate Search', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Envolk', 'envolk[ITS]spider/', NULL, 'envolk.com/envolkspider.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Eruvo', 'EruvoBot', NULL, 'eruvo.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Esperanza', 'EsperanzaBot', NULL, 'esperanza.to/bot/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('eStyle', 'eStyleSearch', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Eurip', 'EuripBot', NULL, 'eurip.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Fast', 'FAST MetaWeb Crawler', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('FAST Enterprise', 'FAST Enterprise Crawler', 'fastsearch.net', NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Feedster', 'Feedster Crawler', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('FetchAPI', 'Fetch API Request', NULL, NULL, -1, 'Some sort of application that tries to download and store your full website.\r\nDoesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('fg', 'fgcrawler', NULL, NULL, -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Filangy', 'Filangy', NULL, 'filangy.com/filangyinfo.jsp?inc=robots.jsp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Findexa', 'Findexa Crawler', 'gulesider.no', 'findexa.no/gulesider/article26548.ece', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('FindLinks', 'findlinks', NULL, 'wortschatz.uni-leipzig.de/findlinks/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Franklin', 'Franklin locator', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('FullWeb', 'Full Web Bot', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Fyber', 'FyberSpider', NULL, 'fybersearch.com/fyberspider.php', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Gais', 'Gaisbot', NULL, 'gais.cs.ccu.edu.tw/robot.php', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Genie', 'geniebot', NULL, 'genieknows.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('GetRight', 'GetRight/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Giga', 'Gigabot/', NULL, 'gigablast.com/spider.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Girafa', 'Girafabot', NULL, 'girafa.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('GoForIt', 'GOFORITBOT', NULL, 'goforit.com/about/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Gonzo', 'gonzo1', '.t-ipconnect.de', 'telekom.de', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Google', 'Googlebot', 'crawl[0-9\\-]+.googlebot.com', 'google.com/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('GoogleAds', 'Mediapartners-Google', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('GoogleImg', 'Googlebot-Image', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('GPU', 'GPU p2p crawler', NULL, 'gpu.sourceforge.net/search_engine.php', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Grub', 'grub-client', NULL, 'grub.org', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('GSA', 'gsa-crawler', NULL, 'arsenaldigital.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('HappyFun', 'HappyFunBot/', NULL, 'happyfunsearch.com/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Harvest', 'Harvest/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('HeadScan', 'head-scan.pl/', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Heritrix', 'heritrix/', NULL, 'crawler.xtramind.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('HooWWWer', 'HooWWWer', NULL, 'cosco.hiit.fi/search/hoowwwer/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('htdig', 'htdig/', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('HTMLParser', 'HTMLParser/', NULL, 'htmlparser.sourceforge.net', -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('HTTrack', 'HTTrack', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Ichiro', 'ichiro/', NULL, 'nttr.co.jp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('IconSurf', 'IconSurf/', NULL, 'iconsurf.com/robot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Industry', 'Industry Program', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Indy', 'Indy Library', NULL, NULL, -1, 'Originally, the Indy Library is a programming library which is available at http://www.nevrona.com/Indy or http://indy.torry.net under an Open Source license. This library is included with Borland Delphi 6, 7, C++Builder 6, plus all of the Kylix versions. Unfortunately, this library is hi-jacked and abused by some Chinese spam bots. All recent user-agents with the unmodified \"Indy Library\" string were of Chinese origin.\r\nDoesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('InetURL', 'InetURL/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Infocious', 'InfociousBot', NULL, 'corp.infocious.com/tech_crawler.php', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Ingrid', 'INGRID', NULL, 'webmaster.ilse.nl/jsp/webmaster.jsp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Interseek', 'InterseekWeb/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Ipwalk', 'IpwalkBot/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('IRL', 'IRLbot', NULL, 'irl.cs.tamu.edu/crawler', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Java', 'Java/', NULL, NULL, -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Jyxo', 'Jyxobot/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('KnowItAll', 'KnowItAll(', NULL, 'cs.washington.edu', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Kumm', 'KummHttp/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Lapozz', 'LapozzBot', NULL, 'robot.lapozz.hu/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Larbin', 'larbin', NULL, 'larbin.sourceforge.net/index-eng.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('LeechGet', 'LeechGet', NULL, 'leechget.net', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('libwww-perl', 'libwww-perl/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('lmspider', 'lmspider', NULL, 'scansoft.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Local', 'LocalcomBot/', NULL, 'local.com/bot.htm', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Looksmart', 'ZyBorg/', '.looksmart.com', 'WISEnutbot.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('LoveSMS', 'LoveSMS Search Engine', NULL, 'cauta.lovesms.ro', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Lycos', 'Lycos_Spider', '.lycos.com', NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Mac Finder', 'Mac Finder', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Majestic-12', 'MJ12bot', NULL, 'majestic12.co.uk/bot.php', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('MapoftheInternet', 'MapoftheInternet.com', NULL, 'mapoftheinternet.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('McBot', 'McBot/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Medusa', 'Medusa', NULL, NULL, -1, 'Medusa is a tool for finding images, movie-clips or other kinds of files on webpages and downloading them. You start by entering a starting URL and Medusa searches for the filetypes you are interested in on this page and all pages found up to a given depth.\r\nDoesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Metaspinner', 'Metaspinner/', NULL, 'meta-spinner.de', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('MetaTag', 'MetaTagRobot', NULL, 'widexl.com/remote/search-engines/metatag-analyzer.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Minuteman', 'Minuteman', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Mirago', 'HenryTheMiragoRobot', NULL, 'miragorobot.com/scripts/mrinfo.asp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Missauga', 'Missauga Locate', NULL, NULL, -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Missigua', 'Missigua Locator', NULL, NULL, -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Mister PiX', 'Mister PiX', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Mojeek', 'MojeekBot', NULL, 'mojeek.com/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('MSCCDS', 'Microsoft Scheduled Cache Cont', NULL, 'google.com/search?q=Scheduled+Cache+Content+Download+Service', -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('MDAIPP', 'Microsoft Data Access Internet', NULL, 'google.com/search?q=Microsoft+Data+Access+Internet+Publishin', -1, 'This agent is used to exploit your system regarding the following security issue in FrontPage2000: http://lists.grok.org.uk/pipermail/full-disclosure/2004-December/030467.html');
INSERT INTO `nuke_security_agents` VALUES('MSIECrawler', 'MSIECrawler', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('MSN', 'msnbot', 'msnbot.msn.com', 'search.msn.com/msnbot.htm', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('MSR', 'MSRBOT/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('MUC', 'Microsoft URL Control', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Naver', 'NaverBot', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('NetMechanic', 'NetMechanic', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('nicebot', 'nicebot', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Ninja', 'Download Ninja', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Noxtrum', 'noxtrumbot', NULL, 'noxtrum.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('NRS', 'NetResearchServer', NULL, 'loopimprovements.com/robot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Nutch', 'Nutch', NULL, 'nutch.org/docs/en/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('NutchCVS', 'NutchCVS/', NULL, 'lucene.apache.org/nutch/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Nutscrape', 'Nutscrape/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('oegp', 'oegp', NULL, NULL, -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Offline Explorer', 'Offline Explorer/', NULL, 'metaproducts.com', 0, 'A Windows offline browser that allows you to download an unlimited number of your favorite Web and FTP sites for later offline viewing, editing or browsing.');
INSERT INTO `nuke_security_agents` VALUES('OmniExplorer', 'OmniExplorer_Bot/', NULL, 'omni-explorer.com', -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Onet', 'OnetSzukaj/', NULL, 'szukaj.onet.pl', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Openfind', 'Openbot/', NULL, 'openfind.com.tw/robot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Orbit', 'Orbiter', NULL, 'dailyorbit.com/bot.htm', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('P3P Validator', 'P3P Validator', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Patsearch', 'Patwebbot', NULL, 'herz-power.de/technik.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('PhpDig', 'PhpDig/', NULL, 'phpdig.net/robot.php', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('PicSearch', 'psbot/', NULL, 'picsearch.com/bot.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Pipeline', 'pipeLiner', NULL, 'pipeline-search.com/webmaster.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Pogodak', 'Pogodak', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Poly', 'polybot', NULL, 'cis.poly.edu/polybot/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Pompos', 'Pompos/', NULL, 'dir.com/pompos.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Poodle', 'Poodle predictor', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Powermarks', 'Powermarks/', NULL, 'kaylon.com/power.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('PrivacyFinder', 'PrivacyFinder Cache Bot', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Privatizer', 'privatizer.net', NULL, 'privatizer.net/whatis.php', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Production', 'Production Bot', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('PS', 'Program Shareware', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('PuxaRapido', 'PuxaRapido v1.0', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Python-urllib', 'Python-urllib/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Qweery', 'qweery', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Rambler', 'StackRambler/', NULL, 'rambler.ru', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Roffle', 'Roffle/', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('RPT-HTTP', 'RPT-HTTPClient/', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('rssImages', 'rssImagesBot', NULL, 'herbert.groot.jebbink.nl/?app=rssImages', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Ryan', 'Ryanbot/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('SBIder', 'SBIder/', NULL, 'sitesell.com/sbider.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('schibstedsok', 'schibstedsokbot', NULL, 'schibstedsok.no', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Schmozilla', 'Schmozilla/', NULL, NULL, -1, 'Doesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Scrubby', 'Scrubby', NULL, 'scrubtheweb.com/abs/meta-check.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('ScSpider', 'ScSpider/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('SearchGuild', 'SearchGuild/', NULL, NULL, 0, 'DMOZ Experiment');
INSERT INTO `nuke_security_agents` VALUES('Seekbot', 'Seekbot', NULL, 'seekbot.net', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Seznam', 'SeznamBot/', NULL, 'fulltext.seznam.cz', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Siets', 'SietsCrawler/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('SitiDi', '/SitiDiBot/', NULL, 'SitiDi.net', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Snoopy', 'Snoopy', NULL, 'sourceforge.net/projects/snoopy/', 0, 'Snoopy is a PHP class that simulates a web browser. It automates the task of retrieving web page content and posting forms, for example.');
INSERT INTO `nuke_security_agents` VALUES('Sohu', 'sohu-search', NULL, 'sogou.com', 0, 'Searchbot of sohu.com');
INSERT INTO `nuke_security_agents` VALUES('Spambot', NULL, NULL, NULL, -1, 'Global name for bots which try to fill guestbooks and other stuff with garbage\r\nThey don\'t follow robots.txt either\r\n\r\nCurrent agents in this list:\r\nMissigua Locator\r\nProduction Bot\r\nFull Web Bot\r\nDemo Bot\r\nEducate Search\r\nFranklin locator\r\nIndustry Program\r\nMac Finder\r\nProgram Shareware\r\nMissauga Locate ');
INSERT INTO `nuke_security_agents` VALUES('Spip', 'SPIP-', NULL, 'spip.net', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('SurveyBot', 'SurveyBot/', NULL, 'whois.sc', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Susie', '!Susie', NULL, 'sync2it.com/susie', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Thumbshots', 'thumbshots-de-Bot', NULL, 'thumbshots.de', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Turnitin', 'TurnitinBot', NULL, 'turnitin.com/robot/crawlerinfo.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('TutorGig', 'TutorGigBot', NULL, 'tutorgig.info', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Twiceler', 'Twiceler', NULL, 'cuill.com/robots.html', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Updated', 'updated/', NULL, 'updated.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Versus', 'versus crawler', NULL, 'eda.baykan@epfl.ch', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Vagabondo', 'Vagabondo', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Virgo', 'Virgo/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Voila', 'VoilaBot', NULL, 'voila.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('vspider', 'vspider', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('W3C Checklink', 'W3C-checklink', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('W3C Validator', 'W3C_Validator', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Walhello', 'appie', NULL, 'walhello.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('WebIndexer', 'WebIndexer/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('WebReaper', 'WebReaper', NULL, 'webreaper.net', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('WebStripper', 'WebStripper/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Wget', 'Wget/', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Wire', 'WIRE', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('YaCy', 'yacy', NULL, 'yacy.net/yacy/', -1, 'p2p-based distributed Web Search Engine\r\nDoesn\'t follow robots.txt');
INSERT INTO `nuke_security_agents` VALUES('Yadows', 'YadowsCrawler', NULL, 'yadows.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Yahoo', 'Yahoo! Slurp', NULL, 'help.yahoo.com/help/us/ysearch/slurp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('YahooFS', 'YahooFeedSeeker/', '.yahoo.', 'help.yahoo.com/help/us/ysearch/slurp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('YahooMM', 'Yahoo-MMCrawler', NULL, 'help.yahoo.com/help/us/ysearch/slurp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('YANDEX', 'YANDEX', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Zeus', 'Zeus', NULL, NULL, 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('NextGen', 'NextGenSearchBot', NULL, 'about.zoominfo.com/PublicSite/NextGenSearchBot.asp', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('PoI', 'PictureOfInternet/', NULL, 'malfunction.org/poi', -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Sensis', 'Sensis Web Crawler', NULL, 'sensis.com.au', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('IlTrovatore', 'IlTrovatore-Setaccio/', NULL, 'iltrovatore.it/bot.html', -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Rufus', 'RufusBot', NULL, '64.124.122.252/feedback.html', -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('WebMiner', 'WebMiner', NULL, NULL, -1, 'See RufusBot');
INSERT INTO `nuke_security_agents` VALUES('Accoona', 'Accoona-AI-Agent/', NULL, 'accoona.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Xirq', 'xirq/', NULL, 'xirq.com/', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('Blogpulse', 'Blogpulse', NULL, 'blogpulse.com', 0, 'IntelliSeek service');
INSERT INTO `nuke_security_agents` VALUES('KnackAttack', 'KnackAttack', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Miva', 'Miva', NULL, 'miva.com', 0, NULL);
INSERT INTO `nuke_security_agents` VALUES('PictureRipper', 'PictureRipper/', NULL, 'pictureripper.com', -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Teleport', 'Teleport Pro/', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('NetSprint', 'NetSprint', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('SVSpider', 'SVSpider/', NULL, 'bildkiste.de', -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('SVSearch', 'SVSearchRobot/', NULL, NULL, -1, NULL);
INSERT INTO `nuke_security_agents` VALUES('Lorkyll', 'Lorkyll', NULL, '444.net', -1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_session`
--

CREATE TABLE `nuke_session` (
  `uname` varchar(25) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `starttime` varchar(14) NOT NULL default '',
  `host_addr` varchar(48) NOT NULL default '',
  `guest` int(1) NOT NULL default '0',
  `module` varchar(30) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  PRIMARY KEY `uname` (`uname`),
  KEY `time` (`time`),
  KEY `guest` (`guest`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_session`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_censor`
--

CREATE TABLE `nuke_shoutbox_censor` (
  `id` int(9) NOT NULL auto_increment,
  `text` varchar(30) NOT NULL,
  `replacement` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 ;

--
-- Dumping data for table `nuke_shoutbox_censor`
--

INSERT INTO `nuke_shoutbox_censor` VALUES(1, '@$$', 'butt');
INSERT INTO `nuke_shoutbox_censor` VALUES(2, 'a$$', 'butt');
INSERT INTO `nuke_shoutbox_censor` VALUES(3, 'anton', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(4, 'arse', 'butt');
INSERT INTO `nuke_shoutbox_censor` VALUES(5, 'arsehole', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(6, 'ass', 'butt');
INSERT INTO `nuke_shoutbox_censor` VALUES(7, 'ass muncher', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(8, 'asshole', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(9, 'asstooling', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(10, 'asswipe', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(11, 'b!tch', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(12, 'b17ch', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(13, 'b1tch', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(14, 'bastard', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(15, 'beefcurtins', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(16, 'bi7ch', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(17, 'bitch', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(18, 'bitchy', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(19, 'boiolas', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(20, 'bollocks', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(21, 'breasts', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(22, 'brown nose', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(23, 'bugger', 'damn');
INSERT INTO `nuke_shoutbox_censor` VALUES(24, 'butt pirate', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(25, 'c0ck', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(26, 'cawk', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(27, 'chink', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(28, 'clitsaq', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(29, 'cock', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(30, 'cockbite', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(31, 'cockgobbler', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(32, 'cocksucker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(33, 'cum', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(34, 'cunt', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(35, 'dago', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(36, 'daygo', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(37, 'dego', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(38, 'dick', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(39, 'dick wad', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(40, 'dickhead', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(41, 'dickweed', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(42, 'douchebag', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(43, 'dziwka', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(44, 'ekto', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(45, 'enculer', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(46, 'faen', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(47, 'fag', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(48, 'faggot', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(49, 'fart', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(50, 'fatass', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(51, 'feg', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(52, 'felch', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(53, 'ficken', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(54, 'fitta', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(55, 'fitte', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(56, 'flikker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(57, 'fok', '$#%!');
INSERT INTO `nuke_shoutbox_censor` VALUES(58, 'fuck', '$#%!');
INSERT INTO `nuke_shoutbox_censor` VALUES(59, 'fu(k', '$#%!');
INSERT INTO `nuke_shoutbox_censor` VALUES(60, 'fucker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(61, 'fucking', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(62, 'fuckwit', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(63, 'fuk', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(64, 'fuking', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(65, 'futkretzn', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(66, 'fux0r', '$#%!');
INSERT INTO `nuke_shoutbox_censor` VALUES(67, 'gook', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(68, 'h0r', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(69, 'handjob', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(70, 'helvete', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(71, 'honkey', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(72, 'hore', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(73, 'hump', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(74, 'injun', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(75, 'kawk', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(76, 'kike', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(77, 'knulle', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(78, 'kraut', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(79, 'kuk', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(80, 'kuksuger', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(81, 'kurac', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(82, 'kurwa', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(83, 'langer', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(84, 'masturbation', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(85, 'merd', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(86, 'motherfucker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(87, 'motherfuckingcocksucker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(88, 'mutherfucker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(89, 'nepesaurio', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(90, 'nigga', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(91, 'nigger', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(92, 'nonce', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(93, 'nutsack', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(94, 'one-eyed-trouser-snake', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(95, 'penis', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(96, 'picka', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(97, 'pissant', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(98, 'pizda', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(99, 'politician', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(100, 'prick', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(101, 'puckface', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(102, 'pule', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(103, 'pussy', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(104, 'puta', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(105, 'puto', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(106, 'rimjob', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(107, 'rubber', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(108, 'scheisse', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(109, 'schlampe', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(110, 'schlong', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(111, 'screw', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(112, 'shit', '****');
INSERT INTO `nuke_shoutbox_censor` VALUES(113, 'shiteater', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(114, 'shiz', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(115, 'skribz', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(116, 'skurwysyn', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(117, 'slut', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(118, 'spermburper', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(119, 'spic', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(120, 'spierdalaj', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(121, 'splooge', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(122, 'spunk', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(123, 'tatas', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(124, 'tits', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(125, 'toss the salad', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(126, 'twat', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(127, 'unclefucker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(128, 'vagina', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(129, 'vittu', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(130, 'votze', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(131, 'wank', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(132, 'wanka', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(133, 'wanker', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(134, 'wankers', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(135, 'wankstain', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(136, 'whore', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(137, 'wichser', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(138, 'wop', '[censored]');
INSERT INTO `nuke_shoutbox_censor` VALUES(139, 'yed', '[censored]');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_conf`
--

CREATE TABLE `nuke_shoutbox_conf` (
  `id` int(9) NOT NULL default '0',
  `color1` varchar(20) NOT NULL default '',
  `color2` varchar(20) NOT NULL default '',
  `date` varchar(5) NOT NULL default '',
  `time` varchar(5) NOT NULL default '',
  `number` varchar(5) NOT NULL default '',
  `ipblock` varchar(5) NOT NULL default '',
  `nameblock` varchar(5) NOT NULL default '',
  `censor` varchar(5) NOT NULL default '',
  `tablewidth` char(3) NOT NULL default '',
  `urlonoff` varchar(5) NOT NULL default '',
  `delyourlastpost` varchar(5) NOT NULL default '',
  `anonymouspost` varchar(5) NOT NULL default '',
  `height` varchar(5) NOT NULL default '',
  `themecolors` varchar(5) NOT NULL default '',
  `textWidth` varchar(4) NOT NULL default '',
  `nameWidth` varchar(4) NOT NULL default '',
  `smiliesPerRow` varchar(4) NOT NULL default '',
  `reversePosts` varchar(4) NOT NULL default '',
  `timeOffset` varchar(10) NOT NULL default '',
  `urlanononoff` varchar(10) NOT NULL default '',
  `pointspershout` varchar(5) NOT NULL default '',
  `shoutsperpage` varchar(5) NOT NULL default '',
  `serverTimezone` varchar(5) NOT NULL default '',
  `blockxxx` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_shoutbox_conf`
--

INSERT INTO `nuke_shoutbox_conf` VALUES(1, '#EBEBEB', '#FFFFFF', 'yes', 'yes', '10', 'yes', 'yes', 'yes', '150', 'yes', 'yes', 'yes', '150', 'no', '20', '10', '7', 'no', '0', 'no', '0', '25', '-6', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_date`
--

CREATE TABLE `nuke_shoutbox_date` (
  `id` int(5) NOT NULL default '0',
  `date` varchar(10) NOT NULL default '',
  `time` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_shoutbox_date`
--

INSERT INTO `nuke_shoutbox_date` VALUES(1, 'd-m-Y', 'g:i:a');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_emoticons`
--

CREATE TABLE `nuke_shoutbox_emoticons` (
  `id` int(9) NOT NULL auto_increment,
  `text` varchar(20) NOT NULL,
  `image` varchar(70) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 ;

--
-- Dumping data for table `nuke_shoutbox_emoticons`
--

INSERT INTO `nuke_shoutbox_emoticons` VALUES(1, ':D', '<img src=images/blocks/shout_box/icon_biggrin.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(2, ':-D', '<img src=images/blocks/shout_box/icon_biggrin.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(3, ':grin:', '<img src=images/blocks/shout_box/icon_biggrin.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(4, ':)', '<img src=images/blocks/shout_box/icon_smile.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(5, ':-)', '<img src=images/blocks/shout_box/icon_smile.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(6, ':smile:', '<img src=images/blocks/shout_box/icon_smile.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(7, ':(', '<img src=images/blocks/shout_box/icon_sad.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(8, ':-(', '<img src=images/blocks/shout_box/icon_sad.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(9, ':sad:', '<img src=images/blocks/shout_box/icon_sad.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(10, ':o', '<img src=images/blocks/shout_box/icon_surprised.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(11, ':-o', '<img src=images/blocks/shout_box/icon_surprised.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(12, ';)', '<img src=images/blocks/shout_box/icon_wink.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(13, ';-)', '<img src=images/blocks/shout_box/icon_wink.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(14, ':wink:', '<img src=images/blocks/shout_box/icon_wink.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(15, ':lol:', '<img src=images/blocks/shout_box/icon_lol.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(16, '8O', '<img src=images/blocks/shout_box/icon_eek.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(17, '8-O', '<img src=images/blocks/shout_box/icon_eek.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(18, ':eek:', '<img src=images/blocks/shout_box/icon_eek.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(19, ':shock:', '<img src=images/blocks/shout_box/icon_eek.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(20, ':?', '<img src=images/blocks/shout_box/icon_confused.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(21, ':-?', '<img src=images/blocks/shout_box/icon_confused.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(22, ':S', '<img src=images/blocks/shout_box/icon_confused.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(23, '8)', '<img src=images/blocks/shout_box/icon_cool.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(24, '8-)', '<img src=images/blocks/shout_box/icon_cool.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(25, ':x', '<img src=images/blocks/shout_box/icon_mad.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(26, ':-x', '<img src=images/blocks/shout_box/icon_mad.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(27, ':P', '<img src=images/blocks/shout_box/icon_razz.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(28, ':-P', '<img src=images/blocks/shout_box/icon_razz.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(29, ':razz:', '<img src=images/blocks/shout_box/icon_razz.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(30, ':oops:', '<img src=images/blocks/shout_box/icon_redface.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(31, ':redface:', '<img src=images/blocks/shout_box/icon_redface.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(32, ':cry:', '<img src=images/blocks/shout_box/icon_cry.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(33, ':evil:', '<img src=images/blocks/shout_box/icon_evil.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(34, ':twisted:', '<img src=images/blocks/shout_box/icon_twisted.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(35, ':roll:', '<img src=images/blocks/shout_box/icon_rolleyes.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(36, ':!:', '<img src=images/blocks/shout_box/icon_exclaim.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(37, ':exclaim:', '<img src=images/blocks/shout_box/icon_exclaim.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(38, ':?:', '<img src=images/blocks/shout_box/icon_question.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(39, ':question:', '<img src=images/blocks/shout_box/icon_question.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(40, ':idea:', '<img src=images/blocks/shout_box/icon_idea.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(41, ':arrow:', '<img src=images/blocks/shout_box/icon_arrow.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(42, ':|', '<img src=images/blocks/shout_box/icon_neutral.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(43, ':-|', '<img src=images/blocks/shout_box/icon_neutral.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(44, ':mrgreen:', '<img src=images/blocks/shout_box/icon_mrgreen.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(45, ':shy:', '<img src=images/blocks/shout_box/shy.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(46, ':dead:', '<img src=images/blocks/shout_box/dead.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(47, ':embar:', '<img src=images/blocks/shout_box/embar.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(48, ':bigrazz:', '<img src=images/blocks/shout_box/bigrazz.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(49, ':yes:', '<img src=images/blocks/shout_box/yes.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(50, ':no:', '<img src=images/blocks/shout_box/no.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(51, ':uhoh:', '<img src=images/blocks/shout_box/uhoh.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(52, ':upset:', '<img src=images/blocks/shout_box/upset.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(53, ':sigh:', '<img src=images/blocks/shout_box/sigh.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(54, 'zzz', '<img src=images/blocks/shout_box/sleep.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(55, ':sleep:', '<img src=images/blocks/shout_box/sleep.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(56, ':confused:', '<img src=images/blocks/shout_box/confused.gif>');
INSERT INTO `nuke_shoutbox_emoticons` VALUES(57, ':aua:', '<img src=images/blocks/shout_box/aua.gif>');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_ipblock`
--

CREATE TABLE `nuke_shoutbox_ipblock` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_shoutbox_ipblock`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_manage_count`
--

CREATE TABLE `nuke_shoutbox_manage_count` (
  `id` int(9) NOT NULL auto_increment,
  `admin` varchar(25) NOT NULL default '',
  `aCount` varchar(5) NOT NULL default '10',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_shoutbox_manage_count`
--

INSERT INTO `nuke_shoutbox_manage_count` VALUES(1, 'a', '10');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_nameblock`
--

CREATE TABLE `nuke_shoutbox_nameblock` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_shoutbox_nameblock`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_shouts`
--

CREATE TABLE `nuke_shoutbox_shouts` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `ip` varchar(39) default NULL,
  `timestamp` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_shoutbox_shouts`
--

INSERT INTO `nuke_shoutbox_shouts` VALUES(1, 'OurScripts.net', 'Thank You for trying this out!', '8-6-05', '24:00', 'noip', '1102320000');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_sticky`
--

CREATE TABLE `nuke_shoutbox_sticky` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `stickySlot` varchar(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_shoutbox_sticky`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_themes`
--

CREATE TABLE `nuke_shoutbox_themes` (
  `id` int(9) NOT NULL auto_increment,
  `themeName` varchar(50) default NULL,
  `blockColor1` varchar(20) default NULL,
  `blockColor2` varchar(20) default NULL,
  `border` varchar(20) default NULL,
  `menuColor1` varchar(20) default NULL,
  `menuColor2` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_shoutbox_themes`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_theme_images`
--

CREATE TABLE `nuke_shoutbox_theme_images` (
  `id` int(9) NOT NULL auto_increment,
  `themeName` varchar(50) default NULL,
  `blockArrowColor` varchar(50) NOT NULL,
  `blockBackgroundImage` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_shoutbox_theme_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_shoutbox_version`
--

CREATE TABLE `nuke_shoutbox_version` (
  `id` int(5) NOT NULL,
  `version` varchar(10) NOT NULL,
  `datechecked` varchar(2) NOT NULL,
  `versionreported` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_shoutbox_version`
--

INSERT INTO `nuke_shoutbox_version` VALUES(1, '8.5', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_sommaire`
--

CREATE TABLE `nuke_sommaire` (
  `groupmenu` int(2) NOT NULL default '0',
  `name` varchar(200) default NULL,
  `image` varchar(99) default NULL,
  `lien` text,
  `hr` char(2) default NULL,
  `center` char(2) default NULL,
  `bgcolor` tinytext,
  `invisible` int(1) default NULL,
  `class` tinytext,
  `bold` char(2) default NULL,
  `new` char(2) default NULL,
  `listbox` char(2) default NULL,
  `dynamic` char(2) default NULL,
  PRIMARY KEY  (`groupmenu`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_sommaire`
--

INSERT INTO `nuke_sommaire` VALUES(0, 'Home', 'icon_home.gif', 'index.php', '', '', '', 2, 'storytitle', '', '', '', 'on');
INSERT INTO `nuke_sommaire` VALUES(1, 'Discussions', 'icon_community.gif', '', 'on', '', '', 2, 'storytitle', '', '', '', 'on');
INSERT INTO `nuke_sommaire` VALUES(2, 'News', 'favoritos.gif', '', '', '', '', 2, 'storytitle', '', '', '', 'on');
INSERT INTO `nuke_sommaire` VALUES(3, 'Files & Links', 'som_downloads.gif', '', '', '', '', 2, 'storytitle', '', '', '', 'on');
INSERT INTO `nuke_sommaire` VALUES(4, 'General', 'icon_poll.gif', '', '', '', '', 2, 'storytitle', '', '', '', 'on');
INSERT INTO `nuke_sommaire` VALUES(5, 'Infos', 'icon_members.gif', '', '', '', '', 2, 'storytitle', '', '', '', 'on');
INSERT INTO `nuke_sommaire` VALUES(99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_sommaire_categories`
--

CREATE TABLE `nuke_sommaire_categories` (
  `id` int(11) NOT NULL auto_increment,
  `groupmenu` int(2) NOT NULL default '0',
  `module` varchar(50) NOT NULL default '',
  `url` text NOT NULL,
  `url_text` text NOT NULL,
  `image` varchar(50) NOT NULL default '',
  `new` char(2) default NULL,
  `new_days` tinyint(4) NOT NULL default '-1',
  `class` varchar(20) default NULL,
  `bold` char(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 ;

--
-- Dumping data for table `nuke_sommaire_categories`
--

INSERT INTO `nuke_sommaire_categories` VALUES(1, 1, 'Forums', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(2, 1, 'Private_Messages', '', '', 'tree-L.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(3, 2, 'News', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(4, 2, 'Topics', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(5, 2, 'Stories_Archive', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(6, 2, 'Submit_News', '', '', 'tree-L.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(7, 3, 'Downloads', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(8, 3, 'Web_Links', '', '', 'tree-L.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(9, 4, 'Content', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(10, 4, 'faq', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(11, 4, 'Top', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(12, 4, 'Reviews', '', '', 'tree-L.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(13, 5, 'Feedback', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(14, 5, 'Recommend_Us', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(15, 5, 'Statistics', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(16, 5, 'Search', '', '', 'tree-T.gif', '', 7, 'boxcontent', '');
INSERT INTO `nuke_sommaire_categories` VALUES(17, 5, 'Your_Account', '', '', 'tree-L.gif', '', 7, 'boxcontent', '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_stats_hour`
--

CREATE TABLE `nuke_stats_hour` (
  `year` smallint(6) NOT NULL default '0',
  `month` tinyint(4) NOT NULL default '0',
  `date` tinyint(4) NOT NULL default '0',
  `hour` tinyint(4) NOT NULL default '0',
  `hits` int(11) NOT NULL default '0'
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_stats_hour`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuke_stories`
--

CREATE TABLE `nuke_stories` (
  `sid` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `aid` varchar(25) NOT NULL default '',
  `title` varchar(80) default NULL,
  `time` datetime default NULL,
  `hometext` text,
  `bodytext` text NOT NULL,
  `comments` int(11) default '0',
  `counter` mediumint(8) unsigned default NULL,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(25) NOT NULL default '',
  `notes` text NOT NULL,
  `ihome` int(1) NOT NULL default '0',
  `alanguage` varchar(30) NOT NULL default '',
  `acomm` int(1) NOT NULL default '0',
  `haspoll` int(1) NOT NULL default '0',
  `pollID` int(10) NOT NULL default '0',
  `score` int(10) NOT NULL default '0',
  `ratings` int(10) NOT NULL default '0',
  `associated` text NOT NULL,
  `ticon` tinyint(1) NOT NULL default '0',
  `writes` TINYINT( 1 ) DEFAULT '1' NOT NULL,
  PRIMARY KEY  (`sid`),
  KEY `catid` (`catid`),
  KEY `counter` (`counter`),
  KEY `topic` (`topic`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_stories`
--

INSERT INTO `nuke_stories` VALUES(1, 0, 'admin', 'Welcome To Nuke-Evolution', '2005-07-02 10:38:28', 'Welcome to Nuke-Evolution.<br /><br />\r\n\r\nYou must now setup an admin account.  You can do this by <a href="admin.php">clicking here</a>.<br /><br /><br /><br />\r\n\r\n<b>NOTE:</b> You can remove this by going into the News Administration or by clicking the delete button below.\r\n', '', 0, 3, 0, 'admin', '', 0, '', 0, 0, 0, 0, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_stories_cat`
--

CREATE TABLE `nuke_stories_cat` (
  `catid` int(11) NOT NULL auto_increment,
  `title` varchar(20) NOT NULL default '',
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_stories_cat`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_subscriptions`
--

CREATE TABLE `nuke_subscriptions` (
  `id` int(10) NOT NULL auto_increment,
  `userid` int(10) NOT NULL default '0',
  `subscription_expire` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`,`userid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_subscriptions`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_teamspeak`
--

CREATE TABLE `nuke_teamspeak` (
  `tsip` varchar(100) NOT NULL default '',
  `tsport` varchar(100) NOT NULL default '',
  `tsqport` varchar(50) NOT NULL default '',
  `tsaway` varchar(50) NOT NULL default '',
  `active` varchar(50) NOT NULL default '',
  `undock` varchar(255) NOT NULL default '',
  `forbidden` varchar(255) NOT NULL default ''
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_teamspeak`
--

INSERT INTO `nuke_teamspeak` VALUES('111.111.111.111', '8767', '51234', '', '0', '1', '()[]{}');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_themes`
--
CREATE TABLE `nuke_themes` (
  `theme_name` varchar(100) NOT NULL default '',
  `groups` varchar(50) NOT NULL default '',
  `permissions` tinyint(2) NOT NULL default '1',
  `custom_name` varchar(100) NOT NULL default '',
  `active` tinyint(1) NOT NULL default '0',
  `theme_info` text NOT NULL default '',
  PRIMARY KEY  (`theme_name`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_themes`
--

INSERT INTO `nuke_themes` VALUES('chromo', '', 1, 'Chromo', 1, '');
INSERT INTO `nuke_themes` VALUES('ChromoWB', '', 1, 'ChromoWB', 1, '');
INSERT INTO `nuke_themes` VALUES('EvoXtreme', '', 1, 'EvoXtreme', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `nuke_topics`
--

CREATE TABLE `nuke_topics` (
  `topicid` int(3) NOT NULL auto_increment,
  `topicname` varchar(20) default NULL,
  `topicimage` varchar(100) default NULL,
  `topictext` varchar(40) default NULL,
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_topics`
--

INSERT INTO `nuke_topics` VALUES(1, 'evolution', 'phpnuke.gif', 'Nuke-Evolution', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_tutorials_categories`
--

CREATE TABLE `nuke_tutorials_categories` (
  `tc_id` int(11) NOT NULL auto_increment,
  `tc_title` varchar(50) NOT NULL default '',
  `tc_description` text NOT NULL,
  `parentid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`tc_id`),
  KEY `tc_id` (`tc_id`),
  KEY `tc_title` (`tc_title`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_tutorials_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_tutorials_config`
--

CREATE TABLE `nuke_tutorials_config` (
  `tutsperpage` tinyint(2) NOT NULL default '10',
  `hitsforpopular` varchar(5) NOT NULL default '5000',
  `toptutorials` tinyint(2) NOT NULL default '10',
  `anonwaitdays` tinyint(2) NOT NULL default '1',
  `anonweight` tinyint(2) NOT NULL default '10',
  `detailvotedecimal` tinyint(1) NOT NULL default '2',
  `mainvotedecimal` tinyint(1) NOT NULL default '1',
  `mostpoptutorials` tinyint(2) NOT NULL default '10',
  `tutorialvotemin` tinyint(3) NOT NULL default '25',
  `show_links_num` tinyint(1) NOT NULL default '0',
  `maxfavs` tinyint(2) NOT NULL default '10',
  `rightblocks` tinyint(1) NOT NULL default '1',
  `searchtutorials` tinyint(2) NOT NULL default '10',
  `submit_on` tinyint(1) NOT NULL default '1',
  `approve_on` tinyint(1) NOT NULL default '1'
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_tutorials_config`
--

INSERT INTO `nuke_tutorials_config` VALUES(10, '50', 10, 1, 10, 2, 1, 10, 25, 1, 10, 1, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_tutorials_favorites`
--

CREATE TABLE `nuke_tutorials_favorites` (
  `fav_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `t_id` int(11) NOT NULL default '0',
  `showlist` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`fav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_tutorials_favorites`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_tutorials_levels`
--

CREATE TABLE `nuke_tutorials_levels` (
  `sid` int(10) NOT NULL auto_increment,
  `title` varchar(60) NOT NULL default '',
  `weight` int(10) NOT NULL default '1',
  PRIMARY KEY  (`sid`),
  KEY `title` (`title`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_tutorials_levels`
--

INSERT INTO `nuke_tutorials_levels` VALUES(2, 'Easy', 1);
INSERT INTO `nuke_tutorials_levels` VALUES(3, 'Intermediate', 2);
INSERT INTO `nuke_tutorials_levels` VALUES(4, 'Difficult', 3);
INSERT INTO `nuke_tutorials_levels` VALUES(5, 'Advanced', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nuke_tutorials_submit`
--

CREATE TABLE `nuke_tutorials_submit` (
  `t_submitid` int(10) NOT NULL auto_increment,
  `tc_id` int(10) NOT NULL default '0',
  `t_title` varchar(255) NOT NULL default '',
  `t_text` longtext NOT NULL,
  `t_submitdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `t_counter` int(10) NOT NULL default '0',
  `version` varchar(10) NOT NULL default '',
  `description` text NOT NULL,
  `tutorialsratingsummary` double(6,4) NOT NULL default '0.0000',
  `author` varchar(60) NOT NULL default '',
  `author_email` varchar(60) NOT NULL default '0',
  `author_homepage` varchar(200) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `totalvotes` int(11) NOT NULL default '0',
  `totalcomments` int(11) NOT NULL default '0',
  `bbcode_uid` varchar(10) default NULL,
  `level` varchar(30) default NULL,
  PRIMARY KEY  (`t_submitid`),
  KEY `t_submitid` (`t_submitid`),
  KEY `tc_id` (`tc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_tutorials_submit`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_tutorials_tutorials`
--

CREATE TABLE `nuke_tutorials_tutorials` (
  `t_id` int(10) NOT NULL auto_increment,
  `tc_id` int(10) NOT NULL default '0',
  `t_title` varchar(255) NOT NULL default '',
  `t_text` longtext NOT NULL,
  `t_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `t_counter` int(10) NOT NULL default '0',
  `version` varchar(10) NOT NULL default '',
  `description` text NOT NULL,
  `tutorialsratingsummary` double(6,4) NOT NULL default '0.0000',
  `author` varchar(60) NOT NULL default '',
  `author_email` varchar(60) NOT NULL default '0',
  `author_homepage` varchar(200) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `totalvotes` int(11) NOT NULL default '0',
  `totalcomments` int(11) NOT NULL default '0',
  `bbcode_uid` varchar(10) default NULL,
  `level` varchar(30) default NULL,
  PRIMARY KEY  (`t_id`),
  KEY `t_id` (`t_id`),
  KEY `tc_id` (`tc_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_tutorials_tutorials`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_tutorials_votedata`
--

CREATE TABLE `nuke_tutorials_votedata` (
  `ratingdbid` int(11) NOT NULL auto_increment,
  `ratinglid` int(11) NOT NULL default '0',
  `ratinguser` varchar(60) NOT NULL default '',
  `rating` int(11) NOT NULL default '0',
  `ratinghostname` varchar(60) NOT NULL default '',
  `ratingcomments` text NOT NULL,
  `ratingtimestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ratingdbid`),
  KEY `ratingdbid` (`ratingdbid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nuke_tutorials_votedata`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_users`
--

CREATE TABLE `nuke_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `username` varchar(25) NOT NULL default '',
  `user_email` varchar(255) NOT NULL default '',
  `femail` varchar(255) NOT NULL default '',
  `user_website` varchar(255) NOT NULL default '',
  `user_avatar` varchar(255) NOT NULL default '',
  `user_regdate` varchar(20) NOT NULL default '',
  `user_icq` varchar(15) default NULL,
  `user_occ` varchar(100) default NULL,
  `user_from` varchar(100) default NULL,
  `user_from_flag` varchar(25) default NULL,
  `user_interests` varchar(150) NOT NULL default '',
  `user_sig` text,
  `user_viewemail` tinyint(2) default NULL,
  `user_theme` int(3) default NULL,
  `user_aim` varchar(255) default NULL,
  `user_yim` varchar(255) default NULL,
  `user_msnm` varchar(255) default NULL,
  `user_facebook` varchar(255) default NULL,
  `user_myspace` varchar(255) default NULL,
  `user_password` varchar(40) NOT NULL default '',
  `storynum` tinyint(4) NOT NULL default '10',
  `umode` varchar(10) NOT NULL default '',
  `uorder` tinyint(1) NOT NULL default '0',
  `thold` tinyint(1) NOT NULL default '0',
  `noscore` tinyint(1) NOT NULL default '0',
  `bio` tinytext NULL,
  `ublockon` tinyint(1) NOT NULL default '0',
  `ublock` tinytext NULL,
  `theme` varchar(255) NOT NULL default '',
  `commentmax` int(11) NOT NULL default '4096',
  `counter` int(11) NOT NULL default '0',
  `newsletter` int(1) NOT NULL default '0',
  `user_posts` int(10) NOT NULL default '0',
  `user_attachsig` int(2) NOT NULL default '1',
  `user_rank` int(10) NOT NULL default '0',
  `user_level` int(10) NOT NULL default '1',
  `broadcast` tinyint(1) NOT NULL default '1',
  `popmeson` tinyint(1) NOT NULL default '0',
  `user_active` tinyint(1) default '1',
  `user_session_time` int(11) NOT NULL default '0',
  `user_session_page` smallint(5) NOT NULL default '0',
  `user_lastvisit` int(11) NOT NULL default '0',
  `user_timezone` decimal(5,2) NOT NULL default '0.00',
  `user_style` tinyint(4) default NULL,
  `user_lang` varchar(255) NOT NULL default 'english',
  `user_dateformat` varchar(14) NOT NULL default 'D M d, Y g:i a',
  `user_new_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_unread_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_last_privmsg` int(11) NOT NULL default '0',
  `user_emailtime` int(11) default NULL,
  `user_allowhtml` tinyint(1) default '1',
  `user_allowbbcode` tinyint(1) default '1',
  `user_allowsmile` tinyint(1) default '1',
  `user_allowavatar` tinyint(1) NOT NULL default '1',
  `user_allow_pm` tinyint(1) NOT NULL default '1',
  `user_allow_mass_pm` tinyint(1) default '4',
  `user_allow_viewonline` tinyint(1) NOT NULL default '1',
  `user_notify` tinyint(1) NOT NULL default '0',
  `user_notify_pm` tinyint(1) NOT NULL default '1',
  `user_popup_pm` tinyint(1) NOT NULL default '1',
  `user_avatar_type` tinyint(4) NOT NULL default '3',
  `user_sig_bbcode_uid` varchar(10) default NULL,
  `user_actkey` varchar(32) default NULL,
  `user_newpasswd` varchar(32) default NULL,
  `points` int(10) default '0',
  `last_ip` varchar(15) NOT NULL default '0',
  `user_wordwrap` smallint(3) NOT NULL default '70',
  `agreedtos` tinyint(1) NOT NULL default '0',
  `user_allowsignature` tinyint(4) NOT NULL default '1',
  `user_report_optout` tinyint(1) DEFAULT '0' NOT NULL,
  `user_show_quickreply` tinyint(1) NOT NULL default '1',
  `user_quickreply_mode` tinyint(1) NOT NULL default '1',
  `user_color_gc` varchar(6) default '',
  `user_color_gi` text,
  `user_showavatars` tinyint(1) default '1',
  `user_showsignatures` tinyint(1) default '1',
  `user_time_mode` tinyint(4) NOT NULL default '6',
  `user_dst_time_lag` tinyint(4) NOT NULL default '60',
  `user_pc_timeOffsets` varchar(11) NOT NULL default '0',
  `user_view_log` tinyint(4) NOT NULL default '0',
  `user_glance_show` varchar(255) NOT NULL default '1',
  `user_hide_images` tinyint(2) NOT NULL default '0',
  `user_open_quickreply` TINYINT(1) DEFAULT '1' NOT NULL,
  `xdata_bbcode` VARCHAR(10),
  `user_ftr` smallint(1) NOT NULL default '0',
  `user_ftr_time` int(10) NOT NULL default '0',
  `user_rank2` int(11) default '-1',
  `user_rank3` int(11) default '-2',
  `user_rank4` int(11) default '-2',
  `user_rank5` int(11) default '-2',
  `user_gender` tinyint(4) NOT NULL default '0',
  `user_birthday` int(8) NOT NULL default '0',
  `user_birthday2` int(8) default NULL,
  `birthday_display` tinyint(1) NOT NULL default '0',
  `birthday_greeting` tinyint(1) NOT NULL default '0',
  `user_next_birthday` smallint(4) NOT NULL default '0',
  `user_reputation` float NOT NULL default '0',
  `user_rep_last_time` int(11) NOT NULL,
  `user_admin_notes` text NOT NULL,
  `user_allow_arcadepm` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  KEY `uname` (`username`),
  KEY `user_session_time` (`user_session_time`),
  KEY `user_birthday` (`user_birthday`),
  KEY `user_birthday2` (`user_birthday2`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nuke_users`
--

INSERT INTO `nuke_users` VALUES(1, '', 'Anonymous', '', '', '', 'blank.gif', 'Nov 04, 2005', '', '', '', NULL, '', '', 0, 0, '', '', '', NULL, NULL, '', 10, '', 0, 0, 0, '', 0, '', '', 4096, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, '10.00', NULL, 'english', 'D M d, Y g:i a', 0, 0, 0, NULL, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 3, NULL, NULL, NULL, 0, '0', 70, 0, 0, 0, 0, 0, '', '', 1, 1, 6, 60, '0', 0, '1', 0, 1, '', 0, 0, -1, -2, -2, -2, 0, 0, NULL, 0, 0, 0, 43.2825, 1243272322, '', 1);
-- --------------------------------------------------------

--
-- Table structure for table `nuke_users_temp`
--

CREATE TABLE `nuke_users_temp` (
  `user_id` int(10) NOT NULL auto_increment,
  `username` varchar(25) NOT NULL default '',
  `user_email` varchar(255) NOT NULL default '',
  `user_password` varchar(40) NOT NULL default '',
  `user_regdate` varchar(20) NOT NULL default '',
  `check_num` varchar(50) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `realname` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_users_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_welcome_pm`
--

CREATE TABLE `nuke_welcome_pm` (
  `subject` varchar(30) NOT NULL default '',
  `msg` text NOT NULL,
  PRIMARY KEY  (`subject`)
) ENGINE=MyISAM;

--
-- Dumping data for table `nuke_welcome_pm`
--


-- --------------------------------------------------------

--
-- Table structure for table `nuke_whoiswhere`
--

CREATE TABLE `nuke_whoiswhere` (
  `username` varchar(25) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `host_addr` varchar(48) NOT NULL default '',
  `guest` int(1) NOT NULL default '0',
  `module` varchar(30) NOT NULL default '',
  `url` varchar(255) NOT NULL default ''
) ENGINE=MyISAM;
