<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "�s�u�O�ɡI<br>�Э��s�n�J�I";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
$UsrWepB = explode('<!>',$Game['wepb']);
$UsrWepC = explode('<!>',$Game['wepc']);
GetWeaponDetails("$UsrWepB[0]",'UsWep_B');
GetWeaponDetails("$UsrWepC[0]",'UsWep_C');

unset($IncThread);

//Set DataTable
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` WHERE username='". $Pl_Value['USERNAME'] ."'");
$query_ttf = mysql_query($sql);$defineuserc = 0;
$defineuserc = mysql_num_rows($query_ttf);

if ($defineuserc == 0){
	$sqldftf = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` (username,time) VALUES('$Pl_Value[USERNAME]','$CFU_Time')");
	mysql_query($sqldftf) or die ('<br><center>����إߧL���s�y�u�����<br>��]:' . mysql_error() . '<br>');
	$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` WHERE username='". $Pl_Value['USERNAME'] ."'");
	$query_ttf = mysql_query($sql) or die ('<br><center>������o�L���s�y�u�����<br>��]:' . mysql_error() . '<br>');
	$TactFactory['time'] -= 2;
}

$TactFactory = mysql_fetch_array($query_ttf);
if (($CFU_Time - $TactFactory['time']) < 1){echo "�A��b�����ӧ֤F�C�Щ����A���C<br>�h�¦X�@�I";exit;}

//Weapon Casting GUI
if ($mode=='main' && $actionb=='none'){
	echo "�L���s�y�u��<Hr>";
	echo "<form action=tactfactory.php?action=main method=post name=mainform target=Beta>";
	echo "<input type=hidden value='none' name=actionb>";
	echo "<input type=hidden value='none' name=actionc>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

//Start Table -- User's Information
echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"style=\"font-size: 12pt\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\">";
echo "<tr><td width=400 colspan=2>$Game[gamename] ���˳�</td></tr>";
echo "<tr><td width=350><b>�ƥθ˳�B:</b><font style=\"font-size: 10pt\"><br>$UsWep_B[name]";
if ($UsrWepB[1]) echo "<br>(�g��: $UsrWepB[1])";
echo "</font></td><td width=50 align=center>";
if ($UsrWepB[0] && !$UsrWepB[2]) echo "<input type=button name='putb' value='�m��' onClick=\"actionb.value='put';actionc.value='wepb';mainform.submit()\">";
else echo "&nbsp;";
echo "</td></tr>";
echo "<tr><td width=350><b>�ƥθ˳�C:</b><font style=\"font-size: 10pt\"><br>$UsWep_C[name]";
if ($UsrWepC[1]) echo "<br>(�g��: $UsrWepC[1])";
echo "</font></td><td width=50 align=center>";
if ($UsrWepC[0] && !$UsrWepC[2]) echo "<input type=button name='putc' value='�m��' onClick=\"actionb.value='put';actionc.value='wepc';mainform.submit()\">";
else echo "&nbsp;";
echo "</td></tr></table>";

//End Table -- User's Information
echo "<hr align=center width=80%>";
//Start Table -- Factory's Information
unset($a,$b,$c);
for($a=0;$a <= 20;$a++){$c = 'm'.$a;
if ($TactFactory[$c]) $b+=1;
}
if($b){
echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"700\">";
echo "<tr><td width=700 colspan=6 align=center>��Ʈw</td></tr><tr>";
echo "<td width=50>1��</td>";
if ($TactFactory['m1']){
GetWeaponDetails("$TactFactory[m1]",'TactFactory_m1');
echo "<td width=250>$TactFactory_m1[name]</td>";
echo "<td width=50><input type=button name='reclaim1' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m1';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";
echo "<td width=50>11��</td>";
if ($TactFactory['m11']){
GetWeaponDetails("$TactFactory[m11]",'TactFactory_m11');
echo "<td width=250>$TactFactory_m11[name]</td>";
echo "<td width=50><input type=button name='reclaim11' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m11';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=50>2��</td>";
if ($TactFactory['m2']){
GetWeaponDetails("$TactFactory[m2]",'TactFactory_m2');
echo "<td width=250>$TactFactory_m2[name]</td>";
echo "<td width=50><input type=button name='reclaim2' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m2';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>12��</td>";
if ($TactFactory['m12']){
GetWeaponDetails("$TactFactory[m12]",'TactFactory_m12');
echo "<td width=250>$TactFactory_m12[name]</td>";
echo "<td width=50><input type=button name='reclaim12' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m12';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>3��</td>";
if ($TactFactory['m3']){
GetWeaponDetails("$TactFactory[m3]",'TactFactory_m3');
echo "<td width=250>$TactFactory_m3[name]</td>";
echo "<td width=50><input type=button name='reclaim3' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m3';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>13��</td>";
if ($TactFactory['m13']){
GetWeaponDetails("$TactFactory[m13]",'TactFactory_m13');
echo "<td width=250>$TactFactory_m13[name]</td>";
echo "<td width=50><input type=button name='reclaim13' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m13';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>4��</td>";
if ($TactFactory['m4']){
GetWeaponDetails("$TactFactory[m4]",'TactFactory_m4');
echo "<td width=250>$TactFactory_m4[name]</td>";
echo "<td width=50><input type=button name='reclaim4' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m4';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>14��</td>";
if ($TactFactory['m14']){
GetWeaponDetails("$TactFactory[m14]",'TactFactory_m14');
echo "<td width=250>$TactFactory_m14[name]</td>";
echo "<td width=50><input type=button name='reclaim14' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m14';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>5��</td>";
if ($TactFactory['m5']){
GetWeaponDetails("$TactFactory[m5]",'TactFactory_m5');
echo "<td width=250>$TactFactory_m5[name]</td>";
echo "<td width=50><input type=button name='reclaim5' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m5';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>15��</td>";
if ($TactFactory['m15']){
GetWeaponDetails("$TactFactory[m15]",'TactFactory_m15');
echo "<td width=250>$TactFactory_m15[name]</td>";
echo "<td width=50><input type=button name='reclaim15' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m15';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>6��</td>";
if ($TactFactory['m6']){
GetWeaponDetails("$TactFactory[m6]",'TactFactory_m6');
echo "<td width=250>$TactFactory_m6[name]</td>";
echo "<td width=50><input type=button name='reclaim6' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m6';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>16��</td>";
if ($TactFactory['m16']){
GetWeaponDetails("$TactFactory[m16]",'TactFactory_m16');
echo "<td width=250>$TactFactory_m16[name]</td>";
echo "<td width=50><input type=button name='reclaim16' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m16';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>7��</td>";
if ($TactFactory['m7']){
GetWeaponDetails("$TactFactory[m7]",'TactFactory_m7');
echo "<td width=250>$TactFactory_m7[name]</td>";
echo "<td width=50><input type=button name='reclaim7' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m7';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>17��</td>";
if ($TactFactory['m17']){
GetWeaponDetails("$TactFactory[m17]",'TactFactory_m17');
echo "<td width=250>$TactFactory_m17[name]</td>";
echo "<td width=50><input type=button name='reclaim17' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m17';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>8��</td>";
if ($TactFactory['m8']){
GetWeaponDetails("$TactFactory[m8]",'TactFactory_m8');
echo "<td width=250>$TactFactory_m8[name]</td>";
echo "<td width=50><input type=button name='reclaim8' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m8';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>18��</td>";
if ($TactFactory['m18']){
GetWeaponDetails("$TactFactory[m18]",'TactFactory_m18');
echo "<td width=250>$TactFactory_m18[name]</td>";
echo "<td width=50><input type=button name='reclaim18' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m18';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>9��</td>";
if ($TactFactory['m9']){
GetWeaponDetails("$TactFactory[m9]",'TactFactory_m9');
echo "<td width=250>$TactFactory_m9[name]</td>";
echo "<td width=50><input type=button name='reclaim9' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m9';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>19��</td>";
if ($TactFactory['m19']){
GetWeaponDetails("$TactFactory[m19]",'TactFactory_m19');
echo "<td width=250>$TactFactory_m19[name]</td>";
echo "<td width=50><input type=button name='reclaim19' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m19';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "<tr>";
echo "<td width=50>10��</td>";
if ($TactFactory['m10']){
GetWeaponDetails("$TactFactory[m10]",'TactFactory_m10');
echo "<td width=250>$TactFactory_m10[name]</td>";
echo "<td width=50><input type=button name='reclaim10' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m10';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "<td width=50>20��</td>";
if ($TactFactory['m20']){
GetWeaponDetails("$TactFactory[m20]",'TactFactory_m20');
echo "<td width=250>$TactFactory_m20[name]</td>";
echo "<td width=50><input type=button name='reclaim20' value='�^��' onClick=\"actionb.value='reclaim';actionc.value='m20';mainform.submit()\"></td>";}
else echo "<td width=300 colspan=2 align=center style=\"font-size: 8pt\">����S���m�������</td>";echo "</tr>";
echo "</table>";
echo "<script language=\"Javascript\">function CfmCast(){if (confirm('�u���n�}�l�X���u�ǶܡH\\n�@�����ѤF�A�Ҧ���F�N�|�����I\\n�w�Ҽ{�M���ܡH')==true){";
echo "mainform.action='tactfactory.php?action=cast';mainform.actionb.value='start';mainform.submit();}";
echo "else {return false;}";
echo "}</script>";
echo "<br><center><input type=submit name='start' value='�}�l�X���u��' onClick=\"CfmCast()\"></center>";
echo "<hr align=center width=80%>";
}
unset($a,$b,$c);
echo "<p align=center><input type=button value='�u������' onClick=\"mainform.action='tactfactory.php?action=readme';mainform.submit();\"><input type=button value='�M�ΤƧ�y' onClick=\"mainform.action='tactfactory.php?action=custom';mainform.submit();\"><input type=button value='�u�{�v�u�|' onClick=\"mainform.action='tactfactory.php?action=guild';mainform.submit();\"></p>";
echo "</form>";
}
//Process with Put Weapon
elseif ($mode=='main' && $actionb=='put' && $actionc){
if (!$Game[$actionc]){echo "�S�����˳Ʀs�b�C";postFooter();exit;}
if ($actionc == 'wepa'){echo "�����˳Ʀs�b�A�i�O�ڭ̵L�k��Z���q�z���骺�⤤��U�ӡC";postFooter();exit;}
if ($actionc != 'wepb' && $actionc != 'wepc'){echo "�z�Q��A�ۤv��@��ƶܡH";postFooter();exit;}
unset($counter,$mc);
$counter = 1;
while($counter <= 20 && !$TargetPut){
$mc='m'.$counter;
if (!$TactFactory[$mc]){$TargetPut = $mc;}
$counter++;}
if (!$TargetPut){echo "��Ʈw�w���F�A�A�u��ı�o���ݭn�Ψ���h��ƶܡH";postFooter();exit;};
unset($counter,$sql);
$TargetPutWep = explode('<!>',$Game[$actionc]);
if ($TargetPutWep[2]){echo "�i��L�M�ΤƧ�y���˳ƵL�k�������ơC";postFooter();exit;}
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$actionc` = '0<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);unset($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `".$mc."` = '$TargetPutWep[0]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());unset($sql);

echo "<form action=tactfactory.php?action=main method=post name=freect target=Beta>";
echo "<input type=hidden value='none' name=actionb>";
echo "<input type=hidden value='none' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">�m�񧹦��F�I<br><input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"�~��\" onClick=\"freect.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";	
}
//Process with Reclaim Weapon
elseif ($mode=='main' && $actionb=='reclaim' && $actionc){
if (!$TactFactory[$actionc]){echo "�S�����˳Ʀs�b�C";postFooter();exit;}
if (!$UsrWepB[0]){$TargetRec = 'wepb';}
elseif (!$UsrWepC[0]){$TargetRec = 'wepc';}
else{echo "�S�Ŧ�˳ơC";postFooter();exit;}
unset($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$TargetRec` = '".$TactFactory[$actionc]."<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);unset($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `".$actionc."` = '' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());unset($sql);
echo "<form action=tactfactory.php?action=main method=post name=freect target=Beta>";
echo "<input type=hidden value='none' name=actionb>";
echo "<input type=hidden value='none' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">�^�������F�I<br><input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"�~��\" onClick=\"freect.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";	
}//End Reclaim and Put

//Start Cast
elseif($mode == 'cast' && $actionb == 'start' && $actionc=='none'){
if($ChosenTact){echo "�A�Q�F����H";postFooter();exit;}
if (!$UsrWepB[0]){$TargetGrant = 'wepb';}
elseif (!$UsrWepC[0]){$TargetGrant = 'wepc';}
else{echo "�S�Ŧ�˳ơC";postFooter();exit;}

unset($sql,$query,$counter,$StopFlag,$mc);
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory`");
$query = mysql_query($sql) or die ('<br><center>������o�L���s�y�u�����<br>��]:' . mysql_error() . '<br>');
$nosrow = mysql_num_rows($query);
unset($counter,$counterb,$counterc,$StopFlagB,$mb,$ChosenTact);
$ChosenTact = 0;
$counter=1;
while($Tacticals = mysql_fetch_array($query)){
	if(!$ChosenTact){
	$counterb=1;
	$StopFlagB = '0';
	while($counterb <= 20 && !$StopFlagB){
	$mb='m'.$counterb;
	if (!$Tacticals[$mb])$StopFlagB = '1';
	$counterb++;
	}//Number needed calculated
	$counterc=1;
	$mc='';$WrongFlag=0;
	while($counterc < ($counterb - 1) && !$WrongFlag){
	$mc='m'.$counterc;
	if ($TactFactory[$mc] != $Tacticals[$mc])$WrongFlag = '1';
	$counterc++;
	}//Analysed right or wrong
	if(!$WrongFlag)$ChosenTact = $Tacticals['wep_id'];}
}//Analysed Chosen Weapon
//Grant Chosen Weapon
if ($ChosenTact){
	unset($sql);
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$TargetGrant` = '".$ChosenTact."<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
	mysql_query($sql);
	GetWeaponDetails("$ChosenTact",'TheResultWep');
	$CastResult = "�s�y���\\�F�I<br>�A���\\�s�y�X <font color=blue>".$TheResultWep['name']."</font> �I";
}else{$CastResult = "�s�y���ѤF�C�]�\�A�����t��C";
}
unset($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `m1` = '', `m2` = '', `m3` = NULL, `m4` = NULL, `m5` = NULL, `m6` = NULL, `m7` = NULL, `m8` = NULL, `m9` = NULL, `m10` = NULL, `m11` = NULL, `m12` = NULL, `m13` = NULL, `m14` = NULL, `m15` = NULL, `m16` = NULL, `m17` = NULL, `m18` = NULL, `m19` = NULL, `m20` = NULL WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1"); 
mysql_query($sql) or die(mysql_error());unset($sql);
echo "<form action=tactfactory.php?action=main method=post name=freect target=Beta>";
echo "<input type=hidden value='none' name=actionb>";
echo "<input type=hidden value='none' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">$CastResult<br><input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"�~��\" onClick=\"freect.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";	
}
elseif($mode == 'readme' && $actionb == 'none' && $actionc=='none'){
echo "�L���s�y�u��<hr>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=center width=400><b style=\"font-size: 10pt;\">�L���s�y�u������</b></td></tr>";
	echo "<tr><td align=left>";
	echo "<b>�L���s�y�u��</b><Br>�@- �i�H���P����ơB�Z���B�˳�, �X���s���Z���M�˳�<br>�@- �X���Z����, ������ӫ���(�X���k)�i��, �_�h�X���|����<br>�@- ���Ѫ���, �|���h�Ҧ���ƩM����b�����l�������~<br>�@- ����m��b�����l�����~, ���|���h�Ҧ��g��<br>";
	echo "<b>�M�ΤƧ�y�u��</b><Br>�@- �M�ΤƯ�����A��y�Z���B���ɫ¤O�M�Ĳv�C<br>�@- ��Z���ŦX�@�w������ɡA�i�H�i��M�ΤơC<br>�@- ����p�U:<br>�@ �@ - �Z���g��F25000 <br>�@ �@ - �Z�����S���i��M�Τ� <br>�@ �@ - �M�ΤƧ�����A�Z���g���k�s�C<br>�@- ���Ѫ���, �|���h�Ҧ���ƩM�i��M�Τƪ��Z��<br>�@- ����m��b�����l�����~, ���|���h�Ҧ��g��<br>";
	echo "<b>�u�{�v�u�|</b><Br>�@- �i�H�b�o�ʶR�X����k<br>";
	echo "</tr></td></table>";
}
elseif($mode == 'guild' && $actionb == 'none' && $actionc=='none'){
echo "�L���s�y�u�� -- �u�{�v�u�|<hr>";
echo "
<table>
<tr><td>�ϥλ���</td></tr>
<tr>
<td style=\"font-size: 10pt\">
�o�̬O�u�{�v�u�|�A�A�i�H�b�o�ʶR�X����k�A�|���@�ܤT�Ӧ�u�{�v�^���A���A���u���@�ӤH�����ܬO�����T���C
<br>�n�`�N���O��Ʈw������Ʀh�F�O���|�v�T�X�����C�i�O�A���Ƥ����άO�ɾ��B���ǿ��F���ܡA�K�|�\\���@±�C<br>
�X���Z���������šA���O�O�Ѥ@�ŦܤQ�šC�Q�Ŭ��̰��šC<br>��������<font color=red>�H�żƤW��</font>�C������: �G���ŧO���譼".($TFDCostCons)." (�Y 2<sup>n</sup> * ".($TFDCostCons)." )
</td></tr>
<tr><td>
<form action=tactfactory.php?action=guild method=post name=mainform>";
echo "<input type=hidden value='buy' name=actionb>";
echo "<input type=hidden value='none' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "�ʶR: 
<script langauge=\"Javascript\">
function changeprice(){
cost.innerText = (Math.pow(2,mainform.grade.value))*".($TFDCostCons).";
if (cost.innerText > $Gen[cash]){cost.style.color='red';}
}
function ChkBuy(){
if (cost.innerText > $Gen[cash]){alert('���������I');return false;}
else {if (confirm('�T�w�n�ʶR�ܡH')==true){return true;}else{return false;}}
}</script>
<select name='grade' onchange=\"changeprice()\"><option value=1 selected>�@��<option value=2>�G��<option value=3>�T��<option value=4>�|��<option value=5>����<option value=6>����
<option value=7>�C��<option value=8>�K��<option value=9>�E��<option value=10>�Q��</select>�X���k�C<br>
�һݪ��B: <span id=cost>".intval(2*$TFDCostCons)."</span><br>
<input type=submit value=�ʶR OnClick=\"return ChkBuy()\">
</td></tr></form>";
echo "<tr><td><form action=tactfactory.php?action=main method=post name=freect target=Beta>";
echo "<input type=hidden value='none' name=actionb>";
echo "<input type=hidden value='none' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=left style=\"font-size: 16pt\">$CastResult<br><input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"�~��\" onClick=\"freect.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form></tr></td>";
if($TactFactory['directions']) echo "<tr><td>�W���ʶR���X���k:</tr></td><tr><td>$TactFactory[directions]</tr></td>";
echo "</table>";
}
elseif ($mode == 'guild' && $actionb == 'buy' && $actionc=='none'){
$grade = intval($grade);
if ($grade < 0 || $grade > 10){echo "�ŧO�X��!!<br>";PostFooter();exit;}
$TrueCost = intval(pow(2,$grade) * $TFDCostCons);
if ( $TrueCost > $Gen['cash']){echo "��������!!<br>";PostFooter();exit;}
else {$Gen['cash'] -= $TrueCost;}

unset($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);

unset($sql,$query,$counter,$TheTString);
$sql = ("SELECT `directions` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_tactfactory` WHERE `grade` = '$grade'");
$query = mysql_query($sql);

$NmbrTtclD = mysql_num_rows($query);
mt_srand ((double) microtime()*1000000);
$RandSelect = mt_rand(1,$NmbrTtclD);
$counter=0;
while($TacticalD = mysql_fetch_array($query)){$counter++;
$TheTString='TtclDrtns'.$counter;
$$TheTString = $TacticalD['directions'];
}

$TheDisTString = 'TtclDrtns'.$RandSelect;
echo "<table><tr><td bgcolor=><font color=orange>���</font></td></tr>";
echo "<tr><td bgcolor=>". $$TheDisTString ."</td></tr>";
echo "<tr><td bgcolor=><font color=orange>�ЧA�O�C�U�o�ǹ��</font></td></tr></table>";

unset($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `directions` = '". $$TheDisTString ."' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);

}
elseif($mode == 'custom'){
$IncThread = "tcust_200509241855";
include('tact_custom.php');
}
else {echo "���w�q�ʧ@�I";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>