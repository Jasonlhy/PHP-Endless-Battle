<?
//----------------------------------//
//--- Database Installation Unit ---//
//----------------------------------//
//--- v2Alliance Official Version---//
//-----------   v0.30   ------------//
//----------------------------------//
//----- Official Database ver6 -----//
//----------------------------------//
include_once('cfu.php');

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_chat` (
  `c_id` mediumint(8) unsigned NOT NULL auto_increment,
  `c_user` varchar(16) NOT NULL default '',
  `c_time` int(10) NOT NULL default '0',
  `c_msg` text NOT NULL,
  `c_type` tinyint(1) NOT NULL default '0',
  `c_tar` varchar(16) NOT NULL default '',
  PRIMARY KEY  (`c_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_game_history` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `time` int(10) unsigned NOT NULL default '0',
  `history` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_regkeys` (
  `regkey` varchar(10) NOT NULL default '',
  `username` varchar(16) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `ip` text NOT NULL,
  `id` varchar(10) NOT NULL default '0',
  `email` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`regkey`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` (
  `id` varchar(4) NOT NULL default '',
  `name` varchar(12) NOT NULL default '',
  `typelv` tinyint(2) NOT NULL default '0',
  `atf` tinyint(2) NOT NULL default '0',
  `def` tinyint(2) NOT NULL default '0',
  `ref` tinyint(2) NOT NULL default '0',
  `taf` tinyint(2) NOT NULL default '0'
) TYPE=MyISAM;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat1', '�@��', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat2', '�@��', 2, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat3', '�@��', 3, 2, 2, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat4', '�@��', 4, 3, 3, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat5', '�@��', 5, 3, 4, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat6', '�@��', 6, 4, 4, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat7', '�@��', 7, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat8', '�@��', 8, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nat9', '�@��', 9, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('natx', '�@��', 10, 4, 5, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh1', '�j�ƤH��Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh2', '�j�ƤH��Lv2', 2, 1, 0, 0, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh3', '�j�ƤH��Lv3', 3, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh4', '�j�ƤH��Lv4', 4, 1, 2, 1, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh5', '�j�ƤH��Lv5', 5, 2, 3, 1, 4);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh6', '�j�ƤH��Lv6', 6, 3, 3, 2, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh7', '�j�ƤH��Lv7', 7, 4, 3, 3, 7);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh8', '�j�ƤH��Lv8', 8, 5, 4, 3, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enh9', '�j�ƤH��Lv9', 9, 5, 4, 5, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('enhx', '�j�ƤH��LvX', 10, 6, 4, 5, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext1', 'Extended Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext2', 'Extended Lv2', 2, 2, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext3', 'Extended Lv3', 3, 3, 0, 1, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext4', 'Extended Lv4', 4, 5, 0, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext5', 'Extended Lv5', 5, 7, 1, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext6', 'Extended Lv6', 6, 9, 1, 6, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext7', 'Extended Lv7', 7, 10, 1, 7, 4);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext8', 'Extended Lv8', 8, 10, 1, 8, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('ext9', 'Extended Lv9', 9, 10, 1, 8, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('extx', 'Extended LvX', 10, 10, 1, 8, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy1', '���ʤO Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy2', '���ʤO Lv2', 2, 0, 1, 1, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy3', '���ʤO Lv3', 3, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy4', '���ʤO Lv4', 4, 1, 2, 2, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy5', '���ʤO Lv5', 5, 2, 4, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy6', '���ʤO Lv6', 6, 5, 8, 3, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy7', '���ʤO Lv7', 7, 7, 10, 3, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy8', '���ʤO Lv8', 8, 9, 11, 4, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psy9', '���ʤO Lv9', 9, 10, 12, 4, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('psyx', '���ʤO LvX', 10, 10, 13, 4, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt1', 'New Type Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt2', 'New Type Lv2', 2, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt3', 'New Type Lv3', 3, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt4', 'New Type Lv4', 4, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt5', 'New Type Lv5', 5, 1, 1, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt6', 'New Type Lv6', 6, 2, 2, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt7', 'New Type Lv7', 7, 3, 3, 3, 3);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt8', 'New Type Lv8', 8, 7, 3, 7, 7);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt9', 'New Type Lv9', 9, 10, 3, 11, 11);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('nt10', 'New Type LvX', 10, 12, 3, 13, 12);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co1', 'CO Lv1', 1, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co2', 'CO Lv2', 2, 0, 0, 0, 0);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co3', 'CO Lv3', 3, 0, 0, 0, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co4', 'CO Lv4', 4, 0, 0, 1, 1);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co5', 'CO Lv5', 5, 1, 1, 2, 2);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co6', 'CO Lv6', 6, 2, 2, 4, 4);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co7', 'CO Lv7', 7, 4, 4, 6, 6);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co8', 'CO Lv8', 8, 7, 7, 10, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co9', 'CO Lv9', 9, 10, 10, 13, 8);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` VALUES ('co10', 'CO LvX', 10, 13, 10, 14, 8);");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_map` (
  `map_id` varchar(4) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  `occprice` int(10) NOT NULL default '0',
  `hpmax` int(8) NOT NULL default '100000',
  `at` tinyint(3) NOT NULL default '10',
  `de` tinyint(3) NOT NULL default '10',
  `ta` tinyint(3) NOT NULL default '10',
  `wepa` varchar(32) NOT NULL default 'FortWepA',
  `movement` text NOT NULL,
  PRIMARY KEY  (`map_id`)
) TYPE=MyISAM;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('A1', 0, 500000, 100000, 10, 10, 10, 'FortWepA', 'A2\r\nB1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('A2', 0, 500000, 100000, 10, 10, 10, 'FortWepA', 'A1\r\nA3\r\nB2');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('A3', 0, 500000, 100000, 10, 10, 10, 'FortWepA', 'A2\r\nB3');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('B1', 3, 2500000, 200000, 25, 20, 20, 'FortWepB', 'A1\r\nB2\r\nC1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('B2', 0, 10000000, 500000, 50, 50, 50, 'FortWepC', 'A2\r\nB1\r\nB3\r\nC2');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('B3', 3, 2500000, 200000, 25, 20, 20, 'FortWepB', 'A3\r\nB2\r\nC3');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('C1', 5, 7500000, 400000, 45, 40, 40, 'FortWepC', 'C2\r\nB1');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('C2', 3, 2500000, 200000, 25, 20, 20, 'FortWepB', 'C1\r\nC3\r\nB2');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_map` VALUES ('C3', 4, 7500000, 350000, 40, 30, 30, 'FortWepD', 'C2\r\nB3');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_ms` (
  `id` varchar(12) NOT NULL default '',
  `msname` varchar(24) NOT NULL default '',
  `price` int(10) NOT NULL default '0',
  `atf` tinyint(3) NOT NULL default '0',
  `def` tinyint(3) NOT NULL default '0',
  `ref` tinyint(3) NOT NULL default '0',
  `taf` tinyint(3) NOT NULL default '0',
  `hpfix` mediumint(6) NOT NULL default '0',
  `enfix` mediumint(6) NOT NULL default '0',
  `hprec` decimal(5,3) NOT NULL default '0.000',
  `enrec` decimal(5,3) NOT NULL default '0.000',
  `spec` varchar(20) NOT NULL default '',
  `needlv` tinyint(3) NOT NULL default '0',
  `image` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('0', 'No Unit', 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, '', 0, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('1', 'G - Cannon', 575000, 6, 4, 4, 5, 2750, 125, 21.000, 1.785, '', 8, '1/gcannon.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('2', 'Gottrlatan', 7450000, 16, 12, 15, 17, 4200, 225, 36.500, 4.240, '', 65, '1/gotoratan.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('3', 'K&auml;mpfer', 1975000, 9, 5, 7, 9, 3750, 150, 29.500, 2.750, '', 20, '1/kenpufa.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('4', 'Gundam Alex', 1950000, 7, 8, 8, 8, 4000, 175, 31.500, 2.916, '', 16, '2/alex.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('5', 'EZ-8', 1600000, 8, 7, 6, 6, 3500, 160, 27.500, 2.807, '', 16, '2/ez8.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('6', 'Gundam', 1675000, 7, 7, 7, 7, 3800, 150, 30.000, 2.530, '', 16, '2/gundam.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('7', 'Apsalus III', 3150000, 13, 11, 1, 6, 5500, 250, 39.500, 0.023, '', 25, '2/apusarasu.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('8', 'Elmeth', 2250000, 10, 6, 8, 10, 5000, 200, 37.500, 3.270, '', 20, '2/erumesu.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('9', 'Aegis Gundam', 4650000, 13, 8, 15, 9, 5500, 275, 45.000, 4.365, 'SeedMode,', 35, '3/ageis.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('10', 'Strike Gundam', 4150000, 9, 7, 16, 14, 5000, 250, 40.000, 4.000, 'SeedMode,', 30, '3/ailestrike.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('13', 'Astray Gundam Blue Frame', 3625000, 10, 8, 13, 11, 5000, 225, 40.500, 3.600, 'SeedMode,', 25, '3/blueframe.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('14', 'Astray Gundam Red Frame', 3675000, 13, 8, 11, 10, 5000, 250, 40.500, 3.950, 'SeedMode,', 25, '3/redframe.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('11', 'Sword Strike', 4050000, 13, 6, 11, 13, 5500, 250, 44.000, 4.000, 'SeedMode,', 30, '3/swordstrike.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('12', 'Strike Rouge', 3900000, 8, 6, 14, 12, 5500, 250, 45.000, 4.000, 'SeedMode,', 30, '3/strikerouge.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('15', 'Crossbone X1', 5250000, 14, 10, 15, 15, 5500, 275, 42.000, 4.500, '', 45, '3/crossbonex1.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('16', 'Crossbone X2', 5475000, 15, 10, 14, 14, 5750, 275, 44.000, 4.600, '', 45, '3/crossbonex2.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('17', 'Gundam F91', 4575000, 15, 6, 20, 14, 4500, 250, 34.000, 4.237, '', 35, '3/f91.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('18', 'Z Gundam', 4925000, 14, 8, 17, 13, 4750, 250, 37.000, 4.545, '', 40, '3/z.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('19', '&#8704; Gundam', 5555000, 14, 12, 15, 12, 5500, 275, 0.008, 0.016, '', 50, '4/turna.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('20', 'Turn X', 5725000, 16, 13, 13, 13, 5500, 275, 0.008, 0.016, '', 50, '4/turnx.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('21', 'Gundam Epyon', 6375000, 16, 7, 16, 12, 5500, 275, 45.000, 5.000, '', 60, '4/epion.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('22', 'The - O', 5525000, 14, 18, 7, 15, 6000, 275, 45.000, 4.583, '', 50, '4/jio.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('23', 'Gundam ZZ', 5675000, 16, 12, 12, 13, 5500, 295, 45.000, 4.300, '', 50, '4/zz.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('24', 'Qubeley', 5250000, 16, 7, 16, 17, 5000, 275, 37.500, 4.750, '', 45, '4/kyuberei.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('25', 'Neue Ziel', 16000000, 21, 20, 18, 20, 6750, 400, 54.000, 7.000, '', 75, '5/noie.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('26', 'GP03D', 17000000, 23, 25, 15, 17, 7000, 425, 57.000, 7.000, '', 80, '5/GP03D.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('27', 'Gundam DX', 5800000, 19, 9, 11, 13, 5500, 325, 45.000, 5.000, '', 60, '5/dx.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('28', 'Vasago Gundam', 8100000, 17, 9, 17, 6, 5300, 300, 42.500, 5.400, '', 65, '5/vasago.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('29', 'V2-Assualt Buster Gundam', 8400000, 17, 12, 18, 15, 5500, 325, 45.000, 5.500, '', 70, '5/v2assult.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('30', 'Master Gundam', 7325000, 20, 5, 17, 25, 5000, 250, 39.500, 4.100, '', 65, '5/master.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('31', 'Freedom Gundam', 13000000, 18, 12, 20, 22, 6000, 350, 50.000, 0.018, 'SeedMode,', 75, '6/freedom.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('32', 'Justice Gundam', 11100000, 17, 13, 17, 18, 6000, 350, 50.000, 0.018, 'SeedMode,', 70, '6/justice.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('33', 'Wing Gundam Zero-Custom', 8600000, 18, 14, 20, 12, 6000, 325, 48.000, 5.250, '', 70, '6/wing0custom.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('34', 'G Gundam', 6600000, 24, 5, 14, 20, 5000, 250, 39.500, 4.100, '', 60, '6/god.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('35', 'Hi - �h Gundam', 15100000, 20, 12, 20, 30, 6250, 300, 52.500, 5.000, '', 75, '7/hiv.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('36', 'Nightingale', 15000000, 22, 10, 27, 23, 6000, 325, 52.500, 5.000, '', 75, '7/naitingeru.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('37', 'Freedom Gundam METEOR', 29500000, 25, 17, 25, 27, 7500, 500, 60.000, 0.020, 'SeedMode,', 85, '7/freedom_meteor.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('38', 'Providence Gundam', 19250000, 30, 10, 10, 30, 6500, 400, 56.000, 0.019, 'SeedMode,', 80, '7/providensu.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('39', 'Magella Attack', 200000, 2, 1, 0, 2, 1400, 75, 10.779, 1.062, '', 1, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('40', 'Type-61 Tank', 200000, 2, 1, 1, 1, 1450, 70, 11.100, 1.000, '', 1, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('41', 'Ball', 200000, 2, 0, 1, 2, 1400, 75, 10.725, 1.071, '', 1, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('42', 'Leo', 450000, 2, 2, 2, 4, 2500, 90, 20.000, 1.300, '', 5, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('43', 'GM', 500000, 2, 3, 3, 2, 2650, 100, 21.000, 1.500, '', 5, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('44', 'Zaku II-FZ', 550000, 5, 3, 3, 4, 2750, 120, 21.000, 1.800, '', 5, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('45', 'NT Test GM', 850000, 6, 5, 6, 9, 3000, 135, 23.300, 1.820, '', 12, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('46', 'Gelgoog JG', 1500000, 8, 4, 5, 12, 3700, 160, 28.500, 2.600, '', 12, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('47', 'Gouf', 1750000, 9, 4, 7, 8, 3750, 175, 30.000, 2.916, '', 16, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('48', 'D Gundam First', 2050000, 12, 5, 10, 7, 3800, 170, 30.000, 2.800, '', 20, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('49', 'Efeet Custom', 2475000, 12, 6, 12, 10, 3750, 200, 30.000, 3.100, 'EXAMSystem,', 20, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('50', 'Blue Destiny-03', 4800000, 13, 10, 15, 13, 4500, 225, 37.189, 3.688, 'EXAMSystem', 40, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('51', 'S Gundam', 4000000, 12, 8, 11, 14, 4250, 250, 36.000, 3.975, '', 30, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('52', 'Zeku Zwei', 4350000, 10, 10, 13, 14, 5000, 250, 41.000, 3.900, '', 35, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('53', 'Gerbera Tetra', 4400000, 12, 11, 14, 14, 4250, 180, 36.600, 2.800, '', 35, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('54', 'Hyaku-Shiki', 4675000, 12, 8, 13, 14, 4750, 225, 40.598, 3.750, '', 40, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('55', 'Neo Gundam', 5000000, 16, 10, 14, 13, 5000, 275, 39.000, 4.500, '', 40, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('56', 'Doven Wolf', 5075000, 14, 10, 12, 13, 6000, 250, 47.500, 4.000, '', 40, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('57', 'Tallgeese III', 6750000, 17, 13, 17, 17, 4750, 275, 37.500, 4.500, '', 65, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('58', 'Big Zam', 8450000, 17, 20, 7, 11, 7000, 300, 59.000, 4.858, '', 70, 'other/bigzam.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('59', 'Devil Gundam', 32666666, 30, 22, 10, 25, 8000, 450, 0.009, 0.020, '', 85, 'other/devil.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('61', 'GM Cannon II', 1050000, 7, 8, 6, 7, 3300, 155, 26.720, 2.460, '', 12, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('60', 'Masarai', 560000, 4, 4, 4, 4, 3000, 100, 24.000, 1.538, '', 8, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('62', 'GunTank', 625000, 6, 6, 2, 4, 3500, 150, 26.900, 2.459, '', 8, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('63', 'Asshimar', 685000, 8, 4, 7, 4, 3100, 125, 25.000, 2.016, '', 12, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('64', 'FA Alex', 2150000, 6, 10, 7, 8, 4500, 175, 35.156, 2.822, '', 20, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('65', 'Gundam Mk-II', 2750000, 12, 7, 10, 13, 4200, 235, 33.600, 3.507, '', 25, 'none.gif');");


mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` (
  `tact_id` varchar(12) NOT NULL default '0',
  `wep_id` varchar(16) NOT NULL default '0',
  `grade` tinyint(2) NOT NULL default '1',
  `directions` text NOT NULL,
  `m1` varchar(16) NOT NULL default '',
  `m2` varchar(16) NOT NULL default '',
  `m3` varchar(16) default NULL,
  `m4` varchar(16) default NULL,
  `m5` varchar(16) default NULL,
  `m6` varchar(16) default NULL,
  `m7` varchar(16) default NULL,
  `m8` varchar(16) default NULL,
  `m9` varchar(16) default NULL,
  `m10` varchar(16) default NULL,
  `m11` varchar(16) default NULL,
  `m12` varchar(16) default NULL,
  `m13` varchar(16) default NULL,
  `m14` varchar(16) default NULL,
  `m15` varchar(16) default NULL,
  `m16` varchar(16) default NULL,
  `m17` varchar(16) default NULL,
  `m18` varchar(16) default NULL,
  `m19` varchar(16) default NULL,
  `m20` varchar(16) default NULL,
  PRIMARY KEY  (`tact_id`)
) TYPE=MyISAM;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('0', '901', 10, 'G-bit�ìP�L�i��q��<br>���F�@�Ѹ��A�{�l�j���F�A�A�@ť�줽�|���K�O����N���ġA�i�O�Q�a�W���Ѳ̭ˤF......<br>��ӬO�@�����ª���O�A���e�����}�H�G<br>�Q����Q�Ƥ䥨�������O�q���o��j�I�~�M�F���F�@�n��A�ڵL�צp��A���ܤ�q���n��oG-bit�ìP�L�i��q�������......<br>���å�i�u�M���A�{�bG-bit�ìP�L�i��q������Ƥw���A�L�w�g�S������Q�λ��ȤF......ű�y��k�G�M��ڷQ��������G<br>�u�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ìP�L�i��q��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ìP�L�i��q��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buster&nbsp;Beam&nbsp;Rifle<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Z�������[�A��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�������[�A��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���̥[�ɤl��<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>���L�A���ӥi�Hű�y����?.....�v��O�즹����<br>', '974', '993', '962', '616', '619', '608', '718', '718', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('1', '902', 10, '�ѤW�ѤU�����z�H�C<br>�A�֦����ʤO�ܡH�p�G�S���A�A�O����ϥΥH�U�Z�����I<br>�ѤW�ѤU�����z�H�C�A�O�ѤW�ѤU�L�ļC������Z���A��O��b�䤧�W�A���P�ˬO�@��ݭn�r�p�����׶����κ믫�����ʤO�s�y���@��C<br>�ӥB�������z�H���O�q�A�¤O��H<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѤW�ѤU�L�ļC<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѤW�ѤU���ʯ}�H�C<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѤW�ѤU���ʯ}�H�C<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�j�������C<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�j�������C<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '983', '314', '314', '932', '932', '309', '309', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('2', '903', 10, '�Y�h��<br>�b�A���e���O�@��L�P�ۤ񪺪Z��<br>���֦��W���������O�M�g�{�A�B�@��z�M�¬}���ۦ��A�i�H�N���ʤJ����Ŷ��A����ް_�ؼЦۨ������O�~��A�i�ӯ}�a��ۨ����c<br>���N�O�w�w�Y�h���C�A�O�Q�o�쥦�a�H�����A���ۡI�o�N�O�s�y�Y�h�������ƦC��G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ìP�L�i��q��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ޤO�l�B�jBST<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ޤO�l�B�jBST<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ʯ�ӷǨt��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ĩ���<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̥[���i��<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>', '974', '952', '952', '965', '610', '618', '613', '613', '718', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('3', '904', 10, '�����l<br>�Ať�D�@�줽�|�����b���G�ơA��O�A���L�h�G<br>�u�N�O�W�P���o�ͪ��ơI�A���D�ڬݨ�F�ƻ�H�O�@���|�o�����p���v<br>�ݲ��H����Y���w�A�L�S���U�h�A<br>�u���ڡA���ä��O�ƻ�o���j�Q�A���O�@�����b�ϥΥ����l��MS�A�ӭ��檺��V���O�T����j�I<br>�N�b�o�p�^�U�v���@��A�T����j�Q�����F����A�~���z���I�v<br>�����|��������?�ϩ��ݱo�X�����A�M��ĤF�@�f��A���W�o���������A�{�u�����G<br>�u�ҥH�A���Ѥp�̧Ʊ�P�j�a���ɥ����l��ű�y��k�A�u�ݲ{��......�v<br>�i���A�L�A���}�������ɭԡA�H�̳����F�A�A�o�����w�C���w�����}<br>�����|�����H�o����������ۧA�������A�D�G<br>�u�S�̡A�A���B�F�I�A���ʶR�����lű�y��k�����|�F�I�v<br>�A�S���n�N������L�@�f�n�N�A�u�n���X���A�ʶR�����l��ű�y��k<br>�L�٧A�@�ӷP�E�������A���e�W�@�i�ȡA�g�ۥ����l��ű�y��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�I������������<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�j�������C<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�j�������C<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HiMAT&nbsp;System<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '310', '309', '309', '998', '718', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('4', '905', 10, '�¬}��<br>�ھK�ߩ��s�̱j�������Z���A�o�{�¬}�����ٳ̱j<br>�¬}�����򥻭�z�O�o�g�X�@�ӷ��j����q�ΡA�R���ؼФ���}�l���O�~��ò��ͤ@�Ӷ¬}�N�ؼЧl�J�䤤�A<br>�Q�l�i�¬}���u���@�ӫ�G�A�N�O���`�C<br>�s�y�¬}���O�@��²�檺�u�@�A�@���p�ߥi��|�Q�¬}�l�J�A�~�˦ۤv�C�o�O�ڸg�L������s��A�¬}���i�઺�s�@��k�J<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̥[���i��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�������[�A��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���̥[�ɤl��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;280mm�y�D�[�A��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W���O�y�D�j<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '618', '619', '608', '410', '409', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('5', '906', 10, 'Solar&nbsp;panel<br>�b���|�����R�����A�@�Ӥf�p���Ϫ��k�H�A����ӥߡA���ӬO���|�������@�A��O�A���F�L�h�A���X�@�c�r���A<br>�åH�K�X���q�G�uBbm&nbsp;zpt&nbsp;udmk&nbsp;nd&nbsp;tnndugjmh&nbsp;zcnvs&nbsp;ugbs?�v<br>���|�������O�~�F�@���A�M��I�I���U�ϸ��G�unl�A�ڥi�a�����A�Y������´���u�{�v�p�P��Ǯa�A<br>�X�O��s�F�@�ط|�۰ʦ^�_EN�����ơ�Solar&nbsp;panel<br>�g�L�ڭ̪��J�Ӫ��լd�A�w��o������ơG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�Q�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E&nbsp;-&nbsp;cap�v<br>', '711', '712', '715', '718', '718', '715', '712', '711', '711', '712', '715', '718', '999', NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('6', '907', 10, 'NANO&nbsp;Skin<br>�b���|�����R�����A�@�Ӥf�p���Ϫ��k�H�A����ӥߡA���ӬO���|�������@�A��O�A���F�L�h�A���X�@�c�r���A<br>�åH�K�X���q�G�uBbm&nbsp;zpt&nbsp;udmk&nbsp;nd&nbsp;tnndugjmh&nbsp;zcnvs&nbsp;ugbs?�v<br>���|�������O�~�F�@���A�M��I�I���U�ϸ��G�unl�A�ڥi�a�����A�Y������´���u�{�v�p�P��Ǯa�A<br>�X�O��s�F�@�ط|�۰ʦ^�_HP�����ơ�NANO&nbsp;Skin<br>�g�L�ڭ̪��J�Ӫ��լd�A�w��o������ơG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�Q�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;<br>�Q�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�w���˥�<br>�Q�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�X��Z�˥ҡv<br>', '711', '712', '715', '718', '718', '715', '712', '711', '711', '712', '715', '718', '957', '989', NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('7', '908', 10, 'Z�DO�DArmor<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡ�Z�DO�DArmor�A���O�@�ئX���˥ҡA�ø��W�X��Z�˥Ҧ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�X��Z�˥�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�X��Z�˥�<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���F���i�X���˥�<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���F���i�X���˥�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥ҡv<br>', '989', '989', '956', '956', '831', '831', '831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('8', '909', 10, '�W�X��newZ�˥�<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡжW�X��newZ�˥ҡA���O�@�ئX���˥ҡA�ø��W�X��Z�˥Ҧ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�X��Z�˥�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�X��Z�˥�<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�w���˥�<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�w���˥�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�&nbsp;&nbsp;&nbsp;&nbsp;<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥ҡv<br>�u�h�´f�U�I�v<br>', '989', '989', '957', '957', '831', '831', '831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('9', '991', 9, 'V.S.B.R.<br>�A�b���|�ݨ�F�@�Ӱ�氪�ŪZ��ű�y��k���H�A��O�A���L��L��y�@�U�߱o<br>�u�A���D����V.S.B.R.���ƶܡH�v<br>�u��M���D�AV.S.B.R.�YVariable&nbsp;Speed&nbsp;Beam&nbsp;Rifle�A�Y�L�q�t�����B�j......�v<br>�u����O���ű�y���H�v<br>�L���X��A���O�n���򪺼ҼˡA�o�����A��M���D�A���M�O��y�߱o�A�S�����O���檺<br>�A���X�@�|�r���A�L��M�i�D�Aű�y��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mega�DBeam&nbsp;Rifle<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Z�������[�A��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '405', '405', '411', '616', '613', '718', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('10', '992', 9, 'Twin&nbsp;Buster&nbsp;Rifle<br>�ڥH�e���b�@�����ʾԤh�u�t���L�u�{�H���A�O�o�ڦn���ѻP�L�s�y�@��֦����j�ަӯ}�a�O���j���B�j�A<br>�ڰO�o�s�y�o��j�ݭn����Ƴo�˩�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buster&nbsp;Beam&nbsp;Rifle<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buster&nbsp;Rifle<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buster&nbsp;Rifle<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2�s�˭y�D�j<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�������[�A��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�������[�A��<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����', '962', '412', '412', '407', '619', '619', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('11', '993', 9, '���ìP�L�i��q��<br>���F�@�Ѹ��A�{�l�j���F�A�A�@ť�줽�|���K�O����N���ġA�i�O�Q�a�W���Ѳ̭ˤF......<br>��ӬO�@�����ª���O�A���e�����}�H�G<br>�u���ìP�L�i��q���PG-bit�ìP�L�i��q�����귽�w���G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ìP�L�i��q��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ìP�L�i��q��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Z�������[�A��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����[�A��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ˬ�<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�ܩ�G-bit�ìP�L�i��q���h��������......�v<br>��O�U�@�������e���G�O�G�N�Q���h���A��O�즹����<br>', '974', '974', '616', '614', '613', '609', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('12', '994', 9, '�����u<br>�A�b���|�ݨ�F�@�Ӿں٬O���u�ǤH�������A��O�A�K�V�L�l�ݦ��������u�����D�G<br>�u�P���~�u�l�ܭ��u�ۤϡA�����u�O�@�ذl�D�����ɭ������u�A�ҥH�L�k���ά��~�u�l�ܧ޳N�A<br>�ӥѩ󥦪������O���A�ҥH���Q���öQ�A�u�ƥ����<br>�J�M�A���X�����A�ڬO���|���A����Ӧ^���G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�֤l���b��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�֤l���b��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NEO���b��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NEO���b��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���୸�u�o�g��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���୸�u�o�g��<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>', '522', '522', '517', '517', '502', '502', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('13', '995', 9, '��ĥ�M�D�@��r��<br>�A�q���|����ť���A��ĥ�M�æ��Q���j�j���O�q�A�B�i�H�ϥX���q�б�ĥ�M�D�@��r��<br>���n�o����ĥ�M�����A���a�r�p�����O�q�Χ޳N�O�������A��ĥ�M�������g�L�j�ơA�~���o���O�q�Ω�m�e�j�X�O���i��<br>�ӱj�ƪZ���A�����H�A�����ƦA��ű�y(?)�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ĥ�M<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C�s�M<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�X��Z�˥�<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>', '129', '127', '989', '718', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('14', '996', 9, '�B�嬶<br>�ߤW���]���`�O�|�ݨ�P�P��,&nbsp;���ѥ�@��,&nbsp;�ӥB�٬ݨ�F�u��~�S�O���P�v<br>�A���T�Į�:�u�S�@�����묹�bBit����W......�v<br>�@�Ӽ��x���v�l�b����U��b�A���y�W,�߷Q:&nbsp;���S�O�L�O?<br>�u���O(?),&nbsp;�ӫDBit,&nbsp;���̪��~���O���P��.�ӤO�q��b�e�̤��W�v<br>�S�@�i�r�������y�W�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bit<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Newtype�t�ι������u��������<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ʯ�ӷǨt��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�L�S�d�U�@�y��,&nbsp;�u�O......<br>', '971', '620', '405', '405', '965', '613', '712', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('15', '997', 9, '������<br>�ߤW���]���`�O�|�ݨ�P�P��,&nbsp;���ѥ�@��,&nbsp;�ӥB�٬ݨ�F�u��~�S�O���P�v<br>�A���T�Į�:�u�S�@�����묹�bBit����W......�v<br>�@�Ӽ��x���v�l�b����U��b�A���y�W,�߷Q:&nbsp;���S�O�L�O?<br>�u���O(?),&nbsp;�ӫDBit,&nbsp;���̪��~���O���P��.�ӤO�q��b�e�̤��W�v<br>�S�@�i�r�������y�W�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bit<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Newtype�t�ι������u��������<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ʯ�ӷǨt��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�L�S�d�U�@�y��,&nbsp;�u�O......<br>', '971', '620', '405', '405', '965', '613', '715', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('16', '998', 9, 'HiMAT&nbsp;System<br>��I���ګ�A���|�H���a�A��@�W�u�{�v���̡G<br>�u�A�Q���D���˥i�O70�����B18�̰������ʾԤh�B�F��&nbsp;Mach&nbsp;4&nbsp;���t�פ��˸m�ܡH�v<br>�L��A���G�u�����ܫ��B�]���Φw�ˤj�����Q�g���A�o��b�j��餺�F��p����H���t�סA<br>�����N����y�C�z�ҥΪ��@�Өt��&nbsp;��&nbsp;High&nbsp;Mobility&nbsp;Aerial&nbsp;Tactics&nbsp;System&nbsp;!�v<br>����A�L�K���F�@����󵹧A�A���̰O�z��&nbsp;HiMAT&nbsp;System&nbsp;���s�@��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ʯ�p�F<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyper&nbsp;Thruster<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyper&nbsp;Thruster<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�Q�g�[�t�t��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�Q�g�[�t�t��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '977', '976', '976', '911', '911', '715', '715', '718', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('17', '999', 9, 'E&nbsp;-&nbsp;cap<br>�b���|�����R�����A�@�Ӥf�p���Ϫ��k�H�A����ӥߡA���ӬO���|�������@�A��O�A���F�L�h�A���X�@�c�r���A<br>�åH�K�X���q�G�uBbm&nbsp;zpt&nbsp;udmk&nbsp;nd&nbsp;tnndugjmh&nbsp;zcnvs&nbsp;ugbs?�v<br>���|�������O�~�F�@���A�M��I�I���U�ϸ��G�unl�A�ڥi�a�����A�Y������´���u�{�v�p�P��Ǯa�A<br>�X�O��s�F�@�ط|�۰ʦ^�_EN�����ơ�E&nbsp;-&nbsp;cap<br>�g�L�ڭ̪��J�Ӫ��լd�A�w��o������ơG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>', '711', '712', '715', '718', '718', '715', '712', '711', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('18', '981', 8, '�A�q���|����ť���A�ӵP�r�p���O�i�H�o���ѪżC�����b��઺�A�èϨ��O�W�ɤF�W�L50%�A�ӦW�r�n���s\"�ѪżC�DV�r��\".<br>���n�o���ѪżC�����A���a�r�p�����O�q�O���檺�A�Z���������g�L�j�ơA�~���o���O�q���i��<br>�n�j�ƪZ���A�����H�A�����ƦA��ű�y�ѪżC�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѪżC<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�q�ϼC<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�q�ϥ[�A��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���q�ϩ�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���q�ϩ�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>', '963', '106', '943', '116', '116', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('19', '982', 8, '�W�q���s��<br>�A�b���|�ݨ�F�@�Ӱ�氪�ŪZ��ű�y��k���H�A��O�A���L��L��y�@�U�߱o<br>�u�A���D�����W�q���s�����ƶܡH�v<br>�u��M���D�A�W�q���s���O�@�اQ�ιq�ϤO�����s���@�������Z��......�v<br>�u����O���ű�y���H�v<br>�L���X��A���O�n���򪺼ҼˡA�o�����A��M���D�A���M�O��y�߱o�A�S�����O���檺<br>�A���X�@�|�r���A�L��M�i�D�Aű�y��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�q�ϥ[�A��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�q�Ϭ�<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���^�ড�q�ϩ�<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>', '943', '933', '118', '718', '715', '715', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('20', '983', 8, '�ѤW�ѤU�L�ļC<br>�A�֦����ʤO�ܡH�p�G�S���A�A�O����ϥΥH�U�Z�����I<br>�ѤW�ѤU�L�ļC�A�G�W��q�A���O�L�Ī��A�O�@��ݭn�r�p�����׶������Z���A�åB�H���ʤO�s�y�@��C�A�¤O��H<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѤW�ѤU���ʯ}�H�C<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѤW�ѤU���ʯ}�H�C<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '314', '314', '932', '932', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('21', '984', 8, '����L������<br>��L�������O�@�ؤO�q���C���Z��<br>�շQ�Q�A�Y�G��L�������@���K��@���������ܭ��ˡA�������L���������N�@���R���@�������H<br>�ӥB���ۮ�L�������������@�ؿ��ķPı�A�Ͼr�p�����o�����<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��L������<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��L������<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��˥Ҵ��u��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>', '968', '968', '430', '422', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('22', '985', 8, '�s����ĥ�M<br>�A�b���|���G�i��W���F�s����ĥ�M�o�W�r�A�M�ӡA�A�o�u���D��ĥ�M�A��O�A��F�Ӥ��|�����ݰݡG<br>�u�o�O��ĥ�M�j�ƫ᪺�Z���A��ӬO�M�ΪZ���A����Ӿ��K�Q�s���A�{�b�h�Q�s�x�ϥ�<br>�s����ĥ�M�Ӧb�����O���A��C��@�U�l���}�����Aű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ĥ�M<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ĥ�M<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���X�O�P�i�M<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�X��Z�˥�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>', '129', '129', '108', '989', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('23', '987', 8, '�T�����p�F<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡФT�����p�F�A���O�@�ػ��U�˷Ǹ˸m�A�ø����ʯ�p�F���Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ʯ�p�F<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '977', '718', '718', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('24', '988', 8, 'G�DTerritory<br>�A���M�ظ@�F�@���԰�:<br>A�������H�����C��bB���W,&nbsp;���M,&nbsp;�@�h�����㪺���@�h�X�{�F,&nbsp;��A�������פU�F,&nbsp;�M��b�K�@���j�}A.<br>���v�o�N�v�v���U�F��,�A�����ݰ�(?)��ű�y��k,&nbsp;�L�o�N�ѧΪ����F���I-Field&nbsp;Barrier,���K,����,����,����,���K,����<br>���۫K���F�C���O,&nbsp;�A�����D��b���l�����ǩO!���L,&nbsp;�i�H�֩w���O,&nbsp;��ƬO���|��b�e�����C<br>', '966', '718', '718', '718', '715', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('25', '989', 8, '�W�X��Z�˥�<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡжW�X��Z�˥ҡA���O�@�ئX���˥ҡA�ø����F���i�X���˥Ҧ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���F���i�X���˥�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���F���i�X���˥�<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�w���˥�<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�W�w���˥�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>�u�h�´f�U�I�v<br>', '956', '956', '957', '957', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('26', '971', 7, 'Bit<br>�ߤW,&nbsp;�A�y�����׵����ѬP�J���ѻ�,&nbsp;�o�o�{������~�S�O���P�C<br>�u���OBit�O!���i�O�@�رj�l���믫����Z���C�v����,�L�d�U�@�i�r��:<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Newtype�t�ι������u��������<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Psyco-Frame<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�M�@�y��:�u���t�|�۹J��......�v<br>', '620', '613', '613', '405', '975', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('27', '972', 7, 'Divider<br>�A���Q���i���|��ť�������P�Z����ű�y��k�A�o�Q�@�ӭ��x���H���ˡA�A���Q���_�ӰQ�^���D<br>���H�w�b�ݦ����ìP�L�i��q�����ơG<br>�u�ڪ��ìP�L�i��q���b�԰����}���F�A�A�i�H���ײz�@�U�ܡH�v<br>�u���ˡH�v���H�ݨӤQ���J��<br>�u��......���p���Ӽ��[�A���Ӥ���ΤF�A���L�A�i�H�HDivider�N���ìP�L�i��q���A��O���t�h�֡v<br>�u����O���ű�y���H�v<br>�u���쥻�w�����Z���A�u�ݦA���ǥ[�W���X�O�X���̥[�ɤl���A���Z�������[�A���A���Z�������[�A���A�����A�����A�����K�iű�yDivider�F�v<br>�u���¡I�v<br>', '974', '607', '616', '616', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('28', '973', 7, '�p��ù�J�C*�t�C��<br>�A�q���|����ť���A�ӵP�r�p���O�i�H�o��(?)�����b��઺�A�èϨ��O�W�ɤF�W�L50%�A�ӦW�r�n���s\"(?)\".<br>���n�o��(?)�����A���a�r�p�����O�q�O���檺�A�Z���������g�L�j�ơA�~���o���O�q���i��<br>�n�j�ƪZ���A�����H�A�����ƦA��ű�y�p��ù�J�C�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�p��ù�J�C<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�p�������C<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�p�������C<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�D�|�H�L�μC<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�Q�g�t��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '955', '324', '324', '321', '931', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('29', '974', 7, '�ìP�L�i��q��<br>���F�@�Ѹ��A�{�l�j���F�A�A�@ť�줽�|���K�O����N���ġA�i�O�Q�a�W���Ѳ̭ˤF......<br>��ӬO�@�����ª���O�A���e�����}�H�G<br>�u�]�A�S�ӤF<br>�ڡA���Ѥ��F���`�誺�@�]......<br>���O�@�Ӷ��������ߤW�A�ڶ��}�ۡA�i�O�Ѧ���ܡA���h�����A�@�D���q��G�g��j�a�A�򱵵۪��O�@�}�_�ѥ��T�A<br>�ڪu�ۥ��T�P������V���A�u�����̤@����A�o�󤣥͡A���O�Q�@�I�����ʪ��Z�����L......�v<br>�u�g�L�Ʀ~�����d�t�X�A�ש���F�@�I�Y���A��Ө��OG-bit�ìP�L�i��q��,�i�O�ڥu���ìP�L�i��q��ű�y��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�������[�A��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̥[���i��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Z�������[�A��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ˬ�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>�u......�d���U�W��쪺G-bit�ìP�L�i��q���P���ìP�L�i��q����ƳQ�s���F�A���ӬO���|�������Ҭ��A�ڤw������ݨ����Ѫ����f�F......�v<br>��O�즹����<br>', '619', '618', '616', '609', '718', '715', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('30', '975', 7, 'Pscyo-Frame<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡ�Pscyo-Frame�A���O�@�غ˷Ǩt�ΡA�ø�Dual&nbsp;Sensor���Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G<br>�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>�u�h�´f�U�I�v<br>', '932', '932', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('31', '976', 7, 'Hyper&nbsp;Thruster<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡ�Hyper&nbsp;Thruster�A���O�@�ػ��U�[�t�˸m�A�ø�Thruster���Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thruster<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thruster<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;�v<br>�u�h�´f�U�I�v<br>', '941', '941', '718', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('32', '977', 7, '���ʯ�p�F<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡа��ʯ�p�F�A���O�@�ػ��U�˷Ǹ˸m�A�ø����ʯ�ӷǨt�Φ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ʯ�ӷǨt��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>�u�h�´f�U�I�v<br>', '965', '718', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('33', '978', 7, '���ʤOField<br>�A�֦����ʤO�ܡH�p�G�S���A�A�O����ϥΥH�U�Z�����I<br>�@��Field�pI-Field�A�u�n�������෽�K����Ұʨ��m���A�����ʤOField�h�ٻݭn�r�p�����믫�O<br>�u�����ʤO�H�ؤ~�i�H�}�ʡA���L�n�t�~ű�y���ʤOField�A�~�i�H�ҰʡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E&nbsp;field<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K&nbsp;&nbsp;&nbsp;&nbsp;<br>', '932', '932', '967', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('34', '979', 7, 'Fin&nbsp;Funnel&nbsp;Barrier<br>�uFin&nbsp;Funnel&nbsp;Barrier�H�PFin&nbsp;Funnel�������ܡv�A�n�_����<br>�u�A�u�o���IFin&nbsp;Funnel&nbsp;Barrier�N�OFin&nbsp;Funnel���ͪ�I-Field�v�L�}�l���I���@�СA���j�C�w��<br>�u����PI-Field&nbsp;Barrier����ϧO�H�v�A�~�򪺰�<br>�uFin&nbsp;Funnel&nbsp;Barrier��M���F�`�I�䨾�m�O��bE&nbsp;field���W�v<br>�u����E&nbsp;field�S�O�ƻ�H�v�A�V�ݶV����<br>�u�A�쩳�R�٬O���R�H�v<br>�A�ݨ��L�@¥�Q�_�F�A���ˤl�A�A�u�n�ĨĥI���A�C�C���}......<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E&nbsp;field<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beam&nbsp;Coating<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;<br>�u�h��?�v�^�Y�@�ݡA�L�S�^�_��Ӫ��ˤl�F<br>', '967', '922', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('35', '961', 6, '�X���ɤl�u<br>�A���Q���i���|��ť�������P�Z����ű�y��k�A�o�Q�@�ӭ��x���H���ˡA�A���Q���_�ӰQ�^���D<br>���H�w�b�ݦ����ìP�L�i��q�����ơG<br>�u�ڪ����X�O�X���̥[�ɤl���b�԰����}���F�A�A�i�H���ײz�@�U�ܡH�v<br>�u���ˡH�v���H�ݨӤQ���J��<br>�u��......���p���Ӽ��[�A���Ӥ���ΤF�A���L�A�i�H�H�X���ɤl�u�N�����X�O�X���̥[�ɤl���A��O���t�h�֡v<br>�u����O���ű�y���H�v<br>�u���쥻�w�����Z���A�u�ݶ��ǥ[�W�X���̥[�ɤl���A�̥[���i���A�����A�����A���K�K�iű�y�X���ɤl�u�F�v<br>�u���¡I�v<br>', '607', '605', '618', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('36', '962', 6, 'Buster&nbsp;Beam&nbsp;Rifle<br>�ڬO�Ӿ�����׭��A�ڥH�e����&nbsp;Wing&nbsp;Gundam&nbsp;Zero&nbsp;���סA�O�o�����馳�a�ۤ@�䥨�����B�j<br>�ݹL�������c��A�ڻP�t�~�h�W�u�{�v�A���R�X�o��B�j�ݭn�H�U���ƻs�y�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buster&nbsp;Rifle<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buster&nbsp;Rifle<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mega�DBeam&nbsp;Rifle<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;<br>', '412', '412', '411', '405', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('37', '963', 6, '�ѪżC<br>�ǻ��A���@��C�W��\"�ѪżC\"�A��O�q�L��i��s�A��.<br>�Y��A�A�b�a�W�o�{�F�@�{�{�o��������A���H���O����.&nbsp;<br>�i�O�A����@�ݡA��ӬO�@����A�U���O�@���ѡA��......�O�⥻�~��.���ߦn�_���A�A�M�w���}�ݬ�.<br>�`���p�b��-�ѪżC��ű�y��k<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���X�O�����t�M<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���M����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���P�i�M<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C�s�M<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K&nbsp;&nbsp;&nbsp;&nbsp;<br><br>�ѫC���b��-�ѪżC��ű�y��k<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���q�ϩ�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���M����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���P�i�M<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�q�ϼC<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>��ӬO�ѪżC��ű�y��k�A���O�A���@�Ӥ~��O�H<br>�u�`���p�b��......�ѫC���b��......?�v����,&nbsp;�A���դF.<br>', '116', '109', '107', '106', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('38', '964', 6, '���t���ʨt��<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G�u�ڱ��˧A�o�ӡХ��t���ʨt�ΡA���O�@�إ[�t�t�ΡA�ø����t�Q�g�t�Φ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�Q�g�t��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '931', '718', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('39', '965', 6, '���ʯ�ӷǨt��<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡа��ʯ�ӷǨt�ΡA���O�@�ػ��U�˷Ǹ˸m�A�ø��ӷǨt�Φ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ӷǨt��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ӷǨt��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>�u�h�´f�U�I�v<br>', '942', '942', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('40', '966', 6, 'I-Field&nbsp;Barrier<br>�A���M�ظ@�F�@���԰�:<br>A�������H�����C��bB���W,&nbsp;���M,&nbsp;�@�h�����㪺���@�h�X�{�F,&nbsp;��A�������פU�F,&nbsp;�M��b�K�@���j�}A.<br>���v�o�N�v�v���U�F��,�A�����ݰ�(?)��ű�y��k,&nbsp;�L�o�N�ѧΪ����FAB&nbsp;Field�A�����A�����A�����A<br>���۫K���F�C���O,&nbsp;�A�����D��b���l�����ǩO!���L,&nbsp;�i�H�֩w���O,&nbsp;��ƬO���|��b�e�����C<br>', '944', '718', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('41', '967', 6, 'E&nbsp;field<br>�A���M�ظ@�F�@���԰�:<br>A�������H�����C��bB���W,&nbsp;���M,&nbsp;�@�h�����㪺���@�h�X�{�F,&nbsp;��A�������פU�F,&nbsp;�M��b�K�@���j�}A.<br>���v�o�N�v�v���U�F��,�A�����ݰ�(?)��ű�y��k,&nbsp;�L�o�N�ѧΪ����FAB&nbsp;Field�A�����A�����A���K�A���K�A�C�ɡA<br>���۫K���F�C���O,&nbsp;�A�����D��b���l�����ǩO!���L,&nbsp;�i�H�֩w���O,&nbsp;��ƬO���|��b�e�����C<br>', '944', '718', '715', '712', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('42', '968', 6, '��L������<br>��L�������O�@�ح��u�Ī��Z���A�d�U�O�C���F�����O�q�I���M�@���l�u�������O�C�A���Q���l�u���}�a�O�O�����]�Q��<br>�ӥB���ۮ�L�������������@�ؿ��ķPı�A�Ͼr�p�����o�����<br>ű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����������<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�żu��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����������<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>', '429', '419', '418', '718', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('43', '986', 8, 'Transitive&nbsp;FEAR<br>�ڦb�Y��a���s�H���ɡA�o�����@�ئW��&nbsp;FEAR&nbsp;���t�ΡA�N�O����&nbsp;Far-range&nbsp;Exploration&nbsp;and&nbsp;Alteration&nbsp;Re-locator�C�o�Өt�ί�p��X�@�ӶW�X���d�򤺤@������ê���A�M��A�����H&nbsp;FEAR&nbsp;�t�Τ������i���u�ƾ��A�������i�ܩү�F�쪺���t�A�åB����L�Ҧ���ê��&nbsp;��&nbsp;�]�A�ĭx����P�����I<br>�H�U�N�O&nbsp;Transitive&nbsp;FEAR&nbsp;���s�@��k�C<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t���ʨt��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�Q�g�[�t�t��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�Q�g�[�t�t��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Q�g�[�t�t��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����', '964', '911', '911', '801', '718', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('44', '951', 5, '��@��r<br>�A�b���|�ݨ�F�@�Ӱ�氪�ŪZ��ű�y��k���H�A��O�A���L��L��y�@�U�߱o<br>�u�A���D������@��r���ƶܡH�v<br>�u��M���D�A��@��r�p���M�t���A�O�ǻ������@��j�M......�v<br>�u����O���ű�y���H�v<br>�L���X��A���O�n���򪺼ҼˡA�o�����A��M���D�A���M�O��y�߱o�A�S�����O���檺<br>�A���X�@�|�r���A�L��M�i�D�Aű�y��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���M����<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���X�O�P�i�M<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��˥ҤM<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C�s�M<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>', '109', '108', '128', '127', '715', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('45', '952', 5, '�ޤO�l�B�jBST<br>�A�b���|�ݨ�F�@�Ӱ�氪�ŪZ��ű�y��k���H�A��O�A���L��L��y�@�U�߱o<br>�u�A���D�����ޤO�l�B�jBST���ƶܡH�v<br>�u��M���D�A�ޤO�l�B�jBST�O�Q�ΤޤO�l�A���O���Y�A�@�X����......�v<br>�u����O���ű�y���H�v<br>�L���X��A���O�n���򪺼ҼˡA�o�����A��M���D�A���M�O��y�߱o�A�S�����O���檺<br>�A���X�@�|�r���A�L��M�i�D�Aű�y��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;280mm�y�D�[�A��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�}�a�y�D�j<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mega�DBeam&nbsp;Rifle<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '410', '408', '411', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('46', '953', 5, '���~�u�l�ܭ��u<br>�A�b���|�ݨ�F�@�Ӿں٬O���u�ǤH�������A��O�A�K�V�L�l�ݦ������~�u�l�ܭ��u�����D<br>�u���u�O�@�ةR���O�C�A�����O�@��A�o���j�q�u�Ī��Z��<br>�����ɩR���O�C�����I�A�ڭӤH��s�F�@�إH���~�u�l�ܪ��j�O���u<br>ű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ʯ�ӷǨt��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������b�o�g��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���u���b��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>', '965', '512', '519', '718', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('47', '954', 5, '�E����<br>�u�E���ޡH�ګ��q�Sť�L�o�ƪ��H�v<br>�u�o�O�@�شJ�����󨾿m���Z���A�i�H�b���m�ĤH�������P�ɧ@�X�����A�X�䤣�N�v<br>�u�o��F�`�H�@�f���I�v<br>�u����I<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���@��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�O�@��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�X���̥[�ɤl��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>', '828', '826', '605', '831', '712', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('48', '955', 5, '�p��ù�J�C<br>���@�Ӥ��|�����b�@�Ǧۦ��@���A���ۻy�A�A���L�hť�L���G<br>�u����������ƤQ�~�A�����Ѫ��٬O���@��......���ѡA�ڥ�����B�e�f���A���J����j�ԡA���M�ѩ��a�t�A�p�q��[�A<br>�@��C��M�X�{�b�Q�����A�䤤�@���ߨ贤��A�æV�t�@������A�ް_�F���j�F�СA�s�ڪ��Ӷ���Q�i�ΤF�v<br>�L�󻡤F�p��ù�J�C��ű�y��k�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�p�������C<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�s���}�s�C�D�f���_<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�|�H�L�μC<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�i�O�A�A�w�����A���k���N�����F<br>', '324', '323', '320', '715', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('49', '956', 5, '���F���i�X���˥�<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡа��F���i�X���˥ҡA���O�@�ئX���˥ҡA�ø����g�X���˥Ҧ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�O�@��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '831', '831', '826', '718', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('50', '957', 5, '�W�w���˥�<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡжW�w���˥ҡA���O�@�ئX���˥ҡA�ø����g�X���˥Ҧ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���g�X���˥�<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���@��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '831', '831', '828', '718', '718', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('51', '958', 5, '���ʤOL���[�A��<br>�A�֦����ʤO�ܡH�p�G�S���A�A�O����ϥΥH�U�Z�����I<br>�@�몺�[�A�����ݭn�j�q�෽�A�����ʤOL���[�A���O�ҥ~�A���u�ݭn�p�q�෽�A�o�F��F�@��[�A������������<br>�i���u�����ʤO�H�ؤ�i�}�ʡA�ӥB�|�ӥκ믫�O<br>ű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-Link&nbsp;Sensor<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Z�������[�A��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����[�A��<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K&nbsp;&nbsp;&nbsp;&nbsp;<br>', '932', '932', '616', '614', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('52', '941', 4, 'Thruster�@<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡ�Thruster�A���O�@�ػ��U�[�t�˸m�A�ø�Mega&nbsp;Booster���Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mega&nbsp;Booster<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mega&nbsp;Booster<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����v<br>�u�h�´f�U�I�v<br>', '921', '921', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('53', '942', 4, '�ӷǨt��<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡзӷǨt�ΡA���O�@�ػ��U�˷Ǹ˸m�A�ø��˷Ǿ����Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�˷Ǿ�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�˷Ǿ�<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dual&nbsp;Sensor<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '816', '816', '811', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('54', '943', 4, '�q�ϥ[�A��<br>�A�q���|����ť���즳���q�ϥ[�A�����ơG<br>�u�q�ϥ[�A���A�G�W��q�A�O���q�Ϭ��P�����[�A�������X�A���L�A�o�O���������A�]���ٻݭn�@���̬öQ�����ۡA�~�i����ű�y�L�{�v<br>', '933', '933', '614', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('55', '944', 4, 'AB&nbsp;Field<br>�A���M�ظ@�F�@���԰�:<br>A�������H�����C��bB���W,&nbsp;���M,&nbsp;�@�h�����㪺���@�h�X�{�F,&nbsp;��A�������פU�F,&nbsp;�M��b�K�@���j�}A.<br>���v�o�N�v�v���U�F��,�A�����ݰ�(?)��ű�y��k,&nbsp;�L�o�N�ѧΪ����FBeam&nbsp;Coating�A�����A�j�O�@�ޡAG�DWall�A�����A<br>���۫K���F�C���O,&nbsp;�A�����D��b���l�����ǩO!���L,&nbsp;�i�H�֩w���O,&nbsp;��ƬO���|��b�e�����C<br>', '922', '821', '826', '715', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('56', '945', 4, 'Shield&nbsp;Buster&nbsp;Rifle<br>�b�A�צ檺���~�W�A�ݨ��F�@��MS�A�B�˳ƤFBuster&nbsp;Rifle�C�M�ӡA�ѽm���A�u�O�ݤF�ݫK�������}�C<br>�u����!�v�^�Y�@�ݡA�O�@��֦~�A�u�o�i���O���q��Buster&nbsp;Rifle�A�o�OShield&nbsp;Buster&nbsp;Rifle�C�v<br>����,&nbsp;Buster&nbsp;Rifle���j���i�},&nbsp;���F���@��!&nbsp;<br>�ݨ�A���J������,&nbsp;��O,&nbsp;�L�K���F�AShield&nbsp;Buster&nbsp;Rifle��ű�y��k:<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j�O�@��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�j���@��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buster&nbsp;Rifle<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '826', '828', '412', '718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('57', '931', 3, '���t�Q�g�t��<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G�u�ڱ��˧A�o�ӡЭ��t�Q�g�t�ΡA���O�@�إ[�t�t�ΡA�ø����t�Q�g�[�t�t�Φ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���t�Q�g�[�t�t��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Q�g�[�t�t��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '911', '801', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('58', '932', 3, 'T-Link&nbsp;Sensor<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡ�T-Link&nbsp;Sensor�A���O�@�غ˷Ǩt�ΡA�ø�Pscyo-Frame���Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G<br>�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Multi-Sensor<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '912', '715', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('59', '933', 3, '�q�Ϭ�<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u�q�Ϭ��O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�^�ড�q�ϩ�<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�q�ϼC<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�y�D�j<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>', '117', '106', '406', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('60', '608', 3, '�j���̥[�ɤl��<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u�j���̥[�ɤl���O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̥[�ɤl��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̥[�ɤl��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>', '601', '601', '715', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('61', '319', 3, '�|�H�C<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u�|�H�C�O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������C<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>', '303', '715', '712', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('62', '921', 2, 'Mega&nbsp;Booster<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡ�Mega&nbsp;Booster�A���O�@�ػ��U�[�t�˸m�A�ø�Booster���Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booster<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booster<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K�v<br>�u�h�´f�U�I�v<br>', '806', '806', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('63', '922', 2, 'Beam&nbsp;Coating<br>�A���M�ظ@�F�@���԰�:<br>A�������H�����C��bB���W,&nbsp;���M,&nbsp;�@�h�����㪺���@�h�X�{�F,&nbsp;��A�������פU�F,&nbsp;�M��b�K�@���j�}A.<br>���v�o�N�v�v���U�F��,�A�����ݰ�(?)��ű�y��k,&nbsp;�L�o�N�ѧΪ����F���K�AG�DWall�A���K�AG�DWall�A<br>���۫K���F�C���O,&nbsp;�A�����D��b���l�����ǩO!���L,&nbsp;�i�H�֩w���O,&nbsp;��ƬO���|��b�e�����C<br>', '821', '821', '712', '712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('64', '504', 2, '�h���o�g��<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u�h���o�g���O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���୸�u�o�g��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���୸�u�o�g��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>', '502', '502', '715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('65', '518', 2, '���X�O���b��<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u���X�O���b���O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��l�୸�u�o�g��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>', '503', '715', '715', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('66', '911', 1, '���t�Q�g�[�t�t��<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G�u�ڱ��˧A�o�ӡз��t�Q�g�[�t�t�ΡA���O�@�إ[�t�t�ΡA�ø��Q�g�[�t�t�Φ��Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Q�g�[�t�t��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Q�g�[�t�t��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C�ɡv<br>�u�h�´f�U�I�v<br>', '801', '801', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('67', '912', 1, 'Multi-Sensor<br>���|�����G�u��b�����W�ʶR�����U�˳ơA��b�O�������A���L�b�o?�A�ڭ̯ର�A���ѧ�h�����U�˳�ű�y��k�v<br>���ۡA�L�����F�A��W���r���A�Q�F�Q�A���G<br>�u�ڱ��˧A�o�ӡ�Multi-Sensor�A���O�@�غ˷Ǩt�ΡA�ø�T-Link&nbsp;Sensor���Ĳv�A���ˡH�v<br>�A�I�Y�ܷN�A����浹�L�G<br>�uű�y��k�p�U�G<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dual&nbsp;Sensor<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dual&nbsp;Sensor<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C�ɡv<br>�u�h�´f�U�I�v<br>', '811', '811', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('68', '107', 1, '���P�i�M<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u���P�i�M�O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���X�O�����t�M<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����p�M<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>', '104', '102', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('69', '213', 1, '���a�C��������<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u���a�C���������O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�K��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�K��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��&nbsp;&nbsp;&nbsp;&nbsp;<br>', '202', '202', '711', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('70', '510', 1, '5�s�˭��u�o�g��<br>�Ĥ@���Ө줽�|�A�߱����K���I��i�A���G�ѰO�F�Ө줽�|����]<br>���n�A���@����ߪ������e�Ө�U�A�A��@���i�D�L�A�L���G<br>�u5�s�˭��u�o�g���O�@�ر`�����Z���A�ͤS�i�_���D����ű�y��k�H�Y�����D�A�i�ѦҥH�U���e�v<br>�M��A�L�����A�@���ѡG<br>�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���୸�u�o�g��<br>�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���୸�u�o�g��<br>�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���K<br>�|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�C��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>', '502', '502', '712', '711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('71', '96001', '6', 'EXAM System<br> �o�@�ѧA�S�Ө�F�u�{�v���|�A�o�{�F�@�j��Ǫ̥��{�u�a���q�ۤ@���ݯʤ�����MS�C<br> �������A���n�_�ߡA�A���W�e�h�A�չϱqť�Ǫ̭̪��ܤ���ť�o��MS���Ӿ��C<br> <br> �u�o���H�Ŧ⬰�D�n��t������O.....�S�v<br> �u�A�o�s�Ӫ��T�o�N�O�������ħڳ��J�ç�����\"�c�]\"�ڡT�v<br> �u��...���ɥL�i�{���D�Z�}�a�O...²���s�ڤߴH.....�v<br> �u���u�O�}�a�O�A�N�O�^�פO�A�R���v�����@��MS�n���O�T�v<br> �u��������|���o�p���U��?�v<br> �u�]�����Өt�αj���X�O����,�Ͼ��鳣�t�ᤣ�F......�v<br> �uť���s�r�p��...���Q�˱o���Ӥ��M�O...�v<br> �u���D...�o�N�O�ǻ����˳ƤFEXAM System��\"Blue Destiny\"�T�S�v<br> �u���ڧ�t�ε��q�����@�U......�v<br> <br> �uMulti-Sensor�BDual Sensor�BMulti-Sensor�BDual Sensor�BMulti-Sensor�BDual Sensor�B�����B�����B�����B�����v<br> <br> ����A�۷Q�ۦۤv������˳�EXAM System��O�q�O���j�j���P�ɡA<br> �A��M�P��ۤv���Q�@�D���j�j���O�q�ԧ�A�N�o�˳Q�@��ĵ�ô��X���|���~�R<br> <br> �u�A�b�o�طFԣ�S���D�A�O�İꬣ�Ӫ����ҡS�v<br> <br> ���O�ۤv���M�աA�A�s���V�L�����R<br> <br> �u��......�O�o�˪�......�v<br>', '912', '811', '912', '811', '912', '811', '718', '715', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('72', '90002', '10', '�A�ظ@�F�@�������R<br> <br> �u���A�o Coordinator ������F�`�A�٤��Χڭ̳o��Newtype�T�v�@�Өk�H�H�������V�@�����ۭ��㪺�k�H�C<br> �u�A�u�O�H�y�������Ӥw�T�v�S�@�Өk�H���ۨ������ۭ��㪺�k�H�C<br> �u�ڭ�Newtype��ϥίB�嬶�A�A�O�S�v�A�@�Өk�H���V�������ۭ��㪺�k�H�C<br> �u�ԡT�v�b�d�ҩҫ��U�A�����ۭ��㪺�k�H�ש�I���ۮ�A�@�x���b��W�R<br> �u�A�̳o�ǨS���Ѫ��H�A���S��ť�LSuper DRAGOON? �N�O�ڭ�Coordinator�M�Ϊ��Z���A��O��b�B�嬶���W�I�v<br> �u����Super DRAGOON�S�O���ű�y���S�v�A���ئn�_�a�ݡC<br> �����ۭ��㪺�k�H�^�L�Y�ӡA�h�F�A�@���A���F�@�i�r���R<br> <br> ����k���O��ű�y�k----Super DRAGOON<br> <br> �@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br> �G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Newtype�t�ι������u��������<br> �T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bit<br> �|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bit<br> �����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> <br> ���M�A�ܩ_�Ǭ��������ۭ��㪺�k�H���D�A�b�Q����A<br> �����ޫ�ˡA�A���B�a��o�Fű�ySuper DRAGOON����k�C<br>', '997', '620', '971', '971', '405', '405', '405', '405', '718', '718', '715', '715', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('73', '969', '6', '�s���F���i�X��<br> �o�@�ѧA�S�Ө�F�u�{�v���|�A�ݨ�@�W�u�{�v�A�I�Y�W�F�A���ۿ����g�r�C<br> �L�@���g�A�@���N��۵ۤp�աC<br> ��M�A�L�^�Y�@��A�K��A�����G�u�o�q���A�@�w�|�ܳ��w�I�v<br> �M��A�L�K���t���h�A��W���c�r���A�k�h�L�ܤF�C<br> _______________________________________________________<br> �z�Q�ܱj��?<br> �@���B�s���R�ڡ@�@�@�@�@����R�N��L�n<br> �p�סR�@�@�@�ݤ�@�@�@�@�s�@�R������<br> <br> �g���F���[���V�O�M�I�X��<br> �o��F�ߥؤ������L�Q��<br> �S�⥦�αo�u���������....<br> <br> �o�o�{�A�o�{�F�z�ĤH�Ҿ֦���<br> �ä���z���z�A�Ʀܧ�ө�z<br> ���z�F�F�۹G,�ϱz�L�O�۬[<br> <br> �z���P��ۤv���O�q������?<br> �z���P��ۤv�ҥI�X���w�ѪF�y��?<br> �z���Q�L�O�ۤv���Z���P����<br> ���Ӧۤv����Q�@�X�j�ƻP�i�B��??<br> <br> Repeat *<br> �J�M�z�I�F��,��M���|���z�P��Ǥ�<br> �бz��O�H�U��������@�t��<br> �@�T�C�C�� �|�����K<br> �G���Q���� �K�E����<br> ��!��O�A�ܱj!!<br> <br> ��!��O�A��i�@�B�a�ܱj!!<br> _______________________________________________________<br> �u���سQ�F���Pı�C�C�v�A�߷Q�ۡC<br>', '711', '715', '711', '712', '712', '715', '711', '718', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` (
  `id` varchar(14) binary NOT NULL default '0',
  `name` varchar(10) NOT NULL default '',
  `hpc` mediumint(6) NOT NULL default '0',
  `enc` mediumint(6) NOT NULL default '0',
  `spc` tinyint(3) NOT NULL default '0',
  `atf` tinyint(3) NOT NULL default '0',
  `def` tinyint(3) NOT NULL default '0',
  `ref` tinyint(3) NOT NULL default '0',
  `taf` tinyint(3) NOT NULL default '0',
  `hitf` tinyint(3) NOT NULL default '0',
  `missf` tinyint(3) NOT NULL default '0',
  `price` int(8) NOT NULL default '0',
  `needlv` tinyint(3) NOT NULL default '0',
  `spec` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('0', '�q�`����', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('StrikeA', '����', 0, 5, 2, 10, -2, -2, -1, 0, 0, 100000, 6, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('DefCounterA', '���m����', 0, 0, 2, -5, 10, -5, 0, 5, 0, 120000, 11, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('QuickA', '���t', 0, 10, 2, 0, -5, 10, -2, 0, 5, 120000, 11, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('SnipeA', '����', 0, 10, 5, 2, -3, -5, 10, 5, 0, 500000, 27, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('StrikeB', '�˨�', 100, 10, 5, 20, -5, 0, 0, 5, 5, 500000, 27, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('DoubleStrike', '�G�s��', 0, 0, 20, 0, 0, -5, -10, 10, 0, 1000000, 35, 'DoubleStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('TripleStrike', '�T�s��', 0, 0, 40, 0, 0, -5, -10, 10, 0, 3000000, 65, 'TripleStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('AllWepStirke', '���u�o�g', 100, 50, 25, 0, 0, 0, -20, 25, 0, 2500000, 56, 'AllWepStirke');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('RaidStrike', '�_ŧ', 0, 5, 35, 5, 5, 25, 10, 0, 0, 4000000, 70, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('MindStrike', '�߲�', 0, 0, 40, 10, -5, 5, 25, 5, 0, 4000000, 70, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('SenseStrike', '�F�P', 0, 25, 60, 25, 0, 10, 10, 10, 10, 10000000, 80, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('CounterStrike', '��������', 0, 0, 45, 0, 0, 0, 0, 20, 0, 12000000, 85, 'CounterStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('FirstStrike', '�������', 0, 30, 45, 0, 0, 5, -5, 0, 0, 12000000, 85, 'FirstStrike');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` (
  `id` varchar(16) NOT NULL default '0',
  `name` varchar(40) NOT NULL default '',
  `grade` tinyint(3) NOT NULL default '0',
  `kind` varchar(3) NOT NULL default 'N',
  `familyid` varchar(5) NOT NULL default '0',
  `nextev` text NOT NULL,
  `specev` text NOT NULL,
  `atk` mediumint(6) unsigned NOT NULL default '0',
  `hit` tinyint(3) unsigned NOT NULL default '0',
  `rd` tinyint(3) unsigned NOT NULL default '0',
  `enc` smallint(5) unsigned NOT NULL default '0',
  `price` int(10) unsigned NOT NULL default '0',
  `equip` tinyint(1) NOT NULL default '0',
  `spec` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('0', '�L�Z��', 0, 'N', '0', '', '', 0, 0, 0, 0, 0, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('101', '�p�M', 1, 'BDI', '101', '102,124', '', 780, 95, 2, 15, 40000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('102', '�����p�M', 2, 'BDI', '101', '103', '', 780, 95, 2, 30, 48000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('103', '�����t�M', 3, 'BI', '101', '104', '', 850, 98, 2, 45, 57000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('104', '���X�O�����t�M', 4, 'I', '101', '105', '107', 1000, 98, 2, 60, 65000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('105', '�q�ϤO�����t�M', 5, 'I', '101', '115', '106', 1200, 99, 2, 90, 74000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('106', '�q�ϼC', 6, 'I', '101', '', '', 2700, 100, 1, 115, 80000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('107', '���P�i�M', 6, 'N', '101', '108', '', 1200, 100, 2, 90, 84000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('108', '���X�O�P�i�M', 7, 'N', '101', '109', '110', 630, 105, 4, 100, 95000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('109', '���M����', 8, 'N', '101', '', '', 1525, 100, 2, 115, 100000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('110', '��ĥ�M�mSCHWERT-GEWEHER�n', 5, 'N', '101', '', '', 835, 100, 4, 130, 100000, 0, 'DamB,MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('115', '�q�ϩ�', 5, 'I', '101', '116,117', '', 2500, 100, 1, 85, 63000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('116', '�j���q�ϩ�', 6, 'I', '101', '', '', 2950, 95, 1, 105, 72000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('117', '�^�ড�q�ϩ�', 6, 'N', '101', '', '118', 1300, 95, 2, 95, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('118', '���^�ড�q�ϩ�', 7, 'N', '101', '', '', 730, 95, 4, 100, 86000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('124', '���ݤp�M', 2, 'I', '101', '125', '', 800, 100, 2, 25, 46000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('125', '���˪��ݤp�M', 3, 'DI', '101', '', '126', 870, 100, 2, 40, 57000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('126', '���٤M', 4, 'N', '101', '128', '127', 680, 100, 3, 65, 69000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('127', '�C�s�M', 4, 'N', '101', '', '128', 780, 100, 4, 135, 85000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('128', '��˥ҤM', 5, 'N', '101', '', '129', 1520, 100, 2, 130, 100000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('129', '��ĥ�M', 6, 'N', '101', '', '', 1780, 100, 2, 150, 100000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('201', '�氫', 1, 'BDI', '201', '202', '', 540, 100, 3, 15, 45000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('202', '�K��', 2, 'DI', '201', '203,212', '', 570, 100, 3, 25, 50000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('203', '��ï��H��', 3, 'I', '201', '204', '219', 610, 103, 3, 35, 55000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('204', '�i���s����', 4, 'I', '201', '205', '', 650, 105, 3, 50, 63000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('205', '�ۭ��T�s��', 5, 'I', '201', '206', '', 710, 105, 3, 70, 72000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('206', '�z�H�����U', 6, 'I', '201', '', '207', 770, 105, 3, 95, 81000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('207', '�e�����s��', 7, 'N', '201', '', '208', 750, 105, 4, 125, 90000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('208', '�K�R�D�A�{����', 8, 'N', '201', '', '', 680, 105, 5, 160, 100000, 0, 'MobA,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('212', '�U������', 3, 'I', '201', '213', '216', 775, 100, 3, 60, 75000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('213', '���a�C��������', 4, 'I', '201', '', '214', 620, 100, 4, 95, 83000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('214', '���������j����', 5, 'N', '201', '', '215', 490, 100, 6, 110, 90000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('215', '�Q�G����P�j����', 7, 'N', '201', '', '', 265, 100, 12, 125, 100000, 0, 'AntiPDef,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('216', 'T-Link Knuckle', 2, 'N', '201', '', '', 1500, 110, 2, 120, 70000, 0, 'PsyRequired,DamB,AntiPDef,CostSP<3>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('219', '�����', 3, 'DI', '201', '220', '', 1100, 100, 2, 90, 56000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('220', '���˾����', 4, 'N', '201', '221', '223', 1275, 105, 2, 110, 64000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('221', '���s���Y��', 5, 'N', '201', '', '222', 850, 105, 3, 145, 73000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('222', '�u�D�y�P�����C', 6, 'N', '201', '', '', 400, 105, 8, 175, 95000, 0, 'DamB,Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('223', '���_�}�H�����', 4, 'N', '201', '', '', 1675, 110, 2, 170, 90000, 0, 'DamA,Cease,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('301', '�����C', 1, 'BDI', '301', '302', '', 830, 100, 2, 20, 60000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('302', '�է@�������C', 2, 'DI', '301', '303', '', 900, 100, 2, 30, 63000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('303', '��������C', 2, 'DI', '301', '304', '', 950, 100, 2, 38, 67000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('304', '�æ����C', 3, 'I', '301', '305,318', '', 1050, 100, 2, 48, 71000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('305', '�̥[�����C', 4, 'N', '301', '', '306,310,312', 1180, 100, 2, 59, 78000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('306', '�j�������C', 6, 'N', '301', '307', '309', 1330, 100, 2, 80, 86000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('307', 'Hi-�����C', 7, 'N', '301', '308', '', 1400, 100, 2, 110, 89000, 0, 'MeltB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('308', 'Hyper�����C', 8, 'N', '301', '', '', 1580, 100, 2, 140, 94500, 0, 'MeltB,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('309', '�W�j�������C', 7, 'N', '301', '', '', 1560, 100, 2, 130, 93000, 0, 'MeltA,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('310', '�I������������', 3, 'I', '301', '', '', 2880, 100, 1, 90, 71000, 0, 'MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('312', '���ɦ������C', 7, 'N', '301', '', '313,314', 2800, 95, 1, 135, 90000, 0, 'MeltB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('313', '���u�������C', 8, 'N', '301', '', '', 3100, 95, 1, 155, 99000, 0, 'Cease,MeltB,NTRequired,CostSP<5>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('314', '�ѤW�ѤU���ʯ}�H�C', 8, 'N', '301', '', '', 3200, 95, 1, 175, 110000, 0, 'MeltB,DamB,AntiPDef,PsyRequired,CostSP<7>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('318', '���K�C', 5, 'I', '301', '319', '', 1240, 100, 2, 105, 83000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('319', '�|�H�C', 6, 'N', '301', '320', '322', 1340, 100, 2, 110, 87000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('320', '�|�H�L�μC', 7, 'N', '301', '324', '321', 1450, 100, 2, 140, 91000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('321', '���t�D�|�H�L�μC', 8, 'N', '301', '', '', 1600, 100, 2, 180, 95000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('322', '�s���}�s�C', 9, 'N', '301', '', '323', 1100, 99, 3, 200, 110000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('323', '�s���}�s�C�D�f���_', 10, 'N', '301', '', '', 1250, 99, 3, 230, 125000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('324', '�p�������C', 7, 'I', '301', '', '', 1050, 100, 3, 140, 115000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('401', '105mm���j', 1, 'BDI', '401', '402', '', 550, 95, 3, 30, 60000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('402', '110mm�t�g��', 2, 'DI', '401', '403,417', '', 630, 95, 3, 45, 65000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('403', '�����B�j', 3, 'DI', '401', '405', '404', 730, 95, 3, 60, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('404', '�������B�j', 4, 'N', '401', '', '', 640, 85, 4, 125, 77000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('405', '��������B�j', 5, 'I', '401', '411', '406', 810, 95, 3, 90, 81000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('406', '�y�D�j', 6, 'N', '401', '407,408', '410', 933, 98, 3, 120, 85000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('407', '2�s�˭y�D�j', 7, 'N', '401', '', '', 505, 90, 6, 140, 89000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('408', '�}�a�y�D�j', 7, 'N', '401', '', '409', 1000, 90, 3, 130, 88000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('409', '�W���O�y�D�j', 8, 'N', '401', '', '', 1220, 98, 3, 180, 93500, 0, 'AntiPDef,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('410', '280mm�y�D�[�A��', 8, 'N', '401', '', '', 821, 88, 4, 160, 90000, 0, 'AntiPDef,MeltA,DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('411', 'Mega�DBeam Rifle', 6, 'N', '401', '', '412', 910, 96, 3, 90, 75000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('412', 'Buster Rifle', 7, 'N', '401', '', '', 630, 98, 5, 170, 95000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('417', '120mm����', 3, 'BDI', '401', '', '418', 610, 90, 3, 55, 65000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('418', '����������', 4, 'I', '401', '419,426', '', 650, 90, 3, 70, 71000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('419', '�żu��', 5, 'N', '401', '420', '422', 230, 90, 10, 90, 76000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('420', '�����żu��', 6, 'N', '401', '421', '', 205, 90, 15, 115, 85000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('421', '��������żu��', 7, 'I', '401', '', '', 215, 95, 15, 145, 94000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('422', '��˥Ҵ��u��', 6, 'N', '401', '', '', 270, 90, 10, 125, 90000, 0, 'AntiPDef,DamA,DamB,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('426', '�������', 5, 'I', '401', '427', '', 695, 95, 3, 80, 74000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('427', '�j������', 6, 'N', '401', '428', '431', 575, 95, 4, 105, 82000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('428', '�W��������', 7, 'N', '401', '429', '', 435, 95, 6, 135, 91000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('429', '�����������', 8, 'N', '401', '', '430', 525, 99, 6, 160, 100000, 0, 'Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('430', '�������������', 10, 'N', '401', '', '', 295, 99, 12, 190, 115000, 0, 'DamA,Cease,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('431', '180mm �[�A��', 7, 'N', '401', '', '', 1350, 97, 2, 155, 93000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('501', '���u�o�g��', 1, 'BDI', '501', '502,509', '', 900, 85, 2, 35, 80000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('502', '���୸�u�o�g��', 2, 'I', '501', '503', '', 1100, 85, 2, 55, 85000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('503', '��l�୸�u�o�g��', 4, 'N', '501', '', '504,516', 1300, 88, 2, 75, 90500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('504', '�h���o�g��', 6, 'N', '501', '', '505', 1550, 88, 2, 95, 95000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('505', '�ּu�o�g��', 8, 'N', '501', '', '', 4000, 88, 1, 120, 99999, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('509', '�s�˭��u�o�g��', 2, 'DI', '501', '510', '', 800, 87, 3, 64, 87000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('510', '5�s�˭��u�o�g��', 3, 'I', '501', '511', '', 550, 86, 5, 83, 94000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('511', '10�s�˭��u�o�g��', 4, 'N', '501', '512', '513', 300, 85, 10, 95, 98500, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('512', '�������b�o�g��', 6, 'N', '501', '', '', 185, 85, 20, 110, 105000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('513', '�p���ۤv���ɭ��u', 6, 'N', '501', '', '', 235, 100, 12, 150, 400000, 0, 'Tarb,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('516', '240mm���b��', 3, 'I', '501', '518,519,520', '517', 2450, 80, 1, 70, 90000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('517', 'NEO���b��', 3, 'I', '501', '', '', 2700, 88, 1, 88, 94500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('518', '���X�O���b��', 4, 'N', '501', '', '', 2950, 88, 1, 95, 96500, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('519', '���u���b��', 7, 'N', '501', '', '', 845, 96, 4, 100, 120000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('520', '�j�����b��', 6, 'N', '501', '521,522', '', 3250, 88, 1, 120, 99000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('521', '��l���b��', 7, 'N', '501', '', '', 3300, 93, 1, 135, 110000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('522', '�֤l���b��', 8, 'N', '501', '', '', 3550, 93, 1, 155, 131000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('601', '�̥[�ɤl��', 1, 'BDI', '601', '602', '613', 440, 78, 5, 70, 90000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('602', '���V�̥[�ɤl��', 2, 'I', '601', '603', '608,609', 400, 78, 6, 80, 93000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('603', '�s�˦̥[�ɤl��', 3, 'I', '601', '604', '', 350, 78, 8, 90, 97000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('604', '���u�̥[�ɤl��', 4, 'I', '601', '605', '', 380, 78, 8, 110, 120000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('605', '�X���̥[�ɤl��', 5, 'N', '601', '606', '', 275, 78, 12, 125, 126000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('606', '������X���̥[�ɤl��', 6, 'N', '601', '', '607', 188, 75, 16, 140, 132000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('607', '���X�O�X���̥[�ɤl��', 7, 'N', '601', '', '', 160, 70, 20, 185, 137000, 0, 'Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('608', '�j���̥[�ɤl��', 3, 'I', '601', '', '', 588, 75, 5, 160, 97000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('609', '��ˬ�', 3, 'I', '601', '610', '', 680, 75, 4, 140, 97000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('610', '�Ĩ���', 3, 'I', '601', '', '611', 600, 75, 5, 175, 97000, 0, 'DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('611', '�G�s�˽Ĩ���', 3, 'I', '601', '', '', 350, 75, 10, 200, 97000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('613', '������', 3, 'I', '601', '614', '616', 540, 75, 5, 90, 115000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('614', '�����[�A��', 4, 'I', '601', '615', '620', 575, 75, 5, 110, 119000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('615', '�̥[�[�A��', 4, 'N', '601', '', '', 680, 78, 5, 170, 122000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('616', '���Z�������[�A��', 5, 'N', '601', '', '617', 540, 80, 6, 155, 124000, 0, '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('617', '�̥[�����[�A��', 6, 'N', '601', '619', '618', 570, 80, 6, 175, 130000, 0, 'MeltB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('618', '�̥[���i��', 7, 'N', '601', '', '', 555, 95, 6, 220, 140000, 0, 'MeltA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('619', '�j�������[�A��', 8, 'N', '601', '', '', 430, 78, 8, 195, 129000, 0, 'DamA,DamB, AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('620', 'Newtype�t�ι������u��������', 7, 'N', '601', '', '', 835, 75, 4, 175, 120000, 0, 'DamA,NTCustom,CostSP<6>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('701', '�C�ɼC', 1, 'BI', '701', '702', '711', 1000, 95, 1, 25, 100000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('702', '���K�C', 2, 'I', '701', '703', '712', 1100, 95, 1, 35, 110000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('703', '���ۼC', 3, 'I', '701', '704', '', 1200, 96, 1, 45, 120000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('704', '�ջȼC', 4, 'I', '701', '705', '', 1300, 96, 1, 65, 130000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('705', '�����C', 5, 'N', '701', '706', '715', 1400, 97, 1, 75, 140000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('706', '�ժ��C', 6, 'N', '701', '707', '', 1500, 97, 1, 90, 150000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('707', '�p�ۼC', 7, 'N', '701', '', '708', 1600, 100, 1, 110, 160000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('708', '�����C', 8, 'N', '701', '', '718', 1800, 100, 1, 140, 170000, 0, 'DoubleMon');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('711', '�C��', 0, 'N', '0', '', '', 0, 0, 0, 0, 120000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('712', '���K', 0, 'N', '0', '', '', 0, 0, 0, 0, 135000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('715', '����', 0, 'N', '0', '', '', 0, 0, 0, 0, 180000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('718', '����', 0, 'N', '0', '', '', 0, 0, 0, 0, 225000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('801', '�Q�g�[�t�t��', 0, 'BI', '0', '', '', 0, 0, 0, 60, 600000, 2, 'Moba');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('806', 'Booster', 0, 'BI', '0', '', '', 0, 0, 0, 80, 600000, 2, 'MobA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('811', 'Dual Sensor', 0, 'BI', '0', '', '', 0, 0, 0, 30, 600000, 2, 'Tara');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('816', '�˷Ǿ�', 0, 'BI', '0', '', '', 0, 0, 0, 35, 600000, 2, 'TarA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('821', 'G�DWall', 0, 'BI', '0', '', '', 0, 0, 0, 70, 600000, 2, 'Defa,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('826', '�j�O�@��', 0, 'BI', '0', '', '', 0, 0, 0, 50, 600000, 2, 'DefA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('827', '�����@��', 0, 'BI', '0', '', '', 0, 0, 0, 50, 600000, 2, 'Defa');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('828', '�j���@��', 0, 'BI', '0', '', '', 0, 0, 0, 40, 500000, 2, 'AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('831', '���g�X���˥�', 0, 'BI', '0', '', '', 0, 0, 0, 150, 1000000, 2, 'DefB,ExtHP<600>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('90002', 'Super DRAGOON', 13, 'N', '0', '', '', 320, 125, 16, 800, 36500000, 0, 'COCustom,AntiPDef,MeltA,');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('901', 'G-bit�ìP�L�i��q��', 12, 'N', '0', '', '', 1150, 90, 6, 800, 380000, 0, 'NTCustom,DamA,DamB,MeltA,AntiPDef,CostSP<50>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('902', '�ѤW�ѤU�����z�H�C', 12, 'N', '0', '', '', 2800, 115, 2, 650, 370000, 0, 'AntiPDef,PsyRequired,DamA,MeltB,CostSP<30>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('903', '�Y�h��', 11, 'N', '0', '', '', 1070, 95, 5, 490, 360000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('904', '�����l', 10, 'N', '0', '', '', 5100, 105, 1, 480, 370000, 0, 'MeltB,Mobb,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('905', '�¬}��', 11, 'N', '0', '', '', 1700, 90, 3, 490, 360000, 0, 'Cease�ADamA,DamB,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('906', 'Solar panel', 0, 'N', '0', '', '', 0, 0, 0, 0, 2000000, 2, 'ENPcRecB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('907', 'NANO Skin', 0, 'N', '0', '', '', 0, 0, 0, 0, 2000000, 2, 'HPPcRecA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('908', 'Z�DO�DArmor', 0, 'N', '0', '', '', 0, 0, 0, 300, 1600000, 2, 'DefE,AntiDam,ExtHP<3000>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('909', '�W�X��newZ�˥�', 0, 'N', '0', '', '', 0, 0, 0, 350, 1600000, 2, 'DefE,PerfDef,ExtHP<2000>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('911', '���t�Q�g�[�t�t��', 0, 'I', '0', '', '', 0, 0, 0, 100, 500000, 2, 'Mobb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('912', 'Multi-Sensor', 0, 'I', '0', '', '', 0, 0, 0, 70, 500000, 2, 'Tarb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('921', 'Mega Booster', 0, 'I', '0', '', '', 0, 0, 0, 120, 650000, 2, 'MobB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('922', 'Beam Coating', 0, 'I', '0', '', '', 0, 0, 0, 110, 1000000, 2, 'Defb');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('931', '���t�Q�g�t��', 0, 'I', '0', '', '', 0, 0, 0, 150, 750000, 2, 'Mobc');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('932', 'T-Link Sensor', 0, 'I', '0', '', '', 0, 0, 0, 150, 800000, 2, 'Tarc,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('933', '�q�Ϭ�', 3, 'I', '0', '', '', 1250, 98, 3, 190, 100000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('941', 'Thruster', 0, 'I', '0', '', '', 0, 0, 0, 180, 900000, 2, 'MobC');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('942', '�ӷǨt��', 0, 'I', '0', '', '', 0, 0, 0, 80, 900000, 2, 'TarB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('943', '�q�ϥ[�A��', 4, 'I', '0', '', '', 1365, 98, 3, 240, 120000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('944', 'AB Field', 0, 'I', '0', '', '', 0, 0, 0, 160, 1050000, 2, 'Defc');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('945', 'Shield Buster Rifle', 6, 'I', '0', '', '', 620, 98, 5, 115, 120000, 1, 'DamA,AntiPDef,DefC');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('951', '��@��r', 5, 'I', '0', '', '', 1890, 99, 2, 275, 130000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('952', '�ޤO�l�B�jBST', 5, 'I', '0', '', '', 1310, 95, 3, 300, 140000, 0, 'DamA,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('953', '���~�u�l�ܭ��u', 7, 'I', '0', '', '', 400, 120, 8, 255, 200000, 0, 'Tarc,AntiMobS,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('954', '�E����', 6, 'I', '0', '', '', 340, 90, 10, 200, 130000, 1, 'MeltA,DamA,DefA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('955', '�p��ù�J�C', 6, 'I', '0', '', '', 3590, 100, 1, 275, 175000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('956', '���F���i�X���˥�', 0, 'I', '0', '', '', 0, 0, 0, 200, 1020000, 2, 'DefC,ExtHP<900>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('957', '�W�w���˥�', 0, 'I', '0', '', '', 0, 0, 0, 200, 1020000, 2, 'DefC,ExtHP<800>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('958', '���ʤOL���[�A��', 0, 'I', '0', '', '', 640, 95, 6, 215, 270000, 0, 'PsyRequired,DamA,AntiPDef,TarB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('96001', 'EXAM System', 0, 'N', '0', '', '', 0, 0, 0, 30, 1100000, 2, 'EXAMSystem, MobA, TarA, AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('961', '�X���ɤl�u', 9, 'I', '0', '', '', 260, 93, 15, 330, 160000, 0, 'AntiPDef,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('962', 'Buster Beam Rifle', 8, 'N', '0', '', '', 1030, 95, 4, 320, 1270000, 1, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('963', '�ѪżC', 7, 'N', '0', '', '', 3850, 100, 1, 310, 155000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('964', '���t���ʨt��', 0, 'I', '0', '', '', 0, 0, 0, 210, 1100000, 2, 'Mobd');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('965', '���ʯ�ӷǨt��', 0, 'I', '0', '', '', 0, 0, 0, 140, 1100000, 2, 'TarC,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('966', 'I-Field Barrier', 0, 'I', '0', '', '', 0, 0, 0, 220, 1250000, 2, 'Defd,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('967', 'E field', 0, 'I', '0', '', '', 0, 0, 0, 220, 1250000, 2, 'Defd,PerfDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('968', '��L������', 8, 'I', '0', '', '', 380, 95, 10, 310, 155000, 0, 'DamB,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('969', '�s���F���i�X��', 0, 'N', '0', '', '', 0, 0, 0, 0, 250000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('971', 'Bit', 8, 'I', '0', '', '', 345, 110, 12, 280, 50000, 0, 'NTRequired,Cease,CostSP<8>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('972', 'Divider', 8, 'I', '0', '', '', 322, 100, 13, 340, 650000, 0, 'AntiPDef,DamA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('973', '�p��ù�J�C*�t�C��', 9, 'I', '0', '', '', 4450, 105, 1, 355, 2300000, 0, 'AntiPDef,MobA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('974', '�ìP�L�i��q��', 9, 'I', '0', '', '', 2400, 90, 2, 450, 1650000, 0, 'NTCustom,AntiPDef,CostSP<15>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('975', 'Psyco-Frame', 0, 'I', '0', '', '', 0, 0, 0, 220, 1000000, 2, 'Tard,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('976', 'Hyper Thruster', 0, 'I', '0', '', '', 0, 0, 0, 240, 1000000, 2, 'MobD');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('977', '���ʯ�p�F', 0, 'I', '0', '', '', 0, 0, 0, 185, 1000000, 2, 'TarC,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('978', '���ʤOField', 0, 'I', '0', '', '', 0, 0, 0, 250, 1350000, 2, 'PsyRequired,PerfDef,DefX');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('979', 'FF Barrier', 0, 'I', '0', '', '', 0, 0, 0, 240, 1300000, 2, 'Defd,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('981', '�ѪżC�DV�r��', 9, 'I', '0', '', '', 2270, 100, 2, 385, 700000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('982', '�W�q���s��', 9, 'I', '0', '', '', 430, 96, 10, 380, 700000, 0, 'AntiMobS,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('983', '�ѤW�ѤU�L�ļC', 9, 'I', '0', '', '', 2300, 100, 2, 395, 710000, 0, 'PsyRequired,MeltA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('984', '����L������', 10, 'I', '0', '', '', 215, 95, 20, 355, 690000, 0, 'DamA,DamB,AtkA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('985', '�s����ĥ�M', 10, 'I', '0', '', '', 4600, 92, 1, 390, 690000, 0, 'AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('986', 'Transitive FEAR', 0, 'I', '0', '', '', 0, 0, 0, 320, 1300000, 2, 'Mobd,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('987', '�T�����p�F', 0, 'I', '0', '', '', 0, 0, 0, 250, 1100000, 2, 'TarD,AntiMobS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('988', 'G�DTerritory', 0, 'I', '0', '', '', 0, 0, 0, 280, 1500000, 2, 'Defe,PerfDef,AntiDam');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('989', '�W�X��Z�˥�', 0, 'I', '0', '', '', 0, 0, 0, 250, 1250000, 2, 'DefD,ExtHP<1500>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('991', 'V.S.B.R.', 9, 'N', '0', '', '', 1055, 105, 4, 400, 280000, 0, 'DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('992', 'Twin Buster Rifle', 10, 'N', '0', '', '', 790, 95, 6, 435, 280000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('993', '���ìP�L�i��q��', 11, 'N', '0', '', '', 1320, 92, 4, 530, 300000, 0, 'NTCustom,AntiPDef,DamB,CostSP<25>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('994', '�����u', 11, 'N', '0', '', '99001', 2275, 92, 2, 430, 250000, 0, 'DamA,DamB');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('99001', '��ĥ�Τj�������u', 11, 'N', '0', '', '', 1330, 86, 4, 650, 1000000, 0, 'DamA,DamB,AntiPDef');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('995', '��ĥ�M�D�@��r��', 11, 'N', '0', '', '', 4990, 105, 1, 450, 250000, 0, 'AntiPDef,DamA,DamB,Cease');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('996', '�B�嬶', 10, 'N', '0', '', '', 385, 120, 12, 350, 165000, 0, 'NTCustom,Cease,CostSP<12>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('997', '������', 10, 'N', '0', '', '', 405, 130, 12, 360, 168000, 0, 'NTCustom,Cease,CostSP<15>');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('998', 'HiMAT System', 0, 'N', '0', '', '', 0, 0, 0, 295, 1300000, 2, 'Mobe,AntiTarS');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('999', 'E - cap', 0, 'N', '0', '', '', 0, 0, 0, 0, 1700000, 2, 'ENPcRecA');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepA', '��Ŧ۰ʤ���������t��', 0, 'I', '0', '', '', 1000, 85, 40, 0, 500000, 0, 'Cease, DamA, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepB', '���u�γs�˹�ĥ���u���x', 0, 'I', '0', '', '', 1000, 110, 20, 0, 5500000, 0, 'TarD, AntiMobS, Cease, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepC', '���q�l�}�a��', 0, 'I', '0', '', '', 1760, 75, 20, 0, 15000000, 0, 'MeltA, AntiMobS, Cease, FortressOnly, CannotEquip');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('FortWepD', '�ޥ��P�p�g��', 0, 'I', '0', '', '', 50000, 100, 1, 0, 155000000, 0, 'MeltB, AntiMobS, Cease, AntiPDef, TarC, FortressOnly, CannotEquip');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_bank` (
  `username` varchar(16) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `savings` int(10) unsigned NOT NULL default '0',
  `sh_ina` varchar(255) NOT NULL default '',
  `sh_inb` varchar(255) NOT NULL default '',
  `sh_inc` varchar(255) NOT NULL default '',
  `sh_outa` varchar(255) NOT NULL default '',
  `sh_outb` varchar(255) NOT NULL default '',
  `sh_outc` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` (
  `username` varchar(16) binary NOT NULL default '',
  `gamename` varchar(32) binary NOT NULL default '',
  `hp` mediumint(6) unsigned NOT NULL default '0',
  `hpmax` mediumint(6) unsigned NOT NULL default '0',
  `en` mediumint(6) unsigned NOT NULL default '0',
  `enmax` mediumint(6) unsigned NOT NULL default '0',
  `sp` float(8,5) unsigned NOT NULL default '0',
  `spmax` smallint(3) unsigned NOT NULL default '1',
  `attacking` tinyint(3) unsigned NOT NULL default '1',
  `defending` tinyint(3) unsigned NOT NULL default '1',
  `reacting` tinyint(3) unsigned NOT NULL default '1',
  `targeting` tinyint(3) unsigned NOT NULL default '1',
  `ms_custom` varchar(255) NOT NULL default '',
  `level` tinyint(3) unsigned NOT NULL default '1',
  `expr` int(10) unsigned NOT NULL default '0',
  `wepa` varchar(255) NOT NULL default '0<!>0',
  `wepb` varchar(255) NOT NULL default '0<!>0',
  `wepc` varchar(255) NOT NULL default '0<!>0',
  `eqwep` varchar(255) NOT NULL default '0<!>0',
  `p_equip` varchar(255) NOT NULL default '0<!>0',
  `spec` mediumtext NOT NULL,
  `rank` mediumint(6) NOT NULL default '0',
  `rights` char(1) NOT NULL default '0',
  `organization` int(10) NOT NULL default '0',
  `org_group` char(1) NOT NULL default '0',
  `tactics` mediumtext NOT NULL,
  `last_tact` varchar(16) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `victory` mediumint(6) unsigned NOT NULL default '0',
  `v_points` mediumint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`username`),
  UNIQUE KEY `gamename` (`gamename`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` (
  `username` varchar(16) binary NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `regkey` varchar(16) binary NOT NULL default '',
  `cash` int(10) unsigned NOT NULL default '0',
  `bounty` int(10) unsigned NOT NULL default '0',
  `color` tinytext,
  `avatar` varchar(16) default NULL,
  `msuit` varchar(16) default NULL,
  `typech` varchar(4) NOT NULL default 'nat1',
  `hypermode` tinyint(1) NOT NULL default '0',
  `growth` smallint(4) default NULL,
  `coordinates` varchar(4) NOT NULL default 'A1',
  `fame` smallint(4) NOT NULL default '0',
  `request` text NOT NULL,
  `time1` int(10) default NULL,
  `time2` int(10) default NULL,
  `btltime` int(10) default NULL,
  `acc_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_log` (
  `username` varchar(16) binary NOT NULL default '',
  `log1` text NOT NULL,
  `log2` text NOT NULL,
  `log3` text NOT NULL,
  `log4` text NOT NULL,
  `log5` text NOT NULL,
  `time1` int(10) NOT NULL default '0',
  `time2` int(10) NOT NULL default '0',
  `time3` int(10) NOT NULL default '0',
  `time4` int(10) NOT NULL default '0',
  `time5` int(10) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` (
  `map_id` varchar(4) NOT NULL default '',
  `occupied` int(10) NOT NULL default '0',
  `aname` varchar(32) NOT NULL default '',
  `development` smallint(5) NOT NULL default '0',
  `hp` int(8) unsigned NOT NULL default '0',
  `hpmax` int(8) unsigned NOT NULL default '0',
  `at` tinyint(3) unsigned NOT NULL default '0',
  `de` tinyint(3) unsigned NOT NULL default '0',
  `ta` tinyint(3) unsigned NOT NULL default '0',
  `wepa` varchar(32) NOT NULL default '',
  `spec` mediumtext NOT NULL,
  PRIMARY KEY  (`map_id`)
) ENGINE=MyISAM DEFAULT CHARSET=big5;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('A1', 0, '', 0, 100000, 100000, 10, 10, 10, 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('A2', 0, '', 0, 100000, 100000, 10, 10, 10, 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('A3', 0, '', 0, 100000, 100000, 10, 10, 10, 'FortWepA', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('B1', 0, '', 0, 200000, 200000, 25, 20, 20, 'FortWepB', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('B2', 0, '', 0, 500000, 500000, 50, 50, 50, 'FortWepC', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('B3', 0, '', 0, 200000, 200000, 25, 20, 20, 'FortWepB', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('C1', 0, '', 0, 400000, 400000, 45, 40, 40, 'FortWepC', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('C2', 0, '', 0, 200000, 200000, 25, 20, 20, 'FortWepD', '');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_map` VALUES ('C3', 0, '', 0, 350000, 350000, 40, 30, 30, 'FortWepD', '');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_organization` (
  `id` int(10) NOT NULL default '0',
  `name` varchar(32) NOT NULL default '',
  `color` varchar(7) NOT NULL default '',
  `funds` int(10) unsigned NOT NULL default '0',
  `license` tinyint(1) NOT NULL default '0',
  `request_list` text NOT NULL,
  `groupa` varchar(32) NOT NULL default '',
  `groupb` varchar(32) NOT NULL default '',
  `groupc` varchar(32) NOT NULL default '',
  `operation` varchar(32) NOT NULL default '',
  `optmissioni` varchar(32) NOT NULL default '',
  `opttime` int(10) unsigned NOT NULL default '0',
  `optstart` int(10) unsigned NOT NULL default '0',
  `optmissiona` varchar(32) NOT NULL default '',
  `optmissionb` varchar(32) NOT NULL default '',
  `optmissionc` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM;");

mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_organization` VALUES (0, '���߲�´', '#AAAAAA', 0, 0, '', '', '', '', '', '', 0, 0, '', '', '');");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_settings` (
  `username` varchar(16) binary NOT NULL default '',
  `gen_img_dir` varchar(128) NOT NULL default '',
  `unit_img_dir` varchar(128) NOT NULL default '',
  `base_img_dir` varchar(128) NOT NULL default '',
  `show_log_num` tinyint(1) NOT NULL default '0',
  `atkonline_alert` tinyint(1) NOT NULL default '1',
  `battle_def_filter` tinyint(1) NOT NULL default '1',
  `fdis_at` tinyint(1) NOT NULL default '0',
  `fdis_de` tinyint(1) NOT NULL default '0',
  `fdis_re` tinyint(1) NOT NULL default '0',
  `fdis_ta` tinyint(1) NOT NULL default '0',
  `fdis_lv` tinyint(1) NOT NULL default '0',
  `fdis_hp` tinyint(1) NOT NULL default '0',
  `fdis_fame` tinyint(1) NOT NULL default '0',
  `fdis_bty` tinyint(1) NOT NULL default '0',
  `fdis_ms` tinyint(1) NOT NULL default '0',
  `fdis_tch` tinyint(1) NOT NULL default '0',
  `fdis_con` tinyint(1) NOT NULL default '0',
  `filter_at_min` tinyint(3) NOT NULL default '0',
  `filter_at_max` tinyint(3) NOT NULL default '0',
  `filter_de_min` tinyint(3) NOT NULL default '0',
  `filter_de_max` tinyint(3) NOT NULL default '0',
  `filter_re_min` tinyint(3) NOT NULL default '0',
  `filter_re_max` tinyint(3) NOT NULL default '0',
  `filter_ta_min` tinyint(3) NOT NULL default '0',
  `filter_ta_max` tinyint(3) NOT NULL default '0',
  `filter_lv_min` tinyint(3) NOT NULL default '0',
  `filter_lv_max` tinyint(3) NOT NULL default '0',
  `filter_hp_min` int(7) NOT NULL default '0',
  `filter_hp_max` int(7) NOT NULL default '0',
  `filter_fame_min` smallint(4) NOT NULL default '0',
  `filter_fame_max` smallint(4) NOT NULL default '0',
  `filter_bty_min` int(10) NOT NULL default '0',
  `filter_bty_max` int(10) NOT NULL default '0',
  `filter_con` tinyint(1) NOT NULL default '0',
  `filter_sort` tinyint(1) NOT NULL default '0',
  `filter_sort_asc` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` (
  `username` varchar(16) NOT NULL default '',
  `time` int(10) NOT NULL default '0',
  `directions` text NOT NULL,
  `m1` varchar(16) NOT NULL default '',
  `m2` varchar(16) NOT NULL default '',
  `m3` varchar(16) default NULL,
  `m4` varchar(16) default NULL,
  `m5` varchar(16) default NULL,
  `m6` varchar(16) default NULL,
  `m7` varchar(16) default NULL,
  `m8` varchar(16) default NULL,
  `m9` varchar(16) default NULL,
  `m10` varchar(16) default NULL,
  `m11` varchar(16) default NULL,
  `m12` varchar(16) default NULL,
  `m13` varchar(16) default NULL,
  `m14` varchar(16) default NULL,
  `m15` varchar(16) default NULL,
  `m16` varchar(16) default NULL,
  `m17` varchar(16) default NULL,
  `m18` varchar(16) default NULL,
  `m19` varchar(16) default NULL,
  `m20` varchar(16) default NULL,
  `c_wep` varchar(8) NOT NULL default '',
  `c_point` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_warehouse` (
  `username` varchar(16) NOT NULL default '',
  `warehouse` text NOT NULL,
  `timelast` int(10) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_market` (
  `id` INT(15) UNSIGNED NOT NULL AUTO_INCREMENT, 
  `owner` varchar(16) NOT NULL default '',
  `price` int(10) unsigned NOT NULL default '0',
  `wepid` varchar(255) NOT NULL default '',
  `name` varchar(40) NOT NULL default '',
  `atk` mediumint(6) UNSIGNED DEFAULT '0' NOT NULL,
  `hit` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `rd` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `enc` smallint(5) unsigned NOT NULL default '0',
  `spec` text NOT NULL,
  `time` INT( 10 ) UNSIGNED DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_marketb` (
  `id` INT(15) UNSIGNED NOT NULL AUTO_INCREMENT, 
  `owner` varchar(16) NOT NULL default '',
  `price` int(10) unsigned NOT NULL default '0',
  `name` varchar(40) NOT NULL default '',
  `state` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `time` INT( 10 ) UNSIGNED DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `time` int(10) NOT NULL default '0',
  `user` varchar(16) NOT NULL default '',
  `g_name` varchar(32) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  `amount` int(10) unsigned NOT NULL default '0',
  `cash` int(10) unsigned NOT NULL default '0',
  `bankamt` int(10) unsigned NOT NULL default '0',
  `t_cash` int(10) unsigned NOT NULL default '0',
  `t_bankamt` int(10) unsigned NOT NULL default '0',
  `target` varchar(16) NOT NULL default '',
  `tg_name` varchar(32) NOT NULL default '',
  `safehouse` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_hangar` (
  `h_id` int(10) unsigned NOT NULL auto_increment,
  `h_user` varchar(16) NOT NULL default '',
  `h_msuit` varchar(16) NOT NULL default '',
  `h_hp` mediumint(6) unsigned NOT NULL default '0',
  `h_hpmax` mediumint(6) unsigned NOT NULL default '0',
  `h_en` mediumint(6) unsigned NOT NULL default '0',
  `h_enmax` mediumint(6) unsigned NOT NULL default '0',
  `h_ms_custom` varchar(255) NOT NULL default '',
  `h_wepa` varchar(255) NOT NULL default '',
  `h_wepb` varchar(255) NOT NULL default '',
  `h_wepc` varchar(255) NOT NULL default '',
  `h_eqwep` varchar(255) NOT NULL default '',
  `h_p_equip` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;");

?>
�p�L������~�X�{
<br>
��ƪ�إߧ���! 
<br>
�ЧR�����ɮ�
