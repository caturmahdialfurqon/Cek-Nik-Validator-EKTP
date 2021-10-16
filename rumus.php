<?php
/*
 CODER : CATUR MAHDI AL FURQON
script untuk mengecek/memvalidasi NIK KTP
https://github.com/caturmahdialfurqon
*/
function timer($clk)
{
    $ti = time() + $clk;
    while (1):
        echo "\r                        \r";
        $res = $ti - time();
        if ($res < 1)
        {
            break;
        }
        echo date('H:i:s', $res);
        sleep(1);
    endwhile;
}

function cek()
{
    $lb= "\033[1;36m"; $pt= "\033[0;37m"; $r = "\033[1;31m"; $gr = "\033[1;32m"; $y = "\33[1;33m";
    include 'database.php';
    echo "$y NOTE : $pt Pastikan NIK 16 Digit \n";
    echo "$pt ==========================================\n";
    $nik = readline("$lb Masukan NIK Disini $r => $y");
    system('clear');
    echo "$pt Please Wait. . . $gr \n";
    timer(2);
    system('clear');
    echo "$lb Prossesing. . . $gr \n";
    timer(4);
    system('clear');
    $jml = strlen($nik);

    if ($jml === 16)
    {
        $ktp = "$gr NIK VALID";
    }
    else
    {
        echo "$r NIK tidak VALID, Silahkan Cek kembali $gr\n";
        timer(5);
        system('clear');
        menu();
    }
    $row = array($nik[0],$nik[1],$nik[2],$nik[3],$nik[4],$nik[5],$nik[6],$nik[7],$nik[8],$nik[9],$nik[10],$nik[11],$nik[12],$nik[13],$nik[14],$nik[15],);
    $sa = "$row[0]$row[1]";
    $su = "$sa$row[2]$row[3]";
    $si = "$su$row[4]$row[5]";
    $uq = "$row[12]$row[13]$row[14]$row[15]";
    $tgl = "$row[6]$row[7]";
    $born = $tgl . "-$row[8]$row[9]-$row[10]$row[11]";
    $gender = "$row[6]$row[7]";
    if ($gender < 40)
    {
        $gen = "LAKI-LAKI";
        $gen1 = $gen;
        $gen2 = "PEREMPUAN";
    }
    else
    {
        $gen = "PEREMPUAN";
        $gen1 = "LAKI-LAKI";
        $gen2 = $gen;
    }
    if ($gen == $gen2)
    {
        $tgl = $tgl - 40;
        $z = strlen($tgl);
        if ($z == 1)
        {
            $tgl1 = "0$tgl";
            $born = $tgl1 . "-$row[8]$row[9]-$row[10]$row[11]";
        }
        else
        {
            $born = $tgl . "-$row[8]$row[9]-$row[10]$row[11]";
        }
    }
    if ($gen == $gen1)
    {
        $a = $gen;
    }
    else
    {
        $b = $gen2;
    }
    echo "
$pt SRC:$lb https://github.com/caturmahdialfurqon
$y ==========================================
              $ktp
$y ==========================================
$pt NIK           : $lb $nik
$pt Jenis Kelamin :  $a$b
$pt UNIXCODE      : $gr $uq
$pt Tgl.Lahir     : $pt $born 
$pt PROVINSI      :  $provinsi[$sa]
$pt KAB. KOTA     :  $kabkot[$su]
$pt KECAMATAN     :  $kecamatan[$si] 
$y ==========================================\n";
    echo "
$lb 1 $pt (Kembali ke $gr Menu $pt)
$lb 2 $pt (Keluar $r EXIT $pt)
\n";
    $z = readline("$pt Masukan Pilihan : $lb ");
    if ($z == 1)
    {
        system('clear');
        menu();
    }
    if ($z == 2)
    {
        system('clear');
        echo "$pt Terima Kasih Sudah Menggunakan Tools Ini.\n";
        exit(1);
    }
    else
    {
        system('clear');
        echo "Anda tidak memasukan pilihan.\n";
        echo "$pt Otomatis $r EXIT \n";
        exit(2);
    }

}
function menu()
{
 	$lb= "\033[1;36m"; $pt= "\033[0;37m"; $r = "\033[1;31m"; $gr = "\033[1;32m"; $y = "\33[1;33m";
    echo "
$pt SRC:$lb https://github.com/caturmahdialfurqon
  $pt Tools NikChecker $lb v.1.0 $gr(INDONESIA)
$y ==========================================
$pt MENU :
$lb 1. $pt Cek NIK ktp
$lb 2. $gr Ramalan Zodiac $y(COMING SOON) 
$lb 3. $r EXIT
$y ==========================================
	\n";
    $cs = readline("$pt Masukan Pilihan : $lb ");
    system('clear');
    if ($cs == 1)
    {
        cek();
    }
    if ($cs == 3)
    {
        echo "$pt Terima Kasih Sudah Menggunakan Tools Ini.\n";
        exit(1);
    }
    if ($cs == 2)
    {
        system('clear');
        echo "$pt Menu ini Belum Tersedia.. \n";
        echo "$y Nantikan Update di $lb https://github.com/caturmahdialfurqon $pt\n";
        timer(5);
        system('clear');
        menu();
    }
    else
    {
        system('clear');
        echo "$r Input yang anda masukan salah!\n";
        echo "$pt Silahkan Pilih Menu 1-3 $gr\n";
        timer(1);
        menu();
    }
}

