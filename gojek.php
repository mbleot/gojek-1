
    {
    echo "\e[91m[x] Nomor sudah Terdaftar\n";
    }
  else
    {
    otp:
    echo "\e[93m[*] otp =  ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[91m[x] Kode otp Salah\n";
        goto otp;
        }
      else
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[96m[#] redeem Voucher = GORIDE 8K \n";
        sleep(1);
        echo "\e[94m                               \n";
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[**]".$voucher."\n";
            sleep(8);
            echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
            sleep(8);
            echo "\e[94m                               \n";
            goto next;
            }
            else{
                echo "\e[92m[**] ".$claim."\n";
                sleep(8);
                echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
                sleep(8);
                echo "\e[94m                               \n";
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[**]".$claim['errors'][0]['message']."\n";
                sleep(305);
                echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
                sleep(8);
                echo "\e[94m                               \n";
                goto next1;
            }
            else{
                echo "\e[92m[**] ".$claim."\n";
                sleep(8);
                echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
                sleep(303);
                echo "\e[94m                               \n";
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[92m[**]".$claim['errors'][0]['message']."\n";
                sleep(8);
                echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
                sleep(8);
                echo "\e[94m                               \n";
                goto ride;
            }
          else
            {
            echo "\e[92m[**] ".$claim . "\n";
            sleep(8);
            echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
            sleep(8);
            echo "\e[94m                               \n";
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[92m[**]".$claim['errors'][0]['message']."\n";
                sleep(8);
                echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
                sleep(8);
                echo "\e[94m                               \n";

            }
            else{
                echo "\e[92m[**] ".$claim."\n";
                sleep(8);
                echo "\e[96m[#] redeem Voucher = COBAGOFOOD010420A \n";
                sleep(8);
                echo "\e[94m                               \n";
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
                echo "\033 VOUCHER GAGAL REDEEM\n";
            }
            else{
                echo "\e[92m[**] ".$claim."\n";
                
        }
    }
    }


?>

