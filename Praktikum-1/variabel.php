<?php
//membuat variabel
$name = "Luvy Muhammad Riski"; //string
$rombel = "Teknik Infomatika 01"; //string
$jurusan = "Teknik Informatika"; //string
$umur = 20; //integer
$ipk = 3.91; //float
$isMarried = false; //boolean

//memanggil variabel
echo "Nama : $nama";
echo "<br>";
echo "Rombel : $rombel";
echo "<br>";
echo "Jurusan : $jurusan";
echo "<br>";
echo "IPK : $ipk";
echo "<br>";
if ($isMarried == true){
  echo "Status : Menikah";
} else {
  echo "Status : Belum Menikah";
}
