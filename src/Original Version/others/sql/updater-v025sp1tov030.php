<?php
//----------------------------------//
//----- Database Updating Unit -----//
//----------------------------------//
//----------- Old Version ----------//
//----------------------------------//
//--- v2Alliance Official Version---//
//--------  v0.25Final SP1  --------//
//----------------------------------//
//--------- Target Version ---------//
//----------------------------------//
//--- v2Alliance Official Version---//
//-----------   v0.30   ------------//
//----------------------------------//
//----- Official Database ver6 -----//
//----------------------------------//
//-- Copyright(c) v2Alliance 2007 --//
//------- All Rights Reserved ------//
//----------------------------------//
include_once('cfu.php');
$s_name = basename($_SERVER["PHP_SELF"]);
if (isset($_POST['action']) || isset($_GET['action']))
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
else $mode = false;

if (!$mode){
	echo "<form action=".$s_name."?action=install method=post name=mainform>";
	echo "<table width=100% height=100% border=0 align=center>";
		echo "<tr><td width=100% height=100% align=center valign=center>";
			echo "<table width=50% border=1 style=\"border-collapse: collapse;font-size: 12; font-family: Arial\" bordercolor=\"#000000\">";
				echo "<tr><td>";
					echo "php-eb v0.25Final SP1 �� v0.30 ��Ʈw��s�u��";
				echo "</td></tr>";
				echo "<tr><td>";
					echo "����s�u��O���� v0.25Final SP1 (�x�誩��) ��s���u��<Br>";
					echo "�p�G�դU�� php-eb �����ëD v0.25Final SP1 (�DSP1�]���i), �ФŨϥΦ��u��I<br>";
					echo "�t�ΩҰ�����դU php-eb ������T�p�U:<br>";
					if (!$cSpec) $cSpec = '<b><font color=red>�S��</font></b>';
					elseif ($cSpec == '0.25 Final') $cSpec = "<b><font color=blue>$cSpec</font></b>";
					elseif ($cSpec == '0.30') $cSpec = "<font color=green>$cSpec</font>";
					echo "�@�����W��: $cSpec<br>";
					if (!$vBdNum) $vBdNum = '�S��';
					echo "�@�����שw: $vBdNum<br>";
					echo "�`�N: �p�G�A�w��s cfu.php, �W�z����ܪ�������T�|���ǽT(�|��ܷs�������W��)<hr width=100% align=center>";
					echo "��s�e�Х�<b>�ƥ���Ʈw</b>!!<br>";
					echo "�p�G�A�w�g�w�ˤF�ӳ��t��(<a href=\"http://forum.dai-ngai.net/viewthread.php?tid=1515&extra=page%3D1\">�аѾ\�o��</a>), ";
					echo "�ЬD��o��: <input type=checkbox name=mrkt_instd value=true>";
				echo "</td></tr><tr><td align=center>";
					echo "<input type=submit value='�}�l��s'>";
				echo "</td></tr>";
			echo "</table>";	
		echo "</td></tr>";
	echo "</table></form>";	
}
else{
echo "Datatable �e��: ".$GLOBALS['DBPrefix'];
echo "<br>��s�{�Ƕi�椤...<br>";

if (empty($mrkt_instd)){
mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_market` (
  `id` INT(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `owner` VARCHAR(16) NOT NULL,
  `price` INT(10) UNSIGNED NOT NULL,
  `wepid` VARCHAR(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `atk` mediumint(6) UNSIGNED DEFAULT '0' NOT NULL,
  `hit` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `rd` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `enc` smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
  `spec` text NOT NULL,
  `time` INT( 10 ) UNSIGNED DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;");

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_marketb` (
  `id` INT(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `owner` VARCHAR(16) NOT NULL,
  `price` INT(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `state` tinyint(3) UNSIGNED DEFAULT '0' NOT NULL,
  `time` INT( 10 ) UNSIGNED DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;");

echo "�w�����إ� �ӳ� ������ƪ�I (".$GLOBALS['DBPrefix']."phpeb_user_marketb, ".$GLOBALS['DBPrefix']."phpeb_user_market)<br>";
}
else echo "���L�إ� �ӳ� ������ƪ�C<br>";

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (
`id` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`time` INT( 10 ) NOT NULL ,
`user` VARCHAR( 16 ) NOT NULL ,
`g_name` VARCHAR( 32 ) NOT NULL ,
`type` TINYINT( 1 ) NOT NULL ,
`amount` INT( 10 ) UNSIGNED NOT NULL ,
`cash` INT( 10 ) UNSIGNED NOT NULL ,
`bankamt` INT( 10 ) UNSIGNED NOT NULL ,
`t_cash` INT( 10 ) UNSIGNED NOT NULL ,
`t_bankamt` INT( 10 ) UNSIGNED NOT NULL ,
`target` VARCHAR( 16 ) NOT NULL ,
`tg_name` VARCHAR( 32 ) NOT NULL ,
`safehouse` VARCHAR( 255 ) NOT NULL
) TYPE = MYISAM ;");

echo "�w�����إ� �Ȧ���� ��ƪ�I (".$GLOBALS['DBPrefix']."phpeb_user_bank_log)<br>";

mysql_query("CREATE TABLE `".$GLOBALS['DBPrefix']."phpeb_user_hangar` (
`h_id` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`h_user` VARCHAR( 16 ) NOT NULL ,
`h_msuit` VARCHAR( 16 ) NOT NULL ,
`h_hp` MEDIUMINT( 6 ) UNSIGNED NOT NULL ,
`h_hpmax` MEDIUMINT( 6 ) UNSIGNED NOT NULL ,
`h_en` MEDIUMINT( 6 ) UNSIGNED NOT NULL ,
`h_enmax` MEDIUMINT( 6 ) UNSIGNED NOT NULL ,
`h_ms_custom` VARCHAR( 255 ) NOT NULL ,
`h_wepa` VARCHAR( 255 ) NOT NULL ,
`h_wepb` VARCHAR( 255 ) NOT NULL ,
`h_wepc` VARCHAR( 255 ) NOT NULL ,
`h_eqwep` VARCHAR( 255 ) NOT NULL ,
`h_p_equip` VARCHAR( 255 ) NOT NULL
) TYPE = MYISAM ;");

echo "�w�����إ� ��Ǯw ��ƪ�I (".$GLOBALS['DBPrefix']."phpeb_user_hangar)<br>";

//--- game_info ---
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` CHANGE `sp` `sp` float( 8,5 ) UNSIGNED NOT NULL DEFAULT '0.00000';");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` CHANGE `spec` `spec` mediumtext NOT NULL;");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` CHANGE `tactics` `tactics` mediumtext NOT NULL;");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` CHANGE `victory` `victory` MEDIUMINT( 6 ) UNSIGNED NOT NULL;");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` ADD `ms_custom` VARCHAR( 255 ) NOT NULL DEFAULT '' AFTER `targeting` ;");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` ADD `p_equip` VARCHAR( 255 ) NOT NULL DEFAULT '0<!>0' AFTER `eqwep` ;");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` ADD `v_points` MEDIUMINT( 6 ) UNSIGNED NOT NULL AFTER `victory` ;");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `v_points` = `victory`;");
echo "�w������s ���a�C����T ��ƪ�I (".$GLOBALS['DBPrefix']."phpeb_user_game_info)<br>";
echo "�@- ��s��ƥ]�A: SP �B�I��, Special Abilities�MTactics �����覡, �[�Jms_custom,p_equip,v_points���, ��sv_points<br>";

//--- Weapons ---
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `name` = 'T-Link Knuckle' WHERE `id` = '216';");
echo "��� �Z�� Id:216 �W�٬��uT-Link Knuckle�v����<br>";
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1000', `hit` = '95', `enc` = '25', `price` = '100000' WHERE `id` = '701';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1100', `hit` = '95', `enc` = '35', `price` = '110000' WHERE `id` = '702';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1200', `hit` = '96', `enc` = '45', `price` = '120000' WHERE `id` = '703';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1300', `hit` = '96', `enc` = '65', `price` = '130000' WHERE `id` = '704';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1400', `hit` = '97', `enc` = '75', `price` = '140000' WHERE `id` = '705';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1500', `hit` = '97', `enc` = '90', `price` = '150000' WHERE `id` = '706';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1600', `hit` = '100', `enc` = '110', `price` = '160000' WHERE `id` = '707';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1800', `hit` = '100', `enc` = '140', `price` = '170000' WHERE `id` = '708';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '120000' WHERE `id` = '711';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '135000' WHERE `id` = '712';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '180000' WHERE `id` = '715';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '225000' WHERE `id` = '718';");
echo "��� �Z�� Id: 7�t�C ��O�γ]�w����<br>";

mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `enc` = '0', `price` = '500000', `spec` = 'AntiDam' WHERE `id` = '828';");
echo "��� �Z�� Id: 828 ��O�]�w����<br>";
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `spec` = 'NTCustom,DamA,DamB,MeltA,AntiPDef,CostSP<50>' WHERE `id` = '901';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `hit` = '110' WHERE `id` = '971';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `atk` = '1055', `hit` = '105' WHERE `id` = '991';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `hit` = '86' WHERE `id` = '99001';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `hit` = '120', `spec` = 'NTCustom,Cease,CostSP<12>' WHERE `id` = '996';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `hit` = '130', `spec` = 'NTCustom,Cease,CostSP<15>' WHERE `id` = '997';");
echo "��� �Z�� Id: ����9�t�C ��O�]�w����<br>";
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '500000' WHERE `id` = 'FortWepA';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '5500000' WHERE `id` = 'FortWepB';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '15000000' WHERE `id` = 'FortWepC';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_wep` SET `price` = '155000000' WHERE `id` = 'FortWepD';");
echo "��� �n�ɪZ������, ����<br>";
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('90002', 'Super DRAGOON', 13, 'N', '0', '', '', 320, 125, 16, 800, 36500000, 0, 'COCustom,AntiPDef,MeltA,');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('969', '�s���F���i�X��', 0, 'N', '0', '', '', 0, 0, 0, 0, 250000, 0, 'RawMaterials');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_wep` VALUES ('96001', 'EXAM System', 0, 'N', '0', '', '', 0, 0, 0, 30, 1100000, 2, 'EXAMSystem, MobA, TarA, AtkA');");
echo "�[�J ID: 90002, 969, 96001 �s�Z������<br>";
echo "��ƪ� ���a�Z����T (".$GLOBALS['DBPrefix']."phpeb_sys_wep) ��粒���I<br>";

//--- tactfactory - system ---
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('71', '96001', '6', 'EXAM System<br> �o�@�ѧA�S�Ө�F�u�{�v���|�A�o�{�F�@�j��Ǫ̥��{�u�a���q�ۤ@���ݯʤ�����MS�C<br> �������A���n�_�ߡA�A���W�e�h�A�չϱqť�Ǫ̭̪��ܤ���ť�o��MS���Ӿ��C<br> <br> �u�o���H�Ŧ⬰�D�n��t������O.....�S�v<br> �u�A�o�s�Ӫ��T�o�N�O�������ħڳ��J�ç�����\"�c�]\"�ڡT�v<br> �u��...���ɥL�i�{���D�Z�}�a�O...²���s�ڤߴH.....�v<br> �u���u�O�}�a�O�A�N�O�^�פO�A�R���v�����@��MS�n���O�T�v<br> �u��������|���o�p���U��?�v<br> �u�]�����Өt�αj���X�O����,�Ͼ��鳣�t�ᤣ�F......�v<br> �uť���s�r�p��...���Q�˱o���Ӥ��M�O...�v<br> �u���D...�o�N�O�ǻ����˳ƤFEXAM System��\"Blue Destiny\"�T�S�v<br> �u���ڧ�t�ε��q�����@�U......�v<br> <br> �uMulti-Sensor�BDual Sensor�BMulti-Sensor�BDual Sensor�BMulti-Sensor�BDual Sensor�B�����B�����B�����B�����v<br> <br> ����A�۷Q�ۦۤv������˳�EXAM System��O�q�O���j�j���P�ɡA<br> �A��M�P��ۤv���Q�@�D���j�j���O�q�ԧ�A�N�o�˳Q�@��ĵ�ô��X���|���~�R<br> <br> �u�A�b�o�طFԣ�S���D�A�O�İꬣ�Ӫ����ҡS�v<br> <br> ���O�ۤv���M�աA�A�s���V�L�����R<br> <br> �u��......�O�o�˪�......�v<br>', '912', '811', '912', '811', '912', '811', '718', '715', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('72', '90002', '10', '�A�ظ@�F�@�������R<br> <br> �u���A�o Coordinator ������F�`�A�٤��Χڭ̳o��Newtype�T�v�@�Өk�H�H�������V�@�����ۭ��㪺�k�H�C<br> �u�A�u�O�H�y�������Ӥw�T�v�S�@�Өk�H���ۨ������ۭ��㪺�k�H�C<br> �u�ڭ�Newtype��ϥίB�嬶�A�A�O�S�v�A�@�Өk�H���V�������ۭ��㪺�k�H�C<br> �u�ԡT�v�b�d�ҩҫ��U�A�����ۭ��㪺�k�H�ש�I���ۮ�A�@�x���b��W�R<br> �u�A�̳o�ǨS���Ѫ��H�A���S��ť�LSuper DRAGOON? �N�O�ڭ�Coordinator�M�Ϊ��Z���A��O��b�B�嬶���W�I�v<br> �u����Super DRAGOON�S�O���ű�y���S�v�A���ئn�_�a�ݡC<br> �����ۭ��㪺�k�H�^�L�Y�ӡA�h�F�A�@���A���F�@�i�r���R<br> <br> ����k���O��ű�y�k----Super DRAGOON<br> <br> �@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������<br> �G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Newtype�t�ι������u��������<br> �T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bit<br> �|���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bit<br> �����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �����l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �C���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �K���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������B�j<br> �E���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q�@���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q�G���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> �Q�T���l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<br> <br> ���M�A�ܩ_�Ǭ��������ۭ��㪺�k�H���D�A�b�Q����A<br> �����ޫ�ˡA�A���B�a��o�Fű�ySuper DRAGOON����k�C<br>', '997', '620', '971', '971', '405', '405', '405', '405', '718', '718', '715', '715', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` VALUES ('73', '969', '6', '�s���F���i�X��<br> �o�@�ѧA�S�Ө�F�u�{�v���|�A�ݨ�@�W�u�{�v�A�I�Y�W�F�A���ۿ����g�r�C<br> �L�@���g�A�@���N��۵ۤp�աC<br> ��M�A�L�^�Y�@��A�K��A�����G�u�o�q���A�@�w�|�ܳ��w�I�v<br> �M��A�L�K���t���h�A��W���c�r���A�k�h�L�ܤF�C<br> _______________________________________________________<br> �z�Q�ܱj��?<br> �@���B�s���R�ڡ@�@�@�@�@����R�N��L�n<br> �p�סR�@�@�@�ݤ�@�@�@�@�s�@�R������<br> <br> �g���F���[���V�O�M�I�X��<br> �o��F�ߥؤ������L�Q��<br> �S�⥦�αo�u���������....<br> <br> �o�o�{�A�o�{�F�z�ĤH�Ҿ֦���<br> �ä���z���z�A�Ʀܧ�ө�z<br> ���z�F�F�۹G,�ϱz�L�O�۬[<br> <br> �z���P��ۤv���O�q������?<br> �z���P��ۤv�ҥI�X���w�ѪF�y��?<br> �z���Q�L�O�ۤv���Z���P����<br> ���Ӧۤv����Q�@�X�j�ƻP�i�B��??<br> <br> Repeat *<br> �J�M�z�I�F��,��M���|���z�P��Ǥ�<br> �бz��O�H�U��������@�t��<br> �@�T�C�C�� �|�����K<br> �G���Q���� �K�E����<br> ��!��O�A�ܱj!!<br> <br> ��!��O�A��i�@�B�a�ܱj!!<br> _______________________________________________________<br> �u���سQ�F���Pı�C�C�v�A�߷Q�ۡC<br>', '711', '715', '711', '712', '712', '715', '711', '718', '718', '715', NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL );");
echo "�[�J�X����k ID: 71��73 ����<br>";

//--- tactfactory - user ---
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` CHANGE `directions` `directions` text NOT NULL;");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` CHANGE `c_point` `c_point` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0';");
echo "��� ���a�L���s�y�u�� ��ƪ� (".$GLOBALS['DBPrefix']."phpeb_user_tactfactory) �����I ���e�]�A: directions,c_point Datatype<br>";

//--- user map ---
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` CHANGE `hp` `hp` INT( 8 ) UNSIGNED NOT NULL DEFAULT '0';");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` CHANGE `hpmax` `hpmax` INT( 8 ) UNSIGNED NOT NULL DEFAULT '0';");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` CHANGE `at` `at` TINYINT( 3 ) UNSIGNED NOT NULL DEFAULT '0';");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` CHANGE `de` `de` TINYINT( 3 ) UNSIGNED NOT NULL DEFAULT '0';");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` CHANGE `ta` `ta` TINYINT( 3 ) UNSIGNED NOT NULL DEFAULT '0';");
mysql_query("ALTER TABLE `".$GLOBALS['DBPrefix']."phpeb_user_map` CHANGE `spec` `spec` mediumtext NOT NULL;");
echo "��� ���a�a�ϸ�� ��ƪ� (".$GLOBALS['DBPrefix']."phpeb_user_map) �����I ���e�]�A: hp,hpmax,at,de,ta,spec �� Datatype<br>";

//--- MS ---
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_ms` SET `needlv` = 20 WHERE `id` = '3';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_ms` SET `needlv` = 16 WHERE `id` = '5';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_ms` SET `needlv` = 5 WHERE `id` = '44';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_ms` SET `spec` = 'EXAMSystem,' WHERE `id` = '49';");
mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_sys_ms` SET `price` = 4800000, `def` = 10, `ref` = 15, `taf` = 13, `hpfix` = 4500, `hprec` = 37.189, `spec` = 'EXAMSystem,', `needlv` = 40 WHERE `id` = '50';");
echo "��s ����ID: 3,5,44,49,50 �]�w��, �����I<br>";
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('61', 'GM Cannon II', 1050000, 7, 8, 6, 7, 3300, 155, 26.720, 2.460, '', 12, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('60', 'Masarai', 560000, 4, 4, 4, 4, 3000, 100, 24.000, 1.538, '', 8, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('62', 'GunTank', 625000, 6, 6, 2, 4, 3500, 150, 26.900, 2.459, '', 8, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('63', 'Asshimar', 685000, 8, 4, 7, 4, 3100, 125, 25.000, 2.016, '', 12, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('64', 'FA Alex', 2150000, 6, 10, 7, 8, 4500, 175, 35.156, 2.822, '', 20, 'none.gif');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_ms` VALUES ('65', 'Gundam Mk-II', 2750000, 12, 7, 10, 13, 4200, 235, 33.600, 3.507, '', 25, 'none.gif');");
echo "�[�J�s���� ID: 61��65, ����<br>";
echo "��� �t�ξ����ƪ� (".$GLOBALS['DBPrefix']."phpeb_sys_ms) �����I<br>";

//--- Tactics ---
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('CounterStrike', '��������', 0, 0, 45, 0, 0, 0, 0, 20, 0, 12000000, 85, 'CounterStrike');");
mysql_query("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` VALUES ('FirstStrike', '�������', 0, 30, 45, 0, 0, 5, -5, 0, 0, 12000000, 85, 'FirstStrike');");
echo "�[�J�s�ԳN ID: CounterStrike�PFirstStrike, ����<br>";
echo "��� �t�ξԳN��ƪ� (".$GLOBALS['DBPrefix']."phpeb_sys_tactics) �����I<br>";
echo "<hr>�Ҧ����ا�s�����I<br>�Цۦ�<b>�R���o���ɮ�</b>�I�H�K�o�͵L�k�w�p�����~�I";
}

?>