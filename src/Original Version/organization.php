<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "�s�u�O�ɡI<br>�Э��s�n�J�I";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");
//Special Commands GUI
if ($mode=='Start'){
	echo "<font style=\"font-size: 12pt\">���߲�´</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if ($actionb == 'A'){
	echo "<form action=organization.php?action=Start method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmStartOrg(){";
	echo "if ($OrganizingCost > $Gen[cash]){alert('���������C');return false;}";
	echo "else if (mainform.org_name.value == ''){alert('�Х���J��´�W�١C');return false;}";
	echo "else {if (confirm('���߲�´�ݭn ". number_format($OrganizingCost) ." ���A�T�w�ܡH')==true){return true;}";
	echo "else {return false;}}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">���߲�´�һݸ��: </b></td></tr>";
	echo "<tr><td align=left>���߲�´�ݭn: ". number_format($OrganizingCost) ." ��<br>";
	echo "��´�W��: <input type=text name=org_name maxlength=32 size=27><br>(�`�N����P�{����a�W�٤@��)<br>";
	echo "�N���C��: <br><center>";
	foreach ($MainColors as $TheColor){$br++;$ct_default++;
	echo "<input type=\"radio\" name=\"org_color\" value=#".$TheColor;
	if ($ct_default==1) echo " checked";
	echo "><font color=#".$TheColor.">��</font> &nbsp;&nbsp; ";
	if ($br==6){echo"<br>";$br=0;}	}
	echo "<input type=submit value=\"�T�w���߲�´\" onClick=\"return cfmStartOrg();\">";
	echo "</tr></td></form></table>";
	}

	if ($actionb == 'B'){
	if ($OrganizingCost > $Gen['cash']){echo "���������C";postFooter();exit;}
	if ($Gen['fame'] < $OrganizingFame && $Gen['fame'] > $OrganizingNotor){echo "�W�n�����C";postFooter();exit;}

	$Gen['cash'] -= $OrganizingCost;
	$Gen['fame'] += 10;

	$HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> �Х� <font color=\"$org_color\">$org_name</font> ��´�A���w��Ҧ��H�ۥѥ[�J�ΰh�X�C";
	WriteHistory($HistoryWrite);
	//Enter Organization Info
	$sql = ("INSERT INTO ".$GLOBALS['DBPrefix']."phpeb_user_organization (id, name, color) VALUES('$CFU_Time','$org_name','$org_color')");
	mysql_query($sql) or die ('<br><center>���৹�����U<br>��]:' . mysql_error() . '<br>');

	$org_name = ereg_replace("\<([^\<\>]*)\>",'',$org_name);

	$sql = ("SELECT id FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE name='". $org_name ."'");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
	$New_Org = mysql_fetch_row($query);

	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '100000', `rights` = '1', `organization` = '$New_Org[0]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	//��s General Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]', `fame` = '$Gen[fame]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">���߲�´�����F�I<br>�դU���W�m�W��10�I�C<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	}
}
elseif($mode == 'Employ'){
	if ($actionb == 'C'){
	unset($CancelFlag);
	if (!$Employer){echo "�A�Q���ܽЧr�H";postFooter;exit;}
	elseif ($Game['rights']=='1'){echo "�D�u����Q�ܽСC";postFooter;exit;}
	else {$Og_Org=$Pl_Org;$Pl_Org = ReturnOrg($Employer);}if (!$Og_Org){$Og_Org =  ReturnOrg('0');}

	if(!ereg('(\!'.$Pl_Value['USERNAME'].'\, )+',$Pl_Org['request_list'])){$EmployMsg = "�Ӳ�´�S���ܽбz�C";$CancelFlag = '1';}
	else{$Pl_Org['request_list'] = ereg_replace('(\!'.$Pl_Value['USERNAME'].'\, )+','',$Pl_Org['request_list']);}

	//��s Org Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `request_list` = '$Pl_Org[request_list]' WHERE `id` = '".$Pl_Org[id]."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o��´��T, ��]:' . mysql_error() . '<br>');

	//��s General Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `request` = '' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	if ($actionc == 'Accept' && !$CancelFlag){
	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '$Pl_Org[id]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
	$EmployMsg = "���\�[�J��´�I";
	$HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ���ܽХ[�J <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>�C";
	WriteHistory($HistoryWrite);
	}

	elseif ($actionc == 'Refuse' && !$CancelFlag){
	$EmployMsg = "���\�ڵ��[�J��´�C";
	$HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �ڵ��F�[�J <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>���ܽСC";
	WriteHistory($HistoryWrite);
	}

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\"><br><br><br>$EmployMsg<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	postFooter();
	echo "</body>";
	echo "</html>";
	exit;
	} // End of Action C

	echo "<font style=\"font-size: 12pt\">�۶ҤH�~</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if ($actionb == 'A'){
	echo "<form action=organization.php?action=Employ method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmEmploy(){";
	echo "if (mainform.EmployTar.value == ''){alert('�Х���J�n���󪺤H�C');return false;}";
	echo "else {if (confirm('�ܽХؼХ[�J��´�A�T�w�ܡH')==true){return true;}";
	echo "else {return false;}}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�۶ҤH�~: </b></td></tr>";

	unset($sql,$query,$AvailPersons);
	$sql = ("SELECT `username`,`gamename`,`organization` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username` != '".$Pl_Value['USERNAME']."' AND `organization` != '$Game[organization]' AND !`rights` OR !`organization` ORDER BY `organization` ASC");
	$query = mysql_query($sql) or die(mysql_error());
	$AvailPersons = mysql_fetch_array($query);
	do{
	$TarOrg = ReturnOrg($AvailPersons['organization']);
	$EmployOpt .= "<option value='$AvailPersons[username]'>$AvailPersons[gamename] ($TarOrg[name])";
	unset($AvailPersons,$TarOrg);
	}
	while ($AvailPersons = mysql_fetch_array($query));

	if ($EmployOpt)
	echo "<tr><td align=left>�V <select name=EmployTar>$EmployOpt</select><br><input type=submit value=\"�ܽ�\" onClick=\"return cfmEmploy();\"> �o�X�ܽЫH�C</td></tr>";

	if(!ereg('(\!'.$Pl_Value['USERNAME'].'\, )+',$Pl_Org['request_list'])){$EmployMsg = "�Ӳ�´�S���ܽбz�C";$CancelFlag = '1';}
	else{$Pl_Org['request_list'] = ereg_replace('(\!'.$Pl_Value['USERNAME'].'\, )+','',$Pl_Org['request_list']);}

	if ($Pl_Org['request_list']){
	echo "<tr><td align=left>���o��^�Ъ��ܽЫH: <br>";

	$Pl_Org['request_list'] = ereg_replace('!| ','',$Pl_Org['request_list']);
	$List_of_Letters = explode(',',$Pl_Org['request_list']);
	unset($TargetName,$TarInfo);
	foreach($List_of_Letters as $TargetName){
	if ($TargetName){
	$sqle = ("SELECT `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`gamename`, `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`name`, `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`color` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info`, `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`username`='". $TargetName ."' AND `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`organization` = `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`id`");
	$querye = mysql_query($sqle) or die ('�L�k���o��T, ��]:' . mysql_error() . '<br>');
	$TarInfo = mysql_fetch_array($querye);
	echo "<font color=\"$TarInfo[color]\">$TarInfo[name] �� $TarInfo[gamename]</font><br>";}
	}
	echo "</td></tr>";
	}
	echo "</form></table>";
	} // End of Action A
	if ($actionb == 'B'){

	if (!$EmployTar || $EmployTar == $Pl_Value['USERNAME']){echo "�A�n����֧r�H";postFooter;exit;}

	$Pl_Org = ReturnOrg($Game['organization']);

	$Pl_Org['request_list'] .= '!'.$EmployTar.', ';

	//��s Org Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `request_list` = '$Pl_Org[request_list]' WHERE `id` = '".$Game['organization']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	$requesttx = "$Pl_Org[name] �� $Game[gamename] �V�z�o�X�[�J��´���ܽЫH�C<br>�A�n�[�J��´�ܡH<br>";
	$requesttx .= "<input type=hidden name=Employer value=\'$Pl_Org[id]\'>";

	//��s General Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `request` = '$requesttx' WHERE `username` = '".$EmployTar."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">��´�ܽЫH�w�o�X�C<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	} // End of Action B
}//End of Employ
elseif ($mode == 'LeaveOrg'){
	if (!$Game['organization'] || $Game['rights']){echo "�H�z���������������´�C";postFooter;exit;}
	if ($actionb != 'A' && $actionb != 'B' && $actionb != 'C') {echo "���w�q�ʧ@�I<br>";exit;}
	if ($actionb == 'A'){
		if ($Pl_Org['license'] == 1 || $Pl_Org['license'] == 3)
			{echo "�z����´���e�\�A�p�۲����A�Y�u���Q���}�N�бz�k�`�a�C";postFooter;exit;}
	}
	else {
		if ($Pl_Org['license'] != 1 && $Pl_Org['license'] != 3)
			{echo "�z�L�ݰk�`�C";postFooter;exit;}
		if ($actionb == 'C') $Gen['fame'] -= 10;
		$Gen['fame'] = floor($Gen['fame']*0.9);
	}
	//��s Gen Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `fame` = '$Gen[fame]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');

	if (abs($Gen['fame']) >= 100){
	$HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> ���� <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>�C";
	WriteHistory($HistoryWrite);}

	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">�w������´�C<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	}
//End of LeaveOrg
elseif ($mode == 'LeavePlace'){
	echo "<font style=\"font-size: 12pt\">�h��</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if (!$Game['organization'] || !$Game['rights']){echo "�H�z����������h��C";postFooter;exit;}

	if ($Game['rights'] == '1'){$RightsTitle = $RightsClass['Major'];$AllowWho = "`rights` != '1'";}
	elseif ($Game['rights']){$RightsTitle = $RightsClass['Leader'];$AllowWho = "!`rights`";}

	if ($actionb == 'A'){
	echo "<form action=organization.php?action=LeavePlace method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmLeavePlace(){";
	echo "if (mainform.GiveTar.value == ''){alert('�Х���J�n�������H�C');return false;}";
	echo "else {if (confirm('�h�쵹�ؼФH���A�T�w�ܡH')==true){return true;}";
	echo "else {return false;}}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�h������: </b></td></tr>";

	unset($sql,$query,$AvailPersons);
	$sql = ("SELECT `username`,`gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username` != '".$Pl_Value['USERNAME']."'  AND `organization` = '$Game[organization]' AND $AllowWho ORDER BY `rank` DESC");
	$query = mysql_query($sql) or die(mysql_error());
	$AvailPersons = mysql_fetch_array($query);

	do{
	$GiveTarOpt .= "<option value='$AvailPersons[username]'>$AvailPersons[gamename]";
	unset($AvailPersons);
	}
	while ($AvailPersons = mysql_fetch_array($query));

	if ($GiveTarOpt)
	echo "<tr><td align=left>�z���v�O: $RightsTitle <br>�i�h�쵹���H:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"�h��\" onClick=\"return cfmLeavePlace();\"></td></tr>";
	else echo "<tr><td align=left>�z���v�O: $RightsTitle <br>�S���A�X���H��C</td></tr>";
	echo "</form></table>";
	}// Action A End

	elseif ($actionb == 'B'){

	if (!$GiveTar){echo "�Х����w�ؼСC";postFooter;exit;}

	$sqlgame = ("SELECT `gamename`,`color` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info`,`".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`username`='". $GiveTar ."'");
	$query_game = mysql_query($sqlgame) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
	$GiveTarOpt = mysql_fetch_array($query_game);

	$HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �� $RightsTitle ���v�O���� <font color=\"$GiveTarOpt[color]\">$GiveTarOpt[gamename]</font> �C";
	WriteHistory($HistoryWrite);

	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '100000', `rights` = '1', `organization` = '$Game[organization]' WHERE `username` = '".$GiveTar."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rights` = '0', `organization` = '$Game[organization]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">�h�짹���F�I<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";

	}// Action B End


	else {echo "���w�q�ʧ@�I";}
}//End of LeavePlace

elseif ($mode == 'Break'){
if ($actionb = 'A'){
	if (!$Game['organization'] && $Game['rights'] != '1'){echo "�H�z����������Ѵ���´�C";postFooter;exit;}

	$HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> �� <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �Ѵ��F�C";
	WriteHistory($HistoryWrite);

	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `organization` = '".$Game['organization']."'");
	$query = mysql_query($sql) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
	//��s Map Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_map` SET `occupied` = '0' WHERE `occupied` = '".$Game['organization']."'");
	$query = mysql_query($sql) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
	//���� Org Info
	$sql = ("DELETE FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE id='". $Game['organization'] ."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">��´�w�Q�Ѵ��C<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	}// Action A End
}// End of Break Organization

elseif ($mode == 'Dismiss'){
	echo "<font style=\"font-size: 12pt\">�Ѷ�</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if (!$Game['organization'] || !$Game['rights']){echo "�H�z����������Ѷ���L�H�C";postFooter;exit;}

	if ($Game['rights'] == '1'){$RightsTitle = $RightsClass['Major'];$AllowWho = "`rights` != '1'";}
	elseif ($Game['rights']){$RightsTitle = $RightsClass['Leader'];$AllowWho = "!`rights`";}

	if ($actionb == 'A'){
	echo "<form action=organization.php?action=Dismiss method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmDismiss(){";
	echo "if (mainform.GiveTar.value == ''){alert('�Х���J�n�Ѷ����H�C');return false;}";
	echo "else {if (confirm('�Ѷ��ؼФH���A�T�w�ܡH')==true){return true;}";
	echo "else {return false;}}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�Ѷ��H��: </b></td></tr>";

	unset($sql,$query,$AvailPersons);
	$sql = ("SELECT `username`,`gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username` != '".$Pl_Value['USERNAME']."'  AND `organization` = '$Game[organization]' AND $AllowWho ORDER BY `rank` DESC");
	$query = mysql_query($sql) or die(mysql_error());
	$AvailPersons = mysql_fetch_array($query);

	do{
	$GiveTarOpt .= "<option value='$AvailPersons[username]'>$AvailPersons[gamename]";
	unset($AvailPersons);
	}
	while ($AvailPersons = mysql_fetch_array($query));

	if ($GiveTarOpt)
	echo "<tr><td align=left>�z���v�O: $RightsTitle <br>�i�Ѷ����H:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"�Ѷ�\" onClick=\"return cfmDismiss();\"></td></tr>";
	else echo "<tr><td align=left>�z���v�O: $RightsTitle <br>�S���i�H�Q�Ѷ����H�C</td></tr>";
	echo "</form></table>";
	}// Action A End

	elseif ($actionb == 'B'){

	if (!$GiveTar){echo "�Х����w�ؼСC";postFooter;exit;}

	$sqlgame = ("SELECT `gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE username='". $GiveTar ."'");
	$qgame = mysql_query($sqlgame) or die ('�L�k���o�C����T, ��]:' . mysql_error() . '<br>');
	$TarQ = mysql_fetch_array($qgame);

	$HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ���´���� <font color=\"$TarQ[color]\">$TarQ[gamename]</font> �Ѷ��F�C";
	WriteHistory($HistoryWrite);


	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `username` = '".$GiveTar."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">�Ѷ������F�I<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";

	}// Action B End


	else {echo "���w�q�ʧ@�I";}
}//End of Dismiss
elseif ($mode == 'JoinOrg'){
	echo "<font style=\"font-size: 12pt\">�[�J��´</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if ($Game['organization']){echo "�A�w�����ݪ���´�F�C";postFooter;exit;}

	if ($actionb == 'A'){
	echo "<form action=organization.php?action=JoinOrg method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmJoinOrg(){";
	echo "if (mainform.GiveTar.value == ''){alert('�Х���J�n�[�J����´�C');return false;}";
	echo "else {if (confirm('�[�J�ؼв�´�A�T�w�ܡH')==true){return true;}";
	echo "else {return false;}}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�[�J��´�����s�|������´: </b></td></tr>";

	unset($sql,$query,$AvailPersons);
	$sql = ("SELECT `id`,`name` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `id` != '0' AND `license` < 2  ORDER BY `id` DESC");
	$query = mysql_query($sql) or die(mysql_error());
	$AvailPersons = mysql_fetch_array($query);

	do{
	$GiveTarOpt .= "<option value='$AvailPersons[id]'>$AvailPersons[name]";
	unset($AvailPersons);
	}
	while ($AvailPersons = mysql_fetch_array($query));

	if ($GiveTarOpt)
	echo "<tr><td align=left>�i�[�J����´:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"�[�J\" onClick=\"return cfmJoinOrg();\"></td></tr>";
	else echo "<tr><td align=left>�S���i�H�Q�[�J����´�C</td></tr>";
	echo "</form></table>";
	}// Action A End

	elseif ($actionb == 'B'){

	if (!$GiveTar){echo "�Х����w�n�[�J����´�C";postFooter;exit;}

	$Og_Org = ReturnOrg($Game['organization']);
	$Pl_Org = ReturnOrg($GiveTar);

	if (abs($Gen['fame']) >= 100){
	$HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �[�J <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>�C";
	WriteHistory($HistoryWrite);}

	//��s Game Info
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '".$GiveTar."' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">�[�J��´�����F�I<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";

	}// Action B End


	else {echo "���w�q�ʧ@�I";}
}//End of JoinOrg
elseif ($mode == 'Settings'){
	echo "<font style=\"font-size: 12pt\">��´�]�w</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if (!$Game['organization'] || $Game['rights'] != '1'){echo "�A���v�O�����C";postFooter;exit;}

	if ($actionb == 'A'){
	echo "<form action=organization.php?action=ModOrg method=post name=mainform>";
	echo "<input type=hidden value='' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmModOrgLi(){";
	echo "if (confirm('�ק��´�ۥѫ�, �T�w�ܡH')==true){mainform.actionb.value='ModLi';return true;}";
	echo "else {return false;}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�]�w��´�պA: </b></td></tr>";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">��´���: ".number_format($Pl_Org['funds'])."��</b></td></tr>";
	echo "<tr><td align=left>��´�ۥѫ�:<br><input type=radio name=\"license\" checked value=\"0\">: �ۥѥ[�J�B�h�X<br><input type=radio name=\"license\" value=\"1\">: �ۥѥ[�J�A����h�X<br><input type=radio name=\"license\" value=\"2\">: ����[�J�A�ۥѰh�X<br><input type=radio name=\"license\" value=\"3\">: ����[�J�B�h�X<br>";
	echo "<input type=submit value=\"�]�w\" onClick=\"return cfmModOrgLi();\">";
	echo "</td></tr>";

	if ($Pl_Org['funds'] > 1000000){

	echo "<script language=\"Javascript\">";
	echo "function cfmModOrgC(){";
	echo "if (confirm('�H 1,000,000�� �ק��´�N���, �T�w�ܡH')==true){mainform.actionb.value='ModC';return true;}";
	echo "else {return false;}";
	echo "}</script>";

	echo "<tr><td align=left>��´�N���:<br>���ܥN���ݭn�ϥ� 1,000,000�� ��´����C<br>";
	foreach ($MainColors as $TheColor){$br++;$ct_default++;
	echo "<input type=\"radio\" name=\"org_color\" value=#".$TheColor;
	if ($ct_default==1) echo " checked";
	echo "><font color=#".$TheColor.">��</font> &nbsp;&nbsp; ";
	if ($br==6){echo"<br>";$br=0;}	}
	echo "<input type=submit value=\"�]�w\" onClick=\"return cfmModOrgC();\">";
	echo "</td></tr>";
	}
	if ($Pl_Org['funds'] > 10000000){
	echo "<script language=\"Javascript\">";
	echo "function cfmModOrgN(){";
	echo "if (confirm('�H 10,000,000�� �ק��´�W��, �T�w�ܡH')==true){mainform.actionb.value='ModN';return true;}";
	echo "else {return false;}";
	echo "}</script>";

	echo "<tr><td align=left>��´�W��:<br>���ܲ�´�W�ٻݭn�ϥ� 10,000,000�� ��´����C<br>";
	echo "�s�W��: <input type=text name=NewOrgName maxlength=32>";
	echo "<input type=submit value=\"�]�w\" onClick=\"return cfmModOrgN();\">";
	echo "</td></tr>";
	}
	echo "</form></table>";
	}// Action A End
	else {echo "���w�q�ʧ@�I";}
}//End of Settings
elseif ($mode == 'ModOrg'){
	if (!$Game['organization'] || $Game['rights'] != '1'){echo "�A���v�O�����C";postFooter;exit;}

	if ($actionb == 'ModLi'){
	//��s Org Info
	if ($license > 3 || $license < 0){echo "Hacking Attempt.";postFooter;exit;}
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `license` = '$license' WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o��´��T, ��]:' . mysql_error() . '<br>');
	if ($license == 0) $LiText = "�Y��_<b>�����s�|��</b>�[�J�ӥB�|���i�H<b>�ۥѲ���</b>��´";elseif ($license == 1) $LiText = "�Y��_<b>�����s�|��<b>�[�J��<b>����|���ۦ�h�X</b>";
	elseif ($license == 2) $LiText = "�Y��_<b>���A�����s�|��</b>�[�J���|���i�H<b>�ۥѲ���</b>��´";elseif ($license == 3) $LiText = "�Y��_<b>���A�����s�|��</b>�[�J�ӥB<b>����|���ۦ�h�X</b>";
	$HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �ŧG��´".$LiText."�C";
	WriteHistory($HistoryWrite);
	}// Action A End
	elseif ($actionb == 'ModC'){
	if (1000000 > $Pl_Org['funds']){echo "��´��������C";postFooter();exit;}
	if (!$org_color){echo "�Х���n�C��C";postFooter();exit;}
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `color` = '$org_color', `funds` = `funds`-1000000 WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o��´��T, ��]:' . mysql_error() . '<br>');
	$Gen['cash']-=1000000;
	$HistoryWrite = "<font color=\"$org_color\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �ŧG��´���ܥN���C��C";
	WriteHistory($HistoryWrite);
	}
	elseif ($actionb == 'ModN'){
	if (10000000 > $Pl_Org['funds']){echo "��´��������C";postFooter();exit;}
	if (!$NewOrgName){echo "�Х���n��´�W�١C";postFooter();exit;}
	$NewOrgName = ereg_replace("\<([^\<\>]*)\>",'',$NewOrgName);
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `name` = '$NewOrgName', `funds` = `funds`-10000000 WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
	$query = mysql_query($sql) or die ('�L�k���o��´��T, ��]:' . mysql_error() . '<br>');
	$HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �ŧG��´��W�� <font color=\"$Pl_Org[color]\">$NewOrgName</font> �C";
	WriteHistory($HistoryWrite);
	}
	else {echo "���w�q�ʧ@�I";}
	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">��´�]�w�����F�I<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";

}//End of ModOrg
elseif ($mode == 'CityAtk'){
	echo "<font style=\"font-size: 12pt\">�𲤭p��</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if (!$Game['organization'] || $Game['rights'] != '1'){echo "�A���v�O�����C";postFooter;exit;}

	if ($actionb == 'A'){
	echo "<form action=organization.php?action=CityAtk method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function changeDuration(){price.innerText= $Org_War_Cost * mainform.duration.value;}";
	echo "function cfmDeclare(){";
	echo "if ($Pl_Org[funds] < price.innerText){alert('��´��������I');return false;}";
	echo "else if (confirm('�Y�N�o�ʾԪ�, �i�H�ܡH')==true){return true;}";
	echo "else {return false;}";
	echo "}</script>";

	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�p����ϰ�o�ʾԪ�: </b></td></tr>";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">��´���: ".number_format($Pl_Org['funds'])."��</b></td></tr>";
	echo "<tr><td align=left>�ݭn���: �C�p�� ".number_format($Org_War_Cost)."��<br>�@�ݭn: <span id=price>$Org_War_Cost</span> ��<br>";


	unset($sql,$query,$AtTarPosblty,$nums);
	$sql = ("SELECT `map_id`,`name` FROM `".$GLOBALS['DBPrefix']."phpeb_user_map`,`".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `occupied`=`id` AND `occupied` != ". $Pl_Org['id']);
	$query = mysql_query($sql) or die ('�L�k���o�򥻸�T, ��]:' . mysql_error() . '<br>');
	$nums = mysql_num_rows($query);
	if ($nums){
	while ($AtkInfo = mysql_fetch_array($query))
	{
	$AtTarPosblty .= "<option value='$AtkInfo[map_id]'>$AtkInfo[map_id] ($AtkInfo[name])";
	}

	echo "��<select name=sttimedelay><option value=6>6<option value=7>7<option value=8>8<option value=9>9<option value=10>10<option value=11>11<option value=12>12<option value=13>13<option value=14>14<option value=15>15<option value=16>16<option value=17>17<option value=18>18</select>�p�ɫ�";
	echo "�V<select name=target>$AtTarPosblty</select> �o��<br>";
	echo "����<select name=duration onChange=\"changeDuration()\"><option value=1>1<option value=2>2<option value=3>3</select>�p�ɪ��Ԫ�";
	$DefaultOName = $CFU_Date."���Ԫ�";
	echo "<br>��ʥN��: <input type=text name=Opt_Name maxlength=32 value='$DefaultOName'>";
	}
	else {echo "�S���i�𲤪������C"; $AtkDisabled = ' disabled';}
	echo "<Br><input type=submit value=\"�ž�\"$AtkDisabled onClick=\"return cfmDeclare();\">";
	echo "</td></tr></table>";
	}
	elseif ($actionb == 'B'){
	if ($duration > 3){echo "�Ԫ��ɶ��Y���L���C";postFooter();exit;}
	elseif ($duration < 0){echo "�Ԫ��ɶ��Y���X���C";postFooter();exit;}
	if ($sttimedelay > 18 || $sttimedelay < 6){echo "�Ԫ����ɮɰݥX���C";postFooter();exit;}
	if ($Pl_Org['funds'] < ($Org_War_Cost * $duration)){echo "��´��������C";postFooter();exit;}
	if ($Pl_Org['opttime'] > $CFU_Time){echo "�W�@�����Ԫ��٨S�����I";postFooter();exit;}

	$StartTime = $CFU_Time + $sttimedelay * 3600;
	$EndTime = $StartTime + $duration * 3600;
	$Cost = $Org_War_Cost * $duration;
	if ($Cost < 0){echo "Hacking Attempt�I";postFooter();exit;}

	$HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� $target �ϰ�žԡI";
	WriteHistory($HistoryWrite);

	unset($sql,$query);
	$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE `map_id` = '$target'");
	$query = mysql_query($sql) or die(mysql_error());

	unset($sql);
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`-$Cost, `optmissioni` = 'Atk=($target)', `opttime` = '$EndTime', `optstart` = '$StartTime', `operation` = '$Opt_Name' WHERE `id` = '$Game[organization]' LIMIT 1;");
	mysql_query($sql);

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">�Ԫ��o�ʤF�I<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	}

	else {echo "���w�q�ʧ@�I";}
}//End of CityAtk


elseif ($mode == 'TakeCity'){
	echo "<font style=\"font-size: 12pt\">����ϰ�</font>";
	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
	if (!$Game['organization'] || $Game['rights'] != '1'){echo "�A���v�O�����C";postFooter;exit;}
	if ($Pl_Game['status']){echo "�ײz���A�L�k����ϰ�C";postFooter();exit;}
	$Area = ReturnMap("$Gen[coordinates]");
	if ($Area["User"]["hp"] > 0){echo "�L�k����ϰ�A���M���ĭx�u�ƵۡC";postFooter();exit;}
	if (ereg_replace('(Atk=\()|\)','',$Pl_Org['optmissioni']) != $Gen['coordinates'] && $CFU_Time > $Pl_Org['opttime'])
	{echo "�L�k����ϰ�A�S���惡�a�ϫžԡC";postFooter();exit;}

	if ($Area["Sys"]["occprice"] > $Pl_Org['funds']){echo "��´��������I�������ϰ�C";postFooter();exit;}

	if ($actionb == 'A'){
	echo "<form action=organization.php?action=TakeCity method=post name=mainform>";
	echo "<input type=hidden value='B' name=actionb>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

	echo "<script language=\"Javascript\">";
	echo "function cfmOccupy(){";
	echo "if ($Pl_Org[funds] < ".$Area["Sys"]["occprice"]."){alert('��´��������I');return false;}";
	echo "else if (confirm('�H ".$Area["Sys"]["occprice"]." ���a���a��, �i�H�ܡH')==true){return true;}";
	echo "else {return false;}";
	echo "}</script>";
	echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">���⦹�ϰ�: </b></td></tr>";

	echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�ϰ�: $Gen[coordinates]</b><br>";
	echo "��´���: ".number_format($Pl_Org['funds'])."��<br>";
	echo "����O��: ".number_format($Area["Sys"]["occprice"])."��<br>";
	$Area_At = $Area["Sys"]["at"] + 20;
	$Area_De = $Area["Sys"]["de"] + 25;
	$Area_Ta = $Area["Sys"]["ta"] + 100;
	echo "�n������O:<br>HP�W��: ". $Area["Sys"]["hpmax"];
	echo "<br>�����O: $Area_At ���äO: $Area_De �R��: $Area_Ta<br>";
	GetWeaponDetails($Area["Sys"]["wepa"],'FortDfltWep');
	echo "���m�Z��: $FortDfltWep[name]<br>";
	echo "<input type=submit value=���⦹�ϰ� onClicl=\"return cfmOccupy()\">";
	echo "</td></tr>";
	echo "</form></table>";
	}
	elseif ($actionb == 'B'){

	$HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> ���\\�� $Gen[coordinates] �ϰ����F�I";
	WriteHistory($HistoryWrite);

	unset($sql,$query);
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_map` SET `hpmax` = '".$Area["Sys"]["hpmax"]."' ,`hp`=`hpmax` ,`at` ='".$Area["Sys"]["at"]."', `de` ='".$Area["Sys"]["de"]."', `ta` ='".$Area["Sys"]["ta"]."', `wepa` ='".$Area["Sys"]["wepa"]."', `occupied` = '$Game[organization]' WHERE `map_id` = '$Gen[coordinates]' LIMIT 1;");
	$query = mysql_query($sql) or die(mysql_error());

	unset($sql);
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`-".$Area["Sys"]["occprice"].", `optmissioni` = '', `opttime` = '', `optstart` = '', `operation` = '' WHERE `id` = '$Game[organization]' LIMIT 1;");
	mysql_query($sql);unset($sql);
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `optmissioni` = '', `opttime` = '', `optstart` = '', `operation` = '' WHERE `optmissioni` = '$Gen[coordinates]'");
	mysql_query($sql);

	echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
	echo "<p align=center style=\"font-size: 16pt\">���\\����F���ϰ�I<input type=submit value=\"��^\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
	echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
	echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
	echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
	echo "</form>";
	}

	else {echo "���w�q�ʧ@�I";}
}//End of TakeCity

else {echo "���w�q�ʧ@�I";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>