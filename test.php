<?php
date_default_timezone_set("Asia/kolkata");
$selectedTime = date("h:i:s");
$date2=strtotime("2:08:43pm");

$date3=strtotime("12:08:33am");
if($date3>$date2)
{
	echo " so true";
	
}
$endTime = strtotime("+15 minutes", strtotime($selectedTime));
$date1=date('h:i:sa', $endTime);
if($date1>$selectedTime)
{
	echo $date1;
	exit;
}
$data2="";
$date2=date("d-m-y ".$date1);
echo $date2;
?>




