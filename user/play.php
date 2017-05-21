<?php 

/*
* PHP Countdown
*
* Setup :
* 	
* 	- Define default TimeZone INDONESIA
*
* @var $sekarang type INT
* @var $countdown type INT
*
* 	Countdown bisa di definisikan dengan waktu di database, sehingga menjadi lebih fleksibel
* 
* @var $time_diff type INT
* @var $remaining type INT
*
* @return DateTime
* 
 */

date_default_timezone_set('Asia/Jakarta');

$sekarang 	= time();
$countdown 	= 1493949012;

$time_diff = $sekarang - $countdown;

if( $time_diff >= 1800) { # jika time_diff atau waktunya sudah lebih dari 30 Menit

    echo "Oke cuy udah 30 menit! Hahaha kaya di warnet.";

} else {

    $remaining = (1800 - $time_diff );
    echo "Ngenteni, ditunggu, ngentosi sik 30 menit yo...<br>";
    echo "nek ra sabar yo kono mlaku - mlaku sik, opo adus sik, bali meneh jam ".date ( "i:s" , $remaining)." luwih<br>";
    echo "---------------------------------------------------------------------------------<br>";
    echo " Dalam Bahasa Endonesah : <br>";
    echo "---------------------------------------------------------------------------------<br>";
    echo "Tunggu 30 menit lagi.<br>";
    echo "Anda bisa kembali dalam waktu ".date ( "i:s" , $remaining)." menit";

}

?>