<?php
//-------------------------//-------------------------//-------------------------//
//----------------------------   Core Function Unit   ---------------------------//
//----------------------------   phpeb Version 0.30   ---------------------------//
//---------------------------   Official Open Build    --------------------------//
//-------------------------//-------------------------//-------------------------//
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//
//Detection of Process Time				//			 //
global $gmcfu_time, $cfu_stime;				//			 //
$gmcfu_time = explode(' ', microtime());		//    �o�����L�ݳ]�w.	 //
$cfu_stime = $gmcfu_time[1] + $gmcfu_time[0];		//    �ק�e�Фp��,	 //
//Register Globals - Provided By winglunk		//    �]�����~�����,	 //
if (!ini_get('register_globals'))			//    �i��|�Ͼ�ӵ{��,	 //
{extract($_POST);extract($_GET);extract($_SERVER);	//    �L�k���`�B�@!	 //
extract($_FILES);extract($_ENV);extract($_COOKIE);	//			 //
if (isset($_SESSION)){extract($_SESSION);}}		//			 //
error_reporting(1);  //�����������~�^��: PHP5 ��ĳ�ﶵ	//			 //
//-------------------------//-------------------------//-------------------------//
//Configs - �C���Ψt�γ]�w

//������T
global $cSpec, $vBdNum;
$cSpec = '0.30';					//�����W��, �����W�ٷ|�Χ@�ѧO�γ~, �p�Q�ϥΩx�贡��B��s, ���קK���!
$vBdNum = '';						//�׭q����, �P�W

//��T�]�w
global $sSpec, $WebMasterName, $WebMasterSite;
$sSpec = 'Official Version';				//��L������T, �o���i�ۥѭק�
$WebMasterName = '������';				//���D�W��
$WebMasterSite = 'http://v2alliance.no-ip.org/';	//���W���}, ���U "$sSpec" �ɩҶ}�Ҫ�����

//Database Configs ��Ʈw�]�w
global $DBHost, $DBUser, $DBPass, $DBName, $DBPrefix;

$DBHost = 'localhost';		//��Ʈw��m, �p localhost, 127.0.0.1, www.yourdomain.com
$DBUser = 'root';		//��Ʈw�ϥΪ̦W��
$DBPass = '';			//��Ʈw�K�X
$DBName = '';			//��Ʈw�W��
$DBPrefix = 'vsqa_';		//��ƪ�e��W, �w�˫e�Ы_�����!! �w�˫ᤣ��A���!!

//Setting Configs
global $MAX_PLAYERS, $Offline_Time, $TIME_OUT_TIME, $RepairHPCost, $RepairENCost, $OrganizingCost, $HP_BASE_RECOVERY, $EN_BASE_RECOVERY;
global $General_Image_Dir, $Unit_Image_Dir, $Base_Image_Dir, $Org_War_Cost, $Max_Wep_Exp, $ControlSEED;
global $Mod_HP, $Mod_HP_Cost, $Mod_HP_UCost, $Mod_EN, $Mod_EN_Cost, $Mod_EN_UCost,$TFDCostCons;

//�򥻳]�w
$TIME_OUT_TIME = 3600;		//�O�ɮɶ�, ���
$Offline_Time =	600;		//�P�w���u�𮧤��v, ���u���ɶ�, ���
$MAX_PLAYERS = 500;		//�n���H�ƤW��, �Y���]�w�γ]�w���s, ���Ѽƫh�L��
$HP_BASE_RECOVERY = 0;		//HP�򥻦^�_�v
$EN_BASE_RECOVERY = 0;		//EN�򥻦^�_�v
$OLimit = 25;			//�W�u�H�ƤW��, �Y���]�w�γ]�w���s, ���Ѽƫh�L��

//�Ϲ���m�]�w
$General_Image_Dir = 'images';	//�򥻹Ϥ���m(�I���Ϥ�)
$Unit_Image_Dir = 'unitimg';	//����Ϥ���m
$Base_Image_Dir = 'img1';	//�t�ιϤ���m

//�򥻵��ݮɶ��]�w
$Btl_Intv = 3;			//�԰����ݮɶ�, �Y���A���W�u�H�Ʀh, �г]�j�@�I, �H��֨t�θ귽����
$Move_Intv = 60;		//���ʵ��ݮɶ�, �Y���Ϥj����, �i�H�]�֤@�I, ���Ъ`�N��Ԯɤu�t���ϥ�

//�Ȧ�]�w
$BankRqLv = 30;			//�Ȧ�}��һݵ��� -- ��ĳ���� 26 ��, �H����h�� Account �˿�
$BankRqMoney = 1500000;		//�Ȧ�}��һݭn�������{�� -- ��ĳ���� 150�U, ��]�P�W
$BankFee = 100000;		//�}�����O
$Bank_SLog_Entries = 30;	//�����C����ܪ��ƥ�, ��ĳ���n�W�L30

//��´�����]�w
$OrganizingCost = '1000000';	//�إ߲�´����
$OrganizingFame = '25';		//�إ߲�´�һݭn�W�n -- �W�n���M�c�W���]�i�H�إ߲�´
$OrganizingNotor = '-50';	//�إ߲�´�һݭn�c�W (�ݬ��t��) -- �W�n���M�c�W���]�i�H�إ߲�´ 
$Org_War_Cost = 200000;		//�Ԫ�1�p�ɩһݻ���

//�Z���]�w
$Max_Wep_Exp = 25000;		//�Z���g��W��

//��������]�w
$Max_HP = 30000;		//HP �W��, �p�G���Q%�^�_HP������L�j���ܧO�]�Ӱ�
$Max_EN = 5000;			//EN �W��, �p�G���ڦ^EN�ܶQ����, �i�H�]���@�I(5000�w�ܰ�)
//�����y�]�w
$Mod_HP_Cost = 75000;		//�򥻧�yHP������
$Mod_HP_UCost = 200000;		//��HP�q��yHP������, �p�W��������, �i�H��o Set ���@�I
$Mod_EN_Cost = 75000;		//�򥻧�yEN������, �p�G���ڦ^EN�ܶQ����, �i�H�]�C�@�I
$Mod_EN_UCost = 200000;		//��EN�q��yEN������, �P�W
//����u�򥻧�y�u�{�v����
$Mod_MS_base_success = 0;	//�򥻦��\�v, ��ĳ 0 �� 100, ����i�]���t�ƩΤj��100
$Mod_MS_cpt_cost = 250000;	//�C�I��y�ȩүӪ���
$Mod_MS_vpt_cost = 10;		//�C�I��y�ȩүӳӧQ�n��
$Mod_MS_cpt_penalty = 0.25;	//�C�I��y�Ȧ������򥻦��\�v(�����ʤ���, 0.25 �Y 0.25%)
$Mod_MS_cpt_bonus = 0.25;	//�C�I��y�I�ƪ��򥻦��\�v�[��(�P�W)
//����u����˳ƦX���u�{�v����
$Mod_MS_pequip_c = 2.5;		//���\�v�t��, ���\�v��������: �u((100-���鵥��)*�t��/100)*100%�v

//��Ǯw�����]�w
$Hangar_Price = 400000;		//��Ǯw�H�s����(�C���O�s), �p�X�{�ݥΪ����p, �Х[��...
$Hangar_Limit = 20;		//��Ǯw����W��(�C�쪱�a), ��Ǯw�O�Q�����Өt�θ귽���@�Өt��, ��ĳ���n�Ӧh

//�ײz�]�w
$RepairHPCost = '5';		//�u�t�^�_1 HP�һݻ���, 5 �ݩ�Q��
$RepairENCost = '5';		//�u�t�^�_1 EN�һݻ���, 5 �ݩ����K�y

//��L�]�w - ��
$VPt2AlloyReq = 1000;		//�h�ֳӧQ�Z���~��I���@�ӦX��
$AlloyID = '969<!>0';		//�X��ID (v0.3�� �X���Z����ƪ�ID: 969)
$ControlSEED = 1;		//�u�ର 0 �� 1 :	0 -> �����\�ؤl�����̱j��i�J/���� SEED Mode
				//			1 -> ���\�ؤl�����̱j��i�J/���� SEED Mode, SEED Mode ����SP -- �� v0.24Alpha �}�l, php-eb �N�H�o�覡�@����¦�o�i, ��ĳ�ϥ�!!
				//�Ա��Ѿ\�w�ˤεo�i����

$TFDCostCons = 20000;		//�ʶR�X����k�������t��, ����: [2^(�ż�)]*�����t��

$NotoriousIgnore = -25;		//�W�n(�t�Ƭ��c�W)�h�֥H�U(���O�]�A�o�ӼƦr), �۰ʨ��������b�u���aĵ�i

$ModChType_Cost = 1000000;	//�H�ا�y������

//Chatroom Configs - ��ѫǳ]�w
$SpeakIntv = 5;			//�o���۹j�ɶ�, ���
$ChatShow = 30;			//�����ܪ��ƥ�
$ChatSave = 0;			//��Ѹ�T�O�d���, �i�Τ�{��,�u(24*3600)�v���@��@�], ���]�w�γ]�� 0 �|�ä[�O�d
$ChatAutoRefresh = 60;		//��Ѹ�T�۰ʨ�s�����, ��ĳ���n�ֹL 60 ��

//Other System Configs - ��L�t�γ]�w
global $LogEntries, $Show_ptime, $ChatShow, $ChatSave, $ChatAutoRefresh, $StartZoneRestriction, $dbcharset, $BStyleA, $BStyleB;
$NPC_RegKey = '';		//�L�������U�X��, �ݭn��SQL Server�ۦ��@
$Show_ptime = 1;		//��ܵ{���B�@�ɶ�, �]�� 0 �h�����
$LogEntries = 5;		//�԰������ƥؤW��, �п�J '0' �� '5', ��J�s�h�|�����԰������t��, �Фų]�j��5, �H�K�t�ΥX��
				//�����b�u�H�Ʀh��10�H����, ��ĳ���3�h�H�U, �H��C��Ʈ���
$StartZoneRestriction = 8;	//���a�}�l�ɪ��ϰ�, �H������, �i�H�]�� '0' �� '8'
				//�]�� 0 �ɥ��w�|�b A1 �}�l�C��
				//�]�� 2 �ɷ|�b A1 �� A3 �H���X�{, �p������
				//�p�]�� 5 �ɷ|�b A1 �� B3 �H���X�{, 
				//�]�� 8 �ɷ|�b A1 �� C3 �H���X�{, �̰��i�]��8
				//�аѦ� register.php Line 233 �� Line 244
$dbcharset = 'big5';		//��Ʈw���A����r�չ� - �c�骩 php-eb �L�ݧ��
$BStyleA = 'font-size: 9pt; color: #ffffff; background-color: #000000;';				//�D�e�������s�˦�
$BStyleB = "onmouseover=\"this.style.color='yellow'\" onmouseout=\"this.style.color='FFFFFF'\"";	//�P�W, �ƹ����L�ɷ|��⪺�y�k

//Registering Config		//���U�]�w
global $CFU_CheckRegKey, $CFU_CheckIP;
$CFU_CheckRegKey = '0';		//If True, Enabled	<-�ˬd���U�X, 0�����ˬd, 1���ˬd, �нT�{ Portal �t�Υ��`�B�@��
$CFU_CheckIP = '0';		//As above		<-�ˬdIP��m, 0�����ˬd, 1���ˬd

//Anti Unauthorized Connection Settings
$disabled_AUC = 1;			//����s�s�t�Ϊ��L�ĤưѼ�: 0���}�Ҩ���s�s�t��, 1�O��������s�s�t��
$AUC_Log = "unauthorizedlog.php";	//����s�s�t�Ϊ������ɦW��, ��ĳ�ϥΡu.php�v����

$Allow_AUC = "(vsqa.no\-ip.com|dai\-ngai.net|phpebs.frwonline.com)+";
//�������`�s�u��m
//�Ш� index2.php �ק� $HTTP_REFERER �Ѽ�
//�HRegular Expression��F, �@���u(�v�P�u)+�v������Jphp-eb���ؿ���m�K�i
//�p:	(vsqa.no\-ip.com)+
//	(dai\-ngai.net)+
//	(phpebs.frwonline.com)+
//
//�p�Q�h��@�Ӧa��, �Цp����J:
//	(vsqa.no\-ip.com|dai\-ngai.net|phpebs.frwonline.com)+
//�b���}�Υؿ������[�u|�v�K�i�H
//�Цb�u-�v�e�[�J�u\�v, �_�h�|�X��
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//
/*
Account Status:
-1: Administrator
0: Normal
1: Quartine	// Not in Use
2: Lock
*/
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//
//Connect

if(empty($NoConnect)){
mysql_connect ($GLOBALS['DBHost'], $GLOBALS['DBUser'], $GLOBALS['DBPass']) or die ('Could not access database because: ' . mysql_error());
if(mysql_get_server_info() > '4.1') {
	global $charset;
	$charset = 'big5'; //���A����r�չ� - �c�骩 php-eb �L�ݧ��
	if(!$dbcharset && in_array(strtolower($charset), array('gbk', 'big5', 'utf-8'))) {
		$dbcharset = str_replace('-', '', $charset);
	}
	if($dbcharset) {
		mysql_query("SET NAMES '$dbcharset'");
	}
}
if(mysql_get_server_info() > '5.0.1') {
	mysql_query("SET sql_mode=''");
}

//-------------------------//
//--------Select DB--------//
//-------------------------//

mysql_select_db ($GLOBALS['DBName']);
}
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//

global $ConvColors;
$ConvColors=array(
	"#FFFF00","#FFFF78",
	"#FF0000","#FF2828","#FF5050",
	"#FFBF00","#FFCE3C","#FFDD78",
	"#00FF00","#3CFF3C","#78FF78",
	"#0000FF","#3C3CFF","#7878FF",
	"#FF3CFF","#FF00FF","#E100E1",
	"#FF3CAE","#FF0095","#E10083");

global $ConvGrades;
$ConvGrades=array(
	"ACE",	"S",
	"A+",	"A",	"A-",
	"B+",	"B",	"B-",
	"C+",	"C",	"C-",
	"D+",	"D",	"D-",
	"E+",	"E",	"E-",
	"F+",	"F",	"F-");

global $MainColors;
$MainColors = array(							//Rainbow Swatches By v2Alliance Gary
	"FF5050", "FF2828", "FF0000", "E10000", "C30000", "A50000", 	//Red
	"FFDD78", "FFCE3C", "FFBF00", "EBB000", "D7A100", "C39200", 	//Orange
	"FFFF78", "FFFF3C", "FFFF00", "EBEB00", "D7D700", "C3C300", 	//Yellow
	"78FF78", "3CFF3C", "00FF00", "00E100", "00C300", "00A500", 	//Green
	"78FFD2", "3CFFBE", "00FFAA", "00E196", "00C382", "00A56E", 	//Light Green
	"78DDFF", "3CCEFF", "00BFFF", "00A9E1", "0092C3", "007CA5", 	//Light Blue
	"7878FF", "3C3CFF", "0000FF", "0000E1", "0000C3", "0000A5", 	//Blue
	"D278FF", "BE3CFF", "AA00FF", "9600E1", "8200C3", "6E00A5", 	//Purple
	"FF78FF", "FF3CFF", "FF00FF", "E100E1", "C300C3", "A500A5", 	//Indigo
	"FF78C7", "FF3CAE", "FF0095", "E10083", "C30072", "A50060", 	//Violet
);

global $MainRanks;
$MainRanks = array(
'���@�L','�G���L','�@���L','�W���L','�L��',
'�U�h','���h','�W�h','���','��L',
'�ֱL','���L','�W�L','�֮�','����',
'�W��','��N','�ֱN','���N','�W�N',
'�@�ŤW�N','����','�`�q�O');

global $RightsClass;
$RightsClass = array("Major" => '�D�u',"Leader" => '����');

global $CFU_Time;
$CFU_Time=time();
//Start Time Convert Function
function cfu_time_convert($The_Time){
$DateTime = getdate($The_Time);
switch($DateTime['wday']){case 0: $DateTime['wday']='��';break;
case 1: $DateTime['wday']='�@';break;case 2: $DateTime['wday']='�G';break;
case 3: $DateTime['wday']='�T';break;case 4: $DateTime['wday']='�|';break;
case 5: $DateTime['wday']='��';break;case 6: $DateTime['wday']='��';break;
}if (strlen($DateTime['minutes']) == 1){$DateTime['minutes']='0'.$DateTime['minutes'];}
if (strlen($DateTime['seconds']) == 1){$DateTime['seconds']='0'.$DateTime['seconds'];}
if($DateTime['hours'] > 12){$DateTime['period'] = '�U��';$DateTime['hours']-=12;}
else $DateTime['period'] = '�W��';
if($DateTime['hours'] == 0){$DateTime['hours']=12;}
$FormatDate = "$DateTime[year]�~$DateTime[mon]��$DateTime[mday]��, �P��$DateTime[wday], $DateTime[period] $DateTime[hours]:$DateTime[minutes]:$DateTime[seconds]";
return $FormatDate;}
//End Time Convert Function
global $CFU_Date;
$CFU_Date = cfu_time_convert($CFU_Time); //convert the present time

//Anti-Unauthorized Connection
if (!$disabled_AUC){
if (!ereg($Allow_AUC,$HTTP_REFERER)){ //Anti-Direct Connection
echo "Unauthorized Connection Detected<br>Referer: $HTTP_REFERER<br>";
echo "IP: $REMOTE_ADDR Logged<br>";
postFooter();
$contents = '/*'."Date: `$CFU_Date' \n Logged Username: `$Pl_Value[USERNAME]' \t\t Logged Password: `$Pl_Value[PASSWORD]'\n";
$contents .= "IP: `$REMOTE_ADDR' \t\t Referer: `$HTTP_REFERER'\n";
$contents .= "REQUEST_METHOD: `$REQUEST_METHOD' \t\t SCRIPT_FILENAME: `$SCRIPT_FILENAME' \nQUERY_STRING: `$QUERY_STRING '\n";
$contents .= '_______________________________________________________';
$contents .= '_______________________________________________________*/'."\n";
$fp = fopen($AUC_Log,"r+");
fwrite($fp,$contents) or die('123');
fclose($fp);
exit;
}
}
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//

//Update Time
$CFU_TIME_USER = 0;
if (isset($session_un)) $CFU_TIME_USER = "$session_un";
elseif (isset($Pl_Value['USERNAME']))$CFU_TIME_USER="$Pl_Value[USERNAME]";
if ($CFU_TIME_USER){
$CFU_Time_UpDate_Q = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `time2` = '$CFU_Time' WHERE `username` = '$CFU_TIME_USER' LIMIT 1;");
mysql_query($CFU_Time_UpDate_Q);}
//End of Time Updating
function postFooter(){
	$mcfu_time = explode(' ', microtime());
	$cfu_ptime = number_format(($mcfu_time[1] + $mcfu_time[0] - $GLOBALS['cfu_stime']), 6);
	echo "<p align=center style=\"font-size: 10pt\">&copy; 2005-2006 v2Alliance. All Rights Reserved.�@���v�Ҧ� ���o���<br>";
	if ($GLOBALS['Show_ptime'])
	echo "<font style=\"font-size: 7pt\">Processed in ".$cfu_ptime." second(s).</font></p>";
}
function postHead($withoutbody=''){
		// Date in the past
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		// always modified
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 		// HTTP/1.1
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		// HTTP/1.0
		header("Pragma: no-cache");
		session_name("php-eb_Session");
		session_set_cookie_params(0,mktime(0,0,0,12,31,2010),"/","php-eb_Gen_Session_hd47ula");
		session_save_path("phpeb_session_dir");
		session_start();
		session_register("session_un");
		session_register("session_pwd");
		session_destroy();
		echo "<html>";
		echo "<head>";
		echo "<meta http-equiv=\"Pragma\" content=\"no-cache\">";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=big5\">";
		echo "<title>Endless Battle ~ php-eb - &copy; 2005-2006 v2Alliance</title>";
		echo "</head>";
		echo "<style type=\"text/css\">BODY {FONT-SIZE: 10px; FONT-FAMILY: \"Arial\",  \"�s�ө���\"; cursor:default}TD {FONT-SIZE: 9pt; FONT-FAMILY: \"Arial\", \"�s�ө���\"}A:visited {COLOR: #FFFFFF;}</style>";
		if (!$withoutbody) echo "<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" oncontextmenu=\"return false;\">";
		//if (!$withoutbody) echo "<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" style=\"font-family: Arial;font-size: 10pt\">";
}
function AuthUser($U,$P){
		$sql_ugnrli = ("SELECT username, password, acc_status FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE username='". $U ."'");
		$UsrGenrl_Qr = mysql_query ($sql_ugnrli) or die ('���~�I<br>����s����SQL��Ʈw(PHPEB_ERROR: 001)'.$GLOBALS['DBPrefix'].':' . mysql_error());
		$UsrGenrl = mysql_fetch_array($UsrGenrl_Qr);
		if (!$UsrGenrl['username'] || ($UsrGenrl['password'] != md5($P) && $UsrGenrl['password'] != $P) || $UsrGenrl['username'] != $U){
		echo "<center><br><br>�ϥΪ̦W�٩αK�X���~�C<br><br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�^�쭺��</a>";
		postFooter();
		exit;}
		if ($UsrGenrl['acc_status'] == 2){
		echo "<center><br><br>�b���Q��A�лP�޲z���p���I<br><br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�^�쭺��</a>";
		postFooter();
		exit;}
}
function GetWeaponDetails($WepId,$AssignedVarible){
global $$AssignedVarible;
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $WepId ."'");
$query_r = mysql_query($sql);
$$AssignedVarible = mysql_fetch_array($query_r);
}
function ReturnSpecs($Specs){$SpecsTag='';
if (!$Specs)$SpecsTag='�S��';
else{
//Weapon Specs
if(ereg('(DamA)+',$Specs))$SpecsTag .='����l�a<br>';
if(ereg('(DamB)+',$Specs))$SpecsTag .='�԰�����<br>';
if(ereg('(MobA)+',$Specs))$SpecsTag .='�[�t<br>';
if(ereg('(MobB)+',$Specs))$SpecsTag .='�W�e<br>';
if(ereg('(MobC)+',$Specs))$SpecsTag .='�{��<br>';
if(ereg('(MobD)+',$Specs))$SpecsTag .='�k��<br>';
if(ereg('(Moba)+',$Specs))$SpecsTag .='²����i<br>';
if(ereg('(Mobb)+',$Specs))$SpecsTag .='�j�O���i<br>';
if(ereg('(Mobc)+',$Specs))$SpecsTag .='�̨ΤƱ��i<br>';
if(ereg('(Mobd)+',$Specs))$SpecsTag .='���ű��i<br>';
if(ereg('(Mobe)+',$Specs))$SpecsTag .='���ű��i<br>';
if(ereg('(TarA)+',$Specs))$SpecsTag .='�շ�<br>';
if(ereg('(TarB)+',$Specs))$SpecsTag .='�˷�<br>';
if(ereg('(TarC)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(TarD)+',$Specs))$SpecsTag .='�w��<br>';
if(ereg('(Tara)+',$Specs))$SpecsTag .='�۰���w<br>';
if(ereg('(Tarb)+',$Specs))$SpecsTag .='���Ůշ�<br>';
if(ereg('(Tarc)+',$Specs))$SpecsTag .='�L�~�շ�<br>';
if(ereg('(Tard)+',$Specs))$SpecsTag .='�h����w<br>';
if(ereg('(Tare)+',$Specs))$SpecsTag .='������w<br>';
if(ereg('(DefA)+',$Specs))$SpecsTag .='²�樾�m<br>';
if(ereg('(DefB)+',$Specs))$SpecsTag .='���`���m<br>';
if(ereg('(DefC)+',$Specs))$SpecsTag .='�j�ƨ��m<br>';
if(ereg('(DefD)+',$Specs))$SpecsTag .='���Ũ��m<br>';
if(ereg('(DefE)+',$Specs))$SpecsTag .='�̲ר��m<br>';
if(ereg('(Defa)+',$Specs))$SpecsTag .='���<br>';
if(ereg('(Defb)+',$Specs))$SpecsTag .='�ܿ�<br>';
if(ereg('(Defc)+',$Specs))$SpecsTag .='�z�A<br>';
if(ereg('(Defd)+',$Specs))$SpecsTag .='���<br>';
if(ereg('(Defe)+',$Specs))$SpecsTag .='�Ŷ��۹�첾<br>';
if(ereg('(PerfDef)+',$Specs))$SpecsTag .='�������m<br>';
if(ereg('(AntiDam)+',$Specs))$SpecsTag .='�۰ʭ״_<br>';
if(ereg('(DoubleExp)+',$Specs))$SpecsTag .='�g������<br>';
if(ereg('(DoubleMon)+',$Specs))$SpecsTag .='��������<br>';
if(ereg('(DefX)+',$Specs))$SpecsTag .='���O<br>';
if(ereg('(AtkA)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(MeltA)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(MeltB)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(Cease)+',$Specs))$SpecsTag .='�T�D<br>';
if(ereg('(AntiPDef)+',$Specs))$SpecsTag .='�e��<br>';
if(ereg('(AntiMobS)+',$Specs))$SpecsTag .='�����z�Z<br>';
if(ereg('(AntiTarS)+',$Specs))$SpecsTag .='�p�F�z�Z<br>';
if(ereg('(MirrorDam)+',$Specs))$SpecsTag .='��<br>';
if(ereg('(NTCustom)+',$Specs))$SpecsTag .='�s�H���M��<br>';
if(ereg('(NTRequired)+',$Specs))$SpecsTag .='�ݭn�s�H���O�q<br>';
if(ereg('(COCustom)+',$Specs))$SpecsTag .='Coordinator�M��<br>';
if(ereg('(PsyRequired)+',$Specs))$SpecsTag .='���ʤO�M��<br>';
if(ereg('(SeedMode)+',$Specs))$SpecsTag .='SEED Mode<br>';
if(ereg('(EXAMSystem)+',$Specs))$SpecsTag .='EXAM�t�αҰʥi��<br>';
if(ereg('(CostSP)+',$Specs)){$a = ereg_replace('.*CostSP<','',$Specs);$a = intval($a);$SpecsTag .="����SP($a)<br>";}
//���U�˳ƱM�Ϊ��S��ĪG
if(ereg('(HPPcRecA)+',$Specs))$SpecsTag .='HP�^�_<br>';
if(ereg('(ENPcRecA)+',$Specs))$SpecsTag .='EN�^�_(�p)<br>';
if(ereg('(ENPcRecB)+',$Specs))$SpecsTag .='EN�^�_(�j)<br>';
if(ereg('(ExtHP)+',$Specs)){$a = ereg_replace('.*ExtHP<','',$Specs);$a = intval($a);$SpecsTag .="HP���[($a)<br>";}
if(ereg('(ExtEN)+',$Specs)){$a = ereg_replace('.*ExtEN<','',$Specs);$a = intval($a);$SpecsTag .="EN���[($a)<br>";}
//Others
if(ereg('(FortressOnly)+',$Specs))$SpecsTag .='�n��M��<br>';
if(ereg('(RawMaterials)+',$Specs))$SpecsTag .='���<br>';
if(ereg('(CannotEquip)+',$Specs))$SpecsTag .='�L�k�˳�<br>';
//Attacking Type
if(ereg('(DoubleStrike)+',$Specs))$SpecsTag .='�G�s��<br>';
if(ereg('(TripleStrike)+',$Specs))$SpecsTag .='�T�s��<br>';
if(ereg('(AllWepStirke)+',$Specs))$SpecsTag .='���u�o�g<br>';
if(ereg('(CounterStrike)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(FirstStrike)+',$Specs))$SpecsTag .='�������<br>';

}
return $SpecsTag;
}
function GetMsDetails($MsId,$AssignedVarible){
global $$AssignedVarible;
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_ms` WHERE id='". $MsId ."'");
$query_r = mysql_query($sql);
$$AssignedVarible = mysql_fetch_array($query_r);
}
function GetTactics($TactId='0'){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` WHERE id='". $TactId ."'");
$query_r = mysql_query($sql);
return mysql_fetch_array($query_r);
}
function GetUsrDetails($username,$AssignedforGen,$AssignedforGame=''){
global $$AssignedforGen;global $$AssignedforGame;
if ($AssignedforGen){
$sqlgen = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE username='". $username ."'");
$query_gen = mysql_query($sqlgen) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
$$AssignedforGen = mysql_fetch_array($query_gen);}
if ($AssignedforGame){
$sqlgame = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE username='". $username ."'");
$query_game = mysql_query($sqlgame) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
$$AssignedforGame = mysql_fetch_array($query_game);}
}
function WriteHistory($Con){
$sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_game_history` (`time`, `history`) VALUES (UNIX_TIMESTAMP(), '$Con');");
mysql_query($sql);
}
function GetUsrLog($username){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_log` WHERE username='". $username ."'");
$query = mysql_query($sql) or die ('�L�k���o������T, ��]:' . mysql_error() . '<br>');
$Results = mysql_fetch_array($query);
return $Results;
}
function GetChType($Chtypeinput){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` WHERE id='". $Chtypeinput ."'");
$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
$Assigned = mysql_fetch_array($query);
return $Assigned;
}
//End Get ChTypeFunction
//Start Get Organization Infos
function ReturnOrg($Org){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE id='". $Org ."'");
$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
return mysql_fetch_array($query);
}
//End Get Organization Infos
//Start Get Map Fucntions
function ReturnMType($Type){
switch($Type){
	case 0: $ReturnType = '�a��';break;
	case 1: $ReturnType = '����';break;
	case 2: $ReturnType = '�Ť�';break;
	case 3: $ReturnType = '�t�z';break;
	case 4: $ReturnType = '�ޥ��P';break;
	case 5: $ReturnType = '�뭱';break;
}return $ReturnType;
}
function ReturnMBg($Type){
switch($Type){
	case 0: $ReturnType = '/background/earth/';break;
	case 1: $ReturnType = '/background/underwater/';break;
	case 2: $ReturnType = '/background/skies/';break;
	case 3: $ReturnType = '/background/universe/';break;
	case 4: $ReturnType = '/background/colony/';break;
	case 5: $ReturnType = '/background/moon/';break;
}return $ReturnType;
}
function ReturnMap($MapID){

$sqls = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_map` WHERE map_id='". $MapID ."'");
$querys = mysql_query($sqls) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
$Sys = mysql_fetch_array($querys);

$sqlu = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE map_id='". $MapID ."'");
$queryu = mysql_query($sqlu) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
$User = mysql_fetch_array($queryu);

return Array("Sys" => $Sys, "User" => $User);
}
//End Get Map Functions
//Start Converting Functions
function rankConvert($Num,$Bold='Bold'){
$NumRanks = count($GLOBALS["MainRanks"]);
$IndF = ($Num / 100000) * 20;
$Index = floor(20 - $IndF);
if ($Index < 0)$Index = 0;
if ($Index > 19)$Index = 19;
$IndF2 = ($Num / 100000) * $NumRanks;
$Index2 = ceil($IndF2);
if ($Index2 < 0)$Index2 = 0;
if ($Index2 > $NumRanks)$Index2 = $NumRanks;
$Index2-=1;
$VarA = $GLOBALS["ConvColors"];
$VarB = $GLOBALS["MainRanks"];
$NVar = "<font style=\"font-weight: $Bold; color: ".$VarA[$Index]."\">".$VarB[$Index2]."</font>";
Return $NVar;
}
function colorConvert($Num,$Max='100'){
if ($Num > $Max)$Num = $Max;
$ClrIndF = $Num / $Max * 20;
$ClrIndex = floor(20 - $ClrIndF);
if ($ClrIndex < 0)$ClrIndex = 0;
if ($ClrIndex > 19)$ClrIndex = 19;
$Var = $GLOBALS["ConvColors"];
Return $Var[$ClrIndex];
}
function gradeConvert($Num,$Max='100'){
if ($Num > $Max)$Num = $Max;
$GrdIndF = $Num / $Max * 20;
$GrdIndex = floor(20 - $GrdIndF);
if ($GrdIndex < 0)$GrdIndex = 0;
if ($GrdIndex > 19)$GrdIndex = 19;
$Var = $GLOBALS["ConvGrades"];
Return $Var[$GrdIndex];
}
function dualConvert($Num,$Max='100',$Bold='Bold'){
if ($Num > $Max)$Num = $Max;
$IndF = $Num / $Max * 20;
$Index = floor(20 - $IndF);
if ($Index < 0)$Index = 0;
if ($Index > 19)$Index = 19;
$VarA = $GLOBALS["ConvColors"];
$VarB = $GLOBALS["ConvGrades"];
$NVar = "<font style=\"font-weight: $Bold; color: ".$VarA[$Index]."\">".$VarB[$Index]."</font>";
Return $NVar;
}
//End Converting Functions

//Start Auto Repairing Function
function AutoRepair($username){
$sqlgame = ("SELECT `msuit`,`time1`,`hp`,`sp`,`en`,`hpmax`,`spmax`,`enmax`,`eqwep`,`status`,`hypermode` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` a,`".$GLOBALS['DBPrefix']."phpeb_user_general_info` b WHERE a.username='". $username ."' AND a.username=b.username");
$query_game = mysql_query($sqlgame) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
$Game = mysql_fetch_array($query_game);
if ($Game['status']){$RepairFlag = 1;}
elseif ($Game['hp'] < $Game['hpmax'] || $Game['sp'] < $Game['spmax'] || $Game['en'] < $Game['enmax']){$RepairFlag = 1;}

if (isset($RepairFlag)){
$Use_Time = time();
$ihp = $Game['hp'];
$isp = $Game['sp'];
$ien = $Game['en'];
$Time_Difference=$Use_Time-$Game['time1'];
if ($Time_Difference >= 3) {
$sql = ("SELECT `hprec`,`enrec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_ms` WHERE id='". $Game['msuit'] ."'");
$query_r = mysql_query($sql);
$MS = mysql_fetch_array($query_r);

if ($MS['hprec'] >= 1){$Game['hp'] += $Time_Difference*$MS['hprec'];}//Constant HP Recovery
if ($MS['hprec'] < 1 && $MS['hprec'] >= 0.0001){$Game['hp'] += $Time_Difference*($MS['hprec']*$Game['hpmax']);}//Percentage HP Recovery

if ($MS['enrec'] >= 1){$Game['en'] += $Time_Difference*$MS['enrec'];}//Constant EN Recovery
if ($MS['enrec'] < 1 && $MS['enrec'] >= 0.0001){$Game['en'] += $Time_Difference*($MS['enrec']*$Game['enmax']);}//Percentage EN Recovery


if ($Game['eqwep'] != '0<!>0' && $Game['eqwep']){
$Eq_Id = explode('<!>',$Game['eqwep']);
$Eq_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $Eq_Id[0] ."'");
$Eq_Query = mysql_query($Eq_Prep);
$Eq = mysql_fetch_array($Eq_Query);
if (ereg('(HPPcRecA)+',$Eq['spec']) && $MS['hprec'] >= 1){$Game['hp'] += $Time_Difference*(0.005*$Game['hpmax']);}
if (ereg('(ENPcRecB)+',$Eq['spec']) && $MS['enrec'] >= 1){$Game['en'] += $Time_Difference*(0.015*$Game['enmax']);}
elseif (ereg('(ENPcRecA)+',$Eq['spec']) && $MS['enrec'] >= 1){$Game['en'] += $Time_Difference*(0.0075*$Game['enmax']);}
}

$SP_RecSpd = $Time_Difference * (0.004*$Game['spmax']);
if ($Game['hypermode'] == 2 || $Game['hypermode'] == 6) $SP_RecSpd *= 2;
$Game['sp'] += $SP_RecSpd;

if ($Game['hp'] >= $Game['hpmax'] && $Game['status'] == 1){$Game['status'] = 0;$Game['hp'] = $Game['hpmax'];}
if ($Game['hp'] > $Game['hpmax']) $Game['hp'] = $Game['hpmax'];
if ($Game['en'] > $Game['enmax']) $Game['en'] = $Game['enmax'];
if ($Game['sp'] > $Game['spmax']) $Game['sp'] = $Game['spmax'];
$sqlg = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET ");
$sqlg .=("`hp` = '$Game[hp]' ,");
$sqlg .=("`en` = '$Game[en]' ,");
$sqlg .=("`sp` = '$Game[sp]' ,");
$sqlg .=("`status` = '$Game[status]' WHERE `username` = '$username' LIMIT 1;");
mysql_query($sqlg) or die ('�L�k��s�C����T, ��]:' . mysql_error() . '<br>');
$sqln = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `time1` = '$Use_Time' WHERE `username` = '$username' LIMIT 1;");
mysql_query($sqln) or die ('�L�k��s�C����T, ��]:' . mysql_error() . '<br>���~2');
}
}
$Assigned = array("hp" => $Game['hp'],"en" => $Game['en'],"sp" => $Game['sp'],"status" => $Game['status']);
Return $Assigned;
}//End Auto Repairing Function
//Start Status Point Calculation
function CalcStatPt($Prefix,$Lv_N){
$Stat_Gain=3;
for($Lv=1;$Lv<=$Lv_N;$Lv++){
	if ($Lv%5 == 0)$Stat_Gain++;
	}
$AssignmentStat_Gain ="$Prefix".'_Stat_Gain';
global $$AssignmentStat_Gain;
$$AssignmentStat_Gain=$Stat_Gain;
}//EndGain
function CalcStatReq($Prefix,$Stat_N){//Req
$Stat_Req=2;
for($Stat=1;$Stat<=$Stat_N;$Stat++){
	if (($Stat-1)%10 == 0 && $Stat>1)$Stat_Req++;
	}
$AssignmentStat_Req ="$Prefix".'_Stat_Req';
global $$AssignmentStat_Req;
$$AssignmentStat_Req=$Stat_Req;

}//End Stat Point Function




//Start Calc Exp Functions
function CalcExp ($NowLv='',$AssignVar='UserNextLvExp',$ShowFlag=''){
if ($ShowFlag == 1){
	$Lv=1;$Exp=0;
	$i= 0;$n= 0;
	$C[0] = 0;
	echo "Lv --- Exp --- �`�g��<br>";
	while ($Lv <= 99){

		$n=$i;
		$i = $i + 1;

		if (($Lv%9) == 0){
		$Exp=ceil($Lv*($Lv*2) + $Exp*1.2);}
		elseif(($Lv%33) == 0){
		$Exp=ceil($Lv*($Lv*2.5) + $Exp*2 + 150);}
		else{
		$Exp=ceil($Lv*($Lv*0.5) + $Exp*1.05015781);
		}
		if($Lv >= 90){
		$Exp=ceil($Exp*1.035 + 150);}
		$ShowExp =number_format($Exp);
		echo "$Lv --- $ShowExp --- ";

		$D=$Exp + $C[$n];
		$C[$i]=$D;
		$ShowD = number_format($D);
		echo "$ShowD<br>";
		$Lv=$Lv + 1;
		if ($Lv%50 == 0){
			echo "Lv --- Exp --- �`�g��<br>";
			}

		}
		echo "$C[1]";
	}
else	{
	$Lv=1;
	$Exp=0;
	$i= 0;
	$n= 0;
	global $$AssignVar;

	while ($Lv <= $NowLv){

		$n=$i;
		$i = $i + 1;

		if (($Lv%9) == 0){
		$Exp=ceil($Lv*($Lv*2) + $Exp*1.2);}
		elseif(($Lv%33) == 0){
		$Exp=ceil($Lv*($Lv*2.5) + $Exp*2 + 150);}
		else{
		$Exp=ceil($Lv*($Lv*0.5) + $Exp*1.05015781);
		}
		if($Lv >= 90){
		$Exp=ceil($Exp*1.035 + 150);}

		$D=$Exp + $C[$n];
		$C[$i]=$D;
		if ($Lv == $NowLv) $$AssignVar = $Exp;
		$Lv=$Lv + 1;

		}
}
}//EndOfOldCalcFunction

?>