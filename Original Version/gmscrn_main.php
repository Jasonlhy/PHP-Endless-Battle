<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
postHead('');
$session_un=$Pl_Value['USERNAME'];
$session_pwd=$Pl_Value['PASSWORD'];
if ( $mode == 'proc' )
	{	$sql_ugnrli = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE username='". $Pl_Value['USERNAME'] ."'");
		$UsrGenrl_Qr = mysql_query ($sql_ugnrli) or die ('�X��, ��]:' . mysql_error() . '�A');
		$UsrGenrl = mysql_fetch_array($UsrGenrl_Qr);
		
		$sql_ugmi = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE username='". $UsrGenrl['username'] ."'");
		$PlGame_Qr = mysql_query ($sql_ugmi) or die ('�X��, ��]:' . mysql_error() . '�A');
		$PlGameVal = mysql_fetch_array($PlGame_Qr);
		if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "<center>�s�u�O�ɡI<br>�Э��s�n�J�I<br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�^�쭺��</a>";exit;}
		
		$Pl_Settings_Query = ("SELECT `show_log_num`,`gen_img_dir`,`unit_img_dir`,`base_img_dir` FROM `".$GLOBALS['DBPrefix']."phpeb_user_settings` WHERE username='". $UsrGenrl['username'] ."'");
		$Pl_Settings = mysql_fetch_array(mysql_query ($Pl_Settings_Query));
		
//Online Limit Connection
if ($OLimit){
$Online_Time = time() - $Offline_Time;
$OnlineSQL = ("SELECT count(time2) FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE `time2` > '$Online_Time'");
$OnlineSQL_Query = mysql_query($OnlineSQL);
$OnlinePlNum = mysql_fetch_row($OnlineSQL_Query);
if ($OnlinePlNum[0] >= $OLimit && $CFU_Time-$UsrGenrl['time2'] < $Offline_Time){
	echo "<center><br><br>�W�u�H�ƤӦh�C<br>�{�W�u�H��: $OnlinePlNum[0]<br>�W�u�H�ƤW��: $OLimit<br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�^�쭺��</a><br><br>";
	postFooter();exit;
}
}

//Adjust to user's setting
if ($Pl_Settings['gen_img_dir'])
$General_Image_Dir = $Pl_Settings['gen_img_dir'];
if ($Pl_Settings['unit_img_dir'])
$Unit_Image_Dir = $Pl_Settings['unit_img_dir'];
if ($Pl_Settings['base_img_dir'])
$Base_Image_Dir = $Pl_Settings['base_img_dir'];

//Start Printing Table

if ($UsrGenrl['msuit'] == "nil") $UsrGenrl['msuit'] = '0';
GetMsDetails("$UsrGenrl[msuit]",'PlMs');
$Pl_Type=GetChType($UsrGenrl['typech']);
if ($UsrGenrl['msuit'] && ($CFU_Time - $UsrGenrl['time1']) >= 3){
	$Pl_Repaired = AutoRepair("$UsrGenrl[username]");
	$PlGameVal['hp'] = $Pl_Repaired['hp'];
	$PlGameVal['en'] = $Pl_Repaired['en'];
	$PlGameVal['sp'] = $Pl_Repaired['sp'];
	$PlGameVal['status'] = $Pl_Repaired['status'];
	}
switch ($PlGameVal['status']){case 0: $StatusShow="�i�o�i"; $StatusColor='#143DC1';break; case 1: $StatusShow="�ײz��"; $StatusColor='#FF2200';break;}

$ShowAt= $PlGameVal['attacking']*0.3;
$ShowDe= $PlGameVal['defending']*0.3;
$ShowRe= $PlGameVal['reacting']*0.3;
$ShowTa= $PlGameVal['targeting']*0.3;

$AtClr = colorConvert("$PlGameVal[attacking]");
$DeClr = colorConvert("$PlGameVal[defending]");
$ReClr = colorConvert("$PlGameVal[reacting]");
$TaClr = colorConvert("$PlGameVal[targeting]");

$NextStatPt_At=$PlGameVal['attacking']+1;
$NextStatPt_De=$PlGameVal['defending']+1;
$NextStatPt_Re=$PlGameVal['reacting']+1;
$NextStatPt_Ta=$PlGameVal['targeting']+1;

CalcStatReq('At',"$NextStatPt_At");$AtAdd='';
CalcStatReq('De',"$NextStatPt_De");$DeAdd='';
CalcStatReq('Re',"$NextStatPt_Re");$ReAdd='';
CalcStatReq('Ta',"$NextStatPt_Ta");$TaAdd='';

$Area = ReturnMap("$UsrGenrl[coordinates]");
$AreaLandForm = ReturnMType($Area["Sys"]["type"]);

$LandFormBg = ReturnMBg($Area["Sys"]["type"]);

$AreaOrg = ReturnOrg($Area["User"]["occupied"]);
$Pl_Org = ReturnOrg($PlGameVal['organization']);

if ($UsrGenrl['fame'] >= 0)$TypeFame = '�W�n';
else $TypeFame = '�c�W';
$ShowFame = abs($UsrGenrl['fame']);
unset($RightsTitle);
if ($PlGameVal['rights'] == '1'){$RightsTitle = $RightsClass['Major'];}
elseif ($PlGameVal['rights']){$RightsTitle = $RightsClass['Leader'];}

$Pl_Rank = rankConvert($PlGameVal['rank']);

$Otp_Area_Sql = ("SELECT `name`,`color`,`opttime`,`optstart` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `optmissioni` = 'Atk=($UsrGenrl[coordinates])' AND `opttime` > '$CFU_Time' ORDER BY `optstart` ASC LIMIT 1");
$Otp_Area_Q = mysql_query($Otp_Area_Sql) or die(mysql_error());
$Otp_A_ITar = mysql_fetch_array($Otp_Area_Q);

if ($Otp_A_ITar){
if ($Otp_A_ITar['optstart'] > $CFU_Time){
$TimeTSSec = $Otp_A_ITar['optstart'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "�٦�$TimetS[hours]�p��$TimetS[minutes]����$TimetS[seconds]��}�l�Ԫ��C";
}
else{
$TimeTSSec = $Otp_A_ITar['opttime'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "�٦�$TimetS[hours]�p��$TimetS[minutes]����$TimetS[seconds]��Ԫ��ŧi�פF�C";}
}


echo "<script type=\"text/JavaScript\">";
echo "moveTo(0,0);";
echo "resizeTo(screen.availWidth,screen.availHeight);";
echo "</script>";


echo "<style type=\"text/css\">b {FILTER: glow(color: 0000ff,strength=1);height:1} body {background-image: url('$General_Image_Dir".$LandFormBg."1024.jpg')}</style>";

echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\"><tr>";
echo "<td width=\"100%\" height=\"25\" style=\"font-size: 14pt;\" align=center><font style=\"color: $UsrGenrl[color]; font-weight: Bold\">$PlGameVal[gamename]</font> <font style=\"color: $Pl_Org[color]\">($Pl_Org[name])</font>";
if ($RightsTitle)
echo "<font style=\"color: yellow;font-weight: Bold;\"> &nbsp;$RightsTitle</font>";
if ($PlGameVal['organization'])
echo " &nbsp;$Pl_Rank";

echo " &nbsp;&nbsp; <font style=\"font-size: 10pt\">$TypeFame: $ShowFame &nbsp;&nbsp; �Ҧb�ϰ�: $UsrGenrl[coordinates] &nbsp;&nbsp; �a��: $AreaLandForm &nbsp;&nbsp; �Ϊv��a: <font style=\"color: $AreaOrg[color]\">".$AreaOrg[name]."</font>";

if ($Otp_TellTime)
echo "&nbsp;<font style=\"color: red\">[�Ԫ����A]</font> $Otp_TellTime";

echo "</font></td>";

echo "</tr><tr><td width=\"100%\" height=\"100%\">";
echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" height=100% width=\"100%\">";
echo "<tr>";
echo "<td width=\"14%\" valign=center>";
echo "<img src=\"".$Unit_Image_Dir."/$PlMs[image]\">";

if ($PlGameVal['ms_custom']) $Pl_CFix = explode('<!>',$PlGameVal['ms_custom']);
else $Pl_CFix = array(0,0,0,0,0);

if ($Pl_CFix[0]) $PlMs['msname'] = $Pl_CFix[0]."<sub>&copy;</sub>";

echo "<br>$PlMs[msname]<br> �ӧQ�n��/����: $PlGameVal[v_points]/$PlGameVal[victory]<br>Status: <b id=status_now style=\"color: $StatusColor\">$StatusShow</b></td>"
,"<td width=\"2%\">&#12288;</td>"
,"<td width=\"21%\" valign=top>&#12288;<div align=\"center\">"
,"<center>"
,"<table cellpadding=0 cellspacing=0 border=0 style=\"font-size:14px; border-collapse:collapse\" bordercolor=\"#111111\">"
,"<tr>";
echo "<form action=nil method=post name=addstat target=Beta>";
echo "<input type=hidden value='none' name=actionb>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<script language=\"JavaScript\">";
echo "function add_stat(type){";
echo "	if (type == 'at'){";
echo "	if ($UsrGenrl[growth] < $At_Stat_Req || $At_Stat_Req == '0' || $UsrGenrl[growth] == '0'){alert('�A�������I�Ƥ������I');return false}";
echo "	if (confirm('�A�{�b�� $UsrGenrl[growth] �����I�ơC\\n�n������޳N�[�� $NextStatPt_At ���ܻݭn $At_Stat_Req �I�ơC\\n�T�w��?') == true){";
echo "	addstat.action='statsmod.php?action=addstat';addstat.target='Alpha';addstat.actionb.value='at';addstat.submit();}else{ataddlink.style.visibility='visible';return false}";
echo "	}";
echo "	if (type == 'de'){";
echo "	if ($UsrGenrl[growth] < $De_Stat_Req || $De_Stat_Req == '0' || $UsrGenrl[growth] == '0'){alert('�A�������I�Ƥ������I');return false}";
echo "	if (confirm('�A�{�b�� $UsrGenrl[growth] �����I�ơC\\n�n�⨾�m��O�[�� $NextStatPt_De ���ܻݭn $De_Stat_Req �I�ơC\\n�T�w��?') == true){";
echo "	addstat.action='statsmod.php?action=addstat';addstat.target='Alpha';addstat.actionb.value='de';addstat.submit();}else{deaddlink.style.visibility='visible';return false}";
echo "	}";
echo "	if (type == 're'){";
echo "	if ($UsrGenrl[growth] < $Re_Stat_Req || $Re_Stat_Req == '0' || $UsrGenrl[growth] == '0'){alert('�A�������I�Ƥ������I');return false}";
echo "	if (confirm('�A�{�b�� $UsrGenrl[growth] �����I�ơC\\n�n������[�� $NextStatPt_Re ���ܻݭn $Re_Stat_Req �I�ơC\\n�T�w��?') == true){";
echo "	addstat.action='statsmod.php?action=addstat';addstat.target='Alpha';addstat.actionb.value='re';addstat.submit();}else{readdlink.style.visibility='visible';return false}";
echo "	}";
echo "	if (type == 'ta'){";
echo "	if ($UsrGenrl[growth] < $Ta_Stat_Req || $Ta_Stat_Req == '0' || $UsrGenrl[growth] == '0'){alert('�A�������I�Ƥ������I');return false}";
echo "	if (confirm('�A�{�b�� $UsrGenrl[growth] �����I�ơC\\n�n��R����O�[�� $NextStatPt_Ta ���ܻݭn $Ta_Stat_Req �I�ơC\\n�T�w��?') == true){";
echo "	addstat.action='statsmod.php?action=addstat';addstat.target='Alpha';addstat.actionb.value='ta';addstat.submit();}else{taaddlink.style.visibility='visible';return false}";
echo "	}}</script>";
if ($UsrGenrl['growth'] >= $At_Stat_Req && $PlGameVal['attacking'] < 100){$AtAdd = " style=\"text-decoration: underline overline\" onClick=\"this.style.visibility='hidden';add_stat('at')\" onMouseover=\"this.style.color='yellow'\" onMouseOut=\"this.style.color='';\" id = 'ataddlink'";}
if ($UsrGenrl['growth'] >= $De_Stat_Req && $PlGameVal['defending'] < 100){$DeAdd = " style=\"text-decoration: underline overline\" onClick=\"this.style.visibility='hidden';add_stat('de')\" onMouseover=\"this.style.color='yellow'\" onMouseOut=\"this.style.color='';\" id = 'deaddlink'";}
if ($UsrGenrl['growth'] >= $Re_Stat_Req && $PlGameVal['reacting'] < 100){$ReAdd = " style=\"text-decoration: underline overline\" onClick=\"this.style.visibility='hidden';add_stat('re')\" onMouseover=\"this.style.color='yellow'\" onMouseOut=\"this.style.color='';\" id = 'readdlink'";}
if ($UsrGenrl['growth'] >= $Ta_Stat_Req && $PlGameVal['targeting'] < 100){$TaAdd = " style=\"text-decoration: underline overline\" onClick=\"this.style.visibility='hidden';add_stat('ta')\" onMouseover=\"this.style.color='yellow'\" onMouseOut=\"this.style.color='';\" id = 'taaddlink'";}
$Pl_ATF=$PlMs['atf']+$Pl_Type['atf']+$Pl_CFix[1];
$Pl_DEF=$PlMs['def']+$Pl_Type['def']+$Pl_CFix[2];
$Pl_REF=$PlMs['ref']+$Pl_Type['ref']+$Pl_CFix[3];
$Pl_TAF=$PlMs['taf']+$Pl_Type['taf']+$Pl_CFix[4];
//EXAM System Status Fix
if ($UsrGenrl['hypermode'] >= 4 && $UsrGenrl['hypermode'] <= 6){
	//Natural
	if (ereg('(nat)+',$Pl_Type['id'])) {
		$Pl_ATF += 5;
		$Pl_DEF += 5;
		$Pl_REF += 5;
		$Pl_TAF += 5;
		}
	//Enhanced
	elseif (ereg('(enh)+',$Pl_Type['id'])) {
		$Pl_ATF += 5;
		$Pl_DEF += 1;
		$Pl_REF += 2;
		$Pl_TAF += 7;
		}
	//Extended
	elseif (ereg('(ext)+',$Pl_Type['id'])) {
		$Pl_ATF += 5;
		$Pl_REF += 3;
		$Pl_TAF += 2;
		}
}
echo "<td rowspan=3 align=center><span id=attacking$AtAdd>Attacking</span><br>";
echo "<b style=\"color:$AtClr;\">$PlGameVal[attacking] + $Pl_ATF</b></td>";
echo "<td align=center><span id=defending$DeAdd>Defending</span><br>";
echo "<b style=\"color:$DeClr;\">$PlGameVal[defending] + $Pl_DEF</b></td>";
echo "<td rowspan=3 align=center><span id=reacting$ReAdd>Reacting</span><br>";
echo "<b style=\"color:$ReClr;\">$PlGameVal[reacting] + $Pl_REF</b></td>";
echo "</tr>",
'<tr>',
'<td valign=top>',
"<table cellpadding=0 cellspacing=0 border=0 bgcolor=\"#000000\">",
'<tr>',
"<td width=30 height=30 align=right valign=bottom background=\"$Base_Image_Dir/btl.gif\"><img src='$Base_Image_Dir/tl.gif' width=$ShowAt height=$ShowDe style=\"position:relative;filter:alpha(opacity=70,finishopacitiy=70);\"></td>",
"<td width=30 height=30 align=left valign=bottom background=\"$Base_Image_Dir/btr.gif\"><img src='$Base_Image_Dir/tr.gif' width=$ShowRe height=$ShowDe style=\"position:relative;filter:alpha(opacity=70,finishopacitiy=70);\"></td>",
'</tr><tr>',
"<td width=30 height=30 align=right valign=top background=\"$Base_Image_Dir/bbl.gif\"><img src='$Base_Image_Dir/bl.gif' width=$ShowAt height=$ShowTa style=\"position:relative;filter:alpha(opacity=70,finishopacitiy=70);\"></td>",
"<td width=30 height=30 align=left valign=top background=\"$Base_Image_Dir/bbr.gif\"><img src='$Base_Image_Dir/br.gif' width=$ShowRe height=$ShowTa style=\"position:relative;filter:alpha(opacity=70,finishopacitiy=70);\"></td>",
'</tr></table></td></tr><tr>';
echo "<td align=center><span id=targeting$TaAdd>Targeting</span><br>";
echo "<b style=\"color:$TaClr;\">$PlGameVal[targeting] + $Pl_TAF</b></td>";
echo "</tr>";
echo "</table>";
echo "</center>";
echo "</div>";
echo "</td>";
echo "<td width=\"2%\">&nbsp;";
echo "</td>";
echo "<td width=\"30%\" valign=top><div align=\"center\">";
echo "<center>";
echo "<table style=\"font-size:15px;\" width=\"75%\"><tr>";
echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
if ($UsrGenrl['msuit'])echo "<b>HP</b></td>";
else echo "<b>HP�I�[��</b></td>";                                                        
$Pl_ShowHP=floor($PlGameVal['hp']);
$Pl_ShowEN=floor($PlGameVal['en']);
$Pl_ShowSP=floor($PlGameVal['sp']);
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b id=current_hp>$Pl_ShowHP</b><b> / $PlGameVal[hpmax]</b></td></tr><tr>";
echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
if ($UsrGenrl['msuit'])echo "<b>EN</b></td>";
else echo "<b>EN�I�[��</b></td>";
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b id=current_en>$Pl_ShowEN</b><b> / $PlGameVal[enmax]</b></td></tr><tr>";

echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
echo "<b>SP</b></td>";
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b id=current_sp>$Pl_ShowSP</b><b> / $PlGameVal[spmax]</b></td></tr><tr>";

echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
echo "<b>Level</b></td>";
if ($PlGameVal['level'] > 100) $PlGameVal['level'] = 100;
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b>$PlGameVal[level]</b></td></tr><tr>";
echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
$Show_Exp = '';
if ($PlGameVal['level'] >= 100) {$UserNextLvExp = false;$Show_Exp = '<center>---</center>';}
else {calcExp("$PlGameVal[level]");$Show_Exp = "$PlGameVal[expr] / $UserNextLvExp";}
echo "<b>EXP</b></td>";
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b>$Show_Exp</b></td></tr><tr>";
echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
echo "<b>Type</b></td>";
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b";
if ($UsrGenrl['hypermode'] == 1 || ($UsrGenrl['hypermode'] >= 4 && $UsrGenrl['hypermode'] <= 6))
echo " style=\"filter: glow(color: 0000FF,strength=2)\"";
echo ">$Pl_Type[name]";
if ($UsrGenrl['hypermode'] == 1 || $UsrGenrl['hypermode'] == 5)
echo "<br><font style=\"color: FFFF00;font-weight: bold\">SEED Mode</font>";
if ($UsrGenrl['hypermode'] >= 4 && $UsrGenrl['hypermode'] <= 6)
echo "<br><font style=\"color: FF0000;font-weight: bold\">EXAM Activated</font>";
echo "</b></td></tr><tr>";
echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
echo "<b>�����I��</b></td>";
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b>$UsrGenrl[growth]</b></td></tr><tr>";
echo "<td style=\"background-color: ". $UsrGenrl['color'] .";font-size:13px;\" align=center width=\"75\">";
echo "<b>";
echo "<span lang=\"zh-tw\">Money</span></b></td>";
echo "<td align=right style=\"border:1px solid #404040;\" width=\"124\"><b>".number_format($UsrGenrl['cash'])."</b></td></tr></table>";
echo "</center>";
echo "</div></td>";
echo "<td width=\"2%\">&#12288;</td>";
echo "<td width=\"34%\" valign=top>";
if ($UsrGenrl['msuit']){
$UsrWepA = explode('<!>',$PlGameVal['wepa']);
$UsrWepB = explode('<!>',$PlGameVal['wepb']);
$UsrWepC = explode('<!>',$PlGameVal['wepc']);
$UsrWepD = explode('<!>',$PlGameVal['eqwep']);
$UsrWepE = explode('<!>',$PlGameVal['p_equip']);
GetWeaponDetails("$UsrWepA[0]",'SysWepA');
GetWeaponDetails("$UsrWepB[0]",'SysWepB');
GetWeaponDetails("$UsrWepC[0]",'SysWepC');
GetWeaponDetails("$UsrWepD[0]",'SysWepD');
GetWeaponDetails("$UsrWepE[0]",'SysWepE');
if ($UsrWepA[2]==1) $SysWepA['name'] = $UsrWepA[3].$SysWepA['name'];
elseif ($UsrWepA[2]==2) $SysWepA['name'] = $SysWepA['name'].$UsrWepA[3];
if ($UsrWepB[2]==1) $SysWepB['name'] = $UsrWepB[3].$SysWepB['name'];
elseif ($UsrWepB[2]==2) $SysWepB['name'] = $SysWepB['name'].$UsrWepB[3];
if ($UsrWepC[2]==1) $SysWepC['name'] = $UsrWepC[3].$SysWepC['name'];
elseif ($UsrWepC[2]==2) $SysWepC['name'] = $SysWepC['name'].$UsrWepC[3];
if ($UsrWepD[2]==1) $SysWepD['name'] = $UsrWepD[3].$SysWepD['name'];
elseif ($UsrWepD[2]==2) $SysWepD['name'] = $SysWepD['name'].$UsrWepD[3];
if ($UsrWepE[2]==1) $SysWepE['name'] = $UsrWepE[3].$SysWepE['name'];
elseif ($UsrWepE[2]==2) $SysWepE['name'] = $SysWepE['name'].$UsrWepE[3];

}

echo "<span style=\"background-color:  ". $UsrGenrl['color'] ."\">&nbsp;<b>�˳�</b>&nbsp;</span>&nbsp;";
if ($UsrGenrl['msuit'])
echo "$SysWepA[name]&nbsp;�g��: $UsrWepA[1]<br>�ƥΤ@: $SysWepB[name]&nbsp;�g��: $UsrWepB[1]<br>�ƥΤG: $SysWepC[name]&nbsp;�g��: $UsrWepC[1]";
else echo "<br>�S������C<br><br><br>";
echo "<br><span style=\"background-color:  ". $UsrGenrl['color'] ."\">&nbsp<b>���U�˳�</b>&nbsp;</span>&nbsp;";
if ($UsrGenrl['msuit'])
echo "$SysWepD[name]&nbsp;�g��: $UsrWepD[1]";
if ($PlGameVal['p_equip'] && $PlGameVal['p_equip'] != '0<!>0'){
echo "<br><span style=\"background-color:  ". $UsrGenrl['color'] ."\">&nbsp<b>�`�W�˳�</b>&nbsp;</span>&nbsp;";
if ($UsrGenrl['msuit'])
echo "$SysWepE[name]&nbsp;�g��: $UsrWepE[1]";
}

//Recovering Script
echo "<script language=\"JavaScript\">";
echo "var h=$Pl_ShowHP;";
echo "var e=$Pl_ShowEN;";
echo "var s=$Pl_ShowSP;";
echo "var timerID;";
echo "TheDate = new Date();";
echo "var m_time=TheDate.getTime();";
echo "AutoRepairJ();";
echo "function AutoRepairJ(){";
echo "TheDate2 = new Date();";
echo "	n_time=TheDate2.getTime();";
echo "	ts_gap = (m_time - n_time)/-1000;\n";
	
if ($PlMs['hprec'] >= 1)$cfu_HP_AutoRepairType = 1;//Constant HP Recovery 
if ($PlMs['hprec'] < 1 && $PlMs['hprec'] >= 0.001)$cfu_HP_AutoRepairType = 2;//Percentage HP Recovery

if ($PlMs['enrec'] >= 1)$cfu_EN_AutoRepairType = 1;//Constant EN Recovery 
if ($PlMs['enrec'] < 1 && $PlMs['enrec'] >= 0.001)$cfu_EN_AutoRepairType = 2;//Percentage EN Recovery

switch ($cfu_HP_AutoRepairType){
	case 1: echo "hprate = $PlMs[hprec];\n";break;
	case 2: echo "hprate = $PlMs[hprec]*$PlGameVal[hpmax];\n";break;
	default: echo "hprate = 0;";break;}
switch ($cfu_EN_AutoRepairType){
	case 1: echo "enrate = $PlMs[enrec];\n";break;
	case 2: echo "enrate = $PlMs[enrec]*$PlGameVal[enmax];\n";break;
	default: echo "enrate = 0;";break;}

$SP_RecRate = 0.004 * $PlGameVal['spmax'];
if ($UsrGenrl['hypermode'] == 2 || $UsrGenrl['hypermode'] == 6) $SP_RecRate *= 2;

unset($EqRecHP,$EqRecEN);
if ($SysWepD['spec']){
if (ereg('(HPPcRecA)+',$SysWepD['spec']) && $PlMs['hprec'] >= 1){$EqRecHP = "h += (ts_gap * (0.005 * $PlGameVal[hpmax]));";}
if (ereg('(ENPcRecA)+',$SysWepD['spec']) && $PlMs['enrec'] >= 1){$EqRecEN = "e += (ts_gap * (0.0075 * $PlGameVal[enmax]));";}
elseif (ereg('(ENPcRecB)+',$SysWepD['spec']) && $PlMs['enrec'] >= 1){$EqRecEN = "e += (ts_gap * (0.015 * $PlGameVal[enmax]));";}
}

echo "	if (h < 0){h = 0;}\n";
echo "	if (h < $PlGameVal[hpmax]){h = $Pl_ShowHP + (ts_gap * hprate);".$EqRecHP."}else{h = $PlGameVal[hpmax];}\n";
echo "	if (e < $PlGameVal[enmax]){e = $Pl_ShowEN + (ts_gap * enrate);".$EqRecEN."}else{e = $PlGameVal[enmax];}\n";
echo "	if (s < $PlGameVal[spmax]){s = $Pl_ShowSP + (ts_gap * ".$SP_RecRate.");}else{s = $PlGameVal[spmax];}\n";

echo "	if (h >= $PlGameVal[hpmax] && status_now.innerText=='�ײz��')";
echo "	{status_now.innerText='�i�o�i';status_now.style.color='#143DC1';}";

echo "	current_hp.innerText=Math.round (h);";
echo "	current_en.innerText=Math.round (e);";
echo "	current_sp.innerText=Math.round (s);";
echo "	clearTimeout(timerID);";
echo "	timerID = setTimeout(\"AutoRepairJ()\",100);";
echo "	}";
echo "	</script>";

if ($UsrGenrl['request']){
echo "<form action=organization.php?action=Employ method=post name=requestOrg>";
echo "<input type=hidden value='C' name=actionb>";
echo "<input type=hidden name=actionc value=''>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "<p><span style=\"font-weight: 700; font-size: 10pt; background-color:  ". $UsrGenrl['color'] ."\">&nbsp;<b>�ܽЫH</b>&nbsp;</span><br>";
echo "$UsrGenrl[request]";
echo "<input type=submit onClick=\"actionc.value='Accept'\" value='����'>";
echo "<input type=submit onClick=\"actionc.value='Refuse'\" value='�ڵ�'>";
echo "</form>";
}

if ($Pl_Org['opttime'] > $CFU_Time && $Pl_Org['optmissioni']){
echo "<p><span style=\"font-weight: 700; font-size: 10pt; background-color:  ". $Pl_Org['color'] ."\">&nbsp;<b>�X���q����</b>&nbsp;</span><br>";
echo "<font style=\"font-size: 10pt;color: white\">[����]</font><font style=\"font-size: 8pt;\">��ʥN��: $Pl_Org[operation]<br>";
if(ereg('(Atk=\(.*\))+',$Pl_Org['optmissioni'])){
$Pl_Show_Mission = ereg_replace('(Atk=\()|\)','',$Pl_Org['optmissioni']);
//$Pl_Show_Mission = trim($Pl_Show_Mission);
$Opt_Area = ReturnMap("$Pl_Show_Mission");
$Opt_Org = ReturnOrg($Opt_Area["User"]["occupied"]);
echo "<font style=\"font-size: 10pt;color: white\">[���e]</font>�����ݩ� <font color=$Opt_Org[color]>$Opt_Org[name]</font> �Ϊv�U��",$Opt_Area["Sys"]["map_id"],"�ϰ�";
$StartAtk = cfu_time_convert($Pl_Org['optstart']);
$TimeEnd = cfu_time_convert($Pl_Org['opttime']);
echo "<br><font style=\"font-size: 10pt;color: white\">[�}�l�ɶ�]</font> $StartAtk <br><font style=\"font-size: 10pt;color: white\">[�����ɶ�]</font> $TimeEnd ";
}
echo "</font>";
}
if ($LogEntries && $Pl_Settings['show_log_num']){
if ($Pl_Settings['show_log_num'] > $LogEntries)
$Pl_LEnt = $LogEntries;
else $Pl_LEnt = $Pl_Settings['show_log_num'];
echo "<script language=\"JavaScript\">";
echo "function showlog(){logspc.style.visibility='visible';logspc.style.position='relative';logbtn.innerText='[X]';logbtn.href=\"Javascript:hidelog();\"}";
echo "function hidelog(){logspc.style.visibility='hidden';logspc.style.position='absolute';logbtn.innerText='[+]';logbtn.href=\"Javascript:showlog();\"}";
echo "</script>";
echo "<p><span style=\"font-weight: 700; font-size: 10pt; background-color:  ". $UsrGenrl['color'] ."\">&nbsp;<b>���{����</b>&nbsp;<a href=\"Javascript:showlog();\" id=logbtn style=\"text-decoration: none\">[+]</a></span><br><div id=logspc style=\"font-size: 8pt;position: absolute;visibility: hidden\">";
$User_Log=GetUsrLog("$UsrGenrl[username]") or die ('�L�k���o������T�I�I<br>���p���޲z���I');
for($LogShowNum=1;$LogShowNum<=$Pl_LEnt;$LogShowNum++){
$i = 'time'.$LogShowNum;
$j = 'log'.$LogShowNum;
if ($User_Log[$i])
echo cfu_time_convert($User_Log[$i])."<br>$User_Log[$j]<br>";
unset($i,$j);
}}

echo "</div></td></tr>";
echo "</table>";
echo "</td>";
echo "</tr>";
echo "<script language=\"JavaScript\">",
"setTimeout(\"enablerf();\",2000);",
"function movebattle(){",
	"act.action='battle.php?action=battle_sel';",
	"act.actionb.value='battle_sel';",
	"act.target='Beta';",
	"act.submit();}",
"function enablerf(){",
	"act.ig_refresh.disabled=false;",
	"}",
"</script>";

echo "<form action=nil method=post name=act target=Beta>";
echo "<tr>";
echo "<td width=\"100%\" height=\"19\">";
echo "<input type=hidden value='none' name=actionb>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�԰�' onClick=\"movebattle()\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='����' onClick=\"act.action='map.php?action=Move';actionb.value='A';act.target='Beta';act.submit();\">";
if ($Area["User"]["hp"] <= 0 && $PlGameVal['rights'] == '1' && ereg_replace('(Atk=\()|\)','',$Pl_Org['optmissioni']) == $UsrGenrl['coordinates'] && $CFU_Time < $Pl_Org['opttime'])
echo "<input style=\"$BStyleA\" $BStyleB type=button value='����' onClick=\"act.action='organization.php?action=TakeCity';actionb.value='A';act.target='Beta';act.submit();\">";
echo "�@<input style=\"$BStyleA\" $BStyleB type=button value='�˳�' onClick=\"act.action='equip.php?action=equip';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='����Ͳ��u��' onClick=\"act.action='equip.php?action=buyms';act.actionb.value='buyms';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�����y�u��' onClick=\"act.action='statsmod.php?action=modms';act.actionb.value='buyms';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�L���s�y�u��' onClick=\"act.action='tactfactory.php?action=main';act.actionb.value='none';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�ײz�u��' onClick=\"act.action='statsmod.php?action=repairms';act.actionb.value='sel';act.target='Beta';act.submit();\">";
echo "�@<input style=\"$BStyleA\" $BStyleB type=button value='�ԳN�ǰ|' onClick=\"act.action='tacticslearn.php?action=main';act.actionb.value='none';act.target='Beta';act.submit();\">";
echo "�@<input style=\"$BStyleA\" $BStyleB type=button value='�ܮw' onClick=\"act.action='warehouse.php?action=selection';act.actionb.value='none';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�Ȧ�' onClick=\"act.action='bank.php?action=main';act.actionb.value='none';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�ӳ�' onClick=\"act.action='market.php?action=main';act.actionb.value='none';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�S��' onClick=\"act.action='scommand.php?action=main';act.actionb.value='none';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='����' onClick=\"act.action='information.php?action=Main';act.actionb.value='';act.target='Beta';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�ƦW' onClick=\"act.action='gen_info.php?action=ranks';act.actionb.value='none';act.target='Beta';act.submit();\">";
echo "�@<input style=\"$BStyleA\" $BStyleB type=button name=ig_refresh value='���s��z' disabled onClick=\"act.action='gmscrn_main.php?action=proc';act.target='Alpha';act.submit();\">";
//echo "�@<input style=\"$BStyleA\" $BStyleB type=button name=chat value='���' onClick=\"window.open('chat.php?usr=".$Pl_Value[USERNAME]."&pwd=".md5($Pl_Value[PASSWORD])."','','resizable=1,width=800,height=600');\">";
echo "�@<input style=\"$BStyleA\" $BStyleB type=button name=chat value='���' onClick=\"window.open('','$CFU_Time','resizable=1,width=800,height=600');act.action='chat.php';act.target='$CFU_Time';act.submit();\">";
echo "<input style=\"$BStyleA\" $BStyleB type=button value='�n�X' onClick=\"location.replace('index2.php');\">";
echo "</td>";
echo "</tr></form>";
echo "</table>";

echo "<table>";
echo "<tr><td align=center style=\"filter: chroma(color: black)\">";
echo "<script language=\"JavaScript\">";
echo "if (screen.availWidth < 1024){document.write('<iframe name=\'Beta\' src=\'gen_info.php\' width='+(screen.availWidth-20)+' height='+screen.availHeight/2.5+' marginheight=0 marginwidth=0 frameborder=0>');} else{";
echo "document.write('<iframe name=\'Beta\' src=\'gen_info.php\' width='+(screen.availWidth-20)+' height=\'410\' marginheight=0 marginwidth=0 frameborder=0>');}";
echo "</script>";
echo "</td></tr>";
echo "</table>";

echo "<table height=100% valign=bottom>";
postFooter();
echo "</table>";
echo "</body>";
echo "</html>";
	exit;
	}
	

	echo "<br><br><br>Undefined Action";postFooter();
?>