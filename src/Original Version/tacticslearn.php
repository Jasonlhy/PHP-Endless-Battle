<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "�s�u�O�ɡI<br>�Э��s�n�J�I";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
//Tactics Learning center GUI
if ($mode=='main'){
	unset($CancelFlag,$TactMessage);
	echo "�ԳN�ǰ|<hr>";
	if ($actionb == 'proclearn'){
		$Tactics = GetTactics($learndesired);
		if ($Tactics['price'] > $Gen['cash']){$TactMessage = '���������I';$CancelFlag= '1';}
		if ($Tactics['needlv'] > $Game['level']){$TactMessage .= '���Ť����I';$CancelFlag= '1';}
		if(ereg("($Tactics[id])+",$Game['tactics'])){$TactMessage .= "�A���N�Ƿ|�F $Tactics[name] �C";$CancelFlag= '1';}
		if (!$CancelFlag)
		$TactMessage = "���\\�H $Tactics[price] ���ǲߤF $Tactics[name] �C";
		}
	if (!$TactMessage)$TactMessage = '�[��Ө쥻�ǰ|�I<br>���I�����ǲߪ��ԳN�C';
	echo "$TactMessage<hr>";
	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\"  style=\"border-collapse: collapse;font-size: 9pt;\" bordercolor=\"#FFFFFF\" width=\"740\">";
	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]></form>";
	echo "<form action=tacticslearn.php?action=main method=post name=mainform target=Beta>";
	echo "<input type=hidden value='none' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden value='' name=learndesired>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "<tr align=center><td colspan=14><b>�ԳN�C��: </b></td></tr>";
	echo "<tr align=center>";
	echo "<td width=\"20\">No.</td>";
	echo "<td width=\"100\">�ԳN�W��</td>";
	echo "<td width=\"50\">Attacking �ץ�</td>";
	echo "<td width=\"50\">Defending �ץ�</td>";
	echo "<td width=\"50\">Reacting �ץ�</td>";
	echo "<td width=\"50\">Targeting �ץ�</td>";
	echo "<td width=\"60\">�R���ץ�</td>";
	echo "<td width=\"60\">�^�׭ץ�</td>";
	echo "<td width=\"100\">��L�ĪG</td>";
	echo "<td width=\"30\">HP���Ӷq</td>";
	echo "<td width=\"30\">EN���Ӷq</td>";
	echo "<td width=\"30\">SP���Ӷq</td>";
	echo "<td width=\"30\">�һݵ���</td>";
	echo "<td width=\"80\">����</td>";
	echo "</tr>";
unset ($sql,$query);
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` WHERE id != '0' ORDER BY `price` DESC, `needlv` DESC");
$query = mysql_query($sql);
	echo "<script language=\"Javascript\">";
	echo "function cmLearn(name,cost,id,needlv){if (needlv > $Game[level]){alert('�A�����Ť����C');return false;}if (cost > $Gen[cash]){alert('�ҫ�������!!');}else{";
	echo "if (confirm('�ǲ߾ԳN�u'+name+'�v�ݭn '+cost+' ���C\\n�T�w�n�ǲ߶ܡH') == true)";
	echo "{mainform.actionb.value='proclearn';mainform.learndesired.value=id;mainform.submit();frmreturn.submit();return true}";
	echo "else{return false}}}</script>";
while ($TacticsAvail = mysql_fetch_array($query)){
$c+=1;
$TacticsAvail['spinfo'] = ReturnSpecs($TacticsAvail['spec']);
if (ereg('('.$TacticsAvail['id'].')+',$Game['tactics'])){
$LrntTpClr = "3C3CFF";
$LrntTips = "style=\"color: $LrntTpClr\"'";}
echo "<tr align=center $LrntTips class=buymslist onMouseover=\"this.style.color='yellow';\" onMouseout=\"this.style.color='$LrntTpClr'\">";
if (!$LrntTips)
echo "<span onClick=\"mainform.learndesired.value='$TacticsAvail[id]';cmLearn('$TacticsAvail[name]','$TacticsAvail[price]','$TacticsAvail[id]','$TacticsAvail[needlv]')\">";
echo "<td width=\"20\">$c</td>";
echo "<td width=\"100\">$TacticsAvail[name]</td>";
echo "<td width=\"50\">$TacticsAvail[atf]</td>";
echo "<td width=\"50\">$TacticsAvail[def]</td>";
echo "<td width=\"50\">$TacticsAvail[ref]</td>";
echo "<td width=\"50\">$TacticsAvail[taf]</td>";
echo "<td width=\"50\">$TacticsAvail[hitf]</td>";
echo "<td width=\"50\">$TacticsAvail[missf]</td>";
echo "<td width=\"100\">$TacticsAvail[spinfo]</td>";
echo "<td width=\"30\">$TacticsAvail[hpc]</td>";
echo "<td width=\"30\">$TacticsAvail[enc]</td>";
echo "<td width=\"30\">$TacticsAvail[spc]</td>";
echo "<td width=\"30\">$TacticsAvail[needlv]</td>";
echo "<td width=\"80\">$TacticsAvail[price]</td>";
if (!$LrntTips)
echo "</span>";
echo "</tr>";
unset($TacticsAvail,$LrntTips,$LrntTpClr);
	}

	echo "</form></table>";
	if (!$CancelFlag){
		$Gen['cash'] -= $Tactics['price'];
		$Game['tactics'] .= "\n$Tactics[id]";
		$Game['tactics'] = explode("\n",$Game['tactics']);
		sort($Game['tactics']);
		$Game['tactics'] = implode("\n",$Game['tactics']);
		$Game['tactics'] = trim($Game['tactics']);		
		
		$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `tactics` = '$Game[tactics]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
		mysql_query($sql);
		$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
		mysql_query($sql);
		unset($sql,$Tactics,$TactMessage);
	}
unset ($sql,$query,$Gen,$Game);
}
else {echo "���w�q�ʧ@�I";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>