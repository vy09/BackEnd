<?php
//Percabangan
$nilai = 90;

if ($nilai >= 90) {
  echo "Nilai Anda A";
} elseif ($nilai >= 80) {
  echo "Nilai Anda B";
} elseif ($nilai >= 70) {
  echo "Nilai Anda C";
} elseif ($nilai >= 60) {
  echo "Nilai Anda D";
} else {
  echo "Nilai Anda E";
}

echo "<br>";

switch($nilai) {
  case 90:
    echo "Nilai Anda A";
    break;
  case 80:
    echo "Nilai Anda B";
    break;
  case 70:
    echo "Nilai Anda C";
    break;
  case 60:
    echo "Nilai Anda D";
    break;
 default:
    echo "Nilai Anda E";
}