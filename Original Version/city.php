<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "�s�u�O�ɡI<br>�Э��s�n�J�I";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");

$Area = ReturnMap("$Gen[coordinates]");
//$AreaLandForm = ReturnMType($Area["Sys"]["type"]);
$Ar_Org = ReturnOrg($Area["User"]["occupied"]);
//Special Commands GUI
if ($mode=='ModFort'){
	
	if ($Area["User"]["occupied"] != $Game['organization'] || $Game['rights'] != '1')
	{echo "�X���C";postFooter();exit;}

	$Otp_Area_Sql = ("SELECT `opttime`,`optstart` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `optmissioni` = 'Atk=($Gen[coordinates])' AND `opttime` > '$CFU_Time' ORDER BY `optstart` ASC LIMIT 1");
	$Otp_Area_Q = mysql_query($Otp_Area_Sql) or die(mysql_error());
	$Otp_A_ITar = mysql_fetch_array($Otp_Area_Q);
	
	echo "<font style=\"font-size: 12pt\">�j�ƫ���</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	
	$At_Cost = Floor(($Area["User"]["at"]+5)*75000);
	if ($Area["User"]["at"]+5 > 75) $At_Cost *= 2;
	$De_Cost = Floor(($Area["User"]["de"]+5)*125000);
	if ($Area["User"]["de"]+5 > 75) $De_Cost *= 2;
	$Ta_Cost = Floor(($Area["User"]["ta"]+5)*50000);
	if ($Area["User"]["ta"]+5 > 75) $Ta_Cost *= 2;
	$HpMax_Cost = Floor(($Area["User"]["hpmax"]+10000)*1.5);
	
	if ($actionb == 'A'){
	echo "<form action=city.php?action=ModFort method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='C' name=actionc>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmModFort(type){";
	echo "if (type == 'at' && (".$At_Cost." > $Pl_Org[funds])){alert('��´��������C');return false;}";
	echo "else if (type == 'de' && (".$De_Cost." > $Pl_Org[funds])){alert('��´��������C');return false;}";
	echo "else if (type == 'ta' && (".$Ta_Cost." > $Pl_Org[funds])){alert('��´��������C');return false;}";
	echo "else if (type == 'hpmax' && (".$HpMax_Cost." > $Pl_Org[funds])){alert('��´��������C');return false;}";
	echo "else if (type == 'ehp' && (50000 > $Pl_Org[funds])){alert('��´��������C');return false;}";
	echo "else if (type == 'shp' && (100000 > $Pl_Org[funds])){alert('��´��������C');return false;}";
	echo "else if (type == 'lhp' && (200000 > $Pl_Org[funds])){alert('��´��������C');return false;}";
	echo "else {if (confirm('�T�w�n�j�ƫ���ܡH')==true){mainform.actionc.value=type;return true;}";
	echo "else {return false;}}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�j�� $Gen[coordinates]�ϰ� ������: </b></td></tr>";
	echo "<tr><td>��´���: ".number_format($Pl_Org['funds'])."��";
	if ($Area["User"]["at"]+5 <= 145) echo "<br>�j�ƭn������O: <input type=submit value=\"�j��5�IAT\" onClick=\"return cfmModFort('at');\"> �һݪ���: $". number_format($At_Cost);
	if ($Area["User"]["de"]+5 <= 145) echo "<br>�j�ƭn�먾�m�O: <input type=submit value=\"�j��5�IDE\" onClick=\"return cfmModFort('de');\"> �һݪ���: $". number_format($De_Cost);
	if ($Area["User"]["ta"]+5 <= 145) echo "<br>�j�ƭn��R����O: <input type=submit value=\"�j��5�ITA\" onClick=\"return cfmModFort('ta');\"> �һݪ���: $". number_format($Ta_Cost);
	if ($Area["User"]["hpmax"]+10000 <= 5000000) echo "<br>�j�ƭn��˥ҭ@�[��: <input type=submit value=\"�W�[10000HP\" onClick=\"return cfmModFort('hpmax');\"> �һݪ���: $". number_format($HpMax_Cost);
	
	if ($Otp_A_ITar)
	echo "<br>������: <input type=submit value=\"�^�_5000�IHP\" onClick=\"return cfmModFort('ehp');\"> �һݪ���: $".number_format(50000);
	else{
	echo "<br>�^�_����HP: <input type=submit value=\"�^�_50000�I\" onClick=\"return cfmModFort('shp');\"> �һݪ���: $".number_format(100000);
	echo "<br>�^�_�j�qHP: <input type=submit value=\"�^�_100000�I\" onClick=\"return cfmModFort('lhp');\"> �һݪ���: $".number_format(200000);
	}
	echo "</tr></td>";
	echo "<tr><td>";
	echo "���ܭn�먾�m�Z��: (�w�����{���Z��������)";
	
	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"600\">";
	echo "<tr align=center><td colspan=8><b>�Z���C��: </b></td></tr>";
	echo "<tr align=center>";
	echo "<td width=\"20\">��</td>";
	echo "<td width=\"195\">�Z���W��</td>";
	echo "<td width=\"80\">�����O</td>";
	echo "<td width=\"30\">�R��</td>";
	echo "<td width=\"30\">�^��</td>";
	echo "<td width=\"40\">EN���O</td>";
	echo "<td width=\"120\">�S��ĪG</td>";
	echo "<td width=\"85\">����</td>";
	echo "</tr>";
	
	GetWeaponDetails($Area["User"]["wepa"],'Ar_Wep');
	
	$wepsqlsel = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE `spec` REGEXP '(FortressOnly)+' AND `id` != '".$Area["User"]["wepa"]."' ORDER BY price");
	$reswep = mysql_query($wepsqlsel);
	$syswepbuyinfo = mysql_fetch_array($reswep);
	$syswepbuynumsrows = mysql_num_rows($reswep);
	if ($syswepbuynumsrows > 0){
	$wepbuyoptions='';
	do
	{
	echo "<tr align=center>";
	echo "<td width=\"20\"><input type=radio name=FortWep value='$syswepbuyinfo[id]'></td>";
	echo "<td width=\"195\">$syswepbuyinfo[name]</td>";
	echo "<td width=\"80\">". number_format($syswepbuyinfo['atk']) ."</td>";
	echo "<td width=\"30\">$syswepbuyinfo[hit]</td>";
	echo "<td width=\"30\">$syswepbuyinfo[rd]</td>";
	echo "<td width=\"40\">$syswepbuyinfo[enc]</td>";
	$syswepbuyinfospecs = ReturnSpecs($syswepbuyinfo['spec']);
	echo "<td width=\"120\">$syswepbuyinfospecs</td>";
	$ExchangePrice = ceil($syswepbuyinfo['price'] - $Ar_Wep['price']/2);
	if ($ExchangePrice < 0)$ExchangePrice = 0;
	echo "<td width=\"85\">". number_format($ExchangePrice) ."</td>";
	echo "</tr>";
	}
	while ( $syswepbuyinfo = mysql_fetch_array($reswep) );
	}
	echo "</table><input type=submit value=\"��\" onClick=\"return cfmModFort('wep');\"></tr></td></form></table>";
	}
	elseif($actionb == 'B' && $actionc){
	unset($InsufFundsFlag);
	if ($actionc == 'at' && (Floor(($Area["User"]["at"]+5)*75000) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
	if ($actionc == 'de' && (Floor(($Area["User"]["de"]+5)*125000) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
	if ($actionc == 'ta' && (Floor(($Area["User"]["ta"]+5)*50000) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
	if ($actionc == 'hpmax' && (Floor(($Area["User"]["hpmax"]+10000)*1.5) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
	if ($actionc == 'ehp' && (50000 > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
	if ($actionc == 'shp' && (100000 > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
	if ($actionc == 'lhp' && (200000 > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
	
	if ($InsufFundsFlag == 1){echo "<center>��´��������C";postFooter();exit;}
	
	unset($sql,$sqlSet,$Cost);
		
	if ($actionc == 'at'){
		if ($Area["User"]["at"]+5 > 145){
			echo "<center>����A�[�j�n������O�C";
			postFooter();
			exit;
		}
		if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
			$sqlSet = ("`at` = `at`+5");
			$Cost = $At_Cost;
		}
		else{echo "<center>�{�b����[�j�n��C";postFooter();exit;}
	}
	elseif($actionc == 'de'){
		if ($Area["User"]["de"]+5 > 145){
			echo "<center>����A�[�j�n�먾�m�O�C";
			postFooter();
			exit;
		}
		if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
			$sqlSet = ("`de` = `de`+5");
			$Cost = $De_Cost;
		}
		else{echo "<center>�{�b����[�j�n��C";postFooter();exit;}
	}
	elseif($actionc == 'ta'){
		if ($Area["User"]["ta"]+5 > 145){
			echo "<center>����A�[�j�n��R���O�C";
			postFooter();
			exit;
		}
		if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
			$sqlSet = ("`ta` = `ta`+5");
			$Cost = $Ta_Cost;
		}
		else{echo "<center>�{�b����[�j�n��C";postFooter();exit;}
	}
	elseif($actionc == 'hpmax'){
		if ($Area["User"]["hpmax"]+10000 > 5000000){
			echo "<center>����A�[�j�n��HP�C";
			postFooter();
			exit;
		}
		if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
			$sqlSet = ("`hpmax` = `hpmax`+10000, `hp` = `hp`+10000");
			$Cost = $HpMax_Cost;
		}else{echo "<center>�{�b����[�j�n��C";postFooter();exit;}
	}
	elseif($actionc == 'ehp' && $Area["User"]["hp"] > 0){
		if ($Area["User"]["hp"] + 5000 > $Area["User"]["hpmax"])
		$sqlSet = ("`hp` = `hpmax`");
		else
		$sqlSet = ("`hp` = `hp`+5000");
	$Cost = 50000;
	}
	elseif($actionc == 'shp' && !$Otp_A_ITar){
		if ($Area["User"]["hp"] + 50000 > $Area["User"]["hpmax"])
		$sqlSet = ("`hp` = `hpmax`");
		else
		$sqlSet = ("`hp` = `hp`+50000");
	$Cost = 100000;
	}
	elseif($actionc == 'lhp' && !$Otp_A_ITar){
		if ($Area["User"]["hp"] + 100000 > $Area["User"]["hpmax"])
		$sqlSet = ("`hp` = `hpmax`");
		else
		$sqlSet = ("`hp` = `hp`+100000");
	$Cost = 200000;
	}
	elseif($actionc =='wep'&& !$Otp_A_ITar && $Area["User"]["hp"] > 0){
		if (!$FortWep){echo "<center>�Х���ܭn�������Z���C";postFooter();exit;}
		else{
		unset($Ex_Wep,$Ar_Wep);
		GetWeaponDetails($FortWep,'Ex_Wep');
		GetWeaponDetails($Area["User"]["wepa"],'Ar_Wep');
		$ExchangePrice = ceil($Ex_Wep['price'] - $Ar_Wep['price']/2);
		if ($ExchangePrice < 0)$ExchangePrice = 0;
		if (!ereg('(FortressOnly)+',$Ex_Wep['spec'])){echo "�o���O�n��M�ΪZ���C";postFooter();exit;}
		elseif($ExchangePrice > $Pl_Org['funds']){echo "<center>��´��������C";postFooter();exit;}
		else{$Cost = $ExchangePrice;$sqlSet = "`wepa` = '$Ex_Wep[id]'";}
		}
	}
	elseif($Otp_A_ITar){
		echo "�Բ��i�椤�A����j�ƭn��I";
		postFooter();exit;
	}
	elseif($Area["User"]["hp"] <= 0){
		echo "�n��w�_���I";
		postFooter();exit;
	}
	else {echo "���w�q�ʧ@�I";postFooter();exit;}
	//��s Map Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_map` SET $sqlSet WHERE `occupied` = '".$Game['organization']."' AND `map_id` = '".$Gen['coordinates']."'");
	$query = mysql_query($sql) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
	
	//��s Org Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`-$Cost WHERE `id` = '".$Game['organization']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
	
	unset($sql,$sqlSet,$Cost);

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">����j�Ƨ����F�I<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	}
}
else {echo "���w�q�ʧ@�I";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>