<?php
if ($IncThread != "tcust_200509241855"){echo "Unauthorized";exit;}
mt_srand ((double) microtime()*1000000);
//Process with Put Weapon @ Custom
if ($actionb=='put' && $actionc){
unset($counter,$sql,$CustomPoint);
$TargetPutWep = explode('<!>',$Game[$actionc]);
if ($TactFactory['c_wep'] && $TargetPutWep[0] != '711' && $TargetPutWep[0] != '712' && $TargetPutWep[0] != '715' && $TargetPutWep[0] != '718' && $TargetPutWep[0] != '969'){echo "�Х��^�����e���Z���C";postFooter();exit;}
if (!$Game[$actionc] || !$TargetPutWep[0]){echo "�S�����˳Ʀs�b�C";postFooter();exit;}
if ($actionc == 'wepa'){echo "�����˳Ʀs�b�A�i�O�ڭ̵L�k��Z���q�z���骺�⤤��U�ӡC";postFooter();exit;}
if ($actionc != 'wepb' && $actionc != 'wepc'){echo "�z�Q��A�ۤv��@��ƶܡH";postFooter();exit;}


if ($TargetPutWep[2]){echo "�w�i��L�M�ΤƧ�y���˳ƵL�k�A���i���y�C";postFooter();exit;}
if ($TargetPutWep[1] < $Max_Wep_Exp && $TargetPutWep[0] != 711 && $TargetPutWep[0] != 712 && $TargetPutWep[0] != 715 && $TargetPutWep[0] != 718 && $TargetPutWep[0] != 969){echo "�Z���g�礣���I";postFooter();exit;}

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$actionc` = '0<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);unset($sql);

$CustomPoint = 0;
if ($TargetPutWep[0] == 711){$CustomPoint = 1;}
elseif ($TargetPutWep[0] == 712){$CustomPoint = 2;}
elseif ($TargetPutWep[0] == 715){$CustomPoint = 8;}
elseif ($TargetPutWep[0] == 718){$CustomPoint = 15;}
elseif ($TargetPutWep[0] == 969){$CustomPoint = 100;}
else {
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `c_wep` = '$TargetPutWep[0]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());unset($sql);}

if ($CustomPoint > 0){
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `c_point` = `c_point`+$CustomPoint WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());unset($sql);}

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
//Start Customing
elseif ($actionb=='start' && $actionc){
if (!$TactFactory['c_wep']){echo "�䤣��һݧ�y���Z���C";postFooter();exit;}
if (!$UsrWepB[0]){$TargetRec = 'wepb';}
elseif (!$UsrWepC[0]){$TargetRec = 'wepc';}
else{echo "�S�Ŧ�˳ơC";postFooter();exit;}

unset($sql);
$atkc_pt = intval($atkc_pt);if ($atkc_pt < 0) $atkc_pt = 0;
$hitc_pt = intval($hitc_pt);if ($hitc_pt < 0) $hitc_pt = 0;
$rdc_pt = intval($rdc_pt);if ($rdc_pt < 0) $rdc_pt = 0;
$encc_pt = intval($encc_pt);if ($encc_pt < 0) $encc_pt = 0;
$namefix = intval($namefix);
$ttlused_pt = intval($atkc_pt+$hitc_pt+$rdc_pt+$encc_pt);
if ($ttlused_pt > $TactFactory['c_point'] || $ttlused_pt <= 0){echo "��y�I�Ƥ����ΥX���I";postFooter();exit;}

GetWeaponDetails("$TactFactory[c_wep]",'CustWepS');

if (isset($secureCustom)){
	$secureCustom = 1;
	if ($ttlused_pt+($CustWepS['grade']*10) > $TactFactory['c_point'] || $ttlused_pt <= 0){echo "��y�I�Ƥ����ΥX���I";postFooter();exit;}
}
else $secureCustom = 0;

$CustomedAtk = Floor($CustWepS['atk']*$atkc_pt*0.005);
$CustomedHit = Floor($CustWepS['hit']*$hitc_pt*0.005);
$CustomedRd = Floor($CustWepS['rd']*$rdc_pt*0.005);
$CustomedENCc = $CustWepS['enc']*(1+($atkc_pt)*0.01)*(1+($rdc_pt)*0.01)*(1+($hitc_pt)*0.01);
$CustomedENC = Ceil($CustomedENCc-($CustomedENCc*$encc_pt*0.005));

$fixedname = ereg_replace("[\&\!\?\=\.\,\<\>\@\#\$\%\^\*\#\/\\\[\]\{\}\'\"]+",'',$fixedname);

if($namefix > 2 || $namefix < 1){echo "Cannot Get Fix Type";postFooter();exit;}

unset($sql);
if(ereg('(--)+',$fixedname)){echo "�M�ΦW�٥X���I";postFooter();exit;}
if(ereg('(<|>|\'|\")+',$fixedname)){echo "�M�ΦW�٥X���I";postFooter();exit;}
if(strlen($fixedname) > 32){echo "�M�ΦW�ٹL���I";postFooter();exit;}
$costPt = $ttlused_pt;
if ($secureCustom) $costPt += intval($CustWepS['grade']*10);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `c_wep` = '', `c_point`=`c_point`-$costPt WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());unset($sql);

$pt_use_max = (100-($CustWepS['grade']-1)*2)+(50-($CustWepS['grade']-1)*2)+100+60;
$pc_cust_suc = floor(($pt_use_max-$ttlused_pt)/$pt_use_max*100+50-($CustWepS['grade']*2));
$pc_res_suc = mt_rand(0,100);
if($pc_res_suc <= $pc_cust_suc){
unset($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$TargetRec` = '".$TactFactory['c_wep']."<!>0<!>".$namefix."<!>".$fixedname."<!>".$CustomedAtk."<!>".$CustomedHit."<!>".$CustomedRd."<!>".$CustomedENC."' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
$sql = ereg_replace("(--)+",'',$sql);
mysql_query($sql);
$Message = "���\\��y�F�I<br>�ĪG��: $pc_res_suc < ���\\�v: $pc_cust_suc";
}
else {
	$Message = "��y���ѤF�C<br>�ĪG��: $pc_res_suc > ���\\�v: $pc_cust_suc";
	if ($secureCustom){
		$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$TargetRec` = '".$TactFactory['c_wep']."<!>0<!>0<!>0<!>0<!>0<!>0<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
		$sql = ereg_replace("(--)+",'',$sql);
		mysql_query($sql);unset($sql);
	$Message .= "<br>�u�{�v�̦��\\�צn�l�a�F���Z��";
		
	}
}

echo "<form action=tactfactory.php?action=main method=post name=freect target=Beta>";
echo "<input type=hidden value='none' name=actionb>";
echo "<input type=hidden value='none' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">$Message<br><input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"�~��\" onClick=\"freect.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";	
}
//Process Customing Main
elseif ($actionb == 'none' && $actionc=='none'){
	echo "�L���M�ΤƤu��<hr>";
	echo "<form action=tactfactory.php?action=custom method=post name=mainform target=Beta>";
	echo "<input type=hidden value='none' name=actionb>";
	echo "<input type=hidden value='none' name=actionc>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

//Start Table -- User's Information
echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"style=\"font-size: 12pt\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\">";
echo "<tr><td width=400 colspan=2><b>����</b></td></tr>";
echo "<tr><td width=400 colspan=2>��Z���F25000�g��ɡA�i�H�i��M�ΤơC<br>�M�ΤƯ�����A��y�Z���B���ɫ¤O�M�Ĳv�C";
echo "<br>����p�U:<br>";
echo "&nbsp;- �Z���g��F25000<br>";
echo "&nbsp;- �Z�����S���i��M�Τ�<br>";
echo "&nbsp;- �M�ΤƧ�����A�Z���g���k�s�C<br>";
echo "�Ъ`�N�A����m��b�����l(�]�A�Z���M�ΤƧ�y�������l)���Z���A�N�|���h�Ҧ��g��I<br>�٦��A�L����y�i��|�O�Z���έ�ƥä[�}�a�I�Фp�ߡI<br>";
echo "�t�~�A��ƵL�k�M�ΤơA�Q�m�񪺭�Ʒ|������Ƭ���y�I�ơC<br>�z����y�I��: $TactFactory[c_point]";
echo "<hr></td></tr>";
echo "<tr><td width=350><b>�ƥθ˳�B:</b><font style=\"font-size: 10pt\"><br>$UsWep_B[name]";
if ($UsrWepB[1]) echo "<br>(�g��: $UsrWepB[1])";
echo "</font></td><td width=50 align=center>";
if (($UsrWepB[0] && $UsrWepB[1] >= 25000 && !$UsrWepB[2] && !$TactFactory['c_wep'])||$UsrWepB[0]==718||$UsrWepB[0]==715||$UsrWepB[0]==712||$UsrWepB[0]==711||$UsrWepB[0]==969) echo "<input type=button name='putb' value='�m��' onClick=\"actionb.value='put';actionc.value='wepb';mainform.submit()\">";
else echo "&nbsp;";
echo "</td></tr>";
echo "<tr><td width=350><b>�ƥθ˳�C:</b><font style=\"font-size: 10pt\"><br>$UsWep_C[name]";
if ($UsrWepC[1]) echo "<br>(�g��: $UsrWepC[1])";
echo "</font></td><td width=50 align=center>";
if (($UsrWepC[0] && $UsrWepC[1] >= 25000 && !$UsrWepC[2] && !$TactFactory['c_wep'])||$UsrWepC[0]==718||$UsrWepC[0]==715||$UsrWepC[0]==712||$UsrWepC[0]==711||$UsrWepC[0]==969) echo "<input type=button name='putc' value='�m��' onClick=\"actionb.value='put';actionc.value='wepc';mainform.submit()\">";
else echo "&nbsp;";
echo "</td></tr></table><hr>";
//End Table -- User's Information
echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"700\">";
echo "<tr><td colspan=6 align=center>�M�ΤƧ�y����Ʈw</td></tr>";
echo "<tr><td width=150>�Y�N�i��M�ΤƤu�Ǫ��Z��:</td>";
if (!$TactFactory['c_wep'])
echo "<td colspan=5>�S��";
else {
GetWeaponDetails("$TactFactory[c_wep]",'CustWepS');
echo "<td colspan=4 width=500>$CustWepS[name]</td><td width=50 align=right><input type=button name='reclaimc' value='�^��' onClick=\"mainform.action='tactfactory.php?action=main';actionb.value='reclaim';actionc.value='c_wep';mainform.submit()\">";}
echo "</td></tr>";
if ($TactFactory['c_wep']){
echo "<tr><td colspan=6>";
echo "<table align=center border=\"0\" width=\"100%\">";
echo "<tr>";
echo "<td width=50%>";
echo "<b>�w�ϥΪ���y�I��: </b><span style=\"color: blue\" id=pt_left>0</span> / $TactFactory[c_point]";
echo "</td><td><b>��y���\\�v: </b><span id=successpc>100</span>%";
echo "</td></tr><tr><td>";
$ENCMin = ceil($CustWepS['enc']*0.7);
echo "<script language=\"JavaScript\">;
function custom(type) {
	var atkcpt = Math.floor(mainform.atkc_pt.value);
	var hitcpt = Math.floor(mainform.hitc_pt.value);
	var rdcpt = Math.floor(mainform.rdc_pt.value);
	var enccpt = Math.floor(mainform.encc_pt.value);
if(type == 'atk'){
	var showatkc = $CustWepS[atk]*mainform.atkc_pt.value*0.005;
	atkc.innerText = $CustWepS[atk]+Math.floor(showatkc);
	if (atkcpt == (100-($CustWepS[grade]-1)*2))atkc.style.color='yellow';
	else atkc.style.color='blue';
	}
else if(type == 'hit'){
	var showhitc = $CustWepS[hit]*mainform.hitc_pt.value*0.005;
	hitc.innerText = $CustWepS[hit]+Math.floor(showhitc);
	if (hitcpt == (50-($CustWepS[grade]-1)*2))hitc.style.color='yellow';
	else hitc.style.color='blue';
	}
else if(type == 'rd'){
	var showrdc = $CustWepS[rd]*mainform.rdc_pt.value*0.005;
	rdc.innerText = $CustWepS[rd]+Math.floor(showrdc);
	if (rdc.innerText == Math.floor(1.5*$CustWepS[rd]))rdc.style.color='yellow';
	else rdc.style.color='blue';
	}
var showencc = $CustWepS[enc]*(1+(atkcpt)*0.01)*(1+(rdcpt)*0.01)*(1+(hitcpt)*0.01);
encc.innerText = Math.ceil(showencc);
enccmin.innerText = Math.ceil(showencc*0.7);
var showencc2 = showencc*mainform.encc_pt.value*0.005;
encc.innerText = Math.ceil(showencc-showencc2);
if (encc.innerText == enccmin)encc.style.color='yellow';
else if (encc.innerText > $CustWepS[enc])encc.style.color='orange';
else encc.style.color='blue';

var extrapt = 0;
if(mainform.secureCustom.checked == true) extrapt += ($CustWepS[grade]*10);

var point_lft = atkcpt+hitcpt+rdcpt+enccpt;
pt_left.innerText = point_lft+extrapt;

if (pt_left.innerText > $TactFactory[c_point]){pt_left.style.color='red';}
else if (pt_left.innerText == $TactFactory[c_point]){pt_left.style.color='yellow';}
else {pt_left.style.color='blue';}

var point_use_max = (100-($CustWepS[grade]-1)*2)+(50-($CustWepS[grade]-1)*2)+100+60;
var percentage = Math.floor((point_use_max-point_lft)/point_use_max*100+50-($CustWepS[grade]*2));
if (percentage > 100){percentage = 100;}
successpc.innerText = percentage;

}
function switchnfix(type){
if(type == 'pre'){
	mainform.fixedname.value='$Game[gamename]�M��';
	namepre.innerText='$Game[gamename]�M��';
	namesuf.innerText='';
}
else if(type == 'suf'){
	mainform.fixedname.value='$Game[gamename]Custom';
	namepre.innerText='';
	namesuf.innerText='$Game[gamename]Custom';
}
}
function ModName(val){
val = val.replace(/[&!?=.,<>@#$%\^\*\#\/\\\\[\]\{\}\'\"]+/,'');
if (namepre.innerText!=''){
namepre.innerText=val;
}
else if (namesuf.innerText!=''){
namesuf.innerText=val;
}
mainform.fixedname.value=val;
}
function confirmCustom(){
	if (pt_left.innerText > $TactFactory[c_point]){alert('��y�I�Ƥ����I\\n�L�k�i���y�C');return false;}
	else {
		if (confirm('�Y�N�i���y�A�нT�O�Ҧ���ƥ��T�C\\n�i�H�}�l��y�ܡH')==true){mainform.actionb.value='start';return true;}
		else {return false;}
	}
}
</script>";

$AtkMax = floor($CustWepS['atk']+$CustWepS['atk']*(100-($CustWepS['grade']-1)*2)*0.005);
echo "<b style=\"color: yellow\">�����O�j��: </b><br>$CustWepS[atk] => <b style=\"color: blue\" id=atkc>$CustWepS[atk]</b> (�W��: $AtkMax)<br>�ϥ��I��: <select name=\"atkc_pt\" onchange=\"custom('atk');\">";
for($PtUse_Atk=0;$PtUse_Atk <= $TactFactory['c_point'] && $PtUse_Atk <= (100-($CustWepS['grade']-1)*2);$PtUse_Atk++){
echo "<option value=$PtUse_Atk>$PtUse_Atk";}
echo "</select>�I";
echo "</td><td>";
$HitMax = floor($CustWepS['hit']+$CustWepS['hit']*(50-($CustWepS['grade']-1)*2)*0.005);
echo "<b style=\"color: yellow\">�R���O�j��: </b><br>$CustWepS[hit] => <b style=\"color: blue\" id=hitc>$CustWepS[hit]</b> (�W��: $HitMax)<br>�ϥ��I��: <select name=\"hitc_pt\" onchange=\"custom('hit');\">";
for($PtUse_Hit=0;$PtUse_Hit <= $TactFactory['c_point'] && $PtUse_Hit <= (50-($CustWepS['grade']-1)*2);$PtUse_Hit++){
echo "<option value=$PtUse_Hit>$PtUse_Hit";}
echo "</select>�I";
echo "</td></tr><tr><td>";
$RdMax = floor($CustWepS['rd']*1.5);
echo "<b style=\"color: yellow\">�^�ƼW�[: </b><br>$CustWepS[rd] => <b style=\"color: blue\" id=rdc>$CustWepS[rd]</b> (�W��: $RdMax)<br>�ϥ��I��: <select name=\"rdc_pt\" onchange=\"custom('rd');\">";
for($PtUse_Rd=0;$PtUse_Rd <= $TactFactory['c_point'] && $PtUse_Rd <= 100;$PtUse_Rd++){
echo "<option value=$PtUse_Rd>$PtUse_Rd";}
echo "</select>�I";
echo "</td><td>";
echo "<b style=\"color: yellow\">�෽����: </b><br>$CustWepS[enc] => <b style=\"color: blue\" id=encc>$CustWepS[enc]</b> (�U��: <span id=enccmin>$ENCMin</span>)<br>�ϥ��I��: <select name=\"encc_pt\" onchange=\"custom('enc');\">";
for($PtUse_EN=0;$PtUse_EN <= $TactFactory['c_point'] && $PtUse_EN <= 60;$PtUse_EN++){
echo "<option value=$PtUse_EN>$PtUse_EN";}
echo "</select>�I";
echo "</td></tr><tr><td>";
echo "�Z���W�٧���: <input type=text value=\"$Game[gamename]�M��\" name=fixedname maxlength=32 onChange=\"ModName(this.value);\"><br>��������: <input type=radio name=namefix value=1 checked onclick=\"switchnfix('pre');\"> �r�����[ <input type=radio name=namefix value=2 onclick=\"switchnfix('suf');\"> �r�����[";
echo "</td><td>�W�ٹw��:<br><span id=namepre>$Game[gamename]�M��</span>$CustWepS[name]<span id=namesuf></span><sub>&copy;</sub>";
echo "</td></tr>";
echo "<tr>";
echo "<td>�O�I����: <input type=checkbox name=secureCustom onClick=custom() value=true> (���� ".($CustWepS['grade']*10)." �I��y�I��)</td><td>�O�I�������Ӥ@�w����y�I�ơA���Ѯɮ��^�l�a���Z���C</td>";
echo "</tr><tr><td colspan=2 align=center>";
echo "<input type=submit value='�T�{��y' onClick='return confirmCustom()'>";
echo "</td></tr></table>";
echo "</td></tr>";
}
echo "</table></form><hr><br><br><br><br>";
}

?>