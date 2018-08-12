<?php
//JD.ID mass register by APN
if(!$argv[2]){
echo "usage php sc.php list.txt password\n";
die;}
$file=file_get_contents($argv[1]);
$file=explode("\n",$file);
foreach($file as $email){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://passport.jd.id/register");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "ReturnUrl=&spreadUserPin=&cpsPin=&phone=&email=".$email."&password=".$argv[2]."&smsCode=&eid=IY7BBX43MUUHQXQPRA2FIJ3DFRXMWWREYV6JI5Q4FMZ2467MQL3AZ7TBWTONDTCI5I6EVVLEBB3K7DVWW4NGRDDSGY&fp=4ff8d8db1c963ae8f497740485ad8882&mode=EMail");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
if(preg_match('#"success":true#',$server_output)){
    echo "$email OK \n";
}
}
?>
