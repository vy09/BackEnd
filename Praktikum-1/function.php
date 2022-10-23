<?php
// membuat fungsi
function hitungLuasLingkaran($jari)
{
   $phi = 3.14;
   $luasLingkaran = $phi * $jari * $jari;
   return $luasLingkaran;
}

// memanggil fungsi
echo hitungLuasLingkaran(9);
echo "<br>";
echo hitungLuasLingkaran(36);
echo "<br>";
echo hitungLuasLingkaran(14);