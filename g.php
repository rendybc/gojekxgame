<?php
include "O.php";
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo "\n";
echo color("white","╭━━╮
┃╭╮┃
┃╰╯╰┳━━┳━╮╭━━┳━╮╭━━┳━━┳━┳━━┳━━┳╮╭┳╮╱╭╮
┃╭━╮┃╭╮┃╭╮┫╭╮┃╭╮┫╭╮┃╭━┫╭┫┃━┫╭╮┃╰╯┃┃╱┃┃
┃╰━╯┃╭╮┃┃┃┃╭╮┃┃┃┃╭╮┃╰━┫┃┃┃━┫╭╮┃┃┃┃╰━╯┃
╰━━━┻╯╰┻╯╰┻╯╰┻╯╰┻╯╰┻━━┻╯╰━━┻╯╰┻┻┻┻━╮╭╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╭━╯┃
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╰━━╯");
	echo "\n";
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mHallo SgbTeam, Iam @Bananacreamy\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mGunakan Awalan 62 Untuk Input Pada Kolom Nomor\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo "\n";
$secret = '83415d06-ec4e-11e6-a41b-6c40088ab51e';
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-AppVersion: 3.56.2';
$headers[] = "X-Uniqueid: ac94e5d0e7f3f" . rand(111, 999);
$headers[] = 'X-Location: id_ID';
ulang:
 echo "[+] Masukin Nomor GOJEK Kamu Disini : ";
 $number = trim(fgets(STDIN));
 $login = curl('https://api.gojekapi.com/v3/customers/login_with_phone', '{"phone":"+' . $number . '"}', $headers);
 $logins = json_decode($login[0]);
 if ($logins->success == true) {
     otp:
         echo "[+] Masukin Kode OTP Kamu Disini : ";
         $otp = trim(fgets(STDIN));
         $data1 = '{"scopes":"gojek:customer:transaction gojek:customer:readonly","grant_type":"password","login_token":"' . $logins->data->login_token . '","otp":"' . $otp . '","client_id":"gojek:cons:android","client_secret":"' . $secret . '"}';
         $verif = curl('https://api.gojekapi.com/v3/customers/token', $data1, $headers);
         $verifs = json_decode($verif[0]);
         if ($verifs->success == true) {
             $token = $verifs->data->access_token;
             $headers[] = 'Authorization: Bearer ' . $token;
             $live = "token-akun.txt";
             $fopen1 = fopen($live, "a+");
             $fwrite1 = fwrite($fopen1, "Token Kamu : " . $token . "
Nomor GoJek Kamu : " . $number . "
");
             fclose($fopen1);
             echo "
";
             echo "Token Kamu : " . $token . "
";
             echo "Token Berhasil Disimpan Di File " . $live . " 
";
             echo "
";
         } else {
             echo "
";
             echo "Yah Kode OTP Salah, Coba Kamu Ulangi Lagi Deh!
";
             echo "
";
             goto otp;
         }
     } else {
         echo "
";
         echo "Yah Gagal Mengirim Kode OTP, Gunakan Nomor Yang Sudah Terdaftar Di GOJEK Yah!
";
         echo "
";
         goto ulang;
}
echo color("white","Token: ");
$token = trim(fgets(STDIN));
echo "\n".color("white","Claim?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        sleep(5);
        echo color("white","▬▬▬▬▬▬▬▬▬▬▬▬Claim Voc▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("white","Claim A..");
        echo "\n".color("white","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"GLDSKF20K"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("white"," Message: ".$message);
        sleep(10);
        }
        echo "\n".color("white","Claim B..");
        echo "\n".color("white","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"GLDSKF20K"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("white"," Message: ".$message);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        echo "\n".color("white"," Total voucher ".$total." : ");
        echo "\n".color("white"," 1. ".$voucher1);
        echo "\n".color("white"," 2. ".$voucher2);
        echo "\n".color("white"," 3. ".$voucher3);
        echo "\n".color("white"," 4. ".$voucher4);
     }
}
