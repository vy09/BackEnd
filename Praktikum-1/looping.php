<?php
//looping
for ($i = 0; $i < 10; $i++) {
   echo "Perulangan ke-$i <br>";
}

while ($i < 10) {
   echo "Perulangan ke-$i <br>";
   $i++;
}

$animals = ["elephant", "dog", "horse", "cow", "fish"];
foreach ($animals as $animal) {
   echo 'animal : ' . $animal . ' <br>';
}
//membuat array asosiatif
$data_user = [
   "Nama" => "Luvy Muhamad Riski",
   "Jurusan" => "Teknik Informatika",
   "Kelas" => "Teknik Informatika 01",
   "NIM" => "0110221011",
   "IPK" => 3.91,
];

foreach ($data_user as $key => $value) {
   echo $key . ': ' . $value . '<br>';
}