<?php

require_once('init.php');
$file=fopen("data1.txt", "r") or die("can't open file");
$data=file_get_contents("data1.txt");
$dataArr=explode("**",$data);
//print_r($dataArr);
foreach($dataArr as $student) {
	$student=trim($student);
	set_time_limit(0);
	$detailsArr=explode("  ",$student);
	$sroll=$detailsArr[0];
	$sname=substr($detailsArr[1],0,strlen($detailsArr[1])-1);
	$sprog=substr($detailsArr[2],0,strlen($detailsArr[2])-2);
	$sdep=substr($detailsArr[3],0,strlen($detailsArr[3])-2);
	$res=substr($detailsArr[4],0,strlen($detailsArr[4])-2);
	$resArr=explode(",", $res);
	$shall=$resArr[0];
	$sroom=substr($resArr[1],1);
	$smail=substr($detailsArr[5],0,strlen($detailsArr[5])-2);
	$sblood=substr($detailsArr[6],0,strlen($detailsArr[6])-2);
	$scateg=substr($detailsArr[7],0,strlen($detailsArr[7])-2);
	$sgen=substr($detailsArr[8],0,strlen($detailsArr[8])-2);
	$other=explode("\n", $student);
	$addr=explode("<br>",$other[1].$other[2]);
	$sguardian=substr($addr[0],1);
	$saddr=$addr[1];
	$addrArr=explode(",",$addr[1]);
	$scountry=$addrArr[count($addrArr)-1];
	$sstate=$addrArr[count($addrArr)-2];
	$scity=$addrArr[count($addrArr)-3];
	$sphone=substr($addr[2],14);
	$smob=substr($addr[3],10,strlen($addr[3])-10);
	$sql="INSERT INTO ".$table." (roll, name, prog, dep, room, hall, email, blood, gender, category, guardian, address, city, state, country, mobile, phone) VALUES ('".$sroll."', '".$sname."', '".$sprog."', '".$sdep."', '".$sroom."', '".$shall."', '".$smail."', '".$sblood."', '".$sgen."', '".$scateg."', '".$sguardian."', '".mysql_real_escape_string($saddr)."', '".$scity."', '".$sstate."', '".$scountry."', '".$smob."', '".$sphone."')";
	//echo $sql;
	mysql_query($sql, $con) or die(mysql_error());
}
mysql_close($con);

?>