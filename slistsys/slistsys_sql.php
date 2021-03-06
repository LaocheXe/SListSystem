<?php exit; /*?>
CREATE TABLE IF NOT EXISTS `serverlist` (
  `server_id` int(10) NOT NULL AUTO_INCREMENT,
  `servercat_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `server_name` varchar(250) NOT NULL default '',
  `server_ip` text,
  `server_port` text,
  `server_pass` text,
  `server_gsid` text,
  `server_enable_vcc` int(12) unsigned NOT NULL,
  `server_viewer_cc` text,
  PRIMARY KEY (`server_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `serverlist_cat` (
  `scat_id` int(10) NOT NULL AUTO_INCREMENT,
  `scat_name` varchar(250) NOT NULL default '',
  PRIMARY KEY (`scat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `serverlist_submission` (
  `submit_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_game` varchar(250) NOT NULL default '',
  `s_ip` text,
  `s_port` text,
  `s_pass` text,
  `s_gsid` text,
  PRIMARY KEY (`submit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1;
*/

// NOTE: Make It Simple - Use Voice_sql.php as stepping stone - eXe 05-07-2020
?>

CREATE TABLE IF NOT EXISTS `server_list` (
  `server_id` int(10) NOT NULL AUTO_INCREMENT,
  `server_name` varchar(128) NOT NULL,
  `server_type` varchar(128) DEFAULT NULL,
  `server_ip` varchar(128) NOT NULL,
  `server_port` int(12) unsigned NOT NULL,
  `server_password` varchar(255) DEFAULT NULL,
  `server_qport` int(12) unsigned DEFAULT NULL,
  `server_qname` varchar(255) DEFAULT NULL,
  `server_qpass` varchar(255) DEFAULT NULL,
  `server_enable_gq` int(12) unsigned NOT NULL,
  `server_enable_sc` int(12) unsigned NOT NULL,
  `server_sc` text,
  `server_enable_vc` int(12) unsigned NOT NULL,
  `server_viewer_cc` text,
  `server_sef` varchar(250) default NULL,
  PRIMARY KEY (`server_id`)
) ENGINE=MyISAM;